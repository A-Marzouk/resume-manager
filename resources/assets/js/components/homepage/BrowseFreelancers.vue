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
import infiniteScroll from "./mixins/utils/infinite-scroll";

export default {
	name: "BrowseFreelancers",
	components: {
		FilterFreelancers: require("./FilterFreelancers"),
		FreelancersListView: require("./FreelancersListView"),
		SearchFreelancersForm: require("./SearchFreelancersForm"),
	},
	mixins: [infiniteScroll],
	data() {
		return {
			sharedStore,
			ready: false,
		};
	},
	methods: {
		loadProfiles() {
			this.initialLoad(
				"/get-civ-profiles",
				undefined,
				undefined,
				"loadMoreProfiles"
			).then((data) => {
				this.sharedStore.mutations.setWorkforceProfiles(data);
				this.ready = true;
			});
		},
		loadMoreProfiles() {
			this.loadMore().then((data) => {
				this.sharedStore.mutations.setWorkforceProfiles(data, true);
			});
		},
	},
	created() {
		this.loadProfiles();
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
