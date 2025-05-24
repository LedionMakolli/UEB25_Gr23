<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../UEB25_Gr23/styles/chat.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styles/login.css">
    <link rel="icon" href="foto/logo.png" type="image/png">
    
</head>
<body>
    <?php 
    include 'nav.php'; 
    include 'php-files/logInPHP.php';
    ?>

    <section class="login-container">
        <div class="login-form">
            <h2>Log In</h2>
            <form id="login-form" method="POST">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Shkruani email-in tuaj" required autocomplete="email">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Shkruani fjalëkalimin tuaj" required minlength="6">
                <button type="submit">Kyçu</button>
                
                <div class="register-link">
                    Nuk je i regjistruar? <a href="signup.php">Regjistrohu</a>
                </div>
            </form>
        </div>
    </section>
 <div id="chatButton">💬</div>
  <div id="chatPanel">
    <div id="chatHeader">
      <span>Chat with Illyric</span>
      <div id="closeChat">✖️</div>
    </div>
    <div id="chatBody"></div>
    <form id="inputForm">
      <input type="text" id="messageInput" placeholder="Type a message..." autocomplete="off" required />
      <button type="submit">Send</button>
    </form>
  </div>



    <footer>
      <?php include 'footer.php'; ?>
    </footer>
  <script>
    const chatButton = document.getElementById('chatButton');
    const chatPanel = document.getElementById('chatPanel');
    const closeChat = document.getElementById('closeChat');
    const chatBody = document.getElementById('chatBody');
    const form = document.getElementById('inputForm');
    const input = document.getElementById('messageInput');

    chatButton.addEventListener('click', () => {
      chatPanel.style.display = 'flex';
    });
    closeChat.addEventListener('click', () => {
      chatPanel.style.display = 'none';
    });

    form.addEventListener('submit', async e => {
      e.preventDefault();
      const text = input.value.trim();
      if (!text) return;

      
      appendMessage(text, 'user');
      input.value = '';

     
      const loadingDiv = appendMessage('Loading…', 'bot', true);

      try {
        const res = await fetch('chat.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ message: text }),
        });
        const { reply } = await res.json();

        
        loadingDiv.textContent = reply;
        loadingDiv.classList.remove('loading');

      } catch (err) {
        
        loadingDiv.textContent = 'Error: could not reach server';
        loadingDiv.classList.remove('loading');
      }
    });


    function appendMessage(text, role, isLoading = false) {
      const div = document.createElement('div');
      div.className = `message ${role}` + (isLoading ? ' loading' : '');
      div.textContent = text;
      chatBody.appendChild(div);
      chatBody.scrollTop = chatBody.scrollHeight;
      return div;
    }
  </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</html>
