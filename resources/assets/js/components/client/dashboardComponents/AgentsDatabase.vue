<template>
    <div>
        <div class="container" style="display: flex;justify-content: center;">
            <div class="notificationBar" id="notificationBar" style="display: none; position:fixed;">
                <div>
                    {{notificationMessage}}
                </div>
                <a href="javascript:void(0)" @click="hideNotification" class="no-decoration" style="color: white;">
                    x
                </a>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <div class="dashboard-box">
                <div class="header-text">
                    <img src="/images/client/add_agent/ic/search_40px.svg" alt="" class="icon-margin small-image">
                    ENTER THE PARAMETERS OF SEARCH
                </div>
                <!-- hr  -->
                <form class="">
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-row">
                                <div class="col-sm-12 col-md-12 col-lg-11 input_divider">
                                    <label>Enter primary job title</label>
                                    <input type="text"
                                           class="form-control form-control-sm borderinput"
                                           placeholder="e.g. Telesale" v-model="searchParams.job_title">
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-11 input_divider">
                                    <label>Enter sector experience</label>
                                    <input type="text"
                                           class="form-control form-control-sm borderinput"
                                           placeholder="PARAMETERS OF SEARCH"  v-model="searchParams.experience">
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-11 input_divider">
                                    <label>Enter technologies/ frameworks/software</label>
                                    <input type="text"
                                           class="form-control form-control-sm borderinput"
                                           placeholder="you can enter several "  v-model="searchParams.frameworks">
                                </div>
                            </div>
                        </div>
                        <!-- end form first column -->
                        <!-- form second column -->
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-row">
                                <div class="col-sm-12 col-md-12 col-lg-11 form-group input_divider flex-column">
                                    <label class="w-100">Choose voice character (for sales agents)</label>
                                    <select id="inState" class="form-control form-control-MD select"  v-model="searchParams.voice_character">
                                        <option selected  value="not-selected">-- Select --</option>
                                        <option
                                                value="Friendly">Friendly
                                        </option>
                                        <option value="Official">Official</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-11 input_divider">
                                    <label>Specify available hours per week</label>
                                    <input type="text"
                                           class="form-control form-control-sm borderinput" placeholder="25"  v-model="searchParams.available_hours">
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 ">
                                    <div class="row">
                                        <div class="">
                                            <div class="col-sm-12 input_divider">
                                                <label>Choose languages</label>
                                                <div class="row">
                                                    <div class="col-1 radio-grid">
                                                        <div class="radio-button">
                                                            <input type="radio"
                                                                   name="language"
                                                                   class="sr-only"
                                                                   value="english"
                                                                   id="english" v-model="searchParams.language">
                                                            <label for="english"
                                                                   id="english_label"
                                                                   class="form-icon"
                                                                   style="background: url(/images/client/add_agent/english.jpg);">
                                                                <!--<img src="/images/client/add_agent/language/english_icon.png" alt="english">-->
                                                            </label>
                                                            <div class="">
                                                                <label for="english">english</label>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <input type="radio"
                                                                   name="language"
                                                                   class="sr-only"
                                                                   value="spanish"
                                                                   id="spanish" v-model="searchParams.language">
                                                            <label for="spanish"
                                                                   id="spanish_label"
                                                                   class="form-icon"
                                                                   style="background: url(/images/client/add_agent/spanish.jpg);">
                                                                <!--<img src="/images/client/add_agent/language/spanish_icon.png" alt="english">-->
                                                            </label>
                                                            <div class="">
                                                                <label for="spanish">spanish</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-1"
                                             style="max-width: 55% !important; ">
                                            <div class="col-sm-12 input_divider">
                                                <label>Choose gender</label>
                                                <div class="row">
                                                    <div class="col-1 radio-grid">
                                                        <div class="radio-button">
                                                            <input type="radio"
                                                                   name="gender"
                                                                   class="sr-only"
                                                                   value="m"
                                                                   id="male" v-model="searchParams.gender">
                                                            <label for="male"
                                                                   id="male-gender"
                                                                   class="form-icon"
                                                                   style="background-image: url(/images/client/add_agent/male.jpg);">
                                                            </label>
                                                            <div class="">
                                                                <label for="male"
                                                                       class="icon-lable">male</label>
                                                            </div>
                                                        </div>
                                                        <!-- female icon -->
                                                        <div class="radio-button">
                                                            <input type="radio"
                                                                   name="gender"
                                                                   class="sr-only"
                                                                   value="f"
                                                                   id="female" v-model="searchParams.gender">
                                                            <label for="female"
                                                                   id="female-gender"
                                                                   class="form-icon"
                                                                   style="background-image: url(/images/client/add_agent/female.jpg);">
                                                            </label>
                                                            <div class="">
                                                                <label for="female"
                                                                       class="icon-lable">female</label>
                                                            </div>
                                                        </div>
                                                        <!-- both icon -->
                                                        <div class="">
                                                            <input type="radio"
                                                                   name="gender"
                                                                   class="sr-only"
                                                                   value="b"
                                                                   id="both" v-model="searchParams.gender">
                                                            <label for="both"
                                                                   id="both-gender"
                                                                   class="form-icon"
                                                                   style="background-image: url(/images/client/add_agent/gender/both_gender_icon.png);">
                                                            </label>
                                                            <div class="">
                                                                <label for="both"
                                                                       class="icon-lable">both</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <hr/>
                                </div>
                            </div>
                        </div>
                        <!-- form btns -->
                        <div class="container w-100 d-flex justify-content-end mb-3">
                            <a href="javascript:void(0)" @click="updateSearch"
                               class="btn btn-primary d-flex justify-content-center align-items-center">SEARCH FOR AGENTS
                            </a>
                        </div>
                        <div class="col-12 center-content NoDecor" id="aboveSearchResultsSection">

                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="d-flex justify-content-center" v-if="showSearchResults">
            <div class="main-grid">
                <div class="header-text">
                    <img src="/images/client/add_agent/ic/search_results_40px.png" alt="search"
                         class="icon-margin small-image">
                    SEARCH RESULTS
                </div>

                <div  v-show="searchResults.length > 0">
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
                                    <div class="big-font">{{agent.user.user_data.first_name}} {{agent.user.user_data.last_name}}</div>
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
                                    <span style="font-weight: 500;">Technologies, software: </span> {{agent.technologies}}
                                </div>
                                <div style="margin: 20px 0 ;">
                                    <span style="font-weight: 500;">Languages: </span>
                                    <span v-for="(language,index) in agent.user.languages" :key="index"> {{language.label}}</span>
                                </div>
                                <div>
                                    <span style="font-weight: 500;">No. hours per week: </span>{{Math.trunc(agent.available_hours_per_week)}} hours
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

                <div  v-show="searchResults.length < 1">
                    Please refine your search parameters.
                </div>
            </div>
        </div>


    </div>
