<template>
  <bar_doctor_login/>
  <banner_doctor_schedule/>
  <div id="list_for_schedule">
      <div v-for="item in list" :key="list" id="input_base">
        <div class="yellow_container">
          <div class="left_side" id="inner_title">{{item.date}} {{item.day}} {{item.period}}</div>
          <div class="right_side" style="color: red">{{item.clinic_situation}}</div>
        </div>
        <div class="hr-line"></div>
        <div class="schedule_link">
          <div class="left_side" id="inner_title">目前看診號碼 {{item.current_number}}</div>
          <div class="right_side" style="color: red">會議連結 {{item.meet_link}}</div>
        </div>
      </div>
  </div>

</template>

<script setup>
import banner_doctor_schedule from './components/banner_doctor.vue';
import bar_doctor_login from "./components/bar_doctor_login.vue";
import { ref} from "vue";


const list = ref([
  {
    date: '2023/04/26',
    day: '星期二',
    period: '上午',
    clinic_situation: '未看診',
    current_number: '0',
    meet_link: '無'
  },
  {
    date: '2023/04/27',
    day: '星期三',
    period: '下午',
    clinic_situation: '已看診',
    current_number: '10',
    meet_link: 'https://meet.google.com/abc-xyz'
  },
  {
    date: '2023/04/28',
    day: '星期四',
    period: '晚上',
    clinic_situation: '已看診',
    current_number: '15',
    meet_link: 'https://meet.google.com/def-xyz'
  }
]);
</script>

<style scoped>

#input_base {

  background-color: #FDE982;
  width: 900px;
  height: 100px;
  padding: 30px;
  border-radius: 30px;
  margin: 15px 25% 15px 25%;

}

.hr-line {
  border-bottom: 1px solid gray;
}


.yellow_container {
  display: flex;
  justify-content: space-between; /* 左右分别对齐 */
}

.schedule_link{
  display: flex;
  justify-content: space-between; /* 左右分别对齐 */
  margin-top: 40px;
}

.left_side {
  order: 1; /* 调整左边元素的顺序 */
}

.right_side {
  order: 2; /* 调整右边元素的顺序 */

}
#list_for_schedule {
  margin-top: 50px;
  display: flex;
  flex-direction: column;
}
</style>