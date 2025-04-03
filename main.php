<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Illyric</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="foto/logo.png" type="image/png">

  </head>
  <body>
    
    <div id="nav-placeholder"></div>
    <script src="nav.js"></script>

    <header class="header" id="home">
        <div class="section__container header__container">
          <div class="header__image">
            <img src="foto/header.jpg" alt="header" />
          </div>
          <h1>&Ccedil;do zë ka një histori</h1>
          <div class="header__content">
            <h1>Lëre botën të të dëgjoj</h1>
            <p class="section__description">
              Mirë se vini në platformën time – platforma ku talenti yt muzikor bëhet realitet! Krijo, ndaje dhe promovo zërin tënd ndërsa lidhesh me një komunitet artistësh pasionantë. Zëri yt është unik – bëhu ylli i radhës
            </p>
            <div class="header__btns">
              <a href="contact_us.html" style="text-decoration: none;">
                <button class="btn">
                  Get Started
                  <span><i class="ri-arrow-right-line"></i></span>
                </button>
              </a>
              
              <a href="aboutus.html">
                See More
                <span><i class="ri-arrow-right-line"></i></span>
              </a>
            </div>
            <div class="header__stats">
              <div class="header__stats__card">
                <h4><abbr title="90 mije">90K</abbr></h4>
                <p>Përdorues</p>
              </div>
              <div class="header__stats__card">
                <h4>245</h4>
                <p>Muzikë</p>
              </div>
            </div>
          </div>
        </div>
      </header>

      <section class="section__container genre__container">
        <h2 class="section__header">Zgjedh zhanrin tuaj te preferuar</h2>
        <p class="section__description">
          Zbulo zhanret dhe lëre muzikën të jetë udhërrëfyesi yt.
        </p>
        <div class="genre__grid">
          <div class="genre__card">
            <div class="genre__image">
              <img src="foto/r&b.jpg" alt="genre" />
              <div class="genre__link">
                <a href="songs.html"><i class="ri-arrow-right-up-line"></i></a>
              </div>
            </div>
            <h4>R&B</h4>
          </div>
          <div class="genre__card">
            <div class="genre__image">
              <img src="foto/pop.jpg" alt="genre" />
              <div class="genre__link">
                <a href="songs.html"><i class="ri-arrow-right-up-line"></i></a>
              </div>
            </div>
            <h4>POP</h4>
          </div>
          <div class="genre__card">
            <div class="genre__image">
              <img src="foto/hiphop.jpg" alt="genre" />
              <div class="genre__link">
                <a href="songs.html"><i class="ri-arrow-right-up-line"></i></a>
              </div>
            </div>
            <h4>HIP HOP</h4>
          </div>
          <div class="genre__card">
            <div class="genre__image">
              <img src="foto/rock.jpg" alt="genre" />
              <div class="genre__link">
                <a href="songs.html"><i class="ri-arrow-right-up-line"></i></a>
              </div>
            </div>
            <h4>ROCK</h4>
          </div>
        </div>
      </section>

      
  <section class="section__container banner__container">
    <h2>
      Qëllimi im është që të krijoj kënaqësi për dëgjuesit e mi!
    </h2>
  </section>

  <section class="section__container feature__container">
    <div class="feature__image">
      <img src="foto/dj.avif" alt="feature" width="auto" height="auto"/>
    </div>
    <div class="feature__content">
      <h2 class="section__header">Veçoritë më të mira</h2>
      <ul class="feature__list" id="feature-list">
        <li class="feature__card" draggable="true" id="feature-1">
            <span>01</span>
            <div>
              <h4>Çmimi më i mirë</h4>
              <p>
                  Me angazhimin tim për të ofruar çmimin më të përballueshëm, mund të shijoni pasionet tuaja muzikore pa u shqetësuar për xhepin tuaj.
              </p>
          </div>
        </li>
        <li class="feature__card" draggable="true" id="feature-2">
            <span>02</span>
            <div>
              <h4>Copyright Free</h4>
              <p>
                  Koleksioni im ofron një përzgjedhje këngësh copyright free, duke siguruar që t'i përdorni ato në projektet tuaja pa shqetësime.
              </p>
          </div>
        </li>
        <li class="feature__card" draggable="true" id="feature-3">
            <span>03</span>
            <div>
              <h4>Cilësi e lartë</h4>
              <p>
                  Çdo këngë në koleksionin tim të përzgjedhur është krijuar me kujdes për të ofruar një qartësi dhe pasuri tingulli të pa krahasueshëm.
              </p>
          </div>
        </li>
      </ul>
    </div>
  </section>

  <script>
    // drag & drop

        const featureList = document.getElementById("feature-list");
        let draggedItem = null;

        featureList.addEventListener("dragstart", (event) => {
          draggedItem = event.target.closest(".feature__card");
          event.target.style.opacity = 0.5;
        })

        featureList.addEventListener("dragover", (event) => {
          event.preventDefault();
        })

        featureList.addEventListener("drop", (event) => {
         event.preventDefault();
         
         let targetCard = event.target.closest(".feature__card");
         if(targetCard && draggedItem !== event.target){
          const draggedIndex = Array.from(featureList.children).indexOf(draggedItem);
          const targetIndex = Array.from(featureList.children).indexOf(event.target);

          if(draggedIndex < targetIndex){
            featureList.insertBefore(draggedItem, targetCard.nextSibling);
          }else{
            featureList.insertBefore(draggedItem,targetCard);
          }
         }
         draggedItem.style.opacity = 1;
        });

        featureList.addEventListener("dragend", (event) => {
          if(draggedItem){
            draggedItem.style.opacity = 1;
          }
        });
  </script>
     
  <section class="client__container">
    <h2 class="section__header">Komente nga klientët</h2>
    <p class="section__description">
      Zbuloni çfarë kanë për të thënë klientët e mi rreth përvojës së tyre me muzikën time.
    </p>
    <div class="swiper">
      <div class="swiper-wrapper">
        
      
          </div>
      </div>
    </section>
