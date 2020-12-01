<template>
	<div class="freelancer-portfolio-preview">
		<div class="portfolio__preview--outer" v-for="project in portfolio" :key="project.id">
			<div class="portfolio__preview">
				<img :src="project.preview" :alt="project.title || 'portfolio title'">
			</div>
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
@import "./scss/variables";
@import "./scss/media-queries";

.freelancer-portfolio-preview {
	padding: 0;
	display: flex;
	width: 100%;
	.portfolio__preview--outer {
		flex: 1;
		margin-left: 5px;
		margin-right: 5px;
		&:first-child {
			margin-left: 0;
		}
		&:last-child {
			margin-right: 0;
		}
		.portfolio__preview {
			position: relative;
			transition: all 0.2s;
			padding-top: 92%;
			border: 1px solid transparent;
			&:hover {
				border-color: $lynch50;
			}
			img {
				position: absolute;
				top: 0;
				righ: 0;
				width: 100%;
				height: 100%;
				object-fit: cover;
			}
		}
	}
}

@include lg {
	.freelancer-portfolio-preview {
		.portfolio__preview--outer {
			.portfolio__preview {
			}
		}
	}
}

@include xl {
	.freelancer-portfolio-preview {
		.portfolio__preview--outer {
			margin-left: 18px;
			margin-right: 18px;
			.portfolio__preview {
			}
		}
	}
}
</style>