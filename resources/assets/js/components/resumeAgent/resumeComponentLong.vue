<template>
    <div class="d-flex flex-wrap justify-content-center">
        <div class="freelancerCard">

            <div class="row">
                <!-- <form class="downloadForm" action="/freelancer/resume/download" method="POST">
                    <input type="hidden" id="freelancer" name="freelancer" :value="JSON.stringify({ freelancer })">
                    <input type="hidden" id="user_data" name="user_data" :value="JSON.stringify({ user_data })">
                    <input type="hidden" id="works_history" name="works_history" :value="JSON.stringify({ works_history })">
                    <input type="hidden" id="educations_history" name="educations_history" :value="JSON.stringify({ educations_history })">
                    <input type="hidden" id="skills" name="skills" :value="JSON.stringify({ skills })">
                    <input v-bind="csrf" type="hidden" id="_token" name="_token" :value="csrf">

                    <button type="submit" class="downloadBtn">
                        <img src="/images/icons/download_icon-white.svg" alt="download icon">
                    </button>
                </form> -->

                <a :href="`/freelancer/resume/${freelancer.username}/download`" class="downloadBtn">
                    <img src="/images/icons/download_icon-white.svg" alt="download icon">
                </a>

                <div class="col-lg-12 col-md-12 col-12 resumeCardRight">
                    <div class="showOnlyOnmd">
                        <!-- main card info -->
                        <div class="row nameRow">
                            <div class="col-lg-2 col-6 imageCol">
                                <div class="imageContainer" style="padding: 10px;">
                                    <img :src="getImageSrc(user_data.photo)" alt="freelancer" class="freelancerImg"
                                         width="120" height="120">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6 freelancerCardLeft">
                                <div class="nameArea">
                                    <div class="nameCard">
                                        {{freelancer.firstName}}
                                    </div>
                                    <div class="jobTitle" style="color: white; font-size: 14px; padding-top: 7px;" :id="'animatedText'+freelancer.id">
                                        {{user_data.jobTitle}}
                                    </div>

                                    <form action="/chat-room/start_conversation" method="post">
                                        <input type="hidden" name="freelancer_id" :value="freelancer.id">
                                        <input type="submit"  value="TAP TO CHAT" class="tap-to-chat cursorPointerOnHover" style="background: none; border:none; outline: none;">
                                    </form>


                                    <div :id="'welcomeText'+freelancer.id" class="d-none">
                                        Hi, I am {{freelancer.firstName}}, I am a {{user_data.jobTitle}}, How can I help
                                        you ?
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-7 col-md-8 freelancerCardRight d-flex align-items-center">

                                <div class="row hireRow w-100">
                                    <div  class="col-md-4 text-center" style="font-size: 15px; color: white;" >
                                    <span style="font-weight: bold;">
                                        {{parseFloat(user_data.salary).toFixed(2)}}
                                    </span>
                                        <div class="cardLabel" style="font-size: 13px; font-weight: normal;">Hourly rate</div>
                                    </div>

                                    <div class="col-md-4 text-center"  style="font-size: 15px; color: white;">
                                        <span style="font-weight: bold;">{{parseInt(user_data.available_hours_per_week)}} hours</span>
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
                                    <img :src="getImageSrc(user_data.photo)" alt="freelancer" class="freelancerImg"
                                         width="120" height="120">
                                </div>
                            </div>
                            <div class="col-6 resumeCardRight">
                                <div class="nameArea">
                                    <div class="nameCard">
                                        {{freelancer.firstName}}
                                    </div>
                                    <div class="jobTitle" style="font-size: 17px; padding-left: 0; color: #c1d1ff" :id="'animatedText' + freelancer.id">
                                        {{user_data.jobTitle}}
                                    </div>
                                    <div  class="text-left" style="font-size: 15px; color: white; padding-top: 5px;" >
                                        <div class="cardLabel" style="font-weight: 300; font-size:14px ;">Hourly rate :
                                            <span style="font-weight: bold;">
                                            $ {{user_data.salary}}
                                        </span>
                                        </div>
                                    </div>
                                    <div class="text-left"  style="font-size: 15px; color: white; padding-top: 5px;">
                                        <div class="cardLabel" style="font-weight: 300; font-size:14px ;">Availability :  <span style="font-weight: bold;">{{user_data.available_hours_per_week.replace(/[^0-9]/g,'')}}h/week</span></div>
                                    </div>
                                    <div :id="'welcomeText'+freelancer.id" class="d-none">
                                        Hi, I am {{freelancer.firstName}}, I am a {{user_data.jobTitle}}, How can I help
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

                    <div id="nav-taps-resume">
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
                                                    <img style="width: 17px;padding-bottom: 3px;" :src="getSkillIconSrc(skill.name)" alt="skill" :id="'skillImage_' + skill.id">
                                                    {{skill.name}}
                                                </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane " :id="'databases' + freelancer.id">
                                <div class="row" style="padding-top: 17px;padding-bottom: 16px;background: #fdfdfd;">
                                    <div class="col-md-12  text-center">
                                        <span class="skillsCard">
                                                <span @mouseover="highlightSkill(skill,0)" @mouseleave="highlightSkill(skill,100)" v-for="(skill,index) in skills" :key="index + 'M'" v-show="skill.type === 'frameworks'" class="highlightSkill">
                                                    <img style="width: 17px;padding-bottom: 3px;" :src="getSkillIconSrc(skill.name)" alt="skill" :id="'skillImage_' + skill.id">
                                                    {{skill.name}}
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
                                                    <img style="width: 17px;padding-bottom: 3px;" :src="getSkillIconSrc(skill.name)" alt="skill" :id="'skillImage_' + skill.id">
                                                    {{skill.name}}
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
                                                    <img style="width: 17px;padding-bottom: 3px;" :src="getSkillIconSrc(skill.name)" alt="skill" :id="'skillImage_' + skill.id">
                                                    {{skill.name}}
                                                </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <transition name="slide-fade">
                        <div v-show="portfolio">
                            <!-- nav row section -->

                            <div class="row navRow">
                                <div class="col-md-2 offset-md-3 col-4 text-center" style="border-right:1px solid #EBEDEF;" @click="setTab('portfolio')">
                                    <div class="navTab NoDecor" :class="{active: currentTab === 'portfolio' }">
                                        <a href="javascript:void(0)">
                                            Portfolio
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

                            <div v-show="currentTab === 'portfolio'">
                                <slick class="projectsSection" :id="'portfolio_section_' + freelancer.id" ref="slick" :options="slickOptions">
                                    <div  v-for="(project,index) in freelancer.projects" :key="index + 'A'" >
                                        <!-- class="d-flex justify-content-center" style="height: 250px !important; padding: 0 2px 0 2px; overflow: hidden;" -->

                                        <div class="workCard" style="margin:10px; margin-bottom: 0px;">
                                            <div class="workImg">
                                                <a href="javascript:void(0)"
                                                   style="outline: none;"
                                                   data-toggle="modal" :data-target="'#project_modal_'+project.id" @click="loadHDImage(project.id)">

                                                    <vue-load-image class="d-flex justify-content-center align-items-center">
                                                        <img :src="getImageSrc(project.mainImage)" alt="" width="260" slot="image">
                                                        <img  alt="" slot="preloader" src="/public/images/spinner-load.gif" style="width: 100px; height: 100px;" />
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
                                                        <img src="/public/images/newResume/link.png"
                                                             alt="view work">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <!--<div>-->
                                        <!--<a @click="loadHDImage(project.id)" href="javascript:void(0)"   data-toggle="modal" :data-target="'#project_modal_'+project.id" style="outline:0; " >-->
                                        <!--<vue-load-image>-->
                                        <!--<img :src="getResizedImage(project.mainImage)" alt="" width="100%" slot="image" height="auto" style="min-height:250px; border-radius:10px;">-->
                                        <!--<img  alt="" slot="preloader" src="/public/images/spinner-load.gif"/>-->
                                        <!--</vue-load-image>-->
                                        <!--</a>-->
                                        <!--</div>-->
                                    </div>
                                </slick>

                                <div class="row carouselControls" style="width: 100%;">
                                    <div class=" col-12 text-center NoDecor">
                                        <a href="javascript:void(0)" class="cardLabel_interviews noScroll" @click="slidePrev"
                                           style="color:#697786;">
                                            <img src="/resources/assets/images/left_arrow.png"
                                                 alt="prev" width="15px">
                                        </a>

                                        <span class="jobTitle" style="padding: 0 5px 0 5px"> <span>{{slideNumber}}</span> / <span> {{numberOfSlides}} </span></span>

                                        <a href="javascript:void(0)" role="button" data-slide="next" class="cardLabel_interviews noScroll" @click="slideNext"
                                           style="color:#697786;">
                                            <img src="/resources/assets/images/right_arrow.png"
                                                 alt="next" width="15px">
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div v-show="currentTab === 'work'">
                                <!-- work section -->

                                <div class="row" style="padding-top: 35px;">
                                    <div class="col-12 educationSection">
                                        <div class="aboutText">
                                            <div class="row" v-for="(work, index) in works_history" :key="index + 'V'">
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

                                <div class="row" style="padding-top: 35px;">
                                    <div class="col-12 educationSection">
                                        <div class="aboutText">
                                            <div class="row" v-for="(education, index) in educations_history" :key="index + 'E'">
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
                                                <img src="/public/images/newResume/minus.png" style="width: 18px; padding-right: 8px;" alt="minus" @click="subtractHours">
                                            </a>
                                            <span>{{hours}}</span> hours
                                            <a href="javascript:void(0)">
                                                <img src="/public/images/newResume/plus.png" style="width: 18px; padding-left: 8px;" alt="plus" @click="addHours" >
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
                                                <img src="/public/images/newResume/minus.png" style="width: 18px; padding-right: 8px;" alt="minus" @click="subtractWeeks">
                                            </a>
                                            <span>{{weeks}}</span> weeks
                                            <a href="javascript:void(0)">
                                                <img src="/public/images/newResume/plus.png" style="width: 18px; padding-left: 8px;" alt="plus" @click="addWeeks">
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
                                                {{user_data.salary_month}} $
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
                                    <img :src="getImageSrc(project.mainImage)" :id="'projectModalPhoto' + project.id" alt="" width="100%" slot="image" height="auto">
                                    <img slot="preloader" src="/public/images/spinner-load.gif"/>
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
    import axios from 'axios'

    export default {
        props:['freelancer','hire','search', 'user_data', 'skills', 'educations_history', 'works_history'],
        components:{
            'vue-load-image': VueLoadImage,
            Slick
        },
        data(){
            return {
                slideNumber : 1 ,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                numberOfSlides : this.calculateNumberOfSlides(),
                // skills: [
                //     {
                //         type: 'programming',
                //         id: 1,
                //         name: 'javascript'
                //     }
                // ],
                // works_history: [
                //     {
                //         job_title: 'Fullstack developer',
                //         company: '123workforce',
                //         date_from: (new Date(2016, 0, 20)).getTime() / 1000,
                //         currently_working: true,
                //         job_description: `Officia adipisicing incididunt consectetur aliquip et pariatur nisi laboris. Dolor non esse fugiat excepteur minim occaecat eu. Do ex ut ea et officia. Ut exercitation laborum officia cupidatat nulla eu. Ex laborum minim nostrud nostrud nostrud qui irure ea voluptate cillum dolore mollit ea magna.

                //         Dolor ad irure cupidatat ea dolore eiusmod ex ad ex duis ex consequat ullamco. Et do amet nulla culpa elit ad. Exercitation commodo sunt anim do reprehenderit commodo nostrud qui reprehenderit pariatur ea voluptate laboris. Magna eiusmod nulla minim eiusmod do. Ullamco pariatur commodo quis enim duis cupidatat ut nisi. Do irure incididunt non eu Lorem sint ullamco proident ea eu. Ipsum nisi tempor officia velit reprehenderit ut tempor.

                //         Tempor in pariatur veniam dolore. Qui ex ut magna quis adipisicing fugiat amet. Labore veniam et eiusmod cillum exercitation laborum. Dolore laborum tempor nulla incididunt et sint amet ut irure incididunt labore amet et elit. Magna voluptate velit ex irure esse sunt adipisicing est laborum pariatur consectetur exercitation nulla. Nulla incididunt id velit in qui commodo commodo exercitation magna ipsum. Tempor velit culpa dolore incididunt ex id labore quis ipsum eiusmod nisi esse amet.

                //         Laboris veniam proident fugiat dolore qui. Dolore nisi id dolor id et qui eu culpa pariatur sint. Velit sit ea nisi esse excepteur nulla ea culpa sint aute duis. Occaecat fugiat do dolor Lorem occaecat culpa ex minim ut Lorem irure labore est ad. Sit proident cillum amet ut eiusmod dolore. Deserunt laboris do qui mollit ut excepteur irure esse quis est.`
                //     }
                // ],
                // educations_history: [
                //     {
                //         school_title: '"Simón Bolívar" University',
                //         date_from: (new Date(2014, 8)).getTime() / 1000,
                //         currently_learning: true,
                //         description: `
                //             Ipsum dolore adipisicing aliquip duis. Aute sint incididunt ullamco cillum sunt excepteur dolor magna aliquip ullamco mollit enim occaecat. Id labore amet dolor Lorem adipisicing aute fugiat ipsum sint. Consequat cillum excepteur ipsum elit. Nostrud irure quis pariatur ex sit id dolor quis. Sunt fugiat anim amet incididunt officia cillum quis. Incididunt aliqua mollit sint sit esse ad incididunt Lorem.

                //             Est deserunt elit esse laborum. Consequat do reprehenderit amet nulla incididunt velit irure nostrud consequat. Irure consequat incididunt aliqua esse incididunt. Tempor irure proident Lorem nisi tempor elit fugiat nostrud sint cupidatat irure reprehenderit. Ex in nisi elit velit. Dolore ullamco esse officia exercitation ut occaecat sit ipsum. Id nisi occaecat est consectetur eiusmod ex reprehenderit occaecat.

                //             Tempor pariatur consequat anim aliquip elit culpa esse in dolor amet qui est labore. Amet enim laborum enim adipisicing voluptate sint occaecat eu excepteur. Incididunt tempor sunt ipsum consequat Lorem fugiat cupidatat Lorem ipsum ex ut exercitation cillum.
                //         `
                //     }
                // ],
                currentTab: 'portfolio',
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
                hours: 40,
                // user_data: {
                //     monthly_salary: 1700,
                //     available_hours_per_week: '40',
                //     photo: '/images/home/profile1.png',
                //     job_title: 'Software developer',
                //     salary: 10
                // },
                portfolio: true    
            }
        },
        methods:{
            getResizedImage(src){
                let resizedImage = this.getImageSrc(src).replace('/uploads','/uploads/resized-images');
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
            getSkillIconSrc(name){
                let arrayOfSkillImages = {
                    'ui design' : '/resources/assets/images/skills_icons/user_interface.png',
                    'ux design' : '/resources/assets/images/skills_icons/user_experience.png',
                    'logo design' : '/resources/assets/images/skills_icons/logo_design.png',
                    'animation' : '/resources/assets/images/skills_icons/animation.jpg',
                    'motion graphics' : '/resources/assets/images/skills_icons/motion_graphics.png',
                    'illustration' : '/resources/assets/images/skills_icons/illustration.png',
                    'advertising' : '/resources/assets/images/skills_icons/advertising.png',
                    'branding': '/resources/assets/images/skills_icons/branding.png',
                    'brochure Design': '/resources/assets/images/skills_icons/brochure_design.png',
                    'website design': '/resources/assets/images/skills_icons/web_design.png',
                    'game designer': '/resources/assets/images/skills_icons/game_designer.png',
                    'character design': '/resources/assets/images/skills_icons/character_design.png',
                    'digital painting': '/resources/assets/images/skills_icons/digital_painting.png',
                    'creative director': '/resources/assets/images/skills_icons/creative_director.png',
                    'html / css': '/resources/assets/images/skills_icons/HTML.png',
                    // 2-

                    'adobe after effects':'/resources/assets/images/skills_icons/AE.png',
                    'sketch':'/resources/assets/images/skills_icons/Sketch.png',
                    'adobe illustrator':'/resources/assets/images/skills_icons/Illustrator.png',
                    'adobe xd':'/resources/assets/images/skills_icons/AdobeXD.png',
                    'photoshop':'/resources/assets/images/skills_icons/Photoshop.png',
                    'autocad':'/resources/assets/images/skills_icons/autocad.png',
                    'solidworks':'/resources/assets/images/skills_icons/solid_works.png',
                    'adobe flash':'/resources/assets/images/skills_icons/adobe_flash.png',
                    'digital drawing Tablet':'/resources/assets/images/skills_icons/digital_drawing_tablet.png',
                    'adobe indesign':'/resources/assets/images/skills_icons/indesign.png',
                    'coreldraw':'/resources/assets/images/skills_icons/corel_draw.png',
                    '3d max':'/resources/assets/images/skills_icons/3d_max.png',

                    // developer :
                    // 1-
                    'javascript' :'/resources/assets/images/skills_icons/javascript.png',
                    'sql':'/resources/assets/images/skills_icons/mysql.png',
                    'java':'resumeApp/resources/assets/images/skills_icons/java.png',
                    'c#':'/resources/assets/images/skills_icons/c#.png',
                    'python':'/resources/assets/images/skills_icons/python.png',
                    'php':'/resources/assets/images/skills_icons/php.png',
                    'c++':'/resources/assets/images/skills_icons/c_language.png',
                    'c':'/resources/assets/images/skills_icons/c_language.png',
                    'typescript':'/resources/assets/images/skills_icons/typescript.png',
                    'ruby':'/resources/assets/images/skills_icons/ruby.png',
                    'objective-C':'/resources/assets/images/skills_icons/objective_c.png',
                    'swift':'/resources/assets/images/skills_icons/swift.png',
                    'vb.net':'/resources/assets/images/skills_icons/vb_net.png',
                    'go':'/resources/assets/images/skills_icons/go.png',
                    'perl':'/resources/assets/images/skills_icons/perl.png',
                    'scala':'/resources/assets/images/skills_icons/scala.png',
                    'groovy':'/resources/assets/images/skills_icons/groovy.png',
                    'assembly':'/resources/assets/images/skills_icons/assembly.png',
                    'coffeescript':'/resources/assets/images/skills_icons/coffeeScript.png',
                    'vba':'/resources/assets/images/skills_icons/vba.png',
                    'r':'/resources/assets/images/skills_icons/r_lang.png',
                    'matlab':'/resources/assets/images/skills_icons/matlab.png',
                    'visual basic 6':'/resources/assets/images/skills_icons/matlab.png',
                    'lua':'/resources/assets/images/skills_icons/lua.png',
                    'haskell':'/resources/assets/images/skills_icons/haskell.png',
                    'html':'/resources/assets/images/skills_icons/HTML.png',
                    'css':'/resources/assets/images/skills_icons/CSS.png',

                    //2-
                    'angularjs' : '/resources/assets/images/skills_icons/Angularjs.png',
                    'angular.js' : '/resources/assets/images/skills_icons/Angularjs.png',
                    'node.js' : '/resources/assets/images/skills_icons/node_js.png',
                    'nodejs' : '/resources/assets/images/skills_icons/node_js.png',
                    '.net Core' : '/resources/assets/images/skills_icons/netcore.png',
                    'react' : '/resources/assets/images/skills_icons/react.png',
                    'cordova' : '/resources/assets/images/skills_icons/cordava.png',
                    'firebase' : '',
                    'xamarin' : '',
                    'hadoop' : '/resources/assets/images/skills_icons/hadoop.png',
                    'spark' : '/resources/assets/images/skills_icons/spark.png',
                    'mysql' : '/resources/assets/images/skills_icons/mysql.png',
                    'sql server' : '/resources/assets/images/skills_icons/sql server.png',
                    'postgresql' : '/resources/assets/images/skills_icons/postgreSQL.png',
                    'sqlite' : '/resources/assets/images/skills_icons/SQLite.png',
                    'mongodb' : '/resources/assets/images/skills_icons/mongoDB.png',
                    'oracle' : '/resources/assets/images/skills_icons/Oracle.png',
                    'redis' : '/resources/assets/images/skills_icons/redis.png',
                    'cassandra' : '/resources/assets/images/skills_icons/cassandra.png'
            };
                if(arrayOfSkillImages.hasOwnProperty(name.toLowerCase())){
                    return arrayOfSkillImages[name.toLowerCase()] ;
                }
                return '/resources/assets/images/skills_icons/skill.png' ;
            },
            getImageSrc(src){
                if(!src){
                    return '/public/images/placeholder.png';
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
                $('#skillImage_' + skill.id).css('filter', 'grayscale('+ percent + '%)');
            },
            downloadResume() {
                axios
                    .post('/freelancer/resume/download', {
                        user_data: this.user_data,
                        freelancer: this.freelancer,
                        educationsHistory: this.educations_history,
                        worksHistory: this.works_history,
                        skills: this.skills
                    })
                    .then(response => console.log(response))
                    .catch(error => console.log(error))
            }
        },
        mounted() {
            console.log(this.freelancer)
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
        position: relative;

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

        .downloadBtn {
            position: absolute;
            right: 20px;            
            top: 10px;
            z-index: 10;

            // button {
            //     border: none;
            //     background: none;
            // }
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
