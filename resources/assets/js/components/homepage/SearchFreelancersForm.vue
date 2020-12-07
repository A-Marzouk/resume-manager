<template>
	<form id="search-freelancers-form" @submit.prevent>
		<div class="form__input-outer">
			<div class="form__keyword-input__wrapper">
				<label for="form__keyword-input" class="form__keyword-prepend">
					<svg :width="getIcon('search.prepend', '#707B99').width" :height="getIcon('search.prepend', '#707B99').height" fill="none" xmlns="http://www.w3.org/2000/svg" v-html="getIcon('search.prepend', '#707B99').path"></svg>
				</label>

				<input id="form__keyword-input" class="form__keyword-input" type="text" :value="sharedStore.state.q" @input="onSearchInputChange($event.target.value)" @focus="isSearching=true" @click.stop @keydown.delete="onInputDeleteKeyDown($event.target.value)" autocomplete="off" placeholder="Search Freelance Designers for Hire">

				<transition-group name="dropdown-list" tag="div" class="search-prediction-dropdown" :class="{'--open': isSearching}" @click.stop>
					<div class="search-prediction-dropdown__item" :class="{'--chosen':isPredictionChosen(prediction)}" v-for="prediction in predictions" :key="prediction" v-text="prediction" @click="onPredictionChosen(prediction)"></div>
				</transition-group>

				<!-- <div class="form__inline-filters">
                    <button type="button" class="inline-filter--pen" :class="{'--enabled': isFilterEnabled('pen')}" @click="toggleFilter('pen')">
                        <svg :width="getIcon('pen', isFilterEnabled('pen')?'#fff':'#001CE3').width" :height="getIcon('pen', isFilterEnabled('pen')?'#fff':'#001CE3').height" fill="none" xmlns="http://www.w3.org/2000/svg" v-html="getIcon('pen', isFilterEnabled('pen')?'#fff':'#001CE3').path"></svg>
                    </button>
                    <button type="button" class="inline-filter--skill" :class="{'--enabled': isFilterEnabled('skill')}" @click="toggleFilter('skill')">
                        <svg :width="getIcon('skill', isFilterEnabled('skill')?'#fff':'#001CE3').width" :height="getIcon('skill', isFilterEnabled('skill')?'#fff':'#001CE3').height" fill="none" xmlns="http://www.w3.org/2000/svg" v-html="getIcon('skill', isFilterEnabled('skill')?'#fff':'#001CE3').path"></svg>
                    </button>
                    <button type="button" class="inline-filter--portfolio" :class="{'--enabled': isFilterEnabled('portfolio')}" @click="toggleFilter('portfolio')">
                        <svg :width="getIcon('portfolio', isFilterEnabled('portfolio')?'#fff':'#001CE3').width" :height="getIcon('portfolio', isFilterEnabled('portfolio')?'#fff':'#001CE3').height" fill="none" xmlns="http://www.w3.org/2000/svg" v-html="getIcon('portfolio', isFilterEnabled('portfolio')?'#fff':'#001CE3').path"></svg>
                    </button>
                </div> -->
			</div>

			<div class="search-suggestion-keywords__wrapper">
				<SearchSuggestionKeywords @onsuggestion="onSuggestionClicked" />
			</div>
		</div>
		<button class="form__search-action">
			<svg :width="getIcon('search.button').width" :height="getIcon('search.button').height" fill="none" xmlns="http://www.w3.org/2000/svg" v-html="getIcon('search.button').path"></svg>
			<span class="search-action__text">Search</span>
		</button>
	</form>
</template>

<script>
import hasIcons from "./mixins/hasIcons";
import domUtils from "./mixins/utils/dom";
import sharedStore, { searchFreelancersPredictions } from "./sharedStore";

