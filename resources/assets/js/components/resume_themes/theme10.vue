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
            <img :src="'/' + user.user_data.profile_picture" alt="profile pic" />
          </div>
          <div class="info d-flex flex-column align-items-between">
            <div class="user-name">
              {{ user.user_data.first_name }}
              <img
                class="chat-icon"
                src="/images/resume_themes/theme10/chat.svg"
                alt="chat"
              />
            </div>
            <div class="job-title">{{ user.user_data.job_title }}</div>
            <div class="social-icons">
              <a
                v-if="user.user_data.whatsapp"
                :href="
                  `https://wa.me/58${user.user_data.phone.replace(
                    '-',
                    ''
                  )}?text=Hello!%20I%20saw%20your%20profile%20on%20123workforce.com`
                "
                target="_blank"
                rel="noopener noreferrer"
              >
                <img src="/images/resume_themes/theme10/whatsapp.svg" alt="whatsapp icon" />
              </a>
              <a
                v-if="user.user_data.instagram"
                :href="`http://instagram.com/${user.user_data.instagram}`"
                target="_blank"
                rel="noopener noreferrer"
              >
                <img src="/images/resume_themes/theme10/instagram.svg" alt="instagram icon" />
              </a>
              <a
                v-if="user.user_data.linkedin"
                :href="`http://linkedin.com/in/${user.user_data.linkedin}`"
                target="_blank"
                rel="noopener noreferrer"
              >
                <img src="/images/resume_themes/theme10/linkedin.svg" alt="linkedin icon" />
              </a>
              <a
                v-if="user.user_data.behance"
                :href="`http://behance.net/${user.user_data.behance}`"
                target="_blank"
                rel="noopener noreferrer"
              >
                <img src="/images/resume_themes/theme10/behance.svg" alt="behance icon" />
              </a>
              <a
                v-if="user.user_data.github"
                :href="`http://github.com/${user.user_data.github}`"
                target="_blank"
                rel="noopener noreferrer"
              >
                <img src="/images/resume_themes/theme10/github.svg" alt="github icon" />
              </a>
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
            <div class="hourly-rate-text">${{ parseInt(user.agent.hourly_rate) }}</div>
            <div class="hourly-rate-text light">Hourly Rate</div>
          </div>
          <div class="weekly-availability">
            <div class="hourly-rate-text">{{ parseInt(user.agent.available_hours_per_week) }} hours</div>
            <div class="hourly-rate-text light">Weekly Availability</div>
          </div>
          <a href="javascript:void(0)" class="hire-me-btn">HIRE ME</a>
        </div>
      </div>

      <div class="tabs-bar">
        <div class="tabs-container">
          <div
            class="tab-text"
            @click="setActiveTab('portfolio')"
            :class="{ active: activeTab === 'portfolio' }"
          >Portfolio</div>
          <div
            class="tab-text"
            @click="setActiveTab('work')"
            :class="{ active: activeTab === 'work' }"
          >Work</div>
          <div
            class="tab-text"
            @click="setActiveTab('education')"
            :class="{ active: activeTab === 'education' }"
          >Education</div>
          <div
            class="tab-text"
            @click="setActiveTab('skills')"
            :class="{ active: activeTab === 'skills' }"
          >Skills</div>
        </div>
      </div>

      <div class="tab-content-wrapper">
        <div class="tab-content-inside-wrapper">
          <div v-if="activeTab === 'portfolio'" class="main-tab-content" id="style-2">
            <slick v-if="projects.length > 0" class="portfolioSlides slider-theme10" ref="slick" :options="slickOptions">
              <!-- <div v-for="project in projects" :key="project.id + project.projectName"> -->
              <img
                v-for="project in projects"
                :key="project.projectName"
                :src="project.mainImage"
                alt="project image"
              />
              <!-- </div> -->
            </slick>

            <div class="slick-controls">
              <a href="javascript:;" @click.prevent="prevPosition" class="slick-arrow">
                <img src="/images/resume_themes/theme10/arrow-prev.svg" alt="slick arrow" />
              </a>
              <div class="slick-dots-container">
                <!-- Change it for the user projects -->
                <a
                  v-for="(project, index) in projects"
                  :key="project.name + index"
                  href="javascript:;"
                  class="slick-control"
                  :class="{ active: index === activeProjectIndex }"
                  @click.prevent="handleSetPosition(index)"
                ></a>
              </div>
              <a href="javascript:;" @click.prevent="nextPosition" class="slick-arrow">
                <img src="/images/resume_themes/theme10/arrow-next.svg" alt="slick arrow" />
              </a>
            </div>
          </div>

          <div v-else-if="activeTab === 'skills'" class="main-tab-content" id="style-2">
            <div class="skills-tabs">
              <div
                class="skills-tab-text"
                :class="{ active: activeSkillTab === 'programming-languages' }"
                @click="setActiveSkillTab('programming-languages')"
              >Programming Languages</div>
              <div
                class="skills-tab-text"
                :class="{ active: activeSkillTab === 'frameworks-databases' }"
                @click="setActiveSkillTab('frameworks-databases')"
              >Frameworks/Databases</div>
              <div
                class="skills-tab-text"
                :class="{ active: activeSkillTab === 'design-skills' }"
                @click="setActiveSkillTab('design-skills')"
              >Design Skills</div>
              <div
                class="skills-tab-text mr-0"
                :class="{ active: activeSkillTab === 'software' }"
                @click="setActiveSkillTab('software')"
              >Software</div>
            </div>
            <div class="skills-icons-bar-container">
              <div
                v-if="activeSkillTab === 'programming-languages'"
                class="skills-icons-bar"
                id="style-1"
              >
                <div
                  v-for="skill in skills.programming"
                  :key="skill.skill_title + skill.id"
                  class="skill"
                >
                  <span class="skill-name">{{ skill.skill_title }} -</span>
                  <span class="skill-percentage">{{ skill.percentage }}%</span>
                </div>
              </div>
              <div
                v-else-if="activeSkillTab === 'frameworks-databases'"
                class="skills-icons-bar"
                id="style-1"
              >
                <div
                  v-for="skill in skills.frameworks"
                  :key="skill.skill_title + skill.id"
                  class="skill"
                >
                  <span class="skill-name">{{ skill.skill_title }} -</span>
                  <span class="skill-percentage">{{ skill.percentage }}%</span>
                </div>
              </div>
              <div
                v-else-if="activeSkillTab === 'design-skills'"
                class="skills-icons-bar"
                id="style-1"
              >
                <div
                  v-for="skill in skills.design"
                  :key="skill.skill_title + skill.id"
                  class="skill"
                >
                  <span class="skill-name">{{ skill.skill_title }} -</span>
                  <span class="skill-percentage">{{ skill.percentage }}%</span>
                </div>
              </div>
              <div v-else class="skills-icons-bar" id="style-1">
                <div
                  v-for="skill in skills.software"
                  :key="skill.skill_title + skill.id"
                  class="skill"
                >
                  <span class="skill-name">{{ skill.skill_title }} -</span>
                  <span class="skill-percentage">{{ skill.percentage }}%</span>
                </div>
              </div>
            </div>
          </div>

          <div v-else-if="activeTab === 'work'" class="main-tab-content" id="style-2">
            <works-container :works="user.works_history"></works-container>
          </div>
          <div v-else class="main-tab-content" id="style-2">
            <educations-container :educations="user.educations_history"></educations-container>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Slick from "vue-slick";
