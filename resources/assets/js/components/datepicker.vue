<template>
  <div>
    <div class="date-picker-bar">
      <span class="date-control-left"><img src="/images/icons/arrow_back.svg" alt="arrow back"></span>
      <div class="days-container">
        <a href="javascript:;"
          class="date-item"
          v-for="n in 17" :key="n"
          :class="{active: n === activeDay}"
          v-on:click="activeDay = n"
        >
          <div class="day-number" :class="{active: n === activeDay}">{{ n }}</div>
          <div class="day-of-week" :class="{active: n === activeDay}">{{ dayOfWeek(n) }}</div>
        </a>
      </div>
      <span class="date-control-right"><img src="/images/icons/arrow_forward.svg" alt="arrow forward"></span>
      <slot></slot>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      activeDay: 10
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

