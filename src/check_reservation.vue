<template>
  <bar/>
  <banner/>
  <div class="all">
    <div class="information">
      <div class="second">
        <h2 id="white">您已預約</h2>
        <h2 id="white">開始看診時間</h2>
        <h2 id="white">您的號碼牌</h2>
      </div>
      <div class="first1">
        <h3 id="blue">2022年12月5日 星期一 早上</h3>
        <h3 id="blue">早上九點整</h3>
        <h3 id="blue">05號</h3>
      </div>
    </div>

    <div class="buttons">
      <button id="back">返回上一頁</button>
      <button id="check_reservation">確認預約</button>
    </div>

  </div>
  *溫馨提醒:可以在LINE上得到更多資訊ㄛ
</template>

<script setup>
import bar from './components/bar.vue'
import banner from './components/banner_patient.vue'

</script>

<style>
  #blue{
    height: 35px;
    width: 350px;
    font-size: 20px;
    background-color: #00317B;
    color: white;
    text-align: center;
    border-radius: 15px;
    padding-top: 15px;
    box-shadow: gray 2px 2px;
  }

  .first1{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;

  }
  .information{
    display: flex;
    flex-direction: row;
    justify-content: space-evenly;
    align-items: center;
    margin-top: 50px;
  }

  .second{
    align-items: center;
    display: flex;
    flex-direction: column;
  }
  #white{
    width: 150px;
    height: 35px;
    background-color: white;
    color: #00317B;
    text-align: center;
    border-radius: 10px;
    padding-top: 15px;
    box-shadow: gray 2px 2px;
  }

.all{
  width: 800px;
  height: 500px;
  background-color: #e1e1e1;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  border-radius: 30px;
  margin: 0 auto;
}
#back{
  width: 125px;
  height: 50px;
  background-color: #00317B;
  color: white;
  text-align: center;
  border: 0;
  box-shadow: gray 2px 2px;
  border-radius: 10px;
}
#check_reservation{
  width: 125px;
  height: 50px;
  background-color: #00317B;
  color: white;
  text-align: center;
  border: 0;
  box-shadow: gray 2px 2px;
  border-radius: 10px;
  margin-left: 50px;
}
</style>
