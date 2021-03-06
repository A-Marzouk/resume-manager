@extends('layouts.new-home-layout')

@section('content')

    <?
    $isClient = true;
    if(auth()->guard('client')->guest()){
        $isClient = false;
    }
    ?>

    <div class="mainSection flex-column">
        <h1 class="mainSection__title">Search and hire awesome freelancer's</h1>
        <div class="mainSection__content">
            <div class="mainSection__content__description">
                ASP.NET Developers <span class="gold-divider"></span>
                 Javascript Developers <span class="gold-divider"></span> Front-end Developers <span class="gold-divider"></span>
                <br />
                Full-Stack Engineers <span class="gold-divider"></span>
                Mobile Developers
            </div>
        </div>
    </div>

    <div id="newHomeComponent">
        <new-home-component :featured_developers="{{ json_encode($featuredDevelopers) }}" ></new-home-component>
    </div>

@endsection



