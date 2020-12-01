<template>
	<div class="search-suggestion-keywords" :class="classes">
		<button type="button" class="search-suggestion-keyword" @click="$emit('onsuggestion', keyword)" v-for="keyword in suggestionKeywords" v-text="keyword" :key="keyword"></button>
	</div>
</template>

<script>
import sharedStore from "./sharedStore";
export default {
	name: "SearchSuggestionKeywords",
	props: { classes: { type: String, default: "" } },
	data() {
		return {
			staticSuggestionKeywords: [
				"Illustration",
				"Graphic Design",
				"Motion",
				"Product",
			],
		};
	},
	computed: {
		suggestionKeywords() {
			if (
				sharedStore.state.chosenPredictions
					.join()
					.toLowerCase()
					.includes("designer")
			) {
				return [
					"UI/UX",
					"Illustrator",
					"Graphic Design",
					"Motion Design",
					"Product Design",
				];
			}

			if (
				sharedStore.state.chosenPredictions
					.join()
					.toLowerCase()
					.includes("ux")
			) {
				return ["XD", "Lightroom", "Figma", "Photoshop", "Illustrator"];
			}

			return [
				"UI/UX",
				"Motion Design",
				"Graphic Design",
				"Illustrator",
				"Interaction",
			];
		},
	},
};
</script>

<style lang="scss" scoped>
@import "./scss/variables";
@import "./scss/media-queries";

.search-suggestion-keywords {
	display: flex;
	align-items: center;
	justify-content: space-around;
	flex-wrap: wrap;
	.search-suggestion-keyword {
		color: $lynch;
		height: 34px;
		font-size: 14px;
		text-align: center;
		border-radius: 40px;
		margin-right: 13px;
		padding-left: 13px;
		padding-right: 13px;
		margin-bottom: 3px;
		border: 1px solid transparent;
		background-color: $darkselago;
		transition: all 0.2s;
		word-break: break-all;
		&:hover,
		&:focus {
			outline: none;
			border-color: $lynch50;
		}
		&:last-child {
			margin-right: unset;
		}
	}
}

@include lg {
	.search-suggestion-keywords {
		.search-suggestion-keyword {
			height: 50px;
			font-size: 16px;
			margin-right: 12px;
			padding: 0 20px;
		}
	}
}

@include xl {
	.search-suggestion-keywords {
		.search-suggestion-keyword {
			height: 62px;
			font-size: 20px;
			padding: 0 26px;
			&:last-child {
				margin-right: unset;
			}
		}
	}
}
</style>