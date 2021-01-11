<template>
    <transition name="fade-project-preview-popup__slider" appear>
        <div class="project-preview-popup__slider">
			<span class="preview-popup-slider__counter" v-text="videoText()">
			</span>
            <button v-show="!isFirstSlide" type="button" class="preview-popup-slider__prev-button"
                    @click="activatePreviousProject">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M7.05 9.293L6.343 10 12 15.657l1.414-1.414L9.172 10l4.242-4.243L12 4.343z"/>
                </svg>
            </button>
            <div class="project-preview-popup__slider-inner-wrapper">
                <div class="project-preview-popup__slider-inner" :style="sliderSlideStyle">
                    <div class="preview-popup-slider__slide" v-lazy-container="{ selector: 'img' }"
                         v-for="(video, videoIndex) in videos" :key="video.id + '-' + videoIndex">
                        <div class="image-preview-popup__preview">
                            <a class="popup-preview__slide" href="javascript:void(0)">
                                <video width="100%" controls>
                                    <source :src="video.url" type="video/mp4">
                                </video>
                            </a>
                        </div>
                        <div class="image-preview-popup__detail">
                            <h3 v-text="video.title"></h3>
                            <div v-text="video.transcript"></div>
                        </div>
                    </div>
                </div>
            </div>
            <button v-show="!isLastSlide" type="button" class="preview-popup-slider__next-button"
                    @click="activateNextProject">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/>
                </svg>
            </button>
        </div>
    </transition>
</template>

<script>
    import sharedStore from "./sharedStore";

    export default {
        name: "VideosPreviewPopupSlider",
        data() {``
            return {
                sharedStore,
                imgWidth: 0,
            };
        },
        computed: {
            sliderSlideStyle() {
                return `transform: translateX(-${
                this.imgWidth * sharedStore.state.videoPreview.videoIndex
                    }px);`;
            },
            isFirstSlide() {
                return sharedStore.state.videoPreview.videoIndex <= 0;
            },
            isLastSlide() {
                return (
                    sharedStore.state.videoPreview.videoIndex >=
                    sharedStore.state.workForceProfiles[
                        sharedStore.state.videoPreview.profileIndex
                        ].videos.length - 1
                );

            },
            videos() {
                return sharedStore.state.workForceProfiles[
                    sharedStore.state.videoPreview.profileIndex
                    ].videos;
            },
        },
        methods: {
            videoText(){
                return `${sharedStore.state.videoPreview.videoIndex + 1}/${sharedStore.state.workForceProfiles[
                    sharedStore.state.videoPreview.profileIndex
                    ].videos.length}`;
            },
            activatePreviousProject() {
                if (this.isFirstSlide) return;

                document.querySelector(
                    ".project-preview-popup__slider-inner"
                ).style.transition = "transform 0.3s ease-in-out";

                this.updateImgWidth();

                sharedStore.state.videoPreview.videoIndex--;
            },
            activateNextProject() {
                if (this.isLastSlide) return;

                document.querySelector(
                    ".project-preview-popup__slider-inner"
                ).style.transition = "transform 0.3s ease-in-out";

                this.updateImgWidth();

                sharedStore.state.videoPreview.videoIndex++;
            },
            updateImgWidth() {
                this.imgWidth = document.querySelector(
                    ".project-preview-popup__slider-inner video"
                ).clientWidth;
            },
        },
        mounted() {
            this.updateImgWidth();
        },
    };
</script>


<style lang="scss">
    .fade-project-preview-popup__slider {
        &-enter-active,
        &-leave-active {
            transition: opacity, transform 0.3s;
        }

        &-enter,
        &-leave-to {
            transform: translateY(10px);
            opacity: 0.5;
        }
    }
</style>

<style lang="scss" scoped>
    @import "./scss/variables";
    @import "./scss/media-queries";

    .project-preview-popup__slider {
        width: 100%;
        position: relative;

        .preview-popup-slider__counter {
            font-weight: 700;
            color: $lighterblue;
            font-size: 14px;
            position: absolute;
            bottom: 100%;
            left: 0;
            background-color: white;
            z-index: 10;
            box-shadow: 0px 0px 12px -5px rgba(0, 16, 131, 0.2);
            border: 1px solid #efefef;
            border-radius: 20px;
            display: inline-block;
            padding: 2px 6px;
            margin-bottom: 3px;
            user-select: none;
        }

        .preview-popup-slider__prev-button,
        .preview-popup-slider__next-button {
            position: absolute;
            bottom: 50%;
            transform: translateY(50%);
            margin-top: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            color: $lighterblue;
            height: 34px;
            width: 34px;
            box-shadow: $inline-filter-shadow;
            border: 1px solid $selago60;
            border-radius: 100px;
            transition: all 0.15s;
            z-index: 30;

            svg {
                fill: currentColor;
                width: 20px;
                height: 20px;
            }

            &:hover {
                box-shadow: $button-hover-shadow;
            }

            &:focus {
                outline: none;
                border-color: $blue;
            }
        }

        .preview-popup-slider__prev-button {
            left: 0;
        }

        .preview-popup-slider__next-button {
            right: 0;
        }

        .project-preview-popup__slider-inner-wrapper {
            overflow: hidden;
        }

        .project-preview-popup__slider-inner {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;

            .image-preview-popup__preview,
            .image-preview-popup__detail,
            & {
                &::-webkit-scrollbar {
                    display: none;
                }
            }

            .preview-popup-slider__slide {
                min-width: 100%;

                .image-preview-popup__preview {
                    width: 100%;
                    height: 222px;
                    overflow-y: scroll;

                    a {
                        width: 100%;
                        display: block;
                        border-radius: 10px;

                        img {
                            width: 100%;
                            height: auto;
                            border-radius: inherit;
                        }
                    }
                }

                .image-preview-popup__detail {
                    font-size: 12px;
                    height: 100px;
                    overflow-y: scroll;
                    padding: 15px 28px;
                    color: midnightblue;

                    h3 {
                        line-height: 1;
                        font-size: 16px;
                        font-weight: 700;
                    }
                }
            }
        }
    }

    @include md {
        .project-preview-popup__slider {
            .preview-popup-slider__prev-button,
            .preview-popup-slider__next-button {
                width: 50px;
                height: 50px;

                svg {
                    width: 32px;
                    height: 32px;
                }
            }

            .preview-popup-slider__prev-button {
                left: -25px;
            }

            .preview-popup-slider__next-button {
                right: -25px;
            }

            .project-preview-popup__slider-inner {
                .preview-popup-slider__slide {
                    .image-preview-popup__preview {
                        height: 436px;
                    }

                    .image-preview-popup__detail {
                        font-size: 14px;
                        height: 120px;
                        padding: 20px 40px;

                        h3 {
                            font-size: 18px;
                        }
                    }
                }
            }
        }
    }

    @include lg {
        .project-preview-popup__slider {
            .preview-popup-slider__prev-button,
            .preview-popup-slider__next-button {
                width: 60px;
                height: 60px;
            }

            .preview-popup-slider__prev-button {
                left: -63px;
            }

            .preview-popup-slider__next-button {
                right: -63px;
            }
        }
    }
</style>