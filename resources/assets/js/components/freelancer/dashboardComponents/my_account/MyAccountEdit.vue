<template>
    <div class="d-flex justify-content-center">
        <div class="account-info-edit-wrapper">
            <nav class="navbar navbar-light fixed-top dashboard_navbar">
                <div class="backBtn">
                    <a href="/freelancer/dashboard/my-account">
                        <img src="/images/client/arrow_back.png" alt="back-icon">
                    </a>
                    YOUR PERSONAL INFORMATION
                </div>
            </nav>

            <div class="account-info-edit dashboard-box">
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
                        PERSONAL INFORMATION
                    </div>
                    <div class="account-edit-section-inputs">
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter your name
                            </label>
                            <div class="faq-input"
                                 :class="{ 'error-input' : errors.name }"
                            >
                                <input type="text"
                                       name="faq"
                                       placeholder="Agent name"
                                       v-model="agent.name">
                                <img src="/images/client/campaign_activity/close_black.png" 
                                    @click="clearInput('name')"
                                    alt="delete icon" 
                                    v-show="agent.name.length > 0">
                            </div>
                            <div class="error" v-if="showErrors && errors.name">
                                {{errors.name}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter your surname
                            </label>
                            <div class="faq-input"
                                 :class="{ 'error-input' : errors.surname }"
                            >
                                <input type="text"
                                       name="faq"
                                       placeholder="Agent surname"
                                       v-model="agent.surname">
                                <img src="/images/client/campaign_activity/close_black.png" 
                                    @click="clearInput('surname')"
                                    alt="delete icon" 
                                    v-show="agent.surname.length > 0">
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
                                    <img v-on:click="agent.gender = 'M'"
                                        :src="`/images/icons/${(agent.gender === 'M') ? 'male_icon_pressed' : 'male_icon'}.svg`">
                                    <img v-on:click="agent.gender = 'F'"
                                        :src="`/images/icons/${(agent.gender === 'F') ? 'female_icon_pressed' : 'female_icon'}.svg`">
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
                            <div class="faq-input">
                                <flag-dropdown>
                                    <input type="text" name="phone" placeholder="Your phone number">
                                    <img src="/images/client/campaign_activity/close_black.png" 
                                        @click="clearInput('phone')"
                                        alt="delete icon" 
                                        v-show="agent.phone.length > 0">
                                </flag-dropdown>                    
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter your e-mail
                            </label>
                            <div class="faq-input" :class="{ 'error-input' : errors.email}">
                                <input type="text"
                                       name="faq"
                                       v-model="agent.email"
                                       placeholder="Your email">
                                <img src="/images/client/campaign_activity/close_black.png"
                                     @click="clearInput('email')"
                                     alt="delete icon" v-show="agent.email">
                            </div>
                            <div class="error" v-if="showErrors && errors.email">
                                {{errors.email}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Select your time zone
                            </label>
                            <div class="faq-input" :class="{ 'error-input' : errors.timezone}">
                                <select class="form-control" id="timezone" name="timezone" style="height: 50px;"
                                        v-model="agent.timezone">
                                    <option value="" selected="selected">Select your timezone</option>
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
                            <div class="error" v-if="showErrors && errors.timezone">
                                {{errors.timezone}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter your city name
                            </label>
                            <div class="faq-input" :class="{ 'error-input' : errors.city}">
                                <input type="text" name="city" placeholder="Enter your city" v-model="agent.city">
                                <img src="/images/client/campaign_activity/close_black.png" @click="clearInput('city')"
                                    alt="delete icon" v-show="agent.city.length > 0">
                            </div>
                            <div class="error" v-if="showErrors && errors.city">
                                {{errors.city}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter your PayPal acc number
                            </label>
                            <div class="faq-input" :class="{ 'error-input' : errors.paypal}">
                                <input type="text" name="paypal" placeholder="Enter your paypal ID" v-model="agent.paypal">
                                <img src="/images/client/campaign_activity/close_black.png" @click="clearInput('paypal')"
                                    alt="delete icon" v-show="agent.paypal.length > 0">
                            </div>
                            <div class="error" v-if="showErrors && errors.paypal">
                                {{errors.paypal}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="account-edit-section-inputs">
                    <div class="faq-question-input account-edit-input">
                        <label class="faq-input-label">
                            Write a new password
                        </label>
                        <div class="faq-input" :class="{ 'error-input' : errors.password}">
                            <input type="password"
                                name="faq"
                                placeholder="*********"
                                v-model="password">
                            <img src="/images/client/campaign_activity/close_black.png"
                                @click="password = ''" alt="delete icon"
                                v-show="password">
                        </div>
                        <div class="error" v-if="showErrors && errors.password">
                            {{errors.password}}
                        </div>
                    </div>
                    <div class="faq-question-input account-edit-input">
                        <label class="faq-input-label">
                            Repeat your new password
                        </label>
                        <div class="faq-input" :class="{ 'error-input' : errors.password_confirmation}">
                            <input type="password"
                                name="faq"
                                placeholder="*********"
                                v-model="password_confirmation">
                            <img src="/images/client/campaign_activity/close_black.png"
                                @click="password_confirmation = ''" alt="delete icon"
                                v-show="password_confirmation">
                        </div>
                        <div class="error" v-if="showErrors && errors.password_confirmation">
                            {{errors.password_confirmation}}
                        </div>
                    </div>
                </div>
                <div class="account-edit-section-edit-btn no-decoration">
                    <a class="btn-primary" href="#">
                        SAVE EDITS
                    </a>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    import flagDropdown from '../../../flagsDropdown.vue'

    export default {
        components: {
            "flag-dropdown": flagDropdown
        },
      data(){
          return {
              agent:{
                  name: '',
                  surname: '',
                  email: '',
                  timezone: '',
                  phone: '',
                  gender: '',
                  city: '',
                  paypal: ''
              },
              errors: {
                name: '',
                surname: '',
                email: '',
                timezone: '',
                phone: '',
                gender: '',
                city: '',
                paypal: '',
                password: '',
                password_confirmation: ''
              },
              password: '',
              password_confirmation: '',
              showErrors: false
          }
      },
      methods:{
            noErrors () {
                let noErrorsName = this.noErrorsName()
                let noErrorsSurname = this.noErrorsSurname()
                let noErrorsEmail = this.noErrorsEmail()
                let noErrorsPaypal = this.noErrorsPaypal()
                let noErrorsGender = this.noErrorsGender()
                let noErrorsPhone = this.noErrorsPhone()
                let noErrorsCity = this.noErrorsCity()
                let noErrorsTimeZone = this.noErrorsTimeZone()
                let noErrorsPassword = this.noErrorsPassword()

                return (
                    noErrorsName &&
                    noErrorsSurname &&
                    noErrorsEmail &&
                    noErrorsPaypal &&
                    noErrorsGender &&
                    noErrorsPhone &&
                    noErrorsCity &&
                    noErrorsTimeZone &&
                    noErrorsPassword
                )
            },
            noErrorsName () {
                let valid = true
                
                // Empty field
                if (this.name.trim() !== '') {
                    valid = false;
                    this.errors.name = 'Please fill this field'
                } else {
                    this.errors.name = ''
                }

                return valid
            },
            noErrorsSurname () {
                let valid = true
                
                // Empty field
                if (this.surname.trim() !== '') {
                    valid = false;
                    this.errors.surname = 'Please fill this field'
                } else {
                    this.errors.surname = ''
                }

                return valid
            },
            noErrorsEmail () {
                let valid = true
                let emailRegex = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/g

                if (!emailRegex.test(this.agent.email)) {
                    valid = false;
                    this.errors.email = 'Invalid email format'
                } else {
                    this.errors.email = ''
                }

                return valid
            },
            noErrorsPaypal () {
                let valid = true


                if (this.agent.paypal.trim() !== '') {
                    valid = false
                    this.errors.paypal = 'Please fill this field'
                } else if (/\d{9}/.test(this.agent.paypal)) {
                    valid = false
                    this.errors.paypal = 'This is not a valid paypal ID'
                } else {
                    this.errors.paypal = ''
                }

                return valid
            },
            noErrorsTimeZone () {
                let valid = true

                if (this.agent.timezone === '') {
                    valid = false
                    this.errors.timezone = 'Select a timezone'
                } else {
                    this.errors.timezone = ''
                }

                return valid
            },
            noErrorsCity () {
                let valid = true

                if (this.agent.city.trim === '') {
                    valid = false
                    this.errors.city = 'Please fill this field'
                } else {
                    this.errors.city = ''
                }

                return valid
            },
            noErrorsPassword() {
                let valid = true;

                // Empty field
                if (this.password.trim() !== this.password_confirmation.trim()) {
                    valid = false;
                    this.errors.password = 'Password doesn\'t match';
                } else {
                    this.errors.password = '';
                }

                return valid
            }
      }
    }
</script>

<style scoped>

</style>