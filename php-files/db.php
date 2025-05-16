<?php
$servername = "localhost";
$username = "root";
$password = "";  
$dbname = "projekti_web";  

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    echo ("Lidhja me MySQL dështoi: " . $conn->connect_error);
} 
// else {
//     echo "Lidhja me MySQL u krye me sukses në portin 3306!";
// }

// $conn->close();
?>
