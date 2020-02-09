<template>
    <div>
        <div class="section-title">
            <div class="title-light">Add</div>
            <h2>Hobbies</h2>
        </div>
        <div class="section-body-wrapper">
            <div class="add-award-section">
                <div class="award-input short">
                    <label for="category">Category</label>
                    <input type="text" id="category">
                </div>
                <div class="award-input">
                    <label for="awardTitle">New Hobby</label>
                    <input type="text" id="awardTitle">
                </div>
                <div class="add-award-btn NoDecor">
                    <a href="">
                        <img src="/images/resume_builder/work-ex/mark.png" alt="mark">
                        Add hobby now
                    </a>
                </div>
                <div class="auto-import-btn NoDecor">
                    <a href="">
                        <img src="/images/resume_builder/work-ex/add-box.png" alt="add">
                        Auto import
                    </a>
                </div>
            </div>

            <div class="work-ex-list">
                <div class="work-ex-item">
                    <div class="d-flex">
                        <div class="work-icon">
                            <img src="/images/resume_builder/hobbies/soccer.png" alt="hobby icon">
                        </div>
                        <div class="work-ex-info">
                            <div class="work-ex-title">
                                Football
                            </div>
                        </div>
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

        .add-award-section {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-top: 71px;

            .award-input {
                input,select {
                    width: 530px;
                    height: 76px;
                    border: 2px solid #505050;
                    border-radius: 10px;
                    opacity: 1;
                    padding-left: 18px;
                    margin-right:30px;
                }
                input:focus,select:focus {
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
            .award-input.short{
                select,input {
                    width: 269px;
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

        .work-ex-list{
            margin-top: 90px;
            .work-ex-item{
                display: flex;
                justify-content: flex-start;
                width: 757px;

                .work-icon{
                    width: 38px;
                    height: 27px;
                    margin-right: 33px;
                }

                .work-ex-info{
                    margin-right: 30px;
                    .work-ex-title{
                        font: 700 30px/41px Noto Sans;
                        letter-spacing: 0;
                        color: #001CE2;
                        margin-bottom: 12px;
                        opacity: 1;
                    }
                    .work-ex-sub-title{
                        font: 700 19px Noto Sans;
                        letter-spacing: 0;
                        color: #001CE2;
                        opacity: 1;
                        margin-bottom: 16px;
                    }
                    .work-ex-detials{
                        font: 500 16px Noto Sans;
                        letter-spacing: 0;
                        color: #001CE2;
                        opacity: 1;
                    }
                }

                .options-btn{
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
</style>
