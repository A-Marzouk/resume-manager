<template>
	<form id="search-freelancers-form" @submit.prevent="onFormSubmit">
		<div class="form__input-outer">
			<div class="form__keyword-input__wrapper">
				<label for="form__keyword-input" class="form__keyword-prepend">
					<svg :width="getIcon('search.prepend', '#707B99').width" :height="getIcon('search.prepend', '#707B99').height" fill="none" xmlns="http://www.w3.org/2000/svg" v-html="getIcon('search.prepend', '#707B99').path"></svg>
				</label>
				<input id="form__keyword-input" class="form__keyword-input" type="text" v-model="form.keyword" placeholder="Search freelancer for hire">

				<div class="form__inline-filters">
					<button type="button" class="inline-filter--pen" :class="{'--enabled': isEnabled('pen')}" @click="toggleFilter('pen')">
						<svg :width="getIcon('pen', isEnabled('pen')?'#fff':'#001CE3').width" :height="getIcon('pen', isEnabled('pen')?'#fff':'#001CE3').height" fill="none" xmlns="http://www.w3.org/2000/svg" v-html="getIcon('pen', isEnabled('pen')?'#fff':'#001CE3').path"></svg>
					</button>
					<button type="button" class="inline-filter--skill" :class="{'--enabled': isEnabled('skill')}" @click="toggleFilter('skill')">
						<svg :width="getIcon('skill', isEnabled('skill')?'#fff':'#001CE3').width" :height="getIcon('skill', isEnabled('skill')?'#fff':'#001CE3').height" fill="none" xmlns="http://www.w3.org/2000/svg" v-html="getIcon('skill', isEnabled('skill')?'#fff':'#001CE3').path"></svg>
					</button>
					<button type="button" class="inline-filter--portfolio" :class="{'--enabled': isEnabled('portfolio')}" @click="toggleFilter('portfolio')">
						<svg :width="getIcon('portfolio', isEnabled('portfolio')?'#fff':'#001CE3').width" :height="getIcon('portfolio', isEnabled('portfolio')?'#fff':'#001CE3').height" fill="none" xmlns="http://www.w3.org/2000/svg" v-html="getIcon('portfolio', isEnabled('portfolio')?'#fff':'#001CE3').path"></svg>
					</button>
				</div>
			</div>

			<div class="search-suggestion-keywords__wrapper">
				<SearchSuggestionKeywords @onsuggestion="form.keyword=$event" />
			</div>
		</div>
		<button class="form__search-action">
			<svg :width="getIcon('search.button').width" :height="getIcon('search.button').height" fill="none" xmlns="http://www.w3.org/2000/svg" v-html="getIcon('search.button').path"></svg>
			<span class="search-action__text">Search</span>
		</button>
	</form>
</template>

<script>
import hasIcons from "../mixins/hasIcons";
import SearchSuggestionKeywords from "./SearchSuggestionKeywords";

export default {
	name: "SearchFreelancersForm",
	mixins: [hasIcons],
	components: {
		SearchSuggestionKeywords,
	},
	data() {
		return {
			enabledFilters: ["pen"],
			form: {
				keyword: "",
			},
		};
	},
	methods: {
		isEnabled(filter) {
			return this.enabledFilters.includes(filter);
		},
		toggleFilter(filter) {
			if (this.enabledFilters.includes(filter)) {
				this.enabledFilters = this.enabledFilters.filter(
					(f) => f !== filter
				);
				return;
			}
			this.enabledFilters.push(filter);
		},
		onFormSubmit() {
			console.log("Your search was: ", this.form.keyword);
		},
	},
};
</script>

<style lang="scss" scoped>
@import "../scss/variables";
@import "../scss/media-queries";

#search-freelancers-form {
	display: flex;
	color: $midnightblue;
	width: 100%;
	margin-left: auto;
	margin-right: auto;
	max-width: 986px;

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
				position: absolute;
				left: 0;
				top: 0;
				display: flex;
				align-items: center;
				margin-left: 10px;
				height: 100%;
				svg {
					transform: scale(0.645);
				}
			}
			.form__keyword-input {
				width: 100%;
				height: 60px;
				border-radius: 30px;
				padding-left: 45px;
				padding-right: 62px;
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
		margin-top: 6.5px;
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
			margin-top: 5px;

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
			margin-top: 7px;

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