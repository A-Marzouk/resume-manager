<template>
    <div>
        <div class="dashboard-box">
            <div class="campaign-info-bar mt-0 admin-bar justify-content-between">
                <div class="campaign-info-tab firstTab active border-0">
                    CLIENTS
                </div>
                <div class="white-button-a button-base">
                    <a href="/admin/register-client" style="width:175px; height:30px; border-radius:40px; margin-right: 20px;">
                        <img src="/images/client/payments/add.png" alt="add icon">
                        ADD NEW CLIENT
                    </a>
                </div>
            </div>
            <div class="search-box-container d-flex align-items-center">
                <div class="searchBox">
                    <img src="/images/admin/magnifier-tool.svg" alt="">
                    <input type="text" placeholder="Search by name, e-mail or agency" class="client-search-box" v-model="searchValue">
                </div>
            </div>
            <div class="optionsBar">
                <div class="d-flex flex-small-wrap align-items-center no-decoration" style="padding-right: 24px;">
                    <div>
                        <a href="javascript:void(0)" class="filter-box-clients filterBox d-flex align-items-center"  @click="showStatusSelection = true">
                            <img src="/images/admin/filter.svg" alt="">
                            <div>
                                <span style="font-weight: 500;">Status :</span>

                                <span v-if="status === 'show_all' ">All clients</span>
                                <span v-if="status === 'active' ">Active </span>
                                <span v-if="status === 'not_active' ">Not active</span>
                            </div>
                        </a>
                        <div class="select-popup" v-show="showStatusSelection" style="margin-top:-45px;">
                            <ul class="select-popup-list">
                                <li @click="selectStatus('show_all')">
                                    Show all clients
                                </li>
                                <li @click="selectStatus('active')">
                                    Show active clients
                                </li>
                                <li @click="selectStatus('not_active')">
                                    Show not active clients
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <a href="javascript:void(0)" class="filter-box-clients filterBox d-flex align-items-center" >
                            <img src="/images/admin/filter.svg" alt="">
                            <div>
                                <span style="font-weight: 500;">Subscr :</span>
                                <span v-if="filter=== 'show_all' ">show all</span>
                                <span v-if="filter=== 'show_new' ">New applications</span>
                                <span v-if="filter=== 'show_in_process' ">In process</span>
                            </div>
                        </a>
                        <div class="select-popup" v-show="" style="margin-top:-45px;">
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
                                <span style="font-weight: 500;">Invoices :</span>

                                <span v-if="filter=== 'show_all' ">show all</span>
                                <span v-if="filter=== 'show_new' ">New applications</span>
                                <span v-if="filter=== 'show_in_process' ">In process</span>
                            </div>
                        </a>
                        <div class="select-popup" v-show="" style="margin-top:-45px;">
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
                                <span style="font-weight: 500;">Sorting :</span>

                                <span v-if="sort=== 'new_first' ">Newest first</span>
                                <span v-if="sort=== 'old_first' ">Oldest first</span>
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
                        sign up: 1 week ago &nbsp;&nbsp;
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
                            <th scope="col"></th>
                            <th scope="col">STATUS</th>
                            <th scope="col">SUBSCR</th>
                            <th scope="col">INVOICES</th>
                            <th scope="col">INCOME</th>
                            <th scope="col">MANAGER</th>
                            <th scope="col">TIMEZONE</th>
                        </tr>
                        </thead>
                        <tbody>
                            <template v-for="(user, index) in orderedSelectedClients">
                                <tr>
                                    <td>
                                        <img src="/images/admin/clients/yellow.svg" alt="">
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div style="margin-top: -12px;">
                                                <div style="margin-bottom: 10px;">
                                                    {{user.client.agency}}
                                                </div>
                                                <div class="base-text name-text">
                                                    {{user.client.contact}}
                                                </div>
                                                <div v-show="searchValue.length > 0" class="userEmailText pt-2">
                                                    {{user.email}}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="name-text">
                                            <img src="/images/admin/down_arrow.png" alt="down arrow">
                                        </div>
                                    </td>
                                    <td>
                                        <div  v-if="user.is_active == 1" class="payment-btn active">
                                            <a href="javascript:void(0)">
                                                ACTIVE
                                            </a>
                                        </div>
                                        <div  v-else class="payment-btn paused">
                                            <a href="javascript:void(0)">
                                                PAUSED
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="invoice-amount base-text new-text">
                                            NON
                                        </div>
                                    </td>
                                    <td>
                                        <div class="invoice-amount base-text new-text">
                                          NON
                                        </div>
                                    </td>
                                    <td>
                                        <div class="invoice-amount base-text">
                                            <span style="font-weight: normal;">$ 0 </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="invoice-amount base-text primary-text">
                                            Not <br/>assigned
                                        </div>
                                    </td>
                                    <td>
                                        <div class="invoice-amount base-text">
                                           <span style="font-weight: normal; color:#7A828D;"> {{timezones[user.data.timezone]}} </span>
                                        </div>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>

                <div class="pagination-bar justify-content-between showFrom-600">
                    <div class="base-text">
                        Total : {{orderedSelectedClients.length}}
                    </div>
                    <div>
                        <img src="/images/new_theme/arrow@2x.png" alt="" class="cursorPointer"  @click="toPrevPage" style="transform: rotate(180deg); margin-right:10px; width:7.5px; height:12px;">
                        <span v-for="i in lastPage" style="padding-right:10px;">
                                 <b v-if="i === currentPage">
                                     {{i}}
                                 </b>
                                 <span v-else style="font-size: 13px;" class="cursorPointer"  @click="toSpecificPage(i)">
                                     {{i}}
                                 </span>
                             </span>
                        <img src="/images/new_theme/arrow@2x.png" class="cursorPointer"  @click="toNextPage" alt="" style="width:7.5px; height:12px;">
                    </div>
                    <div class="no-decoration">
                        <a href="javascript:void(0)" class="paginationBox d-flex align-items-center justify-content-center" @click="showUsersNumSelection = true">
                            Clients per page :
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
                        <img src="/images/new_theme/arrow@2x.png" class="cursorPointer"  @click="toPrevPage" alt="" style="transform: rotate(180deg); margin-right:10px; width:7.5px; height:12px;">
                        <span v-for="i in lastPage" style="padding-right:10px; font-size: 12px; ">
                                 <b v-if="i == currentPage">
                                     {{i}}
                                 </b>
                                 <span v-else class="cursorPointer"  @click="toSpecificPage(i)">
                                     {{i}}
                                 </span>
                             </span>
                        <img src="/images/new_theme/arrow@2x.png" class="cursorPointer" @click="toNextPage" alt="" style="width:7.5px; height:12px;">
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
                sort:'old_first',
                filter:'',
                status:'show_all',
                subscr:'show_all',
                usersNumber:15,
                showSortSelection : false,
                showStatusSelection : false,
                showUsersNumSelection : false,

                searchValue:'',
                selectedClients:[],
                timezones:{
                        1 : "(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima ",
                        2 : "(GMT -6:00) Central Time (US & Canada), Mexico City",
                        3 : "(GMT -7:00) Mountain Time (US & Canada)",
                        4 : "(GMT -8:00) Pacific Time (US & Canada)",
                        5 : "(GMT -9:00) Alaska",
                        6 : "(GMT -12:00) Eniwetok, Kwajalein",
                        7 : "(GMT -11:00) Midway Island, Samoa",
                        8 : "(GMT -10:00) Hawaii",
                        9 : "(GMT -9:30) Taiohae",
                        10 : "(GMT -9:00) Alaska",
                        11: "(GMT -8:00) Pacific Time (US & Canada)",
                        12 : "(GMT -7:00) Mountain Time (US & Canada)",
                        13 : "(GMT -6:00) Central Time (US & Canada), Mexico City",
                        14 : "(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima",
                        15 : "(GMT -4:30) Caracas",
                        16 : "(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz",
                        17 : "(GMT -3:30) Newfoundland",
                        18 : "(GMT -3:00) Brazil, Buenos Aires, Georgetown",
                        19 : "(GMT -2:00) Mid-Atlantic",
                        20 : "(GMT -1:00) Azores, Cape Verde Islands",
                        21 : "(GMT +0:00) Western Europe Time, London, Lisbon, Casablanca",
                        22 : "(GMT +1:00) Brussels, Copenhagen, Madrid, Paris",
                        23 : "(GMT +2:00) Kaliningrad, South Africa",
                        24 : "(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg",
                        25 : "(GMT +3:30) Tehran",
                        26 : "(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi",
                        27  : "(GMT +4:30) Kabul",
                        28 : "(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent",
                        29: "(GMT +5:30) Bombay, Calcutta, Madras, New Delhi",
                        30: "(GMT +5:45) Kathmandu, Pokhara",
                        31: "(GMT +6:00) Almaty, Dhaka, Colombo",
                        32: "(GMT +6:30) Yangon, Mandalay",
                        33: "(GMT +7:00) Bangkok, Hanoi, Jakarta",
                        34: "(GMT +8:00) Beijing, Perth, Singapore, Hong Kong",
                        35: "(GMT +8:45) Eucla",
                        36: "(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk",
                        37: "(GMT +9:30) Adelaide, Darwin",
                        38: "(GMT +10:00) Eastern Australia, Guam, Vladivostok",
                        39: "(GMT +10:30) Lord Howe Island",
                        40: "(GMT +11:00) Magadan, Solomon Islands, New Caledonia",
                        41: "(GMT +11:30) Norfolk Island",
                        42: "(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka",
                        43: "(GMT +12:45) Chatham Islands",
                        44: "(GMT +13:00) Apia, Nukualofa",
                        45: "(GMT +14:00) Line Islands, Tokelau",
                },
                lastPage:'',
                currentPage:1
            }
        },
        computed: {
            filteredSelectedClients() {
                const search = this.searchValue.toLowerCase().trim();
                const status = this.status ;

                if (!search && status === 'show_all'){
                    return this.selectedClients;
                }


                return  this.selectedClients.filter( function (user) {

                    let fullName        = user.client.contact ;
                    let agency          = user.client.agency ;
                    let email           = user.email ;

                    let SearchFilter = email.toLowerCase().trim().indexOf(search) > -1 || agency.toLowerCase().trim().indexOf(search) > -1  || fullName.toLowerCase().trim().indexOf(search) > -1 ;
                    let activeFilter  = true ;

                    if(status === 'active'){
                         activeFilter = user.is_active == 1 ;
                    }
                    if(status === 'not_active'){
                         activeFilter = user.is_active != 1 ;
                    }


                    return  ( SearchFilter && activeFilter );
                });

            },
            orderedSelectedClients: function () {
                let sorting = 'desc';
                if(this.sort === 'old_first'){
                    sorting = 'asc';
                }
                return _.orderBy(this.filteredSelectedClients, 'created_at' , sorting)
            }
        },
        methods: {
            getClients(){
                axios.get('/admin/api/clients?page='+ this.currentPage + '&&limit=' + this.usersNumber).then( (response) => {
                    this.selectedClients =  response.data.data ;
                    this.lastPage = response.data.last_page ;
                });

                //scroll to the box
                $('html, body').animate({
                    scrollTop: 0
                }, 1500);
            },
            selectSort(sort){
                this.sort = sort ;
                this.showSortSelection = false;
            },
            selectStatus(status){
                this.status = status ;
                this.showStatusSelection = false;
            },
            selectUsersNum(number){
                this.usersNumber = number ;
                this.currentPage = 1 ;
                this.showUsersNumSelection = false;
                this.getClients();
            },

            toNextPage(){
                this.currentPage++;
                this.getClients();
            },
            toPrevPage(){
                this.currentPage--;
                this.getClients();
            },
            toSpecificPage(page){
                this.currentPage = page;
                this.getClients();
            }
        },
        mounted() {
            this.getClients();
        }
    }
</script>

<style scoped>

    .cursorPointer:hover{
        cursor: pointer ;
    }

</style>
