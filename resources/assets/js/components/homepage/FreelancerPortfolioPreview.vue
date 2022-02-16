<template>
	<div v-if="projects.length" class="freelancer-portfolio-preview">

		<div class="portfolio__preview--outer" v-if="videos.length > 0">
			<div class="portfolio__preview">
				<video width="100%" controls>
					<source :src="videos[0].url" type="video/mp4">
				</video>
			</div>
		</div>

		<!--<div v-lazy-container="{ selector: 'img' }" class="portfolio__preview&#45;&#45;outer" v-for="(project, projectIndex) in getFirstProjects" :key="project.id">-->
			<!--<div v-if="project.images.length && project.images[0].src" class="portfolio__preview" @click="onPreview(projectIndex)">-->
				<!--<img :data-src="project.images[0].src" :alt="project.name">-->
			<!--</div>-->
		<!--</div>-->
	</div>
</template>

<script>
import sharedStore from "./sharedStore";

export default {
	name: "FreelancerPortfolioPreview",
	props: {
		profileIndex: { type: Number },
		projects: { type: Array, required: true },
		videos: { type: Array, required: true },
	},
	data(){
		return{

		}
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
				.slice(0, this.portfolioNumber);
		},
		portfolioNumber(){
			return this.videos.length > 0 ? 1 : 3 ;
		}
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
	justify-content: flex-end;
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
			transition: all 0.2s;
			border: 1px solid transparent;
			width: fit-content;
			margin-left: auto;
			margin-right: auto;

			&:hover {

			}

			img,video {
				top: 0;
				right: 0;
				width: 100%;
				object-fit: cover;
				cursor: pointer;
				border-radius: 10px;
			}
			video{
				width: 380px;
			}
		}
	}
}
@include md {
	.freelancer-portfolio-preview {
		justify-content: flex-end;
		.portfolio__preview--outer {
			.portfolio__preview {

			}
		}
	}
}

@include lg {
	.freelancer-portfolio-preview {
		justify-content: flex-end;
		.portfolio__preview--outer {
			.portfolio__preview {
				margin-right: 0;
			}
		}
	}
}

@include xl {
	.freelancer-portfolio-preview {
		.portfolio__preview--outer {
			margin-left: 18px;
			margin-right: 18px;

		}
	}
}

@include xxl {
	.freelancer-portfolio-preview {
		.portfolio__preview--outer {

		}

		.portfolio__preview {
			video{

			}
		}
	}
}
</style>