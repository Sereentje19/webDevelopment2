<template>
    <form action="action_page.php" method="post">
        <div id="logIn" width="100%">

            <div class="container">
                <label id="uname" for="uname"><b>Username</b></label>
                <input id="unameInput" type="text" placeholder="Enter Username" name="uname" required>

                <label id="email" for="email"><b>Email address</b></label>
                <input id="emailInput" type="text" placeholder="Enter email" name="email" required>

                <label id="psw" for="psw"><b>Password</b></label>
                <input id="pswInput" type="password" placeholder="Enter Password" name="psw" required>

                <label id="psw" for="psw"><b>Confirm password</b></label>
                <input id="pswInput" type="password" placeholder="Enter Password" name="psw" required>
            </div>

            <div class="container">
                <button class="SignUp" type="submit">Sign up</button>
            </div>
        </div>
    </form>
</template>

<script>
export default {
    name: "SignUp",
};
</script>

<style>
.SignUp:hover,
.SignUp {
    margin-top: 30px;
    border-radius: 50px;
    border-style: solid;
    border-width: 3px;
    font-size: 35px;
    padding: 2px 20px 2px 20px;
    background-color: rgb(89, 0, 89);
    border-color: rgb(89, 0, 89);
    color: rgb(255, 244, 255);
    font-weight: bold;
}

.SignUp:hover {
    background-color: rgb(255, 244, 255);
    color: rgb(89, 0, 89);
}

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

#uname,
#psw,
#email {
    margin-top: 10px;
    color: white;
    margin-right: 20px;
    font-weight: bold;
    font-size: 30px;
    text-shadow: -1.3px 1.3px 0 rgb(89, 0, 89), 1.3px 1.3px 0 rgb(89, 0, 89),
        1.3px -1.3px 0 rgb(89, 0, 89), -1.3px -1.3px 0 rgb(89, 0, 89);
}

#unameInput,
#pswInput,
#emailInput {
    width: 500px;
    height: 55px;
    border-radius: 100px;
    padding: 15px 20px 15px 20px;
    font-size: 25px;
}

</style>