<template>
    <div>
        <nav class="navbar navbar-light fixed-top dashboard_navbar" id="sideNav">

            <a href="javascript:void(0)" class="js-menu-open menu-open" id="menu-open-icon">
                <img src="/images/client/Group.png" alt="menu">
            </a>

            <a href="javascript:void(0)" class="js-menu-close d-none">
                <img src="/images/client/close.png" alt="menu">
            </a>

            <a class="navbar-brand" href="/client">
                <img src="/images/client/logo_123.png" alt="logo" style="width: 177px;">
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
                    {{client.contact}}
                </div>
                <div class="avatar">
                    <img src="/images/client/dummy.png" alt="photo">
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
                            {{client.contact}}
                        </div>
                    </div>
                </div>
                <div class="dashboard_content">
                    <div class="dashboard-side-menu">
                        <router-link to="/client/dashboard/campaign-manager" class="menu-block row" :class="{'active' : activeTab === 'campaign-manager'}" @click.native="selectTab('campaign-manager')">
                            <div class="imageContainer">
                                <img  :src="getMenuBlockIcon('campaign-manager')" alt="icon">
                            </div>
                            <div class="menu-block-name">
                                Campaign manager
                            </div>
                        </router-link>
                        <div v-show="false" class="menu-block row" :class="{'active' : activeTab === 'chats'}" @click="selectTab('chats')">
                            <div class="imageContainer">
                                <img :src="getMenuBlockIcon('chats')" alt="icon">
                            </div>
                            <div class="menu-block-name">
                                Chats
                            </div>
                        </div>
                        <router-link to="/client/dashboard/payments" class="menu-block row" :class="{'active' : activeTab === 'payments'}" @click.native="selectTab('payments')">
                            <div class="imageContainer">
                                <img :src="getMenuBlockIcon('payments')" alt="icon">
                            </div>
                            <div class="menu-block-name">
                                Payments
                            </div>
                        </router-link>
                        <router-link to="/client/dashboard/agents-database"  class="menu-block row" :class="{'active' : activeTab === 'agents-database'}" @click.native="selectTab('agents-database')">
                            <div class="imageContainer">
                                <img :src="getMenuBlockIcon('agents-database')"  alt="icon">
                            </div>
                            <div class="menu-block-name">
                                Agents database
                            </div>
                        </router-link>
                        <router-link to="/client/dashboard/my-account" class="menu-block row" :class="{'active' : activeTab === 'my-account'}" @click.native="selectTab('my-account')">
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
                <router-link to="/client/dashboard/campaign-manager" class="menu-block row" :class="{'active' : activeTab === 'campaign-manager'}" @click.native="selectTab('campaign-manager')">
                    <div class="imageContainer">
                        <img  :src="getMenuBlockIcon('campaign-manager')" alt="icon">
                    </div>
                    <div class="menu-block-name">
                        Campaign manager
                    </div>
                </router-link>
                <div v-show="false" class="menu-block row" :class="{'active' : activeTab === 'chats'}" @click="selectTab('chats')">
                    <div class="imageContainer">
                        <img :src="getMenuBlockIcon('chats')" alt="icon">
                    </div>
                    <div class="menu-block-name">
                        Chats
                    </div>
                </div>
                <router-link to="/client/dashboard/payments" class="menu-block row" :class="{'active' : activeTab === 'payments'}" @click.native="selectTab('payments')">
                    <div class="imageContainer">
                        <img :src="getMenuBlockIcon('payments')" alt="icon">
                    </div>
                    <div class="menu-block-name">
                        Payments
                    </div>
                </router-link>
                <router-link   to="/client/dashboard/agents-database" class="menu-block row" :class="{'active' : activeTab === 'agents-database'}" @click.native="selectTab('agents-database')">
                    <div class="imageContainer">
                        <img :src="getMenuBlockIcon('agents-database')"  alt="icon">
                    </div>
                    <div class="menu-block-name">
                        Agents database
                    </div>
                </router-link>
                <router-link to="/client/dashboard/my-account" class="menu-block row" :class="{'active' : activeTab === 'my-account'}" @click.native="selectTab('my-account')">
                    <div class="imageContainer">
                        <img :src="getMenuBlockIcon('my-account')" alt="icon">
                    </div>
                    <div class="menu-block-name">
                        My account
                    </div>
                </router-link>
            </div>
            <div class="content-block">
                <div class="notificationBar" id="notificationBar" style="display:none; position: fixed;width: inherit;">
                    <div>
                        {{notificationMessage}}
                    </div>
                    <a href="javascript:void(0)" @click="hideNotification" class="no-decoration" style="color: white;">
                        x
                    </a>
                </div>

                <keep-alive>
                    <router-view  @showPositiveNotification="showNotification" @openInvoice="setSelectedInvoice"  @openFreelancerPortfolio="openPortfolioModal"></router-view>
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
                        <invoice-component :invoice="selectedInvoice" :modal="true"></invoice-component>
                    </div>

                </div>

            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="freelancer_portfolio" tabindex="-1" role="dialog" aria-hidden="true" >
            <div class="modal-dialog" role="document" style="width: 100%; height: 100%;padding: 0;">
                <div class="modal-content border-0" style="height: auto; background: none;min-height: 100%;">
                    <div class="modal-body">
                        <div v-if="selectedUserPortfolio" id="freelancerResumeLongV2" class="d-flex justify-content-center">
                            <freelancer-resume-long-v2 :freelancer="selectedUserPortfolio"></freelancer-resume-long-v2>
                        </div>
                        <div v-else>
                            Loading data..
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</template>
<script>
    import invoiceComponent from './dashboardComponents/payments/InvoiceComponent'

    export default {
        props:['client'],
        components: {
            'invoice-component': invoiceComponent
        },
        data(){
            return{
                activeTab: 'campaign-manager',
                notificationMessage: 'Successfully updated campaign ',
                selectedInvoice:{
                    client:{
                        user:{}
                    },
                    subscription:{
                        campaign:{},
                        start_date:''
                    }
                },
                selectedUserPortfolio:'',
            }
        },
        methods:{

            openPortfolioModal(user){
                this.selectedUserPortfolio = user ;
                let modalBtn = $('#openCardBtn');
                modalBtn.click();
            },

            selectTab(tabName){
                this.activeTab = tabName ;
            },
            getMenuBlockIcon(tabName){
                if(this.activeTab === tabName){
                   return '/images/client/menu_icons/active/'+ tabName + '.png';
                }
                return '/images/client/menu_icons/inactive/'+ tabName + '.png';
            },
            setActiveTab(){
                let tabs = ['campaign-manager', 'payments', 'my-account','agents-database'];
                
                this.activeTab = this.$route.path.replace('/client/dashboard/','');
                if(!tabs.includes(this.activeTab)){
                    this.activeTab = 'campaign-manager';
                }
            },
            showNotification(notificationMessage){
                this.notificationMessage = notificationMessage ;
                $('#notificationBar').fadeIn(600);
                setTimeout(()=>{
                    $('#notificationBar').fadeOut(1500);
                },4000);
            },
            setSelectedInvoice(invoice){
                this.selectedInvoice = invoice ;
            },
            hideNotification(){
                $('#notificationBar').css('display','none');
            }
        },
        mounted(){
            this.setActiveTab();
        }

    }
</script>
