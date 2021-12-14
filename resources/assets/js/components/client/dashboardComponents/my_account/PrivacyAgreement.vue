<template>
    <div class=" privacy-container d-flex justify-content-center flex-column align-items-center">
        <nav class="navbar navbar-light fixed-top dashboard_navbar">
            <div class="backBtn">
                <a href="/client/dashboard/my-account">
                    <img src="/images/client/arrow_back.png" alt="back-icon">
                    ACCOUNT INFORMATION
                </a>
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

        <div class="main-grid">
            <div class="col-12 col-sm-12 col-md-12 header-text">
                <img src="/images/client/my_account/contract_40px.png" alt="" class="icon-margin small-image">
                PRIVACY AGREEMENT
            </div>
            <hr/>
            <div class="agreement-main">
                <div class="agreement-text agreement-margin">
                    THIS AGREEMENT
                    <span style="font-weight: bold;">(THE ”AGREEMENT”)</span> IS MADE ON
                    <span style="font-weight: bold;">“DATE”</span> BY AND BETWEEN THE
                    <span style="font-weight: bold;">“CLIENT”</span>
                    <br/>
                    AND THE “____”. IN CONSIDERATION OF THE MUTUAL AGREEMENT MADE HEREIN, BOTH PARTIES AGREE AS FOLLOWS:
                </div>
                <div class="blue-part">
                    work
                </div>
                <div class="agreement-text agreement-main-text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.
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
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure
                    dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                    sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet,
                    consectetur adipiscing
                    elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                    voluptate velit esse cillum
                    dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                    officia deserunt mollit anim
                    id est laborum.
                </div>
                <div class="blue-part">
                    COMPENSATION
                </div>
                <div class="agreement-text agreement-main-text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure
                    dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                    sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet,
                    consectetur adipiscing
                    elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                    voluptate velit esse cillum
                    dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                    officia deserunt mollit anim
                    id est laborum.
                </div>
                <div class="blue-part">
                    COMPENSATION
                </div>
                <div class="agreement-text agreement-main-text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure
                    dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                </div>
                <div class="blue-part">
                    CLIENT APPROVAL
                </div>
                <div class="agreement-text agreement-main-text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure
                    dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                </div>
                <div class="blue-part">
                    CANCELLATION
                </div>
                <div class="agreement-tex agreement-main-text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure
                    dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                </div>
                <div class="blue-part">
                    ACCEPTANCE OF TERMS
                </div>
                <div class="agreement-text agreement-main-text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.
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
                    <input :disabled="!agree" type="text" placeholder="Your name here"  v-model="currentClient.signature">
                </div>
            </div>
            <hr  v-if="!hasSigned" />
            <div class="d-flex justify-content-end" v-if="!hasSigned">
                <button style="height: 48px; width: 98px;" class="agreement-button"
                        :class="{disabled: !(currentClient.signature && agree) }" @click="signContract">SIGN
                </button>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props:['client'],
        data() {
            return {
                agree: false,
                hasSigned: false,
                currentClient: {},
                notificationMessage: '',
            }
        },
        methods: {
            signContract() {
                if(!(this.currentClient.signature && this.agree)){
                    return  ;
                }
                axios.post('/client/contracts/sign', {
                    type: 'privacy',
                    signature: this.currentClient.signature
                })
                    .then((response) => {
                        if(response.data.status === 'success'){
                            if(response.data.status === 'success'){
                                this.hasSigned = true;
                                console.log(res.data);
                                this.showSuccessMessage();
                            }
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
        mounted(){
            this.currentClient = this.client ;

            if(this.currentClient.agreed_with_privacy_agreement_at){
                this.hasSigned = true ;
            }
        }
    }
</script>


<style scoped lang="scss">

    .privacy-container{
        max-width: 92%;
        margin: 0 auto;
    }

    .btn-primar:hover{
        color: white;
    }

    .header-text {
        font-size: 1.25rem;
        font-family: Roboto;
        color: #4A5464;
        font-weight: 500;
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

    .agreement-text {
        font-family: Roboto, serif;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        color: #4A5464;
    }

    .agreement-margin {
        padding: 32px 0 40px;
        text-transform: uppercase;
        line-height: 30px;
    }

    .blue-part {
        background: #EDF7FC;
        border-radius: 4px;
        font-weight: bold;
        font-size: 18px;
        line-height: 30px;
        text-transform: uppercase;
        color: #05A4F4;
        padding: 14px 0 14px 24px;

        &.disabled {
            opacity: .4;
        }
    }

    .agreement-main-text {
        padding: 32px 0 40px;
        line-height: 28px;
    }

    .agreement-main {
        background: #FFFFFF;
        box-shadow: 0 2px 18px rgba(179, 183, 186, 0.15);
        border-radius: 4px;
        padding-left: 24px;
        padding-right: 24px;
        margin-top: 32px;
    }
    .chechbox-blue {
        cursor: pointer;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        outline: 0;
        background: #DADADA;
        height: 18px;
        width: 18px;
        border: 1px solid #4A5464;
        margin-right: 15px;
    }

    .bluechecked {
        margin: 51px 0;
    }
    .chechbox-blue:checked {
        background: #05A4F4;
        border: none;
    }

    .chechbox-blue:hover {
        filter: brightness(90%);
    }

    .chechbox-blue:after {
        content: '';
        position: relative;
        left: 30%;
        top: 5%;
        width: 40%;
        height: 80%;
        border: solid #dadada;
        border-width: 0 3px 3px 0;
        transform: rotate(45deg);
        display: none;
    }

    .chechbox-blue:checked:after {
        display: block;
    }

    .agreement-signiture {
        padding: 0 !important;
        background: #FFFFFF;
        box-shadow: 0 3px 18px rgba(179, 183, 186, 0.15);
        border-radius: 4px;
        margin-bottom: 35px;
    }

    .signiture-main-text {
        padding: 40px 0 40px 25px;
        input {
            border: none;
            background: transparent;
            width: 100%;

            &:focus {
                border: none;
                box-shadow: 0;
                outline: none;
            }

            &::placeholder{
                opacity: 0.3;
            }
        }
    }

    .agreement-button {
        background: #05A4F4;
        border-radius: 2px;
        font-weight: 500;
        font-size: 14px;
        line-height: 16px;
        text-align: center;
        color: #fff;
        border: none;
        padding: 16px 25px;
        margin-top: 6px;
        margin-bottom: 6px;

        &.disabled {
            background: #E4E4E4;
            color: #A1A7AF;
        }
    }

</style>