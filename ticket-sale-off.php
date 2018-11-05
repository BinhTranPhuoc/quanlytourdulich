<!DOCTYPE html>
<html>
<head>
	<title>Vé Khuyến Mãi</title>
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
	<div class="page_title">
		<img src="images/banners/ngam-hoa-anh-dao-detail.JPG" alt="responsive image">
	</div>

	<div class="container text-center">
		<div class="row">
			<div class="col-xs-12">
		      <div class="sectionTitle">
		        <h2><span>CÁC TOUR KHUYẾN MÃI</span></h2>
		        <p>MẬU TUẤT - ĐONG ĐẦY CẢM XÚC</p>
		      </div>
	    	</div>
	    	
	    	<!-- include tour list khuyen mai-->
            <?php include('components/tour-sale-off.php') ?>
	    </div>
	    <div id="paging-navbar clearfix">
			    <div class="col-md-12">
			        <ul class="pagination">
			          <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
			          <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
			          <li><a href="#">2</a></li>
			          <li>
			            <a href="#" aria-label="Next">
			              <span aria-hidden="true">&raquo;</span>
			            </a>
			          </li>
			        </ul>
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