<template>
  <header>
    <div class="header">
      <h1>臺北市立聯合醫院</h1>
      <ul class="menu">
        <li id="title_bar">真的假的</li>
        <li id="title_bar">關你屁事</li>
        <li id="title_bar">關於我們</li>
      </ul>
    </div>
  </header>

  <nav>
    <a href="index.html" id="home_btn">首頁&nbsp&nbsp&nbsp</a>
    <hr><br>
  </nav>
  <main>
    <section class="pic">
      <img src="image/front_image.png" id="image">
    </section>
    <section>
      <div id="btn">
        <br><br><br><br><br><br>
        <a href="" id="btn_text">門診時間</a>
      </div>
      <div id="btn">
        <br><br><br><br><br><br>
        <a href="patient_login.html" id="btn_text">線上掛號</a>
      </div>
      <div id="btn">
        <br><br><br><br><br><br>
        <a href="description.html" id="btn_text">使用說明</a>
      </div>
    </section>
  </main>
</template>

<script setup>

</script>

<style scoped>

.header{
  display: flex;justify-content: space-around;
}
.header h1{font-size: 40px;font-family:"微軟正黑體";color: #29528F;line-height: 100px;}
.menu{display: flex;align-items: center;list-style: none;}
.menu li{margin-right: 50px;}
a:link, a:visited,  a:hover, a:active{color: #000000; text-decoration: none;}
section{display: flex;justify-content: space-around;}
#btn{
  text-align: center;
  width: 100%;
  height: 300px;
  border-style: none solid;
  border-color: white;
  background: #00317B;
  border-radius: 20px;
  margin-left: 3px;
  margin-right: 3px;
  margin-top: 2px;
  box-shadow: silver 2px 2px;
  opacity:.83;
  }
#btn_text{
  color: whitesmoke;
  font-size: 40px;
  margin-top: 30px;
}
#home_btn{
  margin-left: 20px;
  font-size: 25px;
}
#title_bar{
  font-size: 20px;
}
#image{
  width: 100%;
  height: 34%;
  border-radius: 10px;
  margin-right: 5px;
  margin-right: 5px;
}
</style>
