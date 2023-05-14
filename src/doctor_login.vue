

<template xmlns="http://www.w3.org/1999/html">

  <bar></bar>
  <banner_doctor_login/>
  <div id="flex_container">
    <div id="input_base">
      <div id="inner_template">
        <h2 style="text-align: left">登入系統</h2>
        <h4 style="text-align: left">帳號</h4>
        <input id="id" type="text" v-model="doctor_id"/>
        <h4 style="text-align: left">密碼</h4>
        <input id="password" type="password" v-model="doctor_password">
        <div id="inner_btn">
          <button id="submit_login" @click="check_doctor_login">登入</button>
        </div>
        <p v-if="show_login_or_not">{{ show_login_or_not }}</p>
      </div>

      <p></p>

    </div>
  </div>
</template>

<script setup>

import banner_doctor_login from "./components/banner_doctor.vue";
import Bar from "./components/bar_doctor.vue";
import {ref} from "vue";
import axios from "axios";

const doctor_id = ref('');
const doctor_password = ref('');
const show_login_or_not = ref('');


function check_doctor_login() {
  let config = { headers: {
      'Content-Type': 'application/json',
      'Access-Control-Allow-Origin': '*'}
  }
  axios.post('http://127.0.0.1:5000/doctor_login', {
    doc_id: doctor_id.value,
    password: doctor_password.value
  }, config)
      .then(res => {
        if(res.data.status === "success"){
          const doctorInfo = res.data;
          if(doctorInfo['login'] === true) {
            show_login_or_not.value = "登入成功";
            localStorage.setItem("doctor_id", doctor_id.value);
            localStorage.setItem("doctor_password", doctor_password.value);
            window.location.href = "/doctor_schedule.html";
          }else {
            show_login_or_not.value = '登入失敗';
          }
          }
      })
      .catch(err => {
        console.log(err)
      });

}

</script>

<style>
#flex_container {
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: flex-end;
}

#input_base {
  width: 400px;
  background-color: #E1E1E1;
  height: 350px;
  padding: 30px;
  text-align: center;
  border-radius: 30px;
  margin-left: 20px;
  box-shadow: gray 2px 2px;
  margin-top: 0;
  margin-bottom: 5px;

}

#submit_login {
  display: inline-block;
  padding: 10px 20px;
  background-color: #00317B;
  color: white;
  text-align: center;
  font-size: 16px;
  box-shadow: gray 2px 2px;
  border: 0;
  border-radius: 7px;
  margin: 20px 30px 10px 20px;
}

#inner_template {
  justify-content: center;
}

#id {
  justify-content: center;
}

</style>
