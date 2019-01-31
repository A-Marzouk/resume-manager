<template>
    <div>
        <transition-group name="list" class="row">
            <agent-component v-for="(agent,index) in agents" v-bind:key="index" class="list-item workExperience col-12" style="margin: 0px 10px 20px;">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Language</th>
                            <th scope="col">Recordings</th>
                            <th scope="col">Hourly rate</th>
                            <th scope="col">Experience</th>
                            <th scope="col">Available hours</th>
                            <th scope="col">Location</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="col">{{agent.number}}</td>
                            <td scope="col">{{agent.name}}</td>
                            <td scope="col">{{agent.language}}</td>
                            <td scope="col">Recordings</td>
                            <td scope="col">{{agent.hourly_rate}}</td>
                            <td scope="col">{{agent.experience}}</td>
                            <td scope="col">{{agent.available_hours}}</td>
                            <td scope="col">{{agent.location}}</td>
                            <td scope="col">
                                <span class="deleteWorkBtn NoDecor" @click="deleteAgent(agent)" style=" width: 75px; margin-right:10px;">
                                    <a href="javascript:void(0)">
                                        <img src="/resumeApp/resources/assets/images/close_blue.png" alt="edit profile">
                                        Delete
                                    </a>
                                </span>
                            </td>
                            <td scope="col">
                                <span class="deleteWorkBtn NoDecor"  @click="editAgent(agent.id)" style=" width: 75px; margin-right:10px;">
                    <a href="javascript:void(0)" data-target="#addAgentModal"  data-toggle="modal">
                        <img src="/resumeApp/resources/assets/images/edit_blue.png" alt="edit profile" style="width: 20px;
    padding-right: 7px;
    padding-bottom: 2px;
    height: 15px;">
                        Edit
                    </a>
                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </agent-component>
        </transition-group>

        <span class="deleteWorkBtn NoDecor" v-show="this.canAdd" @click="clearData" style="width:137px">
            <a href="javascript:void(0)" data-toggle="modal" data-target="#addAgentModal">
                <img src="/resumeApp/resources/assets/images/add_blue.png" alt="edit profile">
                Add agent
            </a>
        </span>
        <br/>
        <add-agent-modal @agentAdded="addAgent" :toBeEditedAgent="toBeEditedAgent"></add-agent-modal>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                agents: [],
                canAdd:true,
                toBeEditedAgent:{
                    'id':'',
                    'number' : '',
                    'name' : '',
                    'language' : '',
                    'hourly_rate' : '',
                    'available_hours' : '',
                    'location' : '',
                    'experience'  : ''
                }
            }
        },

        methods: {
            getCurrentAgents() {
                axios.get('/workforce/get_agents').then(
                    (response) => {
                        let currAgents =  response.data;
                        $.each(currAgents, function(i){
                            if(currAgents[i].currently_learning == "0") {
                                currAgents[i].currently_learning = false;
                            }else{
                                currAgents[i].currently_learning = true;
                            }
                        });
                        this.agents = currAgents;
                        this.checkMaxAgents();
                    }
                );
            },

            addAgent(newAgent) {
                this.agents.push(newAgent);
                this.checkMaxAgents();
            },

            deleteAgent(agent){
                if(!confirm('Are you sure you want to delete this agent ?')){
                    return;
                }
                axios.post('/workforce/delete_agent',{agentID:agent.id}).then((response)=>{
                    let agents = this.agents;
                    $.each(agents, function(i){
                        if(agents[i].id === agent.id) {
                            agents.splice(i,1);
                            return false;
                        }
                    });

                    // changes saved :
                    $('#changesSaved').fadeIn('slow');
                    setTimeout(function () {
                        $('#changesSaved').fadeOut();
                    },2000);

                    this.checkMaxAgents();

                });
            },

            editAgent(agentID){
                let agents = this.agents;
                let editedAgent =  {};

                $.each(agents, function(i){
                    if(agents[i].id === agentID){
                        editedAgent = agents[i];
                    }
                });
                this.toBeEditedAgent = editedAgent;
            },

            checkMaxAgents(){
                if(this.agents.length > 4){
                    this.canAdd =  false;
                }else{
                    this.canAdd = true;
                }
            },

            clearData(){
                this.toBeEditedAgent={
                    'id':'',
                    'number' : '',
                    'name' : '',
                    'language' : '',
                    'hourly_rate' : '',
                    'available_hours' : '',
                    'location' : '',
                    'experience'  : ''
                };
            }
        },

        created() {
            this.getCurrentAgents();
        }
    }
</script>

<style lang="css">
    .list-item {
        display: inline-block;
        margin-right: 10px;
    }
    .list-enter-active, .list-leave-active {
        transition: all 1s;
    }
    .list-enter, .list-leave-to /* .list-leave-active below version 2.1.8 */ {
        opacity: 0;
        transform: translateY(30px);
    }
</style>