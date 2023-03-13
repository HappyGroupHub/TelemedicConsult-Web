<template>
  <div class="container3">
    <h2>目前號碼</h2>
    <div class="container1">
      <p class="num">{{num}}</p>
      <div class="container2">
        <button @click="add" id="pass">過號</button>
        <button @click="add" id="next">看完</button>
      </div>
    </div>
    <div class="list">
      <h4>看診清單</h4>
    </div>
  </div>
  <h2>當前病人資訊</h2>
  <div class="container4">
    <h3>年月日</h3>
    <div class="container5">
      <h3>姓名:</h3>
      <h3>身分證字號:</h3>
      <h3>性別:</h3>
    </div>
    <div class="container6">
      <h3>掛號原因:</h3>
      <h3>生日:</h3>
      <h3>地址:</h3>
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
  .container1 {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: #E1E1E1;
    border-radius: 30px;
    box-shadow: gray 2px 2px;
    width: 400px;
    height: 300px;
    margin-left: 50px;
  }
  .num {
    background-color: #7ea3cc;
    font-size: 50px;
    text-align: center;
    width: 100px;
    height: 50px;
    border-radius: 10px;
    padding-top: 35px;
  }
  .container2 {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
    width: 300px;
    height: 100px;
  }
  .container3 {
    display: flex;
    flex-direction: row;
  }
  .list{
    display: flex;
    flex-direction: column;
    background-color: #7c95bb;
    border-radius: 30px;
    width: 200px;
    height: 300px;
    margin-left: 50px;
  }
  .container4{
    display: flex;
    flex-direction: row;
    background-color: #e1e1e1;
    border-radius: 20px;
    width: 1000px;
    height: 400px;
    box-shadow: gray 2px 2px;
  }
  .container5{
    display: flex;
    flex-direction: column;
    margin-left: 50px;
    margin-top: 50px;
  }
  .container6{
    display: flex;
    flex-direction: column;
    margin-left: 50px;
    margin-top: 50px;
  }
</style>
