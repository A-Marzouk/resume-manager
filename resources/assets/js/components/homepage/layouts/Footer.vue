<template>
	<footer class="footer">
		<div class="container">
			<div class="footer__logo">
				<a href="/">
					<img src="/images/new_homepage/logo.png" alt="123workforce logo" />
				</a>
			</div>
			<div class="footer__social-links">
				<h3>Follow us</h3>
				<a class="social-links__link" href="https://www.facebook.com/123workforce">
					<img src="/images/new_homepage/facebook.svg" alt="123workforce fackbook account" />
					<span>13.899 like</span>
				</a>
				<a class="social-links__link" href="https://www.instagram.com/123workforce">
					<img src="/images/new_homepage/instagram.svg" alt="123workforce instagram account" />
					<span>733 Followers</span>
				</a>
			</div>
			<div class="footer__contact-info">
				<h3>Contact us</h3>
				<div class="contact-info__links">
					<a :href="icon.link" v-for="(icon, i) in socialIcons" :key="i">
						<img :src="icon.src" alt="social icons" />
					</a>
				</div>
			</div>
		</div>
	</footer>
</template>

<script>
export default {
	name: "Footer",
	data() {
		return {
			socialIcons: [
				{
					src: "/images/new_homepage/whatsapp.svg",
					link: "https:/wa.me/353868447832",
				},
				{
					src: "/images/new_homepage/skype.svg",
					link: "skype:magictime.uk?chat",
				},
				{
					src: "/images/new_homepage/gmail.svg",
					link: "mailto:conor@123workforce.com",
				},
				{
					src: "/images/new_homepage/telegram.svg",
					link: "https:/t.me/conormarjoram",
				},
			],
		};
	},
};
</script>

<style lang="scss" scoped>
@import "../scss/variables";
@import "../scss/media-queries";

.footer {
	color: $lighterblue;
	margin-top: 10px;
	padding-top: 20px;
	border-top: 1px solid;
	font-family: $main-font;

	& > .container {
		display: flex;
		flex-direction: column;
	}

	.footer__logo {
		a {
			height: 42px;
			display: inline-block;
			img {
				width: auto;
				height: 100%;
			}
		}
	}

	.footer__social-links,
	.footer__contact-info {
		width: 100%;
		display: flex;
		justify-content: space-between;
		align-items: center;
		flex-wrap: wrap;
		padding-top: 34px;
		& > h3 {
			width: 100%;
			font-size: 21px;
			margin-bottom: 15px;
			font-weight: 700;
		}
	}

	.footer__social-links {
		.social-links__link {
			color: inherit;
			display: flex;
			flex-direction: column;
			align-items: center;

			span {
				font-size: 14px;
				margin-top: 5px;
			}
		}
	}

	.footer__contact-info {
		.contact-info__links {
			width: 100%;
			display: flex;
			align-items: center;
			justify-content: center;
			& > a {
				display: flex;
				align-items: center;
				justify-content: center;
				width: 44px;
				height: 44px;
				border-radius: 50%;
				background-color: $lighterblue;
				margin-right: 15px;

				&:last-child {
					margin-right: unset;
				}
			}
		}
	}
}

@include md {
	.footer {
		& > .container {
			flex-wrap: wrap;
			flex-direction: row;
			justify-content: space-between;
		}

		.footer__logo {
			width: 100%;
		}

		.footer__social-links,
		.footer__contact-info {
			width: auto;
		}

		.footer__social-links {
			justify-content: flex-start;
			.social-links__link {
				margin-right: 24px;
				&:last-child {
					margin-right: unset;
				}
			}
		}

		.footer__contact-info {
			.contact-info__links {
				justify-content: flex-start;
			}
		}
	}
}

@include lg {
	.footer {
		& > .container {
			align-items: center;
		}
		.footer__logo {
			width: auto;
			a {
				height: 34px;
			}
		}

		.footer__social-links,
		.footer__contact-info {
			padding-top: unset;
			& > h3 {
				width: auto;
				margin-bottom: 0;
				font-size: 18px;
				margin-right: 12px;
			}
		}

		.footer__social-links {
			.social-links__link {
				flex-direction: row;
				margin-right: 14px;
				span {
					margin-left: 6px;
					margin-top: unset;
				}
			}
		}

		.footer__contact-info {
			.contact-info__links {
				width: auto;
			}
		}
	}
}

@include xl {
	.footer {
		.footer__logo {
			width: auto;
			a {
				height: 52px;
			}
		}

		.footer__social-links,
		.footer__contact-info {
			& > h3 {
				font-size: 27px;
				margin-right: 18px;
			}
		}

		.footer__social-links {
			.social-links__link {
				margin-right: 20px;
				span {
					margin-left: 9px;
					font-size: 18px;
				}
			}
		}

		.footer__contact-info {
			.contact-info__links {
			}
		}
	}
}
</style>