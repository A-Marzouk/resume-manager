<template>
	<div class="freelancers-list-view-item">
		<FreelancerProfilePreview :freelancer="profile" @oncontact="$emit('oncontact', $event)" />
		<FreelancerPortfolioPreview :profileIndex="profileIndex" :projects="profile.projects" />
	</div>
</template>

<script>
import FreelancerProfilePreview from "./FreelancerProfilePreview";
import FreelancerPortfolioPreview from "./FreelancerPortfolioPreview";

export default {
	name: "FreelancersListViewItem",
	props: {
		profileIndex: { type: Number },
		profile: { type: Object, required: true },
	},
	components: {
		FreelancerProfilePreview,
		FreelancerPortfolioPreview,
	},
};
</script>

<style lang="scss" scoped>
@import "./scss/media-queries";

.freelancers-list-view-item {
	display: flex;
	align-items: center;
	flex-direction: column;

	.freelancer-profile-preview {
	}
	.freelancer-portfolio-preview {
		margin-top: 20px;
	}
}

@include md {
	.freelancers-list-view-item {
		.freelancer-profile-preview {
		}
	}
}

@include lg {
	.freelancers-list-view-item {
		flex-direction: row;
		.freelancer-profile-preview {
		}
		.freelancer-portfolio-preview {
			margin-top: unset;
			padding-left: 10px;
		}
	}
}

@include xl {
	.freelancers-list-view-item {
		.freelancer-profile-preview {
		}
		.freelancer-portfolio-preview {
		}
	}
}
</style>