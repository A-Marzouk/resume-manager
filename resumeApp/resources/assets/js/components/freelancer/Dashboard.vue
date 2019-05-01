<template>
    <div>
        <nav class="navbar navbar-light fixed-top freelancer_navbar" id="sideNav">

            <a href="javascript:void(0)" class="js-menu-open menu-open" id="menu-open-icon">
                <img src="/resumeApp/public/images/client/Group.png" alt="menu">
            </a>

            <a href="javascript:void(0)" class="js-menu-close d-none">
                <img src="/resumeApp/public/images/client/close.png" alt="menu">
            </a>

            <a class="navbar-brand" href="/freelancer">
                <img src="/resumeApp/public/images/client/logo_123.png" alt="logout" style="width: 177px;">
            </a>
            <div class="form-inline my-2 my-lg-0">

            </div>
            <div class="form-inline my-2 my-lg-0 freelancerName">
                <div class="logoutButton">
                    <a href="#">
                        <img src="/resumeApp/public/images/client/log_out.png" alt="logout">
                    </a>
                </div>
                <div>
                    Ahmed R. Marzouk
                </div>
                <div class="freelancerAvatar">
                    <img src="/resumeApp/public/images/client/dummy.png" alt="logout">
                </div>
            </div>
        </nav>

        <div class="js-side-nav-container side-nav-container">
            <div class="js-side-nav side-nav">
                <a href="javascript:void(0)" class="js-menu-close menu-close" id="close-menu"></a>
                <div class="freelancerInfo-bar">
                    <div class="freelancerAvatar">
                        <img src="/resumeApp/public/images/client/dummy.png" alt="logout">
                    </div>
                    <div class="freelancerName">
                        Welcome,<br/>
                        Ahmed R. Marzouk
                    </div>
                </div>
                <div class="freelancer_dashboard_content">
                    <div class="dashboard-side-menu">
                        <router-link to="/" class="menu-block row" :class="{'active' : activeTab === 'campaign_manager'}" @click.native="selectTab('campaign_manager')">
                            <div class="imageContainer">
                                <img  :src="getMenuBlockIcon('campaign_manager')" alt="icon">
                            </div>
                            <div class="menu-block-name">
                                Campaign manager
                            </div>
                        </router-link>
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

        <div class="freelancer_dashboard_content">
            <div class="dashboard-side-menu hideOnTablet">
                <router-link to="/" class="menu-block row" :class="{'active' : activeTab === 'campaign_manager'}" @click.native="selectTab('campaign_manager')">
                    <div class="imageContainer">
                        <img  :src="getMenuBlockIcon('campaign_manager')" alt="icon">
                    </div>
                    <div class="menu-block-name">
                        Campaign manager
                    </div>
                </router-link>
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

        <!-- Modal -->
        <div id="view-invoice" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg modal-width">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header close-button" style="">

                        <button type="button" class="close" data-dismiss="modal">
                            <img src="/resumeApp/public/images/client/close.png"/>
                        </button>
                    </div>
                    <div class="invoice-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="invoice-style"> INVOICE </div>
                            <div class="modal-logo"></div>
                            <!-- <img src="/resumeApp/public/images/freelancer/logo_123.png" class="modal-logo"/> -->
                        </div>
                        <div class="invioce-top-text">
                            123 Workforce
                            <br/>
                            5th floor Portview House Thorn Castle st Dublin Ireland
                            <br/>
                            00442037000685
                            <br/>
                            info@123workforce.com
                        </div>

                        <div class="d-flex justify-content-between align-items-center invioce-title">
                            <div>№ 059-004-038</div>
                            <div> other services</div>
                            <div  class="d-flex justify-content-between align-items-center"> $400  <span class="invoice-outstand"> outstand</span> </div>
                            <div class="invoice-download"> <img src="/resumeApp/public/images/client/payments/export_invoice.png"/>   copy invioce link </div>
                        </div>

                        <div class="invoice-date">
                            Invoice issue date:
                            <br/> 26.03.2019
                        </div>

                        <div class="freelancer-info">
                            <div style=" font-weight: 500;">Freelancer info:</div>
                            <div>Name: Kim Coe</div>
                            <div>Company: Urban HQ LTD</div>
                            <div class="d-flex">
                                <div >
                                    Contact:
                                </div>
                                <div style="width:200px; margin-left: 3px;" >  +447711228204
                                    kim@urbanhqgroup.com </div></div>
                        </div>

                        <div class="freelancer-info invoice-info-freelancer">
                            <div class="d-flex align-items-center">
                                <img src="/resumeApp/public/images/client/payments/people_24px.png" class="invoice-info-icon"/>
                                <span class="invoice-info-title"> Name of agents: </span> Analiza Belleza, Cheska Ramos
                            </div>

                            <div class="d-flex align-items-center">
                                <img src="/resumeApp/public/images/client/payments/assignment_turned_in_24px.png" class="invoice-info-icon"/>
                                <span class="invoice-info-title"> Name of agents: </span>
                                Analiza Belleza, Cheska Ramos
                            </div>

                            <div class="d-flex align-items-center">
                                <img src="/resumeApp/public/images/client/payments/account_balance_wallet_24px.png" class="invoice-info-icon"/>
                                <span class="invoice-info-title"> Name of agents: </span>
                                Analiza Belleza, Cheska Ramos
                            </div>

                            <div class="d-flex align-items-center">
                                <img src="/resumeApp/public/images/client/payments/watch_later_24px.png" class="invoice-info-icon"/>
                                <span class="invoice-info-title"> Name of agents: </span>
                                Analiza Belleza, Cheska Ramos
                            </div>

                            <div class="d-flex align-items-center">
                                <img src="/resumeApp/public/images/client/payments/Subtract.png" class="invoice-info-icon"/>
                                <span class="invoice-info-title"> Name of agents: </span>
                                Analiza Belleza, Cheska Ramos
                            </div>

                            <div class="d-flex align-items-center">
                                <img src="/resumeApp/public/images/client/payments/account_balance_wallet_24px.png" class="invoice-info-icon"/>
                                <span class="invoice-info-title"> Name of agents: </span>
                                Analiza Belleza, Cheska Ramos
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