<template>
	<div class="portfolio-image-preview-poup" v-if="sharedStore.state.videoPreview.isOpen">
		<div class="preview-poup__wrapper">
			<div class="preview-poup__content">
				<div class="poup-content__header">
					<button class="poup-content-header-btn--close" type="button" @click="onClose">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
							<path d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z" />
						</svg>
					</button>
				</div>
				<div class="poup-content__body">
					<VideosPreviewPopupSlider />
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import sharedStore from "./sharedStore";
import VideosPreviewPopupSlider from "./VideosPreviewPopupSlider";

export default {
	name: "PortfolioVideoPreviewPoup",
	props: {
		projectIndex: { type: Number, default: 0 },
	},
	components: { VideosPreviewPopupSlider },
	data() {
		return {
			sharedStore,
		};
	},
	methods: {
		onClose() {
			sharedStore.state.videoPreview = {
				isOpen: false,
				profileIndex: 0,
				videoIndex: 0
			};
		},
	},
};
</script>

<style lang="scss" scoped>
@import "./scss/variables";
@import "./scss/media-queries";

.portfolio-image-preview-poup {
	position: fixed;
	height: 100%;
	width: 100%;
	top: 0;
	left: 0;
	z-index: 9999;
	background-color: rgba(255, 255, 255, 0.62);

	.preview-poup__wrapper {
		position: relative;
		display: flex;
		align-items: center;
		justify-content: center;
		height: 100%;
		width: 100%;
		padding: 7px;
	}

	.preview-poup__content {
		width: 100%;
		border-radius: 10px;
		background-color: white;
		.poup-content__header {
			position: relative;
			.poup-content-header-btn--close {
				position: absolute;
				bottom: 100%;
				right: 0;
				margin-bottom: 3px;
				display: flex;
				align-items: center;
				justify-content: center;
				background: white;
				color: $lighterblue;
				height: 34px;
				width: 34px;
				box-shadow: $inline-filter-shadow;
				border: 1px solid $selago60;
				border-radius: 50%;
				transition: all 0.15s;
				z-index: 30;
				svg {
					height: 12px;
					width: 12px;
					fill: currentColor;
				}
				&:hover {
					box-shadow: $button-hover-shadow;
				}
				&:focus {
					outline: none;
					border-color: $blue;
				}
			}
		}
		.poup-content__body {
			border-radius: 10px;
			box-shadow: $dropdown-box-shadow;
		}
	}
}

@include md {
	.portfolio-image-preview-poup {
		.preview-poup__content {
			max-width: 700px;

			.poup-content__header {
				.poup-content-header-btn--close {
					height: 50px;
					width: 50px;
					top: -25px;
					right: -25px;
					svg {
						width: 20px;
						height: 20px;
					}
				}
			}
		}
	}
}

@include lg {
	.portfolio-image-preview-poup {
		.preview-poup__content {
			.poup-content__header {
				.poup-content-header-btn--close {
					height: 60px;
					width: 60px;
					top: -38px;
					right: -38px;
				}
			}
		}
	}
}
</style>