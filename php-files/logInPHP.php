<?php
// php-files/logInPHP.php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once("db.php");
$login_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email']    ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($email === '' || $password === '') {
        $login_error = 'Plotësoni të dy fushat.';
    } else {
        $stmt = mysqli_prepare(
            $conn,
            "SELECT id, fullname, password 
               FROM users 
              WHERE email = ?
              LIMIT 1"
        );
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result($stmt, $userId, $userFullname, $hashedPassword);

        if (mysqli_stmt_fetch($stmt) && password_verify($password, $hashedPassword)) {
            $_SESSION['user_id']  = $userId;
            $_SESSION['fullname'] = $userFullname;
            mysqli_stmt_close($stmt);

            header('Location: songs.php');
            exit;
        }
        $login_error = 'Email ose fjalëkalim i gabuar.';

        mysqli_stmt_close($stmt);
        if (!empty($login_error)) {
          echo "<script>alert('Email ose fjalëkalim i gabuar');</script>";
        }
    }
}
