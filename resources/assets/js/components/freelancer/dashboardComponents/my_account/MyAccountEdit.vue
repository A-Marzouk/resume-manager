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
                        BASIC INFORMATION
                    </div>
                    <div class="account-edit-section-inputs">
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                name <small style="color:red;"> *</small>
                            </label>
                            <div class="faq-input" :class="{ 'error-input' : errors.first_name}">
                                <input type="text" placeholder="Enter your name" v-model="agentData.first_name">
                                <img src="/images/client/campaign_activity/close_black.png"
                                     alt="delete icon"
                                     v-show="agentData.first_name"
                                     @click="clearInput('first_name')"
                                >
                            </div>
                            <div class="error" v-if="errors.first_name">
                                {{errors.first_name}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                surname <small style="color:red;"> *</small>
                            </label>
                            <div class="faq-input" :class="{ 'error-input' : errors.last_name}">
                                <input type="text" placeholder="Enter your surname"
                                       v-model="agentData.last_name">
                                <img src="/images/client/campaign_activity/close_black.png"
                                     alt="delete icon"
                                     v-show="agentData.last_name"
                                     @click="clearInput('last_name')"
                                >
                            </div>
                            <div class="error" v-if="errors.last_name">
                                {{errors.last_name}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                primary Email <small style="color:red;"> *</small>
                            </label>
                            <div class="faq-input" :class="{ 'error-input' : errors.email}">
                                <input type="email"  v-model="agentData.email" :disabled="canEditEmail()">
                            </div>
                            <div class="error" v-if="errors.email">
                                {{errors.email}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                phone number <small style="color:red;"> *</small>
                            </label>
                            <div class="faq-input" :class="{ 'error-input' : errors.phone}">
                                <input type="tel" placeholder="Enter your phone number"
                                       v-model="agentData.phone" style="margin-bottom: 14px;">
                                <img src="/images/client/campaign_activity/close_black.png"
                                     alt="delete icon"
                                     v-show="agentData.phone"
                                     @click="clearInput('phone')"
                                >
                            </div>
                            <div class="d-flex">
                                <div class="checkbox mr-3">
                                    <label class="checkBoxText checkBoxContainer">
                                        <input type="checkbox"
                                               name="remember"
                                               v-model="agentData.telegram">
                                        <span class="rememberText">Telegram</span>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label class="checkBoxText checkBoxContainer">
                                        <input type="checkbox"
                                               name="remember"
                                               v-model="agentData.whatsapp">
                                        <span class="rememberText">Whatsapp</span>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="error" v-if="errors.phone">
                                {{errors.phone}}
                            </div>
                        </div>

                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                city <small style="color:red;"> *</small>
                            </label>
                            <div class="faq-input" :class="{ 'error-input' : errors.city}">
                                <input type="text" placeholder="Enter your surname" v-model="agentData.city">
                                <img src="/images/client/campaign_activity/close_black.png"
                                     alt="delete icon"
                                     v-show="agentData.city"
                                     @click="clearInput('city')"
                                >
                            </div>
                            <div class="error" v-if="errors.city">
                                {{errors.city}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Select your time zone <small style="color:red;">             *</small>
                            </label>
                            <div class="faq-input" :class="{ 'error-input' : errors.timezone}">
                                <div class="select-icon"></div>
                                <select class="form-control" id="timeZone" style="height: 56px;"
                                        v-model="agentData.timezone">
                                    <option :value="index" v-for="(timezone,index) in timezones" :key="index">
                                        {{timezones[index]}}
                                    </option>
                                </select>
                            </div>
                            <div class="error" v-if="errors.timezone">
                                {{errors.timezone}}
                            </div>
                        </div>
                    </div>
                    <!-- small inputs social -->
                    <div class="account-edit-section-heading">
                        SOCIAL INFORMATION
                    </div>
                    <div class="account-edit-section-inputs">
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Skype ID
                            </label>
                            <div class="faq-input small" :class="{ 'error-input' : errors.skype}">
                                <input type="text" placeholder="Enter your Skype ID" v-model="agentData.skype">
                                <img src="/images/client/campaign_activity/close_black.png"
                                     alt="delete icon"
                                     v-show="agentData.skype"
                                     @click="clearInput('skype')"
                                >
                            </div>
                            <div class="error" v-if="errors.skype">
                                {{errors.skype}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Github
                            </label>
                            <div class="faq-input small" :class="{ 'error-input' : errors.github}">
                                <input type="text" placeholder="Github account url" v-model="agentData.github">
                                <img src="/images/client/campaign_activity/close_black.png"
                                     alt="delete icon"
                                     v-show="agentData.github"
                                     @click="clearInput('github')"
                                >
                            </div>
                            <div class="error" v-if="errors.github">
                                {{errors.github}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Linkedin
                            </label>
                            <div class="faq-input small" :class="{ 'error-input' : errors.linkedin}">
                                <input type="text" placeholder="Linkedin profile url"
                                       v-model="agentData.linkedin">
                                <img src="/images/client/campaign_activity/close_black.png"
                                     alt="delete icon"
                                     v-show="agentData.linkedin"
                                     @click="clearInput('linkedin')"
                                >
                            </div>
                            <div class="error" v-if="errors.linkedin">
                                {{errors.linkedin}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Website
                            </label>
                            <div class="faq-input small" :class="{ 'error-input' : errors.website}">
                                <input type="text" placeholder="Enter your Website url"
                                       v-model="agentData.website">
                                <img src="/images/client/campaign_activity/close_black.png"
                                     alt="delete icon"
                                     v-show="agentData.website"
                                     @click="clearInput('website')"
                                >
                            </div>
                            <div class="error" v-if="errors.website">
                                {{errors.website}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Facebook
                            </label>
                            <div class="faq-input small" :class="{ 'error-input' : errors.facebook}">
                                <input type="text" placeholder="Facebook profile url"
                                       v-model="agentData.facebook">
                                <img src="/images/client/campaign_activity/close_black.png"
                                     alt="delete icon"
                                     v-show="agentData.facebook"
                                     @click="clearInput('facebook')"
                                >
                            </div>
                            <div class="error" v-if="errors.facebook">
                                {{errors.facebook}}
                            </div>
                        </div>
                        <div class="faq-question-input account-edit-input">
                            <label class="faq-input-label">
                                Instagram
                            </label>
                            <div class="faq-input small" :class="{ 'error-input' : errors.instagram}">
                                <input type="text" placeholder="Instagram profile url"
                                       v-model="agentData.instagram">
                                <img src="/images/client/campaign_activity/close_black.png"
                                     alt="delete icon"
                                     v-show="agentData.instagram"
                                     @click="clearInput('instagram')"
                                >
                            </div>
                            <div class="error" v-if="errors.instagram">
                                {{errors.instagram}}
                            </div>
                        </div>
                    </div>
                    <!-- small inputs end-->
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
                errors: [],
                agentData: {
                    'first_name': this.$attrs.current_user.user_data.first_name,
                    'last_name': this.$attrs.current_user.user_data.last_name,
                    'phone': this.$attrs.current_user.user_data.phone,
                    'email': this.$attrs.current_user.email,
                    'city': this.$attrs.current_user.user_data.city,
                    'password': '',
                    'password_confirmation': '',

                    'whatsapp': this.$attrs.current_user.user_data.whatsapp === 'false' ? false : true,
                    'telegram': this.$attrs.current_user.user_data.telegram === 'false' ? false : true,
                    'timezone': this.$attrs.current_user.user_data.timezone,

                    'skype': this.$attrs.current_user.user_data.skype,
                    'instagram': this.$attrs.current_user.user_data.instagram,
                    'linkedin': this.$attrs.current_user.user_data.linkedin,
                    'website': this.$attrs.current_user.user_data.website,
                    'facebook': this.$attrs.current_user.user_data.facebook,
                    'github': this.$attrs.current_user.user_data.github,
                },
                isLoading: false,
                notificationMessage:'',
                timezones:{
                    0 : "(GMT - 8) ",
                    1 : "(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima ",
                    2 : "(GMT -6:00) Central Time (US & Canada), Mexico City",
                    3 : "(GMT -7:00) Mountain Time (US & Canada)",
                    4 : "(GMT -8:00) Pacific Time (US & Canada)",
                    5 : "(GMT -9:00) Alaska",
                    6 : "(GMT -12:00) Eniwetok, Kwajalein",
                    7 : "(GMT -11:00) Midway Island, Samoa",
                    8 : "(GMT -10:00) Hawaii",
                    9 : "(GMT -9:30) Taiohae",
                    10 : "(GMT -9:00) Alaska",
                    11: "(GMT -8:00) Pacific Time (US & Canada)",
                    12 : "(GMT -7:00) Mountain Time (US & Canada)",
                    13 : "(GMT -6:00) Central Time (US & Canada), Mexico City",
                    14 : "(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima",
                    15 : "(GMT -4:30) Caracas",
                    16 : "(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz",
                    17 : "(GMT -3:30) Newfoundland",
                    18 : "(GMT -3:00) Brazil, Buenos Aires, Georgetown",
                    19 : "(GMT -2:00) Mid-Atlantic",
                    20 : "(GMT -1:00) Azores, Cape Verde Islands",
                    21 : "(GMT +0:00) Western Europe Time, London, Lisbon, Casablanca",
                    22 : "(GMT +1:00) Brussels, Copenhagen, Madrid, Paris",
                    23 : "(GMT +2:00) Kaliningrad, South Africa",
                    24 : "(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg",
                    25 : "(GMT +3:30) Tehran",
                    26 : "(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi",
                    27  : "(GMT +4:30) Kabul",
                    28 : "(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent",
                    29: "(GMT +5:30) Bombay, Calcutta, Madras, New Delhi",
                    30: "(GMT +5:45) Kathmandu, Pokhara",
                    31: "(GMT +6:00) Almaty, Dhaka, Colombo",
                    32: "(GMT +6:30) Yangon, Mandalay",
                    33: "(GMT +7:00) Bangkok, Hanoi, Jakarta",
                    34: "(GMT +8:00) Beijing, Perth, Singapore, Hong Kong",
                    35: "(GMT +8:45) Eucla",
                    36: "(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk",
                    37: "(GMT +9:30) Adelaide, Darwin",
                    38: "(GMT +10:00) Eastern Australia, Guam, Vladivostok",
                    39: "(GMT +10:30) Lord Howe Island",
                    40: "(GMT +11:00) Magadan, Solomon Islands, New Caledonia",
                    41: "(GMT +11:30) Norfolk Island",
                    42: "(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka",
                    43: "(GMT +12:45) Chatham Islands",
                    44: "(GMT +13:00) Apia, Nukualofa",
                    45: "(GMT +14:00) Line Islands, Tokelau",
                }
            }
        },
        methods: {
            submitForm() {
                let form_data = new FormData();

                $.each(this.agentData, (field) => {
                    form_data.append(field, this.agentData[field]);
                });

                this.clearErrors();
                this.isLoading = true;

                axios.post('/freelancer/account/personal/submit', form_data)
                    .then((response) => {
                        this.showSuccessMessage();
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                            this.updateErrors(error.response.data.errors);
                        } else {
                            this.errors = ['Something went wrong. Please try again.'];
                        }
                    })
            },
            clearErrors() {
                $.each(this.errors, (error) => {
                    this.errors[error] = '';
                });

            },
            clearInput(field) {
                this.agentData[field] = '';
            },
            updateErrors(responseErrors) {
                $.each(this.errors, (error) => {
                    if (responseErrors[error]) {
                        this.errors[error] = responseErrors[error][0];
                    }
                });
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
            canEditEmail(){
                return !(this.$attrs.current_user.instagram_id !== null && !this.$attrs.current_user.email);
            }
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

    .faq-input.small {
        width: 250px !important;
        max-width: 100%;


        @media (max-width: 1240px) {
            width: 307px!important;
        }
        @media (max-width: 600px) {
            width: 100% !important;
        }
    }

</style>
