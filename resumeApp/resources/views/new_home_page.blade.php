@extends('layouts.new-home-layout')

@section('content')

    <?
    $isClient = true;
    if(auth()->guard('client')->guest()){
        $isClient = false;
    }
    ?>

    <div class="mainSection flex-column">
        <h1 class="mainSection__title">Search and hire awesome freelance designers</h1>
        <div class="mainSection__content">
            <div class="mainSection__content__description">
                Product designers <span class="gold-divider"></span>
                Illustrators <span class="gold-divider"></span>
                UX/UI designers <br />
                Motion designers <span class="gold-divider"></span>
                Digital artists
            </div>
        </div>
    </div>

    <div id="newHomeComponent">
        <new-home-component :freelancers="{{ json_encode($homeFreelancersData) }}" ></new-home-component>
    </div>


@endsection



