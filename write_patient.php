<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="utf-8">
    <title>初診填寫基本資料</title>
    <style>
        header {
            height: 100px;
            background-color: #f7ebe7;
            text-align: center;
            line-height: 100px;
            font-family: 標楷體;
        }
        nav {
            margin: 2%;
            height: 20px;
            background-color: #f4f1bb;
            font-family: 標楷體;
        }
        main {
            position: relative;
        }
        div {
            display: flex;
            justify-content: space-around;
            margin: 2%;
        }
        section {
            margin: 5%;
        }
    </style>
</head>
<body style="font-family: 標楷體;">
<header><h1>線上掛號系統</h1></header>
<nav>
    <a href="第一頁.html">首頁</a>
    >
    <a href="login.php">掛號</a>
    >
    <a href="write_patient.php">基本資料填寫</a>
</nav>
<main>
    <div class="basic">
        <form id="basic" method="post" action="write_patient.php" >
            <section class="first">
                <label for="identity">身分證字號:</label>
                <input id="identity" name="id" type="text" size="25" required>
            </section><br>
            <section class="first">
                <label for="name">姓名:</label>
                <label><input id="name" name="name" type="text" size="25" required></label>
            </section><br>
            <section class="first">
                <label for="sex">生理性別:</label>
                <label><input name="sex" type="radio" value="男">男</label>
                <label><input name="sex" type="radio" value="女">女</label>
            </section><br>
            <section class="first">
                <label for="birthday">生日:</label>
                <label><input name="birthday" type="date" required></label>
            </section><br>
            <section class="first">
                <label for="blood_type">血型:</label>
                <label><input name="blood_type" type="text"></label>
            </section><br>
            <section class="first">
                <label for="id_card_number">健保卡卡號:</label>
                <label><input name="ic_card_number" type="text" required></label>
            </section><br>
            <section class="first">
                <label for="phone_number">手機號碼:</label>
                <label><input name="phone_number" type="text" ></label>
            </section><br>
            <section class="first">
                <label for="address">地址:</label>
                <label><input name="address" type="text" ></label>
            </section><br>
            <section class="first">
                <label for="height">身高:</label>
                <label><input name="height" type="text" ></label>
            </section><br>
            <section class="first">
                <label for="weight">體重:</label>
                <label><input name="weight" type="text" ></label>
            </section><br>
            <section class="first">
                <label for="ice_contact">緊急聯絡人:</label>
                <label><input name="ice_contact" type="text" ></label>
            </section><br>
            <section class="first">
                <label for="ice_relation">緊急聯絡人關係:</label>
                <label><input name="ice_relation" type="text" ></label>
            </section><br>
            <section class="first">
                <label for="ice_phone">緊急聯絡人電話:</label>
                <label><input name="ice_phone" type="text" ></label>
            </section><br>


            <input name="submit" type="submit" value="繳交">
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

if ($link) {
    mysqli_query($link, 'SET NAMES uff8');

    echo "正確連接資料庫";

} else {
    echo "不正確連接資料庫" . mysqli_connect_error();
}

if(isset($_POST['submit'])) {
    /*if($_POST["sex"] != "m") {
        $_POST['sex'] = "f";
    } else {
        $_POST['sex'] = "m";
    }*/
    mysqli_query($link, "INSERT INTO `patient_base` (`name`, `id`, `sex`,`birthday`, `blood_type`,
                            `ic_card_number`, `phone_number`, `address`, `height`, `weight`, `ice_contact`, `ice_relation`, `ice_phone`)
values('".$_POST['name']."','".$_POST['id']."','".$_POST['sex']."','".$_POST['birthday']."','".$_POST['blood_type']."',
'".$_POST['ic_card_number']."','".$_POST['phone_number']."','".$_POST['address']."','".$_POST['height']."','".$_POST['weight']."'
,'".$_POST['ice_contact']."','".$_POST['ice_relation']."','".$_POST['ice_phone']."')");
}

?>

</body>
</html>