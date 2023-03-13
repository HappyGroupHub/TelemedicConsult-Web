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