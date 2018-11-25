@extends('layouts.client-app')

@section('content')

    <?
    $isClient = true;
    if(auth()->guard('client')->guest()){
        $isClient = false;
    }
    ?>
    <div id="content" style="margin:auto;">

        @include('homepage_sections.main')
        @include('homepage_sections.freelancers')

        <div class="line"></div>

        @include('homepage_sections.talent')
        @include('homepage_sections.dev_boxes')
        @include('homepage_sections.our_clients')
    </div>
@endsection



