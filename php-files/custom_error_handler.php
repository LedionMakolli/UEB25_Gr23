<?php
function custom_error_handler($errno, $errstr, $errfile, $errline) {
    $errorType = match ($errno) {
        E_ERROR             => "Gabim fatal",
        E_WARNING           => "Paralajmërim",
        E_PARSE             => "Gabim sintakse",
        E_NOTICE            => "Shënim",
        E_CORE_ERROR        => "Gabim në sistemin bazë",
        E_CORE_WARNING      => "Paralajmërim nga sistemi bazë",
        E_COMPILE_ERROR     => "Gabim gjatë kompilimit",
        E_COMPILE_WARNING   => "Paralajmërim gjatë kompilimit",
        E_USER_ERROR        => "Gabim nga përdoruesi",
        E_USER_WARNING      => "Paralajmërim nga përdoruesi",
        E_USER_NOTICE       => "Shënim nga përdoruesi",
        default             => "Gabim i panjohur"
    };

    echo "<div style='padding:10px; background:#ffe6e6; color:red; border:1px solid red;'>
            <strong><u>Gabim:</u></strong> $errorType<br>
            <strong>Përshkrimi:</strong> $errstr<br>
            <strong>Fajlli:</strong> $errfile<br>
            <strong>Rreshti:</strong> $errline
          </div>";

    if (in_array($errno, [E_ERROR, E_USER_ERROR, E_CORE_ERROR, E_COMPILE_ERROR])) {
        exit;
    }
}

set_error_handler("custom_error_handler");
?>
