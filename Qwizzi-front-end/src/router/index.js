import { createRouter, createWebHistory } from 'vue-router'

import Home from '../components/quizes/Home.vue';
import Login from '../components/quizes/Login.vue';
import SignUp from '../components/quizes/SignUp.vue';
import Quizes from '../components/quizes/Quizes.vue';
import QuizOverview from '../components/quizes/QuizOverview.vue';
import EnterCode from '../components/quizes/EnterCode.vue';
import CreateQuiz from '../components/quizes/CreateQuiz.vue';
import PlayQuiz from '../components/quizes/PlayQuiz.vue';
import MyQuizes from '../components/quizes/MyQuizes.vue';
import EditQuiz from '../components/quizes/EditQuiz.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    { path: '/', component: Home },
    { path: '/Login', component: Login },
    { path: '/SignUp', component: SignUp },
    { path: '/Quizes', component: Quizes },
    { path: '/QuizOverview/:id', component: QuizOverview, props: true },
    { path: '/CreateQuiz', component: CreateQuiz },
    { path: '/QuizOverview/PlayQuiz/:id', component: PlayQuiz, props: true },
    { path: '/EnterCode', component: EnterCode },
    { path: '/MyQuizes', component: MyQuizes },
    { path: '/EditQuiz/:id', component: EditQuiz, props: true }
  ]
})

export default router
