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
				<div class="social-links__links">

					<a class="social-links__link" href="https://www.facebook.com/123workforce">
						<img src="/images/new_homepage/facebook.svg" alt="123workforce fackbook account" />
						<span>13.899 like</span>
					</a>
					<a class="social-links__link" href="https://www.instagram.com/123workforce">
						<img src="/images/new_homepage/instagram.svg" alt="123workforce instagram account" />
						<span>733 Followers</span>
					</a>
				</div>
			</div>
			<div class="footer__contact-info">
				<h3>Contact us</h3>
				<div class="contact-info__links">
					<a class="contact-info__link" :href="icon.link" v-for="(icon, i) in socialIcons" :key="i">
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
	padding: 20px 0;
	border-top: 1px solid;
	font-family: $main-font;

	& > .container {
		display: flex;
		flex-direction: column;
	}

	.footer__logo {
		text-align: center;
		a {
			height: 28px;
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
		align-items: center;
		flex-wrap: wrap;
		padding-top: 24px;
		& > h3 {
			font-size: 18px;
			font-weight: 700;
			margin-bottom: unset;
			min-width: 110px;
		}
	}

	.social-links__link,
	.contact-info__link {
		margin-right: 13px;
		&:last-child {
			margin-right: unset;
		}
	}

	.footer__social-links {
		.social-links__links {
			flex: 1;
			display: flex;
			align-items: center;
			.social-links__link {
				color: inherit;
				display: flex;
				align-items: center;

				img {
					width: 32px;
					height: 32px;
				}
				span {
					font-size: 14px;
					margin-left: 3px;
				}
			}
		}
	}

	.footer__contact-info {
		.contact-info__links {
			flex: 1;
			display: flex;
			align-items: center;

			& > a {
				display: flex;
				align-items: center;
				justify-content: center;
				width: 32px;
				height: 32px;
				border-radius: 50%;
				background-color: $lighterblue;

				img {
					width: auto;
					height: 22px;
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
			.social-links__links {
				justify-content: flex-start;
			}
		}
		.footer__contact-info {
			justify-content: flex-start;
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
				height: 32px;
			}
		}

		.footer__social-links,
		.footer__contact-info {
			width: auto;
			padding-top: unset;
		}
	}
}
</style>