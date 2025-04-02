<?php 
 echo "HELLLOORRR DUA";

 

 $bahkpunimet = [
    "Ariana Grande" => [
        "One Last Time" => [123120023],
        "One Last Time" => [873123123],
        "One Last Time" => [903123123]
    ], "Ed Sheeran" => [
        "Shape of you" =>[1123123],
        "Galway girl" =>[1123123],
        "Photograph" =>[1123123]
    ], "Majku" => [
        "Dashni" => [123123]
    ]
];

    $rankimet = [
        "Ariana Grande" => 1,
        "Ed Sheeran" => 2,
        "Majku" => 3
    ];


    $udhetimet = ["New York","Berlin","Amsterdan"];
    echo "</br>";
    asort($rankimet);
    print_r($rankimet);
    ksort($rankimet);
    rsort($rankimet); 
    sort($rankimet);
?>