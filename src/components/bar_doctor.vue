<template>
  <header>
    <div className="header">
      <h1>臺北市立聯合醫院 醫師系統</h1>
    </div>
  </header>

</template>

<script setup></script>

<style scoped>

.header {
  display: flex;
  justify-content: space-around;
}

.header h1 {
  font-size: 40px;
  font-family: "微軟正黑體";
  color: #29528F;
  line-height: 100px;
}

.menu {
  display: flex;
  align-items: center;
  list-style: none;
}

.menu li {
  margin-right: 50px;
}

a:link, a:visited, a:hover, a:active {
  color: #000000;
  text-decoration: none;
}

</style>