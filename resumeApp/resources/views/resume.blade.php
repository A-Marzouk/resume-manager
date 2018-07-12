@extends('layouts.client-app')

@section('content')
        <? // check developer or designer :
        $developer = $designer = false;
        if($profession == 'Developer'){
            $developer = true;
        }elseif($profession == 'Designer'){
            $designer = true;
        }
        ?>
        @include('resume_sections.info')
        @include('resume_sections.cv_bar')
        @include('resume_sections.about')
        @include('resume_sections.audio')
        @include('resume_sections.education')
        @include('resume_sections.skills')
        @include('resume_sections.works')
        @include('resume_sections.our_clients')
@endsection