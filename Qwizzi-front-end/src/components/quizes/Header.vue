<template>
  <div id="header">
    <a href="/"><img id="logo" src="/images/logo.png" alt="Image is not shown"></a>

    <div class="navbar">
      <a class="headerItem" id="headerTitles" href="/">Home</a>
      <a class="headerItem" id="headerTitles" href="/Quizes">Quizes</a>
      <!-- <a class="headerItem" id="purpleButton" href="/EnterCode">Enter code</a> -->
      <a class="headerItem2 btn" id="login" href="/Login">Login</a>
      <a class="headerItem12 btn" id="signUp" href="/SignUp">Sign up</a>

    </div>
  </div>
  <br><br><br><br><br><br>
</template>

<script>
export default {
  name: "header",
};
</script>
<style>
@import '../../assets/header.css';
</style>

<style>
/* #purpleButton:hover,
#purpleButton {
  border-radius: 50px;
  border-style: solid;
  border-width: 3px;
  font-size: 35px;
  padding: 2px 20px 2px 20px;
  background-color: rgb(255, 240, 255);
  border-color: rgb(89, 0, 89);
  color: rgb(89, 0, 89);
}

#purpleButton:hover {
  background-color: rgb(89, 0, 89);
  color: rgb(255, 244, 255);
} */
</style>