<?php
require_once 'php-files/db.php';

$login_error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"] ?? "");
    $password = trim($_POST["password"] ?? "");

    $stmt = mysqli_prepare($conn, "SELECT id, password FROM users WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) === 1) {
        mysqli_stmt_bind_result($stmt, $userId, $hashedPassword);
        mysqli_stmt_fetch($stmt);

        if (password_verify($password, $hashedPassword)) {
            session_start();
            $_SESSION["user_id"] = $userId;
            $_SESSION["email"] = $email;
            echo "<script>alert('U kyçe me sukses!'); window.location.href='dashboard.php';</script>";
            exit;
        } else {
            $login_error = "Fjalëkalimi është i gabuar!";
        }
    } else {
        $login_error = "Ky email nuk është i regjistruar!";
    }
}

function display_login_error($login_error) {
    if (!empty($login_error)) {
        echo "<p class='error-message'>$login_error</p>";
    }
}
?>
