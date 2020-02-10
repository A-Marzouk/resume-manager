<template>
    <form class="new-project-form">
        <div class="input-field">
            <label for="projectName">
                Project name
                <div class="hint-message left text-light-gray">You don’t have to use the project’s official title, but try to keep it brief.</div>
            </label>
            <input id="projectName" type="text" class="--blue">
        </div>

        <div class="input-field">
            <label for="projectDescription">
                Description
                <div class="hint-message left text-light-gray">Give a quick primer of this project, and your involvement</div>
            </label>
            <textarea rows="10" id="projectDescription" class="--blue"></textarea>
        </div>

        <button class="btn filled" type="submit">
            <svg-vue class="save-icon icon" icon="save-icon"></svg-vue>Save all information
        </button>
    </form>
</template>
<script>
export default {
    
}
</script>
<style scoped lang="scss">
.new-project-form {
    max-width: 1048px;
    width: 100%;
}
</style>