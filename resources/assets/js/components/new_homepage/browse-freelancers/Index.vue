<template>
	<div id="browse-resumes">
		<SearchFreelancersForm />
		<FilterFreelancers />
		<FreelancersListView />
	</div>
</template>

<script>
import FilterFreelancers from "./components/FilterFreelancers";
import FreelancersListView from "./components/FreelancersListView";
import SearchFreelancersForm from "./components/SearchFreelancersForm";

export default {
	name: "Index",
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
