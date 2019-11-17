<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 11/17/2019
 * Time: 2:30 AM
 */

namespace App\Http\Controllers;


use App\Agent;
use App\classes\Upload;
use App\Skill;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class DevelopersController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function developerForm()
    {
        return view('auth.developer-register');
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


    protected function developerRegisterValidator(array $data)
    {
        return Validator::make($data, [
            'firstName' => 'required|string|max:191|min:3',
            'lastName' => 'required|string|max:191|min:3',
            'email' => 'required|string|email|max:191|unique:users',
            'phone' => 'required|max:191|min:7',
            'whatsapp' => 'max:191',
            'skype' => 'nullable|max:191',
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
                    $agent = Agent::where('user_id', $developer->id)->first();
                    $agent->cv = $result['path'];
                    $agent->save();
                }
            }


            $data = $request->all();
            $data['id'] = $developer->id;

            // login user
            Auth::loginUsingId($developer->id);

            return 'success';
        } else {
            return $developer->id;
        }

    }


    protected function createDeveloper(array $data)
    {
        $developer = app(User::class)->createAgent([
            'user' => [
                'email' => $data['email'],
                'password' => $data['password'],
                'username' => $data['email'],
            ],
            'agent' => [
                'available_hours_per_week' => $data['available_hours'],
                'hourly_rate' => $data['hourly_rate'],
            ],
            'user_data' => [
                'profession_id' => 2, // business-support(1), developer (2), designer (3)
                'currency_id' => 1, // usd
                'timezone' => 1,
                // personal data
                'first_name' => $data['firstName'],
                'last_name' => $data['lastName'],
                'city' => '',
                'phone' => $data['phone'],
                'skype' => $data['skype'],
                'telegram' => $data['phone'],
                'linkedin' => $data['linkedin'],
                'github' => $data['github'],
                'monthly_salary' => $data['monthly_rate'],
                'instagram' => $data['instagram'],
//                // professional data
                'job_title' => $data['programming_language'] . ' Developer',
            ]
        ]);

        $developer = User::where('email', $data['email'])->first();


        // make 3 for the developer as main skills :

        $skill = new Skill;
        $skill->user_id = $developer->id;
        $skill->skill_title = $data['programming_language'];
        $skill->type = 'programming';
        $skill->percentage = 95;
        $skill->save();

        $skill = new Skill;
        $skill->user_id = $developer->id;
        $skill->skill_title = $data['framework'];
        $skill->type = 'frameworks';
        $skill->percentage = 95;
        $skill->save();

        $skill = new Skill;
        $skill->user_id = $developer->id;
        $skill->skill_title = $data['database'];
        $skill->type = 'frameworks';
        $skill->percentage = 95;
        $skill->save();


        return $developer;
    }

}
