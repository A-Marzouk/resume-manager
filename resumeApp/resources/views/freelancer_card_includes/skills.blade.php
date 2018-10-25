<?
    $skillsDesigner = [
    // designer
    // 1-
    'ui design' => '/resumeApp/resources/assets/images/skills_icons/user_interface.png',
    'ux design' => '/resumeApp/resources/assets/images/skills_icons/user_experience.png',
    'logo design' => '/resumeApp/resources/assets/images/skills_icons/logo_design.png',
    'animation' => '/resumeApp/resources/assets/images/skills_icons/animation.jpg',
    'motion graphics' => '/resumeApp/resources/assets/images/skills_icons/motion_graphics.png',
    'illustration' => '/resumeApp/resources/assets/images/skills_icons/illustration.png',
    'advertising' => '/resumeApp/resources/assets/images/skills_icons/advertising.png',
    'branding'=> '/resumeApp/resources/assets/images/skills_icons/branding.png',
    'brochure Design'=> '/resumeApp/resources/assets/images/skills_icons/brochure_design.png',
    'website design'=> '/resumeApp/resources/assets/images/skills_icons/web_design.png',
    'game designer'=> '/resumeApp/resources/assets/images/skills_icons/game_designer.png',
    'character design'=> '/resumeApp/resources/assets/images/skills_icons/character_design.png',
    'digital painting'=> '/resumeApp/resources/assets/images/skills_icons/digital_painting.png',
    'creative director'=> '/resumeApp/resources/assets/images/skills_icons/creative_director.png',
    'html / css'=> '/resumeApp/resources/assets/images/skills_icons/HTML.png',
    // 2-

    'adobe after effects'=>'/resumeApp/resources/assets/images/skills_icons/AE.png',
    'sketch'=>'/resumeApp/resources/assets/images/skills_icons/Sketch.png',
    'adobe illustrator'=>'/resumeApp/resources/assets/images/skills_icons/Illustrator.png',
    'adobe xd'=>'/resumeApp/resources/assets/images/skills_icons/AdobeXD.png',
    'photoshop'=>'/resumeApp/resources/assets/images/skills_icons/Photoshop.png',
    'autocad'=>'/resumeApp/resources/assets/images/skills_icons/autocad.png',
    'solidworks'=>'/resumeApp/resources/assets/images/skills_icons/solid_works.png',
    'adobe flash'=>'/resumeApp/resources/assets/images/skills_icons/adobe_flash.png',
    'digital drawing Tablet'=>'/resumeApp/resources/assets/images/skills_icons/digital_drawing_tablet.png',
    'adobe indesign'=>'/resumeApp/resources/assets/images/skills_icons/indesign.png',
    'coreldraw'=>'/resumeApp/resources/assets/images/skills_icons/corel_draw.png',
    '3d max'=>'/resumeApp/resources/assets/images/skills_icons/3d_max.png',

    // developer :
    // 1-
    'javascript' =>'/resumeApp/resources/assets/images/skills_icons/javascript.png',
    'sql'=>'/resumeApp/resources/assets/images/skills_icons/mysql.png',
    'java'=>'resumeApp/resources/assets/images/skills_icons/java.png',
    'c#'=>'/resumeApp/resources/assets/images/skills_icons/c#.png',
    'python'=>'/resumeApp/resources/assets/images/skills_icons/python.png',
    'php'=>'/resumeApp/resources/assets/images/skills_icons/php.png',
    'c++'=>'/resumeApp/resources/assets/images/skills_icons/c_language.png',
    'c'=>'/resumeApp/resources/assets/images/skills_icons/c_language.png',
    'typescript'=>'/resumeApp/resources/assets/images/skills_icons/typescript.png',
    'ruby'=>'/resumeApp/resources/assets/images/skills_icons/ruby.png',
    'objective-C'=>'/resumeApp/resources/assets/images/skills_icons/objective_c.png',
    'swift'=>'/resumeApp/resources/assets/images/skills_icons/swift.png',
    'vb.net'=>'/resumeApp/resources/assets/images/skills_icons/vb_net.png',
    'go'=>'/resumeApp/resources/assets/images/skills_icons/go.png',
    'perl'=>'/resumeApp/resources/assets/images/skills_icons/perl.png',
    'scala'=>'/resumeApp/resources/assets/images/skills_icons/scala.png',
    'groovy'=>'/resumeApp/resources/assets/images/skills_icons/groovy.png',
    'assembly'=>'/resumeApp/resources/assets/images/skills_icons/assembly.png',
    'coffeescript'=>'/resumeApp/resources/assets/images/skills_icons/coffeeScript.png',
    'vba'=>'/resumeApp/resources/assets/images/skills_icons/vba.png',
    'r'=>'/resumeApp/resources/assets/images/skills_icons/r_lang.png',
    'matlab'=>'/resumeApp/resources/assets/images/skills_icons/matlab.png',
    'visual basic 6'=>'/resumeApp/resources/assets/images/skills_icons/matlab.png',
    'lua'=>'/resumeApp/resources/assets/images/skills_icons/lua.png',
    'haskell'=>'/resumeApp/resources/assets/images/skills_icons/haskell.png',
    'html'=>'/resumeApp/resources/assets/images/skills_icons/HTML.png',
    'css'=>'/resumeApp/resources/assets/images/skills_icons/CSS.png',

    //2-
    'angularjs' => '/resumeApp/resources/assets/images/skills_icons/Angularjs.png',
    'node.js' => '/resumeApp/resources/assets/images/skills_icons/node_js.png',
    '.net Core' => '/resumeApp/resources/assets/images/skills_icons/netcore.png',
    'react' => '/resumeApp/resources/assets/images/skills_icons/react.png',
    'cordova' => '/resumeApp/resources/assets/images/skills_icons/cordava.png',
    'firebase' => '',
    'xamarin' => '',
    'hadoop' => '/resumeApp/resources/assets/images/skills_icons/hadoop.png',
    'spark' => '/resumeApp/resources/assets/images/skills_icons/spark.png',
    'mysql' => '/resumeApp/resources/assets/images/skills_icons/mysql.png',
    'sql server' => '/resumeApp/resources/assets/images/skills_icons/sql server.png',
    'postgresql' => '/resumeApp/resources/assets/images/skills_icons/postgreSQL.png',
    'sqlite' => '/resumeApp/resources/assets/images/skills_icons/SQLite.png',
    'mongodb' => '/resumeApp/resources/assets/images/skills_icons/mongoDB.png',
    'oracle' => '/resumeApp/resources/assets/images/skills_icons/Oracle.png',
    'redis' => '/resumeApp/resources/assets/images/skills_icons/redis.png',
    'cassandra' => '/resumeApp/resources/assets/images/skills_icons/cassandra.png'
];
?>

