@extends('layouts.app')
<? extract($data); ?>

@section('content')
    <h1 class="container">Welcome Admin !</h1>

    <? foreach ($users as $user):?>
        {{$user->firstName}}
        <br/>
    <? endforeach;?>
@endsection