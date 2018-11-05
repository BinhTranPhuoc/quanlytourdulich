<?php  
	$connect = mysql_connect("localhost", "root", "") or die ("Server not found!");
    mysql_select_db("final", $connect) or die("Database not found!");
    mysql_query("SET NAMES 'utf8'");
    $id_user = $_GET['id_user'];

    $query = mysql_query("delete from book_tour where id_user = '$id_user'", $connect);

    if ($query) {
    	header('location: user_list.php');
    } else {
    	header('location: user_list.php');
    }
?>