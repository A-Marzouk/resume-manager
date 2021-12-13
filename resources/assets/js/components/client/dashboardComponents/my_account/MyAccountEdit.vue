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
            <div class="notificationBar" id="notificationBar" style="display:none; position: fixed;width: inherit;">
                <div>
                    {{notificationMessage}}
                </div>
                <a href="javascript:void(0)" @click="hideNotification" class="no-decoration" style="color: white;">
                    x
                </a>
            </div>
            <div class="account-info-edit dashboard-box" style="margin-top: 16px;">
                <div class="account-info-edit-heading dashboard-box-heading">
                    <div class="left">
                        <img src="/images/client/my_account/info_40px.png" alt="info icon">
                        <span>
                        EDIT ACCOUNT INFORMATION
                    </span>
                    </div>
                </div>
                <div class="account-edit-section" id="formSectionOne">
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
                                       placeholder="Agency name"
                                       v-model="user.client.agency">
                                <img src="/images/client/campaign_activity/close_black.png"
                                     alt="delete icon"
                                     v-show="user.client.agency"
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
                                 :class="{ 'error-input' : errors.contact}"
                            >
                                <input type="text"
                                       name="name"
                                       v-model="user.client.contact"
                                       placeholder="Contact person">
                                <img src="/images/client/campaign_activity/close_black.png" alt="delete icon"
                                     v-show="user.client.contact"
                                     @click="clearInput('contact')"
                                >
                            </div>
                            <div class="error" v-if="showErrors && errors.contact">
                                {{errors.contact}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Enter contact phone
                            </label>
                            <div class="faq-input" :class="{ 'error-input' : errors.agency_phone}">
                                <input type="text"
                                       name="contact"
                                       v-model="user.client.agency_phone"
                                       placeholder="Contact phone">
                                <img src="/images/client/campaign_activity/close_black.png" alt="delete icon"
                                     v-show="user.client.agency_phone"
                                     @click="clearInput('agency_phone')"
                                >
                            </div>
                            <div class="error" v-if="showErrors && errors.agency_phone">
                                {{errors.agency_phone}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Select your time zone
                            </label>
                            <div class="faq-input" :class="{ 'error-input' : errors.timezone}">
                                <select class="form-control" id="timezone" name="timezone" style="height: 50px;"
                                        v-model="user.timezone">
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
                                Email address of accounts dept
                            </label>
                            <div class="faq-input" :class="{ 'error-input' : errors.emailDept}">
                                <input type="text"
                                       name="faq"
                                       v-model="user.client.emailDept"
                                       placeholder="Email of accounts dept">
                                <img src="/images/client/campaign_activity/close_black.png"
                                     @click="clearInput('emailDept')"
                                     alt="delete icon" v-show="user.client.emailDept">
                            </div>
                            <div class="error" v-if="showErrors && errors.emailDept">
                                {{errors.emailDept}}
                            </div>
                        </div>

                    </div>
                </div>
                <div class="account-edit-section flex-row flex-wrap justify-content-between sub-section"
                     id="formSectionTwo">
                    <div class="faq-question-input account-edit-input">
                        <label class="faq-input-label">
                            Enter your company website
                        </label>
                        <div class="faq-input" :class="{ 'error-input' : errors.website}">
                            <input type="text"
                                   name="faq"
                                   placeholder="Company website"
                                   v-model="user.client.website"
                            >
                            <img src="/images/client/campaign_activity/close_black.png"
                                 @click="clearInput('website')" alt="delete icon"
                                 v-show="user.client.website">
                        </div>
                        <div class="error" v-if="showErrors && errors.website">
                            {{errors.website}}
                        </div>
                    </div>
                    <div class="faq-question-input account-edit-input">
                        <label class="faq-input-label">
                            Enter your Skype ID
                        </label>
                        <div class="faq-input" :class="{ 'error-input' : errors.skype_id}">
                            <input type="text"
                                   name="faq"
                                   placeholder="Skype ID"
                                   v-model="user.client.skype_id"
                            >
                            <img src="/images/client/campaign_activity/close_black.png"
                                 @click="clearInput('skype_id')" alt="delete icon"
                                 v-show="user.client.skype_id">
                        </div>
                        <div class="error" v-if="showErrors && errors.skype_id">
                            {{errors.skype_id}}
                        </div>
                    </div>
                    <div class="faq-question-input account-edit-input">
                        <label class="faq-input-label">
                            Enter second contact person
                        </label>
                        <div class="faq-input" :class="{ 'error-input' : errors.second_contact}">
                            <input type="text"
                                   name="faq"
                                   placeholder="Second contact name"
                                   v-model="user.client.second_contact">
                            <img src="/images/client/campaign_activity/close_black.png"
                                 @click="clearInput('second_contact')" alt="delete icon"
                                 v-show="user.client.second_contact"
                            >
                        </div>
                        <div class="error" v-if="showErrors && errors.second_contact">
                            {{errors.second_contact}}
                        </div>
                    </div>
                    <div class="faq-question-input account-edit-input">
                        <label class="faq-input-label">
                            Enter second contact phone
                        </label>
                        <div class="faq-input" :class="{ 'error-input' : errors.second_contact_phone}">
                            <input type="text"
                                   name="faq"
                                   placeholder="Second contact phone"
                                   v-model="user.client.second_contact_phone">
                            <img src="/images/client/campaign_activity/close_black.png"
                                 @click="clearInput('second_contact_phone')" alt="delete icon"
                                 v-show="user.client.second_contact_phone"
                            >
                        </div>
                        <div class="error" v-if="showErrors && errors.second_contact_phone">
                            {{errors.second_contact_phone}}
                        </div>
                    </div>
                </div>
                <div class="account-edit-section" id="formSectionThree">
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

                            <div class="faq-input" :class="{ 'error-input' : errors.preferred_contact}">
                                <select class="form-control" id="preferred_contact" name="preferred_contact"
                                        style="height: 50px;"
                                        v-model="user.client.preferred_contact">
                                    <option value="null" selected="true" disabled>Select contact method</option>
                                    <option value="email" selected="selected">Email</option>
                                    <option value="phone" selected="selected">Phone</option>
                                    <option value="skype" selected="selected">Skype</option>

                                </select>
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
                </div>
                <div class="account-edit-section-edit-btn no-decoration">
                    <a class="btn-primary" href="javascript:void(0)" @click="nextStep">
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
                user: {
                    client:{}
                },
                canSubmit: false,
                errors: {
                    agency: '',
                    contact: '',
                    agency_phone: '',
                    timezone: '',
                    emailDept: '',

                    website: '',
                    skype_id: '',
                    second_contact: '',
                    second_contact_phone: '',

                    preferred_contact: '',
                    password: '',
                    password_confirmation: ''
                },
                showErrors: false,
                password: '',
                password_confirmation: '',
                notificationMessage:''
            }
        },
        methods: {

            getCurrentClient() {
                axios.get('/client/current').then((response) => {
                    // response is user with client relationship
                    this.user = response.data;
                });
            },

            nextStep(e) {
                e.preventDefault();
                if (this.noErrors()) {

                    this.user.password = this.password;
                    this.user.password_confirmation = this.password_confirmation;

                    axios.post('/client/update', this.user)
                        .then((response) => {
                            // show a saved changes message
                            this.notificationMessage = 'Successfully updated !' ;
                            $('#notificationBar').fadeIn(600);
                            setTimeout(()=>{
                                $('#notificationBar').fadeOut(1500);
                            },4000);
                        })
                        .catch((error) => {
                            console.log(error)
                        });
                } else {
                    this.showErrors = true;
                    // scroll to the section with errors :
                    $('html, body').animate({
                        scrollTop: $(this.getErrorSectionID()).offset().top - 45
                    }, 1000);
                }
            },
            hideNotification(){
                $('#notificationBar').css('display','none');
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
                let noErrorsPassword = this.noErrorsPassword()

                return (
                    noErrorsName &&
                    noErrorsContact &&
                    noErrorsSecondContact &&
                    noErrorsSecondContactName &&
                    noErrorsEmail &&
                    noErrorsSkype &&
                    noErrorsAgency &&
                    noErrorsTimeZone &&
                    noErrorsWebSite &&
                    noErrorsPassword
                )
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
            },
            noErrorsName() {
                let valid = true;

                // Empty field
                if (this.user.client.contact.trim() === '') {
                    valid = false;
                    this.errors.contact = 'Please, enter your name'
                } else this.errors.contact = '';
                // Invalid characters (?)
                return valid
            },
            noErrorsAgency() {
                let valid = true;

                // Empty field
                if (this.user.client.agency.trim() === '') {
                    valid = false;
                    this.errors.agency = 'Please enter agency name.'
                } else this.errors.agency = '';

                // Invalid characters (?)
                return valid
            },
            noErrorsSecondContactName() {
                let valid = true;

                if(this.user.client.second_contact === null){ // not required
                    return valid ;
                }

                if (this.user.client.second_contact.trim() === '') {
                    // Empty field
                    valid = false;
                    this.errors.second_contact = 'Please enter name'
                } else this.errors.second_contact = '';

                return valid
            },
            noErrorsContact() {
                let valid = true;
                let contactFormat = /[0-9]{7,12}/;

                if (this.user.client.agency_phone.trim() === '') {
                    // Empty field
                    valid = false;
                    this.errors.agency_phone = 'Please enter agency phone number'
                } else if (!contactFormat.test(this.user.client.agency_phone)) {
                    // Review the regExp
                    valid = false;
                    this.errors.agency_phone = 'This not a valid contact number format'
                } else this.errors.agency_phone = '';

                return valid
            },
            noErrorsSecondContact() {
                let valid = true;
                let contactFormat = /[0-9]{7,12}/;

                if(this.user.client.second_contact_phone === null){ // not required
                    return valid ;
                }
                if (this.user.client.second_contact_phone.trim() === '') {
                    // Empty field
                    valid = false;
                    this.errors.second_contact_phone = 'Please enter your contact number'
                } else if (!contactFormat.test(this.user.client.second_contact_phone)) {
                    // Review the regExp
                    valid = false;
                    this.errors.second_contact_phone = 'This not a valid contact number format'
                } else this.errors.second_contact_phone = '';

                return valid
            },
            noErrorsEmail() {
                let valid = true;
                let emailFormat = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;

                if (this.user.client.emailDept.trim() === '') {
                    // Empty field
                    valid = false;
                    this.errors.emailDept = 'Please, enter your email'
                } else if (!emailFormat.test(this.user.client.emailDept)) {
                    valid = false;
                    this.errors.emailDept = 'This email not has a valid format. Please check again'
                } else this.errors.emailDept = '';

                return valid
            },
            noErrorsTimeZone() {
                let valid = true;

                if(this.user.timezone === null){ // not required
                    // Empty field
                    valid = false;
                    this.errors.timezone = 'Please, select a time zone'
                    return valid;
                }
                if (this.user.timezone.trim() === '') {
                    // Empty field
                    valid = false;
                    this.errors.timezone = 'Please, select a time zone'
                } else this.errors.timezone = '';

                return valid
            },
            noErrorsWebSite() {
                let valid = true;
                if(this.user.client.website === null){ // not required
                    return valid ;
                }
                if (this.user.client.website.trim() === '') {
                    // Empty field
                    valid = false;
                    this.errors.website = 'Please, enter a city';
                } else this.errors.website = '';

                return valid
            },
            noErrorsSkype() {
                let valid = true;

                if(this.user.client.skype_id === null){ // not required
                    return valid ;
                }
                if (this.user.client.skype_id.trim() === '') {
                    // Empty field
                    valid = false;
                    this.errors.skype_id = 'Please, enter your skype id'
                } else this.errors.skype_id = '';

                return valid
            },
            clearInput(name) {
                if (this.user.client[name] !== undefined) {
                    this.user.client[name] = '';
                } else if (this.user[name] !== undefined) {
                    this.user[name] = '';
                } else {
                    this.password_confirmation = '';
                }
            },
            getErrorSectionID() {
                let errors = this.errors;
                let sectionID = '';
                let sectionOne = ['agency', 'contact', 'agency_phone', 'timezone', 'emailDept'];
                let sectionTwo = ['website', 'skype_id', 'second_contact', 'second_contact_phone'];
                let sectionThree = ['preferred_contact', 'password'];

                $.each(errors, function (i) {
                    if (errors[i].length > 0) {
                        if (sectionOne.includes(i)) {
                            sectionID = '#formSectionOne';
                            return false;
                        } else if (sectionTwo.includes(i)) {
                            sectionID = '#formSectionTwo';
                            return false;
                        } else {
                            sectionID = '#formSectionThree';
                            return false;
                        }
                    }
                });

                return sectionID;


            }
        },
        watch: {
            client: {
                handler() {
                    // check if all client values are filled
                    let keys = Object.keys(this.client);
                    let isAll_filled = true;
                    for (const key of keys) {
                        if(this.client[key] === null){
                            isAll_filled = false;
                            break
                        }
                        if (this.client[key].trim().length < 1) {
                            isAll_filled = false;
                            break
                        }
                    }
                    this.canSubmit = isAll_filled;
                },
                deep: true
            }
        },
        mounted() {
            this.getCurrentClient();
        }
    }
</script>
<style scoped>
    .notificationBar{
        margin-top: -8px;
        z-index: 2;
    }
    .account-info-edit{

    }
</style>
