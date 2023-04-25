


<template>
  <bar_doctor_login/>
  <banner_doctor_schedule/>
  <div id="list">
    <div id="input_base">
      <div class="container">
        <div class="left" id="inner_title">2222/22/22 星期三 午班</div>
        <div class="right" style="color: red">看診中</div>
      </div>
      <hr>
      <div class="container2">
        <div class="left" id="inner_title">目前看診號碼 7</div>
        <div class="right" style="color: red">會議連結 sdfghjklkjhgfdrtyh</div>
      </div>
    </div>
    <br><br><br>
    <div id="input_base">
      <div class="container">
        <div class="left" id="inner_title">2222/22/22 星期四 早班</div>
        <div class="right" style="color: red">未看診</div>
      </div>
      <hr>
      <div class="container2">
        <div class="left" id="inner_title">目前看診號碼 7</div>
        <div class="right" style="color: red">會議連結 sdfghjklkjhgfdrtyh</div>
      </div>
    </div>
    <br><br><br>
    <div id="input_base">
      <div class="container">
        <div class="left" id="inner_title">2222/22/22 星期天 早班</div>
        <div class="right" style="color: red">未看診</div>
      </div>
      <hr>
      <div class="container2">
        <div class="left" id="inner_title">目前看診號碼 7</div>
        <div class="right" style="color: red">會議連結 sdfghjklkjhgfdrtyh</div>
      </div>
    </div>
  </div>

</template>

<script setup>
import banner_doctor_schedule from './components/banner_doctor.vue';
import bar_doctor_login from "./components/bar_doctor_login.vue";

</script>

<style scoped>
#input_base {

  background-color: #FDE982;
  width: 900px;
  height: 80px;
  padding: 30px;
  border-radius: 30px;
  margin: 0 auto;

}

.container {
  display: flex;
  justify-content: space-between; /* 左右分别对齐 */
}

.container2 {
  display: flex;
  justify-content: space-between; /* 左右分别对齐 */
  margin-top: 40px;
}

.left {
  order: 1; /* 调整左边元素的顺序 */
}

.right {
  order: 2; /* 调整右边元素的顺序 */
}

#list {
  margin-top: 40px;
}
</style>