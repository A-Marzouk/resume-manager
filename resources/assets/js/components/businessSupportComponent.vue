<template>
    <div :class="{'loader margin' : isLoading}" id="loaderArea">
        <div :class="{'d-none' : isLoading}">
            <div class="row">
                <div class="col-12 NoDecor" style="padding-bottom: 15px;">
                    <a href="javascript:void(0)" @click="useFilter = !useFilter" class="btn btn-primary">Filter</a>
                </div>
                <div class="col-12">
                    <label v-show="useFilter" class="form-check-label col-md-2 checkBoxContainer checkBoxText" v-for="(filter,index) in filters" v-bind:key="Math.random()">
                        <input class="form-check-input" :value="filter" type="checkbox" v-model="currentFilter">
                        <span class="checkmark"></span> {{filter}}
                    </label>
                </div>
                <div class="row" v-show="useFilter">
                    <div class="col-12 form-group">
                        <input type="text" class="form-control" placeholder="Filter by name.." v-model="nameFilter">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <hr>
            </div>
            <div class="row NoDecor">
                <div class="col-8">
                    <button :disabled="currentPage === 1" @click="getPreviousPage()" class="btn btn-primary">Previous page</button>
                    <button :disabled="currentPage === lastPage" @click="getNextPage()" class="btn btn-primary">Next page</button>
                    <br/>
                    <span class="panelFormLabel" style="margin-top:25px;">Page number : {{currentPage}}</span>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="pageItems" class="panelFormLabel">Number of users per page : ( Total is {{this.totalNumOfUsers}} ) </label>
                        <input id="pageItems" type="number" class="form-control" min="1" max="totalNumOfUsers" v-model="itemsPerPage" @change="getBusinessUsers()">
                    </div>
                </div>

                <br/>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Link to Resume</th>
                    <th scope="col">Hourly / Monthly Rate</th>
                    <th scope="col"></th>
                    <th scope="col" style="width: 120px;">Status</th>
                    <th scope="col" style="width: 120px;">Stage</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(user,index) in businessUsers" v-bind:key="Math.random()" v-show=" filterByStatus(user,currentFilter) && filterByName(user,nameFilter)|| !useFilter" :class="{'shaded' : isShaded(user),}" @click="unShadeUser(user)">
                    <th scope="row">
                        <!-- check boxes -->
                        <label class="form-check-label col-md-3 checkBoxContainer checkBoxText">
                            <input class="form-check-input" :value="user.id" type="checkbox" v-model="selectedUsers">
                            <span class="checkmark"></span>
                        </label>
                    </th>
                    <td class="NoDecor">
                        <a href="javascript:void(0)" :data-target="'#businessSupportInfo'+user.id"  data-toggle="modal">
                            {{user.firstName}} {{user.lastName}}
                        </a>
                    </td>

                    <td><a :href="'/'+user.username" target="_blank">Resume</a></td>
                    <td v-if="user.userData !== null">{{user.userData.salary}} / {{user.userData.salary_month}}</td>
                    <td v-else>Not set</td>
                    <td><a class="btn btn-primary btn-sm" :href="'/admin/'+user.id">Log in</a>
                    </td>
                    <td>
                        <select :class="getSelectBackgroundClass(user)" v-model="user.status" @change="changeUserStatus(user)" name="business_user_status" class="form-control">
                            <option value="GREY" :selected=" user.status === 'GREY' " style="background-color: grey; color:white;">
                                New applicant
                            </option>
                            <option value="ORANGE" :selected=" user.status === 'ORANGE' " style="background-color: orange; color:white;">
                                V app. process
                            </option>
                            <option value="LIGHTGREEN"  :selected=" user.status === 'LIGHTGREEN' " style="background-color: LIGHTGREEN; color:white;">
                                V approved/avail.
                            </option>
                            <option value="GREEN"  :selected=" user.status === 'GREEN' " style="background-color: GREEN; color:white;">
                                V approved/not-avail.
                            </option>
                            <option value="RED"  :selected=" user.status === 'RED' " style="background-color: red; color:white;">
                                V unapproved
                            </option>
                        </select>
                    </td>
                    <td>
                        <select name="business_user_stage" v-model="user.stage" @change="changeUserStage(user)" class="business_user_stage form-control">
                            <option value="NOT-SELECTED">Not selected</option>
                            <option value="v0.0" :selected="user.stage === 'v0.0'">
                                v0.0
                            </option>
                            <option value="v0.5" :selected="user.stage === 'v0.5'">
                                v0.5
                            </option>
                            <option value="v1.0" :selected="user.stage === 'v1.0'">
                                v1.0
                            </option>
                            <option value="v1.5" :selected="user.stage === 'v1.5'">
                                v1.5
                            </option>
                            <option value="v2.0" :selected="user.stage === 'v2.0'">
                                v2.0
                            </option>
                            <option value="v2.5" :selected="user.stage === 'v2.5'">
                                v2.5
                            </option>
                            <option value="v3.0" :selected="user.stage === 'v3.0'">
                                v3.0
                            </option>
                            <option value="v3.5" :selected="user.stage === 'v3.5'">
                                v3.5
                            </option>
                            <option value="v4.0" :selected="user.stage === 'v4.0'">
                                v4.0
                            </option>
                            <option value="v4.5" :selected="user.stage === 'v4.5'">
                                v4.5
                            </option>
                            <option value="v5.0" :selected="user.stage === 'v5.0'">
                                v5.0
                            </option>
                            <option value="v5.5" :selected="user.stage === 'v5.5'">
                                v5.5
                            </option>
                            <option value="v6.0" :selected="user.stage === 'v6.0'">
                                v6.0
                            </option>
                        </select>
                    </td>
                    <td>
                        <div v-for="(booking,index) in user.bookings" v-if="!booking.canceled" class="panelFormLabel text-center" :id="'bookingStatus'+booking.id">
                            <div>
                                <b>{{booking.hours}}</b> hours - <b>{{booking.weeks}}</b> weeks
                            </div><br/>
                            <b>{{booking.booking_email}}</b><br/>
                            <a href="javascript:void(0)" class="btn btn-sm btn-default releaseBooking" :id="'addHoursBtn' +booking.id">Add hours back</a>
                        </div>
                        <hr width="50%">
                    </td>
                    <td class="panelFormLabel text-center">
                        {{user.owner}}
                    </td>
                    <div class="modal fade" :id="'businessSupportInfo' + user.id" tabindex="-1" role="dialog" aria-labelledby="businessSupportInfo" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="text-right" style="padding: 15px 10px 0 0;">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 pageSubHeading">
                                        Business support agent info
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6"> Name :</div>
                                            <div class="col-md-6"> {{user.firstName}} {{user.lastName}}</div>

                                            <div class="col-md-6"> Email :</div>
                                            <div class="col-md-6"> {{user.email}}</div>

                                            <div class="col-md-6"> Phone :</div>
                                            <div class="col-md-6"> {{user.phone}}</div>

                                            <div class="col-md-6"> Whatsapp :</div>
                                            <div class="col-md-6"> {{user.whatsapp}}</div>

                                            <div class="col-md-6"> Skype:</div>
                                            <div class="col-md-6"> {{user.skype}}</div>

                                            <div class="col-md-6"> Signing up date :</div>
                                            <div class="col-md-6"> {{user.created_at}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
                </tbody>
            </table>
            <a href="javascript:void(0)" @click="deleteUsers" class="float" v-show="selectedUsers.length > 0">
                Delete
            </a>

            <div class="col-12">
                <hr>
            </div>
            <div class="row NoDecor">
                <div class="col-8">
                    <button :disabled="currentPage === 1" @click="getPreviousPage()" class="btn btn-primary">Previous page</button>
                    <button :disabled="currentPage === lastPage" @click="getNextPage()" class="btn btn-primary">Next page</button>
                    <br/>
                    <span class="panelFormLabel" style="margin-top:25px;">Page number : {{currentPage}}</span>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="pageItems1" class="panelFormLabel">Number of users per page : ( Total is {{this.totalNumOfUsers}} ) </label>
                        <input id="pageItems1" type="number" class="form-control" min="1" max="totalNumOfUsers" v-model="itemsPerPage" @change="getBusinessUsers()">
                    </div>
                </div>

                <br/>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                businessUsers:[],
                admin:{},
                currentUser:{
                    status:'not-selected',
                    stage: 'v0.0'
                },
                isLoading:false,
                selectedUsers:[],
                currentFilter:[
                    'GREY','ORANGE','GREEN','LIGHTGREEN','RED'
                ],
                filters:[
                    'GREY','ORANGE','GREEN','LIGHTGREEN','RED'
                ],
                nameFilter:'',
                useFilter:false,
                itemsPerPage:15,
                currentPage:1,
                lastPage:'',
                totalNumOfUsers:'',
            }

        },
        methods:{
            getBusinessUsers(){
              this.isLoading = true;
              axios.get('/admin/get/business_support_users/' + this.itemsPerPage + '?page=' + this.currentPage).then(
                  response => {
                      this.businessUsers = response.data.businessUsers.data;
                      this.admin = response.data.admin;
                      this.isLoading = false;
                      this.lastPage = response.data.businessUsers.last_page;
                      this.totalNumOfUsers = response.data.businessUsers.total;
                  }
              );
          },
            isShaded(user){
                if(user.is_shaded === 'SHADED'){
                    return true;
                }
                return false;
          },
            getSelectBackgroundClass(user){
              if(user.status === 'NOT-SELECTED'){
                  return 'selectDefault';
              }
              return ("select"+ user.status)
          },
            changeUserStatus(user){
                let statusData = {
                    userID : user.id,
                    status : user.status
                };
                axios.post('/admin/business_support/update_status',statusData).then(
                    response => {
                        if(response.data.status === 'updated'){
                            if(response.data.color === 'LIGHTGREEN' || response.data.color === 'GREEN' ){
                                // approved : make a correspondent agent.
                                // post data :
                                let agent = {
                                    'user_id': user.id,
                                    'number' : 100,
                                    'name' : user.firstName + ' ' +user.lastName,
                                    'language' : 'NA',
                                    'hourly_rate' : '',
                                    'available_hours' : '',
                                    'location' : 'NA',
                                    'experience'  : 'NA'
                                };

                                axios.post('/workforce/add_agent',agent).then( (response) => {
                                    console.log(response.data);
                                });
                            }
                            // show changes are saved
                            $('#changesSaved').fadeIn('slow');
                            setTimeout(function () {
                                $('#changesSaved').fadeOut();
                            },2000);
                            this.updateOrder();
                        }
                    }
                );
            },
            changeUserStage(user){
              let statusData = {
                  userID : user.id,
                  stage  : user.stage
              };

              axios.post('/admin/business_support/update_stage',statusData).then(
                  response => {
                      if(response.data.status === 'updated'){
                          $('#changesSaved').fadeIn('slow');
                          setTimeout(function () {
                              $('#changesSaved').fadeOut();
                          },2000);
                      }
                  }
              );
            },
            updateOrder(){
                axios.get('/admin/get/business_support_users').then(
                    response => {
                        this.businessUsers = response.data.businessUsers;
                    }
                );
            },
            deleteUsers(){
                let toBeDeletedData ={
                    toBeDeletedUsers : this.selectedUsers
                };
                if(!confirm('Are you sure you want to delete all selected items ?')){
                    return;
                }
                axios.post('admin/delete_multiple',toBeDeletedData).then( (response) => {
                    this.updateOrder();
                    this.selectedUsers = [];
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    },2000);
                });
            },
            unShadeUser(user){
                if(user.is_shaded !== 'SHADED'){
                    return;
                }
                let userID = user.id;
                let statusData = {
                    userID : userID,
                };
                user.is_shaded = 'NOT-SHADED';
                axios.post('/admin/business_support/update_shaded_status',statusData).then(
                    response => {
                        if(response.data.status === 'updated'){
                        }
                    }
                );
            },

            filterByName(user,nameFilter){
                let userName =  (user.firstName +' '+ user.lastName).toLowerCase();
                if(userName.includes(nameFilter.toLowerCase()) || nameFilter.length < 1){
                    return true;
                }
                return false;
            },
            filterByStatus(user,currentFilter){
                if(currentFilter.includes(user.status) || !this.useFilter){
                    return true;
                }
                return false;
            },
            getNextPage(){
                if(this.currentPage < this.lastPage){
                    this.currentPage++;
                }
                this.getBusinessUsers();
            },
            getPreviousPage(){
                if(this.currentPage > 1){
                    this.currentPage--;
                }
                this.getBusinessUsers();
            }
        },
        mounted(){
            this.getBusinessUsers();
        }
    }
</script>
<style>
    .loader {
        border: 15px solid lightblue;
        border-radius: 50%;
        border-top: 15px solid #3498db;
        width: 150px;
        height: 150px;
        margin-right: 25px;
        margin-top: 50px;
        -webkit-animation: spin 2s linear infinite; /* Safari */
        animation: spin 2s linear infinite;
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .shaded{
        background: lightgrey;
    }
    .selectDefault{
        border-top: 6px solid white;
    }
    .selectGREY{
        border-top: 6px solid grey;
    }
    .selectRED{
        border-top: 6px solid red;
    }
    .selectGREEN{
        border-top: 6px solid green;
    }
    .selectLIGHTGREEN{
        border-top: 6px solid lightgreen;
    }
    .selectORANGE{
        border-top: 6px solid orange;
    }
    .float{
        position:fixed;
        width:100px;
        height:30px;
        bottom:40px;
        right:40px;
        background-color:red;
        color: #FFF !important;
        padding:5px;
        border-radius:10px;
        text-align:center;
        box-shadow: 2px 2px 3px #999;
    }

    .margin{
        margin: auto; margin-top: 100px;
    }

    .my-float{
        margin-top:22px;
    }
</style>
