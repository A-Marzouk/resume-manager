<template>
  <div data-app>
    <v-row justify="center">
      <v-dialog v-model="hireMeModal" content-class="m-2 hire-me-modal__main-content" persistent max-width="576">
        <v-card>
          <v-toolbar dark color="#f2f3fd" flat>
            <v-toolbar-title class="main-color pl-4">Booking/ payment</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn icon dark @click.prevent="closeHireMeModal()">
              <v-icon color="#001D68">mdi-close</v-icon>
            </v-btn>
          </v-toolbar>
          <div>
            <v-row class="px-md-4">
              <v-col cols="12">
                <!-- Profile Info -->
                <v-row dense>
                  <v-col cols="3">
                    <v-avatar size="100%">
                      <img
                        class="user-avatar"
                        :src="user.avatar"
                        :alt="user.name"
                      /> </v-avatar
                  ></v-col>
                  <v-col cols="9">
                    <div class="user-name">
                      {{ user.name }} - {{ user.job_title }}
                    </div>
                    <div class="user-rate">£{{user.hourlyRate}}/Hour</div>
                  </v-col>
                </v-row>
                <!-- Profile Info -->
              </v-col>

              <!-- Calculate Payment -->
              <v-col cols="12">
                <div class="calculate-payment">
                  <v-row no-gutters class="align-items-end justify-content-between">
                    <v-col cols="5" sm="auto" class="text-center">
                      <div class="rate-label">Hourly rate</div>
                      <input
                        type="text"
                        disabled
                        class="rate-input text"
                        name="hourly_rate"
                        :value="'£' + userHourlyRate"
                      />
                    </v-col>
                    <v-col cols="2" sm="auto" class="text-center">
                      <div class="operators">x</div>
                    </v-col>
                    <v-col cols="5" sm="auto" class="text-center"
                      ><div class="rate-label">
                        No. of hours/week
                      </div>
                      <input type="number" min="5" max="40" @blur="validateHours" class="rate-input text" name="no_of_week" v-model="totalHours" />
                    </v-col>
                    <v-col cols="12" sm="auto" class="text-center">
                      <div class="operators">=</div>
                    </v-col>
                    <v-col cols="12" sm="auto" class="text-center"
                      ><div class="rate-label">
                        <span class="text-capitalize">weekly</span> payment
                      </div>

                      <input
                        type="text"
                        disabled
                        class="rate-input total"
                        name="weekly-rate"
                        :value="'£' + paymentTotal"
                      />
                    </v-col>
                  </v-row>
                </div>
              </v-col>
              <!-- Calculate Payment -->

              <!-- Total Payment -->
              <v-col cols="12" class="total-payment">
                <div class="d-flex align-items-center">
                  <div class="total-payment_text">
                    Your weekly payment will be
                  </div>
                  <div class="total-payment_value pl-2 pl-md-3">£{{ paymentTotal }}</div>
                </div>
              </v-col>
              <!-- Total Payment -->
              <!-- Payment Options -->
              <v-col cols="12" sm="10" md="8" class="pt-0 pb-0">
                <v-row no-gutters class="flex-nowrap ">
                  <v-col cols="5">
                    <v-btn
                      width="100%"
                      height="42px"
                      :color="payToday ? '#001D68' : '#F2F3FD'"
                      :dark="payToday"
                      depressed
                      @click="payableToday"
                    >
                      <div class="payment-text" :class="[payToday ? 'white--text' : 'main-color']">Payable today</div>
                    </v-btn>
                  </v-col>
                  <v-col cols="2">
                    <div class="or" v-if="currentActiveMethod !== 'paypal'">or</div>
                  </v-col>
                  <v-col cols="5">
                    <v-btn
                      width="100%"
                      height="42px"
                      :color="isDatePickerOpened ? '#001D68' : '#F2F3FD'"
                      depressed
                      v-if="currentActiveMethod !== 'paypal'"
                      @click="pickDateSelected"
                      :dark="isDatePickerOpened"
                    >
                      <div class="payment-text" :class="[isDatePickerOpened ? 'white--text' : 'main-color']">
                        Date picker
                      </div>
                    </v-btn>
                  </v-col>
                </v-row>
              </v-col>
              <!-- Payment Options -->
              <!-- Date Picker -->
              <v-col cols="12" v-show="isDatePickerOpened" v-if="currentActiveMethod !== 'paypal'">
                <v-row dense>
                  <v-col cols="12">
                    <v-btn color="#001D68" dark text class="px-0">
                      {{ currentWeekDays[6].month }}
                      <v-icon right>mdi-calendar-blank</v-icon>
                    </v-btn>
                  </v-col>
                  <v-col style="display: flex;
    justify-content: flex-start;
    align-items: center;" cols="1">
                    <v-btn fab width="18" height="18" class="elevation" color="white"
                    ><v-icon small color="#888DB1" @click="decreaseCounter">mdi-chevron-left</v-icon></v-btn
                    >
                  </v-col>
                  <v-col cols="10">
                    <div class="week-days">
                      <div
                              v-for="(day, i) in currentWeekDays"
                              :key="i"
                              class="week-days_single"
                              :class="currentDate == day.obj ? 'active' : 'inactive'"
                              @click="selectedDate(day.obj)"
                      >
                        <div class="weekday">
                          {{ day.weekday }}
                        </div>
                        <div class="day">{{ day.date }}</div>
                        <!-- <div v-show="currentDate == day.obj">●</div> -->
                      </div>
                    </div>
                    <!-- <div>{{ weekdayCounter }}</div> -->
                  </v-col>
                  <v-col style="display: flex;
    justify-content: flex-end;
    align-items: center;" cols="1">
                    <v-btn fab width="18" height="18" class="elevation" color="white">
                      <v-icon small color="#888DB1" @click="increaseCounter">mdi-chevron-right</v-icon>
                    </v-btn>
                  </v-col>
                </v-row>
              </v-col>
              <!-- Date Picker -->

              <!-- Payment Form -->
              <v-col cols="12">
                <v-row no-gutters>
                  <v-col cols="auto">
                    <div class="month-numbers mr-1">Number of weeks -</div>
                  </v-col>
                  <v-col col cols="4" md="3">
                    <div>
                      <v-select
                              v-model="select"
                              dense
                              color="#001CE2"
                              item-color="#001D68"
                              transition="slide-y-transition"
                              class="d-inline-block font-weight-bold text-capitalize month-numbers"
                              :items="totalNumber"
                              item-text="number"
                              item-value="number"
                              return-object
                              flat
                      ></v-select>
                    </div>
                  </v-col>
                </v-row>

                <v-row no-gutters>
                  <v-col cols="12" sm="7">
                    <v-text-field
                            :rules="[rules.required]"
                            label="Name"
                            type="text"
                            :error="!!errors.name"
                            :error-messages="errors.name"
                            single-line
                            v-model="client.name"
                            color="#001CE2"
                    ></v-text-field>
                    <v-text-field
                            :rules="[rules.required, rules.email]"
                            label="Email"
                            type="email"
                            :error="!!errors.email"
                            :error-messages="errors.email"
                            v-model="client.email"
                            single-line
                            color="#001CE2"
                    ></v-text-field>
                  </v-col>
                </v-row>
              </v-col>
              <!-- Payment Form -->

              <!-- Payment Methods -->
              <v-col cols="12">
                <v-row align="center" style="justify-content: center;">
                  <v-col cols="4"  sm="3" align-self="center">
                    <v-img
                            src="/icons/hire-modal/stripe-logo.svg"
                            height="30"
                            alt="stripe icon"
                            contain
                            @click="currentActiveMethod = 'stripe'"
                            :class="[currentActiveMethod == 'stripe' ? 'active-method' : 'inactive-method']"
                    ></v-img>
                  </v-col>
                  <v-col cols="4"  sm="3" align-self="center">
                    <v-img
                            src="/icons/hire-modal/paypal-logo.svg"
                            height="30"
                            alt="paypal icon"
                            contain
                            @click="currentActiveMethod = 'paypal'"
                            :class="[currentActiveMethod == 'paypal' ? 'active-method' : 'inactive-method']"
                    ></v-img
                    ></v-col>
                  <v-col cols="12"  sm="6" class="flex-fill text-right" style="display: flex; justify-content: flex-end;">
                    <v-btn
                            dark
                            depressed
                            color="#001CE2"
                            height="50"
                            class="submit-button"
                            @click="pay"
                    >
                      {{ loading ? 'Redirecting..' : 'Confirm' }}
                    </v-btn>
                  </v-col>
                </v-row>
              </v-col>
              <!-- Payment Methods -->
            </v-row>
          </div>
        </v-card>
      </v-dialog>
    </v-row>
  </div>
