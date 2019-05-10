<template>
    <div>
        <div class="modal fade" id="addServiceModal" tabindex="-1" role="dialog" aria-labelledby="addServiceModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="text-right" style="padding: 15px 10px 0 0;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeServiceModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body row" id="content">
                        <div class="form-group col-md-6">
                            <label for="service_required" class="panelFormLabel">Service required :</label>
                            <input type="text" class="form-control" id="service_required" name="service_required" v-model="service.service_required" required>
                        </div>


                        <div class="form-group col-md-6">
                            <label for="hourly_rate" class="panelFormLabel">Hourly rate:</label>
                            <input type="number" class="form-control" id="hourly_rate" name="hourly_rate" v-model="service.hourly_rate" required>
                        </div>


                        <div class="form-group col-md-6">
                            <label for="hours" class="panelFormLabel">Hours:</label>
                            <input type="number" class="form-control" id="hours" name="hours" v-model="service.hours" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="language" class="panelFormLabel">Language needed :</label>
                            <input type="text" class="form-control" id="language" name="language" v-model="service.language" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="number_of_agents" class="panelFormLabel">Number of agents:</label>
                            <input type="number" class="form-control" id="number_of_agents" name="number_of_agents" v-model="service.number_of_agents" required>
                        </div>


                        <div class="form-group col-md-6">
                            <label for="agent_location" class="panelFormLabel">Agent location:</label>
                            <input type="text" class="form-control" id="agent_location" name="agent_location" v-model="service.agent_location" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="agent_experience" class="panelFormLabel">Agent experience :</label>
                            <textarea class="form-control" rows="3" id="agent_experience" name="agent_experience" v-model="service.agent_experience" required>
                                    </textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <a href="javascript:void(0)" @click="addService" class="btn btn-primary">Add</a>
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
                service:{
                    'id'        :'',
                    'service_required':'',
                    'hours'  :'',
                    'hourly_rate'  :'',
                    'language'  :'',
                    'agent_location'  :'',
                    'number_of_agents'  :'',
                    'agent_experience'  :'',
                     campaign_brief_id      :''
                },
            }
        },
        methods:{
            addService(){
                this.service.campaign_brief_id = this.toBeEditedCBrief.id ;
                axios.post('/admin/workforce/add_cbrief_service',this.service).then( (response) => {
                    // changes saved :
                    console.log(response.data);
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    },2000);
                });

                this.toBeEditedCBrief.services.push(this.service);
                this.clearServiceData();
                $('#closeServiceModal').click();
            },
            clearServiceData(){
                this.service={
                    'id'        :'',
                    'service_required':'',
                    'hours'  :'',
                    'hourly_rate'  :'',
                    'language'  :'',
                    'agent_location'  :'',
                    'number_of_agents'  :'',
                    'agent_experience'  :'',
                    campaign_brief_id      :''
                };
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