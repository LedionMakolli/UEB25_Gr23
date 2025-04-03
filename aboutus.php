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
            border-collapse:collapse;
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

        th,td{
            padding: 12px;
            text-align: center;
            font-weight: bold;
            width: 200px;  
            height: 50px;
            box-sizing: border-box;
            
        }

        th{
            background-color: #223439;
            color: white;
            
        }

        td{
            background-color: #e8f5e9;
            font-size: 14px;
           
            }

        tr:nth-child(odd) td{
            background-color: #e8f5e9; 
        }

        tr:hover td{
            background-color: #b3deb6;
        }
        tr:hover td {
        background-color: #b3deb6;
        }

        .btn10{
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

        .btn10:hover{
            background-color: #4CAF50;
            transform: translateX(-50%) scale(1.05);
        }

        #pricing{
            margin-top: 20px;
            padding: 20px;
        }
        .historical-timeline{
            padding: 20px;
            margin: 0 auto;
            max-width: 1200px;
            margin-top: 40px;
        }
        .Top-Kengetaret{
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
        
        .masthead{
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }

        .video-background video{
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            object-fit: cover;
            transform: translate(-50%, -50%);
        }

        .masthead-content{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            text-align: center;
            color: white;
            z-index: 10;
        }

        .masthead-subheading{
            font-size: 2rem;
            font-weight: bold;
            color: #1b86a7;
        }

        .masthead-heading{
            font-size: 3rem;
            font-weight: bold;
            margin-top: 1rem;
        }
        #spcolor{
            color: #7496aa;
            font-size: 4rem;
        }

        .fa-stack .fa-circle {
        color: #4CAF50 !important; 
    }
    #services{
            margin-bottom: 230px;
        }
        
        .section__header{
            font-weight: bold;
        }

        #services h4{
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
        }

        #services p{
            font-size: 1.2rem;
            color: var(--text-light);
            margin-top: 10px;
        }
        .timeline {
            list-style: none;
            padding: 0;
            position: relative;
         }
         .timeline::before{
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            width: 2px;
            left: 50%;
            border:  2px solid transparent;
            border-image: url('foto/concert.jpg') 30 stretch;
            transform: translateX(-50%); 
         }
         .timeline > li{
            margin-bottom: 50px;
            position: relative;
            width: 50%;
            padding-right: 20px;
         }

         .timeline-pannel{
            padding: 20px;
            background: white;
            border-radius: 5px;
            box-shadow: 0 2px  10px rgba(0, 0, 0, 0.1);
         }
         .timeline-pannel{
            position: relative;
            z-index: 2; 
         }

         .timeline > li:nth-child(odd){
            left: 50%;
            padding-left: 20px;
         }

         .timeline-pannel :hover{
            transform: scale(1.05);
            transition: 0.3s ease;
         }

         .timeline p{
            word-wrap: break-word;
            line-height: 1.6;
            font-size: 1em;
         }

         .timeline-item:hover{
            transform: scale(1.05);
            transition: 0.3s ease;
         }
         .subheading:hover{
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
        .list-container ol{
            padding-left: 20px;
            list-style: none;
            margin: 0;
            counter-reset: list-counter;
        }
        .list-container ol > li{
            position: relative;
            font-size: 18px;
            margin-bottom: 15px;
            padding-left: 40px;
            font-weight: bold;
            color: white;
        }
        
        .list-container ol > li::before{
            content: counter(list-counter) ".";
            counter-increment: list-counter;
            position: absolute;
            left: 0;
            top: 0;
            font-size: 24px;
            font-weight: bold;
            color: #4CAF50;
        }
        .list-container ul{
            margin-top: 8px;
            padding-left: 20px;
            list-style-type: disc;
            font-size: 16px;
            color: #555;
        }
        .list-container ul li{
            font-weight: normal;
            line-height: 1.6;
        }
        .row{
            text-align: center;
            justify-content:center;
            display: flex;
        }
        .col{
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
        .div2{
            width: 100%;
            height: 75px;
            background-color: #223439;
            background-image: url(foto/div_foto.png);
            background-size:cover;
            background-origin:padding-box; 
            background-attachment:fixed;
            background-position: center;
            background-repeat: no-repeat;
        }
        @media (max-width: 768px){
            #services{
                margin-bottom: 430px;
            }
        }
     </style>
</head>
<body>
    <!-- Header -->
    <div id="nav-placeholder"></div>
    <script src="nav.js" defer></script>
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
      <section class="page-section" id = about>
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
                <td><p>River</p></td>
                <td>Pop</td>
                <td>2017</td>
            </tr>
            <tr>
                <td>The Weeknd</td>
                <td>Dance In The Flames </td>
                <td><p>Starboy</p></td>
                <td>Pop</td>
                <td>2016</td>
            </tr>
            <tr>
                <td>Sza</td>
                <td>Open Arms</td>
                <td><p>Kill Bill</p></td>
                <td>Pop</td>
                <td>2022</td>
            </tr>
        </table>
        <button class="btn10" id ="toggleTable">Top K&euml;ng&euml;tar&euml;t</button>
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

            document.getElementById('toggleTable').addEventListener('click', function () {
            var table = document.getElementById('artistTable');
            var button = document.getElementById('toggleTable');
            if (table.style.opacity === '0' || table.style.display === 'none') {
                table.style.display = 'table';
                setTimeout(function () {
                    table.style.opacity = '1';
                    table.style.maxHeight = '500px';
                }, 10);
                button.style.position = 'relative';
                button.style.marginBottom = '20px';
            } else {
                table.style.opacity = '0';
                table.style.maxHeight = '0';
                setTimeout(function () {
                    table.style.display = 'none';
                }, 1000);
            }
        });
     </script>


    <script>
        // per pricing (popup)
    $(document).ready(function () {
    const prices = {
        monthly: ['0€', '29€', '199€', '299€'],
        yearly: ['0€', '299€', '1999€', '2999€']
    };

    let selectedPlanType = 'yearly'; // default

    
    $('.pricing-plan').each(function (index) {
        $(this).find('.price').html(`${prices[selectedPlanType][index]} <span>${prices[selectedPlanType === 'monthly' ? 'yearly' : 'monthly'][index]}</span>`);
    });

    $('.toggle-buttons button').on('click', function () {
        $('.toggle-buttons button').removeClass('active');
        $(this).addClass('active');

        selectedPlanType = $(this).hasClass('monthly') ? 'monthly' : 'yearly';
        $('.pricing-plan').each(function (index) {
            $(this).find('.price').html(`${prices[selectedPlanType][index]} <span>${prices[selectedPlanType === 'monthly' ? 'yearly' : 'monthly'][index]}</span>`);
        });
    });

    
    $('.pricing-plan button').on('click', function () {
        const planIndex = $(this).closest('.pricing-plan').index();
        const planName = $(this).closest('.pricing-plan').find('h2').text();
        const amount = getPlanAmount(planIndex, selectedPlanType);

        openPaymentPopup(planName, amount, selectedPlanType);
    });

    
    function getPlanAmount(planIndex, planType) {
        let amount;
        switch (planType) {
            case 'monthly':
                amount = prices.monthly[planIndex];
                break;
            case 'yearly':
                amount = prices.yearly[planIndex];
                break;
            default:
                amount = '0€';
                break;
        }
        return amount;
    }

    
    function openPaymentPopup(planName, amount, planType) {
        $('#amount').val(amount);
        $('#ticket-popup').attr('data-plan', `${planName} (${planType === 'monthly' ? 'Mujore' : 'Vjetore'})`);
        $('#ticket-popup').show();
    }

    $('#ticket-popup .close, #ticket-popup button[type="button"]').on('click', function () {
        $('#ticket-popup').hide();
    });

    $('#ticket-form').on('submit', function (event) {
        event.preventDefault();

        const firstName = $('#first-name').val();
        const lastName = $('#last-name').val();
        const email = $('#email').val();
        const accountNumber = $('#account-number').val();
        const amount = $('#amount').val();
        const selectedPlan = $('#ticket-popup').attr('data-plan');

        if (firstName && lastName && email && accountNumber) {
            alert(`Pagesa e suksesshme për planin: ${selectedPlan}\nEmri: ${firstName} ${lastName}\nEmail: ${email}\nShuma: ${amount}`);
            $('#ticket-popup').hide();
        } else {
            alert('Ju lutem plotësoni të gjitha fushat!');
        }
    });
});

    </script>


<footer>
    <div id="footer"></div>
</footer>
<script src="footer.js"></script>
    
</body>
</html>