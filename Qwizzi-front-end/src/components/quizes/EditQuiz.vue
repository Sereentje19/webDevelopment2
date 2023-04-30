
<template>
    <headerNavigation />

    <body>
        <div class="headerQuizes d-flex">
            <h1>Create Quiz</h1>
        </div>
        <div>
            <div id="createContainer">

                <div id="answers" v-for="q in quiz">
                    <div id="titleInput1">
                        <label id="title" for="title"><b>Title</b></label>
                        <input v-model="q.title" id="inputTitle" type="text" :placeholder="q.title" name="title" required>
                    </div>
                    <div id="titleInput1">
                        <label id="title" for="title"><b>Info quiz</b></label>
                        <input v-model="q.text" id="inputTitle" type="text" :placeholder="q.text" name="title" required>
                    </div>
                </div>

                <label id="title" for="title"><b>Upload image</b></label>
                <div class="form-group">
                    <input type="file" @change="onFileChange">
                    <p id="colorPurple"><small>Picture &lt; 64mb</small>
                    </p>
                </div>



                <div v-for="(quest, index) in questions" :key="index">
                    <br><br><br>
                    <div id="titleInput1">
                        <label id="titleQuestion" for="title"><b>Question {{ index + 1 }}</b></label>
                        <input v-model="quest.question" id="inputTitle" type="text" placeholder="Enter question"
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
                    <button @click="editQuiz()" class="editBtn" type="button">Edit</button>
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
    name: "EditQuiz",
    props: {
        id: Number,
    },
    data() {
        return {
            file: null,
            fileContents: null,
            questions: [
                {
                    id: 0,
                    question: '',
                    correctAnswer: '',
                    answer2: '',
                    answer3: '',
                    answer4: ''
                }
            ],
            quiz: [
                {
                    title: '',
                    text: ''
                }
            ]
        }
    },
    mounted() {
        axios
            .get('quizes/' + this.id)
            .then((res) => {
                this.quiz = res.data;
            })
            .catch(error => console.log(error))

        axios
            .get('questions/' + this.id)
            .then((res) => {
                this.questions = res.data;
            }).catch((error) => console.log(error));
    },
    methods: {
        onFileChange(event) {
            this.file = event.target.files[0];
            this.readFile();
        },
        readFile() {
            const reader = new FileReader();
            reader.onload = () => {
                this.fileContents = reader.result;
            };
            reader.readAsDataURL(this.file);
        },
        editQuiz() {
            axios.put("quizes/" + this.id, {
                title: this.quiz[0].title,
                text: this.quiz[0].text,
            }).then((res) => {
                for (let i = 0; i < this.questions.length; i++) {
                    axios.put('questions/' + this.questions[i].id, {
                        id: this.questions[i].id,
                        question: this.questions[i].question,
                        correctAnswer: this.questions[i].correctAnswer,
                        answer2: this.questions[i].answer2,
                        answer3: this.questions[i].answer3,
                        answer4: this.questions[i].answer4,
                    }).catch((error) => console.log(error));
                }
                this.$router.push("/");
            }).catch((error) => console.log(error));

        },
    },
};
</script>


<style>
.form-group input[type="file"]::file-selector-button {
    background-color: rgb(89, 0, 89);
    color: #fff;
    padding: 8px 20px;
    border-radius: 50px;
    cursor: pointer;
    margin: 0px 15px 0px 0px;
}

#colorPurple,
.form-group input[type="file"] {
    color: rgb(89, 0, 89);
}

.editBtn:hover,
.editBtn {
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

.editBtn:hover {
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