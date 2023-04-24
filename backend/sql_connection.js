import axios from "axios";

function register_patient(name, id, sex, birthday, blood_type, ic_card_number, phone_number, address, height, weight,
                          ice_contact, ice_relation, ice_phone) {
    let config = {
        headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': 'localhost:5000'
        }
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
    let config = {
        headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': 'localhost:5000'
        }
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


function if_patient_registered_line(id) {
    let config = {
        headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': 'localhost:5000'
        }
    }
    axios.post('http://127.0.0.1:5000/if_patient_registered_line', {
        id: id
    }, config)
        .then(response => {
            console.log(response)
        })
        .catch(err => {
            console.log(err)
        });
}


function update_patient_info_by_id(id, phone_number, address, height, weight, ice_contact,
                                   ice_relation, ice_phone) {
    let config = {
        headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': 'localhost:5000'
        }
    }
    axios.post('http://127.0.0.1:5000/update_patient_info_by_id', {
        id: id, phone_number: phone_number, address: address, height: height, weight: weight,
        ice_contact: ice_contact, ice_relation: ice_relation, ice_phone: ice_phone
    }, config)
        .then(response => {
            console.log(response)
        })
        .catch(err => {
            console.log(err)
        });
}


function check_if_time_have_clinic(date, time_period) {
    let config = {
        headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': 'localhost:5000'
        }
    }
    axios.post('http://127.0.0.1:5000/check_if_time_have_clinic', {
        date: date, time_period: time_period
    }, config)
        .then(response => {
            console.log(response)
        })
        .catch(err => {
            console.log(err)
        });
}


//get_patient_info_by_id('F130937605')
// if_patient_registered_line('A123456789')
// update_patient_info_by_id('F130937605', '0912345678', '台北市中山區', 170, 60, '王小明', '父親', '0912345678')
// register_patient('王小明', 'F130937605', '男', '1990-01-01', 'A', 'A123456789', '0912345678', '台北市中山區', 170, 60, '王小明', '父親', '0912345678')
check_if_time_have_clinic('2023-05-05', '早')