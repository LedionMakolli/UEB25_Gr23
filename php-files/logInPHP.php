<?php
require_once("db.php");
require_once("custom_error_handler.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$login_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    try {
        if ($email === '' || $password === '') {
            throw new Exception('Plotësoni të dy fushat.');
        }

        $stmt = mysqli_prepare($conn, "SELECT id, fullname, password, role FROM users WHERE email = ? LIMIT 1");
        if (!$stmt) throw new Exception("Gabim në përgatitjen e query!");

        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        mysqli_stmt_bind_result($stmt, $userId, $userFullname, $hashedPassword, $role);

        if (mysqli_stmt_fetch($stmt) && password_verify($password, $hashedPassword)) {
            $_SESSION['user_id'] = $userId;
            $_SESSION['fullname'] = $userFullname;
            $_SESSION['role'] = $role; 
            header('Location: songs.php');
            exit;
        } else {
            throw new Exception("Email ose fjalëkalim i gabuar.");
        }
    } catch (Exception $ex) {
        $login_error = $ex->getMessage();
        echo "<script>alert('$login_error');</script>";
    }
}
?>
