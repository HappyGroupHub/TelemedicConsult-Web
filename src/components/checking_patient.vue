<template>
  <div id="container1">
    <br>
    <h2>初診基本資料</h2>
    <div class="basic">
      <child-component v-on:form-submitted="submitForm" />
      <form>
        <div id="left">
          姓名<br>
          <input v-model="formData.name" @input="$emit('updateFormData', formData)"   type="text"  required="required" />
          <br>
          身分證字號<br>
          <input v-model="formData.id" @input="$emit('updateFormData', formData)"  type="text"   required="required" />
          <br>
          生日<br>
          <input v-model="formData.birthday" @input="$emit('updateFormData', formData)"    id="birthday" name="birthday" required="required" />
          <br>
            生理性別<br>
            <input v-model="formData.sex" @input="$emit('updateFormData', formData)"   name="sex" type="text" required="required">
          <br>
          緊急聯絡人姓名<br>
          <input v-model="formData.ice_contact" @input="$emit('updateFormData', formData)"   id="ice_contact" name="ice_contact" required="required">
          <br>
          緊急聯絡人電話<br>
          <input v-model="formData.ice_phone" @input="$emit('updateFormData', formData)"   name="ice_phone" required="required"  type="text" maxlength="10" pattern="09\d{8}" placeholder="09xxxxxxxx">
          <br>
          緊急聯絡人關係<br>
          <input v-model="formData.ice_relation" @input="$emit('updateFormData', formData)"   name="ice_relation" required="required">
          <br>
        </div>
        <div id="right">
          健保卡卡號<br>
          <input v-model="formData.ic_card_number" @input="$emit('updateFormData', formData)"   name="ic_card_number" required="required">
          <br>
          手機號碼<br>
          <input v-model="formData.phone_number" @input="$emit('updateFormData', formData)"  name="phone_number"  required="required" type="text" maxlength="10" pattern="09\d{8}" placeholder="09xxxxxxxx">
          <br>
          <div>
            身高<br>
            <input v-model="formData.height" @input="$emit('updateFormData', formData)"  type="text"  id="height" name="height" />公分
          </div>

          <br>
          <div>
            體重<br>
            <input v-model="formData.weight" @input="$emit('updateFormData', formData)"  type="text" id="weight" name="weight" />公斤
          </div>
          <br>
          <div>
            血型<br>
            <input v-model="formData.blood_type" @input="$emit('updateFormData', formData)"  type="text"  id="blood_type" name="blood_type" required="required" />型
          </div>
          <br>
          地址<br>
          <input v-model="formData.address" @input="$emit('updateFormData', formData)"  type="text"  id="address" name="address" required="required" />
          <br>

        </div>
      </form><br>
      <div id="down_btn">
        <button id="back" style="width:150px;height:50px;background-color: #00317B;color:white;text-align: center;border:0" >回去更改</button>
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <button @click="register_patient"  id="check_writing" type="submit"  style="width:150px;height:50px;background-color: #00317B;color:white;text-align: center;border:0" >確認填寫</button>
        <br>
      </div>
    </div>
    <br><br>
  </div>
</template>

<script setup>
import axios from "axios";

const formData={
  name: '',
  id: '',
  birthday: '',
  sex: '',
  ice_contact: '',
  ice_phone: '',
  ice_relation: '',
  ic_card_number: '',
  phone_number: '',
  height: '',
  weight: '',
  blood_type: '',
  address: ''
};

function register_patient() {
  let config = { headers: {
      'Content-Type': 'application/json',
      'Access-Control-Allow-Origin': '*'}
  }
  axios.post('http://127.0.0.1:5000/register_patient', {
    name: formData.name,
    id: formData.id,
    sex: formData.sex,
    birthday: formData.birthday,
    blood_type: formData.blood_type,
    ic_card_number: formData.ic_card_number,
    phone_number: formData.phone_number,
    address: formData.address,
    height: formData.height,
    weight: formData.weight,
    ice_contact: formData.ice_contact,
    ice_relation: formData.ice_relation,
    ice_phone: formData.ice_phone
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

#right{
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  align-items: flex-start;
  margin-left: 50px;
}

#left{
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  align-items: flex-start;
  margin-right: 50px;
}

#back{
  box-shadow: gray 2px 2px
}
#check_writing{
  box-shadow: gray 2px 2px
}
</style>

