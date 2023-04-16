<template>
    <bar/>
    <banner/>
    <div id="container1">
        <br>
        <h2>確認資料有無需要修改</h2>
        <div class="basic">
            <form>
                <div id="left">
                    姓名<br>
                    <input v-model="name" type="text" id="name" name="name"/>
                    <br>
                    身分證字號<br>
                    <input v-model="id" type="text" id="identity" name="id" disabled/>
                    <br>
                    生日<br>
                    <input v-model="birthday" type="text" id="birthday" name="birthday" disabled/>
                    <br>
                    生理性別<br>
                    <input v-model="sex" name="sex" type="text" disabled/>
                    <br>
                    緊急聯絡人姓名<br>
                    <input v-model="ice_contact" id="ice_contact" name="ice_contact" disabled>
                    <br>
                    緊急聯絡人電話<br>
                    <input v-model="ice_phone" name="ice_phone" type="text" disabled>
                    <br>
                    緊急聯絡人關係<br>
                    <input v-model="ice_relation" name="ice_relation" disabled>
                    <br>

                </div>
                <div id="right">

                    健保卡卡號<br>
                    <input v-model="ic_card_number" name="ic_card_number" disabled>
                    <br>
                    手機號碼<br>
                    <input v-model="phone_number" name="phone_number" type="text">
                    <br>
                    <session class="form_session">
                        身高<br>
                        <input v-model="height" type="text" id="height" name="height"/>公分
                    </session>

                    <br>
                    <session class="form_session">
                        體重<br>
                        <input v-model="weight" type="text" id="weight" name="weight"/>公斤
                    </session>
                    <br>
                    <session class="form_session">
                        血型<br>
                        <input v-model="blood_type" type="text" id="blood_type" name="blood_type" disabled/>型
                    </session>
                    <br>
                    地址<br>
                    <input v-model="address" type="text" id="address" name="address"/>

                </div>
            </form>
            <br>
            <div id="down_btn">
                <a href="index.html">
                    <button id="back"
                            style="width:150px;height:50px;background-color: #00317B;color:white;text-align: center;border:0">
                        回首頁
                    </button>
                </a>
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                <button @click="update_patient_info_by_id" id="check_writing" type="submit"
                        style="width:150px;height:50px;background-color: #00317B;color:white;text-align: center;border:0">
                    確認填寫
                </button>
                <br>
            </div>
        </div>
        <br><br>
    </div>

  {{ mess }}
</template>

<script setup>
import bar from "./components/bar.vue"
import banner from "./components/banner_patient.vue"

import {ref} from "vue";
import axios from "axios";

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
let userID = sessionStorage.getItem('user_id')
const mess = ref('')


function show_patient_info_by_id() {
    let config = {
        headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': '*'
        }
    }
    axios.post('http://127.0.0.1:5000/get_patient_info_by_id', JSON.stringify({
        id: userID,
    }), config)
        .then(res => {
            if (res.data.status === "success") {
                mess.value = "success";
                name.value = res.data.name;
                id.value = res.data.id;
                birthday.value = res.data.birthday;
                sex.value = res.data.sex;
                ice_contact.value = res.data.ice_contact;
                ice_phone.value = res.data.ice_phone;
                ice_relation.value = res.data.ice_relation;
                ic_card_number.value = res.data.ic_card_number;
                phone_number.value = res.data.phone_number;
                height.value = res.data.height;
                weight.value = res.data.weight;
                blood_type.value = res.data.blood_type;
                address.value = res.data.address;


            } else {
                mess.value = "fail";

            }
        })
        .catch(err => {
            console.log(err)
        });


}

if (window.location.href === "http://localhost:5173/update_patient.html") {
    show_patient_info_by_id();
}

function update_patient_info_by_id() {
    let config = {
        headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': 'localhost:5000'
        }
    }
    axios.post('http://127.0.0.1:5000/update_patient_info_by_id', {
        id: id.value,
        phone_number: phone_number.value,
        address: address.value,
        height: height.value,
        weight: weight.value,
        ice_contact: ice_contact.value,
        ice_relation: ice_relation.value,
        ice_phone: ice_phone.value
    }, config)
        .then(response => {
            console.log(response)
            window.location.href = "http://localhost:5173/reservation.html"
        })
        .catch(err => {
            console.log(err)
        });
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
}

#left {
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: flex-start;
    margin-right: 50px;
}

#right {
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

