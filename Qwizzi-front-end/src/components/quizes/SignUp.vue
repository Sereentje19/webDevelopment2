<template>
    <div id="signU" width="100%">
        <div class="containerSignUp">

            <div class="divBtns">
                <p class="name">Sign up</p>
            </div>

            <label class="letterType" for="uname"><b>Username</b></label>
            <input class="inputFields" type="text" placeholder="Enter Username" name="uname" required>

            <label class="letterType" for="email"><b>Email address</b></label>
            <input class="inputFields" type="text" placeholder="Enter email" name="email" required>

            <label class="letterType" for="psw"><b>Password</b></label>
            <input class="inputFields" type="password" placeholder="Enter Password" name="psw" required>

            <label class="letterType" for="psw"><b>Confirm password</b></label>
            <input class="inputFields" type="password" placeholder="Enter Password" name="psw" required>

            <div class="divBtn">
                <button class="mainButtonReverse" type="submit">Sign up</button>
            </div>

        </div>
    </div>
</template>


<style>
#signU {
    margin-top: 50px;
}

.containerSignUp {
    padding: 50px 100px 50px 100px;
    background-color: rgb(245, 200, 0);
    border-radius: 1000px;
    margin: 0 auto 0 auto;
}

.imgcontainer,
.containerSignUp {
    width: fit-content;
    display: flex;
    flex-direction: column;
}
.letterType{
    margin-top: 10px;
}

.letterType {
    margin-top: 10px;
}
</style>