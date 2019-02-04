<template>
    <div>
        <div class="modal fade" id="addInvoiceModal" tabindex="-1" role="dialog" aria-labelledby="addInvoiceModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
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
                                  <label for="rate" class="panelFormLabel">Rate :</label>
                                  <input type="number" class="form-control" id="rate" name="rate" v-model="toBeEditedInvoice.rate" required>
                              </div>
                              <div class="form-group col-md-12">
                                  <label for="total_amount" class="panelFormLabel">Total amount <small>(USD)</small> :</label>
                                  <input type="number" class="form-control" id="total_amount" name="total_amount" :placeholder="'Hours * Rate : '+toBeEditedInvoice.rate * toBeEditedInvoice.hours" v-model="toBeEditedInvoice.total_amount" required>
                              </div>

                              <div class="form-group col-md-12">
                                  <label for="agentName" class="panelFormLabel">Agent :</label>
                                  <input type="text" class="form-control" id="agentName" name="agentName" v-model="toBeEditedInvoice.agentName" required>
                              </div>

                              <div class="form-group col-md-12">
                                    <label for="service" class="panelFormLabel">Service :</label>
                                    <textarea class="form-control" rows="2" id="service" name="service" v-model="toBeEditedInvoice.service" required>
                                    </textarea>
                              </div>
                              <div class="form-group col-md-12">
                                  <label for="time_of_service" class="panelFormLabel">Time of service <small>(explained)</small> :</label>
                                  <textarea class="form-control" rows="2" id="time_of_service" name="time_of_service" v-model="toBeEditedInvoice.time_of_service" required>
                                    </textarea>
                              </div>
                              <div class="form-group col-md-12">
                                  <label for="notes" class="panelFormLabel">Notes <small>(optional)</small> :</label>
                                  <textarea class="form-control" rows="2" id="notes" name="notes" v-model="toBeEditedInvoice.notes">
                                    </textarea>
                              </div>
                              <div class="form-group col-12">
                                  <label for="status" class="panelFormLabel">Status :</label>
                                  <select  id="status" class="form-control" v-model="toBeEditedInvoice.status">
                                      <option disabled value="">Please select one</option>
                                      <option>Paid</option>
                                      <option>Unpaid</option>
                                  </select>
                              </div>
                              <div class="form-group col-12">
                                  <label for="status" class="panelFormLabel">Realted campaign brief :</label>
                                  <select  id="campBrief" class="form-control" v-model="toBeEditedInvoice.campaign_brief_id">
                                      <option disabled value="">Please select</option>
                                      <option v-for="(campBrief,index) in campBriefs" v-bind:key="index" :value="campBrief.id">
                                          {{campBrief.company_website}}
                                      </option>
                                  </select>
                              </div>
                              <div class="form-group col-12">
                                  <label for="timeZone" class="panelFormLabel">Time zone</label>

                                  <div class="">
                                      <select class="form-control" id="timeZone" name="timeZone" v-model="toBeEditedInvoice.timeZone">
                                          <option value="" selected="selected">Select your timezone</option>
                                          <option value="(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima">(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima</option>
                                          <option value="(GMT -6:00) Central Time (US & Canada), Mexico City">(GMT -6:00) Central Time (US & Canada), Mexico City</option>
                                          <option value="(GMT -7:00) Mountain Time (US & Canada)">(GMT -7:00) Mountain Time (US & Canada)</option>
                                          <option value="(GMT -8:00) Pacific Time (US & Canada)">(GMT -8:00) Pacific Time (US & Canada)</option>
                                          <option value="(GMT -9:00) Alaska">(GMT -9:00) Alaska</option>
                                          <option value="">--------------</option>
                                          <option value="(GMT -12:00) Eniwetok, Kwajalein">(GMT -12:00) Eniwetok, Kwajalein</option>
                                          <option value="(GMT -11:00) Midway Island, Samoa">(GMT -11:00) Midway Island, Samoa</option>
                                          <option value="(GMT -10:00) Hawaii">(GMT -10:00) Hawaii</option>
                                          <option value="(GMT -9:30) Taiohae">(GMT -9:30) Taiohae</option>
                                          <option value="(GMT -9:00) Alaska">(GMT -9:00) Alaska</option>
                                          <option value="(GMT -8:00) Pacific Time (US & Canada)">(GMT -8:00) Pacific Time (US & Canada)</option>
                                          <option value="(GMT -7:00) Mountain Time (US & Canada)">(GMT -7:00) Mountain Time (US & Canada)</option>
                                          <option value="(GMT -6:00) Central Time (US & Canada), Mexico City">(GMT -6:00) Central Time (US & Canada), Mexico City</option>
                                          <option value="(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima">(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima</option>
                                          <option value="(GMT -4:30) Caracas">(GMT -4:30) Caracas</option>
                                          <option value="(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz">(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz</option>
                                          <option value="(GMT -3:30) Newfoundland">(GMT -3:30) Newfoundland</option>
                                          <option value="(GMT -3:00) Brazil, Buenos Aires, Georgetown">(GMT -3:00) Brazil, Buenos Aires, Georgetown</option>
                                          <option value="(GMT -2:00) Mid-Atlantic">(GMT -2:00) Mid-Atlantic</option>
                                          <option value="(GMT -1:00) Azores, Cape Verde Islands">(GMT -1:00) Azores, Cape Verde Islands</option>
                                          <option value="(GMT +0:00) Western Europe Time, London, Lisbon, Casablanca">(GMT +0:00) Western Europe Time, London, Lisbon, Casablanca</option>
                                          <option value="(GMT +1:00) Brussels, Copenhagen, Madrid, Paris">(GMT +1:00) Brussels, Copenhagen, Madrid, Paris</option>
                                          <option value="(GMT +2:00) Kaliningrad, South Africa">(GMT +2:00) Kaliningrad, South Africa</option>
                                          <option value="(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg">(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg</option>
                                          <option value="(GMT +3:30) Tehran">(GMT +3:30) Tehran</option>
                                          <option value="(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi">(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi</option>
                                          <option value="(GMT +4:30) Kabul">(GMT +4:30) Kabul</option>
                                          <option value="(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent">(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
                                          <option value="(GMT +5:30) Bombay, Calcutta, Madras, New Delhi">(GMT +5:30) Bombay, Calcutta, Madras, New Delhi</option>
                                          <option value="(GMT +5:45) Kathmandu, Pokhara">(GMT +5:45) Kathmandu, Pokhara</option>
                                          <option value="(GMT +6:00) Almaty, Dhaka, Colombo">(GMT +6:00) Almaty, Dhaka, Colombo</option>
                                          <option value="(GMT +6:30) Yangon, Mandalay">(GMT +6:30) Yangon, Mandalay</option>
                                          <option value="(GMT +7:00) Bangkok, Hanoi, Jakarta">(GMT +7:00) Bangkok, Hanoi, Jakarta</option>
                                          <option value="(GMT +8:00) Beijing, Perth, Singapore, Hong Kong">(GMT +8:00) Beijing, Perth, Singapore, Hong Kong</option>
                                          <option value="(GMT +8:45) Eucla">(GMT +8:45) Eucla</option>
                                          <option value="(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk">(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
                                          <option value="(GMT +9:30) Adelaide, Darwin">(GMT +9:30) Adelaide, Darwin</option>
                                          <option value="(GMT +10:00) Eastern Australia, Guam, Vladivostok">(GMT +10:00) Eastern Australia, Guam, Vladivostok</option>
                                          <option value="(GMT +10:30) Lord Howe Island">(GMT +10:30) Lord Howe Island</option>
                                          <option value="(GMT +11:00) Magadan, Solomon Islands, New Caledonia">(GMT +11:00) Magadan, Solomon Islands, New Caledonia</option>
                                          <option value="(GMT +11:30) Norfolk Island">(GMT +11:30) Norfolk Island</option>
                                          <option value="(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka">(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka</option>
                                          <option value="(GMT +12:45) Chatham Islands">(GMT +12:45) Chatham Islands</option>
                                          <option value="(GMT +13:00) Apia, Nukualofa">(GMT +13:00) Apia, Nukualofa</option>
                                          <option value="(GMT +14:00) Line Islands, Tokelau">(GMT +14:00) Line Islands, Tokelau</option>
                                      </select>
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
            }
        },
        mounted(){
            this.getCampBriefs();
        }
    }
</script>