<?php
session_start();
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/custom_error_handler.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $email = $_SESSION['user_email'];
    $card_number = trim($_POST['card_number'] ?? '');
    $expiryDate = trim($_POST['expiryDate'] ?? '');
    $amount = trim($_POST['amount']      ?? '');

    $errors = [];
    $expiryDateRegex= "/^(0[1-9]|1[0-2])\/[0-9]{2}$/";

    $card_clean = str_replace(' ', '', $card_number);
    if (!preg_match("/^\d{8,19}$/", $card_clean)) {
        $errors[] = "Numri i kartelës duhet të përmbajë vetëm 8 deri në 19 shifra.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email adresa nuk është valide.";
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

    if (empty($errors)) {
        try {
            $check = mysqli_prepare($conn, "SELECT id FROM payments WHERE email = ?");
            if (!$check) {
                throw new Exception("Gabim në prepare për SELECT: " . mysqli_error($conn));
            }
            mysqli_stmt_bind_param($check, "s", $email);
            mysqli_stmt_execute($check);
            mysqli_stmt_store_result($check);
            mysqli_stmt_close($check);

           $stmt = mysqli_prepare($conn,
                "INSERT INTO payments (card_number, email, amount, payment_date, expiryDate)
                VALUES (?, ?, ?, NOW(), ?)"
            );
            if (!$stmt) {
                throw new Exception("Gabim në prepare për INSERT: " . mysqli_error($conn));
            }
            mysqli_stmt_bind_param($stmt, "ssds", $card_clean, $email, $amount, $expiryDate);
            if (!mysqli_stmt_execute($stmt)) {
                throw new Exception("Gabim gjatë ekzekutimit të INSERT: " . mysqli_stmt_error($stmt));
            }
            mysqli_stmt_close($stmt);

            $logFile = __DIR__ . "/txtFiles/payments_log.txt";
            $timestamp = date("Y-m-d H:i:s");
            $logText = "$card_clean|$email|$amount|$timestamp|$expiryDate\n";
            if (file_put_contents($logFile, $logText, FILE_APPEND) === false) {
                error_log("Nuk u shkrua dot në payments_log.txt");
            }

            header("Location: ../aboutus.php?payment_success=1");
            exit;

        } catch (Exception $e) {
            $errors[] = $e->getMessage();
        }
    }

    $_SESSION['payment_errors'] = $errors;
    $_SESSION['form_data'] = [
        'card_number' => $card_number,
        'email' => $email,
        'amount' => $amount
    ];
    header("Location: " . $_SERVER['HTTP_REFERER'] . "?payment_error=1");
    exit;
}