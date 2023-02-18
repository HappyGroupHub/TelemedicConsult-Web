import axios from "axios";

function register(name, id, sex, birthday, blood_type, ic_card_number, phone_number, address, height, weight,
                  ice_contact, ice_relation, ice_phone) {
    axios.post('http://localhost:5173/php_backend/sql_connection.php', {
        action: 'register',
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
    }).then(function (response) {
        console.log(response.data.message);
    });
}

register('測試用', 'A123456789', '男', '1999-01-01', 'A', '0123456789012',
    '0912345678', '台北市中正區', '170', '55', '測試用', '父親',
    '0912345678');