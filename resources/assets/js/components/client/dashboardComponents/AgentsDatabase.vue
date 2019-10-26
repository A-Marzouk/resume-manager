<template>

    <div>
        <div>
            <div class="d-flex justify-content-center">
                <div class="dashboard-box">
                    <div class="agentsSection">
                        <img class="agentsBg-1" src="/images/home/agentsBg-1.svg" alt="">
                        <img class="agentsBg-2" src="/images/home/agentsBg-2.svg" alt="">
                        <img class="agentsBg-3" src="/images/home/agentsBg-3.svg" alt="">
                        <img src="/images/home/pencilsBg.png" alt="" class="pencilsBg">
                        <div class="agentsContainer__searchTools">
                            <button  class="btn-first active">
                                Search developers
                            </button>
                        </div>

                        <div class="agentsContainer__searchSelects">
                            <div class="agentsContainer__selectContainer" :class="{active: activeBox === 'job_title'}">
                                <input type="text" name="job_title" v-model="searchParams.job_title" @focus="activeBox = 'job_title'"
                                        placeholder="Job title"/>
                            </div>
                            <div class="agentsContainer__selectContainer" :class="{active: activeBox === 'frameworks'}">
                                <input type="text" name="skills" v-model="searchParams.frameworks" @focus="activeBox = 'frameworks'"
                                        placeholder="Languages, Frameworks.."/>
                            </div>
                            <div class="agentsContainer__selectContainer" :class="{active: activeBox === 'experience'}">
                                <input type="text" name="experience" v-model="searchParams.experience" @focus="activeBox = 'experience'"
                                        placeholder="Experience"/>
                            </div>
                            <div class="agentsContainer__selectContainer" :class="{active: activeBox === 'available_hours'}">
                                <input type="number" min="0" max="99" step="1/2" name="available_hours" v-model="searchParams.available_hours" @focus="activeBox = 'available_hours'"
                                       placeholder="Available hours"/>
                            </div>

                            <div class="agentsContainer__selectContainer" :class="{active: activeBox === 'language'}">
                                <select name="rate" v-model="searchParams.salary_hour" @focus="activeBox = 'language'"
                                >
                                    <option value="">Choose language</option>
                                    <option v-for="(language, index) in customValues.languages" :value="language"
                                            :key="language + index"> {{language}}
                                    </option>
                                </select>
                            </div>


                            <div class="agentsContainer__selectContainer" :class="{active: activeBox === 'gender'}">
                                <select name="gender" v-model="searchParams.gender" @focus="activeBox = 'gender'"
                                >
                                    <option value="">Choose a gender</option>
                                    <option v-for="(gender, index) in customValues.genders" :value="gender.value"
                                            :key="gender.value + index">{{gender.label}}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <!-- form btns -->
                        <div class="container w-100 d-flex align-items-center justify-content-end mb-3 NoDecor">
                            <a href="javascript:void(0)" @click="updateSearch"
                               class="btn btn-primary d-flex justify-content-center align-items-center">RESULTS
                            </a>
                        </div>
                        <div class="col-12 center-content NoDecor" id="aboveSearchResultsSection">

                        </div>

                        <img src="/images/home/computer.png" alt="computer" class="bottomBg">
                    </div>
                </div>
            </div>

        </div>

        <div class="d-flex justify-content-center" v-if="showSearchResults">
            <div class="main-grid">
                <div class="header-text d-flex justify-content-between align-items-center">
                    <div>
                        <img src="/images/client/add_agent/ic/search_results_40px.png" alt="search"
                             class="icon-margin small-image">
                        SEARCH RESULTS
                    </div>

                    <div class="NoDecor">
                        <a href="javascript:void(0)" @click="saveSearch"  class="btn btn-primary d-flex justify-content-center align-items-center">
                            {{searchSaved ? 'Saved' : 'Save search'}}
                        </a>
                    </div>
                </div>

                <div v-show="searchResults.length > 0">
                    <div v-for="(agent,index) in searchResults" :key="index">
                        <div class="responsive-grid mb-3"
                             style="margin-top: 32px;">
                            <!--image-->
                            <div class="d-flex">
                                <div class="p-2">
                                    <img src="/images/client/add_agent/search_result/ic/user/user123.png" class="avator"/>
                                </div>
                                <!--location-->
                                <div class="p-2">
                                    <div class="big-font">{{agent.user.user_data.first_name}}
                                        {{agent.user.user_data.last_name}}
                                    </div>
                                    <div class="location">
                                        <img src="/images/client/add_agent/search_result/icon/maps/place_24px.png"/>
                                        Dublin, Ireland
                                    </div>
                                    <div class="visiblty">
                                        <div class="pt-2 NoDecor">
                                            <a href="javascript:void(0)" class="btn btn-primar btn-radius btn-responsive">
                                                VISIT AGENT'S PROFILE
                                            </a>
                                        </div>
                                        <div>
                                            <button class="btn btn-left btn-radius btn-responsive d-flex align-items-center">
                                                <img src="/images/client/add_agent/search_result/ic/play_rec/Vector.png"
                                                     style="margin-right: 15px;"/>
                                                LISTEN TO THE RECORD
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--info-->
                            <div class="p-2 info-grid"
                                 style="">
                                <div class="big-font">
                                    <img src="/images/client/add_agent/search_result/ic/primary_job_name.png"
                                         class="primaryjob-icon"/>
                                    {{agent.user.user_data.job_title}}
                                </div>
                                <div style="font-size: 16px; color : #4a5464; margin: 20px 0 20px;">
                                    <span style="font-weight: 500;">Sector experience: </span> {{agent.experience}}
                                </div>
                                <div>
                                    <span style="font-weight: 500; word-break: break-all;">Technologies, software: </span> {{agent.technologies}}
                                </div>
                                <div style="margin: 20px 0 ;">
                                    <span style="font-weight: 500;">Languages: </span>
                                    <span v-for="(language,index) in agent.user.languages"
                                          :key="index"> {{language.label}}</span>
                                </div>
                                <div>
                                    <span style="font-weight: 500;">No. hours per week: </span>{{Math.trunc(agent.available_hours_per_week)}}
                                    hours
                                </div>
                            </div>
                            <div class="invisiblty">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <button class="btn btn-left btn-radius btn-responsive d-flex align-items-center"
                                                style="width: 136px;!important">
                                            <img src="/images/client/add_agent/search_result/ic/play_rec/Vector.png"
                                                 style="margin-right: 15px;"/>
                                            LISTEN TO THE RECORD
                                        </button>
                                    </div>
                                    <div>
                                        <button class="btn btn-primar btn-radius btn-responsive">VISIT PROFILE</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr/>
                    </div>

                    <!-- buttons -->
                    <div class="justify-content-center d-flex pt-4">
                        <button type="button"
                                class="btn btn-footer btn-radius align-item-center">
                            <img src="/images/client/add_agent/search_result/btn/refresh-arrow.png" alt=""
                                 class="refresh-icon">
                            LOAD MORE
                        </button>
                    </div>

                </div>

                <div v-show="searchResults.length < 1">
                    Please refine your search parameters.
                </div>
            </div>
        </div>

    </div>

