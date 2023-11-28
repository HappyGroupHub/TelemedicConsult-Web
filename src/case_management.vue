<template>
  <div id="case-management">
    <br>
    <h2>Case Management</h2>
    <div class="basic">
      <form class="form-for-case-management">
        <div class="box">
          Today's Date:
          <input v-model="name" type="date" required/>
        </div>
        <div class="box">
          After the
          <select v-model="how_many_days">
            <option>1st</option>
            <option>2nd</option>
            <option>3rd</option>
            <option>4th</option>
            <option>5th</option>
            <option>6th</option>
            <option>7th</option>
          </select>day of diagnosis
        </div>

        <b>Whether you have the following symptoms; if so, please seek medical attention immediately.</b>
        <div class="box"><input v-model="bad_symptom" type="checkbox" value="否">No<br>
          <input v-model="bad_symptom" type="checkbox" value="發燒">Fever exceeding 100 degrees Fahrenheit<br>
          <input v-model="bad_symptom" type="checkbox" value="自覺呼吸喘">Subjective sensation of wheezing<br>
          <input v-model="bad_symptom" type="checkbox" value="胸悶、胸痛">Chest tightness/chest pain<br>
          <input v-model="bad_symptom" type="checkbox" value="曾意識不清">Loss of consciousness<br>
          <input v-model="bad_symptom" type="checkbox" value="皮膚、嘴唇或指甲床發紫">Skin, lips, or nail beds turning
          purple<br>
          <input v-model="bad_symptom" type="checkbox" value="無法進食或喝水">Inability to eat or drink
        </div>



          <b>If you have measuring instruments, please report if the following conditions are present:</b>
        <div class="box">
          <input v-model="bad_symptom" type="checkbox" value="血氧濃度低於95%">Blood oxygen level below 95%<br>
          <input v-model="bad_symptom" type="checkbox" value="心跳過快或過慢">Rapid or slow heartbeat<br>
          <input v-model="bad_symptom" type="checkbox" value="收縮壓">Systolic blood pressure below 90mmHg<br>
        </div>


        <b>Do you have the following symptoms:</b>
        <div class="box"><input v-model="symptom" type="checkbox" value="否">No symptoms<br>
          <input v-model="symptom" type="checkbox" value="乾咳">Dry cough<br>
          <input v-model="symptom" type="checkbox" value="喉嚨痛">Sore throat<br>
          <input v-model="symptom" type="checkbox" value="流鼻水、鼻塞">Runny nose/ nasal congestion<br>
          <input v-model="symptom" type="checkbox" value="肌肉痠痛">Muscle soreness<br>
          <input v-model="symptom" type="checkbox" value="疲倦、全身無力">Fatigue/weakness<br>
          <input v-model="symptom" type="checkbox" value="嗅覺異常">Abnormal sense of smell<br>
          <input v-model="symptom" type="checkbox" value="味覺異常">Abnormal sense of taste<br>
          <input v-model="symptom" type="checkbox" value="頭痛">Headache
        </div>


        <b>Are you taking any medication?</b>
        <div class="box">
          <input v-model="medication" type="checkbox" value="否">No<br>
          <input v-model="medication" type="checkbox" value="中藥">Chinese medicine<br>
          <input v-model="medication" type="checkbox" value="西藥">Western medicine<br>
          <input v-model="medication" type="checkbox" value="輝瑞Paxlovid">Paxlovid<br>
          <input v-model="medication" type="checkbox" value="莫納皮拉韋Molnupiravir">Molnupiravir
        </div>

        <b>Are there any side effects?</b>
        <div class="box">
          <input v-model="side_effect" type="checkbox" value="否">No
          <input v-model="side_effect" type="checkbox" value="腹瀉">Diarrhea
          <input v-model="side_effect" type="checkbox" value="噁心">Nausea
          <input v-model="side_effect" type="checkbox" value="食慾不振">Loss of appetite
          <input v-model="side_effect" type="checkbox" value="暈眩">Dizziness
          <input v-model="side_effect" type="checkbox" value="味覺改變">Change in taste
          <input v-model="side_effect" type="checkbox" value="尿液顏色變化">Change in urine color
          <input v-model="side_effect" type="checkbox" value="皮膚或眼白發黃">Yellowing of the eyes or skin
        </div>


      </form>
        <button @click="case_management" class="case-btn" type="submit">
          Submit
        </button>
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
.case-btn {
  background-color: #00317B;
  border: none;
  color: white;
  padding: 20px 50px;
  border-radius: 15px;
  margin-left: calc(50% - 75px);
}

.box {
  flex-wrap: wrap;
  margin:10px auto 20px 0;

}

#case-management {
  justify-content: center;
  align-items: center;
  width: 990px;
  background-color: #e1e1e1;
  border-radius: 30px;
  box-shadow: gray 2px 2px;
  margin: auto;
  font-size: 20px;
}

.form-for-case-management {
  display: flex;
  flex-direction: column;
  padding: 10px 80px 0 80px;
}

#case-management h2 {
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


/*#down_btn {*/
/*  display: flex;*/
/*  justify-content: center;*/
/*}*/

</style>

