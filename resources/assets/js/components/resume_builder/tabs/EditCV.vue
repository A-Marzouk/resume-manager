<template>
   <div>
       <h2>
           Edit cv
       </h2>

       <div class="d-flex mt-5">
           <div class="d-flex flex-column mr-5">
               <router-link to="/resume-builder/edit/profile">
                   Profile
               </router-link>
               <router-link to="/resume-builder/edit/summary">
                   Summary
               </router-link>
               <router-link to="/resume-builder/edit/work-experience">
                   WorkExperience
               </router-link>
               <router-link to="/resume-builder/edit/education">
                   Education
               </router-link>
               <router-link to="/resume-builder/edit/skills">
                   Skills
               </router-link>
               <router-link to="/resume-builder/edit/projects">
                   Projects
               </router-link>
               <router-link to="/resume-builder/edit/achievement">
                   Achievement
               </router-link>
               <router-link to="/resume-builder/edit/hobbies">
                   Hobbies
               </router-link>
               <router-link to="/resume-builder/edit/audio-video">
                   Audio/Video
               </router-link>
               <router-link to="/resume-builder/edit/pay-availability">
                   PayAvailability
               </router-link>
               <router-link to="/resume-builder/edit/imports">
                   Imports
               </router-link>
               <router-link to="/resume-builder/edit/references">
                   References
               </router-link>
           </div>
           <keep-alive class="mt-5">
               <router-view></router-view>
           </keep-alive>
       </div>
     

   

   </div>
</template>

<script>
    export default {
        name: "EditCV"
    }
</script>

<style scoped>

</style>
