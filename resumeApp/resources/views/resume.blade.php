<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Responsive Personal Portfolio vCard Template">
        <meta name="author" content="Ahmed Marzouk">
        <title>{{$user->name}} Resume</title>

        <!-- Web Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Font Awesome CSS -->
        <link href="resumeApp/resources/views/customTheme/css/font-awesome.min.css" rel="stylesheet" media="screen">
        <!-- Animate css -->
        <link href="resumeApp/resources/views/customTheme/css/animate.css" rel="stylesheet">
        <!-- Magnific css -->
        <link href="resumeApp/resources/views/customTheme/css/magnific-popup.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <link rel="shortcut icon" href="resumeApp/resources/views/customTheme/images/logo123.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="resumeApp/resources/views/customTheme/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="resumeApp/resources/views/customTheme/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="resumeApp/resources/views/customTheme/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="resumeApp/resources/views/customTheme/images/ico/apple-touch-icon-57-precomposed.png">

        <link href="resumeApp/resources/views/customTheme/css/main.css" rel="stylesheet" media="screen">

        <title>{{$user->name}} Resume</title>

    </head>
    <body>
        <? // check developer of designer :
            $developer = $designer = false;
            if($profession == 'Developer'){
                $developer = true;
            }elseif($profession == 'Designer'){
                $designer = true;
            }
        ?>

        <div id="navBar">
            <nav class="navbar navbar-expand-lg customNav">
                <a class="navbar-brand col-9 col-md-3" href="/">
                    <img src="resumeApp/resources/views/customTheme/images/newResume/123wf_logo.png" alt="logo">
                </a>
                <button class="navbar-toggler col-2" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <img src="resumeApp/resources/views/customTheme/images/newResume/menu.png" alt="menu" width="46px">
                </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link customNavLink active" href="#">Homepage</a>
                        <a class="nav-item nav-link customNavLink" href="/form/client/register/">Become a client</a>
                        <a class="nav-item nav-link customNavLink" href="#">Talk to sales</a>
                        <a href="/form/client/login/" class="loginBtn">Login</a>
                    </div>
                </div>
            </nav>
        </div>

        <div id="freelancersInfo">
            <div class="row text-center">
                <div class="col-md-12">
                    <div class="freelancerItem">
                        <img src="{{$user->photo}}" alt="freelancer" class="freelancerImg" width="220" height="220">
                        <div class="freelancerData">
                            <div class="freelancerName">
                                {{$user->name}}
                            </div>
                            <div class="freelancerJob">
                                {{$user->jobTitle}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-2 offset-md-4">
                    <div class="buttonMain">
                        <a class="hireBtn btn-block hire" href="#">Hire Me</a>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="buttonMain">
                        <a class="hireBtn btn-block" href="#">Send me message </a>
                    </div>
                </div>
            </div>
        </div>

        <div id="quote">
            <div class="row">
                <div class="col-md-1 offset-md-1">
                    <img src="resumeApp/resources/views/customTheme/images/newResume/quote.png" alt="quote">
                </div>
               <div class="col-md-10">
                   <div class="quoteText">
                       {{$user->intro}}
                   </div>
               </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div id="navBar">
                    <nav class="navbar navbar-expand-lg customNav">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar2" aria-controls="navbar2" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon">
                                <img src="resumeApp/resources/views/customTheme/images/newResume/menu.png" alt="menu" width="46px">
                            </span>
                        </button>
                        <div class="collapse navbar-collapse" id="#navbar2">
                            <div class="navbar-nav">
                                <a class="nav-item nav-link secondNavLink active " href="#about">About</a>
                                <a class="nav-item nav-link secondNavLink " href="#audio">Resume</a>
                                <a class="nav-item nav-link secondNavLink " href="#skills">Skills</a>
                                <a class="nav-item nav-link secondNavLink " href="#work">Work</a>
                                <a class="nav-item nav-link secondNavLink " href="#ourClients">Contact</a>
                                <a href="#" class="downCV">
                                    <img src="resumeApp/resources/views/customTheme/images/newResume/download_cv.png" style="width: 20px;">
                                    <img src="resumeApp/resources/views/customTheme/images/newResume/Download CV.png" style="width: 100px;padding-top: 6px;padding-left: 5px;">
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

        {{-- About me Section --}}
        <div id="about">
            <div class="row">
                <div class="col-md-5 offset-md-1">
                    <div class="row">
                        <div class="col-md-1 col-1">
                            <img src="resumeApp/resources/views/customTheme/images/newResume/about_me.png" alt="aboutImg" width="30px;">
                        </div>
                        <div class="col-md-10 col-10">
                            <div class="aboutText">
                                ABOUT ME<br>
                                <div class="row">
                                    <div class="col-12 aboutSubText">
                                        <p>Lang: {{$user->languages}}</p>
                                    </div>
                                    <div class="col-12 aboutSubText">
                                        <p>Email: riz@123workforce.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-1 col-1">
                            <img src="resumeApp/resources/views/customTheme/images/newResume/what_i_do.png" alt="aboutImg" width="30px;">
                        </div>
                        <div class="col-md-10 col-10">
                            <div class="aboutText">
                                WHAT I DO?<br> {{-- 6 primary skills --}}
                                <div class="row">
                                    <div class="col-md-6 col-6 aboutSubText">
                                        <? $counter = count($primarySkills);
                                        if($counter > 6 ){
                                            $counter = 6 ;
                                        }
                                        ?>
                                        <? if($counter > 1):?>
                                            <? for($i=0; $i < $counter/2;$i++): ?>
                                                <p><span class="circle"></span>{{$primarySkills[$i]}}</p>
                                            <? endfor;?>
                                    </div>
                                    <div class="col-md-6 col-6 aboutSubText">
                                        <? for($i= $counter-1; $i > ($counter/2) -1 ;$i--): ?>
                                            <p><span class="circle"></span>{{$primarySkills[$i]}}</p>
                                        <? endfor;?>
                                    </div>
                                        <? endif;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- audio introduction section --}}
        <div id="audio">
            <div class="row">
                <div class="col-md-1 offset-md-1">
                    <img src="resumeApp/resources/views/customTheme/images/newResume/audio.png" alt="audio">
                </div>
                <div class="col-md-4">
                    <div class="quoteText">
                        Audio Introduction
                    </div>
                </div>
                <?
                    $valid = true;
                    $notValidText = 'NOT-VALID-LINK';
                    if ($user->audio == $notValidText) {
                        $valid = false;
                    }
                    $audioSrc = "";
                    if(!empty(trim($user->audioFile))){
                        $audioSrc = $user->audioFile;
                    }else{
                        if($valid){
                            $audioSrc = "https://drive.google.com/uc?export=download&id=".$user->audio."&key=AIzaSyC0bK_7ASw3QylYDzs_Pqo_TeoI7jfFj8M";
                        }else{
                            $audioSrc = "" ;
                        }
                    }
                ?>
                <div class="col-md-5">
                    <audio id="audioIntro" controls>
                        <source src="{{$audioSrc}}" type="audio/ogg">
                        Your browser does not support the audio element.
                    </audio>
                </div>
            </div>
        </div>

        {{-- Education and Trainings section --}}
        <div id="about" class="education">
            <div class="row">
                <div class="col-md-5 offset-md-1">
                    <div class="row">
                        <div class="col-md-1 col-1">
                            <img src="resumeApp/resources/views/customTheme/images/newResume/education.png" alt="aboutImg" width="30px;">
                        </div>
                        <div class="col-md-10 col-10">
                            <div class="aboutText">
                                Education<br>
                                <? if(!empty($user->eduTitle1)):?>
                                    <div class="row">
                                    <div class="col-md-12 aboutSubText">
                                        <div class="year"><span class="circle"></span> {{$user->eduYear1}}</div>
                                        <div class="title">{{$user->eduTitle1}}</div>
                                        <div class="desc">{{$user->eduDesc1}}</div>
                                    </div>
                                </div><br/>
                                <? endif; ?>
                                <? if(!empty($user->eduTitle2)):?>
                                    <div class="row">
                                    <div class="col-md-10 aboutSubText">
                                        <div class="year"><span class="circle"></span> {{$user->eduYear2}}</div>
                                        <div class="title">{{$user->eduTitle2}}</div>
                                        <div class="desc">{{$user->eduDesc2}}</div>
                                    </div>
                                </div><br/>
                                <? endif; ?>
                                <? if(!empty($user->eduTitle3)):?>
                                    <div class="row">
                                    <div class="col-md-10 aboutSubText">
                                        <div class="year"><span class="circle"></span> {{$user->eduYear3}}</div>
                                        <div class="title">{{$user->eduTitle3}}</div>
                                        <div class="desc">{{$user->eduDesc3}}</div>
                                    </div>
                                </div>
                                <? endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-1 col-1">
                            <img src="resumeApp/resources/views/customTheme/images/newResume/trainings.png" alt="aboutImg" width="30px;">
                        </div>
                        <div class="col-md-10 col-10">
                            <div class="aboutText">
                                TRAININGS<br>
                                <? if(!empty($user->trnTitle1)):?>
                                    <div class="row">
                                    <div class="col-md-12 aboutSubText">
                                        <div class="year"><span class="circle"></span> {{$user->trnYear1}}</div>
                                        <div class="title">{{$user->trnTitle1}}</div>
                                        <div class="desc">{{$user->trnDesc1}}</div>
                                    </div>
                                </div><br/>
                                <? endif; ?>
                                <? if(!empty($user->trnTitle3)):?>
                                    <div class="row">
                                    <div class="col-md-10 aboutSubText">
                                        <div class="year"><span class="circle"></span> {{$user->trnYear2}}</div>
                                        <div class="title">{{$user->trnTitle2}}</div>
                                        <div class="desc">{{$user->trnDesc2}}</div>
                                    </div>
                                </div><br/>
                                <? endif; ?>
                                <? if(!empty($user->trnTitle3)):?>
                                    <div class="row">
                                    <div class="col-md-10 aboutSubText">
                                        <div class="year"><span class="circle"></span> {{$user->trnYear3}}</div>
                                        <div class="title">{{$user->trnTitle3}}</div>
                                        <div class="desc">{{$user->trnDesc3}}</div>
                                    </div>
                                </div>
                                <? endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        {{-- Skills section --}}
        <div id="skills" class="skills">
            <div class="row">
                <div class="col-md-5 offset-md-1">
                    <div class="row">
                        <div class="col-md-1 col-1">
                            <img src="resumeApp/resources/views/customTheme/images/newResume/skills.png" alt="aboutImg" width="30px;">
                        </div>
                        <div class="col-md-10 col-10">
                            <div class="aboutText">
                                SKILLS<br>
                                <div class="row">
                                    <div class="col-md-12 aboutSubText">
                                        <? $design_skills_checkBoxes = explode(',',$user->design_skills_checkbox)?>
                                        <? $counter = count($design_skills_checkBoxes);
                                        if($counter > 6 ){
                                            $counter = 6 ;
                                        }
                                        ?>
                                        <? if($counter > 0):?>
                                        @for($i=0; $i<$counter/2; $i++)
                                                <p class="skill">{{$design_skills_checkBoxes[$i]}}<div class="bar"></div></p>
                                        @endfor
                                        <? endif;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-10 offset-1">
                    <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-10">
                            <div class="aboutText">
                                <br>
                                <div class="row">
                                    <div class="col-md-12 aboutSubText">
                                        <? if($counter > 3):?>
                                        @for($i=$counter-1; $i>($counter/2)-1; $i--)
                                            <p class="skill">{{$design_skills_checkBoxes[$i]}}<div class="bar"></div></p>
                                        @endfor
                                        <? endif;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <hr>
        {{-- more skills section --}}
        <div id="about" class="moreSkills">
            <div class="row">
                <div class="col-md-5 offset-md-1">
                    <div class="row">
                        <div class="col-md-1 col-1">
                            <img src="resumeApp/resources/views/customTheme/images/newResume/more_skills.png" alt="aboutImg" width="30px;">
                        </div>
                        <div class="col-md-10 col-10">
                            <div class="aboutText">
                                MORE SKILLS<br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1 offset-1 moreSkills">
                    <div class="row">
                        <?
                        $counter = count($charSkills);
                        if($counter > 10 ){
                            $counter = 10 ;
                        }
                        ?>
                        <? if($counter > 1):?>
                        <? for($i=0; $i<$counter;$i++): ?>
                        <div class="">
                            <div class="skillBox">{{substr($charSkills[$i], 0, strpos($charSkills[$i], ":"))}}</div>
                        </div>
                        <?endfor;?>
                        <? endif;?>
                    </div>

                </div>
            </div>
        </div>

        {{-- Works section --}}
        <?
            $works = explode(',',$user->works);
            foreach ($works as $work){
              if(!empty($work)){
                  $clearWorks[] = $work;
              }
            }
        ?>
        <div id="work" class="worksSection">
            <div class="row firstPart">
                <? if(isset($clearWorks[0]) && !empty($clearWorks[0]) ):?>
                    <div class="col-md-5 offset-md-1">
                    <div class="row">
                        <div class="col-md-1">
                            <img src="resumeApp/resources/views/customTheme/images/newResume/works.png" alt="aboutImg" width="30px;">
                        </div>
                        <div class="col-md-11">
                            <div class="aboutText">
                                <span class="worksText">WORKS</span><br>
                                <div class="row">
                                    <div class="col-md-12 aboutSubText">
                                        <div class="workCard">
                                            <div class="workImg">
                                                <img src="{{$clearWorks[0]}}" alt="work img" width="260" height="300">
                                            </div>
                                            <div class="workTitle">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                       {{$user->workDesc0}}
                                                    </div>
                                                    <div class="col-md-2">
                                                        <img src="resumeApp/resources/views/customTheme/images/newResume/link.png" alt="view work">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <? endif;?>
                    <? if(isset($clearWorks[1]) && !empty($clearWorks[1]) ):?>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-11">
                            <div class="aboutText">
                                <br>
                                <div class="row">
                                    <div class="col-md-12 aboutSubText">
                                        <div class="workCard">
                                            <div class="workImg">
                                                <img src="{{$clearWorks[1]}}" alt="work img" width="260" height="300">
                                            </div>
                                            <div class="workTitle">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        {{$user->workDesc1}}
                                                    </div>
                                                    <div class="col-md-2">
                                                        <img src="resumeApp/resources/views/customTheme/images/newResume/link.png" alt="view work">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <? endif;?>
            </div>
            <div class="row">
                <? if(isset($clearWorks[2]) && !empty($clearWorks[2]) ):?>
                <div class="col-md-5 offset-md-1">
                    <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-11">
                            <div class="aboutText">
                                <br>
                                <div class="row">
                                    <div class="col-md-12 aboutSubText">
                                        <div class="workCard">
                                            <div class="workImg">
                                                <img src="{{$clearWorks[2]}}" alt="work img" width="260" height="300">
                                            </div>
                                            <div class="workTitle">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                      {{$user->workDesc2}}
                                                    </div>
                                                    <div class="col-md-2">
                                                        <img src="resumeApp/resources/views/customTheme/images/newResume/link.png" alt="view work">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <? endif;?>
                    <? if(isset($clearWorks[3]) && !empty($clearWorks[3]) ):?>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-11">
                            <div class="aboutText">
                                <br>
                                <div class="row">
                                    <div class="col-md-12 aboutSubText">
                                        <div class="workCard">
                                            <div class="workImg">
                                                <img src="{{$clearWorks[3]}}" alt="work img" width="260" height="300">
                                            </div>
                                            <div class="workTitle">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                       {{$user->workDesc3}}
                                                    </div>
                                                    <div class="col-md-2">
                                                        <img src="resumeApp/resources/views/customTheme/images/newResume/link.png" alt="view work">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <? endif;?>
            </div>
        </div>

        {{-- Get in touch Section --}}
        <div id="ourClients">
            <div class="row">
                <div class="col-md-11 offset-md-1">
                    <div class="heading">
                        <h2>
                            <img src="resumeApp/resources/views/customTheme/images/email.png"> GET IN TOUCH
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row clientsBox">
                <div class="col-md-6 leftSide">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-6">
                            <div class="info">
                                <p>Email :</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="info">
                                <p>riz@123workforce.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                            <!-- google map git langitude and attitude for JS-->
                                <?
                                    if(!empty($user->city)){
                                        $address = $user->city; // Google HQ
                                        $prepAddr = str_replace(' ','+',$address);
                                        $geocode =file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&key=AIzaSyDZWJcFQabrMDUPmXaiU7wlZ74dzm_virI');
                                        $output = json_decode($geocode);
                                        if(isset($output->results[0])){
                                            $latitude = $output->results[0]->geometry->location->lat;
                                            $longitude = $output->results[0]->geometry->location->lng;
                                        }
                                    }
                                ?>
                                <?if(isset($output->results[0]) && !empty($user->city)):?>
                                    <span id="latitude" style="display: none">{{$latitude}}</span>
                                    <span id="longitude" style="display: none">{{$longitude}}</span>
                                    <span id="userCity" style="display: none">{{$user->city}}</span>
                                <? endif;?>
                        <div class="col-sm-12">
                            <div class="location-map">
                                <div id="map" class="map-canvas"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 rightSide">
                    <form id="contact-form" method="POST" class="form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username" class="formLabel">Name</label>
                                    <input type="text" id="username" name="name" placeholder="Name Surname" class="form-control no-border">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="name" class="formLabel">Email</label>
                                <input type="email" placeholder="your@email.com" id="email" name="email" required="required" class="form-control no-border">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="telephone" class="formLabel">Subject</label>
                                <input type="tel" placeholder="Message subject" name="subject" class="form-control no-border">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="message" class="formLabel">Message</label>
                                <input type="tel" placeholder="write your message.." name="message" class="form-control no-border">
                            </div>
                        </div>


                        <div class="row">

                            <div class="buttonMain col-md-6 offset-md-3">
                                <input type="submit" value="Send" class="hireBtn btn-block">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- custom footer --}}
        <div class="customFooter">
            <div class="row">
                 <div class="col-md-4 offset-md-1">
                     <div class="footerText">
                         © Copyright 2018 123Workforce.<br/>
                         All Rights Reserved.
                     </div>
                 </div>
                <div class="col-md-2 text-center">
                    <div class="footerImg">
                        <img src="resumeApp/resources/views/customTheme/images/newResume/logo.png" alt="logo">
                    </div>
                 </div>
                <div class="col-md-4">
                    <div class="footerText text-right">
                        info@123workforce.com<br>
                        (+44) 2037000685<br/>
                        <a href="https://www.facebook.com/123workforce">
                            <img src="resumeApp/resources/views/customTheme/images/newResume/fb.png" alt="fb" width="25px">
                        </a>
                        <a href="https://www.instagram.com/123workforce/">
                            <img src="resumeApp/resources/views/customTheme/images/newResume/instagram.png" alt="insta" width="25px">
                        </a>
                    </div>
                 </div>
            </div>
        </div>

        <script src="resumeApp/resources/views/customTheme/js/jquery.js"></script>
        <script src="resumeApp/resources/views/customTheme/bootstrap/js/bootstrap.min.js"></script>
        <script>
            function myMap() {
                var latitude  = $('#latitude').html();
                var longitude = $('#longitude').html();
                var mapOptions = {
                    center: new google.maps.LatLng(latitude,longitude),
                    zoom: 10,
                    mapTypeId: google.maps.MapTypeId.roadmap
                };
                var city      = $('#userCity').html();
                var map = new google.maps.Map(document.getElementById("map"), mapOptions);
            }

            $(document).on('click', 'a[href^="#"]', function(e) {
                // target element id
                var id = $(this).attr('href');

                // target element
                var $id = $(id);
                if ($id.length === 0) {
                    return;
                }

                // prevent standard hash navigation (avoid blinking in IE)
                e.preventDefault();

                // top position relative to the document
                var pos = $id.offset().top;

                // animated top scrolling
                $('body, html').animate({scrollTop: pos},1500);
            });

        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZWJcFQabrMDUPmXaiU7wlZ74dzm_virI&callback=myMap"></script>
</body>
</html>