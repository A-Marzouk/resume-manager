<template>
    <section class="section-view">
        <div class="section-title">
            <div class="title-light">Add</div>
            <h2>Portfolio</h2>
        </div>

        <div class="content d-flex">
            <form-view1 v-if="formStep === 1"></form-view1>
            <form-view2 v-else-if="formStep === 2"></form-view2>
            <form-view3 v-else></form-view3>
            <div class="step-indicator">
                <a href="javascript:void;" @click="prevStep"><svg-vue class="step-arrow-icon" icon="left-arrow-icon"></svg-vue></a>
                <span @click="setStep(step)" class="step-dot" :class="{active: step === formStep}" v-for="step in 3" :key="step + 'step'"></span>
                <a href="javascript:void;" @click="nextStep"><svg-vue class="step-arrow-icon" icon="right-arrow-icon"></svg-vue></a>
            </div>
        </div>
    </section>
</template>

<script>
import FormView1 from './add_projects_views/view_num1'
import FormView2 from './add_projects_views/view_num2'
import FormView3 from './add_projects_views/view_num3'

export default {
    name: "Projects",
    components: {
        FormView1,
        FormView2,
        FormView3
    },
    data: () => ({
        formStep: 1
    }),
    methods: {
        nextStep () {
            this.formStep < 3 && ++this.formStep
        },
        prevStep () {
            this.formStep > 1 && --this.formStep
        },
        setStep (step) {
            this.formStep = step
        }
    }
}
</script>

<style scoped lang="scss">
.content {
    position: relative;
}

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
