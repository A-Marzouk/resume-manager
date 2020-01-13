<template>
  <div class="work container">
    <div class="row">
      <div class="col-4">
        <p class="job-title">{{work.job_title}}</p>
        <span class="date">
          <b>{{formatedDate(work.date_from)}} - {{work.is_currently_working ? 'actually' : formatedDate(work.date_to)}}</b>
        </span>
      </div>
      <div class="col-8">
        <h4 class="company-name">{{work.company}}</h4>
        <p class="work-description">{{work.job_description}}</p>
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";

export default {
  props: ["work"],
  methods: {
    formatedDate: date => {
      return moment(date).format("YYYY");
    }
  }
};
</script>

<style lang="scss">
$primaryColor: #104efb;

.work {
  margin-bottom: 5rem;
  overflow-y: auto;
  color: $primaryColor;

  .job_title {
    margin-bottom: 40px;
    font-size: 20px;
  }
}
</style>