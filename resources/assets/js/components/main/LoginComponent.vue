<template>
    <div class="flex-column">
        <form @submit.prevent="submitForm">
            <div class="account-info-edit">
                <div class="account-info-edit-heading dashboard-box-heading">
                    <div class="left">
                        <img src="/images/client/my_account/info_40px.png" alt="info icon">
                        <span>LOG IN</span>
                    </div>
                </div>
                <div class="account-edit-section"
                     style="padding-bottom: 0; margin: 0 24px;">
                    <div class="account-edit-section-inputs">
                        <div class="faq-question-input account-edit-input full-width">
                            <label class="faq-input-label">
                                Enter your e-mail address
                            </label>
                            <div class="faq-input"
                                 :class="{ 'error-input' : errors.length}">
                                <input type="text"
                                       name="email"
                                       placeholder="Enter your email"
                                       v-model="formData.email" :class="{ 'error-border' : errors.email}">
                                <img src="/images/client/campaign_activity/close_black.png" @click="clearInput('email')"
                                     alt="delete icon" v-show="formData.email.length > 0">
                            </div>
                            <div class="error"
                                 v-if="errors.email">
                                {{errors.email[0]}}
                            </div>
                        </div>
                    </div>
                    <div class="account-edit-section-inputs">
                        <div class="faq-question-input account-edit-input full-width">
                            <label class="faq-input-label">
                                Enter your password
                            </label>
                            <div class="faq-input"
                                 :class="{ 'error-input' : errors.password}">
                                <input type="password"
                                       name="password"
                                       placeholder="Enter your password"
                                       v-model="formData.password" :class="{ 'error-border' : errors.email}">
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
                    </div>
                    <div class="form-group d-flex justify-content-start"
                         style="margin-top: 36px;">
                        <div class="checkbox">
                            <label class="checkBoxText checkBoxContainer">
                                <input type="checkbox"
                                       name="remember"
                                       v-model="formData.remember">
                                <span class="rememberText">Remember Me</span>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="account-edit-section-edit-btn no-decoration mt-0"
                >
                <button class="btn btn-primary"  id="submitBtnWrapper"  :class="{'disabled-btn' : !canSubmit}"
                        type="submit">
                    LOG IN
                </button>
            </div>
        </form>
        <div class="pt-3 no-decoration d-flex justify-content-center base-text align-items-center">
            Don't have an account ? <a href="/client/register" class="ml-2 base-link"> REGISTER </a>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                formData: {
                    email: '',
                    password: '',
                    remember: false
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
                axios.post('/login', this.formData)
                    .then((response) => {
                        console.log(response.data);
                        if(response.data.status === 'failure'){
                            this.errors = response.data.errors ;
                        }
                        else if(response.data.status === 'success'){
                            window.location.href = response.data.redirect;
                        }
                    })
                    .catch((error) => {
                        console.log(error);
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
        }
    }
</script>
<style scoped>
    .error {
        font-family: Roboto;
        font-style: normal;
        font-weight: normal;
        font-size: 16px;
        line-height: 30px;
        /* identical to box height, or 187% */
        color: #F56F6F;
    }

    .error-border{
        border-color:#F56F6F !important;
    }

    .disabled-btn{
        background: lightgrey;
        border:none;
        cursor: not-allowed !important;
    }
</style>
