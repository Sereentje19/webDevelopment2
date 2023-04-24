<template>
    <headerNavigation />

    <body>
        <div id="QuizContainer">
            derget5w
            {{ this.question.quizId }}
            <a @click="goToQuiz()" class="Play btn">Play</a>
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
    name: "PlayQuiz",
    props: {
        id: Number,
    },
    data() {
        return {
            question: {
                id: 0,
                quizId: 0,
                question: '',
                correctAnswer: '',
                answer2: '',
                answer3: '',
                answer4: ''
            },
        };
    },
    mounted() {
        axios
            .get('questions/' + this.id)
            .then((res) => {
                this.question = res.data;
            })
            .catch(error => console.log(error))
    },
    methods: {
        goToQuiz() {
            this.$router.push("PlayQuiz/" + 1);
        },
    },

};
</script>
