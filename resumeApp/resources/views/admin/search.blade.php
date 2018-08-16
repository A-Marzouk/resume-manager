@extends('layouts.app')

@section('content')

    <div class="container">
        <form method="post" action="/search" class="row">
            {{csrf_field()}}
            <div class="form-group col-md-3">
                <label for="job_title" class="panelFormLabel">Job title</label>
                <input type="text" class="form-control" id="job_title" placeholder="Keywords.." name="jobTitle">
            </div>

            <div class="form-group col-md-3">
                <label for="languages" class="panelFormLabel">Languages</label>
                <input type="text" class="form-control" id="languages" placeholder="" name="language">
            </div>

            <div class="form-group col-md-3">
                <label for="country" class="panelFormLabel">Country</label>
                <input type="text" class="form-control" id="country" placeholder="" name="country">
            </div>

            <div class="form-group col-md-3">
                <label for="city" class="panelFormLabel">city</label>
                <input type="text" class="form-control" id="city" placeholder="" name="city">
            </div>

            <div class="form-group col-md-3">
                <label for="available_hours" class="panelFormLabel">Available hours (per week)</label>
                <input type="text" class="form-control" id="available_hours" placeholder="" name="available_hours">
            </div>

            <div class="form-group col-md-3">
                <label for="salary_hour" class="panelFormLabel">Hourly Rate(max)</label>
                <input type="text" class="form-control" id="salary_hour" placeholder="" name="salary_hour">
            </div>

            <div class="form-group col-md-3">
                <label for="skills" class="panelFormLabel">Top skills</label>
                <input type="text" class="form-control" id="skills_search" placeholder="" name="skills">
            </div>

            <div class="form-group col-md-3">
                <label for="primary_skills" class="panelFormLabel"> Technologies / Frameworks   </label>
                <input type="text" class="form-control" id="primary_skills" placeholder="" name="primary_skills">
            </div>


            <div class="form-group col-md-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>


        {{-- show freelancers result --}}
        @if( isset($freelancers) && !empty($freelancers))
            <b>Results : {{count($freelancers)}}</b>
            <hr>
            <div class="row">
                <div class="col-md-10">
                    @foreach($freelancers as $freelancer)
                        <?php
                        $freelancers_id[] = $freelancer->id;
                        ?>

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
                </div>
                <div class="col-md-2">
                    <form action="/save_search" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="freelancers_id" value="{{implode(',',$freelancers_id)}}">
                        <div class="form-group col-md-3">
                            <button type="submit" class="btn btn-primary">Save search</button>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <hr>
            <span class="panelFormLabel">
                No results
            </span>
        @endif

    </div>



@endsection