<template>
  <div id="hireContent" class="hireContainer d-flex justify-content-center">
      <div class="row">
          <div class="col-12">
              <div class="text-center hireText">
                  Select the number of Hours you need per week:
              </div>
              <div class="hoursBtn text-center NoDecor">
                  <a href="javascript:void(0)" @click="hours && hours--" class="hoursMinus">
                      <img src="/images/newResume/minus.png" alt="minus">
                  </a>
                  {{ parseInt(hours) }} hours
                  <a href="javascript:void(0)" @click="hours++" class="hoursPlus">
                      <img src="/images/newResume/plus.png" alt="plus">
                  </a>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-12">
              <div class="text-center hireText">
                  How many weeks would you like to book for?
              </div>
              <div class="text-center hoursBtn NoDecor">
                  <a href="javascript:void(0)" @click="weeks && weeks--" class="weeksMinus">
                      <img src="/images/newResume/minus.png" alt="minus">
                  </a>
                  {{ weeks }} weeks
                  <a href="javascript:void(0)" @click="weeks++" class="weeksPlus">
                      <img src="/images/newResume/plus.png" alt="plus">
                  </a>
              </div>
          </div>
      </div>

      <div class="row">
          <div class="col-12 no-flex">
              <div class="row">
                  <div class="no-flex text-center col-12 hireText">
                      Monthly rate: {{hours * 5 * weeks}} $
                  </div>
              </div>
          </div>
        <div class="btns">
            <div class="col-12 NoDecor no-flex">
                <a class="btn-block summaryBtn" :href=" '/stripe/hire?freelancerID=' + freelancer.id + '&hours=' + hours + '&weeks=' + weeks " id="hireMeBtn">Make a booking</a>
            </div>
            <div class="col-12 NoDecor">
                <a href="javascript:void(0)" class="btn-block cancelBtn cancelBooking" @click="cancel">Cancel</a>
            </div>
        </div>
      </div>
  </div>

</template>

<script>
  export default {
    props: ['freelancer', 'cancel'],
    data () {
        return {
            hours: this.freelancer.user_data.availableHours,
            weeks: 4
        }
    },
    methods: {

    }
  }
</script>

<style lang="scss" scoped>
.hireContainer {
    display: flex;
    height: 100%;
    padding: 10px;

    @media (max-width: 990px) {
        padding: 5px;
    }

    @media (max-width: 770px) {
        padding: 10px;
        flex-wrap: wrap;
    }

    .row {
        margin: 5px 0;

        .col-12 {
            display: flex;
            flex-direction: column;
            justify-content: space-between;

            &.no-flex {
                display: block;
            }
        }
    }

    .hoursBtn {
        border: 1px solid #D5D8DE;
        border-radius: 4px;
        display: flex;
        padding: 3px 10px;
        justify-content: space-between;
        font-size: 12px;
        align-items: center;

        @media (max-width: 990px) {
            font-size: 11px;
            padding: 0 5px;
            flex-direction: column-reverse;
        }
        
        @media (max-width: 770px) {
            flex-direction: row;
            padding: 5px;
        }

        img {
            width: 12px;

            @media (max-width: 990px) {
                width: 11px;
            }
        }
    }

    .hireText {
        font-size: 14px;

        @media (max-width: 990px) {
            font-size: 12px;
        }
    }

    .btns {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        margin: 0 auto;
        margin-top: 10px;
        
        .summaryBtn {
            padding: 5px 15px;
            margin-bottom: 5px;

            @media (max-width: 990px) {
                padding: 3px 10px;
            }
        }

        .summaryBtn:hover{
            color: white;
        }

        .summaryBtn,
        .cancelBtn {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 14px;
            font-weight: bold;

            @media (max-width: 990px) {
                font-size: 12px;
            }
        }
    }
}
</style>
