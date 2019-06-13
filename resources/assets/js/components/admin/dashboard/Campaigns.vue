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
                        <input type="text" placeholder="Search by name, e-mail" style="width: 246px;">
                    </div>
                </div>
                <div class="d-flex align-items-center right no-decoration" style="padding-right: 24px;">
                    <div>
                        <a href="javascript:void(0)" class="filterBox d-flex align-items-center" @click="showFilterSelection = true">
                            <img src="/images/admin/filter.svg" alt="">
                            <div>
                                Filter :
                                <span v-if="filter=== 'show_all' ">All applications</span>
                                <span v-if="filter=== 'show_new' ">New applications</span>
                                <span v-if="filter=== 'show_in_process' ">In process</span>
                            </div>
                        </a>
                        <div class="select-popup" v-show="showFilterSelection">
                            <ul class="select-popup-list">
                                <li @click="selectFilter('show_all')">
                                    Show all applications
                                </li>
                                <li @click="selectFilter('show_new')">
                                    Show new applications
                                </li>
                                <li @click="selectFilter('show_in_process')">
                                    Show applications in process
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <a href="javascript:void(0)" class="sortingBox d-flex align-items-center"  @click="showSortSelection = true">
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
                            <th scope="col">HOURS PER WEEK</th>
                            <th scope="col">CAMPAIGN STATUS</th>
                            <th scope="col">ACTIONS</th>
                            <th scope="col">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div style="margin-top: -12px;">
                                            <div style="margin-bottom: 10px;">
                                                Company name
                                            </div>
                                            <div class="base-text name-text">
                                                Edward Smith-Lorence
                                            </div>
                                        </div>
                                        <div class="name-text">
                                            <img src="/images/admin/down_arrow.png" alt="down arrow" style="transform: rotate(180deg);">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-service  base-text ">
                                        24
                                    </div>
                                </td>
                                <td>
                                    <div class="payment-btn new">
                                        <a href="#" style="width:116px;">
                                            ACTIVE
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="no-decoration">
                                        <a href="/client/campaign" class="base-text primary-text">
                                            MANAGE
                                        </a>
                                    </div>
                                </td>

                                <td class="base-text primary-text" style="font-size: 24px;font-weight: normal;">
                                    +
                                </td>

                            </tr>
                                <tr>
                                    <td colspan="4" style="border-top:0; padding-top:0">
                                        <div class="d-flex justify-content-between mt-4">
                                           <div class="base-text name-text" style="font-size:16px;">
                                                Name of the campaign long name of the campaign
                                           </div>
                                            <div class="invoice-amount base-text" style="color: #7A828D;">
                                                GMT - 8
                                            </div>
                                        </div>
                                        <hr>
                                        <div>
                                            <div class="base-text name-text">
                                                3 agents are currently working on the company:
                                            </div>
                                            <div class="base-text" style="font-size:14px; margin-top:29px;">
                                                <img src="/images/client/add_agent/search_result/ic/user/user123.png" alt="user image" style="width:26px; margin-right:10px; border-radius: 50%;">
                                                Benz Rosette Tacder	(campaign manager)
                                            </div>
                                            <div class="base-text" style="font-size:14px;  margin-top:22px;">
                                                <img src="/images/client/add_agent/search_result/ic/user/user123.png" alt="user image" style="width:26px; margin-right:10px; border-radius: 50%;">
                                                Jessica Cipriano
                                            </div>
                                            <div class="base-text" style="font-size:14px;  margin-top:22px;">
                                                <img src="/images/client/add_agent/search_result/ic/user/user123.png" alt="user image" style="margin-bottom:19px; width:26px; margin-right:10px; border-radius: 50%;">
                                                Jessica Cipriano
                                            </div>
                                            <hr>
                                            <div class="base-text  d-flex align-items-center" style="font-size:14px;  margin-top:19px;">
                                                <img src="/images/admin/affiliate.svg" alt="user image" style="margin-right:10px;">
                                                Affiliate: Jordan MacGregor
                                            </div>
                                            <div class="base-text d-flex align-items-center" style="font-size:14px;  margin-top:19px;">
                                                <img src="/images/admin/date.svg" alt="user image" style="margin-right:10px;">
                                                22.04.19 - 24.12.19
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div style="margin-top: -12px;">
                                            <div style="margin-bottom: 10px;">
                                                Company name
                                            </div>
                                            <div class="base-text name-text">
                                                Edward Smith-Lorence
                                            </div>
                                        </div>
                                        <div class="name-text">
                                            <img src="/images/admin/down_arrow.png" alt="down arrow">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-service  base-text ">
                                        24
                                    </div>
                                </td>
                                <td>
                                    <div class="payment-btn active">
                                        <a href="#" style="width:116px;">
                                            LIVE
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="no-decoration">
                                        <a href="#" class="base-text primary-text">
                                            MANAGE
                                        </a>
                                    </div>
                                </td>

                                <td class="base-text primary-text" style="font-size: 24px;font-weight: normal;">
                                    +
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div style="margin-top: -12px;">
                                            <div style="margin-bottom: 10px;">
                                                Company name
                                            </div>
                                            <div class="base-text name-text">
                                                Edward Smith-Lorence
                                            </div>
                                        </div>
                                        <div class="name-text">
                                            <img src="/images/admin/down_arrow.png" alt="down arrow">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-service  base-text ">
                                        24
                                    </div>
                                </td>
                                <td>
                                    <div class="payment-btn active">
                                        <a href="#" style="width:116px;">
                                            LIVE
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="no-decoration">
                                        <a href="#" class="base-text primary-text">
                                            MANAGE
                                        </a>
                                    </div>
                                </td>

                                <td class="base-text primary-text" style="font-size: 24px;font-weight: normal;">
                                    +
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div style="margin-top: -12px;">
                                            <div style="margin-bottom: 10px;">
                                                Company name
                                            </div>
                                            <div class="base-text name-text">
                                                Edward Smith-Lorence
                                            </div>
                                        </div>
                                        <div class="name-text">
                                            <img src="/images/admin/down_arrow.png" alt="down arrow">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-service  base-text ">
                                        24
                                    </div>
                                </td>
                                <td>
                                    <div class="payment-btn new">
                                        <a href="#" style="width:116px;">
                                            ACTIVE
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="no-decoration">
                                        <a href="#" class="base-text primary-text">
                                            MANAGE
                                        </a>
                                    </div>
                                </td>

                                <td class="base-text primary-text" style="font-size: 24px;font-weight: normal;">
                                    +
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div style="margin-top: -12px;">
                                            <div style="margin-bottom: 10px;">
                                                Company name
                                            </div>
                                            <div class="base-text name-text">
                                                Edward Smith-Lorence
                                            </div>
                                        </div>
                                        <div class="name-text">
                                            <img src="/images/admin/down_arrow.png" alt="down arrow">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-service  base-text ">
                                        24
                                    </div>
                                </td>
                                <td>
                                    <div class="payment-btn new">
                                        <a href="#" style="width:116px;">
                                            ACTIVE
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="no-decoration">
                                        <a href="#" class="base-text primary-text">
                                            MANAGE
                                        </a>
                                    </div>
                                </td>

                                <td class="base-text primary-text" style="font-size: 24px;font-weight: normal;">
                                    +
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div style="margin-top: -12px;">
                                            <div style="margin-bottom: 10px;">
                                                Company name
                                            </div>
                                            <div class="base-text name-text">
                                                Edward Smith-Lorence
                                            </div>
                                        </div>
                                        <div class="name-text">
                                            <img src="/images/admin/down_arrow.png" alt="down arrow">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-service  base-text ">
                                        24
                                    </div>
                                </td>
                                <td>
                                    <div class="payment-btn active">
                                        <a href="#" style="width:116px;">
                                            LIVE
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="no-decoration">
                                        <a href="#" class="base-text primary-text">
                                            MANAGE
                                        </a>
                                    </div>
                                </td>

                                <td class="base-text primary-text" style="font-size: 24px;font-weight: normal;">
                                    +
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div style="margin-top: -12px;">
                                            <div style="margin-bottom: 10px;">
                                                Company name
                                            </div>
                                            <div class="base-text name-text">
                                                Edward Smith-Lorence
                                            </div>
                                        </div>
                                        <div class="name-text">
                                            <img src="/images/admin/down_arrow.png" alt="down arrow">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-service  base-text ">
                                        24
                                    </div>
                                </td>
                                <td>
                                    <div class="payment-btn active">
                                        <a href="#" style="width:116px;">
                                            LIVE
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="no-decoration">
                                        <a href="#" class="base-text primary-text">
                                            MANAGE
                                        </a>
                                    </div>
                                </td>

                                <td class="base-text primary-text" style="font-size: 24px;font-weight: normal;">
                                    +
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div style="margin-top: -12px;">
                                            <div style="margin-bottom: 10px;">
                                                Company name
                                            </div>
                                            <div class="base-text name-text">
                                                Edward Smith-Lorence
                                            </div>
                                        </div>
                                        <div class="name-text">
                                            <img src="/images/admin/down_arrow.png" alt="down arrow">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-service  base-text ">
                                        24
                                    </div>
                                </td>
                                <td>
                                    <div class="payment-btn new">
                                        <a href="#" style="width:116px;">
                                            ACTIVE
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="no-decoration">
                                        <a href="#" class="base-text primary-text">
                                            MANAGE
                                        </a>
                                    </div>
                                </td>

                                <td class="base-text primary-text" style="font-size: 24px;font-weight: normal;">
                                    +
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="pagination-bar justify-content-between showFrom-600">
                    <div class="base-text">
                        Total : 124
                    </div>
                    <div>
                        <img src="/images/new_theme/arrow@2x.png" alt="" style="transform: rotate(180deg); margin-right:10px; width:7.5px; height:12px;">
                        <span v-for="i in 9" style="padding-right:10px;">
                                 <b v-if="i === 5">
                                     {{i}}
                                 </b>
                                 <span v-else>
                                     {{i}}
                                 </span>
                             </span>
                        <img src="/images/new_theme/arrow@2x.png" alt="" style="width:7.5px; height:12px;">
                    </div>
                    <div class="no-decoration">
                        <a href="javascript:void(0)" class="paginationBox d-flex align-items-center justify-content-center" @click="showUsersNumSelection = true">
                            Users per page :
                            <span v-if="usersNumber === 15 ">15</span>
                            <span v-if="usersNumber === 25 ">25</span>
                            <span v-if="usersNumber === 50 ">50</span>
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
                        <img src="/images/new_theme/arrow@2x.png" alt="" style="transform: rotate(180deg); margin-right:10px; width:7.5px; height:12px;">
                        <span v-for="i in 9" style="padding-right:10px; font-size: 12px; ">
                                 <b v-if="i === 5">
                                     {{i}}
                                 </b>
                                 <span v-else>
                                     {{i}}
                                 </span>
                             </span>
                        <img src="/images/new_theme/arrow@2x.png" alt="" style="width:7.5px; height:12px;">
                    </div>
                    <div class="d-flex justify-content-between align-items-center w-100" style="padding-top: 24px;">
                        <div class="base-text" style="font-size: 12px;">
                            Total : 124
                        </div>
                        <div class="no-decoration">
                            <a href="javascript:void(0)" class="paginationBox d-flex align-items-center justify-content-center" @click="showUsersNumSelection = true">
                                Users per page :
                                <span v-if="usersNumber === 15 ">15</span>
                                <span v-if="usersNumber === 25 ">25</span>
                                <span v-if="usersNumber === 50 ">50</span>
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
                activeTab: 'active-camps',
                sort:'new_first',
                filter:'show_all',
                usersNumber:15,
                showSortSelection : false,
                showFilterSelection : false,
                showUsersNumSelection : false,
            }
        },
        methods: {
            selectSort(sort){
                this.sort = sort ;
                this.showSortSelection = false;
            },
            selectFilter(filter){
                this.filter = filter ;
                this.showFilterSelection = false;
            },

            selectUsersNum(number){
                this.usersNumber = number ;
                this.showUsersNumSelection = false;
            }
        },
        mounted() {

        }
    }
</script>

<style scoped>

</style>