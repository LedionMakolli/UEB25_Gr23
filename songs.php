<?php
session_start();


$volume = isset($_COOKIE['volume']) ? (float) $_COOKIE['volume'] : 0.7; // default 70%

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
    <link rel="icon" href="foto/logo.png" type="image/png">
    <script>
        <?php $songs = [
    ['name' => 'Love Galore', 'listens' => 29800],
    ['name' => 'Space Bound', 'listens' => 10200],
    ['name' => 'Heartles', 'listens' => 37300],
    ['name' => 'H.O.L.L.A', 'listens' => 2000],
    ['name' => 'Starlight Interlude', 'listens' => 21100],
    ['name' => 'One Last Time', 'listens' => 7800],
    ['name' => 'Mathematics', 'listens' => 963],
    ['name' => 'Ms. Jackson', 'listens' => 43500],  
    ['name' => 'Temperature', 'listens' => 9200],
];?>

    function filterSongs(callback){
        return songs.filter(callback);
    }

    function calculateWithCallback(callback){
        return songs.reduce(callback, 0);
    }

    function findSong(callback){
        return songs.reduce((best, song) => (callback(best, song) ? song : best));
    }

    function handleNumbers(callback) {
        return callback(songs.map(song => song.listens));
    }

    </script>
</head>
<body>
    <!-- <div id="nav-placeholder"></div>
    <script src="nav.js"></script> -->

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

        //Array PHP per kenget 

        $songsForDisplay = [
        [
                'title' => 'Love Galore', 
                'plays' => 29800, 
                'artist' => 'Illyric Ft. Sza', 
                'image' => 'foto/sza.jpg', 
                'audio' => 'songs/SZA - Love Galore (Lyrics) ft. Travis Scott.mp3',
                'id' => 'lovegalore'
        ],
        [
            'title' => 'Space Bound', 
            'plays' => 10200, 
            'artist' => 'Illyric Ft. Eminem', 
            'image' => 'foto/eminem.jpeg', 
            'audio' => 'songs/Eminem - Space Bound (Lyrics).mp3',
            'id' => 'spacebound'
        ],
        [
            'title' => 'Heartles', 
            'plays' => 37300, 
            'artist' => 'Illyric Ft. Kanye West', 
            'image' => 'foto/kanye.jpeg', 
            'audio' => 'songs/Kanye West - Heartless (HD).mp3',
            'id' => 'heartless'
        ],
        [
            'title' => 'H.O.L.L.A', 
            'plays' => 2000, 
            'artist' => 'Illyric Ft. Busta Rhymes', 
            'image' => 'foto/bustarhymes.jpeg', 
            'audio' => 'songs/Busta Rhymes - H.O.L.L.A.mp3',
            'id' => 'holla'
        ],
        [
            'title' => 'Starlight Interlude', 
            'plays' => 21100, 
            'artist' => 'Illyric Ft. The Weeknd', 
            'image' => 'foto/weeknd.png', 
            'audio' => 'songs/The Weeknd & Lana Del Rey - Stargirl Interlude (Lyrics).mp3',
            'id' => 'stargirlinterlude'
        ],
        [
            'title' => 'One Last Time', 
            'plays' => 7800, 
            'artist' => 'Illyric Ft. LP', 
            'image' => 'foto/lp.jpeg', 
            'audio' => 'songs/LP - One Last Time (Lyrics).mp3',
            'id' => 'onelasttime'
        ],
        [
            'title' => 'Mathematics', 
            'plays' => 963, 
            'artist' => 'Illyric Ft. Mos Def', 
            'image' => 'foto/mosdef.jpeg', 
            'audio' => 'songs/Mos Def - Mathematics.mp3',
            'id' => 'mathematics'
        ],
        [
            'title' => 'Ms. Jackson', 
            'plays' => 43500, 
            'artist' => 'Illyric Ft. Outkast', 
            'image' => 'foto/outkast.jpeg', 
            'audio' => 'songs/Outkast - Ms. Jackson (W.Lyrics).mp3',
            'id' => 'msjackson'
        ],
        [
            'title' => 'Temperature', 
            'plays' => 9200, 
            'artist' => 'Illyric Ft. Sean Paul', 
            'image' => 'foto/seanpaul.jpeg', 
            'audio' => 'songs/Temperature-Sean Paul.mp3',
            'id' => 'temperature'
        ]
    ];
    $originalSongs = $songsForDisplay;

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
    
    function filterArtistsByLetter($names, $letter = 'M') {
        $filtered = array_filter($names, function($name) use ($letter) {
            return strtoupper($name[0]) === strtoupper($letter);
        });
    
        echo "<ul>";
        foreach ($filtered as $name) {
            echo "<li>$name</li>";
        }
        echo "</ul>";
    }
    
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

