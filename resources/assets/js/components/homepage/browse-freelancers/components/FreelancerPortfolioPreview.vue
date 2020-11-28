<template>
	<div class="freelancer-portfolio-preview">
		<div class="portfolio__preview" v-for="project in portfolio" :key="project.id">
			<img :src="project.preview" :alt="project.title || 'portfolio title'">
		</div>
	</div>
</template>

<script>
export default {
	name: "FreelancerPortfolioPreview",
	props: { portfolio: { type: Array, required: true } },
};
</script>

<style lang="scss" scoped>
@import "../scss/variables";
@import "../scss/media-queries";

.freelancer-portfolio-preview {
	padding: 0;
	display: flex;
	.portfolio__preview {
		flex: 1;
		margin-left: 5px;
		margin-right: 5px;
		border: 1px solid transparent;
		transition: all 0.2s;
		&:hover {
			border-color: $lynch50;
		}
		&:first-child {
			margin-left: 0;
		}
		&:last-child {
			margin-right: 0;
		}
		img {
			width: 100%;
		}
	}
}

@include lg {
	.freelancer-portfolio-preview {
		.portfolio__preview {
		}
	}
}

@include xl {
	.freelancer-portfolio-preview {
		.portfolio__preview {
			margin-left: 18px;
			margin-right: 18px;
		}
	}
}
</style>