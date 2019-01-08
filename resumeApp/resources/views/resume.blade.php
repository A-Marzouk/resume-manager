@extends('layouts.client-app')

@section('content')
        <? // check developer or designer :
            $freelancer = $user1;
        ?>

        <div class="container">
            @include('freelancer_card')
        </div>

@endsection