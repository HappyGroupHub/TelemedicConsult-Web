<?php

$config_json = file_get_contents('config.json');
$decoded_json = json_decode($config_json, false);
$hostname = $decoded_json->Database->ip_address;
$database = $decoded_json->Database->db_name;
$username = $decoded_json->Database->username;
$password = $decoded_json->Database->password;

$connect = new PDO ("mysql:host=$hostname;dbname=$database", $username, $password);

$received_data = json_decode(file_get_contents('php://input'));


if ($received_data->action == 'register') {
    $data = array(
        ':name' => $received_data->name,
        ':id' => $received_data->id,
        ':sex' => $received_data->sex,
        ':birthday' => $received_data->birthday,
        ':blood_type' => $received_data->blood_type,
        ':ic_card_number' => $received_data->ic_card_number,
        ':phone_number' => $received_data->phone_number,
        ':address' => $received_data->address,
        ':height' => $received_data->height,
        ':weight' => $received_data->weight,
        ':ice_contact' => $received_data->ice_contact,
        ':ice_relation' => $received_data->ice_relation,
        ':ice_phone' => $received_data->ice_phone,
    );
    $query = "
    INSERT INTO patient_base (name, id, sex, birthday, blood_type, ic_card_number, phone_number, address, height,
                              ice_contact, ice_relation, ice_phone)
    VALUES (:name, :id, :sex, :birthday, :blood_type, :ic_card_number, :phone_number, :address, :height, :ice_contact,
            :ice_relation, :ice_phone)
    ";
    $statement = $connect->prepare($query);
    $statement->execute($data);
    $output = array(
        'message' => 'Data Inserted'
    );
    echo json_encode($output);
}
?>