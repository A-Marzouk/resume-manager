<template>
    <div class="campaign-archives">
        <nav class="navbar navbar-light fixed-top dashboard_navbar">
            <div class="backBtn">
                <a href="/freelancer">
                    <img src="/images/client/arrow_back.png" alt="back-icon">
                </a>
                ARCHIVE OF CAMPAIGNS
            </div>
        </nav>

        <div class="archive-content-box">
            <div v-show="!empty_state">
                <div class="archive-heading">
                    <img src="/images/client/campaign_archives/search.png" alt="search icon">
                    YOUR PAST CAMPAIGNS
                </div>
                <div class="archive-list">
                    <div class="campaign-item">
                        <div class="left">
                            <div class="name-of-campaign">
                                <a href="/freelancer/campaign">
                                    Name of the campaign long name of the campaign
                                </a>
                            </div>
                            <div class="date">
                                <img src="/images/client/campaign_archives/date.png" alt="date icon">
                                4.09.18 - 4.01.19
                            </div>
                            <div class="amount">
                                <img src="/images/client/campaign_archives/amount.png" alt="amount icon">
                                $ 8,500
                            </div>
                        </div>
                    </div>
                    <div class="campaign-item">
                        <div class="left">
                            <div class="name-of-campaign">
                                <a href="/freelancer/campaign">
                                    Name of the campaign long name of the campaign
                                </a>
                            </div>
                            <div class="date">
                                <img src="/images/client/campaign_archives/date.png" alt="date icon">
                                4.09.18 - 4.01.19
                            </div>
                            <div class="amount">
                                <img src="/images/client/campaign_archives/amount.png" alt="amount icon">
                                $ 8,500
                            </div>
                        </div>
                    </div>
                    <div class="campaign-item">
                        <div class="left">
                            <div class="name-of-campaign">
                                <a href="/freelancer/campaign">
                                    Name of the campaign long name of the campaign
                                </a>
                            </div>
                            <div class="date">
                                <img src="/images/client/campaign_archives/date.png" alt="date icon">
                                4.09.18 - 4.01.19
                            </div>
                            <div class="amount">
                                <img src="/images/client/campaign_archives/amount.png" alt="amount icon">
                                $ 8,500
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="archive-empty-state" v-show="empty_state">
                <div class="archive-empty-state-header">
                    You Archive of campaigns is empty
                </div>
                <div class="archive-empty-state-img-wrapper">
                    <img src="/images/client/campaign_archives/archive_emty_state.png"
                         alt="emty state photo">
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
       data(){
           return{
               empty_state : false
           }
       }
    }
</script>

<style scoped>

</style>