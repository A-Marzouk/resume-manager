<template>
    <div class="theme-container">
        <div class="main-info-bar">
            <div class="left">
                <div class="profile-picture">
                    <img src="/images/resume_themes/theme5/profile.png" alt="">
                </div>
                <div class="main-info">
                    <div class="user-name">
                        Beverly Andrews
                    </div>
                    <div class="job-title">
                        User interface designer
                    </div>
                    <div class="social">
                        <div class="d-flex">
                            <div class="message-btn d-flex">
                                <a href="javascript:void(0)">
                                    <img src="/images/resume_themes/theme8/Icon material-email.svg" alt="mail icon">
                                    <span>Message</span>
                                </a>
                            </div>
                            <div class="video-btn hideOnNotTablet">
                                <a href="javascript:void(0)">
                                    <img src="/images/resume_themes/theme8/video-player.svg" alt="video icon">
                                    <span>Video</span>
                                </a>
                            </div>
                            <div class="audio-btn hideOnNotTablet">
                                <a href="javascript:void(0)">
                                    <img src="/images/resume_themes/theme8/headphones.svg" alt="audio icon">
                                    <span>Audio</span>
                                </a>
                            </div>
                        </div>

                        <div class="icons">
                            <img src="/images/resume_themes/theme8/behance (1).svg" alt="social icon">
                            <img src="/images/resume_themes/theme8/dribbble.svg" alt="social icon">
                            <img src="/images/resume_themes/theme8/instagram.svg" alt="social icon">
                            <img src="/images/resume_themes/theme8/XMLID_801_.svg" alt="social icon">
                            <img src="/images/resume_themes/theme8/icon.svg" alt="social icon">
                        </div>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="interviews hideMeOnTablet">
                    <div class="text">
                        Interview:
                    </div>
                    <div class="video-btn">
                        <a href="javascript:void(0)">
                            <img src="/images/resume_themes/theme8/video-player.svg" alt="video icon">
                            <span>Video</span>
                        </a>
                    </div>
                    <div class="audio-btn">
                        <a href="javascript:void(0)">
                            <img src="/images/resume_themes/theme8/headphones.svg" alt="audio icon">
                            <span>Audio</span>
                        </a>
                    </div>
                </div>
                <div class="prof-info">
                    <div class="prof-left">
                        <div class="hours">
                            <div class="text">
                                Hourly rate
                            </div>
                            <div class="number">
                                $ 25 USD
                            </div>
                        </div>
                        <div class="horizontal-divider"></div>
                        <div class="rate">
                            <div class="text">
                                Available for
                            </div>
                            <div class="number">
                                8 Hours
                            </div>
                        </div>
                    </div>
                    <div class="prof-right">
                        <div class="hire-me-btn">
                            <a href="javascript:void(0)">
                                Hire Me
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tabs-bar">
            <div class="tab-text" :class="{active : activeTab === 'portfolio'}" @click="setActiveTab('portfolio')">
                Portfolio
            </div>
            <div class="tab-text" :class="{active : activeTab === 'workEx'}" @click="setActiveTab('workEx')">
                Work
            </div>
            <div class="tab-text" :class="{active : activeTab === 'edu'}" @click="setActiveTab('edu')">
                Education
            </div>
            <div class="tab-text" :class="{active : activeTab === 'skills'}" @click="setActiveTab('skills')">
                Skills
            </div>
            <div class="tab-text mr-0" :class="{active : activeTab === 'about'}" @click="setActiveTab('about')">
                About
            </div>
        </div>

        <div class="tabs-wrapper">
            <div class="tab-content-wrapper">
                <div class="portfolio" v-show="activeTab === 'portfolio'" :class="{active : activeTab === 'portfolio'}">
                    <div class="images">
                        <img src="/images/resume_themes/theme8/tracker_3_2x 1.svg" alt="portfolio img">
                        <img src="/images/resume_themes/theme8/dribbble_fitness_2x_2x 1.svg" alt="portfolio img">
                        <img src="/images/resume_themes/theme8/fitness2_2x_2x 1.svg" alt="portfolio img">
                        <img src="/images/resume_themes/theme8/fitness_club-statics_schedule_2x 1.svg" alt="portfolio img">
                        <img src="/images/resume_themes/theme8/app_01 1.svg" alt="portfolio img">
                        <img src="/images/resume_themes/theme8/image_processing20200116-657-105hy6m 1.svg" alt="portfolio img">
                    </div>

                    <div class="loading d-none">
                        <img src="/images/resume_themes/theme5/loading.svg" alt="loading">
                        <div>
                            Loading more items
                        </div>
                    </div>
                </div>
                <div class="work-experience" v-show="activeTab === 'workEx'" :class="{active : activeTab === 'workEx'}">
                    <div class="work-item">
                        <div class="company">
                            Google
                        </div>
                        <div class="title">
                            User interface designer
                        </div>
                        <div class="duration">
                            Duration: Dec 19 - Present
                        </div>
                        <div class="work-info">
                            I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.
                        </div>
                    </div>

                    <div class="work-item">
                        <div class="company">
                            Google
                        </div>
                        <div class="title">
                            User interface designer
                        </div>
                        <div class="duration">
                            Duration: Dec 19 - Present
                        </div>
                        <div class="work-info">
                            I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.
                        </div>
                    </div>

                    <div class="work-item">
                        <div class="company">
                            Google
                        </div>
                        <div class="title">
                            User interface designer
                        </div>
                        <div class="duration">
                            Duration: Dec 19 - Present
                        </div>
                        <div class="work-info">
                            I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.
                        </div>
                    </div>

                </div>
                <div class="education" v-show="activeTab === 'edu'" :class="{active : activeTab === 'edu'}">
                    <div class="education-item">
                        <div class="education-type">
                            University
                        </div>
                        <div class="education-name">
                            CA Institute of Technology
                        </div>
                        <div class="education-date">
                            M.Sc in HCI, Dec 19 - present
                        </div>
                        <div class="education-info">
                            CGPA - 3.70 out of 4.0
                        </div>
                    </div>
                    <div class="education-item">
                        <div class="education-type">
                            College
                        </div>
                        <div class="education-name">
                            Lethbride College
                        </div>
                        <div class="education-date">
                            M.Sc in HCI, Dec 19 - present
                        </div>
                        <div class="education-info">
                            CGPA - 3.70 out of 4.0
                        </div>
                    </div>
                    <div class="education-item">
                        <div class="education-type">
                            University
                        </div>
                        <div class="education-name">
                            University of Toronto
                        </div>
                        <div class="education-date">
                            M.Sc in HCI, Dec 19 - present
                        </div>
                        <div class="education-info">
                            CGPA - 3.70 out of 4.0
                        </div>
                    </div>
                </div>
                <div class="skills-tab" v-show="activeTab === 'skills'" :class="{active : activeTab === 'skills'}">
                    <div class="skill-item skills d-flex align-items-end">
                        <div class="skill">
                            <div class="skill-title">
                                Adobe Photoshop
                            </div>
                            <!-- bar -->
                            <div class="skill-bar" :data-bar="90">
                                <span></span>
                            </div>
                        </div>

                        <div style="font-size:32px; font-weight: bold; margin-left:75px; margin-bottom: 19px;" class="percentage">
                            90%
                        </div>
                    </div>
                    <div class="skill-item skills d-flex align-items-end">
                        <div class="skill">
                            <div class="skill-title">
                                Adobe After Effect
                            </div>
                            <!-- bar -->
                            <div class="skill-bar red" :data-bar="65">
                                <span class="red"></span>
                            </div>
                        </div>

                        <div style="color:#FF26BE; font-size:32px; font-weight: bold; margin-left:75px; margin-bottom: 19px;" class="percentage">
                            65%
                        </div>
                    </div>
                    <div class="skill-item skills d-flex align-items-end">
                        <div class="skill">
                            <div class="skill-title">
                                Adobe Premiere pro
                            </div>
                            <!-- bar -->
                            <div class="skill-bar orange" :data-bar="70">
                                <span class="orange"></span>
                            </div>
                        </div>

                        <div style="color:#FF7C00; font-size:32px; font-weight: bold; margin-left:75px; margin-bottom: 19px;" class="percentage">
                            70%
                        </div>
                    </div>
                    <div class="skill-item skills d-flex align-items-end">
                        <div class="skill">
                            <div class="skill-title">
                                Adobe Illustrator
                            </div>
                            <!-- bar -->
                            <div class="skill-bar" :data-bar="50">
                                <span></span>
                            </div>
                        </div>

                        <div style="font-size:32px; font-weight: bold; margin-left:75px; margin-bottom: 19px;" class="percentage">
                            50%
                        </div>
                    </div>
                    <div class="skill-item skills d-flex align-items-end">
                        <div class="skill">
                            <div class="skill-title">
                                Adobe XD
                            </div>
                            <!-- bar -->
                            <div class="skill-bar" :data-bar="85">
                                <span></span>
                            </div>
                        </div>

                        <div style="font-size:32px; font-weight: bold; margin-left:75px; margin-bottom: 19px;" class="percentage">
                            85%
                        </div>
                    </div>
                </div>
                <div class="about" v-show="activeTab === 'about'" :class="{active : activeTab === 'about'}">
                    <div class="about-me">
                        <div class="about-title">
                            About me
                        </div>
                        <div class="about-text">
                            I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit
                            Text” or double click me to add your own content and make changes to the font. Feel free to
                            drag and drop me anywhere you like on your page. I’m a great place for you to tell a story
                            and let your users know a little more about you. This is a great space to write long text
                            about your company and your services. You can use this space to go into a little more detail
                            about your company. Talk about your team and what services you provide. Tell your visitors
                            the story of how you came up with the idea for your business and what makes you different
                            from your competitors.
                        </div>
                    </div>
                    <div class="contact">
                        <div class="contact-title">
                            Contact
                        </div>
                        <div class="email">
                            Email: contact@developer.com
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Slick from 'vue-slick';

    export default {
        name: "theme5",
        components: {
            Slick
        },
        data() {
            return {
                activeTab: 'portfolio',
                slickOptions:{
                    dots: false,
                    arrows: false,
                    slidesToShow: 5,
                    responsive: [
                        {
                            breakpoint: 991,
                            settings: {
                                dots: false,
                                arrows: false,

                                centerMode: true,
                                slidesToShow: 1,
                            }
                        },
                    ]
                },
            }
        },

        methods: {
            setActiveTab(tabName) {
                this.activeTab = tabName;
            },
            skillsBar() {
                $(".skills .skill .skill-bar span").each(function () {
                    $(this).animate({
                        "width": $(this).parent().attr("data-bar") + "%"
                    }, 1000);
                });
            },
        },

        mounted() {
            this.skillsBar();
        }
    }
