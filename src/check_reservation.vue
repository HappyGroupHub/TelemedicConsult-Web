<template>
    <bar/>
    <banner/>
    <div class="all" v-if="view_check===2">
        <div class="hello_to_patient">
          <h2>{{patient_name_from_login}}</h2>
          <h3>{{female_or_male}}</h3>

        </div>
        <div class="information">
            <div class="second">
                <h2 id="white">您已預約</h2>
                <h2 id="white">開始看診時間</h2>
                <h2 id="white">您的號碼牌</h2>
            </div>
            <div class="first1">
                <h3 id="blue">{{clinic_date}}</h3>
                <h3 id="blue">{{clinic_time}}</h3>
                <h3 id="blue">{{your_appointment_num}}</h3>
            </div>
        </div>

        <div class="buttons">
            <button id="back" @click="back_to_index">返回首頁</button>
        </div>
      *溫馨提醒:可以在LINE上得到更多資訊ㄛ
    </div>


  <div class="all" v-if="view_check===1">
    <div class="hello_to_patient">
      <h2>{{patient_name_from_login}}</h2>
      <h3>{{female_or_male}}</h3>
    </div>
    <div class="information">
      <div class="second">
        <h2 id="white">您將要預約</h2>
        <h2 id="white">開始看診時間</h2>
        <h2 id="white">已預約人數</h2>
      </div>
      <div class="first1">
        <h3 id="blue">{{clinic_date}}</h3>
        <h3 id="blue">{{clinic_time}}</h3>
        <h3 id="blue">{{appointment_num}}</h3>
      </div>
    </div>

    <div class="buttons">
      <button id="back" @click="back_to_select_time">返回</button>
      <button id="check_reservation"  @click="double_check_reservation">確認預約</button>
    </div>
    *溫馨提醒:可以在LINE上得到更多資訊ㄛ
  </div>

</template>

<script setup>
import bar from './components/bar.vue'
import banner from './components/banner_patient.vue'

import {computed, ref} from "vue";
import axios from "axios";
const patient_name_from_login = sessionStorage.getItem('name')
const clinic_date = ref("2000-00-00");
const clinic_time = ref("早上0點");
const appointment_num = ref("5人");
const female_or_male = ref('先生');
const get_clinic_id = sessionStorage.getItem("clinic_id");
const view_check = ref(1);
const your_appointment_num = ref("6號")
const id_id = sessionStorage.getItem("user_id")
const changeViewCheck = (index) => {
  view_check.value = index
}



if(sessionStorage.getItem('patient_sex')==='男'){
  female_or_male.value ='先生'
}else{
  female_or_male.value ='小姐'
}

if(window.location.href=== 'http://localhost:5173/check_reservation.html'){

  get_clinic_info_by_clinic_id_id()
}




function back_to_select_time(){
  window.location.href = "http://localhost:5173/reservation.html";
}
function back_to_index(){
  window.location.href = "http://localhost:5173/";
}

function get_clinic_info_by_clinic_id_id() {
  /*根據clinic_id得到date跟time*/
  let config = { headers: {
      'Content-Type': 'application/json',
      'Access-Control-Allow-Origin': '*'}
  }
  axios.post('http://127.0.0.1:5000/get_clinic_info', {
    clinic_id:get_clinic_id,
  }, config)
      .then(res => {
        clinic_date.value = res.data['date']
        appointment_num.value = res.data.total_appointment
        if(res.data['time_period']==='早') {
          clinic_time.value = '早上9點'
        }else if(res.data['time_period']==='中'){
          clinic_time.value = '下午2點'
        }else{if(res.data['time_period']==='晚') {
          clinic_time.value = '晚上7點'
        }

        }
      })
      .catch(err => {
        console.log(err)
      });
}

function double_check_reservation(){
  /*確認掛號*/
  let config = { headers: {
      'Content-Type': 'application/json',
      'Access-Control-Allow-Origin': '*'}
  }
  axios.post('http://127.0.0.1:5000/make_appointment', {
    clinic_id:get_clinic_id,
    patient_id:id_id,
  }, config)
      .then(res => {
        console.log(res)
        changeViewCheck(2)
        get_patient_appointment_with_clinic_id()
      })
      .catch(err => {
        console.log(err)
      });
}

function get_patient_appointment_with_clinic_id() {
  let config = {
    headers: {
      'Content-Type': 'application/json',
      'Access-Control-Allow-Origin': 'localhost:5000'
    }
  }
  axios.post('http://127.0.0.1:5000/get_patient_appointment_with_clinic_id', {
    patient_id: id_id,
    clinic_id: get_clinic_id
  }, config)
      .then(response => {
        console.log(response)
        your_appointment_num.value = response.data.appointment_num
      })
      .catch(err => {
        console.log(err)
      });
}
</script>

<style>
#blue {
    height: 35px;
    width: 350px;
    font-size: 20px;
    background-color: #00317B;
    color: white;
    text-align: center;
    border-radius: 15px;
    padding-top: 15px;
    box-shadow: gray 2px 2px;
}

.first1 {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;

}

.information {
    display: flex;
    flex-direction: row;
    justify-content: space-evenly;
    align-items: center;
    margin-top: 50px;
}

.second {
    align-items: center;
    display: flex;
    flex-direction: column;
}

#white {
    width: 150px;
    height: 35px;
    background-color: white;
    color: #00317B;
    text-align: center;
    border-radius: 10px;
    padding-top: 15px;
    box-shadow: gray 2px 2px;
}

.all {
    width: 800px;
    height: 500px;
    background-color: #e1e1e1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    border-radius: 30px;
    margin: 0 auto;
}

#back {
    width: 125px;
    height: 50px;
    background-color: #00317B;
    color: white;
    text-align: center;
    border: 0;
    box-shadow: gray 2px 2px;
    border-radius: 10px;
}

#check_reservation {
    width: 125px;
    height: 50px;
    background-color: #00317B;
    color: white;
    text-align: center;
    border: 0;
    box-shadow: gray 2px 2px;
    border-radius: 10px;
    margin-left: 50px;
}
.hello_to_patient{
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: center;
  margin-bottom: 0px;
  background-color: #00317B;
  color: white;
  border-radius: 10px;
  width: 800px;
}
</style>
