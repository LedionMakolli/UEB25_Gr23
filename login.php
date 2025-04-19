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
            padding-top: 120px;
            padding-bottom: 100px;
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
            background:rgb(112, 194, 227);
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
            background:rgb(49, 156, 199);
            transform: scale(1.02);
        }

        .register-link {
            text-align: center;
            margin-top: 1rem;
            color: #333;
        }

        .register-link a {
            color: rgb(49, 156, 199);
            text-decoration: none;
            font-weight: bold;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php include 'nav.php'; ?>

    <section class="login-container">
        <div class="login-form">
            <h2>Log In</h2>
            <form id="login-form" method="POST">
                <label for="email">Email:</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email"
                    placeholder="Shkruani email-in tuaj" 
                    required 
                    autocomplete="email">
                
                <label for="password">Password:</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password"
                    placeholder="Shkruani fjalëkalimin tuaj" 
                    required 
                    minlength="6">
                
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

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = trim($_POST["email"] ?? "");
        $password = trim($_POST["password"] ?? "");

        $regEx1 = "/^[^0-9][a-zA-Z_\.\-0-9]{2,}@[a-zA-Z]{4,8}\.[a-z]{2,5}$/";

        if (!preg_match($regEx1, $email)) {
            echo "<script>alert('Email adresa nuk është valide!');</script>";
        }

        if (strlen($password) < 6) {
            echo "<script>alert('Fjalëkalimi duhet të ketë së paku 6 karaktere!');</script>";
        }
    }
    ?>

    <?php
    class User {
        private $id;
        protected $email;
        protected $password;
        public $created_at;
        
        public function __construct($email, $password) {
            $this->email = $email;
            $this->setPassword($password); 
            $this->created_at = date('Y-m-d H:i:s');
            $this->id = uniqid(); 
        }

        public function __destruct() {
            echo "<script>console.log('User me email " . $this->email . " u shkatërrua nga memoria');</script>";
        }        

        public function getId() {
            return $this->id;
        }
        
        public function getEmail() {
            return $this->email;
        }
        
        public function setEmail($email) {
            $this->email = $email;
        }
        
        public function getPassword() {
            return $this->password;
        }
        
        public function setPassword($password) {
            $this->password = password_hash($password, PASSWORD_DEFAULT);
        }
        
        public function verifyPassword($inputPassword) {
            return password_verify($inputPassword, $this->password);
        }
    }
    ?>
</body>
</html>
