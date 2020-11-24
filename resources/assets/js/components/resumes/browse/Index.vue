<template>
	<div id="browse-resumes">
		<SearchFreelancersForm />
		<!-- <FilterResumes />
        <SortResumes />
        <ResumesListView /> -->
	</div>
</template>

<script>
import SearchFreelancersForm from "./components/SearchFreelancersForm";

export default {
	name: "Index",
	components: {
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
