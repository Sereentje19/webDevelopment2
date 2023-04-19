<template>
    <div id="logIn" width="100%">
        <div class="container">
            <div class="divBtns">
                <p id="name">Login</p>
            </div>
            <label id="unameLogin" for="uname"><b>Username</b></label>
            <input id="unameInputLogin" type="text" placeholder="Enter Username" name="uname" required>

            <label id="pswLogin" for="psw"><b>Password</b></label>
            <input id="pswInputLogin" type="password" placeholder="Enter Password" name="psw" required>

            <div class="divBtns">
                <button class="loginBtn" type="submit">Login</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Login",
};
</script>

<style>

#logIn,
.imgcontainer,
.container {
    display: flex;
    flex-direction: column;
    align-content: center;
}

.imgcontainer,
.container {
    width: fit-content;
}

#name {
    align-content: center;
    color: rgb(89, 0, 89);
    font-size: 50px;
    font-weight: bold;
}

.divBtns {
    display: flex;
    justify-content: center;
}

.loginBtn:hover,
.loginBtn {
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
    width: 150px;
    align-content: center;
}



.loginBtn:hover {
    background-color: rgb(89, 0, 89);
    color: rgb(255, 244, 255);
}

#logIn {
    margin-top: 100px;
}

.container {
    padding: 55px;
    background-color: rgb(130, 105, 137);
    border-radius: 400px;
}


#unameLogin,
#pswLogin {
    margin-top: 30px;
    color: white;
    margin-right: 20px;
    font-weight: bold;
    font-size: 40px;
    text-shadow: -1.3px 1.3px 0 rgb(89, 0, 89), 1.3px 1.3px 0 rgb(89, 0, 89),
        1.3px -1.3px 0 rgb(89, 0, 89), -1.3px -1.3px 0 rgb(89, 0, 89);
}

#unameInputLogin,
#pswInputLogin {
    width: 500px;
    height: 65px;
    border-radius: 100px;
    padding: 15px 20px 15px 20px;
    font-size: 25px;
}
</style>