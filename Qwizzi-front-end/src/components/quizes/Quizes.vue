
<template>
    <headerNavigation />

    <body>
        <div class="headerQuizes">
            <h1 id="QuizesTitle">Quizes</h1>
            <a @click="goToMyQuizes" id="myQuizesBtn" class="mainButtonReverse btn">My quizes</a>
        </div>
        <br>
        <div id="quizContainer">
            <ul v-for="quiz in quizes" :key="quiz.id">
                <div id="quiz">
                    <img id="picture" :src="quiz.image" alt="Image is not shown"><br>

                    <h2>{{ quiz.title }}</h2>
                    <p id="textQuiz"> {{ quiz.text }}</p>
                    <a @click="goToQuiz(quiz.id)" class="mainButtonReverse quizBtn btn">Go to quiz</a>
                </div>
            </ul>
            <div v-if="!this.quizes || this.quizes.length === 0">
                <h4>There are no quizes made yet.</h4>
            </div>
            <div v-if="quizes.length % 3 != 0 && (quizes.length + 1) % 3 != 0" id="voidDiv60"></div>
            <div v-else-if="quizes.length % 3 != 0" id="voidDiv30"></div>
        </div>

    </body>

    <footerNavigation />
</template>


<script>
import headerNavigation from './Header.vue'
import footerNavigation from './Footer.vue';
import axios from '../../axios-auth.js';

export default {
    header: {
        name: "header",
        components: {
            headerNavigation
        }
    },
    footer: {
        name: "footer",
        components: {
            footerNavigation
        },
    },
    data() {
        return {
            quizes: [],
        };
    },
    mounted() {
        axios
            .get('quizes', {

            })
            .then((res) => {
                this.quizes = res.data;
            })
            .catch(error => console.log(error))
    },
    methods: {
        goToQuiz(id) {
            this.$router.push("QuizOverview/" + id);
        },
        goToMyQuizes() {
            const token = localStorage.getItem("jwt")

            if (token) {
                this.$router.push("MyQuizes");
            }
            else{
                this.$router.push("login");
            }
        },
    },
};
</script>


<style>
@import '../../assets/css/quizes.css';
</style>