CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname varchar(30) not null,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    role varchar(10) DEFAULT 'client';
);

CREATE TABLE payments (
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  card_number VARCHAR(100) DEFAULT NULL,
  email VARCHAR(100) NOT NULL,
  amount VARCHAR(20) DEFAULT NULL,
  payment_date DATETIME NOT NULL,
) 

CREATE TABLE tickets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    location VARCHAR(100),
    date VARCHAR(50),
    account_number VARCHAR(20),
    expiry_date VARCHAR(10),
    quantity INT,
    total_amount DECIMAL(10,2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users (id)
);
