<template>
    <div class="d-flex justify-content-center">
        <nav class="navbar navbar-light fixed-top dashboard_navbar" id="sideNav">
            <a class="navbar-brand" href="/freelancer/dashboard">
                <img src="/images/client/logo_123.png" alt="logout" style="width: 177px;">
            </a>
        </nav>

        <div class="themeWrapper">
            <div class="mainThemeBar d-flex justify-content-between align-items-center">
                <div class="left d-flex">
                    <div class="d-flex flex-column icons">
                        <img src="/images/resume_themes/theme2/sound.svg" alt="sound">
                        <img src="/images/resume_themes/theme2/video.svg" alt="video">
                        <img src="/images/resume_themes/theme2/chat.svg" alt="chat">
                    </div>
                    <div class="avatar">
                        <img src="/images/resume_themes/theme2/man-photo.svg" alt="profile pic">
                    </div>
                    <div class="info d-flex flex-column align-items-between">
                        <div class="user-name">
                            Conor
                        </div>
                        <div class="job-title">
                            Ui/Ux designer
                        </div>
                        <div class="social-icons">
                            <img src="/images/resume_themes/theme2/behance.svg" alt="video">
                            <img src="/images/resume_themes/theme2/dribbble.svg" alt="video">
                            <img src="/images/resume_themes/theme2/instagram.svg" alt="video">
                            <img src="/images/resume_themes/theme2/linkedin.svg" alt="video">
                            <img src="/images/resume_themes/theme2/google.svg" alt="video">
                        </div>
                    </div>
                </div>
                <div class="right d-flex">
                    <div class="hourly-rate">
                        <div class="hourly-rate-text">
                            $10
                        </div>
                        <div class="hourly-rate-text light">
                            Hourly Rate
                        </div>
                    </div>
                    <div class="weekly-availability">
                        <div class="hourly-rate-text">
                            35 hours
                        </div>
                        <div class="hourly-rate-text light">
                            Weekly Availability
                        </div>
                    </div>
                    <div>
                        <a href="javascript:void(0)" class="hire-me-btn">
                            Hire me
                        </a>
                    </div>
                </div>
            </div>

            <div class="tabs-bar d-flex justify-content-center align-items-center">
                <div class="arrow">
                    <img src="/images/resume_themes/theme2/left-arrow.svg" alt="left" style="opacity: .3">
                </div>
                <div class="tab-text" @click="setActiveTab('portfolio')" :class="{active : activeTab === 'portfolio'}">
                    Portfolio
                </div>
                <div class="tab-text" @click="setActiveTab('work')" :class="{active : activeTab === 'work'}">
                    Work
                </div>
                <div class="tab-text" @click="setActiveTab('education')" :class="{active : activeTab === 'education'}">
                    Education
                </div>
                <div class="arrow">
                    <img src="/images/resume_themes/theme2/right-arrow.svg" alt="right">
                </div>
            </div>

            <div class="tab-content-wrapper">
                <div class="tab-content-inside-wrapper">
                    <div class="skills-tabs">
                        <div class="skills-tab-text" :class="{active : activeSkillTab === 'programming-languages'}" @click="setActiveSkillTab('programming-languages')" >
                            Programming Languages
                        </div>
                        <div class="skills-tab-text" :class="{active : activeSkillTab === 'framewroks-databases'}" @click="setActiveSkillTab('framewroks-databases')">
                            Frameworks/Databases
                        </div>
                        <div class="skills-tab-text" :class="{active : activeSkillTab === 'design-skills'}" @click="setActiveSkillTab('design-skills')">
                            Design Skills
                        </div>
                        <div class="skills-tab-text mr-0" :class="{active : activeSkillTab === 'software'}" @click="setActiveSkillTab('software')">
                            Software
                        </div>
                    </div>
                    <div class="skills-icons-bar">
                        <img class="icon" src="/images/resume_themes/theme2/illustrator.svg" alt="skill-icon">
                        <img class="icon" src="/images/resume_themes/theme2/photoshop.svg" alt="skill-icon">
                        <img class="icon" src="/images/resume_themes/theme2/sketch.svg" alt="skill-icon">
                        <img class="icon" src="/images/resume_themes/theme2/UX.svg" alt="skill-icon">
                        <img class="icon" src="/images/resume_themes/theme2/UI.svg" alt="skill-icon">
                    </div>

                    <div class="main-tab-content" id="style-2">


                        <div class="portfolio">
                            <img src="/images/resume_themes/theme2/portfolio1.png" alt="portfolio-project">
                            <img src="/images/resume_themes/theme2/portfolio2.png" alt="portfolio-project">
                            <img src="/images/resume_themes/theme2/portfolio1.png" alt="portfolio-project">
                            <img src="/images/resume_themes/theme2/portfolio2.png" alt="portfolio-project">
                            <img src="/images/resume_themes/theme2/portfolio1.png" alt="portfolio-project">
                            <img src="/images/resume_themes/theme2/portfolio2.png" alt="portfolio-project">
                        </div>




                    </div>

                </div>
            </div>

        </div>

    </div>
</template>

