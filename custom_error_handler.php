<?php
function error_handler($errno, $errstr, $errfile, $errline, $errcontext) {
    echo "<b>Gabim i personalizuar u kap:</b><br>";
    echo "Kodi i gabimit: $errno<br>";
    echo "Mesazhi: $errstr<br>";
    echo "Skedari: $errfile<br>";
    echo "Linja: $errline<br>";
    echo "<hr>";
}
set_error_handler("error_handler");

function exception_handler($exception) {
    echo "<b>Ndodhi një përjashtim:</b><br>";
    echo "Mesazhi: " . $exception->getMessage() . "<br>";
    echo "<hr>";
}
set_exception_handler("exception_handler");
?>
