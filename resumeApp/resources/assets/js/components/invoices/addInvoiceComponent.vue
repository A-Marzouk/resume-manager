<template>
    <div>
        <div class="modal fade" id="addInvoiceModal" tabindex="-1" role="dialog" aria-labelledby="addInvoiceModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="text-right" style="padding: 15px 10px 0 0;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeInvoiceModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/client/addinvoice/" method="post" @submit.prevent="submitForm">
                          <div class="row">
                              <div class="form-group col-md-6">
                                  <label for="hours" class="panelFormLabel">Hours :</label>
                                  <input type="number" class="form-control" autofocus id="hours" name="hours" v-model="toBeEditedInvoice.hours" required>
                              </div>
                              <div class="form-group col-md-6">
                                  <label for="rate" class="panelFormLabel">Hourly rate :</label>
                                  <select name="rate" class="form-control" id="rate" v-model="toBeEditedInvoice.rate">
                                      <option v-for="index in 42" :key="index" :value="(index+7+1)/2" v-show="(index+7+1)/2 !== 4.5">{{(index+7+1)/2}}</option>
                                  </select>
                              </div>
                              <div class="form-group col-md-6">
                                  <label for="total_amount" class="panelFormLabel">Total amount <small>(USD)</small> :</label>
                                  <input type="number" class="form-control" id="total_amount" name="total_amount" :placeholder="'Hours * Rate : '+toBeEditedInvoice.rate * toBeEditedInvoice.hours" v-model="toBeEditedInvoice.total_amount" required>
                              </div>

                              <div class="form-group col-md-6">
                                  <label for="agentName" class="panelFormLabel">Agent :</label>
                                  <input type="text" class="form-control" id="agentName" name="agentName" v-model="toBeEditedInvoice.agentName" required>
                              </div>

                              <div class="form-group col-md-6">
                                    <label for="service" class="panelFormLabel">Service :</label>
                                    <textarea class="form-control" rows="2" id="service" name="service" v-model="toBeEditedInvoice.service" required>
                                    </textarea>
                              </div>
                              <div class="form-group col-md-6">
                                  <label for="time_of_service" class="panelFormLabel">Time of service <small>(explained)</small> :</label>
                                  <textarea class="form-control" rows="2" id="time_of_service" name="time_of_service" v-model="toBeEditedInvoice.time_of_service" required>
                                    </textarea>
                              </div>
                              <div class="form-group col-md-6">
                                  <label for="notes" class="panelFormLabel">Notes <small>(optional)</small> :</label>
                                  <textarea class="form-control" rows="2" id="notes" name="notes" v-model="toBeEditedInvoice.notes">
                                    </textarea>
                              </div>
                              <div class="form-group col-6">
                                  <label for="status" class="panelFormLabel">Status :</label>
                                  <select  id="status" class="form-control" v-model="toBeEditedInvoice.status">
                                      <option disabled value="">Please select one</option>
                                      <option>Paid</option>
                                      <option>Unpaid</option>
                                  </select>
                              </div>
                              <div class="form-group col-6">
                                  <label for="status" class="panelFormLabel">Realted campaign brief :</label>
                                  <select  id="campBrief" class="form-control" v-model="toBeEditedInvoice.campaign_brief_id">
                                      <option disabled value="">Please select</option>
                                      <option v-for="(campBrief,index) in campBriefs" v-bind:key="index" :value="campBrief.id">
                                          {{campBrief.company_website}}
                                      </option>
                                  </select>
                              </div>
                              <div class="form-group col-6">
                                  <label for="currency" class="panelFormLabel">Currency :</label>
                                  <select  id="currency" class="form-control" v-model="toBeEditedInvoice.currency">
                                      <option disabled selected>Please select</option>
                                      <option value="USD" > USD </option>
                                      <!--<option value="CAD" > CAD </option>-->
                                      <!--<option value="AUD" > AUD </option>-->
                                      <!--<option value="NZD" > NZD </option>-->
                                      <!--<option value="GBP" > GBP </option>-->
                                  </select>
                              </div>
                              <div class="form-group col-6">
                                  <label for="invoiceWeek" class="panelFormLabel">Year - Week :</label>
                                  <input id="invoiceWeek" class="form-control" min="2019-W01" max="2020-W52" type="week" name="week" v-model="toBeEditedInvoice.week">
                                  <div style="padding-top:15px;" class="panelFormLabel" v-if="toBeEditedInvoice.week.length > 0">
                                      {{getDateOfISOWeek(toBeEditedInvoice.week.split('-')[1].replace('W',''),toBeEditedInvoice.week.split('-')[0])}}
                                  </div>
                              </div>
                              <div class="form-group col-6">
                                  <label for="timeZone" class="panelFormLabel">Time zone</label>
                                  <select class="form-control" id="timeZone" name="timeZone" v-model="toBeEditedInvoice.timeZone">
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
        props:['toBeEditedInvoice'],
        data(){
            return{
                campBriefs:[]
            }
        },
        methods:{
            submitForm(){
               // post data :
                axios.post('/admin/client/addinvoice',this.toBeEditedInvoice).then( (response) => {
                    if(this.toBeEditedInvoice.id === ""){
                        this.$emit('invoiceAdded',this.toBeEditedInvoice);
                    }
                    // save the education id :
                    this.toBeEditedInvoice.id = response.data.id;
                    this.toBeEditedInvoice.unique_number = response.data.unique_number;
                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    },2000);
                });
                $('#closeInvoiceModal').click();
            },
            getCampBriefs(){
                axios.get('/admin/workforce/get_cbriefs').then( response => {
                    this.campBriefs = response.data;
                });
            },
            getDateOfISOWeek(w, y) {
                var simple = new Date(y, 0, 1 + (w - 1) * 7);
                var dow = simple.getDay();
                var ISOweekStart = simple;
                if (dow <= 4)
                    ISOweekStart.setDate(simple.getDate() - simple.getDay() + 1);
                else
                    ISOweekStart.setDate(simple.getDate() + 8 - simple.getDay());

                return this.getDate(ISOweekStart);
            },
            getDate(date){
                let event = new Date(date);
                let options = { weekday: 'short', year: 'numeric', month: 'short', day: 'numeric' };
                return event.toLocaleDateString('en-EN', options);
            }
        },
        mounted(){
            this.getCampBriefs();
        }
    }
</script>