<template>
  <header>
    <div class="header">
      <h1>線上掛號系統</h1>
      <ul class="menu">
        <li>真的假的</li>
        <li>關你屁事</li>
        <li>關於我們</li>
      </ul>
    </div>
  </header>

  <nav>
    <a href="index.html">首頁&nbsp&nbsp&nbsp</a>
    >&nbsp&nbsp&nbsp
    <a href="description.html">使用說明&nbsp&nbsp&nbsp</a>
    <hr><br>
  </nav>
  <main>
    <h3>線上掛號使用說明</h3>
    <div id="directions">
      <section class="directions" style="height: 280px;box-shadow: inset 9px 16px 72px rgba(0, 0, 0, 0.25);background-color: #00317B; color: white">
        網站說明
      </section>
      <section class="directions" style="height: 280px;box-shadow: inset 9px 16px 72px rgba(0, 0, 0, 0.25);background-color: #134BA0; color: white">
        網站說明
      </section>
      <section class="directions" style="height: 280px;box-shadow: inset 9px 16px 72px rgba(0, 0, 0, 0.25);background-color: #4886CB; color: white">
        LINE說明
      </section>
      <section  class="directions" style="height: 280px;box-shadow: inset 9px 16px 72px rgba(0, 0, 0, 0.25);background-color: #63C7FF; color: white">
        LINE說明
      </section>
    </div>
  </main>

</template>

<script setup>

</script>

<style scoped>
.header{display: flex;justify-content: space-around;}
.header h1{font-size: 40px;font-family:"微軟正黑體";color: #29528F;line-height: 100px;}
.menu{display: flex;align-items: center;list-style: none;}
.menu li{margin-right: 50px;}
a:link, a:visited,  a:hover, a:active{color: #000000; text-decoration: none;}
section{width: 100%;}



</style>