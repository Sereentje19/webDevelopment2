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
                <button @click="login()" class="mainButton" type="button">Login</button>
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
                    this.$router.push("/");
            }).catch((error) => {
                console.log(error);
                alert("Error logging in");
            });
        }
    }
}
</script>


<style>
#letterType2 {
    margin-top: 50px;
}

.imgcontainer,
.container {
    width: fit-content;
    display: flex;
    flex-direction: column;
    align-content: center;
}



#logIn {
    margin-top: 100px;
}

.container {
    padding: 55px;
    background-color: rgb(245, 200, 0);
    border-radius: 400px;
}
</style>