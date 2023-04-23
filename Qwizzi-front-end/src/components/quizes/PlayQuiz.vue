<template>
    <headerNavigation />

    <body>
        <div id="QuizContainer">
            <img id="logoQ" src="/images/logo.png" alt="Image is not shown">

            <div id="text">
                <ul v-for="q in quiz">
                    <h1>{{ q.title }}</h1>
                    <p> {{ q.text }}</p>
                    <a href="/PlayQuiz" class="Play btn">Play</a>
                </ul>
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
};
</script>
