<template>
	<div class="browse-freelancers">
		<div class="container">
			<SearchFreelancersForm />
			<!-- <FilterFreelancers /> -->
			<FreelancersListView />
		</div>
	</div>
</template>

<script>
import sharedStore from "./sharedStore";
import dummyCivProfiles from "./dummy-api/civ-profiles";

export default {
	name: "BrowseFreelancers",
	components: {
		FilterFreelancers: require("./FilterFreelancers"),
		FreelancersListView: require("./FreelancersListView"),
		SearchFreelancersForm: require("./SearchFreelancersForm"),
	},
	data() {
		return {
			sharedStore,
		};
	},
	created() {
		if (sharedStore.env.debug) {
			this.sharedStore.mutations.setWorkforceProfiles(dummyCivProfiles);
		} else {
			axios
				.get("/get-civ-profiles")
				.then((res) =>
					this.sharedStore.mutations.setWorkforceProfiles(res.data)
				);
		}
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