</template>
<script>
    export default {
        data(){
            return {
                searchParams:{
                    job_title : '',
                    voice_character : 'not-selected' ,
                    experience:'',
                    available_hours:'',
                    frameworks:'',
                    language:'',
                    gender:'',
                },
                searchResults:[

                ],
                clientCampaigns :[

                ],
                showSearchResults:false,
                notificationMessage:'Successfully added agent to campaign ',
            }
        },
        methods:{
            updateSearch(){
                axios.post('/client/agents/search',this.searchParams)
                    .then( (response) => {
                        this.searchResults = response.data ;
                        this.showSearchResults = true ;

                        // scroll to search section
                        $('html, body').animate({
                            scrollTop: $("#aboveSearchResultsSection").offset().top
                        }, 2000);
                    } )
                    .catch( (error) => {
                        console.log(error.response.data);
                    } );
            },
            hideNotification(){
                $('#notificationBar').css('display','none');
            },
            showSuccessMessage(){
                $('.notificationBar').css('background','#FFBA69') ;
                this.notificationMessage = 'Successfully added agent to campaign !' ;
                $('#notificationBar').fadeIn(600);
                setTimeout(()=>{
                    $('#notificationBar').fadeOut(1500);
                },4000);
            },
            showErrorMessage(){
                this.notificationMessage = 'Error! Agent already exists in the selected campaign.' ;
                $('.notificationBar').css('background','red') ;
                $('#notificationBar').fadeIn(600);
                setTimeout(()=>{
                    $('#notificationBar').fadeOut(1500);
                },4000);
            },
        },
        mounted() {
            this.clientCampaigns = this.$attrs.clientcampaigns ;
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
    .btn-primar:hover{
        color: white;
    }

    .main-grid{
        margin-top: 22px;
    }

    .notificationBar{
        margin-top: -8px;
        z-index: 2;
        width: 1165px;
    }

    @media screen and (max-width: 1270px) {
        .notificationBar{
            width: 96%;
        }
    }

    .header-text{
        justify-content: space-between;
        padding-bottom: 24px;
        padding-top: 34px;
        margin-left: 24px;
        margin-right: 24px;
        border-bottom: 1px solid rgba(188, 191, 198, 0.44);
    }

    .form-row{
        margin-left: 24px;
        margin-right: 24px;
    }
</style>
