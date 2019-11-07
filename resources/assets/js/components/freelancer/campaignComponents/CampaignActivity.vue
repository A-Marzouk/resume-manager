<template>
    <div class="d-flex justify-content-center">
        <div class="dashboard_content campaign_activity">
            <div class="content-block freelancer flex-column align-items-center">
                <div class="content-block-campaign-activity">
                    <div class="data-logs" style="height: auto!important;">
                        <div class="d-flex align-items-center justify-content-end pr-4">
                            <div>
                                <div class="agentInfo d-flex flex-wrap justify-content-end pb-1">
                                    <div class="actionBtn">
                                        <a class="secondary little-padding" href="javascript:;" v-on:click="startShift(campaign)"
                                           v-show="campaign.currentWorkingShift.status == 0">
                                            START NEW SHIFT | <span :class="'campaign_timer_' + campaign.id">
                                             {{campaign.currentWorkingShift.total_hours}}
                                             </span>
                                        </a>

                                        <a class="secondary little-padding" href="javascript:;" v-on:click="finishShift(campaign)"
                                           v-show="campaign.currentWorkingShift.status == 1 || campaign.currentWorkingShift.status == 3 ">
                                            FINISH SHIFT | <span :class="'campaign_timer_' + campaign.id">
                                                {{campaign.currentWorkingShift.total_hours}}
                                                         </span>
                                        </a>

                                        <a class=" little-padding" href="javascript:;" v-on:click="startBreak(campaign)"
                                           v-show="campaign.currentWorkingShift.status == 1">
                                            I'M AWAY
                                        </a>

                                        <a class=" little-padding" href="javascript:;" v-on:click="finishBreak(campaign)"
                                           v-show="campaign.currentWorkingShift.status == 3">
                                            I'M BACK
                                        </a>

                                        <a href="javascript:void(0)" class="secondary little-padding"
                                           @click="viewShifts(campaign.id)">TIME TODAY | {{calculateTodayTotalHours(todayShifts,campaign.id)}}</a>
                                    </div>
                                </div>
                                <div class="d-flex flex-column mt-0 mb-2 pr-3 w-100 align-items-end" style="font-size: 14px;"
                                     v-if="campaignViewedShifts == campaign.id">
                                    <div v-for="(shift,index) in todayShifts" :key="index" v-if="shift.campaign_id == campaign.id"
                                         class="pt-1" style="color: #0D96DB">
                                        {{todaysDateValue}} : {{shift.total_hours}}
                                    </div>
                                </div>
                            </div>
                            <div class="date-picker-bar">
                                <a href="javascript:void(0)" class="date-picker-btn" data-toggle="modal"
                                   data-target="#pick-date-modal" @click.once="setDatePicker">
                                    <img src="/images/icons/pick_date.svg" alt="pick date"> <span class="hideDate">PICK A DATE</span>
                                </a>
                            </div>
                        </div>
                        <div class="lineDivide"></div>
                        <div class="member-logs-empty"
                             v-show="filteredLogs(currentAgent.logs).length < 1">
                            <div class="empty-state-text">
                                Sorry, no entries for this date
                            </div>
                            <div class="empty-state-image">
                                <img src="/images/client/campaign_activity/empty_state.png" alt="empty state">
                            </div>
                        </div>
                        <div class="member-logs"
                             v-show="hasLogs">
                            <div class="agent-logs-block" style="border:none" >
                                <div class="logsBox">
                                    <div v-for="(log,index) in filteredLogs(currentAgent.logs)" :key="index + '_LOG'"
                                         v-show="log.campaign_id == campaign.id">
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
                                                <a href="javascript:void(0)" @click="editedLog = log">
                                                    <img class="icon-edit" src="/images/client/campaign_activity/edit.png"
                                                         alt="edit icon"
                                                         style="height: 20px;"/>
                                                </a>

                                            </div>
                                        </div>

                                        <div>
                                            <updateEntry :clear="cancelEdit" v-if="editedLog.id == log.id" :log="log"
                                                         @activityLogUpdated="updateActivityLog"
                                                         @activityLogDeleted="deleteActivityLog"></updateEntry>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-block-campaign-brief">
                            <div class="campaign-brief-footer">
                                <a class="add-entry" :class="{disabled: addEntry}" href="javascript:;"
                                   v-on:click="addEntryBox(campaign.id)">
                                    <img :src="`/images/icons/${(!addEntry) ? 'plus_icon_blue' : 'plus_icon_gray'}.svg`"
                                         alt="plus sign"/> ADD ENTRY
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div :id=" 'entryBox_' + campaign.id"class="w-100" style="max-width:1200px;">
                    <addEntry :clear="clear" v-show="addEntry" :agent_id="currentAgent.id" :campaign_id="campaign.id"
                              @activityLogAdded="addActivityLog" ></addEntry>
                </div>

                <div class="w-100" style="max-width:1200px;">
                    <div class="documents-bar">
                        <img src="/images/client/campaign_activity/document.png" alt="document">
                        <div class="document-text">
                            Campaign links: <span>No links.</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- date select modal -->
        <div class="modal"
             id="pick-date-modal">
            <div class="modal-dialog">
                <div class="modal-content agent-modal-content date-picker">
                    <!-- Modal body -->
                    <button type="button"
                            id="close-modal"
                            class="close d-none"
                            data-dismiss="modal">&times;
                    </button>
                    <div class="modal-body">
                        <div id="datepicker"></div>
                        <input type="hidden"
                               name="selected-date-value"
                               id="selected-date-value"
                               @change="dateChanged">
                        <div class="date-picker-modal-footer">
                            <a href="javascriot:void(0)" class="cancelBtn" @click="cancelDatePicking">
                                CANCEL
                            </a>
                            <a href="javascriot:void(0)" class="applyBtn selected-date" @click="applySelectedDate">
                                APPLY
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import DatePicker from '../../datepicker.vue'
    import addEntry from '../dashboardComponents/addEntry'
    import updateEntry from '../dashboardComponents/updateEntry'
    import statusSelector from '../../status-selector'
    import db from '../../../firestoreDB' ;

    export default {
        components: {
            'datepicker': DatePicker,
             addEntry,
             updateEntry,
            'status-selector': statusSelector
        },
        props: ['campaign'],
        data() {
            return {
                hasLogs: true,
                selectedDate: '',
                campaignViewedShifts: '',
                imAway: true,
                appliedDate: '',
                agentLogs: [],
                currentAgent: {},
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
                editedLog:{},
                addEntry: false,
                todaysDateValue : moment().format('YYYY-MM-DD')
            }
        },
        methods: {
            filteredLogs(logs){
                return logs.filter((log) => {
                    let logDate = moment(log.created_at).format('YYYY-MM-DD');
                    let today = this.todaysDateValue;
                    return moment(logDate).isSame(moment(today));
                });
            },
            dateChanged() {
                this.selectedDate = $('#selected-date-value').val();
            },
            applySelectedDate() {
                this.appliedDate = this.selectedDate;
                let formattedAppliedData = this.appliedDate.replace('/','-').replace('/','-');
                this.todaysDateValue = moment(formattedAppliedData).format('YYYY-MM-DD')
                $('#close-modal').click();
            },
            cancelDatePicking() {
                $('#close-modal').click();
            },
            setDatePicker() {
                $("#datepicker").datepicker({
                    onSelect: function (dateText, inst) {
                        $("input[name='selected-date-value']").val(dateText);
                        const dateChanged = new CustomEvent('change');
                        document.getElementById('selected-date-value').dispatchEvent(dateChanged);
                    }
                });
            },
            setAgentLogs() {
                this.agentLogs = this.currentAgent.logs;
            },
            getCurrentAgent() {
                axios.get('/agent/current').then((response) => {
                    this.currentAgent = response.data.agent;
                    this.setAgentLogs();
                    this.currentAgent.shifts.map((shift) => {
                        if (shift.campaign_id == this.campaign.id) {
                            if (shift.status == 1) {
                                this.campaign.currentWorkingShift = shift;
                                this.startTimer(this.campaign);
                            } else if (shift.status == 3) {
                                this.campaign.currentWorkingShift = shift;
                                this.getShiftHours(this.campaign);
                            }
                        }
                    });

                });
            },
            getDate(date) {
                let event = new Date(date);
                let options = {hour: 'numeric', minute: 'numeric', month: 'short', day: 'numeric'};
                return event.toLocaleDateString('en-EN', options);
            },
            addActivityLog(log) {
                this.currentAgent.logs.unshift(log);
                this.$emit('showPositiveNotification', 'Activity log has been successfully Added!')
            },
            updateActivityLog(log) {
                // replace the old log with this one passed here.
                this.currentAgent.logs.forEach( (oldLog,index) => {
                    if(oldLog.id === log.id){
                        this.currentAgent.logs[index] = log ;
                    }
                }) ;
                this.$emit('showPositiveNotification', 'Activity log has been successfully Updated !')

            },
            addEntryBox(campaign_id) {
                this.addEntry = true;
                //scroll to the box
                $('html, body').animate({
                    scrollTop: $("#entryBox_" + campaign_id).offset().top - 105
                }, 1000);
            },
            deleteActivityLog(logID){
                // splice the old log with this one passed here.
                this.currentAgent.logs.forEach( (oldLog,index) => {
                    if(oldLog.id === logID){
                        this.currentAgent.logs.splice(index,1);
                    }
                });
                this.$emit('showPositiveNotification', 'Activity log has been successfully Deleted !')
            },
            cancelEdit(){
                this.editedLog = {}
            },
            clear() {
                this.addEntry = false
            },

            // shifts functions

            calculateTodayTotalHours(todayShifts,camp_id){
                let totalHours = 0;
                if(this.todayShifts.length < 1){
                    return '00:00:00';
                }
                todayShifts.map( (shift) => {
                    if(shift.campaign_id == camp_id){
                        totalHours += moment.duration(shift.total_hours).asSeconds();
                    }
                });

                return  moment.utc(totalHours * 1000).format('HH:mm:ss') ;
            },
            viewShifts(camp_id) {
                if (this.campaign.id == camp_id) {
                    if (this.campaignViewedShifts == camp_id) {
                        this.campaignViewedShifts = '';
                    } else {
                        this.campaignViewedShifts = camp_id;
                    }
                }
            },
            startShift(campaign) {
                this.addShift(campaign);
            },
            startTimer(campaign) {
                campaign.timerVar = setInterval(() => {
                    this.getShiftHours(campaign)
                }, 1000);
            },
            stopTimer(campaign) {
                clearInterval(campaign.timerVar);
            },
            finishShift(campaign) {
                this.endShift(campaign.currentWorkingShift.id, campaign);
            },
            startBreak(campaign) {
                campaign.currentWorkingShift.status = 3;
                this.addBreakStartLog(campaign);
            },
            finishBreak(campaign) {
                campaign.currentWorkingShift.status = 1;
                this.addBreakEndLog(campaign);
            },
            addShiftStartLog(campaign) {
                let logData = {
                    log_text: 'Shift starts at: ' + new Date().toLocaleString(),
                    status: 6,
                    agent_id: this.currentAgent.id,
                    campaign_id: campaign.id
                };
                axios.post('/agent/logs/add', logData)
                    .then((response) => {
                        let log = response.data;
                        this.addActivityLog(log);
                        this.addFireStoreLog(log);
                        this.startTimer(campaign);
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            addShift(campaign) {
                let shiftData = {
                    start_time: moment().format('YYYY-MM-DD hh:mm:ss'),
                    end_time: '',
                    break_time: '',
                    total_hours: 0,
                    status: 1, // active
                    agent_id: this.currentAgent.id,
                    campaign_id: campaign.id
                };
                axios.post('/agent/shifts/add', shiftData)
                    .then((response) => {
                        campaign.currentWorkingShift = response.data;
                        this.addFireStoreShift(campaign.currentWorkingShift);
                        this.addShiftStartLog(campaign);
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            endShift(shift_id, campaign) {
                // total hours :
                let totalHours = this.getShiftHours(campaign);

                let shiftData = {
                    shift_id: shift_id,
                    end_time: moment().format('YYYY-MM-DD hh:mm:ss'),
                    total_hours: totalHours,
                    status: 2
                };
                axios.post('/agent/shifts/end', shiftData)
                    .then((response) => {
                        campaign.currentWorkingShift = {
                            status: 0,
                            agent_id : response.data.agent_id
                        };
                        this.addFireStoreShift(campaign.currentWorkingShift);
                        this.todayShifts.unshift(response.data);
                        this.campaignViewedShifts = response.data.campaign_id;
                        this.addShiftEndLog(campaign);

                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            pauseShift(shift_id, campaign) {
                // total hours :
                let totalHours = this.getShiftHours(campaign);
                let shiftData = {
                    shift_id: shift_id,
                    end_time: moment().format('YYYY-MM-DD hh:mm:ss'),
                    total_hours: totalHours,
                };
                axios.post('/agent/shifts/pause', shiftData)
                    .then((response) => {
                        campaign.currentWorkingShift = response.data;
                        campaign.currentWorkingShift.action = 'start_break';
                        this.addFireStoreShift(campaign.currentWorkingShift);
                        this.stopTimer(campaign);
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            resumeShift(shift_id, campaign) {
                // total hours :
                const secs = new Date(moment().format('YYYY-MM-DD hh:mm:ss')) - new Date(campaign.currentWorkingShift.start_time);
                const formatted = moment.utc(secs).format('HH:mm:ss');

                let shiftData = {
                    shift_id: shift_id,
                    break_time: moment().format('YYYY-MM-DD hh:mm:ss'), // the time when I am back from break
                };
                axios.post('/agent/shifts/resume', shiftData)
                    .then((response) => {
                        campaign.currentWorkingShift = response.data;
                        campaign.currentWorkingShift.action = 'finish_break';
                        this.addFireStoreShift(campaign.currentWorkingShift);
                        this.startTimer(campaign);
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            getShiftHours(campaign) {
                const secs = new Date(moment().format('YYYY-MM-DD hh:mm:ss')) - new Date(campaign.currentWorkingShift.start_time);
                const formatted = moment.utc(secs).format('HH:mm:ss');

                if (campaign.currentWorkingShift.total_hours == 0 || campaign.currentWorkingShift.total_hours == '00:00:00') { // there was no breaks
                    $('.campaign_timer_' + campaign.id).text(formatted);
                    return formatted;
                } else if (campaign.currentWorkingShift.break_time !== null) {
                    // there were breaks, so add the formatted time to the time that was there already
                    var std_count = campaign.currentWorkingShift.total_hours;
                    const secs = new Date(moment().format('YYYY-MM-DD hh:mm:ss')) - new Date(campaign.currentWorkingShift.break_time);
                    const formatted = moment.utc(secs).format('HH:mm:ss');
                    let all = moment.duration(std_count).asSeconds() + moment.duration(formatted).asSeconds();
                    let total_hours = moment.utc(all * 1000).format('HH:mm:ss');
                    $('.campaign_timer_' + campaign.id).text(total_hours);
                    return total_hours;
                } else {
                    let total_hours = campaign.currentWorkingShift.total_hours;
                    $('.campaign_timer_' + campaign.id).text(total_hours);
                    return total_hours;
                }

            },
            addShiftEndLog(campaign) {
                let logData = {
                    log_text: 'Shift ended at: ' + new Date().toLocaleString(),
                    status: 6,
                    agent_id: this.currentAgent.id,
                    campaign_id: campaign.id
                };
                axios.post('/agent/logs/add', logData)
                    .then((response) => {
                        let log = response.data;
                        this.addActivityLog(log);
                        this.addFireStoreLog(log);
                        this.stopTimer(campaign);
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            addBreakStartLog(campaign) {
                let logData = {
                    log_text: 'Break started at: ' + new Date().toLocaleString(),
                    status: 6,
                    agent_id: this.currentAgent.id,
                    campaign_id: campaign.id
                };
                axios.post('/agent/logs/add', logData)
                    .then((response) => {
                        let log = response.data;
                        this.addActivityLog(log);
                        this.addFireStoreLog(log);
                        this.pauseShift(campaign.currentWorkingShift.id, campaign);
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            addBreakEndLog(campaign) {
                let logData = {
                    log_text: 'Break ends at: ' + new Date().toLocaleString(),
                    status: 6,
                    agent_id: this.currentAgent.id,
                    campaign_id: campaign.id
                };
                axios.post('/agent/logs/add', logData)
                    .then((response) => {
                        let log = response.data;
                        this.addActivityLog(log);
                        this.addFireStoreLog(log);
                        this.resumeShift(campaign.currentWorkingShift.id, campaign);
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            toggleLogHistory(log) {
                if ($('#log_history_' + log.id).hasClass('d-none')) {
                    $('#log_history_' + log.id).removeClass('d-none');
                } else {
                    $('#log_history_' + log.id).addClass('d-none');
                }
            },

            // firestore functions :

            addFireStoreLog(log){
                db.collection('activity_logs').add(log);
            },

            addFireStoreShift(shift){
                db.collection('shifts').add(shift);
            }

        },
        computed: {
            todayShifts() {
                return this.currentAgent.shifts.filter((shift) => {
                    let shiftDate = moment(shift.started_at).format('YYYY-MM-DD');
                    let today = this.todaysDateValue;
                    return moment(shiftDate).isSame(moment(today));
                });
            }
        },
        mounted() {

        },
        created() {
            this.campaign.currentWorkingShift = {
                status: 0,
                total_hours: '00:00:00',
            };
            this.currentAgent.shifts  = [] ;
            this.currentAgent.logs  = [] ;
            this.getCurrentAgent();
        },
    }
</script>

<style scoped lang="scss">
    .marginTop50{
     margin-top:50px !important;
    }

    .logsBox {
        height: 312px;
        overflow-x: auto;
    }

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

    .blueColor{
        font-weight: 500!important;
    }


</style>
