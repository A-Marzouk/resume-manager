<template>
  <v-row class="contact-wrap">
    <v-col lg="12" class="pa-0 contact-section">
      <span class="title-three">Follow Us</span>
      <div class="follow-section">
        <span class="item-follow">
          <a href="" class="facebook-icon"></a>          
          14,044 Followers
        </span>
        <span class="item-follow">
          <a href="" class="instagram-icon"></a>
          733 Followers
        </span>
      </div>
      <span class="title-three">Contact Us</span>
      <div class="social-section">
        <a href="" class="email-icon"></a>
        <a href="" class="messenger-icon"></a>
        <a href="" class="skype-icon"></a>
        <a href="" class="whatsapp-icon"></a>
        <a href="" class="slack-icon"></a>
      </div>
    </v-col>
  </v-row>
</template>

<script>
export default {
  name: 'ContactSection',
  data: () => ({
    
  }),
};
</script>

<style lang="scss" scoped>

.contact-section{
  justify-content: center;
  display: flex;
  flex-flow: column;
  align-items: center;


  @media screen and (max-width: 769px) {
    .follow-section{

      margin-bottom: 85px !important;

      .item-follow{
        margin: 0px 2% !important;

      }
    }

    .social-section{
      min-width: 475px !important;

      a{
        width: 72.6px !important;
        height: 72.6px !important;

        background-size: 32.1px !important;
      }
    }

  }

  @media only screen 
  and (min-device-width: 320px) 
  and (max-device-width: 480px)
  and (-webkit-min-device-pixel-ratio: 2) {

    .follow-section{
      flex-flow: column;
      align-items: flex-start;
      margin-bottom: 40px !important;

      .item-follow{
        width: 80%;
        margin-bottom: 10px !important;
        font-size: 20px !important;
        line-height: 25px !important;

        a{
          width: 50px !important;
          height: 50px !important;
          line-height: 55px !important;
        }
      }
    }


    .social-section{
      min-width: 90% !important;

      a{
        width: 50.6px !important;
        height: 50.6px !important;

        img{
          max-width: 20.1px;
        }
      }
    }
  }

  @media screen and (min-width: 481px) and (max-width: 680px){
    .follow-section{
      .item-follow{
        font-size: 1em !important;
      }
    }
  }

  .follow-section{
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 40px;
    margin-bottom: 140px;

    .item-follow{
      display: inline-block;
      margin: 0px 75px;
      font-family: "Open Sans";
      font-style: normal;
      font-weight: 400;
      font-size: 25px;
      line-height: 34px;
      color: #575757;

      a{
        width: 67px;
        height: 67px;
        background-color: #F8F8F8;
        box-shadow: -6px -6px 16px #FFFFFF,
        6px 6px 16px rgba(209, 205, 199, 0.4);
        border-radius: 15px;
        display: inline-block;
        line-height: 70px;
        text-align: center;
        margin-right: 26px;
        text-decoration: none;
        vertical-align: middle;
        
        background-position: center;
        background-repeat: no-repeat;

        &.facebook-icon{
          background-image: url('/images/welcome_landing_page/icons/facebook-black.png');
          background-size: 11px;

          &:hover{
            background-image: url('/images/welcome_landing_page/icons/facebook.png');
          }
        }
        &.instagram-icon{
          background-image: url('/images/welcome_landing_page/icons/instagram-black.png');
          background-size: 23px;

          &:hover{
            background-image: url('/images/welcome_landing_page/icons/instagram.png');
          }
        }

        
      }
      
      
    }
  }

  .social-section{

    min-width: 680px;
    justify-content: space-between;
    display: flex;
    align-items: center;
    margin-top: 50px;

    a{
      display: inline-flex;
      width: 104px;
      height: 104px;
      text-align: center;
      background-color: #F8F8F8;
      box-shadow: -6px -6px 16px #FFFFFF,
       6px 6px 16px rgba(209, 205, 199, 0.4);
      border-radius: 100px;
      vertical-align: top;
      justify-content: center;
      align-items: center;
      text-decoration: none;
      background-size: 46px;
      background-repeat: no-repeat;
      background-position: center;

      &.email-icon{
        background-image: url('/images/welcome_landing_page/icons/email-black.png');

        &:hover{
          background-image: url('/images/welcome_landing_page/icons/email.png');
        }
      }
      &.messenger-icon{
        background-image: url('/images/welcome_landing_page/icons/messenger-black.png');

        &:hover{
          background-image: url('/images/welcome_landing_page/icons/messenger.png');
        }
      }
      &.skype-icon{
        background-image: url('/images/welcome_landing_page/icons/skype-black.png');

        &:hover{
          background-image: url('/images/welcome_landing_page/icons/skype.png');
        }
      }
      &.whatsapp-icon{
        background-image: url('/images/welcome_landing_page/icons/whatsapp-black.png');

        &:hover{
          background-image: url('/images/welcome_landing_page/icons/whatsapp.png');
        }
      }
      &.slack-icon{
        background-image: url('/images/welcome_landing_page/icons/slack-black.png');

        &:hover{
          background-image: url('/images/welcome_landing_page/icons/slack.png');
        }
      }

    }
  }
}



</style>
