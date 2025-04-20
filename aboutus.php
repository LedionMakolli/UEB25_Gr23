<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="foto/logo.png" type="image/png">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        .main_section {
            display: flex;
            flex-direction: column;
            padding: 0px 0px 20px 0px;
            justify-content: center;
            align-items: center;
        }

        body {
            padding-top: 80px;
        }

        table {
            width: 80%;
            margin-top: 20px;
            border-collapse: collapse;
            border-radius: 1rem;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            margin-left: auto;
            margin-right: auto;
            opacity: 0;
            max-height: 0;
            overflow: hidden;
            display: none;
            transition: opacity 1s ease, max-height 1s ease;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
            font-weight: bold;
            width: 200px;
            height: 50px;
            box-sizing: border-box;

        }

        th {
            background-color: #223439;
            color: white;

        }

        td {
            background-color: #e8f5e9;
            font-size: 14px;

        }

        tr:nth-child(odd) td {
            background-color: #e8f5e9;
        }

        tr:hover td {
            background-color: #b3deb6;
        }

        tr:hover td {
            background-color: #b3deb6;
        }

        .btn10 {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            margin-top: 20px;
            left: 50%;
            transition: background-color 0.3s, transform 0.3s;
            position: relative;
            transform: translateX(-50%);
        }

        .btn10:hover {
            background-color: #4CAF50;
            transform: translateX(-50%) scale(1.05);
        }

        #pricing {
            margin-top: 20px;
            padding: 20px;
        }

        .historical-timeline {
            padding: 20px;
            margin: 0 auto;
            max-width: 1200px;
            margin-top: 40px;
        }

        .Top-Kengetaret {
            margin-top: 100px;
        }




        .popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            padding: 20px;
            box-sizing: border-box;
        }

        .popup-content {
            position: relative;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }

        .popup-content h3 {
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        .popup-content input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }

        .popup-content button {
            padding: 10px 20px;
            margin: 10px 5px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
        }

        .popup-content button[type="submit"] {
            background-color: #28a745;
            color: white;
        }

        .popup-content button[type="button"] {
            background-color: #dc3545;
            color: white;
        }

        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .popup .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 1.5em;
            cursor: pointer;
        }

        .masthead {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }

        .video-background video {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            object-fit: cover;
            transform: translate(-50%, -50%);
        }

        .masthead-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
            z-index: 10;
        }

        .masthead-subheading {
            font-size: 2rem;
            font-weight: bold;
            color: #1b86a7;
        }

        .masthead-heading {
            font-size: 3rem;
            font-weight: bold;
            margin-top: 1rem;
        }

        #spcolor {
            color: #7496aa;
            font-size: 4rem;
        }

        .fa-stack .fa-circle {
            color: #4CAF50 !important;
        }

        #services {
            margin-bottom: 230px;
        }

        .section__header {
            font-weight: bold;
        }

        #services h4 {
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
        }

        #services p {
            font-size: 1.2rem;
            color: var(--text-light);
            margin-top: 10px;
        }
        .pricing-button{
            display: inline-block;
    padding: 12px 24px;
    border: none;
    border-radius: 4px;
    
    
    background-color: #4CAF50; /* Primary green */
    color: white;
    
    
    font-size: 16px;
    font-weight: 600;
    text-align: center;
    text-decoration: none


        }

        .timeline {
            list-style: none;
            padding: 0;
            position: relative;
        }

        .timeline::before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            width: 2px;
            left: 50%;
            border: 2px solid transparent;
            border-image: url('foto/concert.jpg') 30 stretch;
            transform: translateX(-50%);
        }

        .timeline>li {
            margin-bottom: 50px;
            position: relative;
            width: 50%;
            padding-right: 20px;
        }

        .timeline-pannel {
            padding: 20px;
            background: white;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .timeline-pannel {
            position: relative;
            z-index: 2;
        }

        .timeline>li:nth-child(odd) {
            left: 50%;
            padding-left: 20px;
        }

        .timeline-pannel :hover {
            transform: scale(1.05);
            transition: 0.3s ease;
        }

        .timeline p {
            word-wrap: break-word;
            line-height: 1.6;
            font-size: 1em;
        }

        .timeline-item:hover {
            transform: scale(1.05);
            transition: 0.3s ease;
        }

        .subheading:hover {
            transform: scale(1.05);
            transition: 0.3s ease;
        }

        .list-container {
            padding: 20px;
            background-color: #1b1f24;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        .list-container ol {
            padding-left: 20px;
            list-style: none;
            margin: 0;
            counter-reset: list-counter;
        }

        .list-container ol>li {
            position: relative;
            font-size: 18px;
            margin-bottom: 15px;
            padding-left: 40px;
            font-weight: bold;
            color: white;
        }

        .list-container ol>li::before {
            content: counter(list-counter) ".";
            counter-increment: list-counter;
            position: absolute;
            left: 0;
            top: 0;
            font-size: 24px;
            font-weight: bold;
            color: #4CAF50;
        }

        .list-container ul {
            margin-top: 8px;
            padding-left: 20px;
            list-style-type: disc;
            font-size: 16px;
            color: #555;
        }

        .list-container ul li {
            font-weight: normal;
            line-height: 1.6;
        }

        .row {
            text-align: center;
            justify-content: center;
            display: flex;
        }

        .col {
            padding: 20px;
            text-align: center;
            width: 100%;
            max-width: 100%;
            align-items: center;
            justify-content: center;
            height: 300px;
            word-wrap: break-word;
        }

        #artistTable {
            border-spacing: 10px;
        }

        .div2 {
            width: 100%;
            height: 75px;
            background-color: #223439;
            background-image: url(foto/div_foto.png);
            background-size: cover;
            background-origin: padding-box;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
        }

        @media (max-width: 768px) {
            #services {
                margin-bottom: 430px;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <!-- <div id="nav-placeholder"></div>
    <script src="nav.js" defer></script> -->

    <?php include 'nav.php'; ?>

    <section class="main_section">
        <header class="masthead">
            <div class="video-backgournd">
                <video autoplay loop muted playsinline>
                    <source src="vid_abus.mp4" type="video/mp4">
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

        <div class="div2"></div>



        <!-- historiku -->
        <section class="page-section" id=about>
            <div class="container">
                <ul class="timeline">
                    <li>
                        <div class="timeline-pannel">
                            <h4>2010</h4>
                            <h4 class="subheading">Fillimi i Karrierës</h4>
                            <p>Unë fillova karrierën time si një producente në vitin 2010, duke krijuar hite për artistët e njohur të kohës.</p>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-pannel">
                            <h4>2015</h4>
                            <h4 class="subheading">Bashkëpunimi me artistët Ndërkombëta</h4>
                            <p>Fillova të bashkëpunoj me disa prej artistëve më të njohur ndërkombëtar, duke sjellë një ndikim të ri në industrinë muzikorë.</p>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-pannel">
                            <h4>2020</h4>
                            <h4 class="subheading">Hitet që ndryshuan muzikën</h4>
                            <p>Me një stil të ri dhe eksperimente të suksesshme, krijova disa nga hitet më të njohura që morën çmime të shumta.</p>
                    </li>
                    <li>
                        <div class="timeline-pannel">
                            <h4>2022</h4>
                            <h4 class="subheading">Turnet Ndërkombëtare</h4>
                            <p>Në 2022, nisa nje turne botëror, duke vizituar disa nga qytet më të mëdha të muzikës globale, duke sjellë performanca të paharrueshme, si për mua, ashtu edhe për publikun.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </section>


        <!-- Top Kengetaret -->
        <section class="Top-Kengetaret">
            <h3 class="section__header">Top K&euml;ng&euml;tar&euml;t</h3>
            <div class="table-container">
                <table id="artistTable">
                    <tr>
                        <th>Emri</th>
                        <th>K&euml;nga m&euml; e re</th>
                        <th>K&euml;nga me m&euml; s&euml; shumti klikime</th>
                        <th>Zhanri</th>
                        <th>Viti i Debutit</th>
                    </tr>
                    <tr>
                        <td>Eminem</td>
                        <td>Houdini</td>
                        <td>
                            <p>River</p>
                        </td>
                        <td>Pop</td>
                        <td>2017</td>
                    </tr>
                    <tr>
                        <td>The Weeknd</td>
                        <td>Dance In The Flames </td>
                        <td>
                            <p>Starboy</p>
                        </td>
                        <td>Pop</td>
                        <td>2016</td>
                    </tr>
                    <tr>
                        <td>Sza</td>
                        <td>Open Arms</td>
                        <td>
                            <p>Kill Bill</p>
                        </td>
                        <td>Pop</td>
                        <td>2022</td>
                    </tr>
                </table>
                <button class="btn10" id="toggleTable">Top K&euml;ng&euml;tar&euml;t</button>
            </div>
        </section>
    </section>

    <br><br>

    <section>
        <h3 class="section__header">Top 3 Këngët e Muajit</h3>
        <div class="list-container">
            <ol>
                <li>
                    Space Bound
                    <ul>
                        <li>Artist: Illyric ft. Eminem</li>
                    </ul>
                </li>
                <li>
                    Stargirl Interlude
                    <ul>
                        <li>Artist: Illyric ft. The Weeknd</li>
                    </ul>
                </li>
                <li>
                    Temperature
                    <ul>
                        <li>Artist: Illyric ft. Sean Paul</li>
                    </ul>
                </li>
            </ol>
        </div>
    </section>

    <br><br>

   


    <!-- <footer>
    <div id="footer"></div>
</footer>
<script src="footer.js"></script> -->

    

    <?php
// Define pricing plans as numerical arrays
$monthlyPrices = array(0, 29, 199, 299);
$yearlyPrices = array(0, 299, 1999, 2999);

// Plan features array
$planFeatures = array(
    array(
        "Dëgjoni hite të pabesueshme",
        "Muzika ime është e diponueshme falas",
        "Për ju, mundësite jane të pafundme"
    ),
    array(
        "Qasje ekskluzive në publikime të reja muzikore",
        "Prioritet për rezervime në evente",
        "Një playlist i personalizuar në muaj"
    ),
    array(
        "Feedback i personalizuar për kompozim muzikor",
        "Qasje në tutorials për kompozim muzikor",
        "Katër playlist-a të personalizuar në muaj"
    ),
    array(
        "Kompozim muzikor i personalizuar",
        "Zbritje deri në 30% për biletat VIP",
        "Pafund playlist-a të personalizuar"
    )
);


$planTitles = array(
    "Shijo Muziken falas",
    "Plani Bazik",
    "Plani i Biznesit",
    "Plani i Ndërmarrjes"
);


$selectedPlanType = isset($_GET['planType']) && $_GET['planType'] === 'monthly' ? 'monthly' : 'yearly';


$showPopup = false;
$formData = [];
$paymentSuccess = false;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_payment'])) {
    
    $formData = [
        'first_name' => $_POST['first_name'] ?? '',
        'last_name' => $_POST['last_name'] ?? '',
        'email' => $_POST['email'] ?? '',
        'account_number' => $_POST['account_number'] ?? '',
        'plan_name' => $_POST['plan_name'] ?? '',
        'plan_type' => $_POST['plan_type'] ?? '',
        'amount' => $_POST['amount'] ?? ''
    ];
    
   
    if (empty($formData['first_name'])) $errors[] = 'Emri është i detyrueshëm';
    if (empty($formData['last_name'])) $errors[] = 'Mbiemri është i detyrueshëm';
    if (empty($formData['email']) || !filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) $errors[] = 'Email i pavlefshëm';
    if (empty($formData['account_number'])) $errors[] = 'Numri i llogarisë është i detyrueshëm';
    
    if (empty($errors)) {
        $paymentSuccess = true;
        
    }
}


