<?php

namespace App\Http\Controllers;

use App\ClientSearch;
use App\PromotedUser;
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
        $this->middleware('auth')->except('privacyView', 'getSearch', 'termsView', 'welcomePage', 'ResumePage', 'ResumeSample',
        'homeDesigners');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function ResumePage($username)
    {
        $user1 = User::where('username', $username)->first();
        if ($user1 !== null) {
            $profession = $user1->profession;
            $user = $user1->userData;
            $user->username = $user1->username;
        } else {
            return redirect('/');
        }
        $primarySkills = explode(',', $user->primarySkills);
        $charSkills = explode(',', $user->charSkills);
        return view('resume', compact('user', 'profession', 'primarySkills', 'charSkills', 'user1'));
    }

    public function ResumeSample($username)
    {
        $user1 = User::where('username', $username)->first();
        if ($user1 !== null) {
            $profession = $user1->profession;
            $user = $user1->userData;
            $user->username = $user1->username;
        } else {
            return redirect('/');
        }
        $primarySkills = explode(',', $user->primarySkills);
        $charSkills = explode(',', $user->charSkills);
        return view('resume_sample', compact('user', 'profession', 'primarySkills', 'charSkills', 'user1'));
    }

    public function welcomePage()
    {
        // homepage freelancers
        $promotedUsers = PromotedUser::with('user')->get();
        $homeFreelancers = $promotedUsers->transform(function ($promotedUser) {
            return $promotedUser->user;
        });

        return view('welcome', compact('homeFreelancers'));
    }

    public function termsView()
    {
        return view('terms');
    }

    public function privacyView()
    {
        return view('privacy');
    }

    public function getSearch($search_id)
    {
        $freelancers = [];
        $search = ClientSearch::where('id', $search_id)->first();

        if ($search) {
            $search_name = $search->name;
            $freelancers_id = $search->freelancers_id;
            $freelancers = [];
            foreach (explode(',', $freelancers_id) as $id) {
                $freelancers[] = User::where('id', $id)->first();
            }
        }

        return view('public_search', compact('freelancers', 'search_name'));
    }

    public function homeDesigners () {
        // homepage freelancers
        // $promotedUsers = array();
        // $promotedUsers = PromotedUser::with('user')->get();
        // $homeFreelancers = $promotedUsers->transform(function ($promotedUser) {
        //     return $promotedUser->user;
        // });

        $agents = array();

        $user1 = [
            "firstName" => 'Jose',
            "lastName" => 'Quintero',
            "id" => 1,
            "photo" => '/images/home/profile1.png',
            "jobTitle" => 'Fullstack Developer',
            "salary" => 15,
            "availableHours" => 40,
        ];
        
        $user2 = [
            "firstName" => 'Ahmed',
            "lastName" => 'Marzouk',
            "id" => 1,
            "photo" => '/images/home/profile1.png',
            "jobTitle" => 'Web developer',
            "salary" => 30,
            "availableHours" => 40,
        ];
        
        $user3 = [
            "firstName" => 'Francisco',
            "lastName" => 'Daniel',
            "id" => 3,
            "photo" => '/images/home/profile1.png',
            "jobTitle" => 'Web developer',
            "salary" => 25,
            "availableHours" => 40,
        ];
        
        $user4 = [
            "firstName" => 'John',
            "lastName" => 'Doe',
            "id" => 4,
            "photo" => '/images/home/profile1.png',
            "jobTitle" => 'Team manager',
            "salary" => 50,
            "availableHours" => 40,
        ];

        // $userDatas = UserData::where($searchArray)->get();

        // // $freelancers = $this->getFilteredFreelancers($userDatas);

        // $dataForFreelancerCard = [] ;
        // // make a freelancer array with only the needed data for vue js :
        // $i=0;
        // foreach ($userDatas as $freelancer){
        //     $dataForFreelancerCard[$i] =[
        //         'id'=>$freelancer->user_id,
        //         'photo'=>$freelancer->avatar,
        //         'firstName'=>$freelancer->first_name,
        //         'lastName'=>$freelancer->last_name,
        //         'jobTitle'=>$freelancer->job_title,
        //         'salary'=>$freelancer->hourly_rate,
        //         'availableHours'=>$freelancer->available_hours_per_week,
        //     ];
        //     $i++;
        // }

        // // I need get this data of the users

        // // jobTitle: '',
        // // rate: '',
        // // availability: '',
        // // country: ''<

        // return $dataForFreelancerCard;

        array_push($agents, $user1, $user2, $user3, $user4);

        return view('home_designers', ['agents' => $agents]);
    }

}
