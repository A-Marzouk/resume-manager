@extends('layouts.client-app')

@section('content')
        <? // check developer or designer :
            $freelancer = $user1;
        ?>

        <div class="container">
            <? $profit = 5 ;?>
            <? $freelancer_form = false;?>
            @include('freelancer_card')
        </div>

@endsection