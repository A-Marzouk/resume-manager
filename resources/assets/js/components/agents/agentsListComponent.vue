<template>
  <div>
    <agent-component class="list-item workExperience col-12"
                     style="margin: 0px 10px 20px;">
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
          </tr>
        </thead>
        <tbody>
          <tr v-for="(agent,index) in agents"
              v-bind:key="index">
            <td scope="col">{{agent.number}}</td>
            <td scope="col">{{agent.name}}</td>
            <td scope="col">{{agent.language}}</td>
            <td scope="col">
              <div v-for="(record,index) in agent.records"
                   v-bind:key="index">
                <a :href="getRecordSrc(record)" target="_blank">{{record.title}}</a>
                <div v-show="admin"
                     class="deleteWorkBtn NoDecor"
                     @click="deleteAgentRecord(record.id)"
                     style=" width: 75px; float: none;">
                  <a href="javascript:void(0)">
                                                <img src="/images/close_blue.png" alt="edit profile">
                                                Delete
                                            </a>
                </div>
                <div v-show="index < agent.records.length-1">
                  <hr>
                </div>
              </div>
            </td>
            <td scope="col">{{agent.hourly_rate}}</td>
            <td scope="col">{{agent.experience}}</td>
            <td scope="col">{{agent.available_hours}}</td>
            <td scope="col">{{agent.location}}</td>
            <td v-show="admin"
                scope="col">
              <span class="deleteWorkBtn NoDecor" @click="deleteAgent(agent)" style=" width: 75px; margin-right:10px;">
                                            <a href="javascript:void(0)">
                                                <img src="/images/close_blue.png" alt="edit profile">
                                                Delete
                                            </a>
                                        </span>
            </td>
            <td v-show="admin"
                scope="col">
              <span class="deleteWorkBtn NoDecor"  @click="editAgent(agent.id)" style=" width: 75px; margin-right:10px;">
                            <a href="javascript:void(0)" data-target="#addAgentModal"  data-toggle="modal">
                                <img src="/images/edit_blue.png" alt="edit profile" style="width: 20px;
            padding-right: 7px;
            padding-bottom: 2px;
            height: 15px;">
                                Edit
                            </a>
                        </span>
            </td>
            <td v-show="admin"
                scope="col">
              <span class="deleteWorkBtn NoDecor" @click="editAgent(agent.id)" style=" width: 75px; margin-right:10px;">
                                        <a href="javascript:void(0)" data-target="#addAgentRecordModal"  data-toggle="modal">
                                            <img src="/images/add_blue.png" alt="edit profile">
                                            Record
                                        </a>
                                    </span>
            </td>
          </tr>
        </tbody>
      </table>
    </agent-component>
    <span v-show="admin" class="deleteWorkBtn NoDecor" @click="clearData" style="width:137px">
            <a href="javascript:void(0)" data-toggle="modal" data-target="#addAgentModal">
                <img src="/images/add_blue.png" alt="edit profile">
                Add agent
            </a>
        </span>
    <br />
    <add-agent-modal @agentAdded="addAgent"
                     :toBeEditedAgent="toBeEditedAgent"></add-agent-modal>
    <add-agent-record-modal :toBeEditedAgent="toBeEditedAgent"></add-agent-record-modal>
  </div>
</template>
<script>
export default {
  data() {
    return {
      agents: [],
      canAdd: true,
      admin: false,
      toBeEditedAgent: {
        'id': '',
        'number': '',
        'name': '',
        'language': '',
        'hourly_rate': '',
        'available_hours': '',
        'location': '',
        'experience': '',
        records: []
      }
    }
  },

  methods: {
    getCurrentAgents() {
      axios.get('/workforce/get_agents').then(
        (response) => {
          let currAgents = response.data;
          $.each(currAgents, function(i) {});
          this.agents = currAgents;
          this.checkMaxAgents();
        }
      );
    },

    addAgent(newAgent) {
      this.agents.push(newAgent);
      this.checkMaxAgents();
    },

    deleteAgent(agent) {
      if (!confirm('Are you sure you want to delete this agent ?')) {
        return;
      }
      axios.post('/workforce/delete_agent', { agentID: agent.id }).then((response) => {
        let agents = this.agents;
        $.each(agents, function(i) {
          if (agents[i].id === agent.id) {
            agents.splice(i, 1);
            return false;
          }
        });

        // changes saved :
        $('#changesSaved').fadeIn('slow');
        setTimeout(function() {
          $('#changesSaved').fadeOut();
        }, 2000);

        this.checkMaxAgents();

      });
    },
    deleteAgentRecord(record_id) {
      if (!confirm('Are you sure you want to delete this record ?')) {
        return;
      }
      axios.post('/workforce/agent/delete_record', { recordID: record_id }).then(response => {
        let agents = this.agents;
        $.each(agents, function(i) {
          $.each(agents[i].records, function(j) {
            if (agents[i].records[j].id === record_id) {
              agents[i].records.splice(j, 1);
              return false;
            }
          });
        });
      });
    },
    getRecordSrc(record) {
      if (!record.src.includes('resumeApp/uploads')) {
        return 'http://' + record.src;
      } else {
        return 'https://123workforce.com' + record.src;
      }
    },

    editAgent(agentID) {
      let agents = this.agents;
      let editedAgent = {};

      $.each(agents, function(i) {
        if (agents[i].id === agentID) {
          editedAgent = agents[i];
        }
      });
      this.toBeEditedAgent = editedAgent;
    },

    checkMaxAgents() {
      if (this.agents.length > 4) {
        this.canAdd = false;
      } else {
        this.canAdd = true;
      }
    },

    clearData() {
      this.toBeEditedAgent = {
        'id': '',
        'number': '',
        'name': '',
        'language': '',
        'hourly_rate': '',
        'available_hours': '',
        'location': '',
        'experience': '',
        records: []
      };
    },
    isAdmin() {
      axios.get('/workforce/isAdmin').then((response) => {
        if (response.data === 'admin') {
          this.admin = true;
        } else {
          this.admin = false;
        }
      });
    }
  },

  created() {
    this.isAdmin();
    this.getCurrentAgents();
  }
}
</script>
<style lang="css">
.list-item {
  display: inline-block;
  margin-right: 10px;
}

.list-enter-active,
.list-leave-active {
  transition: all 1s;
}

.list-enter,
.list-leave-to

/* .list-leave-active below version 2.1.8 */
  {
  opacity: 0;
  transform: translateY(30px);
}
</style>
