@extends('layouts.app')
<?
    $currUser = auth()->user();
    $name = $currUser->userData->name ?? '' ;
    $birth_date = $currUser->userData->birth_date ?? '' ;
    $email = $currUser->userData->email ?? '' ;
    $salary = $currUser->userData->salary ?? '' ;
    $currency = $currUser->userData->currency ?? '' ;
    $preferredTime = $currUser->userData->preferredTime ?? '' ;
    $surname = $currUser->userData->surname ?? '' ;
    $city = $currUser->userData->city ?? '' ;
    $design_styles = $currUser->userData->design_styles ?? '' ;
    $workExperience = $currUser->userData->workExperience ?? '' ;
    $trainings = $currUser->userData->trainings ?? '' ;
    $nationality = $currUser->userData->nationality ?? '' ;
    $workForceAgent = $currUser->userData->workForceAgent ?? '' ; // add to database
    $languages = $currUser->userData->languages ?? '' ;
    $design_skills = $currUser->userData->design_skills ?? '' ;
    $education = $currUser->userData->education ?? '' ;
    $careerObjective = $currUser->userData->careerObjective ?? '' ; // add to database
    $username = auth()->user()->username;
?>
@section('content')
<div class="container">
        <h3>Here you can edit your information : </h3>
        Username : {{$username}} <br><a target="_blank" href="/{{$username}}">Link to resume </a>
        <hr>
    @if(session()->has('successMessage'))
        <div class="alert alert-success">
            {{ session()->get('successMessage') }}
        </div>
    @endif
    <form method="post" action="/admin" enctype="multipart/form-data" class="container">
        {{csrf_field()}}
        <div class="form-group col-md-8">
            <label for="userName">Full name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter your name.." value="{{$name}}">
            <small class="form-text text-muted"></small>
        </div>
        <div class="form-group col-md-8">
            <label for="userName">Surname</label>
            <input type="text" class="form-control" name="surname" placeholder="Enter your surname.." value="{{$surname}}">
            <small class="form-text text-muted"></small>
        </div>
        <div class="form-group col-md-8">
            <label for="birth_date">Date of birth</label> <!-- TODO: edit date format to April 22, 1994 -->
            <input type="date" class="form-control" name="birth_date" value="{{$birth_date}}">
        </div>
        <div class="form-group col-md-8">
            <label for="birth_date">Personal email</label>
            <input type="email" class="form-control" name="email" value="{{$email}}">
            <small>Gmail is preferred</small>
        </div>
        <div class="form-group col-md-8">
            <label for="birth_date">City</label>
            <input type="text" class="form-control" name="city" value="{{$city}}">
        </div>
        <div class="form-group col-md-8">
            <label for="">Nationality</label>
            <input type="text" class="form-control" name="nationality" value="{{$nationality}}">
        </div>
        <div class="form-group col-md-8">
            <label for="workForceAgent">123 WORKFORCE AGENTS EMAIL</label>
            <select class="custom-select" id="workForceAgent" name="workForceAgent">
                <option selected>Not selected</option>
                <option value="riz@123workforce.com" <?if($workForceAgent == 'riz@123workforce.com'):?> selected<?endif;?> >riz@123workforce.com</option>
                <option value="conor@123workforce.com" <?if($workForceAgent == 'conor@123workforce.com'):?>selected <?endif;?>>conor@123workforce.com</option>
            </select>
        </div>
        <div class="form-group col-md-8">
            <label for="birth_date">Languages you fluently speak</label>
            <input type="text" class="form-control" id="languages" name="languages" value="{{$languages}}">
            <small>Separated by commas</small>
        </div>
        <div class="form-group col-md-8">
            <label for="careerObjective">Career objective</label>
            <textarea class="form-control" rows="4" id="careerObjective" name="careerObjective">{{$careerObjective}}</textarea>
            <small>20-50 Words</small>
        </div>
        <div class="form-group col-md-8">
            <label for="design_styles">Professional Skills and Design style</label>
            <textarea class="form-control" rows="5" id="design_skills" name="design_styles">{{$design_styles}}</textarea>
            <small>50-200 Words</small>
        </div>
        <div class="form-group col-md-8">
            <label for="education">Education</label>
            <textarea class="form-control" rows="4" id="education" name="education">{{$education}}</textarea>
            <small>Please include all relevant design schools and/or design courses you have taken. Include the COURSE NAME & UNIVERSITY NAME</small>
        </div>
        <div class="form-group col-md-8">
            <label for="education">Trainings attend</label>
            <textarea class="form-control" rows="4" id="trainings" name="trainings">{{$trainings}}</textarea>
            <small>Please include all relevant design trainings attended in the past 3 years. Include the TRAINING NAME/TITLE, & the LOCATION where the training was held</small>
        </div>

        <div class="form-group col-md-8">
            <label for="education">Work Experience</label>
            <textarea class="form-control" rows="3" id="work_experience" name="workExperience">{{$workExperience}}</textarea>
        </div>
        <div class="form-group col-md-8">
            <label for="spec_design_skills">Specific design skills</label>
            <textarea class="form-control" rows="3" id="spec_design_skills" name="design_skills">{{$design_skills}}</textarea>
        </div>

        <div class="form-group col-md-8">
            <label style="border-bottom:1px lightgray solid ; padding: 2px;">Photo of yourself</label>
            <div class="input-group col-md-6">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="photo" name="photo">
                    <label class="custom-file-label" for="">Choose photo</label>
                </div>
            </div>
        </div>

        <div class="form-group col-md-8">
            <label for="audio_intro">Your expected Salary / payment</label> <small>(please indicate pay in your local currency)</small><br/>
            <div>
                <input type="text" style="padding: 4px 2px 8px 2px;" class="form-control d-inline-block col-md-2" id="salary" name="salary" value="{{$salary}}">
                <select class="custom-select col-md-3" id="currency" name="currency">
                    <option>Currency</option>
                    <option value="CPeso" <?if($currency == 'CPeso'):?>selected<?endif;?>>Colombian Peso</option>
                    <option value="UAH" <?if($currency == 'UAH'):?>selected<?endif;?>>Ukrainian Grivna</option>
                    <option value="PPeso" <?if($currency == 'PPeso'):?>selected<?endif;?>>Philippine Peso</option>
                    <option value="Lek" <?if($currency == 'Lek'):?>selected<?endif;?>>Albanian Lek</option>
                    <option value="Euro" <?if($currency == 'Euro'):?>selected<?endif;?>>Euro</option>
                </select>
            </div>
            <? $workingHours = ['Hourly','20 Hours per Week','40 Hours per week'] ;?>
            @foreach($workingHours as $option)
                <div class="form-check form-check-inline" style="padding-top:5px;">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="preferredTime" value="{{$option}}" <? if($option == $preferredTime):?>checked<?endif;?>>
                        {{$option}}
                    </label>
                </div>
            @endforeach
        </div>
        <hr>
        <div class="form-group col-md-8">
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form>
    <? foreach($errors->all() as $error):?>
    <div class="form-group col-md-8">
        <div class="alert alert-danger">{{$error}}</div>
    </div>
    <? endforeach;?>
</div>

@endsection