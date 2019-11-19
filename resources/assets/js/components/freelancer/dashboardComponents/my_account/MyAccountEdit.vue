<template>
    <div class="d-flex justify-content-center">
        <div class="account-info-edit-wrapper flex-column align-items-center">
            <nav class="navbar navbar-light fixed-top dashboard_navbar">
                <div class="backBtn">
                    <a href="/freelancer/dashboard/my-account">
                        <img src="/images/client/arrow_back.png" alt="back-icon">
                    </a>
                    YOUR PERSONAL INFORMATION
                </div>
            </nav>

            <div class="container" style="display: flex;justify-content: center;">
                <div class="notificationBar" id="notificationBar" style=" display:none; position:fixed;">
                    <div>
                        {{notificationMessage}}
                    </div>
                    <a href="javascript:void(0)" @click="hideNotification" class="no-decoration" style="color: white;">
                        x
                    </a>
                </div>
            </div>

            <div class="main-box-margin account-info-edit dashboard-box">
                <div class="account-info-edit-heading dashboard-box-heading">
                    <div class="left">
                        <img src="/images/dashboard/info.svg" alt="info icon">
                        <span>
                        EDIT YOUR PERSONAL INFORMATION
                    </span>
                    </div>
                </div>

                <div class="account-edit-section">
                    <div class="account-edit-section-heading">
                        PROFILE PICTURE
                    </div>

                    <div class="avatar">
                        <img :src="getImageSrc(agentData.profile_picture)" alt="profile picture">
                    </div>

                    <div class="account-edit-section-inputs">
                        <div class="faq-question-input account-edit-input full-width">
                            <label class="faq-input-description">
                                Please upload a picture of yourself. There should be only your face
                            </label>
                        </div>

                        <input type="file" ref="file" @change=handleFileUpload>
                    </div>
                </div>

                <div class="account-edit-section">
                    <div class="account-edit-section-heading">
                        PERSONAL INFORMATION
                    </div>
                    <div class="account-edit-section-inputs row">
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter your name
                            </label>
                            <div class="faq-input" :class="{ 'error-input' : errors.first_name}">
                                <input
                                        v-model="agentData.first_name"
                                        type="text"
                                        name="faq"
                                        placeholder="Jose">
                                <img
                                        v-show="agentData.first_name"
                                        v-on:click="clearInput('first_name')"
                                        src="/images/client/campaign_activity/close_black.png"
                                        alt="delete icon">
                            </div>
                            <div class="error" v-if="errors.first_name">
                                {{errors.first_name[0]}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter your surname
                            </label>
                            <div class="faq-input" :class="{ 'error-input' : errors.last_name}">
                                <input
                                        v-model="agentData.last_name"
                                        type="text"
                                        name="faq"
                                        placeholder="Quintero">
                                <img
                                        v-show="agentData.last_name"
                                        v-on:click="clearInput('last_name')"
                                        src="/images/client/campaign_activity/close_black.png"
                                        alt="delete icon">
                            </div>
                            <div class="error" v-if="errors.last_name">
                                {{errors.last_name[0]}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Choose your gender
                            </label>
                            <div class="img-container">
                                <div class="faq-input" :class="{ 'error-input' : errors.gender}">
                                    <img v-on:click="agentData.gender = 'm'"
                                         :src="`/images/icons/${(agentData.gender === 'm') ? 'male_icon_pressed' : 'male_icon'}.svg`">
                                    <img v-on:click="agentData.gender = 'f'"
                                         :src="`/images/icons/${(agentData.gender === 'f') ? 'female_icon_pressed' : 'female_icon'}.svg`">
                                </div>
                            </div>
                            <div class="error" v-if="errors.gender">
                                {{errors.gender[0]}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter your phone number
                            </label>
                            <div class="faq-input" :class="{'error-input': errors.phone}">
                                <input
                                        v-model="agentData.phone"
                                        type="tel"
                                        name="phone"
                                        placeholder="123-3534634"
                                >
                                <img
                                        v-show="agentData.phone"
                                        v-on:click="clearInput('phone')"
                                        src="/images/client/campaign_activity/close_black.png"
                                        alt="delete icon">
                            </div>
                            <div class="error" v-if="errors.phone">
                                {{errors.phone[0]}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter your city name
                            </label>
                            <div class="faq-input" :class="{'error-input': errors.city}">
                                <input
                                        v-model="agentData.city"
                                        type="text"
                                        name="faq"
                                        placeholder="London"
                                >
                                <img
                                        v-show="agentData.city"
                                        v-on:click="clearInput('city')"
                                        src="/images/client/campaign_activity/close_black.png"
                                        alt="delete icon">
                            </div>
                            <div class="error" v-if="errors.city">
                                {{errors.city[0]}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter your PayPal acc number
                            </label>
                            <div class="faq-input" :class="{'error-input': errors.paypal_acc_number}">
                                <input
                                        v-model="agentData.paypal_acc_number"
                                        type="text"
                                        name="faq"
                                        placeholder="9128412945"
                                >
                                <img
                                        v-show="agentData.paypal_acc_number"
                                        v-on:click="clearInput('paypal_acc_number')"
                                        src="/images/client/campaign_activity/close_black.png"
                                        alt="delete icon">
                            </div>
                            <div class="error" v-if="errors.paypal_acc_number">
                                {{errors.paypal_acc_number[0]}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="account-edit-section sub-section">
                    <div class="account-edit-section-heading">
                        PASSWORD
                    </div>
                    <div class="account-edit-section-inputs">
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Write a new password
                            </label>
                            <div class="faq-input" :class="{'error-input': errors.password}">
                                <input v-model="agentData.password" type="password" name="password"
                                       placeholder="Enter your password">
                                <img
                                        v-show="agentData.password"
                                        v-on:click="clearInput('password')"
                                        src="/images/client/campaign_activity/close_black.png"
                                        alt="delete icon">
                            </div>
                            <div class="error" v-if="errors.password">
                                {{errors.password[0]}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Repeat your new password
                            </label>
                            <div class="faq-input" :class="{'error-input': errors.password_confirmation}">
                                <input v-model="agentData.password_confirmation" type="password"
                                       name="password_confirmation"
                                       placeholder="Confirm your password">
                                <img
                                        v-show="agentData.password_confirmation"
                                        v-on:click="clearInput('password_confirmation')"
                                        src="/images/client/campaign_activity/close_black.png"
                                        alt="delete icon">
                            </div>
                            <div class="error" v-if="errors.password_confirmation">
                                {{errors.password_confirmation[0]}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="account-edit-section-edit-btn no-decoration">
                    <a class="btn-primary"
                       v-on:click="submitForm"
                       href="javascript:void(0)">
                        SAVE EDITS
                    </a>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: {},
                agent: {},
                errors: [],
                agentData: {
                    'profile_picture': this.$attrs.current_user.user_data.profile_picture,
                    'first_name': this.$attrs.current_user.user_data.first_name,
                    'last_name': this.$attrs.current_user.user_data.last_name,
                    'gender': this.$attrs.current_user.user_data.gender,
                    'phone': this.$attrs.current_user.user_data.phone,
                    'city': this.$attrs.current_user.user_data.city,
                    'paypal_acc_number': this.$attrs.current_user.user_data.paypal_acc_number,
                    'password': '',
                    'password_confirmation': '',
                },
                isLoading: false,
                notificationMessage:'',
                profilePicture:''
            }
        },
        methods: {
            submitForm() {
                let form_data = new FormData();

                $.each(this.agentData, (field) => {
                    form_data.append(field, this.agentData[field]);
                });
                if(this.profilePicture){
                    form_data.append('profilePicture', this.profilePicture);
                }

                this.clearErrors();
                this.isLoading = true;

                axios.post('/freelancer/account/personal/submit', form_data)
                    .then((response) => {
                        console.log(response.data);
                        this.agentData.profile_picture = this.getImageSrc(response.data.profile_picture);
                        this.showSuccessMessage();
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                            console.log(this.errors);
                        } else {
                            this.errors = ['Something went wrong. Please try again.'];
                        }
                    })
            },
            handleFileUpload() {
                this.profilePicture = this.$refs.file.files[0];
                this.agentData.profile_picture = URL.createObjectURL(this.profilePicture) ;
            },
            clearErrors() {
                $.each(this.errors, (error) => {
                    this.errors[error] = '';
                });

            },
            clearInput(field) {
                this.agentData[field] = '';
            },
            getImageSrc(src) {
                if (!src) {
                    return '/images/placeholder.png';
                }

                if (src.charAt(0) !== '/' && src.charAt(0) !== 'h' && src.charAt(0) !== 'b') {
                    return '/' + src;
                }

                return src;
            },
            showSuccessMessage(){
                $('.notificationBar').css('background','#FFBA69') ;
                this.notificationMessage = 'Personal information has been successfully updated!' ;
                $('#notificationBar').fadeIn(600);
                setTimeout(()=>{
                    $('#notificationBar').fadeOut(1500);
                },4000);
            },
            hideNotification(){
                $('#notificationBar').css('display','none');
            },
        },

        mounted() {

        },
        created() {

        }
    }
</script>

<style lang="scss" scoped>

    .processBar {
        height: 6px;
        background: lightgreen;
        width: 0%;
        bottom: -15px;
        position: absolute;
    }

    .avatar {
        margin-top:25px;
        img{
            border-radius: 50%;
            width: 150px;
            height: 150px;
        }
    }

    .notificationBar{
        margin-top: -8px;
        z-index: 2;
        width: 1164px;
    }


    @media screen and (max-width: 1270px) {
        .notificationBar{
            width: 96%;
        }
    }
    .main-box-margin{
        margin-top: 22px;
    }
</style>
