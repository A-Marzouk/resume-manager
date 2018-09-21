<?php

namespace App\Http\Controllers;


use App\ClientSearch;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('privacyView','getSearch','termsView','welcomePage','ResumePage');
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
        return view('resume', compact('user','profession','primarySkills','charSkills','user1'));
    }

    public function welcomePage(){
        return view('welcome');
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
