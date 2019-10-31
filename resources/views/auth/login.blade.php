@extends('layouts.client-app')

@section('content')
<div class="container">
    <div class="col-md-6 offset-md-3">
        @include('auth.login_tabs')
    </div>
</div>
@endsection
