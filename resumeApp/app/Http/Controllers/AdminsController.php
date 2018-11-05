<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Client;
use App\ClientSearch;
use App\Conversation;
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

    public function welcomePage(){
        // get list of freelancers :
        session()->put('admin', 'AdminWasHere');
        $data['users'] = User::all();
        $data['clients'] = Client::all();
        $data['conversations'] = Conversation::all();
        $data['searches'] = ClientSearch::all();
        $data['bookings'] = Booking::all();
        $admin = User::where('username','admin_workforce')->first();
        Auth::loginUsingId($admin->id);
        return view('admin.usersList', compact('data'));
    }

    public function logInAsUser($user_id){
        // log him out and log in the chosen user in
        Auth::loginUsingId($user_id);
        $fromAdmin ='adminView';
        return redirect(route('freelancer.dashboard',$fromAdmin));
    }

    public function logInAsClient($client_id){
        // save admins token in separate session,

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
        $bookingsToD = $request->toBeDeletedBookings ;

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

}
