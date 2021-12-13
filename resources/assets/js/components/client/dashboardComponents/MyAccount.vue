<template>
    <div class="my-account">
        
        <div class="account-info dashboard-box">
            <div class="account-info-heading dashboard-box-heading">
                <div class="left">
                    <img src="/images/client/my_account/info_40px.png" alt="info icon">
                    <span>
                        YOUR ACCOUNT INFORMATION
                    </span>
                </div>
                <div class="right no-decoration">
                    <a href="/client/account/edit" class="normal-link">
                        <!--EDIT-->
                    </a>
                </div>
            </div>
            <div class="account-info-content-wrapper">
                <div class="account-info-content">
                    <div class="acc-info-content-heading">
                        <div class="acc-info-item">
                            <img src="/images/client/my_account/name.png" alt="name icon">
                            <span>
                                {{client.name}}
                            </span>
                        </div>
                        <div class="acc-info-timezone">
                            GMT -8
                        </div>
                    </div>
                    <div class="acc-info-content-item">
                        <img src="/images/client/my_account/agency.png" alt="agency icon">
                        <div style="color: #4A5464;">
                            {{client.agency}} - agency
                        </div>
                    </div>
                    <hr style="width: 100%; margin: 21px 0;"/>
                    <div style="margin-top: 0;" class="acc-info-content-item">
                        <img src="/images/client/my_account/phone_number.png" alt="phone icon">
                        <div>
                            {{client.agency_phone}}
                        </div>
                    </div>
                    <div class="acc-info-content-item">
                        <img src="/images/client/my_account/email.png" alt="email icon">
                        <div>
                            {{client.email}}<br/>
                            {{client.emailDept}} (account dept)
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contracts dashboard-box">
            <div class="account-info-heading dashboard-box-heading">
                <div class="left">
                    <img src="/images/client/my_account/contract_40px.png" alt="info icon">
                    <span>
                        CONTRACTS
                    </span>
                </div>
            </div>
            <div class="account-info-content-wrapper">
                <div class="account-info-content p-0">
                    <div class="agreement">
                        <div class="right">
                            <img src="/images/client/my_account/privacy.png" alt="privacy icon">
                            <div>
                                Privacy agreement
                            </div>
                        </div>
                        <div class="left no-decoration">
                            <a href="/client/account/privacy-agreement">
                                <span v-if="user.agreed_with_privacy_agreement_at === null">COMPLETE AGREEMENT</span>
                                <span v-else >SHOW AGREEMENT</span>
                            </a>
                        </div>
                    </div>
                    <div class="agreement">
                        <div class="right">
                            <img src="/images/client/my_account/service.png" alt="service icon">
                            <div>
                                Service agreement
                            </div>
                        </div>
                        <div class="left no-decoration">
                            <a href="/client/account/service-agreement">
                                <span v-if="user.agreed_with_service_agreement_at === null">COMPLETE AGREEMENT</span>
                                <span v-else >SHOW AGREEMENT</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="faqs dashboard-box">
            <div class="account-info-heading dashboard-box-heading">
                <div class="left">
                    <img src="/images/client/my_account/faq_40px.png" alt="info icon">
                    <span>
                        FAQ
                    </span>
                </div>
            </div>
            <div style="padding-top: 12px;" class="faqs-wrapper">
                <div class="faq-questions-list">
                    <div v-for="(faq,index) in faqs"
                         v-bind:key="index"
                         class="question-container">
                        <div class="faq-question">
                            <div class="faq-numbering">
                                <span>{{index+1}}</span>
                            </div>
                            <div class="faq-item">
                                <div class="faq-item-question">
                                    {{faq.question}}
                                </div>
                                <div class="faq-item-answer"
                                     v-show="faq.opened">
                                    {{faq.answer}}
                                </div>
                            </div>
                            <div class="faq-edit">
                                <img src="/images/client/my_account/dropdown.png" :id="'toggleIcon_'+faq.id"
                                     alt="toggle icon" @click="toggleAnswer(faq.id)">
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
        props:['client'],
        data() {
            return {
                faqs: [{
                    id: 1,
                    opened: false,
                    question: 'Lorem 1111 ipsum dolor sit amet, consectetur adipiscing elit,' +
                        ' sed do eiusmod tempor incididunt ut labore et dolore magna aliqu ?',
                    answer: 'Lorem 1111 ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' +
                        ' Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.' +
                        ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.' +
                        ' Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
                },
                    {
                        id: 2,
                        opened: false,
                        question: 'Lorem 2222 ipsum dolor sit amet, consectetur adipiscing elit,' +
                            ' sed do eiusmod tempor incididunt ut labore et dolore magna aliqu ?',
                        answer: 'Lorem 2222 ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' +
                            ' Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.' +
                            ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.' +
                            ' Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
                    },
                    {
                        id: 3,
                        opened: false,
                        question: 'Lorem 3333 ipsum dolor sit amet, consectetur adipiscing elit,' +
                            ' sed do eiusmod tempor incididunt ut labore et dolore magna aliqu ?',
                        answer: 'Lorem 3333 ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' +
                            ' Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.' +
                            ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.' +
                            ' Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
                    },
                    {
                        id: 4,
                        opened: false,
                        question: 'Lorem 4444 ipsum dolor sit amet, consectetur adipiscing elit,' +
                            ' sed do eiusmod tempor incididunt ut labore et dolore magna aliqu ?',
                        answer: 'Lorem 4444 ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' +
                            ' Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.' +
                            ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.' +
                            ' Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
                    },
                ],

                user: {
                    client:{},
                    affiliates:[]
                },
                notificationMessage: 'Invitation link copied!'
            }
        },
        methods: {
            copyLink(referral_code) {
                let getUrl = window.location;
                let baseUrl = getUrl.protocol + "//" + getUrl.host ;

                let $temp = $("<input>");
                $("body").append($temp);
                $temp.val(baseUrl + '/client/register?referral_code=' + referral_code).select();
                document.execCommand("copy");
                $temp.remove();

                // notification copied :
                this.showSuccessMessage('Invitation link copied!');
            },
            toggleAnswer(faq_id) {
                let faqs = this.faqs;
                $.each(faqs, function (i) {
                    if (faqs[i].id === faq_id) {
                        faqs[i].opened = !faqs[i].opened;
                        if (faqs[i].opened) {
                            $('#toggleIcon_' + faq_id).css('transform', 'rotate(180deg)');
                        } else {
                            $('#toggleIcon_' + faq_id).css('transform', 'rotate(0deg)');
                        }
                    }

                });
            },
            getCurrentClient() {
                axios.get('/client/current').then((response) => {
                    this.user = response.data;
                });
            },
            showSuccessMessage() {
                this.$emit('showPositiveNotification',this.notificationMessage);
            },
        },
        mounted() {
            this.getCurrentClient();
        }
    }
