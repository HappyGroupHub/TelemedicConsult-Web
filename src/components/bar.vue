<template>
  <header>
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

    </div>
  </header>

</template>

<script setup>

</script>

<style scoped>


  .header h1{
    font-size: 40px;
    font-family:"微軟正黑體";
    color: #29528F;
    line-height: 100px;}



  #nav ul{
    display: flex;
    justify-content: left;
    list-style: none;
  }
  .header{

    display: flex;
    justify-content: center;

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