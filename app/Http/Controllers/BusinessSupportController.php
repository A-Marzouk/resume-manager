<?php

namespace App\Http\Controllers;

use App\classes\Upload;
use App\Recording;
use App\Skill;
use App\User;
use App\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BusinessSupportController extends Controller
{

    public function __construct()
    {
    }

    public function showRegistrationForm()
    {
        if (!auth()->guest()) {
            return redirect('/freelancer');
        }
        return view('auth.business_support.register');
    }

    public function saveAudioForRegister(Request $request)
    {
        $id = $this->register($request);

        if (isset($_FILES['file']) and !$_FILES['file']['error']) {
            $fname = "Record_" . date(time()) . '.ogg';
            $target_file = "uploads/register_audios/" . $fname;

            if (file_exists($target_file)) {
                unlink($target_file);
            }

            move_uploaded_file($_FILES['file']['tmp_name'], $target_file);

            // save record :
            $record = new Recording;
            $record->user_id = $id;
            $record->src = '/' . $target_file;
            $record->title = 'Recorded business application (record)';
            $record->transcription = '';

            $record->save();

            // check if cv is uploaded
            if ($request->cv_included == 'true' && isset($request->included_cv)) {
                // upload the cv file :
                $result = Upload::CV('', 'included_cv', $id . '_' . date(time()));
                if ($result !== false) {
                    $user = User::where('id', $id)->first();
                    $user->cv_src = $result['path'];
                    $user->save();
                }
            }

            $data = $request->all();
            $data['id'] = $id;
            $notification = new NotificationsController();
            $notification->businessSupportApplication($data);


            return ['status' => 'Success'];
        }

    }

    public function validateForm(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        } else {
            return 'success';
        }

    }

    public function validateDeveloperForm(Request $request)
    {
        $validator = $this->developerRegisterValidator($request->all());
        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        } else {
            return 'success';
        }

    }

    public function register(Request $request)
    {
        // validate data
        if ($request->audioType == 'uploaded' && isset($request->audioFile)) {
            // validate audio upload.
            $canUpload = Upload::checkAudio($request->audioFile, 'audioFile', '');
            if (!$canUpload) {
                return ['errors' => [
                    'audioError' => 'Error while uploading audio'
                ]];
            }
        }
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        // register a business support user

        $businessSupport = $this->create($request->all());

        if ($businessSupport->id && $request->audioType !== 'record') {
            // save the record
            $recordSaver = new RecordingsController;
            $recordSaver->addRecord($request, $businessSupport->id);

            // check if cv is uploaded
            if ($request->cv_included && isset($request->included_cv)) {
                // upload the cv file :
                $result = Upload::CV('', 'included_cv', $businessSupport->id . '_' . date(time()));
                if ($result !== false) {
                    $user = User::where('id', $businessSupport->id)->first();
                    $user->cv_src = $result['path'];
                    $user->save();
                }
            }


            $data = $request->all();
            $data['id'] = $businessSupport->id;
            $notification = new NotificationsController();
            $notification->businessSupportApplication($data);


            return 'success';
        } else {
            return $businessSupport->id;
        }

    }

    public function registerDeveloper(Request $request)
    {
        // validate data
        if ($request->audioType == 'uploaded' && isset($request->audioFile)) {
            // validate audio upload.
            $canUpload = Upload::checkAudio($request->audioFile, 'audioFile', '');
            if (!$canUpload) {
                return ['errors' => [
                    'audioError' => 'Error while uploading audio'
                ]];
            }
        }
        $validator = $this->developerRegisterValidator($request->all());
        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        // register a developer

        $developer = $this->createDeveloper($request->all());

        if ($developer->id && $request->audioType !== 'record') {
            // save the record
            $recordSaver = new RecordingsController;
            $recordSaver->addRecord($request, $developer->id);

            // check if cv is uploaded
            if ($request->cv_included && isset($request->included_cv)) {
                // upload the cv file :
                $result = Upload::CV('', 'included_cv', $developer->id . '_' . date(time()));
                if ($result !== false) {
                    $user = User::where('id', $developer->id)->first();
                    $user->cv_src = $result['path'];
                    $user->save();
                }
            }


            $data = $request->all();
            $data['id'] = $developer->id;
            $notification = new NotificationsController();
            $notification->businessSupportApplication($data);


            // login user
            Auth::loginUsingId($developer->id);

            return 'success';
        } else {
            return $developer->id;
        }

    }

    protected function developerRegisterValidator(array $data)
    {
        return Validator::make($data, [
            'firstName' => 'required|string|max:191|min:3',
            'lastName' => 'required|string|max:191|min:3',
            'email' => 'required|string|email|max:191|unique:users',
            'phone' => 'required|max:191|min:7',
            'whatsapp' => 'max:191',
            'skype' => 'nullable|max:191|unique:users',
            'password' => 'required|max:191|min:6|confirmed',

            'programming_language' => 'max:191|required',
            'framework' => 'max:191|required',
            'database' => 'max:191|required',

            'instagram' => 'max:191',
            'linkedin' => 'max:191',
            'github' => 'max:191',


            'hourly_rate' => 'max:191|required',
            'available_hours' => 'max:191|required',
            'monthly_rate' => 'max:191|required',

        ]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstName' => 'required|string|max:191|min:3',
            'lastName' => 'required|string|max:191|min:3',
            'email' => 'required|string|email|max:191|unique:users',
            'phone' => 'required|max:191|min:7',
            'whatsapp' => 'max:191',
            'skype' => 'max:191|unique:users'
        ]);
    }

    protected function create(array $data)
    {
        User::create([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'email' => $data['email'],
            'username' => $data['email'],
            'phone' => $data['phone'],
            'whatsapp' => $data['whatsapp'],
            'skype' => $data['skype'],
            'profession' => 'businessSupport',
            'password' => Hash::make($data['email']),
        ]);


        $businessSupport = User::where('email', $data['email'])->first();

        if (!isset($businessSupport->userData)) {
            $userData = new UserData;
            $userData->user_id = $businessSupport->id;
            $userData->save();
        }

        return $businessSupport;

    }

    protected function createDeveloper(array $data)
    {
        User::create([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'email' => $data['email'],
            'username' => $data['email'],
            'phone' => $data['phone'],
            'whatsapp' => $data['phone'],
            'skype' => $data['skype'],
            'profession' => 'Developer',
            'password' => Hash::make($data['password']),
        ]);


        $developer = User::where('email', $data['email'])->first();

        if (!isset($developer->userData)) {
            $userData = new UserData;
            $userData->user_id = $developer->id;
            $userData->availableHours = $data['available_hours'];
            $userData->salary_month = $data['monthly_rate'];
            $userData->salary = $data['hourly_rate'];
            $userData->githubLink = $data['github'];
            $userData->instagramLink = $data['instagram'];
            $userData->linkedin = $data['linkedin'];
            $userData->telegram = $data['phone'];
            $userData->save();
        }

        // make 3 for the developer as main skills :

        $skill = new Skill;
        $skill->user_id = $developer->id;
        $skill->skill_title =$data['programming_language'];
        $skill->type = 'programming';
        $skill->percentage = 95;
        $skill->save();

        $skill = new Skill;
        $skill->user_id = $developer->id;
        $skill->skill_title =$data['framework'];
        $skill->type = 'frameworks';
        $skill->percentage = 95;
        $skill->save();

        $skill = new Skill;
        $skill->user_id = $developer->id;
        $skill->skill_title =$data['database'];
        $skill->type = 'frameworks';
        $skill->percentage = 95;
        $skill->save();

        return $developer;
    }


    public function applicationSuccess()
    {
        return view('business_application_received');
    }

    public function updateBusinessUserStatus(Request $request)
    {
        $user_id = $request->userID;
        $status = $request->status;

        $businessUser = User::where('id', $user_id)->first();
        $businessUser->status = $status;
        $businessUser->save();

        return ['status' => 'updated', 'color' => $status];
    }

    public function updateBusinessUserStage(Request $request)
    {
        $user_id = $request->userID;
        $stage = $request->stage;

        $businessUser = User::where('id', $user_id)->first();
        $businessUser->stage = $stage;
        $businessUser->save();

        // sent related stage email.

        return ['status' => 'updated', 'stage' => $stage];
    }

    public function updateBusinessShadedStatus(Request $request)
    {
        $user_id = $request->userID;

        $businessUser = User::where('id', $user_id)->first();
        $businessUser->is_shaded = 'NOT_SHADED';
        $businessUser->save();

        return ['status' => 'updated'];
    }
}
