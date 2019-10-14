<template>
    <div class="d-flex justify-content-center">
        <div class="dashboard_content campaign_activity">
            <div class="content-block freelancer flex-column align-items-center">
                <div class="content-block-campaign-activity">
                    <div class="data-logs">
                        <datepicker>
                            <a href="javascript:void(0)" class="date-picker-btn" data-toggle="modal"
                               data-target="#pick-date-modal" @click.once="setDatePicker">
                                <img src="/images/icons/pick_date.svg" alt="pick date"> <span class="hideDate">PICK A DATE</span>
                            </a>
                        </datepicker>
                        <div class="lineDivide"></div>
                        <div class="member-logs-empty"
                             v-show="!hasLogs">
                            <div class="empty-state-text">
                                Sorry, no entries for today yet
                            </div>
                            <div class="empty-state-image">
                                <img src="/images/client/campaign_activity/empty_state.png" alt="empty state">
                            </div>
                        </div>
                        <div class="member-logs"
                             v-show="hasLogs">
                            <div class="agent-logs-block" style="border:none">
                                <div v-for="(log,index) in agentLogs" :key="index + '_LOG'">
                                    <div class="log">
                                        <div class="log-time">
                                            {{getDate(log.created_at)}}
                                        </div>
                                        <div class="log-text justify-content-between">
                                            <div class="status-selector-component">
                                                <a class="recording-status icon" style="color:white"
                                                   v-bind:class="logStatusCode[log.status]">{{
                                                    logStatusCodeInitials[log.status] }}</a>
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

                <div :id=" 'entryBox_' + campaign.id"class=" w-100" :class="{ 'marginTop50' : addEntry }">
                    <addEntry :clear="clear" v-show="addEntry" :agent_id="currentAgent.id" :campaign_id="campaign.id"
                              @activityLogAdded="addActivityLog" ></addEntry>
                </div>

                <div class="documents-bar w-100"  :class="{ 'marginTop50' : !addEntry }">
                    <img src="/images/client/campaign_activity/document.png" alt="document">
                    <div class="document-text">
                        Campaign links: <span>No links.</span>
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
            setAgentLogs() {
                this.agentLogs = this.currentAgent.logs;
            },
            getCurrentAgent() {
                axios.get('/agent/current').then((response) => {
                    this.currentAgent = response.data.agent;
                    this.setAgentLogs();
                });
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
                this.agentLogs.forEach( (oldLog,index) => {
                    if(oldLog.id === logID){
                        this.agentLogs.splice(index,1);
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
        },
        mounted() {
            this.getCurrentAgent();
        }
    }
</script>

<style scoped lang="scss">
    .marginTop50{
     margin-top:50px !important;
    }
</style>
