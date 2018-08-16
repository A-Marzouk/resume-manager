@extends('layouts.app')

@section('content')

    <div class="container">
        <form method="post" action="/search" class="row">
            {{csrf_field()}}
            <div class="form-group col-md-6">
                <label for="job_title" class="panelFormLabel">Job title</label>
                <input type="text" class="form-control" id="job_title" placeholder="Keywords.." name="jobTitle">
            </div>

            <div class="form-group col-md-6">
                <label for="languages" class="panelFormLabel">Languages</label>
                <input type="text" class="form-control" id="languages" placeholder="" name="language">
            </div>

            <div class="form-group col-md-6">
                <label for="country" class="panelFormLabel">Country</label>
                <input type="text" class="form-control" id="country" placeholder="" name="country">
            </div>

            <div class="form-group col-md-6">
                <label for="city" class="panelFormLabel">city</label>
                <input type="text" class="form-control" id="city" placeholder="" name="city">
            </div>

            <div class="form-group col-md-6">
                <label for="available_hours" class="panelFormLabel">Available hours (min)</label>
                <input type="text" class="form-control" id="available_hours" placeholder="" name="available_hours">
            </div>

            <div class="form-group col-md-6">
                <label for="salary_hour" class="panelFormLabel">Hourly Rate(max)</label>
                <input type="text" class="form-control" id="salary_hour" placeholder="" name="salary_hour">
            </div>

            <div class="form-group col-md-6">
                <label for="skills" class="panelFormLabel">Top skills</label>
                <input type="text" class="form-control" id="skills_search" placeholder="" name="skills">
            </div>

            <div class="form-group col-md-6">
                <label for="primary_skills" class="panelFormLabel">Top primary skills  / frameworks   </label>
                <input type="text" class="form-control" id="primary_skills" placeholder="" name="primary_skills">
            </div>


            <div class="form-group col-md-6">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>


        {{-- show freelancers result --}}
        @if( isset($freelancers) && !empty($freelancers))
            <b>Results : {{count($freelancers)}}</b>
            <hr>
            @foreach($freelancers as $freelancer)
                Name : {{$freelancer->firstName}}<br/>
                Job :{{$freelancer->userData->jobTitle}}<br>
                Languages :{{$freelancer->userData->languages}}<br/>
                Country :{{$freelancer->userData->country}}<br>
                City :{{$freelancer->userData->city}}<br/>
                Salary/hour :{{$freelancer->userData->salary}} $<br>
                Available hours :{{$freelancer->userData->availableHours}}<br>
                Skills :{{$freelancer->userData->design_skills_checkbox}}<br>
                Primary skills :{{$freelancer->userData->primarySkills}}<br>
                <br/>
                <hr>
            @endforeach
        @else
            <span class="panelFormLabel"></span>No results yet
        @endif

    </div>



@endsection