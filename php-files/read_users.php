<?php
if(session_status()===PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'staff') {
    header("Location: ../login.php");
    exit;
}
require_once("custom_error_handler.php");

$filename = "users.txt";

echo "<!DOCTYPE html>
<html lang='sq'>
<head>
    <meta charset='UTF-8'>
    <title>Lista e Përdoruesve</title>
    <style>
        h2 { text-align: center; }
        body { font-family: Arial; background-color: #f2f2f2; padding: 20px; }
        table { border-collapse: collapse; width: 100%; background-color: white; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        h2 { color: #333; }
    </style>
</head>
<body>
<h2>Përdoruesit e Regjistruar</h2>";

if (file_exists($filename)) {
    $filesize = filesize($filename);
    if ($filesize === 0) {
        echo "<p>Fajlli ekziston por është bosh.</p>";
    } else {
        $handle = fopen($filename, "r");
        if ($handle) {
            echo "<table>
                    <tr>
                        <th>Emri i Plotë</th>
                        <th>Email</th>
                        <th>Data & Ora e Regjistrimit</th>
                    </tr>";
            while (($line = fgets($handle)) !== false) {
                $parts = explode("|", $line);
                if (count($parts) === 3) {
                    $fullname = trim($parts[0]);
                    $email = trim($parts[1]);
                    $timestamp = trim($parts[2]);
                    echo "<tr>
                            <td>$fullname</td>
                            <td>$email</td>
                            <td>$timestamp</td>
                          </tr>";
                }
            }
            fclose($handle);
            echo "</table>";
        } else {
            echo "<p style='color:red;'>Nuk u hap fajlli për lexim.</p>";
        }
    }
} else {
    echo "<p style='color:red;'>Fajlli <b>users.txt</b> nuk ekziston.</p>";
}

echo "</body></html>";
?>
