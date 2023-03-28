<script setup>
const doctor_banner = {
  doctor_clinic: 0,
  doctor_login: 0,
  doctor_update: 0,
  doctor_schedule: 0,
}
const href = {
  doctor_clinic: "http://localhost:5173/doctor_clinic.html",
  doctor_login: "http://localhost:5173/doctor_login.html",
  doctor_update: "http://localhost:5173/doctor_update.html",
  doctor_schedule: "http://localhost:5173/doctor_schedule.html"
}

function flowBanner(a, b, c, d) {
  doctor_banner.doctor_clinic = a;
  doctor_banner.doctor_login = b;
  doctor_banner.doctor_update = c;
  doctor_banner.doctor_schedule = d;
}

if (window.location.href === href.doctor_clinic) {
  flowBanner(1, 0, 0, 0);
} else if (window.location.href === href.doctor_login) {
  flowBanner(0 ,1, 0, 0);
} else if (window.location.href === href.doctor_update) {
  flowBanner(0, 0, 1, 0);
} else if (window.location.href === href.doctor_schedule) {
  flowBanner(0, 0, 0, 1);
}

</script>

<template>

  <div id="wrapper">

    <div id="nav">
      <div v-if="doctor_banner.doctor_clinic===1">
        <ul>
          <p id="title">醫師診間</p>
        </ul>
      </div>
      <div v-if="doctor_banner.doctor_login===1">
        <ul>
          <p id="title">醫生登入</p>
        </ul>
      </div>
      <div v-if="doctor_banner.doctor_update===1">
        <ul>
          <p id="title">醫生新增看診連結</p>
        </ul>
      </div>
      <div v-if="doctor_banner.doctor_schedule===1">
        <ul>
          <p id="title">醫生排程</p>
        </ul>
      </div>
      <hr>
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
}

#nav ul {
  display: flex;
  justify-content: left;
  list-style: none;
}

#title {
  font-size: 26px;
  font-family: "微軟正黑體";
  color: #29528F;
  line-height: 40px;
  float: left;
}
</style>
