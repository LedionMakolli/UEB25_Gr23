<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="styles/contactus.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="foto/logo.png" type="image/png">
</head>
<body>
    <?php 
    include 'nav.php'; 
    include 'php-files/contactus_process.php'
    ?>

    <section class="contact-and-extra">
        <div class="form-container">
            <h2><mark>Contact Us</mark></h2>
            
            <?php if ($success): ?>
                <div class="success-message">
                    Faleminderit për mesazhin tuaj! Do të ju kontaktojmë sa më shpejt të jetë e mundur.
                </div>
            <?php endif; ?>
            
            <form id="contact-form" method="POST" autocomplete="on">
                <label for="name">Emri dhe Mbiemri:</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name"
                    class="<?php echo isset($errors['name']) ? 'error' : ''; ?>" 
                    placeholder="Shkruani emrin dhe mbiemrin tuaj" 
                    required 
                    pattern=".{6,}" 
                    title="Emri dhe mbiemri duhet të kenë të paktën 6 karaktere." 
                    autocomplete="name"
                    value="<?php echo htmlspecialchars($name); ?>">
                <?php if (isset($errors['name'])): ?>
                    <div class="error-message"><?php echo $errors['name']; ?></div>
                <?php endif; ?>
                
                <label for="email">Email:</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email"
                    class="<?php echo isset($errors['email']) ? 'error' : ''; ?>" 
                    placeholder="Shkruani email-in tuaj" 
                    required 
                    autocomplete="email"
                    value="<?php echo htmlspecialchars($email); ?>">
                <?php if (isset($errors['email'])): ?>
                    <div class="error-message"><?php echo $errors['email']; ?></div>
                <?php endif; ?>
                
                <div class="message-section">
                    <label for="message">Mesazhi juaj:</label>
                    <textarea 
                        id="message" 
                        name="message"
                        class="<?php echo isset($errors['message']) ? 'error' : ''; ?>"
                        placeholder="Shkruani mesazhin tuaj..." 
                        rows="3" 
                        required 
                        maxlength="500" 
                        title="Mesazhi nuk duhet të kalojë 500 karaktere."
                        autocomplete="off"><?php echo htmlspecialchars($message); ?></textarea>
                    <?php if (isset($errors['message'])): ?>
                        <div class="error-message"><?php echo $errors['message']; ?></div>
                    <?php endif; ?>
                </div>
                
                <div class="music-preference">
                    <p class="zhanri" style="color: var(--primary-color-dark);">Zgjedhni zhanrin që keni interesim në të:</p>
                    <div class="radio-group-horizontal">
                        <label><input type="radio" name="music" value="rnb" <?php echo ($music === 'rnb') ? 'checked' : ''; ?> required> R&B</label>
                        <label><input type="radio" name="music" value="pop" <?php echo ($music === 'pop') ? 'checked' : ''; ?>> Pop</label>
                        <label><input type="radio" name="music" value="hiphop" <?php echo ($music === 'hiphop') ? 'checked' : ''; ?>> HipHop</label>
                        <label><input type="radio" name="music" value="rock" <?php echo ($music === 'rock') ? 'checked' : ''; ?>> Rock</label>
                    </div>
                    <?php if (isset($errors['music'])): ?>
                        <div class="error-message"><?php echo $errors['music']; ?></div>
                    <?php endif; ?>
                </div>
                <br>
                <div class="checkbox-group">
                    <label for="check"><pre id="tekst">Pranoj kushtet&termat</pre></label>
                    <input 
                        type="checkbox" 
                        id="check" 
                        name="terms"
                        <?php echo $termsAccepted ? 'checked' : ''; ?>
                        required 
                        title="Duhet të pajtoheni me kushtet dhe termat për të vazhduar.">
                    <?php if (isset($errors['terms'])): ?>
                        <div class="error-message"><?php echo $errors['terms']; ?></div>
                    <?php endif; ?>
                </div>
            
                <button type="submit">Dërgo</button>
            </form>
        </div>
    </section>

    <footer>
        <?php include 'footer.php'; ?>
    </footer>
</body>
</html>