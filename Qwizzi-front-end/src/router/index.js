import { createRouter, createWebHistory } from 'vue-router'

import Home from '../components/quizes/Home.vue';
import Login from '../components/quizes/Login.vue';
import SignUp from '../components/quizes/SignUp.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    { path: '/', component: Home },
    { path: '/Login', component: Login },
    { path: '/signUp', component: SignUp }
  ]
})

export default router
