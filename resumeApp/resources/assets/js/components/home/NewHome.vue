<template>
  <div class="agentsSection">
      <img class="agentsBg-1" src="/resumeApp/public/images/home/agentsBg-1.svg" alt="">
      <img class="agentsBg-2" src="/resumeApp/public/images/home/agentsBg-2.svg" alt="">
      <img class="agentsBg-3" src="/resumeApp/public/images/home/agentsBg-3.svg" alt="">
      <img src="/resumeApp/public/images/home/pencilsBg.png" alt="" class="pencilsBg">
      <div class="agentsContainer__searchTools">
        <button @click="customSearch = false" class="btn-first" :class="{active: !customSearch}">Featured designers</button>
        <button @click="customSearch = true" class="btn-second" :class="{active: customSearch}">Search designers</button>
      </div>

      <div class="agentsContainer__searchSelects">
        <div class="agentsContainer__selectContainer" :class="{active: activeBox === 'jobTitle'}">
          <select name="jobTitle" v-model="searchParams.jobTitle" @focus="activeBox = 'jobTitle'" @change="updateSearch">
              <option value="">Choose job title</option>
              <option v-for="(jobTitle, index) in customValues.jobTitles" :value="jobTitle" :key="jobTitle + index">{{jobTitle}}</option>
          </select>
        </div>

        <div v-if="customSearch" class="agentsContainer__customSelect" >
          <div class="agentsContainer__selectContainer" :class="{active: activeBox === 'rate'}">
            <select name="rate" v-model="searchParams.salary_hour" @focus="activeBox = 'rate'" @change="updateSearch">
              <option value="">Choose a rate</option>
              <option v-for="(rate, index) in customValues.rates" :value="rate.value" :key="rate.value + index"> {{rate.name}} hourly</option>
            </select>
          </div>
          <div class="agentsContainer__selectContainer" :class="{active: activeBox === 'availability'}">
            <select name="availability" v-model="searchParams.available_hours" @focus="activeBox = 'availability'" @change="updateSearch">
              <option value="">Choose an availability</option>
              <option v-for="(availability, index) in customValues.availabilities" :value="availability.value" :key="availability.value + index">{{availability.name}} hours weekly</option>
            </select>
          </div>
          <div class="agentsContainer__selectContainer" :class="{active: activeBox === 'country'}">
            <select name="country" v-model="searchParams.country" @focus="activeBox = 'country'" @change="updateSearch">
              <option value="">Choose a country</option>
              <option v-for="(country, index) in customValues.countries" :value="country" :key="country + index">{{country}}</option>
            </select>
          </div>
      </div>

      </div>

      <img src="/resumeApp/public/images/home/computer.png" alt="computer" class="bottomBg">
      <div v-if="!customSearch" class="agentsContainer">
        <freelancer-card-small v-for="freelancer in freelancers" :key="freelancer.id + freelancer.firstName" :freelancer="freelancer"></freelancer-card-small>
      </div>
      <div v-else class="agentsContainer">
        <freelancer-card-small v-for="agent in results" :key="agent.id + agent.firstName" :freelancer="agent"></freelancer-card-small>
      </div>
  </div>
</template>

<script>
import freelancerCardSmall from '../../components/homeDesigners/freelancerSmallCard'

export default {
    components: {
    freelancerCardSmall
    },

    props: ['freelancers'],

    data() {
      return{
          results: [],
          customSearch: false,

          searchParams: {
              jobTitle: 'design',
              salary_hour: '1000',
              available_hours: '1',
              country: '',
          },

          activeBox: 'jobTitle',

          customValues: {
              jobTitles: [
                  'UI/UX designer',
                  'Illustrator',
                  'Motion designer',
                  'Digital artist'
              ],
              rates: [
                  {
                      value:'10',
                      name:'Max of 10$'
                  },
                  {
                      value:'20',
                      name:'Max of 20$'
                  },
                  {
                      value:'30',
                      name:'Max of 30$'
                  },
                  {
                      value:'40',
                      name:'Max of 40$'
                  },
                  {
                      value:'1000',
                      name:'$$$'
                  },
              ],
              availabilities: [
                  {
                      value:'10',
                      name:'10+'
                  },
                  {
                      value:'20',
                      name:'20+'
                  },
                  {
                      value:'30',
                      name:'30+'
                  },
                  {
                      value:'40',
                      name:'40+'
                  },

              ],
              countries: ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua &amp; Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas"
                  ,"Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia &amp; Herzegovina","Botswana","Brazil","British Virgin Islands"
                  ,"Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica"
                  ,"Cote D Ivoire","Croatia","Cruise Ship","Cuba","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea"
                  ,"Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana"
                  ,"Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India"
                  ,"Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kuwait","Kyrgyz Republic","Laos","Latvia"
                  ,"Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Mauritania"
                  ,"Mauritius","Mexico","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Namibia","Nepal","Netherlands","Netherlands Antilles","New Caledonia"
                  ,"New Zealand","Nicaragua","Niger","Nigeria","Norway","Oman","Pakistan","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal"
                  ,"Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre &amp; Miquelon","Samoa","San Marino","Satellite","Saudi Arabia","Senegal","Serbia","Seychelles"
                  ,"Sierra Leone","Singapore","Slovakia","Slovenia","South Africa","South Korea","Spain","Sri Lanka","St Kitts &amp; Nevis","St Lucia","St Vincent","St. Lucia","Sudan"
                  ,"Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad &amp; Tobago","Tunisia"
                  ,"Turkey","Turkmenistan","Turks &amp; Caicos","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States","United States Minor Outlying Islands","Uruguay"
                  ,"Uzbekistan","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"],
          }
      }
    },

    methods: {
      updateSearch(){
          axios.post('/search-designers',this.searchParams).then((response)=>{
              this.results = response.data;
          });
      },
    },


    mounted() {
        this.updateSearch();
        this.searchParams = {
                jobTitle: '',
                salary_hour: '',
                available_hours: '',
                country: ''
        };
    }
}
</script>

<style scoped>
    *:focus{
        outline: 0;
    }
</style>
