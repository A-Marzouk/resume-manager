<template>
  <div class="works-container container">
    <!-- Two columns division -->
    <div v-if="works.length < 2" class="row">
      <div class="col col-12 col-lg-6 works-column">
        <work :work="works[0]"></work>
      </div>
      <div class="col col-12 col-lg-6 works-column"></div>
    </div>
    <div v-else class="row">
      <div class="col col-12 col-lg-6 works-column">
        <work
          v-for="w in works.slice(0, middleIndex)"
          :key="w.company"
          :work="w"
        ></work>
      </div>

      <div class="col col-12 col-lg-6 works-column">
        <work
          v-for="w in works.slice(middleIndex, works.length)"
          :key="w.company"
          :work="w"
        ></work>
      </div>
    </div>
  </div>
</template>

<script>
import work from "./work.vue";

export default {
  components: {
    work
  },
  props: ["works"],
  // data: () => ({
  //   works: []
  // }),
  computed: {
    middleIndex() {
      return Math.floor(this.works.length / 2);
    }
  }
};
</script>
