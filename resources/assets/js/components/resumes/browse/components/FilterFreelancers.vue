<template>
	<div class="filter-freelancers">
		<div class="filter-freelancers__right-side">
			<FilterDropdown title="Job title" v-model="filters.jobTitle" :options="jobTitles" />
			<FilterCheckbox prefix title="Primary skills" v-model="filters.primarySkills" />
			<FilterCheckbox title="Second skills" v-model="filters.SecondSkills" />
		</div>
		<div class="filter-freelancers__left-side">
			<FilterDropdown title="Sort By" v-model="sortBy" muted :options="sortOptions" />
		</div>
	</div>
</template>

<script>
import FilterCheckbox from "./FilterCheckbox";
import FilterDropdown from "./FilterDropdown";

export default {
	name: "FilterFreelancers",
	components: { FilterCheckbox, FilterDropdown },
	data() {
		return {
			filters: {
				jobTitle: "",
				primarySkills: true,
				SecondSkills: false,
			},
			sortBy: "",
			sortOptions: [
				{ id: 1, value: "Job titles" },
				{ id: 2, value: "Skills" },
				{ id: 3, value: "Portfolio" },
			],
			jobTitles: [
				{ id: 1, value: "Front-end engineer" },
				{ id: 2, value: "UI/UX" },
				{ id: 3, value: "Designer" },
				{ id: 4, value: "Back-end engineer" },
				{ id: 5, value: "Senior developer" },
				{ id: 6, value: "Project manager" },
			],
		};
	},
};
</script>

<style lang="scss" scoped>
@import "../scss/variables";
@import "../scss/media-queries";

.filter-freelancers {
	display: flex;
	align-items: center;
	justify-content: space-between;
	flex-wrap: wrap;
	margin: 28px auto 0;
	max-width: 986px;
	padding-bottom: 5px;
	.filter-freelancers__right-side {
		width: 100%;
		display: flex;
		align-items: center;
		justify-content: space-around;
		flex-wrap: wrap;
	}
	.filter-freelancers__left-side {
		width: 100%;
		display: flex;
		padding-top: 34px;
		.filter-dropdown {
			margin-left: auto;
		}
	}
}

@include sm {
	.filter-freelancers {
		.filter-freelancers__right-side {
			justify-content: flex-start;
		}
	}
}

@include md {
	.filter-freelancers {
		.filter-freelancers__right-side {
			width: auto;
		}
		.filter-freelancers__left-side {
			width: auto;
			padding-top: unset;
		}
	}
}

@include xl {
	.filter-freelancers {
		max-width: 1467px;
		.filter-freelancers__right-side {
		}
		.filter-freelancers__left-side {
		}
	}
}

@include xxl {
	.filter-freelancers {
		max-width: 1700px;
		.filter-freelancers__right-side {
		}
		.filter-freelancers__left-side {
		}
	}
}
</style>