<template>
  <div id="header" width="100%">
    <a href="/"> <img id="logo" src="/images/logo.png" alt="Image is not shown" width="200px"></a>

    <div class="navbar">
      <a class="headerItem" id="item1" href="/">Home</a>
      <a class="headerItem" id="item1" href="/Quizes">Quizes</a>
      <a class="headerItem" id="purpleButton" href="/EnterCode">Enter code</a>
      <a class="headerItem2 btn" id="login" href="/Login">Login</a>
      <a class="headerItem12 btn" id="signUp" href="/SignUp">Sign up</a>

    </div>
  </div>
</template>

<script>
export default {
  name: "Navigation",
};
</script>

<style>
body {
  background-color: rgb(88, 88, 88);
}

#logo {
  border-radius: 10px;
}

#header {
  display: flex;
  /* margin-top: -420px; */
  padding: 20px;
}

.navbar {
  margin-left: auto;
}

#item1 {
  font-size: 40px;
  text-shadow: -1.3px 1.3px 0 rgb(89, 0, 89), 1.3px 1.3px 0 rgb(89, 0, 89),
    1.3px -1.3px 0 rgb(89, 0, 89), -1.3px -1.3px 0 rgb(89, 0, 89);
}

.headerItem {
  color: white;
  margin-right: 20px;
  font-weight: bold;
}

#purpleButton:hover,
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
}

a:link,
a:hover {
  color: white;
  text-decoration: none;
}


#login {
  margin-left: 35px;
  font-size: 25px;
  background-color: rgb(89, 0, 89);
  border-radius: 50px 0px 0px 50px;
  border-style: solid;
  color: white;
  border-width: 3px 0px 3px 3px;
  font-weight: bold;
}

#login:hover {
  margin-left: 35px;
  background-color: rgb(255, 240, 255);
  border-color: rgb(70, 0, 70);
  border-width: 3px 0px 3px 3px;
  color: rgb(69, 0, 69);
  font-weight: bold;
}

#signUp {
  font-size: 25px;
  color: white;
  background-color: rgb(70, 0, 70);
  border-radius: 0px 50px 50px 0px;
  border-style: solid;
  border-width: 3px 3px 3px 0px;
  font-weight: bold;
}

#signUp:hover {
  background-color: rgb(255, 240, 255);
  border-color: rgb(89, 0, 89);
  border-width: 3px 3px 3px 0px;
  color: rgb(89, 0, 89);
  font-weight: bold;
}
</style>