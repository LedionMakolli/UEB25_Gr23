<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="foto/logo.png" type="image/png">

<style>

html{
  scroll-behavior: smooth;
  scroll-padding-top: 90px;
}
.services {
    padding: 4rem 1rem;
    background-color: var(--primary-color-dark);
    color: var(--white);
    text-align: center;
  }
  
  .services h2 {
    font-size: 2.5rem;
    font-weight: 500;
    color: var(--secondary-color);
    margin-bottom: 1rem;
  }
  
  .services p {
    font-size: 1rem;
    color: var(--text-light);
    margin-bottom: 2rem;
  }
  
  .service-cards {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 1.5rem;
  }

  .service-card {
  position: relative;
  display: flex;
  flex-direction: row;
  align-items: center;
  padding: 1.5rem;
  max-height: 500px;
  color: var(--white);
  text-align: left;
  background-color: var(--primary-color);
  border-radius: 10px; 
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  padding: 40px 40px; 
  gap: 50px; 
  width: 100%; 
  margin-bottom: 40px;
  margin-top: 40px; 
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  overflow: hidden;
}
  
.service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
    transition: transform 0.3s ease;
  }

@media (max-width: 1024px) {
    .service__card {
        width: calc(50% - 1.5rem);
    }
}
@media (max-width: 768px) {
  .service__card {
      width: 100%;
  }
}

.service-card.reverse {
  flex-direction: row-reverse;
}


.container {
  width: 100%;
  max-width: 100%;
  margin: 0;
  padding: 0 9rem;
}

.service-text {
  flex: 1;
  color: #ffffff;
}

.service-text h3 {
  font-size: 2.5rem;
  color: #a9fb50;
  margin-bottom: 1rem;
}

.service-image {
  flex: 1;
  width: auto;
  padding: 10px;
  height: 450px;
  display: flex;
  justify-content: center;
  align-items: center;
  object-fit: cover;
  border-radius:10px;
  border: 2px solid var(--primary--color);
  overflow: hidden;
}

@media (min-width: 1200px) {
  .service-card {
    padding: 4rem;
    gap: 3rem;
  }

  .service-text h3 {
    font-size: 2rem;
  }

  .service-text p {
    font-size: 1rem;
  }
}

.service-date {
  position: absolute;
  top: 0.1rem; 
  font-size: 0.5px;
  right: 1rem; 
  color: var(--secondary-color); 
  padding: 0.2rem 0.3rem; 

}

.toggle-btn {
    position: absolute;
    bottom: 1rem;
    right: 1rem;
    background-color: var(--primary-color);
    color: var(--secondary-color);
    border: none;
    border-radius: 5px;
    padding: 0.5rem 1rem;
    font-size: 1rem; 
    cursor: pointer;
    transition: background-color 0.3s, transform 0.2s;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: color 0.3s ease;
}

.toggle-btn:hover {
    color: var(--text-light); 
}

#list-item-1,
#list-item-2,
#list-item-3,
#list-item-4 {
  margin-bottom: 0.5rem;
  font-size: 1rem;
  color: #ffffff;
}

.nav-link {
  display: flex;  
}

.nav-link a {
  text-decoration: none;
  color: #ffffff; 
  font-size: 1rem; 
  padding: 10px; 
  border-radius: 5px; 
  transition: color 0.3s, background-color 0.3s; 
}

.nav-link a:hover {
  color: #a9fb50; 
  background-color: #333; 
}

</style>

</head>
<body>
    <header class="header">
        <div class="container">
            
            <div id="nav-placeholder"></div>
              </div>
    </header>
    <script src="nav.js"></script>

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
                <a href="tickets.html" target="_blank">
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
      
      <footer>
        <div id="footer"></div>
    </footer>
    <script src="footer.js">
    </script>


</body>
</html>