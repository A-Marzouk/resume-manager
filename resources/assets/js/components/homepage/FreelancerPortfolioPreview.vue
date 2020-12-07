<template>
	<div v-if="projects.length" class="freelancer-portfolio-preview">
		<div v-lazy-container="{ selector: 'img' }" class="portfolio__preview--outer" v-for="(project, projectIndex) in getFirstProjects" :key="project.id">
			<div v-if="project.images.length && project.images[0].src" class="portfolio__preview" @click="onPreview(projectIndex)">
				<img :data-src="project.images[0].src" :alt="project.name">
			</div>
		</div>
	</div>
</template>

<script>
import sharedStore from "./sharedStore";

export default {
	name: "FreelancerPortfolioPreview",
	props: {
		profileIndex: { type: Number },
		projects: { type: Array, required: true },
	},
	computed: {
		getFirstProjects() {
			return this.projects
				.sort((a, b) => {
					if (a.images.length > b.images.length) {
						return -1;
					}
					return 1;
				})
				.slice(0, 3);
		},
	},
	methods: {
		onPreview(projectIndex) {
			sharedStore.state.projectPreview = {
				isOpen: true,
				profileIndex: this.profileIndex,
				projectIndex,
			};
		},
	},
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
		max-width: calc(100% / 3);
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
			background-color: #e5e8fb73;
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
		justify-content: flex-end;
		.portfolio__preview--outer {
			max-width: 127px;
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
			max-width: 180px;
			.portfolio__preview {
			}
		}
	}
}

@include xxl {
	.freelancer-portfolio-preview {
		.portfolio__preview--outer {
			max-width: 198px;
		}
	}
}
</style>