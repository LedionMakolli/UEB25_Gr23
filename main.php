<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Illyric</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="../UEB25_Gr23/styles/chat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="foto/logo.png" type="image/png">

  </head>
  <body>
    <?php 
    include 'nav.php';
    include 'php-files/mainPHP.php';

    require_once 'php-files/db.php';
    $ratings = [];
    $stmt = $conn->prepare("SELECT name, rating, review FROM ratings ORDER BY created_at DESC");
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $ratings[] = $row;
    }
    $stmt->close();
    ?>

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
              <a href="signup.php" style="text-decoration: none;">
                <button class="btn1">
                  Get Started
                  <span><i class="ri-arrow-right-line"></i></span>
                </button>
              </a>
              
              <a href="aboutus.php">
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
                <a href="songs.php"><i class="ri-arrow-right-up-line"></i></a>
              </div>
            </div>
            <h4>R&B</h4>
          </div>
          <div class="genre__card">
            <div class="genre__image">
              <img src="foto/pop.jpg" alt="genre" />
              <div class="genre__link">
                <a href="songs.php"><i class="ri-arrow-right-up-line"></i></a>
              </div>
            </div>
            <h4>POP</h4>
          </div>
          <div class="genre__card">
            <div class="genre__image">
              <img src="foto/hiphop.jpg" alt="genre" />
              <div class="genre__link">
                <a href="songs.php"><i class="ri-arrow-right-up-line"></i></a>
              </div>
            </div>
            <h4>HIP HOP</h4>
          </div>
          <div class="genre__card">
            <div class="genre__image">
              <img src="foto/rock.jpg" alt="genre" />
              <div class="genre__link">
                <a href="songs.php"><i class="ri-arrow-right-up-line"></i></a>
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

 <script src="javascript/draganddrop.js"></script>

     
  <section class="client__container">
    <h2 class="section__header">Komente nga klientët</h2>
    <p class="section__description">
      Zbuloni çfarë kanë për të thënë klientët e mi rreth përvojës së tyre me muzikën time.
    </p>
    <div class="swiper">
  <div class="swiper-wrapper">
    <?php
      echo $client1->renderClient();
      echo $client2->renderClient();
      echo $client3->renderClient();
      echo $client4->renderClient();

      foreach ($ratings as $rating) {
              $stars = str_repeat('<span>★</span>', $rating['rating']);
              if ($rating['rating'] < 5) {
                  $stars .= str_repeat('<span>☆</span>', 5 - $rating['rating']);
              }
              
              echo '
              <div class="swiper-slide">
                <div class="client__card">
                  <div class="client__ratings">
                    '.$stars.'
                  </div>
                  <p>'.htmlspecialchars($rating['review'] ?? 'Nuk ka koment').'</p>
                  <div class="client__details">
                    <h4>'.htmlspecialchars($rating['name']).'</h4>
                  </div>
                </div>
              </div>';
          }
    ?>
  </div>
</div>
    </section>
     

 
    <footer>
      <?php include 'footer.php'; ?>
    </footer>
 <script src="../UEB25_Gr23/javascript/chat.js"></script>
   </body>
</html>
