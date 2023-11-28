<template>
  <banner/>
  <div class="final-reservation" v-if="view_check===2">
    <div class="greeting">
      <h3>{{ female_or_male }}</h3>
      <h2>{{ patient_name_from_login }}</h2>&nbsp;
    </div>
    <div id="already_or_not">
      {{ already_appointment }}
    </div>
    <div class="information">
      <div class="second">
        <h2 id="white">您已預約</h2>
        <h2 id="white">開始看診時間</h2>
        <h2 id="white">您的號碼牌</h2>
      </div>
      <div class="first1">
        <h3 id="blue">{{ clinic_date }}</h3>
        <h3 id="blue">{{ clinic_time }}</h3>
        <h3 id="blue">{{ your_appointment_num }}</h3>
      </div>
    </div>
    <button id="back" @click="back_to_index">Back to Homepage</button>
    <p>*溫馨提醒:可以在LINE上得到更多資訊ㄛ</p>
  </div>


  <div class="final-reservation" v-if="view_check===1">
    <div class="greeting">
      <h3>{{ female_or_male }}</h3>
      <h2> Tester</h2>&nbsp;
    </div>
    <div class="information">
      <div class="second">
        <h2 id="white">You are about to make a reservation on</h2>
        <h2 id="white">Start of Consultation Time at</h2>
        <h2 id="white">Number of Reservations</h2>
      </div>
      <div class="first1">
        <h3 id="blue">{{ clinic_date }}</h3>
        <h3 id="blue">{{ clinic_time }}</h3>
        <h3 id="blue">{{ appointment_num }}</h3>
      </div>
    </div>
    <br>
    <div class="buttons">
      <button id="back" @click="back_to_select_time">Back</button>
      <button id="check_reservation" @click="double_check_reservation">Confirm</button>
    </div>
    <p class="notice">*Kind Reminder: You can obtain more information on LINE.</p>
  </div>

</template>

<script setup>
import bar from './components/bar.vue'
import banner from './components/banner_patient.vue'
import {ref} from "vue";
import axios from "axios";

const patient_name_from_login = localStorage.getItem('name')
const clinic_date = ref("2000-00-00");
const clinic_time = ref("10:00 AM");
const appointment_num = ref("5");
const female_or_male = ref('Mr.');
const get_clinic_id = localStorage.getItem("clinic_id");
const view_check = ref(1);
const your_appointment_num = ref("0號")
const id_id = localStorage.getItem("user_id")
const already_appointment = ref('')
const changeViewCheck = (index) => {
  view_check.value = index
}


if (localStorage.getItem('patient_sex') === '男') {
  female_or_male.value = 'Mr.'
} else {
  female_or_male.value = 'Ms.'
}

if (window.location.href === 'http://localhost:5173/check_reservation.html') {
  get_clinic_info_by_clinic_id_id()
}


function back_to_select_time() {
  window.location.href = "http://localhost:5173/reservation.html";
}

function back_to_index() {
  window.location.href = "http://localhost:5173/";
}

function get_clinic_info_by_clinic_id_id() {
  /*根據clinic_id得到date跟time*/
  let config = {
    headers: {
      'Content-Type': 'application/json',
      'Access-Control-Allow-Origin': '*'
    }
  }
  axios.post('http://127.0.0.1:5000/get_clinic_info', {
    clinic_id: get_clinic_id,
  }, config)
      .then(res => {
        clinic_date.value = res.data['date']
        appointment_num.value = res.data['total_appointment']
        if (res.data['time_period'] === '早') {
          clinic_time.value = '早上9點'
        } else if (res.data['time_period'] === '中') {
          clinic_time.value = '下午2點'
        } else {
          if (res.data['time_period'] === '晚') {
            clinic_time.value = '晚上7點'
          }
        }
      })
      .catch(err => {
        console.log(err)
      });
}

function double_check_reservation() {
  /*確認掛號*/
  let config = {
    headers: {
      'Content-Type': 'application/json',
      'Access-Control-Allow-Origin': '*'
    }
  }
  axios.post('http://127.0.0.1:5000/make_appointment', {
    clinic_id: get_clinic_id,
    patient_id: id_id,
  }, config)
      .then(res => {
        console.log(res)
        if (res.data[appointment_num] === 0) {
          already_appointment.value = '您已經預約過了，以下是您之前預約過的紀錄'
          your_appointment_num.value = '0'
          changeViewCheck(2)
        } else {
          get_patient_appointment_with_clinic_id()

        }
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
        changeViewCheck(2)
      })
      .catch(err => {
        console.log(err)
      });
}
</script>

<style>
.notice{
  margin-bottom: 0;
}
#blue {
  height: 35px;
  width: 340px;
  font-size: 20px;
  background-color: #00317B;
  color: white;
  text-align: center;
  border-radius: 15px;
  padding-top: 15px;
  box-shadow: gray 2px 2px;
  margin-left: 5px;
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
  margin-top: 30px;
}

.second {
  align-items: center;
  display: flex;
  flex-direction: column;
}

#white {
  width: 450px;
  height: 35px;
  background-color: white;
  color: #00317B;
  text-align: center;
  border-radius: 10px;
  padding-top: 15px;
  box-shadow: gray 2px 2px;
  margin-right: 5px;
}

.final-reservation {
  padding:30px;
  width: 800px;
  height: 500px;
  background-color: #e1e1e1;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  border-radius: 30px;
  margin: 30px auto 0 auto;
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

.greeting {
  display: flex;
  justify-content: center;
  background-color: #00317B;
  color: white;
  border-radius: 10px;
  width: 100%;
}
</style>
