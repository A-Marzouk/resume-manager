@extends('layouts.app')
<? extract($data); ?>

@section('content')
    <div class="container">
        <h1 >Welcome Admin !</h1>
        <ul class="nav nav-tabs" role="tablist">
            <li class="col-md-6">
                <a class="btn btn-block btn-primary active" href="#freelancers" role="tab" data-toggle="tab">
                    Freelancers
                </a>
            </li>
            <li class="col-md-6">
                <a class="btn btn-block btn-dark text-center" href="#clients" role="tab" data-toggle="tab">
                    Clients
                </a>
            </li>
        </ul>

        <!-- Success Messages  -->
        @if(session()->has('successMessage'))
            <div class="alert alert-success" style="margin-top: 30px;">
                {{ session()->get('successMessage') }}
            </div>
        @endif

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="freelancers">
                <br/>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Link to Resume</th>
                        <th scope="col">Profession</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <? $i=1; ?>
                    <? foreach ($users as $user):?>
                    <? if($user->admin == 1){ continue;}?>

                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$user->firstName}} {{$user->lastName}}</td>
                        <td><a href="/{{$user->username}}" target="_blank">Resume</a></td>
                        <td>{{$user->profession}}</td>
                        <td><a class="btn btn-primary btn-sm" href="{{route('logInAsUser',$user->id)}}">Edit</a> - <a class="btn btn-sm btn-danger" href="{{route('freelancer.delete',$user->id)}}"  onclick="return confirm('Are you sure you want to delete {{$user->firstName}} {{$user->lastName}}?');">Delete</a></td>
                    </tr>

                    <? $i++;?>
                    <? endforeach;?>
                    </tbody>
                </table>
            </div>
            <div role="tabpanel" class="tab-pane" id="clients">
                <br/>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Link to Profile</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <? $i=1; ?>
                    <? foreach ($clients as $client):?>
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$client->name}}</td>
                        <td><a href="#" target="_blank">Later!</a></td>
                        <td><a class="btn btn-primary btn-sm" href="{{route('logInAsClient',$client->id)}}">Edit</a> - <a class="btn btn-sm btn-danger" href="{{route('client.delete',$client->id)}}"  onclick="return confirm('Are you sure you want to delete {{$client->name}}?');">Delete</a></td>
                    </tr>

                    <? $i++;?>
                    <? endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
@endsection