<template>
    <div class="account-info-edit dashboard-box">
        <div class="account-info-edit-heading dashboard-box-heading">
            <div class="left">
                <img src="/images/dashboard/info.svg" alt="info icon">
                <span>
            FILL IN THE INFORMATION TO REGISTER
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
                        Enter your name
                    </label>
                    <div class="faq-input" :class="{ 'error-input' : errors.name}">
                        <input type="text" name="name" placeholder="Enter your name" v-model="personalData.name">
                        <img src="/images/client/campaign_activity/close_black.png"
                             alt="delete icon"
                             v-show="personalData.name.length > 0"
                             @click="clearInput('name')"
                        >
                    </div>
                    <div class="error" v-if="showErrors && errors.name">
                        {{errors.name}}
                    </div>
                </div>
                <div class="faq-question-input account-edit-input">
                    <label class="faq-input-label">
                        Enter your surname
                    </label>
                    <div class="faq-input" :class="{ 'error-input' : errors.surname}">
                        <input type="text" name="surname" placeholder="Enter your surname"
                               v-model="personalData.surname">
                        <img src="/images/client/campaign_activity/close_black.png" @click="clearInput('surname')"
                             alt="delete icon" v-show="personalData.surname.length > 0">
                    </div>
                    <div class="error" v-if="showErrors && errors.surname">
                        {{errors.surname}}
                    </div>
                </div>
                <div class="faq-question-input account-edit-input">
                    <label class="faq-input-label">
                        Choose your gender
                    </label>
                    <div class="img-container">
                        <div class="faq-input" :class="{ 'error-input' : errors.gender}">
                            <img v-on:click="personalData.gender = 'M'"
                                 :src="`/images/icons/${(personalData.gender === 'M') ? 'male_icon_pressed' : 'male_icon'}.svg`">
                            <img v-on:click="personalData.gender = 'F'"
                                 :src="`/images/icons/${(personalData.gender === 'F') ? 'female_icon_pressed' : 'female_icon'}.svg`">
                        </div>
                    </div>
                    <div class="error" v-if="showErrors && errors.gender">
                        {{errors.gender}}
                    </div>
                </div>
                <div class="faq-question-input account-edit-input">
                    <label class="faq-input-label">
                        Enter your phone number
                    </label>
                    <div class="faq-input" :class="{ 'error-input' : errors.phone}">
                        <input type="text" name="phone" placeholder="123-3534634" v-model="personalData.phone">
                        <img src="/images/client/campaign_activity/close_black.png" @click="clearInput('phone')"
                             alt="delete icon" v-show="personalData.phone.length > 0">
                    </div>
                    <div class="error" v-if="showErrors && errors.phone">
                        {{errors.phone}}
                    </div>
                </div>
                <div class="faq-question-input account-edit-input">
                    <label class="faq-input-label">
                        Enter your e-mail
                    </label>
                    <div class="faq-input" :class="{ 'error-input' : errors.email}">
                        <input type="text" name="email" placeholder="Enter your email" v-model="personalData.email">
                        <img src="/images/client/campaign_activity/close_black.png" @click="clearInput('email')"
                             alt="delete icon" v-show="personalData.email.length > 0">
                    </div>
                    <div class="error" v-if="showErrors && errors.email">
                        {{errors.email}}
                    </div>
                </div>
                <div class="faq-question-input account-edit-input">
                    <label class="faq-input-label">
                        Select your time zone
                    </label>
                    <div class="faq-input" :class="{ 'error-input' : errors.timeZone}">
                        <div class="select-icon"></div>
                        <select class="form-control" id="timeZone" name="timeZone" style="height: 50px;"
                                v-model="personalData.timeZone">
                            <option value="" selected="selected">Select your timezone</option>
                            <option value="(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima">(GMT -5:00) Eastern
                                Time (US & Canada), Bogota, Lima
                            </option>
                            <option value="(GMT -6:00) Central Time (US & Canada), Mexico City">(GMT -6:00) Central Time
                                (US & Canada), Mexico City
                            </option>
                            <option value="(GMT -7:00) Mountain Time (US & Canada)">(GMT -7:00) Mountain Time (US &
                                Canada)
                            </option>
                            <option value="(GMT -8:00) Pacific Time (US & Canada)">(GMT -8:00) Pacific Time (US &
                                Canada)
                            </option>
                            <option value="(GMT -9:00) Alaska">(GMT -9:00) Alaska</option>
                            <option value="">--------------</option>
                            <option value="(GMT -12:00) Eniwetok, Kwajalein">(GMT -12:00) Eniwetok, Kwajalein</option>
                            <option value="(GMT -11:00) Midway Island, Samoa">(GMT -11:00) Midway Island, Samoa</option>
                            <option value="(GMT -10:00) Hawaii">(GMT -10:00) Hawaii</option>
                            <option value="(GMT -9:30) Taiohae">(GMT -9:30) Taiohae</option>
                            <option value="(GMT -9:00) Alaska">(GMT -9:00) Alaska</option>
                            <option value="(GMT -8:00) Pacific Time (US & Canada)">(GMT -8:00) Pacific Time (US &
                                Canada)
                            </option>
                            <option value="(GMT -7:00) Mountain Time (US & Canada)">(GMT -7:00) Mountain Time (US &
                                Canada)
                            </option>
                            <option value="(GMT -6:00) Central Time (US & Canada), Mexico City">(GMT -6:00) Central Time
                                (US & Canada), Mexico City
                            </option>
                            <option value="(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima">(GMT -5:00) Eastern
                                Time (US & Canada), Bogota, Lima
                            </option>
                            <option value="(GMT -4:30) Caracas">(GMT -4:30) Caracas</option>
                            <option value="(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz">(GMT -4:00) Atlantic
                                Time (Canada), Caracas, La Paz
                            </option>
                            <option value="(GMT -3:30) Newfoundland">(GMT -3:30) Newfoundland</option>
                            <option value="(GMT -3:00) Brazil, Buenos Aires, Georgetown">(GMT -3:00) Brazil, Buenos
                                Aires, Georgetown
                            </option>
                            <option value="(GMT -2:00) Mid-Atlantic">(GMT -2:00) Mid-Atlantic</option>
                            <option value="(GMT -1:00) Azores, Cape Verde Islands">(GMT -1:00) Azores, Cape Verde
                                Islands
                            </option>
                            <option value="(GMT +0:00) Western Europe Time, London, Lisbon, Casablanca">(GMT +0:00)
                                Western Europe Time, London, Lisbon, Casablanca
                            </option>
                            <option value="(GMT +1:00) Brussels, Copenhagen, Madrid, Paris">(GMT +1:00) Brussels,
                                Copenhagen, Madrid, Paris
                            </option>
                            <option value="(GMT +2:00) Kaliningrad, South Africa">(GMT +2:00) Kaliningrad, South
                                Africa
                            </option>
                            <option value="(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg">(GMT +3:00) Baghdad,
                                Riyadh, Moscow, St. Petersburg
                            </option>
                            <option value="(GMT +3:30) Tehran">(GMT +3:30) Tehran</option>
                            <option value="(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi">(GMT +4:00) Abu Dhabi, Muscat,
                                Baku, Tbilisi
                            </option>
                            <option value="(GMT +4:30) Kabul">(GMT +4:30) Kabul</option>
                            <option value="(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent">(GMT +5:00)
                                Ekaterinburg, Islamabad, Karachi, Tashkent
                            </option>
                            <option value="(GMT +5:30) Bombay, Calcutta, Madras, New Delhi">(GMT +5:30) Bombay,
                                Calcutta, Madras, New Delhi
                            </option>
                            <option value="(GMT +5:45) Kathmandu, Pokhara">(GMT +5:45) Kathmandu, Pokhara</option>
                            <option value="(GMT +6:00) Almaty, Dhaka, Colombo">(GMT +6:00) Almaty, Dhaka, Colombo
                            </option>
                            <option value="(GMT +6:30) Yangon, Mandalay">(GMT +6:30) Yangon, Mandalay</option>
                            <option value="(GMT +7:00) Bangkok, Hanoi, Jakarta">(GMT +7:00) Bangkok, Hanoi, Jakarta
                            </option>
                            <option value="(GMT +8:00) Beijing, Perth, Singapore, Hong Kong">(GMT +8:00) Beijing, Perth,
                                Singapore, Hong Kong
                            </option>
                            <option value="(GMT +8:45) Eucla">(GMT +8:45) Eucla</option>
                            <option value="(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk">(GMT +9:00) Tokyo, Seoul,
                                Osaka, Sapporo, Yakutsk
                            </option>
                            <option value="(GMT +9:30) Adelaide, Darwin">(GMT +9:30) Adelaide, Darwin</option>
                            <option value="(GMT +10:00) Eastern Australia, Guam, Vladivostok">(GMT +10:00) Eastern
                                Australia, Guam, Vladivostok
                            </option>
                            <option value="(GMT +10:30) Lord Howe Island">(GMT +10:30) Lord Howe Island</option>
                            <option value="(GMT +11:00) Magadan, Solomon Islands, New Caledonia">(GMT +11:00) Magadan,
                                Solomon Islands, New Caledonia
                            </option>
                            <option value="(GMT +11:30) Norfolk Island">(GMT +11:30) Norfolk Island</option>
                            <option value="(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka">(GMT +12:00) Auckland,
                                Wellington, Fiji, Kamchatka
                            </option>
                            <option value="(GMT +12:45) Chatham Islands">(GMT +12:45) Chatham Islands</option>
                            <option value="(GMT +13:00) Apia, Nukualofa">(GMT +13:00) Apia, Nukualofa</option>
                            <option value="(GMT +14:00) Line Islands, Tokelau">(GMT +14:00) Line Islands, Tokelau
                            </option>
                        </select>
                    </div>
                    <div class="error" v-if="showErrors && errors.timeZone">
                        {{errors.timeZone}}
                    </div>
                </div>
                <div class="faq-question-input account-edit-input">
                    <label class="faq-input-label">
                        Enter your city name
                    </label>
                    <div class="faq-input" :class="{ 'error-input' : errors.cityName}">
                        <input type="text" name="cityName" placeholder="You can enter several items using comas"
                               v-model="personalData.cityName">
                        <img src="/images/client/campaign_activity/close_black.png"
                             alt="delete icon"
                             v-show="personalData.cityName.length > 0"
                             @click="clearInput('cityName')"
                        >
                    </div>
                    <div class="error" v-if="showErrors && errors.cityName">
                        {{errors.cityName}}
                    </div>
                </div>
                <div class="faq-question-input account-edit-input">
                    <label class="faq-input-label">
                        Enter your PayPal acc number
                    </label>
                    <div class="faq-input" :class="{ 'error-input' : errors.paypal}">
                        <input type="text" name="paypal" placeholder="Enter your PayPal acc number"
                               v-model="personalData.paypal">
                        <img src="/images/client/campaign_activity/close_black.png"
                             alt="delete icon"
                             v-show="personalData.paypal.length > 0"
                             @click="clearInput('paypal')"
                        >
                    </div>
                    <div class="error" v-if="showErrors && errors.paypal">
                        {{errors.paypal}}
                    </div>
                </div>
            </div>
        </div>
        <div class="account-edit-section-edit-btn no-decoration" :class="{'disabled-btn' : !canSubmit}"
             id="submitBtnWrapper">
            <a class="btn-primary" href="javascript:void(0)" v-on:click="nextStep">
                CONTINUE
            </a>
        </div>
    </div>
