<template>
  <div class="status-selector-component">
    <div class="status-list"
        v-bind:class="{ show: showStatusList }"
    >
      <div class="status-component">
        <a v-on:click="selectedStatus = 'email-request'; showStatusList = !showStatusList" href="javascript:;" class="icon email-request">ER</a>
        <span class="icon-name">E-mail<br>request</span>
      </div>
      <div class="status-component">
        <a v-on:click="selectedStatus = 'call-back'; showStatusList = !showStatusList" href="javascript:;" class="icon call-back">CB</a>
        <span class="icon-name">Call back</span>
      </div>
      <div class="status-component">
        <a v-on:click="selectedStatus = 'not-interested'; showStatusList = !showStatusList" href="javascript:;" class="icon not-interested">NI</a>
        <span class="icon-name">Not<br>interested</span>
      </div>
      <div class="status-component">
        <a v-on:click="selectedStatus = 'appointment-set'; showStatusList = !showStatusList" href="javascript:;"  style="background: #8567FF;" class="icon">AS</a>
        <span class="icon-name">Appointment<br>set</span>
      </div>
      <div class="status-component">
        <a v-on:click="selectedStatus = 'contacts-received'; showStatusList = !showStatusList" href="javascript:;"  style="background: #4ABFF1;" class="icon">CR</a>
        <span class="icon-name">Decission<br>maker<br>contacts received</span>
      </div>
      <div class="status-component">
        <a v-on:click="selectedStatus = 'successful'; showStatusList = !showStatusList" href="javascript:;"  style="background: #2ABD68;" class="icon">S</a>
        <span class="icon-name">Successful</span>
      </div>
    </div>
    <a href="javascript:;" v-on:click="showStatusList = !showStatusList" class="recording-status icon" v-bind:class="selectedStatus">{{ printStatus() }}</a>
  </div>
  
</template>

<script>
export default {
  props: [
    'status',
    'setStatus'
  ],
  data () {
    return {
      showStatusList: false,
      selectedStatus: this.status || 'status-default',
    }
  },
  methods: {
    printStatus: function () {
      let splittedStatusName = this.selectedStatus.split('-')
      return this.selectedStatus !== 'status-default' ? (splittedStatusName.length > 1) ? splittedStatusName[0].charAt(0).toUpperCase() + splittedStatusName[1].charAt(0).toUpperCase() : splittedStatusName[0].charAt(0).toUpperCase() : 'S'
    }
  },
  watch: {
    selectedStatus: function (status) {
      if (this.setStatus !== null || this.setStatus !== undefined) {
        if (status === 'successful') this.setStatus(true)
        else this.setStatus(false)
      }
    }
  }
}
</script>

