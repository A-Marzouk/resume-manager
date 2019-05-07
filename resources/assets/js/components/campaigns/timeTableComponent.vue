<template>
  <div style="padding-top:20px;">
    <div v-for="(shift,index) in shifts"
         v-bind:key="index">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col"
                class="text-center">Time</th>
            <th scope="col"
                v-for="(day,index) in shift.daysArray"
                v-bind:key="index"
                style="color:#218dce;">{{day.date}}</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">
              Start at : <span style="color:#218dce;">{{shift.start_time}}</span><br />
              Ends at :<span style="color:#218dce;">{{shift.end_time}}</span>
            </th>
            <td v-for="(day,index) in shift.daysArray"
                v-bind:key="index">
              <!--
                                here we need to choose to add one of the members so each day has shift id and has
                            -->
              <div v-for="(user,index) in day.users"
                   v-bind:key="index"
                   class="log">
                {{user.firstName}} {{user.lastName}}
                <span class="deleteWorkBtn NoDecor" @click="deleteDayUser(user,day)" style="padding:10px; width: 15px;border: none;">
                                    <a href="javascript:void(0)">
                                        <img src="/images/close_blue.png" alt="edit profile">
                                    </a>
                                </span>
              </div>
              <hr>
              <div class="form-group">
                <select class="form-control"
                        @change="updateDayAgents(day)"
                        v-model="selectedUser">
                  <option disabled
                          selected>Add agent</option>
                  <option :value="member"
                          v-for="(member,index) in members"
                          v-bind:key="index">
                    {{member.firstName}} {{member.lastName}}
                  </option>
                </select>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
<script>
export default {
  props: ['campaign_id'],
  data() {
    return {
      shifts: [],
      members: [],
      selectedUser: 'Add agent'
    }
  },
  methods: {
    updateDayAgents(day) {
      // post data :
      let selectedUserID = this.selectedUser.id;
      this.selectedUser = 'Add agent';
      axios.post('/admin/camps/add_user_to_day', { dayID: day.id, selectedUser: selectedUserID }).then((response) => {
        if (response.data === 'user_exists') {
          alert('User Already exists.');
          return;
        }
        day.users.push(response.data);
        // changes saved :
        $('#changesSaved').fadeIn('slow');
        setTimeout(function() {
          $('#changesSaved').fadeOut();
        }, 2000);
      });
    },
    submitForm() {

    },
    getCampMembers() {
      axios.get('/admin/camps/get_camp_members/' + this.campaign_id).then(
        response => {
          this.members = response.data;
        }
      );
    },
    getCampShifts() {
      axios.get('/admin/camps/get_camp_shifts/' + this.campaign_id).then(
        response => {
          this.shifts = response.data;
        }
      );
    },
    deleteDayUser(user, day) {
      $.each(day.users, function(i) {
        if (day.users[i].id === user.id) {
          day.users.splice(i, 1);
          return false;
        }
      });
      axios.post('/admin/camps/remove_user_from_day', { dayID: day.id, selectedUser: user.id }).then((response) => {
        // changes saved :
        $('#changesSaved').fadeIn('slow');
        setTimeout(function() {
          $('#changesSaved').fadeOut();
        }, 2000);
      });
    },
    getImageSrc(userImage) {
      if (!userImage || userImage === null) {
        return '/images/user.png';
      }

      if (userImage.charAt(0) !== 'h') {
        return '/' + userImage;
      }

      return userImage;
    },
  },
  mounted() {
    this.getCampMembers();
    this.getCampShifts();
  }
}
</script>
<style>
.memberImg {
  width: 150px;
  height: 150px;
  border-radius: 50%;
  border: grey 2px solid;
  margin: 5px;
  padding: 3px;
}

.memberName {
  color: #218dce;
  font: 14px;
  padding-top: 8px;
}

.log {
  background: white;
  color: grey;
  font: 12px;
  display: inline-block;
  padding: 10px;
  border: lightgrey solid 1px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
  margin: 5px;
}
</style>
