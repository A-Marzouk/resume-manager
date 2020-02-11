<template>
    <div class="wrapper">
        <div class="text-hint">Only use images that are greater than 500 pixels in both height and 300 pixels in width.</div>

        <div class="btns-wrapper d-flex align-items-center">
            <button class="btn outline" @click="setStep(1)">
                <svg-vue class="icon add-project-icon" icon="add-icon"></svg-vue> <b>Add a new project</b>
            </button>
            <button class="btn outline">
                <svg-vue class="icon add-project-icon" icon="add-icon"></svg-vue> <b>Auto import</b>
            </button>
        </div>
        <div class="projects-container d-flex">
            <div class="project" v-for="project in projects" :key="project.name">
                <img :src="project.mainImage" alt="">
                <a class="d-flex justify-content-center align-items-center remove-icon" href="javascript:;">
                    <svg-vue icon="remove-icon"></svg-vue>
                </a>
            </div>
        </div>
    </div>        
    
</template>

<script>

export default {
    name: "Projects",
    props: {
        setStep: { type: Function }
    },
    data: () => ({
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
    })
}
</script>

<style scoped lang="scss">
$mainBlue: #001CE2;
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
    
    a {
        color: $mainBlue;

        &:hover {
            text-decoration: none;
        }
    }

    .btn {
        margin-right: 12px;
    }
}

.add-project-icon {
    width: 31px;
    height: 31px;
}
</style>