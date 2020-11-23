<template>
	<div id="browse-resumes">
		<SearchFreelancers />
		<!-- <FilterResumes />
        <SortResumes />
        <ResumesListView /> -->
	</div>
</template>

<script>
import SearchFreelancers from "./components/SearchFreelancers";

export default {
	name: "Index",
	components: {
		SearchFreelancers,
	},
};
</script>

<style lang="scss" scoped>
@import "./scss/variables";

#browse-resumes {
	background-color: $white;
}
</style>
