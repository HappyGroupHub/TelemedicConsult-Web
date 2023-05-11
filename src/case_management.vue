<template>
  <div id="container1">
    <br>
    <h2>個案管理</h2>
    <div class="basic">
      <form id="case_management">
        <section>
          今天日期
          <input v-model="name" type="date" required/>
        </section>
        <section>
          確診後第
          <select v-model="how_many_days">
            <option >1</option>
            <option >2</option>
            <option >3</option>
            <option >4</option>
            <option >5</option>
            <option >6</option>
            <option >7</option>
          </select>幾天
        </section>
        <section>
          是否有以下症狀，若包含請立刻就醫<br>
          <input v-model="bad_symptom" type="checkbox" value="否">否<br>
          <input v-model="bad_symptom" type="checkbox" value="發燒">發燒>38度C<br>
          <input v-model="bad_symptom" type="checkbox" value="自覺呼吸喘">自覺呼吸喘<br>
          <input v-model="bad_symptom" type="checkbox" value="胸悶、胸痛" >胸悶、胸痛<br>
          <input v-model="bad_symptom" type="checkbox" value="曾意識不清" >曾意識不清<br>
          <input v-model="bad_symptom" type="checkbox" value="皮膚、嘴唇或指甲床發紫">皮膚、嘴唇或指甲床發紫<br>
          <input v-model="bad_symptom" type="checkbox" value="無法進食或喝水" >無法進食或喝水<br>
          如有測量儀器，請回報是否有以下狀況<br>
          <input v-model="bad_symptom" type="checkbox" value="血氧濃度低於95%" >血氧濃度低於95%<br>
          <input v-model="bad_symptom" type="checkbox" value="心跳過快或過慢" >心跳過快或過慢<br>
          <input v-model="bad_symptom" type="checkbox" value="收縮壓">收縮壓90mmHg以下<br>
        </section>
        <section>
          是否有以下症狀<br>
          <input v-model="symptom" type="checkbox" value="否">無症狀<br>
          <input v-model="symptom" type="checkbox" value="乾咳">乾咳<br>
          <input v-model="symptom" type="checkbox" value="喉嚨痛">喉嚨痛<br>
          <input v-model="symptom" type="checkbox" value="流鼻水、鼻塞">流鼻水、鼻塞<br>
          <input v-model="symptom" type="checkbox" value="肌肉痠痛">肌肉痠痛<br>
          <input v-model="symptom" type="checkbox" value="疲倦、全身無力">疲倦、全身無力<br>
          <input v-model="symptom" type="checkbox" value="嗅覺異常">嗅覺異常<br>
          <input v-model="symptom" type="checkbox" value="味覺異常">味覺異常<br>
          <input v-model="symptom" type="checkbox" value="頭痛">頭痛<br>
          <input v-model="symptom" type="checkbox" value="肌肉痠痛">肌肉痠痛<br>
        </section>
        <section>

        </section>
      </form>
      <br>
      <div id="down_btn">
        <button @click="case_management" id="check_writing" type="submit"
                style="width:150px;height:50px;background-color: #00317B;color:white;text-align: center;border:0">
          確認送出
        </button>
        <br>
      </div>
    </div>
    <br><br>
  </div>
</template>

<script setup>

import axios from "axios";
import {ref} from "vue";
const name = ref('');
const how_many_days = ref('');
const bad_symptom = ref("");
const symptom = ref("");

function case_management() {
  let config = {
    headers: {
      'Content-Type': 'application/json',
      'Access-Control-Allow-Origin': 'localhost:5000'
    }
  }
  axios.post('http://127.0.0.1:5000/', {}, config)
      .then(response => {
        console.log(response.data)
      })
      .catch(err => {
        console.log(err)
      });
}


</script>

<style>
#container1 {
  margin: auto;
  justify-content: center;
  align-items: center;
  width: 990px;
  background-color: #E1E1E1;
  border-radius: 30px;
  box-shadow: gray 2px 2px;
}

#case_management{
  display: flex;
  flex-direction: column;
  margin-left: 200px;
}

#container1 h2 {
  text-align: center;
  margin-top: 30px;
  margin-bottom: 20px;
}

#container2 h2 {
  text-align: center;
  margin-top: 30px;
  margin-bottom: 20px;
}

form {
  display: flex;
  flex-direction: row;
  justify-content: space-around;
  align-items: flex-start;
}



#down_btn {
  display: flex;
  justify-content: center;
}


#check_writing {
  box-shadow: gray 2px 2px
}
</style>

