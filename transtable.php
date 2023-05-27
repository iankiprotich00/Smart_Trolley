<?php
require_once("include/connection.php");
echo"<script type='text/javascript' src='js/script.js'></script>
<style type='text/css'>
#list{
	width:100%;
}
#list a{
	color:#006b68;
}
#list a:hover{
	color:#006b68;
	text-decoration:underline;
}
#list th,td{
	padding:2px;
	text-align:center;
}

#list tr:nth-child(even){
	background-color: #CCC;
	opacity:0.5;
}
#list tr:nth-child(odd){
}
#list tr:nth-child(1){
	background-color:#006b68;
	opacity:0.5;
	color:#fff;
}
</style>";
if(isset($_GET['id'])){
	$connect->query("delete from transaction where id='{$_GET['id']}'");
}
if(isset($_GET['pid']) & isset($_GET['q'])){
    $pid = $_GET['pid'];
    $quan = $_GET['q'];
	$stmt = $connect->prepare("INSERT INTO transaction ( p_name, pid, price , id) VALUES (?, ?, ?, NULL)");
    if ($plist = $connect->query("SELECT product_name, cost_price, quantity FROM product WHERE product_id='{$pid}'")) {
    if (mysqli_num_rows($plist) > 0) {
        while ($row = $plist->fetch_array()) {
            $pname = $row['product_name'];
            $price = $row['cost_price'];
            $quan = $row['quantity'];
        }
        
        $stmt = $connect->prepare("INSERT INTO transaction (p_name, pid, price, id) VALUES (?, ?, ?, NULL)");
        $stmt->bind_param("sii", $pname, $pid, $price);
        $success = $stmt->execute();
        
        if ($success) {
            echo "Transaction added successfully.";
        } else {
            echo "Transaction failed.";
        }
    } else {
        echo "Product not found.";
    }
} else {
    echo "Error retrieving product information.";
}




	$translist = $connect->query("select * from transaction");
	$transmax = $connect->query("select sum(price) from transaction");
	$transmax = $transmax->fetch_array();
	if ($translist->num_rows) {
		echo "<table id='list' style='width:100%'>
			<tr><th>Product Name</th><th>Quantity</th><th>Price</th><th>Options</th></tr>";
		
		while ($row = $translist->fetch_assoc()) {
			echo "<tr>
				<td>{$row['p_name']}</td>
				<td>{$row['quantity']}</td>
				<td>{$row['price']}</td>
				<td><a href='javascript:delData({$row['id']})'>Delete</a></td>
			</tr>";
		}
		
		echo "</table><table style='width:100%'><tr><td style='float:right'>Total Ksh. {$transmax['sum(price)']}</td></tr></table>";
	} else {
		echo "No items added yet.";
	}
	
}
?>