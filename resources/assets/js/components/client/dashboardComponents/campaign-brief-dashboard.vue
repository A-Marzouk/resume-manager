<template>
    <div class="content-block-campaign-brief">
        <div class="upper-bar">
            <div class="campaignInfo">
                <div class="title">
                   {{campaign.title}}
                </div>
                <div class="info hideOnXS">
                    2 agents on the campaign
                </div>
            </div>
            <div class="actionBtn">
                <a class="status"
                   :class="{active: campaignStatus === 'ACTIVE', paused: campaignStatus === 'PAUSED', canceled: campaignStatus === 'CANCELLED'}"
                   href="javascript:void(0)">{{ campaignStatus }}</a>
                <a href="javascript:void(0)" v-on:click="openCampaignMenu = !openCampaignMenu" class="menu-img">
                    <img src="/images/client/more_vert_24px.png" alt="menu">

                    <div class="campaignMenu" :class="{opened: openCampaignMenu}">
                        <a v-if="campaignStatus === 'ACTIVE'" href="javascript:void(0)" @click="changeCampaignStatus('PAUSED')">Pause the campaign</a>
                        <a v-else href="javascript:void(0)" @click="changeCampaignStatus('ACTIVE')">Resume the campaign</a>
                        <a href="javascript:void(0)" @click="changeCampaignStatus('CANCELLED')">Cancel the campaign</a>
                    </div>
                </a>
            </div>
        </div>
        <div class="agent-logs-block">
            <div class="agentInfo">
                <img src="/images/client/dummy.png" alt="">
                <span class="userName">
                            Mohamed Salah
                        </span>
            </div>
            <div class="log">
                <div class="log-time">
                    9.15 am
                </div>
                <div class="log-text">
                    <status-selector status="call-back"></status-selector>
                    <span class="log-text-content">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    </span>
                </div>
            </div>
            <div class="log">
                <div class="log-time">
                    9.15 am
                </div>
                <div class="log-text">
                    <status-selector status="call-back"></status-selector>
                    <span class="log-text-content">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    </span>
                </div>
            </div>
            <div class="log">
                <div class="log-time">
                    9.15 am
                </div>
                <div class="log-text">
                    <status-selector status="call-back"></status-selector>
                    <span class="log-text-content">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    </span>
                </div>
            </div>
            <div class="showMoreBtn">
                <a href="#">SHOW MORE</a>
            </div>
        </div>
        <div class="agent-logs-block">
            <div class="agentInfo">
                <img src="/images/client/dummy.png" alt="">
                <span class="userName">
                            Lionel Messi
                        </span>
            </div>
            <div class="log">
                <div class="log-time">
                    9.15 am
                </div>
                <div class="log-text">
                    <status-selector status="call-back"></status-selector>
                    <span class="log-text-content">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    </span>
                </div>
            </div>
            <div class="log">
                <div class="log-time">
                    9.15 am
                </div>
                <div class="log-text">
                    <status-selector status="call-back"></status-selector>
                    <span class="log-text-content">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    </span>
                </div>
            </div>
            <div class="log">
                <div class="log-time">
                    9.15 am
                </div>
                <div class="log-text">
                    <status-selector status="call-back"></status-selector>
                    <span class="log-text-content">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    </span>
                </div>
            </div>
            <div class="showMoreBtn">
                <a href="#">SHOW MORE</a>
            </div>
        </div>
        <div class="campaign-brief-footer">
            <a href="/client/campaign">
                GO TO CAMPAIGN
            </a>
        </div>
    </div>
</template>

<script>
    import statusSelector from '../../status-selector.vue'

    export default {
        components: {
            'status-selector': statusSelector
        },
        props: ['campaign'],
        data() {
            return {
                openCampaignMenu: false,
                campaignStatus: '',
                campaignMembers: [],
                campaignStatusCode:{
                    1:'Active',
                    2:'Paused',
                    3:'Cancelled',
                },
            }
        },
        methods: {
            setDefaultCampaignStatus(){
                if(this.campaign.status === 1){
                    this.campaignStatus = 'ACTIVE' ;
                }
                else if(this.campaign.status === 2){
                    this.campaignStatus = 'PAUSED' ;

                }
                else{
                    this.campaignStatus = 'CANCELLED' ;
                }
            },
            changeCampaignStatus(status){
                // send to the server to change campaign status.
                axios.post('/client/camp/update',{
                    campaignStatus : status,
                    campaign_id : this.campaign.id
                })
                    .then( (response) => {
                        this.campaignStatus = status ;
                        this.$emit('showPositiveNotification');
                    })
                    .catch( (error) => {
                        console.log('Error updating campaign status : ' + error) ;
                    }) ;
            },
            getCampMembers(){
                axios.get('/client/camp/members/'+ this.campaign.id)
                    .then( (response) => {
                        this.campaignMembers = response.data ;
                    })
                    .catch( (error) => {
                        console.log(error) ;
                    });
            }
        },
        mounted(){
          this.setDefaultCampaignStatus();
          this.getCampMembers() ;
        }
    }
</script>

