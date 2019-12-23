<template>
    <div class="d-flex justify-content-center">

        <nav class="navbar navbar-light fixed-top dashboard_navbar">
            <a class="navbar-brand" href="/freelancer/dashboard">
                <img src="/images/client/logo_123.png" alt="logout" style="width: 177px;">
            </a>
        </nav>

        <div class="themeWrapper">

            <div class="mainThemeBar d-flex justify-content-between align-items-center">
                <div class="left hideOnPhone">
                    <div class="avatar">
                        <img src="/images/resume_themes/theme4/person.png" alt="profile pic">
                    </div>
                    <div class="info">
                        <div class="user-name">
                            Zoyee Allena
                        </div>
                        <div class="job-title">
                            Visual deisgner
                        </div>
                        <div class="social-icons">
                            <img src="/images/resume_themes/theme4/Behance.svg" alt="">
                            <img src="/images/resume_themes/theme4/Dribbble.svg" alt="">
                            <img src="/images/resume_themes/theme4/Instagram.svg" alt="">
                        </div>
                    </div>
                </div>

                <div class="hideOnPhone">
                    <div class="right d-flex align-items-center">
                        <div class="hourly-rate d-flex">
                            <div class="hourly-rate-text">
                                15$
                            </div>
                            <div class="hourly-rate-text light text-center">
                                Hourly Rate
                            </div>
                        </div>
                        <div class="weekly-availability d-flex">
                            <div class="hourly-rate-text">
                                35 hours
                            </div>
                            <div class="hourly-rate-text light text-center">
                                Weekly Availability
                            </div>
                        </div>
                        <div class="hire-me-btn NoDecor">
                            <a href="javascript:void(0)">
                                Hire me
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-100 d-flex flex-column align-items-center justify-content-center">
                <div class="tabs-bar d-flex">
                    <div class="tab-text" @click="setActiveTab('portfolio')"
                         :class="{active : activeTab === 'portfolio'}">
                        Portfolio
                    </div>
                    <div class="tab-text" @click="setActiveTab('work')" :class="{active : activeTab === 'work'}">
                        Work
                    </div>
                    <div class="tab-text" @click="setActiveTab('education')"
                         :class="{active : activeTab === 'education'}">
                        Education
                    </div>
                </div>
            </div>

            <div class="main-tab-content">
                <div>
                    <div class="skills-tabs d-flex justify-content between">
                        <div class="skills-tab-text" :class="{active : activeSkillTab === 'programming-languages'}"
                             @click="setActiveSkillTab('programming-languages')">
                            Programming Languages
                        </div>
                        <div class="skills-tab-text" :class="{active : activeSkillTab === 'framewroks-databases'}"
                             @click="setActiveSkillTab('framewroks-databases')">
                            Frameworks
                        </div>
                        <div class="skills-tab-text" :class="{active : activeSkillTab === 'design-skills'}"
                             @click="setActiveSkillTab('design-skills')">
                            Design Skills
                        </div>
                        <div class="skills-tab-text mr-0" :class="{active : activeSkillTab === 'software'}"
                             @click="setActiveSkillTab('software')">
                            Software
                        </div>
                    </div>
                    <div class="skills-icons-bar" id="style-1">
                        <img class="icon" src="/images/resume_themes/theme4/PS.svg" alt="skill-icon">
                        <img class="icon" src="/images/resume_themes/theme4/Ai.svg" alt="skill-icon">
                        <img class="icon" src="/images/resume_themes/theme4/Lr.svg" alt="skill-icon">
                        <img class="icon" src="/images/resume_themes/theme4/Xd.svg" alt="skill-icon">
                        <img class="icon" src="/images/resume_themes/theme4/Id.svg" alt="skill-icon">

                    </div>
                </div>

                <slick class="portfolioSlides" ref="slick" :options="slickOptions">
                    <img src="/images/resume_themes/theme4/portfolio1.png" alt="portfolio image">
                    <img src="/images/resume_themes/theme4/portfolio2.png" alt="portfolio image">
                    <img src="/images/resume_themes/theme4/portfolio3.png" alt="portfolio image">
                    <img src="/images/resume_themes/theme4/portfolio2.png" alt="portfolio image">
                    <img src="/images/resume_themes/theme4/portfolio1.png" alt="portfolio image">
                </slick>
            </div>

        </div>
    </div>
