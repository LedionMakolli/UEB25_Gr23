<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$BILETA_CMIMI = 100;
require_once("db.php");
require_once("custom_error_handler.php");

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['submit'])){
    
    if (!isset($_SESSION['user_id'])) {
     echo "<script>alert('You must be logged in to purchase tickets.'); window.location.href='login.php';</script>";
    exit;
    }

$userId = $_SESSION['user_id'];
$location = trim($_POST['concert_location'] ?? '');
$concert_date = trim($_POST['concert_date'] ?? '');
$cardName=trim($_POST['account-number'] ?? '');
$expiryDate = trim($_POST['expiry-date'] ?? '');
$quantity = intval($_POST['quantity'] ?? 1);
$total_amount = floatval(str_replace('€', '', $_POST['total_price']));

$cardNameRegex = "/^([0-9]{4}\-){3}[0-9]{4}$/";
$expiryDateRegex= "/^(0[1-9]|1[0-2])\/[0-9]{2}$/";
$errors = [];
if(!preg_match($cardNameRegex, $cardName)){
 $errors[] = 'Numri i llogarise nuk eshte i vlefshem (e.g., XXXX-XXXX-XXXX-XXXX).';
 } else {
 $cleanAccountNumber = str_replace("-", "", $cardName);
}

if (!preg_match($expiryDateRegex, $expiryDate)) {
   $errors[] = 'Formati i datës së skadimit nuk është i saktë (mm/yy).';
} else{
    list($month, $year) = explode("/", $expiryDate);
     $fullExpiryYear = 2000 + (int)$year;
     $expiryMonth = (int)$month;
      $fullCurrentYear = (int)date("Y"); 
      $currentMonth = (int)date("m");  
              if ($fullExpiryYear < $fullCurrentYear) {
            
            $errors[] = 'Kjo kartë ka skaduar.';
        } elseif ($fullExpiryYear == $fullCurrentYear) {
           if ($expiryMonth < $currentMonth) {
                $errors[] = 'Kjo kartë ka skaduar.';
            }
           }
        }


    if (!empty($errors)) {
        echo "<script>alert('" . implode("\\n", $errors) . "');</script>";
    } else {
        try {
            $stmt = mysqli_prepare($conn, "INSERT INTO tickets (user_id, location, date, account_number, expiry_date, quantity, total_amount) VALUES (?, ?, ?, ?, ?, ?, ?)");

            if ($stmt === false) {
                throw new Exception("Gabim në përgatitjen e query: " . mysqli_error($conn));
            }

            mysqli_stmt_bind_param($stmt, "issssid", $userId, $location, $concert_date, $cleanAccountNumber, $expiryDate, $quantity, $total_amount);

            if (mysqli_stmt_execute($stmt)) {
                echo "<script>alert('Bileta u ble me sukses!'); window.location.href='tickets.php';</script>";
                exit; 
            } else {
                throw new Exception("Gabim gjatë blerjes së biletës: " . mysqli_error($conn));
            }
        } catch (Exception $e) {
            echo "<script>alert('Kërkimi dështoi: " . htmlspecialchars($e->getMessage()) . "');</script>";
        } finally {
            if (isset($stmt) && $stmt !== false) {
                mysqli_stmt_close($stmt);
            }
        }
    }
}
?>
