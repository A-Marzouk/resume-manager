<template>
	<footer class="footer">
		<div class="container">
			<div class="footer__logo">
				<a href="/">
					<img class="footer__logo--text" src="/images/new_homepage/logo.svg" alt="123workforce logo" />
					<img class="footer__logo--icon" src="/images/new_homepage/logo-icon.svg" alt="123workforce logo icon" />
				</a>
				<h2 class="footer__logo--hint mb-0">The Top 1% of Designers</h2>
			</div>
			<div class="footer__social-links">
				<h3>Follow us</h3>
				<div class="social-links__links">

					<a class="social-links__link" href="https://www.facebook.com/123workforce">
						<img src="/images/new_homepage/facebook.svg" alt="123workforce fackbook account" />
						<span class="link__social-count">13.899 like</span>
					</a>
					<a class="social-links__link" href="https://www.instagram.com/123workforce">
						<img src="/images/new_homepage/instagram.svg" alt="123workforce instagram account" />
						<span class="link__social-count">733 Followers</span>
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
			fbChatIframes: [],
		};
	},
	methods: {
		onScroll({ target: body }) {
			if (!document.querySelectorAll("#fb-root iframe").length) return;

			if (!this.fbChatIframes.length) {
				this.fbChatIframes = Array.prototype.slice
					.call(document.querySelectorAll("#fb-root iframe"))
					.map((iframe) => ({
						el: iframe,
						bottom: iframe.style.bottom,
					}))
					.filter((iframe) => iframe.bottom);
			}

			if (!this.fbChatIframes.length) return;

			const scrollBottom =
				body.scrollHeight - body.scrollTop - body.clientHeight;

			this.fbChatIframes.forEach((iframe) => {
				iframe.el.style.transition = "bottom .3s";

				let bottom = parseInt(iframe.bottom);
				if (scrollBottom <= 73) {
					if (document.body.clientWidth < 768) bottom += 184;
					else if (document.body.clientWidth < 1024) bottom += 129;
					else bottom += 54;
				}
				iframe.el.style.bottom = `${bottom}px`;
			});
		},
	},
	mounted() {
		$("body").on("scroll resize`", this.onScroll);
	},
};
</script>

<style lang="scss" scoped>
@import "../scss/variables";
@import "../scss/media-queries";

.footer {
	color: $lighterblue;
	margin-top: 10px;
	padding: 30px 0;
	border-top: 2px solid rgba(0, 70, 254, 0.1);
	font-family: $main-font;

	& > .container {
		display: flex;
		justify-content: space-between;
	}

	.footer__logo {
		a {
			height: 32px;
			display: inline-block;
			img {
				width: auto;
				height: 100%;
				&.footer__logo--text {
					display: none;
				}
			}
		}
		.footer__logo--hint {
			display: none;
		}
	}

	.footer__social-links,
	.footer__contact-info {
		& > h3 {
			font-size: 18px;
			font-weight: 300;
			margin-bottom: 7px;
		}
	}

	.social-links__link,
	.contact-info__link {
		margin-right: 13px;
		.link__social-count {
			display: none;
		}
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
		padding: 20px 0;
		& > .container {
			flex-wrap: wrap;
			flex-direction: row;
			justify-content: space-between;
		}
		.footer__logo {
			position: relative;
			a {
				height: 55px;
				img {
					&.footer__logo--text {
						display: inline;
					}
					&.footer__logo--icon {
						display: none;
					}
				}
			}
			.footer__logo--hint {
				display: block;
				color: $lynch;
				font-size: 14px;
				font-weight: 500;
				position: absolute;
				white-space: nowrap;
				top: 38px;
				left: 65px;
			}
		}
	}
}

@include lg {
	.footer {
		& > .container {
			align-items: center;
		}

		.footer__social-links,
		.footer__contact-info {
			display: flex;
			align-items: center;

			h3 {
				font-size: 24px;
				margin-right: 20px;
				margin-bottom: unset;
			}
		}
	}
}

@include xl {
	.footer {
		.footer__social-links,
		.footer__contact-info {
			h3 {
				font-size: 30px;
				margin-right: 30px;
			}
		}

		.social-links__link {
			margin-right: 40px;
		}

		.footer__social-links {
			.social-links__links {
				.social-links__link {
					img {
						width: 42px;
						height: 42px;
					}
					.link__social-count {
						display: inline;
						font-size: 24px;
						margin-left: 10px;
					}
				}
			}
		}

		.footer__contact-info {
			.contact-info__links {
				& > a {
					width: 42px;
					height: 42px;

					img {
						width: auto;
						height: 26px;
					}
				}
			}
		}
	}
}

@include xxl {
	.footer {
		.footer__logo {
			a {
				height: 80px;
			}
			.footer__logo--hint {
				font-size: 18px;
				top: 58px;
				left: 94px;
			}
		}
	}
}
</style>