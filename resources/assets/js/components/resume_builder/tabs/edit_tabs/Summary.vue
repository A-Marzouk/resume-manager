<template>
    <div>
        <div class="section-title">
            <h2>Summary</h2>
        </div>

        <div class="section-body-wrapper">
            <div class="achievements-bar">
                <div class="bar-item" :class="{ active : selectedTab === 'About'}" @click="selectedTab = 'About'">
                    About
                </div>
                <div class="bar-item" :class="{ active : selectedTab === 'Objective'}"
                     @click="selectedTab = 'Objective'">
                    Objective
                </div>
                <div class="bar-item" :class="{ active : selectedTab === 'Overview'}" @click="selectedTab = 'Overview'">
                    Overview
                </div>
            </div>
            <div class="about-section">
                <div class="about-input">
                    <label for="about" class="d-flex justify-content-between">
                        <span class="label-text">About myself</span>
                        <span class="note-text">Maximum 80 words</span>
                    </label>
                    <textarea name="about" id="about"></textarea>
                </div>
                <div class="action-btns">
                    <div class="auto-import-btn short NoDecor">
                        <a href="">
                            <img src="/images/resume_builder/work-ex/add-box.png" alt="add">
                            Add
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
        </div>
    </div>
</template>

<script>
    export default {
        name: "Summary",
        data() {
            return {
                selectedTab: 'About'
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

        .about-section {
            margin-top: 47px;

            .about-input {
                display: flex;
                flex-direction: column;
                width: fit-content;
                textarea {
                    width: 815px;
                    height: 274px;
                    border: 1.5px solid #9F9E9E;
                    border-radius: 10px;
                    opacity: 1;
                    padding-left: 18px;
                }

                textarea:focus {
                    outline: none;
                }

                label {
                    margin-bottom:17px;
                    .label-text {
                        text-align: left;
                        font: 600 20px Noto Sans;
                        letter-spacing: 0;
                        opacity: 1;
                        font-size: 20px;
                        color: #9f9e9e;
                    }

                    .note-text {
                        font: 500 13px Noto Sans;
                        color: #1f5de4;
                        opacity: 0.7;
                    }
                }
            }
        }

        .action-btns {
            margin-top: 45px;
            display: flex;

            .auto-import-btn {
                a {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 226px;
                    height: 62px;

                    border: 1.5px solid #001CE2;
                    border-radius: 8px;
                    opacity: 1;

                    font: 600 19px Noto Sans;
                    letter-spacing: 0;
                    color: #001CE2;

                    img {
                        width: 27px;
                        height: 27px;
                        margin-right: 14px;
                    }
                }
            }

            .auto-import-btn.short {
                margin-right: 38px;

                a {
                    width: 144px;
                }
            }
        }
    }

</style>
