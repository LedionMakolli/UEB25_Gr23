<?php
session_start();
require_once ("db.php");
require_once ("custom_error_handler.php");

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'staff') {
  exit('<p style="color:red;">Access denied</p>');
}

if (isset($_POST['kerko'])) {
  $id   = intval($_POST['id']);
  $stmt = mysqli_prepare($conn, "SELECT fullname, email, created_at FROM users WHERE id = ?");
  mysqli_stmt_bind_param($stmt, 'i', $id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_bind_result($stmt, $name, $email, $ts);
  if (mysqli_stmt_fetch($stmt)) {
    echo "<p><b>ID:</b> $id<br>
             <b>Emri:</b> ".htmlspecialchars($name)."<br>
             <b>Email:</b> ".htmlspecialchars($email)."<br>
             <b>Regjistruar:</b> $ts</p>";
  } else {
    echo "<p style='color:red;'>User me ID=$id nuk u gjet.</p>";
  }
  mysqli_stmt_close($stmt);
  exit;
}

if (isset($_POST['ruaj'])) {
  $name  = trim($_POST['fullname']);
  $email = trim($_POST['email']);
  $pw    = $_POST['password'];
  if (!$name || !$email || !$pw) {
    echo "<p style='color:red;'>Plotëso të gjitha fushat.</p>";
    exit;
  }
  $hash = password_hash($pw, PASSWORD_DEFAULT);
  $stmt = mysqli_prepare($conn, "INSERT INTO users(fullname, email, password) VALUES (?, ?, ?)");
  mysqli_stmt_bind_param($stmt, 'sss', $name, $email, $hash);
  if (mysqli_stmt_execute($stmt)) {
    echo "<p style='color:lime;'>User i ri u krijua: ".htmlspecialchars($name)."</p>";
  } else {
    echo "<p style='color:red;'>Gabim në krijim.</p>";
  }
  mysqli_stmt_close($stmt);
  exit;
}

if (isset($_POST['edito'])) {
  $id    = intval($_POST['id']);
  $name  = trim($_POST['fullname']);
  $email = trim($_POST['email']);
  $pw    = $_POST['password'];
  if (!$id || !$name || !$email) {
    echo "<p style='color:red;'>Plotëso ID, fullname & email.</p>";
    exit;
  }
  if ($pw !== '') {
    $hash = password_hash($pw, PASSWORD_DEFAULT);
    $stmt = mysqli_prepare($conn, "UPDATE users SET fullname=?, email=?, password=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, 'sssi', $name, $email, $hash, $id);
  } else {
    $stmt = mysqli_prepare($conn, "UPDATE users SET fullname=?, email=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, 'ssi', $name, $email, $id);
  }
  if (mysqli_stmt_execute($stmt)) {
    echo "<p style='color:lime;'>User #$id u përditësua.</p>";
  } else {
    echo "<p style='color:red;'>Gabim në përditësim.</p>";
  }
  mysqli_stmt_close($stmt);
  exit;
}

if (isset($_POST['fshi'])) {
  $id = intval($_POST['id']);
  if (!$id) {
    echo "<p style='color:red;'>Fut ID për fshirje.</p>";
    exit;
  }
  $stmt = mysqli_prepare($conn, "DELETE FROM users WHERE id=?");
  mysqli_stmt_bind_param($stmt, 'i', $id);
  if (mysqli_stmt_execute($stmt)) {
    echo "<p style='color:lime;'>User #$id u fshi.</p>";
  } else {
    echo "<p style='color:red;'>Gabim në fshirje.</p>";
  }
  mysqli_stmt_close($stmt);
  exit;
}

echo "<p style='color:red;'>Veprim i panjohur.</p>";
