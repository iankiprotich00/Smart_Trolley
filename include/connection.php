<?php
require_once("constants.php");
//start connection


$servername = "localhost";
$username = "root";
$password = "";
$database = "supermarket";

//creating connection

$connect = mysqli_connect($servername, $username, $password, $database);

if(!$connect){

    die("Connection Failed: " . mysqli_connect_error());
}

?>