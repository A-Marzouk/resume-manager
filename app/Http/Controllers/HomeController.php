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

        $user1 = new User();
        $user1->firstName = 'Jose';
        $user1->lastName = 'Quintero';
        $user1->id = 1;
        $user1->userData = new UserData();
        $user1->userData->photoSrc = '/images/home/user.png';
        $user1->userData->jobTitle = 'Web developer';
        $user1->userData->salary = 20;
        $user1->userData->availableHours = 40;

        $user2 = new User();
        $user2->firstName = 'Ahmed';
        $user2->lastName = 'Marzouk';
        $user2->id = 2;
        $user2->userData = new UserData();
        $user2->userData->photoSrc = '/images/home/user.png';
        $user2->userData->jobTitle = 'Fullstack Developer';
        $user2->userData->salary = 40;
        $user2->userData->availableHours = 40;

        array_push($agents, $user1, $user2, $user1, $user2);

        return view('home_designers', ['agents' => $agents]);
    }

}
