<script setup>
import {computed, ref} from "vue";
import axios from "axios";

const doctor_id = ref(localStorage.getItem("doctor_id"));
const doctor_password = ref(localStorage.getItem("doctor_password"));
const doctor_name = ref('');
// const testforcheck = ref('123')
//
// const see = computed(() => {
//   if (doctor_id.value !== null && doctor_password.value !== null) {
//     testforcheck.value = '不知道';
//     show_login();
//     testforcheck.value = '不知道2';
//     return true;
//   } else {
//     return false;
//   }
// });


// function show_login() {
//   let config = { headers: {
//       'Content-Type': 'application/json',
//       'Access-Control-Allow-Origin': '*'}
//   }
//   axios.post('http://127.0.0.1:5000/doctor_login', {
//     doc_id: doctor_id.value,
//     password: doctor_password.value
//   }, config)
//       .then(res => {
//         testforcheck.value = '成功'
//         doctor_name.value = res.data['doc_name'];
//       })
//       .catch(err => {
//         console.log(err)
//       });
// }


function sign_out() {
  localStorage.removeItem("doctor_id");
  localStorage.removeItem("doctor_password");
  window.location.href = "/doctor_login.html";
}

</script>

<template>

    <div class="dheader">
      <h1>輔大醫資 醫師系統</h1>
      <ul class="menu">
        <section v-if="see">{{ doctor_name }}</section>
        <button id="btnn" @click="sign_out" >登出</button>
      </ul>
    </div>
<!--    {{testforcheck}}-->

</template>

<style scoped>

.dheader h1 {
  display: flex;
  justify-content: center;
  font-size: 40px;
  font-family: "微軟正黑體";
  color: #29528F;
  line-height: 100px;
  margin-bottom: 10px;
}

.menu {
  display: flex;
  justify-content: flex-end;
  margin:0px 16px;
  list-style: none;
}

.menu li {
  margin-right: 50px;
}

a:link, a:visited, a:hover, a:active {
  color: #000000;
  text-decoration: none;
}

#btnn{
  margin-bottom: -20px;
  background-color: #f4f2f2;
}

</style>