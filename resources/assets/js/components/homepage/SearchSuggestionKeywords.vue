<template>
	<div class="search-suggestion-keywords" :class="classes">
		<button type="button" class="search-suggestion-keyword" @click="$emit('onsuggestion', keyword)" v-for="keyword in suggestionKeywords" v-text="keyword" :key="keyword"></button>
	</div>
</template>

<script>
export default {
	name: "SearchSuggestionKeywords",
	props: { classes: { type: String, default: "" } },
	data() {
		return {
			suggestionKeywords: [
				"Illustration",
				"Graphic Design",
				"Motion",
				"Product",
			],
		};
	},
};
</script>

<style lang="scss" scoped>
@import "./scss/variables";
@import "./scss/media-queries";

.search-suggestion-keywords {
	display: flex;
	align-items: center;
	justify-content: center;
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
			min-width: 150px;
			margin-right: 20px;
			padding-left: 16px;
			padding-right: 16px;
		}
	}
}

@include xl {
	.search-suggestion-keywords {
		.search-suggestion-keyword {
			height: 62px;
			font-size: 20px;
			min-width: 194px;
			margin-right: 30px;
			/* &:last-child {
				margin-right: unset;
			} */
		}
	}
}
</style>