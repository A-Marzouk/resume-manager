<template>
    <form class="new-project-form">
        <div class="input-field">
            <label for="projectName">
                Project URL
                <div class="hint-message left text-light-gray">Is there an active link where this project can be viewed without a password?</div>
            </label>
            <input id="projectName" type="text" class="--blue">
        </div>

        <div class="input-field">
            <label for="skils">
                Skills used in this project
                <div class="hint-message left text-light-gray">What skills did you put to use for this project?</div>
            </label>
            <input id="skils" type="text" class="--blue">
        </div>

        <div class="input-field">
            <label for="skils">
                Softwares used in this project
                <div class="hint-message left text-light-gray">Give a quick primer of this project, and your involvement</div>
            </label>
            <input id="skils" type="text" class="--blue">
        </div>

        <button @click="saveForm" class="btn filled" type="submit">
            <span class="icon-container white d-flex justify-content-center align-items-center"><svg-vue class="checkmark-icon" icon="checkmark-icon"></svg-vue></span> Add Project
        </button>
    </form>
</template>
<script>
export default {
    props: {
        setStep: { type: Function }
    },
    data: () => ({}),
    methods: {
        saveForm () {
            // Save form
            
            this.setStep(null)
        }
    }
}
</script>
<style scoped lang="scss">
$mainBlue: #001CE2;

.btn {
    width: 219px;
}

.new-project-form {
    max-width: 1048px;
    width: 100%;
}

.icon-container {
    display: block;
    border-radius: 5px;
    background: white;
    width: 27px;
    height: 27px;
    margin-right: 21px;
}

.checkmark-icon {
    height: 12px;

    path {
        fill: $mainBlue !important;
        height: 12px;
    }
}
</style>