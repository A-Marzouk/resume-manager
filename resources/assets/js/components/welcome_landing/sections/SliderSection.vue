<template>
  <div class="row slider-wrap">
    <div class="text-section col-sm-12 col-lg-9 col-12">
      <span class="title-two">20+ Beautiful Themes to choose from</span>
      <p>Make your resume visually amazing. Ensure that you stand out<br/>and make a great first impression with any hiring manager.</p>
    </div>
    <div class="pa-0 iconset-slider col-sm-12 col-lg-3 col-12">
      <img src="/images/welcome_landing_page/icons/iconset-slider.png" alt="">
    </div>
    <div class="pa-0 slider-section col-sm-12 col-lg-12 col-12">
      <div class="hold-slider">
        <slick ref="slick" :options="slickOptions">
          <div class="slide-resume">
            <img src="/images/welcome_landing_page/imgs/slide2.png" alt=""/>
          </div>
          <div class="slide-resume">
            <img src="/images/welcome_landing_page/imgs/slide3.png" alt=""/>
          </div>
          <div class="slide-resume">
            <img src="/images/welcome_landing_page/imgs/slide2.png" alt=""/>
          </div>
        </slick>
        <div class="nav-slider">
          <a href="#" @click.prevent="prev"><img src="/images/welcome_landing_page/icons/arrow-left.png" alt=""/></a>
          <span class="navDots"></span>
          <a href="#" @click.prevent="next"><img src="/images/welcome_landing_page/icons/arrow-next.png" alt=""/></a>
        </div>
        
      </div>
    </div>
  </div>
</template>

<script>
import Slick from 'vue-slick';

export default {
  name: 'SliderSection',
  components: {
      Slick
  },
  data: () => ({
    slickOptions: {
      slidesToScroll: 1,
      infinite: true,
      variableWidth: true,
      arrows: false,
      dots: true,
      swipe: true,
      speed: 1200,
      appendDots: '.navDots',
      responsive: [
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        }
      ]
    }
  }),
  methods: {
    next() {
        this.$refs.slick.next();
    },
    prev() {
        this.$refs.slick.prev();
    },
    reInit() {
        this.$refs.slick.reSlick()
    }
  }
  
};
</script>

<style lang="scss" scoped>

.slider-wrap{

  @media screen and (max-width: 769px) {
    overflow: hidden;
    text-align: center;

    .iconset-slider{
      justify-content: center;
      order: 3;

      img{
        margin: 0;
        max-width: 250px;
        max-height: 41.9vh;
      }
    }
    .text-section{
      padding-top: 0;

      p{
        margin-bottom: 0;
      }
    }


    .slider-section{
      margin-top: 50px;
      margin-bottom: 0;
    }
  }
  @media only screen 
    and (min-device-width: 320px) 
    and (max-device-width: 480px)
    and (-webkit-min-device-pixel-ratio: 2) {

    .iconset-slider{

      img{
        max-height: 203px;
      }
    }

  }

  @media only screen 
    and (min-device-width: 960px) 
    and (max-device-width: 1264px) 
    and (-webkit-min-device-pixel-ratio: 1) {

    .iconset-slider{

      img{
        margin: auto;
        max-height: 436px;
      }
    }

  }
  
}

.text-section{
  padding-top: 156px;
  
  .title-two{
    max-width: 760px;
    display: inline-block;
  }
  p{
    padding-top: 30px;
  }
}

.iconset-slider{
  justify-content: flex-end;
  display: flex;

  img{
    margin-right: -83px;
  }
}

.slider-section{
  margin-top: 75px;
  margin-bottom: 200px;
}

.hold-slider{
  position: relative;
  overflow: hidden;

  .nav-slider{
    width: 431px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: absolute;
    top: 10px;
    left: 45%;

    a{
      width: 79.3px;
      height: 79.3px;
      background: #F8F8F8;
      box-shadow: -6px -6px 16px #FFFFFF, 
      6px 6px 16px rgba(209, 205, 199, 0.4);
      border-radius: 100px;
      display: flex;
      align-items: center;
      justify-content: center;
      
    }
  }

  @media (min-width: 1264px){
    .nav-slider{
      left: 53%;
    }
  }
  @media screen and (max-width: 769px) {

    .nav-slider{
      max-width: 162px;
      top: 5%;
      right: 45px;
      left: auto;

      a{
        width: 29.79px;
        height: 29.79px;

        img{
          max-width: 13.14px;
        }
      }
    }
  }

  @media only screen 
  and (min-device-width: 320px) 
  and (max-device-width: 480px)
  and (-webkit-min-device-pixel-ratio: 2) {
    overflow: visible;


    

  }
}

</style>
