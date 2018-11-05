<?php
  $connect = mysql_connect("localhost", "root", "") or die ("Server not found!");
  mysql_select_db("final", $connect) or die("Database not found!");
  mysql_query("SET NAMES 'utf8'");
  $query = mysql_query("select * from tour", $connect);

  while ($row = mysql_fetch_array($query)) {?> 
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="panel polaroid item_blue">
        <div class="item_img"><img src="<?php echo $row["image"] ?>" class="img-responsive" style="width:100%; height: 210px" alt="image">
        </div>
        <div class="item_content">
          <h4><?php echo $row['title'] ?></h4>
          <div class="content_description">
            <p><strong>Hành trình: </strong><?php echo $row['journey'] ?></p>
            <p><strong>Áp dụng vào: </strong><?php echo $row['apply_for'] ?></p>
            <hr>
          </div>
          <div class="row content_infor">
            <div class="price col-xs-5"><span><?php echo $row['new_price'] ?></span></div>
            <div class="col-xs-7">
              <div class="col-xs-12"><p class="price-new"><?php echo $row['price'] ?></p></div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <?php }
?>

