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
                <input type="text" class="form-control" id="job_title" placeholder="Keywords.." name="jobTitle"
                       value="@if(session()->has('jobTitle')) {{session()->get('jobTitle')}} @endif">
            </div>

            <div class="form-group col-md-3">
                <label for="languages" class="panelFormLabel">Languages</label>
                <input type="text" class="form-control" id="languages" placeholder="" name="language"
                       value="@if(session()->has('languages')) {{session()->get('languages')}} @endif">
            </div>

            <div class="form-group col-md-3">
                <label for="country" class="panelFormLabel">Country</label>
                <input type="text" class="form-control" id="country" placeholder="" name="country"
                       value="@if(session()->has('country')) {{session()->get('country')}} @endif">
            </div>

            <div class="form-group col-md-3">
                <label for="city" class="panelFormLabel">city</label>
                <input type="text" class="form-control" id="city" placeholder="" name="city"
                       value="@if(session()->has('city')) {{session()->get('city')}} @endif">
            </div>

            <div class="form-group col-md-3">
                <label for="available_hours" class="panelFormLabel">Available hours (per week)</label>
                <input type="text" class="form-control" id="available_hours" placeholder="" name="available_hours"
                       value="@if(session()->has('available_hours')) {{session()->get('available_hours')}} @endif">
            </div>

            <div class="form-group col-md-3">
                <label for="salary_hour" class="panelFormLabel">Hourly Rate(max)</label>
                <input type="text" class="form-control" id="salary_hour" placeholder="" name="salary_hour"
                       value="@if(session()->has('salary_hour')) {{session()->get('salary_hour')}} @endif">
            </div>

            <div class="form-group col-md-3">
                <label for="skills" class="panelFormLabel">Top skills</label>
                <input type="text" class="form-control" id="skills_search" placeholder="" name="skills"
                       value="@if(session()->has('skills')) {{session()->get('skills')}} @endif">
            </div>

            <div class="form-group col-md-3">
                <label for="primary_skills" class="panelFormLabel"> Technologies / Frameworks   </label>
                <input type="text" class="form-control" id="primary_skills" placeholder="" name="primary_skills"
                       value="@if(session()->has('primary_skills')) {{session()->get('primary_skills')}} @endif">
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

                        <div class="freelancerCard">
                            <div class="row">
                                <div class="col-lg-4 col-md-12 freelancerCardLeft">
                                    <div class="row">
                                        <div class="col-lg-6 col-6 imageContainer">
                                            <img src="{{$freelancer->userData->photo}}" alt="freelancer" class="freelancerImg" width="100" height="100">

                                        </div>
                                        <div class="col-lg-6 col-6">
                                            <div id="name">
                                                {{$freelancer->firstName}} {{$freelancer->lastName}}
                                            </div>
                                            <div class="buttonMain" style=" margin-top: 10px;">
                                                <a class="hireBtn btn-block" href="/{{$freelancer->username}}" style="font-weight:normal; padding: 7px 5px 7px 5px; ">Visit profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-12 freelancerCardRight">
                                    <div class="panelFormLabel" style=" color: #0290D8;"><b>{{$freelancer->profession}}</b></div>
                                    <div class="panelFormLabel" style="	color: #697786;"><b>Key skills :</b> {{$freelancer->userData->design_skills_checkbox}}</div>
                                    <div class="panelFormLabel" style="	color: #697786;"><b>Rate: </b>${{$freelancer->userData->salary}}/hour</div>
                                    <div class="panelFormLabel" style="	color: #697786;"><b>No.hours/week available: </b>{{$freelancer->userData->availableHours}}</div>
                                </div>
                            </div>
                        </div>
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
                        <div class="form-group">
                            <label for="search_name" class="panelFormLabel">Search name</label>
                            <input type="text" class="form-control" id="search_name" placeholder="" name="search_name" required>
                        </div>
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