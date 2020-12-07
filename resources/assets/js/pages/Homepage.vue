<template>
	<div id="homepage">
		<Header />
		<!-- <AnimatedIntroduction :typeArray="homepageWrittenQuotes" /> -->
		<BrowseFreelancers />
		<Footer />
	</div>
</template>

<script>
import Header from "../components/homepage/layouts/Header";
import Footer from "../components/homepage/layouts/Footer";
import BrowseFreelancers from "../components/homepage/BrowseFreelancers";
import { homepageWrittenQuotes } from "../components/homepage/sharedStore";
import AnimatedIntroduction from "../components/homepage/AnimatedIntroduction";

export default {
	name: "Homepage",
	components: { Header, Footer, BrowseFreelancers, AnimatedIntroduction },
	data() {
		return {
			homepageWrittenQuotes,
		};
	},
	mounted() {
		document.body.classList.add("homepage-body");
	},
};
</script>

<style lang="scss">
@import "../components/homepage/scss/variables";
@import "../components/homepage/scss/media-queries";

.homepage-body {
	margin: 0 !important;
	padding: 0 !important;
	font-family: $main-font;
	background-color: white !important;

	.container {
		padding-top: 0;
		padding-left: 8px;
		padding-right: 8px;
		padding-bottom: 0;

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
	height: 100%;
	display: flex;
	flex-direction: column;
	.browse-freelancers {
		flex-grow: 1;
	}
}
</style>