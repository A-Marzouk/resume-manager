<template>
    <div>
        <div class="section-title">
            <div class="title-light">Add</div>
            <h2>Audio / Video</h2>
        </div>

        <!-- audio / video tabs -->

        <div class="content d-flex">
            <div class="upload-container d-flex flex-column">
                <h3 class="blue">Upload my audio</h3>
                <vue2Dropzone
                    id="audio_and_video"
                    :options="dropzoneOptions"
                    :useCustomSlot=true
                >
                    <svg-vue class="upload-audio-icon" icon='upload-audio-icon'></svg-vue>
                    <div class="empty-text">
                        Drag and drop audio files<br />or
                    </div>
                    <button class="btn filled btn-upload">
                        <svg-vue class="upload-icon icon" icon="upload-icon"></svg-vue>
                        <span>Browse audio file</span>
                    </button>
                </vue2Dropzone>
                <!-- Insert icon -->
            </div>

            <!-- Audio previews -->
            <div class="audios-preview-container">
                <div class="audio-element">
                    <div class="audio-name">Audio 1</div>
                    <div class="audio-player">

                    </div>
                </div>
            </div>
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
            },
            audios: [
                {

                }
            ]
        })
    }
</script>

<style scoped lang="scss">
$mainBlue: #001CE2; 

.content {
    margin-top: 50px;
}

.upload-container {
    position: relative;
    width: 354px;
    margin-right: 232px;

    h3 {
        font-size: 28px;
        position: relative;
        width: 100%;
        text-align: center;

        &::after {
            position: absolute;
            bottom: -30px;
            left: 0;
            content: "";
            width: 100%;
            height: 2px;
            background: $mainBlue;
        }
    }
}

.vue-dropzone {
    box-sizing: border-box;
    max-width: 100%;
    padding-top: 30px;
    height: 225px;
    margin-top: 98px;
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

.audios-preview-container {
    .audio-element {
        border: 1px solid $mainBlue;
        border-radius: 25px;
        height: 91px;
        width: 429px;
    }
}
</style>
