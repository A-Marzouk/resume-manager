<template>
	<div id="browse-resumes">
		<SearchFreelancersForm />
		<FilterFreelancers />
		<!--
        <SortResumes />
        <ResumesListView /> -->
	</div>
</template>

<script>
import FilterFreelancers from "./components/FilterFreelancers";
import SearchFreelancersForm from "./components/SearchFreelancersForm";

export default {
	name: "Index",
	components: {
		FilterFreelancers,
		SearchFreelancersForm,
	},
};
</script>

<style lang="scss" scoped>
@import "./scss/variables";

#browse-resumes {
	background-color: $white;
}
</style>
