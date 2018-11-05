<?php  
    $connect = mysql_connect("localhost", "root", "") or die ("Server not found!");
    mysql_select_db("final", $connect) or die("Database not found!");
    mysql_query("SET NAMES 'utf8'");
    
    $id_user = $_GET["id_user"]; 
    $name = "";
    $email = "";
    $phone = "";
    $num_member = "";
    $date_start = "";
    $request = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["name"])) { $name = $_POST['name']; }
        if(isset($_POST["email"])) { $email = $_POST['email']; }
        if(isset($_POST["phone"])) { $phone = $_POST['phone']; }
        if(isset($_POST["num_member"])) { $num_member = $_POST['num_member']; }
        if(isset($_POST["date_start"])) { $date_start = $_POST['date_start']; }
        if(isset($_POST["request"])) { $request = $_POST['request']; }
        if(isset($_POST["id_tour"])) { $id_tour = $_POST['id_tour']; }

        if ($name != "" && $email != "" && $phone != "" && $num_member != "" && $date_start != "" && $request != "") {

            $query = mysql_query("UPDATE book_tour SET name='$name', email='$email', phone='$phone', num_member='$num_member', date_start='$date_start', request='$request', id_tour='$id_tour' WHERE id_user='$id_user'", $connect);

            if ($query) {
                header("location: user_list.php");
            }
        }
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Quản trị viên">
    <meta name="author" content="">
    <title>Quản trị viên</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/webproject/index.php">Trang chủ</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Cài đặt</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="cate_list.php"><i class="fa fa-dashboard fa-fw"></i> Quản lý tour</a>
                        </li>
                        <li>
                            <a href="user_list.php"><i class="fa fa-users fa-fw"></i> Người dùng</a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="cate_add.php"><i class="fa fa-users fa-fw"></i> Thêm tour</a>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">USER
                            <small>Sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="user_edit.php?id_user=<?php echo $id_user ?>" method="POST">
                            <div class="form-group">
                                <input class="form-control" name="id_user" disabled value="<?php echo $id_user ?>" />
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="name" placeholder="Tên" />
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="email" placeholder="Email" />
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="phone" placeholder="Số điện thoại" />
                            </div>
                            <div class="form-group">
                                <label>Số thành viên</label>
                                <select class="form-control" name="num_member">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="date_start" placeholder="Khởi hành" />
                            </div>
                            <div class="form-group">
                                <label>Yêu cầu</label>
                                <textarea class="form-control" name="request" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label>ID_Tour</label>
                                <?php  
                                    $query_select = mysql_query("select id from tour", $connect);
                                    echo '<select class="form-control" name="id_tour">';
                                    while ($row = mysql_fetch_array($query_select, MYSQL_BOTH)) {
                                        echo '<option value='.$row['id'].'>'.$row['id'].'</option>';
                                    }
                                    echo '</select>';
                                ?>
                            </div>
                            <button type="submit" class="btn btn-default">Cập nhật</button>
                            <button type="reset" class="btn btn-default">Đặt lại</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    </div>
</body>

</html>
