<template>
	<div class="portfolio-image-preview-poup" v-if="isOpen">
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
					<a v-lazy-container="{ selector: 'img' }" :href="portfolio.src" target="_blank" class="image-preview-popup__preview">
						<img :data-src="portfolio.src" :alt="portfolio.title">
					</a>
					<div class="image-preview-popup__detail">
						<h3 v-text="portfolio.title"></h3>
						<div v-text="portfolio.description"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import sharedStore from "./sharedStore";

export default {
	name: "PortfolioImagePreviewPoup",
	props: {
		portfolio: { type: Object },
		isOpen: { type: Boolean, default: false },
	},
	methods: {
		onClose() {
			sharedStore.state.portfolioPreview = {
				portfolio: {
					title: "",
					description: "",
					src: "",
				},
				isOpen: false,
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
		padding: 15px;
	}

	.preview-poup__content {
		background-color: white;
		.poup-content__header {
			position: relative;
			.poup-content-header-btn--close {
				position: absolute;
				bottom: 100%;
				right: 50%;
				transform: translateX(50%);
				margin-bottom: 7px;
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
			overflow: auto;
			max-height: 90vh;
			border-radius: 10px;
			box-shadow: $dropdown-box-shadow;

			.image-preview-popup__preview {
				display: block;
				max-height: 50vh;
				overflow: auto;
				img {
					width: 100%;
					height: auto;
				}
			}
			.image-preview-popup__detail {
				padding: 15px 28px;
				font-size: 12px;
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
	.portfolio-image-preview-poup {
		.preview-poup__content {
			max-width: 700px;

			.poup-content__header {
				.poup-content-header-btn--close {
					right: -8px;
					top: -28px;
					height: 38px;
					width: 38px;
					margin-bottom: unset;

					svg {
						height: 13px;
						width: 13px;
					}
				}
			}

			.poup-content__body {
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
	.portfolio-image-preview-poup {
		.preview-poup__content {
		}
	}
}
</style>