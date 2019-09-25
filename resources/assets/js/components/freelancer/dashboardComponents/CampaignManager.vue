<template>
    <div>
        <div class="content-block-campaign">
            <div class="upper-bar">
                <div class="welcomeText">
                    Hello {{agent.user.user_data.first_name}}!  You have {{activeCampaigns.length}} active campaigns.
                </div>
                <a href="/freelancer/campaigns-archive" class="actionText">
                    GO TO ARCHIVE OF CAMPAIGNS
                </a>
            </div>
            <div class="bottom-bar">
                <div class="title">
                    MY ACTIVE CAMPAIGNS
                </div>
                <div class="actionBtn">
                    <a class="secondary little-padding hideOnSm" href="javascript:;" v-on:click="startShift = !startShift">
                        {{ (startShift) ? 'FINISH SHIFT' : 'START SHIFT' }}
                    </a>
                    <a class="little-padding" href="javascript:;" v-on:click="imAway = !imAway">
                        {{ (imAway) ? 'I\'M AWAY' : 'I\'M BACK' }}
                    </a>
                </div>
            </div>
        </div>
        <div class="content-block-campaign-brief" v-for="(campaign,index) in activeCampaigns" :key="index">
            <div class="upper-bar">
                <div class="campaignInfo">
                    <div class="title">
                        {{campaign.title}}
                    </div>
                </div>
                <div class="actionBtn">
                    <a class="status" :class="{active: campaign.status === 1, paused: campaign.status === 2, canceled: campaign.status === 3}" href="#">
                        {{campaignStatusCode[campaign.status]}}
                    </a>
                </div>
            </div>

            <div class="agent-logs-block">
                <div class="agentInfo">
                    <img src="/images/client/dummy.png" alt="">
                    <span class="userName">
                            {{agent.user.user_data.first_name}}
                    </span>
                </div>
                <div class="log" v-for="(log,index) in agent.logs" :key="index + '_LOG'">
                    <div class="log-time">
                        {{getDate(log.created_at)}}
                    </div>
                    <div class="log-text">
                        <status-selector :status="logStatusCode[log.status]"></status-selector>
                        <span class="log-text-content">
                            {{log.log_text}}
                        </span>
                        <img class="icon-edit" src="/images/client/campaign_activity/edit.png" alt="edit icon" />
                    </div>
                </div>
            </div>

            <div class="campaign-brief-footer">
                <a href="/freelancer/campaign">
                    GO TO CAMPAIGN
                </a>
                <a class="add-entry" :class="{disabled: addEntry}" href="javascript:;" v-on:click="tryToAddEntry">
                    <img :src="`/images/icons/${(!addEntry) ? 'plus_icon_blue' : 'plus_icon_gray'}.svg`" alt="plus sign" /> ADD ENTRY
                </a>
            </div>
        </div>



        <addEntry :clear="clear" v-if="addEntry"></addEntry>
        <addDocument v-if="addEntry"></addDocument>
        
    </div>
</template>

<script>
    import addEntry from './addEntry'
    import addDocument from './addDocument'
    import logStatusSelector from '../Log-status-selector'

    export default {
        components: {
            addEntry,
            addDocument,
            'status-selector': logStatusSelector
        },
        props:['agent'],
        data(){
          return{
              rootLink: this.$route.path,
              addEntry: false,
              imAway: true,
              startShift: false,
              campaigns:this.agent.campaigns,
              agentLogs:this.agent.logs,
              campaignStatusCode:{
                  1:'Active',
                  2:'Paused',
                  3:'Cancelled',
              },

              logStatusCode:{
                  1:'email-request',
                  2:'call-back',
                  3:'not-interested',
                  4:'appointment-set',
                  5:'contacts-received',
                  6:'successful',
              },

          }
        },
        computed:{
            activeCampaigns(){
                return this.campaigns.filter( (campaign) => { return campaign.status === 1});
            },
        },
        methods:{
            rootLinkTo (link) {
                return this.$route.path + '/' + link
            },
            clear () {
                this.addEntry = false
            },
            tryToAddEntry () {
                this.addEntry = true ;

            },
            getDate(date) {
                let event = new Date(date);
                let options = {hour:'numeric',minute:'numeric', month: 'short', day: 'numeric' };
                return event.toLocaleDateString('en-EN', options);
            },
        },
        mounted() {
            console.log(this.agent.logs);
        }
    }
</script>

<style scoped>

</style>
