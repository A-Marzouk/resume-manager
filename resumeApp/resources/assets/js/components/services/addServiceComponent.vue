<template>
    <div>
        <div class="modal fade" id="addInvoiceServiceModal" tabindex="-1" role="dialog" aria-labelledby="addServiceeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="text-right" style="padding: 15px 10px 0 0;">
                        <button type="button" @click="clearSendData" class="close" data-dismiss="modal" aria-label="Close" id="closeInvoiceModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/client/addservice/" method="post" @submit.prevent="submitForm">
                          <div class="row">
                              <div class="form-group col-md-12">
                                  <label for="title" class="panelFormLabel">Title :</label>
                                  <input type="text" class="form-control" id="title" name="title" v-model="toBeEditedService.title" required>
                              </div>
                              <div class="form-group col-md-12">
                                  <label for="user_id" class="panelFormLabel">Agent :</label>
                                  <select class="form-control" id="user_id" @change="selectAgent" v-model="currentSelectedAgent">
                                      <option v-for="(agent,index) in agents" :key="index" :value="agent">
                                          {{agent.firstName}} {{agent.lastName}}
                                      </option>
                                  </select>
                                  <br/>
                                  <div class="panelFormLabel" v-show="selectedAgents.length > 0">
                                      <span style="color: white; background: lightgreen; padding: 5px; margin: 5px;"
                                            v-for="(agent,index) in selectedAgents" v-bind:key="'a'+index">
                                          {{agent.firstName}} {{agent.lastName}}
                                          <a href="javascript:void(0)" @click="removeSelectedAgent(agent.id)">X</a>
                                      </span>
                                  </div>
                                  <span v-if="toBeEditedService.selectedAgents !== undefined" class="d-none">
                                      {{selectedAgents = toBeEditedService.selectedAgents}}
                                  </span>
                                  <br/>
                                  <div v-show="selectedAgents.length > 0">
                                      <a href="javascript:void(0)" class="btn btn-primary" @click="sendEmailToAgent">
                                          Send notification to selected agents.
                                      </a>
                                  </div>
                                  <div class="alert-info" style="padding: 10px;" v-show="sendNotificationToAgentStatus.length > 0">
                                      {{sendNotificationToAgentStatus}}
                                  </div>
                              </div>
                              <!-- agent -->
                              <div class="form-group col-md-6">
                                  <label for="hours" class="panelFormLabel">Hours :</label>
                                  <input type="number" class="form-control" autofocus id="hours" name="hours" v-model="toBeEditedService.hours" required>
                              </div>
                              <!-- hours -->
                              <div class="form-group col-md-6">
                                  <label for="rate" class="panelFormLabel">Hourly rate :</label>
                                  <select name="rate" class="form-control" id="rate" v-model="toBeEditedService.rate">
                                      <option v-for="index in 42" :key="index" :value="(index+6+1)/2" v-show="(index+6+1)/2 !== 3.5">{{(index+6+1)/2}}</option>
                                      <option value="25">25</option>
                                  </select>
                              </div>


                              <div class="form-group col-md-6">
                                  <label for="total_amount" class="panelFormLabel">Total amount <small>(USD)</small> :</label>
                                  <input type="number" class="form-control" id="total_amount" name="total_price" :placeholder="'Hours * Rate : '+toBeEditedService.rate * toBeEditedService.hours" v-model="toBeEditedService.total_price" required>
                              </div>
                              <!---------------------- time ----------------------------->
                              <div class="form-group col-6">
                                  <label for="timeZone" class="panelFormLabel">Time zone</label>
                                  <select class="form-control" id="timeZone" name="timeZone" v-model="toBeEditedService.timeZone">
                                      <option value="" selected="selected">Select your timezone</option>
                                      <option value="(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima">(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima</option>
                                      <option value="(GMT -6:00) Central Time (US & Canada), Mexico City">(GMT -6:00) Central Time (US & Canada), Mexico City</option>
                                      <option value="(GMT -7:00) Mountain Time (US & Canada)">(GMT -7:00) Mountain Time (US & Canada)</option>
                                      <option value="(GMT -8:00) Pacific Time (US & Canada)">(GMT -8:00) Pacific Time (US & Canada)</option>
                                      <option value="(GMT +0:00) Western Europe Time, London, Lisbon, Casablanca">(GMT +0:00) Western Europe Time, London, Lisbon, Casablanca</option>
                                      <option value="(GMT +8:00) Beijing, Perth, Singapore, Hong Kong">(GMT +8:00) Beijing, Perth, Singapore, Hong Kong</option>
                                      <option value="(GMT +8:45) Eucla">(GMT +8:45) Eucla</option>
                                      <option value="(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk">(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
                                      <option value="(GMT +9:30) Adelaide, Darwin">(GMT +9:30) Adelaide, Darwin</option>
                                      <option value="(GMT +10:00) Eastern Australia, Guam, Vladivostok">(GMT +10:00) Eastern Australia, Guam, Vladivostok</option>
                                      <option value="(GMT +10:30) Lord Howe Island">(GMT +10:30) Lord Howe Island</option>
                                  </select>
                              </div>
                              <div class="form-group col-6">
                                  <label for="invoiceWeek" class="panelFormLabel">Year - Week :</label>
                                  <input @change="setWeekDate" id="invoiceWeek" class="form-control" min="2019-W01" max="2020-W52" type="week" name="week" v-model="toBeEditedService.week">
                                  <div style="padding-top:3px;" class="panelFormLabel" v-if="toBeEditedService.week != null">
                                      {{toBeEditedService.weekDate}}
                                  </div>
                              </div>
                              <div class="form-group col-md-12">
                                  <div class="form-group">
                                      <label class="panelFormLabel">Choose days :</label>
                                      <div class="row" v-show="!toBeEditedService.days.includes('all_days')">
                                          <div class="col-md-2" v-for="(day,index) in daysOfWeek" v-bind:key="index">
                                              <input type="checkbox" :value="day" v-model="toBeEditedService.days">
                                              {{day}}
                                          </div>
                                      </div>
                                      <div>
                                          <br/>
                                          <input type="checkbox" value="all_days" :checked="toBeEditedService.days.includes('all_days')" v-model="toBeEditedService.days">
                                          All business days.
                                      </div>
                                  </div>
                              </div>
                          </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['toBeEditedService'],
        data(){
            return{
                agents:[],
                selectedAgents:[],
                currentSelectedAgent:'Select agents',
                customDays:false,
                daysOfWeek:[
                 'Mon','Tue','Wed','Thu','Fri'
                ],
                sendNotificationToAgent:false,
                sendNotificationToAgentStatus:''
            }
        },
        methods:{
            selectAgent(){
              this.selectedAgents.push(this.currentSelectedAgent);
            },
            removeSelectedAgent(agent_id){
                let agents = this.selectedAgents;
                $.each(agents, function(i){
                    if(agents[i].id === agent_id) {
                        agents.splice(i,1);
                        return false;
                    }
                });
            },
            submitForm(){
               // post data :
                this.toBeEditedService.selectedAgents = this.selectedAgents;
                this.toBeEditedService.agents = this.selectedAgents;
                axios.post('/admin/client/addservice',this.toBeEditedService).then( (response) => {
                    if(this.toBeEditedService.id === ""){
                        this.$emit('serviceAdded',this.toBeEditedService);
                    }
                    let saved = true;
                    if(typeof response.data.hasErrors !== 'undefined'){
                        $('#servicesErrors').removeClass('d-none');
                        setTimeout(function () {
                            $('#servicesErrors').addClass('d-none');
                        },2000);
                        saved = false;
                        console.log(response.data.hasErrors);
                    }
                    // save the service id :
                    this.toBeEditedService.id = response.data.id;
                    if(saved){
                        this.changesSavedNotification();
                    }
                });
                $('#closeInvoiceModal').click();
            },
            clearSendData(){
                this.sendNotificationToAgent=false;
                this.sendNotificationToAgentStatus='';
            },
            changesSavedNotification(){
                // changes saved :
                $('#changesSaved').fadeIn('slow');
                setTimeout(function () {
                    $('#changesSaved').fadeOut();
                },2000);

            },
            setWeekDate(){
                if(this.toBeEditedService.week !== null){
                    this.toBeEditedService.weekDate =
                        this.getDateOfISOWeek(this.toBeEditedService.week.split('-')[1].replace('W',''),this.toBeEditedService.week.split('-')[0]);
                }
              },
            updateAgent(agent_id){
                $.each(this.agents, (i)=>{
                    if(this.agents[i].id == agent_id){
                        this.toBeEditedService.agent = this.agents[i];
                    }
                });
                this.sendNotificationToAgent = true;
            },
            getDateOfISOWeek(w, y) {
                var simple = new Date(y, 0, 1 + (w - 1) * 7);
                var dow = simple.getDay();
                var ISOweekStart = simple;
                if (dow <= 4)
                    {ISOweekStart.setDate(simple.getDate() - simple.getDay() + 1);}
                else
                    {ISOweekStart.setDate(simple.getDate() + 8 - simple.getDay());}
                return this.getDate(ISOweekStart);

            },
            getDate(date){
                let event = new Date(date);
                let options = { weekday: 'short', year: 'numeric', month: 'short', day: 'numeric' };
                return event.toLocaleDateString('en-EN', options);
            },
            getAgents(){
                axios.get('/admin/get_users').then(response=>{
                    this.agents = response.data;
                });
            },
            sendEmailToAgent(){
                axios.post('/admin/send_invoice_email',{invoice:this.toBeEditedInvoice}).then( (response) => {
                    if(response.data === 'emailSent'){
                        this.sendNotificationToAgentStatus = 'Email has been sent';
                    }else{
                        this.sendNotificationToAgentStatus = 'Error while sending email';
                    }
                    this.sendNotificationToAgent = false;
                    setTimeout(() => {
                        this.sendNotificationToAgentStatus = '';
                    },5000);
                } );
            }
        },
        mounted(){
            this.getAgents();
        }
    }
</script>