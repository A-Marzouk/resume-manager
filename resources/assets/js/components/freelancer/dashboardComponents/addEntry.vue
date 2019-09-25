<template>
  <div>
    <div class="type-entry-block">
      <div class="upper-bar">
        <div class="type-entry-label">
          <div class="title">Type your entry</div>
        </div>
      </div>
      <div class="entry-input-block">
        <div class="input-container">
          <status-selector :setStatus="setStatus"></status-selector>
          <textarea class="entry-input" placeholder="Type your entry here" v-model="entry"></textarea>
        </div>
        <div class="entry-comment">
          Please don't forget to mention N° of the client (company) in the document
        </div>
        <input v-model="names" style="margin-bottom: 15px;" v-if="isSuccessful" class="names-input" placeholder="Please, write names of the registered people using commas" />
        <div v-if="this.errors.entry !== ''" class="error">{{errors.entry}}</div>
        <!--<div class="add-recording-action">-->
          <!--<a href="javascript:void(0);">ADD RECORDING</a>-->
        <!--</div>-->
        <hr>
        <div class="btn-container">
          <button v-if="entry !== ''" type="button" name="button"
            class="btn btn-link"
            v-on:click="() => {entry = ''; clear()}"
          >CANCEL</button>
          <button v-on:click="addEntry" class="btn btn-submit btn-primar" :class="{ disabled: entry === '' }" >SAVE ENTRY</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

  import logStatusSelector from '../Log-status-selector'

  export default {
    props: ['clear'],
    components: {
      'status-selector': logStatusSelector
    },
    data () {
      return {
        logStatusCode:{
          1:'email-request',
          2:'call-back',
          3:'not-interested',
          4:'appointment-set',
          5:'contacts-received',
          6:'successful',
        },
        entry: '',
        isSuccessful: false,
        names: '',
        errors: {
          entry: ''
        }
      }
    },
    methods: {
      setStatus: function (value) {
        this.isSuccessful = value
      },
      addEntry: function () {
        if (this.entry.trim() === '') {
          this.errors.entry = 'Entry is empty'
          return
        }

        if (this.isSuccessful && this.names === '') {
          this.errors.entry = 'To save entry with “Successful” status you need to add names'
          return
        }
      }
    }
  }

</script>
