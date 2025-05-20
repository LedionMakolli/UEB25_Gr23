<?php

require_once("custom_error_handler.php");

$servername = "localhost";
$username = "root";
$password = "";  
$dbname = "projekti_web";  

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    throw new Exception("Lidhja me MySQL dështoi: " . mysqli_connect_error());
} 

?>
