<template>
  <div class="flex_container">
    <div id=gray_block>
      <div id=step>
        <h5>STEP1:</h5>
        <h5>點擊左方加官方Line帳號</h5>
      </div>
      <br><br><br><br><br><br>
      <button id="button">點我</button>
    </div>
    <div id="gray_block">
      <div id="step">
        <h5>STEP2:</h5>
        <h5>在line中操作</h5>
        <br><br>
        <img src="image/LINE_logo.svg.webp" width="250px" height="250px"
             alt="LINE logo">
      </div>
    </div>
    <div id="gray_block">
      <div id="step">
        <h5>STEP3:</h5>
        <h5>回本網頁按下右方按鈕即完成</h5>
      </div>
      <br><br><br><br><br><br>
      <button id="button" >加好官方帳號了</button>
    </div>
  </div>

</template>

<script setup>

</script>

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
  display: block;
  width:250px;
  height:100px;
  background-color: #00317B;
  color:white;
  text-align: center;
  border-radius: 20px;
  opacity:.83;

}

</style>