</template>

<script>
    import Slick from 'vue-slick';

    export default {
        props: ['user'],
        components: {
            Slick
        },
        data() {
            return {
                activeTab: 'portfolio',
                activeSkillTab: 'programming-languages',
                slickOptions: {
                    infinite: true,
                    dots: true,
                    arrows: false,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    responsive: [
                        {
                            breakpoint: 786,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2,
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
            }
        },
        methods: {
            setActiveTab(tabName) {
                this.activeTab = tabName;
            },
            setActiveSkillTab(tabName) {
                this.activeSkillTab = tabName;
            }
        },
        mounted() {

        }
    }
</script>

<style lang="scss">


    .hideOnPhone {
        @media only screen and (max-width: 600px) {
            display: none !important;
        }
    }

    .hideOnNotPhone {
        @media only screen and (min-width: 600px) {
            display: none !important;
        }
    }

    .themeWrapper {

        width: 100vw;
        max-width: 1920px;
        background: white;
        margin-left: 3%;
        margin-right: 3%;
        margin-top: 1%;
        border-radius: 15px;

        @media only screen and (max-width: 600px) {
            width: 95vw;
        }


        .mainThemeBar {
            padding-top: 40px;
            padding-left: 70px;
            padding-right: 70px;
            flex-wrap: wrap;
            @media only screen and (max-width: 600px) {
                padding-top: 0;
            }
            .left {
                display: flex;

                @media only screen and (max-width: 600px) {
                    align-items: center;
                }

                .avatar {
                    margin-right: 56px;

                    img {
                        width: 226px;
                        height: 226px;
                        border-radius: 50%;
                    }

                    @media only screen and (max-width: 600px) {
                        margin-right: 15px;
                        img {
                            width: 50px;
                            height: 50px;
                        }
                    }
                }

                .info {
                    margin-top: 35px;
                    display: flex;
                    flex-direction: column;
                    @media only screen and (max-width: 600px) {
                        margin-top: 0;
                    }

                    .user-name {
                        margin-left: -2px;
                        font-size: 36px;
                        line-height: 39px;
                        color: #222B4C;
                        @media only screen and (max-width: 600px) {
                            font-size: 16px;
                            line-height: 24px;
                        }
                    }

                    .job-title {
                        margin-top:15px;
                        font-weight: 500;
                        font-size: 20px;
                        line-height: 22px;
                        color: #9CA4C1;
                        @media only screen and (max-width: 600px) {
                            font-size: 12px;
                            line-height: 15px;
                        }
                    }

                    .social-icons{
                        display:flex;
                        margin-left: -25px;
                        margin-top: 6px;

                        img{
                            width: 100px;
                            height: 100px;
                        }
                        img:last-child{
                            margin-right: 0;
                        }
                    }
                }
            }

            .right {
                @media only screen and (max-width: 600px) {
                    margin-top: 57px;
                    width: 100%;
                    justify-content: center;
                }

                .hourly-rate {
                    margin-right: 30px;
                    align-items: baseline;
                    @media only screen and (max-width: 600px) {
                        margin-right: 27px;
                    }
                }

                .weekly-availability {
                    margin-right: 30px;
                    align-items: baseline;
                    @media only screen and (max-width: 600px) {
                        margin-right: 19px;
                    }
                }

                .hourly-rate-text {
                    font-weight: 500;
                    font-size: 42px;
                    line-height: 46px;
                    color: #222B4C;
                    margin-right: 10px;
                    @media only screen and (max-width: 600px) {
                        font-size: 12px;
                    }
                }

                .hourly-rate-text.light {
                    font-weight: 500;
                    font-size: 18px;
                    line-height: 20px;
                    color: #9CA4C1;
                }

                .hire-me-btn {
                    a {
                        font-weight: 600;
                        font-size: 14px;
                        line-height: 15px;
                        display: flex;
                        align-items: center;
                        text-align: center;
                        color: #FFFFFF;
                        background: #00A3FF;
                        border-radius: 6px;
                        height: 60px;
                        width: 170px;
                        display: flex;
                        justify-content: center;
                        align-items: center;

                        @media only screen and (max-width: 600px) {
                            font-size: 12px;
                            height: 34px;
                            width: 105px;
                            border-radius: 8px;
                        }
                    }
                }
            }
        }


        .skills-tabs {
            display: flex;
            justify-content: center;
            overflow-x: auto;
            width: 100%;
            @media only screen and (max-width: 600px) {
                justify-content: space-between;
                margin-top: 30px;

            }

            .skills-tab-text {
                font-weight: 600;
                font-size: 20px;
                line-height: 22px;
                color: #9CA4C1;
                padding-bottom:20px;
                padding-left:20px;
                padding-right:20px;
                white-space: nowrap;
                @media only screen and (max-width: 600px) {
                    font-size: 10px;
                    line-height: 15px;
                    padding: 13px 29px;
                }
            }

            .skills-tab-text:hover {
                cursor: pointer;
            }

            .skills-tab-text.active {
                font-weight: 600;
                font-size: 20px;
                line-height: 22px;
                color: #01A2FF;
                border-bottom:3px solid #01A2FF;
            }

        }

        .skills-icons-bar {
            margin-top: 45px;
            padding-bottom: 10px;
            display: flex;
            justify-content: center;
            overflow-x: auto;

            img {
                width: 70px;
                height: 70px;
                margin-right: 40px;
                @media only screen and (max-width: 600px) {
                    width: 30px;
                    height: 30px;
                    margin-right: 30px;
                }
            }

            img:last-child {
                margin-right: 0;
            }

        }


        .tabs-bar {
            margin-top: 30px;
            width:100%;
            background: #00A3FF;
            height:80px;
            align-items:center;
            justify-content:center;
            @media only screen and (max-width: 600px) {
                margin-top: 10px;
            }
            .tab-text {
                font-family: inherit;
                font-style: normal;
                font-weight: 500;
                font-size: 32px;
                line-height: 35px;
                color: #FFFFFF;
                padding-top: 25px;
                padding-bottom: 25px;
                padding-right:45px;
                padding-left:45px;
                position: relative;
                @media only screen and (max-width: 600px) {
                    font-size: 12px;
                    margin-right: 10px;
                    margin-left: 10px;
                    padding-bottom: 0;
                }
            }

            .tab-text:not(:last-child) {

            }

            .tab-text.active {
                color: #00A3FF;
                background-color:white;
            }

            .tab-text:hover {
                cursor: pointer;
            }

            .arrow {
                img {
                    width: 30px;
                    height: 30px;
                }
            }
        }

        .main-tab-content {
            margin-top: 60px;
            padding-bottom: 45px;
            @media only screen and (max-width: 600px) {
                margin-top: 35px;
            }

            .portfolioSlides {
                padding-left: 0px;
                padding-right: 0px;

                margin-top:100px;

                @media only screen and (max-width: 600px) {
                    padding-left: 0px;
                    padding-right: 0px;
                }

                display: flex;
                justify-content: center;

                img {

                    padding:30px;

                    width: 723px !important;
                    height:700px;

                    @media only screen and (max-width: 600px) {
                        width: 177px !important;
                        height: 139px;
                    }

                }

                .slide-text {
                    margin-top: 15px;
                    font-style: normal;
                    font-weight: normal;
                    font-size: 20px;
                    line-height: 23px;
                    color: #333333;

                    @media only screen and (max-width: 600px) {
                        font-size: 10px;
                        line-height: 12px;
                        margin-bottom: 25px;
                    }
                }
            }

            .work {

            }

            .education {


            }
        }
    }


    //slick slides :

    .slick-dots {
        bottom: -31px !important;
    }

    .slick-dots li button:before {
        font-size: 10px !important;
        @media only screen and (max-width: 600px) {
            font-size: 6px !important;
        }
    }

    .slick-dots li.slick-active button:before {
        opacity: 1;
        color: #5289E7;
    }

    /* scroll bar styles */


    #style-2::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        border-radius: 0;
    }

    #style-2::-webkit-scrollbar {
        width: 4px;
        background-color: rgba(255, 255, 255, 0.35);
    }

    #style-2::-webkit-scrollbar-thumb {
        border-radius: 1px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .1);
        background-color: white;
    }

    #style-1::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        border-radius: 0;
    }

    #style-1::-webkit-scrollbar {
        height: 4px;
        background-color: rgba(255, 255, 255, 0.35);
    }

    #style-1::-webkit-scrollbar-thumb {
        border-radius: 1px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .1);
        background-color: white;
    }
</style>
