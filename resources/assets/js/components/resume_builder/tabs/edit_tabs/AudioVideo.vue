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
                    <div class="audio-player d-flex align-items-center">
                        <svg-vue class="play-icon" icon="play-icon"></svg-vue>
                        <svg-vue class="sound-frecuency" icon="sound-frecuency"></svg-vue>

                        <div class="order-controls d-flex flex-column">
                            <button class="icon">
                                <svg-vue icon="arrow-up"></svg-vue>
                            </button>
                            <button class="icon">
                                <svg-vue icon="arrow-down"></svg-vue>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="audio-element">
                    <div class="audio-name">Audio 2</div>
                    <div class="audio-player d-flex align-items-center">
                        <svg-vue class="play-icon" icon="play-icon"></svg-vue>
                        <svg-vue class="sound-frecuency" icon="sound-frecuency"></svg-vue>

                        <div class="order-controls d-flex flex-column">
                            <button class="icon">
                                <svg-vue icon="arrow-up"></svg-vue>
                            </button>
                            <button class="icon">
                                <svg-vue icon="arrow-down"></svg-vue>
                            </button>
                        </div>
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
    margin-top: 10px;
    .audio-element {
        position: relative;
        margin-bottom: 50px;
        
        .audio-name {
            font-family: "Noto Sans", Arial, Helvetica, sans-serif;
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 18px;
        }

        .order-controls {
            right: -27px;
            position: absolute;
            z-index: 2;

            .icon {
                padding: 0 !important;
                background: none;
                border: none;
                position: relative;
                display: flex;
                justify-content: center;
                align-items: center;

                svg {
                    width: 12px;
                    height: 6px;
                }
                
                &:first-child {
                    margin-bottom: 15px;
                }
            }
        }
    }

    .audio-player {
        border: 1px solid $mainBlue;
        border-radius: 25px;
        height: 91px;
        width: 429px;
        padding-left: 36px;

        .play-icon {
            width: 30px;
        }

        .sound-frecuency {
            width: 254px;
            margin-left: 25px;
        }
    }
}
    </style>
