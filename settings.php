<?php 
	require_once("include/functions.php");
	require_once("include/header.php");
?>
<link rel="stylesheet" type="text/css" href="css/settings.css" />
<div id="body">
	<?php include_once("include/left_content.php") ?>
    <div class="rcontent">
    	<h1><span>Settings:</span></h1>
        <div id='contentbox'><div id="data">
        <?php
			//perform query
			$emp = $connect->query("SELECT * FROM login
								WHERE id ='{$_SESSION['user_id']}'");
			$result = $emp->fetch_array();

		if(isset($_POST['submit'])) {
				$result = $connect->query("SELECT password FROM login WHERE id='{$_SESSION['emp_id']}'")->fetch_assoc();
			
				if($result['password']==md5($_POST['old_pass']) && $_POST['new_pass'] == $_POST['new_pass_confirm']) {
					$success = $connect->query("UPDATE login SET password = md5('{$_POST['new_pass']}') WHERE id = '{$_SESSION['emp_id']}' ");
			
					if($success) {
						echo "Password changed successfully.<br />";
				} else {
					echo "Password changing failed. Please <a href='settings.php?change_pass=1'>retry</a>";
				}
			}
			else{	
				echo "Change your password.";
				echo "<form method='post' action='settings.php?change_pass=1&up_pass=1'>
					  <table>
					  <tr><td>Old Password:</td><td><input type='password' name='old_pass' /></td></tr>
					  <tr><td>New password:</td><td><input type='password' name='new_pass' /></td></tr>
					  <tr><td>Re-type password:</td><td><input type='password' name='new_pass_confirm' /></td></tr>
					  <tr><td colspan='2'><input type='submit' value='update' /></td></tr></table></form>";
			}
		}
			elseif(isset($_GET['del_acc'])==1){
				if(isset($_GET['del_confirm'])==1){
					echo $_SESSION['emp_id']." <br />";
					  $success = mysql_query("DELETE FROM login
											 WHERE id='{$_SESSION['emp_id']}'");
					if($success) {
						echo "Deletion Successful";
						session_destroy();
						header("Location: login.php");
					}
					else echo "Deletion Unsuccessful";
				}
				else{
				echo "Are you sure you want to delete your account?
					  <a href='settings.php?del_acc=1&del_confirm=1'><button>Yes</button></a>&nbsp;
					  <a href='settings.php'><button>No</button></a>";
				}
			}
			elseif(isset($_GET['del_other_acc'])==1 && $_SESSION["admin"]==1){
				if(isset($_GET['del_confirm'])==1){
					  $success= $connect->query("DELETE FROM login
											 WHERE id='{$_GET['id']}'");
					if($success) {
						echo "Deletion Successful of Employee ID {$_GET['id']}";
					}
					else echo "Deletion Unsuccessful";
				}
				else{
				echo" Delete one of the following accounts";
				echo "<table border='1'><tr><th>Employee ID</th><th>Username</th><th>Delete</th></tr>";
				$emp_data = $connect->query("SELECT * FROM login");
				while($emp_list = $emp_data->fetch_array()){
					echo "<tr><td>{$emp_list['id']}<td>{$emp_list['username']}</td>";
					echo "<td><a href='settings.php?del_other_acc=1&del_confirm=1&id={$emp_list['id']}'>Delete</a></td></tr>";
				}
				echo "</table>";
			}
			}
				//settinngs menu
			else{
				if(isset($result["admin"])){
				if($result["admin"]==0){
				  echo $result["username"] . " is not an admin<br />";
				  echo "<a href='settings.php?change_pass=1' >Change Password</a><br /><a href='settings.php?del_acc=1' >Delete account</a><br />";
				}
				else{
				  echo $result["username"]." is an admin<br />";
				  echo "<a href='settings.php?change_pass=1' >Change Password</a><br /><a href='settings.php?del_acc=1' >Delete account</a><br />";
				  echo "<a href='settings.php?del_other_acc=1' >Delete other accounts</a><br />";
				}
			  }
			}
		?>
        </div>
        </div>
    </div>
</div>
<!-- body ends -->
<?php 
	require_once("include/footer.php");
?>