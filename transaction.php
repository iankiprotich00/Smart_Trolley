<?php
session_start();
require_once("include/connection.php");

// Check login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Fetch product info
if (isset($_POST['prodid'])) {
    $productId = $_POST['prodid'];

    // Retrieve product information from the database
    $query = "SELECT * FROM products WHERE product_id = '$productId'";
    $result = $connect->query($query);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();

        $productName = $product['product_name'];
        $price = $product['cost_price'];

        // Set the fetched price in the JavaScript variable to update the UI
        echo "<script>document.getElementById('itemPrice').textContent = '$price';</script>";
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Supermarket Backend</title>
    <link rel="stylesheet" type="text/css" href="css/outline.css" />
    <link rel="stylesheet" type="text/css" href="css/menu.css" />
    <link rel="stylesheet" type="text/css" href="css/transaction.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/design.js"></script>
    <script type="text/javascript" src="js/validate.js"></script>
</head>

<body onload="addData()">
    <div class="container">
        <div class="header">
            <a href='index.php'><img src="images/cart-icon-10.png" width="80" height="80" alt='Logo' /></a>
            <span class="right">
                <?php
                if (isset($_SESSION['username'])) {
                    echo "<a href='logout.php'>Logout</a>";
                } else {
                    echo "<a href='login.php'>Log In</a>";
                }
                ?>|
                <a href="mydetails.php">
                    <strong><?php echo $_SESSION['username'] ?></strong>
                </a>
            </span>
            <div class="clr"></div>
        </div>
        <div id="body">
            <?php include_once("include/left_content.php"); ?>
            <div class="rcontent">
                <h1><span>Transaction</span></h1>
                <div id="data">
                    <?php
                    if (isset($_POST['cancel'])) {
                        $connect->query("TRUNCATE TABLE transaction");
                    }
                    ?>
                    <span id="transalert"></span>
                    <form action="sell.php" method="post">
                        <table border="0" style="width:100%">
                            <tr>
                                <td style="vertical-align:top; padding:10px; width:40%">
                                    <table style="margin-left:auto; margin-right:auto">
                                        <tr>
                                            <td>Product ID:</td>
                                            <td>
                                                <input type="text" id='prodid' name="prodid" onChange="pidChange(id,this.value)" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Product Name:</td>
                                            <td>
                                                <input type="text" id='prodname' onchange='pnameChange(name,this.value)' name="prodname" />
                                            </td>
                                        </tr>
                                        <!-- ... -->
                                        <!-- ... -->
                                        <tr>
                                            <td style="display: none;">Quantity:</td>
                                            <td>
                                                <input type="text" id='quantity' name="quantity" size="6" style="display: none;" />
                                                <span id='quantityDisp'></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="display: none;">Price:</td>
                                            <td style="display: none;">Ksh.&nbsp;<span id="itemPrice">0</span></td>
                                        </tr>
                                        <!-- ... -->

                                        <tr>
                                            <td colspan="2" style="float:right">
                                                <input type="button" id='add' value="add" onClick="transadd()" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>PromoCode:</td>
                                            <td>
                                                <input type="text" id='discount' name="discount" size="6" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Customer Id:</td>
                                            <td>
                                                <input type="text" id='cid' name="cid" size="6" placeholder="0 for Guest" />
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="vertical-align:top; padding:20px; width:100%">
                                    <span id="transtable" style="overflow:auto">
                                        <?php
                                        if ($_SESSION['transaction'] == 0) {
                                            echo "No Items added yet.";
                                        } else if ($_SESSION['transaction'] == 1) {
                                            echo "<script type='text/javascript'>addData()</script>";
                                        }
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="submit" onclick="validate()" value="Pay & Print" />
                                </td>
                                <td>
                                    <form action="transaction.php" method="post">
                                        <input type="submit" value="cancel" name="cancel" />
                                    </form>
                                </td>
                            </tr>
                        </table>
                        <div class="clear" style="clear:both"></div><br /><br />
                    </form>
                </div>
            </div>
        </div>

        <!-- body ends -->
        <?php
        require_once("include/footer.php");
        ?>
