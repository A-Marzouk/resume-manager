<template>
  <div>
    <section class="resume-main">
      <img class="main-asset" src="/images/resume_builder/asset1.svg" alt="resume builder asset 123workforce">
      <div class="container">
        <h1 class="resume-main__title">Make Your Online Resume</h1>
        <h2 class="resume-main__subtitle">Choose Your Username</h2>
      </div>
      <div class="container username">
        <div class="styled-input">
          <img src="/images/resume_builder/arrow-username.svg" alt="snippet arrow" />
          <span class="url">123workforce.com/</span>
          <input type="text" id="username" placeholder="Your username"/>
        </div>
        <button class="btn filled">Build My Resume</button>
      </div>
    </section>

    <section class="resume-samples">
      <div class="professions-slider-container">
        <button @click="prevPosition" class="slick-control prev-arrow">
          <img src="/images/resume_builder/prev-arrow.svg" />
        </button>
        <slick class="professions-slider-tabs"
          ref="slick"
          :options="slickOptions"
        >
          <li v-for="(profession, index) in professions" 
            :key="profession"
          ><a @click="handleSetPosition(index)">{{ profession }}</a></li>
        </slick>
        <button @click="nextPosition" class="slick-control next-arrow">
          <img src="/images/resume_builder/next-arrow.svg" />
        </button>
      </div>

      <div class="resume-preview">
        <transition name="fade">
          <img :key="actualProfessionSlug" :src="`/images/resume_builder/resume-${actualProfessionSlug}.png`" alt="resume preview">
        </transition>
      </div>
    </section>
    <section class="subscriptions-plans">
      <h2 class="section-title">The Ultimate Tool <br /> for Professional's Resumes</h2>
      <div class="input-container">
        <div class="input-wrapper">
          <span>123workforce.com/</span>
          <input placeholder="Your Name" type="text">
        </div>
        <button class="btn filled">Build My Resume</button>
      </div>

      <div class="plans">
        <div class="toggle-panel">
          <div class="aux-fill" :class="{left: selectedPlan === 'monthly', right: selectedPlan === 'yearly'}"></div>
          <div class="buttons">
            <button v-on:click="selectedPlan = 'monthly'" class="toggle-btn monthly">Monthly</button>
            <button v-on:click="selectedPlan = 'yearly'" class="toggle-btn yearly">Yearly</button>
          </div>
        </div>
        <transition name="fade">
          <monthly-plan v-if="selectedPlan === 'monthly'"></monthly-plan>
          <yearly-plan v-else></yearly-plan>
        </transition>
        <img class="dot-bg" src="/images/resume_builder/dotbox.png" alt="">
      </div>
    </section>
    <footer-resume></footer-resume>
  </div>
</template>
<script>
import Slick from 'vue-slick'
import monthlyPlan from './resumeBuilderIncludes/monthly_plan.vue'
import yearlyPlan from './resumeBuilderIncludes/yearly_plan.vue'
import footerResume from './resumeBuilderIncludes/footer.vue'

export default {
  components: { Slick, monthlyPlan, yearlyPlan, footerResume },
  data: () => ({
    professions: [
      'Virtual Assistant',
      'UI/UX Designer',
      'Graphic Designer',
      '3D designer',
      'Copywriter',
      'Web Developer',
      'Bookkeper',
      'Fullstack Developer',
      'Frontend Developer',
      'Backend Developer',
      'DBA Specialist',
      'Mobile Developer',
      'Animator',
      'Multimedia productor'
    ],
    slickOptions: {
      infinite: false,
      centerMode: true,
      slidesToShow: 5,
      slidesToScroll: 5,
      speed: 300,
      adaptiveHeight: true,
      initialSlide: 4,
      nextArrow: '',
      prevArrow: '',
      variableWidth: true,
      responsive: [
        {
          breakpoint: 1180,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 4
          }
        },
        {
          breakpoint: 1100,
          settings: {
            slidesToShow: 5,
            slidesToScroll: 5
          }
        }
      ]
    },
    actualProfession: null,
    selectedPlan: 'monthly'
  }),
  methods: {
    handleSetPosition(index) {
      this.$refs.slick.goTo(index)
      this.actualProfession = this.professions[index]
    },
    reInit () {
      this.$nextTick(() => {
        this.$refs.slick.reSlick();
      });
    },

    nextPosition () {
      let  index = this.$refs.slick.currentSlide()
      if (index < this.professions.length) {
        this.$refs.slick.goTo(index + 1)
        this.actualProfession = this.professions[index + 1]
      }
    },

    prevPosition () {
      let  index = this.$refs.slick.currentSlide()
      if (index > 0) {
        this.$refs.slick.goTo(index - 1)
        this.actualProfession = this.professions[index - 1]
      }
    }
  },
  computed: {
    actualProfessionSlug: function () {
      return this.actualProfession ? this.actualProfession.replace(' ', '_').toLowerCase() : 'default'
    }
  },
  mounted () {
    this.actualProfession = this.professions[this.$refs.slick.currentSlide()]
  }
}
</script>
<style lang="scss">
  // Styles for the resume builder view
