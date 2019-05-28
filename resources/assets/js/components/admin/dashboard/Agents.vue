<template>
    <div>
        <div class="dashboard-box">
            <div class="campaign-info-bar mt-0 admin-bar">
                <div
                             class="campaign-info-tab firstTab"
                             :class="{active : activeTab === 'business-support'}"
                             @click="activeTab = 'business-support'">
                    BUSINESS SUPPORT
                </div>
                <div
                             class="campaign-info-tab"
                             :class="{active : activeTab === 'designers'}"
                             @click="activeTab = 'designers'">
                    DESIGNERS
                </div>
                <div
                             class="campaign-info-tab"
                             :class="{active : activeTab === 'developers'}"
                             @click="activeTab = 'developers'">
                    DEVELOPERS
                </div>
                <div>
                    <div class="white-button-a button-base">
                        <a href="javascript:void(0)" style="width:175px; height:30px; border-radius:40px;">
                            <img src="/images/client/payments/add.png" alt="add icon">
                            ADD NEW AGENT
                        </a>
                    </div>
                </div>
            </div>
            <div class="campaign-info-bar reversed mt-0">
                <div
                             class="campaign-info-tab firstTab"
                             :class="{active : secondaryActiveTab === 'approved-agents'}"
                             @click="secondaryActiveTab = 'approved-agents'">
                    APPROVED AGENTS
                </div>
                <div
                             class="campaign-info-tab"
                             :class="{active : secondaryActiveTab === 'applicants'}"
                             @click="secondaryActiveTab = 'applicants'">
                    APPLICANTS
                </div>
            </div>

            <div class="optionsBar">
                <div class="d-flex align-items-center left">
                    <div class="searchBox">
                        <img src="/images/admin/magnifier-tool.svg" alt="">
                        <input type="text" placeholder="Search by name, e-mail">
                    </div>
                    <div class="blue-text">
                        ADVANCED SEARCH
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
                        <div class="select-popup" v-show="showFilterSelection" style="margin-top:-45px;">
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
                            <th scope="col">FULL NAME</th>
                            <th scope="col">HOURLY RATE</th>
                            <th scope="col">STATUS</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="invoice-number base-text name-text">
                                       Edward Smith-Lorence
                                        <img src="/images/admin/down_arrow.png" alt="down arrow">
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-service  base-text hour-text">
                                        $10
                                        <img src="/images/admin/edit_24px.svg" alt="edit arrow">
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text available-text">
                                        AVAILABLE (+15 h/week)
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="invoice-number  base-text name-text">
                                       Edward Smith-Lorence
                                        <img src="/images/admin/down_arrow.png" alt="down arrow">
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-service  base-text hour-text">
                                        $12
                                        <img src="/images/admin/edit_24px.svg" alt="edit arrow">

                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text available-text">
                                        AVAILABLE (+10 h/week)
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="invoice-number  base-text name-text">
                                       Edward Smith-Lorence
                                        <img src="/images/admin/down_arrow.png" alt="down arrow">

                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-service  base-text hour-text">
                                        $10
                                        <img src="/images/admin/edit_24px.svg" alt="edit arrow">

                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text not-available-text">
                                        NOT AVAILABLE
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="invoice-number  base-text name-text">
                                        Edward Smith-Lorence
                                        <img src="/images/admin/down_arrow.png" alt="down arrow">
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-service  base-text hour-text">
                                        $12
                                        <img src="/images/admin/edit_24px.svg" alt="edit arrow">

                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text available-text">
                                        AVAILABLE (+10 h/week)
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="invoice-number  base-text name-text">
                                        Edward Smith-Lorence
                                        <img src="/images/admin/down_arrow.png" alt="down arrow">

                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-service  base-text hour-text">
                                        $10
                                        <img src="/images/admin/edit_24px.svg" alt="edit arrow">

                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text not-available-text">
                                        NOT AVAILABLE
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="invoice-number base-text name-text">
                                        Edward Smith-Lorence
                                        <img src="/images/admin/down_arrow.png" alt="down arrow">
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-service  base-text hour-text">
                                        $10
                                        <img src="/images/admin/edit_24px.svg" alt="edit arrow">
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text available-text">
                                        AVAILABLE (+15 h/week)
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="invoice-number  base-text name-text">
                                        Edward Smith-Lorence
                                        <img src="/images/admin/down_arrow.png" alt="down arrow">
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-service  base-text hour-text">
                                        $12
                                        <img src="/images/admin/edit_24px.svg" alt="edit arrow">

                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text available-text">
                                        AVAILABLE (+10 h/week)
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="invoice-number  base-text name-text">
                                        Edward Smith-Lorence
                                        <img src="/images/admin/down_arrow.png" alt="down arrow">

                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-service  base-text hour-text">
                                        $10
                                        <img src="/images/admin/edit_24px.svg" alt="edit arrow">

                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text not-available-text">
                                        NOT AVAILABLE
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="invoice-number  base-text name-text">
                                        Edward Smith-Lorence
                                        <img src="/images/admin/down_arrow.png" alt="down arrow">
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-service  base-text hour-text">
                                        $12
                                        <img src="/images/admin/edit_24px.svg" alt="edit arrow">

                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text available-text">
                                        AVAILABLE (+10 h/week)
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="invoice-number  base-text name-text">
                                        Edward Smith-Lorence
                                        <img src="/images/admin/down_arrow.png" alt="down arrow">

                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-service  base-text hour-text">
                                        $10
                                        <img src="/images/admin/edit_24px.svg" alt="edit arrow">

                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text not-available-text">
                                        NOT AVAILABLE
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="invoice-number base-text name-text">
                                        Edward Smith-Lorence
                                        <img src="/images/admin/down_arrow.png" alt="down arrow">
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-service  base-text hour-text">
                                        $10
                                        <img src="/images/admin/edit_24px.svg" alt="edit arrow">
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text available-text">
                                        AVAILABLE (+15 h/week)
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="invoice-number  base-text name-text">
                                        Edward Smith-Lorence
                                        <img src="/images/admin/down_arrow.png" alt="down arrow">
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-service  base-text hour-text">
                                        $12
                                        <img src="/images/admin/edit_24px.svg" alt="edit arrow">

                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text available-text">
                                        AVAILABLE (+10 h/week)
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="invoice-number  base-text name-text">
                                        Edward Smith-Lorence
                                        <img src="/images/admin/down_arrow.png" alt="down arrow">

                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-service  base-text hour-text">
                                        $10
                                        <img src="/images/admin/edit_24px.svg" alt="edit arrow">

                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text not-available-text">
                                        NOT AVAILABLE
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="invoice-number  base-text name-text">
                                        Edward Smith-Lorence
                                        <img src="/images/admin/down_arrow.png" alt="down arrow">
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-service  base-text hour-text">
                                        $12
                                        <img src="/images/admin/edit_24px.svg" alt="edit arrow">

                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text available-text">
                                        AVAILABLE (+10 h/week)
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="invoice-number  base-text name-text">
                                        Edward Smith-Lorence
                                        <img src="/images/admin/down_arrow.png" alt="down arrow">

                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-service  base-text hour-text">
                                        $10
                                        <img src="/images/admin/edit_24px.svg" alt="edit arrow">

                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text not-available-text">
                                        NOT AVAILABLE
                                    </div>
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
                activeTab: 'business-support',
                secondaryActiveTab: 'approved-agents',
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