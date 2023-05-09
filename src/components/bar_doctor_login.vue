<template>
  <header>
    <div class="header">
      <h1>臺北市立聯合醫院 醫師系統</h1>
      <ul class="menu">
        <button @click="sign_out">登出</button>
      </ul>
    </div>
  </header>
</template>

<script setup>
import {ref } from "vue";



const doctor_id = ref(localStorage.getItem("doctor_id"));
const doctor_password = ref(localStorage.getItem("doctor_password"));





function sign_out() {
  localStorage.removeItem("doctor_id");
  localStorage.removeItem("doctor_password");
  window.location.href = "/doctor_login.html";
}


</script>

<style scoped>
.header {
    display: flex;
    justify-content: space-around;
}

.header h1 {
    font-size: 40px;
    font-family: "微軟正黑體";
    color: #29528F;
    line-height: 100px;
}

.menu {
    display: flex;
    align-items: center;
    list-style: none;
}

.menu li {
    margin-right: 50px;
}

a:link, a:visited, a:hover, a:active {
    color: #000000;
    text-decoration: none;
}

</style>