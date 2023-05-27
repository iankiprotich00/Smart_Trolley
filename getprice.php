<?php
require_once("include/connection.php");
	if(isset($_GET['pid'])){
		$plist = $connect->query("SELECT product_name, cost_price, quantity FROM product WHERE product_id='{$_GET['pid']}'");
		while($row = $plist->fetch_array()){
			echo $row['product_name'] . $row['cost_price'] . $row['quantity'];
		}
	}
	else if(isset($_GET['pname'])){
		$pname = mysqli_real_escape_string($connect, $_GET['pname']);
		$plist = $connect->query("SELECT product_id, cost_price, quantity FROM product WHERE product_name='{$pname}'");
		while($row = $plist->fetch_array()){
			echo $row['product_id'] . $row['cost_price'] . $row['quantity'];
		}
	}
?>



