<template>
	<div class="freelancers-list-view-item">
		<FreelancerProfilePreview :freelancer="freelancer" />
		<FreelancerPortfolioPreview :portfolio="freelancer.portfolio" />
	</div>
</template>

<script>
import FreelancerProfilePreview from "./FreelancerProfilePreview";
import FreelancerPortfolioPreview from "./FreelancerPortfolioPreview";

export default {
	name: "FreelancersListViewItem",
	props: {
		freelancer: { type: Object, required: true },
	},
	components: {
		FreelancerProfilePreview,
		FreelancerPortfolioPreview,
	},
};
</script>

<style lang="scss" scoped>
.freelancers-list-view-item {
	display: flex;
	flex-direction: column;

	.freelancer-profile-preview {
		margin-bottom: 20px;
	}
}
</style>