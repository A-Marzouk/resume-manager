<template>
	<div class="freelancers-list-view-item">
		<FreelancerProfilePreview :freelancer="freelancer" @oncontact="$emit('oncontact', $event)" />
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
@import "../scss/media-queries";

.freelancers-list-view-item {
	display: flex;
	align-items: center;
	flex-direction: column;

	.freelancer-profile-preview {
		margin-bottom: 20px;
	}
}

@include md {
	.freelancers-list-view-item {
		.freelancer-profile-preview {
			margin-bottom: 26px;
		}
	}
}

@include lg {
	.freelancers-list-view-item {
		max-width: $lg;
		margin-left: auto;
		margin-right: auto;
		flex-direction: row;
		.freelancer-profile-preview {
			width: 100%;
			max-width: 460px;
			margin-bottom: unset;
		}
		.freelancer-portfolio-preview {
			flex: 1;
			padding-left: 10px;
		}
	}
}

@include lg-xl {
	.freelancers-list-view-item {
		max-width: 1578px;
		.freelancer-profile-preview {
			max-width: 584px;
		}
		.freelancer-portfolio-preview {
			padding-left: 28px;
		}
	}
}

@include xl {
	.freelancers-list-view-item {
		max-width: 1721px;
		.freelancer-profile-preview {
		}
		.freelancer-portfolio-preview {
		}
	}
}
</style>