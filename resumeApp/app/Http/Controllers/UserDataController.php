<?php

namespace App\Http\Controllers;

use App\UserData;
use Illuminate\Http\Request;

class UserDataController extends Controller
{

    public function store(Request $request){
        $userData = UserData::where('user_id',auth()->user()->id)->first();
        if ($userData){
            // update
            $this->validate($request,[
                ''=> '',
            ]);
            $data = $request->all();
            foreach ($data as $key => $value){
                if($key == '_token'){
                    continue;
                }
                $userData->{$key} = $value ;
            }
            $userData->save();
            return redirect('/admin');
        }else{
            // create
            return redirect('/admin/home');
        }
    }
}
