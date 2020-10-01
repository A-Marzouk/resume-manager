<template>
  <div class="main-container">
    <div class="container">
      <div class="header">
        <div class="logo-section">
          <img class="new-logo" src="/images/new_homepage/logo.png" />
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
          Affordable <span class="talented"> UI Designer</span>
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
            <img src="/images/new_homepage/pen-tool.svg" alt="pen tool" />
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
        <div class="theme" v-for="(theme, i) in themes" :key="i">
          <img :src="theme.src" alt="theme thumbnail" />
        </div>
      </div>
    </div>
    <div class="separator"></div>
    <div class="footer">
      <div class="footer-logo">
        <img class="new-logo" src="/images/new_homepage/logo.png" />
      </div>
      <div class="follow-us">
        <div class="footer-text">Follow us</div>
        <div class="facebook">
          <img
            src="/images/new_homepage/facebook.svg"
            alt="fackbook"
            class="follow-logo"
          />
          <div class="follow-number">13.899 like</div>
        </div>
        <div class="instagram">
          <img
            src="/images/new_homepage/instagram.svg"
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
      themes: [
        {
          src: "/images/new_homepage/Item_1.png",
        },
        {
          src: "/images/new_homepage/Item_2.png",
        },
        {
          src: "/images/new_homepage/Item_3.png",
        },
        {
          src: "/images/new_homepage/Item_4.png",
        },
        {
          src: "/images/new_homepage/Item_5.png",
        },
        {
          src: "/images/new_homepage/Item_6.png",
        },
        {
          src: "/images/new_homepage/Item_3.png",
        },
        {
          src: "/images/new_homepage/Item_5.png",
        },
        {
          src: "/images/new_homepage/Item_4.png",
        },
        {
          src: "/images/new_homepage/Item_2.png",
        },
        {
          src: "/images/new_homepage/Item_1.png",
        },
        {
          src: "/images/new_homepage/Item_3.png",
        },
        {
          src: "/images/new_homepage/Item_4.png",
        },
        {
          src: "/images/new_homepage/Item_5.png",
        },
        {
          src: "/images/new_homepage/Item_2.png",
        },
      ],
      socialIcons: [
        {
          src: "/images/new_homepage/whatsapp.svg",
        },
        {
          src: "/images/new_homepage/skype.svg",
        },
        {
          src: "/images/new_homepage/gmail.svg",
        },
        {
          src: "/images/new_homepage/telegram.svg",
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
    };
  },
};
</script>

<style lang="scss">
#newHomepage {
  border-radius: 0rem;
  background: #f7f9ff;

  .main-container {
    background: #f7f9ff;
    .container {
      margin: 2rem;

      padding-left: 12rem;
    }
  }

  .new-logo {
    margin: 3rem 0;
    height: 15rem;
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
        background-image: url("/images/new_homepage/magnifiy.svg");
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
      img {
        width: 100%;
        margin: auto;
        padding: 2rem;
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
        height: 10rem;
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
    .main-container {
      background: #f7f9ff;
      .container {
        margin: 0rem;

        padding-left: 2rem;
      }
    }
    .new-logo {
      height: 10rem;
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
          background-image: url("/images/new_homepage/magnifiy.svg");
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
        img {
          width: 100%;
          margin: auto;
          padding: 2rem;
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
          height: 8rem;
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
    .main-container {
      background: #f7f9ff;
      .container {
        margin: 0rem;

        padding-left: 2rem;
      }
    }

    .new-logo {
      height: 10rem;
    }
    .rate-text {
      font-size: 3rem;
      line-height: 4rem;
    }
    .from {
      font-size: 2.5rem;
      line-height: 4rem;
    }
    .rate {
      font-size: 3rem;
      line-height: 4rem;
    }
    .rate-info {
      font-size: 1.2rem;
      line-height: 1.2rem;

      margin-top: 1rem;
    }
    .talented-title {
      width: 17rem;
      font-size: 2.5rem;
      line-height: 3.5rem;

      margin-top: 2rem;
    }
    .talented {
      font-size: 2.5rem;
      line-height: 3.5rem;
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
          background-image: url("/images/new_homepage/magnifiy.svg");
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
        img {
          width: 100%;
          margin: auto;
          padding: 1rem 0;
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
          height: 8rem;
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
          width: 25%;
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

  /* animateion */
  .talented-title {
    border-right: 0.15em solid orange;

    white-space: nowrap;
    overflow: hidden;
  }

  .talented-title {
    width: 14em;
    opacity: 0;
    -webkit-animation: type2 1.5s steps(60, end);
    animation: type2 1.5s steps(60, end);
    -webkit-animation-delay: 1.5s;
    animation-delay: 1s;
    -webkit-animation-fill-mode: forwards;
    animation-fill-mode: forwards;
  }

  @keyframes type2 {
    0% {
      width: 3px;
      border-right: 3px solid #001d68;
    }
    1% {
      opacity: 1;
      border-right: 3px solid #001d68;
    }
    99.9% {
      border-right: 3px solid #001d68;
    }
    100% {
      opacity: 1;

      border-right: 3px solid #001d68;
    }
  }

  @-webkit-keyframes type2 {
    0% {
      width: 0;
    }
    1% {
      opacity: 1;
    }
    99.9% {
      border-right: 3px solid #001d68;
    }
    100% {
      opacity: 1;
      border: none;
    }
  }
}
</style>
