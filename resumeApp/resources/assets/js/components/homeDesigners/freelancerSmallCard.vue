<template>

  <div class="agentsContainer__card">

    <div class="freelancerCard smallCard">
        <div class="col-lg-12 col-md-12 col-12 resumeCardRight">
            <div class="nameRow cardContainer">
                <a href="javascript:void(0)" data-toggle="modal" :data-target="'#contact-pop-up-'+ freelancer.id">
                    <img src="resumeApp/public/images/home/forum.svg" alt="" class="contact">
                </a>
                <div class="imageCol">
                    <div class="imageContainer">
                        <img :src="freelancer.user_data.photo" alt="freelancer" class="freelancerImg">
                    </div>
                </div>
                <div class="freelancerCardRight">
                    <div class="nameArea">
                        <div class="nameCard">
                            {{freelancer.firstName}}
                        </div>
                        <div class="jobTitle" id="animatedText">
                            {{ freelancer.user_data.home_page_freelancer ? 'UI Designer' : freelancer.user_data.jobTitle }}
                        </div>
                    </div>
                </div>
                <div class="hireRow showOnlyOnmd">
                    <div class="payment-details">
                        <div style="color: white;" >
                            <img src="resumeApp/public/images/home/monetization.svg" alt=""><span class="payment-highLight" style="font-weight: bold;"> $ {{parseInt(freelancer.user_data.salary)}}
                            </span>hourly rate
                        </div>
                        <div style="color: white;">
                            <img src="resumeApp/public/images/home/watch_later.svg" alt="">
                            <span class="payment-highLight" :id="'maxHours' + freelancer.id" style="font-weight: bold;">{{parseInt(freelancer.user_data.availableHours)}} hours</span> availability
                        </div>
                    </div>
                    <div v-if="freelancer.user_data.availableHours !== 0" class="text-center cardRow NoDecor hideOnSm">
                      <a   @click="showHire = true" class="hireCardBtn btn-block showHireSection showOnSm" href="javascript:void(0)" :id="'showHireSection'+freelancer.id">
                        HIRE ME
                      </a>
                    </div>
                </div>
                <div v-if="freelancer.user_data.availableHours !== 0" class="text-center cardRow NoDecor showOnSm">
                  <a  @click="showHire = true" class="hireCardBtn btn-block showHireSection showOnSm" href="javascript:void(0)" :id="'showHireSection'+freelancer.id">
                      HIRE ME
                  </a>
                </div>
            </div>
        </div>
    </div>


    <slick v-show="!showHire" class="projectsSection" ref="slick" :options="slickOptions">
        <div  v-for="(project,index) in freelancer.projects" :key="index + 'A'" class="d-flex justify-content-center" style="height: 175px !important; padding: 0 5px 0 5px; overflow: hidden;">
            <a @click="loadHDImage(project.id)" href="javascript:void(0)"   data-toggle="modal" :data-target="'#project_modal_'+project.id" style="outline:0; " >
                <vue-load-image>
                    <img :src="getResizedImage(project.mainImage)" alt="" width="100%" slot="image" height="auto" style="min-height:175px;">
                    <img  alt="" slot="preloader" src="/resumeApp/public/images/spinner-load.gif"/>
                </vue-load-image>

            </a>
        </div>
    </slick>

    <div v-show="showHire" class="agentsContainer__hireContainer">
      <hire-agent :cancel="() => this.showHire = false" :freelancer="freelancer"></hire-agent>
    </div>

      <!-- modals -->

      <!--<div  v-for="(project,index) in freelancer.projects" :key="index + project.id" class="modal fade" :id="'project_modal_'+project.id" tabindex="-1" role="dialog" aria-labelledby="certificate" aria-hidden="true">-->
          <!--<div class="modal-dialog modal-lg" role="document" style="margin: 1.75rem auto;">-->
              <!--<div class="modal-content" style="background: none;border:0;">-->
                  <!--<div class="modal-body">-->
                      <!--<img :src="project.mainImage" alt="" style="width: 100%;">-->
                  <!--</div>-->
              <!--</div>-->
          <!--</div>-->
      <!--</div>-->

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


      <div class="changesSavedText d-none" id="messageSent">
            <span class="alert alert-success">
                Message Sent
            </span>
      </div>


      <!-- modals contact pop-up -->

      <div class="modal fade" :id=" 'contact-pop-up-' + freelancer.id" role="dialog">
          <div class="modal-dialog" style="max-width:950px;">
              <!-- Modal content-->
              <div class="modal-content">
                  <div class="modal-body contact_pop_up">
                      <div class="d-flex justify-content-between">
                          <div class="title">
                              Contact the designer
                          </div>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>

                     <div class="d-flex flex-column">
                         <div class="d-flex flex-wrap justify-content-between">
                             <div class="faq-question-input">
                                 <label class="faq-input-label">
                                     Enter your name
                                 </label>
                                 <div class="faq-input d-flex flex-column align-items-start">
                                     <input type="text"  placeholder="Enter your name" v-model="message.name" required>
                                     <small v-show="errors.name.length > 0" class="error">{{errors.name}}</small>
                                 </div>
                             </div>
                             <div class="faq-question-input">
                                 <label class="faq-input-label">
                                     Enter your email
                                 </label>
                                 <div class="faq-input d-flex flex-column align-items-start">
                                     <input type="email" placeholder="Enter your email"  v-model="message.email"  required>
                                     <small v-show="errors.email.length > 0" class="error">{{errors.email}}</small>
                                 </div>
                             </div>
                         </div>

                         <div class="faq-question-input">
                             <label class="faq-input-label">
                                 Enter message
                             </label>
                             <div class="faq-input d-flex flex-column align-items-start">
                                 <textarea type="text"  rows="2"  style="height:auto;padding:22px;"  v-model="message.body"  required>Message...</textarea>
                                 <small v-show="errors.body.length > 0" class="error">{{errors.body}}</small>
                             </div>
                         </div>

                         <div class="d-flex justify-content-end NoDecor">
                             <a href="javascript:void(0)" class="sendMessageBtn" @click="sendMessageToDesigner">
                                 <span v-show="sending === 0">
                                     Send a message
                                 </span>
                                 <span v-show="sending === 1">
                                     Sending...
                                 </span>
                             </a>
                         </div>
                     </div>
                  </div>
              </div>
          </div>

      </div>


  </div>

