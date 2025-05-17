<?php
session_start();
$_SESSION['songs_plays'] = ($_SESSION['songs_plays'] ?? 0) + 1;
header("Location: ../songs.php");
exit;
?>