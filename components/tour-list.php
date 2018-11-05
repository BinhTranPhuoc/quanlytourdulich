<?php
  $connect = mysql_connect("localhost", "root", "") or die ("Server not found!");
  mysql_select_db("final", $connect) or die("Database not found!");
  mysql_query("SET NAMES 'utf8'");
  $query = mysql_query("select * from tour", $connect);

  while ($row = mysql_fetch_array($query)) {?> 
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="panel polaroid item_blue">
        <div class="item_img"><img src="<?php echo $row["image"] ?>" class="img-responsive" style="width:100%; height: 210px" alt="image-thumnail">
        </div>
        <div class="item_content">
          <h4><a href="view-detail.php?id=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a></h4>
          <div class="content_description">
            <p><strong>Hành trình: </strong><?php echo $row['journey'] ?></p>
            <p><strong>Khởi hành: </strong><?php echo $row['start_time'] ?></p>
            <div class="voting-stars stars-small">
              <i class="icon-star active-color"></i>
              <i class="icon-star active-color"></i>
              <i class="icon-star active-color"></i>
              <i class="icon-star active-color"></i>
              <i class="icon-star middle-color"></i>
            </div>
          </div>
          <div class="row content_infor">
            <div class="col-xs-7"><p class="price-new"><?php echo $row['price'] ?></p></div>
            <div class="col-xs-5">
              <div class="view-action"><a href="view-detail.php?id=<?php echo $row['id'] ?>" class="btn btn-success">Chi tiết</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <?php }
?>
