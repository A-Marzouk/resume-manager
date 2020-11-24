<template>
	<div class="freelancers-list-view">
		<FreelancersListViewItem v-for="freelancer in freelancers" :freelancer="freelancer" :key="freelancer.id" />
	</div>
</template>

<script>
import FreelancersListViewItem from "./FreelancersListViewItem";
export default {
	name: "FreelancersListView",
	components: {
		FreelancersListViewItem,
	},
	data() {
		return {
			freelancers: [
				{
					id: 1,
					avatar: "/images/freelancers/Anton.jpg",
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
							tag: "Figma",
						},
					],
				},
			],
		};
	},
};
</script>

<style lang="scss" scoped>
.freelancers-list-view {
	padding-top: 15px;
	padding-bottom: 15px;
}
</style>