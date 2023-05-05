<script setup>
import {ref} from "vue";
import axios from "axios";

const clinic_id = ref(localStorage.getItem('clinic_id'))
const line_link = ref('')
const status_dict = ref({

})

function btn_update_link(){
  line_link.value = prompt("請輸入會議室連結");
  if(line_link.value!=null){
    submit_line_link_to_db();
  }
  status_dict.value = ref({
    'link': line_link.value,
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
    clinic_id: '2',
    status_dict:{ 'link': line_link.value,}
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
            <p style="margin-top: 150px" >開始看診</p>
        </div>
        <div id="dr_btn">
            <button style="color: black; margin-top: 150px" @click="btn_update_link">上傳會議連結</button>
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
    width: 300px;
    height: 340px;
    background: #7C95BB;
    border-radius: 20px;
    box-shadow: gray 2px 2px;
    opacity: .83;
}


</style>

