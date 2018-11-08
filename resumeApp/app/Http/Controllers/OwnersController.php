<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 9/10/2018
 * Time: 11:47 AM
 */

namespace App\Http\Controllers;


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
}