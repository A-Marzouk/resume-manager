<template>
	<form id="search-freelancers-form" @submit.prevent="onFormSubmit">
		<div class="container">
			<div class="d-flex align-items-center --mobile-only">
				<div class="form__input-outer">
					<div class="form__keyword-input__wrapper">
						<label for="form__keyword-input" class="form__keyword-prepend">
							<svg :width="getIcon('search.prepend', '#707B99').width" :height="getIcon('search.prepend', '#707B99').height" fill="none" xmlns="http://www.w3.org/2000/svg" v-html="getIcon('search.prepend', '#707B99').path"></svg>
						</label>

						<div ref="formChosenPredictions" class="form__chosen-predictions">
							<span v-for="prediction in sharedStore.state.chosenPredictions" v-text="prediction" :key="prediction"></span>
						</div>
						<input id="form__keyword-input" class="form__keyword-input" :style="keywordInputPredictionsDynamicHeightStyle" type="text" v-model="keyword" @focus="isSearching=true" @click.stop @keydown="onInputkeyDown" autocomplete="off" placeholder="Search freelancer for hire">

						<transition-group name="dropdown-list" tag="div" class="search-prediction-dropdown" :class="{'--open': isSearching && isFilterEnabled('pen')}" @click.stop>
							<div class="search-prediction-dropdown__item" :class="{'--chosen':isPredictionChosen(prediction)}" v-for="prediction in predictions" :key="prediction" v-text="prediction" @click.stop="onPredictionChosen(prediction)"></div>
						</transition-group>

						<div class="form__inline-filters">
							<button type="button" class="inline-filter--pen" :class="{'--enabled': isFilterEnabled('pen')}" @click="toggleFilter('pen')">
								<svg :width="getIcon('pen', isFilterEnabled('pen')?'#fff':'#001CE3').width" :height="getIcon('pen', isFilterEnabled('pen')?'#fff':'#001CE3').height" fill="none" xmlns="http://www.w3.org/2000/svg" v-html="getIcon('pen', isFilterEnabled('pen')?'#fff':'#001CE3').path"></svg>
							</button>
							<button type="button" class="inline-filter--skill" :class="{'--enabled': isFilterEnabled('skill')}" @click="toggleFilter('skill')">
								<svg :width="getIcon('skill', isFilterEnabled('skill')?'#fff':'#001CE3').width" :height="getIcon('skill', isFilterEnabled('skill')?'#fff':'#001CE3').height" fill="none" xmlns="http://www.w3.org/2000/svg" v-html="getIcon('skill', isFilterEnabled('skill')?'#fff':'#001CE3').path"></svg>
							</button>
							<button type="button" class="inline-filter--portfolio" :class="{'--enabled': isFilterEnabled('portfolio')}" @click="toggleFilter('portfolio')">
								<svg :width="getIcon('portfolio', isFilterEnabled('portfolio')?'#fff':'#001CE3').width" :height="getIcon('portfolio', isFilterEnabled('portfolio')?'#fff':'#001CE3').height" fill="none" xmlns="http://www.w3.org/2000/svg" v-html="getIcon('portfolio', isFilterEnabled('portfolio')?'#fff':'#001CE3').path"></svg>
							</button>
						</div>
					</div>

					<div class="search-suggestion-keywords__wrapper">
						<SearchSuggestionKeywords @onsuggestion="keyword=$event" />
					</div>
				</div>
				<button class="form__search-action">
					<svg :width="getIcon('search.button').width" :height="getIcon('search.button').height" fill="none" xmlns="http://www.w3.org/2000/svg" v-html="getIcon('search.button').path"></svg>
					<span class="search-action__text">Search</span>
				</button>
			</div>
		</div>
	</form>
</template>

<script>
import hasIcons from "./mixins/hasIcons";
import domUtils from "./mixins/utils/dom";
import sharedStore, {
	searchFreelancersPredictions,
	screenSizes,
} from "./sharedStore";

