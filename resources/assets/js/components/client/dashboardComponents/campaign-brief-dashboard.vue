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

        <div v-for="(agent,index) in campaignMembers" :key="index" v-show="campaignMembers.length > 0" >
            <div class="agent-logs-block">

                <div class="agentInfo">
                    <img src="/images/client/dummy.png" alt="">
                    <span class="userName">
                            {{agent.user.user_data.first_name}} {{agent.user.user_data.last_name}}
                        </span>
                </div>
                <div v-for="(log,index) in agent.logs" :key="index" v-show="agent.logs.length > 0" >
                    <div class="log" v-show="log.campaign_id == campaign.id">
                        <div class="log-time">
                            {{getDate(log.created_at)}}
                        </div>
                        <div class="log-text">
                            <div class="status-selector-component">
                                <a class="recording-status icon" style="color:white" v-bind:class="logStatusCode[log.status]">{{ logStatusCodeInitials[log.status] }}</a>
                            </div>
                            <span class="log-text-content">
                                {{log.log_text}}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="showMoreBtn"  v-show="agent.logs.length > 0">
                    <a href="#">SHOW MORE</a>
                </div>

                <div  v-show="agent.logs.length < 1" style="padding: 38px;">
                    There are no logs for this agent.
                </div>

            </div>
        </div>
        <div v-show="campaignMembers.length < 1" class="NoDecor" style="padding: 54px;">
            There are no active members in this campaign. <a href="/client/camp/add-agent">Add new agent</a>
        </div>

        <div class="campaign-brief-footer">
            <a :href="'/client/campaign/' + campaign.id ">
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

                logStatusCode:{
                    1: 'email-request',
                    2: 'call-back',
                    3: 'not-interested',
                    4: 'appointment-set',
                    5: 'contacts-received',
                    6: 'successful',
                },
                logStatusCodeInitials:{
                    1:'ER',
                    2:'CB',
                    3:'NI',
                    4:'AS',
                    5:'CR',
                    6:'S',
                },
            }
        },
        methods: {
            setDefaultCampaignStatus(){
                if(this.campaign.status == 1){
                    this.campaignStatus = 'ACTIVE' ;
                }
                else if(this.campaign.status == 2){
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
            },
            getDate(date) {
                let event = new Date(date);
                let options = {hour:'numeric',minute:'numeric', month: 'short', day: 'numeric' };
                return event.toLocaleDateString('en-EN', options);
            },
        },
        mounted(){
          this.setDefaultCampaignStatus();
          this.getCampMembers() ;
        }
    }
</script>

