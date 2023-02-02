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
        <form id="basic" method="post" action="write_doc.php" >
            <section class="first">
                <label for="doc_name">醫師姓名:</label>
                <input id="doc_name" name="doc_name" type="text" size="25" required>
            </section><br>
            <section class="first">
                <label for="doc_id">醫師代碼:</label>
                <label><input id="doc_id" name="doc_id" type="text" size="25" required></label>
            </section><br>
            <section class="first">
                <label for="doc_phone_number">醫師手機號碼:</label>
                <label><input name="doc_phone_number" type="text" required="required" maxlength="10" pattern="09\d{8}" placeholder="09xxxxxxxx"></label>
            </section><br>
            <section class="first">
                <label for="email">email:</label>
                <label><input name="email" type="email" required></label>
            </section><br>
            <section class="first">
                <label for="doc_address">醫師地址:</label>
                <label><input name="doc_address" type="text" ></label>
            </section><br>
            <section class="first">
                <label for="department">科別:</label>
                <label><input name="department" type="text"></label>
            </section><br>
            <section class="first">
                <label for="password">密碼:</label>
                <label><input name="password" type="text" required></label>
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
    mysqli_query($link, "INSERT INTO `doctor_base` (`doc_name`, `doc_id`, `doc_phone_number`,`email`, `doc_address`,
                            `department`, `password`)
values('".$_POST['doc_name']."','".$_POST['doc_id']."','".$_POST['doc_phone_number']."','".$_POST['email']."','".$_POST['doc_address']."',
'".$_POST['department']."','".$_POST['password']."')");
}

?>

</body>
</html>