
<template>
    <headerNavigation />

    <body>
        <div class="headerQuizes d-flex">
            <h1>Create Quiz</h1>
        </div>
        <div>
            <div id="createContainer">

                <div id="answers">
                    <div id="titleInput1">
                        <label id="title" for="title"><b>Title</b></label>
                        <input v-model="title" id="inputTitle" type="text" placeholder="Enter title" name="title" required>
                    </div>
                    <div id="titleInput1">
                        <label id="title" for="title"><b>Info quiz</b></label>
                        <input v-model="text" id="inputTitle" type="text" placeholder="Enter info" name="title" required>
                    </div>
                </div>

                <label id="title" for="title"><b>Upload image</b></label>
                <input v-model="image" id="inputTitle" type="text" placeholder="Later fixen" name="title" required>





                <div v-for="(quest, index) in questions" :key="index">
                    <br><br><br>
                    <div id="titleInput1">
                        <label id="titleQuestion" for="title"><b>Question {{ index + 1 }}</b></label>
                        <input v-model="quest.question" id="inputTitle" type="text" placeholder="Enter Question"
                            name="title">
                    </div>
                    <div id="answers">
                        <div id="titleInput1">
                            <label id="title" for="title"><b>Correct answer</b></label>
                            <input v-model="quest.correctAnswer" id="inputTitle" type="text"
                                placeholder="Enter Correct answer" name="title">
                        </div>
                        <div id="titleInput">
                            <label id="title" for="title"><b>Answer 2</b></label>
                            <input v-model="quest.answer2" id="inputTitle" type="text" placeholder="Enter answer 2"
                                name="title">
                        </div>
                    </div>

                    <div id="answers">
                        <div id="titleInput1">
                            <label id="title" for="title"><b>Answer 3</b></label>
                            <input v-model="quest.answer3" id="inputTitle" type="text" placeholder="Enter answer 3"
                                name="title">
                        </div>
                        <div id="titleInput">
                            <label id="title" for="title"><b>Answer 4</b></label>
                            <input v-model="quest.answer4" id="inputTitle" type="text" placeholder="Enter answer 4"
                                name="title">
                        </div>
                    </div>
                </div>
                <div class="btns">
                    <button @click="addQuestion()" class="createbtn" type="button">Add question</button>
                    <button @click="create()" class="createbtn" type="button">Create</button>
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
export let numQuestions = 0;

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
            questions: [
                {
                    question: '',
                    correctAnswer: '',
                    answer2: '',
                    answer3: '',
                    answer4: ''
                }
            ]
        }
    },

    methods: {
        addQuestion() {
            this.questions.push({
                question: '',
                correctAnswer: '',
                answer2: '',
                answer3: '',
                answer4: ''
            });
        },
        create() {
            axios.post('quizes', {
                title: this.title,
                text: this.text,
            }).then((r) => {
                for (let i = 0; i < this.questions.length; i++) {
                    axios.post('questions', {
                        question: this.questions[i].question,
                        correctAnswer: this.questions[i].correctAnswer,
                        answer2: this.questions[i].answer2,
                        answer3: this.questions[i].answer3,
                        answer4: this.questions[i].answer4,
                    }).catch((error) => console.log(error));
                }
            }).catch((error) => console.log(error));
        },
    },
};
</script>


<style>
.createbtn:hover,
.createbtn {
    margin-top: 40px;
    border-radius: 50px;
    border-style: solid;
    border-width: 3px;
    font-size: 35px;
    padding: 2px 20px 2px 20px;
    background-color: rgb(255, 240, 255);
    border-color: rgb(89, 0, 89);
    color: rgb(89, 0, 89);
    font-weight: bold;
    width: fit-content;
    margin: 50px 20px 0px 0px;
}

.createbtn:hover {
    background-color: rgb(89, 0, 89);
    color: rgb(255, 244, 255);
}


.btns {
    display: flex;
    justify-content: center;
}

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
    color: rgb(89, 0, 89);
    margin-right: 20px;
    font-weight: bold;
    font-size: 23px;
}

#inputTitle,
#pswInputLogin {
    width: 450px;
    height: 50px;
    border-radius: 100px;
    padding: 15px 20px 15px 20px;
    font-size: 18px;
    /* border-color: rgb(89, 0, 89); */
}
</style>