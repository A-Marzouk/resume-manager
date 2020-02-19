<template>
  <div class="education container">
    <div class="row">
      <div class="content-title col-12 col-md-4">
        <p class="job_title">{{ education.school_title }}</p>
        <span class="date">
          <b
            >{{ formatedDate(education.date_from) }} -
            {{
              education.currently_learning
                ? "actually"
                : formatedDate(education.date_to)
            }}</b
          >
        </span>
      </div>
      <div class="col-12 col-md-8">
        <h4 class="company-name">School name here</h4>
        <p class="education-description">{{ education.description }}</p>
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";

export default {
  props: ["education"],
  methods: {
    formatedDate: date => {
      return moment(date).format("YYYY");
    }
  }
};
</script>

<style lang="scss">
$primaryColor: #104efb;

.education {
  margin-bottom: 5rem;
  overflow-y: auto;
  color: $primaryColor;

  .job_title {
    margin-bottom: 41px;
    font-size: 20px;

    @media only screen and (max-width: 768px) {
      order: 2;
    }
  }

  @media only screen and (max-width: 768px) {
    .content-title {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    .date {
      margin-right: 10px;
    }
  }

  .company-name {
    font-weight: 700;
  }
}
</style>
