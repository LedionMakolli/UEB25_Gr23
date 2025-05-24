<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Tickets</title>
    <link rel="icon" href="foto/logo.png" type="image/png">
    <link rel="stylesheet" href="../UEB25_Gr23/styles/chat.css">
    <link rel="stylesheet" href="styles/tickets.css">
</head>
<body>
    <header>
        <h1>Koncertet</h1>
      </header>

      <div class="main-container">
    
        <div class="sidebar">
          <video autoplay muted loop playsinline>
            <source src="videos/video1.mp4" type="video/mp4">
            Shfletuesi juaj nuk e mbështet videon.
          </video>        
          <a href="arrays.php">Rreth Illyric</a>
          <p>Illyric është një artiste e mirënjohur për performancat e saj live dhe albumet e suksesshme. Me shumë vite eksperiencë në skenë, ajo ka fituar zemrat e miliona fansave anembanë botës.</p>
        </div>

        <table class="concert-table">
          <thead>
            <tr>
              <th>Vendi</th>
              <th>Data</th>
              <th>Opsioni</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Tirana</td>
              <td>15 Janar 2025</td>
              <td><button onclick="updateTicket('Tirana', '15 Janar 2025')">Shiko Biletën</button></td>
            </tr>
            <tr>
              <td>Prishtina</td>
              <td>20 Janar 2025</td>
              <td><button onclick="updateTicket('Prishtina', '20 Janar 2025')">Shiko Biletën</button></td>
            </tr>
            <tr>
              <td>Shkupi</td>
              <td>25 Janar 2025</td>
              <td><button onclick="updateTicket('Shkupi', '25 Janar 2025')">Shiko Biletën</button></td>
            </tr>
            <tr>
                <td>Berlin</td>
                <td>30 Janar 2025</td>
                <td><button onclick="updateTicket('Berlin', '30 Janar 2025')">Shiko Biletën</button></td>
              </tr>
              <tr>
                <td>Paris</td>
                <td>5 Shkurt 2025</td>
                <td><button onclick="updateTicket('Paris', '5 Shkurt 2025')">Shiko Biletën</button></td>
              </tr>
              <tr>
                <td>Pragë</td>
                <td>10 Shkurt 2025</td>
                <td><button onclick="updateTicket('Pragë', '10 Shkurt 2025')">Shiko Biletën</button></td>
              </tr>
              <tr>
                <td>Londër</td>
                <td>15 Shkurt 2025</td>
                <td><button onclick="updateTicket('Londër', '15 Shkurt 2025')">Shiko Biletën</button></td>
              </tr>
              <tr>
                <td>Vienna</td>
                <td>20 Shkurt 2025</td>
                <td><button onclick="updateTicket('Vienna', '20 Shkurt 2025')">Shiko Biletën</button></td>
              </tr>
              <tr>
                <td>Budapest</td>
                <td>25 Shkurt 2025</td>
                <td><button onclick="updateTicket('Budapest', '25 Shkurt 2025')">Shiko Biletën</button></td>
              </tr>
            
              
          </tbody>
        </table>
      </div>
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


  
<?php
$BILETA_CMIMI = 100;
?>
      <div class="popup" id="ticket-popup">
        <div class="popup-content">
          <span class="close" onclick="closePopup()">&times;</span>
          <h3>Plotesoni të dhënat për blerjen e biletës</h3>
          <form id="ticket-form" method="POST" action="">
            <input type="text" id="account-number" placeholder="Numri i llogarise" name="account-number" required>
            <input type="text" id="card-expiry" placeholder="Data e skadimit: mm/yy" name="expiry-date" required>
            <input type="number" id="ticket-quantity" value="1" min="1" placeholder="Sasia"  required>
            <input type="text" id="amount" data-cmimi="<?php echo $BILETA_CMIMI;?> " value="<?php echo $BILETA_CMIMI; ?>€" readonly>
            <button type="submit" name="submit">Paguaj</button>
            <button type="button" onclick="closePopup()">Anulo</button>
          </form>
        </div>
      </div>

<?php include('php-files/Tickets.php') ?>
   <div class="ticket-container">
        <div class="ticket">
            <p id="ticket-music">
              <span class="music">MUSIC</span>
              <span class="concert">CONCERT</span></p>
          <div class="dynamic-text location" id="ticket-location">Zgjidhni një vend</div>
          <div class="dynamic-text date" id="ticket-date">Zgjidhni një datë</div>
          <div class="dynamic-text other-info">LIVE MUSIC</div>
          <button  id="buy-button" onclick="showPopup()" disabled>Bli Tani</button>
        </div>
      </div>


<script src="javascript/tickets.js"></script>

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

</body>

</html>
