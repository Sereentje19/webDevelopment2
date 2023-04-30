<template>
  <headerNavigation />

  <body>
    <div id="homeText">
      <h1> Welcome to Qwizzi</h1>
      <h4> the ultimate destination for quiz enthusiasts!</h4>
      Qwizzi offers a wide range of quizzes for all interests and difficulty levels. Our quizzes are fun and educational,
      providing interesting facts and information. The site is user-friendly and easy to navigate, allowing you to browse
      by category or difficulty, or even create your own quiz. Join our community and compete for the top spot on the
      leaderboard or take it easy and learn something new. Start quizzing with Qwizzi today!
      <br><br>
      <a href="/Quizes" class="CreateQuiz btn">Go to Quizes</a>

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
  min-height: 554px;
}

#homeText {
  margin: 5% 50% 5% 5%;
}</style>