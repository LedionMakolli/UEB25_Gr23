<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
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
        <a href="songs.php">Songs</a>
      <?php else: ?>
        <a href="#" onclick="alert('Ju lutemi kyçuni për të dëgjuar këngët tona!');">Songs</a>
      <?php endif; ?>
    </li>
    <li><a href="aboutus.php">About Us</a></li>
    <li><a href="blog.php">Blog</a></li>
  </ul>

  <div class="nav__btns">
    <button class="btn1" onclick="window.location.href='rate_us.php'">
      Rate Us
    </button>
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
</nav>
