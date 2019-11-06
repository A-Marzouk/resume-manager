<template>
    <div class="d-flex justify-content-center">
        <div class="dashboard_content campaign_activity">
            <div class="hideOnTablet">
                <div class="dashboard-side-menu NoDecor">
                    <div class="team-list-header">
                        <div class="teamName">
                            TEAM
                        </div>
                        <div class="teamChat">
                            GO TO TEAM CHAT
                        </div>
                    </div>
                    <div class="lineDivide"></div>

                    <a v-for="(agent,index) in campaign.agents" :key="index" class="team-member"
                       v-show="campaign.agents.length > 0"
                       href="javascript:void(0)" @click="setCurrentAgent(agent.id)">
                        <img src="/images/client/dummy.png" alt="member image">
                        <div class="team-member-info">
                            <div class="member-name manager">
                                {{agent.user.user_data.first_name}} {{agent.user.user_data.last_name}}
                            </div>
                            <div class="job-title">
                                {{agent.user.user_data.job_title}}
                            </div>
                        </div>
                    </a>

                    <div style="padding: 16px;" v-show="campaign.agents.length < 1">
                        There are no active members in this campaign. <a href="/client/camp/add-agent">Add new agent</a>
                    </div>

                </div>
                <div class="documents-bar d-flex justify-content-center">
                    <div class="button-base blue-button-a">
                        <a href="#" style="width:178px; height: 38px;">GO TO STATISTICS</a>
                    </div>
                </div>
            </div>
            <div class="content-block client">
                <div class="content-block-campaign-activity">
                    <div class="hideOnLg">
                        <div class="button-base blue-button-a d-flex justify-content-end"
                             style="margin-bottom: 22px; margin-top: 22px;">
                            <a href="#" class="m-0" style="width:178px; height: 38px;">GO TO STATISTICS</a>
                        </div>
                    </div>
                    <div class="team-bar-tablet">
                        <div class="team-info">
                            <div class="team-name">
                                TEAM
                            </div>
                            <div class="actionBtn">
                                GO TO TEAM CHAT
                            </div>
                        </div>
                        <div class="lineDivide tablet-bar"></div>
                        <div class="agent-bar">
                            <div class="team-member tablet-bar">
                                <img src="/images/client/dummy.png" alt="member image">
                                <div class="team-member-info">
                                    <div class="member-name">
                                        {{currentAgent.user.user_data.first_name}}
                                        {{currentAgent.user.user_data.last_name}}
                                    </div>
                                    <div class="job-title">
                                        {{currentAgent.user.user_data.job_title}}
                                    </div>
                                </div>
                            </div>
                            <a class="actionBtn" href="javascript:void(0)" data-toggle="modal"
                               data-target="#select-agent-modal">
                                CHOOSE AGENT
                            </a>
                        </div>
                    </div>
                    <div class="data-logs">
                        <div class="d-flex align-items-center justify-content-end pr-4">
                            <div>
                                <div class="agentInfo d-flex flex-wrap justify-content-end pb-1">
                                    <div class="actionBtn">
                                        <a style="font-size: 12px;" class="pr-1"
                                           v-show="currentAgent.currentWorkingShift.status == 0">
                                            NO SHIFT | {{currentAgent.currentWorkingShift.total_hours}}
                                        </a>

                                        <a class="pr-1" style="font-size: 12px; color:#3EBD74; font-weight: bold;"
                                           v-show="currentAgent.currentWorkingShift.status == 1 || currentAgent.currentWorkingShift.status == 3 ">
                                            SHIFT | <span :class="'campaign_timer_' + currentAgent.id">
                                                        {{currentAgent.currentWorkingShift.total_hours}}
                                                    </span>
                                        </a>

                                        <a class="pr-1" style="font-size: 12px; color:#3EBD74; font-weight: bold;"
                                           v-show="currentAgent.currentWorkingShift.status == 1">
                                            ACTIVE
                                        </a>

                                        <a class="pr-1" style="font-size: 12px; color:#F66691; font-weight: bold;"
                                           v-show="currentAgent.currentWorkingShift.status == 3">
                                            ON BREAK
                                        </a>

                                        <a href="javascript:void(0)" class="pr-3" style="font-size: 12px;"
                                           @click="viewShifts(currentAgent.id)">TIME TODAY | {{calculateTodayTotalHours(currentAgent.shifts)}}</a>
                                    </div>
                                </div>

                                <div class="d-flex flex-column mt-0 mb-2 pr-3 w-100 align-items-end" style="font-size: 13px;"
                                     v-if="viewAgentShiftsByID == currentAgent.id">
                                    <div v-for="(shift,index) in currentAgent.shifts" :key="index" class="pt-1" style="color: #0D96DB">
                                        {{todaysDate()}} : {{shift.total_hours}}
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
                        <div class="member-logs-empty" v-show="currentAgent.logs.length < 1">
                            <div class="empty-state-text">
                                Sorry, no entries for today
                            </div>
                            <div class="empty-state-image">
                                <img src="/images/client/campaign_activity/empty_state.png" alt="empty state">
                            </div>
                        </div>
                        <div class="member-logs" v-show="currentAgent.logs.length > 0">
                            <div v-if="currentAgent !== undefined" class="logsBox agent-logs-block">
                                <div v-for="(log,index) in currentAgent.logs" :key="index">
                                    <div class="log" v-show="log.campaign_id == campaign.id">
                                        <div class="log-time">
                                            {{getDate(log.created_at)}}
                                        </div>
                                        <div class="log-text">
                                            <status-selector :status="logStatusCode[log.status]"></status-selector>

                                            <span class="log-text-content NoDecor" style="flex:1;"
                                                  :class="{ blueColor : log.history.length > 0}">
                                                    {{log.log_text}}
                                                    <a href=javascript:void(0) @click="toggleLogHistory(log)"
                                                       v-show='log.history.length > 0'>
                                                        <small> (Edited)</small>
                                                    </a>
                                                <br/>

                                                <div class="d-none" :id="'log_history_' + log.id">
                                                      <span v-for="(logHistory, index) in log.history"
                                                            style="font-weight: 400 !important;"
                                                            :key=" 'logHistory' + logHistory.id">
                                                         {{logHistory.log_text}} <small> (Edited at {{logHistory.created_at}}) </small><br/>
                                                      </span>
                                                </div>

                                             </span>
                                        </div>
                                    </div>
                                </div>

                                <div v-show="currentAgent.logs.length < 1" style="padding: 38px;">
                                    There are no logs for this agent.
                                </div>

                            </div>
                        </div>


                    </div>
                    <div class="documents-bar">
                        <img src="/images/client/campaign_activity/document.png" alt="document">
                        <div class="document-text">
                            Document link: <span>No links.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Agent select modal -->
        <div class="modal" id="select-agent-modal">
            <div class="modal-dialog">
                <div class="modal-content agent-modal-content">

                    <!-- Modal Header -->
                    <div class="select-agent-modal-header">
                        <div class="title text-lay">
                            CHOOSE TEAM MEMBER
                        </div>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="lineDivide"></div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="dashboard-side-menu">
                            <a v-for="(agent,index) in campaign.agents" :key="index" class="team-member"
                               v-show="campaign.agents.length > 1"
                               @click="setCurrentAgent(agent.id)">
                                <img src="/images/client/dummy.png" alt="member image">
                                <div class="team-member-info">
                                    <div class="member-name manager">
                                        {{agent.user.user_data.first_name}} {{agent.user.user_data.last_name}}
                                    </div>
                                    <div class="job-title">
                                        {{agent.user.user_data.job_title}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal" id="pick-date-modal">
            <div class="modal-dialog">
                <div class="modal-content agent-modal-content date-picker">
                    <!-- Modal body -->
                    <button type="button" class="close d-none" data-dismiss="modal" id="agentsModal">&times;</button>
                    <div class="modal-body">
                        <div id="datepicker"></div>
                        <input type="hidden" name="selected-date-value" id="selected-date-value" @change="dateChanged">
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
    import datepicker from '../../datepicker'
    import statusSelector from '../../status-selector.vue'
    import db from '../../../firestoreDB' ;


    export default {
        props: ['campaign'],
        components: {
            datepicker,
            "status-selector": statusSelector
        },
        data() {
            return {
                hasLogs: true,
                selectedDate: '',
                appliedDate: '',
                currentAgent: {
                    user_data: {},
                    logs: []
                },
                logStatusCode: {
                    1: 'ER',
                    2: 'CB',
                    3: 'NI',
                    4: 'AS',
                    5: 'CR',
                    6: 'S',
                },
                logStatusCodeInitials: {
                    1: 'ER',
                    2: 'CB',
                    3: 'NI',
                    4: 'AS',
                    5: 'CR',
                    6: 'S',
                },
                viewAgentShiftsByID : '' ,
                timers:[
                    {
                        agent_id:'',
                        timer :''
                    }
                ]
            }
        },
        methods: {
            dateChanged() {
                this.selectedDate = $('#selected-date-value').val();
            },
            applySelectedDate() {
                this.appliedDate = this.selectedDate;
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
            setCurrentAgent(agent_id) {
                if(this.currentAgent.id == agent_id){
                    return;
                }

                axios.get('/agent/get/' + agent_id)
                    .then( (response) => {
                        this.currentAgent = response.data ;
                        this.setAgentShift();
                    });

                // close modal
                $('.close').click();
            },
            setDefaultAgent() {
                if (this.campaign.agents[0] !== undefined) {
                    this.currentAgent = this.campaign.agents[0];
                    this.setAgentShift();
                }
            },
            setAgentShift(){
                this.currentAgent.currentWorkingShift = {
                    total_hours: '00:00:00',
                    status: 0
                };

                this.currentAgent.shifts.map((shift) => {
                    if (shift.campaign_id == this.campaign.id) {
                        if (shift.status == 1) {
                            this.currentAgent.currentWorkingShift = shift;
                            this.startTimer(this.currentAgent);
                        } else if (shift.status == 3) {
                            this.currentAgent.currentWorkingShift = shift;
                            this.getShiftHours(this.currentAgent);
                        }
                    }
                });
            },
            getDate(date) {
                let event = new Date(date);
                let options = {hour: 'numeric', minute: 'numeric', month: 'short', day: 'numeric'};
                return event.toLocaleDateString('en-EN', options);
            },

            toggleLogHistory(log) {
                if ($('#log_history_' + log.id).hasClass('d-none')) {
                    $('#log_history_' + log.id).removeClass('d-none');
                } else {
                    $('#log_history_' + log.id).addClass('d-none');
                }
            },
            viewShifts(agent_id) {
                if (this.viewAgentShiftsByID == agent_id) {
                    this.viewAgentShiftsByID = '';
                } else {
                    this.viewAgentShiftsByID = agent_id;
                }
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
                let timer = setInterval(() => {
                    this.getShiftHours(agent)
                }, 1000);

                this.timers.push({
                    agent_id : agent.id,
                    timer : timer
                });
            },
            stopTimer(agent) {
                this.timers.map( (timer) => {
                   if(timer.agent_id == agent.id){
                       clearInterval(timer.timer) ;
                   }
                });
            },
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
        },
        created() {
            this.setDefaultAgent();
        },

        mounted(){
            db.collection('activity_logs').get().then((snapshot) => {
                if (snapshot.docs.length > 0) {
                    snapshot.docs.forEach((doc) => {
                        console.log(doc.id)
                        db.collection('activity_logs').doc(doc.id).delete();
                    })
                }
            });
            db.collection('shifts').get().then((snapshot) => {
                if (snapshot.docs.length > 0) {
                    snapshot.docs.forEach((doc) => {
                        console.log(doc.id)
                        db.collection('shifts').doc(doc.id).delete();
                    })
                }
            });

            db.collection('activity_logs').onSnapshot((snapshot) => {
                snapshot.docChanges().forEach((change) => {
                    if (change.type === 'added') {
                        let agent = this.currentAgent;

                        if (agent.id == change.doc.data().agent_id) {
                            let exists = false;
                            let logIndex = 0;
                            agent.logs.map((log, index) => {
                                if (log.id == change.doc.data().id) {
                                    exists = true;
                                    logIndex = index;
                                }
                            });

                            // if the log doesn't exist so add
                            if (!exists) {
                                agent.logs.unshift(change.doc.data());
                            } else {
                                console.log(change.doc.data());
                                // if action is delete
                                if (change.doc.data().action == 'delete') {
                                    agent.logs.splice(logIndex, 1);
                                } else {
                                    agent.logs.splice(logIndex, 1, change.doc.data());
                                }
                            }
                        }
                    }

                });
            });

            db.collection('shifts').onSnapshot((snapshot) => {
                snapshot.docChanges().forEach((change) => {
                    if (change.type === 'added') {
                        let agent = this.currentAgent;

                        if (agent.id == change.doc.data().agent_id) {
                            agent.currentWorkingShift = change.doc.data() ;

                            if(change.doc.data().status == 0 || change.doc.data().status == 3){
                                this.stopTimer(agent);
                            }else{
                                this.startTimer(agent);
                            }

                            if(change.doc.data().action == 'finish_break'){
                                agent.currentWorkingShift.status = 1;
                                this.viewAgentShiftsByID = change.doc.data().agent_id;
                                this.viewAgentShiftsByID = '' ;
                                console.log(change.doc.data().action);
                            }

                            if(change.doc.data().action == 'start_break'){
                                agent.currentWorkingShift.status = 3;
                                this.viewAgentShiftsByID = change.doc.data().agent_id;
                                this.viewAgentShiftsByID = '' ;
                                console.log(change.doc.data().action);
                            }

                        }
                    }
                });

            });

        }
    }
</script>
<style lang="scss" scoped>
    .agent-logs-block .log .log-text .log-text-content {
        padding-left: 50px;
        padding-right: 0px;
    }

    .logsBox {
        max-height: 400px;
        overflow-x: auto;
    }

    .blueColor {
        font-weight: 500 !important;
    }

</style>