</template>
<script>
import hireAgent from './hireAgent'
import VueLoadImage from 'vue-load-image'
import Slick from 'vue-slick';

// Receives the users from laravel using props
export default {
    props: [
        'freelancer','search'
    ],
    components: {
        'hire-agent': hireAgent,
        'vue-load-image': VueLoadImage,
        Slick
    },

    data(){
        return {
            showHire: false,
            resizedImagesList: [],
            message:{
              'name':'',
              'email':'',
              'body':'',
              'freelancer_id':this.freelancer.id
            },
            slickOptions: {
                lazyLoad: 'ondemand',
                infinite: false,
                dots: true,
                arrows:false,
                slidesToShow: 3,
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
            sending:0,
            errors:{
                'name':'',
                'email':'',
                'body':''
            }
        }
    },
    methods:{
        getImageSrc(src){
            if(!src){
                return '/resumeApp/public/images/placeholder.png';
            }

            if(src.charAt(0) !== '/'){
                return '/'+src;
            }

            return src;
        },
        sendMessageToDesigner(){
           // waiting status
          if(this.sending === 1){
              return;
          }else {
              this.sending = 1 ;
          }

          if(!this.validateMessage()){
              this.sending = 0 ;
              return;
          }

          axios.post('/message/contact-designer' , this.message)
              .then( (response) => {
                  console.log(response.data);
                  if(response.data === 'success'){
                      // close modal
                      $('.close').click();
                      // clear input
                      this.message = {
                          'name':'',
                          'email':'',
                          'body':'',
                          'freelancer_id':'',
                      };
                      // show that message has been sent notification
                      $('#messageSent').removeClass('d-none');
                      setTimeout(function () {
                          $('#messageSent').addClass('d-none');
                      },2000);
                      // return to not sending status
                      this.sending = 0 ;
                  }
              })
              .catch((error) => {
                  console.log(error);
              });
        },
        validateMessage(){
            let valid = true ;
            if(this.message.name.length < 3 || this.message.name.length > 191){
                this.errors.name = 'Name field should be greater than 3 chars.';
                valid = false;
            }else{
                this.errors.name ='';
            }
            if(this.message.email.length < 3 || this.message.email.length > 191){
                this.errors.email = 'Email field should be greater than 3 chars.';
                valid = false;
            }
            else if(!this.validateEmail(this.message.email)){
                this.errors.email = 'Please enter a valid email address.';
                valid = false;
            }else{
                this.errors.email ='';
            }

            if(this.message.body.length < 3 || this.message.body.length > 191){
                this.errors.body = 'Message field should be greater than 3 chars.';
                valid = false;
            }else {
                this.errors.body ='';
            }
            return valid ;
        },
        validateEmail(email) {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
        },
        getProjectImages(imagesString){
            if(imagesString === null || imagesString === undefined ){
                return [] ;
            }
            return  imagesString.split(','); // returns an array
        },
        getResizedImage(src){
            let resizedImage = this.getImageSrc(src).replace('/resumeApp/uploads','/resumeApp/uploads/resized-images');
            if(this.search == false){
                return resizedImage;
            }
            return  this.getImageSrc(src)
        },
        setResizedImagesList(){
            let projects = this.freelancer.projects ;
            $.each(projects, (i) =>{
                let resizedImage = this.getImageSrc(projects[i].mainImage).replace('/resumeApp/uploads','/resumeApp/uploads/resized-images');
                axios.get(resizedImage)
                    .then( () => {
                        this.resizedImagesList.push(resizedImage);
                    })
                    .catch( () => {
                    });
            });
        },
        loadHDImage(project_id){
            let projects = this.freelancer.projects ;
            $.each(projects, function(i){
                if(projects[i].id === project_id) {
                    $('#projectModalPhoto'+project_id).attr('src',projects[i].mainImage);
                    return false;
                }
            });
        }
    },

    mounted(){
        // this.setResizedImagesList();
    }
}
</script>

<style lang="scss" scoped>
    .projectsSection{
        width: calc(100% - 342px);
        height:175px !important;
        .slick-dots {
            bottom: -5px !important;
        }

        @media (max-width: 768px) {
            width: 100%;
        }
    }

    .cardContainer{
        width: 330px;

        @media (max-width: 768px) {
            width: 100%;
        }
    }
    .freelancerCard {
        &.smallCard {
            margin: 0 !important;
            width: 352px;

            @media (max-width: 992px) {
                width: 318px;
            }

            @media (max-width: 768px) {
                width: 100%;
            }

            .freelancerImg {
                width: 70px;
                height: 70px;
            }

            .nameRow {
                display: flex;
                flex-wrap: wrap;
                position: relative;
                border-radius: 5px;
                padding: 14px;
                height: 100%;
            }

            .contact {
                position: absolute;
                top: 20px;
                right: 14px;
            }

            .jobTitle {
                color: white;
                font-size: 14px;
            }

            .payment-details {
                font-size: 12px;

                & div:first-child {
                    margin-right: 15px;
                }

                @media (max-width: 768px) {
                    display: flex;

                }

                div {
                    display: flex;
                    align-items: center;
                    flex-wrap: wrap;
                    text-align: center;
                }

                img,
                span {
                    margin-right: 5px;
                }

                img {
                    height: 14px;
                }
            }

            .payment-highLight {
                font-size: 14px;
            }

            .resumeCardRight {
                height: 100%;

                .hireCardBtn {
                    width: 87px;

                    @media (max-width: 768px) {
                        width: 100%;
                        justify-content: center;
                        align-items: center;
                    }
                }

                .nameRow {
                    .imageCol {
                        padding-left: 0;
                        margin: 0;
                    }
                }
            }

            .cardRow {
                @media (max-width: 768px) {
                    width: 100%;
                }
            }

            .hireRow {
                width: 100%;
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 14px;
                margin: 0;
                margin-top: 15px;
            }

            .nameCard {
                font-family: Roboto;
                font-style: normal;
                font-weight: bold;
                font-size: 18px;
                padding-top: 0;
                margin-bottom: 5px;
                padding-left: 10px;
            }
        }
    }

    .error{
        color: red;
        font-weight: 500;
        padding-top: 5px;
    }
</style>

