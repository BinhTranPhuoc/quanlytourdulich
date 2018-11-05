<?php
	$connect = mysql_connect("localhost", "root", "") or die ("Server not found!");
	mysql_select_db("final", $connect) or die("Database not found!");
	mysql_query("SET NAMES 'utf8'");
	$query = mysql_query("select * from slide", $connect);

	while ($row = mysql_fetch_array($query)) {
		if ($row['id'] == 1) {?> 
			<div class="item active">
		        <img src="<?php echo $row["image"] ?>">    
		    </div>
		<?php } else { ?>
			<div class="item">
		        <img src="<?php echo $row["image"] ?>">    
		    </div>
		<?php }	
	 }
?>