<template>
  <div class="doc-clinic">
    <h2 class="subtitle">Current Number</h2>
    <div id="input-base">
      <p class="num">1</p>
      <button class="start" v-if="start_clinic" @click="start_clinic_button">Start</button>
      <div v-else="start_clinic" class="start-clinic-btn">
        <button class="dark-two-btn" @click="pass_and_add">Missed</button>
        <button class="dark-two-btn" @click="add">Completed</button>
      </div>
    </div>
    <div id="input_base_list">
      <ol>
        <li class="li">Tester</li>
        <li class="li">Alice</li>
        <li class="li">Bob</li>
        <li class="li">John</li>
        <li class="li">Test</li>
        <li class="li">Vicky</li>
        <li class="li">Lydia</li>
        <li class="li">Amy</li>
        <li class="li">Emily</li>
        <li class="li">Eva</li>
        <li class="li">Amy</li>
        <li class="li">Brian</li>
        <li class="li">Cindy</li>
        <li class="li">Doris</li>
      </ol>
    </div>
  </div>
  <hr>
  <div id="under-box">
    <h2  class="subtitle patient-info">Current Patient Information</h2>
    <div id="under-box-gray">
      <div class="container">
        <p class="clinic_date">{{ date }} {{ getWeekDay(date) }} {{ time_period }} Shift</p>
        <p class="status">In Consultation</p>
      </div>
      <hr>
      <div id="patient_base_for_doctor">
        <div id="left_patient_base">
          <p>Full Name:{{ name }}</p>
          <p>Blood Type:{{ blood_type }}</p>
          <p>Birthday:{{ birthday }}</p>
          <p>ID:{{ id }}</p>
          <p>Gender:{{ sex }}</p>
          <p>Phone Number:{{ phone_number }}</p>
          <p>Address:{{ address }}</p>
        </div>
        <div id="right_patient_base">
          <p>Emergency Contact Name:{{ ice_contact }}</p>
          <p>Emergency Contact Relation Type:{{ ice_relation }}</p>
          <p>Emergency Contact Phone:{{ ice_number }}</p>
          <p>Height:{{ height }}cm</p>
          <p>Weight:{{ weight }}kg</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import {onMounted, onUnmounted, ref} from 'vue'
import axios from "axios";

const clinic_ID = ref(localStorage.getItem('clinic_id'))
const name = ref('Tester')
const blood_type = ref('O')
const id = ref('')
const birthday = ref('2000/00/00')
const sex = ref('')
const phone_number = ref('')
const address = ref('')
const ice_contact = ref('')
const ice_relation = ref('')
const ice_number = ref('')
const height = ref('178')
const weight = ref('60')
const date = ref('2000/00/00')
const time_period = ref('Morning')
const try_test = ref('test')
const hello = ref([])
const try_id = ref([])
const start_clinic = ref(true)
const sequence_and_patient_name = ref([])
const num = ref([])
const test = ref('')
const pass_nums = ref([])
const length123 = ref()

const progress_from_pass = ref('')
const id_from_pass = ref('')
const clinic_id = ref('')
const message = ref()

const currentTime = ref('')




function get_pass() {
  const index = pass_nums.value.indexOf(progress_from_pass.value)
  if(index !== -1){
    pass_nums.value.splice(index, 1)
    if(length123.value >= 2){
      try_id.value.splice(2,0,id_from_pass.value)
      num.value.splice( 2, 0, progress_from_pass.value)
    }else {
      try_id.value.splice(1,0,id_from_pass.value)
      num.value.splice( 1, 0, progress_from_pass.value)
    }
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
        pass_nums.value.unshift(num.value[0])

        for (let i = 0; i < num.value.length; i++) {
          num.value[i] = num.value[i + 1]
          try_id.value[i] = try_id.value[i + 1]
        }
        length123.value -= 1
        try_test.value = num.value[0]
        hello.value = num.value
          clear_pass_appointment_time()



      })
      .catch(err => {
        console.log(err)
      });
}


