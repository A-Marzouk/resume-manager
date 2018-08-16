<?php

namespace App\Http\Controllers;

use App\Client;
use App\Conversation;
use App\User;
use App\UserData;
use Dompdf\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function welcomePage(){
        // get list of freelancers :
        $data['users'] = User::all();
        $data['clients'] = Client::all();
        $data['conversations'] = Conversation::all();
        $admin = User::where('username','admin_workforce')->first();
        Auth::loginUsingId($admin->id);
        return view('admin.usersList', compact('data'));
    }

    public function logInAsUser($user_id){
        // save admins token in separate session,
        session()->put('admin', 'AdminWasHere');
        // log him out and log in the chosen user in
        Auth::loginUsingId($user_id);
        $fromAdmin ='adminView';
        return redirect(route('freelancer.dashboard',$fromAdmin));
    }

    public function logInAsClient($client_id){
        // save admins token in separate session,
        session()->put('admin', 'AdminWasHere');
        // log him out and log in the chosen user in
        Auth::guard('client')->loginUsingId($client_id);
        $fromAdmin ='adminView';
        return redirect(route('client.dashboard',$fromAdmin));
    }

    public function deleteClient($id){
        if(Auth::user()->admin == 1) {
            Client::where('id', $id)->delete();
            return redirect('/admin#clients')->with('successMessage', 'Client has been deleted !');
        }
        return view('client.welcome');
    }

    public function deleteFreelancer($id){
        if(Auth::user()->admin == 1) {
            User::where('id', $id)->delete();
            return redirect(route('admin.dashboard'))->with('successMessage', 'Freelancer has been deleted !');;
        }
        return redirect(route('freelancer.dashboard'));
    }

    public function deleteMultiple(Request $request){
        $usersToD = $request->toBeDeletedUsers ;
        $clientsToD = $request->toBeDeletedClients ;
        $conversationsToD = $request->toBeDeletedConversations ;

        foreach ($usersToD as $userID){
            User::where('id', $userID)->delete();
        }

        foreach ($clientsToD as $clientID){
            Client::where('id',$clientID )->delete();
        }

        foreach ($conversationsToD as $conversationID){
            Conversation::where('id', $conversationID)->delete();
        }

        return ['status'=> 'ok'];
    }

    public function controlApproval(Request $request){
        if($request->status == 'APPROVE'){
            foreach($request->toBeApprovedUsers as $userID){
                $userData = UserData::where('user_id', $userID)->first();
                $userData->approved = true;
                $userData->save();
            }
        }elseif ($request->status == 'DISAPPROVE'){
            foreach($request->toBeDisApprovedUsers as $userID){
                $userData = UserData::where('user_id', $userID)->first();
                $userData->approved = false;
                $userData->save();
            }
        }
    }


    public function showSearchPage(){
        return view('admin.search');
    }
    public function searchFreelancers(Request $request){

        $searchArray = [] ;
        $userDatas   = [] ;

        // jobTitle :
        if(isset($request->jobTitle)){
            $jobTitleInput = $request->jobTitle ;
            $jobTitleArr   = explode(' ',$jobTitleInput);
            foreach ($jobTitleArr as $jobTitleWord){
                $searchArray [] = ['jobTitle','like','%'.$jobTitleWord.'%'] ;
            }
        }

        // languages :
        if(isset($request->language)){
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
            $searchArray[] = ['country','like','%'.$request->country.'%'];
        }

        // city :
        if(isset($request->city)){
            $searchArray[] = ['city','like','%'.$request->city.'%'];
        }

        // available_hours :
        if(isset($request->available_hours)){
            $searchArray[] = ['availableHours','>=',intval($request->available_hours)];
        }

        // salary_hour :
        if(isset($request->salary_hour)){
            $searchArray[] = ['salary','<=',intval($request->salary_hour)];
            $searchArray[] = ['salary','!=',0];
        }

        // skills :
        if(isset($request->skills)){
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

        return view('admin.search',compact('freelancers'));
    }

    public function getFilteredFreelancers($userDatas){
        $freelancers = [] ;
        foreach ($userDatas as $userData){
            foreach ($userData as $data){
                $freelancer = User::where('id',$data->user_id)->first();
                if(empty($freelancer)){
                    // delete user data if there is no user related to it !
                    $noUserData = UserData::where('user_id',$data->user_id)->first();
                    $noUserData->delete();
                }else{
                    $freelancers[] = $freelancer ;
                }
            }
        }

        return array_unique($freelancers);
    }

    public function saveSearch(Request $request){
        dd($request->freelancers_id);
    }
}
