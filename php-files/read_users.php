<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'staff') {
    header("Location: ../login.php");
    exit;
}
require_once ("db.php");             
require_once ("custom_error_handler.php");

$theme = $_COOKIE['theme'] ?? 'light';
$bgColor = $theme === 'dark' ? '#333333' : '#f2f2f2';
?>
<!DOCTYPE html>
<html lang="sq">
<head>
  <meta charset="UTF-8">
  <title>Lista e Përdoruesve</title>
  <link rel="stylesheet" href="../styles/filter_users.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body style="background: <?= $bgColor ?>;">

  <div class="theme-toggle">
    <button onclick="setTheme('light')">Light</button>
    <button onclick="setTheme('dark')">Dark</button>
  </div>

  <h2 class="page-title">Përdoruesit e Regjistruar</h2>

  <?php
    $res = mysqli_query($conn, "SELECT id, fullname, email, created_at FROM users ORDER BY id");
    if (mysqli_num_rows($res) > 0) {
      echo '<table class="users-table"><tr><th>ID</th><th>Emri i plotë</th><th>Email</th><th>Regjistruar</th></tr>';
      while ($u = mysqli_fetch_assoc($res)) {
        echo "<tr>
                <td>{$u['id']}</td>
                <td>".htmlspecialchars($u['fullname'])."</td>
                <td>".htmlspecialchars($u['email'])."</td>
                <td>".htmlspecialchars($u['created_at'])."</td>
              </tr>";
      }
      echo '</table>';
    } else {
      echo '<p class="no-data">Nuk ka përdorues në bazë.</p>';
    }
  ?>

  <button id="manage-btn">Menaxho Përdorues</button>

  <div id="manage-container">
    <h3>Filtro dhe edito Users</h3>
    <label>ID:</label><br>
    <input type="text" id="txtID" placeholder="ID"><br>
    <label>Emri i plotë:</label><br>
    <input type="text" id="txtEmri" placeholder="Emri i plotë"><br>
    <label>Email:</label><br>
    <input type="email" id="txtEmail" placeholder="Email"><br>
    <label>Fjalëkalimi:</label><br>
    <input type="password" id="txtPassword" placeholder="Password"><br>
    <button id="btnKERKO">KERKO</button>
    <button id="btnRUAJ">RUAJ</button>
    <button id="btnEDITO">EDITO</button>
    <button id="btnFSHI">FSHI</button>
  </div>

  <div id="div_r"></div>

<script>
$(function(){
  $('#manage-btn').click(function(){
    $('#manage-container').toggle();
    $('#div_r').empty();
  });

  $('#btnKERKO').click(function(){
    var id = $('#txtID').val().trim();
    var name  = $('#txtEmri').val().trim();
    var email = $('#txtEmail').val().trim();

    if(!id && !name && !email) {
      return alert('Fut ID, Emër ose Email për kërkim');
    }
    $.post('action_s.php', {
      kerko: 'kerko',
      id: id,
      fullname: name,
      email: email
    }, function(data){
      $('#div_r').html(data);
    });
  });

    $('#btnRUAJ').click(function(){
   if ($('#txtID').val().trim() !== '') {
     return alert('Lëre fushën ID bosh kur po krijon user të ri (AUTO_INCREMENT).');
   }
    var full = $('#txtEmri').val().trim(),
        mail = $('#txtEmail').val().trim(),
        pw   = $('#txtPassword').val();
    if(!full||!mail||!pw) return alert('Plotëso të gjitha fushat');
    $.post('action_s.php',{
      ruaj:     'ruaj',
      fullname: full,
      email:    mail,
      password: pw
    }, function(data){
      $('#div_r').html(data);
    });
  });

  $('#btnEDITO').click(function(){
    var id    = $('#txtID').val().trim();
    var full  = $('#txtEmri').val().trim();
    var mail  = $('#txtEmail').val().trim();
    var pw    = $('#txtPassword').val();

    if(!id||!full||!mail) return alert('Plotëso ID, fullname & email');
    $.post('action_s.php',{
      edito: 'edito',
      id: id,
      fullname: full,
      email: mail,
      password: pw
    }, function(data){
      $('#div_r').html(data);
    });
  });

  $('#btnFSHI').click(function(){
    var id   = $('#txtID').val().trim();
    var name = $('#txtEmri').val().trim();

    if(!id||!name) return alert('Plotëso ID dhe Emrin për fshirje');
    if(!confirm('Fshi user #'+id+' ('+name+')?')) return;
    $.post('action_s.php',{
      fshi:     'fshi',
      id:       id,
      fullname: name
    }, function(data){
      $('#div_r').html(data);
    });
  });
});
</script>
<script>
    function setTheme(theme) {
        fetch("set_theme.php?theme=" + theme)
            .then(() => location.reload());
    }
</script>
</body>
</html>
