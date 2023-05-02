
<template>
    <headerNavigation />

    <body>
        <div class="headerQuizes">
            <h1 id="QuizesTitle">Quizes</h1>
            <a href="/CreateQuiz" id="myQuizesBtn" class="mainButtonReverse btn">Create quiz</a>
        </div>
        <br>
        <div id="quizContainer">
            <ul v-for="quiz in quizes" :key="quiz.id">
                <div id="quiz">
                    <img id="picture" :src="quiz.image" alt="Image is not shown"><br>

                    <h2>{{ quiz.title }}</h2>
                    <p id="textQuiz"> {{ quiz.text }}</p>
                    <div id="buttons">
                        <a @click="deleteQuiz(quiz.id)" id="btnDelete" class="mainButtonReverse myBtns btn">Delete</a>
                        <a @click="editQuiz(quiz.id)" id="btnEdit" class="mainButtonReverse myBtns  btn">Edit</a>
                        <a @click="goToQuiz(quiz.id)" id="myQuizBtns" class="mainButtonReverse myBtns btn">go to quiz</a>
                    </div>
                </div>
            </ul>
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
        this.getAll();
    },
    methods: {
        getAll() {
            axios
                .get('myQuizes', {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("jwt")
                    }
                })
                .then((res) => {
                    this.quizes = res.data;
                })
                .catch(error => console.log(error))
        },
        deleteQuiz(id) {
            axios
            axios.delete('questions/' + id, {
            }).then((res) => {
                axios.delete('quizes/' + id)
                    .then((res) => {
                        this.getAll();
                    }).catch(error => console.log(error))
            }).catch((error) => console.log(error));
        },
        editQuiz(id) {
            this.$router.push("EditQuiz/" + id);
        },
        goToQuiz(id) {
            this.$router.push("QuizOverview/" + id);
        },
    },
};
</script>

<style>
@import '../../assets/main.css';
@import '../../assets/quizes.css';
@import '../../assets/myQuizes.css';
</style>