function clear_pass_appointment_time() {
    let config = {
        headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': '*'
        }
    }
    axios.post('http://127.0.0.1:5000/clear_pass_appointment_time', {
        clinic_id: clinic_ID.value,
        appointment_num: pass_nums.value[0]

    }, config)
        .then(res => {



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



if (window.location.href === "http://localhost:5173/doctor_clinic.html") {
  get_clinic_info()
  let eventSource;
  onMounted(() => {
    eventSource = new EventSource('http://localhost:5001/stream')
    eventSource.onmessage = (event)=> {
        const eventData = JSON.parse(event.data);
        const { action, patient_id, appointment_num, clinic_id } = eventData;
        if (action === 'pass_appointment_check_in') {
            message.value = eventData;
            id_from_pass.value = patient_id;
            progress_from_pass.value = appointment_num;
            clinic_id.value = clinic_id;
            if (clinic_id.value === clinic_ID.value) {
                get_pass();
            }
        }
    }
  })
  onUnmounted(() =>
      {
        eventSource.close()
      }
  )

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
    const now = new Date()

    const year = now.getFullYear().toString().padStart(4,'0')
    const month = (now.getMonth() + 1).toString().padStart(2,'0')
    const day = now.getDate().toString().padStart(2,'0')
    const hour = now.getHours().toString().padStart(2,'0')
    const minutes = now.getMinutes().toString().padStart(2,'0')
    const seconds  = now.getSeconds().toString().padStart(2,'0')
    currentTime.value = `${year}/${month}/${day} ${hour}:${minutes}:${seconds}`
    update_clinic_status()
  length123.value = num.value.length
  try_try()
}
function update_clinic_status(){
    let config = {
        headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': 'localhost:5000'
        }
    }
    axios.post('http://127.0.0.1:5000/update_clinic_status', {
        clinic_id: clinic_ID.value,
        status_dict:{ 'start_time': currentTime.value,}
    }, config)
        .then(response => {


        })
        .catch(err => {
            console.log(err)
        });
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
p{
  text-align: left;
}
.patient-info{
  width:60%;
  text-align: left;
  margin: auto;
}
.subtitle{
  color:#00317B;
}
.start{
  background-color: white;
  color:#00317B;
  padding: 15px 32px;
  text-align: center;
  font-size: 24px;
  margin: 14px;
  cursor: pointer;
}

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

.doc-clinic {
  width: 60%;
  margin: 50px auto;
  display: grid;
  grid-template-columns: 1fr 2fr 1fr;
}


.num {
  background-color: #7ea3cc;
  font-size: 50px;
  text-align: center;
  width: 100px;
  height: 50px;
  border-radius: 20px;
  padding-top: 35px;
  margin: 0 auto 70px auto;
  color: white;
}

.start-clinic-btn {
  display: flex;
  justify-content: space-around;
  align-items: center;
  width: 350px;
}

#input-base {
  margin: 0;
  background-color: #E1E1E1;
  border-radius: 30px;
  box-shadow: gray 2px 2px;
  display: flex;
  flex-direction: column;
  align-items: center;
  height: 410px;
  justify-content: center;
}

.dark-two-btn {
  width: 150px;
  height: 70px;
  font-size: 20px;
  background-color: #00317B;
  color: white;
  /*text-align: center;*/
  border: 0;
  border-radius: 20px;
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
  max-height: 350px;
  overflow-y: scroll;
}

.li {
  color: white;
  font-size: 20px;
  margin: 5px 5px 5px 5px;
  text-align: left;
}

#under-box-gray {
  background-color: #E1E1E1;
  padding: 30px;
  border-radius: 30px;
  box-shadow: gray 2px 2px;
  margin: 30px auto;
  width: 60%;
}


#under-box {
  margin:50px auto;
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
