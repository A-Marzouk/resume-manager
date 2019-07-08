<template>
    <div class="d-flex align-items-center flex-column">
        <nav class="navbar navbar-light fixed-top dashboard_navbar">
            <div class="backBtn">
                <a href="/admin/agents">
                    <img src="/images/client/arrow_back.png" alt="back-icon">
                </a>
                JASON MORGENSTERN PROFILE
            </div>
        </nav>
        <!--navbar-->

        <div class="account-info-edit dashboard-box mt-2">
            <div class="account-info-edit-heading dashboard-box-heading mr-0 ml-0 align-items-center">
                <div class="left">
                    <img src="/images/admin/applicant-profile/main_40px.svg" alt=""  class="icon-margin small-image">
                    <span>
                        PERSONAL INFORMATION
                    </span>
                </div>
                <div class="blue-text no-decoration right">
                    <a href="#">EDIT</a>
                </div>
            </div>
            <div class="account-info-content-wrapper pb-2">
                <div class="account-info-content ">
                    <div class="acc-info-content-heading">
                        <div class="acc-info-item">
                            <img src="/images/client/dummy.png" alt="name icon" style="width:58px; height:56px;">
                            <span>
                                {{currentUser.data.first_name}} {{currentUser.data.last_name}}
                            </span>
                            <img src="/images/admin/male.png" alt="" class="ml-2" v-if=" currentUser.data.gender.toLowerCase() === 'm'">
                            <img src="/images/admin/female.svg" alt="" class="ml-2" v-if=" currentUser.data.gender.toLowerCase() === 'f'">
                        </div>
                        <div class="acc-info-timezone">
                            {{timezones[currentUser.data.timezone]}}
                        </div>
                    </div>
                    <div class="acc-info-content-item">
                        <img src="/images/client/my_account/phone_number.png" alt="phone icon">
                        <div>
                            {{currentUser.data.phone}}
                        </div>
                    </div>
                    <div class="acc-info-content-item">
                        <img src="/images/client/my_account/email.png" alt="email icon">
                        <div>
                            {{currentUser.email}}
                        </div>
                    </div>
                    <div class="acc-info-content-item">
                        <img src="/images/admin/applicant-profile/place_24px.svg" alt="email icon">
                        <div>
                            {{currentUser.data.city}}  {{currentUser.data.country}}
                        </div>
                    </div>
                    <div class="acc-info-content-item">
                        <img src="/images/admin/applicant-profile/paypal.svg" alt="email icon">
                        <div>
                            PayPal account:  {{currentUser.data.paypal_acc_number}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="account-info-edit dashboard-box mt-2">
            <div class="account-info-edit-heading dashboard-box-heading mr-0 ml-0">
                <div class="left">
                    <img src="/images/admin/applicant-profile/prof_info_40px.svg" alt=""  class="icon-margin small-image">
                    <span>
                        PROFESSIONAL INFORMATION
                    </span>
                </div>
                <div class="blue-text no-decoration right">
                    <a href="#">EDIT</a>
                </div>

            </div>
            <div class="account-info-content-wrapper  pb-2">
                <div class="account-info-content ">
                    <div class="acc-info-content-item">
                        <img src="/images/admin/applicant-profile/job_title.svg" alt="phone icon">
                        <div>
                            <b>Primary job title:</b> {{currentUser.data.job_title}}
                        </div>
                    </div>
                    <div class="acc-info-content-item">
                        <img src="/images/admin/applicant-profile/experience.svg" alt="phone icon">
                        <div>
                            <b>Sector experience:</b>  {{currentUser.agent.experience}}
                        </div>
                    </div>
                    <div class="acc-info-content-item">
                        <img src="/images/admin/applicant-profile/software.svg" alt="phone icon">
                        <div>
                            <b>Technologies, software:</b> {{currentUser.agent.technologies}}
                        </div>
                    </div>
                    <div class="acc-info-content-item">
                        <img src="/images/admin/applicant-profile/hours.svg" alt="phone icon">
                        <div>
                            <b>No. hours per week:</b>  {{Math.ceil(currentUser.agent.available_hours_per_week)}} hours
                        </div>
                    </div>
                    <div class="acc-info-content-item">
                        <img src="/images/admin/applicant-profile/voice.svg" alt="phone icon">
                        <div>
                            <b>Voice character:</b> {{currentUser.agent.voice_character}}
                        </div>
                    </div>
                    <div class="acc-info-content-item">
                        <img src="/images/admin/applicant-profile/languages.svg" alt="phone icon">
                        <div>
                            <b>Languages</b>
                            <span v-for="(language,index) in currentUser.languages" :key="index">
                                {{language.label}}<span v-show="index < currentUser.languages.length -1 ">, </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="account-info-edit dashboard-box mt-2">
            <div class="account-info-edit-heading dashboard-box-heading mr-0 ml-0">
                <div class="left">
                    <img src="/images/admin/applicant-profile/recording_resume_40px.svg" alt=""  class="icon-margin small-image">
                    <span>
                        RECORDING AND RESUME
                    </span>
                </div>
                <div class="blue-text no-decoration right">
                    <a href="#">EDIT</a>
                </div>
            </div>
            <div class="account-info-content-wrapper  pb-2">
                <div class="account-info-content pt-0 ">
                    <div class="acc-info-content-item">
                        <div>
                            <b>Recording of the applicant’s voice</b>
                        </div>
                    </div>
                    <div class="recorder-bar justify-content-between">
                        <div class="d-flex align-items-center ml-2">
                            <img src="/images/admin/applicant-profile/pause.svg" alt="" style="margin-top: -3px; margin-right: 8px;" >
                            <div style="font-size: 12px;">
                                Title_o...
                            </div>
                        </div>
                        <div class="d-flex align-items-center mr-2">
                            <div class="time mr-4">
                                25:15
                            </div>
                            <img src="/images/admin/applicant-profile/download.svg" style="margin-top: -3px; margin-right: 8px;" >
                        </div>
                    </div>
                </div>
            </div>

            <div class="account-info-content-wrapper pt-0 pb-2">
                <div class="account-info-content pt-0 ">
                    <div class="acc-info-content-item">
                        <div>
                            <b>Applicant’s resume</b>
                        </div>
                    </div>
                    <div class="acc-info-content-item d-flex justify-content-between flex-small-column">
                        <div class="d-flex align-items-center">
                            <img src="/images/admin/applicant-profile/resume.svg" alt="phone icon" style="    margin-top: -3px; margin-right: 8px;" >
                            <div style="font-size: 12px;">
                                Title_of_...df.pdf
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="open-resume-text mr-4">
                                OPEN RESUME
                            </div>
                            <img src="/images/admin/applicant-profile/download.svg" style="    margin-top: -3px; margin-right: 8px;" >
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</template>

<script>
    export default {
        props:['user_id'],
        data(){
            return{
                currentUser:{},
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
        methods:{
            getCurrentUser(){
              axios.get('/admin/api/agent/' + this.user_id).then( (response) =>{
                  this.currentUser = response.data;
              });
            }
        },
        mounted() {
            this.getCurrentUser();
        }
    }
</script>

<style scoped>

</style>