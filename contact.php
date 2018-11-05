<?php 
  $connect = mysql_connect("localhost", "root", "") or die ("Server not found!");
  mysql_select_db("final", $connect) or die("Database not found!");
  mysql_query("SET NAMES 'utf8'");

  $name = "";
  $email = "";
  $phone = "";
  $num_member = "";
  $content = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["name"])) { $name = $_POST['name']; }
    if(isset($_POST["email"])) { $email = $_POST['email']; }
    if(isset($_POST["phone"])) { $phone = $_POST['phone']; }
    if(isset($_POST["num_member"])) { $num_member = $_POST['num_member']; }
    if(isset($_POST["content"])) { $content = $_POST['content']; }
    
    if ($content!="") {
        $query_insert = mysql_query("INSERT INTO contact (name, email, phone, num_member, content) VALUES ('$name', '$email', '$phone', '$num_member', '$content')", $connect);
    } 
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Liên hệ</title>
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

	<section id="contact">
		<div class="section-content">
			<h1 class="section-header">Liên lạc <span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s"> Với Chúng Tôi</span></h1>
		</div>
		<div class="contact-section">
		<div class="container">
			<form action="contact.php" method="POST">
				<div class="col-md-6 form-line">
		  			<div class="form-group">
		  				<label for="exampleInputUsername">Họ và tên</label>
				    	<input type="text" class="form-control" name="name" placeholder=" Nhập tên">
			  		</div>
			  		<div class="form-group">
				    	<label for="exampleInputEmail">Địa chỉ email</label>
				    	<input type="email" class="form-control" id="exampleInputEmail" name="email" placeholder=" Nhập email">
				  	</div>	
				  	<div class="form-group">
				    	<label for="telephone">Số điện thoại</label>
				    	<input type="tel" class="form-control" id="telephone" name="phone" placeholder=" Nhập số điện thoại">
		  			</div>
		  		</div>
		  		<div class="col-md-6">
		  			<div class="form-group">
		  				<label for ="description">Nội dung</label>
		  			 	<textarea  class="form-control" id="description" name="content" placeholder="Bạn muốn nói gì?"></textarea>
		  			</div>
		  			<div>

		  				<button type="button" class="btn btn-md btn-danger pull-right"><i class="fa fa-paper-plane" aria-hidden="true"></i>Đồng ý gửi</button>
		  			</div>
		  			
				</div>
			</form>
		</div>
	</section>

	
	
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