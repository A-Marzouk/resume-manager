<template>
  <div class="status-selector-component">
    <a href="javascript:;"  class="recording-status icon" v-bind:class="selectedStatus">{{ printStatus() }}</a>
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
      selectedStatus: '',
      classes:{
        'ER' : 'email-request',
        'CB' : 'call-back',
        'NI' : 'not-interested',
        'AS' : 'appointment-set',
        'CR' : 'contacts-received',
        'S'  : 'successful',
      }
    }
  },
  methods: {
    printStatus: function () {
      return this.status ;
    },
    setLogClass(){
      this.selectedStatus = this.classes[this.status] ;
    }
  },
  mounted() {
    this.setLogClass();
  }
}
</script>

