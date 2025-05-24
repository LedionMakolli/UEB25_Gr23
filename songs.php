<?php
session_start();
require_once __DIR__ . '/php-files/db.php'; 

$volume = isset($_COOKIE['volume']) ? (float) $_COOKIE['volume'] : 0.7; // default 70%

$email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : null;

// -----------------------------------------------------------
// 1. Merr pagesën më të fundit për këtë email
// -----------------------------------------------------------
$sql  = "SELECT amount, payment_date
         FROM payments
         WHERE email = ?
         ORDER BY payment_date DESC
         LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$res  = $stmt->get_result();

$hasPaid = false;

if ($row = $res->fetch_assoc()) {
    // -------------------------------------------------------
    // 2. Përgatis të dhënat
    // -------------------------------------------------------
    $amount        = floatval( preg_replace('/[^\d.]/', '', $row['amount']) ); // "29€" => 29
    $paymentDate   = new DateTime($row['payment_date']);
    $now           = new DateTime();
    $diff          = $paymentDate->diff($now);

    // -------------------------------------------------------
    // 3. Logjika e vlefshmërisë
    // -------------------------------------------------------
    if ($amount == 29 && $diff->m < 1 && $diff->y == 0) {       // < 1 muaj
        $hasPaid = true;
    } elseif ($amount == 299 && $diff->y < 1) {                  // < 1 vit
        $hasPaid = true;
    }
}

$stmt->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Songs</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styles/songs.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="songs.js"></script>
    <link rel="icon" href="foto/logo.png" type="image/png">
</head>
<body>

<?php include 'nav.php'; ?>

    <?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!empty($_SESSION['user_id']) && isset($_GET['play'])) {
    $_SESSION['songs_plays'] = ($_SESSION['songs_plays'] ?? 0) + 1;
}
?>
<?php if (!empty($_SESSION['user_id']) && isset($_SESSION['songs_plays'])): ?>
  <div style="text-align:center; margin: 1rem auto; color: #a9fb50; font-weight: 500;">
    Keni vizituar faqen e këngëve <?= $_SESSION['songs_plays'] ?> herë.
  </div>
<?php endif; ?>

    <main id="songs-one">

    <!-- ======================   SLIDER I VOLUMIT   ====================== -->
<div id="volume-control" style="text-align:center; margin: 2rem auto;">
    <label for="volume" style="color: #fff;">🔊 Volumi Global: <span id="volume-value"><?= round($volume * 100) ?></span>%</label>
    <input type="range" id="volume" min="0" max="100" value="<?= round($volume * 100) ?>" />
</div>


<!-- CONTENT -->
<div id="songs-one-content">
<div class="center">
<div id="songs-container">
        <?php 

        require_once __DIR__ . '/artist.php';
        require_once __DIR__ . '/song.php'; 
        require_once __DIR__ . '/songsData.php';

    $originalSongs = $songsForDisplay;
    
    if (!$hasPaid) {
    // Nëse nuk ka paguar, fsheh 3 këngët e fundit
    $songsForDisplay = array_slice($songsForDisplay, 0, count($songsForDisplay) - 3);
}


    // shndrrimi i vargjeve ne objekte te klases Song
    $songObjects = array_map(function(array $s) {
        return new Song(
            $s['artist'],
            $s['title'],
            $s['plays'],
            $s['image'],
            $s['audio'],
            $s['id']
        );
    }, $songsForDisplay);



    if($_SERVER["REQUEST_METHOD"]==="POST" && isset($_POST['sort'])){
        $sortOption = $_POST['sort'];

        switch($sortOption){    
            case 'sort_title_asc': 
                $titles = [];
                foreach($songObjects as $key =>$song){
                    $titles[$key]= $song->getTitle();
                }
                ksort($titles);
                $sorted = [];
                foreach($titles as $key=> $_){
                   $sorted[$key] = $songObjects[$key];
                }
                $songObjects = $sorted;
                break;

            case 'sort_title_desc':
                $titles = [];
                foreach($songObjects as $key=>$song){
                    $titles[$key] = $song->getTitle();
                }
                krsort($titles);
                $sorted = [];
                foreach ($titles as $key => $_) {       // $_  - ketu nuk na intereson value
                    $sorted[$key] = $songObjects[$key];
                }
                $songObjects = $sorted;
                break;

            case 'sort_plays_asc':
                $plays = array();
                foreach ($songObjects as $key => $song) {
                    $plays[$key] = $song->getPlays();
                }
                // perdor asort per te sortuar sipas degjimeve (nga e ulet ne te larte)
                asort($plays);
                $sorted = [];
                foreach ($plays as $key => $_) {
                    $sorted[$key] = $songObjects[$key];
                }
                $songObjects = $sorted;
                break;

            case 'sort_plays_desc':
                $plays = array();
                foreach ($songObjects as $key => $song) {
                    $plays[$key] = $song->getPlays();
                }
                // perdor arsort per te sortuar sipas degjimeve (nga e larte ne te ulet)
                arsort($plays);
                $sorted = [];
                foreach ($plays as $key => $_) {
                    $sorted[$key] = $songObjects[$key];
                }
                $songObjects = $sorted;
                break;

            case 'reset':
                // rikrijimi i objekteve prej vargjeve origjinale
                $songObjects = array_map(function(array $s) {
                    return new Song(
                        $s['artist'],
                        $s['title'],
                        $s['plays'],
                        $s['image'],
                        $s['audio'],
                        $s['id']
                    );
                }, $originalSongs);
                break;
        }
    }

    $namesOnly = [
        'Love Galore',
        'Space Bound',
        'Heartles',
        'H.O.L.L.A',
        'Starlight Interlude',
        'One Last Time',
        'Mathematics',
        'Ms. Jackson',
        'Temperature'
    ];
    ?>

