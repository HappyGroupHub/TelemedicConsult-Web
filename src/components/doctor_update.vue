<script setup>

import {ref} from "vue";
import axios from "axios";
import dompurify from "dompurify";


const clinic_id = ref(localStorage.getItem('clinic_id'))
const line_link = ref('')
const status_dict = ref({})
const purLink = ref(dompurify.sanitize(line_link.value))



function start_clinic() {
  window.location.href = "/doctor_clinic.html"
}

function btn_update_link() {
  purLink.value = prompt("請輸入會議室連結");
  if (purLink.value != null) {
    submit_line_link_to_db();
  }
  status_dict.value = ref({
    'link': purLink.value,
  })
}

function submit_line_link_to_db() {
  let config = {
    headers: {
      'Content-Type': 'application/json',
      'Access-Control-Allow-Origin': 'localhost:5000'
    }
  }
  axios.post('http://127.0.0.1:5000/update_clinic_status', {
    clinic_id: clinic_id.value,
    status_dict: {'link': purLink.value,}
  }, config)
      .then(response => {
        console.log(response)
      })
      .catch(err => {
        console.log(err)
      });
}
</script>

<template>
  <section id="doctor_btn">
    <div id="dr_btn">
      <button id="drbtn" @click="start_clinic">開始看診</button>
    </div>
    <div id="dr_btn">
      <button id="drbtn" @click="btn_update_link">上傳會議連結</button>
    </div>
  </section>

</template>

<style scoped>

section {
  display: flex;
  justify-content: space-around;
  font-size: x-large;
}

#dr_btn {
  text-align: center;
  width: 460px;
  height: 185px;
  background: #a5b1cc;
  border-radius: 20px;
  box-shadow: gray 2px 2px;
  opacity: .83;
  margin-top: 90px;
  display: flex;
  align-items: center;
  justify-content: center;
}

#drbtn {
  background-color: #8b9acb;
  height: 95px;
  display: flex;
  align-items: center;
}

</style>

