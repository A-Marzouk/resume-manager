<template>
  <div class="content-block-campaign-brief">
    <div class="upper-bar">
      <div class="campaignInfo">
        <div class="title">
          Name of the campaign
        </div>
        <div class="info hideOnXS">
          2 agents on the campaign
        </div>
      </div>
      <div class="actionBtn">
        <a class="status" :class="{active: campaignStatus === 'ACTIVE', paused: campaignStatus === 'PAUSED', canceled: campaignStatus === 'CANCELED'}" href="javascript:;">{{ campaignStatus }}</a>
        <a href="javascript:;" v-on:click="openCampaignMenu = !openCampaignMenu" class="menu-img">
          <img src="/images/client/more_vert_24px.png" alt="menu">

          <div class="campaignMenu" :class="{opened: openCampaignMenu}">
            <a v-if="campaignStatus === 'ACTIVE'" href="javascript:;" v-on:click="() => { campaignStatus = 'PAUSED' }">Pause the campaign</a>
            <a v-else href="javascript:;" v-on:click="() => { campaignStatus = 'ACTIVE' }">Resume the campaign</a>
            <a href="javascript:;" v-on:click="() => { campaignStatus = 'CANCELED' }">Cancel the campaign</a>
          </div>
        </a>
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
          9.15 am
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
          9.15 am
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
          9.15 am
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
    <div class="agent-logs-block">
      <div class="agentInfo">
        <img src="/images/client/dummy.png" alt="">
        <span class="userName">
                            Lionel Messi
                        </span>
      </div>
      <div class="log">
        <div class="log-time">
          9.15 am
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
          9.15 am
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
          9.15 am
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
</template>

<script>
import statusSelector from '../../status-selector.vue'

export default {
  components: {
    'status-selector': statusSelector
  },
  data () {
    return {
      openCampaignMenu: false,
      campaignStatus: 'PAUSED'
    }
  }
}
</script>

