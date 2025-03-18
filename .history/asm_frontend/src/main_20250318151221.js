import './assets/main.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'
import VueMeta from 'vue-meta' // Import VueMeta

import App from './App.vue'
import router from './router'

const app = createApp(App)

app.use(createPinia())
app.use(router)
app.use(VueMeta) // Use VueMeta as a plugin

app.mount('#app')