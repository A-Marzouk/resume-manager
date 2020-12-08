<template>
    <v-app>
        <div class="main-conainter-home">
            <div class="conainter-home">
                <div class="header">
                    <div class="logo-section">
                        <img
                                class="new-logo"
                                src="/images/new_homepage/logo.png"
                        />
                    </div>
                </div>
                <div class="freelacer-text">
                    <div class="rate-text">
                        Trusted Freelance Designers
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
                        <v-autocomplete
                                class="searchBar-input"
                                v-model="searchValue"
                                multiple
                                :items="predictions"
                                placeholder="Type here..."
                                @change="searchValueChanged"
                                outlined
                                dense
                        >
                            <button
                                    slot="append"
                            >
                                <img
                                        src="/images/new_homepage/pen-tool.svg"
                                        alt="pen tool"
                                />
                            </button>
                            <button
                                    slot="prepend-inner"
                            >
                                <img
                                        src="/images/new_homepage/magnifiy.svg"
                                        alt="pen tool"
                                />
                            </button>
                        </v-autocomplete>


                        <div class="search-tags">
                            <div class="search-tag" v-for="(tag, i) in searchTags" :key="i" @click="tagClicked(tag)">
                                {{ tag }}
                            </div>
                        </div>
                    </div>

                </div>
                <div class="theme-section">
                    <div class="loader" v-if="isSearching"></div>
                    <div
                            class="theme"
                            v-for="(profile, i) in filteredProfiles"
                            :key="i"
                            v-if="!isSearching"
                            @mouseover="showDetailsIndex = i"
                            @mouseleave="showDetailsIndex = null"
                    >
                        <a :href="profile.url">
                            <img :src="profile.preview" alt="theme thumbnail"/>
                        </a>
                        <div class="view-details" v-if="showDetailsIndex === i">
                            <div class="personal-info">
                                <div class="info-details">
                                    <div class="full-name">{{ profile.name }}</div>
                                    <div class="designation">{{ profile.job_title }}</div>
                                    <div class="address">{{ profile.location }}</div>
                                </div>
                                <div class="hire">
                                    <a class="hire-button" :href="profile.url">Hire</a>
                                </div>
                            </div>
                            <div class="work-available">
                                <div class="work-available-title">Available For Work</div>
                                <div class="" style="display:none;">
                                    <div>{{ profile.hours }} hours a week</div>
                                    <div>${{ profile.weekly_rate }}/week</div>
                                </div>
                                <div class="divide"></div>
                                <div class="hourly-rate">
                                    $25 hourly rate
                                </div>
                            </div>
                            <div class="view-portfolio">
                                <a
                                        target="_blank"
                                        :href="profile.url"
                                        class="view-portfolio-button"
                                >View Portfolio</a
                                >
                            </div>
                        </div>
                    </div>
                    <div class="search-not-found"
                         v-if="filteredProfiles.length < 1 && searchValue.length > 0 && !isSearching">
                        Sorry we couldn't find any results matching <b>"{{searchValue.join()}}"</b>
                        <div class="search-tips">
                            <h3>Search tips</h3>
                            <ul>
                                <li>Check your spelling and try again.</li>
                                <li>Try a similar but different search term, like Illustrator instead of Illustration.
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <div class="separator"></div>
            <div class="footer">
                <div class="footer-logo">
                    <img
                            class="new-logo"
                            src="/images/new_homepage/logo.png"
                    />
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
                                :href="icon.link"
                                class="social-logo"
                                v-for="(icon, i) in socialIcons"
                                :key="i"
                        >
                            <img :src="icon.src" alt="social icons"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </v-app>
</template>

