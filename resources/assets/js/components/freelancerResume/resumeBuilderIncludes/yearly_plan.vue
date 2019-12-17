<template>
  <div class="plan-container">
    <img class="dot-bg" src="/images/resume_builder/dotbox.png" alt="">
    <img class="circle-bg" src="/images/resume_builder/circle-blue.svg" alt="">
    <div class="plan-details">
      <h3 class="plan-original-price section-title">Was $18
        <img src="/images/resume_builder/delete.svg" alt="delete icon">
      </h3>
      <h4 class="plan-offer"><small>Now Only </small><sup>$</sup>9 <small class="not-bold">(Save 50%)</small></h4>
      <div class="help-text">Per Month $9</div>

      <div class="plan-info">
        <div class="benefit" v-for="(benefit, index) in benefits" :key="index"><img src="/images/resume_builder/check_circle.svg" alt="check circle">{{benefit}}</div>
      </div>

      <button class="btn filled">
        Start Free Trial
        <small>7 days free trial</small>
      </button>
    </div>
  </div>
</template>

<script>
export default {
  data: () => ({
    benefits: [
      'Online Resume',
      ' 2 Themes',
      'Export PDF',
      'Visual Builder',
      'Free Domain URL'
    ]
  })
}
</script>

<style lang="scss">
  // Styles for the resume builder view
$text-color: #1f3445;
$primary: #0290d8;
$bg-color: white;
$input-bg: #F2F9FD;
$placeholder-color: #9ba1ad;

  .plan-container {
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    color: $text-color;
    margin-top: 15px;
    box-shadow: 1px 1px 10px rgba(100,100,100, .1);

    .dot-bg {
      position: absolute;
      top: -18px;
      right: -78px;
    }

    .circle-bg {
      position: absolute;
      bottom: -60px;
      right: -40px;
    }
  }

  .plan-details {
    background: white;
    padding: 60px 180px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    border-radius: 17px;
    position: relative;
    z-index: 1;

    .plan-original-price {
      position: relative;

      img {
        position: absolute;
        right: 0;
        top: 0;
        height: 100%;
      }
      
      @media (max-width: 1480px) {
        right: 0;
      }
    }

    .plan-offer {
      color: $primary;
      font-size: 65px;
      position: relative;

      small, sup {
        font-size: 22px;
      }
      
      small {
        font-weight: 700;

        &:first-child {
          margin-right: 10px;
        }

        &.not-bold {
          font-weight: normal;
        }
      }

      sup {
        position: absolute;
        top: 25px;
        left: 92px;
      }

      @media (max-width: 1480px) {
        font-size: 42px;

        small, sup {
          font-size: 20px;
        }

        sup {
          top: 15px;
          left: 90px;
        }
      }



      @media (max-width: 576px) {
        font-size: 36px;

        small, sup {
          font-size: 16px;
        }

        sup {
          left: 75px;
        }
      }

    }

    .btn {
      height: 60px;
      line-height: 1rem;

      small {
        display: block;
        font-size: 10px;
      }
    }

    @media (max-width: 960px) {
      padding: 50px;
    }
  }
  
  .help-text {
    font-size: 22px;

    @media (max-width: 1480px) {
      font-size: 14px;
    }
  }

  .plan-info {
    width: 100%;
    padding: 3rem 5rem;

    img {
      height: 14px;
      margin-right: 5px;
    }

    @media (max-width: 576px) {
      padding: 2rem;
    }
  }
</style>