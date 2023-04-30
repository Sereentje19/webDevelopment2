<template>
    <div id="signUpContainer" width="100%">
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
                <button @click="signUp" class="mainButtonReverse" id="signUpBtn">Sign up</button>
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
                    axios.post("users/signUp", {
                        username: this.username,
                        email: this.email,
                        password: this.password,
                        confirmPassword: this.confirmPassword,
                    }).then((res) => {
                        this.$router.push("/");
                    })
                        .catch((error) => console.log(error));
                }
                else {
                    alert("Passwords do not match!");
                }
            }
            else {
                alert("Please fill in all fields!");
            }
        }
    }
}
</script>

<style>
@import '../../assets/signUp.css';
@import '../../assets/main.css';
</style>