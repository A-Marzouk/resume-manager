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
                <div class="bar-item" :class="{ active : selectedTab === 'Certificates'}"
                     @click="selectedTab = 'Certificates'">Certificates
                </div>
                <div class="bar-item" :class="{ active : selectedTab === 'Public'}" @click="selectedTab = 'Public'">
                    Public Speaking
                </div>
                <div class="bar-item" :class="{ active : selectedTab === 'Events'}" @click="selectedTab = 'Events'">
                    Events
                </div>
            </div>
            <div class="add-award-section">
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
        </div>
    </div>
</template>

<script>
    export default {
        name: "Achievement",
        data() {
            return {
                selectedTab: 'Awards'
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
    }
</style>
