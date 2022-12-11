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
      <title>確認基本</title>
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
      <!-- fancy box js -->
      <link rel="stylesheet" href="css/jquery.fancybox.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>

   <body class="inner_page tables_page">
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
               <!-- end top_bar -->
               <!-- dashboard inner -->
               <div class="middle_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>填入您的資料</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row">
                        <!-- table section -->
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>基本資料</h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table">
                                       <form id="basic" method="post" action="write_patient(1).php" >
                                          <section class="first">
                                              <label for="identity">身分證字號:</label>
                                              <input id="identity" name="id" required="required">
                                          </section><br>
                                          <section class="first">
                                              <label for="name">姓名:</label>
                                              <label><input id="name" name="name"  required="required"></label>
                                          </section><br>
                                          <section class="first">
                                              <label for="sex">生理性別:</label>
                                              <label><input name="sex" type="radio" value="男" required="required">男</label>
                                              <label><input name="sex" type="radio" value="女" required="required">女</label>
                                          </section><br>
                                          <section class="first">
                                              <label for="birthday">生日:</label>
                                              <label><input name="birthday" type="date" required="required"></label>
                                          </section><br>
                                          <section class="first">
                                              <label for="blood_type">血型:</label>
                                              <label><input name="blood_type">型</label>
                                          </section><br>
                                          <section class="first">
                                              <label for="id_card_number">健保卡卡號:</label>
                                              <label><input name="ic_card_number" required="required"></label>
                                          </section><br>
                                          <section class="first">
                                              <label for="phone_number">手機號碼:</label>
                                              <label><input name="phone_number" required="required" type="text" maxlength="10" pattern="09\d{8}" placeholder="09xxxxxxxx"></label>
                                          </section><br>
                                          <section class="first">
                                              <label for="address">地址:</label>
                                              <label><input name="address" required="required"></label>
                                          </section><br>
                                          <section class="first">
                                              <label for="height">身高:</label>
                                              <label><input name="height" type="number" >公分</label>
                                          </section><br>
                                          <section class="first">
                                              <label for="weight">體重:</label>
                                              <label><input name="weight" type="number">公斤</label>
                                          </section><br>
                                          <section class="first">
                                              <label for="ice_contact">緊急聯絡人:</label>
                                              <label><input name="ice_contact" required="required"></label>
                                          </section><br>
                                          <section class="first">
                                              <label for="ice_relation">緊急聯絡人關係:</label>
                                              <label><input name="ice_relation" required="required"></label>
                                          </section><br>
                                           <section>
                                               <label for="ice_phone">緊急聯絡人電話:</label>
                                              <label><input name="ice_phone" type="text" required="required" maxlength="10" pattern="09\d{8}" placeholder="09xxxxxxxx"></label>
                                          </section><br>


                                           <input name="submit" type="submit" value="繳交">
                                      </form>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
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
         <!-- model popup -->
         <!-- The Modal -->
         <div class="modal fade" id="myModal">
            <div class="modal-dialog">
               <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                     <h4 class="modal-title">Modal Heading</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                     Modal body..
                  </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
               </div>
            </div>
         </div>
         <!-- end model popup -->
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
          const ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- fancy box js -->
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/jquery.fancybox.min.js"></script>
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

      if(isset($_POST['submit'])) {
          mysqli_query($link, "INSERT INTO `patient_base` (`name`, `id`, `sex`,`birthday`, `blood_type`,
                        `ic_card_number`, `phone_number`, `address`, `height`, `weight`, `ice_contact`, `ice_relation`, `ice_phone`)
values('".$_POST['name']."','".$_POST['id']."','".$_POST['sex']."','".$_POST['birthday']."','".$_POST['blood_type']."',
'".$_POST['ic_card_number']."','".$_POST['phone_number']."','".$_POST['address']."','".$_POST['height']."','".$_POST['weight']."'
,'".$_POST['ice_contact']."','".$_POST['ice_relation']."','".$_POST['ice_phone']."')");

          echo "<script>window.location.href='add_line.php';</script>";
      }


      ob_end_flush();
      ?>
   </body>
</html>