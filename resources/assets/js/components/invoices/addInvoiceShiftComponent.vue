<template>
    <div>
        <div class="modal fade" id="addInvoiceShiftModal" tabindex="-1" role="dialog" aria-labelledby="addInvoiceShiftModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="text-right" style="padding: 15px 10px 0 0;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeInvoiceShiftModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body row" id="content">
                        <div class="form-group col-md-6">
                            <label for="start_time" class="panelFormLabel">Starts at :</label>
                            <input type="time" class="form-control" id="start_time" name="start_time" v-model="shift.start_time" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="end_time" class="panelFormLabel">Starts at :</label>
                            <input type="time" class="form-control" id="end_time" name="end_time" v-model="shift.end_time" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="rate" class="panelFormLabel">Rate :</label>
                            <input type="number" class="form-control" id="rate" name="rate" v-model="shift.rate" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="service" class="panelFormLabel">Service</label>
                            <select name="service" id="service" class="form-control" v-model="shift.service">
                                <option v-for="(service,index) in services" v-bind:key="Math.random()" :value="service">
                                    {{service}}
                                </option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <label class="panelFormLabel">Choose days :</label>
                                <div class="row" v-show="!shift.days.includes('all_days')">
                                    <div class="col-md-2" v-for="(day,index) in daysOfWeek" v-bind:key="Math.random()">
                                        <input type="checkbox" :value="day" v-model="shift.days">
                                        {{day}}
                                    </div>
                                </div>
                                <div>
                                    <br/>
                                    <input type="checkbox" value="all_days" :checked="shift.days.includes('all_days')" v-model="shift.days">
                                    All business days.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="javascript:void(0)" @click="addShift" class="btn btn-primary">Add</a>
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
                shift:{
                    'id'        :'',
                    'start_time':'',
                    'end_time'  :'',
                    'rate'      :'',
                    'service'   :'',
                    'days'      :[],
                    invoiceID   :''
                },
                daysOfWeek:[
                    'Mon','Tue','Wed','Thu','Fri'
                ],
                services:[
                    'Appointment Setting','Business Development','Data Entry/List building','Telesales','Telemarketing'
                ]
            }
        },
        methods:{
            addShift(){
                this.shift.invoiceID = this.toBeEditedInvoice.id ;
                axios.post('/admin/camp/add_shift',this.shift).then( (response) => {
                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    },2000);
                });

                this.toBeEditedInvoice.shifts.push(this.shift);
                this.clearShiftData();
                $('#closeInvoiceShiftModal').click();
            },
            clearShiftData(){
                this.shift={
                    'id'        :'',
                    'start_time':'',
                    'end_time'  :'',
                    'days'      :[],
                    'rate'      :'',
                    'service'   :'',
                    invoiceID      :''
                };
            }
        },
        mounted(){

        }
    }
</script>

<style lang="css">
    .list-item {
        display: inline-block;
        margin-right: 10px;
    }
    .list-enter-active, .list-leave-active {
        transition: all 2s;
    }
    .list-enter, .list-leave-to /* .list-leave-active below version 2.1.8 */ {
        opacity: 0;
        transform: translateY(30px);
    }
</style>
