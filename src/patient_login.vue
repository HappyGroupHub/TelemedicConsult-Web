<script setup>
  import bar from './components/bar.vue'
  import banner_login from './components/banner_patient.vue'
  import axios from "axios";
  import { ref} from "vue";


  const id = ref("")
  const ic_card_number = ref("")
  const message = ref("");


  function get_patient_info_by_id() {
    let config = { headers: {
        'Content-Type': 'application/json',
        'Access-Control-Allow-Origin': '*'}
    }
    axios.post('http://127.0.0.1:5000/get_patient_info_by_id', {
      id: id.value,
    }, config)
        .then(res => {
          if(res.data.status === "success"){
            const patientInfo = res.data;
            if(patientInfo.ic_card_number === ic_card_number.value){
              window.location.href = "/update_patient.html";
              localStorage.setItem("user_id", id.value);
              localStorage.setItem('name', patientInfo.name);
              localStorage.setItem('patient_sex',patientInfo.sex)
              message.value = "成功拉";

            }else {
              message.value = "錯誤"
            }
          }else {
            message.value = "身分證字號不存在"
          }
        })
        .catch(err => {
          console.log(err)
        });
  }



</script>

<template>
  <bar />
  <banner_login/>

  <div id="flex_container1">
    <div id="input_base1" >
      <h2 style="text-align: left">登入系統</h2>

            <h4>身分證字號</h4>
            <input v-model="id" id="id" type="text"/>
            <h4>健保卡卡號</h4>
            <input v-model="ic_card_number" id="ic_card_number" type="text"/>
            <p></p>
            <button @click="get_patient_info_by_id()" id="submit" type="submit" value="登入"
                    style="width:150px;height:50px;background-color: #00317B;color:white;text-align: center;border:0">登入
            </button>
            <p v-if="message">{{ message }}</p>


        </div>
        <div id="first_use">
            <h2 id="title">第一次使用嗎</h2>
            <a href="../register_patient.html">
                <button id="submit2" type="submit" value="初診登入"
                        style="width:150px;height:80px;background-color: white;color:#00317B;text-align: center;border:0">
                    初診註冊
                </button>
            </a>
        </div>
    </div>
</template>

<style >
h4 {
  font-size: 15px;
  font-weight: 500;
  text-align: left;
}
#flex_container1 {
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: flex-end;
  margin-top: 90px;
}
#input_base1 {

  background-color: #E1E1E1;
  width: 300px;
  height: 350px;
  padding: 30px;
  text-align: center;
  border-radius:30px;
  justify-content: center;

}
#submit{
  box-shadow: gray 2px 2px;
  border:0;
  border-radius:7px;
}
#first_use{

  background-color: #00317B;
  opacity: .83;
  color:white;
  margin-top: 20px;
  text-align: center;
  border-radius:30px;
  width: 180px;
  height: 350px;
  padding: 30px;
  font-size: 20px;
}
#submit2{
  margin-top: 150px;
  font-size: 20px;
  border-radius:20px;
  border:0;
  box-shadow: gray 1px 2px;
}
#title{
  font-size: 25px;
}
</style>
