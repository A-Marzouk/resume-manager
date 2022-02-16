<template>
	<div class="freelancers-list-view">
		<FreelancersListViewItem v-for="(profile, profileIndex) in filteredProfiles" :profile="profile" :profileIndex="profileIndex" :key="profile.id" @oncontact="onContact" />
		<ContactFreelancerModal :isOpen="isContactFreelancerModalOpen" :freelancer="contactModalFreelancer" @onclose="onContactFreelancerModalClosed" />
		<PortfolioImagePreviewPoup />
		<PortfolioVideoPreviewPoup />
	</div>
</template>

<script>
import PortfolioImagePreviewPoup from "./PortfolioImagePreviewPoup";
import PortfolioVideoPreviewPoup from "./PortfolioVideoPreviewPoup";
import ContactFreelancerModal from "./ContactFreelancerModal";
import FreelancersListViewItem from "./FreelancersListViewItem";
import sharedStore from "./sharedStore";
import functionsUtils from "./mixins/utils/functions";
export default {
	name: "FreelancersListView",
	components: {
		PortfolioImagePreviewPoup,
		PortfolioVideoPreviewPoup,
		ContactFreelancerModal,
		FreelancersListViewItem,
	},
	mixins: [functionsUtils],
	data() {
		return {
			contactModalFreelancer: {},
			isContactFreelancerModalOpen: false,
			sharedStore,
		};
	},
	computed: {
		filteredProfiles() {
			if (this.sharedStore.state.qPrefix.length === 0) {
				return this.sharedStore.state.workForceProfiles;
			}

			return this.sharedStore.state.workForceProfiles
				.filter((profile) => {
					const skillsMatched =
						profile.skills.filter((skill) => {
							const skillMatched =
								this.sharedStore.state.qPrefix.filter(
									(prediction) => {
										const predictionSegments = this.ensureSingleSpanceBetweenWords(
											prediction.trim().toLowerCase()
										).split(" ");

										const atLeastOneSegmentWasMatched =
											predictionSegments.filter(
												(predictionSegment) => {
													return (
														skill.title
															.trim()
															.toLowerCase()
															.indexOf(
																predictionSegment.toLowerCase()
															) !== -1
													);
												}
											).length > 0;

										return atLeastOneSegmentWasMatched;
									}
								).length >=
								this.sharedStore.state.qPrefix.length;

							return skillMatched;
						}).length > 0;
					return skillsMatched;
				})
				.sort((a, b) => {
					if (a.percentageSum > b.percentageSum) {
						return -1;
					}
					return 1;
				});
		},
	},
	methods: {
		onContact(profile) {
			this.contactModalFreelancer = profile;
			this.isContactFreelancerModalOpen = true;
		},
		onContactFreelancerModalClosed() {
			this.contactModalFreelancer = {};
			this.isContactFreelancerModalOpen = false;
		},
	},
};
</script>

<style lang="scss" scoped>
@import "./scss/variables";
@import "./scss/media-queries";

.freelancers-list-view {
	padding-top: 15px;
	padding-bottom: 15px;
	.freelancers-list-view-item {
		padding-top: 28px;
		padding-bottom: 28px;
		border-bottom: 2px solid rgba(0, 70, 254, 0.1);
		&:last-child {
			border-bottom: none;
		}
	}
}

@include md {
	.freelancers-list-view {
		.freelancers-list-view-item {
			margin-bottom: 34px;
		}
	}
}

@include xl {
	.freelancers-list-view {
		.freelancers-list-view-item {
			padding-top: 30px;
			padding-bottom: 48px;

			&:last-child {
				padding-bottom: 24px;
			}
		}
	}
}
</style>