@extends('layouts.app')
{{-- variables : $data . freelancer userdata --}}
<?
    extract($data);
    $currFreelancer = auth()->user();
?>
@section('content')
    <div class="row m-auto infoBar">
        <div class="col-md-2">
            Username : <b>{{$username}}</b>
        </div>
        <div class="col-md-2">
            Profession : <b>{{$profession}}</b>
        </div>
        <div class="col-md-2  offset-md-6">
            <a target="_blank" href="/{{$username}}">Link to resume </a>
        </div>

    </div>
<div class="container">
    <div class="text-center">
        <h3>On this page you can edit/update your CV/Resume.</h3>
        <h5 class="container text-left paddingBottomTop">
            It is important to keep your available hours that you can work updated.<br/> Once your page here is completed & approved, our team will start to promote your Resume to companies seeking to hire.<br/> Once selected, you will then be asked for Skype interviews.
        </h5>
    </div>
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
            <label for="birth_date">Job title <span id="tickMarkjobTitle" class="d-none">&#10003</span></label>
            <?
            $developer = [
                'Full-Stack Developer', 'Front-End Developer', 'PHP Developer',
                'Javascript Developer', '.NET Developer',
                'iOS Developer', 'Android Developer', 'Swift Developer',
                'Java Developer','Data Scientist','C C++ Developer' , 'Team Leader' ,
                'Unity Developer' , 'Ruby Developer','Python Developer' , 'SQL Developer' ,'Wordpress Developer'
            ];
            $designer =['UI/UX Designer','UI Designer',' UX Designer',
                'Illustrator','Motion Graphics','Art Director','Branding',
                'Graphic Designer',' Web Designer','Game Designer','Digital Artist'];
            ?>
            <select class="custom-select" id="jobTitle" name="jobTitle">
                <? if($profession == 'Developer'):?>
                    <option value="" selected disabled>-- Developer --</option>
                    <? foreach($developer as $job):?>
                    <option value="{{$job}}" <?if($jobTitle == $job):?>selected<?endif;?> >{{$job}}</option>
                    <? endforeach;?>
                <?else:?>
                    <option value="" disabled selected>-- Designer --</option>
                    <? foreach($designer as $job):?>
                    <option value="{{$job}}"<?if($jobTitle == $job):?>selected<?endif;?>>{{$job}}</option>
                    <? endforeach;?>
                <? endif;?>
            </select>
        </div> <!-- job title -->
        <div class="form-group col-md-8">
            <label for="intro">Intro <span id="tickMarkintro" class="d-none">&#10003</span></label>
            <textarea class="form-control" name="intro">{{$intro}}</textarea>
            <small>30-50 Words</small>
        </div> <!-- intro -->
        <div class="form-group col-md-8">
            <? $workingHours = ['10 Hours per Week','20 Hours per Week','30 Hours per Week','40 Hours per week'] ;?>
            <label style="border-bottom:1px lightgray solid ; padding: 2px;">Current available hours <span id="tickMarkavailableHours" class="d-none">&#10003</span></label>
                {{$k=1}}
                @foreach($workingHours as $option)
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" id="hours{{$k}}" type="checkbox" name="availableHours[]" value="{{$option}}"
                               <? if(in_array($option,$availableHoursCheckBox)): ?> checked <?endif;?> >
                        {{$option}}
                    </label>
                </div>
                <? $k++; ?>
                @endforeach
        </div>  <!-- Hours availabel -->
        <div class="form-group col-md-8">
            <label for="audio_intro">Expected Salary in (US Dollars ) USD per hour <span id="tickMarksalary" class="d-none">&#10003</span></label><br/>
            <div>
                <input type="text" style="padding: 4px 2px 8px 2px;" class="form-control d-inline-block col-md-2" id="salary" name="salary" value="<? if(!empty($salary)){echo $salary;}else{echo 0;}?>">
                <input class="custom-select col-md-3" id="currency" name="currency" value="USD">
            </div>
            <? foreach($availableHoursCheckBox as $check):?>
                <? $hours  = (int)filter_var($check, FILTER_SANITIZE_NUMBER_INT) ?? 1 ;
                   $salary = (int) $salary ;  ?>
            <? endforeach;?>
            <? for($i=1;$i<=4;$i++ ):?>
                <p id="paidSalary{{$i}}" class="d-none">At <span id="paidDays{{$i}}"></span> you will be paid <span id="totalPaid{{$i}}">{{$salary * $hours}}</span> usd </p>
            <? endfor;?>
        </div>  <!-- Salary  -->
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
            if(!empty($from) || !empty($to)){
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
            <? if($totalHours > 0):?>
                <div style="padding-top: 10px;" class="col-md-6 col-sm-12 col-xs-12 input-group">
                    <b style="border-radius: 5px; border: gray 2px solid; padding: 8px;">Total working hours of a week : <span id="totalHours" style="font-size: large;">{{$totalHours}}</span> Hours</b>
                </div>
            <? endif;?>
        </div> <!-- Hours per week Dropdowns --><br/>

        <div class="form-group col-md-8">
            <div class="">
                If you are currently employed / have ongoing projects and will be available for work in the future please select a date in the future that you will be free , if you are currently available please select todays date.
            </div>
            <label for="freeDate"><span id="tickMarkfreeDate" class="d-none">&#10003</span></label>
            <input type="date" class="form-control" name="freeDate" value="{{$freeDate}}">
        </div>

        <div class="form-group col-md-8">
            <label for="birth_date">Primary contact Email<span id="tickMarkemail" class="d-none">&#10003</span></label>
            <input type="email" class="form-control" name="email" value="{{$email}}">
            <small>Gmail is preferred</small>
        </div> <!-- email -->

        {{-- Developer --}}
        <? if($profession == 'Developer'):?>
            <div class="form-group col-md-8">
                <label for="birth_date">Github link <span id="tickMarkgithubLink" class="d-none">&#10003</span></label>
                <input type="text" class="form-control" name="githubLink" value="{{$github}}">
            </div> <!-- git link -->
            <div class="form-group col-md-8">
                <label for="birth_date">Stack overflow Link <span id="tickMarkstackoverflowLink" class="d-none">&#10003</span></label>
                <input type="text" class="form-control" name="stackoverflowLink" value="{{$stackoverflow}}">
            </div> <!-- stack link -->
        <?else:?>
        {{-- Designer --}}
            <div class="form-group col-md-8">
                <label for="behanceLink"> Behance Link <span id="tickMarkbehanceLink" class="d-none">&#10003</span></label>
                <input type="text" class="form-control" name="behanceLink" value="{{$behanceLink}}">
            </div> <!-- Behance Link -->
            <div class="form-group col-md-8">
                <label for="birth_date"> Instagram Link <span id="tickMarkinstagramLink" class="d-none">&#10003</span></label>
                <input type="text" class="form-control" name="instagramLink" value="{{$instagramLink}}">
            </div> <!-- Instagram Link -->
            <div class="form-group col-md-8">
                <label for="birth_date"> Dribble Link <span id="tickMarkdribbleLink" class="d-none">&#10003</span></label>
                <input type="text" class="form-control" name="dribbleLink" value="{{$dribbleLink}}">
            </div> <!-- Dribble link -->
        <? endif;?>
        <div class="form-group col-md-8">
            <label for="birth_date"> Personal Website Link <span id="tickMarkpersonalSite" class="d-none">&#10003</span></label>
            <input type="text" class="form-control" name="personalSite" value="{{$personalSite}}">
        </div> <!-- site link -->
        <div class="form-group col-md-8">
            <label for="birth_date">City where you live & work<span id="tickMarkcity" class="d-none">&#10003</span></label>
            <input type="text" class="form-control" name="city" value="{{$city}}">
        </div> <!-- city -->
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
            <label for="birth_date">Languages you speak at a high level<span id="tickMarklanguages" class="d-none">&#10003</span></label>
            <input type="text" class="form-control" id="languages" name="languages" value="{{$languages}}">
            <small>Separated by commas</small>
        </div> <!-- Languages -->
        <div class="form-group col-md-8">
            <label for="careerObjective">Career objective <span id="tickMarkcareerObjective" class="d-none">&#10003</span></label>
            <textarea class="form-control" rows="4" id="careerObjective" name="careerObjective">{{$careerObjective}}</textarea>
            <small>20-50 Words</small>
        </div> <!-- c.objective -->
        <div class="form-group col-md-8">
            <label for="education">Education <span id="tickMarkeducation" class="d-none">&#10003</span></label>
            <textarea class="form-control" rows="4" id="education" name="education">{{$education}}
            </textarea>
            <small>Please include all relevant   <? if($profession == 'Developer'):?>development<?else:?>design<?endif;?> schools and/or  <? if($profession == 'Developer'):?>development<?else:?>design<?endif;?> courses you have taken. Include the COURSE NAME & UNIVERSITY NAME</small>
        </div> <!-- Edu -->

        <div class="form-group col-md-8">
            <label for="design_styles">Professional Skills and <? if($profession == 'Developer'):?>Development<?else:?>Design<?endif;?> style <span id="tickMarkdesign_styles" class="d-none">&#10003</span></label>
            <textarea class="form-control" rows="5" id="design_skills" name="design_styles">{{$design_styles}}</textarea>
            <small>50-200 Words</small>
        </div> <!-- design style -->

        <div class="form-group col-md-8">
            <label for="">Work Experience <span id="tickMarkworkExperience" class="d-none">&#10003</span></label>
            <textarea class="form-control" rows="3" id="work_experience" name="workExperience">{{$workExperience}}
     </textarea>
        </div> <!-- work exp -->

        <div class="form-group col-md-8">
            <label for="education">Trainings attend <span id="tickMarktrainings" class="d-none">&#10003</span></label>
            <textarea class="form-control" rows="4" id="trainings" name="trainings">{{$trainings}}
            </textarea>
            <small>Please include all relevant  <? if($profession == 'Developer'):?>development<?else:?>design<?endif;?> trainings attended in the past 3 years. Include the TRAINING NAME/TITLE, & the LOCATION where the training was held</small>
        </div> <!-- trainings -->

        <div class="form-group col-md-8">
            <label for="personal_interests">Professional interests <span id="tickMarkpersonal_interests" class="d-none">&#10003</span></label>
            <textarea class="form-control" rows="3" id="personal_interests" name="personal_interests">{{$personal_interests}}</textarea>
            <small>Your hobbies and/or things you’d personally like to do in the future / How do you spend your free time. </small>
        </div> <!-- interests -->

        <div class="form-group col-md-8">
            <label for="professional_attributes">Personal attributes <span id="tickMarkprofessional_attributes" class="d-none">&#10003</span></label>
            <textarea class="form-control" rows="3" id="professional_attributes" name="professional_attributes">{{$professional_attributes}}</textarea>
            <small>Kindly describe yourself in the workplace. Are you a team player, detail oriented, organized, etc.?</small>
        </div> <!-- attributes -->

        <div class="form-group row">
            <label class="col-md-12" style="border-bottom:1px lightgray solid ; padding: 5px;">Please Upload 8 examples of your  <? if($profession == 'Developer'):?>development<?else:?>design<?endif;?> work (800 wide x 600 high)</label>
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
            <label style="border-bottom:1px lightgray solid ; padding: 2px;">
                <? if($profession == 'Designer'):?>
                    Top 6 Design skills
                <? else: ?>
                    Top 6 Development Skills
                <? endif;?>

            <span id="tickMarkdesign_skills_checkbox" class="d-none">&#10003</span>

            </label>
            <? $skillsDesigner = [
                'UI design','UX design','Logo design','Animation','Motion Graphics','Illustration',
                'Advertising','Branding','Brochure Design','Website Design','Game Designer',
                'Character Design','Digital Painting','Creative Director',' HTML / CSS'
            ];
                $skillsDeveloper = ['JavaScript','SQL','Java','C#','Python','PHP',
                    'C++','C','TypeScript','Ruby','Objective-C','Swift','VB.NET','Go',
                    'Perl','Scala','Groovy','Assembly','CoffeeScript','VBA','R','Matlab','Visual Basic 6','Lua',
                    'Haskell','HTML','CSS'];
            ?>
            <div class="form-check">
                <? if($profession == 'Designer'):?>
                @foreach($skillsDesigner as $skill)
                    <label class="form-check-label col-md-3">
                        <input class="form-check-input" type="checkbox" name="design_skills_checkbox[]" value="{{$skill}}"
                         <? if(in_array($skill,$skillsCheckBox)): ?> checked <?endif;?> >
                        {{$skill}}
                    </label>
                @endforeach
                <? else:?>
                @foreach($skillsDeveloper as $skill)
                    <label class="form-check-label col-md-3">
                        <input class="form-check-input" type="checkbox" name="design_skills_checkbox[]" value="{{$skill}}"
                               <? if(in_array($skill,$skillsCheckBox)): ?> checked <?endif;?> >
                        {{$skill}}
                    </label>
                @endforeach
                    <? endif;?>
            </div>
        </div> <!-- design skills checkbox -->

        <div class="form-group col-md-8">
            <label  style="border-bottom:1px lightgray solid ; padding: 2px;">
                <? if($profession == 'Designer'):?>
                6 Primary Skills
                <? else: ?>
                6 Frameworks/ Libraries / Databases you can use most proficiently
                <? endif;?>
            </label>

            <?
            $designSkills = [
                'Adobe After Effects', 'Sketch', 'Adobe Illustrator', 'Adobe XD', 'Photoshop', 'Autocad',
                'Solidworks', 'Adobe Flash', 'Digital Drawing Tablet', 'Adobe Indesign', 'CorelDraw', '3d Max'
            ];
            $developSkills = [
                'AngularJS','Node.js','.NET Core','React','Cordova','Firebase','Xamarin',
                'Hadoop','Spark','MySQL','SQL Server','PostgreSQL','SQLite','MongoDB','Oracle','Redis',
                'Cassandra'
            ];
            ?>
            <div class="form-check">
                <? if($profession == 'Designer'):?>
                    @foreach($designSkills as $skill)
                        <label class="form-check-label col-md-4">
                            <input class="form-check-input" type="checkbox" name="primarySkills[]" value="{{$skill}}"
                                   <? if(in_array($skill,$PrimarySkillsCheckBox)): ?> checked <?endif;?>>
                            {{$skill}}
                        </label>
                    @endforeach
                <? else: ?>
                    @foreach($developSkills as $skill)
                        <label class="form-check-label col-md-4">
                            <input class="form-check-input" type="checkbox" name="primarySkills[]" value="{{$skill}}"
                                   <? if(in_array($skill,$PrimarySkillsCheckBox)): ?> checked <?endif;?>>
                            {{$skill}}
                        </label>
                    @endforeach
                <? endif;?>
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
            <small>Please paste above a link to your audio introduction of self. 2min to 3min is the ideal recording length. Kindly introduce yourself and answer these questions: Why did you become a  <? if($profession == 'Developer'):?>developer<?else:?>designer<?endif;?>?, Were you able to acquire a formal  <? if($profession == 'Developer'):?>development<?else:?>design<?endif;?> education? What do you love most about your work?, What tools do you use for  <? if($profession == 'Developer'):?>development<?else:?>design<?endif;?>?, What inspires you to do your work?</small>
        </div>  <!-- Audio -->



<hr>

        <div class="form-group col-md-8">
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>  <!-- Save -->
    </form>
</div>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>