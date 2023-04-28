<template>
    <headerNavigation />

    <body>
        <div id="questionContainer" v-if="this.index < questions.length">
            <!-- {{ this.index + 1 }} -->
            <div class="name">{{ this.questions[this.index].question }}</div>
            <br><br><br>

            <div id="answer">
                <div id="titleInput1">
                    <button @click="nextQuestion(this.shuffledQuestions[parseInt(this.index)].correctAnswer)"
                        class="mainButtonReverse btn">{{
                            this.shuffledQuestions[this.index].correctAnswer }}</button>

                </div>
                <div id="titleInput">
                    <button @click="nextQuestion(this.shuffledQuestions[parseInt(this.index)].answer2)"
                        class="mainButtonReverse btn">{{
                            this.shuffledQuestions[this.index].answer2
                        }}</button>
                </div>
            </div>

            <div id="answer">
                <div id="titleInput1">
                    <button @click="nextQuestion(this.shuffledQuestions[parseInt(this.index)].answer3)"
                        class="mainButtonReverse btn">{{
                            this.shuffledQuestions[this.index].answer3
                        }}</button>
                </div>
                <div id="titleInput">
                    <button @click="nextQuestion(this.shuffledQuestions[parseInt(this.index)].answer4)"
                        class="mainButtonReverse btn">{{
                            this.shuffledQuestions[this.index].answer4
                        }}</button>
                </div>
            </div>
        </div>
        <div v-else="this.index != questions.length">
            <div class="name">Your answers</div>
            <div id="answerContainer" v-for="(quest, index) in questions">
                <div class="title">{{ quest.question }}</div>
                <div class="correctAnswer">{{ quest.correctAnswer }}</div>
                <div class="nameRed" v-if="quest.answer2 == this.arrayAnswers[index]">{{ quest.answer2 }}</div>
                <div class="restAnswers" v-else-if="quest.answer2 != this.arrayAnswers[index]">{{ quest.answer2 }}</div>
                <div class="nameRed" v-if="quest.answer3 == this.arrayAnswers[index]">{{ quest.answer3 }}</div>
                <div class="restAnswers" v-else-if="quest.answer3 != this.arrayAnswers[index]">{{ quest.answer3 }}</div>
                <div class="nameRed" v-if="quest.answer4 == this.arrayAnswers[index]">{{ quest.answer4 }}</div>
                <div class="restAnswers" v-else-if="quest.answer4 != this.arrayAnswers[index]">{{ quest.answer4 }}</div>

                <br><br><br>
            </div>
            <a href="/Quizes" class="mainButton btn">Done</a>
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
            arrayAnswers: [],
        };
    },
    mounted() {
        axios
            .get('questions/' + this.id)
            .then((res) => {
                this.questions = res.data;
                this.shuffledQuestions = this.questions.map(question => ({
                    correctAnswer: question.correctAnswer,
                    answer2: question.answer2,
                    answer3: question.answer3,
                    answer4: question.answer4
                }));
                this.shuffleQuestions();

            })
            .catch(error => console.log(error))
    },
    methods: {
        nextQuestion(finalAnswer) {
            const arrayAnswers = JSON.parse(localStorage.getItem('arrayAnswers')) || [];
            this.arrayAnswers.push(finalAnswer);
            localStorage.setItem('arrayAnswers', JSON.stringify(arrayAnswers));

            this.index++;
            localStorage.setItem('questionNumber', this.index);
            this.shuffleQuestions();
        },
        shuffleQuestions() {
            this.index = parseInt(localStorage.getItem("questionNumber"));

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

            // assign the shuffled values to the buttons
            this.shuffledQuestions[this.index].correctAnswer = answers[0];
            this.shuffledQuestions[this.index].answer2 = answers[1];
            this.shuffledQuestions[this.index].answer3 = answers[2];
            this.shuffledQuestions[this.index].answer4 = answers[3];
        }
    },

};
</script>

<style>
.nameRed,
.restAnswers,
.title,
.correctAnswer {
    font-size: 30px;
    font-weight: bold;
    color: rgb(89, 0, 89);
}

.nameRed {
    color: red;
}

.title {
    font-size: 40px;
}

.correctAnswer {
    color: green;
}

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

#answerContainer {
    display: flex;
    flex-direction: column;
    margin: 30px;
    left: 0;
    margin: auto;
    text-align: left;
    align-items: start;
    padding-left: 50px;
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

.mainButton,
.mainButton:hover {
    width: 10px;
    display: block;
    margin: 0 auto;
    text-align: center;
}
</style>