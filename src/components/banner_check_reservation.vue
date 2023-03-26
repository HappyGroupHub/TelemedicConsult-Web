<template>

    <div id="wrapper">

      <div id="nav">
        <ul>
          <!--<li>首頁符號</li>-->
          <a href="index.html"><li>首頁&nbsp&nbsp&nbsp</li></a>
          >&nbsp&nbsp&nbsp
          <a href="patient_login.html"><li> 線上掛號登入&nbsp&nbsp&nbsp</li></a>
          >&nbsp&nbsp&nbsp
          <a href="../../register_patient.html"><li> 確認資料&nbsp&nbsp&nbsp</li></a>
          >&nbsp&nbsp&nbsp
          <a href="description.html"><li> 選擇日期時段&nbsp&nbsp&nbsp</li></a>>
          &nbsp&nbsp&nbsp
          <a href="check_reservation.html"><li> 確認預約&nbsp&nbsp&nbsp</li></a>

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