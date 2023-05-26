<script setup>
import {ref} from "vue";

const logout = ref(false)
const check_patient_appointment = ref(false)
if(localStorage.getItem("user_id") !== null){
  logout.value = true
  check_patient_appointment.value = true
}
const logoutlog = () => {
    localStorage.removeItem("user_id");
    window.location.href = "http://localhost:5173/index.html";
}
const check = () => {
  window.location.href = "http://localhost:5173/check_patient_appointment.html";
}

  const banner = {
    homepage: 0,
    time: 0,
    patient_login: 0,
    register_patient_base: 0,
    reservation: 0,
    description: 0,
    join_line_bot: 0,
    check_reservation: 0,
    update_patient: 0,
    check_patient_appointment: 0,
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
    check_patient_appointment: "http://localhost:5173/check_patient_appointment.html",
  }

  function flowBanner(homepage, time, patient_login, register_patient, reservation, description, join_linebot, check_reservation, update_patient, check_patient_appointment) {
    banner.homepage = homepage;
    banner.time = time;
    banner.patient_login = patient_login;
    banner.register_patient = register_patient;
    banner.reservation = reservation;
    banner.description = description;
    banner.join_linebot = join_linebot;
    banner.check_reservation = check_reservation;
    banner.update_patient = update_patient;
    banner.check_patient_appointment = check_patient_appointment;
  }

  if (window.location.href === href.homepage) {
    flowBanner(1, 0, 0, 0, 0, 0, 0, 0, 0, 0);
  } else if (window.location.href === href.time) {
    flowBanner(1, 1, 0, 0, 0, 0, 0, 0, 0, 0);
  } else if (window.location.href === href.patient_login) {
    flowBanner(1, 0, 1, 0, 0, 0, 0, 0, 0, 0);
  } else if (window.location.href === href.register_patient) {
    flowBanner(1, 0, 1, 1, 0, 0, 0, 0, 0, 0);
  } else if (window.location.href === href.reservation) {
    flowBanner(1, 0, 1, 1, 1, 0, 0, 0, 0, 0);
  } else if (window.location.href === href.description) {
    flowBanner(1, 0, 0, 0, 0, 1, 0, 0, 0, 0);
  } else if (window.location.href === href.join_linebot) {
    flowBanner(1, 0, 1, 1, 0, 0, 1, 0, 0, 0);
  } else if (window.location.href === href.check_reservation) {
    flowBanner(1, 0, 1, 1, 1, 0, 0, 1, 0, 0);
  } else if (window.location.href === href.update_patient) {
    flowBanner(1, 0, 1, 0, 0, 0, 0, 0, 1, 0);
  } else if (window.location.href === href.check_patient_appointment) {
    flowBanner(1, 0, 1, 0, 0, 0, 0, 0, 0, 1);
  }

  window.addEventListener('load', function () {
    document.body.style.paddingTop = document.getElementById('header').offsetHeight + 'px';
  });

  window.onscroll = function () {
    scrollFunction()
  };

  function scrollFunction() {
    if (window.scrollY < 20) {
      document.getElementById("header").style.fontSize = "16px";
      document.body.style.paddingTop = document.getElementById("header").offsetHeight + 'px';
    } else {
      document.getElementById("header").style.fontSize = "8px";
      document.body.style.paddingTop = document.getElementById("header").offsetHeight + 'px';
    }

}


</script>

<template>
  <header>
    <div id="header">
      <div id="head">
        <h1>臺北市立聯合醫院 線上掛號</h1>
        <ul class="menu">
          <li id="title_bar"><a href="time.html">門診時間</a></li>
          <li id="title_bar"><a href="index.html">關於我們</a></li>
          <li id="title_bar"><a href="description.html">使用說明</a></li>
          <div v-if="check_patient_appointment" @click="check">
            <button id="title_bar">查看預約</button>
          </div>
          <button v-if="logout" @click="logoutlog">登出</button>
        </ul>
      </div>
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
            <div v-if="banner.check_patient_appointment ===1">
              <a href="../../check_patient_appointment.html">
                <li> >&nbsp&nbsp&nbsp 查看預約 &nbsp&nbsp&nbsp</li>
              </a>
            </div>
          </ul>
          <hr>
        </div>
      </div>
    </div>
  </header>

</template>


<style scoped>
#header{
  position: fixed;
  top: 0%;
  background-color: white;
  width: 100%;
  z-index: 1;
}

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

#head {
  display: flex;
  justify-content: space-around;
  width: 100%;
  margin-top: 0;
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
