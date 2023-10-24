<template>
    <bar/>
    <banner/>
    <main>
        <div class="pic">
            <img src="image/LOGO.png" id="image">
        </div>
      <div id="btn_space">
        <div id="btn">
                <br><br><br><br><br><br>
                <a href="time.html" id="btn_text">門診時間</a>
        </div>
        <div id="btn">
                <br><br><br><br><br><br>
                <a href="patient_login.html" id="btn_text">線上掛號</a>
        </div>
        <div id="btn">
                <br><br><br><br><br><br>
                <a href="description.html" id="btn_text">使用說明</a>
        </div>
      </div>
    </main>
</template>

<script>
import bar from "./components/bar.vue";
import banner from './components/banner_patient.vue';
</script>

<style scoped>

a:link, a:visited, a:hover, a:active {
    color: #000000;
    text-decoration: none;
}

.pic {
  display: flex;
  justify-content: center;
  background-color: #264F8C;
}

#image {
  width: 20%;
  background-color: #264F8C;
  margin-right: 5px;
}

#btn {
    text-align: center;
    width: 100%;
    height: 280px;
    background: #001385;
    border-radius: 20px;
    margin-left: 3px;
    margin-right: 3px;
    margin-top: 2px;
    box-shadow: silver 3px 3px;
    opacity: .83;
  margin-top: 10px;
}

#btn_text {
    color: whitesmoke;
    font-size: 40px;
    margin-top: 30px;
}

#btn_space{
  display: flex;
  justify-content: space-around;
}

</style>
