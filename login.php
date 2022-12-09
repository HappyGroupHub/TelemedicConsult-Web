<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="utf-8">
    <title>掛號登入</title>
    <style>
        header{height: 100px;background-color: #f7ebe7;text-align: center;line-height: 100px;font-family: 標楷體;}
        nav{margin: 2%; height: 20px;background-color: #f4f1bb;font-family: 標楷體;}
        div{display: flex;justify-content: center;align-content: center;}
        form{margin: 2%;}
        section{margin: 5%;}
    </style>
</head>
<body style="font-family: 標楷體,serif;">
<header><h1>線上掛號系統</h1></header>
<nav>
    <a href="index.php">首頁</a>
    >
    <a href="login.php">線上掛號</a>
</nav>
<main>
    <div class="login">
        <form id="log1" method="post" style="border: solid #efefef 3px;">
            <section class="enter">
                <label for="identify">身分證字號:</label>
                <label><input name="id" type="text" size="25" required></label>
            </section><br>
            <section class="enter">
                <label for="ic_card_number">健保卡卡號:</label>
                <label><input name="ic_card_number" type="text" size="25" required></label>
            </section><br>
            <section class="button" >
                <label for="submit"></label>
                <input name="submit" type="submit" value="登入" size="25">
            </section>
            <section class="button" style="float: right;">
                <label class="label_field hidden"></label>
                <a href="write_patient.php"><input id="first" type="button" value="初次使用" style="width: 80px; height: 80px;"></a>
            </section>
        </form>
    </div>

</main>
<?php

$config_json = file_get_contents('config.json');
$decoded_json = json_decode($config_json,false);
$hostname=$decoded_json->Database->ip_address;
$database=$decoded_json->Database->db_name;
$username=$decoded_json->Database->username;
$password=$decoded_json->Database->password;

$link = mysqli_connect($hostname, $username, $password, $database);
session_start();
if ($link) {
    mysqli_query($link, 'SET NAMES uff8');
    echo "正確連接資料庫". "<br>";
} else {
    echo "不正確連接資料庫" . mysqli_connect_error();
}
if(isset($_POST['submit'])) {
    $sql = "SELECT * FROM `patient_base`";
    $result = mysqli_query($link, $sql);
    if ($result > 0) {
        while($row = $result->fetch_assoc()) {
            if($row["id"]==$_POST['id'] && $row["ic_card_number"]==$_POST['ic_card_number']){
                echo "成功登入". "<br>";
                echo "id: " . $row["id"] . "<br>";
                echo "ic_card_number:" . $row["ic_card_number"];
                header('location: write_patient.php');
                break;
            }
        }
    } else {
        echo "0 results";
    }
}



?>
</body>
</html>