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
<?php 
include 'nav.php'; 
include 'php-files/signupPHP.php'; 
?>
    <section class="signup-container">
        <div class="signup-form">
            <h2>Regjistrohu</h2>
            <form id="signup-form" method="POST" action="">
                <label for="fullname">Emri i plotë:</label>
                <input type="text" id="fullname" name="fullname" placeholder="Shkruani emrin tuaj të plotë" required>
                <div id="fullname-error" class="error-message"></div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Shkruani email-in tuaj" required autocomplete="email">
                <div id="email-error" class="error-message"></div>
                
                <label for="password">Fjalëkalimi:</label>
                <input type="password" id="password" name="password" placeholder="Shkruani fjalëkalimin tuaj" required>
                <div id="password-error" class="error-message"></div>
                
                <label for="confirm-password">Konfirmo Fjalëkalimin:</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Përsërit fjalëkalimin" required>
                <div id="confirm-password-error" class="error-message"></div>
                
                <button type="submit">Regjistrohu</button>
            </form>
        </div>
    </section>

    <footer>
        <?php include 'footer.php'; ?>
    </footer>

</body>
</html>