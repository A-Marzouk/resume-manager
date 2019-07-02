<template>
  <div class="agentsContainer">
    <freelancer-card-small></freelancer-card-small>
    Hello
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

