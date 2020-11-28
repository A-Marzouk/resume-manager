<template>
	<div class="animated-introduction">
		<div class="container">
			<h2 class="introduction__title">
				Trusted Freelance Designers
				<span class="title--from">at</span> <span class="title--rate">$15/hr</span>
			</h2>
			<h3 class="introduction__subtitle">Scale your Creative Workforce with no overheads.</h3>
			<div class="introduction__job-titles">
				<span class="job-titles__animated-text" v-text="typeValue"></span>
				<span class="cursor" :class="{ typing: typeStatus }">&nbsp;</span>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	name: "AnimatedIntroduction",
	props: { typeArray: { type: Array } },
	data() {
		return {
			typeValue: "",
			charIndex: 0,
			typeStatus: false,
			typingSpeed: 100,
			erasingSpeed: 100,
			newTextDelay: 1000,
			typeArrayIndex: 0,
		};
	},
	methods: {
		typeText() {
			if (this.charIndex < this.typeArray[this.typeArrayIndex].length) {
				if (!this.typeStatus) this.typeStatus = true;
				this.typeValue += this.typeArray[this.typeArrayIndex].charAt(
					this.charIndex
				);
				this.charIndex += 1;
				setTimeout(this.typeText, this.typingSpeed);
			} else {
				this.typeStatus = false;
				setTimeout(this.eraseText, this.newTextDelay);
			}
		},
		eraseText() {
			if (this.charIndex > 0) {
				if (!this.typeStatus) this.typeStatus = true;
				this.typeValue = this.typeArray[this.typeArrayIndex].substring(
					0,
					this.charIndex - 1
				);
				this.charIndex -= 1;
				setTimeout(this.eraseText, this.erasingSpeed);
			} else {
				this.typeStatus = false;
				this.typeArrayIndex += 1;
				if (this.typeArrayIndex >= this.typeArray.length)
					this.typeArrayIndex = 0;
				setTimeout(this.typeText, this.typingSpeed + 1000);
			}
		},
	},
	mounted() {
		setTimeout(this.typeText, this.newTextDelay + 200);
	},
};
</script>

<style lang="scss" scoped>
@import "./scss/variables";
@import "./scss/media-queries";

.animated-introduction {
	font-size: 2.5rem;
	line-height: 5rem;

	.introduction__title {
		width: 242px;
		font-size: 26px;
		font-weight: 500;
		line-height: 1.5;
		margin-bottom: unset;
		color: $midnightblue;

		.title--from {
			font-size: 20px;
			font-weight: 400;
		}

		.title--rate {
			color: $lightblue;
		}
	}
	.introduction__subtitle {
		color: $lynch;
		font-size: 14px;
		line-height: 2;
		font-weight: 500;
	}
	.introduction__job-titles {
		color: $lightblue;
		overflow: hidden;
		font-size: 20px;
		font-weight: 500;
		line-height: 32px;
		white-space: nowrap;

		.job-titles__animated-text {
		}
		.cursor {
			width: 3px;
			display: inline-block;
			margin-left: 3px;
			background-color: $midnightblue;
			animation: cursor-blink 1s infinite;
			animation-fill-mode: forwards;
			&.typing {
				animation: none;
			}
		}
	}

	@include sm {
		.introduction__title {
			width: 350px;
		}
		.introduction__subtitle {
			font-size: 16px;
		}
	}

	@include md {
		.introduction__title {
			width: 638px;
			font-size: 38px;
			.title--from {
				font-size: 34px;
			}
			.title--rate {
			}
		}
		.introduction__subtitle {
			font-size: 22px;
			font-weight: 400;
			line-height: 2.1;
			margin-bottom: 18px;
		}
		.introduction__job-titles {
			font-size: 34px;
			line-height: 40px;
		}
	}

	@include lg {
		.introduction__title {
			width: auto;
			font-weight: 700;
		}
		.introduction__job-titles {
			font-size: 36px;
		}
	}

	@include xl {
		.introduction__title {
			font-size: 52px;
			.title--from {
				font-size: 42px;
			}
		}
		.introduction__subtitle {
			font-size: 30px;
		}
		.introduction__job-titles {
			font-size: 38px;
			line-height: 44px;
		}
	}
}

@keyframes cursor-blink {
	49% {
		background-color: $midnightblue;
	}
	50% {
		background-color: transparent;
	}
	99% {
		background-color: transparent;
	}
}
</style>