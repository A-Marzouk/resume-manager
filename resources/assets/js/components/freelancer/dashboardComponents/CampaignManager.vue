<template>
    <div>
        <div class="content-block-campaign">
            <div class="upper-bar">
                <div class="welcomeText">
                    Hello {{agent.user.user_data.first_name}}! You have {{activeCampaigns.length}} active campaigns.
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
                    <a class="secondary little-padding hideOnSm" href="javascript:;"
                       v-on:click="startShift = !startShift">
                        {{ (startShift) ? 'FINISH SHIFT' : 'START SHIFT' }}
                    </a>
                    <a class="little-padding" href="javascript:;" v-on:click="imAway = !imAway">
                        {{ (imAway) ? 'I\'M AWAY' : 'I\'M BACK' }}
                    </a>
                </div>
            </div>
        </div>

        <div v-for="(campaign,index) in activeCampaigns" :key="index">
            <div class="content-block-campaign-brief">
                <div class="upper-bar">
                    <div class="campaignInfo">
                        <div class="title">
                            {{campaign.title}}
                        </div>
                    </div>
                    <div class="actionBtn">
                        <a class="status"
                           :class="{active: campaign.status === 1, paused: campaign.status === 2, canceled: campaign.status === 3}"
                           href="#">
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
                    <div v-for="(log,index) in agentLogs" :key="index + '_LOG'">
                        <div class="log">
                            <div class="log-time">
                                {{getDate(log.created_at)}}
                            </div>
                            <div class="log-text justify-content-between">
                                <div class="status-selector-component">
                                    <a class="recording-status icon" style="color:white" v-bind:class="logStatusCode[log.status]">{{ logStatusCodeInitials[log.status] }}</a>
                                </div>
                                <span class="log-text-content" style="flex:1;">
                                    {{log.log_text}}
                                </span>
                                <a href="javascript:void(0)" @click="editedLog = log">
                                    <img class="icon-edit" src="/images/client/campaign_activity/edit.png" alt="edit icon"
                                         style="height: 20px;"/>
                                </a>

                            </div>
                        </div>

                        <div>
                            <updateEntry :clear="cancelEdit" v-if="editedLog.id === log.id" :log="log" @activityLogUpdated="updateActivityLog" @activityLogDeleted="deleteActivityLog"></updateEntry>
                        </div>
                    </div>
                </div>

                <div class="campaign-brief-footer">
                    <a href="/freelancer/campaign">
                        GO TO CAMPAIGN
                    </a>
                    <a class="add-entry" :class="{disabled: addEntry}" href="javascript:;"
                       v-on:click="addEntryBox(campaign.id)">
                        <img :src="`/images/icons/${(!addEntry) ? 'plus_icon_blue' : 'plus_icon_gray'}.svg`"
                             alt="plus sign"/> ADD ENTRY
                    </a>
                </div>

            </div>


            <div :id=" 'entryBox_' + campaign.id">
                <addEntry :clear="clear" v-if="addEntry" :agent_id="agent.id" :campaign_id="campaign.id"
                          @activityLogAdded="addActivityLog" ></addEntry>
            </div>

        </div>


    </div>
</template>

<script>
    import addEntry from './addEntry'
    import updateEntry from './updateEntry'
    import statusSelector from '../../status-selector'
    export default {
        components: {
            addEntry,
            updateEntry,
            'status-selector': statusSelector
        },
        props: ['agent'],
        data() {
            return {
                rootLink: this.$route.path,
                addEntry: false,
                imAway: true,
                startShift: false,
                campaigns: this.agent.campaigns,
                agentLogs: this.agent.logs,
                campaignStatusCode: {
                    1: 'Active',
                    2: 'Paused',
                    3: 'Cancelled',
                },

                logStatusCode: {
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
                editedLog:{}

            }
        },
        computed: {
            activeCampaigns() {
                return this.campaigns.filter((campaign) => {
                    return campaign.status === 1
                });
            },
        },
        methods: {
            rootLinkTo(link) {
                return this.$route.path + '/' + link
            },
            clear() {
                this.addEntry = false
            },
            addEntryBox(campaign_id) {
                this.addEntry = true;
                //scroll to the box
                $('html, body').animate({
                    scrollTop: $("#entryBox_" + campaign_id).offset().top - 105
                }, 1000);
            },
            getDate(date) {
                let event = new Date(date);
                let options = {hour: 'numeric', minute: 'numeric', month: 'short', day: 'numeric'};
                return event.toLocaleDateString('en-EN', options);
            },
            addActivityLog(log) {
                this.agentLogs.push(log);
                this.$emit('showPositiveNotification', 'Activity log has been successfully Added!')
            },
            updateActivityLog(log) {
                // replace the old log with this one passed here.
                this.agentLogs.forEach( (oldLog,index) => {
                    if(oldLog.id === log.id){
                        this.agentLogs[index] = log ;
                        console.log(log);
                    }
                }) ;
                this.$emit('showPositiveNotification', 'Activity log has been successfully Updated !')

            },
            deleteActivityLog(logID){
                // splice the old log with this one passed here.
                this.agentLogs.forEach( (oldLog,index) => {
                    if(oldLog.id === logID){
                        this.agentLogs.splice(index,1);
                    }
                });
                this.$emit('showPositiveNotification', 'Activity log has been successfully Deleted !')
            },
            cancelEdit(){
                this.editedLog = {}
            }
        },
        mounted() {

        }
    }
</script>

<style scoped>

</style>