</script>
<style scoped lang="scss">
    .account-info-content-wrapper{
        width: 100%;
        display: flex;
        justify-content: center;
        padding-top:47px;
        padding-bootom:28px ;
        .account-info-content{
            padding:26px 34px 26px 34px;
            width: 644px;
            display:flex;
            flex-direction:column;
            border: 1px solid #E2E3E6;
            margin-bottom: 28px;
            .acc-info-content-heading{
                display: flex;
                justify-content: space-between;
                .acc-info-item{
                    display: flex;
                    align-items: center;
                    img{
                        margin-right:22px;
                    }
                    span{
                        font-family: Roboto;
                        font-style: normal;
                        font-weight: 500;
                        font-size: 20px;
                        line-height: 20px;
                        letter-spacing: 0.2px;
                        color: #4A5464;
                    }
                }
                .acc-info-timezone{
                    font-family: Roboto;
                    font-style: normal;
                    font-weight: normal;
                    font-size: 16px;
                    line-height: 30px;
                    text-align: right;
                    color: #7A828D;
                }
            }
            .acc-info-content-item{
                display: flex;
                align-items: center;
                margin-top: 26px;
                img{
                    margin-right:22px;
                }
                div{
                    font-family: Roboto;
                    font-style: normal;
                    font-weight: normal;
                    font-size: 16px;
                    line-height: 20px;
                    letter-spacing: 0.2px;
                    color: #4A5464;
                }
            }
            .acc-info-content-item:last-child{
                align-items: flex-start;
                img{
                    margin-top:6px;
                }
                div{
                    line-height: 34px;
                }
            }
        }
    }

    .contracts,.faqs{
        margin-top: 18px;
    }

    .agreement{
        margin-left:34px;
        margin-right:36px;
        height:94px;
        display:flex;
        justify-content : space-between;
        align-items:center;
        .right{
            display: flex;
            align-items: center;
            img{
                margin-right: 20px;
            }
            font-family: Roboto;
            font-style: normal;
            font-weight: 500;
            font-size: 18px;
            line-height: 20px;
            letter-spacing: 0.2px;
            color: #4A5464;

        }
        .left{
            a{
                display:flex;
                justify-content : center;
                align-items:center;
                width:181px;
                height:36px;
                border: 1px solid #05A4F4;
                border-radius: 4px;
                font-family: Roboto;
                font-style: normal;
                font-weight: 500;
                font-size: 14px;
                line-height: 24px;
                text-align: center;
                letter-spacing: -0.1px;
                color: #05A4F4;
            }
        }
    }

    .agreement:first-child{
        border-bottom: 1px solid #E2E3E6;
    }

    .faqs-wrapper{
        padding:30px 32px 34px 26px;
        .faq-questions-list{
            margin-top: 0;
        }
        .faq-questions-list .faq-question .faq-numbering {
            margin-top: 10px;
            span{
                width: 24px;
                height: 24px;
            }
        }
    }

    // my account edit scss :

    .account-info-edit.dashboard-box{
        max-width: 1164px;
        width: 100%;
        padding-left: 113px;
        padding-right: 113px;
        @media (max-width:1240px) {
            padding-left: 38px;
            padding-right: 38px;
        }

        @media (max-width:425px) {
            padding-left: 15px;
            padding-right: 15px;
        }

    }

    .account-info-edit-wrapper{
        display: flex;
        justify-content: center;
        @media (max-width:1240px) {
            width: 738px;
        }
        @media (max-width:768px) {
            width: 96%;
        }
    }

    .account-info-edit-heading{
        width: 100%;
        margin-left: 0;
        margin-right: 0;
    }

    .faq-question-input.account-edit-input{
        .faq-input{
            width:400px;
            @media (max-width:1240px) {
                width:307px;
            }
            @media (max-width:600px) {
                width:100%;
            }
        }
        @media (max-width:600px) {
            width:100%;
        }
    }

    .account-edit-section{
        display: flex;
        flex-direction: column;
        padding-bottom: 38px;
        .account-edit-section-heading{
            font-family: Roboto;
            font-style: normal;
            font-weight: 500;
            font-size: 18px;
            line-height: 24px;
            color: #3EA3D7;
            margin-top: 40px;
        }

        .faq-question-input .faq-input img, .faq-answer-input .faq-input img {
            margin-left: -34px;
        }

        .faq-question-input img, .faq-answer-input img {
            margin-right: 0;
        }
    }

    .sub-section{
        border-top: 1px solid  rgba(188, 191, 198, 0.44);
        border-bottom: 1px solid rgba(188, 191, 198, 0.44);
    }

    .account-edit-section-inputs{
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        @media (max-width:600px) {
            width:100%;
        }
    }

    .account-edit-section-edit-btn{
        margin-top: 44px;
        margin-bottom: 26px;
        display: flex;
        justify-content: flex-end;
        a{
            display:flex;
            justify-content:center;
            align-items:center;

            font-family: Roboto;
            font-style: normal;
            font-weight: 500;
            font-size: 14px;
            line-height: 16px;
            text-align: center;
            text-transform: uppercase;
            color: #fff;
            border-radius: 2px;
            width:158px;
            height:48px;
            background: #05A4F4;
        }
        a:hover{
            color: #fff;
        }
    }

    .base-text{
        font-family: Roboto;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 20px;
        letter-spacing: 0.2px;
        color: #4A5464;
    }

    .base-link{
        font-family: Roboto;
        font-style: normal;
        font-weight: bold;
        font-size: 18px;
        line-height: 24px;/* identical to box height, or 133% */
        color: #05A4F4;
    }
</style>
