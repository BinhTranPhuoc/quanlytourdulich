<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <link rel="stylesheet" href="css4/bootstrap.min.css">
    <link rel="stylesheet" href="css3/bootstrap.min.css">
	  <!-- <link href="css/font-awesome.min.css" rel="stylesheet"> -->
    <link href="css/font-family.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js3/jquery.min.js"></script>
    <script src="js3/bootstrap.min.js"></script>
    <script src="js3/popper.min.js"></script>
    <script src="js4/bootstrap.min.js"></script>
</head>
<body>
	<!-- hearder -->
	<?php include('components/header.php') ?>

	<!-- image -->
	<div class="page-title">
		<img src="<?php echo $row["slide_thumb"] ?>" class="img-fluid" alt="Responsive image">
	</div>

	<!-- content -->
	<div class="container-fluid">
  		<div class="row content">
  			<div class="col-md-8">
  				<h4><small>Chương Trình Tour</small></h4>
		      <hr>
		      <h2 class="title-detail"><b><?php echo $row['title'] ?></b></h2>
		      <i><h5><span class="glyphicon glyphicon-time"></span> <?php echo $row['post_at'] ?></h5></i><br>
		      <i><p class="content"><?php echo $row['content'] ?></p></i>
          <p class="category-detail">Thời gian khởi hành: <?php echo $row['start_time'] ?></p>
          <p class="category-detail">Hành trình di chuyển: <?php echo $row['journey'] ?></p>
          <p class="price-tour">Giá tour: <?php echo $row['price'] ?></p>
		      <br><br>
	
  			</div>
  			<div class="col-md-4">
  				<div class="form_dattour">
  					<div class="title text-center">Đặt Tour</div>
  					<div class="content">
  						<form action="book-tour-success.php?id=<?php echo $row['id'] ?>" method="POST">
  							<div class="form-group">
  								<input id="name" type="text" name="name" class="form-control" placeholder="Họ Tên (*)">
  							</div>
  							<div class="form-group"><input id="" type="text" name="email" class="form-control" placeholder="email (*)" ></div>
  							<div class="form-group">
  								<input id="phone" type="text" name="phone" class="form-control" placeholder="Số điện thoại (*)">
  							</div>
  							<div class="form-group">
  								<select class="form-control" id="sel1" name="num_member">
  									<option value="1">1 người</option>
  									<option value="2">2 người</option>
  									<option value="3">3 người</option>
  									<option value="4">4 người</option>
  									<option value="5">5 người</option>
  									<option value="6">6 người</option>
                    <option value="6">Hơn 6 người</option>
  								</select>
  							</div>
  							<div class="form-group"><input id="date" type="text" class="form-control" name="start_time" placeholder="Ngày đi (*)"></div>
  							<div class="form-group">
  								<textarea class="form-control" rows="3" name="request" placeholder="Yều cầu" cols="50"></textarea>
  							</div>
  							<div class="form-group text-center">
  								<input id="btnorder" class="form-control btn btn-submit" type="submit" name="btn-order" value="Đặt Ngay">
  							</div>
  						</form>

              <?php 
                $id_user = $id;
                $name = "";
                $email = "";
                $phone = "";
                $num_member = "";
                $date_start = "";
                $request = "";
                $id_tour = $id;
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  if(isset($_POST["name"])) { $name = $_POST['name']; }
                  if(isset($_POST["email"])) { $email = $_POST['email']; }
                  if(isset($_POST["phone"])) { $phone = $_POST['phone']; }
                  if(isset($_POST["num_member"])) { $num_member = $_POST['num_member']; }
                  if(isset($_POST["date_start"])) { $date_start = $_POST['date_start']; }
                  if(isset($_POST["request"])) { $request = $_POST['request']; }
                }
                if ($name="" || $emai="" || $phone="" || $num_member="" || $request="") {
                  echo "Vui lòng nhập đầy đủ thông tin có dấu (*)";
                }
                $query_insert = mysql_query("INSERT INTO book_tour (id_user, name, email, phone, num_member, date_start, request, id_tour) VALUES ('$id_user', '$name', '$email', '$phone', '$num_member', '$date_start', '$request', '$id_tour')", $connect);
                if (mysql_query($query_insert, $connect)) {
                    echo "Đặt tour thành công";
                }
              ?>

  					</div>
  				</div>
  			</div>
  		</div>
  	</div>

	<!-- footer -->

	<div class="search-text"> 
       <div class="container">
         <div class="row text-center">
           <div class="form">
               <h4>SIGN UP TO OUR NEWSLETTER</h4>
                <form id="search-form" class="form-search form-horizontal">
                    <input type="text" class="input-search" placeholder="Email">
                    <button type="submit" class="btn-search">SUBMIT</button>
                </form>
            </div>
          </div>       
       </div>  
  	</div>
  	
    <!-- footer -->
  	<?php include('components/footer.php') ?>
</body>
</html>