</script>

<style scoped lang="scss">

    @import url(//fonts.googleapis.com/earlyaccess/thabit.css);

    .hideOnNotTablet{
        @media only screen and (min-width: 1600px) {
            display:none !important;
        }
    }
    .hideOnNotPhone{
        @media only screen and (min-width: 760px) {
            display:none !important;
        }
    }

    .theme-container {
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        width: 100%;
        background-image: url("/images/resume_themes/theme8/background.svg");
        font-family: 'Thabit', monospace !important;
        max-width: 1920px;

        .main-info-bar {
            display: flex;
            justify-content: space-between;
            
            border-top-left-radius: 25px;
            border-top-right-radius: 25px;
            width: 100%;
            padding: 78px;

            .left {
                display: flex;

                .profile-picture {
                    img {
                        width: 200px;
                        height: 200px;
                        border-radius: 50%;
                    }
                }

                .main-info {
                    margin-left: 33px;
                    margin-top: 5px;

                    .user-name {
                        font-size: 40px;
                        line-height: 53px;
                        color: #005BD1 !important;
                        font-weight: bold;
                        opacity: 1;
                        padding-bottom: 13px;
                    }

                    .job-title {
                        font-weight: 500;
                        font-size: 21px;
                        line-height: 27px;
                        color: #FFFFFF;
                    }

                    .social{
                        display: flex;
                        margin-top: 54px;
                        .message-btn{
                            margin-right: 56px;

                            a{
                                background: #005BD1;
                                box-shadow: 0px 0px 16px rgba(0, 91, 209, 0.5);
                                border-radius: 30px;
                                width: 139px;
                                height:41px;
                                font-weight: bold;
                                font-size: 18px;
                                line-height: 24px;
                                color: #FFFFFF;
                                display: flex;
                                justify-content: center;
                                align-items: center;

                                img{
                                    width:22px;
                                    height: 17px;
                                    margin-right: 10px;
                                }
                            }
                        }

                        .icons{
                            display: flex;
                            align-items: center;
                            img{
                                width:42px;
                                height:26px;
                                margin-right:30px ;
                            }
                            img:last-child{
                                margin-right:0 ;
                            }
                        }

                    }
                }

            }

            .right {
                display: flex;
                flex-direction: column;
                justify-content: space-between;

                .interviews{
                    display: flex;
                    justify-content: flex-end;
                    align-items: center;
                    margin-right: 42px;
                    .text{
                        font-style: normal;
                        font-weight: 500;
                        font-size: 21px;
                        line-height: 27px;
                        color: #FFFFFF;
                        margin-right: 16px;
                    }

                    .video-btn{
                        margin-right:9px;
                        a{
                            background: #005BD1;
                            box-shadow: 0px 0px 16px rgba(0, 91, 209, 0.5);
                            border-radius: 30px;
                            width:139px;
                            height:41px;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            font-weight: bold;
                            font-size: 18px;
                            line-height: 24px;

                            color: #FFFFFF;
                            img{
                                width:22px;
                                height:17px;
                                margin-right:11px;
                            }
                        }
                    }

                    .audio-btn{

                        a{
                            background: #005BD1;
                            box-shadow: 0px 0px 16px rgba(0, 91, 209, 0.5);
                            border-radius: 30px;
                            width:139px;
                            height:41px;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            font-weight: bold;
                            font-size: 18px;
                            line-height: 24px;


                            color: #FFFFFF;
                            img{
                                width:18px;
                                height:16px;
                                margin-right:12px;
                            }
                        }

                    }
                }

                .prof-info {
                    display: flex;
                    align-items: center;
                    justify-content: space-evenly;
                    width: 725px;
                    height: 135px;
                    background: #333232;
                    box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
                    border-radius: 30px;

                    .prof-left{
                        display: flex;

                        .hours {
                            display: flex;
                            flex-direction: column;
                            margin-right: 36px;
                            align-items: center;
                            .text{
                                font-weight: 500;
                                font-size: 20px;
                                line-height: 26px;
                                color: #FFFFFF;
                                margin-bottom: 10px;
                            }
                            .number{
                                font-weight: bold;
                                font-size: 26px;
                                line-height: 34px;
                                color: #005BD1;
                            }
                        }

                        .horizontal-divider {
                            height: 41px;
                            width: 1px;
                            background:  rgba(255, 255, 255, 0.38);;
                        }

                        .rate {
                            display: flex;
                            flex-direction: column;
                            margin-left: 36px;
                            align-items: center;

                            .text{
                                font-weight: 500;
                                font-size: 20px;
                                line-height: 26px;
                                color: #FFFFFF;
                                margin-bottom: 10px;
                            }
                            .number{
                                font-weight: bold;
                                font-size: 26px;
                                line-height: 34px;
                                color: #005BD1;
                            }
                        }
                    }

                    .prof-right{
                        .hire-me-btn {
                            a {
                                background: #005BD1;
                                box-shadow: 0px 0px 16px rgba(0, 91, 209, 0.5);
                                border-radius: 50px;

                                font-weight: bold;
                                font-size: 24px;
                                line-height: 32px;
                                color: #FFFFFF;

                                display: flex;
                                justify-content: center;
                                align-items: center;
                                width: 214px;
                                height: 63px;
                            }
                        }
                    }
                }


            }
        }

        .tabs-bar {
            background: #333232;
            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
            width:100%;
            height:119px;
            display: flex;
            align-items: center;
            justify-content: space-around;

            .tab-text {
                font-style: italic;
                font-weight: bold;
                font-size: 36px;
                line-height: 48px;
                color: rgba(0, 91, 209, 0.3);
                position: relative;
            }

            .tab-text:hover {
                cursor: pointer;
                color: #005BD1;
            }

            .tab-text.active:before {
                content: "";
                position: absolute;
                left: -8%;
                bottom: -75%;
                height: 4px;
                width: 116%;
                border: 1px solid #005BD1;
                -webkit-box-shadow: 0px 0px 16px #005BD1;
                box-shadow: 0px 0px 16px #005BD1;
                background: #005BD1;;
                border-radius: 2px;
            }

            .tabs-bar {
                div:last-child {
                    margin-right: 0;
                }
            }

            .tab-text.active {
                color: #005BD1;
                text-shadow: 0px 0px 16px rgba(142, 192, 255, 0.3);
            }
        }

        .tabs-wrapper {
            border-bottom-left-radius: 25px;
            border-bottom-right-radius: 25px;

            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 0 150px 67px 150px;



            .tab-content-wrapper {
                margin-top: 115px;

                .portfolio.active, .skills.active, .about.active, .work-experience.active, .education.active {
                    opacity: 1;
                }

                .portfolio, .about, .work-experience, .education {
                    opacity: 0;
                    transition: all 0.6s ease;
                }

                .portfolio {
                    width: 100%;

                    .images {
                        display: flex;
                        flex-wrap: wrap;
                        justify-content: space-between;

                        img {
                            width: 488px;
                            height: 381px;
                            border-radius: 10px;
                            margin-bottom: 27px;
                        }

                    }

                    .loading {
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        margin-top: 50px;
                        color: #3C3748CF;
                        font-size: 16px;

                        img {
                            width: 40px;
                            height: 40px;
                            margin-bottom: 8px;
                        }
                    }

                }

                .work-experience {
                    display: flex;
                    flex-wrap: wrap;
                    justify-content: space-between;
                    width: 100%;

                    .work-item {
                        margin-bottom: 29px;
                        width: 790px;
                        background: #333232;
                        box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
                        border-radius: 30px;
                        padding: 38px 75px;

                        .company {
                            font-style: normal;
                            font-weight: bold;
                            font-size: 36px;
                            line-height: 48px;
                            color: #FFFFFF;
                            margin-bottom: 14px;
                        }

                        .title {
                            font-weight: bold;
                            font-size: 32px;
                            line-height: 42px;
                            color: #FFFFFF;
                            margin-bottom: 18px;
                        }

                        .duration {
                            font-weight: bold;
                            font-size: 22px;
                            line-height: 29px;
                            color: #1F5DE4;
                            margin-bottom: 30px;
                        }

                        .work-info {
                            font-weight: 500;
                            font-size: 20px;
                            line-height: 26px;
                            color: #FFFFFF;
                        }
                    }
                }

                .education {
                    display: flex;
                    flex-wrap: wrap;
                    justify-content: space-between;
                    width: 100%;

                    .education-item {
                        margin-bottom: 29px;
                        width: 790px;
                        background: #333232;
                        box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
                        border-radius: 30px;
                        padding: 38px 75px;

                        .education-type {
                            font-style: normal;
                            font-weight: bold;
                            font-size: 18px;
                            line-height: 24px;
                            color: #1F5DE4;
                            margin-bottom: 31px;
                        }

                        .education-name {
                            font-weight: bold;
                            font-size: 32px;
                            line-height: 42px;
                            color: #FFFFFF;
                            margin-bottom: 12px;
                        }

                        .education-date {
                            font-weight: bold;
                            font-size: 22px;
                            line-height: 29px;
                            color: #1F5DE4;
                            margin-bottom: 45px;
                        }

                        .education-info {
                            font-weight: 500;
                            font-size: 20px;
                            line-height: 26px;
                            color: #FFFFFF;
                        }
                    }
                }

                .skills-tab {
                    display: flex;
                    justify-content: space-between;
                    flex-wrap: wrap;

                    .skill-item {
                        width: 790px;
                        height: 287px;
                        padding-left:58px;
                        padding-right:58px;
                        padding-bottom: 58px;
                        margin-bottom: 25px;
                        background: #333232;
                        box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
                        border-radius: 30px;
                    }

                    .percentage{
                        font-weight: bold;
                        font-size: 42px !important;
                        line-height: 56px;
                        color: #FFFFFF !important;
                    }
                }

                .about {
                    width: 100%;
                    margin-top: 0;
                    background: #333232;
                    box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
                    border-radius: 30px;
                    padding: 58px;

                    .about-me {
                        .about-title {
                            font-weight: bold;
                            font-size: 26px;
                            line-height: 36px;
                            color: #FFFFFF;
                        }

                        .about-text {
                            margin-top: 30px;
                            font-size: 18px;
                            color: #FFFFFF;
                        }
                    }

                    .contact {
                        margin-top: 68px;

                        .contact-title {
                            line-height: 33px;
                            font-size: 24px;
                            color: #FFFFFF;
                            font-weight: 500;
                            margin-bottom: 33px;
                        }

                        .email {
                            line-height: 33px;
                            font-size: 20px;
                            color: #FFFFFF;
                            font-weight: 500;
                        }
                    }
                }
            }


        }


    }

    @media only screen and (max-width: 1600px) and (min-width: 760px) {
        /* CSS that should be displayed if width is equal to or less than 1600px and larger
         than 760px goes here */

        .theme-container {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            width: 100%;
            background-image: url("/images/resume_themes/theme8/background.svg");
            font-family: 'Thabit', monospace !important;
            max-width: 1920px;

            .main-info-bar {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;

                border-top-left-radius: 25px;
                border-top-right-radius: 25px;
                width: 100%;
                padding: 37px 51px 63px 51px;

                .left {
                    display: flex;

                    .profile-picture {
                        img {
                            width: 180px;
                            height: 180px;
                            border-radius: 50%;
                        }
                    }

                    .main-info {
                        margin-left: 40px;
                        margin-top: 5px;

                        .user-name {
                            font-size: 32px;
                            line-height: 42px;
                            color: #005BD1 !important;
                            font-weight: bold;
                            opacity: 1;
                            padding-bottom: 16px;
                        }

                        .job-title {
                            font-weight: 500;
                            font-size: 16px;
                            line-height: 21px;
                            color: #FFFFFF;
                        }

                        .social{
                            display: flex;
                            flex-direction: column;
                            margin-top: 25px;
                            .message-btn{
                                margin-right: 15px;
                                a{
                                    background: #005BD1;
                                    box-shadow: 0px 0px 16px rgba(0, 91, 209, 0.5);
                                    border-radius: 30px;
                                    width: 107px;
                                    height:32px;
                                    font-weight: bold;
                                    font-size: 10px;
                                    line-height: 13px;
                                    color: #FFFFFF;
                                    display: flex;
                                    justify-content: center;
                                    align-items: center;

                                    img{
                                        width:16px;
                                        height: 12px;
                                        margin-right: 9px;
                                    }
                                }
                            }

                            .icons{
                                display: flex;
                                align-items: center;
                                margin-top: 25px;
                                img{
                                    width:27px;
                                    height:17px;
                                    margin-right:30px ;
                                }
                                img:last-child{
                                    margin-right:0 ;
                                }
                            }


                            .video-btn{
                                margin-right:15px;
                                a{
                                    background: #005BD1;
                                    box-shadow: 0px 0px 16px rgba(0, 91, 209, 0.5);
                                    border-radius: 30px;
                                    width: 107px;
                                    height:32px;
                                    font-weight: bold;
                                    font-size: 10px;
                                    line-height: 13px;
                                    color: #FFFFFF;
                                    display: flex;
                                    justify-content: center;
                                    align-items: center;

                                    img{
                                        width:16px;
                                        height: 12px;
                                        margin-right: 9px;
                                    }
                                }
                            }

                            .audio-btn{

                                a{
                                    background: #005BD1;
                                    box-shadow: 0px 0px 16px rgba(0, 91, 209, 0.5);
                                    border-radius: 30px;
                                    width: 107px;
                                    height:32px;
                                    font-weight: bold;
                                    font-size: 10px;
                                    line-height: 13px;
                                    color: #FFFFFF;
                                    display: flex;
                                    justify-content: center;
                                    align-items: center;

                                    img{
                                        width:16px;
                                        height: 12px;
                                        margin-right: 9px;
                                    }
                                }

                            }

                        }
                    }

                }

                .right {
                    margin-top: 63px;
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;

                    .interviews{
                        display: flex;
                        justify-content: flex-end;
                        align-items: center;
                        margin-right: 42px;
                        .text{
                            font-style: normal;
                            font-weight: 500;
                            font-size: 21px;
                            line-height: 27px;
                            color: #FFFFFF;
                            margin-right: 16px;
                        }

                        .video-btn{
                            margin-right:15px;
                            margin-left:15px;
                            a{
                                background: #005BD1;
                                box-shadow: 0px 0px 16px rgba(0, 91, 209, 0.5);
                                border-radius: 30px;
                                width: 107px;
                                height:32px;
                                font-weight: bold;
                                font-size: 10px;
                                line-height: 13px;
                                color: #FFFFFF;
                                display: flex;
                                justify-content: center;
                                align-items: center;

                                img{
                                    width:16px;
                                    height: 12px;
                                    margin-right: 9px;
                                }
                            }
                        }

                        .audio-btn{

                            a{
                                background: #005BD1;
                                box-shadow: 0px 0px 16px rgba(0, 91, 209, 0.5);
                                border-radius: 30px;
                                width: 107px;
                                height:32px;
                                font-weight: bold;
                                font-size: 10px;
                                line-height: 13px;
                                color: #FFFFFF;
                                display: flex;
                                justify-content: center;
                                align-items: center;

                                img{
                                    width:16px;
                                    height: 12px;
                                    margin-right: 9px;
                                }
                            }

                        }
                    }

                    .prof-info {
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        justify-content: space-evenly;
                        width: 664px;
                        height: 262px;
                        background: #333232;
                        box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
                        border-radius: 30px;

                        .prof-left{
                            display: flex;

                            .hours {
                                display: flex;
                                flex-direction: column;
                                margin-right: 48px;
                                align-items: center;
                                .text{
                                    font-weight: 500;
                                    font-size: 24px;
                                    line-height: 31px;
                                    color: #FFFFFF;
                                    margin-bottom: 6px;
                                }
                                .number{
                                    font-weight: bold;
                                    font-size: 36px;
                                    line-height: 48px;
                                    color: #005BD1;
                                }
                            }

                            .horizontal-divider {
                                height: 41px;
                                width: 1px;
                                background:  rgba(255, 255, 255, 0.38);;
                            }

                            .rate {
                                display: flex;
                                flex-direction: column;
                                margin-left: 48px;
                                align-items: center;

                                .text{
                                    font-weight: 500;
                                    font-size: 24px;
                                    line-height: 31px;
                                    color: #FFFFFF;
                                    margin-bottom: 6px;
                                }
                                .number{
                                    font-weight: bold;
                                    font-size: 36px;
                                    line-height: 48px;
                                    color: #005BD1;
                                }
                            }
                        }

                        .prof-right{
                            .hire-me-btn {
                                a {
                                    background: #005BD1;
                                    box-shadow: 0px 0px 16px rgba(0, 91, 209, 0.5);
                                    border-radius: 50px;

                                    font-weight: bold;
                                    font-size: 24px;
                                    line-height: 32px;
                                    color: #FFFFFF;

                                    display: flex;
                                    justify-content: center;
                                    align-items: center;
                                    width: 243px;
                                    height: 71px;
                                }
                            }
                        }
                    }


                }
            }

            .tabs-bar {
                background: #333232;
                box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
                width:100%;
                height:101px;
                display: flex;
                align-items: center;
                justify-content: space-around;
                overflow: auto;

                .tab-text {
                    font-style: italic;
                    font-weight: bold;
                    font-size: 30px;
                    line-height: 40px;
                    color: rgba(0, 91, 209, 0.3);
                    position: relative;
                }

                .tab-text:hover {
                    cursor: pointer;
                    color: #005BD1;
                }

                .tab-text.active:before {
                    content: "";
                    position: absolute;
                    left: -8%;
                    bottom: -75%;
                    height: 4px;
                    width: 116%;
                    border: 1px solid #005BD1;
                    -webkit-box-shadow: 0px 0px 16px #005BD1;
                    box-shadow: 0px 0px 16px #005BD1;
                    background: #005BD1;;
                    border-radius: 2px;
                }

                .tabs-bar {
                    div:last-child {
                        margin-right: 0;
                    }
                }

                .tab-text.active {
                    color: #005BD1;
                    text-shadow: 0px 0px 16px rgba(142, 192, 255, 0.3);
                }
            }

            .tabs-wrapper {
                border-bottom-left-radius: 25px;
                border-bottom-right-radius: 25px;

                width: 100%;
                display: flex;
                flex-direction: column;
                align-items: center;
                padding: 0 50px 50px 50px;



                .tab-content-wrapper {
                    margin-top: 60px;

                    .portfolio.active, .skills.active, .about.active, .work-experience.active, .education.active {
                        opacity: 1;
                    }

                    .portfolio, .about, .work-experience, .education {
                        opacity: 0;
                        transition: all 0.6s ease;
                    }

                    .portfolio {
                        width: 100%;

                        .images {
                            display: flex;
                            flex-wrap: wrap;
                            justify-content: space-between;

                            img {
                                width: 638px;
                                height: 498px;
                                border-radius: 10px;
                                margin-bottom: 52px;
                            }

                        }

                        .loading {
                            display: flex;
                            flex-direction: column;
                            align-items: center;
                            margin-top: 50px;
                            color: #3C3748CF;
                            font-size: 16px;

                            img {
                                width: 40px;
                                height: 40px;
                                margin-bottom: 8px;
                            }
                        }

                    }

                    .work-experience {
                        display: flex;
                        flex-wrap: wrap;
                        justify-content: space-between;
                        width: 100%;

                        .work-item {
                            margin-bottom: 29px;
                            width: 657px;
                            background: #333232;
                            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
                            border-radius: 30px;
                            padding: 50px 30px;

                            .company {
                                font-style: normal;
                                font-weight: bold;
                                font-size: 36px;
                                line-height: 48px;
                                color: #FFFFFF;
                                margin-bottom: 20px;
                            }

                            .title {
                                font-weight: bold;
                                font-size: 20px;
                                line-height: 24px;
                                color: #FFFFFF;
                                margin-bottom: 27px;
                            }

                            .duration {
                                font-weight: bold;
                                font-size: 20px;
                                line-height: 24px;
                                color: #1F5DE4;
                                margin-bottom: 40px;
                            }

                            .work-info {
                                font-weight: 500;
                                font-size: 14px;
                                line-height: 18px;
                                color: #FFFFFF;
                            }
                        }
                    }

                    .education {
                        display: flex;
                        flex-wrap: wrap;
                        justify-content: space-between;
                        width: 100%;

                        .education-item {
                            margin-bottom: 29px;
                            width: 657px;
                            background: #333232;
                            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
                            border-radius: 30px;
                            padding: 50px 30px;

                            .education-type {
                                font-style: normal;
                                font-weight: bold;
                                font-size: 18px;
                                line-height: 24px;
                                color: #1F5DE4;
                                margin-bottom: 20px;
                            }

                            .education-name {
                                font-weight: bold;
                                font-size: 36px;
                                line-height: 48px;
                                color: #FFFFFF;
                                margin-bottom: 32px;
                            }

                            .education-date {
                                font-weight: bold;
                                font-size: 24px;
                                line-height: 32px;
                                color: #1F5DE4;
                                margin-bottom: 14px;
                            }

                            .education-info {
                                font-weight: 500;
                                font-size: 18px;
                                line-height: 23px;
                                color: #FFFFFF;
                            }
                        }
                    }

                    .skills-tab {
                        display: flex;
                        justify-content: space-between;
                        flex-wrap: wrap;

                        .skill-item {
                            width: 656px;
                            height: 234px;
                            padding-left:50px;
                            padding-right:50px;
                            padding-bottom: 58px;
                            margin-bottom: 50px;
                            background: #333232;
                            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
                            border-radius: 30px;
                        }

                        .percentage{
                            font-weight: bold;
                            font-size: 36px !important;
                            line-height: 48px;
                            color: #FFFFFF !important;
                        }
                    }

                    .about {
                        width: 100%;
                        margin-top: 0;
                        background: #333232;
                        box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
                        border-radius: 30px;
                        padding: 58px;

                        .about-me {
                            .about-title {
                                font-weight: bold;
                                font-size: 26px;
                                line-height: 36px;
                                color: #FFFFFF;
                            }

                            .about-text {
                                margin-top: 30px;
                                font-size: 18px;
                                color: #FFFFFF;
                            }
                        }

                        .contact {
                            margin-top: 68px;

                            .contact-title {
                                line-height: 33px;
                                font-size: 24px;
                                color: #FFFFFF;
                                font-weight: 500;
                                margin-bottom: 33px;
                            }

                            .email {
                                line-height: 33px;
                                font-size: 20px;
                                color: #FFFFFF;
                                font-weight: 500;
                            }
                        }
                    }
                }


            }


        }

        .hideMeOnTablet {
            display: none !important;
        }
    }


    @media only screen and (max-width: 765px) {
        /* CSS that should be displayed if width is equal to or less than 1024px and larger
         than 425px goes here */
        .theme-container {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            width: 100%;
            background-image: url("/images/resume_themes/theme8/background.svg");
            font-family: 'Thabit', monospace !important;
            max-width: 1920px;

            .main-info-bar {
                display: flex;
                justify-content: space-between;

                border-top-left-radius: 25px;
                border-top-right-radius: 25px;
                width: 100%;
                padding: 78px;


                .left {
                    display: flex;

                    .profile-picture {
                        img {
                            width: 200px;
                            height: 200px;
                            border-radius: 50%;
                        }
                    }

                    .main-info {
                        margin-left: 33px;
                        margin-top: 5px;

                        .user-name {
                            font-size: 40px;
                            line-height: 53px;
                            color: #005BD1 !important;
                            font-weight: bold;
                            opacity: 1;
                            padding-bottom: 13px;
                        }

                        .job-title {
                            font-weight: 500;
                            font-size: 21px;
                            line-height: 27px;
                            color: #FFFFFF;
                        }

                        .social{
                            display: flex;
                            margin-top: 54px;
                            .message-btn{
                                margin-right: 56px;

                                a{
                                    background: #005BD1;
                                    box-shadow: 0px 0px 16px rgba(0, 91, 209, 0.5);
                                    border-radius: 30px;
                                    width: 139px;
                                    height:41px;
                                    font-weight: bold;
                                    font-size: 18px;
                                    line-height: 24px;
                                    color: #FFFFFF;
                                    display: flex;
                                    justify-content: center;
                                    align-items: center;

                                    img{
                                        width:22px;
                                        height: 17px;
                                        margin-right: 10px;
                                    }
                                }
                            }

                            .icons{
                                display: flex;
                                align-items: center;
                                img{
                                    width:42px;
                                    height:26px;
                                    margin-right:30px ;
                                }
                                img:last-child{
                                    margin-right:0 ;
                                }
                            }

                        }
                    }

                }

                .right {
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;

                    .interviews{
                        display: flex;
                        justify-content: flex-end;
                        align-items: center;
                        margin-right: 42px;
                        .text{
                            font-style: normal;
                            font-weight: 500;
                            font-size: 21px;
                            line-height: 27px;
                            color: #FFFFFF;
                            margin-right: 16px;
                        }

                        .video-btn{
                            margin-right:9px;
                            a{
                                background: #005BD1;
                                box-shadow: 0px 0px 16px rgba(0, 91, 209, 0.5);
                                border-radius: 30px;
                                width:139px;
                                height:41px;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                font-weight: bold;
                                font-size: 18px;
                                line-height: 24px;

                                color: #FFFFFF;
                                img{
                                    width:22px;
                                    height:17px;
                                    margin-right:11px;
                                }
                            }
                        }

                        .audio-btn{

                            a{
                                background: #005BD1;
                                box-shadow: 0px 0px 16px rgba(0, 91, 209, 0.5);
                                border-radius: 30px;
                                width:139px;
                                height:41px;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                font-weight: bold;
                                font-size: 18px;
                                line-height: 24px;


                                color: #FFFFFF;
                                img{
                                    width:18px;
                                    height:16px;
                                    margin-right:12px;
                                }
                            }

                        }
                    }

                    .prof-info {
                        display: flex;
                        align-items: center;
                        justify-content: space-evenly;
                        width: 725px;
                        height: 135px;
                        background: #333232;
                        box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
                        border-radius: 30px;

                        .prof-left{
                            display: flex;

                            .hours {
                                display: flex;
                                flex-direction: column;
                                margin-right: 36px;
                                align-items: center;
                                .text{
                                    font-weight: 500;
                                    font-size: 20px;
                                    line-height: 26px;
                                    color: #FFFFFF;
                                    margin-bottom: 10px;
                                }
                                .number{
                                    font-weight: bold;
                                    font-size: 26px;
                                    line-height: 34px;
                                    color: #005BD1;
                                }
                            }

                            .horizontal-divider {
                                height: 41px;
                                width: 1px;
                                background:  rgba(255, 255, 255, 0.38);;
                            }

                            .rate {
                                display: flex;
                                flex-direction: column;
                                margin-left: 36px;
                                align-items: center;

                                .text{
                                    font-weight: 500;
                                    font-size: 20px;
                                    line-height: 26px;
                                    color: #FFFFFF;
                                    margin-bottom: 10px;
                                }
                                .number{
                                    font-weight: bold;
                                    font-size: 26px;
                                    line-height: 34px;
                                    color: #005BD1;
                                }
                            }
                        }

                        .prof-right{
                            .hire-me-btn {
                                a {
                                    background: #005BD1;
                                    box-shadow: 0px 0px 16px rgba(0, 91, 209, 0.5);
                                    border-radius: 50px;

                                    font-weight: bold;
                                    font-size: 24px;
                                    line-height: 32px;
                                    color: #FFFFFF;

                                    display: flex;
                                    justify-content: center;
                                    align-items: center;
                                    width: 214px;
                                    height: 63px;
                                }
                            }
                        }
                    }


                }
            }

            .tabs-bar {
                background: #333232;
                box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
                width:100%;
                height:119px;
                display: flex;
                align-items: center;
                justify-content: space-around;

                .tab-text {
                    font-style: italic;
                    font-weight: bold;
                    font-size: 36px;
                    line-height: 48px;
                    color: rgba(0, 91, 209, 0.3);
                    position: relative;
                }

                .tab-text:hover {
                    cursor: pointer;
                    color: #005BD1;
                }

                .tab-text.active:before {
                    content: "";
                    position: absolute;
                    left: -8%;
                    bottom: -75%;
                    height: 4px;
                    width: 116%;
                    border: 1px solid #005BD1;
                    -webkit-box-shadow: 0px 0px 16px #005BD1;
                    box-shadow: 0px 0px 16px #005BD1;
                    background: #005BD1;;
                    border-radius: 2px;
                }

                .tabs-bar {
                    div:last-child {
                        margin-right: 0;
                    }
                }

                .tab-text.active {
                    color: #005BD1;
                    text-shadow: 0px 0px 16px rgba(142, 192, 255, 0.3);
                }
            }

            .tabs-wrapper {
                border-bottom-left-radius: 25px;
                border-bottom-right-radius: 25px;

                width: 100%;
                display: flex;
                flex-direction: column;
                align-items: center;
                padding: 0 150px 67px 150px;



                .tab-content-wrapper {
                    margin-top: 115px;

                    .portfolio.active, .skills.active, .about.active, .work-experience.active, .education.active {
                        opacity: 1;
                    }

                    .portfolio, .about, .work-experience, .education {
                        opacity: 0;
                        transition: all 0.6s ease;
                    }

                    .portfolio {
                        width: 100%;

                        .images {
                            display: flex;
                            flex-wrap: wrap;
                            justify-content: space-between;

                            img {
                                width: 488px;
                                height: 381px;
                                border-radius: 10px;
                                margin-bottom: 27px;
                            }

                        }

                        .loading {
                            display: flex;
                            flex-direction: column;
                            align-items: center;
                            margin-top: 50px;
                            color: #3C3748CF;
                            font-size: 16px;

                            img {
                                width: 40px;
                                height: 40px;
                                margin-bottom: 8px;
                            }
                        }

                    }

                    .work-experience {
                        display: flex;
                        flex-wrap: wrap;
                        justify-content: space-between;
                        width: 100%;

                        .work-item {
                            margin-bottom: 29px;
                            width: 790px;
                            background: #333232;
                            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
                            border-radius: 30px;
                            padding: 38px 75px;

                            .company {
                                font-style: normal;
                                font-weight: bold;
                                font-size: 36px;
                                line-height: 48px;
                                color: #FFFFFF;
                                margin-bottom: 14px;
                            }

                            .title {
                                font-weight: bold;
                                font-size: 32px;
                                line-height: 42px;
                                color: #FFFFFF;
                                margin-bottom: 18px;
                            }

                            .duration {
                                font-weight: bold;
                                font-size: 22px;
                                line-height: 29px;
                                color: #1F5DE4;
                                margin-bottom: 30px;
                            }

                            .work-info {
                                font-weight: 500;
                                font-size: 20px;
                                line-height: 26px;
                                color: #FFFFFF;
                            }
                        }
                    }

                    .education {
                        display: flex;
                        flex-wrap: wrap;
                        justify-content: space-between;
                        width: 100%;

                        .education-item {
                            margin-bottom: 29px;
                            width: 790px;
                            background: #333232;
                            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
                            border-radius: 30px;
                            padding: 38px 75px;

                            .education-type {
                                font-style: normal;
                                font-weight: bold;
                                font-size: 18px;
                                line-height: 24px;
                                color: #1F5DE4;
                                margin-bottom: 31px;
                            }

                            .education-name {
                                font-weight: bold;
                                font-size: 32px;
                                line-height: 42px;
                                color: #FFFFFF;
                                margin-bottom: 12px;
                            }

                            .education-date {
                                font-weight: bold;
                                font-size: 22px;
                                line-height: 29px;
                                color: #1F5DE4;
                                margin-bottom: 45px;
                            }

                            .education-info {
                                font-weight: 500;
                                font-size: 20px;
                                line-height: 26px;
                                color: #FFFFFF;
                            }
                        }
                    }

                    .skills-tab {
                        display: flex;
                        justify-content: space-between;
                        flex-wrap: wrap;

                        .skill-item {
                            width: 790px;
                            height: 287px;
                            padding-left:58px;
                            padding-right:58px;
                            padding-bottom: 58px;
                            margin-bottom: 25px;
                            background: #333232;
                            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
                            border-radius: 30px;
                        }

                        .percentage{
                            font-weight: bold;
                            font-size: 42px !important;
                            line-height: 56px;
                            color: #FFFFFF !important;
                        }
                    }

                    .about {
                        width: 100%;
                        margin-top: 0;
                        background: #333232;
                        box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
                        border-radius: 30px;
                        padding: 58px;

                        .about-me {
                            .about-title {
                                font-weight: bold;
                                font-size: 26px;
                                line-height: 36px;
                                color: #FFFFFF;
                            }

                            .about-text {
                                margin-top: 30px;
                                font-size: 18px;
                                color: #FFFFFF;
                            }
                        }

                        .contact {
                            margin-top: 68px;

                            .contact-title {
                                line-height: 33px;
                                font-size: 24px;
                                color: #FFFFFF;
                                font-weight: 500;
                                margin-bottom: 33px;
                            }

                            .email {
                                line-height: 33px;
                                font-size: 20px;
                                color: #FFFFFF;
                                font-weight: 500;
                            }
                        }
                    }
                }


            }


        }

        .hideMeOnPhone {
            display: none !important;
        }

    }

    //slick css


    // end of slick

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
        font-weight: bold;
        font-size: 32px;
        line-height: 42px;
        color: #FFFFFF;
        margin-bottom: 25px;

        @media only screen and (max-width: 1600px) and (min-width: 760px) {
            color: #FFFFFF;
            font-size: 32px;
            line-height: 42px;
            font-weight: bold;
            margin-bottom: 25px;
        }
        @media only screen and (max-width: 765px) {
            line-height: 20px;
            font-size: 14px;
        }
    }


    .skills .skill .skill-bar {
        width: 100%;
        height: 20px;
        border-radius: 23px;
        background: #C4C1D7;
        transition: 1s cubic-bezier(1, 0, .5, 1);
        -webkit-transition: 1s cubic-bezier(1, 0, .5, 1);
        -ms-transition: 1s cubic-bezier(1, 0, .5, 1);

        @media only screen and (max-width: 1600px) and (min-width: 760px) {
            height: 16px;
        }
        @media only screen and (max-width: 765px) {
            height: 10px;
        }
    }

    .skills .skill .skill-bar.orange {
        background: #FFD7B2;
    }

    .skills .skill .skill-bar span.orange {
        background: #FF7C00;
    }

    .skills .skill .skill-bar.red {
        background: #FFC1EC;
    }

    .skills .skill .skill-bar span.red {
        background: #FF26BE;
    }

    .skills.active .skill .skill-bar {
        width: 100%;
    }

    .skills .skill .skill-bar span {
        float: left;
        width: 0;
        background: #3C327B;
        height: 20px;
        border-radius: 23px;
        position: relative;
        transition: 1s cubic-bezier(1, 0, .5, 1);
        -webkit-transition: 1s cubic-bezier(1, 0, .5, 1);
        -ms-transition: 1s cubic-bezier(1, 0, .5, 1);

        @media only screen and (max-width: 1600px) and (min-width: 760px) {
            height: 16px;
        }
        @media only screen and (max-width: 765px) {
            height: 10px;
        }
    }

    .skills .skill .skill-bar span b {
        float: left;
        width: 100%;
        position: relative;
        text-align: right;
        opacity: 1;
        font-size: 14px;
        color: #3C327B;
        font-weight: 400;
        top: -13px;
    }
</style>
