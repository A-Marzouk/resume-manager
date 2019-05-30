<template>
  <div>
    <nav class="navbar navbar-light fixed-top dashboard_navbar">
      <div class="backBtn"
           v-show="status === 'update'">
        <a href="/client/dashboard/payments">
                    <img src="/images/client/arrow_back.png" alt="back-icon">
                </a>
        SUBSCRIPTION PLAN UPDATE
      </div>
      <div class="backBtn"
           v-show="status === 'finish'">
        <a href="javascript:void(0)" @click="status='update'">
                    <img src="/images/client/arrow_back.png" alt="back-icon">
                </a>
        SUBSCRIPTION PLAN UPDATE
      </div>
    </nav>
    <div class="update-sub-plan">
      <div class="subscriptions">
        <div class="subs-heading">
          <div class="left">
            <img src="/images/client/payments/agents_40px.png" alt="subs icon">
            <span>
                        SUBSCRIPTION PLAN UPDATE
                    </span>
          </div>
        </div>
        <div v-show="status==='update'"
             class="subs-list">
          <div class="blue-text pt-4 pb-4">
            CURRENT SUBSCRIPTION PLAN
          </div>
          <div class="sub-item">
            <div class="sub-info">
              <div class="sub-info-box">
                <img src="/images/client/payments/time.png" alt="time icon">
                <div class="right">
                  <div class="sub-info-box-heading">
                    60 HOURS
                  </div>
                  <div class="sub-info-box-note">
                    per week
                  </div>
                </div>
              </div>
              <div class="sub-info-box">
                <img src="/images/client/payments/amount.png" alt="time icon">
                <div class="right">
                  <div class="sub-info-box-heading">
                    $ 600
                  </div>
                  <div class="sub-info-box-note">
                    weekly amount
                  </div>
                </div>
              </div>
              <div class="sub-info-box">
                <img src="/images/client/payments/week.png" alt="time icon">
                <div class="right">
                  <div class="sub-info-box-heading">
                    14 WEEKS
                  </div>
                  <div class="sub-info-box-note">
                    10 used / 4 left
                  </div>
                </div>
              </div>
              <div class="sub-info-box">
                <img src="/images/client/payments/period.png" alt="time icon">
                <div class="right">
                  <div class="sub-info-box-heading">
                    4.04.19 - 4.01.20
                  </div>
                  <div class="sub-info-box-note">
                    start date - finish date
                  </div>
                </div>
              </div>
              <div class="sub-info-box">
                <img src="/images/client/payments/number_agents.png" alt="time icon">
                <div class="right">
                  <div class="sub-info-box-heading">
                    4 AGENTS
                  </div>
                  <div class="sub-info-box-note">
                    working on campaign
                  </div>
                </div>
              </div>
              <div class="sub-info-box">
                <img src="/images/client/payments/rate.png" alt="time icon">
                <div class="right">
                  <div class="sub-info-box-heading">
                    $ 10
                  </div>
                  <div class="sub-info-box-note">
                    agent's hourly rate
                  </div>
                </div>
              </div>
              <div class="sub-info-box">
                <img src="/images/client/payments/manager.png" alt="time icon">
                <div class="right">
                  <div class="sub-info-box-heading">
                    CONOR MARJORAM
                  </div>
                  <div class="sub-info-box-note">
                    your manager
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="blue-text pt-4 pb-4">
            SUBSCRIPTION PLAN UPDATE
          </div>
          <div class="new-sub-plan">
            <div class="subscription-plans">
              <div :key="index + plan.price" v-for="(plan, index) in plans" class="plan">
                <div class="price">
                  <span class="value">$ {{plan.price}}</span> 
                  <span class="frequency">peer week, billed weekly</span>
                </div>
                <div class="hours">
                  <img src="/images/client/payments/time.png" alt="time icon">
                  {{plan.hoursPerWeek}} hours/week
                </div>
                <button class="btn-bordered" :class="{selected: plan.selected}"
                  v-on:click="changePlan(index)"
                >
                  {{plan.selected ? 'SELECTED' : 'SELECT'}}
                </button>
                <a href="javascript:;">
                  <img src="/images/icons/arrow_drop_down_circle.svg" alt="arrow dropdown icon">
                </a>
              </div>
            </div>
            <hr>
            <div class="start-date">
              <div class="start-date-heading">
                <img src="/images/client/payments/period.png" alt="time icon">
                Pick a start date of updated campaign
              </div>
              <a href="javascript:void(0)" data-toggle="modal" data-target="#pick-date-modal" @click.once="setDatePicker" >PICK START DATE
              </a>
            </div>
            <hr>
            <div class="weeks-number">
              <div class="d-flex justify-content-start align-items-center">
                <img src="/images/client/payments/week.png" alt="week icon" class="mr-3">
                <div class="weeks-number-heading">
                  Total number of weeks
                </div>
              </div>
              <div class="week-input">
                <div class="account-edit-section-inputs d-flex align-items-center">
                  <div class="faq-question-input sub-edit-input  mt-3 d-flex flex-lg-row flex-column align-items-center">
                    <div class="faq-input">
                      <input v-model="numOfWeeks" type="text" placeholder="N° of weeks">
                      <img src="/images/client/campaign_activity/close_black.png"
                          alt="delete icon"
                          v-show="numOfWeeks.length > 0"
                          @click="clearInput('numOfWeeks')"
                    >
                    </div>
                    <div class="mt-3"
                         style="margin-left:99px;">

                      <div class="custom-checkbox">
                        <div class="checkbox" :class="{checked}"></div>
                        <input v-on:click="handleCheck" checked type="checkbox"
                              name="no-end-date" />
                        <span class="weeks-number-heading sub-heading ml-1"> no end date </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div>
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="new-sub-plan pt-5">
            <div class="weeks-number">
              <div class="sub-agent-numbering pb-3">
                Agent № 1
              </div>
              <div class="d-flex justify-content-start align-items-center">
                <img src="/images/client/payments/time.png" alt="week icon" class="mr-3">
                <div class="weeks-number-heading">
                  Number of working hours per week
                </div>
              </div>
              <div class="week-input">
                <div class="account-edit-section-inputs d-flex align-items-center">
                  <div class="faq-question-input sub-edit-input  mt-3 d-flex flex-row align-items-center">
                    <div class="faq-input">
                      <select name="weeks"
                              id="hours">
                        <option value="2">15 hours</option>
                        <option value="4">20 hours</option>
                        <option value="6">25 hours</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div>
                </div>
              </div>
            </div>
          </div>
          <div class="new-sub-plan pt-5">
            <div class="weeks-number">
              <div class="sub-agent-numbering pb-3">
                Agent № 2
              </div>
              <div class="d-flex justify-content-start align-items-center">
                <img src="/images/client/payments/time.png" alt="week icon" class="mr-3">
                <div class="weeks-number-heading">
                  Number of working hours per week
                </div>
              </div>
              <div class="week-input">
                <div class="account-edit-section-inputs d-flex align-items-center">
                  <div class="faq-question-input sub-edit-input  mt-3 d-flex flex-row align-items-center">
                    <div class="faq-input">
                      <select name="weeks"
                              id="hours2">
                        <option value="2">15 hours</option>
                        <option value="4">20 hours</option>
                        <option value="6">25 hours</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div>
                </div>
              </div>
            </div>
          </div>
          <div class="button-base white-button-a pt-4 w-100 d-flex justify-content-center">
            <a href="#" class="border-0 m-0" style="width:auto">
                            ADD ANOTHER AGENT
                        </a>
          </div>
          <div class="new-sub-plan pt-5">
            <div class="d-flex justify-content-start align-items-center">
              <img src="/images/client/payments/manager.png" alt="week icon" class="mr-3">
              <div class="weeks-number-heading">
                Manager of your campaign
              </div>
            </div>
          </div>
          <div class="blue-text"
               style="margin-left: 2.7rem;">
            Conor Marjoram
          </div>
          <div class="button-base white-button-a pt-4 w-100 d-flex justify-content-center">
            <a href="javascript:void(0)" style="width:158px; height:36px;" class="m-0" data-toggle="modal" data-target="#remove-manager-modal">
                            REMOVE MANAGER
                        </a>
          </div> -->
          <div class="sub-action pt-5" :class="{'disabled-btn': !canSubmit}">
            <a href="#"  @click="finishUpdate"
            >
                            CONTINUE
                        </a>
          </div>
        </div>
        <div v-show="status==='finish'">
          <div class="d-flex pt-3">
            <div class="mr-2">
              <img src="/images/client/payments/amount.png" class="mr-2" alt="amount icon">
                        </div>
              <div>
                <div class="blue-text">
                  WEEKLY RATE CALCULATIONS:
                </div>
                <div class="pt-2">
                  40 agent hours <span class="sub-agent-numbering ml-1"> $ 400</span>
                </div>
                <div class="blue-text pt-3">
                  TOTAL WEEKLY AMOUNT:
                </div>
                <div class="sub-agent-numbering pt-2">
                  $ 400
                </div>
              </div>
            </div>
            <div class="w-100 d-flex justify-content-end">
              <div class="lineDiv"></div>
              <div class="sub-action pt-5">
                <a href="#">
                                FINISH PAYMENT
                            </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal -->
      <div class="modal fade"
           id="remove-manager-modal"
           tabindex="-1"
           role="dialog"
           aria-labelledby="remove-manager-modal"
           aria-hidden="true">
        <div class="modal-dialog"
             role="document">
          <div class="modal-content border-0"
               style="margin-top: 30%;">
            <div class="modal-body campaign-team-modal">
              <div class="modal-question">
                Are you sure you want to remove the manager ?
              </div>
              <div class="modal-btn-wrapper">
                <div class="button-base white-button-a">
                  <a href="javascript:void(0)" data-dismiss="modal">CANCEL</a>
                </div>
                <div class="button-base blue-button-a">
                  <a href="javascript:void(0)" data-dismiss="modal">REMOVE THE MANAGER</a>
                </div>
              </div>
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
      status: 'update', // or finish
      checked: false,
      numOfWeeks: '',
      canSubmit: false,
      plans: [
        {
          price: 75,
          hoursPerWeek: 5,
          selected: false
        },
        {
          price: 140,
          hoursPerWeek: 10,
          selected: false
        },
        {
          price: 260,
          hoursPerWeek: 20,
          selected: false
        },
        {
          price: 360,
          hoursPerWeek: 30,
          selected: false
        },
        {
          price: 440,
          hoursPerWeek: 40,
          selected: false
        },
        {
          price: 600,
          hoursPerWeek: 60,
          selected: false
        }
      ]
    }
  },
  methods: {
    handleCheck () {
      this.checked = !this.checked
    },
    changePlan (index) {
      let { plans } = this
      let i = 0

      while (i < plans.length && !plans[i].selected) i++

      if (i < plans.length) plans[i].selected = false
      plans[index].selected = true

      this.plans = [...plans]

    },
    clearInput (key) {
      this[key] = ''
    },
    finishUpdate() {
      if (this.canSubmit) {
        this.status = 'finish'
      }
    },
    dateChanged(){
      this.selectedDate = $('#selected-date-value').val();
    },
    applySelectedDate(){
      this.appliedDate =  this.selectedDate;
      $('#close-modal').click();
    },
    cancelDatePicking(){
      $('#close-modal').click();
    },
    setDatePicker(){
      $( "#datepicker" ).datepicker({
        onSelect: function(dateText, inst) {
          $("input[name='selected-date-value']").val(dateText);
          const dateChanged = new CustomEvent('change');
          document.getElementById('selected-date-value').dispatchEvent(dateChanged);
        }
      });
    }
  },
  watch: {
    plans: {
      handler (value) {
        console.log(value)
        let selectedPlan = false

        for (let i = 0; i < value.length; i++) {
          if (value[i].selected) {
            selectedPlan = true
            break
          }
        }

        if (this.numOfWeeks !== '' && selectedPlan) this.canSubmit = true
      }
    },
    numOfWeeks: {
      handler (value) {
        let selectedPlan = false

        for (let i = 0; i < this.plans.length; i++) {
          if (this.plans.selected) {
            selectedPlan = true
            break
          }
        }

        if (value !== '' && selectedPlan) this.canSubmit = true
      }
    }
  }
}
</script>
<style scoped>
</style>
