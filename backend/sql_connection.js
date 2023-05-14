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

function update_clinic_status(clinic_id, status_dict) {
    let config = {
        headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': 'localhost:5000'
        }
    }
    axios.post('http://127.0.0.1:5000/update_clinic_status', {
        clinic_id: clinic_id, status_dict: status_dict
    }, config)
        .then(response => {
            console.log(response)
        })
        .catch(err => {
            console.log(err)
        });
}


function make_appointment(clinic_id, patient_id) {
    let config = {
        headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': 'localhost:5000'
        }
    }
    axios.post('http://127.0.0.1:5000/make_appointment', {
        clinic_id: clinic_id, patient_id: patient_id
    }, config)
        .then(response => {
            console.log(response)
        })
        .catch(err => {
            console.log(err)
        });
}


function cancel_appointment(patient_id, clinic_id) {
    let config = {
        headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': 'localhost:5000'
        }
    }
    axios.post('http://127.0.0.1:5000/cancel_appointment', {
        patient_id: patient_id, clinic_id: clinic_id
    }, config)
        .then(response => {
            console.log(response)
        })
        .catch(err => {
            console.log(err)
        });
}


function get_clinic_info(clinic_id) {
    let config = {
        headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': 'localhost:5000'
        }
    }
    axios.post('http://127.0.0.1:5000/get_clinic_info', {
        clinic_id: clinic_id
    }, config)
        .then(response => {
            console.log(response)
        })
        .catch(err => {
            console.log(err)
        });
}


function get_patient_appointment_with_clinic_id(patient_id, clinic_id) {
    let config = {
        headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': 'localhost:5000'
        }
    }
    axios.post('http://127.0.0.1:5000/get_patient_appointment_with_clinic_id', {
        patient_id: patient_id, clinic_id: clinic_id
    }, config)
        .then(response => {
            console.log(response)
        })
        .catch(err => {
            console.log(err)
        });
}

function doctor_login(doc_id, password) {
    let config = {
        headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': 'localhost:5000'
        }
    }
    axios.post('http://127.0.0.1:5000/doctor_login', {
        doc_id: doc_id, password: password
    }, config)
        .then(response => {
            console.log(response)
        })
        .catch(err => {
            console.log(err)
        });
}


function get_doctor_clinic_list(doc_id) {
    let config = {
        headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': 'localhost:5000'
        }
    }
    axios.post('http://127.0.0.1:5000/get_doctor_clinic_list', {
        doc_id: doc_id
    }, config)
        .then(response => {
            console.log(response)
        })
        .catch(err => {
            console.log(err)
        });
}


function get_patients_by_clinic_id(clinic_id) {
    let config = {
        headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': 'localhost:5000'
        }
    }
    axios.post('http://127.0.0.1:5000/get_patients_by_clinic_id', {
        clinic_id: clinic_id
    }, config)
        .then(response => {
            console.log(response)
        })
        .catch(err => {
            console.log(err)
        });
}

get_patient_info_by_id('F130937605')
// if_patient_registered_line('A123456789')
// update_patient_info_by_id('F130937605', '0912345678', '台北市中山區', 170, 60, '王小明', '父親', '0912345678')
// register_patient('王小明', 'F130937605', '男', '1990-01-01', 'A', 'A123456789', '0912345678', '台北市中山區', 170, 60, '王小明', '父親', '0912345678')
// check_if_time_have_clinic('2023-05-05', '早')
// update_clinic_status('2', {
    // 'start_time': '2023-4-27 14:10',
    // 'end_time': '2023-4-27 14:20',
    // 'link': 'https://google.com',
    // 'total_appointment': '100',
    // 'progress': '88'
// })
// make_appointment('2', 'F130937605')
// cancel_appointment('F130937605', '2')
// get_clinic_info('2')
// get_patient_appointment_with_clinic_id('N126761037', '2')
// doctor_login('12345', 6969)
// get_doctor_clinic_list('12345')
// get_patients_by_clinic_id('2')