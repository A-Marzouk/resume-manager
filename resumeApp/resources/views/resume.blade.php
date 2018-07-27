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
        <!-- Success Messages  -->
        <div style="padding-top: 20px;">
            @if(session()->has('successMessage'))
                <div class="alert alert-success" id="successMessage">
                    {{ session()->get('successMessage') }}
                </div>
            @endif
        </div>

        @include('resume_sections.info')
        @include('resume_sections.cv_bar')
        @include('resume_sections.about')
        @include('resume_sections.audio')
        @include('resume_sections.video')
        @include('resume_sections.career_objective')
        @include('resume_sections.education')
        @include('resume_sections.work_experience')
        @include('resume_sections.skills')
        @include('resume_sections.design_style')
        @include('resume_sections.works')
        @include('resume_sections.our_clients')
@endsection