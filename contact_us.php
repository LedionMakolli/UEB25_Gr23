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

        .contact-and-extra input.error,
        .contact-and-extra textarea.error {
            border-color: #dc3545;
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

        .error-message {
            color: #dc3545;
            font-size: 0.8rem;
            margin-top: -0.5rem;
            margin-bottom: 0.5rem;
        }

        .success-message {
            color: #28a745;
            font-size: 1rem;
            text-align: center;
            margin-bottom: 1rem;
            padding: 0.5rem;
            background-color: #d4edda;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <?php include 'nav.php'; ?>

    <section class="contact-and-extra">
        <div class="form-container">
            <h2><mark>Contact Us</mark></h2>
            
            <?php
            // Definimi i variablave dhe gabimeve
            $name = $email = $message = $music = '';
            $termsAccepted = false;
            $errors = [];
            $success = false;

            // perpunimi i formes nese eshte derguar
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                // marrja dhe pastrimi i te dhenave
                $name = trim($_POST['name'] ?? '');
                $email = str_replace(' ', '', trim($_POST['email'] ?? ""));
                $message = trim($_POST['message'] ?? "");
                $music = $_POST['music'] ?? null;
                $termsAccepted = isset($_POST['terms']);

                // validimi i te dhenave me RegEx
                if (!preg_match("/^[a-zA-ZëËçÇ\s]{6,50}$/", $name)) {
                    $errors['name'] = "Emri duhet të përmbajë vetëm shkronja (6-50 karaktere)";
                }
                
                if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
                    $errors['email'] = "Email adresa nuk është valide";
                }
                
                if (!preg_match("/^[\w\s.,!?()-]{1,500}$/", $message)) {
                    $errors['message'] = "Mesazhi përmban karaktere të palejuara ose është më i gjatë se 500 karaktere";
                }
                
                if (empty($music)) {
                    $errors['music'] = "Ju lutemi zgjidhni një zhanër";
                }
                
                if (!$termsAccepted) {
                    $errors['terms'] = "Ju duhet të pranoni kushtet dhe termat";
                }
                
                // nese nuk ka gabime
                if (empty($errors)) {
                    $success = true;
                    
                    // formatimi i emrit (shkronja e pare e madhe)
                    $name = preg_replace_callback(
                        '/\b\w/',
                        function($matches) { return strtoupper($matches[0]); },
                        strtolower($name)
                    );
                }
            }
            ?>
            
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