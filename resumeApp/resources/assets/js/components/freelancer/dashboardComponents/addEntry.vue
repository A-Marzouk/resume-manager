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
          <div class="status-list"
              v-bind:class="{ show: showStatusList }"
          >
            <div class="status-component">
              <a href="javascript:;" class="icon email-requested">ER</a>
              <span class="icon-name">E-mail<br>request</span>
            </div>
            <div class="status-component">
              <a href="javascript:;" class="icon call-back">CB</a>
              <span class="icon-name">Call back</span>
            </div>
            <div class="status-component">
              <a href="javascript:;" class="icon not-interested">NI</a>
              <span class="icon-name">Not<br>interested</span>
            </div>
          </div>
          <span class="recording-status icon" v-bind:class="selectedStatus">S</span>
          <textarea class="entry-input" placeholder="Type your entry here" v-model="entry"></textarea>
        </div>
        <div class="entry-comment">
          Please don't forget to mention N° of the client (company) in the document
        </div>
        <div class="add-recording-action">
          <a href="javascript:void(0);">ADD RECORDING</a>
        </div>
        <hr>
        <div class="btn-container">
          <button v-if="entry !== ''" type="button" name="button"
            class="btn btn-primary hideOnTablet"
          >CANCEL</button>
          <button v-if="entry !== ''" type="button" name="button"
            class="btn btn-secondary hideOnTablet"
          >DELETE</button>
          <button class="btn btn-submit disabled">ADD ENTRY</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

  export default {
    data () {
      return {
        entry: '',
        showStatusList: false,
        selectedStatus: 'status-default'
      }
    }
  }

</script>
