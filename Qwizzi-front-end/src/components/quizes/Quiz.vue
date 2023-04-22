<template>
    <headerNavigation />

    <body>
        <div id="QuizContainer">
            <img id="logoQ" src="/images/logo.png" alt="Image is not shown">

            <div id="text">
                <ul v-for="q in quiz">
                    <h1>{{ q.title }}</h1>
                    <p> {{ q.text }}</p>
                    <button class="Play btn">Play</button>
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

<style>
ul{
  list-style: none;
  margin: 0;
  padding: 0;
}

body {
    background-color: rgb(255, 237, 237);
    min-height: 570px;
}

.Play:hover,
.Play {
    border-radius: 50px;
    border-style: solid;
    border-width: 3px;
    font-size: 35px;
    padding: 2px 20px 2px 20px;
    background-color: rgb(255, 240, 255);
    border-color: rgb(89, 0, 89);
    color: rgb(89, 0, 89);
    font-weight: bold;
}

.Play:hover {
    background-color: rgb(89, 0, 89);
    color: rgb(255, 244, 255);
}

#logoQ {
    width: 50%;
    padding: 2.5%;
    border-radius: 50px;
}

#QuizContainer {
    display: flex;
    width: 100%;
    min-height: 400px;
}

#text {
    width: 50%;
    padding: 2.5%;
    font-size: 20px;
}
</style>
