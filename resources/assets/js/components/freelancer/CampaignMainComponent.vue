<template>
    <div id="campaign_activity">
        <nav class="navbar navbar-light fixed-top dashboard_navbar">
            <div class="backBtn">
                <a href="/freelancer">
                    <img src="/images/client/arrow_back.png" alt="back-icon">
                </a>
                NAME OF THE CAMPAIGN
            </div>
        </nav>
        <div class="campaign-info-bar">
            <router-link  to="/freelancer/campaign" class="campaign-info-tab firstTab" :class="{active : activeTab === 'campaign'}" @click.native="activeTab = ''">
                ACTIVITY
            </router-link>
            <router-link to="/freelancer/campaign-team" class="campaign-info-tab" :class="{active : activeTab === 'campaign-team'}" @click.native="activeTab = 'campaign-team'">
                CAMPAIGN TEAM
            </router-link>
            <router-link to="/freelancer/campaign-brief" class="campaign-info-tab" :class="{active : activeTab === 'campaign-brief'}" @click.native="activeTab = 'campaign-brief'">
                CAMPAIGN BRIEF
            </router-link>
        </div>

        <keep-alive>
            <!-- here load different components depending on the route.-->
            <router-view></router-view>
        </keep-alive>


    </div>
</template>

<script>
    export default {
        data(){
            return{
                activeTab : '',
            }
        },
        methods:{
            setActiveTab(){
                this.activeTab = this.$route.path.split('/')[2]
            }
        },
        mounted(){
            this.setActiveTab();
        }
    }
</script>

<style scoped>

</style>