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
                        I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text”
                        or double click me to add your own content and make changes.
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
                        <div class="rate">
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
                <div class="tab-text mr-0" :class="{active : activeTab === 'about'}" @click="setActiveTab('about')">
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
                    <div class="work-item d-flex">
                        <div class="blue-circle">
                            <img src="/images/resume_themes/theme5/blue-circle.svg" alt="blue circle">
                        </div>
                        <div class="d-flex flex-column work-info dotted-gradient">
                            <div class="work-title">Google</div>
                            <div class="work-position">User interface designer, Oct 2018 - Nov 2019</div>
                            <div class="work-details">I'm a paragraph. Click here to add your own text and edit me. It’s
                                easy. Just click “Edit Text” or double click me to add your own content and make
                                changes.
                            </div>
                        </div>
                    </div>

                    <div class="work-item d-flex">
                        <div class="blue-circle">
                            <img src="/images/resume_themes/theme5/blue-circle-2.svg" alt="blue circle">
                        </div>
                        <div class="d-flex flex-column work-info dotted-gradient-2">
                            <div class="work-title">123Workforce</div>
                            <div class="work-position">User interface designer, Oct 2018 - Nov 2019</div>
                            <div class="work-details">I'm a paragraph. Click here to add your own text and edit me. It’s
                                easy. Just click “Edit Text” or double click me to add your own content and make changes.
                            </div>
                        </div>

                    </div>

                    <div class="work-item d-flex">
                        <div class="blue-circle">
                            <img src="/images/resume_themes/theme5/blue-circle-3.svg" alt="blue circle">
                        </div>
                       <div class="d-flex flex-column work-info">
                           <div class="work-title">Wedevs</div>
                           <div class="work-position">User interface designer, Oct 2018 - Nov 2019</div>
                           <div class="work-details">I'm a paragraph. Click here to add your own text and edit me. It’s
                               easy. Just click “Edit Text” or double click me to add your own content and make changes.
                           </div>
                       </div>
                    </div>
                </div>
                <div class="education" v-show="activeTab === 'edu'" :class="{active : activeTab === 'edu'}">
                    <div class="education-item">
                        <div class="education-type">
                            University
                        </div>
                        <div class="education-name">
                            California Institute of Technology
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

                        <div style="font-size:32px; font-weight: bold; margin-left:75px; margin-bottom: 19px;">
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

                        <div style="color:#FF26BE; font-size:32px; font-weight: bold; margin-left:75px; margin-bottom: 19px;">
                            65%
                        </div>
                    </div>
                    <div class="skill-item skills d-flex align-items-end">
                        <div class="skill">
                            <div class="skill-title">
                                Adobe Premiere pro
                            </div>
                            <!-- bar -->
                            <div class="skill-bar orange"  :data-bar="70">
                                <span class="orange"></span>
                            </div>
                        </div>

                        <div style="color:#FF7C00; font-size:32px; font-weight: bold; margin-left:75px; margin-bottom: 19px;">
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

                        <div style="font-size:32px; font-weight: bold; margin-left:75px; margin-bottom: 19px;">
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

                        <div style="font-size:32px; font-weight: bold; margin-left:75px; margin-bottom: 19px;">
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
                            I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes to the font. Feel free to drag and drop me anywhere you like on your page. I’m a great place for you to tell a story and let your users know a little more about you. This is a great space to write long text about your company and your services. You can use this space to go into a little more detail about your company. Talk about your team and what services you provide. Tell your visitors the story of how you came up with the idea for your business and what makes you different from your competitors.
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
    export default {
        name: "theme5",

        data() {
            return {
                activeTab: 'portfolio',
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
    .theme-container {
        display: flex;
        justify-content: center;
        flex-direction: column;

        .main-info-bar {
            display: flex;
            justify-content: space-between;
            background: #FFFFFF;
            border-radius: 25px;
            width: 1840px;
            height: 285px;
            padding: 46px 102px 55px 87px;

            .left {
                display: flex;
                align-items: center;

                .profile-picture {
                    img {
                        width: 184px;
                        height: 184px;
                        border-radius: 50%;
                    }
                }

                .main-info {
                    margin-left: 35px;

                    .user-name {
                        font-size: 38px;
                        font-weight: bold;
                        opacity: 1;
                        color: #3C3748 !important;
                        line-height: 52px;
                        padding-bottom: 6px;
                    }

                    .job-title {
                        font-size: 24px;
                        color: #3C3748;
                        line-height: 33px;
                        padding-bottom: 19px;
                    }

                    .bio {
                        font-size: 19px;
                        color: #6B6B6B;
                        width: 531px;
                    }
                }

            }

            .right {
                display: flex;

                .prof-info {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    margin-right: 182px;

                    .hours {
                        padding-right: 42.5px;
                        display: flex;
                        flex-direction: column;
                        align-items: center;

                        img {
                            width: 40px;
                            height: 32px
                        }

                        .text {
                            line-height: 36px;
                            font-size: 26px;
                            color: #635E70;
                            margin-top: 16px;
                        }
                    }

                    .horizontal-divider {
                        height: 45px;
                        width: 2px;
                        background: #CBCBCB;
                    }

                    .rate {
                        padding-left: 42.5px;
                        display: flex;
                        flex-direction: column;
                        align-items: center;

                        img {
                            width: 40px;
                            height: 32px
                        }

                        .text {
                            line-height: 36px;
                            font-size: 26px;
                            color: #635E70;
                            margin-top: 16px;
                        }
                    }

                    .hire-me-btn {
                        margin-top: 36px;

                        a {
                            height: 60px;
                            width: 202px;
                            border-radius: 6px;
                            background: #FC5185;

                            display: flex;
                            justify-content: center;
                            align-items: center;

                            color: white;
                            font-size: 18px;

                            img {
                                width: 22.5px;
                                height: 18px;
                                margin-right: 7.5px;
                            }

                        }
                    }
                }

                .media {
                    display: flex;
                    flex-direction: column;

                    .follow-text {
                        font-size: 20px;
                        line-height: 27px;
                        color: #6F6B7A;
                        margin-top: 43px;
                        margin-bottom: 12.3px;
                    }

                    .icons {
                        img {
                            width: 40px;
                            height: 40px;
                            margin-right: 15px;
                        }

                        img:last-child {
                            margin-right: 0;
                        }
                    }

                    .call-btn {
                        a {
                            height: 60px;
                            width: 161px;
                            border-radius: 6px;
                            background: #5F45FF;

                            display: flex;
                            justify-content: center;
                            align-items: center;

                            color: white;
                            font-size: 18px;

                            img {
                                width: 18px;
                                height: 18px;
                                margin-right: 7.5px;
                            }

                        }
                    }

                    .video-btn {
                        margin-left: 16px;

                        a {
                            height: 60px;
                            width: 90px;
                            border-radius: 6px;
                            background: #E7E5F6;

                            display: flex;
                            justify-content: center;
                            align-items: center;

                            img {
                                width: 27px;
                                height: 18px;
                            }

                        }
                    }
                }
            }
        }

        .tabs-wrapper {
            margin-top: 20px;
            background: #FFFFFF;
            border-radius: 25px;
            width: 1840px;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 0 84px 55px 84px;

            .tabs-bar {
                margin-top: 24px;

                width: 1052px;
                height: 95px;

                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 8px;
                background: #F8F8F8;

                .tab-text {
                    line-height: 27px;
                    font-size: 20px;
                    color: #918F97;
                    margin-right: 96px;
                }

                .tab-text:hover {
                    cursor: pointer;
                }

                .tabs-bar {
                    div:last-child {
                        margin-right: 0;
                    }
                }

                .tab-text.active {
                    color: #1F5DE4;
                    font-weight: bold;
                }
            }

            .tab-content-wrapper {
                margin-top: 50px;

                .portfolio.active, .skills.active, .about.active, .work-experience.active, .education.active {
                    opacity: 1;
                }

                .portfolio, .about, .work-experience, .education {
                    opacity: 0;
                    transition: all 0.6s ease;
                }

                .portfolio {
                    .images {
                        display: flex;
                        flex-wrap: wrap;

                        img {
                            width: 536px;
                            height: 404px;
                            margin-right: 21px;
                            margin-bottom: 27px;
                        }

                        img:last-child {
                            margin-right: 0;
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
                    width: 1052px;

                    .work-item {

                        .blue-circle{
                            img{
                                width: 33px;
                                height: 33px;
                            }
                        }

                        .work-info{
                            padding-left: 88.5px;
                            padding-bottom: 50px;
                            margin-left: -17.5px;
                            .work-title {
                                font-size: 24px;
                                line-height: 33px;
                                color: #3C3748;
                                font-weight: bold;
                            }

                            .work-position {
                                font-size: 18px;
                                line-height: 24px;
                                margin-top: 7px;
                                margin-bottom: 20px;
                                color: #3C3748;
                            }

                            .work-details {
                                font-size: 19px;
                                color: #787878;
                            }
                        }

                        .work-info.dotted-gradient {
                            background-image: linear-gradient(to bottom, #1F5DE4 40%, rgba(255, 255, 255, 0) 20%);
                            background-position: left;
                            background-size: 1.5px 18px;
                            background-repeat: repeat-y;
                        }

                        .work-info.dotted-gradient-2 {
                            background-image: linear-gradient(to bottom, #548AFF 40%, rgba(255, 255, 255, 0) 20%);
                            background-position: left;
                            background-size: 1.5px 18px;
                            background-repeat: repeat-y;
                        }

                    }



                }

                .education {
                    display:flex;
                    flex-wrap:wrap;
                    justify-content: start;
                    .education-item{
                        margin-right:30px;
                        margin-bottom:29px;
                        width:806px;
                        height:258px;
                        background:#F8F8F8;
                        padding:39px 60px 39px 60px;
                        border-radius:8px;

                        .education-type{
                            width:115px;
                            height:41px;
                            background:#E7ECF7;
                            border-radius:7px;

                            font-size: 18px;
                            color:#1F5DE4;
                            display:flex;
                            justify-content: center;
                            align-items:center;

                            margin-bottom:18px;
                        }

                        .education-name{
                            line-height:43px;
                            color:#3C3748;
                            font-weight: bold;
                            font-size: 32px;
                            margin-bottom:14px;
                        }

                        .education-date{
                            line-height:30px;
                            color:#1F5DE4;
                            font-size: 22px;
                            margin-bottom:7px;
                        }

                        .education-info{
                            line-height:28px;
                            color:#707070;
                            font-size: 20px;
                        }
                    }
                }

                .skills-tab {
                    .skill-item{
                        width:806px;
                        height:176px;
                        background:#F8F8F8;
                        border-radius: 8px;
                        padding:38px 58px 0px 58px;
                        margin-bottom: 25px;
                        margin-right:30px;
                    }
                }
                .about {
                    width:1052px;
                    margin-top:0;
                    padding:38px 105px 68px 105px;
                    background:#F8F8F8;

                    .about-me{
                        .about-title{
                            line-height: 33px;
                            font-size: 24px;
                            color:#3C3748;
                            font-weight: 500;
                        }
                        .about-text{
                            margin-top:30px;
                            font-size: 18px;
                            color:#8B8B8B;
                        }
                    }

                    .contact{
                        margin-top:68px;
                        .contact-title{
                            line-height: 33px;
                            font-size: 24px;
                            color:#3C3748;
                            font-weight: 500;
                            margin-bottom:33px;
                        }
                        .email{
                            line-height: 33px;
                            font-size: 20px;
                            color:#3C3748;
                            font-weight: 500;
                        }
                    }
                }
            }


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
        color: #3C3748;
        line-height: 43px;
        font-weight: bold;
        font-size: 32px;
        margin-bottom:26px;
    }

    .skills .skill .skill-bar {
        width: 100%;
        height: 20px;
        border-radius: 23px;
        background: #C4C1D7;
        transition: 1s cubic-bezier(1, 0, .5, 1);
        -webkit-transition: 1s cubic-bezier(1, 0, .5, 1);
        -ms-transition: 1s cubic-bezier(1, 0, .5, 1);
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
