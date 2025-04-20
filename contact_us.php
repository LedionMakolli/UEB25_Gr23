<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="foto/logo.png" type="image/png">
    
    <style>
        h2 {
            color: var(--primary-color-dark);
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }
        body {
            padding-top: 50px;
            font-family: 'Poppins';
            background: linear-gradient(135deg, #1e1e2f, #3a3b5a);
            color: var(--white);
        }

        .contact-and-extra {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 2rem 5%;
            background: #1b1f24;
            color: var(--white);
            padding-top: 100px;
        }

        .contact-and-extra .form-container {
            background: #fdfdfd;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            max-width: 500px;
            width: 100%;
            margin-bottom: 2rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .contact-and-extra .form-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.4);
        }

        .contact-and-extra h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: var(--primary-color-dark);
            font-size: 1.8rem;
        }

        .contact-and-extra label {
            font-size: 1rem;
            color: #333;
            display: block;
            margin-bottom: 0.5rem;
        }

        .contact-and-extra input,
        .contact-and-extra textarea {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            resize: none;
            transition: border-color 0.3s ease, box-shadow 0.3s ease, outline 0.3s ease;
        }

        .contact-and-extra input:focus,
        .contact-and-extra textarea:focus {
            border-color: #4bad52;
            box-shadow: 0 0 8px rgba(75, 173, 82, 0.7);
            outline: 2px solid #4bad52;
            outline-offset: 2px;
        }

        .contact-and-extra button {
            background: linear-gradient(90deg, #4bad52, #36a344);
            color: white;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s, transform 0.3s, outline 0.3s;
            display: block;
            width: 100%;
            font-weight: bold;
        }

        .contact-and-extra button:hover {
            background: linear-gradient(90deg, #36a344, #4bad52);
            transform: scale(1.02);
            outline: 2px solid #4bad52;
        }

        .radio-group-horizontal {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            margin-top: 10px;
        }

        .radio-group-horizontal label {
            display: flex;
            align-items: center;
            font-size: 1rem;
            cursor: pointer;
            gap: 5px;
            padding: 0.5rem 1rem;
            border-radius: 10px;
            background: #f1f1f1;
            transition: background 0.3s ease, transform 0.2s ease, outline 0.3s ease;
        }

        .radio-group-horizontal label:hover {
            background: #e1e1e1;
            transform: scale(1.05);
            color: green;
            outline: 2px solid #4bad52;
            outline-offset: 2px;
        }

        .radio-group-horizontal input[type="radio"] {
            margin: 0;
            transform: scale(1.05);
            accent-color: #4bad52;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
            max-width: 100px;
        }

        #check {
            margin-bottom: 10px;
        }

        #tekst, #message {
            font-family: "Poppins";
        }

        canvas {
            display: inline-block;
            margin-right: 10px;
            border: 3px solid #000;
            border-radius: 4px;
        }

        h2 mark {
            display: inline;
        }
    </style>
</head>
<body>
    <?php include 'nav.php'; ?>

    <section class="contact-and-extra">
        <div class="form-container">
            <h2>
                <mark>Contact Us</mark>
            </h2>
            
            <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $name = ucwords(trim($_POST['name'] ?? ''));
                $email = trim($_POST['email'] ?? "");
                $message = trim($_POST['message'] ?? "");
                $music = $_POST['music'] ?? null;
                $termsAccepted = isset($_POST['terms']);
                
                $errors = [];
                
                if (empty($name) || strlen($name) < 6) {
                    $errors[] = "Emri dhe mbiemri duhet të kenë të paktën 6 karaktere!";
                }
                
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "Email adresa nuk është valide!";
                }
                
                if (empty($message) || strlen($message) > 500) {
                    $errors[] = "Mesazhi duhet të jetë deri në 500 karaktere!";
                }
                
                if (!$music) {
                    $errors[] = "Ju lutemi zgjidhni një zhanër!";
                }
                
                if (!$termsAccepted) {
                    $errors[] = "Ju duhet të pranoni kushtet dhe termat!";
                }
                
                if (empty($errors)) {
                    echo '<div class="success-message" style="color: green; margin-bottom: 20px;">Forma u dërgua me sukses!</div>';
                    
                } else {
                    echo '<div class="error-message" style="color: red; margin-bottom: 20px;">';
                    foreach ($errors as $error) {
                        echo "<p>$error</p>";
                    }
                    echo '</div>';
                }
            }
            ?>
            
            <form id="contact-form" method="POST" autocomplete="on">
                <label for="name">Emri dhe Mbiemri:</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name"
                    class="required" 
                    placeholder="Shkruani emrin dhe mbiemrin tuaj" 
                    required 
                    pattern=".{6,}" 
                    title="Emri dhe mbiemri duhet të kenë të paktën 6 karaktere." 
                    autocomplete="name"
                    value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
                
                <label for="email">Email:</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email"
                    class="required" 
                    placeholder="Shkruani email-in tuaj" 
                    required 
                    autocomplete="email"
                    value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                
                <div class="message-section">
                    <label for="message">Mesazhi juaj:</label>
                    <textarea 
                        id="message" 
                        name="message"
                        placeholder="Shkruani mesazhin tuaj..." 
                        rows="3" 
                        required 
                        maxlength="500" 
                        title="Mesazhi nuk duhet të kalojë 500 karaktere."
                        autocomplete="off"><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
                </div>
                
                <div class="music-preference">
                    <p class="zhanri" style="color: var(--primary-color-dark);">Zgjedhni zhanrin që keni interesim në të:</p>
                    <div class="radio-group-horizontal">
                        <label><input type="radio" name="music" value="rnb" <?php echo (isset($_POST['music']) && $_POST['music'] === 'rnb') ? 'checked' : ''; ?> required> R&B</label>
                        <label><input type="radio" name="music" value="pop" <?php echo (isset($_POST['music']) && $_POST['music'] === 'pop') ? 'checked' : ''; ?>> Pop</label>
                        <label><input type="radio" name="music" value="hiphop" <?php echo (isset($_POST['music']) && $_POST['music'] === 'hiphop') ? 'checked' : ''; ?>> HipHop</label>
                        <label><input type="radio" name="music" value="rock" <?php echo (isset($_POST['music']) && $_POST['music'] === 'rock') ? 'checked' : ''; ?>> Rock</label>
                    </div>
                </div>
                <br>
                <div class="checkbox-group">
                    <label for="check"><pre id="tekst">Pranoj kushtet&termat</pre></label>
                    <input 
                        type="checkbox" 
                        id="check" 
                        name="terms"
                        <?php echo (isset($_POST['terms'])) ? 'checked' : ''; ?>
                        required 
                        title="Duhet të pajtoheni me kushtet dhe termat për të vazhduar.">
                </div>
            
                <button type="submit">Dërgo</button>
            </form>
        </div>
    </section>

    <footer>
        <?php include 'footer.php'; ?>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</html>