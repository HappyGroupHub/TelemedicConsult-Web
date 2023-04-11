<template>
  <div id="flex_container_clinic">
    <h2>目前號碼</h2>
    <div id="input_base">
      <p class="num">{{num}}</p>
      <div class="two_buttons">
        <button @click="add" id="pass">過號</button>
        <button @click="add" id="next">完成</button>
      </div>

    </div>
    <div id="input_base_list">
      <ol>
        <li id='number_list'>rrr</li>
        <li id='number_list'>rrr</li>
        <li id='number_list'>rrr</li>
        <li id='number_list'>rrr</li>
        <li id='number_list'>rrr</li>
        <li id='number_list'>rrr</li>
        <li id='number_list'>rrr</li>
        <li id='number_list'>rrr</li>
        <li id='number_list'>rrr</li>
        <li id='number_list'>rrr</li>
        <li id='number_list'>rrr</li>
        <li id='number_list'>rrr</li>
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
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import {watch} from 'vue'
const num = ref(1)
const add = () => {
  num.value++
}
watch(num, (newNum, oldNum) => {
  console.log(`num changed from ${oldNum} to ${newNum}`)
})
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
  height: 100px;
}
#input_base {
  background-color: #E1E1E1;
  height: 350px;
  padding: 30px;
  border-radius: 30px;
  box-shadow: gray 2px 2px;
  display: flex;
  flex-direction: column;



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
  font-size: 30px;
  margin: 5px 5px 5px 5px;
  list-style-type: none;
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
