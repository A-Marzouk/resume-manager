<template>
    <div>

    </div>
</template>

<script>
    export default {
        data(){
          return {
              bookings:[],
              year  : '',
              month : '',
          }
        },
        methods: {
          getBookings(){
              axios.get('/admin/get/bookings')
              .then( response => {
                  this.bookings = response.data;
                  let date = new Date(this.bookings[0].created_at);
                  console.log(date.getMonth());
                  console.log(date.getDate());
                  console.log(date.getFullYear());
                  console.log(this.bookings[0].created_at);
              });
          },
          filterByYear(year){

          }
        },
        mounted() {
            this.getBookings();
        }
    }
</script>