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

  <div class="back-container" style="position: absolute; top: 10px; left: 10px; z-index: 1000;">
    <button class="back-btn" style="background-color: #0056b3; color: #fff; border: 1px solid #ccc; padding: 6px 12px; font-size: 14px; border-radius: 6px; cursor: pointer; transition: background-color 0.2s, box-shadow 0.2s;" onclick="window.location.href = '../main.php'">
       &larr; Back
    </button>
  </div>

  <div class="theme-toggle">
    <button onclick="setTheme('light')">Light</button>
    <button onclick="setTheme('dark')">Dark</button>
  </div>

  <h2 class="page-title">Përdoruesit e Regjistruar</h2>

  <?php
    $res = mysqli_query($conn, "SELECT id, fullname, email, created_at FROM users ORDER BY id");
    if (mysqli_num_rows($res) > 0) {
      echo '<table class="users-table"><tr><th>ID</th><th>Emri i plotë</th><th>Email</th><th>Regjistruar</th></tr>';
      while ($row = mysqli_fetch_assoc($res)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>".htmlspecialchars($row['fullname'])."</td>
                <td>".htmlspecialchars($row['email'])."</td>
                <td>".htmlspecialchars($row['created_at'])."</td>
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
    <button type="button" id="btnKERKO">KERKO</button>
    <button type="button" id="btnRUAJ">RUAJ</button>
    <button type="button" id="btnEDITO">EDITO</button>
    <button type="button" id="btnFSHI">FSHI</button>
  </div>

  <div id="div_r"></div>

<script>
$(document).ready(function(){
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
    $.ajax({
      url: "action_s.php", 
      method: "POST",
      data: {
        kerko: 'kerko',
        id: id,
        fullname: name,
        email: email
      },
      success: function(data){
        $('#div_r').html(data);
      }
    });
  });

  $('#btnRUAJ').click(function(){
    if ($('#txtID').val().trim() !== '') {
      return alert('Lëre fushën ID bosh kur po krijon user të ri (AUTO_INCREMENT).');
    }
    var full = $('#txtEmri').val().trim(),
        mail = $('#txtEmail').val().trim(),
        pw   = $('#txtPassword').val();
    if(!full || !mail || !pw) return alert('Plotëso të gjitha fushat');
    $.ajax({
      url: "action_s.php",
      method: "POST",
      data: {
        ruaj: 'ruaj',
        fullname: full,
        email: mail,
        password: pw
      },
      success: function(data){
        $('#div_r').html(data);
      }
    });
  });

  $('#btnEDITO').click(function(){
    var id = $('#txtID').val().trim();
    var full = $('#txtEmri').val().trim();
    var mail = $('#txtEmail').val().trim();
    var pw = $('#txtPassword').val();

    if(!id || !full || !mail) return alert('Plotëso ID, fullname & email');
    $.ajax({
      url: "action_s.php",
      method: "POST",
      data: {
        edito: 'edito',
        id: id,
        fullname: full,
        email: mail,
        password: pw
      },
      success: function(data){
        $('#div_r').html(data);
      }
    });
  });

  $('#btnFSHI').click(function(){
    var id = $('#txtID').val().trim();
    var name = $('#txtEmri').val().trim();

    if(!id || !name) return alert('Plotëso ID dhe Emrin për fshirje');
    if(!confirm('Fshi user #' + id + ' (' + name + ')?')) return;
    $.ajax({
      url: "action_s.php",
      method: "POST",
      data: {
        fshi: 'fshi',
        id: id,
        fullname: name
      },
      success: function(data){
        $('#div_r').html(data);
      }
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
