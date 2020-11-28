<template>
	<div class="filter-dropdown">
		<button class="filter-dropdown__action" :class="{'--muted': muted}" type="button" @click="toggleDropdown">
			<span v-text="getTitle"></span>
			<svg :class="isOpen ? 'up' : 'down'" width="15" height="10" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M7.558 6.103L13.127.534l1.59 1.59-7.16 7.16-7.159-7.16L1.99.535l5.569 5.569z" fill="#001D68" />
			</svg>
		</button>
		<div class="filter-dropdown__menu" :class="{'--open': isOpen}">
			<div v-if="value" class="menu__item" @click="$emit('input', '')">{{ title }}</div>
			<div class="menu__item" :class="{'--selected': option.value===value}" v-for="option in options" :key="option.id" @click="$emit('input', option.value)" v-text="option.value"></div>
		</div>
	</div>
</template>

<script>
export default {
	name: "FilterDropdown",
	props: {
		title: { type: String },
		options: { type: Array },
		value: { type: String },
		muted: { type: Boolean, default: false },
	},
	data() {
		return {
			isOpen: false,
		};
	},
	computed: {
		getTitle() {
			const title = this.value || this.title;
			return title.substr(0, 11);
		},
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
@import "./scss/variables";
@import "./scss/media-queries";

.filter-dropdown {
	position: relative;
	font-size: 12px;
	color: $midnightblue;

	.filter-dropdown__action {
		display: flex;
		align-items: center;
		justify-content: space-between;
		padding-left: 9px;
		padding-right: 9px;
		border-radius: 6px;
		border: 1px solid transparent;
		background-color: $moonraker14;
		transition: all 0.2s;
		height: 37px;
		white-space: nowrap;
		color: inherit;
		font-size: inherit;
		min-width: 100px;
		margin-bottom: 5px;

		&.--muted {
			color: $moonraker;
		}
		svg {
			margin-left: 4px;
			transition: all 0.2s;
			&.up {
				transform: scale(0.5) rotate(180deg);
			}
			&.down {
				transform: scale(0.5) rotate(0deg);
			}
		}
		&:focus {
			outline: none;
			border-color: $lynch50;
		}
	}
	.filter-dropdown__menu {
		top: 100%;
		left: 0;
		color: inherit;
		height: 0;
		min-width: 100%;
		max-height: 100px;
		position: absolute;
		border-radius: 0 0 3px 3px;
		background-color: $white;
		font-size: inherit;
		overflow: auto;
		transition: all 0.2s;
		z-index: 30;
		&::-webkit-scrollbar {
			display: none;
			scrollbar-width: none;
			-ms-overflow-style: none;
		}
		&.--open {
			height: auto;
			padding: 5px 0;
		}
		.menu__item {
			cursor: pointer;
			white-space: nowrap;
			padding: 5px 10px;
			line-height: 1;
			&.--selected {
				color: $blue;
				font-weight: 700;
			}
		}
	}
}

@include lg {
	.filter-dropdown {
		font-size: 20px;
		.filter-dropdown__action {
			height: 50px;
			padding-left: 28px;
			padding-right: 28px;
			svg {
				margin-left: 8px;
				&.up {
					transform: scale(0.9) rotate(180deg);
				}
				&.down {
					transform: scale(0.9) rotate(0deg);
				}
			}
		}
		.filter-dropdown__menu {
			font-size: 16px;
			max-height: 120px;

			&.--open {
				padding: 9px 0;
			}
			.menu__item {
				padding: 9px 10px;
			}
		}
	}
}

@include xl {
	.filter-dropdown {
		font-size: 26px;
		.filter-dropdown__action {
			height: 74px;
			padding-left: 50px;
			padding-right: 50px;
			svg {
				&.up {
					transform: scale(1) rotate(180deg);
				}
				&.down {
					transform: scale(1) rotate(0deg);
				}
			}
		}
		.filter-dropdown__menu {
			font-size: 20px;
			max-height: 180px;
			&.--open {
				padding: 10px 0;
			}
			.menu__item {
				padding: 10px 14px;
			}
		}
	}
}
</style>