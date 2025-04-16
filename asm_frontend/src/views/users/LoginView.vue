<script setup>
import axios from 'axios'
import { reactive, ref } from 'vue'
const code = ref(0)
let d_code = code.value == 0 ? 1 : 0
const code_r = ref(d_code)
const email = ref('')
const password = ref('')
const config = reactive({
	type: {
		'hoc_vien': 'Học viên',
		'gia_su': 'Gia sư'
	},
	name: ['hoc_vien', 'gia_su'],
	table: {
		'hoc_vien': 'student',
		'gia_su': 'tutor'
	},
	index: {
		'hoc_vien': 3,
		'gia_su': 2
	}
});
// console.log(config.type[config.name[code.value]]);

function change() {
	let index = code.value
	code.value = index === 0 ? 1 : 0
	code_r.value = code.value == 0 ? 1 : 0
}

// http://127.0.0.1:8000/api/tutor/login
// http://127.0.0.1:8000/api/student/login

async function login() {
	const __name = config.name[code.value]
	const __table = config.table[__name]
	console.log(__table);
	let data = {
		email: email.value,
		password: password.value
	}
	try {
		const response = await axios.post(`http://127.0.0.1:8000/api/${__table}/login`, data);
		console.log(response);
		const status = response.data.code;

		if (status === 200) {
			const __data = response.data.data;
			localStorage.setItem('code', config.index[__name])
			window.location.href = 'http://localhost:5173/dashboard'
		}
	} catch (error) {
		console.error('An error occurred during login:', error);

		// You can also handle specific error types here
		if (axios.isAxiosError(error)) {
			// Axios specific error
			if (error.response) {
				// The request was made and the server responded with a status code
				// that falls out of the range of 2xx
				console.error('Server responded with error:', error.response.data);
				console.error('Status code:', error.response.status);
				console.error('Headers:', error.response.headers);
			} else if (error.request) {
				// The request was made but no response was received
				// `error.request` is an instance of XMLHttpRequest in the browser and an instance of
				// http.ClientRequest in node.js
				console.error('No response received:', error.request);
			} else {
				// Something happened in setting up the request that triggered an Error
				console.error('Error setting up request:', error.message);
			}
			console.error(error.config);
		} else {
			// Non-Axios error
			console.error('Non-Axios error:', error.message);
		}
	}
}

</script>
<template>
	<div class="container">
		<div class="screen">
			<div class="screen__content">
				<form class="login" @submit.prevent="login">
					<div class="login__field">
						<i class="login__icon fas fa-user"></i>
						<input type="email" v-model="email" class="login__input" placeholder="Email">
					</div>
					<div class="login__field">
						<i class="login__icon fas fa-lock"></i>
						<input type="password" v-model="password" class="login__input" placeholder="Password">
					</div>
					<button class="button login__submit">
						<span class="button__text">Đăng nhập</span>
						<i class="button__icon fas fa-chevron-right"></i>
					</button>
					<button type="button" class="change" @click="change">Chuyển sang {{ config.type[config.name[code_r]]
					}}</button>
				</form>
				<div class="social-login">
					<h3>{{ config.type[config.name[code]] }}</h3>
					<div class="social-icons">
						<a href="#" class="social-login__icon fab fa-instagram"></a>
						<a href="#" class="social-login__icon fab fa-facebook"></a>
						<a href="#" class="social-login__icon fab fa-twitter"></a>
					</div>
				</div>
			</div>
			<div class="screen__background">
				<span class="screen__background__shape screen__background__shape4"></span>
				<span class="screen__background__shape screen__background__shape3"></span>
				<span class="screen__background__shape screen__background__shape2"></span>
				<span class="screen__background__shape screen__background__shape1"></span>
			</div>
		</div>
	</div>
</template>
<style scoped>
.change {
	padding: 10px 20px;
	background-color: #4C489D;
	border: none;
	color: #fff;
	font-weight: 500;
	text-transform: capitalize;
	border-radius: 10px;
	margin-top: 20px;
}

.container {
	display: flex;
	align-items: center;
	justify-content: center;
	min-height: 100vh;
}

.screen {
	background: linear-gradient(90deg, #5D54A4, #7C78B8);
	position: relative;
	height: 80%;
	width: 40%;
	box-shadow: 0px 0px 24px #5C5696;
}

.screen__content {
	z-index: 1;
	position: relative;
	height: 100%;
}

.screen__background {
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	z-index: 0;
	-webkit-clip-path: inset(0 0 0 0);
	clip-path: inset(0 0 0 0);
}

.screen__background__shape {
	transform: rotate(45deg);
	position: absolute;
}

.screen__background__shape1 {
	height: 520px;
	width: 520px;
	background: #FFF;
	top: -50px;
	right: 120px;
	border-radius: 0 72px 0 0;
}

.screen__background__shape2 {
	height: 220px;
	width: 220px;
	background: #6C63AC;
	top: -172px;
	right: 0;
	border-radius: 32px;
}

.screen__background__shape3 {
	height: 540px;
	width: 190px;
	background: linear-gradient(270deg, #5D54A4, #6A679E);
	top: -24px;
	right: 0;
	border-radius: 32px;
}

.screen__background__shape4 {
	height: 400px;
	width: 200px;
	background: #7E7BB9;
	top: 420px;
	right: 50px;
	border-radius: 60px;
}

.login {
	width: 320px;
	padding: 30px;
	padding-top: 156px;
}

.login__field {
	padding: 20px 0px;
	position: relative;
}

.login__icon {
	position: absolute;
	top: 30px;
	color: #7875B5;
}

.login__input {
	border: none;
	border-bottom: 2px solid #D1D1D4;
	background: none;
	padding: 10px;
	padding-left: 24px;
	font-weight: 700;
	width: 75%;
	transition: .2s;
}

.login__input:active,
.login__input:focus,
.login__input:hover {
	outline: none;
	border-bottom-color: #6A679E;
}

.login__submit {
	background: #fff;
	font-size: 14px;
	margin-top: 30px;
	padding: 16px 20px;
	border-radius: 26px;
	border: 1px solid #D4D3E8;
	text-transform: uppercase;
	font-weight: 700;
	display: flex;
	align-items: center;
	width: 100%;
	color: #4C489D;
	box-shadow: 0px 2px 2px #5C5696;
	cursor: pointer;
	transition: .2s;
}

.login__submit:active,
.login__submit:focus,
.login__submit:hover {
	border-color: #6A679E;
	outline: none;
}

.button__icon {
	font-size: 24px;
	margin-left: auto;
	color: #7875B5;
}

.social-login {
	position: absolute;
	height: 140px;
	width: 160px;
	text-align: center;
	bottom: 0px;
	right: 0px;
	color: #fff;
}

.social-icons {
	display: flex;
	align-items: center;
	justify-content: center;
}

.social-login__icon {
	padding: 20px 10px;
	color: #fff;
	text-decoration: none;
	text-shadow: 0px 0px 8px #7875B5;
}

.social-login__icon:hover {
	transform: scale(1.5);
}
</style>