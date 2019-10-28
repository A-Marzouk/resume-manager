<template>
    <div>
        <nav class="navbar navbar-light fixed-top dashboard_navbar">
            <div class="backBtn">
                <a href="/admin">
                    <img src="/images/client/arrow_back.png" alt="back-icon">
                </a>
                PARAMETERS OF ADVANCED SEARCH
            </div>
        </nav>
        <!--<div class="visible-add-agent">-->
        <!-- visibale in laptop -->
        <div class="d-flex justify-content-center">
            <div class="main-grid">
                <div class="header-text">
                    <img src="/images/client/add_agent/ic/search_40px.svg" alt=""  class="icon-margin small-image">
                    ENTER THE PARAMETERS OF SEARCH
                </div>
                <hr />
                <!-- hr  -->
                <form class="add-agent-form">
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-row">
                                <div class="col-sm-12 col-md-12 col-lg-11 input_divider">
                                    <label>Enter primary job title</label>
                                    <input type="text"
                                           class="form-control form-control-sm borderinput"
                                           placeholder="e.g. Telesale">
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-11 input_divider">
                                    <label>Enter sector experience</label>
                                    <input type="text"
                                           class="form-control form-control-sm borderinput"
                                           placeholder="PARAMETERS OF SEARCH">
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-11 input_divider">
                                    <label>Enter technologies/ frameworks/software</label>
                                    <input type="text"
                                           class="form-control form-control-sm borderinput"
                                           placeholder="you can enter several ">
                                </div>
                            </div>
                        </div>
                        <!-- end form first column -->
                        <!-- form second column -->
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-row">
                                <div class="col-sm-12 col-md-12 col-lg-11 form-group input_divider">
                                    <label for="inState"
                                           class="">Choose voice character (for sales-agents)</label>
                                    <select id="inState"
                                            class="form-control form-control-MD select">
                                        <option selected
                                                value="">Voice chapter 1 type</option>
                                        <option value="">...</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-11 input_divider">
                                    <label>Specify available hours per week</label>
                                    <input type="text"
                                           class="form-control form-control-sm borderinput"
                                           placeholder="25">
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
                                                                   id="english">
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
                                                                   id="spanish">
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
                                                                   id="male">
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
                                                                   id="female">
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
                                                                   id="both">
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
                        <hr />
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <hr />
                                </div>
                            </div>
                        </div>
                        <!-- form btns -->
                        <div class="col-sm-12">
                            <div class="form-row">
                                <div class="container">
                                    <div class="row"
                                         style="margin-top: 14px;">
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="row">
                                                <div class="col-12 center-content">
                                                    <button type="button"
                                                            class="btn btn-right-top">SEARCH FOR AGENTES</button>
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
        <!--</div>-->
        <!--<div class="invisible-add-agent d-flex align-item-center justify-content-center">-->
        <!--&lt;!&ndash; visiable in mobile and tablet &ndash;&gt;-->
        <!--<div class="header-text invisiable-div main-grid" style="padding: 20px 0 !imprtnant; margin-bottom :20px;">-->
        <!--<img src="/images/client/add_agent/ic/search_40px.png" alt="search" class="search-icon-margin small-image">-->
        <!--GO TO PARAMETERS OF SEARCH-->
        <!--</div>-->
        <!--</div>-->
        <!-- search_result -->
        <div class="d-flex justify-content-center ">
            <div class="main-grid">
                <div class="header-text">
                    <img src="/images/client/add_agent/ic/search_results_40px.png" alt="search" class="icon-margin small-image">
                    SEARCH RESULTS
                </div>
                <!-- first agent -->
                <hr />
                <div class="responsive-grid mb-3"
                     style="margin-top: 32px;">
                    <!--image-->
                    <div class="d-flex">
                        <div class="p-2">
                            <img src="/images/client/add_agent/search_result/ic/user/user123.png" class="avator"/>
                        </div>
                        <!--location-->
                        <div class="p-2">
                            <div class="big-font">Jason Morgenstern</div>
                            <div class="location">
                                <img src="/images/client/add_agent/search_result/icon/maps/place_24px.png"/>
                                Dublin, Ireland
                            </div>
                            <div class="visiblty">
                                <div>
                                    <button class="btn btn-primar btn-radius btn-responsive">VISIT AGENT’S PROFILE</button>
                                </div>
                                <div>
                                    <button class="btn btn-left btn-radius btn-responsive d-flex align-items-center">
                                        <img src="/images/client/add_agent/search_result/ic/play_rec/Vector.png" style="margin-right: 15px;"/>
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
                            <img src="/images/client/add_agent/search_result/ic/primary_job_name.png" class="primaryjob-icon"/>
                            Telemarketing
                        </div>
                        <div style="font-size: 16px; color : #4a5464; margin: 20px 0 20px;">
                            <span style="font-weight: 500;">Sector experience: </span> Real estate, Investement, Insurance
                        </div>
                        <div>
                            <span style="font-weight: 500;">Technologies, software: </span> Microsoft Excel
                        </div>
                        <div style="margin: 20px 0 ;">
                            <span style="font-weight: 500;">Languages: </span>English, Spanish
                        </div>
                        <div>
                            <span style="font-weight: 500;">No. hours per week: </span>30-40 hours
                        </div>
                    </div>
                    <div class="invisiblty">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <button class="btn btn-left btn-radius btn-responsive d-flex align-items-center"
                                        style="width: 136px;!important">
                                    <img src="/images/client/add_agent/search_result/ic/play_rec/Vector.png" style="margin-right: 15px;"/>
                                    LISTEN TO THE RECORD
                                </button>
                            </div>
                            <div>
                                <button class="btn btn-primar btn-radius btn-responsive">VISIT PROFILE</button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="responsive-grid mb-3"
                     style="margin-top: 32px;">
                    <!--image-->
                    <div class="d-flex">
                        <div class="p-2">
                            <img src="/images/client/add_agent/search_result/ic/user/user123.png" class="avator"/>
                        </div>
                        <!--location-->
                        <div class="p-2">
                            <div class="big-font">Jason Morgenstern</div>
                            <div class="location">
                                <img src="/images/client/add_agent/search_result/icon/maps/place_24px.png"/>
                                Dublin, Ireland
                            </div>
                            <div class="visiblty">
                                <div>
                                    <button class="btn btn-primar btn-radius btn-responsive">VISIT AGENT’S PROFILE</button>
                                </div>
                                <div>
                                    <button class="btn btn-left btn-radius btn-responsive d-flex align-items-center">
                                        <img src="/images/client/add_agent/search_result/ic/play_rec/Vector.png" style="margin-right: 15px;"/>
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
                            <img src="/images/client/add_agent/search_result/ic/primary_job_name.png" class="primaryjob-icon"/>
                            Telemarketing
                        </div>
                        <div style="font-size: 16px; color : #4a5464; margin: 20px 0 20px;">
                            <span style="font-weight: 500;">Sector experience: </span> Real estate, Investement, Insurance
                        </div>
                        <div>
                            <span style="font-weight: 500;">Technologies, software: </span> Microsoft Excel
                        </div>
                        <div style="margin: 20px 0 ;">
                            <span style="font-weight: 500;">Languages: </span>English, Spanish
                        </div>
                        <div>
                            <span style="font-weight: 500;">No. hours per week: </span>30-40 hours
                        </div>
                    </div>
                    <div class="invisiblty">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <button class="btn btn-left btn-radius btn-responsive d-flex align-items-center"
                                        style="width: 136px;!important">
                                    <img src="/images/client/add_agent/search_result/ic/play_rec/Vector.png" style="margin-right: 15px;"/>
                                    LISTEN TO THE RECORD
                                </button>
                            </div>
                            <div>
                                <button class="btn btn-primar btn-radius btn-responsive">VISIT PROFILE</button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="responsive-grid mb-3"
                     style="margin-top: 32px;">
                    <!--image-->
                    <div class="d-flex">
                        <div class="p-2">
                            <img src="/images/client/add_agent/search_result/ic/user/user123.png" class="avator"/>
                        </div>
                        <!--location-->
                        <div class="p-2">
                            <div class="big-font">Jason Morgenstern</div>
                            <div class="location">
                                <img src="/images/client/add_agent/search_result/icon/maps/place_24px.png"/>
                                Dublin, Ireland
                            </div>
                            <div class="visiblty">
                                <div>
                                    <button class="btn btn-primar btn-radius btn-responsive">VISIT AGENT’S PROFILE</button>
                                </div>
                                <div>
                                    <button class="btn btn-left btn-radius btn-responsive d-flex align-items-center">
                                        <img src="/images/client/add_agent/search_result/ic/play_rec/Vector.png" style="margin-right: 15px;"/>
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
                            <img src="/images/client/add_agent/search_result/ic/primary_job_name.png" class="primaryjob-icon"/>
                            Telemarketing
                        </div>
                        <div style="font-size: 16px; color : #4a5464; margin: 20px 0 20px;">
                            <span style="font-weight: 500;">Sector experience: </span> Real estate, Investement, Insurance
                        </div>
                        <div>
                            <span style="font-weight: 500;">Technologies, software: </span> Microsoft Excel
                        </div>
                        <div style="margin: 20px 0 ;">
                            <span style="font-weight: 500;">Languages: </span>English, Spanish
                        </div>
                        <div>
                            <span style="font-weight: 500;">No. hours per week: </span>30-40 hours
                        </div>
                    </div>
                    <div class="invisiblty">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <button class="btn btn-left btn-radius btn-responsive d-flex align-items-center"
                                        style="width: 136px;!important">
                                    <img src="/images/client/add_agent/search_result/ic/play_rec/Vector.png" style="margin-right: 15px;"/>
                                    LISTEN TO THE RECORD
                                </button>
                            </div>
                            <div>
                                <button class="btn btn-primar btn-radius btn-responsive">VISIT PROFILE</button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <!-- buttons -->
                <div class="justify-content-center d-flex">
                    <button type="button"
                            class="btn btn-footer btn-radius align-item-center">
                        <img src="/images/client/add_agent/search_result/btn/refresh-arrow.png" alt="" class="refresh-icon">
                        LOAD MORE
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    $(document).ready(function() {

        $(":radio[class=sr-only]").on("change", function() {
            var female = document.getElementById('female').checked;
            var both = document.getElementById('both').checked;
            var male = document.getElementById('male').checked;
            var female_gender = document.getElementById('female-gender');
            var bothed_gender = document.getElementById('both-gender');
            var man_gender = document.getElementById('male-gender');
            if (female == true) {
                $(female_gender).css({ backgroundImage: 'url("/images/client/add_agent/femaleselected.jpg")' });
                $(bothed_gender).css({ backgroundImage: 'url("/images/client/add_agent/gender/both_gender_icon.png")' });
                $(man_gender).css({ backgroundImage: 'url("/images/client/add_agent/male.jpg")' });
            } else if (both == true) {
                $(bothed_gender).css({ backgroundImage: 'url("/images/client/add_agent/bothselected.jpg")' });
                $(female_gender).css({
                    backgroundImage: 'url("/images/client/add_agent/female.jpg")',
                    width: 46,
                    height: 40,
                    backgroundPosition: 'center',
                    backgroundSize: 'cover'
                });
                $(man_gender).css({ backgroundImage: 'url("/images/client/add_agent/male.jpg")' });
            } else if (male == true) {
                $(man_gender).css({
                    backgroundImage: 'url("/images/client/add_agent/maleselected.jpg")',
                    width: 46,
                    height: 40,
                    backgroundPosition: 'center',
                    backgroundSize: 'cover'
                });
                $(female_gender).css({ backgroundImage: 'url("/images/client/add_agent/female.jpg")', width: 46, height: 40, backgroundPosition: 'center', backgroundSize: 'cover' });
                $(bothed_gender).css({ backgroundImage: 'url("/images/client/add_agent/gender/both_gender_icon.png")' });
            } else {
                $(female_gender).css({ backgroundImage: 'url("/images/client/add_agent/female.jpg")', width: 46, height: 40, backgroundPosition: 'center', backgroundSize: 'cover' });
                $(bothed_gender).css({ backgroundImage: 'url("/images/client/add_agent/gender/both_gender_icon.png")' });
                $(man_gender).css({ backgroundImage: 'url("/images/client/add_agent/male.jpg")' });
            }

            var english = document.getElementById('english').checked;
            var spanish = document.getElementById('spanish').checked;
            var english_label = document.getElementById('english_label');
            var spanish_label = document.getElementById('spanish_label');
            if (english == true) {
                $(english_label).css({ backgroundImage: 'url("/images/client/add_agent/englishselected.jpg")' });
                $(spanish_label).css({ backgroundImage: 'url("/images/client/add_agent/spanish.jpg")' });
            } else if (spanish == true) {
                $(english_label).css({ backgroundImage: 'url("/images/client/add_agent/english.jpg")' });
                $(spanish_label).css({ backgroundImage: 'url("/images/client/add_agent/spanishselected.jpg")' });
            }

        })
    })
</script>
