<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>初診填寫基本資料</title>
    <style>
        header {
            height: 100px;
            background-color: #f7ebe7;
            text-align: center;
            line-height: 100px;
        }
        nav {
            margin: 2%;
            height: 20px;
            background-color: #f4f1bb;
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
        <form id="basic" method="post" action="write_clinic_time.php" >
            <section class="first">
                <label for="date">日期:</label>
                <input id="date" name="date" type="date" size="25" required>
            </section><br>
            <section class="first">
                <label for="period">時段:</label><br>
                <label><input name="period" type="radio" value="早">早</label>
                <label><input name="period" type="radio" value="午">午</label>
                <label><input name="period" type="radio" value="晚">晚</label>
            </section>

            <input name="submit" type="submit" value="新增">
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
mysqli_query($link,"CREATE TABLE clinic_period (
    clinic_id   int  NOT NULL AUTO_INCREMENT,
    clinic_date  date NOT NULL,
    clinic_period  varchar(3) NOT NULL,
    PRIMARY KEY(clinic_id)
)");
if(isset($_POST['submit'])) {
    mysqli_query($link, "INSERT INTO `clinic_period` (`clinic_date`,`clinic_period`)
values('".$_POST['date']."','".$_POST['period']."')");
}


?>
</body>
</html>
