<?php
session_start();
require_once("db.php");
require_once("custom_error_handler.php");

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'staff') {
    exit('<p style="color:red;">Access denied</p>');
}

if (isset($_POST['kerko'])) {
    $id = trim($_POST['id'] ?? '');
    $name = trim($_POST['fullname'] ?? '');
    $email = trim($_POST['email'] ?? '');

    $sql = "SELECT id,fullname,email,created_at FROM users WHERE 1=1";
    $types = '';
    $params = [];

    if ($id !== '') {
        $sql .= " AND id = ?";
        $types .= 'i';
        $params[] = $id;
    }
    if ($name !== '') {
        $sql .= " AND fullname LIKE ?";
        $types .= 's';
        $params[] = "%{$name}%";
    }
    if ($email !== '') {
        $sql .= " AND email LIKE ?";
        $types .= 's';
        $params[] = "%{$email}%";
    }

    if ($types === '') {
        echo "<p style='color:red;'>Fut ID, Emër ose Email për kërkim.</p>";
        exit;
    }
    $params_ref = [];
    foreach ($params as $key => &$value) {
         $params_ref[$key] = &$value; 
    }
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, $types, ...$params_ref);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $outId, $outName, $outEmail, $outTs);
    unset($value);
    $found = false;
    while (mysqli_stmt_fetch($stmt)) {
        if (!$found) {
            echo "<p><b>Rezultatet:</b></p>";
            $found = true;
        }
        echo "<p>
                <b>ID:</b> " . htmlspecialchars($outId)    . "<br>
                <b>Emri:</b> " . htmlspecialchars($outName)  . "<br>
                <b>Email:</b> " . htmlspecialchars($outEmail). "<br>
                <b>Regjistruar:</b> " . htmlspecialchars($outTs)   . "
              </p>";
    }
    if (!$found) {
        echo "<p style='color:red;'>Nuk u gjet asnjë rezultat.</p>";
    }
    mysqli_stmt_close($stmt);
    exit;
}

if (isset($_POST['ruaj'])) {
    $name  = trim($_POST['fullname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $pw = $_POST['password'] ?? '';

    if (!$name || !$email || !$pw) {
        echo "<p style='color:red;'>Plotëso të gjitha fushat.</p>";
        exit;
    }
    $hash=enkriptoFjalkalimin($pw);

    $stmt = mysqli_prepare($conn,
        "INSERT INTO users(fullname,email,password) VALUES(?,?,?)"
    );
    mysqli_stmt_bind_param($stmt, 'sss', $name, $email, $hash);
    if (mysqli_stmt_execute($stmt)) {
        echo "<p style='color:lime;'>User i ri u krijua: "
            . htmlspecialchars($name) . "</p>";
    } else {
        echo "<p style='color:red;'>Gabim në krijim.</p>";
    }
    mysqli_stmt_close($stmt);
    exit;
}

if (isset($_POST['edito'])) {
    $id = intval($_POST['id'] ?? 0);
    $name = trim($_POST['fullname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $pw = $_POST['password'] ?? '';

    if (!$id) {
        echo "<p style='color:red;'>ID është e detyrueshme për përditësim.</p>";
        exit;
    }

    $sql = "UPDATE users SET ";
    $fields = [];
    $types = '';
    $params = [];

    if ($name !== '') {
        $fields[] = "fullname = ?";
        $types .= 's';
        $params[] = $name;
    }

    if ($email !== '') {
        $fields[] = "email = ?";
        $types .= 's';
        $params[] = $email;
    }

    if ($pw !== '') {
        $fields[] = "password = ?";
        $types .= 's';
        $params[] = password_hash($pw, PASSWORD_DEFAULT);
    }

    if (empty($fields)) {
        echo "<p style='color:red;'>S’ka të dhëna për përditësim.</p>";
        exit;
    }

    $sql .= implode(", ", $fields) . " WHERE id = ?";
    $types .= 'i';
    $params[] = $id;

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, $types, ...$params);

    if (mysqli_stmt_execute($stmt)) {
        echo "<p style='color:lime;'>User #{$id} u përditësua me sukses.</p>";
    } else {
        echo "<p style='color:red;'>Gabim gjatë përditësimit.</p>";
    }

    mysqli_stmt_close($stmt);
    exit;
}


if (isset($_POST['fshi'])) {
    $id = intval($_POST['id'] ?? 0);
    $name = trim($_POST['fullname'] ?? '');

    if (!$id || !$name) {
        echo "<p style='color:red;'>Fut ID dhe Emrin për fshirje.</p>";
        exit;
    }

    $stmt = mysqli_prepare($conn,
        "DELETE FROM users WHERE id=? AND fullname LIKE ?"
    );
    $name_like = "%{$name}%"; 
    mysqli_stmt_bind_param($stmt, 'is', $id, $name_like);
    mysqli_stmt_execute($stmt);
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "<p style='color:lime;'>User #{$id} (" . htmlspecialchars($name) . ") u fshi.</p>";
    } else {
        echo "<p style='color:red;'>Nuk u gjet user me ID={$id} dhe emër “" . htmlspecialchars($name) . "”.</p>";
    }
    mysqli_stmt_close($stmt);
    exit;
}


echo "<p style='color:red;'>Veprim i panjohur.</p>";

function enkriptoFjalkalimin(string &$pw) {
    $pw = password_hash($pw, PASSWORD_DEFAULT);
    return $pw;
}

?>