<template>
    <div>
        <div class="d-flex justify-content-center flex-column align-items-center w-100">
            <div class="account-info-edit-wrapper">
                <nav class="navbar navbar-light fixed-top dashboard_navbar">
                    <div class="backBtn">
                        <a href="/admin/agents">
                            <img src="/images/client/arrow_back.png" alt="back-icon">
                        </a>
                        <span>AGENT REGISTER</span>
                    </div>
                </nav>

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
                                    name <small style="color:red;"> *</small>
                                </label>
                                <div class="faq-input" :class="{ 'error-input' : errors.firstName}">
                                    <input type="text" placeholder="Enter your name" v-model="freelancerData.firstName">
                                    <img src="/images/client/campaign_activity/close_black.png"
                                         alt="delete icon"
                                         v-show="freelancerData.firstName.length > 0"
                                         @click="clearInput('firstName')"
                                    >
                                </div>
                                <div class="error" v-if="errors.firstName">
                                    {{errors.firstName}}
                                </div>
                            </div>
                            <div class="faq-question-input account-edit-input">
                                <label class="faq-input-label">
                                    surname <small style="color:red;"> *</small>
                                </label>
                                <div class="faq-input" :class="{ 'error-input' : errors.lastName}">
                                    <input type="text" placeholder="Enter your surname"
                                           v-model="freelancerData.lastName">
                                    <img src="/images/client/campaign_activity/close_black.png"
                                         alt="delete icon"
                                         v-show="freelancerData.lastName.length > 0"
                                         @click="clearInput('lastName')"
                                    >
                                </div>
                                <div class="error" v-if="errors.lastName">
                                    {{errors.lastName}}
                                </div>
                            </div>
                            <div class="faq-question-input account-edit-input">
                                <label class="faq-input-label">
                                    primary Email <small style="color:red;"> *</small>
                                </label>
                                <div class="faq-input" :class="{ 'error-input' : errors.email}">
                                    <input type="email" placeholder="Enter your email" v-model="freelancerData.email">
                                    <img src="/images/client/campaign_activity/close_black.png"
                                         alt="delete icon"
                                         v-show="freelancerData.email.length > 0"
                                         @click="clearInput('email')"
                                    >
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
                                           v-model="freelancerData.phone" style="margin-bottom: 14px;">
                                    <img src="/images/client/campaign_activity/close_black.png"
                                         alt="delete icon"
                                         v-show="freelancerData.phone.length > 0"
                                         @click="clearInput('phone')"
                                    >
                                </div>
                                <div class="d-flex">
                                    <div class="checkbox mr-3">
                                        <label class="checkBoxText checkBoxContainer">
                                            <input type="checkbox"
                                                   name="remember"
                                                   v-model="freelancerData.telegram">
                                            <span class="rememberText">Telegram</span>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label class="checkBoxText checkBoxContainer">
                                            <input type="checkbox"
                                                   name="remember"
                                                   v-model="freelancerData.whatsapp">
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
                                    <input type="text" placeholder="Enter your surname" v-model="freelancerData.city">
                                    <img src="/images/client/campaign_activity/close_black.png"
                                         alt="delete icon"
                                         v-show="freelancerData.city.length > 0"
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
                                            v-model="freelancerData.timezone">
                                        <option value="" selected="selected">Select your timezone</option>
                                        <option value="(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima">(GMT -5:00)
                                            Eastern
                                            Time (US & Canada), Bogota, Lima
                                        </option>
                                        <option value="(GMT -6:00) Central Time (US & Canada), Mexico City">(GMT -6:00)
                                            Central
                                            Time
                                            (US & Canada), Mexico City
                                        </option>
                                        <option value="(GMT -7:00) Mountain Time (US & Canada)">(GMT -7:00) Mountain
                                            Time (US &
                                            Canada)
                                        </option>
                                        <option value="(GMT -8:00) Pacific Time (US & Canada)">(GMT -8:00) Pacific Time
                                            (US &
                                            Canada)
                                        </option>
                                        <option value="(GMT -9:00) Alaska">(GMT -9:00) Alaska</option>
                                        <option value="">--------------</option>
                                        <option value="(GMT -12:00) Eniwetok, Kwajalein">(GMT -12:00) Eniwetok,
                                            Kwajalein
                                        </option>
                                        <option value="(GMT -11:00) Midway Island, Samoa">(GMT -11:00) Midway Island,
                                            Samoa
                                        </option>
                                        <option value="(GMT -10:00) Hawaii">(GMT -10:00) Hawaii</option>
                                        <option value="(GMT -9:30) Taiohae">(GMT -9:30) Taiohae</option>
                                        <option value="(GMT -9:00) Alaska">(GMT -9:00) Alaska</option>
                                        <option value="(GMT -8:00) Pacific Time (US & Canada)">(GMT -8:00) Pacific Time
                                            (US &
                                            Canada)
                                        </option>
                                        <option value="(GMT -7:00) Mountain Time (US & Canada)">(GMT -7:00) Mountain
                                            Time (US &
                                            Canada)
                                        </option>
                                        <option value="(GMT -6:00) Central Time (US & Canada), Mexico City">(GMT -6:00)
                                            Central
                                            Time
                                            (US & Canada), Mexico City
                                        </option>
                                        <option value="(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima">(GMT -5:00)
                                            Eastern
                                            Time (US & Canada), Bogota, Lima
                                        </option>
                                        <option value="(GMT -4:30) Caracas">(GMT -4:30) Caracas</option>
                                        <option value="(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz">(GMT -4:00)
                                            Atlantic
                                            Time (Canada), Caracas, La Paz
                                        </option>
                                        <option value="(GMT -3:30) Newfoundland">(GMT -3:30) Newfoundland</option>
                                        <option value="(GMT -3:00) Brazil, Buenos Aires, Georgetown">(GMT -3:00) Brazil,
                                            Buenos
                                            Aires, Georgetown
                                        </option>
                                        <option value="(GMT -2:00) Mid-Atlantic">(GMT -2:00) Mid-Atlantic</option>
                                        <option value="(GMT -1:00) Azores, Cape Verde Islands">(GMT -1:00) Azores, Cape
                                            Verde
                                            Islands
                                        </option>
                                        <option value="(GMT +0:00) Western Europe Time, London, Lisbon, Casablanca">(GMT
                                            +0:00)
                                            Western Europe Time, London, Lisbon, Casablanca
                                        </option>
                                        <option value="(GMT +1:00) Brussels, Copenhagen, Madrid, Paris">(GMT +1:00)
                                            Brussels,
                                            Copenhagen, Madrid, Paris
                                        </option>
                                        <option value="(GMT +2:00) Kaliningrad, South Africa">(GMT +2:00) Kaliningrad,
                                            South
                                            Africa
                                        </option>
                                        <option value="(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg">(GMT +3:00)
                                            Baghdad,
                                            Riyadh, Moscow, St. Petersburg
                                        </option>
                                        <option value="(GMT +3:30) Tehran">(GMT +3:30) Tehran</option>
                                        <option value="(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi">(GMT +4:00) Abu
                                            Dhabi,
                                            Muscat,
                                            Baku, Tbilisi
                                        </option>
                                        <option value="(GMT +4:30) Kabul">(GMT +4:30) Kabul</option>
                                        <option value="(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent">(GMT
                                            +5:00)
                                            Ekaterinburg, Islamabad, Karachi, Tashkent
                                        </option>
                                        <option value="(GMT +5:30) Bombay, Calcutta, Madras, New Delhi">(GMT +5:30)
                                            Bombay,
                                            Calcutta, Madras, New Delhi
                                        </option>
                                        <option value="(GMT +5:45) Kathmandu, Pokhara">(GMT +5:45) Kathmandu, Pokhara
                                        </option>
                                        <option value="(GMT +6:00) Almaty, Dhaka, Colombo">(GMT +6:00) Almaty, Dhaka,
                                            Colombo
                                        </option>
                                        <option value="(GMT +6:30) Yangon, Mandalay">(GMT +6:30) Yangon, Mandalay
                                        </option>
                                        <option value="(GMT +7:00) Bangkok, Hanoi, Jakarta">(GMT +7:00) Bangkok, Hanoi,
                                            Jakarta
                                        </option>
                                        <option value="(GMT +8:00) Beijing, Perth, Singapore, Hong Kong">(GMT +8:00)
                                            Beijing,
                                            Perth,
                                            Singapore, Hong Kong
                                        </option>
                                        <option value="(GMT +8:45) Eucla">(GMT +8:45) Eucla</option>
                                        <option value="(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk">(GMT +9:00)
                                            Tokyo,
                                            Seoul,
                                            Osaka, Sapporo, Yakutsk
                                        </option>
                                        <option value="(GMT +9:30) Adelaide, Darwin">(GMT +9:30) Adelaide, Darwin
                                        </option>
                                        <option value="(GMT +10:00) Eastern Australia, Guam, Vladivostok">(GMT +10:00)
                                            Eastern
                                            Australia, Guam, Vladivostok
                                        </option>
                                        <option value="(GMT +10:30) Lord Howe Island">(GMT +10:30) Lord Howe Island
                                        </option>
                                        <option value="(GMT +11:00) Magadan, Solomon Islands, New Caledonia">(GMT
                                            +11:00)
                                            Magadan,
                                            Solomon Islands, New Caledonia
                                        </option>
                                        <option value="(GMT +11:30) Norfolk Island">(GMT +11:30) Norfolk Island</option>
                                        <option value="(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka">(GMT +12:00)
                                            Auckland,
                                            Wellington, Fiji, Kamchatka
                                        </option>
                                        <option value="(GMT +12:45) Chatham Islands">(GMT +12:45) Chatham Islands
                                        </option>
                                        <option value="(GMT +13:00) Apia, Nukualofa">(GMT +13:00) Apia, Nukualofa
                                        </option>
                                        <option value="(GMT +14:00) Line Islands, Tokelau">(GMT +14:00) Line Islands,
                                            Tokelau
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
                                    <input type="text" placeholder="Enter your Skype ID" v-model="freelancerData.skype">
                                    <img src="/images/client/campaign_activity/close_black.png"
                                         alt="delete icon"
                                         v-show="freelancerData.skype.length > 0"
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
                                    <input type="text" placeholder="Github account url" v-model="freelancerData.github">
                                    <img src="/images/client/campaign_activity/close_black.png"
                                         alt="delete icon"
                                         v-show="freelancerData.github.length > 0"
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
                                           v-model="freelancerData.linkedin">
                                    <img src="/images/client/campaign_activity/close_black.png"
                                         alt="delete icon"
                                         v-show="freelancerData.linkedin.length > 0"
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
                                           v-model="freelancerData.website">
                                    <img src="/images/client/campaign_activity/close_black.png"
                                         alt="delete icon"
                                         v-show="freelancerData.website.length > 0"
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
                                           v-model="freelancerData.facebook">
                                    <img src="/images/client/campaign_activity/close_black.png"
                                         alt="delete icon"
                                         v-show="freelancerData.facebook.length > 0"
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
                                           v-model="freelancerData.instagram">
                                    <img src="/images/client/campaign_activity/close_black.png"
                                         alt="delete icon"
                                         v-show="freelancerData.instagram.length > 0"
                                         @click="clearInput('instagram')"
                                    >
                                </div>
                                <div class="error" v-if="errors.instagram">
                                    {{errors.instagram}}
                                </div>
                            </div>
                        </div>

                            <hr>
                            <!-- small inputs end-->

                            <div class="account-edit-section-heading">
                                PASSWORD
                            </div>

                        <div class="account-edit-section-inputs">
                            <div class="faq-question-input account-edit-input">
                                <label class="faq-input-label">
                                    password <small style="color:red;"> *</small>
                                </label>
                                <div class="faq-input" :class="{ 'error-input' : errors.password}">
                                    <input type="password" placeholder="Enter your password"
                                           v-model="freelancerData.password">
                                    <img src="/images/client/campaign_activity/close_black.png"
                                         alt="delete icon"
                                         v-show="freelancerData.password.length > 0"
                                         @click="clearInput('password')"
                                    >
                                </div>
                                <div class="error" v-if="errors.password">
                                    {{errors.password}}
                                </div>
                            </div>
                            <div class="faq-question-input account-edit-input">
                                <label class="faq-input-label">
                                    Confirm your password <small style="color:red;"> *</small>
                                </label>
                                <div class="faq-input" :class="{ 'error-input' : errors.password_confirmation}">
                                    <input type="password" placeholder="Confirm your password"
                                           v-model="freelancerData.password_confirmation">
                                    <img src="/images/client/campaign_activity/close_black.png"
                                         alt="delete icon"
                                         v-show="freelancerData.password_confirmation.length > 0"
                                         @click="clearInput('password_confirmation')"
                                    >
                                </div>
                                <div class="error" v-if="errors.password_confirmation">
                                    {{errors.password_confirmation}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="account-edit-section-edit-btn no-decoration"
                         id="submitBtnWrapper">
                        <a class="btn-primary" href="javascript:void(0)" @click="submitForm">
                            CONTINUE
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
        data() {
            return {
                isLoading: false,
                file: '',
                cv_file: '',
                fileChosen: false,
                uploadPercentage: 0,
                uploadMethod: '',
                cv_included: false,
                toBeEditedRecord: {
                    'src': ''
                },
                customValues: {
                    programmingLanguages: [
                        'JavaScript',
                        'HTML/CSS',
                        'SQL',
                        'Python',
                        'Java',
                        'Bash/Shell/PowerShell',
                        'C#',
                        'PHP',
                        'TypeScript',
                        'C++',
                        'C',
                        'Ruby',
                        'Go',
                        'Swift',
                        'Kotlin',
                        'R',
                        'VBA',
                        'Objective-C',
                        'Assembly',
                        'Scala',
                        'Rust',
                    ],
                    frameworks: [
                        'jQuery',
                        'Angular/Angular.js',
                        'React.js',
                        'ASP.NET',
                        'Express',
                        'Spring',
                        'Vue.js',
                        'Django',
                        'Flask',
                        'Laravel',
                        'Ruby,on,Rails',
                        'Drupal',
                        'Node.js',
                        '.NET',
                        '.NET,Core',
                        'Pandas',
                        'React,Native',
                        'Ansible',
                        'TensorFlow',
                        'Unity,3D',
                        'Cordova',
                        'Xamarin',
                        'Apache,Spark',
                        'Hadoop',
                        'Flutter',
                        'Wordpress'
                    ],
                    databases: [
                        'MySQL',
                        'PostgreSQL',
                        'Microsoft,SQL,Server',
                        'SQLite',
                        'MongoDB',
                        'Redis',
                        'MariaDB',
                        'Oracle',
                        'Elasticsearch',
                        'Firebase',
                        'DynamoDB',
                        'Cassandra',
                        'Couchbase',
                    ],
                },
                errors: {
                    'firstName': '',
                    'lastName': '',
                    'phone': '',
                    'email': '',
                    'password': '',

                    'skype': '',
                    'instagram': '',
                    'linkedin': '',
                    'website': '',
                    'facebook': '',
                    'github': '',
                    'timezone': '',
                    'city': '',

                },
                freelancerData: {
                    'id': '',
                    'firstName': '',
                    'lastName': '',
                    'phone': '',
                    'email': '',
                    'city': '',
                    'password': '',
                    'password_confirmation': '',

                    'whatsapp': false,
                    'telegram': false,
                    'timezone': '',

                    'skype': '',
                    'instagram': '',
                    'linkedin': '',
                    'website': '',
                    'facebook': '',
                    'github': '',

                }
            }
        },
        methods: {
            submitForm() {
                this.isLoading = true;
                let formData = new FormData();

                $.each(this.freelancerData, (field) => {
                    formData.append(field, this.freelancerData[field]);
                });

                this.clearErrors();

                axios.post('/freelancer/it/register/submit',
                    formData,
                ).then((response) => {
                    if (response.data.errors) {
                        this.updateErrors(response.data.errors);
                        this.isLoading = false;
                    } else {
                        window.location.href = '/freelancer/dashboard/my-account';
                    }
                });
            },
            clearErrors() {
                $.each(this.errors, (error) => {
                    this.errors[error] = '';
                });

            },
            clearInput(field) {
                this.freelancerData[field] = '';
            },

            updateErrors(responseErrors) {
                $.each(this.errors, (error) => {
                    if (responseErrors[error]) {
                        this.errors[error] = responseErrors[error][0];
                    }
                });
            }

        },
        mounted() {
        }
    }
</script>

<style scoped lang="scss">
    .loader {
        border: 15px solid lightblue;
        border-radius: 50%;
        border-top: 15px solid #3498db;
        width: 150px;
        height: 150px;
        margin-right: 25px;
        margin-top: 50px;
        -webkit-animation: spin 2s linear infinite; /* Safari */
        animation: spin 2s linear infinite;
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    @media only screen and (max-width: 600px) {
        .recorder_wrapper_phone {
            width: 300px;
        }
    }


    .form-group {
        margin-bottom: 1rem;
        display: flex;
        flex-direction: column;
        align-items: start;
        justify-content: start;
    }

    .faq-input-label {
        text-transform: capitalize;
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
