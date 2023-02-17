<template>
  <div id="flex_container">
    <div id="input_base" >
      <h2 style="text-align: left">登入系統</h2>
      <h4 style="text-align: left">身分證字號</h4>
      <input id="id" type="text"  />
      <h4 style="text-align: left">生日</h4>
      <input id="birthday" type="text" />
      <p></p>
      <input id="submit" type="submit" value="登入" style="width:150px;height:50px;background-color: #00317B;color:white;text-align: center;border:0" >
    </div>
    <div id="first_use">
      <h2 id="title">第一次使用嗎</h2>
      <input id="submit2" type="submit" value="初診登入" style="width:150px;height:80px;background-color: white;color:#00317B;text-align: center;border:0" >
    </div>
  </div>
</template>

<script setup>

</script>

<style>
  #flex_container {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: flex-end;
    margin-top: 90px;
  }
  #input_base {

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
