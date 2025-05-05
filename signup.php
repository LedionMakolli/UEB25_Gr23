<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styles/signup.css">
    <link rel="icon" href="foto/logo.png" type="image/png">

</head>
<body>
    <?php include 'nav.php'; ?>

    <section class="signup-container">
        <div class="signup-form">
            <h2>Regjistrohu</h2>
            <form id="signup-form" method="POST">
                <label for="fullname">Emri i plotë:</label>
                <input 
                    type="text" 
                    id="fullname" 
                    name="fullname"
                    placeholder="Shkruani emrin tuaj të plotë" 
                    required>
                <div id="fullname-error" class="error-message"></div>

                <label for="email">Email:</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email"
                    placeholder="Shkruani email-in tuaj" 
                    required 
                    autocomplete="email">
                <div id="email-error" class="error-message"></div>
                
                <label for="password">Fjalëkalimi:</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password"
                    placeholder="Shkruani fjalëkalimin tuaj" 
                    required>
                <div id="password-error" class="error-message"></div>
                
                <label for="confirm-password">Konfirmo Fjalëkalimin:</label>
                <input 
                    type="password" 
                    id="confirm-password" 
                    name="confirm-password"
                    placeholder="Përsërit fjalëkalimin" 
                    required>
                <div id="confirm-password-error" class="error-message"></div>
                
                <button type="submit">Regjistrohu</button>
            </form>
        </div>
    </section>

    <footer>
        <?php include 'footer.php'; ?>
    </footer>

<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $fullname = trim($_POST["fullname"] ?? "");
        $email = trim($_POST["email"] ?? "");
        $password = trim($_POST["password"] ?? "");
        $confirmPassword = trim($POST["confirm-password"] ?? "");

        // Regex patterns
        $fullnameRegex = "/^[a-zA-ZëËçÇ\s]{3,50}$/";
        $emailRegex = "/^[a-zA-Z0-9.%+-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,}$/";
        $passwordRegex = "/^(?=.[a-z])(?=.[A-Z])(?=.\d)(?=.[@$!%?&])[A-Za-z\d@$!%?&]{8,}$/";

        // Validation
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
</body>
</html>