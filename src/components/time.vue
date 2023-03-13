<script setup>
</script>

<template>
  <div class="flex_container">
    <div id="gray_background">
      <div class="container">
        <button id="button">年
        </button>
        <button id="button">月
        </button>
        <button id="button">週
        </button>
      </div>
      <table align="center">
        <tr>
          <th width="100" ></th>
          <th>一</th>
          <th>二</th>
          <th>三</th>
          <th>四</th>
          <th>五</th>
          <th>六</th>
          <th>日</th>
        </tr>
        <tr>
          <th>早</th>
          <td><button id="dot"></button></td>
          <td><button id="dot"></button></td>
          <td><button id="dot"></button></td>
          <td><button id="dot"></button></td>
          <td><button id="dot"></button></td>
          <td><button id="dot"></button></td>
          <td><button id="dot"></button></td>
        </tr>
        <tr>
          <th>中</th>
          <td><button id="dot"></button></td>
          <td><button id="dot"></button></td>
          <td><button id="dot"></button></td>
          <td><button id="dot"></button></td>
          <td><button id="dot"></button></td>
          <td><button id="dot"></button></td>
          <td><button id="dot"></button></td>
        </tr>
        <tr>
          <th>晚</th>
          <td><button id="dot"></button></td>
          <td><button id="dot"></button></td>
          <td><button id="dot"></button></td>
          <td><button id="dot"></button></td>
          <td><button id="dot"></button></td>
          <td><button id="dot"></button></td>
          <td><button id="dot"></button></td>
        </tr>
      </table>
    </div>
  </div>
</template>

<style scoped>
.container{
  display: flex;
  justify-content: center;
  align-items: center;
}
table{
  width: 900px;
  height:300px;
  text-align: center;
  font-size: 20px;
  border:2px #7d7d7d solid;
  background-color: whitesmoke;
}
th,td,tr{
  border:0.1px #7d7d7d solid;
  margin:-1px 0 0 -1px;
}
#gray_background {
  width: 1080px;
  height: 500px;
  background-color: #E1E1E1;
  border-radius: 20px;
  box-shadow: gray 2px 2px;
  margin:10px 5px 15px 20px;
}
#button{
  width:150px;
  height:75px;
  font-size: 25px;
  background-color: #00317B;
  color:white;
  text-align: center;
  border-radius: 15px;
  margin:30px 40px 40px 20px;
}
#dot{
  background-color: #1a69a4;
  width: 20px;
  height: 20px;
  border-radius: 100px;
}
</style>
