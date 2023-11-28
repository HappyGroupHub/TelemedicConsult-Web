<template>
  <bar v-if="view===1 || view===2"/>
  <banner_check_patient v-if="view===1"/>
  <br>
  <div id="container1" v-if="view===1">
    <br>
    <h2>Complete Basic Details</h2>
    <br>
    <div class="basic">
      <form>
        <div id="left">
          Full Name:
          <input v-model="name" required="required"/>
          <br><br>
          ID Number:
          <input v-model="id" id="identity" name="id" required="required"/>
          {{ check_id_msg }}
          <br><br>
          Birth Date:
          <input v-model="birthday" type="date" id="birthday" name="birthday" required="required"/>
          <br><br>
          <session class="form_session">
            Biological Gender:
            <input v-model="sex" name="sex" type="radio" value="Male" required="required">Male
            <input v-model="sex" name="sex" type="radio" value="Female" required="required">Female
          </session>
          <br><br>
          Emergency Contact:
          <input v-model="ice_contact" id="ice_contact" name="ice_contact" required="required">
          <br><br>
          Emergency Contact Phone Number:
          <input v-model="ice_phone" name="ice_phone" required="required" maxLength="10"
                 pattern="09\d{8}" placeholder="09xxxxxxxx">
          {{ check_ice_number_msg }}
          <br><br>
          Emergency Contact Relationship:
          <input v-model="ice_relation" name="ice_relation" required="required">
          <br><br>

        </div>
        <div class="right">
          Phone Number:
          <input v-model="phone_number" name="phone_number" required="required" maxLength="10"
                 pattern="09\d{8}" placeholder="09xxxxxxxx">
          {{ check_number_msg }}
          <br><br>
          <session className="form_session">
            Height:<br>
            <input v-model="height" id="height" name="height"/>cm
          </session>
          <br><br>
          <session className="form_session">
            Weight:<br>
            <input v-model="weight" id="weight" name="weight"/>kg
          </session>
          <br><br>
          <session className="form_session">
            Blood Type<br>
            <input v-model="blood_type" id="blood_type" name="blood_type" required="required"/>
          </session>
          <br><br>
          Address:
          <input v-model="address" id="address" name="address" required="required"/>

        </div>
      </form>
      <br>
      <div id="down_btn">
        <a href="index.html">
          <button id="back"
                  style="width:150px;height:50px;background-color: #00317B;color:white;text-align: center;border:0">
            Back
          </button>
        </a>
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <button v-on:click="changeView(2)" id="check_writing" type="submit"
                style="width:150px;height:50px;background-color: #00317B;color:white;text-align: center;border:0">
          Next
        </button>
        <br>
      </div>
    </div>
    <br><br>
  </div>
  <banner_check_patient v-if="view===2"/>
  <div id="container2" v-if="view===2">
    <br>
    <h2>Confirm Basic Information</h2>
    <div class="basic">
      <form>
        <div id="left">
          Full Name:
          <input v-model="name" disabled/>
          <br><br>
          ID Number:
          <input v-model="id" disabled/>
          <br><br>
          Birth Date:
          <input v-model="birthday" id="birthday" name="birthday" disabled/>
          <br><br>
          Biological Gender:
          <input v-model="sex" name="sex" disabled>
          <br><br>
          Emergency Contact:
          <input v-model="ice_contact" id="ice_contact" name="ice_contact" disabled>
          <br><br>
          Emergency Contact Phone Number:
          <input v-model="ice_phone" name="ice_phone" disabled>
          <br><br>
          Emergency Contact Relationship:
          <input v-model="ice_relation " id="ice_relation" name="ice_relation" disabled>
          <br><br>
        </div>
        <div class="right">
          Phone Number:
          <input v-model="phone_number" name="phone_number" id="phone_number" disabled>
          <br><br>
          <div>
            Height<br>
            <input v-model="height" id="height" name="height" disabled/>cm
          </div>
          <br><br>
          <div>
            Weight<br>
            <input v-model="weight" id="weight" name="weight" disabled/>kg
          </div>
          <br><br>
          <div>
            Blood Type:<br>
            <input v-model="blood_type" id="blood_type" name="blood_type" disabled>
          </div>
          <br><br>
          Address:
          <input v-model="address" id="address" name="address" disabled/>
          <br>
        </div>
      </form>
      <br>
      <div id="down_btn">
        <button v-on:click="changeView(1)" id="back"
                style="width:150px;height:50px;background-color: #00317B;color:white;text-align: center;border:0">
          回去更改
        </button>
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <button @click="register_patient" id="check_writing" type="submit"
                style="width:150px;height:50px;background-color: #00317B;color:white;text-align: center;border:0">
          確認送出
        </button>

        <br>
      </div>
    </div>
    <br><br>
  </div>

</template>

<script setup>
import {ref, watch} from "vue";
import axios from "axios";
import Banner_check_patient from "./components/banner_patient.vue";
import dompurify from "dompurify";

