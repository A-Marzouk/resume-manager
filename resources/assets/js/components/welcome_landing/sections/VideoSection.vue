<template>
  <div class="row video-wrap">
    <div class="video-section col-sm-12 col-lg-7 col-12">
      <div class="title-two">
        Build a resume That you can be Proud of
      </div>
      <p>100+ Integrations. Ensure your clients can easily contact, hire and pay you.</p>
    </div>
    <div class="pa-0 vicon-set col-sm-12 col-lg-5 col-12">
      <img src="/images/welcome_landing_page/icons/iconset-float-video.png" alt="">
    </div>
    <div class="pa-0 player-wrap col-sm-12 col-lg-12 col-12 NoDecor">
      <div class="hold-video">
        <div class="video__poster" ref="videoPoster">
          <a href="#" @click.prevent="playVideo()"><i aria-hidden="true" class="v-icon notranslate mdi mdi-play theme--light"></i></a>
        </div>
        <video ref="videoElem" src="/images/welcome_landing_page/video/sample.mp4" controls ></video>
      </div>
      <a href="javascript:void(0)" class="btn-inset light__red"><i>Get started</i></a>
    </div>
  </div>
</template>

<script>
export default {
  name: 'VideoSection',
  data: () => ({
    playing: false
  }),

  methods: {
    playVideo() {
      this.$refs.videoPoster.style.display = "none";
      this.$refs.videoElem.play();
    }
  }
};
</script>

<style lang="scss" scoped>
.video-wrap{
  margin-bottom: 70px;
  @media screen and (max-width: 769px) {
    .video-section{
      padding-top: 0px;
      text-align: center;

      p{
        max-width: 520px;
        margin: 0px auto;
      }
    }


    .vicon-set{
      order: 3;
      margin-top: 52px;

      img{
        max-width: 250px;
        max-height: 30.4vh;
      }
    }

    .player-wrap{

      .hold-video{
        min-height: auto;
        max-height: 484px;
        padding: 7px;
        margin-top: 45px;

        .video__poster,video{
          min-width: calc(100% - 13px);
          min-height: 450px;
        }

        .video__poster{
          a{
            width: 60px;
            height: 60px;
            line-height: 30px;
            border: 10px solid #2410A4;

            i{
              font-size: 38px;
            }
          }
        }
        
      }
    }
  }

  @media only screen 
  and (min-device-width: 320px) 
  and (max-device-width: 480px)
  and (-webkit-min-device-pixel-ratio: 2) {

    margin-bottom: 45px;

    .vicon-set{


      img{
        max-height: 203px;
      }
    }

    .player-wrap{

      .hold-video{

        min-height: 250px;

        .video__poster,video{
          min-width: calc(100% - 14px);
          min-height: 250px;
        }

        video{
          border-radius: 20px;
        }

        .video__poster a{
          max-width: 80px;
          max-height: 80px;
          line-height: 38px;
          border: 10px solid #2410A4;

          i{
            font-size: 41px;
          }
        }
        
      }
    }
  }

  @media only screen 
  and (min-device-width: 960px) 
  and (max-device-width: 1264px) 
  and (-webkit-min-device-pixel-ratio: 1) {

    .vicon-set{

      img{
        max-height: 420px;
      }
    }

  }

}

.video-section{

  padding-top: 116px;

  p{
    padding-top: 30px;
  }
}

.vicon-set{
  justify-content: center;
  display: flex;

  img{
    max-width: 530px;
    max-height: 415px;
  }
}

.player-wrap{
  justify-content: center;
  align-items: center;
  display: flex;
  flex-wrap: wrap;
}


.hold-video{
  background: #F8F8F8;
  box-shadow: -6px -6px 16px #FFFFFF,
   6px 6px 16px rgba(209, 205, 199, 0.4),
  inset 6px 4px 12px rgba(0, 0, 0, 0.25),
  inset -6px -4px 12px #FFFFFF;
  border-radius: 15px;
  min-height: 1034px;
  padding: 20px;
  position: relative;
  margin: 65px auto;

  .video__poster{
    position: absolute;
    z-index: 2;
    background: url('/images/welcome_landing_page/icons/poster-video.png') no-repeat;
    background-position: center;
    background-size: cover;
    min-width: calc(100% - 40px);
    min-height: 992px;
    border-radius: 15px;
    justify-content: center;
    align-items: center;
    display: flex;

    a{
      width: 202px;
      height: 202px;
      background: #F8F8F8;
      box-shadow: -6px -6px 16px #D7D7D7,
       6px 6px 16px rgba(209, 205, 199, 0.4);
      border-radius: 100px;
      text-decoration: none;
      text-align: center;
      line-height: 120px;
      border: 40px solid #2410A4;
      transition: all 300ms ease;

      &:hover{
        transform: scale(1.1);
      }
      

      i{
        font-size: 121px;
        color: #2410A4;
        box-shadow: inset 0px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 100%;
      }
    }
  }
  video{
    max-width: 100%;
    min-height: 992px;
    border-radius: 15px;
    object-fit:cover;
  }
}


</style>
