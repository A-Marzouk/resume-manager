<template>
	<div class="freelancers-list-view">
		<FreelancersListViewItem v-for="freelancer in filteredProfiles" :freelancer="freelancer" :key="freelancer.id" @oncontact="onContact" />
		<ContactFreelancerModal :isOpen="isContactFreelancerModalOpen" :freelancer="contactModalFreelancer" @onclose="onContactFreelancerModalClosed" />
	</div>
</template>

<script>
import ContactFreelancerModal from "./ContactFreelancerModal";
import FreelancersListViewItem from "./FreelancersListViewItem";
import sharedStore from "./sharedStore";
export default {
	name: "FreelancersListView",
	components: {
		ContactFreelancerModal,
		FreelancersListViewItem,
	},
	data() {
		return {
			contactModalFreelancer: {},
			isContactFreelancerModalOpen: false,
			sharedStore,
		};
	},
	computed: {
		filteredProfiles() {
			return this.sharedStore.state.workForceProfiles;
			return [].filter((r) => {
				return (
					r.skills.filter((s) => {
						return (
							s.title.indexOf(this.sharedStore.state.keyword) !==
							-1
						);
					}).length > 0
				);
			});

			const noPredictionChosen =
					this.sharedStore.state.chosenPredictions.length === 0,
				predictionFilterEnabled = this.sharedStore.methods.isFilterEnabled(
					"pen"
				);

			if (noPredictionChosen || !predictionFilterEnabled) {
				return this.sharedStore.state.workForceProfiles;
			}

			let filtered = this.sharedStore.state.workForceProfiles.filter(
				(profile) => {
					return this.sharedStore.state.chosenPredictions
						.filter(Boolean)
						.every((searchTerm) =>
							profile.skillTitles.includes(
								searchTerm
									.toLowerCase()
									.replace(" designer", "")
									.replace(" fullstack developer", "")
									.replace(" developer", "")
									.replace("front-end", "javascript")
									.replace("back-end", "php")
							)
						);
				}
			);

			return filtered.sort((a, b) => {
				if (a.percentageSum > b.percentageSum) {
					return -1;
				}
				return 1;
			});
		},
	},
	methods: {
		onContact(freelancer) {
			console.log(freelancer);
			this.contactModalFreelancer = freelancer;
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
		padding-top: 12px;
		padding-bottom: 12px;
		border-bottom: 1px solid $moonraker;
		&:last-child {
			border-bottom: none;
		}
	}
}

@include md {
	.freelancers-list-view {
		.freelancers-list-view-item {
			border-bottom: none;
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