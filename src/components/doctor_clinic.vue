<template>
  <div id="flex_container_clinic">
    <h2>目前號碼</h2>
    <div id="input_base">
      <p class="num">{{ num }}</p>
      <div class="two_buttons">
        <button @click="add" id="pass">過號</button>
        <button @click="add" id="next">完成</button>
      </div>
    </div>
    <div id="input_base_list">
      <ol v-for="name in sequence_and_patient_name" :key="sequence_and_patient_name">
        <li id='number_list'>{{ name.patient_appointment_number }}.{{ name.this_clinic_patient_name }}</li>
      </ol>
    </div>
  </div>
  <br>
  <div id="under_box">
    <h2 style="margin-right: 800px">當前病人資料</h2>
    <div id="under_box_gray">
      <div class="container" style="justify-content: space-around">
        <p class="clinic_date">2222/22/22 星期天 早班</p>
        <p class="status">看診中</p>
      </div>
      <hr>
      <div id="patient_base_for_doctor">
        姓名:{{name}}
        血型:{{blood_type}}
        身分證字號:{{id}}
        生日:{{birthday}}
        性別:{{sex}}
        電話:{{phone_number}}
        地址:{{address}}
        緊急聯絡人:{{ice_contact}}
        緊急聯絡人關係:{{ice_relation}}
        緊急聯絡人電話:{{ice_number}}
        身高:{{height}}
        體重:{{weight}}
        健保卡卡號:{{ic_card_number}}
      </div>
    </div>


  </div>
</template>

<script setup>
import {ref, watch} from 'vue'
import axios from "axios";
const clinic_ID = ref(localStorage.getItem('clinic_id'))
const name = ref('')
const blood_type = ref('')
const id = ref('')
const birthday = ref('')
const sex = ref('')
const phone_number = ref('')
const address = ref('')
const ice_contact = ref('')
const ice_relation = ref('')
const ice_number = ref('')
const height = ref('')
const weight = ref('')
const ic_card_number = ref('')


const sequence_and_patient_name = ref([
  {
    patient_appointment_number: 1,
    this_clinic_patient_name: '你好阿'
  }
]);
const num = ref('0')
const add = () => {
  num.value++
}
watch(num, (newNum, oldNum) => {
  change_progress_in_db()
})
if(window.location.href === "http://localhost:5173/doctor_clinic.html"){
  get_clinic_info()
}
function get_clinic_info(){
  let config = {
    headers: {
      'Content-Type': 'application/json',
      'Access-Control-Allow-Origin': '*'
    }
  }
  axios.post('http://127.0.0.1:5000/get_clinic_info', {
    clinic_id: clinic_ID.value,
  }, config)
      .then(res => {
        num.value = res.data.progress
      })
      .catch(err => {
        console.log(err)
      });
}
function change_progress_in_db() {
  let config = {
    headers: {
      'Content-Type': 'application/json',
      'Access-Control-Allow-Origin': 'localhost:5000'
    }
  }
  axios.post('http://127.0.0.1:5000/update_clinic_status', {
    clinic_id: '2',
    status_dict:{ 'progress': num.value,}
  }, config)
      .then(response => {
        console.log(response)
      })
      .catch(err => {
        console.log(err)
      });
}

</script>
<style>
#flex_container_clinic {
  display: flex;
  flex-direction: row;
  justify-content: center;
  margin-top: 30px;
  align-content: flex-start;
}


.num {
  background-color: #7ea3cc;
  font-size: 50px;
  text-align: center;
  width: 100px;
  height: 50px;
  border-radius: 10px;
  padding-top: 35px;
  color: white;
}

.two_buttons {
  display: flex;
  flex-direction: row;
  justify-content: space-around;
  align-items: center;
  width: 300px;
  height: 122px;
}

#input_base {
  background-color: #E1E1E1;
  height: 350px;
  padding: 30px;
  border-radius: 30px;
  box-shadow: gray 2px 2px;
  display: flex;
  flex-direction: column;
  align-items: center;
}

#next {
  width: 125px;
  height: 50px;
  background-color: #00317B;
  color: white;
  text-align: center;
  border: 0;
}

#pass {
  width: 125px;
  height: 50px;
  background-color: #00317B;
  color: white;
  text-align: center;
  border: 0;
}


#input_base_list {

  background-color: #29528F;
  height: 350px;
  width: 200px;
  padding: 30px;
  text-align: center;
  border-radius: 30px;
  margin-left: 20px;
  box-shadow: gray 2px 2px;
  margin-top: 0;
}

#number_list {
  color: white;
  font-size: 20px;
  margin: 5px 5px 5px 5px;
  list-style-type: none;
  text-align: left;
}

#under_box_gray {

  background-color: #E1E1E1;
  height: 300px;
  padding: 30px;
  border-radius: 30px;
  box-shadow: gray 2px 2px;
  margin: auto;
  width: 50%;
  text-align: center;
}


#under_box {
  margin: auto;
  width: 100%;
  text-align: center;
}


.container {
  width: 100%;
  overflow: hidden; /* 用來清除float浮動產生的高度塌陷 */
}

.clinic_date {
  display: inline-block;
  float: left;
}

.status {
  display: inline-block;
  float: right;
  color: red;
}


</style>
