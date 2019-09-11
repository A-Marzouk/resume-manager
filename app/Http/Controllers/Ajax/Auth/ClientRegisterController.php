<?php

namespace App\Http\Controllers\Ajax\Auth;

use App\Http\Controllers\Auth\ClientRegisterController as BaseClientRegisterController;
use App\Mail\Clients\ClientRegistered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ClientRegisterController extends BaseClientRegisterController
{
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $client = $this->create($request->all());

//        Mail::send(new ClientRegistered($client));

        auth()->login($client->user);

        return new Response;
    }
}
