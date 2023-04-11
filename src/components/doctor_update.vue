<script setup>

function btn_update(){
  alert("請填入會議連結")
}

</script>

<template>
  <section id="doctor_btn">
    <div id="dr_btn">
      <p style="margin-top: 150px"><a href="doctor_clinic.html" >開始看診</a></p>
    </div>
    <div id="dr_btn">
      <p style="color: black; margin-top: 150px" v-on:click="btn_update">上傳會議連結</p>
    </div>
  </section>

</template>

<style scoped>
a:link, a:visited,  a:hover, a:active{color: #000000; text-decoration: none;}

section{display: flex;justify-content: space-around;font-size: x-large;}

#dr_btn{
  text-align: center;
  width: 300px;
  height: 340px;
  background: #7C95BB;
  border-radius: 20px;
  box-shadow: gray 2px 2px;
  opacity:.83;
}

#dr_img{
  margin-top: 10px;
  width: 200px;
  height: 200px;
}

</style>

