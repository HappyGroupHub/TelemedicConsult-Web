

<template>
  <bar/>
  <banner/>
  <div id="list_for_schedule">
    <div v-for="item in list_list" :key="item.clinic_id" id="appointment">
      <div class="blue_container">
        <div class="left_side" id="inner_title">
          <button v-bind:id="'cancel_appointment_' + item.clinic_id" id="cancel_appointment" @click="cancel_appointment_button">取消預約</button>
        </div>
        <div class="right_side" >
          {{item.clinic_info.date}}{{getWeekDay(item.clinic_info.date)}}
          {{item.clinic_info.time_period === '早' ? '早上9點' : (item.progress === '午' ? '下午2點' : '晚上6點')}}
        </div>
      </div>
      <div class="hr-line"></div>
      <div class="progress_num">
        <h3>你的順序是:第{{item.appointment_num}}號</h3>
        <h3>看診醫生:{{item.clinic_info.doc_name}}</h3>
      </div>


    </div>
    <div class="where_put_back_button">
      <button id="back_to_update" @click="back_to_update">返回</button>
    </div>

  </div>

</template>

<script setup>
import bar from './components/bar.vue'
import banner from './components/banner_patient.vue'
import {ref} from "vue";
import axios from "axios";


const patient_id_id = ref(localStorage.getItem("user_id"));
const list_list = ref([]);
const test_test = ref()
const clinic_id_id = ref(localStorage.getItem("clinic_id"));



if (window.location.href === "http://localhost:5173/check_patient_appointment.html") {
get_appointment()

}

function get_appointment() {
  let config = {
    headers: {
      'Content-Type': 'application/json',
      'Access-Control-Allow-Origin': 'localhost:5000'
    }
  }
  axios.post('http://127.0.0.1:5000/get_patient_reservation_list', {
    patient_id: patient_id_id.value
  }, config)
      .then(res => {
        console.log(res)
        list_list.value = res.data.reservation_list
        test_test.value = res.data


      })
      .catch(err => {
        console.log(err)
      });
}
function cancel_appointment_button(event) {

  const cancel_appointment__ = confirm("確定要取消預約嗎?")
  if(cancel_appointment__){
    const clinic_id = event.target.id.split('_')[2];
    test_test.value = clinic_id
    cancel_appointment(clinic_id)
  }else {

  }
}


function cancel_appointment(clinic_id) {
  let config = {
    headers: {
      'Content-Type': 'application/json',
      'Access-Control-Allow-Origin': 'localhost:5000'
    }
  }
  axios.post('http://127.0.0.1:5000/cancel_appointment', {
    patient_id: patient_id_id.value,
    clinic_id: clinic_id
  }, config)
      .then(res => {
        console.log(res)
        alert('取消成功')
      })
      .catch(err => {
        console.log(err)
      });
}


function back_to_update() {
  window.location.href = "http://localhost:5173/update_patient.html"
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

<style scoped>
.where_put_back_button{
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 20px;
}
#cancel_appointment{
  width: 150px;

}
#back_to_update{
  margin: auto;
  background-color: #00317B;
  color: white;
}
#appointment {
  display: flex;
  flex-direction: column;
  justify-content: center;
  background-color: #00317B;
  width: 900px;
  height: 120px;
  padding: 30px;
  border-radius: 30px;
  margin: 15px auto;
}

.blue_container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  margin-bottom: 10px;
}

.progress_num {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  background-color: #00317B;
  color: white;
}

.left_side, .right_side {
  flex: 1;
  text-align: center;
  color: white;
}

.left_side {
  text-align: left;

}

.right_side {
  text-align: right;
}

.hr-line {
  border-bottom: 1px solid white;
  width: 100%;
  margin: 10px 0;
}
</style>
