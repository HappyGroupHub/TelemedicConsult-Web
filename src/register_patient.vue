

<template>
  <bar v-if="view===1 || view===2"/>
  <banner_write_patient v-if="view===1"/>
  <div id="container1" v-if="view===1">
    <br>
    <h2>初診基本資料</h2>
    <div class="basic">
      <form >
        <div id="left">
          姓名<br>
          <input v-model="name" type="text" id="name" name="name" required="required" />
          <br>
          身分證字號<br>
          <input v-model="id" type="text"  id="identity" name="id" required="required" />
          <br>
          生日<br>
          <input v-model="birthday" type="date"  id="birthday" name="birthday" required="required" />
          <br>
          <session class="form_session">
            生理性別<br>
            <input v-model="sex"  name="sex" type="radio" value="男"  required="required">男
            <input v-model="sex"  name="sex" type="radio" value="女"  required="required">女
          </session>

          <br>
          緊急聯絡人姓名<br>
          <input v-model="ice_contact"  id="ice_contact" name="ice_contact" required="required">
          <br>
          緊急聯絡人電話<br>
          <input v-model="ice_phone"  name="ice_phone" required="required"  type="text" maxlength="10" pattern="09\d{8}" placeholder="09xxxxxxxx">
          <br>
          緊急聯絡人關係<br>
          <input v-model="ice_relation"   name="ice_relation" required="required">
          <br>

        </div>
        <div id="right">

          健保卡卡號<br>
          <input v-model="ic_card_number"  name="ic_card_number" required="required">
          <br>
          手機號碼<br>
          <input v-model="phone_number" name="phone_number"  required="required" type="text" maxlength="10" pattern="09\d{8}" placeholder="09xxxxxxxx">
          <br>
          <session class="form_session">
            身高<br>
            <input v-model="height" type="text"  id="height" name="height" />公分
          </session>

          <br>
          <session class="form_session">
            體重<br>
            <input v-model="weight" type="text" id="weight" name="weight" />公斤
          </session>
          <br>
          <session class="form_session">
            血型<br>
            <input v-model="blood_type" type="text"  id="blood_type" name="blood_type" required="required" />型
          </session>
          <br>
          地址<br>
          <input v-model="address" type="text"  id="address" name="address" required="required" />

        </div>
      </form><br>
      <div id="down_btn">
        <a href="index.html"><button id="back" style="width:150px;height:50px;background-color: #00317B;color:white;text-align: center;border:0" >回首頁</button></a>
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <button v-on:click="changeView(2)"  id="check_writing" type="submit"  style="width:150px;height:50px;background-color: #00317B;color:white;text-align: center;border:0" >確認填寫</button>
        <br>
      </div>
    </div>
    <br><br>
  </div>
  <banner_check_patient v-if="view===2"/>
  <div id="container2" v-if="view===2">
    <br>
    <h2>初診基本資料確認</h2>
    <div class="basic">
      <form>
        <div id="left">
          姓名<br>
          <input v-model="name"   type="text"  disabled />
          <br>
          身分證字號<br>
          <input v-model="id"   type="text"    disabled />
          <br>
          生日<br>
          <input v-model="birthday"    id="birthday" name="birthday" disabled/>
          <br>
          生理性別<br>
          <input v-model="sex"   name="sex" type="text" disabled>
          <br>
          緊急聯絡人姓名<br>
          <input v-model="ice_contact"    id="ice_contact" name="ice_contact" disabled>
          <br>
          緊急聯絡人電話<br>
          <input  v-model="ice_phone"  name="ice_phone" type="text" disabled>
          <br>
          緊急聯絡人關係<br>
          <input v-model="ice_relation " id="ice_relation"   name="ice_relation" disabled>
          <br>
        </div>
        <div id="right">
          健保卡卡號<br>
          <input  v-model="ic_card_number "  id="ic_card_number" name="ic_card_number" disabled>
          <br>
          手機號碼<br>
          <input v-model="phone_number"  name="phone_number"  id="phone_number"  type="text" disabled>
          <br>
          <div>
            身高<br>
            <input v-model="height" type="text"  id="height" name="height"  disabled/>公分
          </div>

          <br>
          <div>
            體重<br>
            <input v-model="weight"  type="text" id="weight" name="weight" disabled/>公斤
          </div>
          <br>
          <div>
            血型<br>
            <input v-model="blood_type"  type="text"  id="blood_type" name="blood_type"  disabled>型
          </div>
          <br>
          地址<br>
          <input  v-model="address" type="text"  id="address" name="address" disabled/>
          <br>

        </div>
      </form><br>
      <div id="down_btn">
        <button v-on:click="changeView(1)" id="back" style="width:150px;height:50px;background-color: #00317B;color:white;text-align: center;border:0" >回去更改</button>
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <a href="join_linebot.html"><button @click="register_patient"  id="check_writing" type="submit"  style="width:150px;height:50px;background-color: #00317B;color:white;text-align: center;border:0" >確認填寫</button></a>
        <br>
      </div>
    </div>
    <br><br>
  </div>
</template>

<script setup>
import {ref} from "vue";
import axios from "axios";
import bar from "./components/bar.vue";
import banner_check_patient from "./components/banner_check_patient.vue";


const view = ref(1)
const changeView = (index) => {
  view.value = index
}

const name = ref('')
const id = ref('')
const birthday = ref('')
const sex = ref('')
const ice_contact = ref('')
const ice_phone = ref('')
const ice_relation = ref('')
const ic_card_number = ref('')
const phone_number = ref('')
const height = ref('')
const weight = ref('')
const blood_type = ref('')
const address = ref('')
function register_patient() {
  let config = { headers: {
      'Content-Type': 'application/json',
      'Access-Control-Allow-Origin': '*'}
  }
  axios.post('http://127.0.0.1:5000/register_patient', {
    name: name.value,
    id: id.value,
    sex: sex.value,
    birthday: birthday.value,
    blood_type: blood_type.value,
    ic_card_number: ic_card_number.value,
    phone_number: phone_number.value,
    address: address.value,
    height: height.value,
    weight: weight.value,
    ice_contact: ice_contact.value,
    ice_relation: ice_relation.value,
    ice_phone: ice_phone.value
  }, config)
      .then(res => {
        console.log(res)
      })
      .catch(err => {
        console.log(err)
      });
}
</script>

<style >
#container1{
  margin: auto;
  justify-content: center;
  align-items: center;
  width: 990px;
  background-color: #E1E1E1;
  border-radius: 30px;
  box-shadow: gray 2px 2px;
}
#container2{
  margin: auto;
  justify-content: center;
  align-items: center;
  width: 990px;
  background-color: #E1E1E1;
  border-radius: 30px;
  box-shadow: gray 2px 2px;
}
#container1 h2{
  text-align: center;
  margin-top: 30px;
  margin-bottom: 20px;
}
#container2 h2{
  text-align: center;
  margin-top: 30px;
  margin-bottom: 20px;
}

form{
  display: flex;
  flex-direction: row;
  justify-content: space-around;
  align-items: flex-start;
}
#left{
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  align-items: flex-start;
  margin-right: 50px;
}
#right{
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  align-items: flex-start;
  margin-left: 50px;
}

#down_btn{
  display: flex;
  justify-content: center;
}

#back{
  box-shadow: gray 2px 2px
}
#check_writing{
  box-shadow: gray 2px 2px
}
</style>

