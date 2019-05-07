<template>
  <div>
    <div id="termsBar"
         style="width: 50%;"
         v-show="barVisible">
      <div class="form-check">
        <label class="form-check-label checkBoxContainer checkBoxText"
               id="termsLabel">
          I agree with 123 Workforce <a target="_blank" href="/freelancer/requirements">Agent Requirements</a> and
          <a href="/freelancer/contractor_agreement" target="_blank">Contractor Agreement</a>
          <input class="form-check-input"
                 id="terms"
                 type="checkbox"
                 name="has_agreed"
                 value="true"
                 @click="agreeWithTerms">
          <span class="checkmark"></span>
        </label>
        <span class="NoDecor" @click="barVisible = false" style="padding-left:10px;">
                    <a href="javascript:void(0)">
                        <img src="/images/close_blue.png" alt="close terms" width="10" height="10">
                    </a>
                 </span>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      barVisible: false
    }
  },
  methods: {
    agreeWithTerms() {
      let data = {
        terms: 'AGREED'
      };
      axios.post('/freelancer/set_terms', data).then((response) => {
        // change the text and then close
        setTimeout(function() {
          $('#termsLabel').text('Thank you! ');
        }, 2000);
        setTimeout(() => {
          this.barVisible = false;
        }, 4000);
      });
    },
    isUserAgreed() {
      axios.get('/freelancer/has_agreed').then((response) => {
        if (response.data.terms === 'AGREED') {
          this.barVisible = false;
        } else {
          this.barVisible = true;
        }
      });
    }
  },
  mounted() {
    console.log('agent terms-bar compoent mounted');
    this.isUserAgreed();
  }
}
</script>
<style>
</style>
