<template>
    <div class="d-flex justify-content-center flex-column align-items-center">
        <div class="account-info-edit-wrapper">
            <nav class="navbar navbar-light fixed-top dashboard_navbar">
                <div class="backBtn">
                    <a href="/">
                        <img src="/images/client/arrow_back.png" alt="back-icon">
                    </a>
                    BECOME A CLIENT
                </div>
            </nav>
            <div class="account-info-edit dashboard-box">
                <div class="account-info-edit-heading dashboard-box-heading">
                    <div class="left">
                        <img src="/images/client/my_account/info_40px.png" alt="info icon">
                        <span>
                        FILL IN THE INFORMATION TO BECOME A CLIENT
                    </span>
                    </div>
                </div>
                <div class="account-edit-section">
                    <div class="account-edit-section-heading">
                        BASIC INFORMATION
                    </div>
                    <div class="account-edit-section-inputs">
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter your agency name
                            </label>
                            <div class="faq-input"
                                 :class="{ 'error-input' : errors.agency}">
                                <input type="text"
                                       name="agency"
                                       placeholder="Enter your agency name"
                                       v-model="formData.agency">
                                <img src="/images/client/campaign_activity/close_black.png"
                                     alt="delete icon"
                                     v-show="formData.agency.length > 0"
                                     @click="clearInput('agency')"
                                >
                            </div>
                            <div class="error"
                                 v-if="errors.agency">
                                {{errors.agency[0]}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter name of contact person
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
                                Enter contact phone
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
                                Select your time zone
                            </label>
                            <div class="faq-input"
                                 :class="{ 'error-input' : errors.timezone}">
                                <select class="form-control"
                                        id="timezone"
                                        name="timezone"
                                        style="height: 50px;"
                                        v-model="formData.timezone">
                                    <option value=""
                                            selected="selected">Select your timezone
                                    </option>
                                    <option value="(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima">(GMT -5:00)
                                        Eastern Time (US & Canada), Bogota, Lima
                                    </option>
                                    <option value="(GMT -6:00) Central Time (US & Canada), Mexico City">(GMT -6:00)
                                        Central Time (US & Canada), Mexico City
                                    </option>
                                    <option value="(GMT -7:00) Mountain Time (US & Canada)">(GMT -7:00) Mountain Time
                                        (US & Canada)
                                    </option>
                                    <option value="(GMT -8:00) Pacific Time (US & Canada)">(GMT -8:00) Pacific Time (US
                                        & Canada)
                                    </option>
                                    <option value="(GMT -9:00) Alaska">(GMT -9:00) Alaska</option>
                                    <option value="">--------------</option>
                                    <option value="(GMT -12:00) Eniwetok, Kwajalein">(GMT -12:00) Eniwetok, Kwajalein
                                    </option>
                                    <option value="(GMT -11:00) Midway Island, Samoa">(GMT -11:00) Midway Island,
                                        Samoa
                                    </option>
                                    <option value="(GMT -10:00) Hawaii">(GMT -10:00) Hawaii</option>
                                    <option value="(GMT -9:30) Taiohae">(GMT -9:30) Taiohae</option>
                                    <option value="(GMT -9:00) Alaska">(GMT -9:00) Alaska</option>
                                    <option value="(GMT -8:00) Pacific Time (US & Canada)">(GMT -8:00) Pacific Time (US
                                        & Canada)
                                    </option>
                                    <option value="(GMT -7:00) Mountain Time (US & Canada)">(GMT -7:00) Mountain Time
                                        (US & Canada)
                                    </option>
                                    <option value="(GMT -6:00) Central Time (US & Canada), Mexico City">(GMT -6:00)
                                        Central Time (US & Canada), Mexico City
                                    </option>
                                    <option value="(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima">(GMT -5:00)
                                        Eastern Time (US & Canada), Bogota, Lima
                                    </option>
                                    <option value="(GMT -4:30) Caracas">(GMT -4:30) Caracas</option>
                                    <option value="(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz">(GMT -4:00)
                                        Atlantic Time (Canada), Caracas, La Paz
                                    </option>
                                    <option value="(GMT -3:30) Newfoundland">(GMT -3:30) Newfoundland</option>
                                    <option value="(GMT -3:00) Brazil, Buenos Aires, Georgetown">(GMT -3:00) Brazil,
                                        Buenos Aires, Georgetown
                                    </option>
                                    <option value="(GMT -2:00) Mid-Atlantic">(GMT -2:00) Mid-Atlantic</option>
                                    <option value="(GMT -1:00) Azores, Cape Verde Islands">(GMT -1:00) Azores, Cape
                                        Verde Islands
                                    </option>
                                    <option value="(GMT +0:00) Western Europe Time, London, Lisbon, Casablanca">(GMT
                                        +0:00) Western Europe Time, London, Lisbon, Casablanca
                                    </option>
                                    <option value="(GMT +1:00) Brussels, Copenhagen, Madrid, Paris">(GMT +1:00)
                                        Brussels, Copenhagen, Madrid, Paris
                                    </option>
                                    <option value="(GMT +2:00) Kaliningrad, South Africa">(GMT +2:00) Kaliningrad, South
                                        Africa
                                    </option>
                                    <option value="(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg">(GMT +3:00)
                                        Baghdad, Riyadh, Moscow, St. Petersburg
                                    </option>
                                    <option value="(GMT +3:30) Tehran">(GMT +3:30) Tehran</option>
                                    <option value="(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi">(GMT +4:00) Abu Dhabi,
                                        Muscat, Baku, Tbilisi
                                    </option>
                                    <option value="(GMT +4:30) Kabul">(GMT +4:30) Kabul</option>
                                    <option value="(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent">(GMT +5:00)
                                        Ekaterinburg, Islamabad, Karachi, Tashkent
                                    </option>
                                    <option value="(GMT +5:30) Bombay, Calcutta, Madras, New Delhi">(GMT +5:30) Bombay,
                                        Calcutta, Madras, New Delhi
                                    </option>
                                    <option value="(GMT +5:45) Kathmandu, Pokhara">(GMT +5:45) Kathmandu, Pokhara
                                    </option>
                                    <option value="(GMT +6:00) Almaty, Dhaka, Colombo">(GMT +6:00) Almaty, Dhaka,
                                        Colombo
                                    </option>
                                    <option value="(GMT +6:30) Yangon, Mandalay">(GMT +6:30) Yangon, Mandalay</option>
                                    <option value="(GMT +7:00) Bangkok, Hanoi, Jakarta">(GMT +7:00) Bangkok, Hanoi,
                                        Jakarta
                                    </option>
                                    <option value="(GMT +8:00) Beijing, Perth, Singapore, Hong Kong">(GMT +8:00)
                                        Beijing, Perth, Singapore, Hong Kong
                                    </option>
                                    <option value="(GMT +8:45) Eucla">(GMT +8:45) Eucla</option>
                                    <option value="(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk">(GMT +9:00) Tokyo,
                                        Seoul, Osaka, Sapporo, Yakutsk
                                    </option>
                                    <option value="(GMT +9:30) Adelaide, Darwin">(GMT +9:30) Adelaide, Darwin</option>
                                    <option value="(GMT +10:00) Eastern Australia, Guam, Vladivostok">(GMT +10:00)
                                        Eastern Australia, Guam, Vladivostok
                                    </option>
                                    <option value="(GMT +10:30) Lord Howe Island">(GMT +10:30) Lord Howe Island</option>
                                    <option value="(GMT +11:00) Magadan, Solomon Islands, New Caledonia">(GMT +11:00)
                                        Magadan, Solomon Islands, New Caledonia
                                    </option>
                                    <option value="(GMT +11:30) Norfolk Island">(GMT +11:30) Norfolk Island</option>
                                    <option value="(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka">(GMT +12:00)
                                        Auckland, Wellington, Fiji, Kamchatka
                                    </option>
                                    <option value="(GMT +12:45) Chatham Islands">(GMT +12:45) Chatham Islands</option>
                                    <option value="(GMT +13:00) Apia, Nukualofa">(GMT +13:00) Apia, Nukualofa</option>
                                    <option value="(GMT +14:00) Line Islands, Tokelau">(GMT +14:00) Line Islands,
                                        Tokelau
                                    </option>
                                </select>
                            </div>
                            <div class="error"
                                 v-if="errors.timezone">
                                {{errors.timezone[0]}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter main e-mail address
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
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Email address of accounts dept
                            </label>
                            <div class="faq-input"
                                 :class="{ 'error-input' : errors.department_email}">
                                <input type="text"
                                       name="department_email"
                                       placeholder="Enter your email dept"
                                       v-model="formData.department_email">
                                <img src="/images/client/campaign_activity/close_black.png"
                                     alt="delete icon"
                                     v-show="formData.department_email.length > 0"
                                     @click="clearInput('department_email')"
                                >
                            </div>
                            <div class="error"
                                 v-if="errors.department_email">
                                {{errors.department_email[0]}}
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
</template>
<script>
    export default {
        props:['referral_code'],
        data() {
            return {
                formData: {
                    name: '',
                    email: '',
                    agency: '',
                    department_email: '',
                    phone: '',
                    timezone: '',
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
                axios.post('/client/register', this.formData)
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
    .error {
        font-family: Roboto;
        font-style: normal;
        font-weight: normal;
        font-size: 16px;
        line-height: 30px;
        /* identical to box height, or 187% */
        color: #F56F6F;
    }

    .account-edit-section-edit-btn:hover {
        color: white;
    }
</style>