<script>
    export default {
        props:['user'],
        data(){
            return{
                activeTab : 'portfolio',
                activeSkillTab : 'programming-languages',
            }
        },
        methods:{
            setActiveTab(tabName){
                this.activeTab = tabName ;
            },
            setActiveSkillTab(tabName){
                this.activeSkillTab = tabName ;
            }
        },
        mounted(){

        }
    }
</script>

<style lang="scss">
    .themeWrapper{

        width:100vw;
        max-width:1920px;
        background: white;
        margin-left:3%;
        margin-right:3%;
        margin-top:1%;
        border-radius:15px;

        .mainThemeBar{
            padding-top:40px;
            padding-left:5%;
            padding-right:5%;
            .left{
                .icons{
                    margin-right: 27px;
                    img{
                        width: 48px;
                        height: 48px;
                        margin-bottom: 14px;
                    }
                    img:last-child{
                        margin-bottom: 0;
                    }
                }

                .avatar{
                    margin-right: 37px;

                    width:160px;
                    height:160px;
                }

                .info{
                    margin-top:15px;
                    .user-name{
                        font-weight: normal;
                        color: #707070;
                        font-size: 31px;
                        line-height: 30px;
                    }

                    .job-title{
                        margin-top:15px;
                        font-weight: 300;
                        font-size: 20px;
                        line-height: 19px;
                    }

                    .social-icons{
                        margin-top: 42px;
                        width:20vw;
                        display:flex;
                        justify-content:space-between;
                        img{
                            width:24px;
                            height:24px;
                        }
                        img:last-child{
                            margin-right:0;
                        }
                    }
                }
            }

            .right{
                .hourly-rate{
                    margin-right:56px;
                }

                .weekly-availability{
                    margin-right:32px;
                }
                .hourly-rate-text{
                    font-style: normal;
                    font-weight: normal;
                    font-size: 19px;
                    line-height: 18px;
                    color: #4D75E8;
                }
                .hourly-rate-text.light{
                    font-weight: 300;
                }

                .hire-me-btn{
                    background:#4D75E8;
                    height:55px;
                    width:163px;
                    display:flex;
                    justify-content:center;
                    align-items:center;
                    font-weight: 300;
                    font-size: 16px;
                    line-height: 15px;
                    color: #FFFFFF;
                    border-radius:15px;
                }
            }
        }

        .tabs-bar{
            margin-top:54px;
            .tab-text{
                font-size: 26px;
                line-height: 25px;
                font-weight:600;
                color: #4D75E8;
                margin-right:35px;
                margin-left:35px;
                padding-bottom: 9px;
                opacity:0.43;
                position:relative;
            }
            .tab-text.active{
                opacity:1;
            }
            .tab-text.active:before {
                content: "";
                position: absolute;
                left: 47.5%;
                right: 47.5%;
                bottom: 0;
                height: 1px;
                width: 5%;
                border: 4px solid #4D75E8;
                border-radius: 50%;
            }
            .tab-text:hover{
                cursor: pointer;
            }

            .arrow{
                img{
                    width: 30px;
                    height: 30px;
                }
            }
        }

        .tab-content-wrapper{
            margin-top:34px;
            background-color: #4D75E8;
            height:735px;

            .tab-content-inside-wrapper{
                margin-left: 100px;
                margin-right: 100px;
            }

            .skills-tabs{
                padding-top:65px;
                display:flex;
                justify-content: center;
                position:relative;
                .skills-tab-text{
                    font-size: 16px;
                    font-weight: 600;
                    line-height: 15px;
                    color: #FFFFFF;
                    margin-right:64px;
                    padding-bottom:25px;
                    position: relative;
                }
                .skills-tab-text:hover{
                    cursor: pointer;
                }
                .skills-tab-text.active:before {
                    content: "";
                    position: absolute;
                    left: 15%;
                    right: 15%;
                    bottom: 0;
                    height: 1px;
                    width: 70%;
                    border-bottom: 3px solid white;
                }

            }

            .skills-tabs:before{
                content: "";
                position: absolute;
                left: 0;
                right: 0;
                bottom: 0;
                height: 1px;
                width: 100%;
                opacity: 0.25;
                border-bottom: 1px solid rgba(255, 255, 255, 0.35);
            }

            .skills-icons-bar{
                margin-top: 32px;
                display:flex;
                justify-content: center;
                img{
                    width:40px;
                    height:40px;
                    margin-right:64px;
                }
                img:last-child{
                    margin-right:0;
                }
            }

            .main-tab-content{
                margin-top:90px;
                max-height: 468px;
                overflow-y: scroll;

                .portfolio{
                    display: flex;
                    justify-content: center;
                    flex-wrap: wrap;
                    img{
                        margin-bottom:46px;
                        margin-left: 23px;
                        margin-right: 23px;
                        width: 740px;
                        height: 360px;
                    }
                }

                .work{

                }

                .education{


                }
            }


        }

    }


    /* scroll bar styles */


    #style-2::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        border-radius: 0;
    }

    #style-2::-webkit-scrollbar
    {
        width: 4px;
        background-color: rgba(255, 255, 255, 0.35);
    }

    #style-2::-webkit-scrollbar-thumb
    {
        border-radius: 1px;
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.1);
        background-color: white;
    }

</style>
