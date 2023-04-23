import { createRouter, createWebHistory } from 'vue-router'

import Home from '../components/quizes/Home.vue';
import Login from '../components/quizes/Login.vue';
import SignUp from '../components/quizes/SignUp.vue';
import Quizes from '../components/quizes/Quizes.vue';
import Quiz from '../components/quizes/Quiz.vue';
import EnterCode from '../components/quizes/EnterCode.vue';
import CreateQuiz from '../components/quizes/CreateQuiz.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    { path: '/', component: Home },
    { path: '/Login', component: Login },
    { path: '/SignUp', component: SignUp },
    { path: '/Quizes', component: Quizes },
    { path: '/Quiz/:id', component: Quiz, props: true },
    { path: '/CreateQuiz', component: CreateQuiz },
    { path: '/EnterCode', component: EnterCode }
  ]
})

export default router
