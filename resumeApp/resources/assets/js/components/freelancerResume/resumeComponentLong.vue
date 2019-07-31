<template>
    <div class="d-flex flex-wrap justify-content-center">
        <div class="freelancerCard">

            <div class="row">

                <div class="col-lg-12 col-md-12 col-12 resumeCardRight">
                    <div class="showOnlyOnmd">
                        <!-- main card info -->
                        <div class="row nameRow">
                            <div class="col-lg-2 col-6 imageCol">
                                <div class="imageContainer" style="padding: 10px;">
                                    <img :src="getImageSrc(freelancer.user_data.photo)" alt="freelancer" class="freelancerImg"
                                         width="120" height="120">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6 freelancerCardLeft">
                                <div class="nameArea">
                                    <div class="nameCard">
                                        {{freelancer.firstName}}
                                    </div>
                                    <div class="jobTitle" style="color: white; font-size: 14px; padding-top: 7px;" :id="'animatedText'+freelancer.id">
                                        {{freelancer.user_data.jobTitle}}
                                    </div>

                                    <form action="/chat-room/start_conversation" method="post">
                                        <input type="hidden" name="freelancer_id" :value="freelancer.id">
                                        <input type="submit"  value="TAP TO CHAT" class="tap-to-chat cursorPointerOnHover" style="background: none; border:none; outline: none;">
                                    </form>


                                    <div :id="'welcomeText'+freelancer.id" class="d-none">
                                        Hi, I am {{freelancer.firstName}}, I am a {{freelancer.user_data.jobTitle}}, How can I help
                                        you ?
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-7 col-md-8 freelancerCardRight d-flex align-items-center">

                                <div class="row hireRow w-100">
                                    <div  class="col-md-4 text-center" style="font-size: 15px; color: white;" >
                                    <span style="font-weight: bold;">
                                        {{freelancer.user_data.salary}}
                                    </span>
                                        <div class="cardLabel" style="font-size: 13px; font-weight: normal;">Hourly rate</div>
                                    </div>

                                    <div class="col-md-4 text-center"  style="font-size: 15px; color: white;">
                                        <span style="font-weight: bold;">{{freelancer.user_data.availableHours.replace(/[^0-9]/g,'')}} hours</span>
                                        <div class="cardLabel" style="font-size: 13px; font-weight: normal;">Weekly Availability</div>
                                    </div>

                                    <div class="col-md-4" style="padding: 0;">

                                        <div class="row text-center cardRow NoDecor">
                                            <a class="hireCardBtn btn-block showHireSection" href="javascript:void(0)" @click="showHireSection(freelancer.id)">
                                                Hire me
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- end of main card info -->
                    </div>


                    <div class="showOnlyOnsm">
                        <!-- main card info -->
                        <div class="row cardMainInfo_mob">
                            <div class="col-6">
                                <div class="imageContainer" style="padding: 20px 10px 10px 10px;">
                                    <img :src="getImageSrc(freelancer.user_data.photo)" alt="freelancer" class="freelancerImg"
                                         width="120" height="120">
                                </div>
                            </div>
                            <div class="col-6 resumeCardRight">
                                <div class="nameArea">
                                    <div class="nameCard">
                                        {{freelancer.firstName}}
                                    </div>
                                    <div class="jobTitle" style="font-size: 17px; padding-left: 0; color: #c1d1ff" :id="'animatedText' + freelancer.id">
                                        {{freelancer.user_data.jobTitle}}
                                    </div>
                                    <div  class="text-left" style="font-size: 15px; color: white; padding-top: 5px;" >
                                        <div class="cardLabel" style="font-weight: 300; font-size:14px ;">Hourly rate :
                                            <span style="font-weight: bold;">
                                            $ {{freelancer.user_data.salary}}
                                        </span>
                                        </div>
                                    </div>
                                    <div class="text-left"  style="font-size: 15px; color: white; padding-top: 5px;">
                                        <div class="cardLabel" style="font-weight: 300; font-size:14px ;">Availability :  <span style="font-weight: bold;">{{freelancer.user_data.availableHours.replace(/[^0-9]/g,'')}}h/week</span></div>
                                    </div>
                                    <div :id="'welcomeText'+freelancer.id" class="d-none">
                                        Hi, I am {{freelancer.firstName}}, I am a {{freelancer.user_data.jobTitle}}, How can I help
                                        you ?
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6" style="margin-top: -39px; padding-left: 28px;">
                                    <form action="/chat-room/start_conversation" method="post">
                                        <input type="hidden" name="freelancer_id" :value="freelancer.id">
                                        <input type="submit"  value="TAP TO CHAT" class="tap-to-chat cursorPointerOnHover" style="background: none; border:none; outline: none;">
                                    </form>
                                </div>
                            </div>

                            <div class="col-12" style="padding: 10px 20px 16px 20px;">
                                <div class="text-center cardRow NoDecor">
                                    <a class="hireCardBtn btn-block showHireSection" href="javascript:void(0)" @click="showHireSection(freelancer.id)">
                                        Hire me
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- end of main card info -->
                    </div>

                    <div id="nav-taps-resume" style="border-bottom:1px solid lightgray;">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link text-center active" :href="'#languagesTab' + freelancer.id" role="tab" data-toggle="tab">
                                    Programming Languages
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-center" :href="'#databases' + freelancer.id " role="tab" data-toggle="tab">
                                    Frameworks / Databases
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-center" :href="'#skillsTab' + freelancer.id " role="tab" data-toggle="tab">
                                    Design Skills
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-center" :href="'#software' + freelancer.id " role="tab" data-toggle="tab">
                                    Software
                                </a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active firstItem" :id="'languagesTab' + freelancer.id">
                                <div class="row" style="padding-top: 17px;padding-bottom: 16px;background: #fdfdfd;">
                                    <div class="col-md-12  text-center">
                                        <span class="skillsCard">
                                                <span @mouseover="highlightSkill(skill,0)" @mouseleave="highlightSkill(skill,100)" v-for="(skill,index) in skills" :key="index" v-show="skill.type === 'programming'" class="highlightSkill">
                                                    <img style="width: 17px;padding-bottom: 3px;" :src="getSkillIconSrc(skill.skill_title)" alt="skill" :id="'skillImage_' + skill.id">
                                                    {{skill.skill_title}}
                                                </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane " :id="'databases' + freelancer.id">
                                <div class="row" style="padding-top: 17px;padding-bottom: 16px;background: #fdfdfd;">
                                    <div class="col-md-12  text-center">
                                        <span class="skillsCard">
                                                <span @mouseover="highlightSkill(skill,0)" @mouseleave="highlightSkill(skill,100)" v-for="(skill,index) in skills" :key="index" v-show="skill.type === 'frameworks'" class="highlightSkill">
                                                    <img style="width: 17px;padding-bottom: 3px;" :src="getSkillIconSrc(skill.skill_title)" alt="skill" :id="'skillImage_' + skill.id">
                                                    {{skill.skill_title}}
                                                </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" :id="'skillsTab' + freelancer.id">
                                <div class="row" style="padding-top: 17px;padding-bottom: 16px;background: #fdfdfd;">
                                    <div class="col-md-12  text-center">
                                        <span class="skillsCard">
                                                <span @mouseover="highlightSkill(skill,0)" @mouseleave="highlightSkill(skill,100)" v-for="(skill,index) in skills" :key="index" v-show="skill.type === 'design'" class="highlightSkill">
                                                    <img style="width: 17px;padding-bottom: 3px;" :src="getSkillIconSrc(skill.skill_title)" alt="skill" :id="'skillImage_' + skill.id">
                                                    {{skill.skill_title}}
                                                </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" :id="'software' + freelancer.id">
                                <div class="row" style="padding-top: 17px;padding-bottom: 16px;background: #fdfdfd;">
                                    <div class="col-md-12  text-center">
                                        <span class="skillsCard">
                                                <span @mouseover="highlightSkill(skill,0)" @mouseleave="highlightSkill(skill,100)"  v-for="(skill,index) in skills" :key="index" v-show="skill.type === 'software'" :id="'skillContainer'+skill.id" class="highlightSkill">
                                                    <img style="width: 17px;padding-bottom: 3px;" :src="getSkillIconSrc(skill.skill_title)" alt="skill" :id="'skillImage_' + skill.id">
                                                    {{skill.skill_title}}
                                                </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <transition name="slide-fade">
                        <div v-show="portfolio">
                            <!-- portfolio section -->
                            <slick class="projectsSection" :id="'portfolio_section_' + freelancer.id" ref="slick" :options="slickOptions">
                                <div  v-for="(project,index) in freelancer.projects" :key="index + 'A'" >
                                    <!-- class="d-flex justify-content-center" style="height: 250px !important; padding: 0 2px 0 2px; overflow: hidden;" -->

                                    <div class="workCard" style="margin:10px; margin-bottom: 0px;">
                                        <div class="workImg">
                                            <a href="javascript:void(0)"
                                               style="outline: none;"
                                               data-toggle="modal" :data-target="'#project_modal_'+project.id" @click="loadHDImage(project.id)">

                                                <vue-load-image class="d-flex justify-content-center align-items-center">
                                                    <img :src="getResizedImage(project.mainImage)" alt="" width="260" slot="image">
                                                    <img  alt="" slot="preloader" src="/resumeApp/public/images/spinner-load.gif" style="width: 100px; height: 100px;" />
                                                </vue-load-image>
                                            </a>
                                        </div>
                                        <div class="workTitle">
                                            <div class="row">
                                                <div class="col-md-10 col-9">
                                                    {{project.projectName}}
                                                </div>
                                                <a class="col-md-1 col-1" href="javascript:void(0)"
                                                   data-toggle="modal" :data-target="'#project_modal_'+project.id"
                                                   style="outline: none; margin-left: 16px;">
                                                    <img src="/resumeApp/public/images/newResume/link.png"
                                                         alt="view work">
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <!--<div>-->
                                    <!--<a @click="loadHDImage(project.id)" href="javascript:void(0)"   data-toggle="modal" :data-target="'#project_modal_'+project.id" style="outline:0; " >-->
                                    <!--<vue-load-image>-->
                                    <!--<img :src="getResizedImage(project.mainImage)" alt="" width="100%" slot="image" height="auto" style="min-height:250px; border-radius:10px;">-->
                                    <!--<img  alt="" slot="preloader" src="/resumeApp/public/images/spinner-load.gif"/>-->
                                    <!--</vue-load-image>-->
                                    <!--</a>-->
                                    <!--</div>-->
                                </div>
                            </slick>

                            <div class="row carouselControls" style="width: 100%;">
                                <div class=" col-12 text-center NoDecor">
                                    <a href="javascript:void(0)" class="cardLabel_interviews noScroll" @click="slidePrev"
                                       style="color:#697786;">
                                        <img src="/resumeApp/resources/assets/images/left_arrow.png"
                                             alt="prev" width="15px">
                                    </a>

                                    <span class="jobTitle" style="padding: 0 5px 0 5px"> <span>{{slideNumber}}</span> / <span> {{numberOfSlides}} </span></span>

                                    <a href="javascript:void(0)" role="button" data-slide="next" class="cardLabel_interviews noScroll" @click="slideNext"
                                       style="color:#697786;">
                                        <img src="/resumeApp/resources/assets/images/right_arrow.png"
                                             alt="next" width="15px">
                                    </a>
                                </div>
                            </div>
                            <!-- end of portfolio section -->
                        </div>
                    </transition>


                    <transition name="slide-fade-left">
                        <div v-show="hire">
                            <div style="border-top: 1px solid #EBEDEF; ">
                                <div class="row">
                                    <div class="offset-md-4 col-md-4 col-12">
                                        <div class="hireText">
                                            Select the number of Hours you need per week:
                                        </div>
                                        <div class="hoursBtn NoDecor">
                                            <a href="javascript:void(0)">
                                                <img src="/resumeApp/public/images/newResume/minus.png" style="width: 18px; padding-right: 8px;" alt="minus" @click="subtractHours">
                                            </a>
                                            <span>{{hours}}</span> hours
                                            <a href="javascript:void(0)">
                                                <img src="/resumeApp/public/images/newResume/plus.png" style="width: 18px; padding-left: 8px;" alt="plus" @click="addHours" >
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="offset-md-4 col-md-4 col-12">
                                        <div class="hireText">
                                            How many weeks would you like to book for?
                                        </div>
                                        <div class="hoursBtn NoDecor">
                                            <a href="javascript:void(0)">
                                                <img src="/resumeApp/public/images/newResume/minus.png" style="width: 18px; padding-right: 8px;" alt="minus" @click="subtractWeeks">
                                            </a>
                                            <span>{{weeks}}</span> weeks
                                            <a href="javascript:void(0)">
                                                <img src="/resumeApp/public/images/newResume/plus.png" style="width: 18px; padding-left: 8px;" alt="plus" @click="addWeeks">
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="padding-top:50px; padding-bottom: 50px;">
                                    <div class="offset-md-2 col-12 col-md-8" style="border-top: 1px solid #EBEDEF;">
                                        <div class="row">
                                            <div class="col-md-2 col-4 text-left jobTitle" style="font-size: 12px; color: #30323D;">
                                                Monthly rate
                                            </div>
                                            <div class="col-md-2 col-3 offset-5 offset-md-8 text-right jobTitle" style="font-weight: bold;font-size: 12px; color: #30323D;">
                                                {{freelancer.user_data.salary_month}} $
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="border-top: 1px solid #EBEDEF;">
                                    <div class="col-md-4 offset-md-2 col-12 NoDecor" style="padding-top: 17px;">
                                        <a href="javascript:void(0)" class="justify-content-center d-flex btn-block cancelBtn" @click="hideHireSection">Cancel Booking</a>
                                    </div>
                                    <div class="col-md-4 col-12 NoDecor whiteOnHover" style="padding-top: 17px; padding-bottom: 30px;">
                                        <a class="btn d-flex btn-block summaryBtn" :href="'/stripe/hire?freelancerID=' + freelancer.id + '&hours=' + hours + '&weeks=' + weeks ">Booking Summary</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </transition>


                </div>

            </div>

        </div>

        <div  v-for="(project,index) in freelancer.projects" :key="index + project.id" class="modal fade" :id="'project_modal_'+project.id" tabindex="-1" role="dialog" aria-labelledby="certificate" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document" style="">
                <div class="modal-content modal-mobile-resume-new-homepage" data-dismiss="modal"
                     aria-label="Close">
                    <div class="modal-body" style="padding: 0;">
                        <div class="row">
                            <div class="col-md-9" style="padding: 0;">
                                <vue-load-image>
                                    <img :src="getResizedImage(project.mainImage)" :id="'projectModalPhoto' + project.id" alt="" width="100%" slot="image" height="auto">
                                    <img slot="preloader" src="/resumeApp/public/images/spinner-load.gif"/>
                                </vue-load-image>
                                <!--<div v-for="(image, index) in getProjectImages(project.images)" :key="index + 'a'">-->
                                <!--<iframe v-if="image.includes('embed')" height="400" width="100%" :src="image+'?bgcolor=%23191919'" allowfullscreen autoplay style="margin: 0px auto; display: block;"></iframe>-->
                                <!--<img v-else :src="image" alt="" width="100%" height="auto">-->
                                <!--</div>-->

                            </div>
                            <div class="col-md-3">
                                <div class="form-group" style="padding-top: 25px;">
                                    <label class="panelFormLabel"> Name
                                        <hr>
                                    </label><br/>
                                    <div class="panelFormLabel">
                                        {{project.projectName}}
                                    </div>
                                </div>
                                <div class="form-group" style="padding-top: 25px;">
                                    <label class="panelFormLabel"> Description
                                        <hr>
                                    </label><br/>
                                    <div class="panelFormLabel">
                                        {{project.projectDesc}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import Slick from 'vue-slick';
    import VueLoadImage from 'vue-load-image'

    export default {
        props:['freelancer','hire','search'],
        components:{
            'vue-load-image': VueLoadImage,
            Slick
        },
        data(){
            return {
                slideNumber : 1 ,
                numberOfSlides : this.calculateNumberOfSlides(),
                skills: this.freelancer.skills,
                slickOptions: {
                    infinite: false,
                    dots: false,
                    arrows: false,
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    responsive: [
                        {
                            breakpoint: 786,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                            }
                        },
                        {
                            breakpoint: 991,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                            }
                        }
                    ]
                },
                weeks:4,
                hours: this.freelancer.user_data.availableHours.replace(/[^0-9]/g,'') ,
                portfolio : !this.hire
            }
        },
        methods:{
            getResizedImage(src){
                let resizedImage = this.getImageSrc(src).replace('/resumeApp/uploads','/resumeApp/uploads/resized-images');
                if(this.search == false){
                    return resizedImage;
                }
                return  this.getImageSrc(src)
            },
            getSkillIconSrc(skill_title){
                let arrayOfSkillImages = {
                    'ui design' : '/resumeApp/resources/assets/images/skills_icons/user_interface.png',
                    'ux design' : '/resumeApp/resources/assets/images/skills_icons/user_experience.png',
                    'logo design' : '/resumeApp/resources/assets/images/skills_icons/logo_design.png',
                    'animation' : '/resumeApp/resources/assets/images/skills_icons/animation.jpg',
                    'motion graphics' : '/resumeApp/resources/assets/images/skills_icons/motion_graphics.png',
                    'illustration' : '/resumeApp/resources/assets/images/skills_icons/illustration.png',
                    'advertising' : '/resumeApp/resources/assets/images/skills_icons/advertising.png',
                    'branding': '/resumeApp/resources/assets/images/skills_icons/branding.png',
                    'brochure Design': '/resumeApp/resources/assets/images/skills_icons/brochure_design.png',
                    'website design': '/resumeApp/resources/assets/images/skills_icons/web_design.png',
                    'game designer': '/resumeApp/resources/assets/images/skills_icons/game_designer.png',
                    'character design': '/resumeApp/resources/assets/images/skills_icons/character_design.png',
                    'digital painting': '/resumeApp/resources/assets/images/skills_icons/digital_painting.png',
                    'creative director': '/resumeApp/resources/assets/images/skills_icons/creative_director.png',
                    'html / css': '/resumeApp/resources/assets/images/skills_icons/HTML.png',
                    // 2-

                    'adobe after effects':'/resumeApp/resources/assets/images/skills_icons/AE.png',
                    'sketch':'/resumeApp/resources/assets/images/skills_icons/Sketch.png',
                    'adobe illustrator':'/resumeApp/resources/assets/images/skills_icons/Illustrator.png',
                    'adobe xd':'/resumeApp/resources/assets/images/skills_icons/AdobeXD.png',
                    'photoshop':'/resumeApp/resources/assets/images/skills_icons/Photoshop.png',
                    'autocad':'/resumeApp/resources/assets/images/skills_icons/autocad.png',
                    'solidworks':'/resumeApp/resources/assets/images/skills_icons/solid_works.png',
                    'adobe flash':'/resumeApp/resources/assets/images/skills_icons/adobe_flash.png',
                    'digital drawing Tablet':'/resumeApp/resources/assets/images/skills_icons/digital_drawing_tablet.png',
                    'adobe indesign':'/resumeApp/resources/assets/images/skills_icons/indesign.png',
                    'coreldraw':'/resumeApp/resources/assets/images/skills_icons/corel_draw.png',
                    '3d max':'/resumeApp/resources/assets/images/skills_icons/3d_max.png',

                    // developer :
                    // 1-
                    'javascript' :'/resumeApp/resources/assets/images/skills_icons/javascript.png',
                    'sql':'/resumeApp/resources/assets/images/skills_icons/mysql.png',
                    'java':'resumeApp/resources/assets/images/skills_icons/java.png',
                    'c#':'/resumeApp/resources/assets/images/skills_icons/c#.png',
                    'python':'/resumeApp/resources/assets/images/skills_icons/python.png',
                    'php':'/resumeApp/resources/assets/images/skills_icons/php.png',
                    'c++':'/resumeApp/resources/assets/images/skills_icons/c_language.png',
                    'c':'/resumeApp/resources/assets/images/skills_icons/c_language.png',
                    'typescript':'/resumeApp/resources/assets/images/skills_icons/typescript.png',
                    'ruby':'/resumeApp/resources/assets/images/skills_icons/ruby.png',
                    'objective-C':'/resumeApp/resources/assets/images/skills_icons/objective_c.png',
                    'swift':'/resumeApp/resources/assets/images/skills_icons/swift.png',
                    'vb.net':'/resumeApp/resources/assets/images/skills_icons/vb_net.png',
                    'go':'/resumeApp/resources/assets/images/skills_icons/go.png',
                    'perl':'/resumeApp/resources/assets/images/skills_icons/perl.png',
                    'scala':'/resumeApp/resources/assets/images/skills_icons/scala.png',
                    'groovy':'/resumeApp/resources/assets/images/skills_icons/groovy.png',
                    'assembly':'/resumeApp/resources/assets/images/skills_icons/assembly.png',
                    'coffeescript':'/resumeApp/resources/assets/images/skills_icons/coffeeScript.png',
                    'vba':'/resumeApp/resources/assets/images/skills_icons/vba.png',
                    'r':'/resumeApp/resources/assets/images/skills_icons/r_lang.png',
                    'matlab':'/resumeApp/resources/assets/images/skills_icons/matlab.png',
                    'visual basic 6':'/resumeApp/resources/assets/images/skills_icons/matlab.png',
                    'lua':'/resumeApp/resources/assets/images/skills_icons/lua.png',
                    'haskell':'/resumeApp/resources/assets/images/skills_icons/haskell.png',
                    'html':'/resumeApp/resources/assets/images/skills_icons/HTML.png',
                    'css':'/resumeApp/resources/assets/images/skills_icons/CSS.png',

                    //2-
                    'angularjs' : '/resumeApp/resources/assets/images/skills_icons/Angularjs.png',
                    'angular.js' : '/resumeApp/resources/assets/images/skills_icons/Angularjs.png',
                    'node.js' : '/resumeApp/resources/assets/images/skills_icons/node_js.png',
                    'nodejs' : '/resumeApp/resources/assets/images/skills_icons/node_js.png',
                    '.net Core' : '/resumeApp/resources/assets/images/skills_icons/netcore.png',
                    'react' : '/resumeApp/resources/assets/images/skills_icons/react.png',
                    'cordova' : '/resumeApp/resources/assets/images/skills_icons/cordava.png',
                    'firebase' : '',
                    'xamarin' : '',
                    'hadoop' : '/resumeApp/resources/assets/images/skills_icons/hadoop.png',
                    'spark' : '/resumeApp/resources/assets/images/skills_icons/spark.png',
                    'mysql' : '/resumeApp/resources/assets/images/skills_icons/mysql.png',
                    'sql server' : '/resumeApp/resources/assets/images/skills_icons/sql server.png',
                    'postgresql' : '/resumeApp/resources/assets/images/skills_icons/postgreSQL.png',
                    'sqlite' : '/resumeApp/resources/assets/images/skills_icons/SQLite.png',
                    'mongodb' : '/resumeApp/resources/assets/images/skills_icons/mongoDB.png',
                    'oracle' : '/resumeApp/resources/assets/images/skills_icons/Oracle.png',
                    'redis' : '/resumeApp/resources/assets/images/skills_icons/redis.png',
                    'cassandra' : '/resumeApp/resources/assets/images/skills_icons/cassandra.png'
            };
                if(arrayOfSkillImages.hasOwnProperty(skill_title.toLowerCase())){
                    return arrayOfSkillImages[skill_title.toLowerCase()] ;
                }
                return '/resumeApp/resources/assets/images/skills_icons/skill.png' ;
            },
            getImageSrc(src){
                if(!src){
                    return '/resumeApp/public/images/placeholder.png';
                }

                if(src.charAt(0) !== '/' && src.charAt(0) !== 'h'){
                    return '/'+src;
                }

                return src;
            },
            loadHDImage(project_id){
                let projects = this.freelancer.projects ;
                $.each(projects, function(i){
                    if(projects[i].id === project_id) {
                        $('#projectModalPhoto'+project_id).attr('src',projects[i].mainImage);
                        return false;
                    }
                });
            },
            showHireSection(freelancer_id){
                setTimeout( () => {
                    this.hire = true ;
                },800);
                this.portfolio = false ;
            },
            hideHireSection(){
                this.hire = false ;
                setTimeout( () => {
                    this.portfolio = true ;
                    this.$nextTick(() => {
                        this.$refs.slick.reSlick();
                        this.slideNumber = 1 ;
                    });
                },800);
            },
            updateSlick(){
                this.$nextTick(() => {
                    if(this.$refs.slick !== undefined){
                        this.$refs.slick.reSlick();
                        this.slideNumber = 1 ;
                    }
                });
            },
            addHours(){
                this.hours++ ;
            },
            subtractHours(){
                this.hours-- ;
            },
            addWeeks(){
                this.weeks++ ;
            },
            subtractWeeks(){
                this.weeks-- ;
            },
            slidePrev(){
                this.$refs.slick.prev();
                if(this.slideNumber-1 > 0){
                    this.slideNumber-- ;
                }
            },
            slideNext(){
                this.$refs.slick.next();
                if(this.slideNumber+1 <= this.calculateNumberOfSlides() ){
                    this.slideNumber++ ;
                }
            },
            calculateNumberOfSlides(){
                var width = $(window).width();
                if(width < 991){
                    return (this.freelancer.projects.length) ;
                }
                return (Math.ceil(this.freelancer.projects.length / 2)) ;
            },
            highlightSkill(skill,percent){
                console.log(skill.skill_title);
                $('#skillImage_' + skill.id).css('filter', 'grayscale('+ percent + '%)');
            }
        },
        mounted() {

        },
        created: function() {
            this.$parent.$on('update', this.updateSlick);
        }
    }
