<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styles/aboutus.css">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="foto/logo.png" type="image/png">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
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

    

<div class="pricing-container" id="pricing">
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
                    <button>Degjo Falas</button>
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
                <button>Paguaj Tani</button>
            </div>

            <!-- Pricing plan 2 -->

            <div class="pricing-plan">
                <h2>Plani i Biznesit</h2>
                <p class="price">199&euro; <span>1999&euro;</span></p>
                <ul>
                    <li>Feedback i personalizuar për kompozim muzikor</li>
                    <li>Qasje në tutorials për kompozim muzikor</li>
                    <li>Kat&euml;r playlist-a të personalizuar në muaj</li>
                </ul>
                <button>Paguaj Tani</button>
            </div>

            <!-- Pricing plan 3 -->

            <div class="pricing-plan">
                <h2>Plani i Ndërmarrjes</h2>
                <p class="price">299&euro; <span>2999&euro;</span></p>
                <ul>
                    <li>Kompozim muzikor i personalizuar</li>
                    <li>Zbritje deri në 30% për biletat VIP</li>
                    <li>Pafund playlist-a të personalizuar</li>
                </ul>
                <button>Paguaj Tani</button>
            </div>
        </div>
    </div>

    <div class="popup" id="ticket-popup" style="display: none;">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <h3>Plotësoni të dhënat për pagesën e planit të zgjedhur</h3>
            <p id="pricing-type"></p>
            <form id="ticket-form">
                <input type="text" id="first-name" placeholder="Emri" required>
                <input type="text" id="last-name" placeholder="Mbiemri" required>
                <input type="email" id="email" placeholder="Email" required>
                <input type="text" id="account-number" placeholder="Numri i llogarisë" required>
                <input type="text" id="amount" value="0€" readonly>
                <button type="submit">Paguaj</button>
                <button type="button">Anulo</button>
            </form>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        fetch('nav.html')
            .then(response => response.text())
            .then(data => {
                document.getElementById('navbar-container').innerHTML = data;
            })
            .catch(error => console.error('Gabim gjatë ngarkimit të navbar-it:', error));

        document.getElementById('toggleTable').addEventListener('click', function() {
            var table = document.getElementById('artistTable');
            var button = document.getElementById('toggleTable');
            if (table.style.opacity === '0' || table.style.display === 'none') {
                table.style.display = 'table';
                setTimeout(function() {
                    table.style.opacity = '1';
                    table.style.maxHeight = '500px';
                }, 10);
                button.style.position = 'relative';
                button.style.marginBottom = '20px';
            } else {
                table.style.opacity = '0';
                table.style.maxHeight = '0';
                setTimeout(function() {
                    table.style.display = 'none';
                }, 1000);
            }
        });
    </script>

<script src="javascript/aboutus.js"></script>


    <footer>
      <?php include 'footer.php'; ?>
    </footer>


</script>
</body>

</html>