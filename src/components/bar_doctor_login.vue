<template>
    <header>
        <div class="header">
            <h1>臺北市立聯合醫院 醫師系統</h1>
            <ul class="menu">
                <button @click="sign_out">{{doctor_name}} 登出</button>
            </ul>
        </div>
    </header>

</template>

<script setup>
import {computed, ref, watch} from "vue";
import axios from "axios";

const doctor_name = ref("尚未登入");
const doctor_id = ref(localStorage.getItem("doctor_id"));
const doctor_password = ref(localStorage.getItem("doctor_password"));


const checkValue = computed(()=>
    doctor_id.value !== '' &&
    doctor_password.value !== ''
);

if(checkValue){
  show_login()
}

function show_login() {
  let config = { headers: {
      'Content-Type': 'application/json',
      'Access-Control-Allow-Origin': '*'}
  }
  axios.post('http://127.0.0.1:5000/doctor_login', {
    doc_id: doctor_id.value,
    password: doctor_password.value
  }, config)
      .then(res => {
        doctor_name.value = res.data['doc_name'];

      })

      .catch(err => {
        console.log(err)
      });

}

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