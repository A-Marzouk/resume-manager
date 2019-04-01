<template>
    <div id="campaign_activity">
        <nav class="navbar navbar-light fixed-top client_navbar">
            <div class="backBtn">
                <img src="/resumeApp/public/images/client/arrow_back.png" alt="back-icon"> NAME OF THE CAMPAIGN
            </div>
        </nav>
        <div class="campaign-info-bar">
            <div class="campaign-info-tab active firstTab">
                ACTIVITY
            </div>
            <div class="campaign-info-tab">
                CAMPAIGN TEAM
            </div>
            <div class="campaign-info-tab">
                CAMPAIGN BRIEF
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{

            }
        },

        mounted(){
            console.log('campaign activity component mounted!')
        }
    }
</script>

<style scoped>

</style>