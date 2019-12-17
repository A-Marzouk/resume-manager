<template>
  <footer>
    <div class="social-panel">
      <h3>Follow Us</h3>
      <div class="accounts">
        <div class="account-wrapper">
          <img src="/images/resume_builder/fb-icon.svg" alt="facebook icon">
          <img src="/images/resume_builder/like-outline-icon.svg" alt="like outline icon">
          <span>14,044 Followers</span>
        </div>
        <div class="account-wrapper">
          <img src="/images/resume_builder/ig-icon.svg" alt="facebook icon">
          <img src="/images/resume_builder/fav-outline-icon.svg" alt="like outline icon">
          <span>733 Followers</span>
        </div>
      </div>
    </div>
    <div class="contact-panel">
      <h3>Contact Us</h3>
      <div class="links">
        <a href="#"><img src="/images/resume_builder/email-icon.svg" alt="email icon"></a>
        <a href="#"><img src="/images/resume_builder/messenger-icon.svg" alt="messenger icon"></a>
        <a href="#"><img src="/images/resume_builder/skype-icon.svg" alt="skype icon"></a>
        <a href="#"><img src="/images/resume_builder/whatsapp-icon.svg" alt="whatsapp icon"></a>
        <a href="#"><img src="/images/resume_builder/slack-icon.svg" alt="slack icon"></a>
      </div>
    </div>
    <div class="logo-footer">
      <img class="hideOnMobile" src="/images/resume_builder/123 logo.png" alt="123workforce logo">
      <img src="/images/resume_builder/123 icon.png" alt="123workforce icon" class="showOnMobile">
    </div>

    <img src="/images/resume_builder/dotbox.png" alt="" class="dot-bg-1">
    <img src="/images/resume_builder/dotbox.png" alt="" class="dot-bg-2">
  </footer>
</template>

<script>
export default {
}
</script>

<style lang="scss">
  footer {
    display: flex;
    justify-content: center;
    flex-direction: column;
    margin-top: 10rem;
    padding: 10rem 10rem 5rem;
    position: relative;
    overflow: hidden;

    @media (max-width: 768px) {
      padding: 5rem 2rem;
    }

    .dot-bg-1 {
      position: absolute;
      right: -8rem;
      bottom: 0;

      @media (max-width: 768px) {
        right: -9rem;
        bottom: -10rem;
      }
    }

    .dot-bg-2 {
      position: absolute;
      bottom: -8rem;
      left: -10rem;
    }
  }

  .social-panel {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    h3 {
      margin-bottom: 2rem;
    }

    .accounts {
      display: flex;
      justify-content: space-around;
      align-items: center;
      flex-wrap: wrap;
    }

    .account-wrapper {
      display: flex;
      margin: 0 20px;
      align-items: center;
      margin-bottom: 10px;

      img {
        margin: 0 5px;
      }

      span {
        margin-left: 10px;
      }
    }
  }

  .contact-panel {
    margin-top: 5rem;
    display: flex;
    flex-direction: column;
    align-items: center;

    h3 {
      margin-bottom: 2rem;
    }
    justify-content: center;

    .links  {
      display: flex;
      justify-content: space-around;
      align-items: center;

      a {
        margin: 0 20px;

      }
      @media (max-width: 480px) {
        width: 100%;

        a {
          margin: 0;
        }
      }
    }
  }

  .logo-footer {
    display: flex;
    justify-content: center;
    width: 100%;
    margin-top: 6rem;

    .showOnMobile {
      width: 100px;
    }
  }
</style>