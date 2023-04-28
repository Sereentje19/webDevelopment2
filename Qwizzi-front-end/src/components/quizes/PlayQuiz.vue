<template>
    <headerNavigation />

    <body>
        <div id="questionContainer" v-if="this.index != questions.length">
            <!-- {{ this.index + 1 }} -->
            <div class="name">{{ this.questions[this.index].question }}</div>
            <br><br><br>

            <div id="answer">
                <div id="titleInput1">
                    <button @click="nextQuestion(this.shuffledQuestions[this.index].correctAnswer)"
                        class="mainButtonReverse btn">{{
                            this.shuffledQuestions[this.index].correctAnswer }}</button>
                </div>
                <div id="titleInput">
                    <button @click="nextQuestion(this.shuffledQuestions[this.index].answer2)" class="mainButtonReverse btn">{{
                        this.shuffledQuestions[this.index].answer2
                    }}</button>
                </div>
            </div>

            <div id="answer">
                <div id="titleInput1">
                    <button @click="nextQuestion(this.shuffledQuestions[this.index].answer3)" class="mainButtonReverse btn">{{
                        this.shuffledQuestions[this.index].answer3
                    }}</button>
                </div>
                <div id="titleInput">
                    <button @click="nextQuestion(this.shuffledQuestions[this.index].answer4)" class="mainButtonReverse btn">{{
                        this.shuffledQuestions[this.index].answer4
                    }}</button>
                </div>
            </div>

            <!-- <a @click="nextQuestion()" class="mainButton btn">Next question</a> -->
        </div>
        <div id="QuizContainer" v-else="this.index != questions.length">
            tes
            <!-- <a @click="nextQuestion()" class="mainButton btn">Play</a> -->
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
            questions: [
                {
                    quizId: 0,
                    question: '',
                    correctAnswer: '',
                    answer2: '',
                    answer3: '',
                    answer4: ''
                }
            ],
            shuffledQuestions: [
                {
                    correctAnswer: '',
                    answer2: '',
                    answer3: '',
                    answer4: ''
                }
            ],
            index: 0,
        };
    },
    mounted() {
        axios
            .get('questions/' + this.id)
            .then((res) => {
                this.questions = res.data;
                this.index = localStorage.getItem("questionNumber");

                let answers = [
                    this.questions[this.index].correctAnswer,
                    this.questions[this.index].answer2,
                    this.questions[this.index].answer3,
                    this.questions[this.index].answer4,
                ];

                // shuffle the answers array
                for (let i = answers.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [answers[i], answers[j]] = [answers[j], answers[i]];
                }

                // if(this.index != 0) {                
                //     localStorage.getItem("finalAnswer", JSON.parse(arrayAnswers[this.index]));
                // }

                // assign the shuffled values to the buttons
                this.shuffledQuestions[this.index].correctAnswer = answers[0];
                this.shuffledQuestions[this.index].answer2 = answers[1];
                this.shuffledQuestions[this.index].answer3 = answers[2];
                this.shuffledQuestions[this.index].answer4 = answers[3];

            })
            .catch(error => console.log(error))
    },
    methods: {
        nextQuestion(finalAnswer) {
            console.log(finalAnswer);
            const arrayAnswers = JSON.parse(localStorage.getItem('arrayAnswers')) || [];

            arrayAnswers.push(finalAnswer);
            localStorage.setItem('arrayAnswers', JSON.stringify(arrayAnswers));
            localStorage.setItem('questionNumber', ++this.index);
        },
    },

};
</script>

<style>
#titleInput {
    display: flex;
    flex-direction: column;
    width: 50%;
}


#titleInput1 {
    display: flex;
    flex-direction: column;
    margin-right: 80px;
    width: 50%;
}

#answer {
    display: flex;
    flex-direction: row;
}

#questionContainer {
    display: flex;
    flex-direction: column;
    margin: 30px;
}

.mainButtonReverse:hover,
.mainButtonReverse {
    display: flex;
    width: 100%;
    justify-content: center;
}

.mainButton:hover,
.mainButton {
    width: 10px;
}
</style>