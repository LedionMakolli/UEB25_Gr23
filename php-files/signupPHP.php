<?php
require_once("db.php");
require_once("custom_error_handler.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fullname = trim($_POST["fullname"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $password = trim($_POST["password"] ?? "");
    $confirmPassword = trim($_POST["confirm-password"] ?? "");

    $errors = [];

    if (strlen($fullname) < 3 || strlen($fullname) > 100) {
        $errors[] = "Emri i plotë duhet të jetë 3-100 karaktere.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email adresa nuk është valide.";
    }
    if (strlen($password) < 6) {
        $errors[] = "Fjalëkalimi duhet të ketë së paku 6 karaktere.";
    }
    if ($password !== $confirmPassword) {
        $errors[] = "Fjalëkalimet nuk përputhen.";
    }

    try {
        if (empty($errors)) {
            $check = mysqli_prepare($conn, "SELECT id FROM users WHERE email = ?");
            if (!$check) throw new Exception("Gabim gjatë përgatitjes së query për email.");

            mysqli_stmt_bind_param($check, "s", $email);
            mysqli_stmt_execute($check);
            mysqli_stmt_store_result($check);

            if (mysqli_stmt_num_rows($check) > 0) {
                throw new Exception("Ky email është i regjistruar tashmë!");
            }

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = mysqli_prepare($conn, "INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)");

            if (!$stmt) throw new Exception("Gabim gjatë përgatitjes së query për regjistrim.");

            mysqli_stmt_bind_param($stmt, "sss", $fullname, $email, $hashedPassword);
            if (!mysqli_stmt_execute($stmt)) {
                throw new Exception("Gabim gjatë ekzekutimit të query.");
            }

            $logFile = __DIR__ . "/txtFiles/users.txt";
            $timestamp = date("Y-m-d H:i:s");
            $logText = "$fullname | $email | $timestamp\n";

            if (!file_put_contents($logFile, $logText, FILE_APPEND)) {
                throw new Exception("Gabim gjatë ruajtjes në fajll.");
            }

            echo "<script>alert('Regjistrimi u krye me sukses!'); window.location.href='login.php';</script>";
            exit;
        }
    } catch (Exception $e) {
        $errors[] = $e->getMessage();
    }
}
?>
