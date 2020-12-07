<template>
	<div class="browse-freelancers">
		<div class="container">
			<SearchFreelancersForm />
			<!-- <FilterFreelancers /> -->
			<FreelancersListView v-if="ready" />
			<div class="loading-profiles-indicator" v-else>
				<img src="/images/animated-svgs/ball-triangle.svg" alt="loading animated svg">
			</div>
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
			ready: false,
		};
	},
	created() {
		if (sharedStore.env.debug) {
			this.sharedStore.mutations.setWorkforceProfiles(dummyCivProfiles);
			this.ready = true;
		} else {
			axios.get("/get-civ-profiles").then((res) => {
				this.sharedStore.mutations.setWorkforceProfiles(res.data);
				this.ready = true;
			});
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

	.loading-profiles-indicator {
		display: flex;
		min-height: 50vh;
		align-items: center;
		flex-direction: column;
		justify-content: center;
		font-size: 14px;
		color: $lighterblue;

		img {
			width: 50px;
			height: auto;
			margin-bottom: 16px;
		}
	}
}
</style>
