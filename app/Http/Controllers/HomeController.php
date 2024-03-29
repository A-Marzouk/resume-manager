<?php

namespace App\Http\Controllers;


use App\ClientSearch;
use App\User;
use App\UserData;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('searchPage','privacyView','getSearch','termsView','welcomePage','ResumePage','ResumePageV2','ResumePageShortV2','ResumeSample','newHome','fosterCareForm');
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


    public function ResumePageV2($username){
        $freelancer = User::with(['userData','skills','worksHistory.projects','references','educationsHistory','projects'=>function($query) {
            return $query->limit(10);
        }])->where('username',$username)->first();
        return view('freelancerResume.resumeLongV2', compact('freelancer'));
    }

    public function ResumePageShortV2($username){
        $freelancer = User::with(['userData','skills','worksHistory.projects','references','educationsHistory','projects'=>function($query) {
            return $query->limit(10);
        }])->where('username',$username)->first();
        return view('freelancerResume.resumeShortV2', compact('freelancer'));
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
            $homeFreelancers[] = User::with(['userData','projects'=>function($query) {
                return $query->limit(5);
            }])->where('id',$data->user_id)->first();
        }
        return view('welcome',compact('homeFreelancers'));
    }

    public function newHome(){
        // homepage freelancers
        $homeFreelancersData = UserData::where('home_page_freelancer',true)->get();
        $featuredDesigners = [] ;
        $featuredDevelopers = [] ;

        foreach ($homeFreelancersData as $data){
            $freelancer = User::with(['userData','skills','worksHistory.projects','educationsHistory','projects'=>function($query) {
                return $query->limit(10);
            }])->where('id',$data->user_id)->first();

            if($freelancer->profession === 'Developer'){
                $featuredDevelopers[] = $freelancer ;
            }elseif($freelancer->profession === 'Designer'){
                $featuredDesigners[]  = $freelancer ;
            }
        }


        return view('new_home_page',compact('featuredDevelopers','featuredDesigners'));
    }

    public function resizeHomePageProjectImages(){
        $homeFreelancersData = UserData::where('home_page_freelancer',true)->get();
        $homeFreelancers = [] ;
        foreach ($homeFreelancersData as $data){
            $homeFreelancers[] = User::with(['projects'=>function($query) {
                return $query->limit(5);
            }])->where('id',$data->user_id)->first();
        }

        foreach ($homeFreelancers as $freelancer){
            // resize home page freelancer project images before showing them:
              $this->resizeProjectImages($freelancer->projects);
        }
    }

    protected function resizeProjectImages($projects){
        foreach ($projects as $project){
            if(!$this->image_exists($project->mainImage) || $this->image_resized_exists($project->mainImage) ){
                continue;
            }
            $img = Image::make($this->getImageSrc($project->mainImage));
            $img->resize(225, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $imageName = str_replace("uploads/","",$this->getImageSrc($project->mainImage));
            $img->save('uploads/resized-images/'.$imageName);
        }
    }

    protected function getImageSrc($src){
        if($src[0] == '/'){
            $src = substr($src, 1);
        }
        return  $src;
    }

    protected function image_resized_exists($src){
        $imageName = str_replace("uploads/","",$this->getImageSrc($src));
        if(!file_exists('uploads/resized-images/'.$imageName)){
            return false ;
        }
        return true;
    }

    protected function image_exists($src){
        if(!file_exists($this->getImageSrc($src))){
            return false ;
        }
        return true;
    }

    public function searchPage(){
        return view('search_page');
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
