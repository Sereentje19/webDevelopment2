
<template>
    <headerNavigation />

    <body>
        <div class="headerQuizes d-flex">
            <h1>Quizes</h1>
            <button class="CreateQuiz btn">Create quiz</button>
        </div>

        <div id="quizContainer" width="100%">
            <!-- <li class="list-group-item" v-for="user in users"> {{ user.username }} </li> -->

            <div id="quiz" width="30%">
                <img id="logoQuiz" src="/images/logo.png" alt="Image is not shown">
                <h2>Title</h2>
                <p id="textQuiz"> haaihaai aai haai aai haai haai haai haai haaihaai haaihaai aai haaihaai haaihaai haaihaai
                    haaihaai haaihaai haaihaai haaihaai haaihaai haaihaai haaihaai haaihaai haaihaai haaihaai haaihaai
                    haaihaai haaihaai</p>
                <a href="/Quiz" class="quizBtn btn">go to quiz</a>
            </div>

            <div id="quiz" width="30%">
                <img id="logoQuiz" src="/images/logo.png" alt="Image is not shown">
                <h2>Title</h2>
                <p id="textQuiz"> haaihaai aai haai aai haai haai haai haai haaihaai haaihaai aai haaihaai haaihaai haaihaai
                    haaihaai haaihaai haaihaai haaihaai haaihaai haaihaai haaihaai haaihaai haaihaai haaihaai haaihaai
                    haaihaai haaihaai</p>
                <button class="quizBtn btn">go to quiz</button>
            </div>
            <div id="quiz" width="30%">
                <img id="logoQuiz" src="/images/logo.png" alt="Image is not shown">
                <h2>Title</h2>
                <p id="textQuiz"> haaihaai aai haai aai haai haai haai haai haaihaai haaihaai aai haaihaai haaihaai haaihaai
                    haaihaai haaihaai haaihaai haaihaai haaihaai haaihaai haaihaai haaihaai haaihaai haaihaai haaihaai
                    haaihaai haaihaai</p>
                <button class="quizBtn btn">go to quiz</button>
            </div>
            <div id="quiz" width="30%">
                <img id="logoQuiz" src="/images/logo.png" alt="Image is not shown">
                <h2>Title</h2>
                <p id="textQuiz"> haaihaai aai haai aai haai haai haai haai haaihaai haaihaai aai haaihaai haaihaai haaihaai
                    haaihaai haaihaai haaihaai haaihaai haaihaai haaihaai haaihaai haaihaai haaihaai haaihaai haaihaai
                    haaihaai haaihaai</p>
                <button class="quizBtn btn">go to quiz</button>
            </div>

            <div v-if="3 == 4" id="quiz">
                <img id="logoQuiz" src="/images/logo.png" alt="Image is not shown">
                haai haai
            </div>

        </div>

    </body>

    <footerNavigation />
</template>

<script>
import headerNavigation from './Header.vue'
import footerNavigation from './Footer.vue';

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
    }
};
</script>


<style>
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
}</style>