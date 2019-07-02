<template>
  <div class="freelancerCard smallCard">
    <div class="smallCard__personalInfo">
      <div class="smallCard__personaleInfo__imgContainer">
        <img src="/images/home/profile1.png" alt="">
      </div>
      <div class="smallCard__personal__info__userData">

      </div>
    </div>

  </div>
</template>
<script>

// Receives the users from laravel using props
export default {
  props: [
    
  ]
}
</script>

<style lang="scss">
.freelancerCard {
  &.smallCard {

    .freelancerImg {
      width: 70px;
      height: 70px;
    }

    .nameRow {
      display: flex;
      flex-wrap: wrap;
      position: relative;
      border-radius: 5px;
      padding: 14px;
      height: 100%;
    }

    .contact {
      position: absolute;
      top: 20px;
      right: 14px;
    }

    .jobTitle {
      color: white;
      font-size: 14px;
    }

    .payment-details {
      font-size: 12px;
      
      @media (max-width: 768px) {
        display: flex;

      }

      div {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        text-align: center;
      }

      img,
      span {
        margin-right: 5px;
      }

      img {
        height: 14px;
      }
    }

    .payment-highLight {
      font-size: 14px;
    }

    .resumeCardRight {
      height: 100%;

      .hireCardBtn {
        width: 87px;

        @media (max-width: 768px) {
          width: 100%;
          justify-content: center;
          align-items: center;
        }
      }

      .nameRow {
        .imageCol {
          padding-left: 0;
          margin: 0;
        }
      }
    }

    .cardRow {
      @media (max-width: 768px) {
        width: 100%;
      }
    }

    .hireRow {
      width: 100%;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 14px;
      margin: 0;
      margin-top: 15px;
    }

    .nameCard {
      font-family: Roboto;
      font-style: normal;
      font-weight: bold;
      font-size: 18px;
      padding-top: 0;
      margin-bottom: 5px;
      padding-left: 10px;
    }
  }
}
</style>

