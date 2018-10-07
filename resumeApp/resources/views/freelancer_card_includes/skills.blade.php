{{-- skills --}}
<div class="row" style="margin-top: 15px;">
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

    <div class="col-md-12  text-center">
        <span class="cardLabel" style="color:#4E75E8;">Skills:</span>
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