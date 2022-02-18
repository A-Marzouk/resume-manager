<template>
	<div v-if="projects.length" class="freelancer-portfolio-preview">

		<div class="portfolio__preview--outer" v-if="videos.length > 0">
			<div class="portfolio__preview">
				<div class="video-holder" @click="playVideo"  v-show="!isVideoPlaying()">
					<img src="/images/home/video-background.png" alt="background" class="background-image">
					<img src="/images/home/video-play-icon.png" alt="play-icon" class="play-icon">
				</div>
				<video width="100%" @pause="videoPaused" controls v-show="isVideoPlaying()" class="videoElement" :id="`video_${videos[0].id}`" >
					<source :src="videos[0].url" type="video/mp4" >
				</video>
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
		playVideo(){
			let currentVideoID = `video_${this.videos[0].id}`;
			let currentVideoElement = document.getElementById(currentVideoID) ;

			$(".videoElement:not(currentVideoID)").each(function() {
				$(this).get(0).pause();
			});

			currentVideoElement.play();

			this.$forceUpdate();

		},
		isVideoPlaying(){
			let currentVideoElement = document.getElementById(`video_${this.videos[0].id}`) ;
			if(currentVideoElement){
				return !currentVideoElement.paused
			}

			return  false;
		},
		videoPaused(){
			console.log('video paused');
			this.$forceUpdate();
		}
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

			.video-holder{
				position: relative;
				width: auto;
				height: 200px;
				border-radius: 10px;
				overflow: hidden;

				&:hover{
					cursor: pointer;
				}

				.background-image{
					border-radius: 10px;
					width: 100%;
				}

				.play-icon{
					position: absolute;
					top: calc(50% - 15px);
					left: calc(50% - 13px);
					width: 26px;
					height: 30px;
				}
			}

			video {
				top: 0;
				right: 0;
				width: 100%;
				height: 200px;
				object-fit: cover;
				cursor: pointer;
				border-radius: 10px;
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