<template>
  <div id="container4">
    <br>
    <h2>個案管理</h2>
    <div class="basic">
      <form id="case_management2">
        <div id="box">
          今天日期
          <input v-model="name" type="date" required/>
        </div>
        <div id="box">
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
        </div>
        <div id="box">
          <b>是否有以下症狀，若包含請立刻就醫</b><p>
          <input v-model="bad_symptom" type="checkbox" value="否">否
          <input v-model="bad_symptom" type="checkbox" value="發燒">發燒>38度C
          <input v-model="bad_symptom" type="checkbox" value="自覺呼吸喘">自覺呼吸喘
          <input v-model="bad_symptom" type="checkbox" value="胸悶、胸痛" >胸悶、胸痛
          <input v-model="bad_symptom" type="checkbox" value="曾意識不清" >曾意識不清
          <input v-model="bad_symptom" type="checkbox" value="皮膚、嘴唇或指甲床發紫">皮膚、嘴唇或指甲床發紫
          <input v-model="bad_symptom" type="checkbox" value="無法進食或喝水" >無法進食或喝水</p>
          <div>
            <u>如有測量儀器，請回報是否有以下狀況</u>
            <input v-model="bad_symptom" type="checkbox" value="血氧濃度低於95%" >血氧濃度低於95%
            <input v-model="bad_symptom" type="checkbox" value="心跳過快或過慢" >心跳過快或過慢
            <input v-model="bad_symptom" type="checkbox" value="收縮壓">收縮壓90mmHg以下
          </div>
        </div>
        <div id="box">
          <b>是否有以下症狀</b><p>
          <input v-model="symptom" type="checkbox" value="否">無症狀
          <input v-model="symptom" type="checkbox" value="乾咳">乾咳
          <input v-model="symptom" type="checkbox" value="喉嚨痛">喉嚨痛
          <input v-model="symptom" type="checkbox" value="流鼻水、鼻塞">流鼻水、鼻塞
          <input v-model="symptom" type="checkbox" value="肌肉痠痛">肌肉痠痛
          <input v-model="symptom" type="checkbox" value="疲倦、全身無力">疲倦、全身無力
          <input v-model="symptom" type="checkbox" value="嗅覺異常">嗅覺異常
          <input v-model="symptom" type="checkbox" value="味覺異常">味覺異常
          <input v-model="symptom" type="checkbox" value="頭痛">頭痛
          <input v-model="symptom" type="checkbox" value="肌肉痠痛">肌肉痠痛</p>
        </div>
        <div id="box">
          <b>是否用藥</b><p>
          <input v-model="medication" type="checkbox" value="否">否
          <input v-model="medication" type="checkbox" value="中藥">中藥
          <input v-model="medication" type="checkbox" value="西藥">西藥
          <input v-model="medication" type="checkbox" value="輝瑞Paxlovid">輝瑞Paxlovid
          <input v-model="medication" type="checkbox" value="莫納皮拉韋Molnupiravir">莫納皮拉韋Molnupiravir</p>
        </div>
        <div id="box">
          <b>是否有副作用</b><p>
          <input v-model="side_effect" type="checkbox" value="否">否
          <input v-model="side_effect" type="checkbox" value="腹瀉">腹瀉
          <input v-model="side_effect" type="checkbox" value="噁心">噁心
          <input v-model="side_effect" type="checkbox" value="食慾不振">食慾不振
          <input v-model="side_effect" type="checkbox" value="暈眩">暈眩
          <input v-model="side_effect" type="checkbox" value="味覺改變">味覺改變
          <input v-model="side_effect" type="checkbox" value="尿液顏色變化">尿液顏色變化
          <input v-model="side_effect" type="checkbox" value="皮膚或眼白發黃">皮膚或眼白發黃</p>
        </div>
      </form>
      <br>
      <div id="down_btn">
        <button @click="case_management" id="check_writing" type="submit"
                style="width:150px;height:50px;background-color: #007b06;color:white;text-align: center;border:0">
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
const medication = ref("");
const side_effect = ref("");

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

#box{
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  margin: 20px;
}

#container4 {
  margin: auto;
  justify-content: center;
  align-items: center;
  width: 990px;
  background-color: #C5D8C6;
  border-radius: 30px;
  box-shadow: gray 2px 2px;
  margin-top: 60px;
}

#case_management2{
  display: flex;
  flex-direction: column;
}

#container4 h2 {
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

