<script setup>
import {reactive, ref} from "vue";

const banner = {
  homepage: 0,
  time: 0,
  patient_login: 0,
  register_patient_base: 0,
  reservation: 0,
  description: 0,
  join_line_bot: 0,
  check_reservation: 0,
  update_patient : 0,
}
const href = {
  homepage: "http://localhost:5173/",
  time: "http://localhost:5173/time.html",
  patient_login: "http://localhost:5173/patient_login.html",
  register_patient: "http://localhost:5173/register_patient.html",
  reservation: "http://localhost:5173/reservation.html",
  description: "http://localhost:5173/description.html",
  join_linebot: "http://localhost:5173/join_linebot.html",
  check_reservation: "http://localhost:5173/check_reservation.html",
  update_patient: "http://localhost:5173/update_patient.html",
}

function flowBanner(a, b, c, d, e, f, g, h,i) {
  banner.homepage = a;
  banner.time = b;
  banner.patient_login = c;
  banner.register_patient = d;
  banner.reservation = e;
  banner.description = f;
  banner.join_linebot = g;
  banner.check_reservation = h;
  banner.update_patient = i;
}

if (window.location.href === href.homepage) {
  flowBanner(1, 0, 0, 0, 0, 0, 0, 0);
} else if (window.location.href === href.time) {
  flowBanner(1, 1, 0, 0, 0, 0, 0, 0);
} else if (window.location.href === href.patient_login) {
  flowBanner(1, 0, 1, 0, 0, 0, 0, 0);
} else if (window.location.href === href.register_patient) {
  flowBanner(1, 0, 1, 1, 0, 0, 0, 0);
} else if (window.location.href === href.reservation) {
  flowBanner(1, 0, 1, 1, 1, 0, 0, 0);
} else if (window.location.href === href.description) {
  flowBanner(1, 0, 0, 0, 0, 1, 0, 0);
} else if (window.location.href === href.join_linebot) {
  flowBanner(1, 0, 1, 1, 0, 0, 1, 0);
} else if (window.location.href === href.check_reservation) {
  flowBanner(1, 0, 1, 1, 1, 0, 0, 1);
} else if(window.location.href === href.update_patient){
  flowBanner(1, 0, 1, 0, 0, 0, 0, 0, 1);
}

window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    document.getElementById("nav").style.fontSize = "10px";
  } else {
    document.getElementById("nav").style.fontSize = "20px";
  }
}
</script>

<template>
  <div id="wrapper">
    <div id="nav">
      <ul>
        <div v-if="banner.homepage===1">
          <a href="index.html">
            <li>首頁&nbsp&nbsp&nbsp</li>
          </a>
        </div>
        <div v-if="banner.time===1">
          <a href="time.html">
            <li> >&nbsp&nbsp&nbsp 門診時間 &nbsp&nbsp&nbsp</li>
          </a>
        </div>
        <div v-if="banner.patient_login===1">
          <a href="patient_login.html">
            <li> >&nbsp&nbsp&nbsp 線上掛號登入 &nbsp&nbsp&nbsp</li>
          </a>
        </div>
        <div v-if="banner.register_patient===1">
          <a href="register_patient.html">
            <li> >&nbsp&nbsp&nbsp 填寫基本資料 &nbsp&nbsp&nbsp</li>
          </a>
        </div>
        <div v-if="banner.reservation ===1">
          <a href="reservation.html">
            <li> >&nbsp&nbsp&nbsp 選擇日期時段 &nbsp&nbsp&nbsp</li>
          </a>
        </div>
        <div v-if="banner.description ===1">
          <a href="description.html">
            <li> >&nbsp&nbsp&nbsp 使用說明 &nbsp&nbsp&nbsp</li>
          </a>
        </div>
        <div v-if="banner.join_line_bot ===1">
          <a href="join_linebot.html">
            <li> >&nbsp&nbsp&nbsp 加入Line &nbsp&nbsp&nbsp</li>
          </a>
        </div>
        <div v-if="banner.check_reservation ===1">
          <a href="check_reservation.html">
            <li> >&nbsp&nbsp&nbsp 確認掛號 &nbsp&nbsp&nbsp</li>
          </a>
        </div>
        <div v-if="banner.update_patient ===1">
          <a href="update_patient.html">
            <li> >&nbsp&nbsp&nbsp 確認資料 &nbsp&nbsp&nbsp</li>
          </a>
        </div>
      </ul>
      <hr>
      <br>
    </div>
  </div>
</template>


<style scoped>
#wrapper {
  width: 100%;
  margin-top: 0;
}

#nav {
  color: black;
  max-height: 45px;
}

#nav ul {
  display: flex;
  justify-content: left;
  list-style: none;
}

a:link, a:visited, a:hover, a:active {
  color: #000000;
  text-decoration: none;
}
</style>
