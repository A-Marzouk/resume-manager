<template>
   <div>
       <div class="d-flex mt-5">
           <div class="aside-bar d-flex flex-column mr-5">
               <div v-for="(section, ind) in asideSections" :key="section" class="aside-link d-flex" :class="{'active': !ind}">

                <img class="aside-icon" :src="`/images/resume_builder/${section}-icon.svg`" :alt="`${section} icon`">
                <router-link :to="`/resume-builder/edit/${section.replace('/', '-')}`">
                    {{formatSectionString(section)}}
                </router-link>
               </div>
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
                let strArray = str.split('-');

                let formatedString = "";

                strArray.forEach((strItem, idx) => {
                    formatedString += strItem.charAt(0).toUpperCase() + strItem.slice(1)
                    if (idx < strArray.length - 1) formatedString += " "
                });

                return formatedString;
            }
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
}
.aside-link {
    font-size: 22px;
    margin-bottom: 21px;
    padding: 5px 0;
    padding-right: 32px;

    a {
        color: $disabledColor;

        &:active,
        &:hover {
            text-decoration: none;
            cursor: pointer;
        }
    }

    &.active {
        position: relative;
        
        a {
            color: $activeColor;
        }

        &::after {
            content: "";
            position: absolute;
            z-index: 5;
            height: 100%;
            width: 6px;
            right: 0;
            top: 0;
            background-color: $activeColor;
        }
    }
}
.aside-icon {
    margin-right: 22px;
    width: 40px;
}
</style>
