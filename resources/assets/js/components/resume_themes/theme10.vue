<template>
  <div class="d-flex justify-content-center">
    <nav class="navbar navbar-light fixed-top dashboard_navbar">
      <a class="navbar-brand" href="/freelancer/dashboard">
        <img src="/images/client/logo_123.png" alt="logout" style="width: 177px;" />
      </a>
    </nav>

    <div class="themeWrapper">
      <div class="mainThemeBar d-flex justify-content-between align-items-center">
        <div class="left">
          <div class="avatar">
            <img src="/images/resume_themes/theme10/man-photo.png" alt="profile pic" />
          </div>
          <div class="info d-flex flex-column align-items-between">
            <div class="user-name">
              Conor
              <img class="chat-icon" src="/images/resume_themes/theme10/chat.svg" alt="chat" />
            </div>
            <div class="job-title">Ui/Ux designer</div>
            <div class="social-icons">
              <img src="/images/resume_themes/theme10/behance.svg" alt="icon" />
              <img src="/images/resume_themes/theme10/dribbble.svg" alt="icon" />
              <img src="/images/resume_themes/theme10/instagram.svg" alt="icon" />
              <img src="/images/resume_themes/theme10/linkedin.svg" alt="icon" />
              <img src="/images/resume_themes/theme10/pinterest.svg" alt="icon" />
            </div>
          </div>
        </div>

        <div class="right d-flex">
          <div class="d-flex media">
            <span>Interview:</span>
            <img src="/images/resume_themes/theme10/sound.svg" alt="sound" />
            <img src="/images/resume_themes/theme10/video.svg" alt="icon" />
          </div>
          <div class="hourly-rate">
            <div class="hourly-rate-text">$10</div>
            <div class="hourly-rate-text light">Hourly Rate</div>
          </div>
          <div class="weekly-availability">
            <div class="hourly-rate-text">35 hours</div>
            <div class="hourly-rate-text light">Weekly Availability</div>
          </div>
          <a href="javascript:void(0)" class="hire-me-btn">HIRE ME</a>
        </div>
      </div>

      <div class="tabs-bar d-flex justify-content-center align-items-center">
        <div
          class="tab-text"
          @click="setActiveTab('portfolio')"
          :class="{active : activeTab === 'portfolio'}"
        >Portfolio</div>
        <div
          class="tab-text"
          @click="setActiveTab('work')"
          :class="{active : activeTab === 'work'}"
        >Work</div>
        <div
          class="tab-text"
          @click="setActiveTab('education')"
          :class="{active : activeTab === 'education'}"
        >Education</div>
      </div>

      <div class="tab-content-wrapper">
        <div class="tab-content-inside-wrapper">
          <div class="skills-tabs">
            <div
              class="skills-tab-text"
              :class="{active : activeSkillTab === 'programming-languages'}"
              @click="setActiveSkillTab('programming-languages')"
            >Programming Languages</div>
            <div
              class="skills-tab-text"
              :class="{active : activeSkillTab === 'framewroks-databases'}"
              @click="setActiveSkillTab('framewroks-databases')"
            >Frameworks/Databases</div>
            <div
              class="skills-tab-text"
              :class="{active : activeSkillTab === 'design-skills'}"
              @click="setActiveSkillTab('design-skills')"
            >Design Skills</div>
            <div
              class="skills-tab-text mr-0"
              :class="{active : activeSkillTab === 'software'}"
              @click="setActiveSkillTab('software')"
            >Software</div>
          </div>
          <div class="skills-icons-bar" id="style-1">
            <div class="skill">
              <span class="skill-name">Javascript</span>
              <span class="skill-percentage">100%</span>
            </div>
            <div class="skill">
              <span class="skill-name">Python</span>
              <span class="skill-percentage">90%</span>
            </div>
            <div class="skill">
              <span class="skill-name">C++</span>
              <span class="skill-percentage">70%</span>
            </div>
            <div class="skill">
              <span class="skill-name">Php</span>
              <span class="skill-percentage">80%</span>
            </div>
            <div class="skill">
              <span class="skill-name">Matlab</span>
              <span class="skill-percentage">50%</span>
            </div>
            <div class="skill">
              <span class="skill-name">Visual Basic</span>
              <span class="skill-percentage">60%</span>
            </div>
            <div class="skill">
              <span class="skill-name"></span>
              <span class="skill-percentage"></span>
            </div>
          </div>

          <div class="main-tab-content" id="style-2">
            <slick class="portfolioSlides" ref="slick" :options="slickOptions">
              <div class="d-flex flex-column align-items-center">
                <img src="/images/resume_themes/theme3/portfolio1.png" alt="portfolio image" />
              </div>

              <div class="d-flex flex-column align-items-center">
                <img src="/images/resume_themes/theme3/portfolio2.png" alt="portfolio image" />
              </div>
              <div class="d-flex flex-column align-items-center">
                <img src="/images/resume_themes/theme3/portfolio1.png" alt="portfolio image" />
              </div>

              <div class="d-flex flex-column align-items-center">
                <img src="/images/resume_themes/theme3/portfolio2.png" alt="portfolio image" />
              </div>

              <div class="d-flex flex-column align-items-center">
                <img src="/images/resume_themes/theme3/portfolio1.png" alt="portfolio image" />
              </div>

              <div class="d-flex flex-column align-items-center">
                <img src="/images/resume_themes/theme3/portfolio2.png" alt="portfolio image" />
              </div>

              <div class="d-flex flex-column align-items-center">
                <img src="/images/resume_themes/theme3/portfolio1.png" alt="portfolio image" />
              </div>
            </slick>

            <div class="slick-controls">
              <a href="javascript:;" @click.prevent="prevProject" class="slick-arrow">
                <img src="/images/resume_themes/theme10/arrow-prev.svg" alt="slick arrow" />
              </a>
              <div class="slick-dots-container">
                <!-- Change it for the user projects -->
                <a
                  v-for="(project, index) in projects"
                  :key="project.name + index"
                  href="javascript:;"
                  class="slick-control"
                  :class="{active: index === activeProjectIndex}"
                  @click.prevent="handleSetPosition(index)"
                ></a>
              </div>
              <a href="javascript:;" @click.prevent="nextProject" class="slick-arrow">
                <img src="/images/resume_themes/theme10/arrow-next.svg" alt="slick arrow" />
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Slick from "vue-slick";

