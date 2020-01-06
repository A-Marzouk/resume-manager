<template>
    <div class="theme-container">
        <div class="main-info-bar">
            <div class="left">
                <div class="profile-picture">
                    <img src="/images/resume_themes/theme5/profile.png" alt="">
                </div>
                <div class="main-info">
                    <div class="user-name">
                        Emma Pearson
                    </div>
                    <div class="job-title">
                        UX Designer
                    </div>
                    <div class="bio">
                        I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="prof-info">
                    <div class="d-flex align-items-center">
                        <div class="hours">
                            <div>
                                <img src="/images/resume_themes/theme5/time.svg" alt="">
                            </div>
                            <div class="text">
                                8 hours
                            </div>
                        </div>
                        <div class="horizontal-divider"></div>
                        <div  class="rate">
                            <div>
                                <img src="/images/resume_themes/theme5/payment.svg" alt="">
                            </div>
                            <div class="text">
                                $20/hr
                            </div>
                        </div>
                    </div>
                    <div class="hire-me-btn NoDecor">
                        <a href="javascript:void(0)">
                            <img src="/images/resume_themes/theme5/email.svg" alt="">
                            <span>Hire me</span>
                        </a>
                    </div>
                </div>
                <div class="media">
                    <div class="d-flex">
                        <div class="call-btn">
                            <a href="javascript:void(0)">
                                <img src="/images/resume_themes/theme5/call.svg" alt="">
                                <span>Voice call</span>
                            </a>
                        </div>
                        <div class="video-btn">
                            <a href="javascript:void(0)">
                                <img src="/images/resume_themes/theme5/video.svg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="d-flex flex-column align-items-center">
                        <div class="follow-text">
                            Follow me
                        </div>
                        <div class="d-flex icons">
                            <img src="/images/resume_themes/theme5/dribble.svg" alt="social-icon">
                            <img src="/images/resume_themes/theme5/behance.svg" alt="social-icon">
                            <img src="/images/resume_themes/theme5/instagram.svg" alt="social-icon">
                            <img src="/images/resume_themes/theme5/linkedin.svg" alt="social-icon">
                            <img src="/images/resume_themes/theme5/google_plus.svg" alt="social-icon">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tabs-wrapper">
            <div class="tabs-bar">
                <div class="tab-text" :class="{active : activeTab === 'portfolio'}" @click="setActiveTab('portfolio')">
                    <span v-if="activeTab === 'portfolio'">[ </span>
                    Portfolio
                    <span v-if="activeTab === 'portfolio'"> ]</span>
                </div>
                <div class="tab-text" :class="{active : activeTab === 'workEx'}" @click="setActiveTab('workEx')">
                    <span v-if="activeTab === 'workEx'">[ </span>
                    Work Experience
                    <span v-if="activeTab === 'workEx'"> ]</span>
                </div>
                <div class="tab-text" :class="{active : activeTab === 'edu'}" @click="setActiveTab('edu')">
                    <span v-if="activeTab === 'edu'">[ </span>
                    Education
                    <span v-if="activeTab === 'edu'"> ]</span>
                </div>
                <div class="tab-text" :class="{active : activeTab === 'skills'}" @click="setActiveTab('skills')">
                    <span v-if="activeTab === 'skills'">[ </span>
                    Skills
                    <span v-if="activeTab === 'skills'"> ]</span>
                </div>
                <div class="tab-text mr-0":class="{active : activeTab === 'about'}" @click="setActiveTab('about')">
                    <span v-if="activeTab === 'about'">[ </span>
                    About
                    <span v-if="activeTab === 'about'"> ]</span>
                </div>
            </div>

            <div class="tab-content-wrapper">
                <div class="portfolio" v-show="activeTab === 'portfolio'" :class="{active : activeTab === 'portfolio'}">
                    <div class="images">
                        <img src="/images/resume_themes/theme5/portfolio-1.png" alt="portfolio img">
                        <img src="/images/resume_themes/theme5/portfolio-2.png" alt="portfolio img">
                        <img src="/images/resume_themes/theme5/portfolio-3.png" alt="portfolio img">

                        <img src="/images/resume_themes/theme5/portfolio-4.png" alt="portfolio img">
                        <img src="/images/resume_themes/theme5/portfolio-5.png" alt="portfolio img">
                        <img src="/images/resume_themes/theme5/portfolio-6.png" alt="portfolio img">
                    </div>

                    <div class="loading">
                        <img src="/images/resume_themes/theme5/loading.svg" alt="loading">
                        <div>
                            Loading more items
                        </div>
                    </div>
                </div>
                <div class="work-experience" v-show="activeTab === 'workEx'" :class="{active : activeTab === 'workEx'}">
                    work expeirnce
                </div>
                <div class="education" v-show="activeTab === 'edu'" :class="{active : activeTab === 'edu'}">
                    education
                </div>
                <div class="skills"  v-show="activeTab === 'skills'":class="{active : activeTab === 'skills'}">
                    skills
                </div>
                <div class="about" v-show="activeTab === 'about'" :class="{active : activeTab === 'about'}">
                    avout
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "theme5.vue",

        data(){
          return {
              activeTab : 'skills',
          }
        },

        methods:{
            setActiveTab(tabName){
                this.activeTab = tabName;
            }
        },

        mouted(){

        }
    }
