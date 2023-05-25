<template>
  {{ num }}
  {{ pass_nums }}
  {{test_for_now}}
  {{test_for_now2}}
  <div id="flex_container_clinic">
    <h2 style="margin-top: 45px">目前號碼</h2>
    <div id="input_base">
      <p class="num">{{ num[0] }}</p>
      <button v-if="start_clinic" @click="start_clinic_button">開始看診</button>
      <div class="two_buttons">
        <button @click="pass_and_add" id="pass">過號</button>
        <button @click="add" id="next">完成</button>
      </div>
      <!--      結束按鈕-->
    </div>
    <div id="input_base_list">
      <ol v-for="name in sequence_and_patient_name" :key="name.appointment_num">
        <li id='number_list'>{{ name.appointment_num }}.{{ name.patient_name }}</li>
      </ol>
    </div>
  </div>
  <br><br>
  <hr>
  <div id="under_box">
    <h2 style="margin-right: 800px">當前病人資料</h2>
    <div id="under_box_gray">
      <div class="container" style="justify-content: space-around">
        <p class="clinic_date">{{ date }} {{ getWeekDay(date) }} {{ time_period }}班</p>
        <p class="status">看診中</p>
      </div>
      <hr>
      <div id="patient_base_for_doctor">
        <div id="left_patient_base">
          <p>姓名:{{ name }}</p>
          <p>血型:{{ blood_type }}型</p>
          <p>生日:{{ birthday }}</p>
          <p>身分證字號:{{ id }}</p>
          <p>性別:{{ sex }}</p>
          <p>電話:{{ phone_number }}</p>
          <p>地址:{{ address }}</p>
        </div>
        <div id="right_patient_base">
          <p>緊急聯絡人:{{ ice_contact }}</p>
          <p>緊急聯絡人關係:{{ ice_relation }}</p>
          <p>緊急聯絡人電話:{{ ice_number }}</p>
          <p>身高:{{ height }}公分</p>
          <p>體重:{{ weight }}公斤</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import {ref} from 'vue'
import axios from "axios";




const clinic_ID = ref(localStorage.getItem('clinic_id'))
const name = ref()
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
const date = ref('2000/00/00')
const time_period = ref('早')
const try_test = ref('test')
const hello = ref([])
const try_id = ref([])
const start_clinic = ref(false)
const sequence_and_patient_name = ref([])
const num = ref([])
const test = ref('')
const pass_nums = ref([])
const length123 = ref()
const progress_from_pass = ref('')
const test_for_now = ref('')
const test_for_now2 = ref('')

import {inject} from "vue";
const WebSocket = inject('WebSocket')
WebSocket.$on('message', (data) => {
  console.log(data)
  progress_from_pass.value = data
  get_pass()
});



// 得到progress的index
function get_pass() {
  const index = pass_nums.value.indexOf(progress_from_pass.value)
  if(index !== -1){
    pass_nums.value.splice(index, 1)
    num.value.splice( 2, 0, progress_from_pass.value)
    length123.value += 1
  }
}

function pass_appointment() {
  let config = {
    headers: {
      'Content-Type': 'application/json',
      'Access-Control-Allow-Origin': '*'
    }
  }
  axios.post('http://127.0.0.1:5000/pass_appointment', {
    clinic_id: clinic_ID.value,
    appointment_num: num.value[0],

  }, config)
      .then(res => {
        next_appointment()
        pass_nums.value.push(num.value[0])
        for (let i = 0; i < num.value.length; i++) {
          num.value[i] = num.value[i + 1]
          try_id.value[i] = try_id.value[i + 1]
        }
        length123.value -= 1
        try_test.value = num.value[0]
        hello.value = num.value


      })
      .catch(err => {
        console.log(err)
      });
}


function pass_and_add() {
  if (1 >= length123.value) {
  } else {
    pass_appointment()


  }
}


/*剛到個頁面時，顯讀取clinic_id*/
if (window.location.href === "http://localhost:5173/doctor_clinic.html") {
  get_clinic_info()
}

/*讀取clinic_id*/
function get_clinic_info() {
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
        try_test.value = res.data.progress
        date.value = res.data['date']
        time_period.value = res.data['time_period']
        get_patients_by_clinic_id()
      })
      .catch(err => {
        console.log(err)
      });
}

