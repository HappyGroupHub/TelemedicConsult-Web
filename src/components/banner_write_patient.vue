<template>

    <div id="wrapper">

      <div id="nav">
        <ul>
          <!--<li>首頁符號</li>-->
          <a href="index.html"><li>首頁&nbsp&nbsp&nbsp</li></a>
          >&nbsp&nbsp&nbsp
          <a href="patient_login.html"><li> 線上掛號登入&nbsp&nbsp&nbsp</li></a>
          >&nbsp&nbsp&nbsp
          <a href="write_patient_base.html"><li> 填寫初診基本資料&nbsp&nbsp&nbsp</li></a>

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
  a:link, a:visited,  a:hover, a:active{color: #000000; text-decoration: none;}
</style>