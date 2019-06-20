<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>123Workforce</title>

  <link rel="stylesheet" href="/css/app.css">
</head>
<body class="home">

  <main>
    <img src="/images/home/topBg.png" alt="" class="topBg">
    <nav class="newNav no-decoration">
      <a class="newNav__homeLink" href="/" class="logo">
        <img src="/images/home/123logo.png" alt="123workforce logo">
      </a>
      <div class="newNav__links">
        <a class="newNav__links__link" href="#">Become a Client</a>
        <a class="newNav__links__link" href="#">Talk to Sales</a>
        <a class="newNav__links__link--loginBtn" href="#">Login</a>
      </div>
    </nav>
    <section class="mainSection">
      <div class="mainSection__content">
        <h1 class="mainSection__content__title">Grow your digital agency with On-Demand Sales Agents</h1>
        <h3 class="mainSection__content__subtitle">Get new customers and boost your revenue</h3>
        <p class="mainSection__content__description">B2B Telesales - Telemarketing - Appointment Setting<br />Email marketing - Cold Calling - Linkedin Marketing<br />Instagram Marketing - Lead Generation</p>

        <div class="mainSection__content__registerBiz no-decoration">
          <a href="#" class="mainSection__content__registerBiz__link">Register your business</a>
        </div>
      </div>
      <img class="mainSection__asset" src="/images/home/mainAssetSales.png" alt="asset">
    </section>
    <section class="registerBizSection">
      <form class="registerBizSection__container" action="">
        <div class="registerBizSection__container__inputs">
            <input type="text" placeholder="Full name*" class="registerBizSection__container__inputs__input">
            <input type="text" placeholder="Phone Number*" class="registerBizSection__container__inputs__input">
            <input type="text" placeholder="Email*" class="registerBizSection__container__inputs__input">
            <input type="text" placeholder="Website*" class="registerBizSection__container__inputs__input">
        </div>
        <input class="registerBizSection__container__submitBtn" type="submit" value="Get Started">
      </form>
    </section>
    <section class="planSection">
      <h2 class="subtitle">Every great business starts with a plan</h2>

      <h4 class="min-subtitle">Weekly payment, cancel anytime, guaranteed results</h4>

      <div class="planSection__currencies">
        {{-- Make this with vue --}}
        <div class="planSection__currencies__currency">
          <img src="/images/home/currency_usd.png" alt="" class="planSection__currencies__currency__img selected">
          <img src="/images/home/check_icon.png" alt="" class="planSection__currencies__currency__img--checkIcon">
          <span class="planSection__currencies__currency__name">USD</span>
        </div>
        <div class="planSection__currencies__currency">
          <img src="/images/home/currency_gbp.png" alt="" class="planSection__currencies__currency__img">
          <img src="/images/home/check_icon.png" alt="" class="planSection__currencies__currency__img--checkIcon">
          <span class="planSection__currencies__currency__name">GBP</span>
        </div>
        <div class="planSection__currencies__currency">
          <img src="/images/home/currency_euro.png" alt="" class="planSection__currencies__currency__img">
          <img src="/images/home/check_icon.png" alt="" class="planSection__currencies__currency__img--checkIcon">
          <span class="planSection__currencies__currency__name">EURO</span>
        </div>
        <div class="planSection__currencies__currency">
          <img src="/images/home/currency_cad.png" alt="" class="planSection__currencies__currency__img">
          <img src="/images/home/check_icon.png" alt="" class="planSection__currencies__currency__img--checkIcon">
          <span class="planSection__currencies__currency__name">CAD</span>
        </div>
        <div class="planSection__currencies__currency">
          <img src="/images/home/currency_aud.png" alt="" class="planSection__currencies__currency__img">
          <img src="/images/home/check_icon.png" alt="" class="planSection__currencies__currency__img--checkIcon">
          <span class="planSection__currencies__currency__name">AUD</span>
        </div>
      </div>
      <div class="planSection__plans no-decoration">
        <a href="#" class="planSection__plans__plan--selected">Full-time</a>
        <a href="#" class="planSection__plans__plan">Part-time</a>
      </div>
      <div class="planSection__planDescription no-decoration">
        <div class="planSection__planDescription__header">
          <img src="/images/home/logoIconBig.png" alt="" class="planSection__planDescription__header__icon">

          <div class="planSection__planDescription__header__content">
            <h3 class="planSection__planDescription__header__content__name">Full-time</h3>
            <div class="planSection__planDescription__header__content__payment">
              <span class="planSection__planDescription__header__content__payment__cost">$350</span>
              <span class="planSection__planDescription__header__content__payment__hours">/ Week</span>
            </div>
            <div class="planSection__planDescription__header__content__frequency">Per week, billed weekly</div>
          </div>
        </div>
        <div class="planSection__planDescription__benefits">
          <div class="planSection__planDescription__benefits__item">
            <img src="/images/home/check_icon.png" alt="check icon">
            Dedicated Full-Time Agent
          </div>
          <div class="planSection__planDescription__benefits__item">
              <img src="/images/home/check_icon.png" alt="check icon">
              Telemarketing
          </div>
          <div class="planSection__planDescription__benefits__item">
            <img src="/images/home/check_icon.png" alt="check icon">
            Email marketing
          </div>
          <div class="planSection__planDescription__benefits__item">
            <img src="/images/home/check_icon.png" alt="check icon">
            Professional Network Outrech- Linkedin
          </div>
          <div class="planSection__planDescription__benefits__item">
            <img src="/images/home/check_icon.png" alt="check icon">
            Social media outreach - Instagram / Facebook
          </div>
        </div>
        <a href="#" class="planSection__planDescription__more">
          <img src="/images/home/arrowDownBlue.png" alt="">
        </a>
        <a href="#" class="planSection__planDescription__choosePlanBtn">Choose Plan</a>
      </div>
    </section>
    <section class="agentsSection">
      <img class="agentsSection__bg-2" src="/images/home/agentsBg.png" alt="">
      <h2 class="subtitle">Our Agents</h2>
      <h4 class="min-subtitle">Our agents are professional,<br />highly driven and passionate about selling.</h4>
      <div class="agentsContainer">
        <img class="agentsSection__bg" src="/images/home/agentsAssetSales.png" alt="">
        <div class="agentsSection__agents">
          <div class="agentsSection__agents__agent">
            <div class="agentsSection__agents__agent__data">
              <div class="agentsSection__agents__agent__data__profile">
                <img src="/images/home/profile2.png" alt="">
                <div class="agentsSection__agents__agent__data__profile__info">
                  <h3 class="agentName">Samantha William</h3>
                  <div class="agentProfession">
                    <img src="/images/home/professionIcon.png" />Telemarketing
                  </div>
                </div>
              </div>
              <ul class="agentsSection__agents__agent__data__professionalInfo">
                <li>Sector Experience: <span class="highLightText">Real State, Insurance</span></li>
                <li>Languages: <span class="highLightText">English, Indonesia</span></li>
              </ul>
            </div>
            <div class="agentsSection__agents__agent__actions">
              <div class="action">
                <img src="/images/home/recording-default.png" alt="">
                Intro Recording
              </div>
              <div class="action selected">
                <img src="/images/home/recording-blue.png" alt="">
                Listen to Record Icon
              </div>
              <div class="action">
                <img src="/images/home/recording-default.png" alt="">
                Listen to Record Icon
              </div>
              <div class="action">
                <img src="/images/home/recording-default.png" alt="">
                ABC Recording
              </div>
            </div>
          </div>
          <div class="agentsSection__agents__agent">
            <div class="agentsSection__agents__agent__data">
              <div class="agentsSection__agents__agent__data__profile">
                <img src="/images/home/profile1.png" alt="">
                <div class="agentsSection__agents__agent__data__profile__info">
                  <h3 class="agentName">Saepul Rohman</h3>
                  <div class="agentProfession">
                    <img src="/images/home/professionIcon.png" />UI Designer
                  </div>
                </div>
              </div>
              <ul class="agentsSection__agents__agent__data__professionalInfo">
                <li>Sector Experience: <span class="highLightText">UI/UX, Illustrations</span></li>
                <li>Languages: <span class="highLightText">English, Indonesia</span></li>
              </ul>
            </div>
            <div class="agentsSection__agents__agent__actions">
              <div class="action">
                <img src="/images/home/recording-default.png" alt="">
                Intro Recording
              </div>
              <div class="action selected">
                <img src="/images/home/recording-blue.png" alt="">
                Listen to Record Icon
              </div>
              <div class="action">
                <img src="/images/home/recording-default.png" alt="">
                Listen to Record Icon
              </div>
              <div class="action">
                <img src="/images/home/recording-default.png" alt="">
                ABC Recording
              </div>
            </div>
          </div>
          <div class="agentsSection__agents__agent">
            <div class="agentsSection__agents__agent__data">
              <div class="agentsSection__agents__agent__data__profile">
                <img src="/images/home/profile3.png" alt="">
                <div class="agentsSection__agents__agent__data__profile__info">
                  <h3 class="agentName">Ghani Pradita</h3>
                  <div class="agentProfession">
                    <img src="/images/home/professionIcon.png" />Visual Director
                  </div>
                </div>
              </div>
              <ul class="agentsSection__agents__agent__data__professionalInfo">
                <li>Sector Experience: <span class="highLightText">Real State, Insurance</span></li>
                <li>Languages: <span class="highLightText">English, Spanish</span></li>
              </ul>
            </div>
            <div class="agentsSection__agents__agent__actions">
              <div class="action">
                <img src="/images/home/recording-default.png" alt="">
                Intro Recording
              </div>
              <div class="action selected">
                <img src="/images/home/recording-blue.png" alt="">
                Listen to Record Icon
              </div>
              <div class="action">
                <img src="/images/home/recording-default.png" alt="">
                Listen to Record Icon
              </div>
              <div class="action">
                <img src="/images/home/recording-default.png" alt="">
                ABC Recording
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="questionsSection">
      <img class="questionsSection__bg-1" src="/images/home/question1.png" alt="">
      <img class="questionsSection__bg-2" src="/images/home/question2.png" alt="">

      <h2 class="subtitle">Do you have any question?</h2>

      <div class="questionsSection__container">
        <div class="questionsSection__container__question">
          <div class="questionsSection__container__question__header">
            How do payments and invoicing work, how much  do you change? Can I get discounts?
            <img class="arrowDownIcon" src="/images/home/arrowDownGray.png" alt="">
          </div>
        </div>
        <div class="questionsSection__container__question opened">
          <div class="questionsSection__container__question__header">
            What Sectors do you have experience in working with?
            <img class="arrowDownIcon" src="/images/home/arrowUpWhite.png" alt="">
          </div>
          <div class="questionsSection__container__question__answer opened">
              We work for a variety of business sectors to include ; Call Centres / Real Estate Investors / Saas Companies / Home improvement companies / Recruitment Agencies / Charities / Insurance / Financial Investing 

          </div>
        </div>
        <div class="questionsSection__container__question">
          <div class="questionsSection__container__question__header">
              Where are your agents based? what is their background? What is their accents?
            <img class="arrowDownIcon" src="/images/home/arrowDownGray.png" alt="">
          </div>
        </div>
        <div class="questionsSection__container__question">
          <div class="questionsSection__container__question__header">
              What are all the services you provide?
            <img class="arrowDownIcon" src="/images/home/arrowDownGray.png" alt="">
          </div>
        </div>
        <div class="questionsSection__container__question">
          <div class="questionsSection__container__question__header">
              How do i hire an agent and get started?
            <img class="arrowDownIcon" src="/images/home/arrowDownGray.png" alt="">
          </div>
        </div>
        <div class="questionsSection__container__question">
          <div class="questionsSection__container__question__header">
              Can you show me some examples of recordings?
            <img class="arrowDownIcon" src="/images/home/arrowDownGray.png" alt="">
          </div>
        </div>
        <div class="questionsSection__container__question">
          <div class="questionsSection__container__question__header">
              Can i refer a friend or other business / do you have an affiliate program?
            <img class="arrowDownIcon" src="/images/home/arrowDownGray.png" alt="">
          </div>
        </div>
        <div class="questionsSection__container__question">
          <div class="questionsSection__container__question__header">
              How can i see reports about my campaign?
            <img class="arrowDownIcon" src="/images/home/arrowDownGray.png" alt="">
          </div>
        </div>
      </div>
    </section>

    <footer class="newFooter">
      <div class="contact">
        <img class="logo" src="/images/home/123logo.png" alt="">
        <div class="copyright">
          Copyright 2018 123Workforce. <br />
          All rights reserved.
        </div>
        <div class="socialNetWorks">
          <img src="/images/home/fb-icon.png" alt="">
          <img src="/images/home/tw-icon.png" alt="">
          <img src="/images/home/in-icon.png" alt="">
          <img src="/images/home/yt-icon.png" alt="">
          <img src="/images/home/ig-icon.png" alt="">
        </div>
        <div class="contactInfo">
          <div class="contactInfo__item">
            <img src="/images/home/whatsapp-icon.png" alt=""> +62 819-0888-7447
          </div>
          <div class="contactInfo__item">
            <img src="/images/home/mail-icon.png" alt=""> hello@123workforce.com
          </div>
        </div>
      </div>
      <div class="navigation">
        <ul class="navigation__group">
          <li>Home</li>
          <li>Solutions</li>
          <li>Shipping Rates</li>
          <li>tracking</li>
        </ul>
        <ul class="navigation__group">
          <li>Career</li>
          <li>FAQ</li>
          <li>Press</li>
          <li>Contact Us</li>
        </ul>
      </div>
      <img src="/images/home/bottomBg.png" alt="" class="bottomBg">
    </footer>
    
  </main>
  
</body>
</html>