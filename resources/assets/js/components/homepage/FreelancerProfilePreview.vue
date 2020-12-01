<template>
	<div class="freelancer-profile-preview">
		<div class="profile-preview__avatar">
			<button class="avatar__video" @click.stop="onVideo">
				<svg class="svg-sm" width="12" height="8" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M11.5.98a.25.25 0 00-.393-.205L11.5.98zm0 0v6.04V.98zM8.4 2.6v.192l.157-.11L11.164.857h0A.15.15 0 0111.4.98v6.04a.15.15 0 01-.16.15.15.15 0 01-.076-.027h0L8.557 5.318l-.157-.11V7.5a.4.4 0 01-.4.4H1a.4.4 0 01-.4-.4v-7A.4.4 0 011 .1h7a.4.4 0 01.4.4v2.1zm0 1.58v.052l.043.03 2 1.4.157.11V2.228l-.157.11-2 1.4-.043.03v.411zM1.5.9h-.1V7.1H7.6V.9H1.5zm1.1 1.2h.8v.8h-.8v-.8z" fill="#001D68" stroke="#fff" stroke-width=".2" />
				</svg>
				<svg class="svg-md" width="24" height="18" viewBox="0 0 24 18" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M17.4606 6.40584L22.97 2.54829C23.0492 2.49276 23.1422 2.46004 23.2387 2.45371C23.3353 2.44737 23.4317 2.46765 23.5175 2.51235C23.6033 2.55705 23.6752 2.62445 23.7253 2.7072C23.7754 2.78994 23.8019 2.88486 23.8018 2.98161V15.7485C23.8019 15.8453 23.7754 15.9402 23.7253 16.0229C23.6752 16.1057 23.6033 16.1731 23.5175 16.2178C23.4317 16.2625 23.3353 16.2827 23.2387 16.2764C23.1422 16.2701 23.0492 16.2374 22.97 16.1818L17.4606 12.3243V16.7631C17.4606 17.0434 17.3492 17.3122 17.151 17.5104C16.9528 17.7086 16.684 17.82 16.4037 17.82H1.60764C1.32735 17.82 1.05853 17.7086 0.860329 17.5104C0.662129 17.3122 0.550781 17.0434 0.550781 16.7631V1.96702C0.550781 1.68672 0.662129 1.4179 0.860329 1.2197C1.05853 1.0215 1.32735 0.910156 1.60764 0.910156H16.4037C16.684 0.910156 16.9528 1.0215 17.151 1.2197C17.3492 1.4179 17.4606 1.68672 17.4606 1.96702V6.40584ZM17.4606 9.74447L21.688 12.7037V6.02537L17.4606 8.98459V9.74341V9.74447ZM2.66451 3.02388V15.7062H15.3469V3.02388H2.66451ZM4.77823 5.13761H6.89196V7.25133H4.77823V5.13761Z" fill="#001D68" />
				</svg>
			</button>
			<img class="avatar__image" :src="freelancer.avatar" :alt="freelancer.title">
			<button class="avatar__contact" @click.stop="$emit('oncontact', freelancer)">
				<svg class="svg-sm" width="12" height="9" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M11.016.4h-9.23C1.24.4.8.83.8 1.353v5.73c0 .529.444.955.984.955h9.231c.54 0 .985-.425.985-.955v-5.73C12 .83 11.562.4 11.016.4zm-.137.636l-3.782 3.65a.993.993 0 01-.696.28c-.263 0-.51-.1-.697-.281L1.923 1.036h8.956zM1.457 6.955v-5.47L4.293 4.22 1.457 6.955zm.466.448L4.758 4.67l.483.466c.31.3.722.466 1.16.466.438 0 .85-.166 1.16-.466l.482-.466 2.835 2.733H1.923zm9.421-.448L8.51 4.22l2.835-2.737v5.47z" fill="#001D68" />
				</svg>
				<svg class="svg-md" width="24" height="18" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M21.89.558H2.11C.943.558 0 1.508 0 2.667v12.656c0 1.167.95 2.11 2.11 2.11h19.78c1.156 0 2.11-.94 2.11-2.11V2.667c0-1.158-.94-2.11-2.11-2.11zm-.295 1.406l-8.103 8.06a2.095 2.095 0 01-1.492.619c-.563 0-1.093-.22-1.493-.62l-8.102-8.06h19.19zM1.406 15.037V2.954L7.483 9l-6.077 6.038zm1 .99L8.48 9.99l1.034 1.028A3.493 3.493 0 0012 12.05c.939 0 1.822-.366 2.485-1.028l1.035-1.03 6.074 6.035H2.406zm20.188-.99l-6.077-6.038 6.077-6.045v12.083z" fill="#001D68" />
				</svg>

			</button>
		</div>
		<div class="profile-preview__detail">
			<h2 class="detail__title">
				<a :href="freelancer.url" target="_blank">
					{{ freelancer.name }}
					<span class="detail-title__jobtitle" v-text="freelancer.job_title"></span>
					<span class="detail-title__rate" v-text="`- $${freelancer.hourlyRate}/hr`"></span>
				</a>
			</h2>
			<div class="detail__tags">
				<div class="tags__tag" v-for="skill in freelancer.skills.slice(0, 6)" :key="skill.id" v-text="skill.title"></div>
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
	data() {
		return {};
	},
	methods: {
		onVideo() {
			console.log("onVideo");
		},
		onContact() {},
	},
};
</script>

