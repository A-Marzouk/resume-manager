<?php

namespace App\Http\Controllers;

use App\Agent;
use App\classes\Upload;
use App\Mail\welcome;
use App\Project;
use App\Recording;
use App\User;
use App\UserData;
use Behance\Client;
use http\Exception;
use Illuminate\Http\Request;
use App\classes\Telegram;
use App\Skill;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Laravel\Socialite\Facades\Socialite;
use PharIo\Manifest\Email;
use Vinkla\Instagram\Instagram;

class UserDataController extends Controller
{

    public function store(Request $request)
    {
        if (isset($request->user_id)) {
            $user_id = $request->user_id;
        } else {
            $user_id =  currentUser()->id;
        }
        $userData = UserData::where('user_id', $user_id)->first();
        if ($userData) {
            $data = $request->all();
            foreach ($data as $key => $value) {
                if ($key == '_token') {
                    continue;
                } elseif ($key == 'photo') {
                    if (is_numeric($value)) {
                        $userData->profile_picture = "";
                    } else {
                        $pathToPhoto = Upload::photo($value, 'photo', '');
                        $userData->profile_picture = $pathToPhoto;
                    }
                } elseif ($key == 'audioFile') {
                    if (is_numeric($value)) {
                        $userData->{$key} = " ";
                    } else {
                        $pathToAudio = Upload::audio($value, 'audioFile', '');
                        if ($pathToAudio) {
                            $userData->{$key} = $pathToAudio;
                        }
                    }
                } elseif ($key == 'video_file') {
                    if (is_numeric($value)) {
                        $userData->{$key} = " ";
                    } else {
                        $pathToVideo = Upload::video($value, 'video_file', '');
                        if ($pathToVideo) {
                            $userData->{$key} = $pathToVideo;
                        }
                    }
                } elseif ($key == 'audio') {
                    // get Id :
                    $data = $value;
                    $explodedData = explode("/", $data);
                    foreach ($explodedData as $id) {
                        if (strlen($id) > 20) {
                            $userData->{$key} = $id;
                            break;
                        } else {
                            $userData->{$key} = "NOT-VALID-LINK";
                        }
                    }
                } else {
                    $userData->job_title = $request->jobTitle;
                    $userData->first_name = explode(' ', $request->name)[0];
                    $userData->last_name = explode(' ', $request->name)[1] ?? '';
                    if ($request->availableHours != null) {
                        $userData->available_hours_per_week = $request->availableHours;
                    }

                    $agent = Agent::where('user_id', $user_id)->first();
                    if ($request->salary != null) {
                        $agent->hourly_rate = $request->salary;
                        $agent->save();
                    }
                }
            }

            $userData->save();
            return $request;
        } else {
            return redirect('/freelancer/home');
        }
    }

    public function dataFromBehance($behanceUsername)
    {
        $apiKey = "JqLizSfJOtrq1fNwBPnJ56oTerbqVh2P";
        $client = new Client($apiKey);

        if (!empty($behanceUsername)) {
            $data = $client->getUser($behanceUsername);
            if (!$data) {
                return;
            }
            $projects = $client->getUserProjects($behanceUsername);
            $fullProjects = [];
            foreach ($projects as $project) {
                $fullProjects[] = $client->getProject($project->id);
            }
            $data->projects = $fullProjects;
            $this->saveBehanceProjects($fullProjects);
        } else {
            $data = [];
        }

        return Response::json($data);
    }

    public function ArrDataFromBehance($behanceUsername)
    {
        $apiKey = "JqLizSfJOtrq1fNwBPnJ56oTerbqVh2P";

        $client = new Client($apiKey);

        if (!empty($behanceUsername)) {
            $data = $client->getUser($behanceUsername);
            if (!$data) {
                return;
            }
            $projects = $client->getUserProjects($behanceUsername);
            $fullProjects = [];
            foreach ($projects as $project) {
                $fullProjects[] = $client->getProject($project->id);
            }
            $data->projects = $fullProjects;
        } else {
            $data = [];
        }

        return $data;
    }


