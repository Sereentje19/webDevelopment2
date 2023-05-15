<template>
    <div id="logIn" width="100%">
        <div class="container">
            <div class="divBtns">
                <p class="name">Login</p>
            </div>
            <label class="letterType" id="letterType2"><b>Username</b></label>
            <input v-model="username" class="inputFields" type="text" placeholder="Enter username" required>

            <label class="letterType" id="letterType2"><b>Password</b></label>
            <input v-model="password" class="inputFields" type="password" placeholder="Enter password" required>

            <div class="divBtn">
                <button @click="login()" class="mainButton" id="loginBtn" type="button">Login</button>
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
                }
            ]
        };
    },
    methods: {
        login() {
            axios.post("users/login", {
                username: this.username,
                password: this.password,
            }).then((res) => {
                axios.defaults.headers.common['Authorization'] = "Bearer " + res.data.jwt;
                localStorage.setItem("jwt", res.data.jwt)
                this.$router.push("/MyQuizes");
                console.log(res.data.jwt);
            }).catch((error) => {
                console.log(error);
                alert("Error logging in");
            });
        }
    }
}
</script>

<style>
@import '../../assets/css/login.css';
</style>
