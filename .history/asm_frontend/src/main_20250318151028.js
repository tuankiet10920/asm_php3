import './assets/main.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'
import { createHead } from '@unhead/vue' // Import createHead from @unhead/vue

import App from './App.vue'
import router from './router'

const app = createApp(App)
const head = createHead() // Create an instance of Head

app.use(createPinia())
app.use(router)
app.use(head) // Use the Head plugin

app.mount('#app')
