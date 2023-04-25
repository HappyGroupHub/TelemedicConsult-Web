<template>
    <bar/>
    <banner/>
    <div class="all">
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
                <h3 id="blue">{{clinic_number}}</h3>
            </div>
        </div>

        <div class="buttons">
            <button id="back" @click="back_to_select_time">返回</button>
            <button id="check_reservation" @click="insert_check_clinic_content_to_db">確認預約</button>
        </div>

    </div>
  *溫馨提醒:可以在LINE上得到更多資訊ㄛ
</template>

<script setup>
import bar from './components/bar.vue'
import banner from './components/banner_patient.vue'
import {computed, ref} from "vue";
import axios from "axios";

const clinic_date = ref("2000-00-00");
const clinic_time = ref("早上0點");
const clinic_number = ref("0號");
const get_clinic_number = sessionStorage.getItem("clinic_number");
const patient_name_from_login = ref('吳修瑩');
const female_or_male = ref('小姐');
const get_clinic_id = sessionStorage.getItem("clinic_id");

function get_patient_id(){
    return sessionStorage.getItem("user_id");
}
if(window.location.href=== 'http://localhost:5173/check_reservation.html'){
  get_patient_id();
  get_patient_info_by_id()
}


function insert_check_clinic_content_to_db(){
/*按下按鈕之後儲存掛號資料*/
  let config = { headers: {
      'Content-Type': 'application/json',
      'Access-Control-Allow-Origin': '*'}
  }
  axios.post('http://127.0.0.1:5000/', {
    clinic_id: get_clinic_id,

  }, config)
      .then(res => {


      })
      .catch(err => {
        console.log(err)
      });

}
function get_patient_info_by_id() {
  let config = { headers: {
      'Content-Type': 'application/json',
      'Access-Control-Allow-Origin': '*'}
  }
  axios.post('http://127.0.0.1:5000/get_patient_info_by_id', {
    id: get_patient_id(),
  }, config)
      .then(res => {
        patient_name_from_login.value = res.data['name']
        if(res.data['sex']==='男'){
          female_or_male.value= '先生'
        }else{
          female_or_male.value= '小姐'
        }

      })
      .catch(err => {
        console.log(err)
      });
}
function back_to_select_time(){
  window.location.href = "http://localhost:5173/reservation.html";
}

function get_clinic_info_by_clinic_id() {
  /*根據clinic_id得到date跟time*/
  let config = { headers: {
      'Content-Type': 'application/json',
      'Access-Control-Allow-Origin': '*'}
  }
  axios.post('http://127.0.0.1:5000/', {
    clinic_id:get_clinic_id,
  }, config)
      .then(res => {
        clinic_date.value = res.data['date']
        clinic_time.value = res.data['time']
      })
      .catch(err => {
        console.log(err)
      });
}
if(window.location.href=== 'http://localhost:5173/check_reservation.html'){
  get_clinic_info_by_clinic_id();
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