if (isset($_GET['showPopup']) && $_GET['showPopup'] === 'true' && isset($_GET['planIndex'])) {
    $planIndex = (int)$_GET['planIndex'];
    if ($planIndex >= 0 && $planIndex < count($planTitles)) {
        $showPopup = true;
        $selectedPlan = $planTitles[$planIndex];
        $selectedAmount = $selectedPlanType === 'monthly' ? $monthlyPrices[$planIndex] : $yearlyPrices[$planIndex];
    }
}
?>

<div class="pricing-container" id="pricing">
    <h1>Plani i çmimeve</h1>
    <p style="color: var(--text-light);">Zgjedhni planin më të përshtatshëm për ju</p>
    <br>
    <div class="toggle-buttons">
        <a href="?planType=monthly" class="monthly <?php echo $selectedPlanType === 'monthly' ? 'active' : ''; ?>">Mujore</a>
        <a href="?planType=yearly" class="yearly <?php echo $selectedPlanType === 'yearly' ? 'active' : ''; ?>">Vjetore</a>
    </div>
    <div class="pricing-plans">

        <?php for ($i = 0; $i < count($planTitles); $i++): ?>
        <div class="pricing-plan">
            <h2><?php echo $planTitles[$i]; ?></h2>
            <p class="price">
                <?php 
                $currentPrice = $selectedPlanType === 'monthly' ? $monthlyPrices[$i] : $yearlyPrices[$i];
                $comparePrice = $selectedPlanType === 'monthly' ? $yearlyPrices[$i] : $monthlyPrices[$i];
                echo $currentPrice . '&euro; <span>' . $comparePrice . '&euro;</span>';
                ?>
            </p>
            <ul>
                <?php foreach ($planFeatures[$i] as $feature): ?>
                <li><?php echo $feature; ?></li>
                <?php endforeach; ?>
            </ul>
            <div>
                <?php if ($i === 0): ?>
                    <button>Dëgjo Falas</button>
                <?php else: ?>
                    <a href="?planType=<?php echo $selectedPlanType; ?>&showPopup=true&planIndex=<?php echo $i; ?>#pricing" class="pricing-button">Paguaj Tani</a>
                <?php endif; ?>
            </div>
        </div>
        <?php endfor; ?>

    </div>
