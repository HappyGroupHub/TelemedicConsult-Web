<template>
  <div id="container1">
    <br>
    <h2>初診基本資料</h2>
    <div class="basic">
      <form @submit.prevent="register_patient">
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
            <input v-model="ice_relation"  name="ice_relation" required="required">
          <br>
          <a href="index.html"><button id="back" style="width:150px;height:50px;background-color: #00317B;color:white;text-align: center;border:0" >回首頁</button></a>
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
        <a href="check_patient_base.html"> <button @click="register_patient"  id="check_writing" type="submit"  style="width:150px;height:50px;background-color: #00317B;color:white;text-align: center;border:0" >確認填寫</button></a>
        <br>
      </div>
   </div>
    <br><br>
  </div>
</template>

<script setup>
import WritingPatient from './checking_patient.vue'
import { ref, defineComponent } from "vue";

const component = defineComponent({
  components: { WritingPatient },
});
const name = ref("");
const id = ref('');
const birthday = ref('');
const sex = ref('');
const ice_contact = ref('');
const ice_phone = ref('');
const ice_relation = ref('');
const ic_card_number = ref('');
const phone_number = ref('');
const height = ref('');
const weight = ref('');
const blood_type = ref('');
const address = ref('');
const formData = ref({});

function submitHTML() {
  formData.value = {
    name: name.value,
    id: id.value,
    birthday: birthday.value,
    sex: sex.value,
    ice_contact: ice_contact.value,
    ice_phone: ice_phone.value,
    ice_relation: ice_relation.value,
    ic_card_number: ic_card_number.value,
    phone_number: phone_number.value,
    height: height.value,
    weight: weight.value,
    blood_type: blood_type.value,
    address: address.value
  }
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
#container1 h2{
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

