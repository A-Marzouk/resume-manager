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
            <div class="campaign-info-tab firstTab" :class="{active : activeTab === 'activity'}" @click="activeTab  = 'activity' ">
                ACTIVITY
            </div>
            <div class="campaign-info-tab" :class="{active : activeTab === 'campaign_team'}" @click="activeTab  = 'campaign_team' ">
                CAMPAIGN TEAM
            </div>
            <div class="campaign-info-tab" :class="{active : activeTab === 'campaign_brief'}" @click="activeTab  = 'campaign_brief' ">
                CAMPAIGN BRIEF
            </div>
        </div>


        <div class="client_dashboard_content campaign_activity">
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
                activeTab : 'activity',
                hasLogs:false,
                selectedDate:'',
                appliedDate:''
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
            }
        },
        mounted(){

        }
    }
</script>

<style scoped>

</style>