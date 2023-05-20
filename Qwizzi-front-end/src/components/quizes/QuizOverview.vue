<template>
    <headerNavigation />

    <body>
        <div id="quizOverviewContainer" v-for="q in quiz">
            <img id="image" :src="q.image" alt="Image is not shown"><br>
            <div id="infoQuiz">
                <div>
                    <h1>{{ q.title }}</h1>
                <p> {{ q.text }}</p>
                </div>
                <a @click="goToQuiz(q.id)" id="playBtn" class="mainButton btn">Play</a>
            </div>
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
        }
    },
    name: "Quiz",
    props: {
        id: Number,
    },
    data() {
        return {
            quiz: {
                id: 0,
                userId: 0,
                title: "",
                text: "",
            },
        };
    },
    mounted() {
        axios
            .get('quizes/' + this.id)
            .then((res) => {
                this.quiz = res.data;
            })
            .catch(error => console.log(error))
    },
    methods: {
        goToQuiz(id) {
            localStorage.setItem("questionNumber", 0);
            this.$router.push("PlayQuiz/" + id);
        },
    },
};
</script>

<style>
@import '../../assets/css/quizes.css';
@import '../../assets/css/quizOverview.css';
</style>
