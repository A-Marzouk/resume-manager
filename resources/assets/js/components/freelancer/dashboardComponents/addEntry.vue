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
          <status-selector></status-selector>
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
            class="btn btn-link"
            v-on:click="() => {entry = ''; clear()}"
          >CANCEL</button>
          <button class="btn btn-submit btn-primar">ADD ENTRY</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

  import statusSelector from '../../status-selector.vue'

  export default {
    props: ['clear'],
    components: {
      'status-selector': statusSelector
    },
    data () {
      return {
        entry: '',
      }
    }
  }

</script>
