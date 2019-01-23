<template>
    <div>
        <div class="modal fade" id="addShiftModal" tabindex="-1" role="dialog" aria-labelledby="addShiftModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="text-right" style="padding: 15px 10px 0 0;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeShiftModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="content">
                        <div class="form-group col-md-6">
                            <label for="start_time" class="panelFormLabel">Starts at :</label>
                            <input type="time" class="form-control" id="start_time" name="start_time" v-model="shift.start_time" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="end_time" class="panelFormLabel">Starts at :</label>
                            <input type="time" class="form-control" id="end_time" name="end_time" v-model="shift.end_time" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="panelFormLabel">Choose shift days :</label>
                            <div>
                                <input type="checkbox" value="all_dayes" v-model="shift.days">
                                All campaign days.
                            </div>
                            <div>
                                <input type="checkbox" value="" v-model="customDates" @click="customDates = !customDates ">
                                Custom days.
                            </div>
                            <div class="row" v-show="customDates">
                                <div class="col-md-3" v-for="(date,index) in getDates(new Date(toBeEditedCamp.start_date),new Date(toBeEditedCamp.end_date))">
                                    <input type="checkbox" :value="date" v-bind:key="index" v-model="shift.days">
                                    {{date}}
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
        props:['toBeEditedCamp'],
        data(){
            return{
                shift:{
                    'id'        :'',
                    'start_time':'',
                    'end_time'  :'',
                    'days'      :[],
                    campID      :''
                },
                datesArray:[],
                customDates:false
            }
        },
        methods:{
            addShift(){
                this.shift.campID = this.toBeEditedCamp.id ;
                axios.post('/admin/camp/add_shift',this.shift).then( (response) => {
                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    },2000);
                });

                this.toBeEditedCamp.shifts.push(this.shift);
                this.clearShiftData();
                $('#closeShiftModal').click();
            },
            clearShiftData(){
                this.shift={
                    'id'        :'',
                    'start_time':'',
                    'end_time'  :'',
                    'days'      :[],
                    campID      :''
                };
                this.customDates =false;
            },
            getDates(startDate, stopDate) {
                let oneDay = 24*3600*1000;
                for (var datesArray=[], ms = startDate*1 , last=stopDate*1 ; ms < last ; ms += oneDay){
                    let options = { weekday: 'short', year: 'numeric', month: 'short', day: 'numeric' };
                    datesArray.push( (new Date(ms)).toLocaleDateString('en-EN', options));
                }
                return datesArray;
            },
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