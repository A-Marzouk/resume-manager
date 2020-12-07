<template>
	<transition name="fade-project-preview-popup__slider" appear>
		<div class="project-preview-popup__slider">
			<span class="preview-popup-slider__counter" v-text="`${sharedStore.state.projectPreview.projectIndex + 1}/${sharedStore.state.workForceProfiles[
					sharedStore.state.projectPreview.profileIndex
				].projects.length}`">
			</span>
			<button v-show="!isFirstSlide" type="button" class="preview-popup-slider__prev-button" @click="activatePreviousProject">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
					<path d="M7.05 9.293L6.343 10 12 15.657l1.414-1.414L9.172 10l4.242-4.243L12 4.343z" />
				</svg>
			</button>
			<div class="project-preview-popup__slider-inner-wrapper">
				<div class="project-preview-popup__slider-inner" :style="sliderSlideStyle">
					<div class="preview-popup-slider__slide" v-lazy-container="{ selector: 'img' }" v-for="(project, projectIndex) in projects" :key="project.id + '-' + projectIndex">
						<div class="image-preview-popup__preview">
							<a class="popup-preview__slide" :href="getProjectMainImage(project)" target="_blank">
								<img :data-src="getProjectMainImage(project)" :alt="project.name">
							</a>
						</div>
						<div class="image-preview-popup__detail">
							<h3 v-text="project.name"></h3>
							<div v-text="project.description"></div>
						</div>
					</div>
				</div>
			</div>
			<button v-show="!isLastSlide" type="button" class="preview-popup-slider__next-button" @click="activateNextProject">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
					<path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z" />
				</svg>
			</button>
		</div>
	</transition>
</template>

<script>
import sharedStore from "./sharedStore";

export default {
	name: "ProjectsPreviewPopupSlider",
	data() {
		return {
			sharedStore,
			imgWidth: 0,
		};
	},
	computed: {
		sliderSlideStyle() {
			return `transform: translateX(-${
				this.imgWidth * sharedStore.state.projectPreview.projectIndex
			}px);`;
		},
		isFirstSlide() {
			return sharedStore.state.projectPreview.projectIndex <= 0;
		},
		isLastSlide() {
			return (
				sharedStore.state.projectPreview.projectIndex >=
				sharedStore.state.workForceProfiles[
					sharedStore.state.projectPreview.profileIndex
				].projects.length -
					1
			);
		},
		projects() {
			return sharedStore.state.workForceProfiles[
				sharedStore.state.projectPreview.profileIndex
			].projects;
		},
	},
	methods: {
		getProjectMainImage(project) {
			return project.images.filter((img) => img.is_main == 1)[0].src;
		},
		activatePreviousProject() {
			if (this.isFirstSlide) return;

			document.querySelector(
				".project-preview-popup__slider-inner"
			).style.transition = "transform 0.3s ease-in-out";

			this.updateImgWidth();

			sharedStore.state.projectPreview.projectIndex--;
		},
		activateNextProject() {
			if (this.isLastSlide) return;

			document.querySelector(
				".project-preview-popup__slider-inner"
			).style.transition = "transform 0.3s ease-in-out";

			this.updateImgWidth();

			sharedStore.state.projectPreview.projectIndex++;
		},
		updateImgWidth() {
			this.imgWidth = document.querySelector(
				".project-preview-popup__slider-inner img"
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
	max-height: 556px;

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
		top: 100%;
		margin-top: 5px;
		display: flex;
		align-items: center;
		justify-content: center;
		background: white;
		color: $lighterblue;
		height: 32px;
		width: 64px;
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
				max-height: 396px;
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
				height: 120px;
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
			height: 50px;
			width: 100px;
			margin-top: 10px;
			svg {
				fill: currentColor;
				width: 32px;
				height: 32px;
			}
		}

		.project-preview-popup__slider-inner {
			.preview-popup-slider__slide {
				.image-preview-popup__detail {
					font-size: 14px;
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
		height: 556px;

		.preview-popup-slider__prev-button,
		.preview-popup-slider__next-button {
			bottom: 50%;
			top: unset;
			transform: translateY(50%);
			height: 50px;
			width: 50px;
		}
		.preview-popup-slider__prev-button {
			left: -62px;
		}
		.preview-popup-slider__next-button {
			right: -62px;
		}

		.project-preview-popup__slider-inner {
			.preview-popup-slider__slide {
				.image-preview-popup__preview {
					height: 436px;
					max-height: 436px;
				}
			}
		}
	}
}
</style>