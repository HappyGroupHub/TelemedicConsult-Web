<template>
    <header>
        <div id="header">
            <h1>臺北市立聯合醫院 線上掛號</h1>
            <ul class="menu">
                <li id="title_bar"><a href="time.html">門診時間</a></li>
                <li id="title_bar"><a href="index.html">關於我們</a></li>
                <li id="title_bar"><a href="description.html">使用說明</a></li>
            </ul>
        </div>
    </header>

</template>

<script setup>

window.onscroll = function () {
  scrollFunction()
};

function scrollFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    document.getElementById("header").style.fontSize = "15px";
  } else {
    document.getElementById("header").style.fontSize = "20px";
  }
}
</script>

<style scoped>
#header {
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