<template>
	<transition name="fade-contact-freelancer-modal" appear>
		<div v-if="isOpen" class="contact-freelancer-modal">
			<div v-if="!isMessageSent" class="freelancer-modal__content" @click.stop>
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
									<input type="text" v-model="postData.message.name" name="name" placeholder="Name">
									<span class="error" v-if="errors.name.length > 0">{{errors.name}}</span>
								</div>
								<div class="form-group">
									<input type="email" v-model="postData.message.email" name="email" placeholder="Email">
									<span class="error" v-if="errors.email.length > 0">{{errors.email}}</span>
								</div>
								<div class="form-group">
									<textarea name="message" rows="5" v-model="postData.message.body" placeholder="Message"></textarea>
									<span class="error" v-if="errors.body.length > 0">{{errors.body}}</span>
								</div>
								<div class="form-group">
									<button type="submit" @click="sendMessage">Send</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div v-else class="modal-success">
				Thank you, your message has been sent.
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
	data(){
		return {
			postData: {
				message: {
					name: '',
					email: '',
					body: ''
				},
				resumeURL: '',
			},
			errors: {
				name: '',
				email: '',
				body: ''
			},
			isMessageSent: false
		}
	},
	methods: {
		hideModal() {
			this.$emit("onclose");
		},
		sendMessage() {
			if (!this.validateInputs()) {
				return;
			}

			this.postData.resumeURL = this.freelancer.workforce_url ;

			// send message from public theme.
			axios.post('/resume/send-message', this.postData)
					.then( (response) => {
						this.isMessageSent = true;
						this.clearMessage();
						setTimeout( () => {
							this.isMessageSent = false;
							this.hideModal();
						},1500);
					})
					.catch(error => {
						console.log(error);
					});
		},
		clearMessage(){
			this.postData = {
				message: {
					name: '',
							email: '',
							body: ''
				},
				resumeURL: '',
			};
		},
		validateInputs() {
			let isValid = true;
			this.errors = {
				name: '',
				email: '',
				body: ''
			};

			if (this.postData.message.name.length < 2 || this.postData.message.name.length > 200) {
				isValid = false;
				this.errors.name = 'Name should be at least 2 characters';
			}
			if (this.postData.message.body.length < 12 || this.postData.message.body.length > 200) {
				isValid = false;
				this.errors.body = 'Message should be at least 12 characters';
			}
			if (!this.validateEmail(this.postData.message.email)) {
				isValid = false;
				this.errors.email = 'Email should be a valid format';
			}

			return isValid;
		},
		validateEmail(email) {
			const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return re.test(String(email).toLowerCase());
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

	span.error{
		color: red;
		font-size: 13px;
		padding-left: 10px;
	}
	.modal-success{
		background: white;
		width: 750px;
		height: 300px;
		display: flex;
		align-items: center;
		justify-content: center;
		font-size: 24px;
		border-radius: 20px;
		color: #001ce3;
	}

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
				padding: 24px;
				font-size: 18px;
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
				height: 60px;
			}
			textarea {
				resize: none;
			}
			button[type="submit"] {
				color: $white;
				height: 50px;
				border: none;
				font-size: 18px;
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
				}
			}
		}
	}
}

@include lg {
	.contact-freelancer-modal {
		.freelancer-modal__content {
			max-width: 750px;
		}
	}
}
</style>