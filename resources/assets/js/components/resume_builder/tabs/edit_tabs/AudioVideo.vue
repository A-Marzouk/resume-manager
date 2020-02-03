<template>
    <div>
        <div class="section-title">
            <div class="title-light">Add</div>
            <h2>Audio / Video</h2>
        </div>

        <!-- audio / video tabs -->

        <div class="upload-container d-flex flex-direction-column">
            <h3 class="blue">Upload my audio</h3>
            <vue2Dropzone
                id="audio_and_video"
                :options="dropzoneOptions"
                :useCustomSlot=true
            >
                <svg-vue class="upload-audio-icon" icon='upload-audio-icon'></svg-vue>
                <div class="empty-text">
                    Drag and drop audio files  <br />or
                </div>
                <button class="btn filled btn-upload">
                    <svg-vue class="upload-icon icon" icon="upload-icon"></svg-vue>
                    <span>Browse audio file</span>
                </button>
            </vue2Dropzone>
            <!-- Insert icon -->
        </div>

    </div>
</template>

<script>
    export default {
        name: "AudioVideo",
        data: () => ({
            dropzoneOptions: {
                url: 'https://httpbin.org/post',
                thumbnailWidth: 150,
                maxFilesize: 0.5,
                acceptedFiles: 'audio/*'
            }
        })
    }
</script>

<style scoped lang="scss">
.upload-container {
    position: relative;
    width: 100%;
}

.vue-dropzone {
    box-sizing: border-box;
    max-width: 100%;
    padding-top: 30px;
    height: 225px;
    margin-top: 94px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.upload-audio-icon {
    height: 48px;
    margin-bottom: 10px;
}

.upload-icon {
    width: 25px;
}

.btn-upload {
    width: 214px;
    margin: 0 auto;
}
</style>
