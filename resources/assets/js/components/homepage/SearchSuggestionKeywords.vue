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
			const q = sharedStore.state.q.toLowerCase();

			if (q.includes("designer")) {
				return [
					"UI/UX",
					"Illustrator",
					"Graphic Design",
					"Motion Design",
					"Product Design",
				];
			}

			if (q.includes("ux")) {
				return ["XD", "Lightroom", "Figma", "Photoshop", "Illustrator"];
			}

			return [
				"Javascript",
				"PHP",
				"Vue.js",
				"React.js",
				"Python",
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
	overflow-x: scroll;
	&::-webkit-scrollbar {
		display: none;
	}
	.search-suggestion-keyword {
		color: $lynch;
		height: 38px;
		font-size: 12px;
		text-align: center;
		border-radius: 100px;
		padding: 0 12px;
		margin-right: 13px;
		margin-bottom: 3px;
		transition: all 0.2s;
		white-space: nowrap;
		border: 1px solid transparent;
		background-color: $darkselago;
		min-width: 110px;
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

@include xl {
	.search-suggestion-keywords {
		.search-suggestion-keyword {
			height: 44px;
			font-size: 14px;
			padding: 0 14px;
			margin-right: 15px;
			margin-bottom: 4px;
			min-width: 130px;
		}
	}
}
</style>