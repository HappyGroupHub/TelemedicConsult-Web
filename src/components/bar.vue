<template>

    <div id="wrapper">
      <div class="header wrap">
        <h1> 線上掛號系統</h1>
        <ul class="menu">
          <li>真的假的</li>
          <li>關你屁事</li>
          <li>關於我們</li>
          <!--<li><img src=""> </li>-->
        </ul>
      </div>
      <div id="nav">
        <ul>
          <!--<li>首頁符號</li>-->
          <li>首頁&nbsp&nbsp&nbsp</li>
          >&nbsp&nbsp&nbsp
          <li> 線上掛號登入</li>

        </ul>
        <hr>
      </div>
    </div>





</template>

<script setup>

</script>

<style scoped>
  #wrapper {
    width:100%;
    margin-top: 0 ;
  }
  #nav{
    color:black;
  }
  #nav ul{
    display: flex;
    justify-content: left;
    list-style: none;
  }
  .header{

    display: flex;
    justify-content: flex-start;
    align-items: center;

  }
  .header h1{
    font-size: 50px;
    padding-left: 40px;
    color: #29528F;
  }
  .menu{
    display: flex;
    justify-content: flex-end;
  }
  .menu li{
    margin-right: 50px;
    list-style: none;

  }


</style>