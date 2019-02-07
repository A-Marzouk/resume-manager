<template>
    <div class="rootElement">
        <div class="pageHeading" style="margin-top:5px;">
            Bookings Calendar
        </div>
        <div class="pageSubHeading">
            <br/>
        </div>
        <div class="row YearView" v-show="view === 'years'">
            <div class="col-md-4" v-for="(year,index) in years" v-bind:key="index">
                <div class="yearBox">
                    <a href="javascript:void(0)" class="btn btn-outline-primary btn-block" @click="filterBookingsByYear(year)">
                        {{year}}
                    </a>
                </div>
            </div>
        </div>
        <div class="monthsView" v-show="view === 'months'">
            <div class="row">
                <div class="col-12">
                    <div class="pageSubHeading">
                       in <span style="color:blue;">{{year}}</span> there are
                        <span style="color:blue;">{{currentYearBookings.length}}</span> Bookings.
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="margin:10px;">
                    <a href="javascript:void(0)" @click="setView('years')" class="btn btn-dark">Back to years</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4" v-for="(month,index) in months" v-bind:key="index">
                    <div class="monthBox">
                        <button :disabled="getMonthBookings(index+1) == 0" class="btn btn-outline-primary btn-block" @click="filterBookingsByMonth(index+1)">
                            {{month}}<br/>
                            # {{getMonthBookings(index+1)}} Bookings
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="daysView" v-show="view === 'days'">
            <div class="pageSubHeading">
                Month number : #{{month}}
            </div>
            <div class="col-md-12" style="margin:10px;">
                <a href="javascript:void(0)" @click="setView('months')" class="btn btn-dark">Back to months</a>
            </div>
            <div class="row">
                <div class="col-md-2">
                    Paid :
                    <img src="/resumeApp/resources/assets/images/green_circle.png" alt="red" height="6" width="6">
                </div>
                <div class="col-md-6">
                    Unpaid :
                    <img src="/resumeApp/resources/assets/images/red_circle.png" alt="red" height="6" width="6">
                </div>
             </div>
            <div class="row">
                <div class="col-md-3" v-for="index in 31" v-bind:key="index">
                    <div class="dayBox">
                        <button class="btn btn-block btn-outline-dark" :disabled="getDayBookings(index).length == 0">
                            {{index}}/{{month}}/{{year}} <br/>
                            # {{getDayBookings(index).length}} bookings <br/>
                            <span v-for="(dayBooking,index) in getDayBookings(index)" class="NoDecor">
                                <a :href="'/admin/view/booking/'+dayBooking.id" target="_blank">
                                    {{index+1}}. Booking &nbsp;&nbsp;
                                    <span class="redCircle" v-show="!dayBooking.is_paid">
                                        <img src="/resumeApp/resources/assets/images/red_circle.png" alt="red" height="6" width="6">
                                    </span>
                                    <span class="greenCircle" v-show="dayBooking.is_paid">
                                        <img src="/resumeApp/resources/assets/images/green_circle.png" alt="red" height="6" width="6">
                                    </span>
                                </a>
                                <br/>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
          return {
              bookings:[],
              months:[
                  'Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'
              ],
              years : [
                  2018,2019,2020
              ],
              year  : '',
              month : '',
              view  : 'years',
              currentYearBookings:[],
              currentMonthBookings:[],
          }
        },
        methods: {
            testing(){
              return 'hi';
            },
            setView(view){
                this.view = view ;
            },
            getBookings(){
                  axios.get('/admin/get/bookings')
                  .then( response => {
                      this.bookings = response.data;
                  });
            },
            filterBookingsByYear(year){
                this.year = year;
                this.view = 'months';
                let yearFilteredBookings = [];
                $.each(this.bookings, (i) =>{
                    let date = new Date(this.bookings[i].created_at);
                    if(date.getFullYear() === year){
                        yearFilteredBookings.push(this.bookings[i]);
                    }
                });
                this.currentYearBookings = yearFilteredBookings;
            },
            filterBookingsByMonth(month){
                this.month = month;
                this.view  = 'days';
                let filteredBookings = [];
                $.each(this.bookings, (i) =>{
                   let date = new Date(this.bookings[i].created_at);
                   if(date.getMonth()+1 === month && date.getFullYear() === this.year){
                     filteredBookings.push(this.bookings[i]);
                   }
                });
                this.currentMonthBookings = filteredBookings;
            },
            getMonthBookings(monthNumber){
                let filteredBookings = [];
                $.each(this.currentYearBookings, (i) =>{
                    let date = new Date(this.currentYearBookings[i].created_at);
                    if(date.getMonth()+1 === monthNumber && date.getFullYear() === this.year){
                        filteredBookings.push(this.currentYearBookings[i]);
                    }
                });

                return filteredBookings.length;
            },
            getDayBookings(dayNumber){
                let filteredBookings = [];
                $.each(this.currentMonthBookings, (i) =>{
                    let date = new Date(this.currentMonthBookings[i].created_at);
                    if(date.getDate() === dayNumber && date.getMonth()+1 === this.month && date.getFullYear() === this.year){
                        filteredBookings.push(this.currentMonthBookings[i]);
                    }
                });

                return filteredBookings;

            },
            filterYear(booking,year){
                let date = new Date(booking.created_at);
                if(date.getFullYear() === year){
                   return true;
                }
                return false;
            }
        },
        mounted() {
            this.getBookings();
        }
    }
</script>

<style>
    .monthBox{
        margin: 10px;
    }
    .dayBox{
       margin:5px;
    }
</style>