<template>
    <div id="campaign_activity">
        <nav class="navbar navbar-light fixed-top client_navbar">
            <div class="backBtn">
                <img src="/resumeApp/public/images/client/arrow_back.png" alt="back-icon"> NAME OF THE CAMPAIGN
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
                    <div class="data-logs">
                        <div class="date-picker-bar">
                            <img src="/resumeApp/public/images/client/campaign_activity/pick_date.png" alt="pick date">
                        </div>
                        <div class="lineDivide"></div>
                        <div class="member-logs">
                            <div class="empty-state-text">
                                Sorry, no entries for today yet
                            </div>
                            <div class="empty-state-image">
                                <img src="/resumeApp/public/images/client/campaign_activity/empty_state.png" alt="empty state">
                            </div>
                        </div>
                    </div>
                    <div class="documents-bar">
                        <img src="/resumeApp/public/images/client/campaign_activity/document.png" alt="document">
                        <div class="document-text">
                            Document link: <span>No link has been added yet.</span>
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
                activeTab : 'activity'
            }
        },

        mounted(){
            console.log('campaign activity component mounted!')
        }
    }
</script>

<style scoped>

</style>