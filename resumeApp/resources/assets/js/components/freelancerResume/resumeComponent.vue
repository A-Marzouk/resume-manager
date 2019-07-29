<template>
    <div>
        <div class="freelancerCard">

            <div class="row">

                <div class="col-lg-12 col-md-12 col-12 resumeCardRight">
                    <div>
                        <!-- main card info -->
                        <div class="row nameRow">
                            <div class="col-lg-2 col-6 imageCol">
                                <div class="imageContainer" style="padding: 10px;">
                                    <img src="/resumeApp/public/images/no-foto.png" alt="freelancer" class="freelancerImg"
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


                            <div class="col-lg-7 col-md-8 freelancerCardRight">

                                <div class="row hireRow">
                                    <div  class="col-md-4 text-center" style="font-size: 15px; color: white;" >
                                        <span style="font-weight: bold;">
                                            {{freelancer.user_data.salary}}
                                        </span>
                                        <div class="cardLabel" style="font-size: 13px; font-weight: normal;">Hourly rate</div>
                                    </div>

                                    <div class="col-md-4 text-center"  style="font-size: 15px; color: white;">
                                        <span style="font-weight: bold;">{{freelancer.user_data.availableHours}} hours</span>
                                        <div class="cardLabel" style="font-size: 13px; font-weight: normal;">Weekly Availability</div>
                                    </div>

                                    <div class="col-md-4" style="padding: 0;">

                                        <div class="row text-center cardRow NoDecor">
                                            <a class="hireCardBtn btn-block showHireSection" href="javascript:void(0)">
                                                Hire me
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- end of main card info -->
                    </div>


                    <!-- skills -->
                        <!-- later added -->
                    <!-- end of skills -->


                    <div>

                        <!-- nav row -->
                            <div class="row navRow">
                            <div class="col-md-2 offset-md-3 col-4 text-center" style="border-right:1px solid #EBEDEF;">
                                <div class="navTab showPortfolio active NoDecor">
                                    <a href="javascript:void(0)">
                                        Portfolio
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-2 col-4 text-center" style="border-right:1px solid #EBEDEF;">
                                <div class="navTab showWork NoDecor">
                                    <a href="javascript:void(0)">
                                        Work
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-2 col-4 text-center">
                                <div class="navTab showEducation NoDecor">
                                    <a href="javascript:void(0)">
                                        Education
                                    </a>
                                </div>
                            </div>

                        </div>
                        <!-- end of nav row-->

                        <!-- portfolio section -->
                        <slick class="projectsSection" ref="slick" :options="slickOptions">
                            <div  v-for="(project,index) in freelancer.projects" :key="index + 'A'" class="d-flex justify-content-center" style="height: 250px !important; padding: 0 2px 0 2px; overflow: hidden;">
                                <div>
                                    <a @click="loadHDImage(project.id)" href="javascript:void(0)"   data-toggle="modal" :data-target="'#project_modal_'+project.id" style="outline:0; " >
                                        <vue-load-image>
                                            <img :src="getResizedImage(project.mainImage)" alt="" width="100%" slot="image" height="auto" style="min-height:250px; border-radius:10px;">
                                            <img  alt="" slot="preloader" src="/resumeApp/public/images/spinner-load.gif"/>
                                        </vue-load-image>
                                    </a>
                                </div>
                            </div>
                        </slick>
                        <!-- end of portfolio section -->
                    </div>

                    <!-- hire section -->
                        <div class="d-none">
                            <div style="border-top: 1px solid #EBEDEF; ">
                            <div class="row">
                                <div class="offset-md-4 col-md-4 col-12">
                                    <div class="hireText">
                                        Select the number of Hours you need per week:
                                    </div>
                                    <div class="hoursBtn NoDecor">
                                        <a href="javascript:void(0)">
                                            <img src="/resumeApp/public/images/newResume/minus.png" style="width: 18px; padding-right: 8px;" alt="minus">
                                        </a>
                                        <span>{{freelancer.user_data.availableHours}}</span> hours
                                        <a href="javascript:void(0)">
                                            <img src="/resumeApp/public/images/newResume/plus.png" style="width: 18px; padding-left: 8px;" alt="plus">
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
                                            <img src="/resumeApp/public/images/newResume/minus.png" style="width: 18px; padding-right: 8px;" alt="minus">
                                        </a>
                                        <span>4</span> weeks
                                        <a href="javascript:void(0)">
                                            <img src="/resumeApp/public/images/newResume/plus.png" style="width: 18px; padding-left: 8px;" alt="plus">
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
                                    <a href="javascript:void(0)" class="justify-content-center d-flex btn-block cancelBtn">Cancel Booking</a>
                                </div>
                                <div class="col-md-4 col-12 NoDecor whiteOnHover" style="padding-top: 17px; padding-bottom: 30px;">
                                    <a class="btn d-flex btn-block summaryBtn" :href="'/stripe/hire?freelancerID=' + freelancer.id + '&hours=' + freelancer.user_data.availableHours + '&weeks=4' ">Booking Summary</a>
                                </div>
                            </div>
                        </div>
                        </div>
                    <!-- end of hire section -->
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
        props:['freelancer'],
        components:{
            'vue-load-image': VueLoadImage,
            Slick
        },
        data(){
            return {
                slickOptions: {
                    lazyLoad: 'ondemand',
                    infinite: false,
                    dots: true,
                    arrows:true,
                    slidesToShow: 2,
                    slidesToScroll: 1,
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
                                slidesToShow: 2,
                                slidesToScroll: 2,
                            }
                        }
                    ]
                },
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
            getImageSrc(src){
                if(!src){
                    return '/resumeApp/public/images/placeholder.png';
                }

                if(src.charAt(0) !== '/'){
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
        },
        mounted() {

        }
    }
</script>

<style lang="scss" scoped>
    .projectsSection{
        margin-top: 18px;
        padding: 20px;
        margin-bottom: 18px;
    }
    .freelancerCard{
        margin-bottom: 1%;
        padding-bottom: 12px;
    }

    .slick-dots {
        display: flex;
        justify-content: center;
    }

</style>
