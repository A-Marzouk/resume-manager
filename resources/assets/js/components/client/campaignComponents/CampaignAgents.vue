<template>
    <div>
        <nav class="navbar navbar-light fixed-top client_navbar">
            <div class="backBtn">
                <a href="/client/dashboard">
                    <img src="/resumeApp/public/images/client/arrow_back.png" alt="back-icon">
                </a>
                YOUR CAMPAIGN AGENTS
            </div>
        </nav>
        <!--<div class="visible-add-agent">-->
        <!-- visibale in laptop -->
        <div class="d-flex justify-content-center">
            <div class="main-grid">
                <div class="header-text">
                    <img src="/resumeApp/public/images/client/payments/agents_40px.svg" alt=""  class="icon-margin small-image">
                    YOUR CAMPAIGN AGENTS
                </div>

                <hr/>
                <!-- hr  -->

                <div class="campaign-blue-text">
                    YOUR CAMPAIGN AGENTS
                </div>
                <div class="campaign-text">
                    Selected agent for your campaign is Jason Morgenstern. To change your selected agent please search our agent database.
                </div>

                <!-- first agent -->
                <hr/>
                <div class="responsive-grid mb-3" style="margin-top: 32px;">
                    <!--image-->
                    <div class="d-flex">
                        <div class="p-2">
                            <img src="/resumeApp/public/images/client/add_agent/search_result/ic/user/user123.png" class="avator"/>
                        </div>
                        <!--location-->
                        <div class="p-2">
                            <div class="big-font">Jason Morgenstern</div>
                            <div class="location">
                                <img src="/resumeApp/public/images/client/add_agent/search_result/icon/maps/place_24px.png"/>
                                Dublin, Ireland
                            </div>
                            <div class="visiblty" style="text-align: center">
                                <div>
                                    <button class="btn btn-primar btn-radius btn-responsive">VISIT AGENT’S PROFILE</button>
                                </div>
                                <div>
                                    <button class="btn btn-left btn-radius btn-responsive d-flex align-items-center justify-content-around">
                                        <img src="/resumeApp/public/images/client/add_agent/search_result/ic/play_rec/Vector.png" style="margin-right: 15px;"/>
                                        LISTEN TO THE RECORD
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--info-->
                    <div class="p-2 info-grid" style="">
                        <div class="big-font">
                            <img src="/resumeApp/public/images/client/add_agent/search_result/ic/primary_job_name.png" class="primaryjob-icon"/>
                            Telemarketing
                        </div>
                        <div style="font-size: 16px; color : #4a5464; margin: 20px 0 20px;">
                            <span style="font-weight: 500;color: #4A5464;">Sector experience: </span> Real estate, Investement, Insurance
                        </div>
                        <div>
                            <span style="font-weight: 500;color: #4A5464;">Technologies, software: </span> Microsoft Excel
                        </div>
                        <div style="margin: 20px 0 ;">
                            <span style="font-weight: 500;color: #4A5464;">Languages: </span>English, Spanish
                        </div>
                        <div>
                            <span style="font-weight: 500; color: #4A5464;">No. hours per week: </span>30-40 hours
                        </div>
                    </div>
                    <div class="invisiblty">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <button class="btn btn-left btn-radius btn-responsive d-flex align-items-center" style="width: 136px;!important">
                                    <img src="/resumeApp/public/images/client/add_agent/search_result/ic/play_rec/Vector.png" style="margin-right: 15px;"/>
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
                <div class="d-flex justify-content-end">
                    <button class="blue-button">CHOOSE ANOTHER AGENT</button>
                </div>

            </div>
        </div>
    </div>
</template>
