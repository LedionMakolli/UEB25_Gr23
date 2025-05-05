<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $fullname = trim($_POST["fullname"] ?? "");
        $email = trim($_POST["email"] ?? "");
        $password = trim($_POST["password"] ?? "");
        $confirmPassword = trim($_POST["confirm-password"] ?? "");

        $fullnameRegex = "/^[a-zA-ZëËçÇ\s]{3,50}$/";
        $emailRegex = "/^[a-zA-Z0-9.%+-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,}$/";
        $passwordRegex = "/^(?=.[a-z])(?=.[A-Z])(?=.\d)(?=.[@$!%?&])[A-Za-z\d@$!%?&]{8,}$/";

        $errors = [];

        if (!preg_match($fullnameRegex, $fullname)) {
            $errors[] = "Emri duhet të përmbajë vetëm shkronja (3-50 karaktere)";
        }

        if (!preg_match($emailRegex, $email)) {
            $errors[] = "Email adresa nuk është valide";
        }

        if (!preg_match($passwordRegex, $password)) {
            $errors[] = "Fjalëkalimi duhet të ketë së paku 8 karaktere, përfshirë shkronja të mëdha, të vogla, numra dhe karaktere speciale";
        }

        if ($password !== $confirmPassword) {
            $errors[] = "Fjalëkalimet nuk përputhen";
        }

        if (empty($errors)) {
            echo "<script>alert('Regjistrimi u krye me sukses!'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('" . implode("\n", $errors) . "');</script>";
        }
    }
?>