</template>
<script>
    export default {
        data() {
            return {
                searchParams: {
                    job_title: '',
                    experience: '',
                    available_hours: '',
                    frameworks: '',
                    language: '',
                    gender: '',
                    salary_hour: '',
                },
                searchSaved:false,
                customValues: {
                    jobTitles: [
                        'UI/UX designer',
                        'Illustrator',
                        'Motion designer',
                        'Digital artist'
                    ],
                    languages: [
                        'English',
                        'Spanish',
                    ],
                    genders: [
                        {label: 'Male' , value: 'm'},
                        {label: 'Female' , value: 'f'},
                        {label: 'Both' , value: 'b'}
                    ],
                    rates: [
                        {
                            value: '10',
                            name: 'Max of 10$'
                        },
                        {
                            value: '20',
                            name: 'Max of 20$'
                        },
                        {
                            value: '30',
                            name: 'Max of 30$'
                        },
                        {
                            value: '40',
                            name: 'Max of 40$'
                        },
                        {
                            value: '1000',
                            name: '$$$'
                        },
                    ],
                    availabilities: [
                        {
                            value: '10',
                            name: '10+'
                        },
                        {
                            value: '20',
                            name: '20+'
                        },
                        {
                            value: '30',
                            name: '30+'
                        },
                        {
                            value: '40',
                            name: '40+'
                        },

                    ],
                    countries: ["Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Anguilla", "Antigua &amp; Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas"
                        , "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia &amp; Herzegovina", "Botswana", "Brazil", "British Virgin Islands"
                        , "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Chad", "Chile", "China", "Colombia", "Congo", "Cook Islands", "Costa Rica"
                        , "Cote D Ivoire", "Croatia", "Cruise Ship", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea"
                        , "Estonia", "Ethiopia", "Falkland Islands", "Faroe Islands", "Fiji", "Finland", "France", "French Polynesia", "French West Indies", "Gabon", "Gambia", "Georgia", "Germany", "Ghana"
                        , "Gibraltar", "Greece", "Greenland", "Grenada", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India"
                        , "Indonesia", "Iran", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Jamaica", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kuwait", "Kyrgyz Republic", "Laos", "Latvia"
                        , "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Mauritania"
                        , "Mauritius", "Mexico", "Moldova", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Namibia", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia"
                        , "New Zealand", "Nicaragua", "Niger", "Nigeria", "Norway", "Oman", "Pakistan", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal"
                        , "Puerto Rico", "Qatar", "Reunion", "Romania", "Russia", "Rwanda", "Saint Pierre &amp; Miquelon", "Samoa", "San Marino", "Satellite", "Saudi Arabia", "Senegal", "Serbia", "Seychelles"
                        , "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "South Africa", "South Korea", "Spain", "Sri Lanka", "St Kitts &amp; Nevis", "St Lucia", "St Vincent", "St. Lucia", "Sudan"
                        , "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Timor L'Este", "Togo", "Tonga", "Trinidad &amp; Tobago", "Tunisia"
                        , "Turkey", "Turkmenistan", "Turks &amp; Caicos", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay"
                        , "Uzbekistan", "Venezuela", "Vietnam", "Virgin Islands (US)", "Yemen", "Zambia", "Zimbabwe"],
                },
                activeBox: 'job_title',
                searchResults: [],
                clientCampaigns: [],
                showSearchResults: false,
                notificationMessage: '',
            }
        },
        methods: {
            updateSearch() {
                axios.post('/client/agents/search', this.searchParams)
                    .then((response) => {
                        this.searchResults = response.data;
                        this.showSearchResults = true;
                        this.searchSaved = false;

                        // scroll to search section
                        $('html, body').animate({
                            scrollTop: $("#aboveSearchResultsSection").offset().top
                        }, 2000);
                    })
                    .catch((error) => {
                        console.log(error.response.data);
                    });
            },
            hideNotification() {
                $('#notificationBar').css('display', 'none');
            },
            showErrorMessage() {
                this.notificationMessage = 'Error! Agent already exists in the selected campaign.';
                $('.notificationBar').css('background', 'red');
                $('#notificationBar').fadeIn(600);
                setTimeout(() => {
                    $('#notificationBar').fadeOut(1500);
                }, 4000);
            },
            saveSearch(){
                if(this.searchSaved){
                    this.$emit('showPositiveNotification','Already saved!');
                    return;
                }
                axios.post('/client/search/save',{freelancers : this.searchResults})
                    .then( (response) => {
                        console.log(response.data);
                        if (response.data.status === 'success') {
                            this.$emit('showPositiveNotification','Search successfully saved !');
                            this.searchSaved = true;
                        }
                    })
                    .catch()
            }
        },
        mounted() {
            this.clientCampaigns = this.$attrs.clientcampaigns;
        }
    }


    $(document).ready(function () {

        $(":radio[class=sr-only]").on("change", function () {
            var female = document.getElementById('female').checked;
            var both = document.getElementById('both').checked;
            var male = document.getElementById('male').checked;
            var female_gender = document.getElementById('female-gender');
            var bothed_gender = document.getElementById('both-gender');
            var man_gender = document.getElementById('male-gender');
            if (female == true) {
                $(female_gender).css({backgroundImage: 'url("/images/client/add_agent/femaleselected.jpg")'});
                $(bothed_gender).css({backgroundImage: 'url("/images/client/add_agent/gender/both_gender_icon.png")'});
                $(man_gender).css({backgroundImage: 'url("/images/client/add_agent/male.jpg")'});
            } else if (both == true) {
                $(bothed_gender).css({backgroundImage: 'url("/images/client/add_agent/bothselected.jpg")'});
                $(female_gender).css({
                    backgroundImage: 'url("/images/client/add_agent/female.jpg")',
                    width: 46,
                    height: 40,
                    backgroundPosition: 'center',
                    backgroundSize: 'cover'
                });
                $(man_gender).css({backgroundImage: 'url("/images/client/add_agent/male.jpg")'});
            } else if (male == true) {
                $(man_gender).css({
                    backgroundImage: 'url("/images/client/add_agent/maleselected.jpg")',
                    width: 46,
                    height: 40,
                    backgroundPosition: 'center',
                    backgroundSize: 'cover'
                });
                $(female_gender).css({
                    backgroundImage: 'url("/images/client/add_agent/female.jpg")',
                    width: 46,
                    height: 40,
                    backgroundPosition: 'center',
                    backgroundSize: 'cover'
                });
                $(bothed_gender).css({backgroundImage: 'url("/images/client/add_agent/gender/both_gender_icon.png")'});
            } else {
                $(female_gender).css({
                    backgroundImage: 'url("/images/client/add_agent/female.jpg")',
                    width: 46,
                    height: 40,
                    backgroundPosition: 'center',
                    backgroundSize: 'cover'
                });
                $(bothed_gender).css({backgroundImage: 'url("/images/client/add_agent/gender/both_gender_icon.png")'});
                $(man_gender).css({backgroundImage: 'url("/images/client/add_agent/male.jpg")'});
            }

            var english = document.getElementById('english').checked;
            var spanish = document.getElementById('spanish').checked;
            var english_label = document.getElementById('english_label');
            var spanish_label = document.getElementById('spanish_label');
            if (english == true) {
                $(english_label).css({backgroundImage: 'url("/images/client/add_agent/englishselected.jpg")'});
                $(spanish_label).css({backgroundImage: 'url("/images/client/add_agent/spanish.jpg")'});
            } else if (spanish == true) {
                $(english_label).css({backgroundImage: 'url("/images/client/add_agent/english.jpg")'});
                $(spanish_label).css({backgroundImage: 'url("/images/client/add_agent/spanishselected.jpg")'});
            }

        })
    })
</script>

<style scoped lang="scss">
    .btn-primar:hover {
        color: white;
    }
    
    .agentsSection{
        padding: 30px 30px 10px 30px !important;
    }

    .main-grid {
        margin-top: 22px;
        width: 100% !important;
    }

    .notificationBar {
        margin-top: -8px;
        z-index: 2;
        width: 1165px;
    }

    @media screen and (max-width: 1270px) {
        .notificationBar {
            width: 96%;
        }
    }

    .header-text {
        justify-content: space-between;
        padding-bottom: 24px;
        padding-top: 34px;
        margin-left: 24px;
        margin-right: 24px;
        border-bottom: 1px solid rgba(188, 191, 198, 0.44);
    }

    .form-row {
        margin-left: 24px;
        margin-right: 24px;
    }
</style>
