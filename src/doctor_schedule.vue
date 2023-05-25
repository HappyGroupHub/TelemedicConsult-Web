<template>
  <bar_doctor_login/>
  <banner_doctor_schedule/>
  <div id="list_for_schedule">
    <div v-for="item in list" :key="item.clinic_id" id="input_base">
      <button @click="update_schedule(item.clinic_id)">進入診間</button>
      <div class="yellow_container">
        <div class="left_side" id="inner_title">{{ item.date }}{{ getWeekDay(item.date) }}{{ item.time_period }}班</div>
        <div class="right_side" style="color: red">
          {{ item.progress === 0 ? '未看診' : (item.progress === item.biggest_appointment_num ? '已完成看診' : '看診中') }}
        </div>
      </div>
      <div class="hr-line"></div>
      <div class="schedule_link">
        <div class="left_side" id="inner_title">目前看診號碼 {{ item.progress }}</div>
        <div class="right_side">會議連結 {{ item.link }}</div>
      </div>
    </div>
  </div>

</template>

<script setup>
import bar_doctor_login from "./components/bar_doctor_login.vue";
import banner_doctor_schedule from "./components/banner_doctor.vue";
import {ref} from "vue";
import axios from "axios";


const doctor_id_id = ref(localStorage.getItem("doctor_id"));
const list = ref([]);
const test_test = ref('test')


if (window.location.href === "http://localhost:5173/doctor_schedule.html") {

  get_schedule();
}else {

}


function get_schedule() {
  let config = {
    headers: {
      'Content-Type': 'application/json',
      'Access-Control-Allow-Origin': 'localhost:5000'
    }
  }
  axios.post('http://127.0.0.1:5000/get_doctor_clinic_list', {
    doc_id: doctor_id_id.value
  }, config)
      .then(res => {
        console.log(res)
        test_test.value = res.data
        list.value = res.data.clinic_list
      })
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

const update_schedule = (clinic_id) => {
  localStorage.setItem("clinic_id", clinic_id);
  window.location.href = "/doctor_update.html";
};
</script>

<style scoped>
#input_base {
  display: flex;
  flex-direction: column;
  justify-content: center;
  background-color: #FDE982;
  width: 900px;
  height: 120px;
  padding: 30px;
  border-radius: 30px;
  margin: 15px auto;
}

.yellow_container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  margin-bottom: 10px;
}

.schedule_link {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
}

.left_side, .right_side {
  flex: 1;
  text-align: center;
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
