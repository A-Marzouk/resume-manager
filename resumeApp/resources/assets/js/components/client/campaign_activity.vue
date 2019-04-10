<template>
    <div id="campaign_activity">
        <nav class="navbar navbar-light fixed-top client_navbar">
            <div class="backBtn">
                <a href="/client">
                    <img src="/resumeApp/public/images/client/arrow_back.png" alt="back-icon">
                </a>
                NAME OF THE CAMPAIGN
            </div>
        </nav>
        <div class="campaign-info-bar">
            <div class="campaign-info-tab firstTab" :class="{active : activeTab === 'activity'}" @click="chooseTab('activity')">
                ACTIVITY
            </div>
            <div class="campaign-info-tab" :class="{active : activeTab === 'campaign_team'}" @click="chooseTab('campaign_team')">
                CAMPAIGN TEAM
            </div>
            <div class="campaign-info-tab" :class="{active : activeTab === 'campaign_brief'}" @click="chooseTab('campaign_brief')">
                CAMPAIGN BRIEF
            </div>
        </div>


        <div class="client_dashboard_content campaign_activity" v-show="activeTab === 'activity'">
            <div class="dashboard-side-menu hideOnTablet">
                <div class="team-list-header">
                    <div class="teamName">
                        TEAM
                    </div>
                    <div class="teamChat">
                        GO TO TEAM CHAT
                    </div>
                </div>
                <div class="lineDivide"></div>
                <div class="team-member">
                    <img src="/resumeApp/public/images/client/dummy.png" alt="member image">
                    <div class="team-member-info">
                        <div class="member-name manager">
                            Louis Snyderberg
                        </div>
                        <div class="job-title">
                            Team manager
                        </div>
                    </div>
                </div>
                <div class="team-member">
                    <img src="/resumeApp/public/images/client/dummy.png" alt="member image">
                    <div class="team-member-info">
                        <div class="member-name">
                            Mohamed Salah
                        </div>
                        <div class="job-title">
                            Egyptian king
                        </div>
                    </div>
                </div>
                <div class="team-member">
                    <img src="/resumeApp/public/images/client/dummy.png" alt="member image">
                    <div class="team-member-info">
                        <div class="member-name">
                            Lionel Messi
                        </div>
                        <div class="job-title">
                            Artist
                        </div>
                    </div>
                </div>
                <div class="team-member">
                    <img src="/resumeApp/public/images/client/dummy.png" alt="member image">
                    <div class="team-member-info">
                        <div class="member-name">
                            Zlatan Ibrahimovic
                        </div>
                        <div class="job-title">
                            Animation
                        </div>
                    </div>
                </div>
                <div class="team-member">
                    <img src="/resumeApp/public/images/client/dummy.png" alt="member image">
                    <div class="team-member-info">
                        <div class="member-name">
                            Louis Snyderberg
                        </div>
                        <div class="job-title">
                            Animation
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-block">
                <div class="content-block-campaign-activity">
                    <div class="team-bar-tablet">
                        <div class="team-info">
                            <div class="team-name">
                                TEAM
                            </div>
                            <div class="actionBtn">
                                GO TO TEAM CHAT
                            </div>
                        </div>
                        <div class="lineDivide tablet-bar"></div>
                        <div class="agent-bar">
                            <div class="team-member tablet-bar">
                                <img src="/resumeApp/public/images/client/dummy.png" alt="member image">
                                <div class="team-member-info">
                                    <div class="member-name">
                                        Z. Ibrahimovic
                                    </div>
                                    <div class="job-title">
                                        Animation
                                    </div>
                                </div>
                            </div>
                            <a class="actionBtn" href="javascript:void(0)" data-toggle="modal" data-target="#select-agent-modal" >
                                CHOOSE AGENT
                            </a>
                        </div>
                    </div>
                    <div class="data-logs">
                        <div class="date-picker-bar">
                            <div style="margin-right:20px; padding:6px; border:1px solid lightgray; border-radius:5px; color:lightblue;">
                                {{appliedDate}}
                            </div>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#pick-date-modal" >
                                <img src="/resumeApp/public/images/client/campaign_activity/pick_date.png" alt="pick date">
                            </a>
                        </div>
                        <div class="lineDivide"></div>
                        <div class="member-logs-empty" v-show="!hasLogs">
                            <div class="empty-state-text">
                                Sorry, no entries for today yet  -
                                <a href="javascript:void(0)" @click="hasLogs = !hasLogs" class="text"> SHOW DEMO LOGS</a>
                            </div>
                            <div class="empty-state-image">
                                <img src="/resumeApp/public/images/client/campaign_activity/empty_state.png" alt="empty state">
                            </div>
                        </div>
                        <div class="member-logs" v-show="hasLogs">
                            <div class="agent-logs-block">
                                <div class="log">
                                    <div class="log-time">
                                        9 am - 10 am
                                    </div>
                                    <div class="log-text">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                    </div>
                                </div>
                                <div class="showMoreBtn">
                                    <a href="#">SHOW RECORDINGS</a>
                                </div>
                                <div class="lineDivide"></div>
                                <div class="log">
                                    <div class="log-time">
                                        10 am - 11 am
                                    </div>
                                    <div class="log-text">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                    </div>
                                </div>
                                <div class="showMoreBtn disabled">
                                    <a href="#">SHOW RECORDINGS</a>
                                </div>
                                <div class="lineDivide"></div>
                                <div class="log">
                                    <div class="log-time">
                                        9 am - 10 am
                                    </div>
                                    <div class="log-text">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                    </div>
                                </div>
                                <div class="showMoreBtn">
                                    <a href="#">SHOW RECORDINGS</a>
                                </div>
                                <div class="lineDivide"></div>
                                <div class="log">
                                    <div class="log-time">
                                        9 am - 10 am
                                    </div>
                                    <div class="log-text">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                    </div>
                                </div>
                                <div class="showMoreBtn">
                                    <a href="#">SHOW RECORDINGS</a>
                                </div>
                                <div class="lineDivide"></div>
                                <div class="log">
                                    <div class="log-time">
                                        11 am - 12 am
                                    </div>
                                    <div class="log-text">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                    </div>
                                </div>
                                <div class="showMoreBtn disabled">
                                    <a href="#">SHOW RECORDINGS</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="documents-bar">
                        <img src="/resumeApp/public/images/client/campaign_activity/document.png" alt="document">
                        <div class="document-text">
                            Document link: <span>No links.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="campaign_team_content" v-show="activeTab === 'campaign_team'">
            <div class="campaign_team">
                <div class="campaign-team-header">
                    <div class="select-list">
                        <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option class="custom-option" style="height:40px;">Show active team</option>
                                <option class="custom-option">Show backup agents</option>
                                <option class="custom-option">Show past agents</option>
                            </select>
                        </div>
                    </div>
                    <div class="actionBtn">
                        <a href="#">
                            <img src="/resumeApp/public/images/client/plus.png" alt="plus sign">ADD NEW AGENT
                        </a>
                    </div>
                </div>
                <div class="campaign-team-list">
                    <div class="campaign-team-row">
                        <div class="team-member">
                            <img src="/resumeApp/public/images/client/dummy.png" alt="member image">
                            <div class="team-member-info">
                                <div class="member-name">
                                    Louis Snyderberg
                                </div>
                                <div class="job-title">
                                    Team manager
                                </div>
                            </div>
                        </div>
                        <div class="team-member-action">
                            <div class="chat-action-btn">
                                <img src="/resumeApp/public/images/client/campaign_activity/send_message.png"
                                     alt="chat icon">
                            </div>
                            <div class="change-status-btn">
                                REMOVE
                            </div>
                            <div class="change-status-btn">
                                MAKE BACKUP
                            </div>
                        </div>
                    </div>
                    <div class="campaign-team-row">
                        <div class="team-member">
                            <img src="/resumeApp/public/images/client/dummy.png" alt="member image">
                            <div class="team-member-info">
                                <div class="member-name">
                                    Louis Snyderberg
                                </div>
                                <div class="job-title">
                                    Team manager
                                </div>
                            </div>
                        </div>
                        <div class="team-member-action">
                            <div class="chat-action-btn">
                                <img src="/resumeApp/public/images/client/campaign_activity/send_message.png"
                                     alt="chat icon">
                            </div>
                            <div class="change-status-btn">
                                REMOVE
                            </div>
                            <div class="change-status-btn">
                                MAKE BACKUP
                            </div>
                        </div>
                    </div>
                    <div class="campaign-team-row">
                        <div class="team-member">
                            <img src="/resumeApp/public/images/client/dummy.png" alt="member image">
                            <div class="team-member-info">
                                <div class="member-name">
                                    Louis Snyderberg
                                </div>
                                <div class="job-title">
                                    Team manager
                                </div>
                            </div>
                        </div>
                        <div class="team-member-action">
                            <div class="chat-action-btn">
                                <img src="/resumeApp/public/images/client/campaign_activity/send_message.png"
                                     alt="chat icon">
                            </div>
                            <div class="change-status-btn">
                                REMOVE
                            </div>
                            <div class="change-status-btn">
                                MAKE BACKUP
                            </div>
                        </div>
                    </div>
                    <div class="campaign-team-row">
                        <div class="team-member">
                            <img src="/resumeApp/public/images/client/dummy.png" alt="member image">
                            <div class="team-member-info">
                                <div class="member-name">
                                    Louis Snyderberg
                                </div>
                                <div class="job-title">
                                    Team manager
                                </div>
                            </div>
                        </div>
                        <div class="team-member-action">
                            <div class="chat-action-btn">
                                <img src="/resumeApp/public/images/client/campaign_activity/send_message.png"
                                     alt="chat icon">
                            </div>
                            <div class="change-status-btn">
                                REMOVE
                            </div>
                            <div class="change-status-btn">
                                MAKE BACKUP
                            </div>
                        </div>
                    </div>
                    <div class="campaign-team-row">
                        <div class="team-member">
                            <img src="/resumeApp/public/images/client/dummy.png" alt="member image">
                            <div class="team-member-info">
                                <div class="member-name">
                                    Louis Snyderberg
                                </div>
                                <div class="job-title">
                                    Team manager
                                </div>
                            </div>
                        </div>
                        <div class="team-member-action">
                            <div class="chat-action-btn">
                                <img src="/resumeApp/public/images/client/campaign_activity/send_message.png"
                                     alt="chat icon">
                            </div>
                            <div class="change-status-btn">
                                REMOVE
                            </div>
                            <div class="change-status-btn">
                                MAKE BACKUP
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="campaign_brief_content" v-show="activeTab === 'campaign_brief'">
            <div class="campaign_desc">
                <div class="title">
                    PROJECT DESCRIPTION
                </div>
                <div class="desc">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>
           </div>

            <div class="campaign_brief_tabs">
                <div class="campaign-info-bar">
                    <div class="campaign-info-tab firstTab" :class="{active : activeBriefTab === 'FAQ'}" @click="chooseBriefTab('FAQ')">
                        FAQ
                    </div>
                    <div class="campaign-info-tab" :class="{active : activeBriefTab === 'PROCESS_FLOW'}" @click="chooseBriefTab('PROCESS_FLOW')">
                        PROCESS FLOW
                    </div>
                    <div class="campaign-info-tab" :class="{active : activeBriefTab === 'FILES'}" @click="chooseBriefTab('FILES')">
                        FILES
                    </div>
                    <div class="campaign-info-tab" :class="{active : activeBriefTab === 'VOICE_SCRIPTS'}" @click="chooseBriefTab('VOICE_SCRIPTS')">
                        VOICE SCRIPTS
                    </div>
                    <div class="campaign-info-tab" :class="{active : activeBriefTab === 'EMAIL_TEMPS'}" @click="chooseBriefTab('EMAIL_TEMPS')">
                        E-MAIL TEMPLATES
                    </div>
                </div>
                <div class="campaign-info-content">
                    <div class="faq-content" v-show="activeBriefTab === 'FAQ'">
                        <div class="faq-title">
                            In this section you can add frequently asked questions and answers to them.
                        </div>
                        <div class="faq-question-input">
                            <img src="/resumeApp/public/images/client/campaign_activity/faq.png" alt="faq icon">
                            <div class="faq-input">
                                <input type="text" name="faq" placeholder="Write a frequently asked question" v-model="newFAQ.question">
                                <img src="/resumeApp/public/images/client/campaign_activity/close_black.png" alt="delete icon" v-show="newFAQ.question.length > 0" @click="newFAQ.question = ''">
                            </div>
                        </div>
                        <div class="faq-answer-input">
                            <img src="/resumeApp/public/images/client/campaign_activity/answer.png" alt="faq icon">
                            <div class="faq-input">
                                <textarea rows="2" name="faq-answer" placeholder="Add an answer to the question" v-model="newFAQ.answer"></textarea>
                                <img src="/resumeApp/public/images/client/campaign_activity/close_black.png" alt="delete icon" v-show="newFAQ.answer.length > 0" @click="newFAQ.answer = ''">
                            </div>
                        </div>
                        <div class="faq-add-btn" :class="{ active : newFAQ.question.length > 7 && newFAQ.answer.length > 7 }">
                            <a href="#">
                                ADD FAQ
                            </a>
                        </div>

                        <div class="faq-questions-list">
                            <div v-for="(faq,index) in faqs" v-bind:key="index">
                                <div v-show="!faq.beingEdited" class="faq-question">
                                    <div class="faq-numbering">
                                        <span>{{index+1}}</span>
                                    </div>
                                    <div class="faq-item">
                                        <div class="faq-item-question">
                                                {{faq.question}}
                                        </div>
                                        <div class="faq-item-answer">
                                                {{faq.answer}}
                                        </div>
                                    </div>
                                    <div class="faq-edit">
                                        <img src="/resumeApp/public/images/client/campaign_activity/edit.png"
                                             alt="edit icon" @click="faq.beingEdited = true">
                                    </div>
                                </div>
                                <div v-show="faq.beingEdited" class="faq-edit-state">
                                    <div class="edit-heading">
                                        <div class="faq-numbering">
                                            <span>{{index+1}}</span>
                                        </div>
                                        <div class="edit-title">
                                            Edit the question and the answer :
                                        </div>
                                        <div class="edit-action-btns" >
                                            <a href="javascript:void(0)" @click="faq.beingEdited = false">CANCEL</a>
                                            <a href="javascript:void(0)" @click="faq.beingEdited = false">SAVE</a>
                                        </div>
                                    </div>
                                    <div class="faq-question-input">
                                            <img src="/resumeApp/public/images/client/campaign_activity/faq.png" alt="faq icon">
                                            <div class="faq-input">
                                                <input type="text" name="faq" placeholder="Write a frequently asked question" v-model="faq.question">
                                                <img src="/resumeApp/public/images/client/campaign_activity/close_black.png" alt="delete icon" v-show="faq.question.length > 0" @click="faq.question = ''">
                                            </div>
                                        </div>
                                    <div class="faq-answer-input">
                                            <img src="/resumeApp/public/images/client/campaign_activity/answer.png" alt="faq icon">
                                            <div class="faq-input">
                                                <textarea name="faq-answer" rows="2" placeholder="Add an answer to the question" v-model="faq.answer"></textarea>
                                                <img src="/resumeApp/public/images/client/campaign_activity/close_black.png" alt="delete icon" v-show="faq.answer.length > 0" @click="faq.answer = ''">
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-show="activeBriefTab === 'PROCESS_FLOW'">

                    </div>
                    <div v-show="activeBriefTab === 'FILES'">

                    </div>
                    <div v-show="activeBriefTab === 'VOICE_SCRIPTS'">

                    </div>
                    <div v-show="activeBriefTab === 'EMAIL_TEMPS'">

                    </div>
                </div>
            </div>
        </div>

        <!-- Agent select modal -->
        <div class="modal" id="select-agent-modal">
            <div class="modal-dialog">
                <div class="modal-content agent-modal-content">

                    <!-- Modal Header -->
                    <div class="select-agent-modal-header">
                        <div class="title text-lay">
                            CHOOSE TEAM MEMBER
                        </div>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="lineDivide"></div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="dashboard-side-menu">
                            <div class="team-member">
                                <img src="/resumeApp/public/images/client/dummy.png" alt="member image">
                                <div class="team-member-info">
                                    <div class="member-name manager">
                                        Louis Snyderberg
                                    </div>
                                    <div class="job-title">
                                        Team manager
                                    </div>
                                </div>
                            </div>
                            <div class="team-member">
                                <img src="/resumeApp/public/images/client/dummy.png" alt="member image">
                                <div class="team-member-info">
                                    <div class="member-name">
                                        Mohamed Salah
                                    </div>
                                    <div class="job-title">
                                        Egyptian king
                                    </div>
                                </div>
                            </div>
                            <div class="team-member">
                                <img src="/resumeApp/public/images/client/dummy.png" alt="member image">
                                <div class="team-member-info">
                                    <div class="member-name">
                                        Lionel Messi
                                    </div>
                                    <div class="job-title">
                                        Artist
                                    </div>
                                </div>
                            </div>
                            <div class="team-member">
                                <img src="/resumeApp/public/images/client/dummy.png" alt="member image">
                                <div class="team-member-info">
                                    <div class="member-name">
                                        Zlatan Ibrahimovic
                                    </div>
                                    <div class="job-title">
                                        Animation
                                    </div>
                                </div>
                            </div>
                            <div class="team-member">
                                <img src="/resumeApp/public/images/client/dummy.png" alt="member image">
                                <div class="team-member-info">
                                    <div class="member-name">
                                        Louis Snyderberg
                                    </div>
                                    <div class="job-title">
                                        Animation
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal" id="pick-date-modal">
            <div class="modal-dialog">
                <div class="modal-content agent-modal-content date-picker">
                    <!-- Modal body -->
                    <button type="button" id="close-modal" class="close d-none" data-dismiss="modal">&times;</button>
                    <div class="modal-body">
                        <div id="datepicker"></div>
                        <input type="hidden" name="selected-date-value" id="selected-date-value" @change="dateChanged">
                        <div class="date-picker-modal-footer">
                            <a href="javascriot:void(0)" class="cancelBtn" @click="cancelDatePicking">
                                CANCEL
                            </a>
                            <a href="javascriot:void(0)" class="applyBtn selected-date" @click="applySelectedDate">
                                APPLY
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                faqs:[
                    {
                        id:1,
                        beingEdited:false,
                        question:'Lorem 1111 ipsum dolor sit amet, consectetur adipiscing elit,' +
                        ' sed do eiusmod tempor incididunt ut labore et dolore magna aliqu ?',
                        answer:'Lorem 1111 ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' +
                        ' Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.' +
                        ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.' +
                        ' Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
                    },
                    {
                        id:2,
                        beingEdited:false,
                        question:'Lorem 2222 ipsum dolor sit amet, consectetur adipiscing elit,' +
                        ' sed do eiusmod tempor incididunt ut labore et dolore magna aliqu ?',
                        answer:'Lorem 2222 ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' +
                        ' Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.' +
                        ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.' +
                        ' Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
                    },
                   {
                       id:3,
                       beingEdited:false,
                        question:'Lorem 3333 ipsum dolor sit amet, consectetur adipiscing elit,' +
                        ' sed do eiusmod tempor incididunt ut labore et dolore magna aliqu ?',
                        answer:'Lorem 3333 ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' +
                        ' Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.' +
                        ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.' +
                        ' Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
                    },
                    {
                        id:4,
                        beingEdited:false, 
                        question:'Lorem 4444 ipsum dolor sit amet, consectetur adipiscing elit,' +
                        ' sed do eiusmod tempor incididunt ut labore et dolore magna aliqu ?',
                        answer:'Lorem 4444 ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' +
                        ' Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.' +
                        ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.' +
                        ' Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
                    },

                ],
                activeTab : 'activity',
                activeBriefTab : 'FAQ',
                hasLogs:false,
                selectedDate:'',
                appliedDate:'',
                newFAQ:{
                    question:'',
                    answer:''
                }
            }
        },
        methods:{
            dateChanged(){
                this.selectedDate = $('#selected-date-value').val();
            },
            applySelectedDate(){
                this.appliedDate =  this.selectedDate;
                $('#close-modal').click();
            },
            cancelDatePicking(){
                $('#close-modal').click();
            },
            chooseTab(tab_name){
                this.activeTab = tab_name ;
            },
            chooseBriefTab(tab_name){
                this.activeBriefTab = tab_name ;
            },
        },
        mounted(){

        }
    }
</script>

<style scoped>

</style>