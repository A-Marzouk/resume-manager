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
                                    <label for="service" class="panelFormLabel">Service :</label>
                                    <textarea class="form-control" rows="3" id="service" name="service" v-model="toBeEditedInvoice.service" required>
                                    </textarea>
                              </div>
                              <div class="form-group col-md-12">
                                  <label for="time_of_service" class="panelFormLabel">Time of service <small>(explained)</small> :</label>
                                  <textarea class="form-control" rows="3" id="time_of_service" name="time_of_service" v-model="toBeEditedInvoice.time_of_service" required>
                                    </textarea>
                              </div>
                              <div class="form-group col-md-12">
                                  <label for="notes" class="panelFormLabel">Notes <small>(optional)</small> :</label>
                                  <textarea class="form-control" rows="3" id="notes" name="notes" v-model="toBeEditedInvoice.notes">
                                    </textarea>
                              </div>
                              <div class="form-group col-12">
                                  <label for="status" class="panelFormLabel">Status :</label>
                                  <select  id="status" class="form-control" v-model="toBeEditedInvoice.status">
                                      <option disabled value="">Please select one</option>
                                      <option>Paid</option>
                                      <option>Outstanding</option>
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
        },
        mounted(){
        }
    }
</script>