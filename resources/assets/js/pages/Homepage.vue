<template>
	<div id="homepage">
		<Header />
	</div>
</template>

<script>
import Header from "../components/homepage/layouts/Header";
export default {
	name: "Homepage",
	components: { Header },
	mounted() {
		document.body.classList.add("homepage-body");
	},
};
</script>

<style lang="scss">
@import "../components/homepage/browse-freelancers/scss/media-queries";

.homepage-body {
	margin: 0 !important;
	padding: 0 !important;
	background-color: white !important;

	.container {
		@include xl {
			max-width: 1600px;
			padding-left: 52px;
			padding-right: 52px;
		}
	}
}
</style>

<style lang="scss" scoped>
#homepage {
}
</style>