<script>
  function Client(name, position, comment, rating, imageSrc) {
          this.name = name;
          this.position = position;
          this.comment = comment;
          this.rating = rating;
          this.imageSrc = imageSrc;
        }

        const client1 = new Client(
          "Luan", 
          "Trajner Fitnesi", 
          "Sesionet e mia të stërvitjes kanë arritur nivele të reja intensiteti dhe motivimi, falë ritmeve energjike dhe këngëve fuqizuese që Illyric ka bërë.", 
          5, 
          "foto/gymtrainer.jpg"
        );

        const client2 = new Client(
          "Sara", 
          "Menaxhere Marketingu", 
          "Në mes të orarit tim të ngarkuar, meloditë qetësuese të Illyric ofrojnë një shpëtim të nevojshëm, duke më lejuar të relaksohem dhe të rimarr energji.", 
          5, 
          "foto/marketingmanager.jpg"
        );
        
        const client3 = new Client(
          "Vjollca", 
          "Edukatore", 
          "Duke shfrytëzuar meloditë qetësuese të Illyric, krijoj një ambient të qetë mësimor në klasën time dhe nxis suksesin akademik mes studentëve të mi.", 
          5, 
          "foto/teacher.jpg"
        );
        const client4 = new Client(
          "Arti", 
          "Artist", 
          "Si krijues muzike, gjithmonë befasohem nga krijimtaria dhe inovacioni që Illyric sjell në dispozicion, duke inspiruar përpjekjet e mia artistike.", 
          5, 
          "foto/rapper.jpg"
        );
        function renderClient(client) {
          return `
            <div class="swiper-slide">
              <div class="client__card">
                <div class="client__ratings">
                  ${'<span><i class="ri-star-fill"></i></span>'.repeat(client.rating)}
                </div>
                <p>${client.comment}</p>
                <div class="client__details">
                  <img src="${client.imageSrc}" alt="client" />
                  <div>
                    <h4>${client.name}</h4>
                    <h5>${client.position}</h5>
                  </div>
                </div>
              </div>
            </div>
          `;
        }
        const swiperWrapper = document.querySelector('.swiper-wrapper');
        swiperWrapper.innerHTML = `
          ${renderClient(client1)}
          ${renderClient(client2)}
          ${renderClient(client3)}
          ${renderClient(client4)}
        `;
</script>



  <footer>
    <div id="footer"></div>
</footer>
<script src="footer.js"></script>
   </body>
</html>
