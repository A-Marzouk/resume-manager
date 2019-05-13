<template>
  <div class="d-flex justify-content-center">
    <div class="dashboard_content campaign_activity">
      <div class="hideOnTablet">
        <div class="dashboard-side-menu">
          <div class="team-list-header">
            <div class="teamName">
              TEAM
            </div>
            <div class="teamChat">
              GO TO TEAM CHAT
            </div>
          </div>
          <div class="lineDivide"></div>
          <div class="team-member">
            <img src="/images/client/dummy.png" alt="member image">
            <div class="team-member-info">
              <div class="member-name manager">
                Louis Snyderberg
              </div>
              <div class="job-title">
                Team manager
              </div>
            </div>
          </div>
          <div class="team-member">
            <img src="/images/client/dummy.png" alt="member image">
            <div class="team-member-info">
              <div class="member-name">
                Mohamed Salah
              </div>
              <div class="job-title">
                Egyptian king
              </div>
            </div>
          </div>
          <div class="team-member">
            <img src="/images/client/dummy.png" alt="member image">
            <div class="team-member-info">
              <div class="member-name">
                Lionel Messi
              </div>
              <div class="job-title">
                Artist
              </div>
            </div>
          </div>
          <div class="team-member">
            <img src="/images/client/dummy.png" alt="member image">
            <div class="team-member-info">
              <div class="member-name">
                Zlatan Ibrahimovic
              </div>
              <div class="job-title">
                Animation
              </div>
            </div>
          </div>
          <div class="team-member">
            <img src="/images/client/dummy.png" alt="member image">
            <div class="team-member-info">
              <div class="member-name">
                Louis Snyderberg
              </div>
              <div class="job-title">
                Animation
              </div>
            </div>
          </div>
        </div>
        <div class="hideOnTablet documents-bar d-flex justify-content-center">
          <div class="button-base blue-button-a">
            <a href="#" style="width:178px; height: 38px;">GO TO STATISTICS</a>
          </div>
        </div>
      </div>
      <div class="content-block client">
        <div class="content-block-campaign-activity">
          <div class="hideOnTablet">
            <div class="button-base blue-button-a d-flex justify-content-end" style="margin-bottom: 22px;">
              <a href="#" class="m-0" style="width:178px; height: 38px;">GO TO STATISTICS</a>
            </div>
          </div>
          <div class="team-bar-tablet">
            <div class="team-info">
              <div class="team-name">
                TEAM
              </div>
              <div class="actionBtn">
                GO TO TEAM CHAT
              </div>
            </div>
            <div class="lineDivide tablet-bar"></div>
            <div class="agent-bar">
              <div class="team-member tablet-bar">
                <img src="/images/client/dummy.png" alt="member image">
                <div class="team-member-info">
                  <div class="member-name">
                    Z. Ibrahimovic
                  </div>
                  <div class="job-title">
                    Animation
                  </div>
                </div>
              </div>
              <a class="actionBtn" href="javascript:void(0)" data-toggle="modal" data-target="#select-agent-modal" >
                CHOOSE AGENT
              </a>
            </div>
          </div>
          <div class="data-logs">
            <datepicker>
              <a href="javascript:void(0)" data-toggle="modal" data-target="#pick-date-modal" @click.once="setDatePicker" >
                  <img src="/images/client/campaign_activity/pick_date.png" alt="pick date">
              </a>
            </datepicker>
            <div class="lineDivide"></div>
            <div class="member-logs-empty" v-show="!hasLogs">
              <div class="empty-state-text">
                Sorry, no entries for today yet  -
                <a href="javascript:void(0)" @click="hasLogs = !hasLogs" class="text"> SHOW DEMO LOGS</a>
              </div>
              <div class="empty-state-image">
                <img src="/images/client/campaign_activity/empty_state.png" alt="empty state">
              </div>
            </div>
            <div class="member-logs" v-show="hasLogs">
              <div class="agent-logs-block">
                <div class="log">
                  <div class="log-time">
                    9.15 am
                  </div>
                  <div class="log-text">
                                        <span class="agent-initials">
                                            CB
                                        </span>
                    <span class="log-text-content">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                        </span>
                  </div>
                </div>
                <div class="showMoreBtn">
                  <a href="#">SHOW RECORDINGS</a>
                </div>
                <div class="lineDivide"></div>
                <div class="log">
                  <div class="log-time">
                    9.15 am
                  </div>
                  <div class="log-text">
                                        <span class="agent-initials">
                                            CB
                                        </span>
                    <span class="log-text-content">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                        </span>
                  </div>
                </div>
                <div class="showMoreBtn disabled">
                  <a href="#">SHOW RECORDINGS</a>
                </div>
                <div class="lineDivide"></div>
                <div class="log">
                  <div class="log-time">
                    9.15 am
                  </div>
                  <div class="log-text">
                                        <span class="agent-initials">
                                            CB
                                        </span>
                    <span class="log-text-content">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                        </span>
                  </div>
                </div>
                <div class="showMoreBtn">
                  <a href="#">SHOW RECORDINGS</a>
                </div>
                <div class="lineDivide"></div>
                <div class="log">
                  <div class="log-time">
                    9.15 am
                  </div>
                  <div class="log-text">
                                        <span class="agent-initials">
                                            CB
                                        </span>
                    <span class="log-text-content">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                        </span>
                  </div>
                </div>
                <div class="showMoreBtn">
                  <a href="#">SHOW RECORDINGS</a>
                </div>
                <div class="lineDivide"></div>
                <div class="log">
                  <div class="log-time">
                    9.15 am
                  </div>
                  <div class="log-text">
                                        <span class="agent-initials">
                                            CB
                                        </span>
                    <span class="log-text-content">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                        </span>
                  </div>
                </div>
                <div class="showMoreBtn disabled">
                  <a href="#">SHOW RECORDINGS</a>
                </div>
              </div>
            </div>
          </div>
          <div class="documents-bar">
            <img src="/images/client/campaign_activity/document.png" alt="document">
            <div class="document-text">
              Document link: <span>No links.</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Agent select modal -->
    <div class="modal" id="select-agent-modal">
      <div class="modal-dialog">
        <div class="modal-content agent-modal-content">

          <!-- Modal Header -->
          <div class="select-agent-modal-header">
            <div class="title text-lay">
              CHOOSE TEAM MEMBER
            </div>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="lineDivide"></div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="dashboard-side-menu">
              <div class="team-member">
                <img src="/images/client/dummy.png" alt="member image">
                <div class="team-member-info">
                  <div class="member-name manager">
                    Louis Snyderberg
                  </div>
                  <div class="job-title">
                    Team manager
                  </div>
                </div>
              </div>
              <div class="team-member">
                <img src="/images/client/dummy.png" alt="member image">
                <div class="team-member-info">
                  <div class="member-name">
                    Mohamed Salah
                  </div>
                  <div class="job-title">
                    Egyptian king
                  </div>
                </div>
              </div>
              <div class="team-member">
                <img src="/images/client/dummy.png" alt="member image">
                <div class="team-member-info">
                  <div class="member-name">
                    Lionel Messi
                  </div>
                  <div class="job-title">
                    Artist
                  </div>
                </div>
              </div>
              <div class="team-member">
                <img src="/images/client/dummy.png" alt="member image">
                <div class="team-member-info">
                  <div class="member-name">
                    Zlatan Ibrahimovic
                  </div>
                  <div class="job-title">
                    Animation
                  </div>
                </div>
              </div>
              <div class="team-member">
                <img src="/images/client/dummy.png" alt="member image">
                <div class="team-member-info">
                  <div class="member-name">
                    Louis Snyderberg
                  </div>
                  <div class="job-title">
                    Animation
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="modal" id="pick-date-modal">
      <div class="modal-dialog">
        <div class="modal-content agent-modal-content date-picker">
          <!-- Modal body -->
          <button type="button" id="close-modal" class="close d-none" data-dismiss="modal">&times;</button>
          <div class="modal-body">
            <div id="datepicker"></div>
            <input type="hidden" name="selected-date-value" id="selected-date-value" @change="dateChanged">
            <div class="date-picker-modal-footer">
              <a href="javascriot:void(0)" class="cancelBtn" @click="cancelDatePicking">
                CANCEL
              </a>
              <a href="javascriot:void(0)" class="applyBtn selected-date" @click="applySelectedDate">
                APPLY
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import datepicker from '../../datepicker'

  export default {
    components: {
      datepicker 
    },
    data(){
      return{
        hasLogs:false,
        selectedDate:'',
        appliedDate:'',
      }
    },
    methods:{
      dateChanged(){
        this.selectedDate = $('#selected-date-value').val();
      },
      applySelectedDate(){
        this.appliedDate =  this.selectedDate;
        $('#close-modal').click();
      },
      cancelDatePicking(){
        $('#close-modal').click();
      },
      setDatePicker(){
        $( "#datepicker" ).datepicker({
          onSelect: function(dateText, inst) {
            $("input[name='selected-date-value']").val(dateText);
            const dateChanged = new CustomEvent('change');
            document.getElementById('selected-date-value').dispatchEvent(dateChanged);
          }
        });
      }
    },
    mounted() {
    }
  }
</script>
