@extends('layouts.app')
<?
    $currUser = auth()->user();
    $name = $currUser->userData->name ?? '' ;
    $birth_date = $currUser->userData->birth_date ?? '' ;
    $email = $currUser->userData->email ?? '' ;
    $city = $currUser->userData->city ?? '' ;
    $nationality = $currUser->userData->nationality ?? '' ;
    $username = auth()->user()->username;
?>
@section('content')
<div class="container">
        <h3>Here you can edit your information : </h3>
        Username : {{$username}} <br><a target="_blank" href="/{{$username}}">Link to resume </a>
        <hr>
    <form method="post" action="/admin" class="container">
        {{csrf_field()}}
        <div class="form-group col-md-8">
            <label for="userName">Full name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter your name.." value="{{$name}}">
            <small class="form-text text-muted"></small>
        </div>
        <div class="form-group col-md-8">
            <label for="birth_date">Date of birth</label>
            <input type="date" class="form-control" name="birth_date" value="{{$birth_date}}">
        </div>
        <div class="form-group col-md-8">
            <label for="birth_date">Email</label>
            <input type="email" class="form-control" name="email" value="{{$email}}">
        </div>
        <div class="form-group col-md-8">
            <label for="birth_date">City</label>
            <input type="text" class="form-control" name="city" value="{{$city}}">
        </div>
        <div class="form-group col-md-8">
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form>
    <? foreach($errors->all() as $error):?>
    <div class="form-group col-md-8">
        <div class="alert alert-danger">{{$error}}</div>
    </div>
    <? endforeach;?>
</div>

@endsection