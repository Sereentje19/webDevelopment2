
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
                    <input type="file" id="file" @change="onFileChange">
                    <p id="colorPurple"><small>Picture &lt; 64mb</small>
                    </p>
                </div>

                <div v-for="(quest, index) in editedQuestions" :key="index">
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
                    <button @click="deleteQuestion(quest.id, index)" id="createbtn" class="mainButton" type="button">Delete
                        question</button>
                </div>
                <div class="btns">
                    <button @click="addQuestion()" id="createbtn" class="mainButton" type="button">Add question</button>
                    <button @click="editQuiz()" id="createbtn" class="mainButton editBtn" type="button">Edit</button>
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
            selectedFile: null,
            fileContents: null,
            length: 0,
            editedQuestions: [
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
            ],
            deleteId: [],
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
                this.length = res.data.length;
                this.editedQuestions = res.data;
            }).catch((error) => console.log(error));
    },
    methods: {
        validateForm() {
            if (!this.title || !this.text) {
                alert('You did not fill out al quiz fields. Please do so!');
                return false;
            }

            if (!this.selectedFile) {
                alert('You did not upload an image. Please do so!');
                return false;
            }

            for (const quest of this.questions) {
                if (!quest.question || !quest.correctAnswer || !quest.answer2 || !quest.answer3 || !quest.answer4) {
                    alert('You did not fill out all question fields. Please do so!');
                    return false;
                }
            }

            return true;
        },
        addQuestion() {
            this.editedQuestions.push({
                question: '',
                correctAnswer: '',
                answer2: '',
                answer3: '',
                answer4: ''
            }
            );
        },
        deleteQuestion(id, index) {
            this.deleteId.push(id);
            this.editedQuestions.splice(index, 1);
        },
        onFileChange(event) {
            this.selectedFile = event.target.files[0]

            const reader = new FileReader();
            reader.onload = () => {
                this.fileContents = reader.result;
            };
            reader.readAsDataURL(this.selectedFile);
        },
        editQuiz() {
            if (this.validateForm) {
                let quizData = new FormData();
                quizData.append('title', this.quiz[0].title);
                quizData.append('text', this.quiz[0].text);
                quizData.append('file', this.selectedFile);

                axios.post("quizes/" + this.id, quizData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }

                }).then((res) => {
                    if (this.editedQuestions.length <= this.length) {
                        for (let i = 0; i <= this.editedQuestions.length; i++) {

                            if (this.editedQuestions.length < i) {

                                axios.put('questions/' + this.editedQuestions[i].id, {
                                    id: this.editedQuestions[i].id,
                                    question: this.editedQuestions[i].question,
                                    correctAnswer: this.editedQuestions[i].correctAnswer,
                                    answer2: this.editedQuestions[i].answer2,
                                    answer3: this.editedQuestions[i].answer3,
                                    answer4: this.editedQuestions[i].answer4,
                                }).then((res) => {
                                    this.$router.push("/MyQuizes");
                                }).catch((error) => console.log(error));
                            }
                            else {
                                for (let j = 0; j < this.deleteId.length; j++) {

                                    axios.delete('questionsOnId/' + this.deleteId[j])
                                        .then((res) => {
                                            this.$router.push("/MyQuizes");
                                        }).catch((error) => console.log(error));
                                }

                            }
                        }
                    } else if (this.editedQuestions.length > this.length) {
                        for (let i = 0; i < this.editedQuestions.length; i++) {

                            if (i < this.length) {
                                axios.put('questions/' + this.editedQuestions[i].id, {
                                    id: this.editedQuestions[i].id,
                                    question: this.editedQuestions[i].question,
                                    correctAnswer: this.editedQuestions[i].correctAnswer,
                                    answer2: this.editedQuestions[i].answer2,
                                    answer3: this.editedQuestions[i].answer3,
                                    answer4: this.editedQuestions[i].answer4,
                                }).then((res) => {
                                    this.$router.push("/MyQuizes");
                                }).catch((error) => console.log(error));
                            }
                            else {
                                axios.post('questions', {
                                    question: this.editedQuestions[i].question,
                                    correctAnswer: this.editedQuestions[i].correctAnswer,
                                    answer2: this.editedQuestions[i].answer2,
                                    answer3: this.editedQuestions[i].answer3,
                                    answer4: this.editedQuestions[i].answer4,
                                }).catch((error) => console.log(error));
                            }
                        }
                    }
                    this.$router.push("/MyQuizes");
                }).catch((error) => console.log(error));
            }
        }
    },
};
</script>


<style>
@import '../../assets/css/createQuiz.css';
</style>