<?php foreach ($songObjects as $song): 
    $plays = $song->getPlays();
    $formattedPlays = $plays >= 1000
        ? number_format($plays/1000, 1).'K'
        : $plays;
    ?>
    <div class="song fade-up">
        <div class="song-img">
            <img src="<?= $song->getImage() ?>" alt="<?= $song->getTitle() ?>">
        </div>
        <div class="song-details">
            <div class="song-details-content">
                <div class="song-name"><?= $song->getTitle() ?></div>
                <div class="artist-name"><?= $song->getName() ?></div>
            </div>
            <div class="music-player">
                <div class="play-song mouse">
                    <img 
                        src="foto/play.png" 
                        alt="play" 
                        data-song="<?= $song->getId() ?>"
                    >
                    <audio data-audio="<?= $song->getId() ?>">
                        <source src="<?= $song->getAudio() ?>" type="audio/mp3">
                    </audio>
                </div>
                <div class="download-song mouse">
                    <a 
                        href="<?= $song->getAudio() ?>" 
                        download="<?= $song->getTitle() ?> - <?= explode(' ', $song->getName())[0] ?>"
                    >
                        <?= $formattedPlays ?><img src="foto/download.png" alt="download">
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

     </div>
</div>
</div>

<div class="sort-dropdown" style="margin-top:30px;">
  <button type="button" class="sort-dropdown-btn">
      Rendit sipas
      <span class="dropdown-icon">▼</span>
  </button>

  <div class="sort-dropdown-content">
    <form method="POST">
        <button type="submit" name="sort" value="sort_title_asc">Titulli (A-Z)</button>
        <button type="submit" name="sort" value="sort_title_desc">Titulli (Z-A)</button>
        <button type="submit" name="sort" value="sort_plays_asc">Dëgjimet (↑)</button>
        <button type="submit" name="sort" value="sort_plays_desc">Dëgjimet (↓)</button>
        <button type="submit" name="sort" value="reset">Rikthe</button>
    </form>
  </div>
</div>

 <!-- MUSIC INDICATOR -->
 <div class="music-indicator" style="margin-top: 150px;">
    <span style="--i:1;" class="music-indicator-span"></span>
    <span style="--i:2;" class="music-indicator-span "></span>
    <span style="--i:3;" class="music-indicator-span "></span>
    <span style="--i:4;" class="music-indicator-span "></span>
  </div>


<!-- HEADPHONE SVG -->
<div class="headphone-navigation">
    <svg id="headphone-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" width="60" height="55">

        <image href="foto/headphone.png" x="0" y="20" width="200" height="200" opacity="0.8" />

        <text id="headphone-tooltip" x="50%" y="50%" text-anchor="middle" fill="white" font-size="16" 
              font-family="Poppins, sans-serif" opacity="0" pointer-events="none">
            Headphone Zone
        </text>
    </svg>
</div>
    
</main>
     <?php include 'footer.php'; ?>
</body>
</html>