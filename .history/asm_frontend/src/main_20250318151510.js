import './assets/main.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'
import { createHead } from '@unhead/vue' // Import createHead

import App from './App.vue'
import router from './router'

const app = createApp(App)
const head = createHead() // Tạo instance của Head

app.use(createPinia())
app.use(router)
app.use(head) // Sử dụng Head plugin

app.mount('#app')