export default {
	name: "SearchFreelancersForm",
	mixins: [hasIcons, domUtils],
	components: {
		SearchSuggestionKeywords: require("./SearchSuggestionKeywords"),
	},
	data() {
		return {
			isSearching: false,
			predictionsBoxHeight: 0,
			sharedStore,
			keyword: "",
		};
	},
	watch: {
		keyword() {
			this.isSearching = true;
		},
	},
	computed: {
		keywordInputPredictionsDynamicHeightStyle() {
			let baseHeigh = 60;

			if (window.innerWidth > screenSizes.md) {
				baseHeigh = 74;
			}

			if (window.innerWidth > screenSizes.lg) {
				baseHeigh = 92;
			}

			return `height: ${
				baseHeigh + this.predictionsBoxHeight
			}px;padding-top: ${this.predictionsBoxHeight}px;`;
		},
		predictions() {
			return searchFreelancersPredictions.filter((prediction) => {
				return (
					prediction
						.toLowerCase()
						.indexOf(this.keyword.toLowerCase()) !== -1
				);
			});
		},
	},
	methods: {
		isFilterEnabled(filter) {
			return this.sharedStore.state.enabledFilters.includes(filter);
		},
		isPredictionChosen(prediction) {
			return this.sharedStore.state.chosenPredictions.includes(
				prediction
			);
		},
		onInputkeyDown(e) {
			const isKeyBackspace = e.keyCode === 8;
			if (isKeyBackspace) {
				if (
					e.target.value === "" &&
					this.sharedStore.state.chosenPredictions.length
				) {
					this.sharedStore.state.chosenPredictions.splice(-1, 1);
				}
			}
		},

		onPredictionChosen(prediction) {
			if (this.sharedStore.state.chosenPredictions.includes(prediction)) {
				this.sharedStore.state.chosenPredictions = this.sharedStore.state.chosenPredictions.filter(
					(p) => p !== prediction
				);
				return;
			}
			this.sharedStore.state.chosenPredictions.push(prediction);
			this.onFormChosenPredictionsItemsChange();
		},
		hidePredictionsDropdown() {
			this.isSearching = false;
		},
		toggleFilter(filter) {
			if (this.sharedStore.state.enabledFilters.includes(filter)) {
				this.sharedStore.state.enabledFilters = this.sharedStore.state.enabledFilters.filter(
					(f) => f !== filter
				);
				return;
			}
			this.sharedStore.state.enabledFilters.push(filter);
		},
		onFormChosenPredictionsItemsChange() {
			this.predictionsBoxHeight = this.$refs.formChosenPredictions.offsetHeight;
		},
		onFormSubmit() {
			console.log("Your search was: ", this.keyword);
		},
	},
	mounted() {
		document.addEventListener("click", this.hidePredictionsDropdown);
	},
	destroyed() {
		document.removeEventListener("click", this.hidePredictionsDropdown);
	},
};
</script>

<style lang="scss">
#search-freelancers-form {
	.dropdown-list-move {
		transition: transform 0.3s;
	}
}
</style>

<style lang="scss" scoped>
@import "./scss/variables";
@import "./scss/media-queries";

