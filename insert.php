<?php
include 'first.php';
$data = json_decode(file_get_contents('php://input'), true);
$request = $data->request;
if($request == "insert"){
    $id = $data->id;
    $ic_card_number = $data->ic_card_number;
    $birthday = $data->birthday;
    $name = $data->name;
    $sex = $data->sex;
    $ice_contact = $data->ice_contact;
    $ice_relation = $data->ice_relation;
    $ice_phone = $data->ice_phone;
    $phone = $data->phone;
    $address = $data->address;
    $blood_type = $data->blood_type;
    $height = $data->height;
    $weight = $data->weight;
    $insert = "INSERT INTO `patient_base`(`id`, `ic_card_number`, `birthday`, `name`, `sex`, `ice_contact`, `ice_relation`, `ice_phone`, `phone`, `address`, `blood_type`, `height`, `weight`) VALUES ('$id','$ic_card_number','$birthday','$name','$sex','$ice_contact','$ice_relation','$ice_phone','$phone','$address','$blood_type','$height','$weight')";
    $result = mysqli->query($insert);
    if($result){
        $response = array("status" => "success");
    }else{
        $response = array("status" => "failed");

    }
    echo json_encode($response);


}



?>