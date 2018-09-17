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
                        <div id="welcomeText{{$freelancer->id}}" class="d-none">
                            Hi, I am {{$freelancer->firstName}}, I am a {{$freelancer->userData->jobTitle}}, Looking forward to working with you.
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="col-lg-10 col-md-9 col-12 resumeCardRight" id="resumeCardRight{{$freelancer->id}}">
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
                        <div id="welcomeText{{$freelancer->id}}" class="d-none">
                            Hi, I am {{$freelancer->firstName}}, I am a {{$freelancer->userData->jobTitle}}, Looking forward to working with you.
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 freelancerCardRight">
                    <div class="nameCard" style="font-size: 18px;">
                        ${{intval($freelancer->userData->salary) +5}}
                        <div class="cardLabel" style="font-size: 15px;">Hourly rate</div>
                    </div>
                </div>
            </div>
            {{-- end of photo and multimedia --}}
            <hr style="width: 97%;" class="d-none d-md-block">

            {{-- skills --}}
            <div class="row skillsRow marginMobile-0">
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
                            <? if($i<6):?>
                            <?
                            $imgSrc = '/resumeApp/resources/assets/images/skills_icons/skill.png' ;
                            if(isset($skillsDesigner[$skill]) && !empty($skillsDesigner[$skill])){
                                $imgSrc = $skillsDesigner[$skill] ;
                            }
                            ?>
                            <span id="skillContainer{{$i}}" class="highlightSkill">
                                         <img width="20px" src="{{$imgSrc}}" alt="skill" id="skillImage{{$i}}">
                                {{$skill}} &nbsp;&nbsp;
                                    </span>
                            <? $i++;?>
                            <? endif;?>
                        @endforeach
                    </span>
                </div>
            </div>
            {{-- end of skills--}}
        </div>

    </div>
</div>