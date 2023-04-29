
<template>
    <headerNavigation />

    <body>
        <div class="headerQuizes">
            <h1>Quizes</h1>
            <div class="buttons">
                <a href="/MyQuizes" class="CreateQuiz btn">My quizes</a>
                <a href="/CreateQuiz" class="CreateQuiz btn">Create quiz</a>
            </div>
        </div>
        <br>
        <div id="quizContainer">
            <ul v-for="quiz in quizes" :key="quiz.id">
                <div id="quiz">
                    <img id="picture" :src="quiz.image" alt="Image is not shown"><br>

                    <h2>{{ quiz.title }}</h2>
                    <p id="textQuiz"> {{ quiz.text }}</p>
                    <div id="buttons">
                        <a @click="editQuiz(quiz.id)" class="myBtns btnEdit btn">Edit</a>
                        <a @click="deleteQuiz(quiz.id)" class="myBtns btnDelete btn">Delete</a>
                        <a @click="goToQuiz(quiz.id)" class="myBtns btn">go to quiz</a>
                    </div>
                </div>
            </ul>
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
                .get('myQuizes/' + 11)
                .then((res) => {
                    this.quizes = res.data;
                })
                .catch(error => console.log(error))
        },
        deleteQuiz(id) {
            axios
                .delete('quizes/' + id)
                .then((res) => {
                    this.getAll();
                })
                .catch(error => console.log(error))
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
#buttons {
    display: flex;
    justify-content: space-between;

}

ul {
    list-style: none;
    margin: 0;
    padding: 0;
    width: 28%;
}

.CreateQuiz:hover,
.CreateQuiz {
    border-radius: 50px;
    border-style: solid;
    border-width: 3px;
    font-size: 150%;
    padding: 2px 20px 2px 20px;
    background-color: rgb(89, 0, 89);
    border-color: rgb(89, 0, 89);
    color: rgb(255, 244, 255);
    font-weight: bold;
    width: fit-content;
    margin-right: 25px;

}

.CreateQuiz:hover {
    background-color: rgb(255, 244, 255);
    color: rgb(89, 0, 89);
}

.headerQuizes {
    padding: 30px 30px 0px 30px;
    display: flex;
    justify-content: space-between;
}

.buttons {
    display: flex;
    justify-content: flex-end;
}


#textQuiz {
    font-size: 18px;
    min-height: 100px;
}

.myBtns:hover,
.myBtns {
    border-radius: 50px;
    border-style: solid;
    border-width: 3px;
    font-size: 120%;
    padding: 2px 20px 2px 20px;
    background-color: rgb(89, 0, 89);
    border-color: rgb(89, 0, 89);
    color: rgb(255, 244, 255);
    font-weight: bold;
    width: fit-content;
    align-self: flex-end;
    /* margin: 5px; */
}

.myBtns:hover {
    background-color: rgb(255, 244, 255);
    color: rgb(89, 0, 89);
}

#logoQuiz {
    margin-bottom: 20px;
    border-radius: 20px;
}

#quiz {
    display: flex;
    flex-direction: column;
    padding: 5%;
    background-color: rgb(202, 48, 48);
    height: 510px;
    margin: 1.6%;
    border-radius: 30px;
    width: 100%;
}

#picture {
    border-radius: 20px 20px 5px 5px;
    width: 105%;
    margin-left: -2.4%;
    margin-top: -2.7%;
    height: 250px;
}

/* #voidDiv60 {
    display: flex;
    flex-direction: column;
    height: 510px;
    border-radius: 30px;
    width: 60%;
}

#voidDiv30 {
    display: flex;
    flex-direction: column;
    height: 510px;
    border-radius: 30px;
    width: 30%;
} */

#quizContainer {
    display: flex;
    flex-direction: row;
    justify-content: space-evenly;
    flex-wrap: wrap;
    row-gap: 50px;
}

.btnDelete:hover {
    background-color: red;
}

.btnEdit:hover {
    background-color: orange;
}
</style>