<template>
    <headerNavigation />

    <body>
        <div id="QuizContainer">
            <img id="logoQ" src="/images/logo.png" alt="Image is not shown">

            <div id="text">
                <h1>Title</h1>
                <p> haaihaai aai haai aai haai haai haai haai haaihaai haaihaai aai haaihaai haaihaai haaihaai haaihaai
                    haaihaai
                    haaihaai haaihaai haaihaai haaihaai haaihaai haaihaai haaihaai haaihaai haaihaai haaihaai haaihaai</p>
                <button class="Play btn">Play</button>
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
