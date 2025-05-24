document.addEventListener('DOMContentLoaded', () => {
    const volumeSlider = document.getElementById('volume');
    const volumeValue = document.getElementById('volume-value');
    const songsContainer = document.getElementById('songs-container');
    const form = document.getElementById('song-form'); // sigurohu që form ekziston në HTML

    function applyVolume(val) {
        const vol = val / 100;
        const audios = document.querySelectorAll('audio');
        audios.forEach(audio => audio.volume = vol);
        volumeValue.textContent = val;
        document.cookie = "volume=" + vol + "; path=/; max-age=31536000";
    }

    volumeSlider.addEventListener('input', e => {
        applyVolume(e.target.value);
    });

    applyVolume(volumeSlider.value); 

    // Event delegation për play/pause
    songsContainer.addEventListener('click', (e) => {
        if (e.target.classList.contains('play-song-img')) {
            const button = e.target;
            const songId = button.getAttribute('data-song');
            const audio = document.querySelector(`audio[data-audio="${songId}"]`);

            if (!audio) return;

            if (audio.paused) {
                // Ndal të gjitha audio të tjera
                document.querySelectorAll('.play-song-img').forEach(btn => {
                    if (btn !== button) {
                        const otherId = btn.getAttribute('data-song');
                        const otherAudio = document.querySelector(`audio[data-audio="${otherId}"]`);
                        if (otherAudio && !otherAudio.paused) {
                            otherAudio.pause();
                            otherAudio.currentTime = 0;
                            btn.src = 'foto/play.png';
                        }
                    }
                });
                audio.play();
                button.src = 'foto/pause.png';
            } else {
                audio.pause();
                button.src = 'foto/play.png';
            }
        }
    });

    if(form) {
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

            const uniqueId = 'song-' + Date.now(); // id unik

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
                    <div class="music-player">
                        <div class="play-song mouse">
                            <img class="play-song-img" src="foto/play.png" alt="play" data-song="${uniqueId}">
                            <audio data-audio="${uniqueId}">
                                <source src="${songFileURL}" type="audio/mp3">
                            </audio>
                        </div>
                        <div class="download-song">
                            <a href="${songFileURL}" download="${songName} - ${artistName}">Download</a>
                        </div>
                    </div>
                </div>
            `;

            songsContainer.appendChild(songElement);
            form.reset();
            applyVolume(volumeSlider.value); 
        });
    }
});
