<?php 

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['submit'])){
$firstname = trim($_POST["first-name"]);
$regexName = "/^[a-zA-ZçëÇË\s\-']{2,}$/u";

if(!preg_match($regexName, $firstname)){
  echo"<script>alert('Emri nuk eshte i vlefshem')</script>";
 
} 

$lastname =trim( $_POST["last-name"]);

if(!preg_match($regexName, $lastname)){
  echo"<script>alert('Mbiemri nuk eshte i vlefshem!')</script>";

}

$email = trim($_POST["email"]);
$email = str_replace(" ", "", $email); 
$emailRegex= "/^[a-zA-Z0-9.%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";

if(!preg_match($emailRegex, $email)){
  echo"<script>alert('Emaili nuk eshte i vlefshem!')</script>";
}

$cardName=trim($_POST["account-number"]);
$cardNameRegex = "/^([0-9]{4}\-){3}[0-9]{4}$/";

if(!preg_match($cardNameRegex, $cardName)){
  echo "<script>alert('Numri i gjirollogarise nuk eshte i vlefshem')</script>";
 } else {
  $cleanCardNumber = str_replace("-", "", $cardName);
}

$expiryDate = trim($_POST["expiry-date"]);
$expiryDateRegex= "/^(0[1-9]|1[0-2])\/[0-9]{2}$/";

if (preg_match($expiryDateRegex, $expiryDate)) {
    [$month, $year] = explode("/", $expiryDate);

    $currentYear = date("y");
    $currentMonth = date("m");

    if ($year < $currentYear || ($year == $currentYear && $month < $currentMonth)) {
        echo "<script>alert('Kjo datë ka skaduar.')</script>";
    }
} else {
    echo "<script>alert('Formati i datës nuk është i saktë.')</script>";
}
}


?>