#search-freelancers-form {
	width: 100%;
	color: $midnightblue;

	button {
		border: 0;
		display: flex;
		align-items: center;
		justify-content: center;
		padding: 0 !important;
		min-width: auto;
		border-radius: 50%;
		color: $white;
		transition: all 0.15s;

		&:hover {
			box-shadow: $button-hover-shadow;
		}

		&:focus {
			outline: none;
		}
	}
	.form__input-outer {
		flex: 1;
		margin-right: 10px;
		.form__keyword-input__wrapper {
			position: relative;
			.form__keyword-prepend {
				top: 0;
				left: 0;
				height: 100%;
				display: flex;
				margin-left: 5px;
				margin-bottom: 0;
				position: absolute;
				align-items: center;
				svg {
					transform: scale(0.645);
				}
			}
			.form__chosen-predictions {
				position: absolute;
				left: 34px;
				right: 50px;
				display: flex;
				font-size: 10px;
				font-weight: 700;
				flex-wrap: wrap;
				white-space: nowrap;
				padding: 5px 10px 0;
				word-break: break-all;
				span {
					margin-right: 3px;
					&::after {
						content: ",";
					}
					&:last-child {
						&::after {
							content: "";
						}
					}
				}
			}
			.form__keyword-input {
				width: 100%;
				height: 60px;
				border-radius: 30px;
				padding-left: 44px;
				padding-right: 58px;
				border: 2px solid $moonraker;
				color: inherit;
				font-size: 14px;
				font-weight: 400;
				transition: all 0.3s;
				&:focus {
					outline: none;
					border-color: $blue;
				}

				&::placeholder {
					color: $lynch50;
				}
			}
			.search-prediction-dropdown {
				position: absolute;
				left: 0;
				top: 100%;
				width: 100%;
				height: 0;
				outline: none;
				overflow: auto;
				max-height: 200px;
				transition: all 0.3s;
				background-color: white;
				box-shadow: $dropdown-box-shadow;
				z-index: 100;

				&.--open {
					height: auto;
					margin-top: 10px;
				}

				&::-webkit-scrollbar {
					width: 5px;
				}
				&::-webkit-scrollbar-track {
					border-radius: 10px;
					background-color: $moonraker;
				}
				&::-webkit-scrollbar-thumb {
					border-radius: 10px;
					background-color: $blue;
				}

				.search-prediction-dropdown__item {
					width: 100%;
					display: flex;
					align-items: center;
					padding: 10px 5px 5px 10px;

					&.--chosen {
						color: $blue;
					}
				}
			}
			.form__inline-filters {
				position: absolute;
				top: 0;
				right: 0;
				height: 100%;
				display: flex;
				align-items: center;
				flex-direction: row-reverse;
				padding-right: 13px;

				.inline-filter--portfolio,
				.inline-filter--skill {
					display: none;
				}
				.inline-filter--pen,
				.inline-filter--portfolio,
				.inline-filter--skill {
					width: 35px;
					height: 35px;
					background-color: $white;
					box-shadow: $inline-filter-shadow;
					transition: all 0.15s;
					svg {
						transform: scale(0.8);
					}
					&.--enabled {
						background-color: $blue;
					}
					&:hover {
						box-shadow: $button-hover-shadow;
					}
					&:focus {
						border: 1px solid $blue;
					}
				}
			}
		}
		.search-suggestion-keywords__wrapper {
			width: 100%;
			display: none;
		}
	}
	.form__search-action {
		width: 47px;
		height: 47px;
		background-color: $blue;
		transition: all 0.15s;
		.search-action__text {
			display: none;
		}
		&:active {
			transform: translateY(1px);
		}
	}
}

@include md {
	#search-freelancers-form {
		button {
		}
		.--mobile-only {
			&.align-items-center {
				align-items: flex-start !important;
			}
		}
		.form__input-outer {
			margin-right: 18px;
			.form__keyword-input__wrapper {
				.form__keyword-prepend {
					svg {
						transform: scale(0.75);
					}
				}
				.form__keyword-input {
					font-size: 20px;
					height: 74px;
					border-radius: 50px;
					padding-left: 54px;
					padding-right: 194px;

					&::placeholder {
					}
				}
				.form__chosen-predictions {
					font-size: 12px;
					padding: 7px 10px 0;
				}
				.form__inline-filters {
					.inline-filter--pen,
					.inline-filter--portfolio,
					.inline-filter--skill {
						display: flex;
						margin-right: 12px;
						width: 45px;
						height: 45px;

						svg {
						}
					}
				}
			}
			.search-suggestion-keywords__wrapper {
				display: block;
				margin-top: 18px;
			}
		}
		.form__search-action {
			width: 64px;
			height: 64px;
			svg {
				transform: scale(1.4);
			}
		}
	}
}

@include lg {
	#search-freelancers-form {
		button {
		}
		.form__input-outer {
			margin-right: 24px;
			.form__keyword-input__wrapper {
				.form__keyword-prepend {
					margin-left: 34px;

					svg {
						transform: scale(1);
					}
				}
				.form__keyword-input {
					height: 92px;
					font-size: 24px;
					padding-left: 96px;
					padding-right: 250px;

					&::placeholder {
					}
				}
				.form__inline-filters {
					padding-right: 20px;

					.inline-filter--pen,
					.inline-filter--portfolio,
					.inline-filter--skill {
						width: 55px;
						height: 55px;

						svg {
							transform: scale(1);
						}
					}
				}
			}
			.search-suggestion-keywords__wrapper {
				margin-top: 28px;
			}
		}
		.form__search-action {
			height: 78px;
			font-size: 26px;
			min-width: 214px;
			border-radius: 50px;
			svg {
				display: none;
			}
			.search-action__text {
				display: inline;
			}
		}
	}
}

@include xl {
	#search-freelancers-form {
		max-width: 1467px;
		.form__input-outer {
			.search-suggestion-keywords__wrapper {
				margin-top: 40px;
			}
		}
	}
}
</style>