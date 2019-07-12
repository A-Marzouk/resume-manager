<template>

  <div class="agentsContainer__card">

    <div class="freelancerCard smallCard">
        <div class="col-lg-12 col-md-12 col-12 resumeCardRight">
            <div class="nameRow cardContainer">
                <img src="resumeApp/public/images/home/forum.svg" alt="" class="contact">
                <div class="imageCol">
                    <div class="imageContainer">
                        <img :src="freelancer.user_data.photo" alt="freelancer" class="freelancerImg">
                    </div>
                </div>
                <div class="freelancerCardRight">
                    <div class="nameArea">
                        <div class="nameCard">
                            {{freelancer.user_data.name}}
                        </div>
                        <div class="jobTitle" id="animatedText">
                            {{freelancer.user_data.jobTitle}}
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

    <div v-show="!showHire" class="projectsSection">
      <div  v-for="(project,index) in freelancer.projects" :key="index" class="d-flex justify-content-center">
          <img :src="project.mainImage" alt="" style="width:100%; max-width: 250px; height: 100%; max-height: 250px; padding: 5px;" >
      </div>
    </div>

    <div v-show="showHire" class="agentsContainer__hireContainer">
      <hire-agent :cancel="() => this.showHire = false" :freelancer="freelancer"></hire-agent>
    </div>
  </div>

</template>
<script>
import hireAgent from './hireAgent'
// Receives the users from laravel using props
export default {
    props: [
        'freelancer'
    ],
    components: {
        'hire-agent': hireAgent
    },

    data(){
        return {
            showHire: false,
        }
    }
}
</script>

<style lang="scss" scoped>
    .projectsSection{
        width: calc(100% - 342px);
        height:175px;
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
</style>

