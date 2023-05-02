
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
                <div class="form-group">
                    <input type="file" id="file" @change="onFileChange">
                    <p id="colorPurple"><small>Picture &lt; 64mb</small>
                    </p>
                </div>



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
                    <button @click="addQuestion()" id="createbtn" class="mainButton" type="button">Add question</button>
                    <button @click="create()" id="createbtn" class="mainButton" type="button">Create</button>
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
            selectedFile: null,
            fileContents: null,
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
        onFileChange(event) {
            this.selectedFile = event.target.files[0]

            const reader = new FileReader();
            reader.onload = () => {
                this.fileContents = reader.result;
            };
            reader.readAsDataURL(this.selectedFile);
        },
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
            let formData = new FormData();
            formData.append('title', this.title);
            formData.append('text', this.text);
            formData.append('file', this.selectedFile);

            axios.post('quizes', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                    Authorization: "Bearer " + localStorage.getItem("jwt")
                }
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
                this.$router.push("/MyQuizes");
            }).catch((error) => console.log(error));
        },
    },
};
</script>

<style>
@import '../../assets/createQuiz.css';
@import '../../assets/main.css';
</style>