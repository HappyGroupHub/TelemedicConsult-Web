

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
import Bar from "./components/bar_doctor_login.vue";
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
  axios.post('http://127.0.0.1:5000/', {
    id: doctor_id.value,
  }, config)
      .then(res => {
        if(res.data.status === "success"){
          const patientInfo = res.data;
          if(patientInfo.ic_card_number === ic_card_number.value){
            window.location.href = "";
            sessionStorage.setItem("doctor_id", id.value);
            show_login_or_not.value = "成功拉";

          }else {
            show_login_or_not.value = "錯誤"
          }
        }else {
          show_login_or_not.value = "醫師代碼"
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
  background-color: #4CAF50;
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
