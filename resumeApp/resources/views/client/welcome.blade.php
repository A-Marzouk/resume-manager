@extends('layouts.client-app')
@section('content')
    <? use Illuminate\Support\Facades\Auth;if(session()->get('admin') && session()->get('admin') == 'AdminWasHere'):?>
    <div class="container alert alert-success">
        You are viewing as Admin
    </div>
    <? endif;?>
   <div class="container">
       <!-- Success Messages  -->
       <div style="padding-top: 20px;">
           @if(session()->has('successMessage'))
               <div class="alert alert-success" id="successMessage">
                   {{ session()->get('successMessage') }}
               </div>
           @endif
       </div>

       <?
        $client = Auth::guard('client')->user();
       $searchesArr = [];
       ?>
       <h3 class="pageHeading text-left">Hello {{$client->name}} !</h3>
       <br>
        <? $searches = $client->searches; ?>

       @if( count($searches) > 0)
       <b class="pageSubHeading text-left" style="font-size: 14px;">Your saved searches :</b><br/><br/>
       <?
            $i =0;
          foreach ($searches as $search){
              if(empty(rtrim($search->freelancers_id,','))){
                 $searchDelete = \App\ClientSearch::where('id',$search->id);
                 $searchDelete->delete();
                 continue;
              }
              $searchesArr[$i]['name'] = $search->name;
              $searchesArr[$i]['id'] = $search->id;
              foreach (explode(',',$search->freelancers_id) as $id){
                  $searchesArr[$i]['freelancers'][] = \App\User::where('id',$id)->first();
              }
              $i++;
          }
       ?>

           <table class="table">
               <thead class="black white-text">
               <tr>
               </tr>
               </thead>
               <tbody>

                    @foreach($searchesArr as $key => $value)

                        <tr id="selectedSearch{{$value['id']}}">
                            <td class="NoDecor">
                                <a class="panelFormLabel" data-toggle="collapse" href="#{{$value['id']}}" role="button" aria-expanded="false" aria-controls="collapseExample" style="margin-bottom: 10px;">
                                    <b>{{$value['name']}}</b>
                                </a>
                                <div class="collapse" id="{{$value['id']}}" style="padding-top: 10px; padding-bottom: 12px;">
                                    <div style="padding-top: 20px; margin-top: 60px;">
                                        @foreach($value['freelancers'] as $freelancer)




                                            <? $showVideo = false; ?>

                                            <div class="freelancerCard" id="card{{$freelancer->id}}">
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-3 col-12 resumeCardLeft text-center">
                                                        <div class="row border-bottom-mobile" style="padding-bottom: 0;">
                                                            <div class="col-lg-12 col-md-12 col-6">
                                                                <div class="imageContainer">
                                                                    <?
                                                                    $photoSrc = $freelancer->userData->photo;
                                                                    if(!empty($photoSrc)){
                                                                        if ($photoSrc[0] !== '/' && $photoSrc[0] !== 'h') {
                                                                            $photoSrc = '/' . $photoSrc;
                                                                        }
                                                                    }
                                                                    ?>
                                                                    <img src="{{$photoSrc}}" alt="freelancer" class="freelancerImg"
                                                                         width="120" height="120">
                                                                </div>
                                                            </div>
                                                            <div class="col-6 d-xs-block d-md-none">
                                                                <div class="nameArea" style="padding-top: 30px;">
                                                                    <div class="nameCard">
                                                                        {{$freelancer->firstName}} {{$freelancer->lastName}}
                                                                    </div>
                                                                    <div class="jobTitle" id="animatedText{{$freelancer->id}}_mobile">
                                                                        {{$freelancer->userData->jobTitle}}
                                                                    </div>
                                                                    <div class="tap-to-chat NoDecor">
                                                                        <a href="javascript:void(0)" id="liveChat">TAP TO CHAT</a>
                                                                    </div>
                                                                    <div id="welcomeText{{$freelancer->id}}" class="d-none">
                                                                        Hi, I am {{$freelancer->firstName}}, I am a {{$freelancer->userData->jobTitle}}, How can I help
                                                                        you ?
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="row text-center border-bottom-mobile">
                                                            <div class="col-lg-12 col-md-12 col-6 nameCard" style="font-size: 18px;">
                                                                ${{intval($freelancer->userData->salary) +5}}
                                                                <div class="cardLabel" style="font-size: 15px;">Hourly rate</div>
                                                            </div>

                                                            <div class="col-lg-12 col-md-12  col-6 nameCard" style="font-size: 18px;">
                                                                {{intval($freelancer->userData->availableHours)}} hours
                                                                <div class="cardLabel" style="font-size: 15px;">Weekly Availability</div>
                                                            </div>
                                                        </div>

                                                        <div class="row text-center cardRow">
                                                            <div class="col-12 nameCard">
                                                                <div class="cardLabel" style="font-size: 14px;">Select hours</div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-10 col-md-10 offset-lg-1 offset-md-1 hoursBtn col-8 offset-2 NoDecor" style="padding: 11px 0 0 0 ;">
                                                                <a href="javascript:void(0)" id="hoursMinus{{$value['id']}}{{$freelancer->id}}" class="hoursMinus">
                                                                    <img src="/resumeApp/resources/views/customTheme/images/newResume/minus.png" style="width: 18px; padding-right: 8px;" alt="minus">
                                                                </a>
                                                                <span id="numberOfHours{{$value['id']}}{{$freelancer->id}}">10</span> hours
                                                                <a href="javscript:void(0)" id="hoursPlus{{$value['id']}}{{$freelancer->id}}" class="hoursPlus">
                                                                    <img src="/resumeApp/resources/views/customTheme/images/newResume/plus.png" style="width: 18px; padding-left: 8px;" alt="plus">
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="row text-center cardRow">
                                                            <div class="buttonMain whiteBg col-lg-12" style="padding: 0 0 25px 0; margin: 0;">
                                                                <a class="hireBtn btn-block hire" href="/stripe/hire?freelancerID={{$freelancer->id}}&hours=10" id="hireMeBtn{{$value['id']}}{{$freelancer->id}}">Book Now
                                                                </a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-10 col-md-9 col-12 resumeCardRight" id="resumeCardRight{{$value['id']}}{{$freelancer->id}}">
                                                        {{-- photo and name + multimedia--}}
                                                        <div class="row nameRow">
                                                            <div class="col-lg-4 col-md-4 freelancerCardLeft">
                                                                <div class="nameArea d-none d-md-block">
                                                                    <div class="nameCard">
                                                                        {{$freelancer->firstName}} {{$freelancer->lastName}}
                                                                    </div>
                                                                    <div class="jobTitle" id="animatedText{{$freelancer->id}}">
                                                                        {{$freelancer->userData->jobTitle}}
                                                                    </div>
                                                                    <div class="tap-to-chat NoDecor">
                                                                        <a href="javascript:void(0)" id="liveChat">TAP TO CHAT</a>
                                                                    </div>
                                                                    <div id="welcomeText{{$freelancer->id}}" class="d-none">
                                                                        Hi, I am {{$freelancer->firstName}}, I am a {{$freelancer->userData->jobTitle}}, How can I help
                                                                        you ?
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 freelancerCardRight">
                                                                <div class="row interviewIcons">
                                                                    <div class="col-12 col-lg-6 audioTransArea text-center">
                                                                        <div class="cardIconsCon NoDecor">
                                                                            <a href="javascript:void(0)" id="{{$value['id']}}{{$freelancer->id}}_open_audio" style="outline: none;" class="openAudio">
                                    <span>
                                        <img src="/resumeApp/resources/views/customTheme/images/audio_resume_Card.png"
                                             alt="" style="padding-right: 14px; width: 34px;">
                                        <span class="audioText">Audio & Text Interview</span>
                                    </span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-lg-5  videoArea">
                                                                        <div class="cardIconsCon2 NoDecor text-center">
                                                                            <a href="javascript:void(0)" id="{{$value['id']}}{{$freelancer->id}}_open_video" style="outline: none;" class="openVideo">
                                    <span>
                                        <img src="/resumeApp/resources/views/customTheme/images/video_resume_card.png"
                                             alt="" style="padding-right: 14px; width: 34px;">
                                        <span class="audioText">Video Interview</span>
                                    </span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        {{-- end of photo and multimedia --}}
                                                        <hr style="width: 97%;" class="d-none d-md-block">

                                                        {{-- skills --}}
                                                        <div class="row skillsRow">
                                                            <?
                                                                $skillsDesigner = [
                                                            // designer
                                                            // 1-
                                                            'UI design' => '/resumeApp/resources/assets/images/skills_icons/user_interface.png',
                                                            'UX design' => '/resumeApp/resources/assets/images/skills_icons/user_experience.png',
                                                            'Logo design' => '/resumeApp/resources/assets/images/skills_icons/logo_design.png',
                                                            'Animation' => '/resumeApp/resources/assets/images/skills_icons/animation.jpg',
                                                            'Motion Graphics' => '/resumeApp/resources/assets/images/skills_icons/motion_graphics.png',
                                                            'Illustration' => '/resumeApp/resources/assets/images/skills_icons/illustration.png',
                                                            'Advertising' => '/resumeApp/resources/assets/images/skills_icons/advertising.png',
                                                            'Branding'=> '/resumeApp/resources/assets/images/skills_icons/branding.png',
                                                            'Brochure Design'=> '/resumeApp/resources/assets/images/skills_icons/brochure_design.png',
                                                            'Website Design'=> '/resumeApp/resources/assets/images/skills_icons/web_design.png',
                                                            'Game Designer'=> '/resumeApp/resources/assets/images/skills_icons/game_designer.png',
                                                            'Character Design'=> '/resumeApp/resources/assets/images/skills_icons/character_design.png',
                                                            'Digital Painting'=> '/resumeApp/resources/assets/images/skills_icons/digital_painting.png',
                                                            'Creative Director'=> '/resumeApp/resources/assets/images/skills_icons/creative_director.png',
                                                            'HTML / CSS'=> '/resumeApp/resources/assets/images/skills_icons/HTML.png',
                                                            // 2-

                                                            'Adobe After Effects'=>'/resumeApp/resources/assets/images/skills_icons/AE.png',
                                                            'Sketch'=>'/resumeApp/resources/assets/images/skills_icons/Sketch.png',
                                                            'Adobe Illustrator'=>'/resumeApp/resources/assets/images/skills_icons/Illustrator.png',
                                                            'Adobe XD'=>'/resumeApp/resources/assets/images/skills_icons/AdobeXD.png',
                                                            'Photoshop'=>'/resumeApp/resources/assets/images/skills_icons/Photoshop.png',
                                                            'Autocad'=>'/resumeApp/resources/assets/images/skills_icons/autocad.png',
                                                            'Solidworks'=>'/resumeApp/resources/assets/images/skills_icons/solid_works.png',
                                                            'Adobe Flash'=>'/resumeApp/resources/assets/images/skills_icons/adobe_flash.png',
                                                            'Digital Drawing Tablet'=>'/resumeApp/resources/assets/images/skills_icons/digital_drawing_tablet.png',
                                                            'Adobe Indesign'=>'/resumeApp/resources/assets/images/skills_icons/indesign.png',
                                                            'CorelDraw'=>'/resumeApp/resources/assets/images/skills_icons/corel_draw.png',
                                                            '3d Max'=>'/resumeApp/resources/assets/images/skills_icons/3d_max.png',

                                                            // developer :
                                                            // 1-
                                                            'JavaScript' =>'/resumeApp/resources/assets/images/skills_icons/javascript.png',
                                                            'SQL'=>'/resumeApp/resources/assets/images/skills_icons/mysql.png',
                                                            'Java'=>'resumeApp/resources/assets/images/skills_icons/java.png',
                                                            'C#'=>'/resumeApp/resources/assets/images/skills_icons/c#.png',
                                                            'Python'=>'/resumeApp/resources/assets/images/skills_icons/python.png',
                                                            'PHP'=>'/resumeApp/resources/assets/images/skills_icons/php.png',
                                                            'C++'=>'/resumeApp/resources/assets/images/skills_icons/c_language.png',
                                                            'C'=>'/resumeApp/resources/assets/images/skills_icons/c_language.png',
                                                            'TypeScript'=>'/resumeApp/resources/assets/images/skills_icons/typescript.png',
                                                            'Ruby'=>'/resumeApp/resources/assets/images/skills_icons/ruby.png',
                                                            'Objective-C'=>'/resumeApp/resources/assets/images/skills_icons/objective_c.png',
                                                            'Swift'=>'/resumeApp/resources/assets/images/skills_icons/swift.png',
                                                            'VB.NET'=>'/resumeApp/resources/assets/images/skills_icons/vb_net.png',
                                                            'Go'=>'/resumeApp/resources/assets/images/skills_icons/go.png',
                                                            'Perl'=>'/resumeApp/resources/assets/images/skills_icons/perl.png',
                                                            'Scala'=>'/resumeApp/resources/assets/images/skills_icons/scala.png',
                                                            'Groovy'=>'/resumeApp/resources/assets/images/skills_icons/groovy.png',
                                                            'Assembly'=>'/resumeApp/resources/assets/images/skills_icons/assembly.png',
                                                            'CoffeeScript'=>'/resumeApp/resources/assets/images/skills_icons/coffeeScript.png',
                                                            'VBA'=>'/resumeApp/resources/assets/images/skills_icons/vba.png',
                                                            'R'=>'/resumeApp/resources/assets/images/skills_icons/r_lang.png',
                                                            'Matlab'=>'/resumeApp/resources/assets/images/skills_icons/matlab.png',
                                                            'Visual Basic 6'=>'/resumeApp/resources/assets/images/skills_icons/matlab.png',
                                                            'Lua'=>'/resumeApp/resources/assets/images/skills_icons/lua.png',
                                                            'Haskell'=>'/resumeApp/resources/assets/images/skills_icons/haskell.png',
                                                            'HTML'=>'/resumeApp/resources/assets/images/skills_icons/HTML.png',
                                                            'CSS'=>'/resumeApp/resources/assets/images/skills_icons/CSS.png',

                                                            //2-
                                                            'AngularJS' => '/resumeApp/resources/assets/images/skills_icons/Angularjs.png',
                                                            'Node.js' => '/resumeApp/resources/assets/images/skills_icons/node_js.png',
                                                            '.NET Core' => '/resumeApp/resources/assets/images/skills_icons/netcore.png',
                                                            'React' => '/resumeApp/resources/assets/images/skills_icons/react.png',
                                                            'Cordova' => '/resumeApp/resources/assets/images/skills_icons/cordava.png',
                                                            'Firebase' => '',
                                                            'Xamarin' => '',
                                                            'Hadoop' => '/resumeApp/resources/assets/images/skills_icons/hadoop.png',
                                                            'Spark' => '/resumeApp/resources/assets/images/skills_icons/spark.png',
                                                            'MySQL' => '/resumeApp/resources/assets/images/skills_icons/mysql.png',
                                                            'SQL Server' => '/resumeApp/resources/assets/images/skills_icons/sql server.png',
                                                            'PostgreSQL' => '/resumeApp/resources/assets/images/skills_icons/postgreSQL.png',
                                                            'SQLite' => '/resumeApp/resources/assets/images/skills_icons/SQLite.png',
                                                            'MongoDB' => '/resumeApp/resources/assets/images/skills_icons/mongoDB.png',
                                                            'Oracle' => '/resumeApp/resources/assets/images/skills_icons/Oracle.png',
                                                            'Redis' => '/resumeApp/resources/assets/images/skills_icons/redis.png',
                                                            'Cassandra' => '/resumeApp/resources/assets/images/skills_icons/cassandra.png'
                                                            ];
                                                            ?>

                                                                <div class="col-md-12">
                                                                    <span class="cardLabel">Skills:</span>
                                                                    <span class="skillsCard">
                                                                         <?
                                                                        $skills_1 = $freelancer->userData->design_skills_checkbox ;
                                                                        $skills_2 = $freelancer->userData->primarySkills;

                                                                        $skillsArr_1 = explode(',',$skills_1);
                                                                        $skillsArr_2 = explode(',',$skills_2);

                                                                        $allSKills = [];
                                                                        $j = 0 ;
                                                                        foreach ($skillsArr_1 as $skill_1){
                                                                            if($j<=3){
                                                                                $allSKills[] = $skill_1;
                                                                            }
                                                                            $j++;
                                                                        }
                                                                        $j = 0 ;
                                                                        foreach ($skillsArr_2 as $skill_2){
                                                                            if($j<=3){
                                                                                $allSKills[] = $skill_2;
                                                                            }
                                                                            $j++;
                                                                        }
                                                                        $i=0;
                                                                        ?>
                                                                        @foreach($allSKills as $skill)
                                                                            <? if($i < 8):?>
                                                                            <?
                                                                            $imgSrc = '/resumeApp/resources/assets/images/skills_icons/skill.png';
                                                                            if (isset($skillsDesigner[$skill]) && !empty($skillsDesigner[$skill])) {
                                                                                $imgSrc = $skillsDesigner[$skill];
                                                                            }
                                                                            ?>
                                                                            <span id="skillContainer{{$i}}{{$value['id']}}"
                                                                                  class="highlightSkill">
                                     <img width="20px" src="{{$imgSrc}}" alt="skill"
                                          id="skillImage{{$i}}{{$value['id']}}">
                                                                                {{$skill}} &nbsp;&nbsp;
                                                                                 </span>
                                                                            <? endif;?>
                                                                            <? $i++;?>
                                                                        @endforeach
                    </span>
                                                            </div>
                                                        </div>
                                                        {{-- end of skills--}}

                                                        <hr style="width: 97%;">

                                                        {{-- Portfolio --}}
                                                        <div class="portfolioRow">

                                                            {{-- carousel controls --}}
                                                            <div class="row" style="width: 100%;">
                                                                <div class="col-2 NoDecor text-center">
                                                                    <a href="javascript:void(0)"  data-target="#carouselExampleControls{{$value['id']}}" data-slide-to="3" role="button" data-slide="prev" class="cardLabel_interviews noScroll"
                                                                       style="color:#697786;">
                                                                        <img src="/resumeApp/resources/views/customTheme/images/newResume/prev.png"
                                                                             alt="prev" width="25px">
                                                                    </a>
                                                                </div>
                                                                <div class="col-8 text-center">
                                                                    <span class="cardLabel">Portfolio</span>
                                                                </div>
                                                                <div class="col-2 NoDecor text-center">
                                                                    <a href="javascript:void(0)"  data-target="#carouselExampleControls{{$value['id']}}" data-slide-to="3" role="button" data-slide="next" class="cardLabel_interviews noScroll"
                                                                       style="color:#697786;">
                                                                        <img src="/resumeApp/resources/views/customTheme/images/newResume/next.png"
                                                                             alt="next" width="25px">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            {{--end of carousel controller--}}

                                                            <?
                                                            $workExamples = \App\Project::where('user_id',$freelancer->id)->orderBy('order','ASC')->get();
                                                            $i = 0;
                                                            $maxNumberOfWorks = 50;
                                                            $firstSlideWorks = [];
                                                            $secondSlideWorks = [];
                                                            $thirdSlideWorks = [];
                                                            ?>
                                                            @if($workExamples)
                                                                <? foreach ($workExamples as $workExample):?>
                                                                <? if ($i >= $maxNumberOfWorks) {
                                                                    break;
                                                                }
                                                                if (!$workExample->isActive) {
                                                                    continue;
                                                                }

                                                                if ($i < 2) {
                                                                    $firstSlideWorks[] = $workExample;
                                                                } elseif ($i < 4) {
                                                                    $secondSlideWorks[] = $workExample;
                                                                } elseif ($i < 6) {
                                                                    $thirdSlideWorks[] = $workExample;
                                                                }
                                                                ?>
                                                                {{-- modal --}}
                                                                <div class="modal fade" id="works{{$workExample->id}}Modal" tabindex="-1"
                                                                     role="dialog"
                                                                     aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg" role="document" style="">
                                                                        <div class="modal-content modal-mobile-resume" data-dismiss="modal"
                                                                             aria-label="Close">
                                                                            <div class="modal-body" style="padding: 0;">
                                                                                <div class="row">
                                                                                    <div class="col-md-9" style="padding: 0;">
                                                                                        <img src="/{{$workExample->mainImage}}" alt=""
                                                                                             width="100%" height="auto">
                                                                                        <?
                                                                                        // more images
                                                                                        $moreImagesArr = explode(',', $workExample->images);
                                                                                        foreach($moreImagesArr as $image){
                                                                                        if(!empty(trim($image))){
                                                                                        ?>
                                                                                        <img src="{{$image}}" alt="" width="100%" height="auto">
                                                                                        <?}
                                                                                        }?>
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <div class="form-group" style="padding-top: 25px;">
                                                                                            <label class="panelFormLabel"> Description
                                                                                                <hr>
                                                                                            </label><br/>
                                                                                            {{$workExample->projectDesc}}
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="panelFormLabel"> Link
                                                                                                <hr>
                                                                                            </label><br/>
                                                                                            <a href="{{$workExample->link}}">{{$workExample->link}}</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <? $i++;?>
                                                                <? endforeach;?>
                                                            @endif

                                                            {{-- works section carousel --}}
                                                            <div id="carouselExampleControls{{$value['id']}}" class="carousel slide d-md-block" data-ride="carousel"
                                                                 data-interval="false">
                                                                <div class="carousel-inner">
                                                                    @if(!empty($firstSlideWorks))
                                                                        <div class="carousel-item active">
                                                                            <div class="row">
                                                                                @foreach($firstSlideWorks as $workExample)
                                                                                    <div class="col-md-6">
                                                                                        <div class="workCard" style="margin-left: 0">
                                                                                            <div class="workImg">
                                                                                                <a href="javascript:void(0)" data-toggle="modal" style="outline: none;"
                                                                                                   data-target="#works{{$workExample->id}}Modal">
                                                                                                    <img src="/{{$workExample->mainImage}}" alt="work img"
                                                                                                         width="260" >
                                                                                                </a>
                                                                                            </div>
                                                                                            <div class="workTitle">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-9">
                                                                                                        {{$workExample->projectName}}
                                                                                                    </div>
                                                                                                    <a class="col-md-2" href="javascript:void(0)"
                                                                                                       data-toggle="modal"
                                                                                                       data-target="#works{{$workExample->id}}Modal"
                                                                                                       style="outline: none;">
                                                                                                        <img src="/resumeApp/resources/views/customTheme/images/newResume/link.png"
                                                                                                             alt="view work">
                                                                                                    </a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                    @if(!empty($secondSlideWorks))
                                                                        <div class="carousel-item">
                                                                            <div class="row">
                                                                                @foreach($secondSlideWorks as $workExample)
                                                                                    <div class="col-md-6">
                                                                                        <div class="workCard" style="margin-left: 0">
                                                                                            <div class="workImg">
                                                                                                <a href="javascript:void(0)" data-toggle="modal" style="outline: none;"
                                                                                                   data-target="#works{{$workExample->id}}Modal">
                                                                                                    <img src="/{{$workExample->mainImage}}" alt="work img"
                                                                                                         width="260" >
                                                                                                </a>
                                                                                            </div>
                                                                                            <div class="workTitle">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-9">
                                                                                                        {{$workExample->projectName}}
                                                                                                    </div>
                                                                                                    <a class="col-md-2" href="javascript:void(0)"
                                                                                                       data-toggle="modal"
                                                                                                       data-target="#works{{$workExample->id}}Modal"
                                                                                                       style="outline: none;">
                                                                                                        <img src="/resumeApp/resources/views/customTheme/images/newResume/link.png"
                                                                                                             alt="view work">
                                                                                                    </a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                    @if(!empty($thirdSlideWorks))
                                                                        <div class="carousel-item row">
                                                                            <div class="row">
                                                                                @foreach($thirdSlideWorks as $workExample)
                                                                                    <div class="col-md-6">
                                                                                        <div class="workCard" style="margin-left: 0">
                                                                                            <div class="workImg">
                                                                                                <a href="javascript:void(0)" data-toggle="modal" style="outline: none;"
                                                                                                   data-target="#works{{$workExample->id}}Modal">
                                                                                                    <img src="/{{$workExample->mainImage}}" alt="work img"
                                                                                                         width="260" >
                                                                                                </a>
                                                                                            </div>
                                                                                            <div class="workTitle">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-9">
                                                                                                        {{$workExample->projectName}}
                                                                                                    </div>
                                                                                                    <a class="col-md-2" href="javascript:void(0)"
                                                                                                       data-toggle="modal"
                                                                                                       data-target="#works{{$workExample->id}}Modal"
                                                                                                       style="outline: none;">
                                                                                                        <img src="/resumeApp/resources/views/customTheme/images/newResume/link.png"
                                                                                                             alt="view work">
                                                                                                    </a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            {{-- end of works section --}}

                                                        </div>


                                                        {{-- end of portfolio --}}
                                                    </div>

                                                </div>

                                                {{-- expand btns--}}
                                                <div class="row" style="border-top:1px solid whitesmoke; ">
                                                    <div class="col-md-12 col-12 dropDownBtnLeft NoDecor text-center" style="background-color: #FDFDFD;">
                                                        <a href="#viewEducationBtn{{$freelancer->id}}" id="viewEducationBtn{{$freelancer->id}}"
                                                           class="viewEducationLink">
                                                            <div class="cardLabel_interviews" style="padding-bottom: 10px; height:52px;">
                                                                <img src="/resumeApp/resources/views/customTheme/images/newResume/work.png"
                                                                     alt="read more arrow" width="18px" id="workBtnImg" class="d-none d-md-inline">
                                                                <span class="dropDownBtnText">Work/Education</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                {{-- end of expand btns --}}
                                            </div>

                                            {{-- resume expanded --}}
                                            {{-- education --}}
                                            <div class="row resumeExpand d-none" id="area_viewEducationBtn{{$freelancer->id}}">
                                                <div id="about" class="education">
                                                    <div class="row">
                                                        <div class="offset-lg-1 col-lg-5 col-md-6 educationSection">
                                                            <img src="/resumeApp/resources/views/customTheme/images/newResume/education.png"
                                                                 alt="aboutImg" width="30px;">
                                                            <span class="aboutText">EDUCATION</span>
                                                            <div class="aboutText">
                                                                <? if(!empty($freelancer->userData->eduTitle1)):?>
                                                                <div class="row">
                                                                    <div class="col-md-12 aboutSubText">
                                                                        <div class="year"><span
                                                                                    class="circle"></span> {{$freelancer->userData->eduYear1}}</div>
                                                                        <div class="title">{{$freelancer->userData->eduTitle1}}</div>
                                                                        <div class="desc">{{$freelancer->userData->eduDesc1}}</div>
                                                                    </div>
                                                                </div>
                                                                <br/>
                                                                <? endif; ?>
                                                                <? if(!empty($freelancer->userData->eduTitle2)):?>
                                                                <div class="row">
                                                                    <div class="col-md-10 aboutSubText">
                                                                        <div class="year"><span
                                                                                    class="circle"></span> {{$freelancer->userData->eduYear2}}</div>
                                                                        <div class="title">{{$freelancer->userData->eduTitle2}}</div>
                                                                        <div class="desc">{{$freelancer->userData->eduDesc2}}</div>
                                                                    </div>
                                                                </div>
                                                                <br/>
                                                                <? endif; ?>
                                                                <? if(!empty($freelancer->userData->eduTitle3)):?>
                                                                <div class="row">
                                                                    <div class="col-md-10 aboutSubText">
                                                                        <div class="year"><span
                                                                                    class="circle"></span> {{$freelancer->userData->eduYear3}}</div>
                                                                        <div class="title">{{$freelancer->userData->eduTitle3}}</div>
                                                                        <div class="desc">{{$freelancer->userData->eduDesc3}}</div>
                                                                    </div>
                                                                </div>
                                                                <? endif; ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-lg-5">
                                                            <img src="/resumeApp/resources/views/customTheme/images/newResume/trainings.png"
                                                                 alt="aboutImg" width="30px;">
                                                            <span class="aboutText">TRAININGS</span>
                                                            <div class="aboutText">
                                                                <? if(!empty($freelancer->userData->trnTitle1)):?>
                                                                <div class="row">
                                                                    <div class="col-md-12 aboutSubText">
                                                                        <div class="year"><span
                                                                                    class="circle"></span> {{$freelancer->userData->trnYear1}}</div>
                                                                        <div class="title">{{$freelancer->userData->trnTitle1}}</div>
                                                                        <div class="desc">{{$freelancer->userData->trnDesc1}}</div>
                                                                    </div>
                                                                </div>
                                                                <br/>
                                                                <? endif; ?>
                                                                <? if(!empty($freelancer->userData->trnTitle3)):?>
                                                                <div class="row">
                                                                    <div class="col-md-10 aboutSubText">
                                                                        <div class="year"><span
                                                                                    class="circle"></span> {{$freelancer->userData->trnYear2}}</div>
                                                                        <div class="title">{{$freelancer->userData->trnTitle2}}</div>
                                                                        <div class="desc">{{$freelancer->userData->trnDesc2}}</div>
                                                                    </div>
                                                                </div>
                                                                <br/>
                                                                <? endif; ?>
                                                                <? if(!empty($freelancer->userData->trnTitle3)):?>
                                                                <div class="row">
                                                                    <div class="col-md-10 aboutSubText">
                                                                        <div class="year"><span
                                                                                    class="circle"></span> {{$freelancer->userData->trnYear3}}</div>
                                                                        <div class="title">{{$freelancer->userData->trnTitle3}}</div>
                                                                        <div class="desc">{{$freelancer->userData->trnDesc3}}</div>
                                                                    </div>
                                                                </div>
                                                                <? endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr style="width: 85%">
                                                {{-- work exp --}}
                                                <div id="about" class="education">
                                                    <div class="row">
                                                        <div class="offset-lg-1 col-lg-5 col-md-6 educationSection">
                                                            <img src="/resumeApp/resources/views/customTheme/images/newResume/what_i_do.png"
                                                                 style="padding-bottom: 10px;" alt="aboutImg" width="30px;">
                                                            <span class="aboutText">WORK OVERVIEW</span>
                                                            <?php
                                                            $works = $freelancer->worksHistory;
                                                            ?>
                                                            <div class="aboutText">
                                                                <? foreach ($works as $work):?>
                                                                <div class="row">
                                                                    <div class="col-md-12 aboutSubText">
                                                                        <div class="title work">
                                                                            <span class="circle"></span>
                                                                            {{$work->job_title}}
                                                                        </div>
                                                                        <div class="company">{{$work->company}}</div>
                                                                        <div class="year"><span class="work">
                                                {{date('F Y', strtotime($work->date_from))}}
                                                                                <? if($work->currently_working):?>
                                                                                - Present
                                                                                <? else: ?>
                                                                                - {{date('F Y', strtotime($work->date_to))}}
                                                                                <? endif;?>
                                            </span>
                                                                        </div>
                                                                        <div class="desc">{{$work->job_description}}</div>
                                                                    </div>
                                                                </div>
                                                                <? endforeach;?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- un expand btns --}}
                                                <div class="row" style="border-top:1px solid whitesmoke; ">
                                                    <div class="col-md-12 text-center NoDecor" style="background-color: #FDFDFD;">
                                                        <a href="#card{{$freelancer->id}}" id="minimize{{$freelancer->id}}" class="Minimize">
                                                            <div class="cardLabel_interviews" style="padding-top: 15px;height:52px;">
                                                                <span style="padding-right: 6px; color: grey;"></span>
                                                                <img src="/resumeApp/resources/views/customTheme/images/close_menu.png"
                                                                     alt="read more arrow" width="11px" id="portfolioBtnImg">
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                {{-- end of un expand btns --}}
                                            </div>
                                            <br>
                                            {{-- modals --}}
                                            {{-- audio div content --}}

                                            <div id="audioContent{{$value['id']}}{{$freelancer->id}}" class="d-none">
                                                <?
                                                $valid = true;
                                                $notValidText = 'NOT-VALID-LINK';
                                                if ($freelancer->userData->audio == $notValidText) {
                                                    $valid = false;
                                                }
                                                $audioSrc = "";
                                                if (!empty(trim($freelancer->userData->audioFile))) {
                                                    $audioSrc = '/'.$freelancer->userData->audioFile;
                                                } else {
                                                    if ($valid) {
                                                        $audioSrc = "https://drive.google.com/uc?export=download&id=" . $freelancer->userData->audio . "&key=AIzaSyC0bK_7ASw3QylYDzs_Pqo_TeoI7jfFj8M";
                                                    } else {
                                                        $audioSrc = "";
                                                    }
                                                }
                                                ?>
                                                <div class="row" style="border-bottom: 1px solid whitesmoke; padding-bottom: 25px;">
                                                    <div class="col-lg-11 col-11 text-left" style="padding: 25px 0 0 20px;">
                 <span>
                    <img src="/resumeApp/resources/views/customTheme/images/audio_blue.png"
                         alt="" style="padding-right: 14px; width: 34px;">
                    <span class="audioText" style="color: #4E75E8;">Audio & Text Interview</span>
                </span>
                                                    </div>
                                                    <div class="col-lg-1 col-1 text-center NoDecor" style="padding: 24px 0 0 0;">
                                                        <a href="javascript:void(0)" class="audioText audioDismiss" style="color: #4E75E8; font-size: large;" id="audio_dismiss{{$value['id']}}{{$freelancer->id}}"> x </a>
                                                    </div>
                                                </div>
                                                <div class="row card-audio-con">
                                                    <div class="col-md-10 offset-md-1 text-center">
                                                        <audio controls style="width: 100%">
                                                            <source src="{{$audioSrc}}" type="audio/ogg">
                                                            Your browser does not support the audio element.
                                                        </audio>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="transcript">
                                                                DEMO TEXT <br/><br/>
                                                                One Easy-To-Use Cloud hotel software offering next-gen capabilities needed by hotels to
                                                                simplify reservations, improve operating efficiency and maximize revenue. iOS + Android
                                                                + Web-based Project Overview: This system is built in detail with an easy-to-use
                                                                <br/><br/>

                                                                nterface keeping in mind the variety of ages that will be using it. <br/><br/>We build
                                                                the web-based app using the same design principles used on old offline softwares. We
                                                                also implemented the latest trends, making it usable on touch-screen displays.
                                                                The app is also responsive and we made sure that anyone can view it on any screen size
                                                                without losing any type of information.
                                                                The mobile app offers the same options.<br/><br/>
                                                                Our user testings show that the same tasks were completed in the same time on mobile and
                                                                web.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- video div content--}}

                                            <div id="videoContent{{$value['id']}}{{$freelancer->id}}" class="d-none">
                                                <div class="row" style="border-bottom: 1px solid whitesmoke; padding-bottom: 25px;">
                                                    <div class="col-lg-11 col-11 text-left" style="padding: 25px 0 0 20px;">
                 <span>
                    <img src="/resumeApp/resources/views/customTheme/images/video_blue.png"
                         alt="" style="padding-right: 14px; width: 34px;">
                    <span class="audioText" style="color: #4E75E8;">Video Interview</span>
                </span>
                                                    </div>
                                                    <div class="col-lg-1 col-1 text-center NoDecor" style="padding: 24px 0 0 0;">
                                                        <a href="javascript:void(0)" class="audioText audioDismiss" style="color: #4E75E8; font-size: large;" id="audio_dismiss{{$value['id']}}{{$freelancer->id}}"> x </a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    @if($showVideo)
                                                        @if($freelancer->userData->video_file !== null)
                                                            <div class="row card-audio-con" style="background-color: white;">
                                                                <div class="col-md-12">
                                                                    <div class="text-center">
                                                                        <video width="100%" id="videoResume" height="auto" controls>
                                                                            <source src="/{{$freelancer->userData->video_file}}">
                                                                        </video>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @elseif($freelancer->userData->video !== null)
                                                            <div class="row card-audio-con" style="background-color: white;">
                                                                <div class="col-md-12">
                                                                    <div class="text-center">
                                                                        <iframe src="/{{$freelancer->userData->video}}" frameborder="1"
                                                                                allow="encrypted-media" allowfullscreen width="100%" height="auto">

                                                                        </iframe>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @else
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="transcript">
                                                                    Video is coming soon..
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>



                                            {{-- default content --}}

                                            <div id="defaultContent{{$value['id']}}{{$freelancer->id}}" class="d-none">
                                                {{-- photo and name + multimedia--}}
                                                <div class="row nameRow">
                                                    <div class="col-lg-4 col-md-4 freelancerCardLeft">
                                                        <div class="nameArea d-none d-md-block">
                                                            <div class="nameCard">
                                                                {{$freelancer->firstName}} {{$freelancer->lastName}}
                                                            </div>
                                                            <div class="jobTitle" id="animatedText{{$freelancer->id}}">
                                                                {{$freelancer->userData->jobTitle}}
                                                            </div>
                                                            <div class="tap-to-chat NoDecor">
                                                                <a href="javascript:void(0)" id="liveChat">TAP TO CHAT</a>
                                                            </div>
                                                            <div id="welcomeText{{$freelancer->id}}" class="d-none">
                                                                Hi, I am {{$freelancer->firstName}}, I am a {{$freelancer->userData->jobTitle}}, How can I help
                                                                you ?
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 freelancerCardRight">
                                                        <div class="row interviewIcons">
                                                            <div class="col-12 col-lg-6 audioTransArea text-center">
                                                                <div class="cardIconsCon NoDecor">
                                                                    <a href="javascript:void(0)" id="{{$value['id']}}{{$freelancer->id}}_open_audio" style="outline: none;" class="openAudio">
                                    <span>
                                        <img src="/resumeApp/resources/views/customTheme/images/audio_resume_Card.png"
                                             alt="" style="padding-right: 14px; width: 34px;">
                                        <span class="audioText">Audio & Text Interview</span>
                                    </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-lg-5  videoArea">
                                                                <div class="cardIconsCon2 NoDecor text-center">
                                                                    <a href="javascript:void(0)" id="{{$value['id']}}{{$freelancer->id}}_open_video" style="outline: none;" class="openVideo">
                                    <span>
                                        <img src="/resumeApp/resources/views/customTheme/images/video_resume_card.png"
                                             alt="" style="padding-right: 14px; width: 34px;">
                                        <span class="audioText">Video Interview</span>
                                    </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                {{-- end of photo and multimedia --}}
                                                <hr style="width: 97%;" class="d-none d-md-block">

                                                {{-- skills --}}
                                                <div class="row skillsRow">
                                                    <div class="col-md-12">
                                                        <span class="cardLabel">Skills:</span>
                                                        <span class="skillsCard">
                        <?
                                                            $skills = $freelancer->userData->design_skills_checkbox ;
                                                            $skillsArr = explode(',',$skills);
                                                            $i=0;
                                                            ?>
                                                            @foreach($skillsArr as $skill)
                                                                <?
                                                                $imgSrc = '/resumeApp/resources/assets/images/skills_icons/skill.png' ;
                                                                if(isset($skillsDesigner[$skill]) && !empty($skillsDesigner[$skill])){
                                                                    $imgSrc = $skillsDesigner[$skill] ;
                                                                }
                                                                ?>
                                                                <span id="skillContainer{{$i}}{{$value['id']}}" class="highlightSkill">
                                     <img width="20px" src="{{$imgSrc}}" alt="skill" id="skillImage{{$i}}{{$value['id']}}">
                                                                    {{$skill}} &nbsp;&nbsp;
                                </span>
                                                                <? $i++;?>
                                                            @endforeach
                    </span>
                                                    </div>
                                                </div>
                                                {{-- end of skills--}}

                                                <hr style="width: 97%;">

                                                {{-- Portfolio --}}
                                                <div class="portfolioRow">

                                                    {{-- carousel controls --}}
                                                    <div class="row" style="width: 100%;">
                                                        <div class="col-2 NoDecor text-center">
                                                            <a href="javascript:void(0)"  data-target="#carouselExampleControls{{$value['id']}}" data-slide-to="3" role="button" data-slide="prev" class="cardLabel_interviews noScroll"
                                                               style="color:#697786;">
                                                                <img src="/resumeApp/resources/views/customTheme/images/newResume/prev.png"
                                                                     alt="prev" width="25px">
                                                            </a>
                                                        </div>
                                                        <div class="col-8 text-center">
                                                            <span class="cardLabel">Portfolio</span>
                                                        </div>
                                                        <div class="col-2 NoDecor text-center">
                                                            <a href="javascript:void(0)"  data-target="#carouselExampleControls{{$value['id']}}" data-slide-to="3" role="button" data-slide="next" class="cardLabel_interviews noScroll"
                                                               style="color:#697786;">
                                                                <img src="/resumeApp/resources/views/customTheme/images/newResume/next.png"
                                                                     alt="next" width="25px">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    {{--end of carousel controller--}}

                                                    <?
                                                    $workExamples =\App\Project::where('user_id',$freelancer->id)->orderBy('order','ASC')->get();
                                                    $i = 0;
                                                    $maxNumberOfWorks = 50;
                                                    $firstSlideWorks = [];
                                                    $secondSlideWorks = [];
                                                    $thirdSlideWorks = [];
                                                    ?>
                                                    @if($workExamples)
                                                        <? foreach ($workExamples as $workExample):?>
                                                        <? if ($i >= $maxNumberOfWorks) {
                                                            break;
                                                        }
                                                        if (!$workExample->isActive) {
                                                            continue;
                                                        }

                                                        if ($i < 2) {
                                                            $firstSlideWorks[] = $workExample;
                                                        } elseif ($i < 4) {
                                                            $secondSlideWorks[] = $workExample;
                                                        } elseif ($i < 6) {
                                                            $thirdSlideWorks[] = $workExample;
                                                        }
                                                        ?>
                                                        {{-- modal --}}
                                                        <div class="modal fade" id="works{{$workExample->id}}Modal" tabindex="-1"
                                                             role="dialog"
                                                             aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document" style="">
                                                                <div class="modal-content modal-mobile-resume" data-dismiss="modal"
                                                                     aria-label="Close">
                                                                    <div class="modal-body" style="padding: 0;">
                                                                        <div class="row">
                                                                            <div class="col-md-9" style="padding: 0;">
                                                                                <img src="/{{$workExample->mainImage}}" alt=""
                                                                                     width="100%" height="auto">
                                                                                <?
                                                                                // more images
                                                                                $moreImagesArr = explode(',', $workExample->images);
                                                                                foreach($moreImagesArr as $image){
                                                                                if(!empty(trim($image))){
                                                                                ?>
                                                                                <img src="{{$image}}" alt="" width="100%" height="auto">
                                                                                <?}
                                                                                }?>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group" style="padding-top: 25px;">
                                                                                    <label class="panelFormLabel"> Description
                                                                                        <hr>
                                                                                    </label><br/>
                                                                                    {{$workExample->projectDesc}}
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="panelFormLabel"> Link
                                                                                        <hr>
                                                                                    </label><br/>
                                                                                    <a href="{{$workExample->link}}">{{$workExample->link}}</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <? $i++;?>
                                                        <? endforeach;?>
                                                    @endif

                                                    {{-- works section carousel --}}
                                                    <div id="carouselExampleControls{{$value['id']}}" class="carousel slide d-md-block" data-ride="carousel"
                                                         data-interval="false">
                                                        <div class="carousel-inner">
                                                            @if(!empty($firstSlideWorks))
                                                                <div class="carousel-item active">
                                                                    <div class="row">
                                                                        @foreach($firstSlideWorks as $workExample)
                                                                            <div class="col-md-6">
                                                                                <div class="workCard" style="margin-left: 0">
                                                                                    <div class="workImg">
                                                                                        <a href="javascript:void(0)" data-toggle="modal" style="outline: none;"
                                                                                           data-target="#works{{$workExample->id}}Modal">
                                                                                            <img src="/{{$workExample->mainImage}}" alt="work img"
                                                                                                 width="260" >
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="workTitle">
                                                                                        <div class="row">
                                                                                            <div class="col-md-9">
                                                                                                {{$workExample->projectName}}
                                                                                            </div>
                                                                                            <a class="col-md-2" href="javascript:void(0)"
                                                                                               data-toggle="modal"
                                                                                               data-target="#works{{$workExample->id}}Modal"
                                                                                               style="outline: none;">
                                                                                                <img src="/resumeApp/resources/views/customTheme/images/newResume/link.png"
                                                                                                     alt="view work">
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if(!empty($secondSlideWorks))
                                                                <div class="carousel-item">
                                                                    <div class="row">
                                                                        @foreach($secondSlideWorks as $workExample)
                                                                            <div class="col-md-6">
                                                                                <div class="workCard" style="margin-left: 0">
                                                                                    <div class="workImg">
                                                                                        <a href="javascript:void(0)" data-toggle="modal" style="outline: none;"
                                                                                           data-target="#works{{$workExample->id}}Modal">
                                                                                            <img src="/{{$workExample->mainImage}}" alt="work img"
                                                                                                 width="260" >
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="workTitle">
                                                                                        <div class="row">
                                                                                            <div class="col-md-9">
                                                                                                {{$workExample->projectName}}
                                                                                            </div>
                                                                                            <a class="col-md-2" href="javascript:void(0)"
                                                                                               data-toggle="modal"
                                                                                               data-target="#works{{$workExample->id}}Modal"
                                                                                               style="outline: none;">
                                                                                                <img src="/resumeApp/resources/views/customTheme/images/newResume/link.png"
                                                                                                     alt="view work">
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if(!empty($thirdSlideWorks))
                                                                <div class="carousel-item row">
                                                                    <div class="row">
                                                                        @foreach($thirdSlideWorks as $workExample)
                                                                            <div class="col-md-6">
                                                                                <div class="workCard" style="margin-left: 0">
                                                                                    <div class="workImg">
                                                                                        <a href="javascript:void(0)" data-toggle="modal" style="outline: none;"
                                                                                           data-target="#works{{$workExample->id}}Modal">
                                                                                            <img src="/{{$workExample->mainImage}}" alt="work img"
                                                                                                 width="260" >
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="workTitle">
                                                                                        <div class="row">
                                                                                            <div class="col-md-9">
                                                                                                {{$workExample->projectName}}
                                                                                            </div>
                                                                                            <a class="col-md-2" href="javascript:void(0)"
                                                                                               data-toggle="modal"
                                                                                               data-target="#works{{$workExample->id}}Modal"
                                                                                               style="outline: none;">
                                                                                                <img src="/resumeApp/resources/views/customTheme/images/newResume/link.png"
                                                                                                     alt="view work">
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    {{-- end of works section --}}

                                                </div>


                                                {{-- end of portfolio --}}
                                            </div>



                                        @endforeach
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a class="btn panelFormLabel deleteSearch" id="{{$value['id']}}">
                                    x
                                </a>
                            </td>
                        </tr>
                    @endforeach

               </tbody>
           </table>

           <script>
               let stripe_buttons = document.getElementsByClassName("stripe-button-el");
               for (let i = 0; i < stripe_buttons.length; ++i) {
                   let item = stripe_buttons[i];
                   item.style.display = 'none';
               }
           </script>
       @else
           <b class="pageSubHeading text-left" style="font-size: 14px;">You don't have any saved searches at the moment</b>
       @endif

   </div>


@endsection