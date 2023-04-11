
<script setup>
  import bar from './components/bar.vue'
  import banner from './components/banner_patient.vue'

  import axios from "axios";
  import {computed, ref} from "vue";



  const msg = ref('')
  let userID = sessionStorage.getItem('user_id')

  function if_patient_registered_line() {
    let config = { headers: {
        'Content-Type': 'application/json',
        'Access-Control-Allow-Origin': 'localhost:5000'}
    }
    axios.post('http://127.0.0.1:5000/if_patient_registered_line', {
      id:userID
    } , config)
        .then(response => {
          console.log(response)
          if(response.data.status === "success"){
            let is_registered = (Boolean(response.data['registered']))
            if (is_registered === true) {
              msg.value = '已經註冊過了'
              window.location.href = "/reservation.html";
            } else {
              msg.value = '尚未註冊'
            }


        }else {
            msg.value = "還沒註冊過"
          }
        })
        .catch(err => {
          console.log(err)
          msg.value= "沒有收到的意思"
        });
  }

</script>
<template>
  <bar />
  <banner />
  <div class="flex_container">
    <div id=gray_block>
      <div id=step>
        <h5 id="h5">STEP1:</h5>
        <h5>點擊左方加官方Line帳號</h5>
      </div>
      <br><br><br><br><br><br>
      <button id="button">點我</button>
    </div>
    <div id="gray_block">
      <div id="step">
        <h5 id="h5">STEP2:</h5>
        <h5>在line中操作</h5>
        <br><br>
        <a href="https://liff.line.me/1645278921-kWRPP32q/?accountId=027rvwqj"><img src="image/LINE_logo.svg.webp" width="250px" height="250px"
             alt="LINE logo"></a>
      </div>
    </div>
    <div id="gray_block">
      <div id="step">
        <h5 id="h5">STEP3:</h5>
        <h5>回本網頁按下右方按鈕即完成</h5>
      </div>
      <br><br><br><br><br><br>
      <button @click="if_patient_registered_line" id="button" >加好官方帳號了</button>
      {{msg}}
    </div>
  </div>
</template>

<style scoped>
.flex_container {
  display: flex;
  padding: 15px;
  justify-content:space-evenly;
}

#gray_block {
  width: 250px;
  height: 500px;
  background-color: #E1E1E1;
  border-radius: 20px;
  box-shadow: gray 2px 2px;
  margin:10px 5px 15px 20px;
}

#button{
  width:250px;
  height:75px;
  background-color: #00317B;
  color:white;
  text-align: center;
  border-radius: 20px;

}
#step{
  width:250px;
  height:100px;
  background-color: #00317B;
  color:white;
  text-align: center;
  border-radius: 20px;
  opacity:.83;
}

#h5{margin-top: 0px;}
</style>
