
<script setup>

  import bar from './components/bar.vue'
  import banner from './components/banner_patient.vue'

  import axios from "axios";
  import {computed, ref} from "vue";

  const msg = ref('')
  const userID = localStorage.getItem('user_id')

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
    <div id=blue_block>
      <h2>綁定LINE流程</h2>
    </div>
    <div id="box">
      <div id="step">
        <div id="circle">1</div>
        <div id="whitebox">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h5>加入LINE好友</h5>&nbsp;&nbsp;&nbsp;
          <div id="bluebox"><button id="button"><a href="https://liff.line.me/1645278921-kWRPP32q/?accountId=027rvwqj" style="color: white">點我加入好友</a></button></div>
        </div>
      </div>
      <hr>
      <div id="step">
        <div id="circle">2</div>
        <div id="iimg">
          <div id="whiteboxb">
            <img src="image/LINE2.jpg" style="width: 65%; border-radius: 50px">
            <div id="blueboxb">
              1. 點選會員服務<br><br>
              2. 點選帳號綁定<br><br>
              3. 輸入身分證字號<br><br>
              4. 輸入生日<br><br>
              5. 點選確定綁定<br><br>
            </div>
          </div>
          <div id="whiteboxb">
            <img src="image/LINE1.jpg" style="width: 65%; border-radius: 50px">
            <div id="blueboxb">重新綁定LINE帳號</div>
          </div>
        </div>
        <br><br>
      </div>

      <hr>

      <div id="step">
        <div id="circle">3</div>
        <div id="whitebox">
          &nbsp;&nbsp;&nbsp;&nbsp;<h5>完成帳號綁定</h5>&nbsp;&nbsp;&nbsp;&nbsp;
        <br><br>
          <div id="bluebox">
            <button @click="if_patient_registered_line" id="button" >點我驗證綁定</button>
            {{msg}}
          </div>
        </div>
      </div>

    </div>
  </div>
</template>

<style scoped>
a:link, a:visited, a:hover, a:active {
  color: #000000;
  text-decoration: none;
}

.flex_container {
  display: flex;
  padding: 15px;
  flex-direction: column;
  align-items: center;
}

#blue_block {
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  width: 401px;
  height: 148px;
  background: #00317B;
  border-radius: 50px;
  margin: 50px;
}

#box{
  box-sizing: border-box;
  width: 1265px;
  height: auto;
  border: 5px solid rgba(38, 79, 140, 0.72);
  border-radius: 128px;
  margin: 50px;
}

#step{
  display: flex;
  justify-content: center;
  margin: 40px;
}

#whitebox{
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-style: solid;
  border-radius: 20px;
  border-color: #7d7d7d;
  margin: 20px;
  width: 400px;
}

#button{
  width:200px;
  height:75px;
  background-color: #00317B;
  color:white;
  text-align: center;
  border-radius: 20px;
}

#circle{
  display: flex;
  background-color: #00317B;
  color: white;
  width: 50px;
  height: 50px;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  position: relative;
  left: -77px;
  top: -2px;
}

#iimg{
  display: flex;
  flex-direction: column;
}

#whiteboxb{
  display: flex;
  align-items: center;
  border-style: solid;
  border-radius: 20px;
  border-color: #7d7d7d;
  margin: 20px;
  width: 850px;
  height: 355px;
}

#blueboxb{
  display: flex;
  color: white;
  background: #00317B;
  border-radius: 20px;
  height: 355px;
  align-items: center;
  width: 321px;
  justify-content: center;
}

</style>
