<template>
  <div class="agentsContainer">
    <freelancer-card-small v-for="freelancer in freelancers" :key="freelancer.id + freelancer.firstName" :freelancer="freelancer"></freelancer-card-small>
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

  })
}
</script>

