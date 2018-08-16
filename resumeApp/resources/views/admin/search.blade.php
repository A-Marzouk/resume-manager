@extends('layouts.app')

@section('content')

    <!-- Success Messages  -->
    <div style="padding-top: 20px;">
        @if(session()->has('successMessage'))
            <div class="alert alert-success" id="successMessage">
                {{ session()->get('successMessage') }}
            </div>
        @endif
    </div>

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
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>



        {{-- show freelancers result --}}
        @if( isset($freelancers) && !empty($freelancers))
            <h4 style="padding-top: 30px;"><b>Matched freelancers</b></h4>
            <div class="row" style="padding-top: 20px;">
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
                <?
                    // get clients :
                    $clients = \App\Client::all();
                ?>
                <div class="col-md-2" style="border-left:1px solid lightgray; padding-left: 15px; ">
                    <b>Results : {{count($freelancers)}}</b>
                    <hr>
                    <form action="/save_search" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="freelancers_id" value="{{implode(',',$freelancers_id)}}">
                        <input type="hidden" name="search_name" value="First search">


                        <div class="form-group">
                            <label for="client_email" class="panelFormLabel">Client email </label>
                            <select class="custom-select" id="client_email" name="client_email" required>
                                <option value="" selected disabled>-- Client email --</option>
                                <? foreach($clients as $client):?>
                                    <option value="{{$client->email}}">{{$client->email}}</option>
                                <? endforeach;?>
                            </select>
                        </div>

                        <div class="form-group">
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