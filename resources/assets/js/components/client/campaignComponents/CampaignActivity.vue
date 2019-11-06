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
                        <datepicker>
                            <a href="javascript:void(0)" class="date-picker-btn" data-toggle="modal"
                               data-target="#pick-date-modal" @click.once="setDatePicker">
                                <img src="/images/icons/pick_date.svg" alt="pick date"> <span class="hideDate">PICK A DATE</span>
                            </a>
                        </datepicker>
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
                $.each(this.campaign.agents, (index, agent) => {
                    if (agent.id === agent_id) {
                        this.currentAgent = agent;
                    }
                });

                // close modal
                $('.close').click();
            },
            setDefaultAgent() {
                if (this.campaign.agents[0] !== undefined) {
                    this.currentAgent = this.campaign.agents[0]
                }
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
        },
        created() {
            this.setDefaultAgent();
        }
    }
</script>
<style lang="scss" scoped>
    .agent-logs-block .log .log-text .log-text-content {
        padding-left: 50px;
        padding-right: 0px;
    }
</style>
