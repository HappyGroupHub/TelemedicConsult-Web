import axios from "axios";

function register_patient(name, id, sex, birthday, blood_type, ic_card_number, phone_number, address, height, weight,
                  ice_contact, ice_relation, ice_phone) {
    let config = { headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': 'localhost:5000'}
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
        .then(response => {
            console.log(response)
        })
        .catch(err => {
            console.log(err)
        });
}

function get_patient_info_by_id(id) {
    let config = { headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': 'localhost:5000'}
    }
    axios.post('http://127.0.0.1:5000/get_patient_info_by_id', {
        id: id
    }, config)
        .then(response => {
            console.log(response)
        })
        .catch(err => {
            console.log(err)
        });
}


get_patient_info_by_id('F130937605')