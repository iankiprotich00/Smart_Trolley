<?php 
	require_once("include/header.php");
?>
<link rel="stylesheet" type="text/css" href="css/adddept.css" />
<div id="body">
	<?php include_once("include/left_content.php"); ?>
    <div class="rcontent">
        <h1><span>Add Department:</span></h1>
        <div id="data">To view list of departments <a style="text-decoration:none" href="viewlist.php?list=dept">Click Here</a><br /><br />
        <?php 
			if(isset($_GET['success'])){
				$result=$connect->query("INSERT INTO department VALUES('{$_POST['mid']}',NULL,'{$_POST['dname']}','{$_POST['doj']}')");
				if(!$result)echo "Addition not successful";
	   			else echo"Addition of Department data successful";
			}
			else{
				$time = date("Y-m-d");
				echo "<form method='post' action='adddept.php?success=1'>
					  <table>
					    <tr><td style='padding:5px'>Dept Name: </td><td><input name='dname' type='text' /></td></tr>
						<tr><td style='padding:5px'>Manager: </td>
						<td><select name='mid'><option value='NULL'>NULL</option>";
				$manager_set = $connect->query("select id, first_name, last_name from employee where admin='1' and dept_id='0'");
				while($row = $manager_set->fetch_array())
					echo "<option value='{$row['id']}'>{$row['first_name']}&nbsp;{$row['last_name']}</option>";
				echo"</select></td>
						</tr>						
						<tr><td style='padding:5px' colspan='2'><input type='hidden' name='doj' value='{$time}' />
							<input type='submit' value='submit' /></td></tr>
					  </table></form>";
			} 
			?>
        </div>
    </div>
</div>
<!-- body ends -->
<?php 
	require_once("include/footer.php");
?>