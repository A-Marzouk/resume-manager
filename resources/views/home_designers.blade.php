<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>123workforce</title>

  <link href="https://fonts.googleapis.com/css?family=Nunito:400,700&display=swap" rel="stylesheet">

  @include('layouts.includes.styles')
</head>
<body class="home">
  <?
    $curPage = url()->current();
    $admin = false;
    $isClient = true;

    if(strpos($curPage, 'client') !== false){
        $curPage = 'client';
    }else{
        $curPage = 'home';
    }

    $user = auth()->user();
    if($user){
        if($user->admin == 1){
            $admin = true;
        }
    }

    if(auth()->guard('client')->guest()){
        $isClient = false;
    }

  ?>
  <img src="/images/home/mainBg-designers.svg" alt="" class="topBg">
  <div id="app">
    <nav class="navbar navbar-expand-md nav-home-designers">
        <a href="{{ url('/') }}">
          <img class="logo" src="/images/home/123workforce.png" alt="logo">
        </a>
        <button class="navbar-toggler" id="navBarToggle" type="button" data-toggle="collapse" style="border: none;" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="background-image: url('/images/newResume/menu.png');"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav">
                
            </ul>

            <!-- Right Side Of Navbar -->
            <li class="navbar-nav chatWithUsText">
                <? if($admin || (session()->get('admin') && session()->get('admin') == 'AdminWasHere')):?>
                <a class="nav-item nav-link customNavLink" href="/admin" style="color:#0290D8;">Admin-area</a>
                <?else :?>
                {{--<a class="nav-item nav-link customNavLink" href="#chatOn" id="liveChat" style="color:#0290D8;">--}}
                    {{--<img src="/images/textsms_24px.png" alt="chat img" width="16px">--}}
                    {{--&nbsp; Chat with us!--}}
                {{--</a>--}}
                <? endif;?>
            </li>
            <ul class="navbar-nav">
                <!-- Authentication Links -->
                {{-- if guest : --}}
                <?php if(!$isClient): ?>
                    
                    <a class="nav-item customNavLink nav-link text-blue" href="{{ route('client.login') }}" data-toggle="modal" data-target="#loginModal" style="padding-left: 30px; padding-right: 30px;"><b style="font-weight: 500;">{{ __('LOG IN') }}</b></a>
                <? else: ?>
                    <a class="nav-item nav-link customNavLink" href="/chat-room" style="color:#0290D8;">
                        Messaging
                        <span id="MessagingClient{{Auth::guard('client')->user()->id}}" class="unread" style="margin-left: 0;">
                            {{Auth::guard('client')->user()->unreadMessages()}}
                        </span>
                    </a>
                    <a class="nav-item nav-link customNavLink" href="/client">
                        {{ Auth::guard('client')->user()->name }}
                    </a>
                    <a class="nav-item nav-link customNavLink" href="{{ route('client.logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('client.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                <? endif;?>
                <a class="nav-item nav-link customNavLink text-blue" href="#" data-toggle="modal" data-target="#talkToSales"><b style="font-weight: 500;">TALK TO SALES</b></a>
            <? if(!$isClient): ?>
                    <li class="nav-link registerBtn">
                        <a href="/client/register/"
                          data-toggle="modal" 
                          data-target="#exampleModalCenter"style="padding-left: 30px; padding-right: 30px;">{{ __('BECOME A CLIENT') }}</a>
                    </li>
                <? else: ?>
                    <a class="nav-item nav-link customNavLink" href="/chat-room" style="color:#0290D8;">
                        Messaging
                        <span id="MessagingClient{{Auth::guard('client')->user()->id}}" class="unread" style="margin-left: 0;">
                            {{Auth::guard('client')->user()->unreadMessages()}}
                        </span>
                    </a>
                    <a class="nav-item nav-link customNavLink" href="/client">
                        {{ Auth::guard('client')->user()->name }}
                    </a>
                    <a class="nav-item nav-link customNavLink" href="{{ route('client.logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('client.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                <? endif;?>
            </ul>
        </div>
    </nav>

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

    <div class="agentsSection">
      <img class="agentsBg-1" src="/images/home/agentsBg-1.svg" alt="">
      <img class="agentsBg-2" src="/images/home/agentsBg-2.svg" alt="">
      <img class="agentsBg-3" src="/images/home/agentsBg-3.svg" alt="">
      <img src="/images/home/pencilsBg.png" alt="" class="pencilsBg">
      {{-- Search agents component --}}
      <div class="agentsContainer__searchTools">
        <button class="btn-first active">Featured designers</button>
        <button class="btn-second">Search designers</button>
      </div>

      <div class="agentsContainer__selectContainer">
        <select name="" id="">
          <option value="UX/UI">UX/UI designers</option>
        </select>
      </div>
      {{-- {{ dd($agents) }} --}}
      <div id="freelancers_container">
        <freelancers-container :freelancers="{{ json_encode($agents) }}"></freelancers-container>
        
      </div>
      <img src="/images/home/computer.png" alt="computer" class="bottomBg">
    </div>
  </div>
  @include('layouts.includes.modals')
  @include('layouts.includes.scripts')
</body>
</html>
