<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styles/login.css">
    <link rel="icon" href="foto/logo.png" type="image/png">
    
</head>
<body>
    <?php 
    include 'nav.php'; 
    include 'php-files/logInPHP.php';
    ?>

    <section class="login-container">
        <div class="login-form">
            <h2>Log In</h2>
            <form id="login-form" method="POST">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Shkruani email-in tuaj" required autocomplete="email">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Shkruani fjalëkalimin tuaj" required minlength="6">
                <button type="submit">Kyçu</button>
                
                <div class="register-link">
                    Nuk je i regjistruar? <a href="signup.php">Regjistrohu</a>
                </div>
            </form>
        </div>
    </section>

    <footer>
      <?php include 'footer.php'; ?>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</html>
