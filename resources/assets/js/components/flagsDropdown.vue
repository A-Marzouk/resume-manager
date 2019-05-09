<template>
  <div class="flags-dropdown no-decoration">
    <slot></slot>
    <a href="javascript:;" class="selected-country" v-on:click="opened = !opened">
      <img
        class="flag-img"
        :src="`/images/dashboard/flag.svg`"
        :alt="`flag ${flags[selected].name}`"
      />
      <span class="flag-name">+{{ flags[selected].code }}</span>
    </a>
    <div class="flags-container"
      :class="{ opened }"
    >
      <a
        href="javascript:;"
        v-on:click="() => {
          selected = index
          opened = false
        }"
        :key="index + flag.name"
        class="flag-item"
        v-for="(flag, index) in flags"
      >
        <!-- :src="`/images/dashboard/flag-${flag.abrev}.svg`" -->
      <img
        class="flag-img"
        :src="`/images/dashboard/flag.svg`"
        :alt="`flag ${flag.name}`"
      />
      <span class="flag-name">{{ flag.name }}</span>
    </a>
    </div>
  </div>
</template>
<script>
export default {
  data () {
    return {
      flags: [
        {
          code: '1',
          name: 'USA',
          abrev: 'us'
        },
        {
          code: '58',
          name: 'Venezuela',
          abrev: 'ven'
        },
        {
          code: '57',
          name: 'Colombia',
          abrev: 'col'
        }
      ],
      selected: 0,
      opened: false,
    }
  }
}
</script>
