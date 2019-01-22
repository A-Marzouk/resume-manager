<template>
    <div>
        <div class="modal fade" id="addCampModal" tabindex="-1" role="dialog" aria-labelledby="addCampModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="text-right" style="padding: 15px 10px 0 0;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeCampModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/camps/add" method="post" @submit.prevent="submitForm">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="title" class="panelFormLabel">Title :</label>
                                    <input type="text" class="form-control" id="title" name="title" v-model="toBeEditedCamp.title" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="description" class="panelFormLabel">Description :</label>
                                    <textarea class="form-control" rows="3" id="description" name="description" v-model="toBeEditedCamp.description" required>
                                    </textarea>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="time" class="panelFormLabel">Starts at :</label>
                                    <input type="date" class="form-control" id="time" name="time" v-model="toBeEditedCamp.start_date" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="Budget" class="panelFormLabel">Ends at :</label>
                                    <input type="date" class="form-control" id="Budget" name="Budget" v-model="toBeEditedCamp.end_date" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="status" class="panelFormLabel">Status :</label>
                                    <input type="text" class="form-control" id="status" name="status" v-model="toBeEditedCamp.status">
                                </div>

                                <div class="form-group col-12">
                                    <label for="client_id" class="panelFormLabel">Choose client :</label>
                                    <select  id="client_id" class="form-control" v-model="toBeEditedCamp.client_id" @change="setClientName">
                                        <option disabled value="">Please select one</option>
                                        <option v-for="(client,index) in clients" v-bind:key="index" :value="client.id" >
                                            {{client.name}} ({{client.email}})
                                        </option>
                                    </select>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">
                                    <div v-if="this.toBeEditedCamp.id != '' ">
                                       Update
                                    </div>
                                    <div v-else>
                                       Create
                                    </div>
                                </button>
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
        props:['toBeEditedCamp'],
        data(){
            return{
                clients:[],
            }
        },
        methods:{
            submitForm(){
                // post data :
                axios.post('/admin/camps/add',this.toBeEditedCamp).then( (response) => {
                    //
                    if(this.toBeEditedCamp.id === ""){
                        this.$emit('campAdded',this.toBeEditedCamp);
                    }
                    // save the camp id :
                    this.toBeEditedCamp.id = response.data.id;
                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    },2000);
                });
                $('#closeCampModal').click();
            },
            getClients(){
                axios.get('/admin/get_clients').then( (response)=>{
                    let currClients = response.data;
                    this.clients  = currClients ;
                });
            },
            setClientName(){
                let client_id = this.toBeEditedCamp.client_id ;
                $.each(this.clients,(i) => {
                    if(this.clients[i].id == client_id){
                        this.toBeEditedCamp.clientName = this.clients[i].name;
                    }
                });
            },
        },
        mounted(){
            this.getClients();
        }
    }
</script>