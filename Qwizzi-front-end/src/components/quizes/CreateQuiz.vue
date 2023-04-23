
<template>
    <headerNavigation />

    <body>
        <div class="headerQuizes d-flex">
            <h1>Create Quiz</h1>
        </div>
        <div>
            <div id="createContainer">
                <label id="title" for="title"><b>Title</b></label>
                <input v-model="title" id="inputTitle" type="text" placeholder="Enter title" name="title" required>

                <label id="title" for="title"><b>Info quiz</b></label>
                <input v-model="text" id="inputTitle" type="text" placeholder="Enter info" name="title" required>

                <label id="title" for="title"><b>Upload image</b></label>
                <input v-model="image" id="inputTitle" type="text" placeholder="Later fixen" name="title" required>




                <!-- <div v-for="index in 10" :key="index">
                    <br><br><br>
                    <div id="titleInput1">
                        <label id="titleQuestion" for="title"><b>Question {{ index }}</b></label>
                        <input v-model="question" id="inputTitle" type="text" placeholder="Enter Question" name="title">
                    </div>
                    <div id="answers">
                        <div id="titleInput1">
                            <label id="title" for="title"><b>Correct answer</b></label>
                            <input v-model="correctAnswer" id="inputTitle" type="text" placeholder="Enter Correct answer"
                                name="title">
                        </div>
                        <div id="titleInput">
                            <label id="title" for="title"><b>answer 2</b></label>
                            <input v-model="answer2" id="inputTitle" type="text" placeholder="Enter answer 2" name="title">
                        </div>
                    </div>

                    <div id="answers">
                        <div id="titleInput1">
                            <label id="title" for="title"><b>answer 3</b></label>
                            <input v-model="answer3" id="inputTitle" type="text" placeholder="Enter answer 3" name="title">
                        </div>
                        <div id="titleInput">
                            <label id="title" for="title"><b>answer 4</b></label>
                            <input v-model="answer4" id="inputTitle" type="text" placeholder="Enter answer 4" name="title">
                        </div>
                    </div>
                </div> -->

                <div class="divBtns">
                    <button @click="create()" class="loginBtn" type="button">Create</button>
                </div>
                <br><br><br>
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
        },
    },
    // data() {
    //     return {
    //         questions: {
    //             question: "",
    //             correctAnswer: "",
    //             answer2: "",
    //             answer3: "",
    //             answer4: "",
    //         },
    //         quiz: {
    //             title: "",
    //             text: "",
    //         },
    //     };
    // },
    methods: {
        create() {
            axios.post('quizes', {
                title: this.title,
                text: this.text,
                // question: this.question,
                // correctAnswer: this.correctAnswer,
                // answer2: this.answer2,
                // answer3: this.answer3,
                // answer4: this.answer4,
            }).then((res) => {
                this.$router.push("/Quizes");
            })
                .catch((error) => console.log(error));
        },
    },
};
</script>


<style>
#titleInput {
    display: flex;
    flex-direction: column;
}


#titleInput1 {
    display: flex;
    flex-direction: column;
    margin-right: 80px;
}


#answers {
    display: flex;
    flex-direction: row;
}

#createContainer {
    margin-left: 35px;

    display: flex;
    flex-direction: column;
    align-content: center;
}

#titleQuestion {
    margin-top: 30px;
    color: rgb(89, 0, 89);
    margin-right: 20px;
    font-weight: bold;
    font-size: 35px;
}

#title {
    margin-top: 30px;
    color: white;
    margin-right: 20px;
    font-weight: bold;
    font-size: 35px;
    text-shadow: -1.3px 1.3px 0 rgb(89, 0, 89), 1.3px 1.3px 0 rgb(89, 0, 89),
        1.3px -1.3px 0 rgb(89, 0, 89), -1.3px -1.3px 0 rgb(89, 0, 89);
}

#inputTitle,
#pswInputLogin {
    width: 450px;
    height: 50px;
    border-radius: 100px;
    padding: 15px 20px 15px 20px;
    font-size: 18px;
}

ul {
    list-style: none;
    margin: 0;
    padding: 0;
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
    width: 200px;
    margin-left: auto;
}

.CreateQuiz:hover {
    background-color: rgb(255, 244, 255);
    color: rgb(89, 0, 89);
}

.headerQuizes {
    padding: 30px 30px 0px 30px;
}

#textQuiz {
    font-size: 18px;
    min-height: 130px;
}

.quizBtn:hover,
.quizBtn {
    border-radius: 50px;
    border-style: solid;
    border-width: 3px;
    font-size: 150%;
    padding: 2px 20px 2px 20px;
    background-color: rgb(89, 0, 89);
    border-color: rgb(89, 0, 89);
    color: rgb(255, 244, 255);
    font-weight: bold;
    width: 45%;
    align-self: flex-end;
}

.quizBtn:hover {
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
    padding: 20px;
    background-color: rgb(202, 48, 48);
    width: 30%;
    height: 510px;
    margin: 1.6%;
    border-radius: 30px;
}

#quizContainer {
    display: flex;
    flex-direction: row;
    justify-content: space-evenly;
    flex-wrap: wrap;
}
</style>