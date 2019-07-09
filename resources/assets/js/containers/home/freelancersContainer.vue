<template>
  <div class="agentsSection">
      <img class="agentsBg-1" src="/images/home/agentsBg-1.svg" alt="">
      <img class="agentsBg-2" src="/images/home/agentsBg-2.svg" alt="">
      <img class="agentsBg-3" src="/images/home/agentsBg-3.svg" alt="">
      <img src="/images/home/pencilsBg.png" alt="" class="pencilsBg">
      <div class="agentsContainer__searchTools">
        <button @click="customSearch = false" class="btn-first" :class="{active: !customSearch}">Featured designers</button>
        <button @click="customSearch = true" class="btn-second" :class="{active: customSearch}">Search designers</button>
      </div>

      <div class="agentsContainer__searchSelects">
        <div class="agentsContainer__selectContainer" :class="{active: activeBox === 'jobTitle'}">
          <select name="jobTitle" v-on:change="handleChangeSelect" @focus="activeBox = 'jobTitle'">
            <option v-for="(jobTitle, index) in customValues.jobTitles" :value="jobTitle" :key="jobTitle + index">{{jobTitle}}</option>
          </select>
        </div>

        <div v-if="customSearch" class="agentsContainer__customSelect" >
          <div class="agentsContainer__selectContainer" :class="{active: activeBox === 'rate'}">
            <select name="rate" v-on:change="handleChangeSelect" @focus="activeBox = 'rate'">
              <option value="">Choose a rate</option>
              <option v-for="(rate, index) in customValues.rates" :value="rate" :key="rate + index">$ {{rate}} hourly</option>
            </select>
          </div>
          <div class="agentsContainer__selectContainer" :class="{active: activeBox === 'availability'}">
            <select name="availability" v-on:change="handleChangeSelect" @focus="activeBox = 'availability'">
              <option value="">Choose an availability</option>
              <option v-for="(availability, index) in customValues.availabilities" :value="availability" :key="availability + index">{{availability}} hours weekly</option>
            </select>
          </div>
          <div class="agentsContainer__selectContainer" :class="{active: activeBox === 'country'}">
            <select name="country" v-on:change="handleChangeSelect" @focus="activeBox = 'country'">
              <option value="">Choose a country</option>
              <option v-for="(country, index) in customValues.countries" :value="country" :key="country + index">{{country}}</option>
            </select>
          </div>
      </div>

      </div>

      <img src="/images/home/computer.png" alt="computer" class="bottomBg">
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
  data: () => ({
    results: [],
    customSearch: false,
    searchParams: {
      jobTitle: '',
      rate: '',
      availability: '',
      country: ''
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
        '5 - 10',
        '10 - 15',
        '15 - 20',
        '20 - 30',
        '30 - 40',
        '+40'
      ],
      availabilities: [
        '10 - 20',
        '20 - 30',
        '30 - 40',
        '+40'
      ],
      countries: [
        'Venezuela',
        'Ukraine',
        'EEUU'
      ]
    }
  }),
  methods: {
    handleChangeSelect (e) {
      // Get data from api

      this.searchParams[e.target.name] = e.target.value
      this.searchAgents()
    },
    searchAgents () {
      let {
        jobTitle,
        availability,
        rate,
        country
      } = this.searchParams

      axios
        .post(`/searchAgents`, {
          jobTitle,
          available_hours: availability,
          salary_hour: rate,
          country
        })
        .then(response => this.results = response.data)
        .catch(error => console.log(error))
    }
  }
}
</script>

