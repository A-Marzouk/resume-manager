<template>
    <div id="campaign_activity">
        <div class="fixed-top d-flex flex-column">
            <div class="backBar">
                <div class="backBtn" style="padding-left: 15px;">
                    <a href="/client/dashboard"  style="margin: 0;">
                        <img src="/images/client/arrow_back.png" alt="back-icon">
                    </a>
                    <span style="margin-left: 8px;">{{campaign.title}}</span>
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

        <div class="notificationBar" id="notificationBar" style="display:none ; position: fixed;width: inherit; margin-top:10px;">
            <div>
                {{notificationMessage}}
            </div>
            <a href="javascript:void(0)" @click="hideNotification" class="no-decoration" style="color: white;">
                x
            </a>
        </div>

        <keep-alive>
            <!-- here load different components depending on the route.-->
            <router-view style="margin-top: 30px;" v-bind="myProps" @showPositiveNotification="showNotification" @showNegativeNotification="showNegativeNotification"></router-view>
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
                currentCampaign:{},
                notificationMessage:'Successfully updated agent',
            }
        },
        methods: {
            setActiveTab() {
                this.activeTab = this.$route.path.replace('/', '');
            },
            showNotification(notificationMessage){
                $('.notificationBar').css('background','#FFBA69') ;
                this.notificationMessage = notificationMessage ;
                $('#notificationBar').fadeIn(600);
                setTimeout(()=>{
                    $('#notificationBar').fadeOut(1500);
                },4000);
            },

            showNegativeNotification(notificationMessage){
                this.notificationMessage = notificationMessage ;
                $('.notificationBar').css('background','red') ;
                $('#notificationBar').fadeIn(600);
                setTimeout(()=>{
                    $('#notificationBar').fadeOut(1500);
                },4000);
            },
            hideNotification(){
                $('#notificationBar').css('display','none');
            }
        },
        mounted() {
            this.setActiveTab();
        }
    }
</script>
<style lang="scss">
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

    .notificationBar{
        z-index:2;
        margin-left:auto ;
    }

</style>
