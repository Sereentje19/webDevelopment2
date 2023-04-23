import { createRouter, createWebHistory } from 'vue-router'

import Home from '../components/quizes/Home.vue';
import Login from '../components/quizes/Login.vue';
import SignUp from '../components/quizes/SignUp.vue';
import Quizes from '../components/quizes/Quizes.vue';
import QuizOverview from '../components/quizes/QuizOverview.vue';
import EnterCode from '../components/quizes/EnterCode.vue';
import CreateQuiz from '../components/quizes/CreateQuiz.vue';
import PlayQuiz from '../components/quizes/PlayQuiz.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    { path: '/', component: Home },
    { path: '/Login', component: Login },
    { path: '/SignUp', component: SignUp },
    { path: '/Quizes', component: Quizes },
    { path: '/QuizOverview/:id', component: QuizOverview, props: true },
    { path: '/CreateQuiz', component: CreateQuiz },
    { path: '/PlayQuiz', component: PlayQuiz },
    { path: '/EnterCode', component: EnterCode }
  ]
})

export default router
