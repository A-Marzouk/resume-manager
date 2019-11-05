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
                        <a v-if="campaignStatus === 'ACTIVE'" href="javascript:void(0)"
                           @click="changeCampaignStatus('PAUSED')">Pause the campaign</a>
                        <a v-else href="javascript:void(0)" @click="changeCampaignStatus('ACTIVE')">Resume the
                            campaign</a>
                        <a href="javascript:void(0)" @click="changeCampaignStatus('CANCELLED')">Cancel the campaign</a>
                    </div>
                </a>
            </div>
        </div>

        <div v-for="(agent,index) in campaignMembers" :key="index" v-show="campaignMembers.length > 0">
            <div class="agent-logs-block">

                <div class="agentInfo d-flex flex-wrap justify-content-between pb-1">
                    <div>
                        <img src="/images/client/dummy.png" alt="">
                        <span class="userName">
                            {{agent.user.user_data.first_name}} {{agent.user.user_data.last_name}}
                       </span>
                    </div>

                    <div class="actionBtn">
                        <a style="font-size: 12px;" class="pr-1"
                           v-show="agent.currentWorkingShift.status == 0">
                            NO SHIFT | <span :class="'campaign_timer_' + agent.id">
                                {{agent.currentWorkingShift.total_hours}}
                            </span>
                        </a>

                        <a class="pr-1" style="font-size: 12px; color:#3EBD74; font-weight: bold;"
                           v-show="agent.currentWorkingShift.status == 1 || agent.currentWorkingShift.status == 3 ">
                            SHIFT | <span :class="'campaign_timer_' + agent.id">
                                {{agent.currentWorkingShift.total_hours}}
                            </span>
                        </a>

                        <a class="pr-1" style="font-size: 12px; color:#3EBD74; font-weight: bold;"
                           v-show="agent.currentWorkingShift.status == 1">
                            ACTIVE
                        </a>

                        <a class="pr-1" style="font-size: 12px; color:#F66691; font-weight: bold;"
                           v-show="agent.currentWorkingShift.status == 3">
                            ON BREAK
                        </a>

                        <a href="javascript:void(0)" class="pr-3" style="font-size: 12px;"
                           @click="viewShifts(agent.id)">TIME TODAY | {{calculateTodayTotalHours(agent.shifts)}}</a>
                    </div>

                </div>

                <div class="d-flex flex-column mt-0 mb-2 pr-3 w-100 align-items-end" style="font-size: 13px;"
                     v-if="viewAgentShiftsByID == agent.id">
                    <div v-for="(shift,index) in agent.shifts" :key="index" class="pt-1" style="color: #0D96DB">
                        {{todaysDate()}} : {{shift.total_hours}}
                    </div>
                </div>


                <div class="logsBox">
                    <div v-for="(log,index) in sortedLogs(agent.logs)" :key="index" v-show="agent.logs.length > 0">
                        <div class="log" v-show="log.campaign_id == campaign.id">
                            <div class="log-time">
                                {{getDate(log.created_at)}}
                            </div>
                            <div class="log-text">
                                <div class="status-selector-component">
                                    <a class="recording-status icon" style="color:white"
                                       v-bind:class="logStatusCode[log.status]">{{ logStatusCodeInitials[log.status]
                                        }}</a>
                                </div>

                                <span class="log-text-content NoDecor" style="flex:1;" :class="{ blueColor : log.history.length > 0}">
                                            {{log.log_text}}
                                            <a href=javascript:void(0) @click="toggleLogHistory(log)"
                                               v-show='log.history.length > 0'>
                                                <small> (Edited)</small>
                                            </a>
                                            <br/>

                                        <div class="d-none" :id="'log_history_' + log.id">
                                              <span v-for="(logHistory, index) in log.history" style="font-weight: 400 !important;"
                                                    :key=" 'logHistory' + logHistory.id">
                                                 {{logHistory.log_text}} <small> (Edited at {{logHistory.created_at}}) </small><br/>
                                              </span>

                                        </div>

                                </span>
                            </div>
                        </div>
                    </div>

                    <div v-show="agent.logs.length < 1" style="padding: 38px;">
                        There are no logs for this agent.
                    </div>

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
    import db from '../../../firestoreDB' ;


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
                logStatusCodeInitials: {
                    1: 'ER',
                    2: 'CB',
                    3: 'NI',
                    4: 'AS',
                    5: 'CR',
                    6: 'S',
                },
                viewAgentShiftsByID: '',
                remotelyAddedLogs: []
            }
        },
        methods: {
            todaysDate() {
                return moment().format('YYYY-MM-DD');
            },
            calculateTodayTotalHours(agentShifts) {
                let totalHours = 0;
                if (agentShifts.length < 1) {
                    return '00:00:00';
                }
                agentShifts.map((shift) => {
                    totalHours += moment.duration(shift.total_hours).asSeconds();
                });

                return moment.utc(totalHours * 1000).format('HH:mm:ss');
            },
            toggleLogHistory(log) {
                if ($('#log_history_' + log.id).hasClass('d-none')) {
                    $('#log_history_' + log.id).removeClass('d-none');
                } else {
                    $('#log_history_' + log.id).addClass('d-none');
                }
            },
            viewShifts(agent_id) {
                this.campaignMembers.map((agent) => {
                    if (agent.id == agent_id) {
                        if (this.viewAgentShiftsByID == agent_id) {
                            this.viewAgentShiftsByID = '';
                        } else {
                            this.viewAgentShiftsByID = agent_id;
                        }
                    }
                })
            },
            setDefaultCampaignStatus() {
                if (this.campaign.status == 1) {
                    this.campaignStatus = 'ACTIVE';
                } else if (this.campaign.status == 2) {
                    this.campaignStatus = 'PAUSED';

                } else {
                    this.campaignStatus = 'CANCELLED';
                }
            },
            changeCampaignStatus(status) {
                // send to the server to change campaign status.
                axios.post('/client/camp/update', {
                    campaignStatus: status,
                    campaign_id: this.campaign.id
                })
                    .then((response) => {
                        this.campaignStatus = status;
                        this.$emit('showPositiveNotification');
                    })
                    .catch((error) => {
                        console.log('Error updating campaign status : ' + error);
                    });
            },
            getCampMembers() {
                axios.get('/client/camp/members/' + this.campaign.id)
                    .then((response) => {
                        this.campaignMembers = response.data;

                        this.campaignMembers.map((agent) => {
                            agent.currentWorkingShift = {
                                total_hours: '00:00:00',
                                status: 0
                            };

                            agent.shifts.map((shift) => {
                                if (shift.campaign_id == this.campaign.id) {
                                    if (shift.status == 1) {
                                        agent.currentWorkingShift = shift;
                                        this.startTimer(agent);
                                    } else if (shift.status == 3) {
                                        agent.currentWorkingShift = shift;
                                        this.getShiftHours(agent);
                                    }
                                }
                            });

                        })
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            getDate(date) {
                let event = new Date(date);
                let options = {hour: 'numeric', minute: 'numeric', month: 'short', day: 'numeric'};
                return event.toLocaleDateString('en-EN', options);
            },
            sortedLogs(logs) {
                return logs.sort((b, a) => new Date(a.created_at) - new Date(b.created_at));
            },
            getShiftHours(agent) {
                const secs = new Date(moment().format('YYYY-MM-DD hh:mm:ss')) - new Date(agent.currentWorkingShift.start_time);
                const formatted = moment.utc(secs).format('HH:mm:ss');

                if (agent.currentWorkingShift.total_hours == 0 || agent.currentWorkingShift.total_hours == '00:00:00') { // there was no breaks
                    $('.campaign_timer_' + agent.id).text(formatted);
                    return formatted;
                } else if (agent.currentWorkingShift.break_time !== null) {
                    // there were breaks, so add the formatted time to the time that was there already
                    var std_count = agent.currentWorkingShift.total_hours;
                    const secs = new Date(moment().format('YYYY-MM-DD hh:mm:ss')) - new Date(agent.currentWorkingShift.break_time);
                    const formatted = moment.utc(secs).format('HH:mm:ss');
                    let all = moment.duration(std_count).asSeconds() + moment.duration(formatted).asSeconds();
                    let total_hours = moment.utc(all * 1000).format('HH:mm:ss');
                    $('.campaign_timer_' + agent.id).text(total_hours);
                    return total_hours;
                } else {
                    let total_hours = agent.currentWorkingShift.total_hours;
                    $('.campaign_timer_' + agent.id).text(total_hours);
                    return total_hours;
                }

            },
            startTimer(agent) {
                agent.timerVar = setInterval(() => {
                    this.getShiftHours(agent)
                }, 1000);
            },
            stopTimer(agent) {
                clearInterval(agent.timerVar);
            },
        },
        mounted() {
            this.setDefaultCampaignStatus();
            this.getCampMembers();

            db.collection('activity_logs').get().then( (snapshot) => {
                if( snapshot.docs.length > 0){
                    snapshot.docs.forEach((doc) => {
                        console.log(doc.id)
                        db.collection('activity_logs').doc(doc.id).delete();
                    })
                }
            });

            db.collection('activity_logs').onSnapshot((snapshot) => {
                snapshot.docChanges().forEach((change) => {
                    if (change.type === 'added') {
                        this.campaignMembers.map((agent) => {
                            if (agent.id === change.doc.data().agent_id) {
                                let exists = false ;
                                let logIndex  = 0 ;
                                agent.logs.map( (log,index) => {
                                    if(log.id ===  change.doc.data().id ){
                                        exists   = true;
                                        logIndex = index;
                                    }
                                });

                                // if the log doesn't exist so add
                                if(!exists){
                                    agent.logs.push(change.doc.data());
                                }else{
                                    agent.logs.splice(logIndex,1,change.doc.data());
                                }
                                // if the log exists so replace



                            }
                        });
                    }

                });
            });
        }
    }
</script>

<style lang="scss" scoped>
    .logsBox {
        max-height: 400px;
        overflow-x: auto;
    }


    .blueColor {
        font-weight: 500 !important;
    }
</style>
