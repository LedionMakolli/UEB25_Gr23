<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate Us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="styles/contactus.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="foto/logo.png" type="image/png">
</head>
<body>
    <?php 
    include 'nav.php'; 
    include 'php-files/rate_usPHP.php';

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $isLoggedIn = !empty($_SESSION['user_id']);
    ?>

    <section class="contact-and-extra">
        <div class="form-container">
            <h2><mark>Rate Us</mark></h2>

            <?php if ($isLoggedIn): ?>
                <?php if ($success): ?>
                    <div class="success-message">
                        Faleminderit për vlerësimin tuaj!
                    </div>
                <?php endif; ?>

                <form id="rate-form" method="POST">
                    <label for="name">Emri juaj:</label>
                    <input type="text" id="name" name="name" placeholder="Shkruani emrin tuaj" required value="<?= htmlspecialchars($name); ?>">
                    <?php if (isset($errors['name'])): ?>
                        <div class="error-message"><?= $errors['name']; ?></div>
                    <?php endif; ?>

                    <p style="margin-top: 1rem;">Zgjidhni vlerësimin (1-5):</p>
                    <div class="radio-group-horizontal">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <label>
                                <input type="radio" name="rating" value="<?= $i ?>" <?= ($rating == $i) ? 'checked' : '' ?> required> <?= $i ?>
                            </label>
                        <?php endfor; ?>
                    </div>
                    <?php if (isset($errors['rating'])): ?>
                        <div class="error-message"><?= $errors['rating']; ?></div>
                    <?php endif; ?>

                    <label for="review" style="margin-top:1rem;">Koment (opsional):</label>
                    <textarea id="review" name="review" placeholder="Nëse keni ndonjë koment..." maxlength="500"><?= htmlspecialchars($review); ?></textarea>
                    <?php if (isset($errors['review'])): ?>
                        <div class="error-message"><?= $errors['review']; ?></div>
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="profession">Profesioni:</label>
                        <input type="text" id="profession" name="profession" placeholder="Shkruani profesionin tuaj" value="<?= htmlspecialchars($profession ?? ''); ?>">
                        <?php if (isset($errors['profession'])): ?>
                            <div class="error-message"><?= $errors['profession']; ?></div>
                        <?php endif; ?>
                    </div>

                    <?php if (isset($errors['database'])): ?>
                        <div class="error-message"><?= $errors['database']; ?></div>
                    <?php endif; ?>

                    <button type="submit">Dërgo vlerësimin</button>
                </form>

                


            <?php else: ?>
                <script>
                    alert("Ju duhet të jeni të kyçur për të dhënë një vlerësim.\nJu lutemi kyçuni për të vazhduar.");
                    window.location.href = 'login.php';
                </script>
            <?php endif; ?>
        </div>
    </section>

    <footer>
        <?php include 'footer.php'; ?>
    </footer>
</body>
</html>