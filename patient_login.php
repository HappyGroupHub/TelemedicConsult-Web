<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>登入</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
      <!-- calendar file css -->
      <link rel="stylesheet" href="js/semantic.min.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="inner_page login">
      <div class="full_container">
         <div class="container">
            <div class="center verticle_center full_height">
               <div class="login_section">
                  <div class="logo_login">
                     <div class="center">
                        <h1 style="color: white;top: 15px;left: 15px;"><b>   線上掛號系統</b></h1>
                     </div>
                  </div>
                  <div class="login_form">
                     <form method="post" action="patient_login.php">
                        <fieldset>
                           <div class="field">
                              <label class="label_field">身分證字號</label>
                              <input type="text" name="id" placeholder="A123456789">
                           </div>
                           <div class="field">
                              <label class="label_field">健保卡卡號</label>
                              <input type="text" name="ic_card_number" placeholder="000000000000" />
                           </div>

                           <div class="field margin_0">
                              <label class="label_field hidden">hidden label</label>
                              <input class="main_bt" type="submit" name="submit" value="登入">
                           </div>
                           <div class="field first">
                              <label class="label_field hidden">hidden label</label>
                               <a href="settings.html"><input type="button" value="初次使用" class="first_bt" style="float: right;width: 80px;height: 80px; background-color: darkgrey;"></a>
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>

      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
          const ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <?php
      ob_start();

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

      } else {
          echo "不正確連接資料庫" . mysqli_connect_error();
      }
      if(isset($_POST['submit'])) {
          $sql = "SELECT * FROM `patient_base`";
          $result = mysqli_query($link, $sql);
          if (true) {
              while($row = $result->fetch_assoc()) {
                  if($row["id"]==$_POST['id'] && $row["ic_card_number"]==$_POST['ic_card_number']){
                      echo "成功登入". "<br>";
                      echo "id: " . $row["id"] . "<br>";
                      echo "ic_card_number:" . $row["ic_card_number"];
                      header('location: settings.html');
                      break;
                  }
                  }
              }echo "<script> alert('你打錯或是你沒有初診過喔');</script>";

      }

      ob_end_flush();

      ?>
   </body>
</html>