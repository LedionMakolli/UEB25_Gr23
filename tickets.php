<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Tickets</title>
    <link rel="icon" href="foto/logo.png" type="image/png">
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
<?php
$BILETA_CMIMI = 100;
?>
      <div class="popup" id="ticket-popup">
        <div class="popup-content">
          <span class="close" onclick="closePopup()">&times;</span>
          <h3>Plotesoni të dhënat për blerjen e biletës</h3>
          <form id="ticket-form" method="POST" action="">
            <input type="text" id="first-name" placeholder="Emri" name="first-name" required>
            <input type="text" id="last-name" placeholder="Mbiemri" name="last-name" required>
            <input type="email" id="email" placeholder="Email" name="email" required>
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



</body>

</html>
