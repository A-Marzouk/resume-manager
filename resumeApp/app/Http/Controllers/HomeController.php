<?php

namespace App\Http\Controllers;

use App\User;
use App\UserData;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('welcomePage','ResumePage');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function ResumePage($username){
        $user =  User::where('username',$username)->first();
        if($user !== null){
            $user = $user->userData;
        }else{
            return redirect('/');
        }
        $education = $this->parseData($user,'education');
        $trainings = $this->parseData($user,'trainings');
        $primarySkills = explode(',',$user->primarySkills);
        $charSkills = explode(',',$user->charSkills);
        return view('resume', compact('user','education','trainings','primarySkills','charSkills'));
    }

    protected function parseData($user,$data){
        $education = $user->{$data};
        if(empty($education)){
            return;
        }
        $mainLevels = explode(',',$education);
        foreach($mainLevels as $level){
            $outputs              = explode(':',$level);
            if(count($outputs)< 3){continue;}
            $edu['title'][]       = trim(explode('description',$outputs[1])[0]) ?? '';
            $edu['description'][] = trim(explode('year',$outputs[2])[0]) ?? '';
            $edu['year'][]        = trim($outputs[3]) ?? '';
        }
        return $edu;
    }

    public function welcomePage(){
        return view('welcome');
    }
}