export default {
  props: ["user"],
  components: {
    Slick
  },
  data() {
    return {
      activeTab: "portfolio",
      activeSkillTab: "programming-languages",
      adaptativeHeight: true,
      projects: [
        {
          name: "project 1",
          img: "imagen1"
        },
        {
          name: "project 2",
          img: "imagen2"
        },
        {
          name: "project 3",
          img: "imagen3"
        },
        {
          name: "project 4",
          img: "imagen4"
        }
      ],
      activeProjectIndex: 0,
      slickOptions: {
        infinite: false,
        arrows: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 1600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 1280,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      }
    };
  },
  methods: {
    setActiveTab(tabName) {
      this.activeTab = tabName;
    },
    setActiveSkillTab(tabName) {
      this.activeSkillTab = tabName;
    },

    handleSetPosition(index) {
      this.$refs.slick.goTo(index);
      this.activeProjectIndex = index;
    },
    reInit() {
      this.$nextTick(() => {
        this.$refs.slick.reSlick();
      });
    },
    nextPosition() {
      let index = this.$refs.slick.currentSlide();
      if (index < this.projects.length) {
        this.$refs.slick.goTo(index + 1);
        this.activeProjectIndex = index + 1;
      }
    },

    prevPosition() {
      let index = this.$refs.slick.currentSlide();
      if (index > 0) {
        this.$refs.slick.goTo(index - 1);
        this.activeProjectIndex = index - 1;
      }
    }
  },
  mounted() {}
};
</script>

<style lang="scss">
$primaryColor: #104efb;

.hideOnPhone {
  @media only screen and (max-width: 600px) {
    display: none !important;
  }
}

.hideOnNotPhone {
  @media only screen and (min-width: 600px) {
    display: none !important;
  }
}

