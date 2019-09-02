<template>
    <div id="campaign_activity">
        <div class="fixed-top d-flex flex-column">
            <div class="backBar">
                <div class="backBtn">
                    <a href="/client/dashboard">
                        <img src="/images/client/arrow_back.png" alt="back-icon">
                    </a>
                    {{campaign.title}}
                </div>
            </div>
            <div class="campaign-info-bar">
                <router-link to="/"
                             class="campaign-info-tab firstTab"
                             :class="{active : activeTab === ''}"
                             @click.native="activeTab = ''">
                    ACTIVITY
                </router-link>
                <router-link to="/campaign-team"
                             class="campaign-info-tab"
                             :class="{active : activeTab === 'campaign-team'}"
                             @click.native="activeTab = 'campaign-team'">
                    CAMPAIGN TEAM
                </router-link>
                <router-link to="/campaign-brief"
                             class="campaign-info-tab"
                             :class="{active : activeTab === 'campaign-brief'}"
                             @click.native="activeTab = 'campaign-brief'">
                    CAMPAIGN BRIEF
                </router-link>
            </div>
        </div>
        <keep-alive>
            <!-- here load different components depending on the route.-->
            <router-view style="margin-top: 30px;" v-bind="myProps"></router-view>
        </keep-alive>
    </div>
</template>
<script>
    export default {
        props:['campaign'],
        computed: {
            myProps() {
                if (this.campaign !== undefined) { return { campaign: this.campaign }}
            }
        },
        data() {
            return {
                activeTab: '',
                currentCampaign:{}
            }
        },
        methods: {
            setActiveTab() {
                this.activeTab = this.$route.path.replace('/', '');
            }
        },
        mounted() {
            this.setActiveTab();
        }
    }
</script>
<style lang="scss" scoped>
    .campaign-info-bar {
        margin-top: 0;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }

    .backBar{
        height: 56px;
        display: flex;
        align-items: center;
        background: white;
    }
</style>