</div>

<?php if ($showPopup || ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_payment']))): ?>
<div class="popup" id="ticket-popup" style="display: block;">
    <div class="popup-content">
        <span class="close" onclick="closePopup()">&times;</span>
        
        <?php if ($paymentSuccess): ?>
            <h3>Faleminderit për blerjen!</h3>
            <p>Pagesa për planin <strong><?php echo htmlspecialchars($formData['plan_name']); ?> (<?php echo $formData['plan_type'] === 'monthly' ? 'Mujore' : 'Vjetore'; ?>)</strong> 
            në shumën <strong><?php echo htmlspecialchars($formData['amount']); ?></strong> u krye me sukses.</p>
            <p>Do të merrni një email konfirmimi në <strong><?php echo htmlspecialchars($formData['email']); ?></strong>.</p>
            <button onclick="closePopup()">Mbylle</button>
        
        <?php else: ?>
            <h3>Plotësoni të dhënat për pagesën e planit të zgjedhur</h3>
            <p><strong><?php echo htmlspecialchars($selectedPlan ?? $formData['plan_name']); ?> (<?php echo ($selectedPlanType ?? $formData['plan_type']) === 'monthly' ? 'Mujore' : 'Vjetore'; ?>)</strong></p>
            
            <?php if (!empty($errors)): ?>
                <div class="error-message">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <form id="ticket-form" method="post">
                <input type="text" id="first-name" name="first_name" placeholder="Emri" value="<?php echo htmlspecialchars($formData['first_name'] ?? ''); ?>" required>
                <input type="text" id="last-name" name="last_name" placeholder="Mbiemri" value="<?php echo htmlspecialchars($formData['last_name'] ?? ''); ?>" required>
                <input type="email" id="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($formData['email'] ?? ''); ?>" required>
                <input type="text" id="account-number" name="account_number" placeholder="Numri i llogarisë" value="<?php echo htmlspecialchars($formData['account_number'] ?? ''); ?>" required>
                <input type="hidden" name="plan_name" value="<?php echo htmlspecialchars($selectedPlan ?? $formData['plan_name'] ?? ''); ?>">
                <input type="hidden" name="plan_type" value="<?php echo htmlspecialchars($selectedPlanType ?? $formData['plan_type'] ?? ''); ?>">
                <input type="text" id="amount" name="amount" value="<?php echo htmlspecialchars($selectedAmount ?? $formData['amount'] ?? '0'); ?>€" readonly>
                <input type="hidden" name="submit_payment" value="1">
                <button type="submit">Paguaj</button>
                <a href="#" onclick="closePopup(); return false;" class="button-style">Anulo</a>
            </form>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>

<script>
    
    
    
   

    <footer>
        <?php include 'footer.php'; ?>
    </footer>
</script>

<script>
    function closePopup() {
        const url = new URL(window.location.href);
        url.searchParams.delete('showPopup');
        url.searchParams.delete('planIndex');
        window.location.href = url.toString();
    }
</script>
</body>

</html>