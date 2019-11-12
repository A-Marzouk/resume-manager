<template>
  <div>
    <transition-group name="list"
                      class="row">
      <work-history v-for="(work,index) in works"
                    v-bind:key="index"
                    class="list-item workExperience col-12"
                    style="margin: 0px 10px 20px;">
        <span class="deleteWorkBtn NoDecor" @click="deleteWork(work)">
                    <a href="javascript:void(0)">
                        <img src="/images/close_blue.png" alt="edit profile">
                        Delete
                    </a>
                </span>
        <span class="deleteWorkBtn NoDecor" @click="editWork(work.id)" style=" width: 75px; margin-right:5px;">
                    <a href="javascript:void(0)" data-target="#addWorkModal"  data-toggle="modal">
                        <img src="/images/edit_blue.png" alt="edit profile" style="width: 20px;
    padding-right: 7px;
    padding-bottom: 2px;
    height: 15px;">
                        Edit
                    </a>
                </span>
        <b style="font-size: 16px;color: #30323D;font-family: Roboto;line-height: 19px;font-weight: bold; ">{{work.job_title}}</b><br />
        {{work.company}}<br />
        Start :{{work.date_from}}
        <span v-show="work.date_to && work.is_currently_working !== true"> End : {{work.date_to}}</span>
        <span v-show="work.is_currently_working !== false"> - Present</span><br />
        <div class="desc"
             style="color: #30323D;font-family: Roboto;">{{work.job_description}}</div>
      </work-history>
    </transition-group>
    <span class="deleteWorkBtn NoDecor" v-show="this.canAdd" @click="clearData" style="width:137px">
            <a href="javascript:void(0)" data-toggle="modal" data-target="#addWorkModal">
                <img src="/images/add_blue.png" alt="edit profile">
                Add work
            </a>
        </span>
    <br />
    <add-work-modal @workAdded="addWorkHistory"
                    :toBeEditedWork="toBeEditedWork"></add-work-modal>
  </div>
</template>
<script>
export default {
  data() {
    return {
      works: [],
      canAdd: true,
      toBeEditedWork: {
        'id': '',
        'job_title': '',
        'job_description': '',
        'company': '',
        'date_from': '',
        'date_to': '',
        'is_currently_working': ''
      }
    }
  },

  methods: {
    getCurrentWorks() {
      axios.get('/freelancer/workshistory').then(
        (response) => {
          let currWorks = response.data;
          $.each(currWorks, function(i) {
            if (currWorks[i].is_currently_working == "0") {
              currWorks[i].is_currently_working = false;
            } else {
              currWorks[i].is_currently_working = true;
            }
          });
          this.works = currWorks;
          this.checkMaxWorks();
        }
      );
    },

    addWorkHistory(newWork) {
      this.works.push(newWork);
      this.checkMaxWorks();
    },

    deleteWork(work) {
      if (!confirm('Are you sure you want to delete this work experience ?')) {
        return;
      }
      axios.post('/freelancer/deletework', { workHistoryID: work.id }).then((response) => {
        let works = this.works;
        $.each(works, function(i) {
          if (works[i].id === work.id) {
            works.splice(i, 1);
            return false;
          }
        });

        // changes saved :
        $('#changesSaved').fadeIn('slow');
        setTimeout(function() {
          $('#changesSaved').fadeOut();
        }, 2000);

        this.checkMaxWorks();

      });
    },

    editWork(workID) {
      let works = this.works;
      let editedWork = {};

      $.each(works, function(i) {
        if (works[i].id === workID) {
          editedWork = works[i];
        }
      });
      this.toBeEditedWork = editedWork;
    },

    checkMaxWorks() {
      if (this.works.length > 4) {
        this.canAdd = false;
      } else {
        this.canAdd = true;
      }
    },

    clearData() {
      this.toBeEditedWork = {
        'id': '',
        'job_title': '',
        'job_description': '',
        'company': '',
        'date_from': '',
        'date_to': '',
        'is_currently_working': ''
      };
    }
  },

  created() {
    this.getCurrentWorks();
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
