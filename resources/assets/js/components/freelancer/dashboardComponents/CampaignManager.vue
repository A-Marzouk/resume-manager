<template>
    <div>
        <div class="content-block-campaign">
            <div class="upper-bar">
                <div class="welcomeText">
                    Hello Mr. Marzouk!  You have 8 active campaigns.
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
                    <a class="secondary little-padding hideOnSm" href="#">FINISH SHIFT</a>
                    <a class="little-padding" href="#">
                        I AM AWAY
                    </a>
                </div>
            </div>
        </div>
        <div class="content-block-campaign-brief">
            <div class="upper-bar">
                <div class="campaignInfo">
                    <div class="title">
                        Name of the campaign
                    </div>
                </div>
                <div class="actionBtn">
                    <a href="#">
                        ACTIVE
                    </a>
                </div>
            </div>
            <div class="agent-logs-block">
                <div class="agentInfo">
                    <img src="/images/client/dummy.png" alt="">
                    <span class="userName">
                                Mohamed Salah
                            </span>
                </div>
                <div class="log">
                    <div class="log-time">
                        9.15 am
                    </div>
                    <div class="log-text">
                        <status-selector status="call-back"></status-selector>
                        <span class="log-text-content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        </span>
                        <img src="/images/icons/edit_icon.svg" alt="edit icon" />
                    </div>
                </div>
                <div class="log">
                    <div class="log-time">
                        9.15 am
                    </div>
                    <div class="log-text">
                        <status-selector status="call-back"></status-selector>
                        <span class="log-text-content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        </span>
                        <img src="/images/icons/edit_icon.svg" alt="edit icon" />
                    </div>
                </div>
                <div class="log">
                    <div class="log-time">
                        9.15 am
                    </div>
                    <div class="log-text">
                        <status-selector status="call-back"></status-selector>
                        <span class="log-text-content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        </span>
                        <img src="/images/icons/edit_icon.svg" alt="edit icon" />
                    </div>
                </div>
            </div>
            <div class="agent-logs-block">
                <div class="agentInfo">
                    <img src="/images/client/dummy.png" alt="">
                    <span class="userName">
                                Lionel Messi
                            </span>
                </div>
                <div class="log">
                    <div class="log-time">
                        9.15 am
                    </div>
                    <div class="log-text">
                        <status-selector status="call-back"></status-selector>
                        <span class="log-text-content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        </span>
                        <img src="/images/icons/edit_icon.svg" alt="edit icon" />
                    </div>
                </div>
                <div class="log">
                    <div class="log-time">
                        9.15 am
                    </div>
                    <div class="log-text">
                        <status-selector status="call-back"></status-selector>
                        <span class="log-text-content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        </span>
                        <img src="/images/icons/edit_icon.svg" alt="edit icon" />
                    </div>
                </div>
                <div class="log">
                    <div class="log-time">
                        9.15 am
                    </div>
                    <div class="log-text">
                        <status-selector status="call-back"></status-selector>
                        <span class="log-text-content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        </span>
                        <img src="/images/icons/edit_icon.svg" alt="edit icon" />
                    </div>
                </div>
            </div>

            <div class="campaign-brief-footer">
                <a href="/freelancer/campaign">
                    GO TO CAMPAIGN
                </a>
                <a class="add-entry" :class="{disabled: addEntry}" href="javascript:;" v-on:click="addEntry = true">
                    <img :src="`/images/icons/${(!addEntry) ? 'plus_icon_blue' : 'plus_icon_gray'}.svg`" alt="plus sign" /> ADD ENTRY
                </a>
            </div>
        </div>
        <div class="content-block-campaign-brief">
            <div class="upper-bar">
                <div class="campaignInfo">
                    <div class="title">
                        Name of the campaign
                    </div>
                </div>
                <div class="actionBtn live">
                    <a href="#">
                        LIVE
                    </a>
                </div>
            </div>
            <div class="agent-logs-block">
                <div class="agentInfo">
                    <img src="/images/client/dummy.png" alt="">
                    <span class="userName">
                                Mohamed Salah
                            </span>
                </div>
                <div class="log">
                    <div class="log-time">
                        9 am
                    </div>
                    <div class="log-text">
                        <status-selector status="call-back"></status-selector>
                        <span class="log-text-content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        </span>
                        <img src="/images/icons/edit_icon.svg" alt="edit icon" />
                    </div>
                </div>
                <div class="log">
                    <div class="log-time">
                        10 am
                    </div>
                    <div class="log-text">
                        <status-selector status="call-back"></status-selector>
                        <span class="log-text-content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        </span>
                        <img src="/images/icons/edit_icon.svg" alt="edit icon" />
                    </div>
                </div>
                <div class="log">
                    <div class="log-time">
                        11 am
                    </div>
                    <div class="log-text">
                        <status-selector status="call-back"></status-selector>
                        <span class="log-text-content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        </span>
                        <img src="/images/icons/edit_icon.svg" alt="edit icon" />
                    </div>
                </div>
                <div class="log">
                    <div class="log-time">
                        11 am
                    </div>
                    <div class="log-text">
                        <status-selector status="call-back"></status-selector>
                        <span class="log-text-content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        </span>
                        <img src="/images/icons/edit_icon.svg" alt="edit icon" />
                    </div>
                </div>
            </div>
            <div class="agent-logs-block">
                <div class="agentInfo">
                    <img src="/images/client/dummy.png" alt="">
                    <span class="userName">
                                Lionel Messi
                            </span>
                </div>
                <div class="log">
                    <div class="log-time">
                        9 am
                    </div>
                    <div class="log-text">
                        <status-selector status="call-back"></status-selector>
                        <span class="log-text-content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        </span>
                        <img src="/images/icons/edit_icon.svg" alt="edit icon" />
                    </div>
                </div>
                <div class="log">
                    <div class="log-time">
                        10 am
                    </div>
                    <div class="log-text">
                        <status-selector status="call-back"></status-selector>
                        <span class="log-text-content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        </span>
                        <img src="/images/icons/edit_icon.svg" alt="edit icon" />
                    </div>
                </div>
                <div class="log">
                    <div class="log-time">
                        11 am
                    </div>
                    <div class="log-text">
                        <status-selector status="call-back"></status-selector>
                        <span class="log-text-content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        </span>
                        <img src="/images/icons/edit_icon.svg" alt="edit icon" />
                    </div>
                </div>
            </div>

            <div class="campaign-brief-footer">
                <a href="/freelancer/campaign">
                    GO TO CAMPAIGN
                </a>
                <a class="add-entry" :class="{disabled: addEntry}" href="javascript:;" v-on:click="addEntry = true">
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
    import statusSelector from '../../status-selector.vue'

    export default {
        components: {
            addEntry,
            addDocument,
            'status-selector': statusSelector
        },
        data(){
          return{
              rootLink: this.$route.path,
              addEntry: false
          }
        },
        methods:{
            rootLinkTo (link) {
                return this.$route.path + '/' + link
            },
            clear () {
                this.addEntry = false
            }
        }
    }
</script>

<style scoped>

</style>