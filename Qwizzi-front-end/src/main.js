import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import footer from './components/quizes/Footer.vue';
import header from './components/quizes/Header.vue';
import router from './router'

import './assets/main.css'

const app = createApp(App)

app.component('headerNavigation', header)
app.component('FooterNavigation', footer)

app.use(createPinia())
app.use(router)

app.mount('#app')
