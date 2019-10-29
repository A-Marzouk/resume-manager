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

                </div>
            </div>
        </div>

        <div v-for="(campaign,index) in activeCampaigns" :key="index">
            <div class="content-block-campaign-brief">
                <div class="upper-bar p-0">
                    <div class="campaignInfo">
                        <div class="title">
                            {{campaign.title}}
                        </div>
                    </div>
                    <div class="actionBtn">
                        <a class="status"
                           :class="{active: campaign.status == 1, paused: campaign.status == 2, canceled: campaign.status == 3}"
                           href="#">
                            {{campaignStatusCode[campaign.status]}}
                        </a>
                    </div>
                </div>

                <div class="agent-logs-block">
                    <div class="agentInfo d-flex flex-wrap justify-content-between pb-1">
                        <div>
                            <img src="/images/client/dummy.png" alt="">
                            <span class="userName">
                            {{agent.user.user_data.first_name}}
                            </span>

                        </div>

                        <div class="actionBtn">
                            <a class="secondary little-padding" href="javascript:;"
                               v-on:click="toggleShift(campaign.id)">
                                {{ (isShiftStart) ? 'FINISH SHIFT'  : 'START SHIFT' }}

                                <span v-if="currentWorkingShift.total_hours != 0">
                                    | Total time of last shift : {{currentWorkingShift.total_hours}}
                                </span>
                            </a>

                            <a class="little-padding" href="javascript:;" v-on:click="toggleBreak(campaign.id)"
                               v-show="isShiftStart">
                                {{ (isBreakStart) ? 'I\'M BACK' : 'I\'M AWAY'}}
                            </a>

                            <a href="javascript:void(0)" class="secondary little-padding" @click="viewShifts(campaign.id)">TODAY SHIFTS</a>
                        </div>

                    </div>

                    <div class="d-flex flex-column mt-0 mb-2 pr-3 w-100 align-items-end" style="font-size: 14px;" v-if="campaignViewedShifts === campaign.id">
                        <div v-for="(shift,index) in todayShifts" :key="index" v-if="shift.campaign_id == campaign.id" class="pt-1" style="color: #0D96DB">
                           {{todaysDate()}} : {{shift.total_hours}}
                        </div>
                    </div>

                    <div v-for="(log,index) in agentLogs" :key="index + '_LOG'" v-show="log.campaign_id == campaign.id">
                        <div class="log">
                            <div class="log-time">
                                {{getDate(log.created_at)}}
                            </div>
                            <div class="log-text justify-content-between">
                                <div class="status-selector-component">
                                    <a class="recording-status icon" style="color:white"
                                       v-bind:class="logStatusCode[log.status]">{{ logStatusCodeInitials[log.status]
                                        }}</a>
                                </div>
                                <span class="log-text-content" style="flex:1;">
                                    {{log.log_text}}
                                </span>
                                <a href="javascript:void(0)" @click="editedLog = log">
                                    <img class="icon-edit" src="/images/client/campaign_activity/edit.png"
                                         alt="edit icon"
                                         style="height: 20px;"/>
                                </a>

                            </div>
                        </div>

                        <div>
                            <updateEntry :clear="cancelEdit" v-if="editedLog.id === log.id" :log="log"
                                         @activityLogUpdated="updateActivityLog"
                                         @activityLogDeleted="deleteActivityLog"></updateEntry>
                        </div>
                    </div>
                </div>

                <div class="campaign-brief-footer">
                    <a :href=" '/freelancer/campaign/' + campaign.id ">
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
                          @activityLogAdded="addActivityLog" ref="addEntryComponent"></addEntry>
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
                campaignViewedShifts: '',
                imAway: true,
                isShiftStart: false,
                isBreakStart: false,
                campaigns: this.agent.campaigns,
                shifts: this.agent.shifts,
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
                logStatusCodeInitials: {
                    1: 'ER',
                    2: 'CB',
                    3: 'NI',
                    4: 'AS',
                    5: 'CR',
                    6: 'S',
                },
                editedLog: {},
                currentWorkingShift: {
                    total_hours : 0
                }
            }
        },
        computed: {
            activeCampaigns() {
                return this.campaigns.filter((campaign) => {
                    return campaign.status == 1
                });
            },
            todayShifts() {
                return this.agent.shifts.filter((shift) => {
                    let shiftDate = moment(shift.created_at).format('YYYY-MM-DD');
                    let today     = moment().format('YYYY-MM-DD');
                    console.log('shiftDate '+shiftDate);
                    console.log('today '+today);

                    return moment(shiftDate).isSame(moment(today));
                });
            },
        },
        methods: {
            todaysDate(){
                return moment().format('YYYY-MM-DD');
            },
            viewShifts(camp_id){
                this.campaigns.map((campaign) => {
                    if(campaign.id == camp_id){
                        if(this.campaignViewedShifts == camp_id){
                            this.campaignViewedShifts = '';
                        }else {
                            this.campaignViewedShifts = camp_id;
                        }
                    }
                })
            },
            toggleShift(camp_id) {
                // add log of starting the shift
                if (!this.isShiftStart) {
                    this.isShiftStart = true;
                    this.addShift(camp_id);
                    this.addShiftStartLog(camp_id);
                } else {
                    this.isShiftStart = false;
                    this.addShiftEndLog(camp_id);
                    this.endShift(this.currentWorkingShift.id);
                }
            },
            toggleBreak(camp_id) {
                // add log of starting the shift
                if (!this.isBreakStart) {
                    this.isBreakStart = true;
                    this.addBreakStartLog(camp_id);
                } else {
                    this.isBreakStart = false;
                    this.addBreakEndLog(camp_id);
                }
            },
            addShiftStartLog(camp_id) {
                let logData = {
                    log_text: 'Shift starts at: ' + new Date().toLocaleString(),
                    status: 6,
                    agent_id: this.agent.id,
                    campaign_id: camp_id
                };
                axios.post('/agent/logs/add', logData)
                    .then((response) => {
                        let log = response.data;
                        this.addActivityLog(log);
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            addShift(camp_id) {
                let shiftData = {
                    start_time: moment().format('YYYY-MM-DD hh:mm:ss'),
                    end_time: '',
                    break_time: '',
                    total_hours: 0,
                    status: 1, // active
                    agent_id: this.agent.id,
                    campaign_id: camp_id
                };
                axios.post('/agent/shifts/add', shiftData)
                    .then((response) => {
                        console.log(response.data);
                        this.currentWorkingShift = response.data;
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            endShift(shift_id) {
                // total hours :
                let totalHours = this.getShiftHours();

                let shiftData = {
                    shift_id: shift_id,
                    end_time: moment().format('YYYY-MM-DD hh:mm:ss'),
                    total_hours: totalHours,
                    status: 2
                };
                axios.post('/agent/shifts/end', shiftData)
                    .then((response) => {
                        console.log(response.data);
                        this.currentWorkingShift = response.data;
                        this.todayShifts.push(response.data);
                        this.campaignViewedShifts = response.data.campaign_id;
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },

            pauseShift(shift_id) {
                // total hours :
                let totalHours = this.getShiftHours();
                let shiftData = {
                    shift_id: shift_id,
                    end_time: moment().format('YYYY-MM-DD hh:mm:ss'),
                    total_hours: totalHours,
                };
                axios.post('/agent/shifts/pause', shiftData)
                    .then((response) => {
                        console.log(response.data);
                        this.currentWorkingShift = response.data;
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },

            resumeShift(shift_id) {
                // total hours :
                const secs = new Date(moment().format('YYYY-MM-DD hh:mm:ss')) - new Date(this.currentWorkingShift.start_time);
                const formatted = moment.utc(secs).format('HH:mm:ss');

                let shiftData = {
                    shift_id: shift_id,
                    break_time: moment().format('YYYY-MM-DD hh:mm:ss'), // the time when I am back from break
                };
                axios.post('/agent/shifts/resume', shiftData)
                    .then((response) => {
                        console.log(response.data);
                        this.currentWorkingShift = response.data;
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            getShiftHours() {
                const secs = new Date(moment().format('YYYY-MM-DD hh:mm:ss')) - new Date(this.currentWorkingShift.start_time);
                const formatted = moment.utc(secs).format('HH:mm:ss');

                if (this.currentWorkingShift.total_hours == 0) { // there was no breaks
                    return formatted;
                } else {
                    // there were breaks, so add the formatted time to the time that was there already
                    var std_count = this.currentWorkingShift.total_hours;
                    const secs = new Date(moment().format('YYYY-MM-DD hh:mm:ss')) - new Date(this.currentWorkingShift.break_time);
                    const formatted = moment.utc(secs).format('HH:mm:ss');
                    let all = moment.duration(std_count).asSeconds() + moment.duration(formatted).asSeconds();
                    let total_hours = moment.utc(all*1000).format('HH:mm:ss') ;
                    return total_hours;
                }

            },

            addShiftEndLog(camp_id) {
                let logData = {
                    log_text: 'Shift ended at: ' + new Date().toLocaleString(),
                    status: 6,
                    agent_id: this.agent.id,
                    campaign_id: camp_id
                };
                axios.post('/agent/logs/add', logData)
                    .then((response) => {
                        let log = response.data;
                        this.addActivityLog(log);
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },

            addBreakStartLog(camp_id) {
                let logData = {
                    log_text: 'Break started at: ' + new Date().toLocaleString(),
                    status: 6,
                    agent_id: this.agent.id,
                    campaign_id: camp_id
                };
                axios.post('/agent/logs/add', logData)
                    .then((response) => {
                        let log = response.data;
                        this.addActivityLog(log);
                        this.pauseShift(this.currentWorkingShift.id);
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            addBreakEndLog(camp_id) {
                let logData = {
                    log_text: 'Break ends at: ' + new Date().toLocaleString(),
                    status: 6,
                    agent_id: this.agent.id,
                    campaign_id: camp_id
                };
                axios.post('/agent/logs/add', logData)
                    .then((response) => {
                        let log = response.data;
                        this.addActivityLog(log);
                        this.resumeShift(this.currentWorkingShift.id);
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },


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
                this.agentLogs.forEach((oldLog, index) => {
                    if (oldLog.id === log.id) {
                        this.agentLogs[index] = log;
                    }
                });
                this.$emit('showPositiveNotification', 'Activity log has been successfully Updated !')

            },
            deleteActivityLog(logID) {
                // splice the old log with this one passed here.
                this.agentLogs.forEach((oldLog, index) => {
                    if (oldLog.id === logID) {
                        this.agentLogs.splice(index, 1);
                    }
                });
                this.$emit('showPositiveNotification', 'Activity log has been successfully Deleted !')
            },
            cancelEdit() {
                this.editedLog = {}
            }
        },
        mounted() {

        }
    }
</script>

<style scoped lang="scss">
    .actionBtn {
        margin-right: 34px;
        justify-content: space-between;
        display: flex;

        @media (max-width: 745px) {
            margin-right: 6px;
        }

        a:hover {
            text-decoration: none;
        }

        a {
            @media (max-width: 745px) {
                min-width: 120px;
                height: 31px;
                font-size: 11px;

                &.hideOnSm {
                    display: none;
                }
            }

            padding: 4px 23px 3px 13px;
            display: block;
            min-width: 120px;
            height: 31px;
            text-align: center;
            border-radius: 30px;
            background: #05A4F4;

            font-family: Roboto;
            font-style: normal;
            font-weight: 500;
            font-size: 12px;
            line-height: 24px;
            letter-spacing: -0.1px;
            color: #FFFFFF;
            margin: 0 5px;

            &.little-padding {
                padding: 4px 15px;
            }

            &.secondary {
                background: transparent;
                color: #05A4F4;
            }

            img {
                padding-right: 8px;
                padding-left: 7px;
                padding-bottom: 3px;
            }
        }
    }
</style>
