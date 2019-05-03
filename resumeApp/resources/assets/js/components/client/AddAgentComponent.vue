<template>
    <div>
        <nav class="navbar navbar-light fixed-top client_navbar">
            <div class="backBtn">
                <a href="/client/dashboard">
                    <img src="/resumeApp/public/images/client/arrow_back.png" alt="back-icon">
                </a>
                ARCHIVE OF CAMPAIGNS
            </div>
        </nav>
        <div class="visible-add-agent">
            <!-- visibale in laptop -->
        <div class="form-main-grid main-grid">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 header-text">
                    <img src="/resumeApp/public/images/client/add_agent/ic/search_40px.png" alt=""  class="icon-margin small-image">
                    ENTER THE PARAMETERS OF SEARCH
                </div>
            </div>

            <!-- hr  -->
            <div class="row">
                <div class="col-sm-12">
                    <hr/>
                </div>
            </div>

            <form class="add-agent-form">
                <div class="form-row">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12 col-lg-11 input_divider">
                                <label>Enter primary job title</label>
                                <input type="text" class="form-control form-control-sm borderinput" placeholder="e.g. Telesale">
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-11 input_divider">
                                <label>Enter sector experience</label>
                                <input type="text" class="form-control form-control-sm borderinput" placeholder="PARAMETERS OF SEARCH">
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-11 input_divider">
                                <label>Enter technologies/ frameworks/software</label>
                                <input type="text" class="form-control form-control-sm borderinput" placeholder="you can enter several ">
                            </div>
                        </div>
                    </div>
                    <!-- end form first column -->

                    <!-- form second column -->
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12 col-lg-11 form-group input_divider">
                                <label for="inState" class="">Choose voice character (for sales-agents)</label>
                                <select id="inState" class="form-control form-control-MD">
                                    <option selected value="">Voice chapter 1 type</option>
                                    <option value="">...</option>
                                </select>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-11 input_divider">
                                <label>Specify available hours per week</label>
                                <input type="text" class="form-control form-control-sm borderinput" placeholder="25">
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-12 ">
                                <div class="row">
                                    <div class="">
                                        <div class="col-sm-12 input_divider">
                                            <label>Choose languages</label>
                                            <div class="row">
                                                <div class="col-1 radio-grid">
                                                    <div class="radio-button">
                                                        <input type="radio" name="language" class="sr-only" id="english">
                                                        <label for="english">
                                                            <img src="/resumeApp/public/images/client/add_agent/language/english_icon.png" alt="english">
                                                        </label>
                                                        <div class="">
                                                            <label for="english">english</label>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <input type="radio" name="language" class="sr-only" id="spanish">
                                                        <label for="spanish">
                                                            <img src="/resumeApp/public/images/client/add_agent/language/spanish_icon.png" alt="english">
                                                        </label>
                                                        <div class="">
                                                            <label for="spanish">spanish</label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-1" style= "max-width: 55% !important; ">
                                        <div class="col-sm-12 input_divider">
                                            <label>Choose gender</label>
                                            <div class="row">
                                                <div class="col-1 radio-grid">
                                                    <div class="radio-button">
                                                        <input type="radio" name="gender" class="sr-only" id="male">
                                                        <label for="male">
                                                            <img src="/resumeApp/public/images/client/add_agent/gender/male_icon.png" alt="male">
                                                        </label>
                                                        <div class="">
                                                            <label for="male" class="icon-lable">male</label>
                                                        </div>
                                                    </div>
                                                    <!-- female icon -->
                                                    <div class="radio-button">
                                                        <input type="radio" name="gender" class="sr-only" id="female">
                                                        <label for="female">
                                                            <img src="/resumeApp/public/images/client/add_agent/gender/female_icon.png" alt="female">
                                                        </label>
                                                        <div class="">
                                                            <label for="female" class="icon-lable">female</label>
                                                        </div>
                                                    </div>

                                                    <!-- both icon -->
                                                    <div class="">
                                                        <input type="radio" name="gender" class="sr-only" id="both">
                                                        <label for="both">
                                                            <img src="/resumeApp/public/images/client/add_agent/gender/both_gender_icon.png" alt="both">
                                                        </label>
                                                        <div class="">
                                                            <label for="both" class="icon-lable">both</label>
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
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <hr/>
                            </div>
                        </div>
                    </div>

                    <!-- form btns -->
                    <div class="col-sm-12">
                        <div class="form-row">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-8 right-side">
                                        <button type="button" class="btn btn-left">VIEW SAVED SEARCH</button>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="row">
                                            <div class="col-12 center-content">
                                                <button type="button" class="btn btn-right-top">SEARCH FOR AGENTES</button>
                                            </div>
                                            <div class="col-12 center-content">
                                                <button type="button" class="btn btn-right-bottom">SAVE THIS SEARCH</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>
    <div class="invisible-add-agent align-item-center">
        <!-- visiable in mobile and tablet -->
        <div class="header-text invisiable-div search-main-grid">
            <img src="/resumeApp/public/images/client/add_agent/ic/search_40px.png" alt="search" class="search-icon-margin small-image">
            GO TO PARAMETERS OF SEARCH
        </div>
    </div>

    <!-- search_result -->
    <div class="main-grid search-main-grid">

        <div class="header-text">
            <img src="/resumeApp/public/images/client/add_agent/ic/search_results_40px.png" alt="search" class="icon-margin small-image">
            SEARCH RESULTS
        </div>

        <!-- first agent -->
        <hr/>
        <div class="row ">
            <div class="col-12 col-sm-7 col-md-5 col-lg-6 col-xl-4">
                <div class="row">
                    <div class="col-12 col-sm-12 d-flex align-items-center">

                        <img src="/resumeApp/public/images/client/add_agent/search_result/ic/user/user123.png" alt="user" class="avator">
                        <div class="">
                            <div class="big-font">
                                Jason Morgenstern
                            </div>

                            <div>
                                <img src="/resumeApp/public/images/client/add_agent/search_result/icon/maps/place_24px.png" alt="">
                                Dublin, Ireland
                            </div>
                        </div>


                    </div>

                    <!-- invisable for mobile -->
                    <div class="btn-margin ">
                        <div class="visiblty">
                            <div class="btn-space">
                                <button type="button" class="btn btn-primar btn-radius btn-responsive">VISIT AGENT’S PROFILE</button>
                            </div>
                            <div>
                                <button type="button" class="btn btn-left btn-radius btn-responsive center-align">
                                    <img src="/resumeApp/public/images/client/add_agent/search_result/ic/play_rec/Vector.png" alt="" class="play-icon">
                                    LISTEN TO THE RECORDING
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!--main content second column  -->
            <div class="col-12 col-sm-5 col-md-7 col-lg-6 col-xl-5">
                <div class="row agent-desc-row">
                    <div class="col-12 col-md-12 col-lg-12 justify-item-center big-font">
                        <img src="/resumeApp/public/images/client/add_agent/search_result/ic/primary_job_name.png" alt=""  class="primaryjob-icon">
                        Telemarketing, Telesales
                    </div>

                    <div class="col-12 col-sm-12 mobile-font">
              <span class="font-span">
                Sector experience:
              </span>
                        Real estate, Investement, Insurance
                    </div>

                    <div class="col-12 mobile-font">
              <span class="font-span">
                Technologies, software:
              </span>
                        English, Spanish
                    </div>

                    <div class="col-12 mobile-font">
              <span class="font-span">
                Languages:
              </span>
                        English, Spanish
                    </div>

                    <div class="col-12 mobile-font">
              <span class="font-span">
                No. hours per week:
              </span>
                        30-40 hours
                    </div>

                </div>
            </div>


        </div>

        <div class="col-12 zero-padding">
            <div class="invisiblty">
                <div class="row input_divider justify-content-around align-items-center">
                    <div class="">
                        <button type="button" class="btn btn-right-bottom btn-left btn-radius btn-responsive">
                            <div class="mobile-fon center-align">
                                <img src="/resumeApp/public/images/client/add_agent/search_result/ic/play_rec/Vector.png" alt="" class="play-icon">
                                LISTEN TO  THE RECORDING
                            </div>
                        </button>
                    </div>
                    <div class="">
                        <button type="button" class="btn btn-primary btn-radius mobile-font btn-responsive">VISIT AGENT’S PROFILE</button>
                    </div>

                </div>
            </div>
        </div>

        <!--second agent  -->
        <hr/>
        <div class="row">
            <div class="col-12 col-sm-7 col-md-5 col-lg-6 col-xl-4">
                <div class="row">
                    <div class="col-12 col-sm-12 d-flex align-items-center">

                        <img src="/resumeApp/public/images/client/add_agent/search_result/ic/user/user123.png" alt="user" class="avator">
                        <div class="">
                            <div class="big-font">
                                Jason Morgenstern
                            </div>

                            <div>
                                <img src="/resumeApp/public/images/client/add_agent/search_result/icon/maps/place_24px.png" alt="">
                                Dublin, Ireland
                            </div>
                        </div>


                    </div>

                    <!-- invisable for mobile -->

                    <div class="btn-margin">
                        <div class="visiblty">
                            <div class="btn-space">
                                <button type="button" class="btn btn-primar btn-radius btn-responsive">VISIT AGENT’S PROFILE</button>
                            </div>
                            <div>
                                <button type="button" class="btn btn-left btn-radius btn-responsive center-align">
                                    <img src="/resumeApp/public/images/client/add_agent/search_result/ic/play_rec/Vector.png" alt="" class="play-icon">
                                    LISTEN TO THE RECORDING
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!--main content second column  -->
            <div class="col-12 col-sm-5 col-md-7 col-lg-6 col-xl-5">
                <div class="row agent-desc-row">
                    <div class="col-12 col-md-12 col-lg-12 justify-item-center big-font">
                        <img src="/resumeApp/public/images/client/add_agent/search_result/ic/primary_job_name.png" alt=""  class="primaryjob-icon">
                        Telemarketing, Telesales
                    </div>

                    <div class="col-12 col-sm-12 mobile-font">
              <span class="font-span">
                Sector experience:
              </span>
                        Real estate, Investement, Insurance
                    </div>

                    <div class="col-12 mobile-font">
              <span class="font-span">
                Technologies, software:
              </span>
                        English, Spanish
                    </div>

                    <div class="col-12 mobile-font">
              <span class="font-span">
                Languages:
              </span>
                        English, Spanish
                    </div>

                    <div class="col-12 mobile-font">
              <span class="font-span">
                No. hours per week:
              </span>
                        30-40 hours
                    </div>

                </div>
            </div>


        </div>

        <div class="col-12 zero-padding">
            <div class="invisiblty">
                <div class="row input_divider justify-content-around align-items-center">
                    <div class="">
                        <button type="button" class="btn btn-right-bottom btn-left btn-radius btn-responsive">
                            <!-- <div class="row"> -->
                            <div class="mobile-fon center-align">
                                <img src="/resumeApp/public/images/client/add_agent/search_result/ic/play_rec/Vector.png" alt="" class="play-icon">
                                LISTEN TO  THE RECORDING
                            </div>
                            <!-- </div> -->
                        </button>
                    </div>
                    <div class="">
                        <button type="button" class="btn btn-primary btn-radius mobile-font btn-responsive">VISIT AGENT’S PROFILE</button>
                    </div>

                </div>
            </div>
        </div>

        <!-- thid agent  -->
        <hr/>
        <div class="row">
            <div class="col-12 col-sm-7 col-md-5 col-lg-6 col-xl-4">
                <div class="row">
                    <div class="col-12 col-sm-12 d-flex align-items-center">

                        <img src="/resumeApp/public/images/client/add_agent/search_result/ic/user/user123.png" alt="user" class="avator">
                        <div class="">
                            <div class="big-font">
                                Jason Morgenstern

                            </div>

                            <div>
                                <img src="/resumeApp/public/images/client/add_agent/search_result/icon/maps/place_24px.png" alt="">
                                Dublin, Ireland
                            </div>
                        </div>


                    </div>

                    <div class="btn-margin">

                        <!-- invisable for mobile -->

                        <div class="visiblty">
                            <div class="btn-space">
                                <button type="button" class="btn btn-primar btn-radius btn-responsive align-item-center">VISIT AGENT’S PROFILE</button>
                            </div>
                            <div>
                                <button type="button" class="btn btn-left btn-radius btn-responsive align-item-center">
                                    <img src="/resumeApp/public/images/client/add_agent/search_result/ic/play_rec/Vector.png" alt="" class="play-icon">
                                    LISTEN TO THE RECORDING
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!--main content second column  -->
            <div class="col-12 col-sm-5 col-md-7 col-lg-6 col-xl-5">
                <div class="row agent-desc-row">
                    <div class="col-12 col-md-12 col-lg-12 justify-item-center big-font">
                        <img src="/resumeApp/public/images/client/add_agent/search_result/ic/primary_job_name.png" alt=""  class="primaryjob-icon">
                        Telemarketing, Telesales
                    </div>

                    <div class="col-12 col-sm-12 mobile-font">
              <span class="font-span">
                Sector experience:
              </span>
                        Real estate, Investement, Insurance
                    </div>

                    <div class="col-12 mobile-font">
              <span class="font-span">
                Technologies, software:
              </span>
                        English, Spanish
                    </div>

                    <div class="col-12 mobile-font">
              <span class="font-span">
                Languages:
              </span>
                        English, Spanish
                    </div>

                    <div class="col-12 mobile-font">
              <span class="font-span">
                No. hours per week:
              </span>
                        30-40 hours
                    </div>

                </div>
            </div>


        </div>

        <div class="col-12 zero-padding">
            <div class="invisiblty">
                <div class="row input_divider justify-content-around align-items-center">
                    <div class="">
                        <button type="button" class="btn btn-right-bottom btn-left btn-radius btn-responsive">
                            <!-- <div class="row"> -->
                            <div class="mobile-fon center-align">
                                <img src="/resumeApp/public/images/client/add_agent/search_result/ic/play_rec/Vector.png" alt="" class="play-icon">
                                LISTEN TO  THE RECORDING
                            </div>
                            <!-- </div> -->
                        </button>
                    </div>
                    <div class="">
                        <button type="button" class="btn btn-primary btn-radius mobile-font btn-responsive">VISIT AGENT’S PROFILE</button>
                    </div>

                </div>
            </div>
        </div>
        <hr>

        <!-- buttons -->
        <div class="col-12 justify-content-center d-flex">
            <button type="button" class="btn btn-footer btn-radius align-item-center">
                <img src="/resumeApp/public/images/client/add_agent/search_result/btn/refresh-arrow.png" alt="" class="refresh-icon">
                LOAD MORE
            </button>
        </div>
    </div>

    </div>


</template>

<script>
    export default {
        name: "test"
    }
</script>