<div id="nav-taps-resume">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link text-center active" href="#languagesTab{{$freelancer->id}}{{$value['id']}}" role="tab" data-toggle="tab">
                Programming Languages
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-center" href="#databases{{$freelancer->id}}{{$value['id']}}" role="tab" data-toggle="tab">
                Frameworks / Databases
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-center" href="#skillsTab{{$freelancer->id}}{{$value['id']}}" role="tab" data-toggle="tab">
                Design Skills
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-center" href="#software{{$freelancer->id}}{{$value['id']}}" role="tab" data-toggle="tab">
                Software
            </a>
        </li>
    </ul>
    <?
    $freelancerSkills = $freelancer->skills;
    $i=0;
    ?>
    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active firstItem" id="languagesTab{{$freelancer->id}}{{$value['id']}}">
            <div class="row" style="padding-top: 17px;padding-bottom: 16px;background: #fdfdfd;">
                <div class="col-md-12  text-center">
                    <span class="skillsCard">
                        <? $i= 0 ;?>
                        @foreach($freelancerSkills as $skill)
                            <? if($i<6 && $skill->type == 'programming'):?>
                                    <?
                                    $imgSrc = '/resumeApp/resources/assets/images/skills_icons/skill.png' ;
                                    if(isset($skillsDesigner[strtolower($skill->skill_title)]) && !empty($skillsDesigner[strtolower($skill->skill_title)])){
                                        $imgSrc = $skillsDesigner[strtolower($skill->skill_title)] ;
                                    }
                                    ?>
                                    <span id="skillContainer{{$i}}" class="highlightSkill">
                                        <img style="width: 17px;padding-bottom: 3px;" src="{{$imgSrc}}" alt="skill" id="skillImage{{$i}}">
                                        {{$skill->skill_title}} &nbsp;&nbsp;
                                    </span>
                                <?$i++;?>
                            <? endif;?>
                        @endforeach
                    </span>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="databases{{$freelancer->id}}{{$value['id']}}">
            <div class="text-center panelFormLabel" style="padding-top: 17px; padding-bottom: 17px;">
                <? $i=10 ;?>
                @foreach($freelancerSkills as $skill)
                    <? if($i<16 && $skill->type == 'frameworks'):?>
                    <?
                    $imgSrc = '/resumeApp/resources/assets/images/skills_icons/skill.png' ;
                    if(isset($skillsDesigner[strtolower($skill->skill_title)]) && !empty($skillsDesigner[strtolower($skill->skill_title)])){
                        $imgSrc = $skillsDesigner[strtolower($skill->skill_title)] ;
                    }
                    ?>
                    <span id="skillContainer{{$i}}" class="highlightSkill">
                                        <img style="width: 17px;padding-bottom: 3px;" src="{{$imgSrc}}" alt="skill" id="skillImage{{$i}}">
                        {{$skill->skill_title}} &nbsp;&nbsp;
                    </span>
                    <?$i++;?>
                    <? endif;?>
                @endforeach
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="skillsTab{{$freelancer->id}}{{$value['id']}}">
            <div class="row" style="padding-top: 17px;padding-bottom: 16px;background: #fdfdfd;">
                <div class="col-md-12  text-center">
                    <span class="skillsCard">
                        <?$i=20;?>
                      @foreach($freelancerSkills as $skill)
                            <? if($i<26 && $skill->type == 'design'):?>
                            <?
                            $imgSrc = '/resumeApp/resources/assets/images/skills_icons/skill.png' ;
                            if(isset($skillsDesigner[strtolower($skill->skill_title)]) && !empty($skillsDesigner[strtolower($skill->skill_title)])){
                                $imgSrc = $skillsDesigner[strtolower($skill->skill_title)] ;
                            }
                            ?>
                            <span id="skillContainer{{$i}}" class="highlightSkill">
                                        <img style="width: 17px;padding-bottom: 3px;" src="{{$imgSrc}}" alt="skill" id="skillImage{{$i}}">
                                {{$skill->skill_title}} &nbsp;&nbsp;
                                    </span>
                                <?$i++;?>
                            <? endif;?>
                        @endforeach
                    </span>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="software{{$freelancer->id}}{{$value['id']}}">
            <div class="text-center panelFormLabel" style="padding-top: 17px; padding-bottom: 17px;">
                <?$i=30;?>
                @foreach($freelancerSkills as $skill)
                    <? if($i<36 && $skill->type == 'software'):?>
                    <?
                    $imgSrc = '/resumeApp/resources/assets/images/skills_icons/skill.png' ;
                    if(isset($skillsDesigner[strtolower($skill->skill_title)]) && !empty($skillsDesigner[strtolower($skill->skill_title)])){
                        $imgSrc = $skillsDesigner[strtolower($skill->skill_title)] ;
                    }
                    ?>
                    <span id="skillContainer{{$i}}" class="highlightSkill">
                                        <img style="width: 17px;padding-bottom: 3px;" src="{{$imgSrc}}" alt="skill" id="skillImage{{$i}}">
                        {{$skill->skill_title}} &nbsp;&nbsp;
                                    </span>
                        <?$i++;?>
                    <? endif;?>
                @endforeach
            </div>
        </div>
    </div>
</div>