<template>
  <div class="container">
    <div class="pageHeading">
      Send job invitation
    </div>
    <div class="pageSubHeading">
      Title: {{this.job.title}}<br>
      Desc: {{this.job.description}}
    </div>
    <br>
    <div class="row">
      <div class="col-md-12">
        <div class="panelFormLabel">
          Please choose mailing list :
        </div>
        <br>
        <div class="form-check">
          <input type="checkbox"
                 class="form-check-input"
                 value="developers"
                 v-model="invitationData.mailingLists"> Developers<br />
          <input type="checkbox"
                 class="form-check-input"
                 value="designers"
                 v-model="invitationData.mailingLists"> Designers<br />
          <input type="checkbox"
                 class="form-check-input"
                 value="business_support"
                 v-model="invitationData.mailingLists"> Business support<br />
          <input type="checkbox"
                 class="form-check-input"
                 value="all"
                 v-model="invitationData.mailingLists"> All freelancers<br />
        </div>
        <br />
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="panelFormLabel">
          Add custom emails
        </div>
        <form action=""
              method="post"
              @submit.prevent="addEmail">
          <div class="form-group">
            <input type="text"
                   placeholder="Add email"
                   class="form-control"
                   id="email_address"
                   name="email_address"
                   v-model="currEmail"
                   required
                   style=" background:white url('/images/add_skill.png')  no-repeat right .75rem center;
                                        background-size: 15px 15px;">
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      <div v-for="(mail,index) in invitationData.customEmails"
           v-bind:key="index"
           class="text-center skillView col-4"
           style="margin-right: 10px; background: white;border-radius: 10px; margin-top:5px; margin-bottom:5px;">
        <b style="color: #697786;font-family: Roboto;font-size: 16px;font-weight: 300;line-height: 24px;">
                    {{mail}}
                    <button type="button" class="close" style="padding: 2px; outline: none;" @click="deleteEmail(mail)">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </b>
      </div>
    </div>
    <br />
    <div class="row">
      <div class="col-md-12">
        <button class="btn btn-primary"
                id="sendInv"
                @click="invite">Send invitation</button>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ['job'],
  data() {
    return {
      currEmail: '',
      invitationData: {
        job_id: this.job.id,
        mailingLists: [],
        customEmails: []
      }
    }
  },
  methods: {
    invite() {
      // check before invitation
      if (this.invitationData.mailingLists.length < 1 && this.invitationData.customEmails.length < 1) {
        alert('Please choose mailing list or add custom emails');
        return;
      }
      let sendBtn = $('#sendInv');
      sendBtn.prop('disabled', true);
      $('#sendInv').text('Sending..');
      axios.post('/admin/invite', this.invitationData).then((response) => {
        sendBtn.text('Invitation sent');
        sendBtn.css('background', 'lightgreen');
        sendBtn.css('border', 'none');
      });
    },
    addEmail() {
      // validate it is an email :
      if (this.isValidEmailAddress(this.currEmail)) {
        this.invitationData.customEmails.push(this.currEmail);
        this.currEmail = '';
      } else {
        alert('Not valid mail');
      }
    },
    deleteEmail(mail) {
      let emails = this.invitationData.customEmails;
      $.each(emails, function(i) {
        if (emails[i] === mail) {
          emails.splice(i, 1);
          return false;
        }
      });
    },
    isValidEmailAddress(emailAddress) {
      var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
      return pattern.test(emailAddress);
    },
  },
  created() {}
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
