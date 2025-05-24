<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../UEB25_Gr23/styles/chat.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href = "styles/blog.css">
    <link rel="icon" href="foto/logo.png" type="image/png">

</head>
<body>
     <?php include 'nav.php'; ?>

    <nav class="nav-link">
      <a id="link1" href="#europe-tour-card">Turneu në Evropë</a>
      <a id="link2" href="#new-album">Albumi i Ri</a>
      <a id="link3" href="#concerts">Koncertet</a>
      <a id="link4" href="#new-album2">Albumi i Parë</a>
      <a id="link5" href="#start-story">Si Filloi</a>
  </nav>
    
    <section class="services">
        <div class="container">
          <h2>ATY KU MUZIKA &Euml;SHT&Euml; GJITHCKA </h2>
          <p>ND&Euml;RTOJE BOT&Euml;N RRETH MUZIK&Euml;S T&Euml;NDE</p>
         

          <div class="service-cards">
            <div class="service-card" id="europe-tour-card">
                <p class="service-date">2025</p>
                <div class="service-text">
                    <h3>EUROPE CONCERT TOUR</h3>
                    <ul class="custom-list">
                      <li class="list-item">Turne n&euml;për qytetet më të mëdha të Evropës</li>
                      <li class="list-item">Krijim lidhjesh të veçanta me ndjekësit</li>
                      <li class="list-item">Tregimi i historive përmes muzikës</li>
                      <li class="list-item">Përvoja unike për çdo skenë</li>
                    </ul>
                </div>
                <div class="service-image">
                    <img src="foto/tour.jpg" alt="Shkrim Tekstesh">
                </div>
                <a href="tickets.php" target="_blank">
                <button  class="toggle-btn">Tickets →</button>
                </a>
                </div>
           
            
            <div class="service-card reverse"  id="new-album">
              <p class="service-date">26 QERSHOR 2024</p>
              <div class="service-text">
                <h3 id="s-title" style="color: #a9fb50; font-size: 2rem; margin-bottom: 1rem;">LANCIMI I ALBUMIT T&Euml; RI</h3>
                <ul class="custom-list">
                  <li class="list-item">&Ccedil;do këngë pasqyron emocione dhe përvoja personale</li>
                  <li class="list-item">Videoklipet tregojnë histori të veçanta</li>
                  <li class="list-item">Një udhëtim i gjatë, por frymëzues</li>
                  <li class="list-item">Lidhje unike me audiencën përmes muzikës</li>
                </ul>
              </div>
              <div class="service-image">
                <img src="foto/albumi2.jpg" alt="Videoklipe Kreative">
              </div>
            </div>
            


            <div class="service-card" id="concerts">
              <p class="service-date">12 SHTATOR 2023</p> 
              <div class="service-text">
              <h3>KONCERTET</h3> 
              <ul class="custom-list">
                <li class="list-item">Adrenalina dhe energjia në çdo performancë</li>
                <li class="list-item">Ndjekësit janë burimi i motivimit</li>
                <li class="list-item">Çdo koncert është një përvojë e papërsëritshme</li>
                <li class="list-item">Muzika lidh emocionet dhe historitë</li>
              </ul>
              </div>
              <div class="service-image">
                <img src="foto/c1.jpg" alt="Artist Management">
              </div>       
            </div>


            <div class="service-card reverse" id="new-album2">
              <p class="service-date">4 N&Euml;NTOR 2022</p>
              <div class="service-text">
              <h3>LANCIMI I ALBUMIT T&Euml; PAR&Euml;</h3> 
              <ul class="custom-list">
                <li class="list-item">Albumi është reflektim i shpirtit dhe emocioneve</li>
                <li class="list-item">Çdo këngë ka një histori unike dhe personale</li>
                <li class="list-item">Një proces krijimi që filloi ngadalë, por përfundoi fuqishëm</li>
                <li class="list-item">Një dedikim për ndjekësit dhe artin</li>
              </ul>
              </div>
              <div class="service-image">
                <img src="foto/albumi.jpg" alt="Music Production and Beat Making">
              </div>
            </div>

          
            <div class="service-card" id="start-story">
            <p class="service-date">20 JANAR 2022</p>
            <div class="service-text">
              <h3>SI FILLOI</h3>
              <ul class="custom-list" style="list-style-type: disc;">
                <li class="list-item">Gjithçka nisi nga një dëshirë e fortë për muzikë.</li>
                <li class="list-item">Hapat e parë ishin të vështirë, por plot mësime.</li>
                <li class="list-item">Pasioni më ndihmoi të përballoj çdo sfidë.</li>
                <li class="list-item">Sot, çdo këngë pasqyron këtë udhëtim.</li>
              </ul>
            </div>
            <div class = "service-image">
              <img src="foto/djset.jpg" alt="another blog"> 
            </div>
           </div>

          </div>
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


<script src="../UEB25_Gr23/javascript/chat.js"></script>
</body>
</html>