<?php  
	$connect = mysql_connect("localhost", "root", "") or die ("Server not found!");
    mysql_select_db("final", $connect) or die("Database not found!");
    mysql_query("SET NAMES 'utf8'");
    $id = $_GET['id'];

    $query = mysql_query("delete from tour where id = '$id'", $connect);

    if ($query) {
    	header('location: cate_list.php');
    } else {
    	header('location: cate_list.php');
    }
?>