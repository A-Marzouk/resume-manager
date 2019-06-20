<template>
  <div>
    <div class="content-block-campaign">
      <div class="upper-bar">
        <div class="welcomeText">
          Hello Mr. Marzouk! You have 8 active campaigns.
        </div>
        <a href="/client/campaigns-archive" class="actionText">
                    GO TO ARCHIVE OF CAMPAIGNS
                </a>
      </div>
      <div class="bottom-bar">
        <div class="title">
          MY ACTIVE CAMPAIGNS
        </div>
        <div class="actionBtn">
          <a href="#">
              <img src="/images/client/plus.png" alt="plus sign">CREATE NEW CAMPAIGN
          </a>
        </div>
      </div>
    </div>

    <campaing-brief-dashboard></campaing-brief-dashboard>
    
  <div class="content-block-campaign-brief">
    <div class="upper-bar">
      <div class="campaignInfo">
        <div class="title">
          Name of the campaign
        </div>
        <div class="info">
          2 agents currently working on the campaign
        </div>
      </div>
      <div class="actionBtn">
        <a class="status live" href="#">
            LIVE
        </a>
        <div class="menu-img">
          <img src="/images/client/more_vert_24px.png" alt="menu">
                </div>
        </div>
      </div>
      <div class="agent-logs-block">
        <div class="agentInfo">
          <img src="/images/client/dummy.png" alt="">
          <span class="userName">
                            Mohamed Salah
                        </span>
        </div>
        <div class="log">
          <div class="log-time">
            9 am
          </div>
          <div class="log-text">
            <status-selector status="call-back"></status-selector>
            <span class="log-text-content">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    </span>
          </div>
        </div>
        <div class="log">
          <div class="log-time">
            10 am
          </div>
          <div class="log-text">
            <status-selector status="call-back"></status-selector>
            <span class="log-text-content">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    </span>
          </div>
        </div>
        <div class="log">
          <div class="log-time">
            11 am
          </div>
          <div class="log-text">
            <status-selector status="call-back"></status-selector>
            <span class="log-text-content">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    </span>
          </div>
        </div>
        <div class="log">
          <div class="log-time">
            11 am
          </div>
          <div class="log-text">
            <status-selector status="call-back"></status-selector>
            <span class="log-text-content">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    </span>
          </div>
        </div>
        <div class="showMoreBtn">
          <a href="#">SHOW LESS</a>
        </div>
      </div>
      <div class="agent-logs-block">
        <div class="agentInfo">
          <img src="/images/client/dummy.png" alt="">
          <span class="userName">
                            Lionel Messi
                        </span>
        </div>
        <div class="log">
          <div class="log-time">
            9 am
          </div>
          <div class="log-text">
            <status-selector status="call-back"></status-selector>
            <span class="log-text-content">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    </span>
          </div>
        </div>
        <div class="log">
          <div class="log-time">
            10 am
          </div>
          <div class="log-text">
            <status-selector status="call-back"></status-selector>
            <span class="log-text-content">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    </span>
          </div>
        </div>
        <div class="log">
          <div class="log-time">
            11 am
          </div>
          <div class="log-text">
            <status-selector status="call-back"></status-selector>
            <span class="log-text-content">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    </span>
          </div>
        </div>
        <div class="showMoreBtn">
          <a href="#">SHOW MORE</a>
        </div>
      </div>
      <div class="campaign-brief-footer">
        <a href="/client/campaign">
                GO TO CAMPAIGN
            </a>
      </div>
    </div>
  </div>
</template>
<script>
import campaignBriefDashboard from './campaign-brief-dashboard.vue';
import statusSelector from '../../status-selector.vue'

export default {
  components: {
    "campaing-brief-dashboard": campaignBriefDashboard,
    'status-selector': statusSelector
  },
  data() {
    return {
      openCampaignMenu: false
    }
  },
  methods: {

  }
}
</script>
<style scoped>
</style>
