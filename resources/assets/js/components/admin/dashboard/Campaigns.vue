<template>
    <div>
        <div class="dashboard-box">
            <div class="campaign-info-bar mt-0 admin-bar">
                <div
                        class="campaign-info-tab firstTab"
                        :class="{active : activeTab === 'active-camps'}"
                        @click="activeTab = 'active-camps'">
                    ACTIVE CAMPAIGNS
                </div>
                <div
                        class="campaign-info-tab"
                        :class="{active : activeTab === 'paused-camps'}"
                        @click="activeTab = 'paused-camps'">
                    PAUSED CAMPAIGNS
                </div>
                <div
                        class="campaign-info-tab"
                        :class="{active : activeTab === 'finished-camps'}"
                        @click="activeTab = 'finished-camps'">
                    FINISHED CAMPAIGNS
                </div>
            </div>


            <div class="optionsBar">
                <div class="d-flex align-items-center">
                    <div class="searchBox mt-3 mt-md-0 mb-3 mb-xl-0">
                        <img src="/images/admin/magnifier-tool.svg" alt="">
                        <input type="text" placeholder="Search by name, e-mail" style="width: 246px;" v-model="searchValue">
                    </div>
                </div>
                <div class="d-flex align-items-center right no-decoration" style="padding-right: 24px;">
                    <div>
                        <a href="javascript:void(0)" class="sortingBox d-flex align-items-center"
                           @click="showSortSelection = true">
                            <img src="/images/admin/sorting.svg" alt="">
                            <div>
                                Sorting :
                                <span v-if="sort=== 'new_first' ">newest first</span>
                                <span v-if="sort=== 'old_first' ">oldest first</span>
                            </div>
                        </a>
                        <div class="select-popup" v-show="showSortSelection">
                            <ul class="select-popup-list">
                                <li @click="selectSort('new_first')">
                                    Newest first
                                </li>
                                <li @click="selectSort('old_first')">
                                    Oldest first
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div style="padding-left:24px; padding-right:24px;">
                <div class="table invoices-table applicants-table">
                    <table>
                        <thead>
                        <tr>
                            <th scope="col">CLIENT'S NAME</th>
                            <th scope="col">&nbsp;</th>
                            <th scope="col">HOURS PER WEEK</th>
                            <th scope="col">CAMPAIGN STATUS</th>
                            <th scope="col">ACTIONS</th>
                            <th scope="col">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                            <template v-for="(campaign,index) in OrderedCampaigns">
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div style="margin-top: -12px;">
                                                <div style="margin-bottom: 10px;">
                                                    {{campaign.client.agency}}
                                                </div>
                                                <div class="base-text name-text">
                                                    {{campaign.client.contact}}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td @click="openCampaign(campaign)">
                                        <div class="name-text">
                                            <img src="/images/admin/down_arrow.png" alt="down arrow" class="campaignArrow" :id="'campaignArrow_' + campaign.id"
                                                 >
                                        </div>
                                    </td>
                                    <td>
                                        <div class="invoice-service  base-text ">
                                            <span v-if="campaign.subscription"> {{campaign.subscription.hours_per_week}}</span>
                                            <span v-else>N/A</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="actionBtn">
                                            <a href="javascript:void(0)" style="width:116px; text-transform:uppercase ;" class="status"
                                               :class="{active: campaign.status == 1 , paused: campaign.status == 2, canceled: campaign.status ==  3}">
                                                {{campaignStatusCode[campaign.status]}}
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="no-decoration">
                                            <a href="javascript:void(0)" class="base-text primary-text">
                                                MANAGE
                                            </a>
                                        </div>
                                    </td>

                                    <td class="base-text primary-text" style="font-size: 24px;font-weight: normal;">
                                        +
                                    </td>
                                </tr>
                                <tr v-show="campaign.id == openedCampaign.id">
                                    <td colspan="4" style="border-top:0; padding-top:0">
                                        <div class="d-flex justify-content-between mt-4">
                                            <div class="base-text name-text" style="font-size:16px;">
                                                {{campaign.title}}
                                            </div>
                                            <div class="invoice-amount base-text" style="color: #7A828D;">
                                                GMT - 8
                                            </div>
                                        </div>
                                        <hr>
                                        <div>
                                            <div>
                                                <div class="base-text name-text">
                                                    {{campaign.agents.length}} agent<span v-if="campaign.agents.length > 1">s are</span> <span v-else> is</span>  currently working on the company
                                                </div>
                                                <div class="base-text" style="font-size:14px; margin-top:29px;" v-for="(agent,index) in campaign.agents" :key="index + 'Agent'">
                                                    <img :src="getImageSrc(agent.user.user_data.profile_picture)"
                                                         alt="user image"
                                                         style="width:26px; margin-right:10px; border-radius: 50%;">
                                                    {{agent.user.user_data.first_name}} {{agent.user.user_data.last_name}}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </template>

                        </tbody>
                    </table>
                </div>


                <div class="pagination-bar justify-content-between showFrom-600">
                    <div class="base-text">
                        Total : {{campaigns.length}}
                    </div>
                    <div>
                        <img src="/images/new_theme/arrow@2x.png" class="cursorPointer" alt="prev page" @click="toPrevPage" style="transform: rotate(180deg); margin-right:10px; width:7.5px; height:12px;">
                        <span v-for="i in lastPage" style="padding-right:10px;">
                                 <b v-if="i == currentPage">
                                     {{i}}
                                 </b>
                                 <span v-else style="font-size: 13px;" @click="toSpecificPage(i)" class="cursorPointer" >
                                     {{i}}
                                 </span>
                             </span>
                        <img src="/images/new_theme/arrow@2x.png" alt="next page" @click="toNextPage" style="width:7.5px; height:12px;" class="cursorPointer" >
                    </div>
                    <div class="no-decoration">
                        <a href="javascript:void(0)" class="paginationBox d-flex align-items-center justify-content-center" @click="showUsersNumSelection = true">
                            Users per page:&nbsp;
                            <span v-if="limit === 15 ">15</span>
                            <span v-if="limit === 25 ">25</span>
                            <span v-if="limit === 50 ">50</span>
                            <img src="/images/admin/down_arrow.png" alt="arrow down">
                        </a>
                        <div class="select-popup usersNumber" v-show="showUsersNumSelection">
                            <ul class="select-popup-list">
                                <li @click="selectUsersNum(15)">
                                    15 items
                                </li>
                                <li @click="selectUsersNum(25)">
                                    25 items
                                </li>
                                <li @click="selectUsersNum(50)">
                                    50 items
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="pagination-bar flex-column justify-content-center align-items-center hideFrom-600 w-100">
                    <div>
                        <img src="/images/new_theme/arrow@2x.png" alt="" style="transform: rotate(180deg); margin-right:10px; width:7.5px; height:12px;" class="cursorPointer" >
                        <span v-for="i in  lastPage" style="padding-right:10px; font-size: 12px; ">
                                 <b v-if="i == currentPage">
                                     {{i}}
                                 </b>
                                 <span v-else @click="toSpecificPage(i)" class="cursorPointer" >
                                     {{i}}
                                 </span>
                             </span>
                        <img src="/images/new_theme/arrow@2x.png" class="cursorPointer"  alt="" style="width:7.5px; height:12px;">
                    </div>
                    <div class="d-flex justify-content-between align-items-center w-100" style="padding-top: 24px;">
                        <div class="base-text" style="font-size: 12px;">
                            Total : {{campaigns.length}}
                        </div>
                        <div class="no-decoration">
                            <a href="javascript:void(0)" class="paginationBox d-flex align-items-center justify-content-center" @click="showUsersNumSelection = true">
                                Users per page :
                                <span v-if="limit === 15 ">15</span>
                                <span v-if="limit === 25 ">25</span>
                                <span v-if="limit === 50 ">50</span>
                                <img src="/images/admin/down_arrow.png" alt="arrow down">
                            </a>
                            <div class="select-popup usersNumber" v-show="showUsersNumSelection">
                                <ul class="select-popup-list">
                                    <li @click="selectUsersNum(15)">
                                        15 items
                                    </li>
                                    <li @click="selectUsersNum(25)">
                                        25 items
                                    </li>
                                    <li @click="selectUsersNum(50)">
                                        50 items
                                    </li>
                                </ul>
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
        data() {
            return {
                campaigns: [],

                campaignStatusCode: {
                    1: 'Active',
                    2: 'Paused',
                    3: 'Cancelled',
                },

                activeTab: 'active-camps',
                sort: 'new_first',
                filter: 'show_all',
                showSortSelection: false,
                showFilterSelection: false,
                showUsersNumSelection: false,

                searchValue: '',
                currentPage: 1,
                lastPage: '',
                limit: 10,
                openedCampaign:{}
            }
        },
        computed: {
            filteredCampaigns() {
                const search   = this.searchValue.toLowerCase().trim();
                let  activeTab = this.activeTab ;

                let filteredCamps = this.campaigns.filter( function (campaign) {
                    if(activeTab === 'active-camps'){
                        return campaign.status == 1;
                    }else if (activeTab === 'paused-camps') {
                        return campaign.status == 2;
                    }else if (activeTab === 'finished-camps'){
                        return campaign.status == 3;
                    }
                });

                if (!search){
                    return filteredCamps;
                }


                return  filteredCamps.filter( function (campaign) {
                    let fullName =  campaign.client.contact ? campaign.client.contact : '' ;
                    let campaignTitle = campaign.title ? campaign.title : '' ;
                    let email    = campaign.client.user.email ? campaign.client.user.email : '';

                    let SearchFilter = email.toLowerCase().trim().indexOf(search) > -1  || campaignTitle.toLowerCase().trim().indexOf(search) > -1  || fullName.toLowerCase().trim().indexOf(search) > -1 ;
                    return  (SearchFilter);
                });

            },
            OrderedCampaigns: function () {
                let sorting = 'desc';
                if(this.sort === 'old_first'){
                    sorting = 'asc';
                }
                return _.orderBy(this.filteredCampaigns, 'created_at' , sorting)
            }
        },
        methods: {
            getCampaigns() {
                axios.get('/admin/api/campaigns?limit=' + this.limit + '&&page=' + this.currentPage)
                    .then((response) => {
                        console.log(response.data);
                        this.campaigns = response.data.data;
                        this.lastPage = response.data.last_page;
                    })
                    .catch((error) => {

                    });

                //scroll to the box
                $('html, body').animate({
                    scrollTop: 0
                }, 1500);
            },

            getImageSrc(src) {
                if (!src) {
                    return '/images/placeholder.png';
                }

                if (src.charAt(0) !== '/' && src.charAt(0) !== 'h') {
                    return '/' + src;
                }

                return src;
            },
            openCampaign(campaign){
                if(this.openedCampaign.id === campaign.id){
                    this.openedCampaign = {};
                    $('#campaignArrow_' + campaign.id).css('transform', 'rotate(0)');
                }else{
                    this.openedCampaign = campaign ;
                    $('.campaignArrow').css('transform', 'rotate(0)');
                    $('#campaignArrow_' + campaign.id).css('transform', 'rotate(180deg)');
                }
            },

            selectUsersNum(number){
                this.limit = number ;
                this.currentPage = 1 ;
                this.showUsersNumSelection = false;
                this.getCampaigns();
            },

            selectSort(sort) {
                this.sort = sort;
                this.showSortSelection = false;
            },
            selectFilter(filter) {
                this.filter = filter;
                this.showFilterSelection = false;
            },

            toNextPage(){
                this.currentPage++;
                this.getCampaigns();
            },
            toPrevPage(){
                this.currentPage--;
                this.getCampaigns();

            },
            toSpecificPage(page){
                this.currentPage = page;
                this.getCampaigns();
            }


        },
        mounted() {
            this.getCampaigns();
        }
    }
</script>

<style scoped lang="scss">
    a.status {
        //btn
        background: #FFFFFF;
        box-sizing: border-box;
        border-radius: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 116px;
        height: 30px;
        // text
        font-family: Roboto;
        font-style: normal;
        font-weight: bold;
        font-size: 12px;
        line-height: 24px;
        text-align: center;
        letter-spacing: -0.1px;

        &.active {
            border: 2px solid #F2994A;
            color: #F2994A;
        }

        &.paused {
            border: 2px solid #9346DA;
            color: #9346DA;
        }

        &.canceled {
            border: 2px solid #F56F6F;
            color: #F56F6F;
        }

        &.live {
            color: #27AE60;
            border: 2px solid #27AE60;
        }
    }
</style>
