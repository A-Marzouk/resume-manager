<template>
	<div class="freelancer-profile-preview">
		<div class="profile-preview__avatar">
			<button class="avatar__video" @click="onVideo">
				<svg width="12" height="9" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M11.5 1.578a.25.25 0 00-.393-.205l.393.205zm0 0v6.04-6.04zm-3.1 1.62v.192l.157-.11 2.607-1.825h0a.15.15 0 01.236.123v6.04a.15.15 0 01-.236.123h0L8.557 5.916l-.157-.11V8.098a.4.4 0 01-.4.4H1a.4.4 0 01-.4-.4v-7a.4.4 0 01.4-.4h7a.4.4 0 01.4.4v2.1zm0 1.58v.051l.043.03 2 1.4.157.11V2.826l-.157.11-2 1.4-.043.03v.411zm-6.9-3.28h-.1V7.698H7.6V1.498H1.5zm1.1 1.2h.8v.8h-.8v-.8z" fill="#001D68" stroke="#fff" stroke-width=".2" />
				</svg>
			</button>
			<img class="avatar__image" :src="freelancer.avatar" :alt="freelancer.title">
			<button class="avatar__contact" @click="onContact">
				<svg width="12" height="9" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M11.016.997h-9.23c-.545 0-.985.43-.985.955v5.73c0 .528.444.955.984.955h9.231c.54 0 .985-.425.985-.955v-5.73c0-.524-.439-.955-.985-.955zm-.137.637l-3.782 3.65a.993.993 0 01-.696.279c-.263 0-.51-.1-.697-.28l-3.781-3.65h8.956zM1.457 7.552v-5.47L4.293 4.82 1.457 7.552zM1.923 8l2.835-2.732.483.465c.31.301.722.467 1.16.467.438 0 .85-.166 1.16-.466l.482-.466L10.878 8H1.923zm9.421-.448L8.51 4.82l2.835-2.737v5.47z" fill="#001D68" />
				</svg>
			</button>
		</div>
		<div class="profile-preview__detail">
			<h2 class="detail__title" v-text="freelancer.title"></h2>
			<div class="detail__tags">
				<div class="tags__tag" v-for="tag in freelancer.tags" :key="tag.id" v-text="tag.tag"></div>
			</div>
			<div class="detail__action">
				<button class="action__hireme">Hire me</button>
				<span class="action__v-line"></span>
				<div class="action__rate" v-text="`$${freelancer.hourlyRate}/hr`"></div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	name: "FreelancerProfilePreview",
	props: { freelancer: { type: Object, required: true } },
	methods: {
		onVideo() {
			console.log("onVideo");
		},
		onContact() {
			console.log("onContact");
		},
	},
};
</script>

<style lang="scss" scoped>
@import "../scss/variables";
@import "../scss/media-queries";

$action-shadow: 0px 4.52941px 9.05882px rgba(0, 16, 131, 0.15);

.freelancer-profile-preview {
	display: flex;
	.profile-preview__avatar {
		position: relative;
		width: 74px;
		height: 74px;
		.avatar__video,
		.avatar__contact {
			width: 22px;
			height: 22px;
			position: absolute;
			display: flex;
			padding: 0;
			align-items: center;
			justify-content: center;
			border-radius: 50%;
			background-color: $white;
			box-shadow: $action-shadow;
			border: 1px solid transparent;
			transition: all 0.2s;
			&:focus {
				outline: none;
				border-color: $lynch50;
			}
		}
		.avatar__video {
			top: 0;
			right: 0;
			z-index: 20;
		}
		.avatar__image {
			position: absolute;
			width: 100%;
			height: 100%;
			z-index: 10;
			padding: 5px;
			border-radius: 50%;
		}
		.avatar__contact {
			bottom: 0;
			left: 0;
			z-index: 20;
		}
	}
	.profile-preview__detail {
		.detail__title {
			font-size: 20px;
			font-weight: 700;
			margin-bottom: 10px;
			color: $midnightblue;
		}
		.detail__tags {
			display: flex;
			flex-wrap: wrap;
			align-items: center;
			.tags__tag {
				font-size: 12px;
				padding: 5px 8px;
				margin-right: 4px;
				margin-bottom: 4px;
				border-radius: 6px;
				background-color: $moonraker14;
			}
		}
		.detail__action {
			display: flex;
			align-items: center;
			height: 32px;
			margin-top: 6px;
			.action__hireme {
				color: $white;
				border: 0;
				height: 100%;
				font-size: 12px;
				padding-left: 13px;
				padding-right: 13px;
				border-radius: 30px;
				background-color: $darkblue;
			}
			.action__v-line {
				height: 96%;
				margin-left: 12px;
				margin-right: 11px;
				border-right: 2px solid $lynch;
			}
			.action__rate {
				font-size: 14px;
				font-weight: 700;
				color: $midnightblue;
			}
		}
	}
}
</style>