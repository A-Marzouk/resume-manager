<template>
  <div class="educations-container container">
    <!-- Two columns division -->
    <div v-if="educations.length < 2" class="row">
      <div class="col educations-column">
        <education :education="educations[0]"></education>
      </div>
      <div class="col educations-column"></div>
    </div>
    <div v-else class="row">
      <div class="col educations-column">
        <education
          v-for="(e,i) in educations.slice(0, middleIndex)"
          :key="e.school_title + i"
          :education="w"
        ></education>
      </div>

      <div class="col educations-column">
        <education
          v-for="(e,i) in educations.slice(middleIndex, educations.length)"
          :key="e.school_title + i"
          :education="e"
        ></education>
      </div>
    </div>
  </div>
</template>

<script>
import education from "./education.vue";

export default {
  components: {
    education
  },
  props: ["educations"],
  // data: () => ({
  //   educations: []
  // }),
  computed: {
    middleIndex() {
      return Math.floor(this.educations.length / 2);
    }
  }
};
</script>