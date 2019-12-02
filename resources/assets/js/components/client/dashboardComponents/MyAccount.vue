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
                        EDIT
                    </a>
                </div>
            </div>
            <div class="account-info-content-wrapper">
                <div class="account-info-content">
                    <div class="acc-info-content-heading">
                        <div class="acc-info-item">
                            <img src="/images/client/my_account/name.png" alt="name icon">
                            <span>
                                {{user.client.contact}}
                            </span>
                        </div>
                        <div class="acc-info-timezone">
                            GMT -8
                        </div>
                    </div>
                    <div class="acc-info-content-item">
                        <img src="/images/client/my_account/agency.png" alt="agency icon">
                        <div style="color: #4A5464;">
                            {{user.client.agency}} - agency
                        </div>
                    </div>
                    <hr style="width: 100%; margin: 21px 0;"/>
                    <div style="margin-top: 0;" class="acc-info-content-item">
                        <img src="/images/client/my_account/phone_number.png" alt="phone icon">
                        <div>
                            {{user.client.agency_phone}}
                        </div>
                    </div>
                    <div class="acc-info-content-item">
                        <img src="/images/client/my_account/email.png" alt="email icon">
                        <div>
                            {{user.email}}<br/>
                            {{user.client.department_email}} (account dept)
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

        <div class="contracts dashboard-box">
            <div class="account-info-heading dashboard-box-heading">
                <div class="left">
                    <img src="/images/client/my_account/contract_40px.png" alt="info icon">
                    <span>
                        BECOME AN AFFILIATE
                    </span>
                </div>
            </div>
            <div class="account-info-content-wrapper">
                <div class="account-info-content p-0">
                    <div class="agreement">
                        <div class="right">
                            <img src="/images/client/my_account/service.png" alt="service icon">
                            <div>
                                Invite others
                            </div>
                        </div>
                        <div class="left no-decoration">
                            <a href="javascript:void(0)" @click="copyLink(user.referral_code)">
                                <span>COPY INVITE LINK</span>
                            </a>
                        </div>
                    </div>
                    <div class="agreement" style="height:auto; padding-top: 15px; padding-bottom: 15px;">
                        <div class="flex-column">
                            <div class="right">
                                <img src="/images/dashboard/experience.svg" alt="service icon">
                                <div>
                                    My clients list
                                </div>
                            </div>
                            <div class="pl-5 pt-2">
                                <div v-for="(user,index) in user.affiliates" :key="index + 'affiliate'">
                                    <div style="color:#05A4F4;">- {{user.client.contact}}</div>
                                </div>
                            </div>
                            <div v-if="user.affiliates.length < 1" class="pl-5 pt-1">
                                - No invited clients.
                            </div>
                        </div>
                        <div class="left no-decoration">
                            <a>
                                <span style="color:#05A4F4;">My percentage : {{user.affiliate_percentage}} %</span>
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
<style scoped>
</style>
