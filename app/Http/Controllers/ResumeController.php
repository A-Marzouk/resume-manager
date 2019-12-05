<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Agent;
use App\User;

class ResumeController extends Controller
{
    public function downloadPDFResume($username) {
        $freelancer = User::where('username',$username)->with(['userData','skills','agent','worksHistory.projects','references','educationsHistory','projects'=>function($query) {
            return $query->limit(10);
        }])->where('username',$username)->first();
        dd($freelancer);

        if ($freelancer) {

            $view = \View::make('freelancer.resume_pdf', compact('freelancer'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);
            // return $pdf->stream($freelancer->userData['first_name'].' '.$freelancer->userData['last_name'].'.pdf');
        }
    }

    public function getAgentData ($username) {

        $user = User::where('username', $username)->get();
        $agent = Agent::where('user_id', $user[0]->id)->get();
        
        if (!empty($agent)) {
            // The user is an agent

            // Educations history
            $educationsHistory = $user[0]->educationsHistory;
            $user_data = $user[0]->userData;
            $worksHistory = $user[0]->worksHistory;
            $skills = $user[0]->skills;

            // dd($user_data);

            return array(
                "username" => $username,
                "agent" => $agent[0],
                "user" => $user[0],
                "user_data" => $user_data,
                "skills" => $skills,
                "worksHistory" => $worksHistory,
                "educationsHistory" => $educationsHistory
            );
        }

        return false;
    }

    public function agentsResume($username) {

        $freelancer = User::where('username',$username)->with(['userData','skills','agent','worksHistory.projects','references','educationsHistory','projects'=>function($query) {
            return $query->limit(10);
        }])->where('username',$username)->first();
        return view('freelancerResume.resumeLongV2', compact('freelancer'));
        
    }

    public function agentsTestResume($username) {

        $freelancer = User::where('username',$username)->with(['userData','skills','agent','worksHistory.projects','references','educationsHistory','projects'=>function($query) {
            return $query->limit(10);
        }])->where('username',$username)->first();
        return view('freelancerResume.resumeTest', compact('freelancer'));
        
    }
}
