<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResumeBuilderController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:agent');
    }

    public function index(){
        return view('freelancer.resume_builder.index');
    }

    public function editAccountData(Request $request){
        $request->validate([
            'first_name' => 'max:191|required',
            'email'     => 'max:191|email',
            'password' => 'nullable|min:6|max:191|confirmed',
            'username' => 'min:3|max:191',
        ]);


        $user = currentUser();


        $user->userData->update(
            $request->toArray()
        );


        if ($request->userNameChanged) {
            $user->update([
                'username' => $request->username
            ]);
        }


        if (isset($request->password)) {
            $user->update([
                'password' => $request->password
            ]);
        }

        if (isset($request->email) && $request->email !== null ) {
            $user->update([
                'email' => $request->email
            ]);
        }

        return $user->userData;
    }

}