</script>

<style scoped lang="scss">
    .theme-container{
        display:flex;
        justify-content:center;
        flex-direction: column ;
        .main-info-bar{
            display:flex;
            justify-content: space-between;
            background: #FFFFFF;
            border-radius: 25px;
            width:1840px;
            height:285px;
            padding:46px 102px 55px 87px;
            .left{
                display:flex;
                align-items: center;
                .profile-picture{
                    img{
                        width:184px;
                        height:184px;
                        border-radius:50%;
                    }
                }
                .main-info{
                    margin-left:35px;
                    .user-name{
                        font-size:38px;
                        font-weight: bold;
                        opacity: 1;
                        color:#3C3748 !important;
                        line-height: 52px;
                        padding-bottom:6px;
                    }
                    .job-title{
                        font-size:24px;
                        color:#3C3748;
                        line-height: 33px;
                        padding-bottom:19px;
                    }
                    .bio{
                        font-size:19px;
                        color: #6B6B6B;
                        width:531px;
                    }
                }

            }

            .right{
                display:flex;
                .prof-info{
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    margin-right:182px;
                    .hours{
                        padding-right: 42.5px;
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        img{
                            width:40px;
                            height:32px
                        }
                        .text{
                            line-height: 36px;
                            font-size: 26px;
                            color: #635E70;
                            margin-top:16px;
                        }
                    }
                    .horizontal-divider{
                        height:45px;
                        width:2px;
                        background:#CBCBCB;
                    }
                    .rate{
                        padding-left: 42.5px;
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        img{
                            width:40px;
                            height:32px
                        }
                        .text{
                            line-height: 36px;
                            font-size: 26px;
                            color: #635E70;
                            margin-top:16px;
                        }
                    }
                    .hire-me-btn{
                        margin-top:36px;
                        a{
                            height:60px;
                            width:202px;
                            border-radius:6px;
                            background:#FC5185;

                            display: flex;
                            justify-content: center;
                            align-items: center;

                            color:white;
                            font-size:18px;

                            img{
                                width:22.5px;
                                height:18px;
                                margin-right:7.5px;
                            }

                        }
                    }
                }
                .media{
                    display:flex;
                    flex-direction: column;
                    .follow-text{
                        font-size: 20px;
                        line-height:27px;
                        color: #6F6B7A;
                        margin-top:43px;
                        margin-bottom:12.3px;
                    }
                    .icons{
                        img{
                            width: 40px;
                            height: 40px;
                            margin-right: 15px;
                        }
                        img:last-child{
                            margin-right: 0;
                        }
                    }

                    .call-btn{
                        a{
                            height:60px;
                            width:161px;
                            border-radius:6px;
                            background:#5F45FF;

                            display: flex;
                            justify-content: center;
                            align-items: center;

                            color:white;
                            font-size:18px;

                            img{
                                width:18px;
                                height:18px;
                                margin-right:7.5px;
                            }

                        }
                    }
                    .video-btn{
                        margin-left:16px;
                        a{
                            height:60px;
                            width:90px;
                            border-radius:6px;
                            background:#E7E5F6;

                            display: flex;
                            justify-content: center;
                            align-items: center;

                            img{
                                width:27px;
                                height:18px;
                            }

                        }
                    }
                }
            }
        }

        .tabs-wrapper{
            margin-top:20px;
            background: #FFFFFF;
            border-radius: 25px;
            width:1840px;
            display:flex;
            flex-direction: column;
            align-items: center;
            padding: 0 84px 55px 84px;
            .tabs-bar{
                margin-top:24px;

                width:1025px;
                height:95px;

                display:flex;
                align-items:center;
                justify-content: center;
                border-radius: 8px;
                background:#F8F8F8;

                .tab-text{
                    line-height:27px;
                    font-size: 20px;
                    color:#918F97;
                    margin-right:96px;
                }
                .tab-text:hover{
                    cursor: pointer;
                }
                .tabs-bar{
                    div:last-child{
                        margin-right:0;
                    }
                }

                .tab-text.active{
                    color:#1F5DE4;
                    font-weight: bold;
                }
            }

            .tab-content-wrapper{
                margin-top:50px;

                .portfolio.active, .skills.active, .about.active, .work-experience.active, .education.active{
                    opacity: 1;
                }
                .portfolio, .skills, .about, .work-experience, .education{
                    opacity: 0;
                    transition:all 0.6s ease;
                }
                .portfolio{
                    .images{
                        display:flex;
                        flex-wrap: wrap;
                        img{
                            width:536px;
                            height:404px;
                            margin-right:21px;
                            margin-bottom:27px;
                        }
                        img:last-child{
                            margin-right:0;
                        }
                    }

                    .loading{
                        display:flex;
                        flex-direction: column;
                        align-items:center;
                        margin-top:50px;
                        color:#3C3748CF;
                        font-size: 16px;
                        img{
                            width:40px;
                            height:40px;
                            margin-bottom:8px;
                        }
                    }

                }

                .work-experience{

                }

                .education{

                }

                .skills{


                }

                .about{

                }
            }


        }

    }
</style>
