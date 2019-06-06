<template>
    <div>
        <div class="dashboard-box">
            <div class="campaign-info-bar mt-0 admin-bar justify-content-between">
                <div class="campaign-info-tab firstTab active border-0">
                    CLIENTS
                </div>
                <div class="white-button-a button-base">
                    <a href="javascript:void(0)" style="width:175px; height:30px; border-radius:40px;" data-toggle="modal" data-target="#add-agent">
                        <img src="/images/client/payments/add.png" alt="add icon">
                        ADD NEW CLIENT
                    </a>
                </div>
            </div>
            <div class="search-box-container d-flex align-items-center">
                <div class="searchBox">
                    <img src="/images/admin/magnifier-tool.svg" alt="">
                    <input type="text" placeholder="Search by name, e-mail">
                </div>
            </div>
            <div class="optionsBar">
                <div class="d-flex flex-small-wrap align-items-center no-decoration" style="padding-right: 24px;">
                    <div>
                        <a href="javascript:void(0)" class="filter-box-clients filterBox d-flex align-items-center" >
                            <img src="/images/admin/filter.svg" alt="">
                            <div>
                                Status :
                                <span v-if="filter=== 'show_all' ">show all</span>
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
                        <a href="javascript:void(0)" class="filter-box-clients filterBox d-flex align-items-center" >
                            <img src="/images/admin/filter.svg" alt="">
                            <div>
                                Subscr :
                                <span v-if="filter=== 'show_all' ">show all</span>
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
                        <a href="javascript:void(0)" class="filter-box-clients filterBox d-flex align-items-center" >
                            <img src="/images/admin/filter.svg" alt="">
                            <div>
                                Invoices :
                                <span v-if="filter=== 'show_all' ">show all</span>
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
                        <a href="javascript:void(0)" class="filterBox filter-box-clients d-flex align-items-center"  @click="showSortSelection = true">
                            <img src="/images/admin/sorting.svg" alt="">
                            <div>
                                Sorting :
                                <span v-if="sort=== 'all_income' ">all income</span>
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

            <div class="info-bar">
                <div>
                    <img src="/images/admin/clients/yellow.svg" alt="info color">
                    <div>
                        sign up: this week
                    </div>
                </div>
                <div>
                    <img src="/images/admin/clients/orange.svg" alt="info color">
                    <div>
                        sign up: 1 week ago
                    </div>
                </div>
                <div>
                    <img src="/images/admin/clients/red.svg" alt="info color">
                    <div>
                        sign up: 2 weeks ago
                    </div>
                </div>
                <div>
                    <img src="/images/admin/clients/purble.svg" alt="info color">
                    <div>
                        sign up: 3 weeks ago
                    </div>
                </div>
            </div>

            <div style="padding-left:24px; padding-right:24px;">
                <div class="table invoices-table applicants-table">
                    <table>
                        <thead>
                        <tr>
                            <th scope="col">
                                <img src="/images/admin/clients/arrow.png" alt="" style="    width: 18px; height: 18px; border-radius: 3px;">
                            </th>
                            <th scope="col">CLIENT</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">SUBSCR</th>
                            <th scope="col">INVOICES</th>
                            <th scope="col">INCOME</th>
                            <th scope="col">MANAGER</th>
                            <th scope="col">TIMEZONE</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="/images/admin/clients/yellow.svg" alt="">
                                </td>
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
                                    <div class="payment-btn active">
                                        <a href="#">
                                            ACTIVE
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text available-text">
                                        ACTIVE (40 h)
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text new-text">
                                      NON
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text">
                                        $ 500
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text primary-text">
                                        george Newtone
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text">
                                       GMT - 8
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="/images/admin/clients/orange.svg" alt="">
                                </td>
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
                                    <div class="payment-btn new">
                                        <a href="#">
                                            NEW
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text new-text">
                                        NO SUBSC
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text new-text">
                                      NON
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text">
                                        $ 500
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text primary-text">
                                        george Newtone
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text">
                                       GMT - 8
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="/images/admin/clients/red.svg" alt="">
                                </td>
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
                                    <div class="payment-btn paused">
                                        <a href="#">
                                            PAUSED
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text not-available-text">
                                        DUE
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text available-text">
                                        PAID
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text">
                                        $ 500
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text primary-text">
                                        george Newtone
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text">
                                        GMT - 8
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="/images/admin/clients/yellow.svg" alt="">
                                </td>
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
                                    <div class="payment-btn active">
                                        <a href="#">
                                            ACTIVE
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text available-text">
                                        ACTIVE (40 h)
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text new-text">
                                        NON
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text">
                                        $ 500
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text primary-text">
                                        george Newtone
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text">
                                        GMT - 8
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="/images/admin/clients/yellow.svg" alt="">
                                </td>
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
                                    <div class="payment-btn active">
                                        <a href="#">
                                            ACTIVE
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text available-text">
                                        ACTIVE (40 h)
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text new-text">
                                        NON
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text">
                                        $ 500
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text primary-text">
                                        george Newtone
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text">
                                        GMT - 8
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="/images/admin/clients/yellow.svg" alt="">
                                </td>
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
                                    <div class="payment-btn active">
                                        <a href="#">
                                            ACTIVE
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text available-text">
                                        ACTIVE (40 h)
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text new-text">
                                        NON
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text">
                                        $ 500
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text primary-text">
                                        george Newtone
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text">
                                        GMT - 8
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="/images/admin/clients/yellow.svg" alt="">
                                </td>
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
                                    <div class="payment-btn active">
                                        <a href="#">
                                            ACTIVE
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text available-text">
                                        ACTIVE (40 h)
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text new-text">
                                        NON
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text">
                                        $ 500
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text primary-text">
                                        george Newtone
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text">
                                        GMT - 8
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="/images/admin/clients/yellow.svg" alt="">
                                </td>
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
                                    <div class="payment-btn active">
                                        <a href="#">
                                            ACTIVE
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text available-text">
                                        ACTIVE (40 h)
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text new-text">
                                        NON
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text">
                                        $ 500
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text primary-text">
                                        george Newtone
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text">
                                        GMT - 8
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="/images/admin/clients/yellow.svg" alt="">
                                </td>
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
                                    <div class="payment-btn active">
                                        <a href="#">
                                            ACTIVE
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text available-text">
                                        ACTIVE (40 h)
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text new-text">
                                        NON
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text">
                                        $ 500
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text primary-text">
                                        george Newtone
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text">
                                        GMT - 8
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="/images/admin/clients/yellow.svg" alt="">
                                </td>
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
                                    <div class="payment-btn active">
                                        <a href="#">
                                            ACTIVE
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text available-text">
                                        ACTIVE (40 h)
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text new-text">
                                        NON
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text">
                                        $ 500
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text primary-text">
                                        george Newtone
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-amount base-text">
                                        GMT - 8
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
                sort:'all_income',
                filter:'show_all',
                status:'show_all',
                subscr:'show_all',
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