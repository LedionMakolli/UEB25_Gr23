<?php
session_start();

require_once("php-files/db.php"); 


if (isset($_GET['payment_error']) && !empty($_SESSION['payment_errors'])) {
    echo '<script>alert("Gabimet:\\n\\n' . implode("\\n", $_SESSION['payment_errors']) . '");</script>';
    unset($_SESSION['payment_errors']);
}

$isStaff = isset($_SESSION['role']) && $_SESSION['role'] === 'staff';


$form_data = $_SESSION['form_data'] ?? [];
unset($_SESSION['form_data']);

$hasPaid = false;

if ($isStaff) {
    $hasPaid = true;
}elseif (!empty($_SESSION['user_email'])) {
    $email = $_SESSION['user_email'];

    $stmt = $conn->prepare("SELECT * FROM payments WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $hasPaid = true;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styles/aboutus.css">
    <link rel="stylesheet" href="../UEB25_Gr23/styles/chat.css">
   
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="foto/logo.png" type="image/png">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .pricing-plan a {
        display: block;
        width: 100%;
        padding: 0.75rem;
        border: none;
        background-color: #4CAF50;
        color: #fff;
        font-weight: 600;
        font-family: 'Poppins', sans-serif;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        text-align: center;
        font-size: small;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <!-- <div id="nav-placeholder"></div>
    <script src="nav.js" defer></script> -->

    <?php 
    include 'nav.php';
     ?>

    <section class="main_section">
        <header class="masthead">
            <div class="video-backgournd">
                <video autoplay loop muted playsinline>
                    <source src="videos/vid_abus.mp4" type="video/mp4">
                </video>
            </div>
            <div class="container">
                <div class="masthead-content">
                    <div class="masthead-subheading"> Mirë se vini në faqen time!</div>
                    <div class="masthead-heading">Aty ku muzika është magjike, <span id="spcolor">ILLYRIC</span></div>
                </div>
            </div>
        </header>


        <!-- rreth nesh -->
        <section class="section__container">
            <div class="div-about-us">
                <h2 class="section__header">Rreth ILLYIRC</h2>
                <p class="section__description">
                    <strong>Illyric</strong> është emri që vendosa t'i vë vetes, duke promovuar prejardhjen time Ilire dhe dashurinë për muzikë. Me një karrierë qe shtrihet mbi nje dekadë, kam pasur shumë bashkëpunime me disa nga emrat më të njohur të muzikës boteror, por edhe lokale.
                </p>
                <ul class="section__description">
                    <li>Grammy Award për Prodhimin me te mire Muzikor.</li>
                    <li>Billboard Music Award per Albumin më të mirë të remikseve.</li>
                    <li>MTV Music Award per videon më të mirë të prodhimit.</li>
                    <li>Platinum Certification për disa nga hitet e mia më të mëdha.</li>
                </ul>
            </div>
        </section>

        <section class="page-section" id="services">
            <div class="page-section-div">
                <h2 class="section__header">Shërbimet</h2>
                <br>
            </div>
            <div class="row">
                <div class="col">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fas fa-microphone fa-stack-1x  fa-inverse"></i>
                    </span>
                    <h4>Produksioni Muzikor</h4>
                    <p>Ne ofrojmë mundësi të shkëlqyera për krijimin e muzikës profesionale. Mund të prodhojmë këngë, albume dhe kompozime të personalizuara për artistë.</p>
                </div>
                <div class="col">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-video fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4>Video Produksion</h4>
                    <p>Ofrojmë shërbime për krijimin e videove muzikore me një cilësi të lartë. Nga konceptimi deri në post-produksion, ne kujdesemi për çdo detaj.</p>
                </div>
                <div class="col">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-headphones fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4>Mastering dhe Mixim</h4>
                    <p>Sigurojmë një eksperiencë të shkëlqyer audio për artistët tanë, duke ofruar shërbime profesionale të mastering dhe miximi për të sjellë tinguj të pastër dhe të fuqishëm.</p>
                </div>
            </div>
            </div>
        </section>

<div class="pricing-container" id="pricing" style="display: block;">
        <h1>Plani i &ccedil;mimeve</h1>
        <p style="color: var(--text-light);">Zgjedhni planin më të përshtatshëm për ju</p>
        <br>
        <div class="toggle-buttons">
            <button class="monthly">Mujore</button>
            <button class="yearly active">Vjetore</button>
        </div>
        <div class="pricing-plans">

            <!-- Pricing plan 0 -->

            <div class="pricing-plan">
                <h2>Shijo Muziken falas</h2>
                <p class="price"> 0&euro; <span>0&euro;</span></p>
                <ul>
                    <li>Dëgjoni hite të pabesueshme</li>
                    <li>Muzika ime është e diponueshme falas</li>
                    <li>Për ju, mundësite jane të pafundme</li>
                </ul>
                <div>
                     <?php if (!empty($_SESSION['user_id'])): ?>
                     <a href="songs.php">Shiko Muziken</a>
                    <?php else: ?>
                     <a href="#" onclick="alert('Ju lutemi kyçuni për të shijuar muzikën!')">Shiko Muziken</a>
                     <?php endif; ?>
                </div>
            </div>

            <!-- Pricing plan 1 -->
            <div class="pricing-plan">
                <h2>Plani Bazik</h2>
                <p class="price">29&euro; <span>299&euro;</span></p>
                <ul>
                    <li>Qasje ekskluzive në publikime të reja muzikore</li>
                    <li>Prioritet për rezervime në evente</li>
                    <li>Një playlist i personalizuar në muaj</li>
                </ul>
                 <?php if (!empty($_SESSION['user_email'])): ?>
                <?php if ($hasPaid): ?>
                    <button class="pay-now" disabled style="cursor: not-allowed; opacity: 0.6;">
                        Ke paguar tashmë
                    </button>
                <?php else: ?>
                    <button class="pay-now" data-plan="Plani Bazik" data-amount="29">
                        Paguaj Tani
                    </button>
                <?php endif; ?>
            <?php else: ?>
                <button class="pay-now" disabled style="cursor: not-allowed;">
                    Paguaj Tani
                </button>
            <?php endif; ?>
            </div>
        </div>
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

   <div class="popup" id="ticket-popup" style="display: none;">
    <div class="popup-content">
        <span class="close" onclick="closePopup()">&times;</span>
        <h3>Plotësoni të dhënat për pagesën e planit të zgjedhur</h3>
        <p id="pricing-type"></p>

        <!-- Këtu vendos formën me action -->
        <form id="payment-form" method="POST" action="php-files/aboutus_payment.php">
            <input type="text" name="card_number" placeholder="Kartela e bankes" required>
            <input type="text" name="expiryDate" placeholder="Data e skadimit: mm/yy" required>
            <input type="text" id="amount" name="amount" placeholder="Shuma (€)" readonly >
            <button type="submit">Paguaj</button>
            <button type="button" onclick="closePopup()">Anulo</button>
        </form>
    </div>
</div>
<script src="../UEB25_Gr23/javascript/chat.js"></script>
<?php

if (isset($_GET['payment_success'])) {
    echo "<script>
        alert('Pagesa u krye me sukses!');
        if (history.replaceState) {
          const url = new URL(window.location);
          url.searchParams.delete('payment_success');
          history.replaceState(null, '', url);
        }
    </script>";
}
?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  window.isLoggedIn = <?= empty($_SESSION['user_id']) ? 'false' : 'true' ?>;
</script>
<script src="javascript/aboutus.js"></script>


    <footer style="width: 100%;">
      <?php include 'footer.php'; ?>
    </footer>


</script>
</body>

</html>