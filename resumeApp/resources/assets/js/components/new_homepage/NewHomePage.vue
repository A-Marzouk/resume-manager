<template>
  <div class="main-conainter-home">
    <div class="conainter-home">
      <div class="header">
        <div class="logo-section">
          <img
            class="new-logo"
            src="/resumeApp/public/images/new_homepage/logo.png"
          />
        </div>
      </div>
      <div class="freelacer-text">
        <div class="rate-text">
          Trusted Freelance Designers
          <span class="from">at</span> <span class="rate">$25/hr</span>
        </div>
        <div class="rate-info">
          Scale your Creative Workforce with no overheads.
        </div>
        <div class="talented-title">
          <span class="talented"> {{ typeValue }} </span>
          <span class="cursor" :class="{ typing: typeStatus }">&nbsp;</span>
        </div>
      </div>
      <div class="search-section">
        <div class="search">
          <input
            type="text"
            name="advanced-search"
            id="advanced-search"
            placeholder="Type here..."
          />
          <a href="#" class="pen-tool">
            <img
              src="/resumeApp/public/images/new_homepage/pen-tool.svg"
              alt="pen tool"
            />
          </a>
          <div class="search-tags">
            <div class="search-tag" v-for="(tag, i) in searchTags" :key="i">
              {{ tag.label }}
            </div>
          </div>
        </div>
        <div class="search-button">
          <a href="#" target="_blank"> Search </a>
        </div>
      </div>
      <div class="theme-section">
        <div
          class="theme"
          v-for="(theme, i) in themes"
          :key="i"
          @mouseover="showDetailsIndex = i"
          @mouseleave="showDetailsIndex = null"
        >
          <a :href="theme.link">
            <img :src="theme.src" alt="theme thumbnail" />
          </a>
          <div class="view-details" v-if="showDetailsIndex == i">
            <div class="personal-info">
              <div class="info-details">
                <div class="full-name">{{ theme.name }}</div>
                <div class="designation">{{ theme.designation }}</div>
                <div class="address">{{ theme.address }}</div>
              </div>
              <div class="hire">
                <a class="hire-button" href="#">Hire</a>
              </div>
            </div>
            <div class="work-available">
              <div class="work-available-title">Available For Work</div>
              <div class="avaiable">
                <div>{{ theme.hours }} hours a week</div>
                <div>${{ theme.weekly_rate }}/week</div>
              </div>
              <div class="divide"></div>
              <div class="hourly-rate">
                ${{ theme.hourly_rate }} hourly rate
              </div>
            </div>
            <div class="view-portfolio">
              <a
                target="_blank"
                :href="theme.link"
                class="view-portfolio-button"
                >View Portfolio</a
              >
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="separator"></div>
    <div class="footer">
      <div class="footer-logo">
        <img
          class="new-logo"
          src="/resumeApp/public/images/new_homepage/logo.png"
        />
      </div>
      <div class="follow-us">
        <div class="footer-text">Follow us</div>
        <div class="facebook">
          <img
            src="/resumeApp/public/images/new_homepage/facebook.svg"
            alt="fackbook"
            class="follow-logo"
          />
          <div class="follow-number">13.899 like</div>
        </div>
        <div class="instagram">
          <img
            src="/resumeApp/public/images/new_homepage/instagram.svg"
            alt="instagram"
            class="follow-logo"
          />
          <div class="follow-number">733 Followers</div>
        </div>
      </div>
      <div class="contact-us">
        <div class="footer-text">Contact us</div>
        <div class="social-icons">
          <a
            href="#"
            class="social-logo"
            v-for="(icon, i) in socialIcons"
            :key="i"
          >
            <img :src="icon.src" alt="social icons" />
          </a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      showDetailsIndex: null,
      typeValue: "",
      typeStatus: false,
      typingSpeed: 100,
      erasingSpeed: 100,
      newTextDelay: 1000,
      typeArrayIndex: 0,
      charIndex: 0,
      themes: [
        {
          name: "Shakib Ali",
          designation: "UI UX Designer",
          hours: "8",
          weekly_rate: "40",
          hourly_rate: "25",
          address: "Dhaka, Bangladesh",
          link: "https://civ.ie/123workforce/ShakibAli",
          src: "/resumeApp/public/images/new_homepage/portfolio/sakib_ali.jpg",
        },
        {
          name: "Abu Usuf",
          designation: "UI / Visual Designer, Web Designer",
          hours: "8",
          weekly_rate: "40",
          hourly_rate: "25",
          address: "Dhaka, Bangladesh",
          link: "https://civ.ie/123workforce/AbuUsuf",
          src: "/resumeApp/public/images/new_homepage/portfolio/abu_usuf.jpg",
        },
        {
          name: "Mahmudul Hasan Manik",
          designation: "UX/UI, Product Designer",
          hours: "8",
          weekly_rate: "40",
          hourly_rate: "25",
          address: " Bangladesh",
          link: "https://civ.ie/123workforce/mahmudulhasan",
          src:
            "/resumeApp/public/images/new_homepage/portfolio/mehdi_manik.jpg",
        },
        {
          name: "Aymane Helfa",
          designation: "UI/UX DESIGNER & Brand identity designer",
          hours: "8",
          weekly_rate: "40",
          hourly_rate: "25",
          address: "Morocco",
          link: "https://civ.ie/123workforce/Aymane",
          src:
            "/resumeApp/public/images/new_homepage/portfolio/helfa_aymane.jpg",
        },
        {
          name: "Md. Tajul Islam Sajib",
          designation: "UX/UI & Creative Graphic Designer",
          hours: "8",
          weekly_rate: "40",
          hourly_rate: "25",
          address: "Bangladesh",
          link: "https://civ.ie/123workforce/Rony",
          src: "/resumeApp/public/images/new_homepage/portfolio/rony.jpg",
        },
        {
          name: "Shai Falcutila",
          designation: "Graphic Designer",
          hours: "8",
          weekly_rate: "40",
          hourly_rate: "25",
          address: "Philippines",
          link: "https://civ.ie/123workforce/Shai",
          src: "/resumeApp/public/images/new_homepage/portfolio/shai.jpg",
        },
        {
          name: "Yoka Leis",
          designation: "Web Designer, Graphic Designer",
          hours: "8",
          weekly_rate: "40",
          hourly_rate: "25",
          address: "Venezuela",
          link: "https://civ.ie/123workforce/Yoka",
          src: "/resumeApp/public/images/new_homepage/portfolio/yoka.jpg",
        },
        {
          name: "Anton Vasyliev",
          designation: "Web Designer",
          hours: "8",
          weekly_rate: "40",
          hourly_rate: "25",
          address: "Kharkiv,Ukraine",
          link: "https://civ.ie/123workforce/Anton",
          src: "/resumeApp/public/images/new_homepage/portfolio/anton.jpg",
        },
        {
          name: "Ishrat Jahan Shaeera",
          designation: "Illustrator, Graphic Designer",
          hours: "8",
          weekly_rate: "40",
          hourly_rate: "25",
          address: "Bangladesh",
          link: "https://civ.ie/123workforce/Ishrat",
          src: "/resumeApp/public/images/new_homepage/portfolio/ishrat.jpg",
        },
        {
          name: "Darina Kulyk",
          designation: "Product Designer",
          hours: "8",
          weekly_rate: "40",
          hourly_rate: "25",
          address: "Ukraine",
          link: "https://civ.ie/123workforce/darina",
          src: "/resumeApp/public/images/new_homepage/portfolio/darina.jpg",
        },
        {
          name: "Maral Golrokh",
          designation: "UI UX Designer",
          hours: "8",
          weekly_rate: "40",
          hourly_rate: "25",
          address: "Iran",
          link: "https://civ.ie/123workforce/maral",
          src: "/resumeApp/public/images/new_homepage/portfolio/maral.jpg",
        },
        {
          name: "Sharfuzzaman Sayem",
          designation: "UI/UX Designer",
          hours: "8",
          weekly_rate: "40",
          hourly_rate: "25",
          address: "Bangladesh",
          link: "https://civ.ie/123workforce/sayem",
          src: "/resumeApp/public/images/new_homepage/portfolio/sayem.jpg",
        },
        {
          name: "Imran Molla",
          designation: "UI UX Designer",
          hours: "8",
          weekly_rate: "40",
          hourly_rate: "25",
          address: "Bangladesh",
          link: "https://civ.ie/123workforce/Imran",
          src: "/resumeApp/public/images/new_homepage/portfolio/imran.jpg",
        },
        {
          name: "Humayra Kabir",
          designation: "UI UX Designer",
          hours: "8",
          weekly_rate: "40",
          hourly_rate: "25",
          address: "Bangladesh",
          link: "https://civ.ie/123workforce/Humayra",
          src: "/resumeApp/public/images/new_homepage/portfolio/humayra.jpg",
        },
        {
          name: "Viktoriya Kliuchnyck",
          designation: "Product Designer",
          hours: "8",
          weekly_rate: "40",
          hourly_rate: "25",
          address: "Russia",
          link: "https://civ.ie/123workforce/Viktoriia",
          src: "/resumeApp/public/images/new_homepage/portfolio/viktoriya.jpg",
        },
        {
          name: "Ronak Chhatwal",
          designation: "UI/UX Designer",
          hours: "8",
          weekly_rate: "40",
          hourly_rate: "25",
          address: "India",
          link: "https://civ.ie/123workforce/Ronak",
          src: "/resumeApp/public/images/new_homepage/portfolio/ronak.jpg",
        },
        {
          name: "Hachibur Rahman",
          designation: "Graphic Designer",
          hours: "8",
          weekly_rate: "40",
          hourly_rate: "25",
          address: "Bangladesh",
          link: "https://civ.ie/123workforce/huchibur",
          src: "/resumeApp/public/images/new_homepage/portfolio/hachibur.jpg",
        },
      ],
      socialIcons: [
        {
          src: "/resumeApp/public/images/new_homepage/whatsapp.svg",
        },
        {
          src: "/resumeApp/public/images/new_homepage/skype.svg",
        },
        {
          src: "/resumeApp/public/images/new_homepage/gmail.svg",
        },
        {
          src: "/resumeApp/public/images/new_homepage/telegram.svg",
        },
      ],
      searchTags: [
        {
          label: "UX",
        },
        {
          label: "Illustration",
        },
        {
          label: "Graphic Design",
        },
        {
          label: "Motion",
        },
        {
          label: "Product",
        },
      ],
      typeArray: [
        "Affordable UI Designer",
        " Reliable UX Designer",
        " Talented Graphic Designer",
        " Creative Illustrator",
        " Visionary Motion Designer",
        "Trusted Animator",
        " Verified Product Designer",
        " Approved UX Architect",
      ],
    };
  },
  methods: {
    typeText() {
      if (this.charIndex < this.typeArray[this.typeArrayIndex].length) {
        if (!this.typeStatus) this.typeStatus = true;
        this.typeValue += this.typeArray[this.typeArrayIndex].charAt(
          this.charIndex
        );
        this.charIndex += 1;
        setTimeout(this.typeText, this.typingSpeed);
      } else {
        this.typeStatus = false;
        setTimeout(this.eraseText, this.newTextDelay);
      }
    },
    eraseText() {
      if (this.charIndex > 0) {
        if (!this.typeStatus) this.typeStatus = true;
        this.typeValue = this.typeArray[this.typeArrayIndex].substring(
          0,
          this.charIndex - 1
        );
        this.charIndex -= 1;
        setTimeout(this.eraseText, this.erasingSpeed);
      } else {
        this.typeStatus = false;
        this.typeArrayIndex += 1;
        if (this.typeArrayIndex >= this.typeArray.length)
          this.typeArrayIndex = 0;
        setTimeout(this.typeText, this.typingSpeed + 1000);
      }
    },
  },
  created() {
    setTimeout(this.typeText, this.newTextDelay + 200);
  },
};
</script>