</script>

<style lang="scss" scoped>
    .projectsSection{
        margin-top: 1px;
        padding: 20px;
        margin-bottom: 18px;
        @media only screen and (max-width: 500px) {
            padding: 2px;
        }
    }
    .freelancerCard{
        margin-bottom: 12px;
        padding-bottom: 12px;
        margin-left: 10px;
        margin-right: 10px;
        min-height: 600px ;
        @media only screen and (max-width: 1200px) {
            width: 910px;
        }
        @media only screen and (max-width: 786px) {
            width: 710px;
            min-height: 645px;
        }
        @media only screen and (max-width: 500px) {
            width: 315px;
        }
    }

    .workCard{
        @media only screen and (max-width: 500px) {
            min-width:290px;
        }
    }

    .slick-dots {
        display: flex;
        justify-content: center;
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity .7s;
    }

    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }


    .slide-fade-enter-active {
        transition: all .7s ease;
    }
    .slide-fade-leave-active {
        transition: all .7s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }
    .slide-fade-enter, .slide-fade-leave-to
        /* .slide-fade-leave-active below version 2.1.8 */ {
        transform: translateX(10px);
        opacity: 0;
    }



    .slide-fade-left-enter-active {
        transition: all .7s ease;
    }
    .slide-fade-left-leave-active {
        transition: all .7s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }
    .slide-fade-left-enter, .slide-fade-left-leave-to
        /* .slide-fade-leave-active below version 2.1.8 */ {
        transform: translateX(-10px);
        opacity: 0;
    }

</style>
