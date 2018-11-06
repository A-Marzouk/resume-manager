<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 9/10/2018
 * Time: 11:47 AM
 */

namespace App\Http\Controllers;


use App\Owner;
use Illuminate\Http\Request;

class OwnersController extends Controller
{
    public function addOwner(Request $request){
        $request->validate([
            'ownerName'=> 'required|max:190',
            'email'=>'required|unique:owners|email|max:190',
        ]);
        $ownerName  = $request->ownerName;
        $ownerEmail = $request->email;

        $owner        = new Owner;
        $owner->name  = $ownerName;
        $owner->email = $ownerEmail;
        $owner->save();

        return redirect('/admin')->with('successMessage','Owner has been added.');
    }

}