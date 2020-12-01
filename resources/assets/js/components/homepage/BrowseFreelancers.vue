<template>
	<div class="browse-freelancers">
		<div class="container">
			<SearchFreelancersForm />
			<FilterFreelancers />
			<FreelancersListView />
		</div>
	</div>
</template>

<script>
export default {
	name: "BrowseFreelancers",
	components: {
		FilterFreelancers: require("./FilterFreelancers"),
		FreelancersListView: require("./FreelancersListView"),
		SearchFreelancersForm: require("./SearchFreelancersForm"),
	},
};
</script>

<style lang="scss" scoped>
@import "./scss/variables";

.browse-freelancers {
	font-family: $main-font;
	padding-top: 32px;
	background-color: $white;
}
</style>