</template>
<script>
    import FlagDropdown from '../../flagsDropdown.vue'

    export default {
        props: ['changeStep', 'getData'],
        components: {
            'flag-dropdown': FlagDropdown
        },
        data() {
            return {
                personalData: {
                    name: '',
                    profession_id: '',
                    surname: '',
                    gender: '',
                    phone: '',
                    email: '',
                    timeZone: '',
                    cityName: '',
                    paypal: ''
                },
                canSubmit: true,
                errors: {
                    name: '',
                    surname: '',
                    gender: '',
                    phone: '',
                    email: '',
                    timeZone: '',
                    cityName: '',
                    paypal: ''
                },
                showErrors: false
            }
        },
        methods: {
            nextStep(e) {
                e.preventDefault()
                // this.canSubmit = true
                if (this.noErrors()) {
                    this.getData({personalData: {...this.personalData}})
                    this.$router.push('/freelancer/register/page2')
                } else
                    this.showErrors = true
            },
            noErrors() {
                let noErrorsName = this.noErrorsName()
                let noErrorsPhone = this.noErrorsPhone()
                let noErrorsEmail = this.noErrorsEmail()
                let noErrorsPaypal = this.noErrorsPaypal()
                let noErrorsGender = this.noErrorsGender()
                let noErrorsSurname = this.noErrorsSurname()
                let noErrorsTimeZone = this.noErrorsTimeZone()
                let noErrorsCityName = this.noErrorsCityName()

                return (
                    noErrorsName &&
                    noErrorsPhone &&
                    noErrorsEmail &&
                    noErrorsPaypal &&
                    noErrorsGender &&
                    noErrorsSurname &&
                    noErrorsTimeZone &&
                    noErrorsCityName
                )
            },
            noErrorsName() {
                let valid = true

                // Empty field
                if (this.personalData.name.trim() === '') {
                    valid = false
                    this.errors.name = 'Please, enter your name'
                } else this.errors.name = ''
                // Invalid characters (?)
                return valid
            },
            noErrorsSurname() {
                let valid = true

                // Empty field
                if (this.personalData.surname.trim() === '') {
                    valid = false
                    this.errors.surname = 'Please, enter your surname'
                } else this.errors.surname = ''

                // Invalid characters (?)
                return valid
            },
            noErrorsGender() {
                let valid = true

                // Empty field
                if (this.personalData.gender.trim() === '') {
                    valid = false
                    this.errors.gender = 'Choose a gender'
                } else this.errors.gender = ''

                return valid
            },
            noErrorsPhone() {
                let valid = true
                let phoneFormat = /[0-9]{7}/

                if (this.personalData.phone.trim() === '') {
                    // Empty field
                    valid = false
                    this.errors.phone = 'Please enter your phone number'
                } else if (!phoneFormat.test(this.personalData.phone)) {
                    // Review the regExp
                    valid = false
                    this.errors.phone = 'This not a valid phone number format'
                } else this.errors.phone = '';

                return valid
            },
            noErrorsEmail() {
                let valid = true
                let emailFormat = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/

                if (this.personalData.email.trim() === '') {
                    // Empty field
                    valid = false
                    this.errors.email = 'Please, enter your email'
                } else if (!emailFormat.test(this.personalData.email)) {
                    valid = false
                    this.errors.email = 'This email not has a valid format. Please check again'
                } else this.errors.email = ''

                return valid
            },
            noErrorsTimeZone() {
                let valid = true

                if (this.personalData.timeZone.trim() === '') {
                    // Empty field
                    valid = false
                    this.errors.timeZone = 'Please, select a time zone'
                } else this.errors.timeZone = ''

                return valid
            },
            noErrorsCityName() {
                let valid = true

                if (this.personalData.cityName.trim() === '') {
                    // Empty field
                    valid = false
                    this.errors.cityName = 'Please, enter a city'
                } else this.errors.cityName = ''

                return valid
            },
            noErrorsPaypal() {
                let valid = true
                let paypalRegex = /\d{9}/

                if (this.personalData.paypal.trim() === '') {
                    // Empty field
                    valid = false
                    this.errors.paypal = 'Please, enter your paypal id'
                } else if (!paypalRegex.test(this.personalData.paypal)) {
                    valid = false
                    this.errors.paypal = 'Paypal acc number must contain 9 digits. Only numbers are allowed'
                } else this.errors.paypal = ''

                return valid
            },
            clearInput(name) {
                this.personalData[name] = ''
            }
        },
        mounted() {
            let agentType = this.$route.query.agent;
            switch (agentType) {
                case 'business-support' :
                    this.personalData.profession_id = 1;
                    break;
                case 'developer' :
                    this.personalData.profession_id = 2;
                    break;
                case 'designer' :
                    this.personalData.profession_id = 3;
                    break;
            }
        }
    }
</script>

