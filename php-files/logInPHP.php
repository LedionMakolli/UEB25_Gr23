<?php
// php-files/logInPHP.php

// 1) Start session if needed
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 2) Include your DB connection (defines $conn)
require_once("db.php");
$login_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email']    ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($email === '' || $password === '') {
        $login_error = 'Plotësoni të dy fushat.';
    } else {
        // 3) Pull id, fullname, and hashed password
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
            // 4) Store both in session
            $_SESSION['user_id']  = $userId;
            $_SESSION['fullname'] = $userFullname;
            mysqli_stmt_close($stmt);

            // redirect to wherever you want after login
            header('Location: songs.php');
            exit;
        }

        mysqli_stmt_close($stmt);
        $login_error = 'Email ose fjalëkalim i gabuar.';
    }
}
