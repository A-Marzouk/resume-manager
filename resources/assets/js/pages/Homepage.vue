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
@import "../components/homepage/browse-freelancers/scss/variables";
@import "../components/homepage/browse-freelancers/scss/media-queries";

.homepage-body {
	margin: 0 !important;
	padding: 0 !important;
	background-color: white !important;

	.container {
		padding-left: 8px;
		padding-right: 8px;

		@include sm {
			max-width: $sm;
			padding-left: 16px;
			padding-right: 16px;
		}

		@include md {
			max-width: $md;
			padding-left: 30px;
			padding-right: 30px;
		}

		@include lg {
			max-width: $lg;
			padding-left: 32px;
			padding-right: 32px;
		}

		@include xl {
			max-width: $xl;
			padding-left: 52px;
			padding-right: 52px;
		}

		@include xxl {
			max-width: $xxl;
			padding-left: 85px;
			padding-right: 85px;
		}
	}
}
</style>

<style lang="scss" scoped>
#homepage {
}
</style>