    public function saveImgLink(Request $request)
    {
        $userData = UserData::where('user_id', auth()->user()->id)->first();
        $userData->photo = $request->img;
        $userData->design_skills = implode(', ', $request->design_skills);
        $userData->save();

        return ['status' => 'ok'];
    }

    public function saveBehanceProjects($projects)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $userExistingProjects = $user->projects;

        $existingProjectsNames = [];
        foreach ($userExistingProjects as $project) {
            $existingProjectsNames[] = $project->projectName;
        }

        foreach ($projects as $project) {
            if (in_array($project->name, $existingProjectsNames)) {
                continue;
            }
            $dist = "resumeApp/uploads/project" . $project->id . "Behance" . $user->id . ".png";
            if (!file_exists($dist)) {
                copy($project->covers->original, $dist);
            } else {
                continue;
            }
            // create new project :
            // check if we have more images ( modules )
            $modules = $project->modules;
            $moreMedia = [];
            if (!empty($modules)) {
                foreach ($modules as $module) {
                    if (isset($module->src)) {
                        if (strpos($module->src, 'embed') !== false) { // it is video link !
                            $moreMedia[] = $module->src;
                        } else {
                            $newName = str_replace('https://mir-s3-cdn-cf.behance.net/project_modules/disp/', '', $module->src);
                            $distMoreMedia = "resumeApp/uploads/behance_data/new_img" . $project->id . "Behance" . $user->id . $newName;
                            if (!file_exists($distMoreMedia)) {
                                copy($module->src, $distMoreMedia);
                            }
                            $moreMedia[] = $distMoreMedia;
                        }
                    }
                }
            }
            // save the more media images to our server:
            $localProject = new Project();
            $localProject->user_id = $user->id;
            $localProject->projectName = $project->name;
            $localProject->projectDesc = $project->description;
            $localProject->link = $project->url;
            $localProject->mainImage = $dist;
            $localProject->images = implode(',', $moreMedia);
            $localProject->save();
        }
    }


    public function dataFromLinkedIn()
    {
        try {
            $user = Socialite::driver('linkedin')->stateless()->user();
            $currentUser = auth()->user();
            $userData = UserData::where('user_id', $currentUser->id)->first();
            $userData->name = $user->user['formattedName'];
            $userData->photo = $user->avatar_original;
            $userData->intro = $user->user['headline'];

            $userData->save();
            return redirect('/freelancer')->with('successMessage', 'Data is successfully imported from Linked In.');
        } catch (Exception $e) {
            return redirect('/freelancer')->with('errorMessage', 'Something went wrong, please try again.');
        }
    }

    public function dataFromInstagram()
    {
        $client = new \GuzzleHttp\Client();

        $res = $client->request(
            'POST',
            'https://api.instagram.com/oauth/access_token',
            [
                'form_params' => [
                    'client_id' => 'f877808c985d4f43ad73ae517db95151',
                    'client_secret' => '2f113fcf0bbc4a24ab30e1b5f90b5220',
                    'grant_type' => 'authorization_code',
                    'redirect_uri' => 'https://123workforce.com/freelancer/instagram',
                    'code' => $_GET['code'] ?? ''
                ]
            ]
        );

        $responseJson = $res->getBody()->getContents();
        $responseArr = json_decode($responseJson, true);

        $userMediaJson = $client->request('GET', 'https://api.instagram.com/v1/users/' . $responseArr["user"]["id"] . '/media/recent?access_token=' . $responseArr["access_token"]);
        $userMediaArr = json_decode($userMediaJson->getBody()->getContents());

        foreach ($userMediaArr->data as $instagramProject) {
            $project = new Project;
            $project->mainImage = $instagramProject->images->standard_resolution->url;
            if ($instagramProject->caption !== null) {
                $project->projectName = $instagramProject->caption->text;
            }
            $project->user_id = auth()->user()->id;
            $project->save();
        }

        return redirect('/freelancer#portfolio')->with('successMessage', 'Instagram data successfully imported');
    }

    public function showAudioPage()
    {
        return view('audio');
    }

    public function saveAudio(Request $request)
    {
        $currFreelancer = auth()->user();
        $record = new Recording;
        if (isset($_FILES['file']) and !$_FILES['file']['error']) {
            $fname = "Record" . $currFreelancer->id . '_' . time() . '.ogg';
            $target_file = "resumeApp/uploads/audios/" . $fname;

            if (file_exists($target_file)) {
                unlink($target_file);
            }

            move_uploaded_file($_FILES['file']['tmp_name'], $target_file);
        }


        $record->user_id = $currFreelancer->id;
        $record->title = $request->get('recordTitle');
        $record->transcription = $request->get('recordTranscription');
        $record->src = "/" . $target_file;
        $record->save();

        return ['recordID' => $record->id];
    }

    public function saveAudioForChat(Request $request)
    {
        if (isset($_FILES['file']) and !$_FILES['file']['error']) {
            $fname = "Record_" . date(time()) . '.ogg';
            $target_file = "resumeApp/storage/chat_shared_files/" . $fname;

            if (file_exists($target_file)) {
                unlink($target_file);
            }

            move_uploaded_file($_FILES['file']['tmp_name'], $target_file);
        }

        return $target_file;
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function githubOAuth()
    {
        return redirect('https://github.com/login/oauth/authorize?client_id=' . config('services.github.client_id') . '&redirect_uri=' . config('services.github.redirect') . '&login=' . auth()->user()->data->github);
    }

    public function importDataFromGithub(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $user = auth()->user();

        $res = $client->request(
            'POST',
            'https://github.com/login/oauth/access_token?client_id=' . config('services.github.client_id') . '&client_secret=' . config('services.github.client_secret') . '&code=' . $request->query('code'),
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json'
                ]
            ]
        );

        $token = json_decode($res->getBody()->getContents())->access_token;

        /**
         * @var $data is an object
         * Example:
         * 
         * avatar_url: https://avatars0.githubusercontent.com/u/23144809?v=4
         * login: josedan10
         * location:  Caracas, Venezuela (done)
         * blog: https://josedan.github.io (done)
         * repos: https://api.github.com/users/josedan10/repos
         */

        $res = $client->request(
            'GET',
            'https://api.github.com/users/' . auth()->user()->data->github,
            [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token
                ]
            ]
        );
        $data = json_decode($res->getBody());

        // Update user data
        $user->data()->update([
            'city' => explode(", ", $data->location)[0],
            'country' => explode(", ", $data->location)[1],
            'website' => $data->blog,
            'avatar' => $data->avatar_url
        ]);

        $res = $client->request(
            'GET',
            $data->repos_url
        );


        /**
         * @var $reposData is an array 
         * 
         */

        $reposData = json_decode($res->getBody());

        $projects = [];
        $languages = [];

        foreach ($reposData as $repo) {
            $project = new Project();
            $project->projectName = $repo->name;
            $project->projectDesc = ($repo->description == null) ? 'No description' : $repo->description;
            $project->link = ($repo->homepage == null) ? '' : $repo->homepage;
            $project->order = 1;

            if ($repo->language != null && !in_array($repo->language, $languages)) {
                $languages[] = $repo->language;
            }

            array_push($projects, $project);
        }

        // Check the user skills before save the incoming
        $skills = Skill::where([
            'user_id' => $user->id,
        ])->orderBy('skill_title', 'asc')->get();

        sort($languages);
        $i = 0;

        /**
         * @todo fix the filter 
         */

        foreach ($skills as $skill) {

            if ($i >= count($languages)) break;
            $lang = $languages[$i];

            if (
                !(strcmp(strtolower($lang), strtolower($skill->skill_title)) > 0)
            ) {
                if (strcmp(strtolower($lang), strtolower($skill->skill_title)) == 0) {
                    // Remove from array because this exists on user skills
                    array_splice($languages, $i, 1);
                } else {
                    // The skill is not in user skills
                    $i++;
                }
            }
        }

        $newSkills = [];

        if (count($languages) > 0) {
            // Add new skills
            foreach ($languages as $skill) {

                $newSkills[] = new Skill(["skill_title" => $skill, "percentage" => 50, "type" => "programming"]);
            }
        }

        $user->skills()->saveMany($newSkills);

        return response("Imported data", 200);
    }
}
