<template>
    <div>
        <div class="modal fade" id="addCBriefModal" tabindex="-1" role="dialog" aria-labelledby="addCBriefModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="text-right" style="padding: 15px 10px 0 0;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeCBriefModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/workforce/add_cbrief" method="post" @submit.prevent="submitForm">
                          <div class="row">
                              <div class="form-group col-md-6">
                                  <label for="hours_per_week" class="panelFormLabel">Hours per week :</label>
                                  <input type="number" class="form-control" autofocus id="hours_per_week" name="hours_per_week" v-model="toBeEditedCBrief.hours_per_week" required>
                              </div>
                              <div class="form-group col-md-6">
                                  <label for="weekly_rate" class="panelFormLabel">Weekly rate :</label>
                                  <input type="number" class="form-control" id="weekly_rate" name="weekly_rate" v-model="toBeEditedCBrief.weekly_rate" required>
                              </div>
                              <div class="form-group col-md-12">
                                  <label for="payment_method" class="panelFormLabel">Payment method :</label>
                                  <input type="text" class="form-control" id="payment_method" name="payment_method" v-model="toBeEditedCBrief.payment_method" required>
                              </div>
                              <div class="form-group col-md-12">
                                  <label for="campaign_manager" class="panelFormLabel">Campaign manager:</label>
                                  <input type="text" class="form-control" id="campaign_manager" name="campaign_manager" v-model="toBeEditedCBrief.campaign_manager" required>
                              </div>
                              <div class="form-group col-md-12">
                                  <label for="report_requirement" class="panelFormLabel">Report requirement:</label>
                                  <input type="text" class="form-control" id="report_requirement" name="report_requirement" v-model="toBeEditedCBrief.report_requirement" required>
                              </div>
                              <div class="form-group col-md-12">
                                  <label for="contract_terms" class="panelFormLabel">Contract terms:</label>
                                  <input type="text" class="form-control" id="contract_terms" name="contract_terms" v-model="toBeEditedCBrief.contract_terms" required>
                              </div>
                              <div class="form-group col-md-12">
                                  <label for="time_needed" class="panelFormLabel">Time needed:</label>
                                  <input type="text" class="form-control" id="time_needed" name="contract_terms" v-model="toBeEditedCBrief.time_needed" required>
                              </div>
                              <div class="form-group col-md-12">
                                  <label for="estimated_duration" class="panelFormLabel">Estimated duration:</label>
                                  <input type="text" class="form-control" id="estimated_duration" name="contract_terms" v-model="toBeEditedCBrief.estimated_duration" required>
                              </div>
                              <div class="form-group col-md-12">
                                  <label for="company_website" class="panelFormLabel">Company website:</label>
                                  <input type="text" class="form-control" id="company_website" name="company_website" v-model="toBeEditedCBrief.company_website" required>
                              </div>
                              <div class="form-group col-md-12">
                                    <label for="company_values" class="panelFormLabel">Company values :</label>
                                    <textarea class="form-control" rows="2" id="company_values" name="company_values" v-model="toBeEditedCBrief.company_values" required>
                                    </textarea>
                              </div>
                              <div class="form-group col-md-12">
                                    <label for="client_contact" class="panelFormLabel">Client contact:</label>
                                    <textarea class="form-control" rows="2" id="client_contact" name="company_values" v-model="toBeEditedCBrief.client_contact" required>
                                    </textarea>
                              </div>
                              <div class="form-group col-md-12">
                                    <label for="objective" class="panelFormLabel">Objective:</label>
                                    <textarea class="form-control" rows="2" id="objective" name="objective" v-model="toBeEditedCBrief.objective" required>
                                    </textarea>
                              </div>
                              <div class="form-group col-md-12">
                                    <label for="email_pitch" class="panelFormLabel">Email pitch:</label>
                                    <textarea class="form-control" rows="2" id="email_pitch" name="email_pitch" v-model="toBeEditedCBrief.email_pitch" required>
                                    </textarea>
                              </div>
                              <div class="form-group col-md-12">
                                    <label for="phone_pitch" class="panelFormLabel">Phone pitch:</label>
                                    <textarea class="form-control" rows="2" id="phone_pitch" name="phone_pitch" v-model="toBeEditedCBrief.phone_pitch" required>
                                    </textarea>
                              </div>
                              <div class="form-group col-md-12">
                                    <label for="data_systems" class="panelFormLabel">Data systems:</label>
                                    <textarea class="form-control" rows="2" id="data_systems" name="data_systems" v-model="toBeEditedCBrief.data_systems" required>
                                    </textarea>
                              </div>
                              <div class="form-group col-md-6">
                                  <label for="start_date" class="panelFormLabel">Starts at :</label>
                                  <input type="date" class="form-control" id="start_date" name="start_date" v-model="toBeEditedCBrief.start_date" required>
                              </div>
                              <div class="form-group">
                                  <label for="time_zone" class="formLabel">Time zone :</label>

                                  <div class="">
                                      <select class="form-control" id="time_zone" name="time_zone" v-model="toBeEditedCBrief.time_zone" style="height: 50px;">
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
        props:['toBeEditedCBrief'],
        data(){
            return{
            }
        },
        methods:{
            submitForm(){
               // post data :
                axios.post('/admin/workforce/add_cbrief',this.toBeEditedCBrief).then( (response) => {
                    if(this.toBeEditedCBrief.id === ""){
                        this.$emit('cBriefAdded',this.toBeEditedCBrief);
                    }
                    // save the education id :
                    this.toBeEditedCBrief.id = response.data.id;
                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    },2000);
                });
                $('#closeCBriefModal').click();
            },
        },
        mounted(){
        }
    }
</script>