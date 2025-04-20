<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="foto/logo.png" type="image/png">
    
    <style>
        body {
            padding-top: 50px;
            font-family: 'Poppins';
            background: linear-gradient(135deg, #1e1e2f, #3a3b5a);
            color: var(--white);
        }

        .signup-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 2rem 5%;
            background: #1b1f24;
            color: var(--white);
            padding-top: 120px;
            padding-bottom: 100px;
        }

        .signup-form {
            background: #fdfdfd;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .signup-form:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.4);
        }

        .signup-form h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: var(--primary-color-dark);
            font-size: 1.8rem;
        }

        .signup-form label {
            font-size: 1rem;
            color: #333;
            display: block;
            margin-bottom: 0.5rem;
        }

        .signup-form input {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .signup-form input:focus {
            border-color: #4bad52;
            box-shadow: 0 0 8px rgba(75, 173, 82, 0.7);
            outline: 2px solid #4bad52;
            outline-offset: 2px;
        }

        .signup-form button {
            background: rgb(112, 194, 227);
            color: white;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s, transform 0.3s;
            display: block;
            width: 100%;
            font-weight: bold;
        }

        .signup-form button:hover {
            background: rgb(49, 156, 199);
            transform: scale(1.02);
        }
    </style>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        function validateFullname() {
            const fullname = document.getElementById("fullname").value.trim();
            const errorElement = document.getElementById("fullname-error");
            const regex = /^[a-zA-ZëËçÇ\s]{3,50}$/;
            
            if (!regex.test(fullname)) {
                errorElement.textContent = "Emri duhet të përmbajë vetëm shkronja (3-50 karaktere)";
                errorElement.style.display = "block";
                return false;
            } else {
                errorElement.style.display = "none";
                return true;
            }
        }

    </script>
</body>
</html>