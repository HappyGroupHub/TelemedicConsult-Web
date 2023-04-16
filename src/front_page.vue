<template>
    <bar/>
    <banner/>
    <main>
        <section class="pic">
            <img src="image/front_image.png" id="image">
        </section>
        <section>
            <div id="btn">
                <br><br><br><br><br><br>
                <a href="time.html" id="btn_text">門診時間</a>
            </div>
            <div id="btn">
                <br><br><br><br><br><br>
                <a href="patient_login.html" id="btn_text">線上掛號</a>
            </div>
            <div id="btn">
                <br><br><br><br><br><br>
                <a href="description.html" id="btn_text">使用說明</a>
            </div>
        </section>
    </main>
</template>

<script setup>
import  bar  from  './components/bar.vue'
import banner from './components/banner_patient.vue'


</script>

<style scoped>

a:link, a:visited, a:hover, a:active {
    color: #000000;
    text-decoration: none;
}

section {
    display: flex;
    justify-content: space-around;
}

#btn {
    text-align: center;
    width: 100%;
    height: 300px;
    border-style: none solid;
    border-color: white;
    background: #00317B;
    border-radius: 20px;
    margin-left: 3px;
    margin-right: 3px;
    margin-top: 2px;
    box-shadow: silver 2px 2px;
    opacity: .83;
}

#btn_text {
    color: whitesmoke;
    font-size: 40px;
    margin-top: 30px;
}

#image {
    width: 100%;
    height: 34%;
    border-radius: 10px;
    margin-right: 5px;
    margin-right: 5px;
}
</style>
