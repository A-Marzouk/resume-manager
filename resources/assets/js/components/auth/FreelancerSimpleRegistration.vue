<template>
    <div>
        <div class="d-flex justify-content-center flex-column align-items-center">
            <div class="account-info-edit-wrapper">
                <nav class="navbar navbar-light fixed-top dashboard_navbar">
                    <div class="backBtn">
                        <a href="/">
                            <img src="/images/client/arrow_back.png" alt="back-icon">
                        </a>
                        BECOME AN AGENT
                    </div>
                </nav>
                <div class="account-info-edit dashboard-box">
                    <div class="account-info-edit-heading dashboard-box-heading">
                        <div class="left">
                            <img src="/images/client/my_account/info_40px.png" alt="info icon">
                            <span>
                                FILL IN THE INFORMATION
                            </span>
                        </div>
                        <div class="d-flex justify-content-between mt-5 NoDecor">
                            <a href="/freelancer/register/github" class="d-flex align-items-center p-3 border-dark">
                                <span>Continue with Github</span> <img src="/images/resume_themes/theme10/github.png" style="width: 20px; height: 20px;" class="ml-2" alt="">
                            </a>
                            <a href="/freelancer/register/facebook" class="d-none">
                                facebook
                            </a>
                            <a href="/freelancer/register/instagram" class="d-none">
                                instagram
                            </a>
                            <a href="/freelancer/register/google" class="d-none">
                                google
                            </a>
                            <a href="/freelancer/register/linkedin" class="d-none">
                                linkedin
                            </a>
                        </div>
                    </div>
                    <div class="account-edit-section">
                        <div class="account-edit-section-heading">
                            BASIC INFORMATION
                        </div>
                        <div class="account-edit-section-inputs">
                            <div class="faq-question-input account-edit-input">
                                <label class="faq-input-label">
                                    Enter your name
                                </label>
                                <div class="faq-input"
                                     :class="{ 'error-input' : errors.name}">
                                    <input type="text"
                                           name="name"
                                           placeholder="Enter your name"
                                           v-model="formData.name">
                                    <img src="/images/client/campaign_activity/close_black.png" @click="clearInput('name')"
                                         alt="delete icon" v-show="formData.name.length > 0">
                                </div>
                                <div class="error"
                                     v-if="errors.name">
                                    {{errors.name[0]}}
                                </div>
                            </div>
                            <div class="faq-question-input account-edit-input">
                                <label class="faq-input-label">
                                    Enter your phone
                                </label>
                                <div class="faq-input"
                                     :class="{ 'error-input' : errors.phone}">
                                    <input type="text"
                                           name="phone"
                                           placeholder="Enter your phone"
                                           v-model="formData.phone">
                                    <img src="/images/client/campaign_activity/close_black.png" @click="clearInput('phone')"
                                         alt="delete icon" v-show="formData.phone.length > 0">
                                </div>
                                <div class="error"
                                     v-if="errors.phone">
                                    {{errors.phone[0]}}
                                </div>
                            </div>
                            <div class="faq-question-input account-edit-input">
                                <label class="faq-input-label">
                                    Enter your e-mail address
                                </label>
                                <div class="faq-input"
                                     :class="{ 'error-input' : errors.email}">
                                    <input type="text"
                                           name="email"
                                           placeholder="Enter your email"
                                           v-model="formData.email">
                                    <img src="/images/client/campaign_activity/close_black.png" @click="clearInput('email')"
                                         alt="delete icon" v-show="formData.email.length > 0">
                                </div>
                                <div class="error"
                                     v-if="errors.email">
                                    {{errors.email[0]}}
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
                                <div class="faq-input"
                                     :class="{ 'error-input' : errors.password}">
                                    <input type="password"
                                           name="password"
                                           placeholder="Enter your password"
                                           v-model="formData.password">
                                    <img src="/images/client/campaign_activity/close_black.png"
                                         alt="delete icon"
                                         v-show="formData.password.length > 0"
                                         @click="clearInput('password')">
                                </div>
                                <div class="error"
                                     v-if="errors.password">
                                    {{errors.password[0]}}
                                </div>
                            </div>
                            <div class="faq-question-input account-edit-input">
                                <label class="faq-input-label">
                                    Repeat your new password
                                </label>
                                <div class="faq-input">
                                    <input type="password"
                                           name="password_confirmation"
                                           placeholder="Enter your password confirmation"
                                           v-model="formData.password_confirmation">
                                    <img src="/images/client/campaign_activity/close_black.png"
                                         alt="delete icon"
                                         v-show="formData.password_confirmation.length > 0"
                                         @click="clearInput('password_confirmation')">
                                </div>
                                <div class="error"
                                     v-if="errors.password_confirmation">
                                    {{errors.password_confirmation[0]}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="account-edit-section-edit-btn no-decoration"
                         :class="{'disabled-btn' : !canSubmit}"
                         id="submitBtnWrapper">
                        <a href="javascript:void(0)" @click="submitForm">
                            REGISTER
                        </a>
                    </div>
                </div>
            </div>
            <div class="pt-3 no-decoration d-flex justify-content-center base-text align-items-center">
                Already have an account ? <a href="#" class="ml-2 base-link"> LOG IN </a>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        props:['referral_code'],
        data() {
            return {
                formData: {
                    name: '',
                    email: '',
                    phone: '',
                    password: '',
                    password_confirmation: '',
                },
                canSubmit: false,
                errors: []
            }
        },
        methods: {
            submitForm() {
                if ($('#submitBtnWrapper').hasClass('disabled-btn')) {
                    return;
                }
                this.canSubmit = false;
                if(this.referral_code){
                    this.formData.referral_code = this.referral_code ;
                }
                axios.post('/freelancer/register', this.formData)
                    .then(response => {
                        window.location.href = '/dashboard';
                    })
                    .catch(error => {
                        this.canSubmit = true;
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = ['Something went wrong. Please try again.'];
                        }
                    });
            },
            clearInput(inputName) {
                this.formData[inputName] = '';
            },
        },
        watch: {
            formData: {
                handler() {
                    // check if all formData values are filled
                    let values = Object.values(this.formData);
                    let isAll_filled = true;
                    for (const value of values) {
                        if (value.length < 1) {
                            isAll_filled = false;
                        }
                    }
                    this.canSubmit = isAll_filled;
                },
                deep: true
            }
        },
        mounted() {
            console.log(this.referral_code);
        }
    }
</script>

<style scoped>

</style>
