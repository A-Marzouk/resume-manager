<?php

namespace App\Http\Controllers;

use App\Recording;
use App\User;
use App\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BusinessSupportController extends Controller
{

    public function __construct()
    {
    }

    public function showRegistrationForm(){
        return view('auth.business_support.register');
    }

    public function saveAudioForRegister(Request $request){
        $id = $this->register($request);

        if(isset($_FILES['file']) and !$_FILES['file']['error']){
            $fname = "Record_".date(time()).'.ogg';
            $target_file = "resumeApp/uploads/register_audios/" . $fname ;

            if (file_exists($target_file)) {
                unlink($target_file);
            }

            move_uploaded_file($_FILES['file']['tmp_name'], $target_file);

            // save record :
            $record = new Recording;
            $record->user_id = $id;
            $record->src = '/'.$target_file;
            $record->title = 'Recorded business application';
            $record->transcription = '';

            $record->save();

            return ['status' => 'Success'];
        }

    }

    public function validateForm(Request $request){
        $validator = $this->validator($request->all());
        if ($validator->fails())
        {
            return  ['errors' => $validator->errors()];
        }else{
            return 'success';
        }

    }

    public function register(Request $request){
        // validate data
        $validator = $this->validator($request->all());
        if ($validator->fails())
        {
            return  ['errors' => $validator->errors()];
        }

        // register a business support user

        $businessSupport = $this->create($request->all());

        if ($businessSupport->id && $request->audioType !== 'record'){
            // save the record
            $recordSaver = new RecordingsController;
            $recordSaver->addRecord($request,$businessSupport->id);
            return 'success';
        }else{
            return $businessSupport->id ;
        }

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstName' => 'required|string|max:191|min:3',
            'lastName' => 'required|string|max:191|min:3',
            'email' => 'required|string|email|max:191|unique:users',
            'phone' => 'required|max:191|min:7',
            'whatsapp' => 'max:191',
            'skype' => 'max:191|alpha_dash|unique:users'
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
            'profession' =>'businessSupport',
            'password' => Hash::make($data['email']),
        ]);


        $businessSupport = User::where('email',$data['email'])->first();
        $data['id']      = $businessSupport->id;
        // send notification of registered client :
        $notification = new NotificationsController();
        $notification->businessSupportApplication($data);


        return $businessSupport;

    }

    public function applicationSuccess(){
        return view('business_application_received');
    }

}
