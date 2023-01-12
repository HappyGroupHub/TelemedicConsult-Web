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
      <title>確認資料</title>
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
   <body class="inner_page profile_page">
      <div class="full_container">
         <div class="inner_container">
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <a href="index.html">
                           <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        </a>
                        <div class="logo_section">
                           <h1 style="color: white;top: 15px;left: 15px;"><b>   線上掛號系統</b></h1>
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                              <ul>
                                 <li><a href="general_elements.html"><i class="fa fa-question-circle"></i></a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>確認您的資料</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row column1">
                        <div class="col-md-8">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>確認資料</h2>
                                 </div>
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <!-- user profile section --> 
                                    <!-- profile image -->
                                    <div class="col-lg-12">
                                       <div class="full dis_flex center_text">
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
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- end row -->
                     </div>
                     <!-- footer -->
                     <div class="container-fluid">
                        <div class="footer">
                           <p>* 溫馨提醒 : 可以在Line上查看看診進度ㄛ</a>
                           </p>
                        </div>
                     </div>
                  </div>
                  <!-- end dashboard inner -->
               </div>
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <!-- calendar file css -->    
      <script src="js/semantic.min.js"></script>
      <?php
      ob_start();
      $config_json = file_get_contents('config.json');
      $decoded_json = json_decode($config_json,false);
      $hostname=$decoded_json->Database->ip_address;
      $database=$decoded_json->Database->db_name;
      $username=$decoded_json->Database->username;
      $password=$decoded_json->Database->password;

      $link = mysqli_connect($hostname, $username, $password, $database);

      if ($link) {
      mysqli_query($link, 'SET NAMES uff8');

      } else {
      echo "不正確連接資料庫" . mysqli_connect_error();
      }


      ob_end_flush();
      ?>
   </body>
</html>