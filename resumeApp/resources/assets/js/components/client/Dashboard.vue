<template>
    <div>
        <div class="client_dashboard_content">
            <div>
                <div class="menu-block row" :class="{'active' : activeTab === 'campaign_manager'}" @click="selectTab('campaign_manager')">
                    <div class="imageContainer">
                        <img  :src="getMenuBlockIcon('campaign_manager')" alt="icon">
                    </div>
                    <div class="menu-block-name">
                        Campaign manager
                    </div>
                </div>
                <div class="menu-block row" :class="{'active' : activeTab === 'chats'}" @click="selectTab('chats')">
                    <div class="imageContainer">
                        <img :src="getMenuBlockIcon('chats')" alt="icon">
                    </div>
                    <div class="menu-block-name">
                        Chats
                    </div>
                </div>
                <div class="menu-block row" :class="{'active' : activeTab === 'payments'}" @click="selectTab('payments')">
                    <div class="imageContainer">
                        <img :src="getMenuBlockIcon('payments')" alt="icon">
                    </div>
                    <div class="menu-block-name">
                        Payments
                    </div>
                </div>
                <div class="menu-block row" :class="{'active' : activeTab === 'agents_database'}" @click="selectTab('agents_database')">
                    <div class="imageContainer">
                        <img :src="getMenuBlockIcon('agents_database')"  alt="icon">
                    </div>
                    <div class="menu-block-name">
                        Agents database
                    </div>
                </div>
                <div class="menu-block row" :class="{'active' : activeTab === 'my_account'}" @click="selectTab('my_account')">
                    <div class="imageContainer">
                        <img :src="getMenuBlockIcon('my_account')" alt="icon">
                    </div>
                    <div class="menu-block-name">
                        My account
                    </div>
                </div>
            </div>
            <div class="content-block">
                <div class="content-block-campaign">
                    <div class="upper-bar">
                        <div class="welcomeText">
                            Hello Mr. Marzouk!  You have 8 active campaigns.
                        </div>
                        <div class="actionText">
                            GO TO ARCHIVE OF CAMPAIGNS
                        </div>
                    </div>
                    <div class="bottom-bar">
                        <div class="title">
                            MY ACTIVE CAMPAIGNS
                        </div>
                        <div class="actionBtn">
                            <a href="#">
                                <img src="/resumeApp/public/images/client/plus.png" alt="plus sign">CREATE NEW CAMPAIGN
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
                            <div class="info">
                                2 agents currently working on the campaign
                            </div>
                        </div>
                        <div class="actionBtn">
                            <a href="#">
                                ACTIVE
                            </a>
                            <div class="menu-img">
                                <img src="/resumeApp/public/images/client/more_vert_24px.png" alt="menu">
                            </div>
                        </div>
                    </div>
                    <div class="agent-logs-block">
                        <div class="agentInfo">
                            <img src="/resumeApp/public/images/client/dummy.png" alt="">
                            <span class="userName">
                                Mohamed Salah
                            </span>
                        </div>
                        <div class="log">
                            <div class="log-time">
                                9 am - 10 am
                            </div>
                            <div class="log-text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                            </div>
                        </div>
                        <div class="log">
                            <div class="log-time">
                                10 am - 11 am
                            </div>
                            <div class="log-text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                            </div>
                        </div>
                        <div class="log">
                            <div class="log-time">
                                11 am - 12 am
                            </div>
                            <div class="log-text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                            </div>
                        </div>
                        <div class="showMoreBtn">
                            <a href="#">SHOW MORE</a>
                        </div>
                    </div>
                    <div class="agent-logs-block">
                        <div class="agentInfo">
                            <img src="/resumeApp/public/images/client/dummy.png" alt="">
                            <span class="userName">
                                Lionel Messi
                            </span>
                        </div>
                        <div class="log">
                            <div class="log-time">
                                9 am - 10 am
                            </div>
                            <div class="log-text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                            </div>
                        </div>
                        <div class="log">
                            <div class="log-time">
                                10 am - 11 am
                            </div>
                            <div class="log-text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                            </div>
                        </div>
                        <div class="log">
                            <div class="log-time">
                                11 am - 12 am
                            </div>
                            <div class="log-text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                            </div>
                        </div>
                        <div class="showMoreBtn">
                            <a href="#">SHOW MORE</a>
                        </div>
                    </div>

                    <div class="campaign-brief-footer">
                        <a href="#">
                            GO TO CAMPAIGN
                        </a>
                    </div>
                </div>
                <div class="content-block-campaign-brief">
                    <div class="upper-bar">
                        <div class="campaignInfo">
                            <div class="title">
                                Name of the campaign
                            </div>
                            <div class="info">
                                2 agents currently working on the campaign
                            </div>
                        </div>
                        <div class="actionBtn live">
                            <a href="#">
                                LIVE
                            </a>
                            <div class="menu-img">
                                <img src="/resumeApp/public/images/client/more_vert_24px.png" alt="menu">
                            </div>
                        </div>
                    </div>
                    <div class="agent-logs-block">
                        <div class="agentInfo">
                            <img src="/resumeApp/public/images/client/dummy.png" alt="">
                            <span class="userName">
                                Mohamed Salah
                            </span>
                        </div>
                        <div class="log">
                            <div class="log-time">
                                9 am - 10 am
                            </div>
                            <div class="log-text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                            </div>
                        </div>
                        <div class="log">
                            <div class="log-time">
                                10 am - 11 am
                            </div>
                            <div class="log-text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                            </div>
                        </div>
                        <div class="log">
                            <div class="log-time">
                                11 am - 12 am
                            </div>
                            <div class="log-text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                            </div>
                        </div>
                        <div class="log">
                            <div class="log-time">
                                11 am - 12 am
                            </div>
                            <div class="log-text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                            </div>
                        </div>
                        <div class="showMoreBtn">
                            <a href="#">SHOW LESS</a>
                        </div>
                    </div>
                    <div class="agent-logs-block">
                        <div class="agentInfo">
                            <img src="/resumeApp/public/images/client/dummy.png" alt="">
                            <span class="userName">
                                Lionel Messi
                            </span>
                        </div>
                        <div class="log">
                            <div class="log-time">
                                9 am - 10 am
                            </div>
                            <div class="log-text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                            </div>
                        </div>
                        <div class="log">
                            <div class="log-time">
                                10 am - 11 am
                            </div>
                            <div class="log-text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                            </div>
                        </div>
                        <div class="log">
                            <div class="log-time">
                                11 am - 12 am
                            </div>
                            <div class="log-text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                            </div>
                        </div>
                        <div class="showMoreBtn">
                            <a href="#">SHOW MORE</a>
                        </div>
                    </div>

                    <div class="campaign-brief-footer">
                        <a href="#">
                            GO TO CAMPAIGN
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props:['client'],
        data(){
            return{
                activeTab: 'campaign_manager',
            }
        },
        methods:{
            selectTab(tabName){
                this.activeTab = tabName ;
            },
            getMenuBlockIcon(tabName){
                if(this.activeTab === tabName){
                   return '/resumeApp/public/images/client/menu_icons/active/'+ tabName + '.png';
                }
                return '/resumeApp/public/images/client/menu_icons/inactive/'+ tabName + '.png';
            }
        },
        mounted(){

        }

    }
</script>