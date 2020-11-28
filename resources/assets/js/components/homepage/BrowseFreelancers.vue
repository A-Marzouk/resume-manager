<template>
	<div id="browse-resumes">
		<SearchFreelancersForm />
		<!-- <FilterFreelancers />
		<FreelancersListView /> -->
	</div>
</template>

<script>
import FilterFreelancers from "./FilterFreelancers";
import FreelancersListView from "./FreelancersListView";
import SearchFreelancersForm from "./SearchFreelancersForm";

export default {
	name: "BrowseFreelancers",
	components: {
		FilterFreelancers,
		FreelancersListView,
		SearchFreelancersForm,
	},
};
</script>

<style lang="scss" scoped>
@import "./scss/variables";

#browse-resumes {
	font-family: $main-font;
	background-color: $white;
}
</style>
