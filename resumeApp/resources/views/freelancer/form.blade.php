@extends('layouts.app')
{{-- variables : $data . freelancer userdata --}}
<?
    extract($data);
    $currFreelancer = auth()->user();
?>
@section('content')
<div class="container">
        <h3>Here you can edit your information : </h3>
        Username : <b>{{$username}}</b> <br>Profession : <b>{{$profession}}</b><br> <a target="_blank" href="/{{$username}}">Link to resume </a>
        <hr>
    <!-- Success Messages  -->
    @if(session()->has('successMessage'))
        <div class="alert alert-success">
            {{ session()->get('successMessage') }}
        </div>
    @endif
<!-- Display Errors  -->
    <? foreach($errors->all() as $error):?>
    <div class="form-group col-md-8">
        <div class="alert alert-danger">{{$error}}</div>
    </div>
    <? endforeach;?>
    <form method="post" action="{{route('freelancer.data.store')}}" enctype="multipart/form-data" class="container freelancerForm">
        {{csrf_field()}}
        <div class="form-group col-md-8">
            <label for="userName">Full name<span id="tickMarkname" class="d-none">&#10003</span></label>
            <input type="text" class="form-control" id="fullName" name="name" placeholder="Enter your name.." value="{{$name}}">
        </div> <!-- Full name -->

        <div class="form-group col-md-8">
            <label for="userName">Surname <span id="tickMarksurname" class="d-none"> &#10003</span></label>
            <input type="text" class="form-control" name="surname" placeholder="Enter your surname.." value="<? if(!empty(old('surname')))echo old('surname'); else echo $surname; ?>">
            <small class="form-text text-muted"></small>
        </div> <!-- surname -->
        <div class="form-group col-md-8">
            <label for="birth_date">Job title <span id="tickMarkjobTitle" class="d-none">&#10003</span></label>
            <input type="text" class="form-control" name="jobTitle" value="{{$jobTitle}}">
        </div> <!-- job title -->
        <div class="form-group col-md-8">
            <label for="intro">Intro <span id="tickMarkintro" class="d-none">&#10003</span></label>
            <textarea class="form-control" name="intro">{{$intro}}</textarea>
            <small>30-50 Words</small>
        </div> <!-- intro -->
        <div class="form-group col-md-8">
            <label for="birth_date">Date of birth <span id="tickMarkbirth_date" class="d-none">&#10003</span></label> <!-- TODO: edit date format to April 22, 1994 on tempelate -->
            <input type="date" class="form-control" name="birth_date" value="{{$birth_date}}">
        </div> <!-- birth date -->
        <div class="form-group col-md-8">
            <label for="birth_date">Personal email <span id="tickMarkemail" class="d-none">&#10003</span></label>
            <input type="email" class="form-control" name="email" value="{{$email}}">
            <small>Gmail is preferred</small>
        </div> <!-- email -->
        <div class="form-group col-md-8">
            <label for="birth_date">Github link <span id="tickMarkgithubLink" class="d-none">&#10003</span></label>
            <input type="text" class="form-control" name="githubLink" value="{{$github}}">
        </div> <!-- git link -->
        <div class="form-group col-md-8">
            <label for="birth_date">Stack overflow Link <span id="tickMarkstackoverflowLink" class="d-none">&#10003</span></label>
            <input type="text" class="form-control" name="stackoverflowLink" value="{{$stackoverflow}}">
        </div> <!-- stack link -->
        <div class="form-group col-md-8">
            <div class="">
                <label style="border-bottom:1px lightgray solid ; padding: 2px;">Photo of yourself <span id="tickMarkphoto" class="d-none">&#10003</span></label>
                <div class="input-group" style="padding-bottom: 10px;">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="photo" id="photoInput">
                        <label class="custom-file-label" for="">Choose photo</label>
                    </div>
                </div>
                <? $src = 'resumeApp/resources/views/customTheme/images/no-image-icon-.png';
                if(!empty($photoPath)){
                    $src = $photoPath;
                }
                ?>
                <img id="photoPreview" src="{{$src}}" width="250" height="auto">
            </div>
        </div> <!-- profile photo -->
        <div class="form-group col-md-8">
            <label for="birth_date">City <span id="tickMarkcity" class="d-none">&#10003</span></label>
            <input type="text" class="form-control" name="city" value="{{$city}}">
        </div> <!-- city -->
        <div class="form-group col-md-8">
            <label for="">Nationality <span id="tickMarknationality" class="d-none">&#10003</span></label>
            <input type="text" class="form-control" name="nationality" value="{{$nationality}}">
        </div> <!-- nationality -->
        <div class="form-group col-md-8">
            <label for="workForceAgent">123 WORKFORCE AGENTS EMAIL <span id="tickMarkworkForceAgent" class="d-none">&#10003</span></label>
            <select class="custom-select" id="workForceAgent" name="workForceAgent">
                <option selected value="">Not selected</option>
                <option value="riz@123workforce.com" <?if($workForceAgent == 'riz@123workforce.com'):?> selected<?endif;?> >riz@123workforce.com</option>
                <option value="conor@123workforce.com" <?if($workForceAgent == 'conor@123workforce.com'):?>selected <?endif;?>>conor@123workforce.com</option>
            </select>
        </div> <!-- agents mail -->
        <div class="form-group col-md-8">
            <label for="birth_date">Languages you fluently speak <span id="tickMarklanguages" class="d-none">&#10003</span></label>
            <input type="text" class="form-control" id="languages" name="languages" value="{{$languages}}">
            <small>Separated by commas</small>
        </div> <!-- Languages -->
        <div class="form-group col-md-8">
            <label for="careerObjective">Career objective <span id="tickMarkcareerObjective" class="d-none">&#10003</span></label>
            <textarea class="form-control" rows="4" id="careerObjective" name="careerObjective">{{$careerObjective}}</textarea>
            <small>20-50 Words</small>
        </div> <!-- c.objective -->
        <div class="form-group col-md-8">
            <label for="design_styles">Professional Skills and Design style <span id="tickMarkdesign_styles" class="d-none">&#10003</span></label>
            <textarea class="form-control" rows="5" id="design_skills" name="design_styles">{{$design_styles}}</textarea>
            <small>50-200 Words</small>
        </div> <!-- design style -->
        <div class="form-group col-md-8">
            <label for="googleCalendar">Google calendar src <span id="tickMarkgoogleCalendar" class="d-none">&#10003</span></label>
            <textarea class="form-control" rows="4" id="googleCalendar" name="googleCalendar">{{$googleCalendar}}</textarea>
        </div> <!-- google calendar src -->
        <div class="form-group col-md-8">
            <label for="education">Education <span id="tickMarkeducation" class="d-none">&#10003</span></label>
            <textarea class="form-control" rows="4" id="education" name="education">{{$education}}
            </textarea>
            <small>Please include all relevant design schools and/or design courses you have taken. Include the COURSE NAME & UNIVERSITY NAME</small>
        </div> <!-- Edu -->
        <div class="form-group col-md-8">
            <label for="">Work Experience <span id="tickMarkworkExperience" class="d-none">&#10003</span></label>
            <textarea class="form-control" rows="3" id="work_experience" name="workExperience">{{$workExperience}}
     </textarea>
        </div> <!-- work exp -->
        <div class="form-group col-md-8">
            <label for="education">Trainings attend <span id="tickMarktrainings" class="d-none">&#10003</span></label>
            <textarea class="form-control" rows="4" id="trainings" name="trainings">{{$trainings}}
            </textarea>
            <small>Please include all relevant design trainings attended in the past 3 years. Include the TRAINING NAME/TITLE, & the LOCATION where the training was held</small>
        </div> <!-- trainings -->
        <div class="form-group col-md-8">
            <label for="personal_interests">Professional interests <span id="tickMarkpersonal_interests" class="d-none">&#10003</span></label>
            <textarea class="form-control" rows="3" id="personal_interests" name="personal_interests">{{$personal_interests}}</textarea>
            <small>Kindly enumerate your hobbies and/or things you’d personally like to do in the future.</small>
        </div> <!-- interests -->
        <div class="form-group col-md-8">
            <label for="professional_attributes">Professional attributes <span id="tickMarkprofessional_attributes" class="d-none">&#10003</span></label>
            <textarea class="form-control" rows="3" id="professional_attributes" name="professional_attributes">{{$professional_attributes}}</textarea>
            <small>Kindly describe yourself in the workplace. Are you a team player, detail oriented, organized, etc.?</small>
        </div> <!-- attributes -->

        <div class="form-group row">
            <label class="col-md-12" style="border-bottom:1px lightgray solid ; padding: 5px;">Please Upload 8 examples of your design work (800 wide x 600 high)</label>
            @for($i=0;$i<8;$i++)
                <?
                $deleteBtn = false;
                $src = 'resumeApp/resources/views/customTheme/images/no-foto.png';
                $uploadBtn = 'Choose file';
                foreach ($works as $work){
                    if(strpos($work , 'works'.$i) !== false ){
                        $src = $work;
                        $deleteBtn = true;
                        $uploadBtn = 'Change file';
                    }
                }

                ?>
                <div class="input-group col-md-3">
                    <div class="custom-file" id="customFile{{$i}}" style="padding-top: 5px;">
                        <input type="file" class="custom-file-input" id="works{{$i}}" name="works{{$i}}" value="">
                        <label class="custom-file-label" for="">{{$uploadBtn}}</label>
                    </div>
                        @if($deleteBtn)
                            <p class="btn btn-danger btn-sm" style="width:33px;height:25px;margin-left: 5px;" id="deletePhoto{{$i}}">X</p>
                        @endif
                        <div>
                            <img src="{{$src}}" id="portfolioImg{{$i}}"  width="100%" height="auto" style="padding: 10px;">
                        </div>
                </div>
            @endfor
        </div>      <!-- works -->
        <div class="form-group col-md-8">
            <label for="spec_design_skills">Specific design skills <span id="tickMarkdesign_skills" class="d-none">&#10003</span></label>
            <textarea class="form-control" rows="3" id="spec_design_skills" name="design_skills">{{$design_skills}}</textarea>
        </div> <!-- design skills -->
        <div class="form-group col-md-8">
            <label style="border-bottom:1px lightgray solid ; padding: 2px;">Top 6 design skills that you are good at  <span id="tickMarkdesign_skills_checkbox" class="d-none">&#10003</span></label>
            <? $skills = [
                'UI design','UX design','Logo design','Animation','Motion Graphics','Illustration',
                'Advertising','Branding','Brochure Design','Website Design','Game Designer',
                'Character Design','Digital Painting','Creative Director',' HTML / CSS'
            ] ;?>
            <div class="form-check">
                @foreach($skills as $skill)
                    <label class="form-check-label col-md-3">
                        <input class="form-check-input" type="checkbox" name="design_skills_checkbox[]" value="{{$skill}}"
                         <? if(in_array($skill,$skillsCheckBox)): ?> checked <?endif;?> >
                        {{$skill}}
                    </label>
                @endforeach
            </div>
        </div> <!-- design skills checkbox -->
        <div class="form-group col-md-8">
            <label style="border-bottom:1px lightgray solid ; padding: 2px;">Please choose 6 primary skills</label>
            <?
            $designSkills = [
                'Adobe After Effects', 'Sketch', 'Adobe Illustrator', 'Adobe XD', 'Photoshop', 'Autocad',
                'Solidworks', 'Adobe Flash', 'Digital Drawing Tablet', 'Adobe Indesign', 'CorelDraw', '3d Max'
            ];
            ?>
            <div class="form-check">
                @foreach($designSkills as $skill)
                    <label class="form-check-label col-md-4">
                        <input class="form-check-input" type="checkbox" name="primarySkills[]" value="{{$skill}}"
                               <? if(in_array($skill,$PrimarySkillsCheckBox)): ?> checked <?endif;?>>
                        {{$skill}}
                    </label>
                @endforeach
            </div>
        </div> <!-- primary skills -->
        <div class="form-group col-md-12">
            <label style="border-bottom:1px lightgray solid ; padding: 2px;">Please choose 6 character skills</label>
            <?
            $charSkills = ['Adventurous:  I take risks.', 'Ambitious:  I am driven to succeed.', 'Approachable:  I work well with others.',
                'Articulate:  I can express myself well in front of groups.','Autonomous:  I use initiative.', 'Calm:  I stay level headed in a crisis.', 'Charismatic:  I can be a leader when need be.',
                'Cheerful:  I develop a positive work environment.', 'Clever:  I can juggle multiple tasks.', 'Competitive:   I thrive under pressure.',
                'Confident:  I am not afraid to ask questions.', 'Cooperative:  I get along well in a team setting.', 'Courteous:  I care about workplace atmosphere.',
                'Creative:  I think outside the box.',
                'Curiosity:  I am eager to learn.',
                'Determined:   I am self-motivated.',
                'Devoted:  I am committed to the company’s success.',
                'Diligent:   I always work my hardest.',
                'Easygoing:  I easily adapt to new situations.',
                'Educated:  I possess formal training.',
                'Efficient:  I have very quick turnover time.',
                'Eloquent:  I have strong communication skills.',
                'Energetic: I am able to work long and hard hours.',
                'Enthusiastic:  I put my all into every project.',
                'Flexible:  I am able to adapt my priorities.',
                'Focused:  I am goal-oriented.',
                'Friendly:   I am easy to work with.',
                'Honest:  I value integrity.',
                'Imaginative:  I am inventive in my work process.',
                'Independent:  I need little direction.',
                'Inexperienced:  I am a blank pallet.',
                'Inquisitive:  I am excellent at gathering information.',
                'Insightful:  I can read between the lines.',
                'Intuitive:  I can sense when there is a problem.',
                'Meticulous:  I pay attention to the small details.',
                'Neurotic:  I am a perfectionist.',
                'Open-minded:  I take constructive criticism well.',
                ' Opinionated:  I am comfortable voicing opinions.',
                'Organized:  I am a meticulous planner.',
                'Patient:  I am not easily ruffled.',
                'Perceptive:  I can read people effortlessly.',
                'Persuasive:  I am a natural salesperson.',
                'Procedural:  I work best with structure.',
                'Punctual:  I have great time management skills.',
                'Quiet:  I am a great listener.',
                'Relaxed:  I do not stress easily.',
                'Resourceful:  I use every tool at hand.',
                'Responsible:  I always finish a task on time.',
                'Talkative:  I am comfortable initiating a dialogue.',
                'Technological:  I am industrially savvy.',
            ] ;
            ?>
            <div class="form-check">
                @foreach($charSkills as $skill)
                    <label class="form-check-label col-md-5">
                        <input class="form-check-input" type="checkbox" name="charSkills[]" value="{{$skill}}"
                               <? if(in_array($skill,$charSkillsCheckBox)): ?> checked <?endif;?> >
                        {{$skill}}
                    </label>
                @endforeach
            </div>
        </div> <!-- char skills -->
        <div class="form-group col-md-8">
            <label for="audio_intro">Audio introduction  <span id="tickMarkaudio" class="d-none">&#10003</span></label>
            <input type="text" class="form-control" id="audio_intro" name="audio"
                   value="https://drive.google.com/file/d/{{$audio}}/view">
            <small>Please paste above a link to your audio introduction of self. 2min to 3min is the ideal recording length. Kindly introduce yourself and answer these questions: Why did you become a designer?, Were you able to acquire a formal design education? What do you love most about your work?, What tools do you use for design?, What inspires you to do your work?</small>
        </div>  <!-- Audio -->
        <div class="form-group col-md-8">
            <? $workingHours = ['Hourly','20 Hours per Week','40 Hours per week'] ;?>
            <label style="border-bottom:1px lightgray solid ; padding: 2px;">Hours you are available for work  <span id="tickMarkavailableHours" class="d-none">&#10003</span></label>
            @foreach($workingHours as $option)
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="availableHours[]" value="{{$option}}"
                               <? if(in_array($option,$availableHoursCheckBox)): ?> checked <?endif;?> >
                        {{$option}}
                    </label>
                </div>
            @endforeach
        </div>  <!-- Hours availabel -->
        <?$days=['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];?>
        <div class="form-group col-md-8" >
            <label style="border-bottom:1px lightgray solid ; padding: 2px;">Hours you are available everyday : </label>
            <div class="row">
                <div class="col-md-2">

                </div> <div class="col-md-2 text-center">
                    <b>From</b>
                </div> <div class="col-md-2 text-center">
                    <b>To</b>
                </div>
            </div>
            <? $totalHours = 0 ;?>
            <? foreach ($days as $day):?>
                <?
                $DBColumn = $day.'Hours';
                $hours = $currFreelancer = auth()->user()->userData->{$DBColumn};
                $hoursArr = explode(',',$hours);
                $from = $hoursArr[0] ?? '';
                $to   = $hoursArr[1] ?? '';
                if(!empty($from) && !empty($to)){
                    $totalHours += $to-$from ;
                }
                ?>
                <div class="row">
                <div class="col-md-2" style="padding-top: 6px;">
                    <b>{{$day}}</b>
                </div>
                <div class="input-group col-md-2" style="margin: 2px;">
                    <select class="custom-select" id="{{$day}}From" name="{{$day}}From">
                        <option  selected disabled="">From</option>
                        <? for($i=0;$i<24;$i++):?>
                            <option value="{{$i}}" <? if($i == $from):?>selected<?endif;?> ><?if($i<10):?>0<?endif;?>{{$i}}:00</option>
                        <? endfor;?>
                    </select>
                </div>
                <div class="input-group col-md-2" style="margin: 2px;">
                    <select class="custom-select" id="{{$day}}To" name="{{$day}}To">
                        <option selected disabled>To</option>
                        <? for($i=0;$i<24;$i++):?>
                        <option value="{{$i}}" <? if($i == $to):?>selected<?endif;?>><?if($i<10):?>0<?endif;?>{{$i}}:00</option>
                        <? endfor;?>
                    </select>
                </div>
            </div>
            <? endforeach;?>
            <div style="padding-top: 10px;" class="col-md-6">
                <b style="border-radius: 5px; border: gray 2px solid; padding: 8px;">Total working hours of a week : <span id="totalHours" style="font-size: large;">{{$totalHours}}</span> Hours</b>
            </div>
        </div> <!-- Hours per week Dropdowns -->

<hr>
        <div class="form-group col-md-8">
            <label for="audio_intro">Your expected Salary / payment <span id="tickMarksalary" class="d-none">&#10003</span></label> <small>(please indicate pay in your local currency)</small><br/>
            <div>
                <input type="text" style="padding: 4px 2px 8px 2px;" class="form-control d-inline-block col-md-2" id="salary" name="salary" value="{{$salary}}">
                <select class="custom-select col-md-3" id="currency" name="currency">
                    <option value="">Currency</option>
                    <option value="CPeso" <?if($currency == 'CPeso'):?>selected<?endif;?>>Colombian Peso</option>
                    <option value="UAH" <?if($currency == 'UAH'):?>selected<?endif;?>>Ukrainian Grivna</option>
                    <option value="PPeso" <?if($currency == 'PPeso'):?>selected<?endif;?>>Philippine Peso</option>
                    <option value="Lek" <?if($currency == 'Lek'):?>selected<?endif;?>>Albanian Lek</option>
                    <option value="Euro" <?if($currency == 'Euro'):?>selected<?endif;?>>Euro</option>
                </select>
            </div>
            @foreach($workingHours as $option)
                <div class="form-check form-check-inline" style="padding-top:5px;">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="preferredTime" value="{{$option}}" <? if($option == $preferredTime):?>checked<?endif;?>>
                        {{$option}}
                    </label>
                </div>
            @endforeach
        </div>  <!-- Slary  -->
        <hr>
        <label class="form-check-label col-md-3">
            <input class="form-check-input" type="checkbox" name="terms" value="agree"
                   <? if($terms == 'agree'): ?> checked onclick="return false;"<?endif;?> >
                  Agree with terms and conditions
        </label>
        <hr>
        <div class="form-group col-md-8">
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>  <!-- Save -->
    </form>
</div>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>