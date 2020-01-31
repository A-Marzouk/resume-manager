<template>
   <div>
       <div class="d-flex mt-5">
           <div @click="() => false" class="aside-bar d-flex flex-column mr-5">
               <div @click="setActive" v-for="(section, ind) in asideSections" :key="section" class="aside-link d-flex" :class="{'active': !ind}">

                <img class="aside-icon" :src="`/images/resume_builder/${section}-icon.svg`" :alt="`${section} icon`">
                <router-link :to="`/resume-builder/edit/${section.replace('/', '-')}`">
                    {{formatSectionString(section)}}
                </router-link>
               </div>
               <div id="scrollItem"></div>
           </div>
           <keep-alive class="mt-5">
               <router-view></router-view>
           </keep-alive>
       </div>
   </div>
</template>

<script>
    export default {
        name: "EditCV",
        data: () => ({
            asideSections: [
                'profile',
                'summary',
                'work-experience',
                'education',
                'skills',
                'projects',
                'achievement',
                'hobbies',
                'audio/video',
                'pay-availability',
                'imports',
                'references'
            ]
        }),
        methods: {
            formatSectionString: (str) => {
                /**
                 * Convert the url in a friendly text
                 * @param String str
                 * @returns String formated
                 */

                let strArray = str.split('-');

                let formatedString = "";

                strArray.forEach((strItem, idx) => {
                    formatedString += strItem.charAt(0).toUpperCase() + strItem.slice(1)
                    if (idx < strArray.length - 1) formatedString += " "
                });

                return formatedString;
            },
            setActive (e) {
                let activeNow = document.querySelector('.aside-link.active')
                activeNow && activeNow.classList.toggle('active')
                e.target.parentNode.classList.toggle('active')

                this.scrollHandler(e.target.parentNode)
            },
            scrollHandler (target) {
                let scrollItem = document.getElementById('scrollItem');
                let scrollItemHeight = scrollItem.style.height !== "" ? parseFloat(scrollItem.style.height.replace('px', '')) : 0;
                let scrollItemPos = scrollItem.style.top !== "" ? parseFloat(scrollItem.style.top.replace('px', '')) : 0;

                // diff between actual size and the target size
                let heightDiff = target.offsetHeight - scrollItemHeight;

                // diff between actual pos and target pos
                let posDiff = target.offsetTop - scrollItemPos;

                console.log(target)

                // To position and height gradually during 0.5 secs
                let moveInterval = posDiff / 15;
                let growInterval = heightDiff / 15;

                let count = 1

                let interval = setInterval(() => {

                    scrollItemPos += moveInterval
                    scrollItemHeight += growInterval

                    scrollItem.style.top = scrollItemPos + "px";
                    scrollItem.style.height = scrollItemHeight + "px";
                    console.log(count++)
                }, 20);

                setTimeout(() => {
                    if (scrollItem.style.top !== target.offsetTop) {
                        scrollItem.style.top = target.offsetTop + "px"
                    }
                    clearInterval(interval)
                }, 301);

            }
        },
        mounted () {
            let _this = this
            setTimeout(() => {
                _this.scrollHandler(document.querySelector('.aside-link.active'))
            }, 100)
        }
    }
</script>

<style lang="scss">
$activeColor: #001CE2;
$disabledColor: #B2BBFF;

.aside-bar {
    max-width: 260px;
    position: relative;

    &::after {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        height: 100%;
        width: 6px;
        background-color: #E2E5FC;
    }

    #scrollItem {
        position: absolute;
        top: 0;
        right: 0;
        width: 6px;
        height: 20px;
        z-index: 5;
        background-color: $activeColor;
    }
}
.aside-link {
    font-size: 22px;
    padding-right: 32px;

    &.active a {
        color: $activeColor;
        transition: all 1s ease;
    }

    a {
        padding: 13px 0;
        color: $disabledColor;
        transition: all 1s ease;
        display: block;
        width: 100%;
        height: 100%;

        &:active,
        &:hover {
            text-decoration: none;
            cursor: pointer;
        }
    }
}
.aside-icon {
    margin-right: 22px;
    width: 40px;
}
</style>
