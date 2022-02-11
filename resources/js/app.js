require('./bootstrap');


import { createApp } from 'vue'
import { createRouter, createWebHashHistory } from 'vue-router'

import Home from './components/Home.vue'
import Login from './components/Login.vue'

const routes = [
  {path: "/", component: Home},
  {path: "/login", component: Login}
]


const router = createRouter({
  history: createWebHashHistory(),
  routes
})

const app = createApp({})
app.use(router)
app.mount("#app")
