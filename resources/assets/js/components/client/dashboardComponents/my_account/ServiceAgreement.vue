<template>
    <div>
        <nav class="navbar navbar-light fixed-top dashboard_navbar">
            <div class="backBtn">
                <a href="/client/dashboard/my-account">
                    <img src="/images/client/arrow_back.png" alt="back-icon">
                </a>
                ACCOUNT INFORMATION EDITION
            </div>
        </nav>
        <div class="container" style="display: flex;justify-content: center;">
            <div class="notificationBar" id="notificationBar" style="display:none ; position:fixed;">
                <div>
                    {{notificationMessage}}
                </div>
                <a href="javascript:void(0)" @click="hideNotification" class="no-decoration" style="color: white;">
                    x
                </a>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="main-grid">
                <div class="header-text">
                    <img src="/images/client/my_account/contract_40px.svg" alt="" class="icon-margin small-image">
                    SERVICE AGREEMENT
                </div>
                <hr/>
                <div class="agreement-main">
                    <div class="agreement-text agreement-margin">
                        THIS AGREEMENT
                        <span style="font-weight: bold;">(THE ”AGREEMENT”)</span> IS MADE ON
                        <span style="font-weight: bold;">“DATE”</span> BY AND BETWEEN THE
                        <span style="font-weight: bold;">“CLIENT”</span>
                        <br/>
                        AND THE “____”. IN CONSIDERATION OF THE MUTUAL AGREEMENT MADE HEREIN, BOTH PARTIES AGREE AS
                        FOLLOWS:
                    </div>
                    <div class="blue-part">
                        work
                    </div>
                    <div class="agreement-text agreement-main-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure
                        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                        sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </div>
                    <div class="blue-part">
                        CONFIDENTIALITY
                    </div>
                    <div class="agreement-text agreement-main-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure
                        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                        sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit
                        amet, consectetur adipiscing
                        elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                        veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                        in voluptate velit esse cillum
                        dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
                        qui officia deserunt mollit anim
                        id est laborum.
                    </div>
                    <div class="blue-part">
                        COMPENSATION
                    </div>
                    <div class="agreement-text agreement-main-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure
                        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                        sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit
                        amet, consectetur adipiscing
                        elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                        veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                        in voluptate velit esse cillum
                        dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
                        qui officia deserunt mollit anim
                        id est laborum.
                    </div>
                    <div class="blue-part">
                        COMPENSATION
                    </div>
                    <div class="agreement-text agreement-main-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure
                        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    </div>
                    <div class="blue-part">
                        CLIENT APPROVAL
                    </div>
                    <div class="agreement-text agreement-main-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure
                        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    </div>
                    <div class="blue-part">
                        CANCELLATION
                    </div>
                    <div class="agreement-tex agreement-main-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure
                        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    </div>
                    <div class="blue-part">
                        ACCEPTANCE OF TERMS
                    </div>
                    <div class="agreement-text agreement-main-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure
                        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    </div>
                </div>
                <div class="bluechecked d-flex align-items-center">
                    <label class="checkBoxText checkBoxContainer">
                        <input v-on:change="agree = !agree" type="checkbox" name="remember" v-if="!hasSigned">
                        <input type="checkbox" name="remember" checked disabled v-if="hasSigned">
                        <span class="agreement-checkbox-text">I agree with the privacy agreement</span>
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="col-12 col-md-8 col-lg-6 agreement-signiture">
                    <div class="blue-part" :class="{disabled: !agree}">
                        YOUR SIGNATURE
                    </div>
                    <div class="agreement-text signiture-main-text">
                        <input :disabled="!agree" type="text" placeholder="Jhon Doe" v-model="currentClient.signature">
                    </div>
                </div>
                <hr v-if="!hasSigned"/>
                <div class="d-flex justify-content-end" v-if="!hasSigned">
                    <button style="height: 48px; width: 98px;" class="agreement-button"
                            :class="{disabled: !(currentClient.signature && agree) }" @click="signContract">SIGN
                    </button>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
    export default {
        props: ['client', 'user'],
        data() {
            return {
                agree: false,
                hasSigned: false,
                currentClient: {
                    user: {}
                },
                notificationMessage:'Successfully signed contract!',
            }
        },
        methods: {
            signContract() {
                if (!(this.currentClient.signature && this.agree)) {
                    return;
                }
                axios.post('/client/contracts/sign', {
                    type: 'service',
                    signature: this.currentClient.signature
                })
                    .then((response) => {
                        if(response.data.status === 'success'){
                            this.hasSigned = true;
                            this.showSuccessMessage();
                        }
                    })
                    .catch((error) => {
                    });
            },
            hideNotification(){
                $('#notificationBar').css('display','none');
            },
            showSuccessMessage(){
                $('.notificationBar').css('background','#FFBA69') ;
                this.notificationMessage = 'Successfully signed contract!' ;
                $('#notificationBar').fadeIn(600);
                setTimeout(()=>{
                    $('#notificationBar').fadeOut(1500);
                },4000);
            }
        },
        mounted() {
            this.currentClient = this.client;
            this.currentClient.user = this.user;

            if (this.currentClient.user.agreed_with_service_agreement_at) {
                this.hasSigned = true;
            }
        }
    }
</script>

<style scoped lang="scss">
    .btn-primar:hover{
        color: white;
    }

    .main-grid{
        margin-top: 22px;
    }

    .notificationBar{
        margin-top: -8px;
        z-index: 2;
        width: 1165px;
    }

    @media screen and (max-width: 1270px) {
        .notificationBar{
            width: 96%;
        }
    }
</style>