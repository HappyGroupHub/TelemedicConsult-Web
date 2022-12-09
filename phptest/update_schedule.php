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
    <script>
        function numPlus() {
            const p = document.getElementById('num');
            p.innerHTML++;
        }
        function numPlus1() {
            const p = document.getElementById('num')
            p.innerHTML--;
        }
    </script>
</head>
<body>
<header><h1>線上掛號系統</h1></header>

<main>
    <div class="basic">
        <form id="basic" method="post" action="update_schedule.php" >
            <section class="button">
                <label for="first"></label>
                <button type="submit" name="start_time">開始看診</button>
            </section>
            <section class="button">
                <label for="first"></label>
                <button type="submit" name="end_time">結束看診</button>
            </section>
        </form>
        <form id="basic" method="post" action="update_schedule.php" >
            <p>看診進度</p>
            <p id="num" name="schedule" value="1">1</p>
            <input type="button"  name="schedule" value="下一個" onclick="numPlus()" >
            <input type="button"  name="schedule" value="上一個" onclick="numPlus1()" >
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

if(isset($_POST['start_time'])) {
    $start_time=date("Y-m-d"." "."h:i:s");
    echo $start_time;
    mysqli_query($link, "UPDATE clinic_informtion SET link='" . $_POST['link'] . "'WHERE  clinic_id ='".$row['clinic_id']."'";
}
if(isset($_POST['end_time'])) {
    $end_time=date("Y-m-d"." "."h:i:s");
    echo $end_time;
    mysqli_query($link, "UPDATE clinic_informtion SET link='" . $_POST['link'] . "'WHERE  clinic_id ='".$row['clinic_id']."'");
}
if(isset($_POST['submit'])) {
    mysqli_query($link, "UPDATE clinic_informtion SET link='" . $_POST['link'] . "'WHERE  clinic_id ='".$row['clinic_id']."'");
}



?>


</body>
</html>