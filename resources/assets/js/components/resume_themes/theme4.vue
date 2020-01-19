<template>
    <div class="themeWrapper">
        <div class="mainThemeBar">
            <div class="left">
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
                        <img src="/images/resume_themes/theme4/Behance-icon.png" alt="">
                        <img src="/images/resume_themes/theme4/Dribbble-icon.png" alt="">
                        <img src="/images/resume_themes/theme4/Instagram-icon.png" alt="">
                    </div>
                </div>
            </div>

            <div class="right">
                <div class="interviews">
                    <div class="interview-text hideMeOnTablet" style="margin-right:20px;">
                        Your interviews:
                    </div>
                    <div class="upload-btn-box" style="margin-right:10px;">
                        <img src="/images/resume_themes/theme4/Icon-1.svg" alt="">
                        <div> AUDIO</div>
                    </div>
                    <div class="upload-btn-box">
                        <img src="/images/resume_themes/theme4/Icon.svg" alt="">
                        <div> VIDEO</div>
                    </div>
                </div>
                <div class="prof-info">
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
                            35hr
                        </div>
                        <div class="hourly-rate-text light text-center">
                            Weekly Availability
                        </div>
                    </div>
                    <div class="hire-me-btn NoDecor">
                        <a href="javascript:void(0)">
                            HIRE ME
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="tabs-bar" >
            <div class="tab-text" :class="{borderRight : activeTab === 'portfolio'}">
                <span style="opacity:0">text</span>
            </div>
            <div class="tab-text" @click="setActiveTab('portfolio')" style="margin-left: -1px;"
                 :class="{active : activeTab === 'portfolio',borderRight : activeTab === 'work'}">
                Portfolio
            </div>
            <div class="tab-text" @click="setActiveTab('work')" style="margin-right: -1px; margin-left: -1px;" :class="{active : activeTab === 'work', borderLeft : activeTab === 'portfolio',borderRight : activeTab === 'education'}">
                Work
            </div>
            <div class="tab-text" @click="setActiveTab('education')" style="margin-right: -1px;"
                 :class="{active : activeTab === 'education',borderLeft : activeTab === 'work'}">
                Education
            </div>
            <div class="tab-text"  :class="{borderLeft : activeTab === 'education'}" >
                <span style="opacity:0">text</span>
            </div>
        </div>
        <div class="main-tab-content">
            <div class="skills">
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

            <div class="portfolio">
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

    .themeWrapper {

        width: 100%;
        max-width: 1920px;
        background: white;
        border-radius: 15px;

        .mainThemeBar {
            padding-top: 40px;
            padding-left: 70px;
            padding-right: 70px;
            flex-wrap: wrap;
            display: flex;
            justify-content: space-between;
            align-items: center;

            .left {
                display: flex;

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

                    .user-name {
                        margin-left: -2px;
                        font-size: 36px;
                        font-weight: bold;
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
                        margin-top: 30px;
                        img{
                            width: 50px;
                            height: 50px;
                            margin-right:20px;
                            border-radius: 50%;
                        }
                        img:last-child{
                            margin-right: 0;
                        }
                    }
                }
            }

            .right {

                .interviews{
                    .interview-text{
                        font-weight: 600;
                        font-size: 24px;
                        line-height: 26px;
                        color: #222B4C;
                    }

                    .upload-btn-box{
                        display:flex;
                        justify-content: center;
                        align-items: center;
                        background: #E7F6FF;
                        border-radius: 6px;
                        width:170px;
                        height:60px;

                        font-weight: 600;
                        font-size: 14px;
                        line-height: 15px;
                        text-align: center;
                        color: #00A3FF;

                        img{
                            width:20px;
                            height:16px;
                            margin-right:10px;
                        }
                    }
                }

                .prof-info{
                    .hourly-rate {
                        margin-right: 30px;
                        align-items: baseline;
                    }

                    .weekly-availability {
                        margin-right: 30px;
                        align-items: baseline;
                    }

                    .hourly-rate-text {
                        font-weight: 500;
                        font-size: 42px;
                        line-height: 46px;
                        color: #222B4C;
                        margin-right: 10px;
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
                            text-align: center;
                            color: #FFFFFF;
                            background: #00A3FF;
                            border-radius: 6px;
                            height: 60px;
                            width: 170px;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                        }
                    }
                }




            }
        }



        .tabs-bar {
            display: flex;
            margin-top: 30px;
            width:100%;
            background: white;
            height:80px;
            align-items:center;
            justify-content:center;
            overflow:hidden;
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
                background:#00A3FF;
            }

            .tab-text:not(:last-child) {

            }

            .tab-text.active {
                color: #00A3FF;
                background-color:white;
            }

            .tab-text.borderLeft{
                border-radius: 100px 0px 0px 100px;
            }

            .tab-text.borderRight{
                border-radius: 0px 100px 100px 0px;
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

            .skills{

                .skills-tabs {
                    display: flex;
                    justify-content: center;
                    overflow-x: auto;
                    width: 100%;
                    .skills-tab-text {
                        font-weight: 600;
                        font-size: 20px;
                        line-height: 22px;
                        color: #9CA4C1;
                        padding-bottom:20px;
                        padding-left:20px;
                        padding-right:20px;
                        white-space: nowrap;
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
                    }

                    img:last-child {
                        margin-right: 0;
                    }

                }

            }

            .portfolio{
                .portfolioSlides {
                    padding-left: 0px;
                    padding-right: 0px;
                    margin-top:100px;
                    display: flex;
                    justify-content: center;

                    img {
                        padding:30px;
                        width: 723px !important;
                        height:700px;
                    }

                    .slide-text {
                        margin-top: 15px;
                        font-style: normal;
                        font-weight: normal;
                        font-size: 20px;
                        line-height: 23px;
                        color: #333333;
                    }
                }
            }


            .work {

            }

            .education {


            }
        }
    }

    @media only screen and (max-width: 1280px) and (min-width: 760px) {
        /* CSS that should be displayed if width is equal to or less than 1280 px and larger
         than 425px goes here */

        .hideMeOnTablet{
            display:none !important;
        }

        .themeWrapper {

            width:98%;

            .mainThemeBar {
                padding:20px;
                .left {
                    .avatar {
                        margin-right: 30px;
                        img {
                            width: 150px;
                            height: 150px;
                        }
                    }

                    .info {

                        .user-name {
                            font-size: 28px;
                        }

                        .job-title {
                            font-size: 16px;
                        }

                        .social-icons{
                            margin-top:20px;
                            img{
                                width:34px;
                                height:34px;
                            }
                            img:last-child{

                            }
                        }
                    }
                }

                .right {
                    align-items: center;
                    display: flex;
                    flex-direction: column;
                    .interviews{
                        display: flex;
                        justify-content: flex-end;
                        width: 100%;
                        margin-top: 30px;
                        .interview-text{

                        }

                        .upload-btn-box{
                            width: 150px;
                            height: 40px;
                            img{
                                width:14px;
                                height:11px;
                            }
                        }
                    }
                    .prof-info{
                        display: flex;
                        align-items: center;
                        justify-content: space-between;
                        width: 100%;
                        margin-top: 30px;
                        .hourly-rate {
                            display: flex;
                            flex-direction: column;
                            align-items: center;
                        }

                        .weekly-availability {
                            display: flex;
                            flex-direction: column;
                            align-items: center;
                        }

                        .hourly-rate-text {
                            font-size: 24px;
                            line-height: 30px;
                        }

                        .hourly-rate-text.light {
                            font-size: 12px;
                        }

                        .hire-me-btn {
                            a {
                                width: 120px;
                                height: 40px;
                                font-size: 12px;
                            }
                        }

                    }



                }
            }

            .tabs-bar {
                margin-top: 21px;
                .tab-text {
                    font-size: 24px;
                }

                .tab-text:not(:last-child) {

                }

                .tab-text.active {

                }

                .tab-text:hover {
                }

                .arrow {
                    img {

                    }
                }
            }

            .main-tab-content {
                margin-top: 40px;

                .skills{

                    .skills-tabs {

                        .skills-tab-text {
                            font-size: 16px;
                        }

                        .skills-tab-text:hover {

                        }

                        .skills-tab-text.active {
                            font-size: 16px;
                        }

                    }
                    .skills-icons-bar {
                        margin-top: 30px;
                        img {
                            width: 50px;
                            height: 50px;
                        }

                        img:last-child {

                        }

                    }

                }

                .portfolio{
                    display: none;
                    .portfolioSlides {

                        img {

                        }

                        .slide-text {

                        }
                    }
                }



                .work {

                }

                .education {


                }
            }
        }

    }

    @media only screen and (max-width: 765px){
        /* CSS that should be displayed if width is equal to or less than 765px */

        .themeWrapper {

            .mainThemeBar {
                .left {
                    .avatar {


                        img {

                        }

                    }

                    .info {

                        .user-name {


                        }

                        .job-title {


                        }

                        .social-icons{


                            img{

                            }
                            img:last-child{

                            }
                        }
                    }
                }

                .right {
                    .interviews{
                        .interview-text{

                        }

                        .upload-btn-box{


                            img{

                            }
                        }
                    }
                    .prof-info{
                        .hourly-rate {

                        }

                        .weekly-availability {

                        }

                        .hourly-rate-text {

                        }

                        .hourly-rate-text.light {

                        }

                        .hire-me-btn {
                            a {

                            }
                        }
                    }

                }
            }

            .tabs-bar {

                .tab-text {

                }

                .tab-text:not(:last-child) {

                }

                .tab-text.active {

                }

                .tab-text:hover {
                }

                .arrow {
                    img {

                    }
                }
            }

            .main-tab-content {

                .skills{

                    .skills-tabs {

                        .skills-tab-text {

                        }

                        .skills-tab-text:hover {

                        }

                        .skills-tab-text.active {

                        }

                    }
                    .skills-icons-bar {

                        img {

                        }

                        img:last-child {

                        }

                    }

                }

                .portfolio{
                    .portfolioSlides {

                        img {

                        }

                        .slide-text {

                        }
                    }
                }



                .work {

                }

                .education {


                }
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
