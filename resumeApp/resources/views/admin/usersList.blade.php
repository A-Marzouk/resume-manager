@extends('layouts.app')
<? extract($data); ?>

@section('content')
    <div class="container">
        <h1 >Welcome Admin !</h1>
        <h2 style="padding-bottom: 15px;"> List of all freelancers</h2>
        <!-- Success Messages  -->
        @if(session()->has('successMessage'))
            <div class="alert alert-success">
                {{ session()->get('successMessage') }}
            </div>
        @endif
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
@endsection