import worksContainer from "./theme10/works-container.vue";
import educationsContainer from "./theme10/educations-container.vue";

export default {
  props: ["user"],
  components: {
    worksContainer,
    educationsContainer,
    Slick
  },
  data() {
    return {
      activeTab: "portfolio",
      activeSkillTab: "programming-languages",
      adaptativeHeight: true,
      activeProjectIndex: 0,
      projects: [],
      skills: {
        programming: [],
        frameworks: [],
        design: [],
        software: []
      },
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
              slidesToScroll: 1
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
      let index = this.activeProjectIndex;
      if (index < this.projects.length) {
        this.$refs.slick.goTo(index + 1);
        this.activeProjectIndex = index + 1;
      }
    },

    prevPosition() {
      let index = this.activeProjectIndex;
      if (index > 0) {
        this.$refs.slick.goTo(index - 1);
        this.activeProjectIndex = index - 1;
      }
    }
  },
  mounted() {
    this.skills.programming = this.user.skills.filter(
      skill => skill.type === "programming"
    );
    this.skills.frameworks = this.user.skills.filter(
      skill => skill.type === "frameworks"
    );
    this.skills.design = this.user.skills.filter(
      skill => skill.type === "design"
    );
    this.skills.software = this.user.skills.filter(
      skill => skill.type === "software"
    );

    this.projects = [...this.user.projects];
    console.log(this.projects);
  }
};
</script>

<style lang="scss">
$primaryColor: #104efb;

