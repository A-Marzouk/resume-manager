<template>
    <div>
        <nav class="navbar navbar-light fixed-top dashboard_navbar" id="sideNav">

            <a href="javascript:void(0)" class="js-menu-open menu-open" id="menu-open-icon">
                <img src="/images/client/Group.png" alt="menu">
            </a>

            <a href="javascript:void(0)" class="js-menu-close d-none">
                <img src="/images/client/close.png" alt="menu">
            </a>

            <a class="navbar-brand pb-large" href="/client">
                <img src="/images/client/logo_123.png" alt="logout" style="width: 177px;">
            </a>
            <div class="form-inline my-2 my-lg-0">

            </div>
            <div class="form-inline my-2 my-lg-0 name">
                <div class="logoutButton">
                    <a href="javascript:void(0)" @click="logoutClient">
                        <img src="/images/client/log_out.png" alt="logout" style="">
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
                        <router-link to="/admin/campaign-manager" class="menu-block row" :class="{'active' : activeTab === 'campaign-manager'}" @click.native="selectTab('campaign-manager')">
                            <div class="imageContainer">
                                <img  :src="getMenuBlockIcon('campaign-manager')" alt="icon">
                            </div>
                            <div class="menu-block-name">
                                Campaigns
                            </div>
                        </router-link>
                        <router-link to="/admin/agents"  class="menu-block row" :class="{'active' : activeTab === 'agents'}" @click.native="selectTab('agents')">
                            <div class="imageContainer">
                                <img :src="getMenuBlockIcon('agents')" alt="icon">
                            </div>
                            <div class="menu-block-name">
                                agents
                            </div>
                        </router-link>
                        <router-link to="/admin/clients"  class="menu-block row" :class="{'active' : activeTab === 'clients'}" @click.native="selectTab('clients')">
                            <div class="imageContainer">
                                <img :src="getMenuBlockIcon('clients')"  alt="icon">
                            </div>
                            <div class="menu-block-name">
                                Clients
                            </div>
                        </router-link>
                        <router-link to="/admin/payments" class="menu-block row" :class="{'active' : activeTab === 'payments'}" @click.native="selectTab('payments')">
                            <div class="imageContainer">
                                <img :src="getMenuBlockIcon('payments')" alt="icon">
                            </div>
                            <div class="menu-block-name">
                                Payments
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

        <div class="dashboard_content">
            <div class="dashboard-side-menu hideOnTablet">
                <router-link to="/admin/campaign-manager" class="menu-block row" :class="{'active' : activeTab === 'campaign-manager'}" @click.native="selectTab('campaign-manager')">
                    <div class="imageContainer">
                        <img  :src="getMenuBlockIcon('campaign-manager')" alt="icon">
                    </div>
                    <div class="menu-block-name">
                        Campaigns
                    </div>
                </router-link>
                <router-link to="/admin/agents" class="menu-block row" :class="{'active' : activeTab === 'agents'}" @click.native="selectTab('agents')">
                    <div class="imageContainer">
                        <img :src="getMenuBlockIcon('agents')" alt="icon">
                    </div>
                    <div class="menu-block-name">
                        Agents
                    </div>
                </router-link>
                <router-link to="/admin/clients" class="menu-block row" :class="{'active' : activeTab === 'clients'}" @click.native="selectTab('clients')">
                    <div class="imageContainer">
                        <img :src="getMenuBlockIcon('clients')"  alt="icon">
                    </div>
                    <div class="menu-block-name">
                        Clients
                    </div>
                </router-link>

                <router-link to="/admin/payments" class="menu-block row" :class="{'active' : activeTab === 'payments'}" @click.native="selectTab('payments')">
                    <div class="imageContainer">
                        <img :src="getMenuBlockIcon('payments')" alt="icon">
                    </div>
                    <div class="menu-block-name">
                        Payments
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
                            <!-- <img src="/images/client/logo_123.png" class="modal-logo"/> -->
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
                            <div class="d-flex justify-content-between align-items-center"> $400  <span class="invoice-outstand"> outstand</span> </div>
                            <div class="invoice-download"> <img src="/images/client/payments/export_invoice.png"/>   copy invioce link </div>
                        </div>

                        <div class="invoice-date">
                            Invoice issue date:
                            <br/> 26.03.2019
                        </div>

                        <div class="client-info">
                            <div style=" font-weight: 500;">Client info:</div>
                            <div>Name: Kim Coe</div>
                            <div>Company: Urban HQ LTD</div>
                            <div class="d-flex">
                                <div >
                                    Contact:
                                </div>
                                <div style="width:200px; margin-left: 3px;" >  +447711228204
                                    kim@urbanhqgroup.com </div></div>
                        </div>

                        <div class="client-info invoice-info-client">
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

        <!-- modals -->

        <div class="modal fade centered-modal"
             id="disapprove-agent"
             tabindex="-1"
             role="dialog"
             aria-labelledby="remove-modal"
             aria-hidden="true">
            <div class="modal-dialog"
                 role="document">
                <div class="modal-content border-0">
                    <div class="modal-body campaign-team-modal">
                        <div v-show="disapproveStatus === 'process'">
                            <div class="modal-question">
                                Are you sure you want to disapprove this applicant ?
                            </div>
                            <div class="modal-answer radio-options">
                                <div class="col-12">
                                    <label class="form-check-label checkBoxContainer disapprove-text" @click="disapproveApplicant" id="defaultRadio_disapprove">
                                        <input class="form-check-input" type="radio" name="disapprove">
                                        <span class="checkmark make-circle"></span> disapprove
                                    </label>
                                </div>
                                <div class="col-12" style="margin-bottom: 26px;">
                                    <label class="form-check-label checkBoxContainer disapprove-text" @click="disapproveAndBlockApplicant">
                                        <input class="form-check-input" type="radio" name="disapprove">
                                        <span class="checkmark make-circle"></span> disapprove and block
                                    </label>
                                </div>
                            </div>
                            <div class="modal-note">
                           <span v-show="selection === 'disapprove'">
                                Disapproved agent will be able to apply again
                           </span>
                                <span v-show="selection === 'disapprove_and_block'">
                                Disapproved and blocked agent will not be able to apply again
                           </span>
                            </div>
                            <div class="modal-btn-wrapper">
                                <div class="button-base white-button-a">
                                    <a href="javascript:void(0)" data-dismiss="modal">CANCEL</a>
                                </div>
                                <div class="button-base blue-button-a">
                                    <a href="javascript:void(0)" @click="disapproveStatus = 'disapproved' ">DISAPPROVE AGENT</a>
                                </div>
                            </div>
                        </div>
                        <div v-show="disapproveStatus === 'disapproved' && selection === 'disapprove'">
                            <div class="modal-question">
                              The agent was disapproved
                            </div>
                            <div class="modal-answer">
                              Agent will be able to apply again
                            </div>
                            <div class="modal-btn-wrapper d-flex justify-content-end">
                                <div class="button-base blue-button-a">
                                    <a href="javascript:void(0)" data-dismiss="modal" style="width: 83px;">OK</a>
                                </div>
                            </div>
                        </div>
                        <div v-show="disapproveStatus === 'disapproved' && selection === 'disapprove_and_block'">
                            <div class="modal-question">
                                The agent was disapproved and blocked
                            </div>
                            <div class="modal-answer">
                                Agent will not be able to apply again
                            </div>
                            <div class="modal-btn-wrapper d-flex justify-content-end">
                                <div class="button-base blue-button-a">
                                    <a href="javascript:void(0)" data-dismiss="modal" style="width: 83px;">OK</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade centered-modal"
             id="add-agent"
             tabindex="-1"
             role="dialog"
             aria-labelledby="remove-modal"
             aria-hidden="true">
            <div class="modal-dialog"
                 role="document">
                <div class="modal-content border-0">
                    <div class="modal-body campaign-team-modal">
                        <div>
                            <div class="modal-question">
                               Which agent do you want to add ?
                            </div>
                            <div class="modal-answer radio-options">
                                <div class="col-12">
                                    <label class="form-check-label checkBoxContainer disapprove-text" id="defaultRadio">
                                        <input class="form-check-input" type="radio" name="disapprove">
                                        <span class="checkmark make-circle"></span> business support
                                    </label>
                                </div>
                                <div class="col-12">
                                    <label class="form-check-label checkBoxContainer disapprove-text">
                                        <input class="form-check-input" type="radio" name="disapprove">
                                        <span class="checkmark make-circle">
                                        </span> designer
                                    </label>
                                </div>
                                <div class="col-12">
                                    <label class="form-check-label checkBoxContainer disapprove-text">
                                        <input class="form-check-input" type="radio" name="disapprove">
                                        <span class="checkmark make-circle"></span> developer
                                    </label>
                                </div>
                            </div>

                            <div class="modal-btn-wrapper flex-row-mobile">
                                <div class="button-base white-button-a">
                                    <a href="javascript:void(0)" data-dismiss="modal">CANCEL</a>
                                </div>
                                <div class="button-base blue-button-a">
                                    <a href="/admin/register-agent" style="width:106px;">Continue</a>
                                </div>
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
                selection: 'disapprove',
                disapproveStatus: 'process',
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
                let tabs = ['campaign-manager', 'payments', 'agents' , 'clients'];

                this.activeTab = this.$route.path.replace('/admin/','');
                if(!tabs.includes(this.activeTab)){
                    this.activeTab = 'campaign-manager';
                }
            },
            logoutClient(){
                axios.post('/client/logout').then( (response)=>{
                    if(response.data.status === 'success'){
                        // redirect to dashboard
                        window.location.href = '/' ;
                    }
                });
            },

            disapproveApplicant(){
                this.selection = 'disapprove';
            },

            disapproveAndBlockApplicant(){
                this.selection = 'disapprove_and_block';
            }

        },
        mounted(){
            this.setActiveTab();
        }

    }
</script>