<template>
    <div>
        <div class="dashboard-box">
            <div class="campaign-info-bar mt-0 admin-bar">
                <div
                             class="campaign-info-tab firstTab"
                             :class="{active : activeTab === 'business-support'}"
                             @click="setActiveTab('business-support')"
                             style="white-space: nowrap;"
                >

                    BUSINESS SUPPORT
                </div>
                <div
                             class="campaign-info-tab"
                             :class="{active : activeTab === 'designers'}"
                             @click="setActiveTab('designers')">
                    DESIGNERS
                </div>
                <div
                             class="campaign-info-tab"
                             :class="{active : activeTab === 'developers'}"
                             @click="setActiveTab('developers')">
                    DEVEL<span class="">OPERS</span>
                </div>
                <div>
                    <div class="white-button-a button-base">
                        <a href="javascript:void(0)" style="width:175px; height:30px; border-radius:40px;" data-toggle="modal" data-target="#add-agent" @click="checkDefaultRadio">
                            <img src="/images/client/payments/add.png" alt="add icon">
                            <span class=""> ADD NEW AGENT</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="campaign-info-bar reversed mt-0">
                <div
                             class="campaign-info-tab firstTab"
                             :class="{active : secondaryActiveTab === 'approved-agents'}"
                             @click="secondaryActiveTab = 'approved-agents';filter = 'show_all'">
                    APPROVED AGENTS
                </div>
                <div
                             class="campaign-info-tab"
                             :class="{active : secondaryActiveTab === 'applicants'}"
                             @click="secondaryActiveTab = 'applicants'; filter = 'show_new'">
                    APPLICANTS
                </div>
            </div>

            <div class="optionsBar">
                <div class="d-flex align-items-center left">
                    <div class="searchBox agents">
                        <img src="/images/admin/magnifier-tool.svg" alt="">
                        <input type="text" placeholder="Search by name, e-mail" v-model="searchValue">
                    </div>
                    <div class="blue-text no-decoration">
                        <a href="/admin/advanced-search" style="color: #05A4F4;" >
                            ADVANCED SEARCH
                        </a>
                    </div>
                </div>
                <div class="d-flex align-items-center right no-decoration" style="padding-right: 24px;">
                    <div>
                        <a href="javascript:void(0)" class="filterBox d-flex align-items-center" @click="showFilterSelection = true">
                            <img src="/images/admin/filter.svg" alt="">
                            <div>
                                Filter :
                                <span v-if="filter=== 'show_all' ">All agents</span>
                                <span v-if="filter=== 'show_new' ">New applications</span>
                                <span v-if="filter=== 'show_in_process' ">In process</span>
                            </div>
                        </a>
                        <div class="select-popup" v-show="showFilterSelection" style="margin-top:-45px;">
                            <ul class="select-popup-list">
                                <li @click="selectFilter('show_all')">
                                    Show all agents
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
                            <th scope="col"></th>
                            <th scope="col">HOURLY RATE</th>
                            <th scope="col" v-show="activeTab !== 'business-support' ">MAIN SKILL</th>
                            <th scope="col">STATUS</th>
                            <th scope="col" v-show="activeTab === 'business-support' " class="align-items-center stage-column" style="padding-right: 30px; display:flex;">
                                STAGE
                                <img src="/images/admin/arrows.svg" alt="arrow down">
                            </th>
                        </tr>
                        </thead>

                        <tbody>
                            <template v-for="(user, index) in OrderedSelectedAgents">
                                <tr>
                                    <td>
                                        <div class="invoice-number base-text name-text" style="font-weight: 500;">
                                            {{user.data.first_name}} {{user.data.last_name}}
                                        </div>
                                        <div v-show="searchValue.length > 0" class="userEmailText">
                                            {{user.email}}
                                        </div>
                                    </td>
                                    <td>
                                        <img src="/images/admin/down_arrow.png" alt="down arrow" :id="'detailsArrow'+user.id" @click="toggleDetails(user.id)">
                                    </td>
                                    <td>
                                        <div class="invoice-service  base-text hour-text"  style="font-weight: normal;">
                                            <span v-show="!user.is_edited">${{Math.ceil(user.agent.hourly_rate)}}</span>
                                            <input type="number" style="width: 40px;"  v-model="user.agent.hourly_rate" v-show="user.is_edited" @blur="setEditField(user.id, false)" @keyup.enter="setEditField(user.id, false)" >

                                            <img src="/images/admin/edit_24px.svg" alt="edit arrow" @click="setEditField(user.id, true)">
                                        </div>
                                    </td>
                                    <td v-show="activeTab !== 'business-support'">
                                        <div class="invoice-service d-flex align-items-center base-text hour-text"  style="font-weight: normal;">
                                            <div v-show="!user.is_skill_edited" style=" overflow: hidden; max-width: 120px;">{{user.agent.technologies}}</div>
                                            <input type="text" style="width: 120px;"  v-model="user.agent.technologies" v-show="user.is_skill_edited" @blur="setSkillEditField(user.id, false)" @keyup.enter="setSkillEditField(user.id, false)" >
                                            <img src="/images/admin/edit_24px.svg" alt="edit arrow" @click="setSkillEditField(user.id, true)">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="invoice-amount base-text">
                                            <span :class="{ 'available-text' : user.status == 4 , 'new-text' : user.status < 4}">
                                                {{userStatus[user.status]}} (+{{Math.ceil(user.agent.available_hours_per_week)}} h/week)
                                            </span>
                                        </div>
                                    </td>
                                    <td class="no-decoration stage-select " v-show="activeTab === 'business-support' ">
                                        <a href="javascript:void(0)">
                                            v1   <img src="/images/admin/down_arrow.png" alt="arrow down">
                                        </a>
                                    </td>
                                </tr>
                                <tr v-show="user.is_details_opened">
                                    <td colspan="4" style="border-top:0; padding-top:0">
                                        <div v-show="user.status < 4 " class="action-buttons-bar">
                                            <div class="disapprove-btn no-decoration">
                                                <a href="javascript:void(0)" data-toggle="modal" data-target="#disapprove-agent" @click="checkDefaultRadioDisapprove">
                                                    DISAPPROVE APPLICANT
                                                </a>
                                            </div>
                                            <div class="approve-btn no-decoration">
                                                <a href="javascript:void(0)">
                                                    APPROVE APPLICANT
                                                </a>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="responsive-grid mb-3"
                                                 style="margin-top: 20px;">
                                                <!--image-->
                                                <div class="d-flex">
                                                    <div class="">
                                                        <img :src="user.data.avatar" class="avator" style="width: 50px;"/>
                                                    </div>
                                                    <!--location-->
                                                    <div class="p-2">
                                                        <div class="big-font" style="margin-bottom:6px;">{{user.data.first_name}} {{user.data.last_name}}</div>
                                                        <div class="location">
                                                            <img src="/images/client/add_agent/search_result/icon/maps/place_24px.png"/>
                                                            {{user.data.city}}, {{user.data.country}}
                                                        </div>
                                                        <div class="visiblty">
                                                            <div class="no-decoration white-on-hover mt-4">
                                                                <a :href="'/admin/agent-profile/' + user.id" class="btn btn-primar btn-radius btn-responsive" v-show="user.status >= 4 " >VISIT AGENT’S PROFILE</a>
                                                                <a href="/admin/applicant-profile" class="btn btn-primar btn-radius btn-responsive" v-show="user.status < 4 ">VISIT AGENT’S PROFILE</a>
                                                            </div>
                                                            <div class="mt-4">
                                                                <button class="btn btn-left btn-radius btn-responsive d-flex align-items-center">
                                                                    <img src="/images/client/add_agent/search_result/ic/play_rec/Vector.png" style="margin-right: 15px;"/>
                                                                    LISTEN TO THE RECORD
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--info-->
                                                <div class=""
                                                     style="margin-top:15px;">
                                                    <div class="big-font">
                                                        <img src="/images/client/add_agent/search_result/ic/primary_job_name.png" class="primaryjob-icon"/>
                                                        {{user.data.job_title}}
                                                    </div>
                                                    <div style="font-size: 16px; color : #4a5464; margin: 20px 0 20px;">
                                                        <span style="font-weight: 500;">Sector experience: </span> {{user.agent.experience}}
                                                    </div>
                                                    <div>
                                                        <span style="font-weight: 500;">Technologies, software: </span> {{user.agent.technologies}}
                                                    </div>
                                                    <div style="margin: 20px 0 ;">
                                                        <span style="font-weight: 500;">Languages: </span>
                                                        <span v-for="(language,index) in user.languages" v-bind:key="index">
                                                            {{language.label}}<span v-show="index < user.languages.length -1 ">, </span>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <span style="font-weight: 500;">No. hours per week: </span>{{Math.ceil(user.agent.available_hours_per_week)}} hours
                                                    </div>
                                                </div>
                                                <div class="invisiblty" style="padding-top: 40px;">
                                                    <div class="d-flex align-items-center" style="">
                                                        <div class="d-flex align-items-center">
                                                            <img src="/images/client/add_agent/search_result/ic/play_rec/Vector.png" style="margin-right: 8px;">
                                                            <div class="blue-text" style="font-size:12px;">LISTEN TO THE RECORD</div>
                                                        </div>
                                                        <div>
                                                            <a href="/admin/applicant-profile" class="btn btn-primar btn-radius btn-responsive" style="margin:0 0 0 20px; ">
                                                                <b>VISIT PROFILE</b>
                                                            </a>
                                                        </div>
                                                    </div>
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
                        Total : {{filteredSelectedAgents.length}}
                    </div>
                    <div>
                        <img src="/images/new_theme/arrow@2x.png" alt="" style="transform: rotate(180deg); margin-right:10px; width:7.5px; height:12px;">
                        <span v-for="i in 9" style="padding-right:10px;">
                                 <b v-if="i === 5">
                                     {{i}}
                                 </b>
                                 <span v-else style="font-size: 13px;">
                                     {{i}}
                                 </span>
                             </span>
                        <img src="/images/new_theme/arrow@2x.png" alt="" style="width:7.5px; height:12px;">
                    </div>
                    <div class="no-decoration">
                        <a href="javascript:void(0)" class="paginationBox d-flex align-items-center justify-content-center" @click="showUsersNumSelection = true">
                            Users per page:&nbsp;
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
                selectedAgents:[],
                businessSupportAgents:[],
                designers:[],
                developers:[],
                sort:'old_first',
                filter:'show_all',
                usersNumber:15,
                showSortSelection : false,
                showFilterSelection : false,
                showUsersNumSelection : false,
                profession:'business-support',
                userStatus:{
                    1:'New applicant',
                    2:'In process (Voice)',
                    3:'In process (Data)',
                    4:'Available',
                    5:'Available',
                    6:'Approved (unavailable)',
                    7:'Approved (unavailable)',
                    8:'Unapproved',
                    9:'Unapproved'
                },

                searchValue:''
            }
        },
        computed: {
            filteredSelectedAgents() {
                const search = this.searchValue.toLowerCase().trim();
                const filter = this.filter ;

                if (!search && filter === 'show_all'){
                    return this.selectedAgents;
                }


                return  this.selectedAgents.filter( function (agent) {

                    let fullName = agent.data.first_name + ' ' +  agent.data.last_name ;
                    let jobTitle = agent.data.job_title ;
                    let email    = agent.email ;

                    let SearchFilter = email.toLowerCase().trim().indexOf(search) > -1  || jobTitle.toLowerCase().trim().indexOf(search) > -1  || fullName.toLowerCase().trim().indexOf(search) > -1 ;
                    let applicationFilter = true ;

                    if(filter === 'show_new'){
                        applicationFilter = agent.status == 1 ;
                    }
                    if(filter === 'show_in_process'){
                        applicationFilter = agent.status == 2 || agent.status == 3 ;
                    }


                    return  ( SearchFilter && applicationFilter );
                });

            },
            OrderedSelectedAgents: function () {
                let sorting = 'desc';
                if(this.sort === 'old_first'){
                    sorting = 'asc';
                }
                return _.orderBy(this.filteredSelectedAgents, 'created_at' , sorting)
            }
        },
        methods: {
            getAgentsByProfession(){
                if(this.agentsExist(this.profession)){
                    return;
                }
                axios.get('/admin/api/agents/' + this.profession).then( (response) => {
                    this.selectedAgents =  response.data ;
                    switch (this.profession) {
                        case 'business-support':
                            this.businessSupportAgents = response.data ;
                            break;
                        case 'designer':
                            this.designers = response.data ;
                            break;
                        case 'developer':
                            this.developers = response.data ;
                            break;
                    }
                });
            },
            agentsExist(profession){
                let agentsExist = false;
                switch (profession) {
                    case 'business-support':
                        if(this.businessSupportAgents.length > 0){
                            this.selectedAgents = this.businessSupportAgents ;
                            agentsExist = true;
                        }
                        break;
                    case 'designer':
                        if(this.designers.length > 0){
                            this.selectedAgents = this.designers ;
                            agentsExist = true;
                        }
                        break;
                    case 'developer':
                        if(this.developers.length > 0){
                            this.selectedAgents = this.developers ;
                            agentsExist = true;
                        }
                        break;
                }

                return agentsExist;
            },
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
            },
            checkDefaultRadio(){
                $('#defaultRadio').click();
            },
            checkDefaultRadioDisapprove(){
                $('#defaultRadio_disapprove').click();
            },
            setActiveTab(tabName){
                this.activeTab = tabName ;
                this.setCurrentSelectedProfession(tabName);
                this.getAgentsByProfession();
            },
            setCurrentSelectedProfession(tabName){
                switch (tabName) {
                    case 'business-support':
                        this.profession = 'business-support' ;
                        break;
                    case 'designers':
                        this.profession = 'designer' ;
                        break;
                    case 'developers':
                        this.profession = 'developer' ;
                        break;
                }
            },
            toggleDetails(user_id){
                let agents = this.selectedAgents;
                $.each(agents, function(i) {
                    if (agents[i].id === user_id) {
                        agents[i].is_details_opened = !agents[i].is_details_opened;
                        if (agents[i].is_details_opened) {
                            $('#detailsArrow' + user_id).css('transform', 'rotate(180deg)');
                        } else {
                            $('#detailsArrow' + user_id).css('transform', 'rotate(0deg)');
                        }
                    }
                });
            },
            setEditField(user_id,value){
                let agents = this.selectedAgents;
                $.each(agents, (i) => {
                    if (agents[i].id === user_id) {
                        agents[i].is_edited = value;
                        if(value === false){
                            let rate =  agents[i].agent.hourly_rate ;
                            this.updateUserHourlyRate(user_id, rate) ;
                        }
                    }
                });

            },


            setSkillEditField(user_id,value){
                let agents = this.selectedAgents;
                $.each(agents, (i) => {
                    if (agents[i].id === user_id) {
                        agents[i].is_skill_edited = value;
                        if(value === false){
                            let technologies =  agents[i].agent.technologies ;
                            this.updateUserSkills(user_id, technologies) ;
                        }
                    }
                });

            },
            updateUserHourlyRate(user_id,rate){
                let data = {
                    'user_id' : user_id,
                    'hourly_rate': rate
                };
                axios.post('/admin/agent/rate/update',data).then( (response) => {
                    let notificationMessage = "Successfully updated agent" ;
                    this.$emit('showPositiveNotification',notificationMessage);
                });
            },

            updateUserSkills(user_id,technologies){
                let data = {
                    'user_id' : user_id,
                    'technologies': technologies
                };
                axios.post('/admin/agent/technologies/update',data).then( (response) => {
                    let notificationMessage = 'Successfully updated agent' ;
                    this.$emit('showPositiveNotification',notificationMessage);
                    console.log(response) ;
                });
            }
        },
        mounted() {
            this.getAgentsByProfession();
        }
    }
</script>

<style scoped>
    .userEmailText{
        font-size:13px;
        color:gray;
        padding-top:8px;
    }
</style>