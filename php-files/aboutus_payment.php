<?php
session_start();
require_once(__DIR__ . "/db.php");
require_once("custom_error_handler.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $card_number = trim($_POST["card_number"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $amount = trim($_POST["amount"] ?? "");

    $errors = [];

    if (!preg_match("/^\d{8,19}$/", str_replace(' ', '', $card_number))) {
    $errors[] = "Numri i kartelës duhet të përmbajë vetëm 8 deri në 19 shifra.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email adresa nuk është valide.";
    }

    try {
        if (empty($errors)) {

            $check = mysqli_prepare($conn, "SELECT id FROM payments WHERE email = ?");
            if (!$check) throw new Exception("Gabim gjatë përgatitjes së query për email.");

            mysqli_stmt_bind_param($check, "s", $email);
            mysqli_stmt_execute($check);
            mysqli_stmt_store_result($check);

            mysqli_stmt_close($check);

            $stmt = mysqli_prepare($conn, "INSERT INTO payments (card_number, email, amount,  payment_date) VALUES (?, ?, ?, NOW())");

            if (!$stmt) throw new Exception("Gabim gjatë përgatitjes së query për pagesë.");

            mysqli_stmt_bind_param($stmt, "sss", $card_number, $email, $amount);
            if (!mysqli_stmt_execute($stmt)) {
                throw new Exception("Gabim gjatë ekzekutimit të query.");
            }
            mysqli_stmt_close($stmt);

             $logFile  = __DIR__ . "/txtFiles/payments_log.txt";
            $timestamp = date("Y-m-d H:i:s");
            $logText   = "$card_number | $email | $amount | $timestamp" . PHP_EOL;

            if (@file_put_contents($logFile, $logText, FILE_APPEND) === false) {
                // nuk e ndalojmë përdoruesin, por regjistrojmë gabimin
                error_log("Nuk u shkrua dot në payments_log.txt");
            }

            echo "<script>
                alert('Pagesa u krye me sukses!');
                window.location.href = '../aboutus.php';
            </script>";
            $_SESSION['payment_done'] = true;
            header("Location: ../aboutus.php?success=1");
            exit;
        }
    } catch (Exception $e) {
        $errors[] = $e->getMessage();
    }
}
?>
