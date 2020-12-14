<template>
	<transition name="fade-contact-freelancer-modal" appear>
		<div v-if="isOpen" class="contact-freelancer-modal">
			<div class="freelancer-modal__content" @click.stop>
				<div class="freelancer-modal__header">
					<h2>Message <span>for {{ freelancer.name }}</span></h2>
					<button type="button" @click="hideModal">
						<svg width="16" height="17" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M14.5 1.75l-13 13.5M1.5 1.75l13 13.5" stroke="#001D68" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</button>
				</div>
				<div class="freelancer-modal-body">
					<form @submit.prevent>
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<input type="text" name="name" placeholder="Name">
								</div>
								<div class="form-group">
									<input type="email" name="email" placeholder="Email">
								</div>
								<div class="form-group">
									<textarea name="message" rows="5" placeholder="Message"></textarea>
								</div>
								<div class="form-group">
									<button type="submit">Send</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</transition>
</template>

<script>
export default {
	name: "ContactFreelancerModal",
	props: {
		isOpen: { type: Boolean, required: true },
		freelancer: { type: Object, required: true },
	},
	methods: {
		hideModal() {
			this.$emit("onclose");
		},
	},
	mounted() {
		document.addEventListener("click", this.hideModal);
	},
	destroyed() {
		document.removeEventListener("click", this.hideModal);
	},
};
</script>

<style lang="scss">
.fade-contact-freelancer-modal {
	&-enter-active,
	&-leave-active {
		transition: opacity 0.5s;
	}
	&-enter,
	&-leave-to {
		opacity: 0;
	}
}
</style>

<style lang="scss" scoped>
@import "./scss/variables";
@import "./scss/media-queries";

.contact-freelancer-modal {
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	z-index: 9999;
	display: flex;
	align-items: center;
	justify-content: center;
	padding-left: 10px;
	padding-right: 10px;
	background: rgba(27, 27, 27, 0.46);

	.freelancer-modal__content {
		width: 100%;
		overflow: auto;
		max-width: 394px;
		border-radius: 30px;
		background-color: $white;
		max-height: 95vh;
		.freelancer-modal__header {
			display: flex;
			padding: 26px 16px;
			align-items: center;
			justify-content: space-between;
			h2 {
				font-size: 36px;
				font-weight: 500;
				flex-direction: row;
				color: $midnightblue;
				span {
					display: block;
					font-size: 14px;
				}
			}
			button {
				width: 27px;
				height: 27px;
				padding: 0;
				border: none;
				display: flex;
				align-items: center;
				justify-content: center;
				background-color: transparent;
			}
		}
		.freelancer-modal-body {
			.col-12 {
				display: flex;
				flex-direction: column;
			}
			.form-group {
				margin-bottom: 24px;
			}
			input,
			textarea {
				color: $midnightblue;
				width: 100%;
				border: none;
				padding: 24px;
				font-size: 26px;
				border-radius: 20px;
				background-color: $selago60;
				border: 1px solid transparent;
				transition: all 0.2s;
				&:focus {
					outline: none;
					border-color: $blue;
				}
				&::placeholder {
					color: $midnightblue30;
				}
			}
			input {
				height: 82px;
			}
			textarea {
				resize: none;
			}
			button[type="submit"] {
				color: $white;
				height: 68px;
				border: none;
				font-size: 26px;
				margin-left: auto;
				padding-left: 60px;
				padding-right: 60px;
				border-radius: 40px;
				transition: all 0.15s;
				background-color: $blue;
				&:hover {
					box-shadow: $button-hover-shadow;
				}
				&:focus {
					outline: none;
				}
				&:active {
					transform: translateY(1px);
				}
			}
		}
	}
}

@include md {
	.contact-freelancer-modal {
		.freelancer-modal__content {
			max-width: 700px;

			.freelancer-modal__header {
				padding: 30px;
				h2 {
					font-size: 42px;
					span {
						font-size: 18px;
						margin-top: 5px;
					}
				}
			}

			.freelancer-modal-body {
				.col-12 {
					flex-wrap: wrap;
					flex-direction: row;
					padding-left: 30px;
					padding-right: 30px;
					.form-group {
						width: 100%;
					}
					.form-group:nth-child(1) {
						width: 50%;
						padding-right: 10px;
					}
					.form-group:nth-child(2) {
						width: 50%;
						padding-left: 10px;
					}
				}
			}
		}
	}
}

@include lg {
	.contact-freelancer-modal {
		.freelancer-modal__content {
			max-width: 1010px;
		}
	}
}
</style>