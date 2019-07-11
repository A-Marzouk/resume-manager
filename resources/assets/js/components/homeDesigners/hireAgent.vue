<template>
  <div id="hireContent" style="border-top: 1px solid #EBEDEF; ">
      <div class="row">
          <div class="offset-md-4 col-md-4 col-12">
              <div class="hireText">
                  Select the number of Hours you need per week:
              </div>
              <div class="hoursBtn NoDecor">
                  <a href="javascript:void(0)" @click="hours && hours--" class="hoursMinus">
                      <img src="/images/newResume/minus.png" style="width: 18px; padding-right: 8px;" alt="minus">
                  </a>
                  <span id="numberOfHours">{{ hours }}</span> hours
                  <a href="javascript:void(0)" @click="hours++" class="hoursPlus">
                      <img src="/images/newResume/plus.png" style="width: 18px; padding-left: 8px;" alt="plus">
                  </a>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="offset-md-4 col-md-4 col-12">
              <div class="hireText">
                  How many weeks would you like to book for?
              </div>
              <div class="hoursBtn NoDecor">
                  <a href="javascript:void(0)" @click="weeks && weeks--" class="weeksMinus">
                      <img src="/images/newResume/minus.png" style="width: 18px; padding-right: 8px;" alt="minus">
                  </a>
                  <span>{{ weeks }}</span> weeks
                  <a href="javascript:void(0)" @click="weeks++" class="weeksPlus">
                      <img src="/images/newResume/plus.png" style="width: 18px; padding-left: 8px;" alt="plus">
                  </a>
              </div>
          </div>
      </div>

      <div class="row" style="padding-top:50px; padding-bottom: 50px;">
          <div class="offset-md-2 col-12 col-md-8" style="border-top: 1px solid #EBEDEF;">
              <div class="row">
                  <div class="col-md-2 col-4 text-left jobTitle" style="font-size: 12px; color: #30323D;">
                      Monthly rate
                  </div>
                  <div class="col-md-2 col-3 offset-5 offset-md-8 text-right jobTitle" style="font-weight: bold;font-size: 12px; color: #30323D;">
                      {{hours * 5 * weeks}} $
                  </div>
              </div>
          </div>
      </div>
      <div class="row" style="border-top: 1px solid #EBEDEF;">
          <div class="col-md-4 offset-md-2 col-12 NoDecor" style="padding-top: 17px;">
              <a href="javascript:void(0)" class="btn btn-block cancelBtn cancelBooking" @click="cancel">Cancel Booking</a>
          </div>
          <div class="col-md-4 col-12 NoDecor" style="padding-top: 17px; padding-bottom: 30px;">
              <a class="btn btn-block summaryBtn" href="javascript:;" @click="payment" id="hireMeBtn">Booking Summary</a>
          </div>
      </div>
  </div>

</template>

<script>
  export default {
    props: ['freelancer', 'cancel'],
    data () {
        return {
            hours: this.freelancer.availableHours,
            weeks: 4
        }
    },
    methods: {
        payment () {

            let {hours, weeks} = this

            hours && weeks && window.location.replace(`/stripe/hire?freelancerID=${freelancer.id}&hours=${hours}&weeks=${weeks}`)
        }
    }
  }
</script>