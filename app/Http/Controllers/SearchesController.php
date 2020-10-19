<?php

namespace App\Http\Controllers;


use App\Client;
use App\ClientSearch;
use App\Skill;
use App\User;
use App\UserData;
use Illuminate\Http\Request;


class SearchesController extends Controller
{

    public function showSearchPage(){
        if(auth()->user()){
            if(auth()->user()->admin){
                return view('admin.search');
            }
        }
        return redirect()->back();
    }


    public function searchDesigners(Request $request){
        $searchArray = [] ;
        $userDatas   = [] ;

        // jobTitle :
        if(isset($request->jobTitle)){
            // save filter in session :

            $jobTitleInput = $request->jobTitle ;
            $jobTitleArr   = explode(' ',$jobTitleInput);
            foreach ($jobTitleArr as $jobTitleWord){
                $searchArray [] = ['jobTitle','like','%'.$jobTitleWord.'%'] ;
            }
        }

        // country :
        if(isset($request->country)){
            // save filter in session :
            $searchArray[] = ['country','like','%'.$request->country.'%'];
        }


        // available_hours :
        if(isset($request->available_hours)){
            // save filter in session :
            $searchArray[] = ['availableHours','>=',intval($request->available_hours)];
        }

        // salary_hour :
        if(isset($request->salary_hour)){
            // save filter in session :
            $searchArray[] = ['salary','<=',intval($request->salary_hour)];
            $searchArray[] = ['salary','!=',0];
        }

        // form the where array :

        $userDatas[]    = UserData::where($searchArray)->get();
        return $freelancers = array_slice($this->getFilteredDesigners($userDatas), 0, 10);

    }
    public function getFilteredDesigners($userDatas){
        $freelancers = [] ;
        foreach ($userDatas as $userData){
            foreach ($userData as $data){
                $freelancer = User::with('userData','projects','skills','worksHistory','educationsHistory')->where([
                    ['id','=',$data->user_id],
                    ['profession','=','Designer']
                ])->first();
                if(!empty($freelancer)){
                    $freelancers[] = $freelancer ;
                }
            }
        }

        return array_unique($freelancers);
    }


    public function searchDevelopers(Request $request){
        $searchArray = [] ;
        $userDatas   = [] ;


        // country :
        if(isset($request->country)){
            // save filter in session :
            $searchArray[] = ['country','like','%'.$request->country.'%'];
        }

        // available_hours :
        if(isset($request->available_hours)){
            // save filter in session :
            $searchArray[] = ['availableHours','>=',intval($request->available_hours)];
        }


        // form the where array :

        $userDatas[]    = UserData::where($searchArray)->get();
        $freelancers    = $this->getFilteredDevelopers($userDatas);

        // search skills:

        if(isset($request->skills) && !empty($request->skills)){
            $result  = [] ;
            foreach ($freelancers as $freelancer){
                $skills = strtolower(implode(' ',Skill::where('user_id', $freelancer->id)->pluck('skill_title')->toArray()));
                $contains = str_contains($skills, $this->multiExplode([' ',',','-'],strtolower($request->skills)));
                if($contains){
                    $result[] = $freelancer;
                }
            }

            return array_slice($result,0,10) ;
        }


        return array_slice($freelancers,0,10) ;
    }
    private function multiExplode($delimiters,$string) {
        return explode($delimiters[0],strtr($string,array_combine(array_slice($delimiters,1),array_fill(0,count($delimiters)-1,array_shift($delimiters)))));
    }
    public function getFilteredDevelopers($userDatas){
        $freelancers = [] ;
        foreach ($userDatas as $userData){
            foreach ($userData as $data){
                $freelancer = User::with('userData','projects','skills','worksHistory','educationsHistory')->where([
                    ['id','=',$data->user_id],
                    ['profession','=','Developer']
                ])->first();
                if(!empty($freelancer)){
                    $freelancers[] = $freelancer ;
                }
            }
        }

        return array_unique($freelancers);
    }








