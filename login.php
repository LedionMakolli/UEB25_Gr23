<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
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

        .login-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 2rem 5%;
            background: #1b1f24;
            color: var(--white);
            padding-top: 100px;
        }

        .login-form {
            background: #fdfdfd;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-form:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.4);
        }

        .login-form h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: var(--primary-color-dark);
            font-size: 1.8rem;
        }

        .login-form label {
            font-size: 1rem;
            color: #333;
            display: block;
            margin-bottom: 0.5rem;
        }

        .login-form input {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .login-form input:focus {
            border-color: #4bad52;
            box-shadow: 0 0 8px rgba(75, 173, 82, 0.7);
            outline: 2px solid #4bad52;
            outline-offset: 2px;
        }

        .login-form button {
            background: linear-gradient(90deg, #4bad52, #36a344);
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

        .login-form button:hover {
            background: linear-gradient(90deg, #36a344, #4bad52);
            transform: scale(1.02);
        }
    </style>
</head>
<body>
    <div id="nav-placeholder"></div>
    <script src="nav.js"></script>

    <section class="login-container">
        <div class="login-form">
            <h2>Log In</h2>
            <form id="login-form">
                <label for="email">Email:</label>
                <input 
                    type="email" 
                    id="email" 
                    placeholder="Shkruani email-in tuaj" 
                    required 
                    autocomplete="email">
                
                <label for="password">Password:</label>
                <input 
                    type="password" 
                    id="password" 
                    placeholder="Shkruani fjalëkalimin tuaj" 
                    required 
                    minlength="6">
                
                <button type="submit">Kyçu</button>
            </form>
        </div>
    </section>

    <footer>
        <div id="footer"></div>
    </footer>
    <script src="footer.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        document.getElementById("login-form").addEventListener("submit", function(event) {
            event.preventDefault();
            
            const email = document.getElementById("email").value.trim();
            const password = document.getElementById("password").value.trim();

            if (!email || !password) {
                alert("Ju lutem plotësoni të gjitha fushat e kërkuara!");
                return;
            }

            alert("Kyçja u krye me sukses!");
        });
    </script>
</body>
</html>
