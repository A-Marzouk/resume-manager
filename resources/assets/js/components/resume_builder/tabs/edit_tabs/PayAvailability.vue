<template>
    <div>
        <div class="section-title">
            <div class="title-light">Add</div>
            <h2>Pay Availability</h2>
        </div>
        <div class="section-body-wrapper">

            <div class="rates">
                <div class="hourly-rate">
                    <div class="title">
                        Hourly rate
                    </div>
                    <div class="pay-input">
                        <label for="hourly-rate">My hourly rate is</label>
                        <input type="number" min="3" max="100000" step="1" id="hourly-rate" value="20.00">
                    </div>

                    <div class="rate-per">
                        <div>Monthly</div>
                        <div class="active">Hourly</div>
                        <div>Yearly</div>
                        <div>Weekly</div>
                    </div>
                </div>
                <div class="hourly-rate">
                    <div class="title">
                        I am available for
                    </div>
                    <div class="pay-input">
                        <label for="available">My hourly rate is</label>
                        <input type="text" id="available" value="6 hours">
                    </div>

                    <div class="rate-per">
                        <div>Monthly</div>
                        <div class="active">Hourly</div>
                        <div>Yearly</div>
                        <div>Weekly</div>
                    </div>
                </div>
            </div>

            <div class="save-btn NoDecor">
                <a href="javascript:void(0)">
                    <img src="/images/resume_builder/availablity/Icon material-save.png" alt="save icon">
                    Save all information
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PayAvailability",
        data(){
            return{
                ratePer:'hour',
                availableHoursPer:'hour',
            }
        }
    }
</script>

<style scoped lang="scss">
    .section-body-wrapper{
        width: 1337px;
        display: flex;
        flex-direction: column;
        align-items: center;

        .rates{
            display: flex;
            width:100%;
            margin-top: 85px;
            justify-content: space-between;
            .hourly-rate{
                .title{
                    font-weight: bold;
                    font-size: 40px;
                    text-align: center;
                    color: #001ce2;
                    padding-bottom:36px;
                    border-bottom: 1px solid #001ce2;
                }
                .pay-input{
                    margin-top:35px;
                    display: flex;
                    flex-direction: column;

                    input,select {
                        width: 490px;
                        height: 80px;
                        border: 1px solid #001CE2;
                        border-radius: 10px;
                        opacity: 1;
                        padding-left: 18px;
                    }
                    input:focus,select:focus {
                        outline: none;
                    }

                    label {
                        text-align: left;
                        font: 600 26px Noto Sans;
                        letter-spacing: 0;
                        color: #001CE2;
                        opacity: 1;
                        margin-bottom:10px;
                    }
                }

                .rate-per{
                    display: flex;
                    justify-content: space-between;
                    margin-top:46px;
                    div{
                        font-weight: 500;
                        font-size: 27px;
                        text-align: left;
                        color: #c9cff8;
                    }

                    div.active{
                        color:#001CE2;
                        font-weight: 700;
                    }
                }
            }

        }
        .save-btn{
            margin-top: 63px;
            a {
                display: flex;
                justify-content: center;
                align-items: center;
                width: 239px;
                height: 63px;

                background: #001CE2 0% 0% no-repeat padding-box;
                border-radius: 8px;

                font: 600 18px Noto Sans;
                letter-spacing: 0;
                color: #FFFFFF;
                opacity: 1;

                img {
                    width: 18px;
                    height: 18px;
                    margin-right: 12px;
                }
            }
        }
    }
</style>
