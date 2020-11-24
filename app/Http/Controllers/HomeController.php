<?php

namespace App\Http\Controllers;

use App\Search;
use App\PromotedUser;
use App\User;
use App\UserData;
use App\Agent;

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
        'homeDesigners','ResumePageV2','ResumePageShortV2', 'homepage_blueprint');
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




    public function ResumePageV2($username){
        $freelancer = User::with(['userData','skills','agent','worksHistory.projects','references','educationsHistory','projects'=>function($query) {
            return $query->limit(10);
        }])->where('username',$username)->first();
        return view('freelancerResume.resumeLongV2', compact('freelancer'));
    }

    public function ResumePageShortV2($username){
        $freelancer = User::with(['userData','skills','agent','worksHistory.projects','references','educationsHistory','projects'=>function($query) {
            return $query->limit(10);
        }])->where('username',$username)->first();
        return view('freelancerResume.resumeShortV2', compact('freelancer'));
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
//        $promotedUsers = PromotedUser::with('user')->get();
//        $homeFreelancers = $promotedUsers->transform(function ($promotedUser) {
//            return $promotedUser->user;
//        });


        return view('welcome_landing');
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
        $search = Search::where('id', $search_id)->first();

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

        $agents = [];
        $result = UserData::whereIn('job_title', [
            'UX/UI designer',
            'Illustrator',
            'Motion designer',
            'Digital artist'
        ])->get();

        foreach ($result as $user_data) {
            array_push($agents, [
                'firstName' => $user_data->first_name,
                'lastName' => $user_data->last_name,
                'job_title' => $user_data->job_title,
                'country' => $user_data->country,
                'availableHours' => $user_data->available_hours_per_week,
                'salary' => $user_data->user->agent->hourly_rate
            ]);
        }
        
        // dd($agents);

        return view('home_designers', ['agents' => $agents]);
    }

    public function oldHomepageBluePrint()
    {
        return view('homepage_blueprint');
    }

}
