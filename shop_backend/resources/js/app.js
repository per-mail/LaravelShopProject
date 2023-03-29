import './bootstrap';

import {createApp} from 'vue'

import App from './components/App.vue'

import router from './router'
// import axios from "axios"

// import './assets/main.css'


// подключаем App.vue

// createApp(App).mount("#app")

const app = createApp(App)

app.use(router)
// app.config.globalProperties.axios = axios

app.mount('#app')
