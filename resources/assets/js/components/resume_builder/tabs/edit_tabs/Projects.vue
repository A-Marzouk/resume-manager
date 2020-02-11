<template>
    <section class="section-view">
        <div class="section-title">
            <div class="title-light">Add</div>
            <h2>Portfolio</h2>
        </div>

        <div class="content d-flex">
            <!-- Include router view here -->
            <div class="wrapper">
                <div class="text-hint">Only use images that are greater than 500 pixels in both height and 300 pixels in width.</div>

                <div class="btns-wrapper d-flex align-items-center">
                    <button class="btn outline">
                        <svg-vue class="icon add-project-icon" icon="add-icon"></svg-vue> <b>Add a new project</b>
                    </button>
                    <button class="btn outline">
                        <svg-vue class="icon add-project-icon" icon="add-icon"></svg-vue> <b>Auto import</b>
                    </button>
                </div>
                <div class="projects-container d-flex">
                    <div class="project" v-for="project in projects" :key="project.name">
                        <img :src="project.mainImage" alt="">
                        <a class="d-flex justify-content-center align-items-center remove-icon" href="javascript:;" @click="removeProject">
                            <svg-vue icon="remove-icon"></svg-vue>
                        </a>
                    </div>
                </div>
            </div>

            <!-- <form-view1 v-if="formStep === 1"></form-view1>
            <form-view2 v-else-if="formStep === 2"></form-view2>
            <form-view3 v-else></form-view3>
            <div class="step-indicator">
                <a href="javascript:void;" @click="prevStep"><svg-vue class="step-arrow-icon" icon="left-arrow-icon"></svg-vue></a>
                <span @click="setStep(step)" class="step-dot" :class="{active: step === formStep}" v-for="step in 3" :key="step + 'step'"></span>
                <a href="javascript:void;" @click="nextStep"><svg-vue class="step-arrow-icon" icon="right-arrow-icon"></svg-vue></a>
            </div> -->
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
        formStep: null,
        projects: [
            {
                name: 'Project 1',
                mainImage: '/images/resume_builder/project1.png'
            },
            {
                name: 'Project 2',
                mainImage: '/images/resume_builder/project2.png'
            }
        ]
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

.projects-container {
    margin-top: 32px;

}

.project {
    position: relative;
    margin-right: 87px;

    .remove-icon {
        opacity: 0;
        transition: all .5s ease;
        background: white;
        position: absolute;
        right: 14px;
        top: 14px;
        width: 53px;
        height: 53px;
        box-shadow: -3px 10px 15px #e5e5e5;
        border-radius: 5px;

        svg {
            width: 23px;
            height: 23px;
        }
    }

    &:hover .remove-icon {
        opacity: 1;
        transition: all .5s ease;
    }
}

.btns-wrapper {
    margin-top: 26px;

    button {
        margin-right: 12px;
    }
}

.add-project-icon {
    width: 31px;
    height: 31px;
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
