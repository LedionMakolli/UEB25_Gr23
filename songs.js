document.addEventListener('DOMContentLoaded', () => {
    const volumeSlider = document.getElementById('volume');
    const volumeValue = document.getElementById('volume-value');
    const audios = document.querySelectorAll('audio');
    const form = document.getElementById('song-form');
    const songsContainer = document.getElementById('songs-container');

    function applyVolume(val) {
        const vol = val / 100;
        audios.forEach(audio => audio.volume = vol);
        volumeValue.textContent = val;
        document.cookie = "volume=" + vol + "; path=/; max-age=31536000";
    }

    volumeSlider.addEventListener('input', e => {
        applyVolume(e.target.value);
    });

    applyVolume(volumeSlider.value); 

    function handlePlayPause() {
        const playButtons = document.querySelectorAll('.play-song img');
        playButtons.forEach((button) => {
            button.addEventListener('click', () => {
                const songId = button.getAttribute('data-song');
                const audio = document.querySelector(`audio[data-audio="${songId}"]`);

                if (audio.paused) {
                    playButtons.forEach((btn) => {
                        const otherAudio = document.querySelector(`audio[data-audio="${btn.getAttribute('data-song')}"]`);
                        if (otherAudio && !otherAudio.paused) {
                            otherAudio.pause();
                            otherAudio.currentTime = 0;
                            btn.src = 'foto/play.png';
                        }
                    });

                    audio.play();
                    button.src = 'foto/pause.png';
                } else {
                    audio.pause();
                    button.src = 'foto/play.png';
                }
            });
        });
    }

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const songName = document.getElementById('song-name').value.trim();
        const artistName = document.getElementById('artist-name').value.trim();
        const songFile = document.getElementById('song-file').files[0];
        const songImage = document.getElementById('song-image').files[0];

        if (!songName || !artistName || !songFile || !songImage) {
            alert("Ju lutem plotësoni të gjitha fushat dhe ngarkoni një file audio dhe një foto.");
            return;
        }

        const songFileURL = URL.createObjectURL(songFile);
        const songImageURL = URL.createObjectURL(songImage);

        const songElement = document.createElement('div');
        songElement.classList.add('song');

        songElement.innerHTML = `
            <div class="song-img">
                <img src="${songImageURL}" alt="${songName}">
            </div>
            <div class="song-details">
                <div class="song-details-content">
                    <div class="song-name">${songName}</div>
                    <div class="artist-name">${artistName}</div>
                </div>
                <div>
                    <div class="music-player">
                        <div class="play-song mouse">
                            <img src="foto/play.png" alt="play" data-song="${songName}">
                            <audio data-audio="${songName}">
                                <source src="${songFileURL}" type="audio/mp3">
                            </audio>
                        </div>
                        <div class="download-song">
                            <a href="${songFileURL}" download="${songName} - ${artistName}">Download</a>
                        </div>
                    </div>
                </div>
            </div>
        `;

        songsContainer.appendChild(songElement);
        form.reset();
        handlePlayPause();
        applyVolume(volumeSlider.value); 
    });

    handlePlayPause();
});