/*讀取診間資料and show*/
function get_patients_by_clinic_id() {
  let config = {
    headers: {
      'Content-Type': 'application/json',
      'Access-Control-Allow-Origin': 'localhost:5000'
    }
  }
  axios.post('http://127.0.0.1:5000/get_patients_by_clinic_id', {
    clinic_id: clinic_ID.value,
  }, config)
      .then(response => {
        hello.value = response.data.appointment_nums
        sequence_and_patient_name.value = response.data.patients
        for (let i = 0; i < response.data.patients.length; i++) {
          num.value.push(response.data.patients[i].appointment_num)
          try_id.value.push(response.data.patients[i].patient_id)
          length123.value = num.value.length
        }
        if (try_test.value === 0) {
          start_clinic.value = true

        } else {
          check_now_sequence()
        }
      })
      .catch(err => {
        console.log(err)
      });
}

function check_now_sequence() {
  const index = num.value.indexOf(try_test.value)
  if (index != -1) {
    num.value[0] = num.value[index]
    try_id.value[0] = try_id.value[index]
    try_try()

  }

}

/*下一個病人*/
const add = () => {
  if (1 >= length123.value) {
  } else {
    next_appointment()
    for (let i = 0; i < num.value.length; i++) {
      num.value[i] = num.value[i + 1]
      try_id.value[i] = try_id.value[i + 1]
    }
    length123.value -= 1
    try_test.value = num.value[0]
    hello.value = num.value
  }
}


function start_clinic_button() {
  start_clinic.value = false
  length123.value = num.value.length
  try_try()
}


function try_try() {
  if (3 < length123.value) {
    num.value[3] = num.value[3]
  } else {
    num.value[3] = NaN
  }

  let config = {
    headers: {
      'Content-Type': 'application/json',
      'Access-Control-Allow-Origin': 'localhost:5000'
    }
  }
  axios.post('http://127.0.0.1:5000/next_appointment', {
    clinic_id: clinic_ID.value,
    current_appointment_num: 0,
    next_appointment_num: num.value[0],
    notify_appointment_num: num.value[3],
  }, config)
      .then(response => {
        show_patient_info_for_doc()

      })
      .catch(err => {
        console.log(err)
      });
}

function next_appointment() {
  try_test.value = num.value[0]
  if (4 >= length123.value) {
    num.value[4] = NaN
  } else {
    num.value[4] = num.value[4]

  }
  let config = {
    headers: {
      'Content-Type': 'application/json',
      'Access-Control-Allow-Origin': 'localhost:5000'
    }
  }
  axios.post('http://127.0.0.1:5000/next_appointment', {
    clinic_id: clinic_ID.value,
    current_appointment_num: num.value[0],
    next_appointment_num: num.value[1],
    notify_appointment_num: num.value[4]
  }, config)
      .then(response => {
        show_patient_info_for_doc()
      })
      .catch(err => {
        console.log(err)
      });
}


/*病人資料show*/
function show_patient_info_for_doc() {
  let config = {
    headers: {
      'Content-Type': 'application/json',
      'Access-Control-Allow-Origin': 'localhost:5000'
    }
  }
  axios.post('http://127.0.0.1:5000/get_patient_info_by_id', {
    id: try_id.value[0]
  }, config)
      .then(response => {
            name.value = response.data.name
            blood_type.value = response.data.blood_type
            id.value = response.data.id
            address.value = response.data.address
            birthday.value = response.data.birthday
            height.value = response.data.height
            weight.value = response.data.weight
            ice_contact.value = response.data.ice_contact
            ice_number.value = response.data.ice_phone
            ice_relation.value = response.data.ice_relation
            phone_number.value = response.data.phone_number
            sex.value = response.data.sex
          }
      )
      .catch(err => {
        console.log(err)
      });


}

function getWeekDay(date) {
  let weekDay = new Date(date).getDay();
  let weekDayString = "";
  switch (weekDay) {
    case 0:
      weekDayString = " 星期日";
      break;
    case 1:
      weekDayString = " 星期一";
      break;
    case 2:
      weekDayString = " 星期二";
      break;
    case 3:
      weekDayString = " 星期三";
      break;
    case 4:
      weekDayString = " 星期四";
      break;
    case 5:
      weekDayString = " 星期五";
      break;
    case 6:
      weekDayString = " 星期六";
      break;
  }
  return weekDayString;
}
</script>

<style>
#left_patient_base {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  margin-left: 50px;
}

#right_patient_base {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  margin-left: 30%;
}

#patient_base_for_doctor {
  display: flex;
  flex-direction: row;
}

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
  margin-top: 90px;
  max-height: 350px; /* 設置div的最大高度 */
  overflow-y: scroll;
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
  height: 450px;
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
