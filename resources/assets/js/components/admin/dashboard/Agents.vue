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
                    <a href="javascript:void(0)" class="filterBox d-flex align-items-center">
                        <img src="/images/admin/filter.svg" alt="">
                        <div>
                            Filter: show not available
                        </div>
                    </a>
                    <a href="javascript:void(0)" class="sortingBox d-flex align-items-center"  @click="showSortSelection = true">
                        <img src="/images/admin/sorting.svg" alt="">
                        <div>
                            Sorting:
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
                    <div class="paginationBox d-flex align-items-center justify-content-center">
                        Users per page : 15
                        <img src="/images/admin/down_arrow.png" alt="">
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
                        <div class="paginationBox d-flex align-items-center justify-content-center"  style="font-size: 12px; width:140px;">
                            Users per page : 15
                            <img src="/images/admin/down_arrow.png" alt="">
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
                showSortSelection : false,
            }
        },
        methods: {
            selectSort(sort){
                this.sort = sort ;
                this.showSortSelection = false;
            }
        },
        mounted() {

        }
    }
</script>

<style scoped>

</style>