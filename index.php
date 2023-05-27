<?php 
	require_once("include/header.php");
?>
<link rel="stylesheet" type="text/css" href="css/index.css" />
<div id="body">
	<?php include_once("include/left_content.php"); ?>
    <div class="rcontent">
      <h1><span> Hello<?php echo" ".ucfirst($_SESSION['username']) ?></span></h1>
        <div id="contentbox">
            <div id="data">Stats:<br />
            <?php
			$query = $connect->query("select sum(total_amount),sum(profit) from buy");
			$moneylist=$query->fetch_array();
			   echo"<b>Earnings</b><br />
					
					Overall Earnings: Ksh. {$moneylist['sum(total_amount)']}<br /><br />
					<b>Profits</b><br />
					
					Overall Profits: Ksh. {$moneylist['sum(profit)']}<br /><br />";
			?>
            </div>
        </div>
    </div>
</div>
<?php 
	require_once("include/footer.php");
?>