/* import './assets/main.css' */


import { createApp } from 'vue'
import { createPinia } from 'pinia'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap/dist/js/bootstrap.bundle.js'
import 'bootstrap-icons/font/bootstrap-icons.css'
import {useVuelidate} from '@vuelidate/core'
import { required } from '@vuelidate/validators'
import 'mdb-vue-ui-kit/css/mdb.min.css';
import { Bootstrap5Pagination } from 'laravel-vue-pagination';



import App from './App.vue'
import router from './router'
import store from './store'

const app = createApp(App)


app.use(createPinia())
app.use(router).use(store)
app.mount('#app')