$text-color: #1f3445;
$primary: #0290d8;
$bg-color: white;
$input-bg: #F2F9FD;
$placeholder-color: #9ba1ad;

.no-bg {
  background: $bg-color;
}

.filled {
  background: $primary;
  color: $bg-color;
}

.btn.filled {
  padding: 0 2rem !important;
  border-radius: 10px;
  margin: 0 1.5rem;
  height: 60px;
}

.resume-builder-nav {
  position: fixed !important;
  top: 0;
  box-sizing: border-box;
  height: auto;
  width: 100%;
  z-index: 500;

  .navbar-brand img {
    width: 244px;
  }

  @media (max-width: 1480px) {

    .navbar-brand img {
      width: 180px;
    }
  }

  @media (max-width: 576px) {

    .navbar-brand {
      padding: 0;

      img {
        width: 50px;
      }
    }
  }
}

.loginBtn {

  &.no-outline {
    border: 0;
    margin-right: 0;

    a {
      color: $text-color;
      font-weight: normal;
    }
  }

  &.filled {
    background: $primary;
    border-radius: 5px;

    a {
      color: $bg-color;
      width: 150px;
      font-weight: 700;
    }
  }

  &.filled,
  &.no-outline {
    a {
      height: 55px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
    }
  }

  @media (max-width: 1480px) {
    &.filled,
    &.no-outline {
    a {
      width: 120px;
      height: 35px;
      font-size: 16px;
    }
  }
  }
}

.resume-main {
  padding: 8rem 2rem 13rem;
  color: $text-color;
  position: relative;

  .container {
    z-index: 20;
    position: relative;
  }

  &__title {
    font-size: 70px;
    max-width: 512px;
  }

  &__subtitle {
    font-size: 30px;
    margin-top: 20px;
  }

  .username {
    display: flex;
    margin-top: 60px;
    flex-wrap: wrap;
  }

  .main-asset {
    position: absolute;
    right: -60px;
    top: 8rem;
  }

  .styled-input {
    background: $input-bg;
    border-radius: 9.5px;
    width: 679px;
    height: 99px;    
    display: flex;
    position: relative;

    img {
      position: absolute;
      top: -120px;
      left: 400px;
      width: 200px;
    }

    .url {
      height: 100%;
      width: 60%;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 30px;
    }

    input {
      height: 100%;
      width: 40%;
      border: none;
      border-left: 1px solid rgba(0, 0, 0, .15);
      background: transparent;
      font-size: 30px;
      padding: 1rem 1.5rem;

      &::placeholder {
        color: $placeholder-color;
        text-align: center;
      }
    }
  }

  @media (max-width: 1480px) {

    &__title {
      font-size: 52px;
      max-width: 360px;
    }

    &__subtitle {
      font-size: 20px;
      font-weight: normal;
    }

    .main-asset {
      height: 75vh;
    }

    .styled-input {
      border-radius: 9.5px;
      width: 450px;
      height: 60px;

      .url,
      input {
        font-size: 16px;
      }
    }
  }

  @media (max-width: 960px) {
    padding: 3rem 3rem 5rem;

    .main-asset {
      top: 2rem;
      height: 60vh;
    }

    .username {
      margin-top: 130px;

      .btn.filled {
        margin: 0;
      }
    }

    .styled-input {
      width: 400px;
      min-width: 380px;
      margin-bottom: 1rem;

      .url {
        width: 50%;
      }

      input {
        width: 50%;
      }

      img {
        left: 100px;
      }
    }
  }

  @media (max-width: 768px) {
    padding: 0 1rem 4rem;

    &__title {
      font-size: 36px;
      max-width: 250px;
      z-index: 50;
    }

    &__subtitle {
      font-size: 22px;
    }

    .main-asset {
      right: -1rem;
      height: 200px;
    }

    .styled-input {
      width: 100%;
      min-width: 100%;
    }

    .container {
      padding: 0;
    }
  }

  @media (max-width: 480px) {
    .username {
      .btn.filled {
        width: 100%;
      }
    }
  }
}

