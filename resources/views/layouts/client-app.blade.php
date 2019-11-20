<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>123 Workforce</title>
    @include('layouts.includes.styles')
</head>
<body>
<?
$curPage = url()->current();
$admin = false;
$isClient = true;
$isAgent = true;

if (strpos($curPage, 'client') !== false) {
    $curPage = 'client';
} else {
    $curPage = 'home';
}

$user = auth()->user();
if ($user) {
    if ($user->admin == 1) {
        $admin = true;
    }
}

if (currentUser() === null) {
    $isClient = false;
}
if (currentUser() !== null) {
    if (currentClient() === null) {
        $isClient = false;
    }
}

if (currentUser() === null) {
    $isAgent = false;
}
if (currentUser() !== null) {
    if (currentAgent() === null) {
        $isAgent = false;
    }
}

?>

<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel fixed-top">
        <a class="navbar-brand col-md-2 col-9" href="{{ url('/') }}">
            <img src="/images/newResume/123wf_logo.png" alt="logo">
        </a>
        <button class="navbar-toggler" id="navBarToggle" type="button" data-toggle="collapse" style="border: none;"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="background-image: url('/images/newResume/menu.png');"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav">
                {{-- if guest : --}}
                <? if(!$isClient):?>
                <a class="nav-item nav-link customNavLink <?if($curPage == 'client'):?>active<?endif;?>"
                   href="/client/register/" data-toggle="modal" data-target="#exampleModalCenter">Become a client</a>
                <? endif; ?>
                <a class="nav-item nav-link customNavLink" href="#" data-toggle="modal" data-target="#talkToSales">Talk
                    to sales</a>
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
                <li></li>
                <?php if(!$isClient && !$isAgent): ?>
                <li class="nav-link loginBtn">
                    <a href="{{ route('client.login') }}" data-toggle="modal" data-target="#loginModal"
                       style="padding-left: 30px; padding-right: 30px;">{{ __('Log in') }}</a>
                </li>
                <? else: ?>
                <a class="nav-item nav-link customNavLink" href="/dashboard">
                    @if($isClient) {{ currentClient()->contact}} @endif @if($isAgent) {{currentUser()->userData->first_name}} @endif
                </a>
                <a class="nav-item nav-link customNavLink" href="/logout">
                    Logout
                </a>

                <? endif;?>
            </ul>
        </div>
    </nav>
    @include('admin.includes.messages')
    <main class="py-4" style="padding-bottom:0 !important;">
        @yield('content')
    </main>
</div>


{{-- chat minimized --}}
<div class="chatMinimized d-none" id="chatMinBox">
    <a href="javascript:void(0)" class="row" id="chatMin">
        <div class="col-2 col-md-1 col-lg-2 chatImage">
        <span>
            <img src="/images/textsms_24px copy.png" width="16px">
        </span>
        </div>
        <div class="col-10 text">
            <span id="chatText">Chat with us!</span>
        </div>
    </a>
</div>

{{--@include('layouts.includes.terms')--}}
@include('layouts.footer')

{{-- Chat box --}}
<div>
    <? if(!$admin):?>
    @include('includes.chat')
    <? endif;?>
</div>

@include('layouts.includes.modals')
@include('layouts.includes.scripts')


</body>
</html>