@import url("https://fonts.googleapis.com/css?family=Raleway:300,400,700&display=swap");

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
  overflow-x: hidden;
  font-family: "Raleway", sans-serif !important;

  @media only screen and (max-width: 768px) {
    margin: 0;
  }

  * {
    font-family: "Raleway", sans-serif !important;
  }

  .mainThemeBar {
    padding-top: 40px;
    padding-left: 5%;
    padding-right: 5%;
    flex-wrap: wrap;

    .left {
      display: flex;

      @media only screen and (max-width: 780px) {
        width: 100%;
        justify-content: space-between;
      }

      .icons {
        @media only screen and (max-width: 600px) {
          margin-right: 0;
          img {
            width: 20px;
            height: 20px;
          }
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
        // border-radius: 50%;

        img {
          border: 10px solid $primaryColor;
          width: 160px;
          height: 160px;
          border-radius: 50%;
        }

        @media only screen and (max-width: 600px) {
          margin-right: 15px;
          img {
            width: 125px;
            height: 125px;
          }
        }
      }
      .info {
        margin-top: 15px;
        max-width: 247px;

        @media only screen and (max-width: 780px) {
          margin-top: 0;
          width: 100%;
        }

        @media only screen and (max-width: 400px) {
          width: auto;
          max-height: 125px;
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
          max-width: 100%;
          display: flex;
          justify-content: space-between;

          @media only screen and (max-width: 780px) {
            width: 100%;
            max-width: 280px;
          }

          @media only screen and (max-width: 600px) {
            max-width: 100%;
          }

          @media only screen and (max-width: 478px) {
            overflow-x: auto;
            margin-top: 18px;
          }

          img {
            width: 30px;
            height: 30px;

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
      padding: 18px 280px 18px 50px;
      position: relative;
      justify-content: center;
      align-items: center;

      @media only screen and (max-width: 1400px) {
        padding: 18px 180px 18px 50px;
      }

      @media only screen and (max-width: 1160px) {
        padding: 18px 180px 18px 30px;
      }

      @media only screen and (max-width: 1050px) {
        padding: 18px;
        padding-bottom: 110px;
        border-right: 1px solid $primaryColor;
      }

      @media only screen and (max-width: 780px) {
        margin-top: 85px;
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

        @media only screen and (max-width: 1050px) {
          top: -32px;
        }

        @media only screen and (max-width: 780px) {
          right: auto;
          top: -50px;
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
        margin-top: 5px;
        font-weight: 300;
      }
      .hire-me-btn {
        background: $primaryColor;
        width: 231px;
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

        &:hover {
          text-decoration: none;
        }

        @media only screen and (max-width: 1400px) {
          width: 163px;
        }

        @media only screen and (max-width: 1050px) {
          height: 80px;
          top: auto;
          right: auto;
          bottom: 18px;
          width: calc(100% - 56px);
        }

        @media only screen and (max-width: 768px) {
          height: 75px;
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
    display: flex;    

    @media only screen and (max-width: 1130px) {
      padding: 2rem 0;
    }

    @media only screen and (max-width: 768px) {
      margin-top: 19px;
    }

    .tabs-container {
      display: inline-flex;
      margin: 0 auto;
      justify-content: space-between;
      width: 100%;
      max-width: 600px;
      overflow-x: auto;
    }

    .tab-text {
      font-size: 26px;
      line-height: 25px;
      font-weight: 600;
      color: white;
      margin-right: 35px;
      margin-left: 35px;
      padding: 0 1rem;
      padding-bottom: 1rem;
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
      z-index: 4;
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

      @media only screen and (max-width: 1150px) {
        margin-left: 50px;
        margin-right: 50px;
      }

      @media only screen and (max-width: 976px) {
        margin-left: 20px;
        margin-right: 20px;
      }

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

    .skills-icons-bar-container {
      overflow-x: auto;
      width: 100%;
      padding: 10px;
      margin-top: 32px;
      justify-content: center;
    }

    .skills-icons-bar {
      display: flex;
      margin: 0 auto;

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
      // max-height: 450px;
      // overflow-y: scroll;
      @media only screen and (max-width: 600px) {
        margin-top: 35px;
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

      .works-container.container {
        @media (max-width: 800px) {
          padding: 0;
        }

        .container {
          @media (max-width: 800px) {
            padding: 0;
          }
        }
      }

      .educations-container.container {
        @media (max-width: 800px) {
          padding: 0;
        }

        .container {
          @media (max-width: 800px) {
            padding: 0;
          }
        }
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
