<template>
    <div class="campaign_team_content">
        <div class="campaign_team">
            <div class="campaign-team-header">
                <div class="select-list">
                    <div class="form-group">
                        <div class="custom-dropdown team">
                            <div v-on:click="toggleDropdown" class="selected-option">{{selectedOption.text}}</div>
                            <div class="list-options" :class="{show: dropdown.showDropdown}">
                                <div v-on:click="selectOption(option)" :key="index"
                                     v-for="(option, index) in dropdown.options" class="dropdown-item">
                                    {{option.text}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="actionBtn">
                    <a href="/client/camp/add-agent">
                        <img src="/images/client/plus.png" alt="plus sign">ADD NEW AGENT
                    </a>
                </div>
            </div>
            <div class="campaign-team-list">
                <div v-for="(agent,index) in filteredAgents" :key="index"
                     class="campaign-team-row d-flex justify-content-between flex-wrap">
                    <div class="team-member">
                        <img src="/images/client/dummy.png" alt="member image">
                        <div class="team-member-info">
                            <div class="member-name">
                                {{agent.user.user_data.first_name}} {{agent.user.user_data.last_name}}
                            </div>
                            <div class="job-title">
                                {{agent.user.user_data.job_title}}
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between action-btns-bar">
                        <a class="chat-action-btn"><img src="/images/client/campaign_activity/send_message.png"
                                                        alt="chat icon"></a>
                        <a class="" href="javascript:void(0)" data-toggle="modal"
                           data-target="#remove-modal">
                            REMOVE
                        </a>
                        <a class="" href="javascript:void(0)" data-toggle="modal"
                           data-target="#backup-modal">
                            MAKE BACKUP
                        </a>
                    </div>
                </div>
                <div v-show="filteredAgents.length < 1" class="member-name">
                    There is no agents in this selection.
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade"
             id="remove-modal"
             tabindex="-1"
             role="dialog"
             aria-labelledby="remove-modal"
             aria-hidden="true">
            <div class="modal-dialog"
                 role="document">
                <div class="modal-content border-0"
                     style="margin-top: 30%;">
                    <div class="modal-body campaign-team-modal">
                        <div class="modal-question">
                            Are you sure you want to remove the agent ?
                        </div>
                        <div class="modal-answer">
                            Agent will be in the list of Past agents from this moment.
                        </div>
                        <div class="modal-btn-wrapper">
                            <div class="button-base white-button-a">
                                <a href="javascript:void(0)" data-dismiss="modal">CANCEL</a>
                            </div>
                            <div class="button-base blue-button-a">
                                <a href="javascript:void(0)" data-dismiss="modal">REMOVE THE AGENT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade"
             id="backup-modal"
             tabindex="-1"
             role="dialog"
             aria-labelledby="backup-modal"
             aria-hidden="true">
            <div class="modal-dialog"
                 role="document">
                <div class="modal-content border-0"
                     style="margin-top: 30%;">
                    <div class="modal-body campaign-team-modal">
                        <div class="modal-question">
                            Are you sure you want to make agent back up?
                        </div>
                        <div class="modal-answer">
                            Agent will be in the list of back up agents from this moment.
                        </div>
                        <div class="modal-btn-wrapper">
                            <div class="button-base white-button-a">
                                <a href="javascript:void(0)" data-dismiss="modal">CANCEL</a>
                            </div>
                            <div class="button-base blue-button-a">
                                <a href="javascript:void(0)" data-dismiss="modal">MAKE AGENT BACK UP</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['campaign'],
        data() {
            return {
                dropdown: {
                    options: [
                        {
                            'value': 1,
                            'text': 'Show active agents',
                        },
                        {
                            'value': 2,
                            'text': 'Show backup agents',
                        },
                        {
                            'value': 3,
                            'text': 'Show past agents',
                        }

                    ],
                    showDropdown: false
                },
                selectedOption: {
                    'value': 1,
                    'text': 'Show active agents',
                },
                agentStatusCode: {
                    1: 'ACTIVE',
                    2: 'BACKUP',
                    3: 'REMOVED',
                },
                filterValue: 1
            }
        },
        methods: {
            toggleDropdown() {
                this.dropdown.showDropdown = !this.dropdown.showDropdown
            },
            selectOption: function (option) {
                this.filterValue = option.value;
                this.selectedOption = option;
                this.toggleDropdown()
            },
        },
        computed: {
            filteredAgents() {
                const filterValue = this.filterValue;
                if (!filterValue) return this.campaign.agents;
                return this.campaign.agents.filter(agent => agent.status === filterValue);
            }
        },
        mounted() {
        }
    }
</script>

<style lang="scss">

    .action-btns-bar {
        flex-basis: 35%;

    }

    @media only screen and (max-width: 600px) {
        .action-btns-bar {
            height: 56px;
            padding-left: 20px;
            padding-right: 20px;
            flex-basis: 100%;

            .change-status-btn {
                width: auto;
            }
        }
    }

</style>