<style lang="scss" scoped>
@import "./scss/variables";
@import "./scss/media-queries";

$action-shadow: 0px 4.52941px 9.05882px rgba(0, 16, 131, 0.15);

.freelancer-profile-preview {
	display: flex;
	.profile-preview__avatar {
		position: relative;
		width: 72px;
		min-width: 72px;
		height: 72px;
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
			svg {
				&.svg-md {
					display: none;
				}
			}
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
		margin-left: 7px;
		position: relative;

		.detail__title {
			padding-right: 75px;

			&,
			& a {
				font-size: 17px;
				font-weight: 700;
				margin-bottom: 10px;
				color: $midnightblue;

				.detail-title__jobtitle,
				.detail-title__rate {
					font-size: 13px;
				}
			}
		}
		.detail__tags {
			display: flex;
			flex-wrap: wrap;
			align-items: center;
			.tags__tag {
				padding: 5px;
				font-size: 12px;
				margin: 2px;
				border-radius: 6px;
				color: $midnightblue;
				text-transform: lowercase;
				background-color: $moonraker14;
			}
		}
		.detail__action {
			position: absolute;
			top: 0;
			righ: 0;
			display: flex;
			align-items: center;
			height: 32px;
			right: 0;
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
				display: none;
			}
			.action__rate {
				display: none;
				font-size: 14px;
				font-weight: 700;
				color: $midnightblue;
			}
		}
	}
}

@include md {
	.freelancer-profile-preview {
		width: 100%;
		position: relative;
		.profile-preview__avatar {
			width: 92px;
			min-width: 92px;
			height: 92px;
			.avatar__video,
			.avatar__contact {
				display: none;
				width: 50px;
				height: 50px;
				svg {
					&.svg-sm {
						display: none;
					}
					&.svg-md {
						display: block;
					}
				}
			}
			.avatar__image {
				padding: 10px;
			}
		}
		.profile-preview__detail {
			flex: 1;
			margin-left: 10px;

			.detail__title {
				margin: 7px 0 20px 0;
				padding-right: 165px;

				&,
				& a {
					font-size: 18px;
					.detail-title__jobtitle {
						font-size: inherit;
						font-weight: 400;
					}
					.detail-title__rate {
						display: none;
					}
				}
			}
			.detail__tags {
				.tags__tag {
					padding: 5px 10px;
				}
			}
			.detail__action {
				top: 0;
				right: 0;
				height: 36px;
				position: absolute;
				.action__hireme {
					order: 2;
					font-size: 14px;
					padding-left: 20px;
					padding-right: 20px;
				}
				.action__v-line {
					order: 1;
					display: block;
					height: 96%;
					max-height: 18px;
					margin-left: 12px;
					margin-right: 12px;
					border-right: 2px solid $lynch;
				}
				.action__rate {
					display: block;
					order: 0;
				}
			}
		}
	}
}

@include lg {
	.freelancer-profile-preview {
		.profile-preview__avatar {
			width: 110px;
			min-width: 100px;
			height: 110px;
			.avatar__video,
			.avatar__contact {
				width: 32px;
				height: 32px;
				svg {
					transform: scale(0.9);
				}
			}
			.avatar__image {
				padding: 7px;
			}
		}
		.profile-preview__detail {
			margin-left: 7px;

			.detail__title {
				font-size: 22px;
				margin-bottom: 12px;
				padding-right: 0;
			}
			.detail__tags {
				.tags__tag {
					padding: 5px;
					font-size: 16px;
				}
			}
			.detail__action {
				height: 55px;
				margin-top: 18px;
				position: static;
				.action__hireme {
					font-size: 20px;
					padding-left: 38px;
					padding-right: 38px;
				}
				.action__v-line {
					margin-left: 22px;
					margin-right: 23px;
				}
				.action__rate {
					font-size: 26px;
				}
			}
		}
	}
}

@include lg-xl {
	.freelancer-profile-preview {
		.profile-preview__avatar {
			width: 156px;
			min-width: 156px;
			height: 156px;
			.avatar__video,
			.avatar__contact {
				width: 50px;
				height: 50px;
				svg {
					transform: scale(1);
				}
			}
			.avatar__image {
				padding: 10px;
			}
		}
		.profile-preview__detail {
			margin-left: 10px;

			.detail__title {
				font-size: 30px;
				margin: 7px 0 20px 0;
			}
			.detail__tags {
				.tags__tag {
					font-size: 18px;
					padding: 5px 10px;
				}
			}
			.detail__action {
				height: 46px;
				margin-top: 24px;
				.action__hireme {
					font-size: 18px;
					padding-left: 28px;
					padding-right: 28px;
				}
				.action__v-line {
					margin-left: 22px;
					margin-right: 23px;
				}
				.action__rate {
					font-size: 22px;
				}
			}
		}
	}
}
</style>