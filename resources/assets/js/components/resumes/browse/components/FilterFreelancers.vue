<template>
	<div class="filter-freelancers">
		<FilterDropdown title="Job title" v-model="filters.jobTitle" :options="jobTitles" />
	</div>
</template>

<script>
import FilterDropdown from "./FilterDropdown";

export default {
	name: "FilterFreelancers",
	components: { FilterDropdown },
	data() {
		return {
			filters: {
				jobTitle: "",
			},
			jobTitles: ["Front-end Engineer", "UI/UX", "Designer"],
		};
	},
};
</script>

<style lang="scss" scoped>
.filter-freelancers {
	display: flex;
	align-items: center;
	justify-content: center;
	margin-top: 28px;
}
</style>