const view = ref(1)
const check_number_msg = ref('')
const check_ice_number_msg = ref('')
const check_id_msg = ref('')
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
const phone_number = ref('')
const height = ref('')
const weight = ref('')
const blood_type = ref('')
const address = ref('')

const purName = ref(dompurify.sanitize(name.value))
const purId = ref(dompurify.sanitize(id.value))
const purBirthday = ref(dompurify.sanitize(birthday.value))
const purSex = ref(dompurify.sanitize(sex.value))
const purIce_contact = ref(dompurify.sanitize(ice_contact.value))
const purIce_phone = ref(dompurify.sanitize(ice_phone.value))
const purIce_relation = ref(dompurify.sanitize(ice_relation.value))
const purPhone_number = ref(dompurify.sanitize(phone_number.value))
const purHeight = ref(dompurify.sanitize(height.value))
const purWeight = ref(dompurify.sanitize(weight.value))
const purBlood_type = ref(dompurify.sanitize(blood_type.value))
const purAddress = ref(dompurify.sanitize(address.value))


function register_patient() {
  let config = {
    headers: {
      'Content-Type': 'application/json',
      'Access-Control-Allow-Origin': '*'
    }
  }
  axios.post('http://127.0.0.1:5000/register_patient', {
    name: purName.value,
    id: purId.value,
    sex: purSex.value,
    birthday: purBirthday.value,
    blood_type: purBlood_type.value,
    phone_number: purPhone_number.value,
    address: purAddress.value,
    height: purHeight.value,
    weight: purWeight.value,
    ice_contact: purIce_contact.value,
    ice_relation: purIce_relation.value,
    ice_phone: purIce_phone.value,

  }, config)
      .then(res => {
        localStorage.clear()
        localStorage.setItem("user_id", id.value);
        localStorage.setItem('name', name.value);
        localStorage.setItem('patient_sex', sex.value)
        window.location.href = "/join_linebot.html"
      })
      .catch(err => {
        console.log(err)
      });
}

watch(purPhone_number, (newVal, oldVal) => {
  check_phone_number()
})
watch(purIce_phone, (newVal, oldVal) => {
  check_ice_phone_number()
})
watch(purId, (newVal, oldVal) => {
  check_id()
})

function check_phone_number() {
  const regex = /^09\d{8}$/;
  if (!regex.test(phone_number.value)) {
    check_number_msg.value = '手機號碼格式錯誤'
  } else {
    check_number_msg.value = 'ok'
  }
}

function check_ice_phone_number() {
  const regex = /^09\d{8}$/;
  if (!regex.test(ice_phone.value)) {
    check_ice_number_msg.value = '手機號碼格式錯誤'
  } else {
    check_ice_number_msg.value = 'ok'
  }
}

function check_id() {
  const alpha_table = {
    'A': 1, 'B': 10, 'C': 19, 'D': 28, 'E': 37, 'F': 46,
    'G': 55, 'H': 64, 'I': 39, 'J': 73, 'K': 82, 'L': 2, 'M': 11,
    'N': 20, 'O': 48, 'P': 29, 'Q': 38, 'R': 47, 'S': 56, 'T': 65,
    'U': 74, 'V': 83, 'W': 21, 'X': 3, 'Y': 12, 'Z': 30
  }
  const id_sum = parseInt(alpha_table[id.value[0]]) + parseInt(id.value[1]) * 8 + parseInt(id.value[2]) * 7 + parseInt(
      id.value[3]) * 6 + parseInt(id.value[4]) * 5 + parseInt(id.value[5]) * 4 + parseInt(
      id.value[6]) * 3 + parseInt(id.value[7]) * 2 + parseInt(id.value[8]) + parseInt(id.value[9])
  if (id_sum % 10 !== 0) {
    check_id_msg.value = '身分證字號驗證失敗'
  } else {
    check_id_msg.value = 'ok'
  }
}
</script>

<style>
#container1 {
  margin: auto;
  justify-content: center;
  align-items: center;
  width: 990px;
  background-color: #E1E1E1;
  border-radius: 30px;
  box-shadow: gray 2px 2px;
}

#container2 {
  margin: auto;
  justify-content: center;
  align-items: center;
  width: 990px;
  background-color: #E1E1E1;
  border-radius: 30px;
  box-shadow: gray 2px 2px;
}

#container1 h2 {
  text-align: center;
  margin-top: 30px;
  margin-bottom: 20px;
}

#container2 h2 {
  text-align: center;
  margin-top: 30px;
  margin-bottom: 20px;
}

form {
  display: flex;
  flex-direction: row;
  justify-content: space-around;
  align-items: flex-start;
  margin-bottom: 5px;
}

#left {
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  align-items: flex-start;
  margin-right: 50px;
}

.right {
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  align-items: flex-start;
  margin-left: 50px;
}

#down_btn {
  display: flex;
  justify-content: center;
}

#back {
  box-shadow: gray 2px 2px
}

#check_writing {
  box-shadow: gray 2px 2px
}
</style>

