<template>
  <div id="container1">
    <br>
    <h2>初診基本資料</h2>
    <div class="basic">
      <form>
        <div id="left">
          <section class="first">
            <label for="name">姓名</label><br>
            <label><input id="name" name="name" v-model="name"  required="required"></label>
          </section><br>
          <section class="first">
            <label for="identity">身分證字號</label><br>
            <input id="identity" name="id" v-model="id" required="required">
          </section><br>
          <section class="first">
            <label for="birthday">生日</label><br>
            <label><input name="birthday" type="date" v-model="date" required="required"></label>
          </section><br>
          <section class="first">
            <label for="sex">生理性別</label><br>
            <label><input name="sex" type="radio" value="男" v-model="male" required="required">男</label>
            <label><input name="sex" type="radio" value="女" v-model="female" required="required">女</label>
          </section><br>
          <section class="first">
            <label for="ice_contact">緊急聯絡人姓名</label><br>
            <input id="ice_contact" name="ice_contact" v-model="ice_contact" required="required">
          </section><br>
          <section class="first">
            <label for="ice_phone">緊急聯絡人電話</label><br>
            <label><input name="ice_phone" required="required" v-model="ice_phone" type="text" maxlength="10" pattern="09\d{8}" placeholder="09xxxxxxxx"></label>
          </section><br>
          <section class="first">
            <label for="ice_relation">緊急聯絡人關係</label><br>
            <input id="ice_relation" name="ice_relation" v-model="ice_relation" required="required">
          </section><br>

          <a href="index.html"><button id="back" style="width:150px;height:50px;background-color: #00317B;color:white;text-align: center;border:0" >回首頁</button></a>
          <br>
        </div>
        <div id="right">
          <section class="first">
            <label for="id_card_number">健保卡卡號</label><br>
            <label><input name="ic_card_number" v-model="ic_card_number" required="required"></label>
          </section><br>
          <section class="first">
            <label for="phone_number">手機號碼</label><br>
            <label><input name="phone_number" v-model="phone_number" required="required" type="text" maxlength="10" pattern="09\d{8}" placeholder="09xxxxxxxx"></label>
          </section><br>
          <section class="first">
            <label for="blood_type">血型</label><br>
            <label><input name="blood_type" v-model="blood_type">型</label>
          </section><br>
          <section class="first">
            <label for="address">地址</label><br>
            <label><input name="address" required="required" v-model="address"></label>
          </section><br>
          <section class="first">
            <label for="height">身高</label><br>
            <label><input name="height" v-model="height">公分</label>
          </section><br>
          <section class="first">
            <label for="weight">體重</label><br>
            <label><input name="weight" v-model="weight">公斤</label>
          </section><br>
          <button id="next" style="width:150px;height:50px;background-color: #00317B;color:white;text-align: center;border:0" >確認填寫</button>

          <br>
        </div>
      </form>
    </div>
    <br><br>
  </div>


</template>

<script setup>
import axios from "axios";

class Vue {
  constructor(param) {

  }

}

const container1 = new Vue({
  el: '#patient_base',
  data: {
    id: '',
    name: '',
    ic_card_number: '',
    phone: '',
    blood_type: '',
    address: '',
    height: '',
    weight: '',
    sex: '',
    birthday: '',
    ice_contact: '',
    ice_phone: '',
    ice_relation: '',
  },
  methods: {
    submitForm: function () {
      if(this.name != '' && this.id != '' && this.ic_card_number != '' && this.phone != '' && this.blood_type != '' && this.address != '' && this.height != '' && this.weight != ''){
        axios.post('insert.php',{
          request: 2,
          name: this.name,
        })
            .then(function (response) {
              console.log(response);
              if(response.data[0] == 'success'){
                alert("新增成功");
              }
            })
            .catch(function (error) {
              console.log(error);
            });
      }else{
        alert("請輸入完整資料");
      }
    }
  }

})

</script>

<style >
#container1{
  margin: auto;
  justify-content: center;
  align-items: center;
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
  align-items: flex-end;

}
#right{

}
#left{

}
#back{
  box-shadow: gray 2px 2px
}
#next{
  box-shadow: gray 2px 2px
}

</style>