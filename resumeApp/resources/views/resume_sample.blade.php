@extends('layouts.client-app')

@section('content')
    <?
        $freelancer = $user1;
    ?>
    {{-- here goes the sample freelancer card --}}
    @include('sample_freelancer_card')
@endsection