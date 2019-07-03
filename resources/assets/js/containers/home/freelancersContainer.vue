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

      <div class="agentsContainer__selectContainer" :class="{active: activeBox === 'designerType'}">
        <select @focus="activeBox = 'designerType'" name="" id="">
          <option v-for="(designerType, index) in customValues.designerTypes" :value="designerType" :key="designerType + index">{{designerType}}</option>
        </select>
      </div>

      <div v-if="customSearch" class="agentsContainer__customSelect" >
        <div class="agentsContainer__selectContainer" :class="{active: activeBox === 'rate'}">
          <select @focus="activeBox = 'rate'" v-bind="customSearch.rate">
            <option value="">Choose a rate</option>
            <option v-for="(rate, index) in customValues.rates" :value="rate" :key="rate + index">$ {{rate}} hourly</option>
          </select>
        </div>
        <div class="agentsContainer__selectContainer" :class="{active: activeBox === 'availability'}">
          <select @focus="activeBox = 'availability'" v-bind="customSearch.availability">
            <option value="">Choose an availability</option>
            <option v-for="(availability, index) in customValues.availability" :value="availability" :key="availability + index">{{availability}} hours daily</option>
          </select>
        </div>
        <div class="agentsContainer__selectContainer" :class="{active: activeBox === 'country'}">
          <select @focus="activeBox = 'country'" v-bind="customSearch.country">
            <option value="">Choose a country</option>
            <option v-for="(country, index) in customValues.countries" :value="country" :key="country + index">{{country}}</option>
          </select>
        </div>
      </div>

      <img src="/images/home/computer.png" alt="computer" class="bottomBg">
      <div class="agentsContainer">
        <freelancer-card-small v-for="freelancer in freelancers" :key="freelancer.id + freelancer.firstName" :freelancer="freelancer"></freelancer-card-small>
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
    customSearch: false,
    searchParams: {
      designerType: '',
      rate: '',
      availability: '',
      country: ''
    },
    activeBox: 'designerType',
    customValues: {
      designerTypes: [
        'UI/UX designer',
        'Illustrator',
        'Motion designer',
        'Digital artist'
      ],
      rates: [
        '10 - 15',
        '15 - 20',
        '20 - 30',
        '30 - 40',
        '+40'
      ],
      availability: [
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
  })
}
</script>

