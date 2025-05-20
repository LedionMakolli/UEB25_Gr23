<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['songs_plays'])) {
    $_SESSION['songs_plays'] = 0;
}

?>
<nav class="nav_fixed">
  <div class="nav__header">
    <div class="nav__logo">
      <a href="main.php" class="logo">ILLYRIC</a>
    </div>

    <?php if (!empty($_SESSION['fullname'])): ?>
      <div class="nav__user" style="margin-left:1rem; color:#fff; font-weight:500;">
        <?= htmlspecialchars($_SESSION['fullname']) ?>
      </div>
    <?php endif; ?>

    <div class="nav__menu__btn" id="menu-btn">
      <span><i class="ri-menu-line"></i></span>
    </div>
  </div>

  <ul class="nav__links" id="nav-links">
    <li><a href="main.php">Home</a></li>
    <li>
  <?php if (!empty($_SESSION['user_id'])): ?>
    <a href="songs.php?play=1">Songs</a>
  <?php else: ?>
    <a href="#" onclick="alert('Ju lutemi kyçuni për të dëgjuar këngët tona!');">Songs</a>
  <?php endif; ?>
  </li>


    <li><a href="aboutus.php">About Us</a></li>
    <li><a href="blog.php">Blog</a></li>
    <?php if (!empty($_SESSION['role']) && $_SESSION['role'] === 'staff'): ?>
        <li><a href="php-files/read_users.php">Klientët</a></li>
    <?php endif; ?>

  </ul>

  <div class="nav__btns">
  <?php if (!empty($_SESSION['role']) && $_SESSION['role'] === 'staff'): ?>
    <button class="btn1" disabled style="opacity: 0.5; cursor: not-allowed;">
      Rate Us
    </button>
  <?php else: ?>
    <button class="btn1" onclick="window.location.href='rate_us.php'">
      Rate Us
    </button>
  <?php endif; ?>
</div>


  <div class="nav__btns">
    <?php if (!empty($_SESSION['user_id'])): ?>
      <button
        class="btn2"
        onclick="window.location.href='php-files/logout.php'"
        style="background-color: #f66;"
      >
        Log Out
      </button>
    <?php else: ?>
      <button
        class="btn2"
        onclick="window.location.href='login.php'"
        style="background-color: #87CEEB;"
      >
        Log In
      </button>
    <?php endif; ?>
  </div>
  <script>
  function incrementSongs() {
    fetch('php-files/increment_songs.php')
      .then(response => response.json())
      .then(data => {
        alert("Keni dëgjuar këngë " + data.plays + " herë.");
        window.location.href = 'songs.php';
      })
      .catch(err => console.error(err));
  }
</script>

</nav>
