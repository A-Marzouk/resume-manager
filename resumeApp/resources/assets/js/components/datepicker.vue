<template>
  <div>
    <div class="date-picker-bar">
      <span class="date-control-left"><</span>
      <div class="days-container">
        <div class="date-item" v-for="n in 17" :key="n" :class="{active: n === 10}">
          <div class="day-number" :class="{active: n === 10}">{{ n }}</div>
          <div class="day-of-week" :class="{active: n === 10}">{{ dayOfWeek(n) }}</div>
        </div>
      </div>
      <span class="date-control-right">></span>
      <slot></slot>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      days: []
    }
  },
  methods: {
    dayOfWeek: (day) => {
      switch (day % 7) {
        case 0:
          return 'Mon'

        case 1:
          return 'Tue'

        case 2:
          return 'Wed'

        case 3:
          return 'Thu'

        case 4:
          return 'Fri'

        case 5:
          return 'Sat'

        default:
          return 'Sun'
      }
    }
  }
}
</script>

