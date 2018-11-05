<?php  
    $connect = mysql_connect("localhost", "root", "") or die ("Server not found!");
    mysql_select_db("final", $connect) or die("Database not found!");
    mysql_query("SET NAMES 'utf8'");

    $id = $_GET["id"];
    $image = "";
    $title = "";
    $journey = "";
    $start_time = "";
    $price = "";
    $content = "";
    $slide_thumb = "";
    $post_at = "";
    $new_price = "";
    $apply_for = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["image"])) { $image = $_POST['image']; }
        if(isset($_POST["title"])) { $title = $_POST['title']; }
        if(isset($_POST["journey"])) { $journey = $_POST['journey']; }
        if(isset($_POST["start_time"])) { $start_time = $_POST['start_time']; }
        if(isset($_POST["price"])) { $price = $_POST['price']; }
        if(isset($_POST["content"])) { $content = $_POST['content']; }
        if(isset($_POST["slide_thumb"])) { $slide_thumb = $_POST['slide_thumb']; }
        if(isset($_POST["post_at"])) { $post_at = $_POST['post_at']; }
        if(isset($_POST["new_price"])) { $new_price = $_POST['new_price']; }
        if(isset($_POST["apply_for"])) { $apply_for = $_POST['apply_for']; }

        if ($image != "" && $title != "" && $journey != "" && $start_time != "" && $price != "" && $content != "" && $slide_thumb != "" && $post_at != "" && $new_price != "" && $apply_for != "") {

            $query = mysql_query("UPDATE tour SET image='$image', title='$title', journey='$journey', start_time='$start_time', price='$price', content='$content', slide_thumb='$slide_thumb', post_at='$post_at', new_price='$new_price', apply_for='$apply_for' WHERE id='$id'", $connect);

            if ($query) {
                header("location: cate_list.php");
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
                        <li><a href="index.php"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
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
                        </li>
                        <li>
                            <a href="cate_add.php"><i class="fa fa-users fa-fw"></i> Thêm tour</a>
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
                        <h1 class="page-header">TOUR
                            <small>Sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="cate_edit.php?id=<?php echo $id ?>" method="POST">
                            <div class="form-group">
                                <input class="form-control" disabled value="<?php echo $id ?>"/>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="image" placeholder="Đường dẫn ảnh đại diện" />
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="title" placeholder="Tiêu đề" />
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="journey" placeholder="Hành trình" />
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="start_time" placeholder="Thời gian bắt đầu" />
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="price" placeholder="Giá" />
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea class="form-control" name="content" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="slide_thumb" placeholder="Đường dẫn ảnh nền" />
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="post_at" placeholder="Đăng vào" />
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="new_price" placeholder="Giá mới" />
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="apply_for" placeholder="Áp dụng cho" />
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

    </div>
    <!-- /#wrapper -->

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
</body>

</html>
