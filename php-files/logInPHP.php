<?php
// php-files/logInPHP.php

// Nisi sesionin vetëm nëse nuk ka qenë ende i nisur
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/db.php';

$login_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    $stmt = mysqli_prepare($conn, "SELECT id, password FROM users WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    mysqli_stmt_bind_result($stmt, $userId, $hashedPassword);

    if (mysqli_stmt_fetch($stmt) && password_verify($password, $hashedPassword)) {
        $_SESSION['user_id'] = $userId;
        header('Location: songs.php');
        exit;
    }

    $login_error = 'Email ose fjalëkalim i gabuar.';
    echo "<script>alert('{$login_error}');</script>";

    mysqli_stmt_close($stmt);
}
