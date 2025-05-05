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
        private $email;
        private $password;
        public $created_at;
        
        public function __construct($email, $password) {
            $this->email = $email;
            $this->setPassword($password); 
            $this->created_at = date('Y-m-d H:i:s');
            $this->id = uniqId(); 
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
        public function returnDataforUser() {
            echo "User with ID : " . $this->id . " has email: " . $this->email . " and has been created at " . $this->created_at;
        }   
        function uniqId() {
            return str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT);
        }
        
    }
    ?>
</body>
</html>
