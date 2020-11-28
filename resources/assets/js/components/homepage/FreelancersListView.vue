<template>
	<div class="freelancers-list-view">
		<FreelancersListViewItem v-for="freelancer in freelancers" :freelancer="freelancer" :key="freelancer.id" @oncontact="onContact" />
		<ContactFreelancerModal :isOpen="isContactFreelancerModalOpen" :freelancer="contactModalFreelancer" @onclose="onContactFreelancerModalClosed" />
	</div>
</template>

<script>
import ContactFreelancerModal from "./ContactFreelancerModal";
import FreelancersListViewItem from "./FreelancersListViewItem";
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
			freelancers: [
				{
					id: 1,
					avatar: "/images/freelancers/Anton.jpg",
					full_name: "Jhone",
					title: "Jhone - ui designer",
					hourlyRate: 25,
					portfolio: [
						{
							id: 1,
							preview: "/images/dummy/portfolio/portfolio-1.png",
						},
						{
							id: 2,
							preview: "/images/dummy/portfolio/portfolio-2.png",
						},
						{
							id: 3,
							preview: "/images/dummy/portfolio/portfolio-3.png",
						},
					],
					tags: [
						{
							id: 1,
							tag: "Ui",
						},
						{
							id: 2,
							tag: "Ux",
						},
						{
							id: 3,
							tag: "Web",
						},
						{
							id: 4,
							tag: "Design",
						},
						{
							id: 5,
							tag: "Adobe Xd",
						},
						{
							id: 6,
							tag: "Figma",
						},
					],
				},
				{
					id: 2,
					avatar: "/images/freelancers/Anton.jpg",
					full_name: "Jhone",
					title: "Jhone - ui designer",
					hourlyRate: 25,
					portfolio: [
						{
							id: 1,
							preview: "/images/dummy/portfolio/portfolio-1.png",
						},
						{
							id: 2,
							preview: "/images/dummy/portfolio/portfolio-2.png",
						},
						{
							id: 3,
							preview: "/images/dummy/portfolio/portfolio-3.png",
						},
					],
					tags: [
						{
							id: 1,
							tag: "Ui",
						},
						{
							id: 2,
							tag: "Ux",
						},
						{
							id: 3,
							tag: "Web",
						},
						{
							id: 4,
							tag: "Design",
						},
						{
							id: 5,
							tag: "Adobe Xd",
						},
						{
							id: 6,
							tag: "Figma",
						},
					],
				},
				{
					id: 3,
					avatar: "/images/freelancers/Anton.jpg",
					full_name: "Jhone",
					title: "Jhone - ui designer",
					hourlyRate: 25,
					portfolio: [
						{
							id: 1,
							preview: "/images/dummy/portfolio/portfolio-1.png",
						},
						{
							id: 2,
							preview: "/images/dummy/portfolio/portfolio-2.png",
						},
						{
							id: 3,
							preview: "/images/dummy/portfolio/portfolio-3.png",
						},
					],
					tags: [
						{
							id: 1,
							tag: "Ui",
						},
						{
							id: 2,
							tag: "Ux",
						},
						{
							id: 3,
							tag: "Web",
						},
						{
							id: 4,
							tag: "Design",
						},
						{
							id: 5,
							tag: "Adobe Xd",
						},
						{
							id: 6,
							tag: "Figma",
						},
					],
				},
			],
		};
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
		padding-top: 24px;
		padding-bottom: 12px;
		border-bottom: 1px solid $moonraker;
		&:last-child {
			border-bottom: none;
		}
	}
}

@include lg {
	.freelancers-list-view {
		.freelancers-list-view-item {
			border-bottom: none;
			padding-bottom: 24px;
		}
	}
}

@include xl {
	.freelancers-list-view {
		padding-top: 20px;
		padding-bottom: 20px;
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