<template>
    <div>
        <div class="marginMobile-0">
            <div class="freelancerCard" style="margin-bottom: -16px; height: auto;">
                <div class="row actionRow">
                    <div class="importBtn importBtn_upload NoDecor">
                        <a href="javascript:void(0)" style="outline: none;" @click="showReferencesSection">
                            References / Testimonials
                        </a>
                    </div>
                </div>
            </div>
        </div>
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
                                            <a class="hireCardBtn btn-block showHireSection" href="javascript:void(0)" @click="showHireSection()">
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
                                    <a class="hireCardBtn btn-block showHireSection" href="javascript:void(0)" @click="showHireSection()">
                                        Hire me
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- end of main card info -->
                    </div>

                    <transition name="slide-fade">
                        <div v-show="portfolio">
                            <!-- nav row section -->

                            <div class="row navRow">
                                <div class="col-md-2 offset-md-3 col-4 text-center" style="border-right:1px solid #EBEDEF;" @click="setTab('skills')">
                                    <div class="navTab NoDecor" :class="{active: currentTab === 'skills' }">
                                        <a href="javascript:void(0)">
                                            Skills
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-2 col-4 text-center" style="border-right:1px solid #EBEDEF;" @click="setTab('work')">
                                    <div class="navTab NoDecor" :class="{active: currentTab === 'work' }">
                                        <a href="javascript:void(0)">
                                            Work
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-2 col-4 text-center" @click="setTab('education')">
                                    <div class="navTab NoDecor" :class="{active: currentTab === 'education' }">
                                        <a href="javascript:void(0)">
                                            Education
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- portfolio section -->

                            <div v-show="currentTab === 'skills'">
                                <div id="nav-taps-resume" style="padding-top:2px">
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
                                                    <div class="d-flex flex-column align-items-start" style="padding-top: 15px;">
                                                        <div @mouseover="highlightSkill(skill,0)" @mouseleave="highlightSkill(skill,100)" v-for="(skill,index) in skills" :key="index" v-show="skill.type === 'programming'" class="highlightSkill skills">
                                                            <!-- skill -->
                                                            <div class="skill text-left">
                                                                <!-- title -->
                                                                <div class="skill-title">
                                                                    <img style="width: 17px;padding-bottom: 3px;" :src="getSkillIconSrc(skill.skill_title)" alt="skill" :id="'skillImage_' + skill.id">
                                                                    {{skill.skill_title}}
                                                                </div>
                                                                <!-- bar -->
                                                                <div class="skill-bar" :data-bar="skill.percentage"><span></span></div>
                                                            </div>
                                                            <!-- #skill -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane " :id="'databases' + freelancer.id">
                                            <div class="row" style="padding-top: 17px;padding-bottom: 16px;background: #fdfdfd;">
                                                <div class="col-md-12  text-center">
                                                    <div class="d-flex flex-column align-items-start" style="padding-top: 15px;">
                                                        <div @mouseover="highlightSkill(skill,0)" @mouseleave="highlightSkill(skill,100)" v-for="(skill,index) in skills" :key="index" v-show="skill.type === 'frameworks'" class="highlightSkill skills">
                                                            <!-- skill -->
                                                            <div class="skill text-left">
                                                                <!-- title -->
                                                                <div class="skill-title">
                                                                    <img style="width: 17px;padding-bottom: 3px;" :src="getSkillIconSrc(skill.skill_title)" alt="skill" :id="'skillImage_' + skill.id">
                                                                    {{skill.skill_title}}
                                                                </div>
                                                                <!-- bar -->
                                                                <div class="skill-bar"  :data-bar="skill.percentage"><span></span></div>
                                                            </div>
                                                            <!-- #skill -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" :id="'skillsTab' + freelancer.id">
                                            <div class="row" style="padding-top: 17px;padding-bottom: 16px;background: #fdfdfd;">
                                                <div class="col-md-12  text-center">
                                                    <div class="d-flex flex-column align-items-start" style="padding-top: 15px;">
                                                        <div @mouseover="highlightSkill(skill,0)" @mouseleave="highlightSkill(skill,100)" v-for="(skill,index) in skills" :key="index" v-show="skill.type === 'design'" class="highlightSkill skills">
                                                            <!-- skill -->
                                                            <div class="skill text-left">
                                                                <!-- title -->
                                                                <div class="skill-title">
                                                                    <img style="width: 17px;padding-bottom: 3px;" :src="getSkillIconSrc(skill.skill_title)" alt="skill" :id="'skillImage_' + skill.id">
                                                                    {{skill.skill_title}}
                                                                </div>
                                                                <!-- bar -->
                                                                <div class="skill-bar"  :data-bar="skill.percentage"><span></span></div>
                                                            </div>
                                                            <!-- #skill -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" :id="'software' + freelancer.id">
                                            <div class="row" style="padding-top: 17px;padding-bottom: 16px;background: #fdfdfd;">
                                                <div class="col-md-12  text-center">
                                                    <div class="d-flex flex-column align-items-start" style="padding-top: 15px;">
                                                        <div @mouseover="highlightSkill(skill,0)" @mouseleave="highlightSkill(skill,100)" v-for="(skill,index) in skills" :key="index" v-show="skill.type === 'software'" class="highlightSkill skills">
                                                            <!-- skill -->
                                                            <div class="skill text-left">
                                                                <!-- title -->
                                                                <div class="skill-title">
                                                                    <img style="width: 17px;padding-bottom: 3px;" :src="getSkillIconSrc(skill.skill_title)" alt="skill" :id="'skillImage_' + skill.id">
                                                                    {{skill.skill_title}}
                                                                </div>
                                                                <!-- bar -->
                                                                <div class="skill-bar"  :data-bar="skill.percentage"><span></span></div>
                                                            </div>
                                                            <!-- #skill -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div v-show="currentTab === 'work'">
                                <!-- work section -->

                                <div class="row" style="padding-top: 10px;">
                                    <div class="col-12 educationSection">
                                        <div class="aboutText">
                                            <div class="row" v-for="(work, index) in worksHistory" :key="index + 'V'">
                                                <div class="col-md-12 aboutSubText">
                                                    <div class="title work">
                                                        <span class="circle"></span>
                                                        {{work.job_title}}
                                                    </div>
                                                    <div class="company">{{work.company}}</div>
                                                    <div class="year">
                                                        <span class="work">
                                                            {{getDate(work.date_from)}}
                                                            <span v-if="work.currently_working"> - Present </span>
                                                            <span v-else > - {{getDate(work.date_to)}}</span>
                                                        </span>
                                                    </div>
                                                    <div class="desc">{{work.job_description}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div v-show="currentTab === 'education'">
                                <!-- education section -->

                                <div class="row" style="padding-top: 10px;">
                                    <div class="col-12 educationSection">
                                        <div class="aboutText">
                                            <div class="row" v-for="(education, index) in educationsHistory" :key="index + 'E'">
                                                <div class="col-md-12 aboutSubText">
                                                    <div class="title work">
                                                        <span class="circle"></span>
                                                        {{education.school_title}}
                                                    </div>
                                                    <div class="year">
                                                        <span class="work">
                                                            {{getDate(education.date_from)}}
                                                            <span v-if="education.currently_learning"> - Present </span>
                                                            <span v-else > - {{getDate(education.date_to)}}</span>
                                                        </span>
                                                    </div>
                                                    <div class="desc">{{education.description}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

                    <transition name="slide-fade-left">
                        <!--references content-->
                        <div v-show="showReferences">
                            <div class="row" style="border-bottom: 1px solid whitesmoke; padding-bottom: 25px;">
                                <div class="col-lg-11 col-11 text-left" style="padding: 25px 0 0 20px;">
                                     <span>
                                         <img src="/resumeApp/public/images/comment-512.png"
                                              alt="" style="padding-right: 14px; width: 34px;">
                                        <span class="audioText" style="color: #4E75E8;">  References & Testimonials</span>
                                    </span>
                                </div>
                                <div class="col-lg-1 col-1 text-center NoDecor" style="padding: 24px 0 0 0;">
                                    <a href="javascript:void(0)" @click="hideReferencesSection" class="audioText audioDismiss" style="color: #4E75E8; font-size: large;" > x </a>
                                </div>
                            </div>
                            <div style="padding-bottom: 35px;">

                                <div class="row" v-for="(reference, index) in references" :key="index + 'R'">
                                    <div class="col-md-12 aboutSubText">
                                        <div class="title work">
                                            <span class="circle"></span>
                                            {{reference.title}}
                                        </div>
                                        <div class="year">
                                            <span class="work">
                                                {{reference.company}}
                                            </span>
                                                            </div>
                                                            <div class="year">
                                            <span class="work">
                                                {{reference.email}}
                                            </span>
                                                            </div>
                                                            <div class="year">
                                            <span class="work">
                                                {{reference.phone}}
                                            </span>
                                        </div>
                                        <div class="desc">{{reference.details}}</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </transition>

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
                worksHistory: this.freelancer.works_history,
                educationsHistory: this.freelancer.educations_history,
                references: this.freelancer.references,
                currentTab: 'skills',
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
                portfolio : !this.hire,
                showReferences : false,
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
            setTab(tabName){
                this.currentTab = tabName ;
                if(tabName === 'portfolio'){
                    this.$nextTick(() => {
                        this.$refs.slick.reSlick();
                    });
                }
            },
            getDate(date){
                let workDate = new Date(date);
                let dd = workDate.getDate();
                let mm = workDate.getMonth() + 1; //January is 0!

                let yyyy = workDate.getFullYear();
                if (dd < 10) {
                    dd = '0' + dd;
                }
                if (mm < 10) {
                    mm = '0' + mm;
                }

                return dd + '/' + mm + '/' + yyyy;
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
            showHireSection(){
                setTimeout( () => {
                    this.hire = true ;
                },800);
                this.portfolio = false ;
                this.showReferences = false ;
            },

            showReferencesSection(){
                setTimeout( () => {
                    this.showReferences = true ;
                },800);
                this.portfolio = false ;
                this.hire = false ;

            },

            hideReferencesSection(){
                this.hire = false ;
                this.showReferences = false ;
                setTimeout( () => {
                    this.portfolio = true ;
                },800);
            },
            hideHireSection(){
                this.hire = false ;
                this.showReferences = false ;
                setTimeout( () => {
                    this.portfolio = true ;
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
                $('#skillImage_' + skill.id).css('filter', 'grayscale('+ percent + '%)');
            },
            skillsBar(){
                $(".skills").addClass("active");
                $(".skills .skill .skill-bar span").each(function() {
                    $(this).animate({
                        "width": $(this).parent().attr("data-bar") + "%"
                    }, 1000);
                });
                setTimeout(function() {
                    $(".skills .skill .skill-bar span b").animate({"opacity":"1"},1000);
                }, 2000);
                console.log('ran');
            },
        },
        mounted() {
            this.skillsBar();
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
        height: 730px ;
        @media only screen and (max-width: 1200px) {
            width: 910px;
        }
        @media only screen and (max-width: 786px) {
            width: 710px;
            height: 815px;
        }
        @media only screen and (max-width: 500px) {
            width: 315px;
            height: 785px ;
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

    .importBtn{
        a:hover{
            color: white;
        }
        display: flex;
        justify-content: center;
        align-items: center;
        padding:0;
    }


    .tab-pane{
        height: 541px;
        overflow: auto;
        @media only screen and (max-width: 500px) {
            width: 315px;
            height: 420px;
        }
    }

    // skills bar css :

    .skills,
    .skills .skill,
    .skills .skill .skill-title,
    .skills .skill .skill-bar {
        width: 100%;
        float: left;
    }

    .skills {
        padding: 0px 15px 10px 15px;
    }

    .skills .skill {
        margin-bottom: 30px;
    }

    .skills .skill .skill-title {
        color: #808080;
        margin-bottom: 15px;
        font-weight: 400;
        font-size: 14px;
    }

    .skills .skill .skill-bar {
        width: 0;
        height: 6px;
        background: #f0f0f0;
        transition: 1s cubic-bezier(1, 0, .5, 1);
        -webkit-transition: 1s cubic-bezier(1, 0, .5, 1);
        -ms-transition: 1s cubic-bezier(1, 0, .5, 1);
    }

    .skills.active .skill .skill-bar {
        width: 100%;
    }

    .skills .skill .skill-bar span {
        float: left;
        width: 0%;
        background: #1D91F2;
        height: 6px;
        position: relative;
        transition: 1s cubic-bezier(1, 0, .5, 1);
        -webkit-transition: 1s cubic-bezier(1, 0, .5, 1);
        -ms-transition: 1s cubic-bezier(1, 0, .5, 1);
    }

    .skills .skill .skill-bar span b {
        float: left;
        width: 100%;
        position: relative;
        text-align: right;
        opacity: 0;
        font-size: 14px;
        color: #1D91F2;
        font-weight: 400;
        top: -13px;
    }

    .container{
        width: 100%;
        max-width: 600px;
        padding:0 15px;
        margin:0 auto;
    }

    .educationSection{
        @media only screen and (max-width: 500px) {
            padding-left: 0;
            padding-right: 5px;
        }
    }

    .aboutText{
        @media only screen and (max-width: 500px) {
            padding-left: 0;
        }
    }


</style>
