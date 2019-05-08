<template>
  <div class="container">
    <div class="pageHeading"
         id="emailsheader"
         style="padding-bottom:15px; padding-top: 20px;">
      Emails list
    </div>
    <div class="row">
      <div class="col-6">
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
      <div v-for="(mail,index) in mailsList"
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
    <hr>
    <div class="pageHeading"
         style="padding-bottom:15px;">
      Choose Template
    </div>
    <div class="row">
      <div v-for="(template,index) in templatesList"
           v-bind:key="index"
           class="col-3 emailTemplate"
           @click="chooseTemplate(template)"
           :id="template">
        {{template}}<br />
        <a href="javascript:void(0)" @click="viewTemplate(template)">View email template</a>
      </div>
    </div>
    <br />
    <hr>
    <div class="pageHeading"
         style="padding-bottom:15px;">
      Enter email subject
    </div>
    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <input type="text"
                 class="form-control panelFormInput"
                 placeholder="Email subject.."
                 style=" background:white"
                 v-model="currEmailSubject">
        </div> <!-- email subject -->
      </div>
    </div>
    <br />
    <hr>
    <div class="row">
      <div class="col-6">
        <button @click="sendEmail"
                class="btn btn-outline-primary"
                id="sendEmailBtn">Send</button>
      </div>
    </div>
    <!-- modal to view the template review -->
    <!-- Trigger the modal with a button -->
    <button type="button"
            class="d-none"
            id="openTemplateModal"
            data-toggle="modal"
            data-target="#templateModal"></button>
    <!-- Modal -->
    <div id="templateModal"
         class="modal fade"
         role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button"
                    class="close"
                    data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body"
               id="templateContent">
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      currEmail: '',
      mailsList: [],
      template: '',
      currEmailSubject: '',
      templatesList: ['company_info', 'test_mail_content'],
    }
  },
  methods: {
    addEmail() {
      // validate it is an email :
      if (this.isValidEmailAddress(this.currEmail)) {
        this.mailsList.push(this.currEmail);
        this.currEmail = '';
      } else {
        alert('Not valid mail');
      }
    },
    deleteEmail(mail) {
      let emails = this.mailsList;
      $.each(emails, function(i) {
        if (emails[i] === mail) {
          emails.splice(i, 1);
          return false;
        }
      });
    },
    sendEmail() {
      let data = {
        emailTemplate: this.template,
        mailingList: this.mailsList,
        emailSubject: this.currEmailSubject
      };
      if (this.canSend()) {
        $('#sendEmailBtn').attr('disabled', true);
        $('#sendEmailBtn').text('Sending');
        axios.post('/send_emails', data).then((response) => {
          alert(response.data);
          this.mailsList = [];
          this.template = '';
          this.currEmailSubject = '';
          $('#sendEmailBtn').attr('disabled', false);
          $('#sendEmailBtn').text('Send');
          $('.emailTemplate').css('border', '2px lightgrey solid');
        });
      } else {
        alert('Please fill in empty fields !');
      }
    },
    chooseTemplate(template) {
      $('.emailTemplate').css('border', '2px lightgrey solid');
      let templates = this.templatesList;
      $(templates).each((i) => {
        if (templates[i] === template) {
          this.template = template;
          $('#' + template).css('border', '2px #0D96DB solid');
          return false;
        }
      });

    },
    canSend() {
      if (this.mailsList.length > 0 && this.template.length > 0 && this.currEmailSubject.length > 0) {
        return true;
      } else {
        return false;
      }
    },
    viewTemplate(template) {
      axios.post('/get_emailTemplate', {
        templateName: template
      }).then((response) => {
        $('#templateContent').html(response.data);
        $('#openTemplateModal').click();
        $('#emailsheader').css('padding-top', '80px');
        $('.customFooter').css('background', 'whitesmoke');
      });
    },
    isValidEmailAddress(emailAddress) {
      var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
      return pattern.test(emailAddress);
    }
  },
  created() {

  }
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

.emailTemplate {
  padding: 20px;
  border-radius: 5px;
  margin: 10px;
  text-transform: uppercase;
  border: 2px solid lightgrey;
  text-align: center;
  color: #697786;
  font-family: Roboto;
}

.emailTemplate:hover {
  cursor: pointer;
}
</style>
