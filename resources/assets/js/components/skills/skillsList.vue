<template>
  <div class="dropdown-options" @focusin="showSkillsList = true" @focusOut="showSkillsList = false">
    <ul class="options-container">
      <li v-for="skill in skillsFiltered" :key="skill" class="option" @click="selectOption(skill)">{{ skill }}</li>
    </ul>
  </div>
</template>
<script>
export default {
  props: ['skillsFiltered', 'selectOption', 'showSkillsList']
}
</script>
<style lang="scss">
  .dropdown-options {
    position: absolute;
    width: 50%;
    top: 40px;
    left: 0;
    background: white;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    z-index: 20;

    .options-container {
      list-style: none;
      max-height: 150px;
      padding: 0;
      overflow-y: scroll;

      .option {
        margin: 0;
        padding: 3px 8px;

        &:hover {
          background: #ced4da;
          cursor: pointer;
        }
      }
    }
  }
</style>