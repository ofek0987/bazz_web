require('./bootstrap');


import { createApp } from 'vue'
import { createRouter, createWebHashHistory } from 'vue-router'
import BootstrapVue3 from "bootstrap-vue-3"
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue-3/dist/bootstrap-vue-3.css'
import Home from './components/Home.vue'
import Login from './components/Login.vue'
import SignUp from "./components/SignUp.vue"
import Navbar from "./components/Navbar.vue"
import SearchUsers from "./components/SearchUsers.vue"



const routes = [
  {path: "/", component: Home},
  {path: "/login", component: Login},
  {path:"/signup", component: SignUp},
  {path:"/searchUsers", component: SearchUsers}
]


const router = createRouter({
  history: createWebHashHistory(),
  routes
})

const app = createApp({})
app.component("nav-bar", Navbar)
app.use(router)
app.use(BootstrapVue3)
app.mount("#app")
