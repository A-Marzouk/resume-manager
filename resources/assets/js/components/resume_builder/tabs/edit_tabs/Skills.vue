<template>
    <div>
        <div class="section-title">
            <div class="title-light">Add</div>
            <h2>Skills</h2>
        </div>
        <div class="hold-skills">
            <v-tabs
                    v-model="cTabSkill"
                    :slider-color="tabColor"
                    height="85"
                    class="tabs_middle"
                >
                    <vTabNames v-for="(nametab,i) in tabsSkills" :key="i" :index="i" :item="nametab" />
                </v-tabs>
                <v-tabs-items v-model="cTabSkill">
                    <v-tab-item value="tab-0">
                        
                        <div class="input-field">
                            <label for="skillname">Skill/ tools/ software name</label>
                            <input type="text" placeholder="" name="skillname">
                        </div>
                        <div class="input-field">
                            <label for="percentskill">How much your skill on (Percentage) over this software?</label>
                            <input type="text" placeholder="" name="percentskill">
                        </div>
                        <div class="options-wrap">
                            <a href="#" class="btn-blue"><img src="/images/resume_builder/profile/icon-check.png">Add skill now</a>
                            <a href="" class="btn-outline">Auto import</a>
                        </div>
                        
                        
                    </v-tab-item>
                    <v-tab-item value="tab-1">
                    </v-tab-item>
                    <v-tab-item value="tab-2">
                    </v-tab-item>
                    <v-tab-item value="tab-3">
                    </v-tab-item>
                </v-tabs-items>
        </div>
    </div>
</template>

<script>
    import vTabNames from './includes/vtab_onincludes';

    export default {
        name: "Skills",
        components: {
            vTabNames
        },
        data() {
            return {
                cTabSkill: 'tab-0',
                tabColor: '#001CE2',
                tabsSkills: [
                    'Programming languages',
                    'Frameworks',
                    'Software',
                    'Design skills'
                ],
            }
        }
        
    }
</script>

<style scoped>

</style>