<div id="add-song-form">
    <h3>Shto Këngë të Re</h3>
    <form id="song-form">
        <div>
            <label for="song-name">Emri i Këngës:</label>
            <input type="text" id="song-name" required>
        </div>

        <div>
            <label for="artist-name">Emri i Artistit:</label>
            <input type="text" id="artist-name" required>
        </div>

        <div>
            <label for="song-file">File i Muzikes (mp3):</label>
            <input type="file" id="song-file" accept="audio/mp3" required>
        </div>

        <div>
            <label for="song-image">Foto e Këngës:</label>
            <input type="file" id="song-image" accept="image/*" required>
        </div>

        <button type="submit">Shto kengen</button>
    </form>
    <button id="remove-last-song" type="button"
    style="width:100%; padding:12px; margin-top:10px; background:#ff4444; color:white; border:none; border-radius:15px; font-weight:bold; cursor:pointer;">
    Hiq Këngën e Fundit
</button>
</div>

<div class="sort-dropdown">
                    <button class="sort-dropdown-btn">
                        <span>Sorto Këngët</span>
                        <svg class="dropdown-icon" width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L6 6L11 1" stroke="white" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </button>
                    <div class="sort-dropdown-content">
                        <form method="post">
                            <button type="submit" name="sort" value="sort_title_asc">Sipas Titullit (A-Z)</button>
                            <button type="submit" name="sort" value="sort_title_desc">Sipas Titullit (Z-A)</button>
                            <button type="submit" name="sort" value="sort_plays_asc">Sipas Dëgjimeve (↑)</button>
                            <button type="submit" name="sort" value="sort_plays_desc">Sipas Dëgjimeve (↓)</button>
                            <button type="submit" name="sort" value="reset">Rikthe Rendin Origjinal</button>
                        </form>
                    </div>
                </div>

<!-- top 5 kenget -->
<div class="top-songs-container">
    <h3>Top 5 Këngët Më Të Dëgjuara</h3>
    <ul class="top-songs-list" id="top5-songs-list">
        <!-- kenget shtohen me js -->
    </ul>
</div>


<div class="buttonat-form">
    <h3>Te dhenat shtesë</h3>
    <form class="form-funksione">
        <!-- mapping -->
        <div>
            <label>Mesatarja e Klikimeve:</label>
            <div id="average-listens"></div>
        </div>

        <!-- reduce -->
        <div>
            <label>Kenga më e dëgjuar eshte:</label>
            <div id="most-popular"></div>
        </div>

        <!-- artistet e filtruar -->
        <div>
            <label>Artistë që fillojnë me 'M':</label>
            <div id="filtered-artists"><?php
            filterArtistsByLetter($namesOnly, 'M');
            ?>
            </div>
        </div>

    </form>
