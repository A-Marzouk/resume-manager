<?php

namespace App\Http\Controllers;

use App\Mail\agents\MessageOnResume;
use App\ResumeCustom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Agent;
use App\User;
use Illuminate\Support\Facades\Mail;

class ResumeController extends Controller
{
    public function resumeBuilder () {
        return view('resume_builder.index');
    }

    public function downloadPDFResume($username) {
        $freelancer = User::where('username',$username)->with(['userData','skills','agent','worksHistory.projects','references','educationsHistory','projects'=>function($query) {
            return $query->limit(10);
        }])->where('username',$username)->first();

        if ($freelancer) {

            $view = \View::make('freelancer.resume_pdf', compact('freelancer'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);
            ob_end_clean();
            // dd($freelancer);
            return $pdf->stream($freelancer->userData['first_name'].' '.$freelancer->userData['last_name'].'.pdf');
            // return view('freelancer.resume_pdf', compact('freelancer'));
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

        $freelancer = User::with(['userData','agent.customResume', 'agent.socials','agent.resumeTabs','skills','recordings','worksHistory.projects','references','educationsHistory','projects'=>function($query) {
            return $query->limit(10);
        }])->where('username',$username)->first();

        if (!$freelancer->agent->customResume) {
            ResumeCustom::insert([
                [
                    'agent_id' => $freelancer->agent->id,
                    'background_color' => '#4E75E8',
                ],
            ]);
        }

        return view('freelancerResume.resumeLongV2', compact('freelancer'));
        
    }

    public function agentsResumeTheme2($username) {

        $freelancer = User::with(['userData','agent.customResume', 'agent.socials','agent.resumeTabs','skills','recordings','worksHistory.projects','references','educationsHistory','projects'=>function($query) {
            return $query->limit(10);
        }])->where('username',$username)->first();

        if (!$freelancer->agent->customResume) {
            ResumeCustom::insert([
                [
                    'agent_id' => $freelancer->agent->id,
                    'background_color' => '#4E75E8',
                ],
            ]);
        }

        return view('resume_themes.theme2', compact('freelancer'));

    }

    public function agentsResumeTheme4($username) {

        $freelancer = User::with(['userData','agent.customResume', 'agent.socials','agent.resumeTabs','skills','recordings','worksHistory.projects','references','educationsHistory','projects'=>function($query) {
            return $query->limit(10);
        }])->where('username',$username)->first();

        if (!$freelancer->agent->customResume) {
            ResumeCustom::insert([
                [
                    'agent_id' => $freelancer->agent->id,
                    'background_color' => '#4E75E8',
                ],
            ]);
        }

        return view('resume_themes.theme4', compact('freelancer'));

    }

    public function agentsResumeTheme5($username) {

        $freelancer = User::with(['userData','agent.customResume', 'agent.socials','agent.resumeTabs','skills','recordings','worksHistory.projects','references','educationsHistory','projects'=>function($query) {
            return $query->limit(10);
        }])->where('username',$username)->first();

        if (!$freelancer->agent->customResume) {
            ResumeCustom::insert([
                [
                    'agent_id' => $freelancer->agent->id,
                    'background_color' => '#4E75E8',
                ],
            ]);
        }

        return view('resume_themes.theme5', compact('freelancer'));

    }

    public function agentsResumeTheme3($username) {

        $freelancer = User::with(['userData','agent.customResume', 'agent.socials','agent.resumeTabs','skills','recordings','worksHistory.projects','references','educationsHistory','projects'=>function($query) {
            return $query->limit(10);
        }])->where('username',$username)->first();

        if (!$freelancer->agent->customResume) {
            ResumeCustom::insert([
                [
                    'agent_id' => $freelancer->agent->id,
                    'background_color' => '#4E75E8',
                ],
            ]);
        }

        return view('resume_themes.theme3', compact('freelancer'));

    }

    public function agentsTestResume($username) {

        $freelancer = User::where('username',$username)->with(['userData','skills','agent','worksHistory.projects','references','educationsHistory','projects'=>function($query) {
            return $query->limit(10);
        }])->where('username',$username)->first();


        // dd($freelancer->toJson());
        return view('freelancerResume.resumeTest', compact('freelancer'));
        
    }


    public function messageOnResume(Request $request){
        // validate request :
        $request->validate([
            'agent_id'=> 'required',
            'full_name' => 'max:190|required',
            'email' => 'email|max:190|required',
            'title' => 'max:190|required',
            'message' => 'max:2500|required',
        ]);


        $agent = Agent::where('id',$request->agent_id)->first();
        $form_data = $request;
        Mail::send(new MessageOnResume($form_data, $agent));
    }
}