.themeWrapper {
  width: 100vw;
  max-width: 1920px;
  background: white;
  margin-left: 3%;
  margin-right: 3%;
  margin-top: 1%;
  border-radius: 15px;

  .mainThemeBar {
    padding-top: 40px;
    padding-left: 5%;
    padding-right: 5%;
    flex-wrap: wrap;

    .left {
      display: flex;

      @media only screen and (max-width: 768px) {
        width: 100%;
        justify-content: space-between;
      }

      .icons {
        @media only screen and (max-width: 600px) {
          margin-right: 0;
        }
        margin-right: 27px;
        img {
          width: 48px;
          height: 48px;
          margin-bottom: 14px;
        }
        img:last-child {
          margin-bottom: 0;
        }
      }
      .avatar {
        margin-right: 37px;
        border-radius: 50%;
        border: 10px solid $primaryColor;

        img {
          width: 160px;
          height: 160px;
        }

        @media only screen and (max-width: 600px) {
          margin-right: 15px;
          img {
            width: 104px;
            height: 104px;
          }
        }
      }
      .info {
        margin-top: 15px;
        @media only screen and (max-width: 768px) {
          margin-top: 0;
          width: 100%;
        }

        @media only screen and (max-width: 400px) {
          width: auto;
        }

        .user-name {
          margin-left: -2px;
          font-weight: normal;
          color: $primaryColor;
          font-size: 31px;
          line-height: 30px;
          position: relative;

          @media only screen and (max-width: 1130px) {
            font-size: 26px;
          }

          @media only screen and (max-width: 600px) {
            font-size: 24px;
          }

          .chat-icon {
            position: absolute;
            right: 50px;
            top: 0;

            @media only screen and (max-width: 600px) {
              right: 0;
            }
          }
        }

        .job-title {
          margin-top: 15px;
          font-weight: 300;
          font-size: 20px;
          line-height: 19px;
          color: $primaryColor;

          @media only screen and (max-width: 1130px) {
            font-size: 18px;
          }

          @media only screen and (max-width: 600px) {
            margin-top: 8px;
            font-size: 16px;
          }
        }

        .social-icons {
          margin-top: 42px;
          width: 20vw;
          display: flex;
          justify-content: space-between;

          @media only screen and (max-width: 768px) {
            width: 100%;
            max-width: 280px;
          }

          @media only screen and (max-width: 600px) {
            max-width: 100%;
          }

          @media only screen and (max-width: 478px) {
            overflow-x: auto;
          }

          img {
            width: 24px;
            height: 24px;

            @media only screen and (max-width: 600px) {
              margin-right: 10px;

              &:last-child {
                margin-right: 0;
              }
            }
          }
        }
      }
    }

    .right {
      color: $primaryColor;
      border-top: 1px solid $primaryColor;
      border-bottom: 1px solid $primaryColor;
      border-left: 1px solid $primaryColor;
      border-radius: 15px;
      padding: 18px 180px 18px 50px;
      position: relative;
      justify-content: center;
      align-items: center;

      @media only screen and (max-width: 1130px) {
        padding: 18px 180px 18px 30px;
      }

      @media only screen and (max-width: 980px) {
        padding: 18px;
        padding-bottom: 110px;
        border-right: 1px solid $primaryColor;
      }

      @media only screen and (max-width: 768px) {
        margin-top: 57px;
        width: 100%;
        justify-content: space-around;
      }

      .media {
        position: absolute;
        right: 0;
        top: -40px;
        width: 200px;
        display: flex;
        justify-content: space-between;

        @media only screen and (max-width: 980px) {
          top: -32px;
        }

        @media only screen and (max-width: 768px) {
          top: auto;
          right: auto;
          bottom: -40px;
        }
      }

      .hourly-rate {
        margin-right: 56px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;

        @media only screen and (max-width: 1130px) {
          margin-right: 40px;
        }

        @media only screen and (max-width: 600px) {
          margin-right: 27px;
        }
      }
      .weekly-availability {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-right: 0;
      }
      .hourly-rate-text {
        font-style: normal;
        font-weight: 600;
        font-size: 19px;
        line-height: 18px;

        @media only screen and (max-width: 1130px) {
          font-size: 16px;
        }

        // color: #4d75e8;
        @media only screen and (max-width: 600px) {
          font-size: 12px;
        }
      }
      .hourly-rate-text.light {
        font-weight: 300;
      }
      .hire-me-btn {
        background: $primaryColor;
        width: 163px;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: 300;
        font-size: 16px;
        line-height: 15px;
        color: #ffffff;
        font-size: bold;
        border-radius: 15px;

        position: absolute;
        right: 0;
        top: 0;

        @media only screen and (max-width: 980px) {
          height: 80px;
          top: auto;
          right: auto;
          bottom: 18px;
          width: calc(100% - 56px);
        }
      }
    }
  }

  .tabs-bar {
    margin-top: 54px;
    background: $primaryColor;
    padding: 2.5rem 0;

    @media only screen and (max-width: 1130px) {
      padding: 2rem 0;
    }

    .tab-text {
      font-size: 26px;
      line-height: 25px;
      font-weight: 600;
      color: white;
      margin-right: 35px;
      margin-left: 35px;
      padding-bottom: 9px;
      opacity: 0.43;
      position: relative;

      @media only screen and (max-width: 1130px) {
        font-size: 20px;
      }

      @media only screen and (max-width: 600px) {
        font-size: 20px;
        margin-right: 10px;
        margin-left: 10px;
      }
    }
    .tab-text.active {
      opacity: 1;
    }
    .tab-text.active:before {
      content: "";
      position: absolute;
      left: 0;
      bottom: -2.5rem;
      height: 8px;
      width: 100%;
      border: 1px solid white;
      background: white;
      border-radius: 15px 15px 0 0;

      @media only screen and (max-width: 1130px) {
        bottom: -2rem;
      }
    }
    .tab-text:hover {
      cursor: pointer;
    }

    .arrow {
      img {
        width: 30px;
        height: 30px;
      }
    }
  }

  .tab-content-wrapper {
    margin-top: 34px;
    background-color: white;
    padding-bottom: 4rem;

    .tab-content-inside-wrapper {
      margin-left: 100px;
      margin-right: 100px;
      @media only screen and (max-width: 600px) {
        margin-left: 0px;
        margin-right: 0px;
      }
    }

    .skills-tabs {
      padding-top: 65px;
      overflow-x: auto;
      display: flex;
      justify-content: center;
      border-bottom: 1px solid rgba($color: $primaryColor, $alpha: 0.5);

      @media only screen and (max-width: 972px) {
        justify-content: space-between;
      }

      .skills-tab-text {
        font-size: 16px;
        font-weight: 600;
        line-height: 15px;
        color: $primaryColor;
        margin-right: 64px;
        padding-bottom: 25px;
        opacity: 0.5;
        text-align: center;
        white-space: nowrap;

        &.active {
          opacity: 1;
        }

        @media only screen and (max-width: 600px) {
          font-size: 12px;
          margin-right: 0;
          padding-right: 20px;
          padding-left: 20px;
        }
      }
      .skills-tab-text:hover {
        cursor: pointer;
      }
    }

    .skills-icons-bar {
      margin-top: 32px;
      padding: 0 10px;
      padding-bottom: 10px;
      display: flex;
      justify-content: space-around;
      overflow-x: auto;

      @media (max-width: 972px) {
        justify-content: space-between;
      }

      .skill {
        display: flex;
        margin-right: 20px;

        &:last-child {
          margin-right: 0;
        }

        .skill-name {
          display: flex;
          margin-right: 5px;
          color: $primaryColor;
          white-space: nowrap;
        }

        .skill-percentage {
          color: $primaryColor;
          font-weight: bold;
        }
      }
    }

    .main-tab-content {
      margin-top: 80px;
      max-height: 450px;
      // overflow-y: scroll;
      @media only screen and (max-width: 600px) {
        margin-top: 35px;
      }

      .portfolioSlides {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow-y: visible;

        .slick-list {
          height: 100%;
          width: 100%;
          overflow-y: visible !important;
        }

        .slick-slide {
          overflow-y: visible;
          position: relative;
          z-index: 50;
          margin: 0 10px;

          img {
            position: relative;
            z-index: 50;
            box-shadow: 0 10px 10px rgba($color: #000000, $alpha: 0.1);
            border-radius: 20px;
          }
        }
      }

      .slick-controls {
        margin-top: 2rem;
        display: flex;
        justify-content: center;
        align-items: center;

        .slick-dots-container {
          display: flex;
          justify-content: center;
          align-items: center;
          margin: 0 20px;
        }

        .slick-control {
          display: block;
          margin: 0 7px;
          background: rgba(16, 78, 251, 0.3);
          height: 7px;
          width: 7px;
          border-radius: 50%;
          transition: all ease 0.3s;

          &.active {
            background: #fff;
            border: 3px solid $primaryColor;
            height: 13px;
            width: 13px;
            transition: all ease 0.3s;
          }
        }
      }

      .work {
      }

      .education {
      }
    }
  }
}

/* scroll bar styles */

#style-2::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
  border-radius: 0;
}

#style-2::-webkit-scrollbar {
  width: 4px;
  background-color: rgba(255, 255, 255, 0.35);
}

#style-2::-webkit-scrollbar-thumb {
  border-radius: 1px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: white;
}

#style-1::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
  border-radius: 0;
}

#style-1::-webkit-scrollbar {
  height: 4px;
  background-color: rgba(255, 255, 255, 0.35);
}

#style-1::-webkit-scrollbar-thumb {
  border-radius: 1px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: white;
}
</style>
