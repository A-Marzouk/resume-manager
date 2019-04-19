<template>
    <div>
        <nav class="navbar navbar-light fixed-top client_navbar" id="sideNav">

            <a href="javascript:void(0)" class="js-menu-open menu-open" id="menu-open-icon">
                <img src="/resumeApp/public/images/client/Group.png" alt="menu">
            </a>

            <a href="javascript:void(0)" class="js-menu-close d-none">
                <img src="/resumeApp/public/images/client/close.png" alt="menu">
            </a>

            <a class="navbar-brand" href="/client">
                <img src="/resumeApp/public/images/client/123logo.png" alt="logout">
            </a>
            <div class="form-inline my-2 my-lg-0">

            </div>
            <div class="form-inline my-2 my-lg-0 clientName">
                <div class="logoutButton">
                    <a href="#">
                        <img src="/resumeApp/public/images/client/log_out.png" alt="logout">
                    </a>
                </div>
                <div>
                    Ahmed R. Marzouk
                </div>
                <div class="clientAvatar">
                    <img src="/resumeApp/public/images/client/dummy.png" alt="logout">
                </div>
            </div>
        </nav>

        <div class="js-side-nav-container side-nav-container">
            <div class="js-side-nav side-nav">
                <a href="javascript:void(0)" class="js-menu-close menu-close" id="close-menu"></a>
                <div class="clientInfo-bar">
                    <div class="clientAvatar">
                        <img src="/resumeApp/public/images/client/dummy.png" alt="logout">
                    </div>
                    <div class="clientName">
                        Welcome,<br/>
                        Ahmed R. Marzouk
                    </div>
                </div>
                <div class="client_dashboard_content">
                    <div class="dashboard-side-menu">
                        <router-link to="/" class="menu-block row" :class="{'active' : activeTab === 'campaign_manager'}" @click.native="selectTab('campaign_manager')">
                            <div class="imageContainer">
                                <img  :src="getMenuBlockIcon('campaign_manager')" alt="icon">
                            </div>
                            <div class="menu-block-name">
                                Campaign manager
                            </div>
                        </router-link>
                        <div class="menu-block row" :class="{'active' : activeTab === 'chats'}" @click="selectTab('chats')">
                            <div class="imageContainer">
                                <img :src="getMenuBlockIcon('chats')" alt="icon">
                            </div>
                            <div class="menu-block-name">
                                Chats
                            </div>
                        </div>
                        <router-link to="/payments" class="menu-block row" :class="{'active' : activeTab === 'payments'}" @click.native="selectTab('payments')">
                            <div class="imageContainer">
                                <img :src="getMenuBlockIcon('payments')" alt="icon">
                            </div>
                            <div class="menu-block-name">
                                Payments
                            </div>
                        </router-link>
                        <div class="menu-block row" :class="{'active' : activeTab === 'agents_database'}" @click="selectTab('agents_database')">
                            <div class="imageContainer">
                                <img :src="getMenuBlockIcon('agents_database')"  alt="icon">
                            </div>
                            <div class="menu-block-name">
                                Agents database
                            </div>
                        </div>
                        <router-link to="/my-account" class="menu-block row" :class="{'active' : activeTab === 'my-account'}" @click.native="selectTab('my-account')">
                            <div class="imageContainer">
                                <img :src="getMenuBlockIcon('my-account')" alt="icon">
                            </div>
                            <div class="menu-block-name">
                                My account
                            </div>
                        </router-link>
                    </div>
                </div>

                <div class="logoutBtn">
                    <a href="#">
                        LOG OUT
                    </a>
                </div>
            </div>
        </div>

        <div class="client_dashboard_content">
            <div class="dashboard-side-menu hideOnTablet">
                <router-link to="/" class="menu-block row" :class="{'active' : activeTab === 'campaign_manager'}" @click.native="selectTab('campaign_manager')">
                    <div class="imageContainer">
                        <img  :src="getMenuBlockIcon('campaign_manager')" alt="icon">
                    </div>
                    <div class="menu-block-name">
                        Campaign manager
                    </div>
                </router-link>
                <div class="menu-block row" :class="{'active' : activeTab === 'chats'}" @click="selectTab('chats')">
                    <div class="imageContainer">
                        <img :src="getMenuBlockIcon('chats')" alt="icon">
                    </div>
                    <div class="menu-block-name">
                        Chats
                    </div>
                </div>
                <router-link to="/payments" class="menu-block row" :class="{'active' : activeTab === 'payments'}" @click.native="selectTab('payments')">
                    <div class="imageContainer">
                        <img :src="getMenuBlockIcon('payments')" alt="icon">
                    </div>
                    <div class="menu-block-name">
                        Payments
                    </div>
                </router-link>
                <div class="menu-block row" :class="{'active' : activeTab === 'agents_database'}" @click="selectTab('agents_database')">
                    <div class="imageContainer">
                        <img :src="getMenuBlockIcon('agents_database')"  alt="icon">
                    </div>
                    <div class="menu-block-name">
                        Agents database
                    </div>
                </div>
                <router-link to="/my-account" class="menu-block row" :class="{'active' : activeTab === 'my-account'}" @click.native="selectTab('my-account')">
                    <div class="imageContainer">
                        <img :src="getMenuBlockIcon('my-account')" alt="icon">
                    </div>
                    <div class="menu-block-name">
                        My account
                    </div>
                </router-link>
            </div>
            <div class="content-block">
                <keep-alive>
                    <router-view></router-view>
                </keep-alive>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
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
            },
            setActiveTab(){
                this.activeTab = this.$route.path.replace('/','')
                if(this.activeTab === ''){
                    this.activeTab = 'campaign_manager';
                }
            }
        },
        mounted(){
            this.setActiveTab();
        }

    }
</script>