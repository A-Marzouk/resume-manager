<template>
    <div>
        <nav class="navbar navbar-light fixed-top dashboard_navbar" id="sideNav">

            <a href="javascript:void(0)" class="js-menu-open menu-open" id="menu-open-icon">
                <img src="/images/client/Group.png" alt="menu">
            </a>

            <a href="javascript:void(0)" class="js-menu-close d-none">
                <img src="/images/client/close.png" alt="menu">
            </a>

            <a class="navbar-brand" href="/freelancer/dashboard">
                <img src="/images/client/logo_123.png" alt="logout" style="width: 177px;">
            </a>
            <div class="form-inline my-2 my-lg-0">

            </div>
            <div class="form-inline my-2 my-lg-0 name">
                <div class="logoutButton">
                    <a href="/logout">
                        <img src="/images/client/log_out.png" alt="logout">
                    </a>
                </div>
                <div>
                   {{agent.user.user_data.first_name}} {{agent.user.user_data.last_name}}
                </div>
                <div class="avatar">
                    <img src="/images/client/dummy.png" alt="logout">
                </div>
            </div>
        </nav>

        <div class="js-side-nav-container side-nav-container">
            <div class="js-side-nav side-nav">
                <a href="javascript:void(0)" class="js-menu-close menu-close" id="close-menu"></a>
                <div class="welcome-box d-flex justify-content-start align-items-center">
                    <img src="/images/client/dummy.png" alt="profile">
                    <div class="d-flex flex-column">
                        <div>
                            Welcome,
                        </div>
                        <div style="font-weight: 500">
                            Ahmed R. Marzouk
                        </div>
                    </div>
                </div>

                <div class="dashboard_content">
                    <div class="dashboard-side-menu">
                        <router-link :to="'/' + rootURL" class="menu-block row"
                                     :class="{'active' : activeTab === 'campaign-manager'}"
                                     @click.native="selectTab('campaign-manager')">
                            <div class="imageContainer">
                                <img :src="getMenuBlockIcon('campaign-manager')" alt="icon">
                            </div>
                            <div class="menu-block-name">
                                Campaign manager
                            </div>
                        </router-link>

                        <router-link v-if="rootURL !== '/freelancer'" :to="rootLinkTo('payments')" class="menu-block row" :class="{'active' : activeTab === 'payments'}" @click.native="selectTab('payments')">
                            <div class="imageContainer">
                                <img :src="getMenuBlockIcon('payments')" alt="icon">
                            </div>
                            <div class="menu-block-name">
                                Payments
                            </div>
                        </router-link>

                        <!-- <div v-if="rootURL !== '/freelancer'" class="menu-block row" :class="{'active' : activeTab === 'chats'}" @click="selectTab('chats')">
                            <div class="imageContainer">
                                <img :src="getMenuBlockIcon('chats')" alt="icon">
                            </div>
                            <div class="menu-block-name">
                                Chats
                            </div>
                        </div>

                        <div v-if="rootURL !== '/freelancer'" class="menu-block row" :class="{'active' : activeTab === 'agents_database'}" @click="selectTab('agents_database')">
                            <div class="imageContainer">
                                <img :src="getMenuBlockIcon('agents_database')"  alt="icon">
                            </div>
                            <div class="menu-block-name">
                                Agents database
                            </div>
                        </div> -->
                        <router-link :to="rootLinkTo('my-account')" class="menu-block row"
                                     :class="{'active' : activeTab === 'my-account'}"
                                     @click.native="selectTab('my-account')">
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
                    <a href="/logout">
                        LOG OUT
                    </a>
                </div>
            </div>
        </div>

        <div class="dashboard_content">
            <div class="dashboard-side-menu hideOnTablet">
                <router-link :to="'/' + rootURL" class="menu-block row"
                             :class="{'active' : activeTab === 'campaign-manager'}"
                             @click.native="selectTab('campaign-manager')">
                    <div class="imageContainer">
                        <img :src="getMenuBlockIcon('campaign-manager')" alt="icon">
                    </div>
                    <div class="menu-block-name">
                        Campaign manager
                    </div>
                </router-link>

                <router-link v-if="rootURL !== '/freelancer'" :to="rootLinkTo('payments')" class="menu-block row" :class="{'active' : activeTab === 'payments'}" @click.native="selectTab('payments')">
                    <div class="imageContainer">
                        <img :src="getMenuBlockIcon('payments')" alt="icon">
                    </div>
                    <div class="menu-block-name">
                        Payments
                    </div>
                </router-link>

                <router-link :to="rootLinkTo('my-account')" class="menu-block row"
                             :class="{'active' : activeTab === 'my-account'}" @click.native="selectTab('my-account')">
                    <div class="imageContainer">
                        <img :src="getMenuBlockIcon('my-account')" alt="icon">
                    </div>
                    <div class="menu-block-name">
                        My account
                    </div>
                </router-link>
            </div>
            <div class="content-block">
                <div class="notificationBar" id="notificationBar" style="display:none; position: fixed;width: inherit; z-index:2;">
                    <div>
                        {{notificationMessage}}
                    </div>
                    <a href="javascript:void(0)" @click="hideNotification" class="no-decoration" style="color: white;">
                        x
                    </a>
                </div>

                <keep-alive>
                    <router-view :agent ="agent" @showPositiveNotification="showNotification" @openInvoice="setSelectedInvoice"></router-view>
                </keep-alive>
            </div>
        </div>

        <!-- Modal -->
        <div id="view-invoice" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg modal-width">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header close-button" style="">

                        <button type="button" class="close" data-dismiss="modal">
                            <img src="/images/client/close.png"/>
                        </button>
                    </div>
                    <div class="invoice-body">
                        <agent-invoice-component :invoice="selectedInvoice" :modal="true"></agent-invoice-component>
                    </div>

                </div>

            </div>
        </div>
    </div>
</template>
<script>

    import agentInvoiceComponent from './dashboardComponents/payments/InvoiceComponent'

    export default {
        props:['agent'],
        components: {
            'agent-invoice-component': agentInvoiceComponent
        },
        data() {
            return {
                activeTab: 'campaign-manager',
                rootURL: this.$route.path.split('/')[1] + '/' + this.$route.path.split('/')[2],
                notificationMessage : '',
                selectedInvoice:{
                    agent:{
                        user:{
                            user_data:{}
                        }
                    },
                    subscription:{
                        campaign:{},
                        start_date:''
                    }
                }
            }
        },
        methods: {
            selectTab(tabName) {
                this.activeTab = tabName;
            },
            getMenuBlockIcon(tabName) {
                if (this.activeTab === tabName) {
                    return '/images/client/menu_icons/active/' + tabName + '.png';
                }
                return '/images/client/menu_icons/inactive/' + tabName + '.png';
            },
            setActiveTab() {
                this.activeTab = this.$route.path.split('/')[3]
                if (this.activeTab === undefined) {
                    this.activeTab = 'campaign-manager';
                }
            },
            rootLinkTo(link) {
                return '/' + this.rootURL + '/' + link
            },
            showNotification(notificationMessage){
                this.notificationMessage = notificationMessage ;
                $('#notificationBar').fadeIn(600);
                setTimeout(()=>{
                    $('#notificationBar').fadeOut(1500);
                },4000);
            },
            hideNotification(){
                $('#notificationBar').css('display','none');
            },
            setSelectedInvoice(invoice){
                this.selectedInvoice = invoice ;
            },
        },
        mounted() {
            this.setActiveTab();
        }

    }
</script>
