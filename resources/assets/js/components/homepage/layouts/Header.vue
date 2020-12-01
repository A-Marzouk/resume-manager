<template>
	<header class="header">
		<nav class="header__navbar">
			<div class="container">
				<div class="d-flex justify-content-between align-items-center">
					<div class="navbar__logo">
						<a href="/">
							<img src="/images/new_homepage/logo.png" alt="123workforce logo" />
						</a>
						<h2 class="logo__hint">The Top 1% of Designers</h2>
					</div>

					<div class="navbar__links">
						<a href="/client/login" class="navbar-link navbar-link--login">
							Login
						</a>
					</div>
				</div>
			</div>
		</nav>
	</header>
</template>

<script>
export default {
	name: "Header",
};
</script>

<style lang="scss" scoped>
@import "../scss/variables";
@import "../scss/media-queries";

.header {
	padding-top: 28px;
	padding-bottom: 32px;
	font-family: $main-font;

	.header__navbar {
		.navbar__logo {
			text-align: center;
			a {
				img {
					width: auto;
					height: 33px;
				}
			}
			.logo__hint {
				color: $lynch;
				font-size: 10px;
				font-weight: 500;
				margin-left: 28px;
				margin-top: -5px;
				margin-bottom: unset;
			}
		}
		.navbar__links {
			.navbar-link {
				display: flex;
				align-items: center;
				justify-content: center;
			}
			.navbar-link--login {
				color: $blue;
				height: 32px;
				font-size: 14px;
				font-weight: 600;
				padding-left: 22px;
				padding-right: 22px;
				border: 1.5px solid;
				transition: all 0.2s;
				border-radius: 100px;
				&:hover {
					color: white;
					text-decoration: none;
					background-color: $blue;
				}
			}
		}
	}

	@include md {
		padding-top: 20px;
		padding-bottom: 58px;
		.header__navbar {
			.navbar__logo {
				a {
					img {
						height: 35px;
					}
				}
				.logo__hint {
					font-size: 12px;
					margin-left: 40px;
				}
			}
			.navbar__links {
				.navbar-link--login {
					height: 43px;
					font-size: 18px;
					font-weight: 500;
					padding-left: 35px;
					padding-right: 35px;
					border-width: 2px;
				}
			}
		}
	}

	@include lg {
		padding-bottom: 52px;
	}

	@include xl {
		padding-top: 54px;
		padding-bottom: 72px;
		.header__navbar {
			.navbar__logo {
				a {
					img {
						height: 55px;
					}
				}
				.logo__hint {
					font-size: 14px;
					margin-left: 10px;
					margin-top: -7px;
				}
			}
			.navbar__links {
				.navbar-link--login {
					height: 53px;
					font-size: 24px;
					padding: 0 56px;
				}
			}
		}
	}
}
</style>