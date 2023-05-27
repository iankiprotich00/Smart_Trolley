<?php
require_once("include/header.php");
// if(!isset($_POST['cid'])) header("Location: transaction.php");
?>
<link rel="stylesheet" type="text/css" href="css/sell.css" />
<div id="body">
    <?php include_once("include/left_content.php"); ?>
    <div class="rcontent">
        <h1><span>PAYMENT PROCESS:</span></h1>
        <div id="contentbox">
            <?php
            $time = date("Y-m-d");
            $discount = 0;
            //pids
            $pidlist = $connect->query("SELECT pid FROM transaction");
            while ($row = $pidlist->fetch_array())
                $pid[] = $row['pid'];
            $pids = implode(",", $pid);
            //total amount
            $data = $connect->query("SELECT sum(price) FROM transaction");
            $data = $data->fetch_array();
            $totamo = $data['sum(price)'];
            $promo = $_POST['discount'];
            if ($promo != 0) {
                $promolist = $connect->query("SELECT discount,valid_upto FROM promotion WHERE promo_code='{$promo}'");
                if (mysql_num_rows($promolist)) {
                    $promolist = $promolist->fetch_array();
                    $time = date("Y-m-d");
                    $n = date($promolist['valid_upto']);
                    if ($n > $time) {
                        $connect->query("UPDATE promotion SET count=count+1 WHERE promo_code='{$promo}'");
                        echo "Discount " . $promolist['discount'] . "%";
                        $discount = ($totamo * $promolist['discount']) / 100;
                        $totamo = $totamo - ($totamo * $promolist['discount']) / 100;
                    }
                }
            }
            //profit, profit-discount error
            $profit = 0;
            $data = $connect->query("select pid,quantity from transaction");
            while ($row = $data->fetch_array()) {
                $temp = $connect->query("select cost_price,market_price,quantity, product_name from product where product_id='{$row['pid']}'");
                $temp = $temp->fetch_array();
                if ($row['quantity'] > $temp['quantity'] || $row['quantity'] <= 0) {
                    echo "<script>if(alert('Quantity of {$temp['product_name']} is wrong'))</script>";
                    $flag = 0;
                } else $flag = 1;
                $profit += $row['quantity'] * ($temp['cost_price'] - $temp['market_price']);
            }
            $profit -= $discount;
            if ($flag == 1) {
                $cid = $_POST['cid'];
                if ($cid != 0) {
                    $clist = $connect->query("select first_name, last_name,cmoney_spent from customer where cid='{$cid}'");
                    $clist = $clist->fetch_array($clist);
                    echo "Hello " . $clist['first_name'] . " " . $clist['last_name'] . " your previous balance is KShs. " . $clist['cmoney_spent'] . "<br />";
                    $connect->query("update customer set cmoney_spent=cmoney_spent+'{$totamo}' where cid='{$cid}'");
                    echo "New balance: KShs. ";
                    echo $clist['cmoney_spent'] + $totamo;
                }

                $result = $connect->query("insert into buy values(NULL,'{$time}','{$pids}',$totamo,$profit,$cid)");
                if (!$result) echo "Error in transaction. Please <a href='transaction.php'>retry</a>";
                else {
                    echo "<div id='data'><br />The total amount for your purchases is:<br />KSHs. {$totamo}";

                    // Generate QR Code
                    require_once('qrlib.php');
                    $text = "Total Amount: KSHs. {$totamo}";
                    $qrCodePath = "qrcodes/qr_code.png";
                    QRcode::png($text, $qrCodePath, QR_ECLEVEL_L, 10);

                    // Display QR Code
                    echo "<br /><br />Scan the QR code below to make the payment:<br />";
                    echo "<img src='{$qrCodePath}' alt='QR Code' /><br />";

                    // Lessen the quantity
                    $data = $connect->query("select pid,quantity from transaction");
                    while ($row = $data->fetch_array()) {
                        $temp = $connect->query("update product set quantity = quantity-'{$row['quantity']}' where product_id='{$row['pid']}'");
                    }
                    $connect->query("truncate table transaction");
                }
            } else echo "Error with quantity values please check again... <a href='transaction.php'>Go Back</a>";
            ?>
        </div>
    </div>
</div>
<!-- body ends -->
<?php
require_once("include/footer.php");
?>