    public function searchFreelancers(Request $request){

        $searchArray = [] ;
        $userDatas   = [] ;
        // clear session
        session()->forget(['country','languages','jobTitle','city','available_hours','salary_hour','skills','primary_skills']);

        // jobTitle :
        if(isset($request->jobTitle)){
            // save filter in session :
            session()->put('jobTitle',$request->jobTitle);

            $jobTitleInput = $request->jobTitle ;
            $jobTitleArr   = explode(' ',$jobTitleInput);
            foreach ($jobTitleArr as $jobTitleWord){
                $searchArray [] = ['jobTitle','like','%'.$jobTitleWord.'%'] ;
            }
        }

        // languages :
        if(isset($request->language)){
            // save filter in session :
            session()->put('languages',$request->language);
            $languagesInput = $request->language ;
            // split by space or comma
            $languagesArr = preg_split('/[\ \n\,]+/', $languagesInput);
            foreach ($languagesArr as $language){
                if($language == 'and' || $language == 'or'){
                    continue;
                }
                $searchArray[] = ['languages','like','%'.$language.'%'];
            }
        }

        // country :
        if(isset($request->country)){
            // save filter in session :
            session()->put('country',$request->country);
            $searchArray[] = ['country','like','%'.$request->country.'%'];
        }

        // city :
        if(isset($request->city)){
            // save filter in session :
            session()->put('city',$request->city);
            $searchArray[] = ['city','like','%'.$request->city.'%'];
        }

        // available_hours :
        if(isset($request->available_hours)){
            // save filter in session :
            session()->put('available_hours',$request->available_hours);
            $searchArray[] = ['availableHours','>=',intval($request->available_hours)];
        }

        // salary_hour :
        if(isset($request->salary_hour)){
            // save filter in session :
            session()->put('salary_hour',$request->salary_hour);

            $searchArray[] = ['salary','<=',intval($request->salary_hour)];
            $searchArray[] = ['salary','!=',0];
        }

        // skills :
        if(isset($request->skills)){
            // save filter in session :
            session()->put('skills',$request->skills);

            $skillsInput = $request->skills ;
            // split by space or comma
            $skillsArr = preg_split('/[\ \n\,]+/', $skillsInput);
            foreach ($skillsArr as $skill){
                if($skill == 'and' || $skill == 'or'){
                    continue;
                }
                $searchArray[] = ['design_skills_checkbox','like','%'.$skill.'%'];
            }
        }

        // skills :
        if(isset($request->primary_skills)){
            // save filter in session :
            session()->put('primary_skills',$request->primary_skills);

            $primSkillsInput = $request->primary_skills ;
            // split by space or comma
            $primSkillsArr = preg_split('/[\ \n\,]+/', $primSkillsInput);
            foreach ($primSkillsArr as $skill){
                if($skill == 'and' || $skill == 'or'){
                    continue;
                }
                $searchArray[] = ['primarySkills','like','%'.$skill.'%'];
            }
        }

        // form the where array :

        $userDatas[]    = UserData::where($searchArray)->get();
        $freelancers = $this->getFilteredFreelancers($userDatas);


        return $freelancers ;
    }

    public function getFilteredFreelancers($userDatas){
        $freelancers = [] ;
        foreach ($userDatas as $userData){
            foreach ($userData as $data){
                $freelancer = User::with('projects','skills','userData','worksHistory','educationsHistory')->where('id',$data->user_id)->first();
                if(!empty($freelancer)){
                    $freelancers[] = $freelancer ;
                }
            }
        }

        return array_unique($freelancers);
    }

    public function saveSearch(Request $request){

        $client = Client::where('email',$request->client_email)->first();
        // make a new search :
        $search = new ClientSearch;
        $search->freelancers_id = implode(',',$request->freelancers_id);
        $search->client_id = $client->id;
        $search->name = $request->search_name;
        $search->save();
        return ['search_id'=> $search->id];
    }

    public function deleteSearch(Request $request){
        $search = ClientSearch::where('id',$request->search_id)->first();
        $search->delete();
        return ['status'=>'ok'];
    }

    public function deleteSearchFreelancer(Request $request){

        $search = ClientSearch::where('id',$request->search_id)->first();
        // remove freelancer id from the search freelancers_id
        $freelancer_id = $request->freelancer_id ;

        $freelancers_idArr = explode(',',$search->freelancers_id );
        // remove the not needed freelancer :
        if (($key = array_search($freelancer_id, $freelancers_idArr)) !== false) {
            unset($freelancers_idArr[$key]);
        }

        $search->freelancers_id = implode(',',$freelancers_idArr);
        $search->save();

        return ['status'=>'ok'];
    }


}
