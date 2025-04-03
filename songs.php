<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Songs</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="icon" href="foto/logo.png" type="image/png">
    <script>
        const songs = [
        {name: 'Love Galore', listens: 29800},
        {name: 'Space Bound', listens: 10200},
        {name: 'Heartles', listens: 37300},
        {name: 'H.O.L.L.A', listens: 2000},
        {name: 'Starlight Interlude', listens: 21100},
        {name: 'One Last Time', listens: 7800},
        {name: 'Mathematics', listens: 963},
        {name: 'Ms. Jackson', listens: 43500},
        {name: 'Temperature', listens: 9200},
    ];

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
    <style>
        .download-song a {
            display: flex;
            color: #ffffff;
        }   
    
        #songs-one {
            padding: 20px;
            margin-top: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    
        #songs-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 5rem;
            width: 100%;
            max-width: 1200px;
        }
    
        .song {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
    
        .song:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
        }
    
        .song-img {
            width: 100%;
            height: 250px;
            overflow: hidden;
            border-radius: 8px;
            margin-bottom: 15px;
        }
    
        .song-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    
        .song-details {
            text-align: center;
        }
    
        .song-name {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 5px;
            color: #ffffff;
        }
    
        .artist-name {
            font-size: 0.9rem;
            font-weight: 300;
            color: #c0c0c0;
        }
    
        .music-player {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 15px;
        }
    
        .play-song img {
            width: 30px;
            height: 30px;
            margin-right: 4rem;
            cursor: pointer;
        }
    
        .download-song {
            display: flex;
            align-items: center;
            font-size: 0.8rem;
            font-weight: 400;
            color: #ffffff;
            text-decoration: none;
        }
    
        .download-song img {
            width: 20px;
            height: 20px;
            margin-left: 15px;
            display: inline;
        }
    
        .headphone-navigation {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            padding: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease;
        }
    
        .headphone-navigation:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
        }
    
        .music-indicator {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }
    
        .music-indicator-span {
            display: block;
            width: 5px;
            height: 20px;
            margin: 30px 2px;
            background: #ffffff;
            animation: bounce 1.2s infinite;
        }
    
        .music-indicator-span:nth-child(2) {
            animation-delay: 0.2s;
        }
    
        .music-indicator-span:nth-child(3) {
            animation-delay: 0.4s;
        }
    
        .music-indicator-span:nth-child(4) {
            animation-delay: 0.6s;
        }
    
        @keyframes bounce {
            0%, 100% {
                transform: scaleY(1);
            }
            50% {
                transform: scaleY(2);
            }
        }

        #add-song-form {
            margin-top: 50px;
            padding: 30px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            width: 100%;
            max-width: 1000px;
            margin: 50px auto;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        #add-song-form h3{
            font-size: 1.5rem;
            font-weight: 600;
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
        }

        #song-form{
            display: flex;
            justify-content: space-between;
            gap: 30px;
            flex-wrap: wrap;
        }
        
        #song-form > div{
            flex: 1;
            min-width: 200px;
        }

        #song-form label{
            font-size: 1rem;
            color: #fff;
            display: block;
            margin-bottom: 0px;
        }

        #song-form input[type="text"],
        #song-form input[type="file"]{
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            font-size: 1rem;
            background: rgba(0, 0, 0, 0.2);
            color: #fff;
            transition: all 0.3s ease;
        }


        #song-form input[type = "text"]:focus,
        #song-form input[type = "file"]:focus{
            border-color: #007BFF;
            outline: none;
            background: rgba(255, 255, 255, 0.3);
        }

        #song-form button{
            padding: 12px 20px;
            background: #007BFF;
            color: #fff;
            border: none;
            border-radius: 1rem;
            cursor: pointer;
            width: 100%;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        #song-form button:hover, .buttonat-form button:hover{
            background: #007BFF;
        }

        .form-funksione{
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .form-funksione > div{
            flex: 0 1 30%;
            text-align: center;
            padding: 15px;
            color: #fff;
        }

        .form-funksione label{
            font-size: 1rem;
            color: #007BFF;
            display: block;
            margin-bottom: 8px;
        }

        .buttonat-form{
            margin-top: 50px;
            padding: 30px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            width: 100%;
            max-width: 1000px;
            margin:50px auto;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .buttonat-form h3{
            font-size: 1.5rem;
            font-weight: 600;
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-funksione{
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .form-funksione > div {
            flex: 0 1 30%;
            text-align: center;
            padding: 15px;
        }
        .form-funksione label{
            font-size: 1rem;
            color: #0056b3;
            display: block;
            margin-bottom: 8px;
        }

        .buttonat-form button{
            width: 195px;
            height: 35px;
            padding: 12px 20px;
            font-weight: 400;
            border-radius: 14px;
            justify-content: center;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        </style>
</head>
<body>
    <div id="nav-placeholder"></div>
    <script src="nav.js"></script>

    <main id="songs-one">


<!-- CONTENT -->
<div id="songs-one-content">
<div class="center">
<div id="songs-container">



    <!-- SONG1 -->
<div class="song fade-up">

    <div class="song-img">
        <img src="foto/sza.jpg" alt="song">
    </div>

    <div class="song-details">
        <div class="song-details-content">
        <div class="song-name">Love Galore</div>
        <div class="artist-name">Illyric Ft. Sza</div>
        </div>
        <div class="music-player">
         
            <div class="play-song mouse">
                <img src="foto/play.png" alt="play" data-song="lovegalore">
                <!--   DATA-SONG EDHE DATA-AUDIO VALUE JANE T'NJEJTA  -->
                <audio data-audio="lovegalore">
                    <!-- <source src="songs/SZA - Love Galore (Lyrics) ft. Travis Scott.mp3" type="audio/ogg"> -->
                    <source src="songs/SZA - Love Galore (Lyrics) ft. Travis Scott.mp3" type="audio/mp3">
                    </audio> 
            </div>
            <div class="download-song mouse">
                <a href="songs/SZA - Love Galore (Lyrics) ft. Travis Scott.mp3"  download="Love Galore - Illyric">29.8K<img src="foto/download.png" alt="download"></a>
            </div>
        </div>
    </div>
</div>
    <!-- SONG1 -->


            <!-- SONG2 -->
<div class="song fade-up">
    <div class="song-img">
        <img src="foto/eminem.jpeg" alt="song">
    </div>
    <div class="song-details">
        <div class="song-details-content">
        <div class="song-name">Space Bound</div>
        <div class="artist-name">Illyric Ft. Eminem</div>
        </div>
        <div class="music-player"> 
            <div class="play-song mouse">
                <img src="foto/play.png" alt="play" data-song="spacebound">

                <audio data-audio="spacebound">
                    <!-- <source src="songs/Eminem - Space Bound (Lyrics).mp3" type="audio/ogg"> -->
                    <source src="songs/Eminem - Space Bound (Lyrics).mp3" type="audio/mp3">
                    </audio> 
            </div>
            <div class="download-song">
                <a href="songs/Eminem - Space Bound (Lyrics).mp3"  download="Space Bound - Illyric">10.2K<img src="foto/download.png" alt="download"></a>
            </div>
        </div>
    </div>
</div>
    <!-- SONG2 -->


            <!-- SONG3 -->
<div class="song fade-up">


    <div class="song-img">
        <img src="foto/kanye.jpeg" alt="song">
    </div>

    <div class="song-details">
        <div class="song-details-content">
        <div class="song-name">Heartless</div>
        <div class="artist-name">Illyric Ft. Kanye West</div>
        </div>
        <div class="music-player">
         
            <div class="play-song mouse">
                <img src="foto/play.png" alt="play" data-song="heartless" >
               
                <audio data-audio="heartless">
                    <!-- <source src="songs/Kanye West - Heartless (HD).mp3" type="audio/ogg"> -->
                    <source src="songs/Kanye West - Heartless (HD).mp3" type="audio/mp3">
                    </audio> 
            </div>




            <div class="download-song">
                <a href="songs/Kanye West - Heartless (HD).mp3"  download="Heartless - Illyric">37.3K<img src="foto/download.png" alt="download"></a>
            </div>
        </div>
    </div>
    
</div>
    <!-- SONG3 -->



            <!-- SONG4 -->
<div class="song fade-up">


    <div class="song-img">
        <img src="foto/bustarhymes.jpeg" alt="song"  data-song="holla" class="play">
    </div>

    <div class="song-details">
        <div class="song-details-content">
        <div class="song-name">H.O.L.L.A</div>
        <div class="artist-name">Illyric Ft. Busta Rhymes</div>
        </div>
        <div class="music-player">
         
            <div class="play-song mouse">
                <img src="foto/play.png" alt="play" data-song="holla" >
               
                <audio data-audio="holla">
                    <!-- <source src="songs/Busta Rhymes - H.O.L.L.A.mp3" type="audio/ogg"> -->
                    <source src="songs/Busta Rhymes - H.O.L.L.A.mp3" type="audio/mp3">
                    </audio> 
            </div>




            <div class="download-song">
                <a href="songs/Busta Rhymes - H.O.L.L.A.mp3"  download="H.O.L.L.A - Illyric">2K<img src="foto/download.png" alt="download"></a>
            </div>
        </div>
    </div>
    
</div>
    <!-- SONG4 -->




    <!-- SONG5 -->
<div class="song fade-up">


    <div class="song-img">
        <img src="foto/weeknd.png" alt="song">
    </div>

    <div class="song-details">
        <div class="song-details-content">
        <div class="song-name">Stargirl Interlude</div>
        <div class="artist-name">Illyric Ft. The Weeknd</div>
        </div>
        <div class="music-player">
         
            <div class="play-song mouse">
                <img src="foto/play.png" alt="play" data-song="stargirlinterlude" >
               
                <audio data-audio="stargirlinterlude">
                    <!-- <source src="songs/The Weeknd & Lana Del Rey - Stargirl Interlude (Lyrics).mp3" type="audio/ogg"> -->
                    <source src="songs/The Weeknd & Lana Del Rey - Stargirl Interlude (Lyrics).mp3" type="audio/mp3">
                    </audio> 
            </div>
            <div class="download-song">
                <a href="songs/The Weeknd & Lana Del Rey - Stargirl Interlude (Lyrics).mp3"  download="Stargirl Interlude - Illyric">21.1K<img src="foto/download.png" alt="download"></a>
            </div>

            
        </div>
    </div>
    
</div>
    <!-- SONG5 -->



            <!-- SONG6 -->
             
            
<div class="song fade-up">


    <div class="song-img">
        <img src="foto/lp.jpeg" alt="song">
    </div>

    <div class="song-details">
        <div class="song-details-content">
        <div class="song-name">One Last Time</div>
        <div class="artist-name">Illyric Ft. LP</div>
        </div>
        <div class="music-player">
         
            <div class="play-song mouse">
                <img src="foto/play.png" alt="play" data-song="onelasttime" >

                <audio data-audio="one last time">
                    <!-- <source src="songs/LP - One Last Time (Lyrics).mp3" type="audio/ogg"> -->
                    <source src="songs/LP - One Last Time (Lyrics).mp3" type="audio/mp3">
                    </audio> 
            </div>



            <div class="download-song">
                <a href="songs/LP - One Last Time (Lyrics).mp3"  download="One Last Time - Illyric">7.8K<img src="foto/download.png" alt="download"></a>
            </div>
        </div>
    </div>
    
</div>
    <!-- SONG6 -->



    <!-- SONG7 -->
<div class="song fade-up">


    <div class="song-img">
        <img src="foto/mosdef.jpeg" alt="song">
    </div>

    <div class="song-details">
        <div class="song-details-content">
        <div class="song-name">Mathematics</div>
        <div class="artist-name">Illyric Ft. Mos Def</div>
        </div>
        <div class="music-player">
         
            <div class="play-song mouse">
                <img src="foto/play.png" alt="play" data-song="mathematics" >

                <audio data-audio="mathematics">
                    <!-- <source src="songs/Mos Def - Mathematics.mp3" type="audio/ogg"> -->
                    <source src="songs/Mos Def - Mathematics.mp3" type="audio/mp3">
                    </audio> 
            </div>


            <div class="download-song">
                <a href="songs/Mos Def - Mathematics.mp3"  download="Cool Blue - Illyric">963<img src="foto/download.png" alt="download"></a>
            </div>
        </div>
    </div>
    
</div>
    <!-- SONG7 -->


    
        <!-- SONG8 -->
<div class="song fade-up">


    <div class="song-img">
        <img src="foto/outkast.jpeg" alt="song">
    </div>

    <div class="song-details">
        <div class="song-details-content">
        <div class="song-name">Ms. Jackson</div>
        <div class="artist-name">Illyric Ft. Outkast</div>
        </div>
        <div class="music-player">
         
            <div class="play-song mouse">
                <img src="foto/play.png" alt="play" data-song="msjackson" >

                <audio data-audio="msjackson">
                    <!-- <source src="songs/Outkast - Ms. Jackson (W.Lyrics).mp3" type="audio/ogg"> -->
                    <source src="songs/Outkast - Ms. Jackson (W.Lyrics).mp3" type="audio/mp3">
                    </audio> 
            </div>


            <div class="download-song">
                <a href="songs/Outkast - Ms. Jackson (W.Lyrics).mp3"  download="Ms. Jackson - Illyric">43.5K<img src="foto/download.png" alt="download"></a>
            </div>
        </div>
    </div>
    
</div>
    <!-- SONG8 -->


      <!-- SONG9 -->
<div class="song fade-up">
    <div class="song-img">
        <img src="foto/seanpaul.jpeg" alt="song">
    </div>
    <div class="song-details">
        <div class="song-details-content">
            <div class="song-name">Temperature</div>
            <div class="artist-name">Illyric Ft. Sean Paul</div>
        </div>
        <div class="music-player">
         
            <div class="play-song mouse">
                <img src="foto/play.png" alt="play" data-song="temperature" >

                <audio data-audio="temperature">
                    <source src="songs/Temperature-Sean Paul.mp3" type="audio/ogg">
                    <source src="songs/Temperature-Sean Paul.mp3" type="audio/mp3">
                    </audio> 
            </div>
            <div class="download-song">
                <a href="songs/Temperature-Sean Paul.mp3"  download="Temperature - Illyric">9.2K<img src="foto/download.png" alt="download"></a>
            </div>
        </div>
    </div>
    
</div>
    <!-- SONG9 -->

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
</div>

<div class="buttonat-form">
    <h3>Funksionet Add, Get, Set, Remove</h3>
    <div class="form-funksione">
        <button id="add-static-song">Shto Këngë Statike</button>
        <button id="get-first-song">Merr Këngën e Parë</button>
        <button id="set-first-song">Ndrysho Këngën e Parë</button>
        <button id="remove-last-song">Hiq Këngën e Fundit</button>
    </div>
</div>

<div class="buttonat-form">
    <h3>Te dhenat shtesë</h3>
    <form class="form-funksione">
        <!-- mapping -->
        <div>
            <label>Mesatarja e Klikimeve:</label>
            <div id="average-listens"></div>
        </div>

        <!-- filter  -->
        <div>
            <label> Filtirmi mbi 20,000 degjime:</label>
            <div id="filtered-songs"></div>
        </div>

        <!-- reduce -->
        <div>
            <label>Kenga më e dëgjuar eshte:</label>
            <div id="most-popular"></div>
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

        function filterByThreshold(threshold) {
        const filteredSongs = filterSongs(song => song.listens > threshold);
        const resultContainer = document.getElementById('filtered-songs');
        
        const ol = document.createElement('ol');
        
        filteredSongs.forEach( song => {
            const li = document.createElement('li');
            li.textContent = `${song.name} (${song.listens} dëgjime)`;
            ol.appendChild(li);
        });
        
        resultContainer.appendChild(ol);
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

    window.addEventListener('DOMContentLoaded', () => {
        calculateAverage();
        filterByThreshold(20000); 
        findMostPopular();
        extenededNumberManipulations();
    })

    $('#add-static-song').click(function (){
        $('#songs-container').append('<div class="song"><div class="song-name">New Song</div><div class="artist-name">Unknown Artist</div></div>');
    });

    $('#get-first-song').click(function (){
        alert($('.song:first .song-name').text());
    });

    $('#set-first-song').click(function(){
        $('.song:first .song-name').text('Updated Song Nmae');
    });

    $('#remove-last-song').click(function () {
        $('.song:last').remove();
    });

    setTimeout(function () {
        alert('Nëse ju pëlqen shumë muzika, sigurohuni që të mos i humbisni koncertet!');
    }, 300000);

    </script>
<footer>
    <div id="footer"></div>
</footer>
<script src="footer.js"></script>

</body>
</html>
