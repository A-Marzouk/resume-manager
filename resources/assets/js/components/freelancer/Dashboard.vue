<template>
    <div>
        <nav class="navbar navbar-light fixed-top dashboard_navbar" id="sideNav">

            <a href="javascript:void(0)" class="js-menu-open menu-open" id="menu-open-icon">
                <img src="/images/client/Group.png" alt="menu">
            </a>

            <a href="javascript:void(0)" class="js-menu-close d-none">
                <img src="/images/client/close.png" alt="menu">
            </a>

            <a class="navbar-brand" :href="rootURL">
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
                    Ahmed R. Marzouk
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
                        <router-link :to="'/' + rootURL" class="menu-block row" :class="{'active' : activeTab === 'campaign-manager'}" @click.native="selectTab('campaign-manager')">
                            <div class="imageContainer">
                                <img  :src="getMenuBlockIcon('campaign-manager')" alt="icon">
                            </div>
                            <div class="menu-block-name">
                                Campaign manager
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
                        <router-link v-if="rootURL !== '/freelancer'" :to="rootLinkTo('payments')" class="menu-block row" :class="{'active' : activeTab === 'payments'}" @click.native="selectTab('payments')">
                            <div class="imageContainer">
                                <img :src="getMenuBlockIcon('payments')" alt="icon">
                            </div>
                            <div class="menu-block-name">
                                Payments
                            </div>
                        </router-link>
                        <div v-if="rootURL !== '/freelancer'" class="menu-block row" :class="{'active' : activeTab === 'agents_database'}" @click="selectTab('agents_database')">
                            <div class="imageContainer">
                                <img :src="getMenuBlockIcon('agents_database')"  alt="icon">
                            </div>
                            <div class="menu-block-name">
                                Agents database
                            </div>
                        </div> -->
                        <router-link :to="rootLinkTo('my-account')" class="menu-block row" :class="{'active' : activeTab === 'my-account'}" @click.native="selectTab('my-account')">
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
                <router-link :to="'/' + rootURL" class="menu-block row" :class="{'active' : activeTab === 'campaign-manager'}" @click.native="selectTab('campaign-manager')">
                    <div class="imageContainer">
                        <img  :src="getMenuBlockIcon('campaign-manager')" alt="icon">
                    </div>
                    <div class="menu-block-name">
                        Campaign manager
                    </div>
                </router-link>
                <router-link :to="rootLinkTo('my-account')" class="menu-block row" :class="{'active' : activeTab === 'my-account'}" @click.native="selectTab('my-account')">
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
                            <img src="/images/client/close.png"/>
                        </button>
                    </div>
                    <div class="invoice-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="invoice-style"> INVOICE </div>
                            <div class="modal-logo"></div>
                            <!-- <img src="/images/freelancer/logo_123.png" class="modal-logo"/> -->
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
                            <div class="invoice-download"> <img src="/images/client/payments/export_invoice.png"/>   copy invioce link </div>
                        </div>

                        <div class="invoice-date">
                            Invoice issue date:
                            <br/> 26.03.2019
                        </div>

                        <div class="info">
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
                                <img src="/images/client/payments/people_24px.png" class="invoice-info-icon"/>
                                <span class="invoice-info-title"> Name of agents: </span> Analiza Belleza, Cheska Ramos
                            </div>

                            <div class="d-flex align-items-center">
                                <img src="/images/client/payments/assignment_turned_in_24px.png" class="invoice-info-icon"/>
                                <span class="invoice-info-title"> Name of agents: </span>
                                Analiza Belleza, Cheska Ramos
                            </div>

                            <div class="d-flex align-items-center">
                                <img src="/images/client/payments/account_balance_wallet_24px.png" class="invoice-info-icon"/>
                                <span class="invoice-info-title"> Name of agents: </span>
                                Analiza Belleza, Cheska Ramos
                            </div>

                            <div class="d-flex align-items-center">
                                <img src="/images/client/payments/watch_later_24px.png" class="invoice-info-icon"/>
                                <span class="invoice-info-title"> Name of agents: </span>
                                Analiza Belleza, Cheska Ramos
                            </div>

                            <div class="d-flex align-items-center">
                                <img src="/images/client/payments/Subtract.png" class="invoice-info-icon"/>
                                <span class="invoice-info-title"> Name of agents: </span>
                                Analiza Belleza, Cheska Ramos
                            </div>

                            <div class="d-flex align-items-center">
                                <img src="/images/client/payments/account_balance_wallet_24px.png" class="invoice-info-icon"/>
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
                activeTab: 'campaign-manager',
                rootURL: this.$route.path.split('/')[1] + '/' + this.$route.path.split('/')[2]
            }
        },
        methods:{
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
                this.activeTab = this.$route.path.split('/')[3]
                if (this.activeTab === undefined){
                    this.activeTab = 'campaign-manager';
                }
            },
            rootLinkTo (link) {
                return '/' + this.rootURL + '/' + link
            }
        },
        mounted(){
            this.setActiveTab();
        }

    }
</script>