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
    padding: 10rem;
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
    }

    .account-wrapper {
      display: flex;
      margin: 0 20px;
      align-items: center;

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
    }
  }
</style>