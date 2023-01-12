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
                                            <form id="basic" method="post" action="write_doctor.php" >
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
    $password_hash =password_hash($_POST['password'], PASSWORD_DEFAULT);
    mysqli_query($link, "INSERT INTO doctor_base (doc_name, doc_id,phone_number, email, address, department, password) 
VALUES ('{$_POST['doc_name']}', '{$_POST['doc_id']}', '{$_POST['doc_phone_number']}', '{$_POST['email']}', '{$_POST['doc_address']}', '{$_POST['department']}', '{$password_hash}')");
    echo "資料已經成功新增";
}

?>

</body>
</html>