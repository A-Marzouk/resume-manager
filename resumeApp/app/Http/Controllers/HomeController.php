<?php

namespace App\Http\Controllers;


use App\ClientSearch;
use App\User;
use App\UserData;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('privacyView','getSearch','termsView','welcomePage','ResumePage','ResumeSample','newHome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function ResumePage($username){
        $user1 =  User::where('username',$username)->first();
        if($user1 !== null){
            $profession = $user1->profession;
            $user = $user1->userData;
            $user->username = $user1->username;
        }else{
            return redirect('/');
        }
        $primarySkills = explode(',',$user->primarySkills);
        $charSkills = explode(',',$user->charSkills);


        if ($user->short_resume == 1) {
            return view('custom_resume.resume_custom_conor', compact('user','profession','primarySkills','charSkills','user1'));
        } else{
            return view('resume', compact('user','profession','primarySkills','charSkills','user1'));
        }
    }

    public function ResumeSample($username){
        $user1 =  User::where('username',$username)->first();
        if($user1 !== null){
            $profession = $user1->profession;
            $user = $user1->userData;
            $user->username = $user1->username;
        }else{
            return redirect('/');
        }
        $primarySkills = explode(',',$user->primarySkills);
        $charSkills = explode(',',$user->charSkills);
        return view('resume_sample', compact('user','profession','primarySkills','charSkills','user1'));
    }

    public function welcomePage(){
        // homepage freelancers
        $homeFreelancersData = UserData::where('home_page_freelancer',true)->get();
        $homeFreelancers = [];
        foreach ($homeFreelancersData as $data){
            $homeFreelancers[] = $data->user;
        }
        return view('welcome',compact('homeFreelancers'));
    }

    public function newHome(){
        return view('new_home_page');
    }

    public function termsView(){
        return view('terms');
    }

    public function privacyView(){
        return view('privacy');
    }

    public function getSearch($search_id){
        $freelancers = [];
        $search = ClientSearch::where('id',$search_id)->first();

        if($search){
            $search_name = $search->name;
            $freelancers_id = $search->freelancers_id;
            $freelancers=[];
            foreach (explode(',',$freelancers_id) as $id){
                $freelancers[] = User::where('id',$id)->first();
            }
        }

        return view('public_search',compact('freelancers','search_name'));
    }

}
