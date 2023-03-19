import axios from "axios";

function register_patient(name, id, sex, birthday, blood_type, ic_card_number, phone_number, address, height, weight,
                  ice_contact, ice_relation, ice_phone) {
    let config = { headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': '*'}
    }
    axios.post('http://127.0.0.1:5000/register_patient', {
        name: name,
        id: id,
        sex: sex,
        birthday: birthday,
        blood_type: blood_type,
        ic_card_number: ic_card_number,
        phone_number: phone_number,
        address: address,
        height: height,
        weight: weight,
        ice_contact: ice_contact,
        ice_relation: ice_relation,
        ice_phone: ice_phone
    }, config)
        .then(res => {
            console.log(res)
        })
        .catch(err => {
            console.log(err)
        });
}

register_patient('測試用', 'A123456789', '男', '1999-01-01', 'A', '0123456789012',
    '0912345678', '台北市中正區', '170', '55', '測試用', '父親',
    '0912345678');

//import axios from "axios";
// import { ref } from "vue";
//
// const name = ref("");
// const id = ref("");
// const birthday = ref("");
// const ice_contact = ref("");
// const sex = ref("");
// const ice_phone = ref("");
// const ice_relation = ref("");
// const ic_card_number = ref("");
// const phone_number = ref("");
// const height = ref("");
// const weight = ref("");
// const blood_type = ref("");
// const address = ref("");
//
// function register_patient() {
//   let config = { headers: {
//       'Content-Type': 'application/json',
//       'Access-Control-Allow-Origin': '*'}
//   }
//   axios.post('http://127.0.0.1:5000/register_patient', {
//     name: name.value,
//     id: id.value,
//     sex: sex.value,
//     birthday: birthday.value,
//     blood_type: blood_type.value,
//     ic_card_number: ic_card_number.value,
//     phone_number: phone_number.value,
//     address: address.value,
//     height: height.value,
//     weight: weight.value,
//     ice_contact: ice_contact.value,
//     ice_relation: ice_relation.value,
//     ice_phone: ice_phone.value
//   }, config)
//       .then(res => {
//         console.log(res)
//       })
//       .catch(err => {
//         console.log(err)
//       });
// }