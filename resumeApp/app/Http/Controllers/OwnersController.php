<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 9/10/2018
 * Time: 11:47 AM
 */

namespace App\Http\Controllers;


use App\Client;
use App\Owner;
use App\User;
use Illuminate\Http\Request;

class OwnersController extends Controller
{
    public function addOwner(Request $request){
        $request->validate([
            'ownerName'=> 'required|max:190',
            'email'=>'required|unique:owners|email|max:190',
        ]);
        // generate unique code for owner :
        $ownerCode  =  md5(uniqid(rand(), true)) ;
        $ownerName  = $request->ownerName;
        $ownerEmail = $request->email;

        $owner        = new Owner;
        $owner->name  = $ownerName;
        $owner->email = $ownerEmail;
        $owner->code  = $ownerCode;
        $owner->save();

        return redirect('/admin')->with('successMessage','Owner has been added.');
    }

    public function updateOwner(Request $request){
        $ownerID = $request->ownerID ;
        $currFreelancer = User::where('id',auth()->user()->id)->first();
        $currFreelancer->owner_id = $ownerID;
        $currFreelancer->save();
        return ['status' => 'ok'];
    }

    public function updateClientOwner(Request $request){
        $ownerID = $request->ownerID ;
        $currClient = Client::where('id',auth()->guard('client')->user()->id)->first();
        $currClient->owner_id = $ownerID;
        $currClient->save();
        return ['status' => 'ok'];
    }

    public function showSingleOwnerPage($owner_id){
        $owner = Owner::where('id',$owner_id)->first();
        if($owner){
            return view('admin.single_owner',compact('owner'));
        }else{
            return redirect('/admin')->with('errorMessage','No owner found');
        }
    }
}