<template>
    <div>
        <div class="section-title">
            <div class="title-light">Add</div>
            <h2>Achievement</h2>
        </div>
        <div class="section-body-wrapper">
            <div class="achievements-bar">
                <div class="bar-item" :class="{ active : selectedTab === 'Awards'}" @click="selectedTab = 'Awards'">
                    Awards
                </div>
                <div class="bar-item" :class="{ active : selectedTab === 'Certificates'}" @click="selectedTab = 'Certificates'">
                    Certificates
                </div>
                <div class="bar-item" :class="{ active : selectedTab === 'Public'}" @click="selectedTab = 'Public'">
                    Public Speaking
                </div>
                <div class="bar-item" :class="{ active : selectedTab === 'Events'}" @click="selectedTab = 'Events'">
                    Events
                </div>
            </div>
            <div class="add-award-section" v-show="selectedTab === 'Awards'">
                <div class="award-input">
                    <label for="awardTitle">New Awards</label>
                    <input type="text" id="awardTitle">
                </div>
                <div class="add-award-btn NoDecor">
                    <a href="">
                        <img src="/images/resume_builder/work-ex/mark.png" alt="mark">
                        Add awards now
                    </a>
                </div>
                <div class="auto-import-btn NoDecor">
                    <a href="">
                        <img src="/images/resume_builder/work-ex/add-box.png" alt="add">
                        Auto import
                    </a>
                </div>
            </div>
            <div class="certificates-section" v-show="selectedTab === 'Certificates'">
                <div class="add-certificate">
                    <div class="upload-image">
                        <div class="img-label">
                            Add Certificates
                        </div>
                        <div class="upload-image-box">
                            <img src="/images/resume_builder/achievements/download.png" alt="download">
                            <div class="upload-text">
                                Upload image
                            </div>
                        </div>
                    </div>
                    <div class="certification-details-form">
                        <div class="certification-input">
                            <label for="title">Title</label>
                            <input type="text" id="title">
                        </div>
                        <div class="certification-input">
                            <label for="description">Description</label>
                            <textarea name="description" id="description"></textarea>
                        </div>
                        <div class="action-btns">
                            <div class="add-award-btn NoDecor">
                                <a href="javascript:void(0)">
                                    <img src="/images/resume_builder/work-ex/mark.png" alt="mark">
                                    Add certificate now
                                </a>
                            </div>
                            <div class="auto-import-btn NoDecor">
                                <a href="javascript:void(0)">
                                    <img src="/images/resume_builder/work-ex/add-box.png" alt="add">
                                    Auto import
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="certifications-list">
                    <div class="certification-item">
                        <div class="certification-preview">
                            <img src="/images/resume_builder/achievements/Image 2.png" alt="certification-preview">
                        </div>
                        <div class="certification-details">
                            <div class="title">
                                Certificate of achievement
                            </div>
                            <div class="description">
                                Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                                sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
                                sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
                            </div>
                            <div class="options-btn NoDecor">
                                <a href="javascript:void(0)">
                                    Options
                                    <img src="/images/resume_builder/work-ex/Icon ionic-md-arrow-dropdown.png" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="certificates-section" v-show="selectedTab === 'Public'">
                <div class="add-certificate">
                    <div class="upload-image">
                        <div class="img-label">
                            Upload video or images
                        </div>
                        <div class="upload-image-box">
                            <img src="/images/resume_builder/achievements/download.png" alt="download">
                            <div class="upload-text">
                                Upload
                            </div>
                        </div>
                    </div>
                    <div class="certification-details-form">
                        <div class="certification-input">
                            <label for="publicTitle">Title</label>
                            <input type="text" id="publicTitle">
                        </div>
                        <div class="certification-input">
                            <label for="publicDescription">Description</label>
                            <textarea name="description" id="publicDescription"></textarea>
                        </div>
                        <div class="action-btns">
                            <div class="add-award-btn NoDecor">
                                <a href="javascript:void(0)" class="short">
                                    <img src="/images/resume_builder/work-ex/mark.png" alt="mark">
                                    Add now
                                </a>
                            </div>
                            <div class="auto-import-btn NoDecor">
                                <a href="javascript:void(0)">
                                    <img src="/images/resume_builder/work-ex/add-box.png" alt="add">
                                    Auto import
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="certificates-section" v-show="selectedTab === 'Events'">
                <div class="add-certificate">
                    <div class="upload-image">
                        <div class="img-label">
                            Upload video or images
                        </div>
                        <div class="upload-image-box">
                            <img src="/images/resume_builder/achievements/download.png" alt="download">
                            <div class="upload-text">
                                Upload
                            </div>
                        </div>
                    </div>
                    <div class="certification-details-form">
                        <div class="certification-input">
                            <label for="eventsTitle">Title</label>
                            <input type="text" id="eventsTitle">
                        </div>
                        <div class="certification-input">
                            <label for="eventDescription">Description</label>
                            <textarea name="description" id="eventDescription"></textarea>
                        </div>
                        <div class="action-btns">
                            <div class="add-award-btn NoDecor">
                                <a href="javascript:void(0)" class="short">
                                    <img src="/images/resume_builder/work-ex/mark.png" alt="mark">
                                    Add now
                                </a>
                            </div>
                            <div class="auto-import-btn NoDecor">
                                <a href="javascript:void(0)">
                                    <img src="/images/resume_builder/work-ex/add-box.png" alt="add">
                                    Auto import
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
    export default {
        name: "Achievement",
        data() {
            return {
                selectedTab: 'Public'
            }
        }
    }
</script>

