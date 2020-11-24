<template>
	<div class="filter-dropdown">
		<button class="filter-dropdown__action" type="button" @click="toggleDropdown">
			<span v-text="title"></span>
			<svg v-if="isOpen" width="15" height="9" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M7.5 3.181l5.568 5.569 1.59-1.59L7.5 0 .34 7.16l1.592 1.59 5.568-5.569z" fill="#001D68" />
			</svg>
			<svg v-else width="15" height="10" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M7.558 6.103L13.127.534l1.59 1.59-7.16 7.16-7.159-7.16L1.99.535l5.569 5.569z" fill="#001D68" />
			</svg>
		</button>
		<div class="filter-dropdown__menu" :class="{'--open': isOpen}">
			<div class="menu__item" v-for="option in options" :key="option" @click="$emit('input', option)" v-text="option"></div>
		</div>
	</div>
</template>

<script>
export default {
	name: "FilterDropdown",
	props: { title: { type: String }, options: { type: Array } },
	data() {
		return {
			isOpen: false,
		};
	},
	methods: {
		hideDropdown(e) {
			this.isOpen = false;
		},
		toggleDropdown(e) {
			e.stopPropagation();
			this.isOpen = !this.isOpen;
		},
	},
	mounted() {
		document.addEventListener("click", this.hideDropdown);
	},
	destroyed() {
		document.removeEventListener("click", this.hideDropdown);
	},
};
</script>

<style lang="scss" scoped>
@import "../scss/variables";

.filter-dropdown {
	position: relative;
	color: $midnightblue;
	font-size: 12px;

	.filter-dropdown__action {
		display: flex;
		align-items: center;
		justify-content: space-between;
		padding-left: 30px;
		padding-right: 10px;
		border-radius: 6px;
		border: 1px solid transparent;
		background-color: $moonraker14;
		transition: all 0.2s;
		height: 37px;
		min-width: 118px;
		white-space: nowrap;
		color: inherit;
		font-size: inherit;
		svg {
			margin-left: 4px;
			margin-left: 4px;
			transform: scale(0.5);
		}
		&:focus {
			outline: none;
			border-color: $lynch50;
		}
	}
	.filter-dropdown__menu {
		top: 100%;
		color: inherit;
		height: 0;
		width: 100%;
		max-height: 100px;
		position: absolute;
		border-radius: 0 0 3px 3px;
		background-color: $white;
		font-size: inherit;
		overflow: hidden;
		transition: all 0.2s;
		&.--open {
			height: auto;
			padding: 5px 0;
		}
		.menu__item {
			cursor: pointer;
			white-space: nowrap;
			padding: 10px;
			padding: 5px 10px;
			line-height: 1;
		}
	}
}
</style>