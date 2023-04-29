<template>
    <div id="signU" width="100%">
        <div class="containerSignUp">

            <div class="divBtns">
                <p class="name">Sign up</p>
            </div>

            <label class="letterType"><b>Username</b></label>
            <input v-model="username" class="inputFields" type="text" placeholder="Enter username">

            <label class="letterType"><b>Email address</b></label>
            <input v-model="email" class="inputFields" type="text" placeholder="Enter email">

            <label class="letterType"><b>Password</b></label>
            <input v-model="password" class="inputFields" type="password" placeholder="Enter password">

            <label class="letterType"><b>Confirm password</b></label>
            <input v-model="confirmPassword" class="inputFields" type="password" placeholder="Enter password">

            <div class="divBtn">
                <button @click="signUp" class="mainButtonReverse" >Sign up</button>
            </div>

        </div>
    </div>
</template>

<script>
import axios from '../../axios-auth.js';

export default {
    data() {
        return {
            user: [
                {
                    username: '',
                    email: '',
                    password: '',
                    confirmPassword: '',
                }
            ]
        }
    },
    methods: {
        signUp() {
            if (this.username != null && this.email != null && this.password != null) {
                if (this.password == this.confirmPassword) {
                    axios.post("users", {
                        username: this.username,
                        email: this.email,
                        password: this.password,
                        confirmPassword: this.confirmPassword,
                    }).then((res) => {
                        this.$router.push("/");
                    })
                    .catch((error) => console.log(error));
                }
                else{
                    alert("Passwords do not match!");
                }
            }
            else{
                alert("Please fill in all fields!");
            }
        }
    }
}
</script>

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

.letterType {
    margin-top: 10px;
}

.letterType {
    margin-top: 10px;
}
</style>