<script>
    import {predictions} from './helpers/searchPredictions'

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
                profiles: [
                    {
                        name: "Shakib Ali",
                        designation: "UI UX Designer",
                        hours: "8",
                        weekly_rate: "40",
                        hourly_rate: "25",
                        address: "Dhaka, Bangladesh",
                        link: "https:/civ.ie/123workforce/ShakibAli",
                        skills: "User Interface Design ,Design, Web Design, Photoshop, Illustrator,Illustration, UI/UX, GraphicDesignSkills, Aesthetics, .net, sketch, Photoshop",
                        src: "/images/new_homepage/portfolio/sakib_ali.jpg",
                    },
                    {
                        name: "Abu Usuf",
                        designation: "UI / Visual Designer, Web Designer",
                        hours: "8",
                        weekly_rate: "40",
                        hourly_rate: "25",
                        address: "Dhaka, Bangladesh",
                        link: "https:/civ.ie/123workforce/AbuUsuf",
                        skills: "Photoshop, design, illustrator,Illustration, user interface design, ui/ux, Aesthetics, Prototyping ",
                        src: "/images/new_homepage/portfolio/abu_usuf.jpg",
                    },
                    {
                        name: "Mahmudul Hasan Manik",
                        designation: "UX/UI, Product Designer",
                        hours: "8",
                        weekly_rate: "40",
                        hourly_rate: "25",
                        address: " Bangladesh",
                        link: "https:/civ.ie/123workforce/mahmudulhasan",
                        skills: "Photoshop, design, illustrator,Illustration, user interface design, ui/ux, Aesthetics, Prototyping ",
                        src:
                            "/images/new_homepage/portfolio/mehdi_manik.jpg",
                    },
                    {
                        name: "Aymane Helfa",
                        designation: "UI/UX DESIGNER & Brand identity designer",
                        hours: "8",
                        weekly_rate: "40",
                        hourly_rate: "25",
                        address: "Morocco",
                        skills: "Adaptability, Typography, Illustrator, Prototyping, Web Design, Motion",
                        link: "https:/civ.ie/123workforce/Aymane",
                        src:
                            "/images/new_homepage/portfolio/helfa_aymane.jpg",
                    },
                    {
                        name: "Md. Tajul Islam Sajib",
                        designation: "UX/UI & Creative Graphic Designer",
                        hours: "8",
                        weekly_rate: "40",
                        hourly_rate: "25",
                        address: "Bangladesh",
                        skills: "User Interface Design ,Design, Web Design, InDesign, Perceptivity, Photoshop, Illustrator, UI/UX, GraphicDesignSkills, Aesthetics, .net, sketch, Photoshop",
                        link: "https:/civ.ie/123workforce/Rony",
                        src: "/images/new_homepage/portfolio/rony.jpg",
                    },
                    {
                        name: "Shai Falcutila",
                        designation: "Graphic Designer",
                        hours: "8",
                        weekly_rate: "40",
                        hourly_rate: "25",
                        address: "Philippines",
                        skills: "",
                        link: "https:/civ.ie/123workforce/Shai",
                        src: "/images/new_homepage/portfolio/shai.jpg",
                    },
                    {
                        name: "Yoka Leis",
                        designation: "Web Designer, Graphic Designer",
                        hours: "8",
                        weekly_rate: "40",
                        hourly_rate: "25",
                        address: "Venezuela",
                        skills: "",
                        link: "https:/civ.ie/123workforce/Yoka",
                        src: "/images/new_homepage/portfolio/yoka.jpg",
                    },
                    {
                        name: "Anton Vasyliev",
                        designation: "Web Designer",
                        hours: "8",
                        weekly_rate: "40",
                        hourly_rate: "25",
                        address: "Kharkiv,Ukraine",
                        skills: "",
                        link: "https:/civ.ie/123workforce/Anton",
                        src: "/images/new_homepage/portfolio/anton.jpg",
                    },
                    {
                        name: "Ishrat Jahan Shaeera",
                        designation: "Illustrator, Graphic Designer",
                        hours: "8",
                        weekly_rate: "40",
                        hourly_rate: "25",
                        address: "Bangladesh",
                        skills: "",
                        link: "https:/civ.ie/123workforce/Ishrat",
                        src: "/images/new_homepage/portfolio/ishrat.jpg",
                    },
                    {
                        name: "Darina Kulyk",
                        designation: "Product Designer",
                        hours: "8",
                        weekly_rate: "40",
                        hourly_rate: "25",
                        skills: "",
                        address: "Ukraine",
                        link: "https:/civ.ie/123workforce/darina",
                        src: "/images/new_homepage/portfolio/darina.jpg",
                    },
                    {
                        name: "Maral Golrokh",
                        designation: "UI UX Designer",
                        hours: "8",
                        weekly_rate: "40",
                        hourly_rate: "25",
                        address: "Iran",
                        skills: "",
                        link: "https:/civ.ie/123workforce/maral",
                        src: "/images/new_homepage/portfolio/maral.jpg",
                    },
                    {
                        name: "Sharfuzzaman Sayem",
                        designation: "UI/UX Designer",
                        hours: "8",
                        weekly_rate: "40",
                        hourly_rate: "25",
                        address: "Bangladesh",
                        skills: "",
                        link: "https:/civ.ie/123workforce/sayem",
                        src: "/images/new_homepage/portfolio/sayem.jpg",
                    },
                    {
                        name: "Imran Molla",
                        designation: "UI UX Designer",
                        hours: "8",
                        weekly_rate: "40",
                        hourly_rate: "25",
                        skills: "",
                        address: "Bangladesh",
                        link: "https:/civ.ie/123workforce/Imran",
                        src: "/images/new_homepage/portfolio/imran.jpg",
                    },
                    {
                        name: "Humayra Kabir",
                        designation: "UI UX Designer",
                        hours: "8",
                        weekly_rate: "40",
                        hourly_rate: "25",
                        address: "Bangladesh",
                        skills: "",
                        link: "https:/civ.ie/123workforce/Humayra",
                        src: "/images/new_homepage/portfolio/humayra.jpg",
                    },
                    {
                        name: "Viktoriya Kliuchnyck",
                        designation: "Product Designer",
                        hours: "8",
                        weekly_rate: "40",
                        hourly_rate: "25",
                        address: "Russia",
                        skills: "",
                        link: "https:/civ.ie/123workforce/Viktoriia",
                        src: "/images/new_homepage/portfolio/viktoriya.jpg",
                    },
                    {
                        name: "Ronak Chhatwal",
                        designation: "UI/UX Designer",
                        hours: "8",
                        weekly_rate: "40",
                        hourly_rate: "25",
                        address: "India",
                        skills: "",
                        link: "https:/civ.ie/123workforce/Ronak",
                        src: "/images/new_homepage/portfolio/ronak.jpg",
                    },
                    {
                        name: "Hachibur Rahman",
                        designation: "Graphic Designer",
                        hours: "8",
                        weekly_rate: "40",
                        hourly_rate: "25",
                        skills: "",
                        address: "Bangladesh",
                        link: "https:/civ.ie/123workforce/huchibur",
                        src: "/images/new_homepage/portfolio/hachibur.jpg",
                    },
                ],
                socialIcons: [
                    {
                        src: "/images/new_homepage/whatsapp.svg",
                        link: "https:/wa.me/353868447832",
                    },
                    {
                        src: "/images/new_homepage/skype.svg",
                        link: "skype:magictime.uk?chat",
                    },
                    {
                        src: "/images/new_homepage/gmail.svg",
                        link: "mailto:accounts@123workforce.com",
                    },
                    {
                        src: "/images/new_homepage/telegram.svg",
                        link: "https:/t.me/conormarjoram",
                    },
                ],
                typeArray: [
                    "On Demand Freelance Talent",
                    "Affordable UI Designer",
                    " Reliable UX Designer",
                    " Talented Graphic Designer",
                    " Creative Illustrator",
                    " Visionary Motion Designer",
                    "Trusted Animator",
                    " Verified Product Designer",
                    " Approved UX Architect",
                ],
                searchValue: [],
                isSearching: false,
                civAccessToken: '',
                workForceProfiles: [],
                predictions: predictions
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
            tagClicked(label) {
                if(! this.searchValue.includes(label)){
                    this.searchValue.push(label);
                }
            },
            searchValueChanged() {
                this.isSearching = true;
                setTimeout(() => {
                    this.isSearching = false;
                }, 500);
            },
            getCIVProfiles() {
                axios.get('/get-civ-profiles').then(
                    (response) => {
                        this.workForceProfiles = response.data.data;
                        this.workForceProfiles.forEach((profile) => {
                            profile.skillTitles = profile.skills.map(function (skill) {
                                return skill.title.toLowerCase();
                            });

                            profile.percentageSum = 0;
                            profile.skills.forEach((skill) => {
                                profile.percentageSum += parseInt(skill.percentage);
                            });
                        });
                    }
                );
            },
            compare(a, b) {
                if (a.percentageSum > b.percentageSum) {
                    return -1;
                }
                return 1;
            },
            isJobTitleFound(job_title) {
                let searchText = this.searchValue.join().toLowerCase();
                if (searchText.includes(job_title) || job_title.includes(searchText)) {
                    return true;
                }
            }
        },
        computed: {
            filteredProfiles() {
                if (this.searchValue.length < 1) {
                    return this.workForceProfiles;
                }

                let filtered = this.workForceProfiles.filter((profile) => {
                    return (
                        this.searchValue.filter(Boolean).every(searchTerm => profile.skillTitles
                            .includes(
                                searchTerm.toLowerCase()
                                    .replace(' designer', '')
                                    .replace(' fullstack developer', '')
                                    .replace(' developer', '')
                                    .replace('front-end','javascript')
                                    .replace('back-end','php')
                            )
                        )
                    );
                });

                return filtered.sort(this.compare);
            },
            searchTags() {
                if (this.searchValue.join().toLowerCase().includes('designer')) {
                    return ["UI/UX", "Illustrator", "Graphic Design", "Motion Design", "Product Design"]
                }

                if (this.searchValue.join().toLowerCase().includes('ux')) {
                    return ["XD", "Lightroom", "Figma", "Photoshop", "Illustrator"]
                }


                return ["UI/UX", "Motion Design", "Graphic Design", "Illustrator", "Interaction"]

            }
        },
        watch: {
            searchValue(val) {
                this.searchValueChanged();
            }
        },
        created() {
            setTimeout(this.typeText, this.newTextDelay + 200);
            this.getCIVProfiles();
        },
    };
