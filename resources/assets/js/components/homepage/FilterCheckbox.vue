<template>
	<button class="filter-checkbox" :class="{'--checked':value, '--prefix':prefix}" type="button" @click="$emit('input', !value)" v-text="title"></button>
</template>

<script>
export default {
	name: "FilterCheckbox",
	props: {
		title: { type: String },
		value: { type: Boolean, default: false },
		prefix: { type: Boolean, default: false },
	},
};
</script>

<style lang="scss" scoped>
@import "./scss/variables";
@import "./scss/media-queries";

.filter-checkbox {
	display: flex;
	align-items: center;
	justify-content: space-between;
	padding-left: 14px;
	padding-right: 14px;
	border-radius: 6px;
	border: 1px solid transparent;
	background-color: $moonraker14;
	transition: all 0.2s;
	height: 37px;
	white-space: nowrap;
	color: $midnightblue;
	font-size: 12px;
	margin-right: 15px;
	margin-bottom: 5px;
	min-width: 100px;
	&.--prefix {
		margin-left: 15px;
	}
	&.--checked {
		color: #f7f7fe;
		background: $midnightblue;
	}
	&:last-child {
		margin-right: unset;
	}
	&:focus {
		outline: none;
		border-color: $lynch50;
	}
}

@include xl {
	.filter-checkbox {
		font-size: 16px;
		height: 47px;
		padding-left: 42px;
		padding-right: 42px;
	}
}
</style>