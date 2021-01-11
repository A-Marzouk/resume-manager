<template>
	<header class="header">
		<nav class="header__navbar">
			<div class="container">
				<div class="d-flex justify-content-between align-items-center">
					<div class="navbar__logo">
						<a href="/">
							<img src="/images/new_homepage/logo.svg" alt="123workforce logo" />
						</a>
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
			position: relative;
			text-align: center;
			a {
				display: flex;
				img {
					width: auto;
					height: 40px;
				}
			}
			.logo__hint {
				position: absolute;
				left: 48px;
				top: 27px;
				color: $lynch;
				font-size: 9.7px;
				font-weight: 500;
				white-space: nowrap;
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
				height: 40px;
				font-size: 14px;
				min-width: 92px;
				border: 1.5px solid;
				line-height: 1;
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
						height: 44px;
					}
				}
				.logo__hint {
					left: 52px;
					top: 30px;
					font-size: 10.7px;
				}
			}
			.navbar__links {
				.navbar-link--login {
					height: 44px;
					font-size: 16px;
					min-width: 119px;
					border-radius: 100px;
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
						height: 64px;
					}
				}
				.logo__hint {
					left: 76px;
					top: 44px;
					font-size: 15.5px;
				}
			}
			.navbar__links {
				.navbar-link--login {
					height: 50px;
					font-size: 24px;
					min-width: 178px;
				}
			}
		}
	}
}
</style>