</template>

<script>
import hireMefunctions from './hireMe.functions';

export default {
  name: 'HireMeModal',
  extends: hireMefunctions
};
</script>

<style lang="scss" scoped>
@import './hireMe.styles.scss';
</style>

<style lang="scss">

  .v-dialog__content{
    z-index: 9999999999 !important;
  }


  .hire-me-url-btn{
    height: 50px;
    @media screen and (max-width: 425px) {
      height: 46px !important;
    }
    min-width:124px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #001CE2;
    border: 1.5px solid #001CE2;
    border-radius: 5px;
    font-weight: 600;
    font-size: 13px;
    line-height: 18px;
    &:hover{
      text-decoration: none;
    }
  }

.hire-me-modal__main-content {
  font-family: Montserrat, sans-serif;
  .submit-button {
    @media screen and (max-width: 425px) {
      height: 46px !important;
    }
  }
}

.hourSlider {
  .v-slider--horizontal {
    min-height: 25px !important;
    margin-left: 15px !important;
    margin-right: 30px !important;
    .v-slider__thumb {
      padding: 2px 15px !important;
    }
    .v-slider__thumb:before {
      width: 0px !important;
      height: 0px !important;
    }
    .v-slider__thumb,
    .v-slider__thumb:before {
      position: absolute;
      border-radius: 50px !important;
      transition: 0.3s cubic-bezier(0.25, 0.8, 0.5, 1);
    }
  }
}

.month-numbers.theme--light.v-text-field {
  & > .v-input__control > .v-input__slot {
    max-width: 100px;
    &:before,
    &:after {
      border-width: 0;
    }
    .v-input__append-inner {
      display: none;
    }
  }
}

.theme--light.v-select .v-select__selection--comma {
  color: #001d68 !important;
}
</style>
