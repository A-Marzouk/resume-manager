<template>
    <div class="d-flex justify-content-center">

        <nav class="navbar navbar-light fixed-top dashboard_navbar">
            <a class="navbar-brand" href="/freelancer/dashboard">
                <img src="/images/client/logo_123.png" alt="logout" style="width: 177px;">
            </a>
        </nav>

        <div class="themeWrapper">

            <div class="hideOnNotPhone w-100">
                <div class="mobileThemeBar d-flex align-items-center">
                    <div class="d-flex">
                        <div class="avatar">
                            <img src="/images/resume_themes/theme3/person.png" alt="profile pic">
                        </div>
                        <div class="info">
                            <div class="user-name">
                                Micheal Fields
                            </div>
                            <div class="job-title d-flex">
                                <div>
                                    Web Developer
                                </div>
                                <img src="/images/resume_themes/theme3/chat.svg" alt="chat" class="hideOnPhone">
                            </div>
                        </div>
                    </div>
                    <div class="hire-me-btn-mobile NoDecor">
                        <a href="javascript:void(0)">Hire me</a>
                    </div>
                    <div class="menu-icon">
                        <img src="/images/resume_themes/theme3/menu.svg" alt="menue">
                    </div>
                </div>
            </div>

            <div class="mainThemeBar d-flex justify-content-between align-items-center">
                <div class="left hideOnPhone">
                    <div class="avatar">
                        <img src="/images/resume_themes/theme3/person.png" alt="profile pic">
                    </div>
                    <div class="info">
                        <div class="user-name">
                            Micheal Fields
                        </div>
                        <div class="job-title d-flex">
                            <div>
                                Web Developer
                            </div>
                            <img src="/images/resume_themes/theme3/chat.svg" alt="chat" class="hideOnPhone">
                        </div>
                    </div>
                </div>

                <div class="hideOnPhone">
                    <div class="right d-flex align-items-center">
                        <div class="hourly-rate">
                            <div class="hourly-rate-text">
                                $10
                            </div>
                            <div class="hourly-rate-text light text-center">
                                Hourly Rate
                            </div>
                        </div>
                        <div class="weekly-availability">
                            <div class="hourly-rate-text">
                                35 hours
                            </div>
                            <div class="hourly-rate-text light text-center">
                                Weekly Availability
                            </div>
                        </div>
                        <div class="hire-me-btn">
                            <a href="javascript:void(0)">
                                Hire me
                            </a>
                        </div>
                    </div>
                </div>

                <div class="w-100 d-flex flex-column align-items-center justify-content-center">
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
                        <img class="icon" src="/images/resume_themes/theme3/html.svg" alt="skill-icon">
                        <img class="icon" src="/images/resume_themes/theme3/python.svg" alt="skill-icon">
                        <img class="icon" src="/images/resume_themes/theme3/skill.svg" alt="skill-icon">
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
                <slick class="portfolioSlides" ref="slick" :options="slickOptions">
                    <div class="d-flex flex-column align-items-center">
                        <img src="/images/resume_themes/theme3/portfolio1.png" alt="portfolio image">
                        <div class="slide-text">
                            🛒 Lorem ipsum dolor sit amet, consectetur elit.
                        </div>
                    </div>

                    <div class="d-flex flex-column align-items-center">
                        <img src="/images/resume_themes/theme3/portfolio2.png" alt="portfolio image">
                        <div class="slide-text">
                            📊 Lorem ipsum dolor sit amet, consectetur elit.
                        </div>
                    </div>
                    <div class="d-flex flex-column align-items-center">
                        <img src="/images/resume_themes/theme3/portfolio3.png" alt="portfolio image">
                        <div class="slide-text">
                            🛒 Lorem ipsum dolor sit amet, consectetur elit.
                        </div>
                    </div>

                    <div class="d-flex flex-column align-items-center">
                        <img src="/images/resume_themes/theme3/portfolio1.png" alt="portfolio image">
                        <div class="slide-text">
                            📊 Lorem ipsum dolor sit amet, consectetur elit.
                        </div>
                    </div>

                    <div class="d-flex flex-column align-items-center">
                        <img src="/images/resume_themes/theme3/portfolio2.png" alt="portfolio image">
                        <div class="slide-text">
                            🛒 Lorem ipsum dolor sit amet, consectetur elit.
                        </div>
                    </div>

                    <div class="d-flex flex-column align-items-center">
                        <img src="/images/resume_themes/theme3/portfolio2.png" alt="portfolio image">
                        <div class="slide-text">
                            🛒 Lorem ipsum dolor sit amet, consectetur elit.
                        </div>
                    </div>

                    <div class="d-flex flex-column align-items-center">
                        <img src="/images/resume_themes/theme3/portfolio2.png" alt="portfolio image">
                        <div class="slide-text">
                            🛒 Lorem ipsum dolor sit amet, consectetur elit.
                        </div>
                    </div>
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
                    infinite: false,
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
                                rows: 3,
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

        .mobileThemeBar {
            background: #FFFFFF;
            box-shadow: 1px 6px 6px rgba(0, 0, 0, 0.1);
            height:80px;
            padding-left:10px;
            padding-right:10px;
            justify-content: space-between;

            .avatar {
                margin-right: 37px;
                border-radius: 24px;

                img {
                    width: 280px;
                    height: 280px;
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
                margin-top: 10px;
                display: flex;
                flex-direction: column;
                @media only screen and (max-width: 600px) {
                    margin-top: 0;
                }

                .user-name {
                    margin-left: -2px;
                    font-style: normal;
                    font-weight: bold;
                    font-size: 60px;
                    line-height: 90px;
                    color: #333333;
                    @media only screen and (max-width: 600px) {
                        font-size: 16px;
                        line-height: 24px;
                    }
                }

                .job-title {
                    font-style: normal;
                    font-weight: normal;
                    font-size: 40px;
                    line-height: 60px;
                    color: #000000;

                    img {
                        width: 60px;
                        height: 60px;
                        margin-left: 20px;
                    }

                    @media only screen and (max-width: 600px) {
                        font-size: 12px;
                        line-height: 15px;
                    }
                }

                .social-icons {
                    margin-top: 42px;
                    width: 20vw;
                    display: flex;
                    justify-content: space-between;
                    overflow-x: auto;

                    @media only screen and (max-width: 600px) {
                        width: 100%;
                    }

                    img {
                        width: 24px;
                        height: 24px;
                        @media only screen and (max-width: 600px) {
                            margin-right: 25px;
                        }
                    }

                    img:last-child {
                        margin-right: 0;
                    }
                }
            }

            .hire-me-btn-mobile{
                a{
                    display:flex;
                    justify-content:center;
                    align-items:center;
                    height:30px;
                    width:90px;
                    background: #5289E7;
                    color: white;
                    font-size: 13px;
                    color: #FFFFFF;
                    border-radius: 35px;
                }
            }

            .menu-icon{
                img{
                    width:18px;
                    height:12px;
                    margin-left:5px;
                }
            }

        }

        .mainThemeBar {
            padding-top: 40px;
            padding-left: 5%;
            padding-right: 5%;
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
                    margin-right: 37px;
                    border-radius: 24px;

                    img {
                        width: 280px;
                        height: 280px;
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
                    margin-top: 10px;
                    display: flex;
                    flex-direction: column;
                    @media only screen and (max-width: 600px) {
                        margin-top: 0;
                    }

                    .user-name {
                        margin-left: -2px;
                        font-style: normal;
                        font-weight: bold;
                        font-size: 60px;
                        line-height: 90px;
                        color: #333333;
                        @media only screen and (max-width: 600px) {
                            font-size: 16px;
                            line-height: 24px;
                        }
                    }

                    .job-title {
                        font-style: normal;
                        font-weight: normal;
                        font-size: 40px;
                        line-height: 60px;
                        color: #000000;

                        img {
                            width: 60px;
                            height: 60px;
                            margin-left: 20px;
                        }

                        @media only screen and (max-width: 600px) {
                            font-size: 12px;
                            line-height: 15px;
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
                    margin-right: 66px;
                    @media only screen and (max-width: 600px) {
                        margin-right: 27px;
                    }
                }

                .weekly-availability {
                    margin-right: 40px;
                    @media only screen and (max-width: 600px) {
                        margin-right: 19px;
                    }
                }

                .hourly-rate-text {
                    font-style: normal;
                    font-weight: normal;
                    font-size: 60px;
                    line-height: 90px;
                    @media only screen and (max-width: 600px) {
                        font-size: 12px;
                    }
                }

                .hourly-rate-text.light {
                    font-style: normal;
                    font-weight: normal;
                    font-size: 20px;
                    line-height: 30px;
                }

                .hire-me-btn {
                    a {
                        font-size: 30px;
                        color: #FFFFFF;
                        background: #5289E7;
                        border-radius: 35px;
                        background: #4D75E8;
                        height: 70px;
                        width: 250px;
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
                font-style: normal;
                font-weight: normal;
                font-size: 25px;
                line-height: 37px;
                padding: 16px 33px;
                color: #000000;
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
                font-style: normal;
                font-weight: normal;
                background: #5289E7;
                border-radius: 35px;
                color: #FFFFFF;
            }

        }

        .skills-icons-bar {
            margin-top: 35.67px;
            padding-bottom: 10px;
            display: flex;
            justify-content: center;
            overflow-x: auto;

            img {
                width: 30px;
                height: 30px;
                margin-right: 45px;
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
            @media only screen and (max-width: 600px) {
                margin-top: 10px;
            }
            .tab-text {
                font-style: normal;
                font-weight: normal;
                font-size: 25px;
                line-height: 37px;
                color: #000000;
                padding-bottom: 9px;
                position: relative;
                @media only screen and (max-width: 600px) {
                    font-size: 12px;
                    margin-right: 10px;
                    margin-left: 10px;
                    padding-bottom: 0;
                }
            }

            .tab-text:not(:last-child) {
                margin-right: 70px;
            }

            .tab-text.active {
                opacity: 1;
            }

            .tab-text.active:before {
                content: "";
                position: absolute;
                bottom: 0;
                height: 1px;
                width: 125%;
                margin-left: -12.5%;
                border: 3px solid #5289E7;
                border-radius: 5px;
                @media only screen and (max-width: 600px) {
                    border: 2px solid #5289E7;
                }
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
            margin-top: 28px;
            padding-bottom: 45px;
            @media only screen and (max-width: 600px) {
                margin-top: 35px;
            }

            .portfolioSlides {
                padding-left: 135px;
                padding-right: 135px;

                @media only screen and (max-width: 600px) {
                    padding-left: 0px;
                    padding-right: 0px;
                }

                display: flex;
                justify-content: center;

                img {
                    margin-right: 25px;
                    margin-left: 25px;
                    width: 510px !important;
                    height: 400px;

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