</div>


 <!-- MUSIC INDICATOR -->
 <div class="music-indicator">
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
<script>
document.addEventListener('DOMContentLoaded', () => {
    const volumeSlider = document.getElementById('volume');
    const volumeValue = document.getElementById('volume-value');
    const audios = document.querySelectorAll('audio');

    function applyVolume(val) {
        const vol = val / 100;
        audios.forEach(audio => audio.volume = vol);
        volumeValue.textContent = val;
        document.cookie = "volume=" + vol + "; path=/; max-age=31536000";
    }

    volumeSlider.addEventListener('input', e => {
        applyVolume(e.target.value);
    });

    // vendosim volumin në audio kur faqja hapet
    applyVolume(volumeSlider.value);
});
    // te dhenat ne PHP te shnderruara ne JavaScript array
    const songs = <?php echo json_encode($songs); ?>;

    // funksioin per play/pause
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('song-form');
        const songsContainer = document.getElementById('songs-container');

        function handlePlayPause(){
            const playButtons = document.querySelectorAll('.play-song img');
            playButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    const songId = button.getAttribute('data-song');
                    const audio = document.querySelector(`audio[data-audio="${songId}"]`);

                    if(audio.paused){
                        playButtons.forEach((btn) => {
                            const otherAudio = document.querySelector(`audio[data-audio="${btn.getAttribute('data-song')}"]`);

                            if(otherAudio && !otherAudio.paused){
                                otherAudio.pause();
                                otherAudio.currentTime = 0;
                                btn.src = 'foto/play.png';
                            }
                        });

                        audio.play();
                        button.src = 'foto/pause.png';
                    }else{
                        audio.pause();
                        button.src = 'foto/play.png';
                    }
                });
            });
        }

        // shtim i kenges permes formes
        form.addEventListener('submit', function(e){
            e.preventDefault();

            const songName = document.getElementById('song-name').value;
            const artistName = document.getElementById('artist-name').value;
            const songFile = document.getElementById('song-file').files[0];
            const songImage = document.getElementById('song-image').files[0];

            const songFileURL = URL.createObjectURL(songFile);
            const songImageURL = URL.createObjectURL(songImage);

            const songElement = document.createElement('div');
            songElement.classList.add('song');

            songElement.innerHTML = ` 
            <div class = "song-img">
                <img src = "${songImageURL}" alt = "${songName}">
            </div>
            <div class = "song-details">
                <div class = "song-details-content">
                    <div class ;= "song-name"> ${songName} </div>
                    <div class = "artist-name"> ${artistName} </div>
                </div>
                <div>
                    <div class = "music-player">
                        <div class = "play-song mouse">
                            <img src = "foto/play.png" alt = "play" data-song = "${songName}">
                            <audio data-audio = "${songName}">
                                <source src = "${songFileURL}" type = "audio/mp3">
                            </audio>
                        </div>
                        <div class = "download-song">
                            <a href = "${songFileURL}" download = "${songName} - ${artistName}">Download</a>
                        </div>
                    </div>
                </div>
            `;

            songsContainer.appendChild(songElement);

            form.reset();

            // per kengen e re thirret perseri funksioni handle play/pause
            handlePlayPause();
        });

        handlePlayPause();
    });
    
    function calculateAverage() {
        const totalListens = calculateWithCallback((sum, song) => sum + song.listens);
        const average = totalListens / songs.length;
        document.getElementById('average-listens').textContent = ` ${average.toFixed(2)}`;
    }

    function findMostPopular() {
        const mostPopular = findSong((currentBest, song) => song.listens > currentBest.listens);
        document.getElementById('most-popular').textContent = ` ${mostPopular.name} (${mostPopular.listens} dëgjime)`;
    }

    function extenededNumberManipulations(){
        handleNumbers(listens => {
            const maxListens = Math.max(...listens);
            if(maxListens > Number.MAX_VALUE){
                console.log("Dëgjimet tejkalojnë kufirin e MAX_VALUE!");
            }else{
                console.log("Dëgjimet janë brenda kufirit.");
            }

            const invalidListens = listens.some(listen => isNaN(listen));
            if(invalidListens){
                console.log("Ka dëgjime të pavlefshme (NaN).")
            }

            listens.forEach(listen => console.log(`Eksponencial: ${listen.toExponential(2)}`));
            listens.forEach((listen,index) => {
                console.log(`Kënga ${songs[index].name}: ${listen.toString(16)} në bazën 16`);
            });
        });
    }

    // shfaqja e top 5 kengeve - funksioni
    function displayTop5Songs() {
        const sortedSongs = [...songs].sort((a, b) => b.listens - a.listens);
        const top5 = sortedSongs.slice(0, 5);
        const top5List = document.getElementById('top5-songs-list');
        
        top5List.innerHTML = '';
        
        top5.forEach((song, index) => {
            const li = document.createElement('li');
            li.innerHTML = `
                <span class="song-rank">${index + 1}.</span>
                <span class="song-info">${song.name}</span>
                <span class="song-listens">${song.listens.toLocaleString()} dëgjime</span>
            `;
            top5List.appendChild(li);
        });
    }

    window.addEventListener('DOMContentLoaded', () => {
        calculateAverage();
        findMostPopular();
        extenededNumberManipulations();
        displayTop5Songs();
    })

    $('#remove-last-song').click(function () {
        $('.song:last').remove();
    });

    setTimeout(function () {
        alert('Nëse ju pëlqen shumë muzika, sigurohuni që të mos i humbisni koncertet!');
    }, 300000);

    </script>
    <footer>
      <?php include 'footer.php'; ?>
    </footer>

</body>
</html>