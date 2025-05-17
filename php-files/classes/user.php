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