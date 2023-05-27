<?php 
session_start(); 
require_once("include/connection.php");

// If redirected from login.php
if(isset($_POST['username'])){
    $user = $_POST['username'];
    $pass = md5($_POST['password']);
    // Check
    $login = $connect->query("SELECT * FROM login
                              WHERE username = '{$user}' AND password = '{$pass}'");
    $login = $login->num_row;
    if($login = 1){
        $emp_array = $login->fetch_assoc;
        $_SESSION['username'] = $user;
        $_SESSION['emp_id'] = $emp_array['id'];
        $_SESSION['user_id'] = $emp_array['id'];
        
        $_SESSION['transaction']=0;
        if($emp_array['admin']==1) $_SESSION['admin']=1;
        if($emp_array['admin']==2) $_SESSION['admin']=2;
    }
    else{
        $temp=1;
    }
    if(isset($_SESSION['username']))
    header("Location: index.php");
}	
?>

<html>
<head>
    <title>Smart Trolley</title>        
    <link rel="stylesheet" type="text/css" href="css/outline.css" />
    <link rel="stylesheet" type="text/css" href="css/menu.css" />	
    <link rel="stylesheet" type="text/css" href="css/login.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/design.js"></script>
    <script type="text/javascript" src="js/validate.js"></script>
</head>

<body>
<div class="container">
    <div id="body">
        <div align="center">
            <a href='index.php'><img src="images/cart-icon-10.png" width="105" height="105" alt='Logo' /></a>
            <?php include_once("include/left_content.php"); ?>
        </div>
        <div class="mcontent">
            <div align="center">
                <strong>Login<br></strong>
                <div id="data">
                    <div align="center">
                        <?php if(isset($_SESSION['username'])){
                            echo "You are logged in."; 
                        } else{
                            if(isset($temp)) echo"Incorrect Username or Password";
                            echo "<form method='post' action='login.php'>
                                    <table>
                                        <tr>
                                            <td style='padding:10px'>Username:</td>
                                            <td style='padding:10px'><input type='text' name='username' placeholder='Username' /></td>
                                        </tr>
                                        <tr>
                                            <td style='padding:10px'>Password:</td>
                                            <td style='padding:10px'><input type='password' name='password' placeholder='Password' /></td>
                                        </tr>
                                        <tr>
                                            <td colspan='2' style='padding:5px;'><input type='submit' value='Login' /></td>
                                        </tr>
                                    </table>
                                  </form>";
                        } ?>
                    </div>
                </div>
            </div>
        </div>
        <div align="center"><!-- body ends -->
        </div>
        <?php 
            // require_once("include/footer.php");
        ?>
    </div>
</div>
</body>
</html>
