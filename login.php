<?php
  session_start(); //khởi tạo session
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css4/bootstrap.min.css">
  <link rel="stylesheet" href="css3/bootstrap.min.css">
  <!-- <link href="css/font-awesome.min.css" rel="stylesheet"> -->
  <link href="css/font-family.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <script src="js3/jquery.min.js"></script>
  <script src="js3/bootstrap.min.js"></script>
  <script src="js3/popper.min.js"></script>
  <script src="js4/bootstrap.min.js"></script>
</head>
   <body>

    <?php
      $conn = mysql_connect("localhost", "root", "") or die ("Không thể kết nối đến cơ sở dữ liệu");
      mysql_select_db("final", $conn);
      // Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
      if (isset($_POST["btn_submit"])) {
        // lấy thông tin người dùng
        $username = $_POST["user"];
        $password = $_POST["pass"];
        //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
        //mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
        $username = strip_tags($username);
        $username = addslashes($username);
        $password = strip_tags($password);
        $password = addslashes($password);
        if ($username == "" || $password =="") {
          
        }else{
          $sql = "select * from admin where username = '$username' and password = '$password' ";
          $query = mysql_query($sql, $conn);
          $num_rows = mysql_num_rows($query);
          if ($num_rows==0) {
            
          }else{
            //tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
            $_SESSION['username'] = $username;
            // Thực thi hành động sau khi lưu thông tin vào session
            // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
            header('Location: admin/cate_list.php');
          }
        }
      }
    ?>

    <div class="container-fluid">
    <div class="row-fluid" >
     <div class="col-md-offset-4 col-md-4" id="box">
      <h2><b>ĐĂNG NHẬP</b></h2>
      <hr>
      <form class="form-horizontal" action="login.php" method="POST" id="contact_form">
          <fieldset>
            <div class="form-group">
              <div class="col-md-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input name="user" placeholder="Tài khoản" class="form-control" type="text">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  <input name="pass" placeholder="Mật khẩu" class="form-control" type="password">
                </div>
              </div>
            </div>       
            <div class="form-group">
              <div class="col-md-12">
                  <button type="submit" class="btn btn-md btn-danger pull-right" name="btn_submit">Đăng nhập </button>
              </div>
            </div>
          </fieldset>
        </form>
    </div> 
  </div>
</body>
</html>