export default {
	name: "SearchFreelancersForm",
	mixins: [hasIcons, domUtils],
	components: {
		SearchSuggestionKeywords: require("./SearchSuggestionKeywords"),
	},
	data() {
		return {
			isSearching: false,
			predictionJustWasDeleted: false,
			sharedStore,
		};
	},
	watch: {
		keyword() {
			this.isSearching = true;
		},
	},
	computed: {
		predictions() {
			const q = this.sharedStore.state.q.toLowerCase();
			const qPrefix = this.sharedStore.state.qPrefix
				.join(", ")
				.trim()
				.toLowerCase();

			return searchFreelancersPredictions.filter((prediction) => {
				return (
					prediction
						.trim()
						.toLowerCase()
						.indexOf(q.replace(qPrefix, "").trim()) !== -1 &&
					!this.sharedStore.state.qPrefix.includes(prediction)
				);
			});
		},
	},
	methods: {
		onSearchInputChange(value) {
			const qPrefix = this.sharedStore.state.qPrefix.join(", ");
			const q = this.predictionJustWasDeleted
				? ""
				: value.replace(sharedStore.state.qPrefix.join(", "), "");
			this.predictionJustWasDeleted = false;

			this.sharedStore.state.q = `${qPrefix}${q}`;
		},
		onInputDeleteKeyDown(value) {
			let qPrefix = this.sharedStore.state.qPrefix.join(", ");
			const q = value.replace(qPrefix, "");

			if (q.trim() === "") {
				this.sharedStore.state.qPrefix.splice(-1, 1);
				this.predictionJustWasDeleted = true;
			}
		},
		onPredictionChosen(prediction) {
			if (this.sharedStore.state.qPrefix.includes(prediction)) {
				this.sharedStore.state.qPrefix = this.sharedStore.state.qPrefix.filter(
					(p) => p !== prediction
				);
			} else {
				this.sharedStore.state.qPrefix.push(prediction);
			}
			this.onSearchInputChange(" ");
		},
		onSuggestionClicked(prediction) {
			this.onPredictionChosen(prediction);
		},
		isFilterEnabled(filter) {
			return this.sharedStore.state.enabledFilters.includes(filter);
		},
		isPredictionChosen(prediction) {
			return this.sharedStore.state.qPrefix.includes(prediction);
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
	},
	mounted() {
		document.addEventListener("click", () => (this.isSearching = false));
	},
	destroyed() {
		document.removeEventListener("click", () => (this.isSearching = false));
	},
};
</script>

<style lang="scss">
#search-freelancers-form {
	/** vuejs transition for predictions dropdown */
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
	display: flex;
	align-items: center;

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
		min-width: 0;
		margin-right: 10px;
		.form__keyword-input__wrapper {
			display: flex;
			position: relative;
			align-items: center;

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
			.form__keyword-input {
				width: 100%;
				height: 60px;
				padding-left: 44px;
				padding-right: 12px;
				border-radius: 100px;
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
				border-radius: 13px;
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
					font-size: 16px;
					padding: 10px 5px 5px 44px;
					cursor: pointer;

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
		margin: 0 auto;
		max-width: 666px;
		align-items: normal;
		.form__input-outer {
			margin-right: 18px;
			.form__keyword-input__wrapper {
				.form__keyword-prepend {
					svg {
						transform: scale(0.55);
					}
				}
				.form__keyword-input {
					font-size: 16px;
					padding-left: 50px;
					padding-right: 15px;
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
				margin-top: 12px;
			}
		}

		.form__search-action {
			height: 44px;
			font-size: 16px;
			min-width: 119px;
			margin-top: 8px;
			border-radius: 100px;
			svg {
				display: none;
			}
			.search-action__text {
				display: inline;
			}
		}
	}
}

@include lg {
	#search-freelancers-form {
		max-width: 757px;
		.form__input-outer {
			margin-right: 14px;
			.form__keyword-input__wrapper {
				.form__keyword-prepend {
					margin-left: 15px;
				}
				.form__keyword-input {
				}

				.search-prediction-dropdown {
					max-height: 274px;
					.search-prediction-dropdown__item {
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
			}
		}
	}
}

@include xl {
	#search-freelancers-form {
		max-width: 964px;
		.form__input-outer {
			margin-right: 20px;
			.form__keyword-input__wrapper {
				.form__keyword-prepend {
					margin-left: 23px;
				}
				.form__keyword-input {
					font-size: 18px;
					height: 72px;
					padding-left: 64px;
					padding-right: 23px;
				}

				.search-prediction-dropdown {
					.search-prediction-dropdown__item {
						font-size: 18px;
						padding-left: 64px;
					}
				}
			}
			.search-suggestion-keywords__wrapper {
				padding-left: 50px;
				margin-top: 10px;
			}
		}
		.form__search-action {
			height: 64px;
			font-size: 24px;
			min-width: 178px;
			margin-top: 4px;
		}
	}
}
</style>