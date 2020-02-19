<template>
    <div>
        <div class="section-title">
            <div class="title-light">Add</div>
            <h2>Skills</h2>
        </div>
       <div class="section-body-wrapper">
           <div class="achievements-bar">
               <div class="bar-item" :class="{ active : selectedTab === 'programming_languages'}" @click="selectedTab = 'programming_languages'">
                   Programming languages
               </div>
               <div class="bar-item" :class="{ active : selectedTab === 'Frameworks'}" @click="selectedTab = 'Frameworks'">
                   Frameworks
               </div>
               <div class="bar-item" :class="{ active : selectedTab === 'Software'}" @click="selectedTab = 'Software'">
                   Software
               </div>
               <div class="bar-item" :class="{ active : selectedTab === 'Design'}" @click="selectedTab = 'Design'">
                   Design
               </div>
           </div>

           <div class="add-award-section">
               <div class="award-input">
                   <label for="title">Skill/ tools/ software name</label>
                   <input type="text" id="title">
               </div>
               <div class="award-input">
                   <label for="percentage">How much your skill on (Percentage) over this software?</label>
                   <input type="text" id="percentage">
               </div>
               <div class="action-btns">
                   <div class="add-award-btn NoDecor">
                       <a href="">
                           <img src="/images/resume_builder/work-ex/mark.png" alt="mark">
                           Add skill now
                       </a>
                   </div>
                   <div class="auto-import-btn NoDecor">
                       <a href="">
                           <img src="/images/resume_builder/work-ex/add-box.png" alt="add">
                           Auto import
                       </a>
                   </div>
               </div>
           </div>

           <div class="skills-list">
               <div class="skills-item">
                   <div class="skill-title">
                       Adobe Illustrator
                   </div>
                   <div class="percentage">
                       <div class="percentage-bar">
                           <div class="progress-wrap progress" data-progress-percent="70">
                               <div class="progress-bar progress"></div>
                           </div>
                       </div>
                       <div class="percentage-text">
                           70%
                       </div>
                   </div>
               </div>
               <div class="skills-item">
                   <div class="skill-title">
                       Adobe XD
                   </div>
                   <div class="percentage">
                       <div class="percentage-bar">
                           <div class="progress-wrap color-blueviolet progress" data-progress-percent="70">
                               <div class="progress-bar progress"></div>
                           </div>
                       </div>
                       <div class="percentage-text color-blueviolet">
                           70%
                       </div>
                   </div>
               </div>
           </div>

       </div>
    </div>
</template>

<script>
    import vTabNames from './includes/vtab_onincludes';

    export default {
        name: "Skills",
        data() {
            return {
                selectedTab:'programming_languages',
            }
        },
        methods:{
            moveProgressBar() {
                console.log("moveProgressBar");

                var getPercent = ($('.progress-wrap').data('progress-percent') / 100);
                var getProgressWrapWidth = $('.progress-wrap').width();
                var progressTotal = getPercent * getProgressWrapWidth;
                var animationLength = 2000;

                // on page load, animate percentage bar to data percentage length
                // .stop() used to prevent animation queueing
                $('.progress-bar').stop().animate({
                    left: progressTotal
                }, animationLength);
            }
        },
        mounted() {
            this.moveProgressBar();
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
            flex-direction: column;
            margin-top: 55px;

            .award-input {
                display: flex;
                flex-direction: column;
                margin-bottom:23px;

                input {
                    width: 572.82px;
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
                    font: 600 16px Noto Sans;
                    letter-spacing: 0;
                    color: #505050;
                    opacity: 1;
                }
            }



            .action-btns{
                display: flex;
                margin-top: 15px;

                .add-award-btn {
                    margin-right: 31px;
                    margin-bottom: 7px;
                    a {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        width: 181px;
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


        }

        .skills-list{
            margin-top:60px;

            .skills-item{
                margin-left: 43px;
                margin-bottom: 30px;
                display: flex;
                flex-direction: column;

                .skill-title{
                    font-family: "Noto Sans", serif;
                    font-weight: bold;
                    font-size: 22px;
                    text-align: left;
                    color: #3c3748;
                }
                .percentage{
                    width: 773px;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;

                    .percentage-bar{
                        .progress {
                            width: 404px;
                            height: 15px;
                            border-radius: 23px;
                        }
                        .progress-wrap {
                            background: #ff7c00;
                            margin: 12px 0;
                            overflow: hidden;
                            position: relative;
                            .progress-bar {
                                background: #FFD7B2;
                                left: 0;
                                position: absolute;
                                top: 0;
                                border-radius: 0;
                                border:0;
                            }
                        }

                        .progress-wrap.color-blueviolet{
                            background: blueviolet;
                            .progress-bar {
                                background: #BF99E2;
                            }
                        }
                    }

                    .percentage-text{
                        font-family: "Noto Sans", serif;
                        font-weight: bold;
                        font-size: 22px;
                        text-align: right;
                        color: #ff7c00;
                    }
                    .percentage-text.color-blueviolet{
                        color: blueviolet;
                    }
                }
            }
        }

    }
</style>
