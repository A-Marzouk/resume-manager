<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 6:39 PM
 */

namespace App\Http\Controllers;


use App\Agent;
use App\classes\Upload;
use App\Language;
use App\Recording;
use App\Skill;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AgentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('viewAgents', 'isAdmin', 'getAgents', 'createAgent');
    }


    public function updateAgentStatus(Request $request)
    {

        $status = $request->status;
        $agent = Agent::where('id', $request->agent_id)->first();


        $agent->update([
            'status' => $status
        ]);

        return [
            'status' => 'success'
        ];
    }

    public function editAgentUsername(Request $request)
    {
        $request->validate([
            'username' => 'max:191|required|unique:users|alpha_dash',
        ]);

        $user = User::where('id', $request->user_id)->first();
        if ($user) {
            $user->update([
                'username' => $request->username
            ]);
        }

        return [
            'username' => $user->username
        ];
    }


    public function editAgentAffiliatePercentage(Request $request)
    {
        $request->validate([
            'affiliate_percentage' => 'max:191|required|numeric',
        ]);

        $user = User::where('id', $request->user_id)->first();
        if ($user) {
            $user->update([
                'affiliate_percentage' => $request->affiliate_percentage
            ]);
        }

        return [
            'affiliate_percentage' => $user->affiliate_percentage
        ];
    }

    public function viewAgentServiceAgreement()
    {
        return view('freelancer.my_account.service_agreement');
    }

    public function viewAgentPrivacyAgreement()
    {
        return view('freelancer.my_account.privacy_agreement');
    }

    public function signContract(Request $request)
    {
        // contract type :
        $type = $request->type; // privacy or service
        // timestamp
        $current_date_time = Carbon::now()->toDateTimeString();

        if ($request->type === 'privacy') {
            currentAgent()->user()->update([
                'agreed_with_privacy_agreement_at' => $current_date_time
            ]);
        } else if ($request->type === 'service') {
            currentAgent()->user()->update([
                'agreed_with_service_agreement_at' => $current_date_time
            ]);
        }

        if (isset($request->signature)) {
            currentAgent()->update([
                'signature' => $request->signature
            ]);
        }


        return [
            'status' => 'success'
        ];
    }


    public function viewAgents()
    {
        $agents = $this->getAgents();
        return view('agents', compact('agents'));
    }

    public function isAdmin()
    {
        if (auth()->user() && auth()->user()->admin == 1) {
            return 'admin';
        }
        return 'not-admin';
    }

    public function getAgents()
    {
        // get current authenticated freelancer :
        $agents = Agent::orderBy('number', 'ASC')->get();
        foreach ($agents as &$agent) {
            $agent['records'] = $agent->records;
        }
        return $agents;
    }

    public function addAgent(Request $request)
    {
        $request->validate([
            'number' => 'max:10|required',
            'name' => 'max:191|required',
            'language' => 'max:191|required',
            'hourly_rate' => 'max:10',
            'available_hours' => 'max:1500',
            'location' => 'max:191|required',
            'experience' => 'max:1500|required'
        ]);

        if (isset($request->id)) {
            // edit
            $agent = Agent::where('id', $request->id)->first();
        } else {
            // add
            $agent = new Agent;
        }

        $agent->name = $request->name;
        $newNumber = $request->number;
        if ($request->number == '100') {
            // get the last number and add 1
            $newNumber = count(Agent::all()) + 1;
        }
        $agent->number = $newNumber;
        $agent->experience = $request->experience;
        $agent->language = $request->language;
        $agent->hourly_rate = $request->hourly_rate;
        $agent->available_hours = $request->available_hours;
        $agent->location = $request->location;

        if (isset($request->user_id)) {
            $agent->user_id = $request->user_id;
        }

        $agent->save();


        // get user recordings to agents :

        if (isset($request->user_id)) {
            $agent->user_id = $request->user_id;
            $user = User::where('id', $request->user_id)->first();
            $records = $user->recordings;
            foreach ($records as $rec) {
                $record = new Recording;
                $record->title = 'Business agent record';
                $record->agent_id = $agent->id;
                $record->src = $rec->src;
                $record->save();
            }
        }


        return ['id' => $agent->id];

    }

    public function addRecordToAgent(Request $request)
    {
        $record = new Recording;
        $record->title = $request->title;
        $record->agent_id = $request->agent_id;

        if ($request->src) {
            $record->src = $request->src;
        } elseif ($request->audioFile) {
            $pathToAudio = Upload::audio($request->audioFile, 'audioFile', '_160' . $request->agent_id . 'Record_');
            if ($pathToAudio) {
                $record->src = '/' . $pathToAudio;
            }
        }

        $record->save();
        return $record;
    }

    public function deleteAgentRecord(Request $request)
    {
        // delete education history
        $record = Recording::where('id', $request->recordID);
        // delete the audio file
        if (strpos($record->first()->src, 'drive.google.com') !== false) {
            $record->delete();
            return 'Record deleted';
        }
        if (file_exists(substr($record->first()->src, 1))) {
            unlink(substr($record->first()->src, 1));
        }
        $record->delete();
        return 'Record deleted';
    }

    public function deleteAgent(Request $request)
    {
        // delete agent
        $agent = Agent::where('id', $request->agentID);
        $agent->delete();
        return 'Agent deleted';
    }

    public function getAgentRecords($agent_id)
    {
        $agent = Agent::where('id', $agent_id)->first();
        return $agent->records;
    }


    public function getCurrentAgent()
    {
        $user = User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'agent');
        })->where('id', currentAgent()->user_id)->with('agent.shifts', 'userData', 'languages', 'agent.logs.history')->first();
        $results = $user->affiliatesWithTotalSpent($user->myAffiliates());
        $user['affiliates'] = $results['users'];
        $user['total_spent_all'] = $results['total_spent_all'];
        return $user;
    }

    public function getAgentByID($id)
    {
        return Agent::where('id', $id)->with('shifts', 'user.userData', 'logs.history')->first();
    }

    public function createAgent(Request $request)
    {

        $resumeData = json_decode($request->resumeData, true);
        $professionalData = json_decode($request->professionalData, true);
        $personalData = json_decode($request->personalData, true);


        $agent = app(User::class)->createAgent([
            'user' => [
                'email' => $personalData['email'],
                'password' => $request->password,
                'username' => $personalData['email'],
            ],
            'agent' => [
                'available_hours_per_week' => $professionalData['hoursPerWeek'],
                'experience' => $professionalData['sector'],
                'technologies' => implode(',', $professionalData['techs']),
                'hourly_rate' => 5,
                'voice_character' => $professionalData['voice'],
            ],
            'user_data' => [
                'profession_id' => 1, // business-support(1), developer (2), designer (3)
                'currency_id' => 1, // usd
                'timezone' => 1,
                // personal data
                'first_name' => $personalData['name'],
                'last_name' => $personalData['surname'],
                'city' => $personalData['cityName'],
                'phone' => $personalData['phone'],
                'gender' => $personalData['gender'],
                'paypal_acc_number' => $personalData['paypal'],
//                // professional data
                'job_title' => $professionalData['primaryJob'],
            ]
        ]);

        // add languages to agent

        $languageSymbol = $professionalData['lang'];

        $language = Language::where('name', 'english')->first();
        if ($languageSymbol == 'es') {
            $language = Language::where('name', 'spanish')->first();
        }

        // attach user to language
        $language->users()->attach($agent->user_id);


//         upload recording and resume files
        if ($resumeData['typeOfRecording'] === 'file') {
            // upload the recording to our storage
            $pathToAudio = Upload::mainRecording('recordingFile', 'main_record');

            $agent->update([
                'recording' => $pathToAudio,
                'recording_type' => 'file'
            ]);
        }

        if (isset($_FILES['resumeFile'])) {
            // upload the resume to our storage
            $pathToResume = Upload::resume('resumeFile', 'main_resume');

            $agent->update([
                'cv' => $pathToResume,
            ]);
        }


        if (isset($_FILES['profilePicture'])) {
            // upload the resume to our storage
            $pathToPicture = Upload::profilePicture('profilePicture', 'profile_picture');

            $agent->user->userData->update([
                'profile_picture' => $pathToPicture,
            ]);
        }


        if ($resumeData['typeOfRecording'] === 'link') {
            $agent->update([
                'recording' => $resumeData['recordingLink'],
                'recording_type' => 'link'
            ]);
        }


        // login the agent after register
        Auth::loginUsingId($agent->user->id);

        return [
            'user' => $agent->user,
            'status' => 'success'
        ];

    }

    public function editAgentPersonalInfo(Request $request)
    {
        $request->validate([
            'first_name' => 'max:191|required',
            'last_name' => 'max:191|required',
            'password' => 'nullable|min:6|max:191|confirmed',

            'phone' => 'min:7|max:191|required',
            'city' => 'max:191|required',

            'timezone' => 'required|max:191',
            'whatsapp' => 'max:191',
            'telegram' => 'max:191',
            'skype' => 'nullable|max:191',

            'instagram' => 'max:191',
            'linkedin' => 'max:191',
            'github' => 'max:191',
            'website' => 'max:191',
            'facebook' => 'max:191',
        ]);

        $user = currentUser();

        $user->userData->update(
            $request->toArray()
        );

        if (isset($request->password)) {
            $user->update([
                'password' => $request->password
            ]);
        }

        return $user->userData;
    }

    public function editAgentProfessionalInfo(Request $request)
    {
        $request->validate([
            'job_title' => 'max:191|required',
            'voice_character' => 'max:191',
            'experience' => 'max:1500|required',
            'technologies' => 'max:1500|required',
            'available_hours_per_week' => 'max:191|required',
            'language' => 'max:1500',
        ]);

        $user = currentUser();

        $user->userData->update([
            'job_title' => $request->job_title
        ]);


        $user->agent->update([
            'voice_character' => $request->voice_character ?? '',
            'experience' => $request->experience ?? '',
            'technologies' => $request->technologies ?? '',
            'available_hours_per_week' => $request->available_hours_per_week,
        ]);

        if (isset($request->language)) {
            $language = Language::where('name', 'english')->first();
            if ($request->language == 'spanish') {
                $language = Language::where('name', 'spanish')->first();
            }
            // attach language to user
            $user->languages()->sync($language->id);
        }

        return [
            'status' => 'success'
        ];


    }


    public function editAgentMedialInfo(Request $request)
    {

        $user = User::where('id', currentUser()->id)->with('agent', 'userData', 'recordings')->first();

        $errors = [];

        if (isset($_FILES['profile_picture'])) {
            // upload the resume to our storage
            $pathToPicture = Upload::profilePicture('profile_picture', 'profile_picture');
            if (!$pathToPicture) {
                $errors['profile_picture'] = [
                    '0' => 'Error while uploading profile picture.'
                ];
            }
            $user->userData->update([
                'profile_picture' => $pathToPicture,
            ]);
        }

        if (isset($_FILES['cv'])) {
            // upload the resume to our storage
            $pathToResume = Upload::resume('cv', 'main_resume');

            if (!$pathToResume) {
                $errors['cv'] = [
                    '0' => 'Error while uploading file.'
                ];
            }
            $user->agent->update([
                'cv' => $pathToResume,
            ]);
        }

        if (isset($_FILES['file']) && $request->uploadMethod === 'upload') {

            $userRecordings = Recording::where('user_id', currentUser()->id)->get();

            $fname = "Record_" . date(time()) . '.ogg';
            $target_file = "uploads/register_audios/" . $fname;

            if (file_exists($target_file)) {
                unlink($target_file);
            }

            if (!move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
                $errors['audio'] = [
                    '0' => 'Error while uploading file.'
                ];
            } else {

                foreach ($userRecordings as $record) {
                    if (file_exists(public_path() . '/' . $record->src)) {
                        unlink(public_path() . '/' . $record->src);
                    }
                    $record->delete();
                }

                // save record :
                $record = new Recording;
                $record->user_id = currentUser()->id;
                $record->src = '/' . $target_file;
                $record->title = 'Recorded application (record)';
                $record->transcription = '';
                $record->save();
            }
        }


        if ($request->uploadMethod === 'url') {
            // save record :
            $record = new Recording;
            $record->user_id = currentUser()->id;
            $record->src = $request->link;
            $record->title = 'Recorded application (Link)';
            $record->transcription = '';
            $record->save();
        }

        if (count($errors) > 0) {
            return [
                'errors' => $errors
            ];
        }

        $user = User::where('id', currentUser()->id)->with('agent', 'userData', 'recordings')->first();

        return $user;
    }


    public function saveAudioForMedia(Request $request)
    {

        $userRecordings = Recording::where('user_id', currentUser()->id)->get();
        $user = User::where('id', currentUser()->id)->with('agent', 'userData', 'recordings')->first();

        if (isset($_FILES['file']) and !$_FILES['file']['error']) {
            $fname = "Record_" . date(time()) . '.ogg';
            $target_file = "uploads/register_audios/" . $fname;

            if (file_exists($target_file)) {
                unlink($target_file);
            }

            if (!move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
                $errors['audio'] = [
                    '0' => 'Error while uploading file.'
                ];
            } else {

                foreach ($userRecordings as $record) {
                    if (file_exists(public_path() . '/' . $record->src)) {
                        unlink(public_path() . '/' . $record->src);
                    }
                    $record->delete();
                }

                // save record :
                $record = new Recording;
                $record->user_id = currentUser()->id;
                $record->src = '/' . $target_file;
                $record->title = 'Recorded application (record)';
                $record->transcription = '';
                $record->save();
            }
        }


        if (isset($_FILES['profile_picture'])) {
            // upload the resume to our storage
            $pathToPicture = Upload::profilePicture('profile_picture', 'profile_picture');
            if (!$pathToPicture) {
                $errors['profile_picture'] = [
                    '0' => 'Error while uploading profile picture.'
                ];
            }
            $user->userData->update([
                'profile_picture' => $pathToPicture,
            ]);
        }

        if (isset($_FILES['cv'])) {
            // upload the resume to our storage
            $pathToResume = Upload::resume('cv', 'main_resume');

            if (!$pathToResume) {
                $errors['cv'] = [
                    '0' => 'Error while uploading file.'
                ];
            }
            $user->agent->update([
                'cv' => $pathToResume,
            ]);
        }

        return ['status' => 'Success'];

    }


    public function editDeveloperProfessionalInfo(Request $request)
    {

        $request->validate([
            'job_title' => 'max:191|required',
            'available_hours_per_week' => 'max:191|required',
            'hourly_rate' => 'max:191|required',
            'monthly_salary' => 'max:191|required',
            'monthly_salary_part_time' => 'max:191|required',
        ]);

        $user = currentUser();

        $user->userData->update([
            'job_title' => $request->job_title,
        ]);


        $user->agent->update([
            'available_hours_per_week' => $request->available_hours_per_week === 'null' ? 0 : intval($request->available_hours_per_week),
            'monthly_salary' => $request->monthly_salary === 'null' ? 0 : intval($request->monthly_salary),
            'monthly_salary_part_time' => $request->monthly_salary_part_time === 'null' ? 0 : intval($request->monthly_salary_part_time),
            'hourly_rate' => intval($request->hourly_rate)
        ]);


        // make 6 for the developer as main skills :

        $this->createSkills($request, $user);


        return [
            'status' => 'success'
        ];


    }

    protected function createSkills($request, $user)
    {

        if (isset($request->programming_language1)) {
            $skill = new Skill;
            $skill->user_id = $user->id;
            $skill->skill_title = $request->programming_language1;
            $skill->type = 'programming';
            $skill->percentage = 95;
            $skill->save();
        }

        if (isset($request->programming_language2)) {
            $skill = new Skill;
            $skill->user_id = $user->id;
            $skill->skill_title = $request->programming_language2;
            $skill->type = 'programming';
            $skill->percentage = 95;
            $skill->save();
        }

        if (isset($request->framework1)) {
            $skill = new Skill;
            $skill->user_id = $user->id;
            $skill->skill_title = $request->framework1;
            $skill->type = 'frameworks';
            $skill->percentage = 95;
            $skill->save();
        }

        if (isset($request->framework2)) {
            $skill = new Skill;
            $skill->user_id = $user->id;
            $skill->skill_title = $request->framework2;
            $skill->type = 'frameworks';
            $skill->percentage = 95;
            $skill->save();
        }


        if (isset($request->database1)) {
            $skill = new Skill;
            $skill->user_id = $user->id;
            $skill->skill_title = $request->database1;
            $skill->type = 'database';
            $skill->percentage = 95;
            $skill->save();
        }

        if (isset($request->database2)) {
            $skill = new Skill;
            $skill->user_id = $user->id;
            $skill->skill_title = $request->database2;
            $skill->type = 'database';
            $skill->percentage = 95;
            $skill->save();
        }
    }

    public function updateAgent(Request $request)
    {
        $requestArray = $request->toArray();

        $user = User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'agent');
        })->where('id', $request->id)->with('agent')->first();

        if (isset($request->password) && !empty($request->password)) {
            $this->validate($request, [
                'password' => 'confirmed|min:6',
            ]);
        } else {
            // remove password from the request array
            unset($requestArray['password']);
            unset($requestArray['password_confirmation']);
        }

        $user->update(
            $requestArray
        );

        $user->agent->update(
            $requestArray['agent']
        );

        return [
            'user' => $user,
            'status' => 'success',
        ];

    }

}
