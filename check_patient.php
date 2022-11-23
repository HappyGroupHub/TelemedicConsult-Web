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
    <a href="掛號登入.html">掛號</a>
    >
    <a href="write_patient.php">基本資料填寫</a>
        >
        <a href="check_patient.php">基本資料</a>

    </nav>
<main>
    <div class="basic" style="float: left;">
        <form id="basic" method="post" action="check_patient.php" >
            <section class="first">
                <label for="identity">身分證字號:</label>
                <input id="identity" name="id" type="text" size="25" required>
            </section><br>
            <section class="first">
                <label for="name">姓名:</label>
            <input id="name" name="name" type="text" size="25" required>
            </section><br>
            <section class="first">
                <label for="sex">生理性別:</label>
                <input name="sex" type="radio" >男
                <input name="sex" type="radio" >女
            </section><br>
            <section class="first">
                <label for="birthday">生日:</label>
                <input name="birthday" type="text" required>
            </section><br>
            <section class="first">
                <label for="blood_type">血型:</label>
            <input name="blood_type" type="text">
            </section><br>
            <section class="first">
                <label for="id_card_number">健保卡卡號:</label>
                <input name="ic_card_number" type="text" required>
            </section><br>

            <input name="submit" type="submit" value="繳交">
            <br>
        </form>
    </div>
    <div class="basic" style="float: right;">
        <form id="information" method="post">
            <section class="first">
                <label for="height">身高:</label>
                <input name="height" type="text">
            </section><br>
            <section class="first">
                <label for="weight">體重:</label>
                <input name="weight" type="text">
            </section><br>
            <section class="first">
                <label for="phone_number">手機號碼:</label>
                <input name="phone_number" type="text">
            </section><br>
            <section class="first">
                <label for=address>地址:</label>
                <input name="address" type="text">
            </section><br>
        </form>
    </div>
</main>

<?php


$link = mysqli_connect("140.113.122.245", "funiserver", "AdNtvW8PKjFiQIp0", "telemedic_consult_sys");

if ($link) {
    mysqli_query($link, 'SET NAMES uff8');
    echo "正確連接資料庫";
} else {
    echo "不正確連接資料庫" . mysqli_connect_error();
}

?>


</body>
</html>