</script>

<style lang="scss">

    .searchBar-input {
        .v-input__control {
            .v-input__slot {
                background: white;

                .v-select__slot {
                    height: 80px !important;

                    input {
                        font-size: 20px;
                        padding-left: 18px;
                    }
                }

                .v-input__prepend-inner {
                    padding-left: 12px;
                    padding-top: 1.5rem;
                }

                .v-input__append-inner {
                    padding-right: 4px;
                    padding-top: 3px;
                    margin-right: 1rem;
                    margin-top: 1.7rem !important;
                    background: white;
                    display: -webkit-box;
                    display: -ms-flexbox;
                    display: flex;
                    -webkit-box-align: center;
                    -ms-flex-align: center;
                    box-shadow: 0px 5px 10px rgba(0, 16, 131, 0.15);
                    align-items: center;
                    -webkit-box-pack: center;
                    -ms-flex-pack: center;
                    justify-content: center;
                    border-radius: 50%;
                    height: 45px;
                    width: 45px;
                }
            }
        }
    }

    .v-list--dense .v-list-item .v-list-item__subtitle, .v-list--dense .v-list-item .v-list-item__title, .v-list-item--dense .v-list-item__subtitle, .v-list-item--dense .v-list-item__title {
        font-size: 18px;
        font-weight: 500;
        line-height: 20px;
    }

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
                width: 80vw;
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
                    overflow-x: auto;

                    .search-tag {
                        padding: 1rem 4rem;

                        background: #e6e8fc;
                        border-radius: 5rem;
                        font-family: Noto Sans;
                        font-style: normal;
                        font-weight: 500;
                        font-size: 2rem;
                        line-height: 4rem;
                        color: #687494;

                        &:hover {
                            cursor: pointer;
                        }
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
            align-items: flex-start;
            justify-content: center;
            flex-wrap: wrap;
            max-height: 1600px;
            min-height: 400px;
            height: fit-content;
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

        .search-not-found {
            width: 100%;
            color: gray;
            font-size: 2rem;
            margin-left: 25px;
            margin-top: 25px;

            .search-tips {
                margin-top: 50px;

                ul {
                    margin-left: 50px;
                }

                h3 {
                    margin-left: 25px;
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

        @media screen and (max-width: 1165px) {
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
                    width:95vw;
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
                            padding: 1rem 4rem;
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

    /* Loader */

    .loader {
        font-size: 10px;
        margin: 50px auto;
        text-indent: -9999em;
        width: 11em;
        height: 11em;
        border-radius: 50%;
        background: #1a3be0;
        background: -moz-linear-gradient(left, #1a3be0 10%, rgba(26, 59, 224, 0) 42%);
        background: -webkit-linear-gradient(left, #1a3be0 10%, rgba(26, 59, 224, 0) 42%);
        background: -o-linear-gradient(left, #1a3be0 10%, rgba(26, 59, 224, 0) 42%);
        background: -ms-linear-gradient(left, #1a3be0 10%, rgba(26, 59, 224, 0) 42%);
        background: linear-gradient(to right, #1a3be0 10%, rgba(26, 59, 224, 0) 42%);
        position: relative;
        -webkit-animation: load3 1.4s infinite linear;
        animation: load3 1.4s infinite linear;
        -webkit-transform: translateZ(0);
        -ms-transform: translateZ(0);
        transform: translateZ(0);
    }

    .loader:before {
        width: 50%;
        height: 50%;
        background: #1a3be0;
        border-radius: 100% 0 0 0;
        position: absolute;
        top: 0;
        left: 0;
        content: '';
    }

    .loader:after {
        background: #f7f9ff;
        width: 75%;
        height: 75%;
        border-radius: 50%;
        content: '';
        margin: auto;
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
    }

    @-webkit-keyframes load3 {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @keyframes load3 {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }


</style>
