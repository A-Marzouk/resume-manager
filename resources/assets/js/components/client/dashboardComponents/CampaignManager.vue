<template>
    <div>
        <div class="content-block-campaign">
            <div class="upper-bar">
                <div class="welcomeText">
                    Hello {{client.contact}}! You have {{activeCampaigns.length}} active campaigns.
                </div>
                <a href="/client/campaigns-archive" class="actionText">
                    GO TO ARCHIVE OF CAMPAIGNS
                </a>
            </div>
            <div class="bottom-bar">
                <div class="title">
                    MY ACTIVE CAMPAIGNS
                </div>
                <div class="actionBtn">
                    <a href="#">
                        <img src="/images/client/plus.png" alt="plus sign">CREATE NEW CAMPAIGN
                    </a>
                </div>
            </div>
        </div>

        <div v-for="(campaign,index) in campaigns" :key="index">
            <campaing-brief-dashboard :campaign="campaign" @showPositiveNotification="showNotification"></campaing-brief-dashboard>
        </div>

    </div>
</template>
<script>
    import campaignBriefDashboard from './campaign-brief-dashboard.vue';
    import statusSelector from '../../status-selector.vue'

    export default {
        components: {
            "campaing-brief-dashboard": campaignBriefDashboard,
            'status-selector': statusSelector
        },
        data() {
            return {
                campaigns: [],
                client: [],
                activeCampaigns: [],
            }
        },
        methods: {
            getCurrentClientData() {
                axios.get('/client/get/campaigns')
                    .then((response) => {
                        this.client    = response.data ;
                        console.log(response.data);
                        this.campaigns = response.data.campaigns ;
                        this.getActiveCampaigns();
                    })
                    .catch( (error) => {

                    });
            },
            getActiveCampaigns(){
                let campaigns = this.campaigns ;
                $.each(campaigns, (i) => {
                    if(campaigns[i].status === 1){
                        this.activeCampaigns.push(campaigns[i]);
                    }
                });
            },
            showNotification(){
                let notificationMessage = "Successfully updated campaign" ;
                this.$emit('showPositiveNotification',notificationMessage);
            }
        },
        mounted(){
           this.getCurrentClientData();
        }
    }
</script>
<style scoped>
</style>