<style scoped lang="scss">
    .section-body-wrapper {
        width: 1337px;

        .achievements-bar {
            display: flex;
            width: 100%;
            justify-content: space-between;
            margin-top: 75px;
            border-bottom: 3px solid #C9CFF8;
            padding-right: 50px;

            .bar-item {
                font: 700 35px Noto Sans;
                letter-spacing: 0;
                color: #505050;
                opacity: 1;
                padding-bottom: 23px;
                margin-bottom: -3px;
                border-bottom: 3px solid #C9CFF8;
                transition: all 300ms ease-in;
            }

            .bar-item:hover {
                cursor: pointer;
            }

            .bar-item.active {
                color: #001CE2;
                border-bottom-color: #001CE2;
            }
        }

        .add-award-section {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-top: 71px;

            .award-input {
                input {
                    width: 807px;
                    height: 76px;
                    border: 2px solid #505050;
                    border-radius: 10px;
                    opacity: 1;
                    padding-left: 18px;
                }
                input:focus {
                    outline: none;
                }

                label {
                    text-align: left;
                    font: 600 22px Noto Sans;
                    letter-spacing: 0;
                    color: #505050;
                    opacity: 1;
                }
            }



            .add-award-btn {
                margin-right: 31px;
                margin-bottom: 7px;
                a {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 247px;
                    height: 62px;

                    background: #001CE2 0% 0% no-repeat padding-box;
                    border-radius: 8px;

                    font: 600 19px Noto Sans;
                    letter-spacing: 0;
                    color: #FFFFFF;
                    opacity: 1;

                    img {
                        width: 27px;
                        height: 27px;
                        margin-right: 10px;
                    }
                }
            }

            .auto-import-btn {
                margin-bottom: 7px;
                a {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 226px;
                    height: 62px;

                    border: 2px solid #001CE2;
                    border-radius: 8px;
                    opacity: 1;

                    font: 600 19px Noto Sans;
                    letter-spacing: 0;
                    color: #001CE2;

                    img {
                        width: 27px;
                        height: 27px;
                        margin-right: 10px;
                    }
                }
            }

        }

        .certificates-section{
            margin-top: 72.5px;

            .add-certificate{
                display: flex;
                justify-content: flex-start;

                .upload-image{
                    display: flex;
                    flex-direction: column;
                    margin-right: 45px;
                    .img-label{
                        font-family: "Noto Sans", serif;
                        font-weight: 600;
                        font-size: 22px;
                        text-align: left;
                        color: #505050;
                        margin-bottom: 12px;
                    }
                    .upload-image-box{
                        width:412px;
                        height:518px;
                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                        align-items: center;
                        border: 2px solid #505050;
                        border-radius: 10px;
                        img{
                            width:95px;
                            height:89px;
                        }
                        .upload-text{
                            font-family: "Noto Sans", serif;
                            font-weight: bold;
                            font-size: 30px;
                            letter-spacing: 0.02em;
                            line-height: 67px;
                            text-align: left;
                            color: #747474;
                        }
                    }
                }

                .certification-details-form{
                    margin-top: 37px;
                    .certification-input{
                        display: flex;
                        flex-direction: column;
                        margin-bottom: 33px;
                        input,textarea {
                            width: 807px;
                            height: 76px;
                            border: 2px solid #505050;
                            border-radius: 10px;
                            opacity: 1;
                            padding-left: 18px;
                        }
                        textarea{
                            padding-top: 18px;
                            height: 190px;
                        }
                        input:focus,textarea:focus {
                            outline: none;
                        }

                        label {
                            text-align: left;
                            font: 600 22px Noto Sans;
                            letter-spacing: 0;
                            color: #505050;
                            opacity: 1;
                        }
                    }

                    .action-btns{
                        display: flex;
                        .add-award-btn{
                            margin-right: 20px;
                            a {
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                width: 256px;
                                height: 62px;

                                background: #001CE2 0% 0% no-repeat padding-box;
                                border-radius: 8px;

                                font: 600 19px Noto Sans;
                                letter-spacing: 0;
                                color: #FFFFFF;
                                opacity: 1;

                                img {
                                    width: 27px;
                                    height: 27px;
                                    margin-right: 10px;
                                }
                            }

                            a.short{
                                width:163px;
                            }
                        }

                        .auto-import-btn{
                            a {
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                width: 226px;
                                height: 62px;

                                border: 2px solid #001CE2;
                                border-radius: 8px;
                                opacity: 1;

                                font: 600 19px Noto Sans;
                                letter-spacing: 0;
                                color: #001CE2;

                                img {
                                    width: 27px;
                                    height: 27px;
                                    margin-right: 10px;
                                }
                            }
                        }
                    }
                }
            }

            .certifications-list{
                margin-top: 85px;
                .certification-item{
                    display: flex;

                    .certification-preview{
                        img{
                            width: 376px;
                            height: 290px;
                            margin-right: 36px;
                        }
                    }

                    .certification-details{
                        display: flex;
                        flex-direction: column;
                        .title{
                            font-family: "Noto Sans",serif;
                            font-weight: 600;
                            font-size: 30px;
                            text-align: left;
                            color: #001ce2;
                            margin-bottom: 30px;
                        }

                        .description{
                            font-family: "Noto Sans",serif;
                            font-weight: 500;
                            font-size: 18px;
                            text-align: left;
                            color: #001ce2;
                        }
                        .options-btn{
                            margin-top:30px;
                            a{
                                width: 131px;
                                height: 44px;

                                display: flex;
                                justify-content: center;
                                align-items: center;

                                background: #FFFFFF 0% 0% no-repeat padding-box;
                                border: 1px solid #1F5DE4;
                                border-radius: 5px;
                                opacity: 1;

                                font: 600 20px/27px Noto Sans;
                                letter-spacing: 0;
                                color: #505050;

                                img{
                                    width: 20px;
                                    height: 10px;
                                    margin-left: 16px;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
</style>
