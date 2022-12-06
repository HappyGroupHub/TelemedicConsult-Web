
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
<body>
<header><h1>線上掛號系統</h1></header>
<nav>
    <a href="login.php">首頁</a>
    >
    <a href="login.php">掛號</a>
    >
    <a href="write_patient.php">基本資料填寫</a>
</nav>
<main>
    <div class="basic">
        <form id="basic" method="post" action="send_link.php" >
            <section class="first">
                <label for="meet_room">會議室連結:</label>
                <input id="meet_room" name="link" required>
                <input name="submit" type="submit" value="繳交">
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

if ($link) {
    mysqli_query($link, 'SET NAMES uff8');
    echo "正確連接資料庫";
} else {
    echo "不正確連接資料庫" . mysqli_connect_error();
}
if(isset($_POST['submit'])) {
    $result = mysqli_query($link, "SELECT * FROM `clinic_period` where clinic_date='" . $_POST['date'] . "' and clinic_period='" . $_POST['period'] . "'");
    $row = $result->fetch_assoc();
    echo $row['clinic_id'];
    mysqli_query($link, "INSERT INTO `clinic_informtion` (`clinic_id`)values('" . $row['clinic_id'] . "')");
    mysqli_query($link, "UPDATE clinic_informtion SET link='" . $_POST['link'] . "'WHERE  clinic_id ='" . $row['clinic_id'] . "'");
}











/*if(isset($_POST['submit1'])){
    $result = mysqli_query($link, "SELECT * FROM `clinic_period` where clinic_date='" . $_POST['date'] . "' and clinic_period='" . $_POST['period'] . "'");
    $row = $result->fetch_assoc();
    if (true) {
        while($row= $result->fetch_assoc()) {
            echo $row["clinic_id"];
            mysqli_query($link, "INSERT INTO `clinic_informtion` (`clinic_id`)
    values('".$row['clinic_id']."')");
            if(isset($_POST['submit'])){
                mysqli_query($link,"UPDATE clinic_informtion SET link='".$_POST['link']."'
    WHERE  clinic_id ='".$row["clinic_id"]."'");
            }
        }
    }else {
        echo "no result";
    }
}
*/



?>

</body>
</html>