@extends('layouts.app')
<? extract($data); ?>

@section('content')
    <div class="container">
        <h1 >Welcome Admin !</h1>
        <h2 style="padding-bottom: 15px;"> List of all freelancers</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Profession</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <? foreach ($users as $user):?>
            <? if($user->admin == 1){ continue;}?>
            <? $i=1; ?>

                <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$user->firstName}}</td>
                        <td>{{$user->lastName}}</td>
                        <td>{{$user->profession}}</td>
                        <td><a href="{{route('logInAsUser',$user->id)}}">Edit</a></td>
                </tr>

            <? $i++;?>
            <? endforeach;?>
            </tbody>
        </table>

    </div>
@endsection