<?php
// fetch_product_info.php

require_once("include/connection.php");

if (isset($_POST['productId'])) {
    $productId = $_POST['productId'];

    // Retrieve product information from the database
    $query = "SELECT * FROM product WHERE product_id = '$productId'";
    $result = $connect->query($query);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();

        $productName = $product['product_name'];
        $price = $product['cost_price'];

        // Prepare the HTML table to display the product information
        $html = "<table>";
        $html .= "<tr><td>Product ID:</td><td>$productId</td></tr>";
        $html .= "<tr><td>Product Name:</td><td>$productName</td></tr>";
        $html .= "<tr><td>Price:</td><td>Ksh. $price</td></tr>";
        $html .= "</table>";

        echo $html;
    } else {
        echo "Product not found.";
    }
} else {
    echo "Invalid request.";
}
?>
