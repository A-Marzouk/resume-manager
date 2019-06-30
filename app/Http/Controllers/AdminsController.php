<?php

namespace App\Http\Controllers;

use App\Affiliate;
use App\Booking;
use App\Client;
use App\ClientSearch;
use App\Conversation;
use App\Job;
use App\Models\Enums\UserStage;
use App\Owner;
use App\PayPalInvoice;
use App\StripeInvoice;
use App\User;
use App\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    // main front end pages :

    public function welcomePage(){
        return view('admin-new.dashboard.dashboard');
    }

    public function showApplicantProfile(){
        return view('admin-new.dashboard.applicant_profile');
    }

    public function showApprovedAgentProfile(){
        return view('admin-new.dashboard.approved_agent_profile');
    }

    public function showAdvancedSearchPage(){
        return view('admin-new.advanced_search_view');
    }

    public function showRegisterAgentPage(){
        return view('admin-new.register_agent_view');
    }

    public function addBehanceDesigner(){
        return view('admin-new.add_behance_designer');
    }


    // api ( fetching data from the DB )

    public function getAgentsByProfessionName($professionName){
        // user -> data -> profession -> name === business-support
        $Agents = [] ;
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'agent');
        })->with('agent','data')->get();

        foreach ($users as $user){
            if($user->data->profession->name === $professionName){
                $Agents [] = $user ;
            }
        }

        return $Agents ;
    }




    public function viewBusinessSupportUsers(){
        return view('admin.business_support_users');
    }

    public function getBusinessUsersOrdered($items_count){
        $businessUsers = User::where('profession','businessSupport')
            ->orderByRaw("FIELD(status ,'GREY','ORANGE','GREEN','DARKGREEN','RED','NOT_SELECTED') ASC")
            ->paginate($items_count);
        foreach ($businessUsers as &$user){
            if(!isset($user->status)){
                $user->status = 'NOT_SELECTED';
                $user->save();
            }
            $user['bookings']    = $user->bookings;
            $user['userData']    = $user->userData;
            $user['owner']       = $user->owner;
            $user['permissions'] = explode(',',$user->permissions);
        }

        return ['admin' => auth()->user(), 'businessUsers'=> $businessUsers];
    }

    public  function showPermissionsPage(){
        return view('admin_permissions');
    }

    public function saveAdminPermissions(Request $request){
        if(isset($request->userID)){
            $user = User::where('id',$request->userID)->first();
        }

        if($user){
            $user->admin = true;
            $user->permissions = implode(',',$request->permissions);
            if(empty($user->permissions)){
                $user->admin = false;
            }
            $user->save();
        }

        return ['status'=>'Updated'];
    }
    public function sendMailApprovedUsers(){
        $approvedUsers = User::where([
            'status' => 'GREEN',
            'profession' => 'businessSupport'
        ])->get()->toArray();

        $notification = new NotificationsController;
        $notification->mailApprovedUsers($approvedUsers);

        return 'email Sent';
    }

    public function logInAsUser($user_id){
        // log him out and log in the chosen user in
        Auth::loginUsingId($user_id);
        $fromAdmin ='adminView';
        return redirect(route('show.edit_form',$fromAdmin));
    }

    public function inviteToJob(Request $request){
        $job          = Job::find($request->job_id);
        $mailingLists = $request->mailingLists;
        $emails = [] ;
        if(in_array('developers',$mailingLists)){
            $emails = User::where('profession','Developer')->pluck('email')->toArray();;
        }

        if(in_array('designers',$mailingLists)){
            $emails = array_merge($emails ,User::where('profession','Designer')->pluck('email')->toArray());
        }

        if(in_array('business_support',$mailingLists)){
            $emails = array_merge($emails ,User::where('profession','businessSupport')->pluck('email')->toArray());

        }

        if(in_array('all',$mailingLists)){
            $emails = User::all()->pluck('email')->toArray();
        }

        if(isset($request->customEmails) && !empty($request->customEmails)){
            $emails = array_merge($emails, $request->customEmails);
        }

        $notification = new NotificationsController;
        $invitationData = [
            'emails'=> $emails,
            'jobTitle'=> $job->title,
            'jobPostLink'=>'123workforce.magictimeapps.com/jobs/view_post/'.$job->id
        ];

        $notification->inviteFreelancersToJob($invitationData);

        return 'invitation sent';
    }

    public function logInAsAffiliate($affiliate_id){
        // log him out and log in the chosen user in
        Auth::guard('affiliate')->loginUsingId($affiliate_id);
        $fromAdmin ='adminView';
        return redirect(route('affiliate.dashboard',$fromAdmin));
    }

    public function logInAsClient($client_id){
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
        $owners = Owner::all();
        return view('client.welcome',compact('owners'));
    }

    public function deleteFreelancer($id){
        if(Auth::user()->admin == 1) {
            User::where('id', $id)->delete();
            return redirect(route('admin.dashboard'))->with('successMessage', 'Freelancer has been deleted !');;
        }
        return redirect(route('freelancer.dashboard'));
    }

    public function deleteMultiple(Request $request){
        $usersToD         = $request->toBeDeletedUsers ?? [];
        $clientsToD       = $request->toBeDeletedClients ?? [] ;
        $conversationsToD = $request->toBeDeletedConversations ?? [];
        $bookingsToD      = $request->toBeDeletedBookings ?? [];
        $ownersToD        = $request->toBeDeletedOwners ?? [];
        $jobsToD          = $request->toBeDeletedJobs ?? [];

        foreach ($usersToD as $userID){
            User::where('id', $userID)->delete();
        }

        foreach ($clientsToD as $clientID){
            Client::where('id',$clientID )->delete();
        }

        foreach ($conversationsToD as $conversationID){
            Conversation::where('id', $conversationID)->delete();
        }

        foreach ($bookingsToD as $bookingID){
            Booking::where('id', $bookingID)->delete();
        }

        foreach ($ownersToD as $ownerID){
            Affiliate::where('id', $ownerID)->delete();
        }

        foreach ($jobsToD as $jobID){
            Job::where('id', $jobID)->delete();
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

    public function controlHomepageFreelancers(Request $request){
        $userID = $request->userID ;
        if($request->action == 'ADD'){
                $userData = UserData::where('user_id', $userID)->first();
                $userData->home_page_freelancer = true;
                $userData->save();
                return 'added';
        }
        elseif($request->action == 'REMOVE'){
            $userData = UserData::where('user_id', $userID)->first();
            $userData->home_page_freelancer = false;
            $userData->save();
            return 'removed';
        }
        return 'wrong data';
    }

    public function getAllClients(){
        return Client::all();
    }

    public function getClientsEmails(){
        return Client::all('email');
    }

    public function releaseBookingsHours(Request $request){
        $booking = Booking::where('id',$request->booking_id)->first();
        $hours   = $booking->hours;
        $freelancerID = $booking->user_id;

        $userData = UserData::where('user_id',$freelancerID)->first();
        $currentHours = $userData->availableHours;
        $newHours     = $currentHours + $hours ;

        $userData->availableHours = $newHours;
        $userData->save();

        $booking->canceled = true ;
        $booking->save();

        return ['user_id'=>$booking->user_id];
    }

    public function showBookingsHistory($client_id){
        $client = Client::where('id',$client_id)->first();
        return view('admin.client_booking_history',compact('client'));
    }

    public function invitePage($job_id){
        $job = Job::find($job_id);
        return view('admin.invitePage',compact('job'));
    }

    public function getCurrentSubscriptions(){
        $paypalSubs = PayPalInvoice::where('recurring_id','!=',null)->get();
        $stripeSubs = Booking::where('subscription_id','!=',null)->get();

        return [
            'paypal_subscriptions' => $paypalSubs,
            'stripe_subscriptions' => $stripeSubs,
        ];
    }

    public function viewMeteredSubscriptionsPage($client_id){
        $subs = StripeInvoice::where('client_id',$client_id)->get();
        return view('admin.client_subs',compact('subs'));
    }
}
