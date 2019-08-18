<template>
    <div class="d-flex justify-content-center">
        <div class="account-info-edit-wrapper">
            <nav class="navbar navbar-light fixed-top dashboard_navbar">
                <div class="backBtn">
                    <a href="/client/dashboard/my-account">
                        <img src="/images/client/arrow_back.png" alt="back-icon">
                    </a>
                    ACCOUNT INFORMATION
                </div>
            </nav>
            <div class="account-info-edit dashboard-box">
                <div class="account-info-edit-heading dashboard-box-heading">
                    <div class="left">
                        <img src="/images/client/my_account/info_40px.png" alt="info icon">
                        <span>
                        EDIT ACCOUNT INFORMATION
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
                                 :class="{ 'error-input' : errors.agency }"
                            >
                                <input type="text"
                                       name="faq"
                                       placeholder="Enter your ..."
                                       v-model="client.agency">
                                <img src="/images/client/campaign_activity/close_black.png"
                                     alt="delete icon"
                                     v-show="client.agency.length > 0"
                                     @click="clearInput('agency')"
                                >
                            </div>
                            <div class="error" v-if="showErrors && errors.agency">
                                {{errors.agency}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter name of contact person
                            </label>
                            <div class="faq-input"
                                 :class="{ 'error-input' : errors.name}"
                            >
                                <input type="text"
                                       name="name"
                                       v-model="client.name"
                                       placeholder="Enter your ...">
                                <img src="/images/client/campaign_activity/close_black.png" alt="delete icon"
                                     v-show="client.name.length > 0"
                                     @click="clearInput('name')"
                                >
                            </div>
                            <div class="error" v-if="showErrors && errors.name">
                                {{errors.name}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter contact phone
                            </label>
                            <div class="faq-input" :class="{ 'error-input' : errors.contact}">
                                <input type="text"
                                       name="contact"
                                       v-model="client.contact"
                                       placeholder="Enter your ...">
                                <img src="/images/client/campaign_activity/close_black.png" alt="delete icon"
                                     v-show="client.contact.length > 0"
                                     @click="clearInput('contact')"
                                >
                            </div>
                            <div class="error" v-if="showErrors && errors.contact">
                                {{errors.contact}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Select your time zone
                            </label>
                            <div class="faq-input" :class="{ 'error-input' : errors.timeZone}">
                                <select class="form-control" id="timeZone" name="timeZone" style="height: 50px;"
                                        v-model="client.timeZone">
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
                            <div class="error" v-if="showErrors && errors.timeZone">
                                {{errors.timeZone}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Email address of accounts dept
                            </label>
                            <div class="faq-input" :class="{ 'error-input' : errors.email}">
                                <input type="text"
                                       name="faq"
                                       v-model="client.email"
                                       placeholder="Enter your ...">
                                <img src="/images/client/campaign_activity/close_black.png" @click="clearInput('email')"
                                     alt="delete icon" v-show="client.email.length > 0">
                            </div>
                        </div>
                        <div class="error" v-if="showErrors && errors.email">
                            {{errors.email}}
                        </div>
                    </div>
                </div>
                <div class="account-edit-section flex-row flex-wrap justify-content-between sub-section">
                    <div class="faq-question-input account-edit-input">
                        <label class="faq-input-label">
                            Enter your company website
                        </label>
                        <div class="faq-input" :class="{ 'error-input' : errors.website}">
                            <input type="text"
                                   name="faq"
                                   placeholder="Enter your ..."
                                   v-model="client.website"
                            >
                            <img src="/images/client/campaign_activity/close_black.png"
                                 @click="clearInput('website')" alt="delete icon" v-show="client.website.length > 0">
                        </div>
                        <div class="error" v-if="showErrors && errors.website">
                            {{errors.website}}
                        </div>
                    </div>
                    <div class="faq-question-input account-edit-input">
                        <label class="faq-input-label">
                            Enter your Skype ID
                        </label>
                        <div class="faq-input" :class="{ 'error-input' : errors.skype}">
                            <input type="text"
                                   name="faq"
                                   placeholder="Enter your ..."
                                   v-model="client.skype"
                            >
                            <img src="/images/client/campaign_activity/close_black.png"
                                 @click="clearInput('skype')" alt="delete icon" v-show="client.skype.length > 0">
                        </div>
                        <div class="error" v-if="showErrors && errors.skype">
                            {{errors.skype}}
                        </div>
                    </div>
                    <div class="faq-question-input account-edit-input">
                        <label class="faq-input-label">
                            Enter second contact person
                        </label>
                        <div class="faq-input" :class="{ 'error-input' : errors.secondContactName}">
                            <input type="text"
                                   name="faq"
                                   placeholder="Enter your ..."
                                   v-model="client.secondContactName">
                            <img src="/images/client/campaign_activity/close_black.png"
                                 @click="clearInput('secondContactName')" alt="delete icon"
                                 v-show="client.secondContactName.length > 0"
                            >
                        </div>
                        <div class="error" v-if="showErrors && errors.secondContactName">
                            {{errors.secondContactName}}
                        </div>
                    </div>
                    <div class="faq-question-input account-edit-input">
                        <label class="faq-input-label">
                            Enter second contact phone
                        </label>
                        <div class="faq-input" :class="{ 'error-input' : errors.secondContact}">
                            <input type="text"
                                   name="faq"
                                   placeholder="Enter your ..."
                                   v-model="client.secondContact">
                            <img src="/images/client/campaign_activity/close_black.png"
                                 @click="clearInput('secondContact')" alt="delete icon"
                                 v-show="client.secondContact.length > 0"
                            >
                        </div>
                        <div class="error" v-if="showErrors && errors.secondContact">
                            {{errors.secondContact}}
                        </div>
                    </div>
                </div>
                <div class="account-edit-section">
                    <div class="account-edit-section-heading">
                        PREFERRED CONTACT
                    </div>
                    <div class="account-edit-section-inputs flex">
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Choose your preferred contact
                            </label>
                            <div class="faq-input-label sub-label">
                                Please state here the preferred way that you would like to communicate with your agent.
                            </div>
                            <div class="faq-input" :class="{ 'error-input' : errors.preferred1}">
                                <input type="text"
                                       name="faq"
                                       placeholder="Enter your ..."
                                       v-model="client.preferred1">
                                <img src="/images/client/campaign_activity/close_black.png"
                                     @click="clearInput('preferred1')" alt="delete icon"
                                     v-show="client.preferred1.length > 0">
                            </div>
                            <div class="faq-input mt-4" :class="{ 'error-input' : errors.preferred2}">
                                <input type="text"
                                       name="faq"
                                       placeholder="Enter your ..."
                                       v-model="client.preferred2">
                                <img src="/images/client/campaign_activity/close_black.png"
                                     @click="clearInput('preferred2')" alt="delete icon"
                                     v-show="client.preferred2.length > 0">
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
                            <div class="faq-input" :class="{ 'error-input' : errors.password}">
                                <input type="password"
                                       name="faq"
                                       placeholder="Enter your ..."
                                       v-model="client.password">
                                <img src="/images/client/campaign_activity/close_black.png"
                                     @click="clearInput('password')" alt="delete icon"
                                     v-show="client.password.length > 0">
                            </div>
                            <div class="error" v-if="showErrors && errors.password">
                                {{errors.password}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Repeat your new password
                            </label>
                            <div class="faq-input" :class="{ 'error-input' : errors.password2}">
                                <input type="password"
                                       name="faq"
                                       placeholder="Enter your ..."
                                       v-model="client.password2">
                                <img src="/images/client/campaign_activity/close_black.png"
                                     @click="clearInput('password2')" alt="delete icon"
                                     v-show="client.password2.length > 0">
                            </div>
                            <div class="error" v-if="showErrors && errors.password2">
                                {{errors.password2}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="account-edit-section-edit-btn no-decoration" :class="{'disabled-btn' : !canSubmit}">
                    <a class="btn-primary" href="#">
                        APPLY EDITS
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
                user:{},
                client: {
                    name: 'Ahmed Marzouk',
                    agency: 'The best agency',
                    contact: ' 0044203700685',
                    website: 'mywebsite.com',
                    secondContact: '0044203700685',
                    secondContactName: 'Jhon Doe',
                    skype: 'ahmed24',
                    timeZone: '',
                    email: 'test@gmail.com',
                    preferred1: 'email',
                    preferred2: 'phone',
                    password: '12345678',
                    password2: '12345678'
                },
                canSubmit: false,
                errors: {
                    name: '',
                    agency: '',
                    contact: '',
                    website: '',
                    secondContact: '',
                    secondContactName: '',
                    skype: '',
                    timeZone: '',
                    email: '',
                    preferred1: '',
                    preferred2: '',
                    password: '',
                    password2: ''
                },
                showErrors: false
            }
        },
        methods: {

            getCurrentClient(){
                axios.get('/client/current').then( (response) => {
                    // response is user with client relationship
                    this.user = response.data ;
                });
            },

            nextStep(e) {
                e.preventDefault()
                // this.canSubmit = true
                if (this.noErrors()) {
                    // send data tu server
                } else
                    this.showErrors = true

            },
            noErrors() {
                let noErrorsName = this.noErrorsName()
                let noErrorsContact = this.noErrorsContact()
                let noErrorsSecondContact = this.noErrorsSecondContact()
                let noErrorsSecondContactName = this.noErrorsSecondContactName()
                let noErrorsEmail = this.noErrorsEmail()
                let noErrorsSkype = this.noErrorsSkype()
                let noErrorsAgency = this.noErrorsAgency()
                let noErrorsTimeZone = this.noErrorsTimeZone()
                let noErrorsWebSite = this.noErrorsWebSite()
                let noErrorsPreferred1 = this.noErrorsPreferred1()
                let noErrorsPassword = this.noErrorsPassword()
                let noErrorsPassword2 = this.noErrorsPassword2()

                return (
                    noErrorsName &&
                    noErrorsContact &&
                    noErrorsSecondContact &&
                    noErrorsSecondContactName &&
                    noErrorsPreferred1 &&
                    noErrorsEmail &&
                    noErrorsSkype &&
                    noErrorsAgency &&
                    noErrorsTimeZone &&
                    noErrorsWebSite &&
                    noErrorsPassword &&
                    noErrorsPassword2
                )
            },
            noErrorsPassword() {
                let valid = true

                // Empty field
                if (this.client.password.trim() === '') {
                    valid = false
                    this.errors.password = 'Please, enter your password'
                } else this.errors.password = ''
                // Invalid characters (?)
                return valid
            },
            noErrorsPassword2() {
                let valid = true

                if (this.client.password2 !== this.client.password) {
                    valid = false
                    this.errors.password2 = 'The passwords doesn\'t match'
                } else this.errors.password2 = ''

                return valid
            },
            noErrorsName() {
                let valid = true

                // Empty field
                if (this.client.name.trim() === '') {
                    valid = false
                    this.errors.name = 'Please, enter your name'
                } else this.errors.name = ''
                // Invalid characters (?)
                return valid
            },
            noErrorsPreferred1() {
                let valid = true

                // Empty field
                if (this.client.preferred1.trim() === '') {
                    valid = false
                    this.errors.preferred1 = 'Please, enter at least one preferred contact option'
                } else this.errors.preferred1 = ''
                // Invalid characters (?)
                return valid

            },
            noErrorsAgency() {
                let valid = true

                // Empty field
                if (this.client.agency.trim() === '') {
                    valid = false
                    this.errors.agency = 'Please, enter your agency'
                } else this.errors.agency = ''

                // Invalid characters (?)
                return valid
            },
            noErrorsSecondContactName() {
                let valid = true

                if (this.client.secondContactName.trim() === '') {
                    // Empty field
                    valid = false
                    this.errors.contact = 'Please enter your contact number'
                } else this.errors.contact = ''

                return valid
            },
            noErrorsContact() {
                let valid = true
                let contactFormat = /[0-9]{1,3}-[0-9]{7}/

                if (this.client.contact.trim() === '') {
                    // Empty field
                    valid = false
                    this.errors.contact = 'Please enter your contact number'
                } else if (!contactFormat.test(this.client.contact)) {
                    // Review the regExp
                    valid = false
                    this.errors.contact = 'This not a valid contact number format'
                } else this.errors.contact = ''

                return valid
            },
            noErrorsSecondContact() {
                let valid = true
                let contactFormat = /[0-9]{1,3}-[0-9]{7}/

                if (this.client.secondContact.trim() === '') {
                    // Empty field
                    valid = false
                    this.errors.secondContact = 'Please enter your contact number'
                } else if (!contactFormat.test(this.client.secondContact)) {
                    // Review the regExp
                    valid = false
                    this.errors.secondContact = 'This not a valid contact number format'
                } else this.errors.secondContact = ''

                return valid
            },
            noErrorsEmail() {
                let valid = true
                let emailFormat = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/

                if (this.client.email.trim() === '') {
                    // Empty field
                    valid = false
                    this.errors.email = 'Please, enter your email'
                } else if (!emailFormat.test(this.client.email)) {
                    valid = false
                    this.errors.email = 'This email not has a valid format. Please check again'
                } else this.errors.email = ''

                return valid
            },
            noErrorsTimeZone() {
                let valid = true

                if (this.client.timeZone.trim() === '') {
                    // Empty field
                    valid = false
                    this.errors.timeZone = 'Please, select a time zone'
                } else this.errors.timeZone = ''

                return valid
            },
            noErrorsWebSite() {
                let valid = true

                if (this.client.webSite.trim() === '') {
                    // Empty field
                    valid = false
                    this.errors.webSite = 'Please, enter a city'
                } else this.errors.webSite = ''

                return valid
            },
            noErrorsSkype() {
                let valid = true

                if (this.client.skype.trim() === '') {
                    // Empty field
                    valid = false
                    this.errors.skype = 'Please, enter your skype id'
                } else this.errors.skype = ''

                return valid
            },
            clearInput(name) {
                this.client[name] = ''
            }
        },
        watch: {
            client: {
                handler() {
                    // check if all client values are filled
                    let keys = Object.keys(this.client);
                    let isAll_filled = true;
                    for (const key of keys) {
                        if (this.client[key].trim().length < 1) {
                            isAll_filled = false
                            break
                        }
                    }
                    this.canSubmit = isAll_filled;
                },
                deep: true
            }
        },
        mounted(){
            this.getCurrentClient() ;
        }
    }
</script>
<style scoped>
</style>
