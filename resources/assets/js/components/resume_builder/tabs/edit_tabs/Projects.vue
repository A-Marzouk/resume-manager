<template>
    <section class="section-view">
        <div class="section-title">
            <div class="title-light">Add</div>
            <h2>Portfolio</h2>
        </div>

        <div class="content d-flex">
            <!-- Include router view here -->
            <keep-alive class="mt-5 content">
                <router-view :setStep="setStep"></router-view>
            </keep-alive>
            
            <div v-if="formStep !== null" class="step-indicator">
                <a href="javascript:void;" @click="prevStep"><svg-vue class="step-arrow-icon" icon="left-arrow-icon"></svg-vue></a>
                <span @click="setStep(step)" class="step-dot" :class="{active: step === formStep}" v-for="step in 3" :key="step + 'step'"></span>
                <a href="javascript:void;" @click="nextStep"><svg-vue class="step-arrow-icon" icon="right-arrow-icon"></svg-vue></a>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    data: () => ({
        formStep: null
    }),
    methods: {
       nextStep () {
            this.formStep < 3 && ++this.formStep
            this.$router.push({ path: `/resume-builder/edit/projects/step-${this.formStep}` })
        },
        prevStep () {
            this.formStep > 1 && --this.formStep
            this.$router.push({ path: `/resume-builder/edit/projects/step-${this.formStep}` })
        },
        setStep (step) {
            this.formStep = step
            this.$router.push({ path: `/resume-builder/edit/projects/${step !== null ? 'step-' + step : ''}` })
        },
        showForms () {
            this.formStep = 1
            this.$router.push({ path: `/resume-builder/edit/projects/step-1` })
        }
    }
}
</script>

<style lang="scss" scoped>
.step-indicator {
    position: absolute;
    left: 600px;
    bottom: 10px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 300px;

    .step-arrow-icon {
        height: 22px;

        &:hover {
            cursor: pointer;
        }
    }

    .step-dot {
        border-radius: 50%;
        width: 22px;
        height: 22px;
        display: block;
        background: #C9CFF8;
        transition: all .5s ease;

        &.active {
            background: #001CE2;
            transition: all .5s ease;
        }

        &:hover {
            cursor: pointer;
        }
    }
}
    
</style>