.resume-samples {
  .professions-slider-container {
    width: 100%;
    padding: 1rem 2rem;
    background: $input-bg;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;

    .slick-control {
      position: absolute;
      z-index: 1;
      background: $input-bg;
      border: none;
      outline: none;
      padding: 0;

      &:hover {
        cursor: pointer;
      }
    }

    .next-arrow {
      right: 2rem;
    }

    .prev-arrow {
      left: 2rem;
    }
  }

  .professions-slider-tabs {
    width: 100%;
    list-style: none;
    padding: 0 2rem;
    display: flex;
    justify-content: center;

    .slick-current {
      a {
          background: $primary;
          color: $bg-color;
          border-radius: 10px;
        }
    }

    li {
      // float: left;
      padding: 0 20px;
      margin: 0;
      position: relative;
      
      a {
        padding: 5px 10px;
        margin: 0 auto;
        display: block;
        text-align: center;
        color: $text-color;

        &:hover {
          text-decoration: none;
          cursor: pointer;
        }
      }

      &::after {
        content: "";
        position: absolute;
        display: block;
        right: 0;
        top: 0;
        height: 90%;
        border-right: 1px solid $placeholder-color;
      }

      @media (max-width: 1100px) {
        padding: 0 10px;
      }
    }
  }
}

.resume-preview {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 3rem;
  padding: 0 2rem;
  min-height: 750px;
  position: relative;

  @media (max-width: 768px) {
    min-height: 400px;
  }

  img {
    width: auto;
    max-height: 350px;

    @media (max-width: 768px) {
      height: auto;
      width: 90%;
    }
  }
}

.section-title {
  text-align: center;
  font-size: 50px;
  margin-bottom: 50px;

  @media (max-width: 1480px) {
    font-size: 32px;
    line-height: 48px;
  }
}

.subscriptions-plans {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  padding: 1rem;

  .input-container {
    display: flex;
    margin: 0 auto;
    height: 60px;
    width: 100%;
    justify-content: center;

    @media (max-width: 768px) {
      flex-wrap: wrap;
      padding: 0 1rem;

      .btn.filled {
        margin: 0;
      }
    }

    @media (max-width: 480px) {
      .btn.filled {
        width: 100%;
      }
    }
  }

  .input-wrapper {
    height: 100%;
    background: $input-bg;
    border-radius: 9.5px;
    padding: 0 2rem;
    margin-bottom: 20px;
    display: flex;
    justify-content: center;

    span, input {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    input {
      height: 100%;
      border: none;
      background: transparent;
      outline: none;
    }
  }
}

.plans {
  margin-top: 6rem;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  position: relative;

  @media (max-width: 768px) {
    margin-top: 10rem;
  }

  & > .dot-bg  {
    position: absolute;
    bottom: -6rem;
    left: -18rem;
    z-index: 1;
    height: 160px;
  }
}

.toggle-panel {
  border: solid 1.3px $primary;
  border-radius: 50px;
  position: relative;
  overflow: hidden;
  padding: 5px 10px;
  height: 40px;
  width: 200px;
  display: flex;
  justify-content: center;
  align-items: center;

  .aux-fill {
    width: 100%;
    position: absolute;
    background: $primary;
    border-radius: 20px;
    height: 100%;
    top: 0;

    &.left {
      animation-name: swipeToLeft;
      animation-duration: .3s;
      animation-timing-function: ease;
      animation-fill-mode: forwards;

      & ~ .buttons .monthly {
        color: $bg-color;
        transition: color .5s ease;
      }
    }

    &.right {
      animation-name: swipeToRight;
      animation-duration: .3s;
      animation-timing-function: ease;
      animation-fill-mode: forwards;

      & ~ .buttons .yearly {
        color: $bg-color;
        transition: color .5s ease;
      }
    }
  }

  .buttons {
    position: absolute;
    right: 0;
    height: 100%;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 5px;
 
    button {
      background: transparent;
      border: none;
      color: $primary;
      font-weight: 700;
      width: 100px;
      outline: none;
      transition: color .5s ease;

      &:hover {
        cursor: pointer;
      }
    }
  }
}

@keyframes swipeToRight {
  from {
    transform: translateX(-95px);
  } to {
    transform: translateX(95px);
  }
}

@keyframes swipeToLeft {
  from {
    transform: translateX(95px);
  } to {
    transform: translateX(-95px);
  }
}

// Transitions effects
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s ease;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>