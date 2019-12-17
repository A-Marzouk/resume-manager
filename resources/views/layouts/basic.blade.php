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
<body class="no-bg">
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
    @include('layouts.includes.basic_nav')
    @include('admin.includes.messages')
    <main class="py-4 no-bg" style="padding-bottom:0 !important;">
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
