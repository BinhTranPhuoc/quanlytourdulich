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
                        </li>
                        <li>
                            <a href="cate_add.php"><i class="fa fa-users fa-fw"></i> Thêm tour</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-8">
                            <h1 class="page-header">TOUR
                                <small>Danh sách</small>
                            </h1>
                        </div>
                        <div class="col-lg-4">
                            <form action="cate_search.php" method="POST">
                                <div class="input-group" style="margin-top: 50px;"> 
                                    <input type="text" name="key_search" class="form-control" placeholder="Nhập id tour cần tìm...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>                           
                                </div>
                            </form>
                        </div> 
                    </div>

                    <!-- /.col-lg-12 -->
                    
                    <?php 
                        $connect = mysql_connect("localhost", "root", "") or die ("Server not found!");
                        mysql_select_db("final", $connect) or die("Database not found!");
                        mysql_query("SET NAMES 'utf8'");
                        $key_search = "";

                        echo '<table class="table table-striped table-bordered table-hover" id="dataTables-example">';
                        echo '<thead>
                                <tr align="center">
                                    <th>ID</th>
                                    <th>Tiêu đề</th>
                                    <th>Hành trình</th>
                                    <th>Khởi hành</th>
                                    <th>Giá</th>
                                    <th>Nội dung</th>
                                    <th>Ngày đăng</th>
                                    <th>Giá mới</th>
                                    <th>Áp dụng vào</th>
                                    <th>Xóa</th>
                                    <th>Sửa</th>
                                </tr>
                            </thead>';

					    if ($_SERVER["REQUEST_METHOD"] == "POST") {
					    	if(isset($_POST["key_search"])) { $key_search = $_POST['key_search']; }
					    	$query = mysql_query("select * from tour where id = '$key_search'", $connect);
					    	$row = mysql_fetch_array($query);
					    	if ($query) {					    	
	                            echo '
	                                <tbody>
	                                    <tr class="odd gradeX" align="center">
	                                        <td>'.$row['id'].'</td>
	                                        <td>'.$row['title'].'</td>
	                                        <td>'.$row['journey'].'</td>
	                                        <td>'.$row['start_time'].'</td>
	                                        <td>'.$row['price'].'</td>
	                                        <td>'.$row['content'].'</td>
	                                        <td>'.$row['post_at'].'</td>
	                                        <td>'.$row['new_price'].'</td>
	                                        <td>'.$row['apply_for'].'</td>
	                                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="cate_delete.php?id='.$row['id'].'"> Xóa</a></td>
	                                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="cate_edit.php?id='.$row['id'].'"> Sửa</a></td>
	                                    </tr>
	                                </tbody>';
					    	}
					    }
                        
                        echo '</table>';
                    ?>
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
