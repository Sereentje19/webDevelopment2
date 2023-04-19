<template>
    <div id="con">
        <input id="unameInputLogin" placeholder="Enter code" name="uname" required>
        <div class="divBtns">
            <button class="submitBtn" type="submit">Submit</button>
        </div>
    </div>
</template>

<style>
#con {
    display: flex;
    flex-direction: row;
    justify-content: center;
    top: 45%;
    left: 25%;
    position: absolute;
}

#code {
    margin-top: 10px;
    color: white;
    margin-right: 20px;
    font-weight: bold;
    font-size: 30px;
    text-shadow: -1.3px 1.3px 0 rgb(89, 0, 89), 1.3px 1.3px 0 rgb(89, 0, 89),
        1.3px -1.3px 0 rgb(89, 0, 89), -1.3px -1.3px 0 rgb(89, 0, 89);
}

.submitBtn:hover,
.submitBtn {
    margin-left: 20px;
    border-radius: 50px;
    border-style: solid;
    border-width: 3px;
    font-size: 30px;
    padding: 2px 20px 2px 20px;
    background-color: rgb(255, 240, 255);
    border-color: rgb(89, 0, 89);
    color: rgb(89, 0, 89);
    font-weight: bold;
    width: 150px;
    align-content: center;
}



.submitBtn:hover {
    background-color: rgb(89, 0, 89);
    color: rgb(255, 244, 255);
}
</style>