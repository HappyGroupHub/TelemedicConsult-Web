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
        <form id="log1" method="post" style="border: solid #efefef 3px;" action="doc_login.php">
            <section class="enter">
                <label for="doc_id">醫師代碼:</label>
                <label><input name="doc_id" type="text" size="25" required></label>
            </section><br>
            <section class="enter">
                <label for="password">密碼:</label>
                <label><input name="password" type="password" size="25" required></label>
            </section><br>
            <section class="button" >
                <label for="submit"></label>
                <input name="submit" type="submit" value="登入" size="25">
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

    $sql = "SELECT * FROM `doctor_base`";
    $result = mysqli_query($link, $sql);


    if ($result > 0) {
        while($row = $result->fetch_assoc()) {

            if($row["doc_id"]==$_POST['doc_id'] && $row["password"]==$_POST['password']){
                echo "成功登入". "<br>";
                echo "id: " . $row["id"] . "<br>";
                echo "password:" . $row["password"];
                header('location: update_schedule.php');
                break;
            }echo "錯了啦";

        }

    } else {
        echo "0 results";
    }


}


/*if(isset($_POST['submit'])){
    $sql="select * from `paitent_base` where id=$_POST[id]";
    $result=mysqli_query($link,$sql);
    echo $result;
    if(empty($sql)){
        echo '請重新輸入身份證字號';
    }else{
        $sql2="select ic_card_number from `paitent_base` where id=$_POST[id]";

    }
}*/

/*if(isset($_POST['submit'])){
    $sql="select * from `paitent_base` where id=$_POST[id] and id=$_POST[ic_card_number]";
    $result = mysqli_query($link,"select * from `paitent_base` where id=$_POST[id] and id=$_POST[ic_card_number]");
    if($result){
        $num = mysqli_num_rows($result);
        echo $num;
        if($num){
            $_session['is_login'] = true;
            echo $_session['is_login'];
            header("Location: write_patient.php");
        }else {

            $_session['id_login'] = false;
            $_session['msg'] = '登入失敗請確認帳號密碼';
            echo $_session['msg'];
            header('location: login.php');
        }
    }
}*/



?>
</body>
</html>