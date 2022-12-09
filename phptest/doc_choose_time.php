<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>醫生傳送連結-選擇時段</title>
    <style>
        header{height: 100px;background-color: #f7ebe7;text-align: center;line-height: 100px;}
        nav{height: 20px; border: solid #f4f1bb;background-color:#f4f1bb;}
        main{width: 100%;height: inherit;text-align: left;}
        div{display: flex;justify-content: space-around;}
        span{position: relative;margin: 2%;line-height: 100px;}
        table{display: flex;justify-content:center; text-align: center; }

    </style>

</head>
<body>
<header><h1>你好</h1></header>

<main>

    <form method="post" action="send_link.php">
        <label>選擇時間:
            <input type="date" name="date" >
        </label>
        <label for="period">時段:</label><br>
        <label><input name="period" type="radio" value="早">早</label>
        <label><input name="period" type="radio" value="午">午</label>
        <label><input name="period" type="radio" value="晚">晚</label>
        <input name="submit" type="submit" value="確定選擇">
    </form>
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


?>
</body>
</html>