<style lang="scss">
#newHomepage {
  border-radius: 0rem;
  background: #f7f9ff;

  .main-conainter-home {
    background: #f7f9ff;
    .conainter-home {
      margin: 2rem;

      padding-left: 12rem;
    }
  }

  .new-logo {
    margin: 3rem 0;
    height: 8rem;
  }
  .rate-text {
    font-family: Montserrat;
    font-style: normal;
    font-weight: bold;
    font-size: 5rem;
    line-height: 6.5rem;
    color: #001d68;
  }
  .from {
    font-weight: normal;
    font-size: 4rem;
    line-height: 6.5rem;
    color: #001d68;
  }
  .rate {
    font-weight: bold;
    font-size: 5rem;
    line-height: 6.5rem;
    color: #2523f0;
  }
  .rate-info {
    font-family: Montserrat;
    font-style: normal;
    font-weight: 500;
    font-size: 3rem;
    line-height: 3rem;
    color: #687494;
    margin-top: 1rem;
  }
  .talented-title {
    font-family: Montserrat;
    font-style: normal;
    font-weight: 500;
    font-size: 4.5rem;
    line-height: 6.5rem;
    color: #001d68;
    margin-top: 2rem;
  }
  .talented {
    font-family: Montserrat;
    font-style: normal;
    font-weight: 500;
    font-size: 4.5rem;
    line-height: 6.5rem;
    color: #2523f0;
  }
  .cursor {
    display: inline-block;
    margin-left: 0.3rem;
    width: 0.4rem;
    background-color: #001d68;
    animation: cursorBlink 1s infinite;
    -webkit-animation-fill-mode: forwards;
    animation-fill-mode: forwards;
  }
  span.cursor.typing {
    animation: none;
  }

  @keyframes cursorBlink {
    49% {
      background-color: #001d68;
    }
    50% {
      background-color: transparent;
    }
    99% {
      background-color: transparent;
    }
  }
  .search-section {
    display: flex;
    flex-wrap: wrap;
    margin: 4rem 0;
    .search {
      width: 70%;
      position: relative;

      #advanced-search {
        width: 100%;
        height: 8rem;
        background: #ffffff;
        border: 2px solid #c4c9f5;
        box-sizing: border-box;
        border-radius: 1rem;
        background-image: url("/resumeApp/public/images/new_homepage/magnifiy.svg");
        background-position: 2.5rem 2rem;
        background-repeat: no-repeat;

        position: relative;
        font-size: 2rem;
        line-height: 2rem;
        padding: 1rem 1rem 1rem 8rem;
      }
      .pen-tool {
        position: absolute;
        right: 2rem;
        top: 2rem;
        padding: 1rem;
        box-shadow: 0px 5px 10px rgba(0, 16, 131, 0.15);
        border-radius: 50px;
        background: #fff;
        text-decoration: none;
        text-align: center;

        img {
          width: 2.4rem;
          height: 2.4rem;
          margin: 0 auto;
        }
      }
      .search-tags {
        display: flex;
        justify-content: space-around;
        margin-top: 3rem;
        .search-tag {
          padding: 1rem 5rem;

          background: #e6e8fc;
          border-radius: 5rem;
          font-family: Noto Sans;
          font-style: normal;
          font-weight: 500;
          font-size: 2rem;
          line-height: 4rem;
          color: #687494;
        }
      }
    }
    .search-button {
      width: 20%;
      padding: 2rem;
      a {
        width: 18rem;
        height: 7rem;
        background-color: #001ce2;
        text-decoration: none;
        text-align: center;
        border-radius: 5px;
        font-family: Noto Sans;
        font-style: normal;
        font-weight: 500;
        font-size: 2.7rem;
        line-height: 3.7rem;
        color: #ffffff;
        padding: 1rem 2rem;
        margin: 0 4rem;
      }
    }
  }

  .theme-section {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    height: 1600px;
    overflow-y: scroll;
    margin: 0 4rem 0 0;
    padding: 0 6rem 0 0;
    .theme {
      width: 33.3333%;
      position: relative;
      img {
        width: 100%;
        margin: auto;
        padding: 2rem;
      }
      .view-details {
        position: absolute;
        margin: auto;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.95);
        padding: 3rem;
        top: 0em;
        left: 0em;
        display: flex;
        flex-wrap: wrap;
        .personal-info {
          width: 100%;
          position: relative;
          display: flex;
          flex-wrap: wrap;
          .info-details {
            width: 75%;
            .full-name {
              font-family: Montserrat;
              font-style: normal;
              font-weight: bold;
              font-size: 2rem;
              line-height: 2.4rem;
              color: #001d68;
            }
            .designation,
            .address {
              font-family: Noto Sans;
              font-style: normal;
              font-weight: normal;
              font-size: 1.5rem;
              line-height: 1.5rem;
              color: #687494;
              padding: 1rem 0;
            }
          }
          .hire {
            width: 25%;
            margin-top: 1rem;
            .hire-button {
              text-decoration: none;
              padding: 1rem 3rem;
              background: #1917ef;
              border-radius: 6px;
              font-family: Montserrat;
              font-style: normal;
              font-weight: bold;
              font-size: 1.5rem;
              line-height: 1.5rem;
              text-align: center;
              letter-spacing: 0.005em;
              color: #ffffff;
            }
          }
        }
        .work-available {
          display: flex;
          width: 100%;
          flex-wrap: wrap;
          align-items: center;
          .work-available-title {
            font-family: Noto Sans;
            font-style: normal;
            font-weight: 600;
            font-size: 2rem;
            line-height: 2.5rem;
            color: #0046fe;
            width: 100%;
          }
          .avaiable,
          .hourly-rate {
            font-family: Noto Sans;
            font-style: normal;
            font-weight: normal;
            font-size: 1.5rem;
            line-height: 1.5rem;
            color: #687494;
            width: 50%;
          }
          .avaiable {
            border-right: 1px solid #cad9ff;
            div {
              padding: 0.5rem 0;
            }
          }
          .hourly-rate {
            padding-left: 2rem;
          }
        }
        .view-portfolio {
          width: 100%;
          text-align: center;
          margin: auto;
          .view-portfolio-button {
            text-decoration: none;
            padding: 1rem 3rem;
            background: #1917ef;
            border-radius: 6px;
            font-family: Montserrat;
            font-style: normal;
            font-weight: bold;
            font-size: 1.5rem;
            line-height: 1.5rem;
            text-align: center;
            letter-spacing: 0.005em;
            color: #ffffff;
          }
        }
      }
    }
  }

  .separator {
    background-color: #0046fe;
    width: 95%;
    height: 2px;

    margin: 6rem auto 1rem auto;
  }
  .footer {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    padding: 0rem 3rem 10rem;

    .footer-logo {
      width: 22%;
      .new-logo {
        height: 6rem;
      }
    }
    .follow-us {
      width: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      .footer-text {
        width: 20%;
        font-family: Montserrat;
        font-style: normal;
        font-weight: 600;
        font-size: 3rem;
        line-height: 3rem;
        color: #0046fe;
      }
      .facebook {
        width: 32%;
        display: flex;
        .follow-logo {
          margin: auto 2rem;
          width: 4.5rem;
          height: 4.5rem;
        }
        .follow-number {
          font-family: Montserrat;
          font-style: normal;
          font-weight: bold;
          font-size: 3rem;
          line-height: 3rem;
          color: #0046fe;
          align-self: center;
        }
      }
      .instagram {
        width: 40%;
        display: flex;
        .follow-logo {
          margin: auto 2rem;
          width: 4.5rem;
          height: 4.5rem;
        }
        .follow-number {
          font-family: Montserrat;
          font-style: normal;
          font-weight: bold;
          font-size: 3rem;
          line-height: 3rem;
          color: #0046fe;
          align-self: center;
          text-align: center;
        }
      }
    }
    .contact-us {
      width: 28%;
      display: flex;
      align-items: center;
      justify-content: center;
      .footer-text {
        width: 40%;
        font-family: Montserrat;
        font-style: normal;
        font-weight: 600;
        font-size: 3rem;
        line-height: 3rem;
        color: #0046fe;
      }
      .social-icons {
        width: 55%;
        display: flex;
        justify-content: space-evenly;
        .social-logo {
          padding: 1rem;
          border-radius: 100px;
          background: #0046fe;
          text-decoration: none;
          text-align: center;

          img {
            width: 2.4rem;
            height: 2.4rem;
            margin: 0 auto;
          }
        }
      }
    }
  }

  /* width */
  .theme-section::-webkit-scrollbar {
    width: 10px;
  }

  /* Track */
  .theme-section::-webkit-scrollbar-track {
    background: #e6e8fc;
  }

  /* Handle */
  .theme-section::-webkit-scrollbar-thumb {
    background: #001ce2;
  }

  @media screen and (max-width: 1024px) {
    .main-conainter-home {
      background: #f7f9ff;
      .conainter-home {
        margin: 0rem;

        padding-left: 2rem;
      }
    }
    .new-logo {
      height: 8rem;
    }
    .rate-text {
      font-size: 4rem;
      line-height: 5rem;
    }
    .from {
      font-size: 3.5rem;
      line-height: 5rem;
    }
    .rate {
      font-size: 4rem;
      line-height: 5rem;
    }
    .rate-info {
      font-size: 2.2rem;
      line-height: 2.2rem;

      margin-top: 2rem;
    }
    .talented-title {
      font-size: 3.5rem;
      line-height: 4.5rem;

      margin-top: 3rem;
    }
    .talented {
      font-size: 4.5rem;
      line-height: 4.5rem;
    }
    .search-section {
      display: flex;
      flex-wrap: wrap;
      margin: 4rem 0;
      .search {
        width: 100%;
        position: relative;

        #advanced-search {
          width: 100%;
          height: 8rem;
          background: #ffffff;
          border: 2px solid #c4c9f5;
          box-sizing: border-box;
          border-radius: 1rem;
          background-image: url("/resumeApp/public/images/new_homepage/magnifiy.svg");
          background-position: 2.5rem 2rem;
          background-repeat: no-repeat;

          position: relative;
          font-size: 2rem;
          line-height: 2rem;
          padding: 1rem 1rem 1rem 8rem;
        }
        .pen-tool {
          position: absolute;
          right: 2rem;
          top: 2rem;
          padding: 1rem;
          box-shadow: 0px 5px 10px rgba(0, 16, 131, 0.15);
          border-radius: 50px;
          background: #fff;
          text-decoration: none;
          text-align: center;

          img {
            width: 2.4rem;
            height: 2.4rem;
            margin: 0 auto;
          }
        }
        .search-tags {
          display: -webkit-box !important;
          justify-content: space-around;
          margin-top: 3rem;
          flex-wrap: nowrap !important;
          .search-tag {
            padding: 1rem 5rem;
            margin: 0 1rem;
            background: #e6e8fc;
            border-radius: 5rem;
            font-family: Noto Sans;
            font-style: normal;
            font-weight: 500;
            font-size: 2rem;
            line-height: 4rem;
            color: #687494;
          }
        }
      }
      .search-button {
        width: 100%;
        padding: 5rem 0rem;
        a {
          width: 18rem;
          height: 7rem;
          background-color: #001ce2;
          text-decoration: none;
          text-align: center;
          border-radius: 5px;
          font-family: Noto Sans;
          font-style: normal;
          font-weight: 500;
          font-size: 2.7rem;
          line-height: 3.7rem;
          color: #ffffff;
          padding: 1rem 2rem;
          margin: 0 0;
        }
      }
    }

    .theme-section {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-wrap: wrap;
      height: 800px;
      overflow-y: scroll;
      margin: 0 4rem 0 0;
      padding: 0 2rem 0 0;
      .theme {
        width: 33.3333%;
        position: relative;
        img {
          width: 100%;
          margin: auto;
          padding: 2rem;
        }
        .view-details {
          position: absolute;
          margin: auto;
          width: 100%;
          height: 100%;
          background-color: rgba(255, 255, 255, 0.95);
          padding: 2rem;
          top: 0em;
          left: 0em;
          display: flex;
          flex-wrap: wrap;
          .personal-info {
            width: 100%;
            position: relative;
            display: flex;
            flex-wrap: wrap;
            .info-details {
              width: 75%;
              .full-name {
                font-family: Montserrat;
                font-style: normal;
                font-weight: bold;
                font-size: 1.2rem;
                line-height: 1.4rem;
                color: #001d68;
              }
              .designation,
              .address {
                font-family: Noto Sans;
                font-style: normal;
                font-weight: normal;
                font-size: 1rem;
                line-height: 1rem;
                color: #687494;
                padding: 0.5rem 0;
              }
            }
            .hire {
              width: 25%;
              margin-top: 1rem;
              .hire-button {
                text-decoration: none;
                padding: 0.5rem 1rem;
                background: #1917ef;
                border-radius: 6px;
                font-family: Montserrat;
                font-style: normal;
                font-weight: bold;
                font-size: 1.2rem;
                line-height: 1.2rem;
                text-align: center;
                letter-spacing: 0.005em;
                color: #ffffff;
              }
            }
          }
          .work-available {
            display: flex;
            width: 100%;
            flex-wrap: wrap;
            align-items: center;
            .work-available-title {
              font-family: Noto Sans;
              font-style: normal;
              font-weight: 600;
              font-size: 1rem;
              line-height: 1.5rem;
              color: #0046fe;
              width: 100%;
            }
            .avaiable,
            .hourly-rate {
              font-family: Noto Sans;
              font-style: normal;
              font-weight: normal;
              font-size: 1rem;
              line-height: 1.5rem;
              color: #687494;
              width: 50%;
            }
            .avaiable {
              border-right: 1px solid #cad9ff;
              div {
                padding: 0.5rem 0;
              }
            }
            .hourly-rate {
              padding-left: 1rem;
            }
          }
          .view-portfolio {
            width: 100%;
            text-align: center;
            margin: auto;
            .view-portfolio-button {
              text-decoration: none;
              padding: 0.5rem 1rem;
              background: #1917ef;
              border-radius: 6px;
              font-family: Montserrat;
              font-style: normal;
              font-weight: bold;
              font-size: 1rem;
              line-height: 1.5rem;
              text-align: center;
              letter-spacing: 0.005em;
              color: #ffffff;
            }
          }
        }
      }
    }
    .footer {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-wrap: wrap;
      padding: 0 2rem;

      .footer-logo {
        width: 100%;

        .new-logo {
          height: 6rem;
        }
      }
      .follow-us {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 1rem 0;
        .footer-text {
          width: 20%;
          font-family: Montserrat;
          font-style: normal;
          font-weight: 600;
          font-size: 1.5rem;
          line-height: 3rem;
          color: #0046fe;
        }
        .facebook {
          width: 40%;
          display: flex;
          .follow-logo {
            margin: auto 0rem;
            height: 2.5rem;
          }
          .follow-number {
            font-family: Montserrat;
            font-style: normal;
            font-weight: bold;
            font-size: 1.5rem;
            line-height: 3rem;
            color: #0046fe;
            align-self: center;
          }
        }
        .instagram {
          width: 40%;
          display: flex;
          .follow-logo {
            margin: auto 0rem;

            height: 2.5rem;
          }
          .follow-number {
            font-family: Montserrat;
            font-style: normal;
            font-weight: bold;
            font-size: 1.5rem;
            line-height: 3rem;
            color: #0046fe;
            align-self: center;
            text-align: center;
          }
        }
      }
      .contact-us {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: start;
        margin: 1rem 0;
        .footer-text {
          width: 20%;
          font-family: Montserrat;
          font-style: normal;
          font-weight: 600;
          font-size: 1.5rem;
          line-height: 3rem;
          color: #0046fe;
        }
        .social-icons {
          width: 55%;
          display: flex;
          justify-content: flex-start;
          .social-logo {
            padding: 0.3rem;
            border-radius: 100px;
            background: #0046fe;
            text-decoration: none;
            text-align: center;
            margin: 0 1rem;

            img {
              object-fit: contain;
              margin: 0 auto;
              width: 1.5rem;
              height: 1.5rem;
            }
          }
        }
      }
    }
  }
  @media screen and (max-width: 475px) {
    .main-conainter-home {
      background: #f7f9ff;
      .conainter-home {
        margin: 0rem;
        padding-right: 2rem;
        padding-left: 2rem;
      }
    }

    .new-logo {
      height: 6rem;
      width: 30rem;
    }
    .rate-text {
      font-size: 2.5rem;
      line-height: 5rem;
    }
    .from {
      font-size: 2rem;
      line-height: 5rem;
    }
    .rate {
      font-size: 2.5rem;
      line-height: 5rem;
    }
    .rate-info {
      font-size: 1rem;
      line-height: 1.5rem;

      margin-top: 1rem;
    }
    .talented-title {
      font-size: 2rem;
      line-height: 4rem;

      margin-top: 2rem;
    }
    .talented {
      font-size: 2rem;
      line-height: 4rem;
    }
    .search-section {
      display: flex;
      flex-wrap: wrap;
      margin: 4rem 0;
      .search {
        width: 100%;
        position: relative;

        #advanced-search {
          width: 100%;
          height: 8rem;
          background: #ffffff;
          border: 2px solid #c4c9f5;
          box-sizing: border-box;
          border-radius: 1rem;
          background-image: url("/resumeApp/public/images/new_homepage/magnifiy.svg");
          background-position: 2.5rem 2rem;
          background-repeat: no-repeat;

          position: relative;
          font-size: 2rem;
          line-height: 2rem;
          padding: 1rem 1rem 1rem 8rem;
        }
        .pen-tool {
          position: absolute;
          right: 2rem;
          top: 2rem;
          padding: 1rem;
          box-shadow: 0px 5px 10px rgba(0, 16, 131, 0.15);
          border-radius: 50px;
          background: #fff;
          text-decoration: none;
          text-align: center;

          img {
            width: 2.4rem;
            height: 2.4rem;
            margin: 0 auto;
          }
        }
        .search-tags {
          display: -webkit-box !important;
          justify-content: space-around;
          margin-top: 3rem;
          flex-wrap: nowrap !important;
          .search-tag {
            padding: 1rem 3rem;
            background: #e6e8fc;
            border-radius: 5rem;
            font-family: Noto Sans;
            font-style: normal;
            font-weight: 500;
            font-size: 1.5rem;
            line-height: 2rem;
            margin: 0 1rem;
            color: #687494;
          }
        }
      }
      .search-button {
        width: 100%;
        padding: 4rem 0rem;
        a {
          width: 18rem;
          height: 7rem;
          background-color: #001ce2;
          text-decoration: none;
          text-align: center;
          border-radius: 5px;
          font-family: Noto Sans;
          font-style: normal;
          font-weight: 500;
          font-size: 2.7rem;
          line-height: 3.7rem;
          color: #ffffff;
          padding: 1rem 2rem;
          margin: 0 0;
        }
      }
    }

    .theme-section {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-wrap: wrap;
      height: auto;
      overflow: hidden;
      padding: 0 0rem 0 0;
      margin: 0 1rem;
      .theme {
        width: 100%;
        position: relative;
        img {
          width: 100%;
          margin: auto;
          padding: 1rem 0;
        }
        .view-details {
          position: absolute;
          margin: auto;
          width: 100%;
          height: 100%;
          background-color: rgba(255, 255, 255, 0.95);
          padding: 2rem;
          top: 0em;
          left: 0em;
          display: flex;
          flex-wrap: wrap;
          .personal-info {
            width: 100%;
            position: relative;
            display: flex;
            flex-wrap: wrap;
            .info-details {
              width: 75%;
              .full-name {
                font-family: Montserrat;
                font-style: normal;
                font-weight: bold;
                font-size: 1.2rem;
                line-height: 1.4rem;
                color: #001d68;
              }
              .designation,
              .address {
                font-family: Noto Sans;
                font-style: normal;
                font-weight: normal;
                font-size: 1rem;
                line-height: 1rem;
                color: #687494;
                padding: 1rem 0;
              }
            }
            .hire {
              width: 25%;
              margin-top: 1rem;
              .hire-button {
                text-decoration: none;
                padding: 1rem 2rem;
                background: #1917ef;
                border-radius: 6px;
                font-family: Montserrat;
                font-style: normal;
                font-weight: bold;
                font-size: 1.2rem;
                line-height: 1.2rem;
                text-align: center;
                letter-spacing: 0.005em;
                color: #ffffff;
              }
            }
          }
          .work-available {
            display: flex;
            width: 100%;
            flex-wrap: wrap;
            align-items: center;
            .work-available-title {
              font-family: Noto Sans;
              font-style: normal;
              font-weight: 600;
              font-size: 1rem;
              line-height: 1.5rem;
              color: #0046fe;
              width: 100%;
            }
            .avaiable,
            .hourly-rate {
              font-family: Noto Sans;
              font-style: normal;
              font-weight: normal;
              font-size: 1rem;
              line-height: 1.5rem;
              color: #687494;
              width: 50%;
            }
            .avaiable {
              border-right: 1px solid #cad9ff;
              div {
                padding: 0.5rem 0;
              }
            }
            .hourly-rate {
              padding-left: 1rem;
            }
          }
          .view-portfolio {
            width: 100%;
            text-align: center;
            margin: auto;
            .view-portfolio-button {
              text-decoration: none;
              padding: 1rem 3rem;
              background: #1917ef;
              border-radius: 6px;
              font-family: Montserrat;
              font-style: normal;
              font-weight: bold;
              font-size: 1.2rem;
              line-height: 1.5rem;
              text-align: center;
              letter-spacing: 0.005em;
              color: #ffffff;
            }
          }
        }
      }
    }
    .footer {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-wrap: wrap;
      padding: 0 2rem;
      .footer-logo {
        width: 100%;
        .new-logo {
          height: 6rem;
          width: 30rem;
        }
      }
      .follow-us {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 1rem 0;
        .footer-text {
          width: 20%;
          font-family: Montserrat;
          font-style: normal;
          font-weight: 600;
          font-size: 1rem;
          line-height: 3rem;
          color: #0046fe;
        }
        .facebook {
          width: 40%;
          display: flex;
          .follow-logo {
            margin: auto 0rem;
            height: 2rem;
          }
          .follow-number {
            font-family: Montserrat;
            font-style: normal;
            font-weight: bold;
            font-size: 1rem;
            line-height: 3rem;
            color: #0046fe;
            align-self: center;
          }
        }
        .instagram {
          width: 40%;
          display: flex;
          .follow-logo {
            margin: auto 0rem;

            height: 2rem;
          }
          .follow-number {
            font-family: Montserrat;
            font-style: normal;
            font-weight: bold;
            font-size: 1rem;
            line-height: 3rem;
            color: #0046fe;
            align-self: center;
            text-align: center;
          }
        }
      }
      .contact-us {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: start;
        margin: 1rem 0;
        .footer-text {
          width: 25%;
          font-family: Montserrat;
          font-style: normal;
          font-weight: 600;
          font-size: 1rem;
          line-height: 3rem;
          color: #0046fe;
        }
        .social-icons {
          width: 55%;
          display: flex;
          justify-content: flex-start;
          .social-logo {
            padding: 0.3rem;
            border-radius: 100px;
            background: #0046fe;
            text-decoration: none;
            text-align: center;
            margin: 0 1rem;

            img {
              object-fit: contain;
              margin: 0 auto;
              width: 1.2rem;
              height: 1.2rem;
            }
          }
        }
      }
    }
  }

  /* animateion */
  .talented-title {
    white-space: nowrap;
    overflow: hidden;
  }
}
</style>
