<?php 
 echo "HELLLOORRR DUA";

 $djEmri="Illyrian";
 $tourViti=2025;
 $tiketaCmimi=100;
 $cmimiTotal="";
var_dump($djEmri);
var_dump($tiketaCmimi);
 

 $bashkepunimet = [
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

function kalkuloCmiminTotal($tiketaCmimi, $quantity){
    return  $tiketaCmimi * $quantity;
 }

    $rankimet = [
        "Ariana Grande" => 1,
        "Ed Sheeran" => 2,
        "Majku" => 3
    ];


    $udhetimet = ["New York","Berlin","Amsterdan"];
    echo "</br>";
    asort($rankimet);
    print_r($rankimet);
    echo "</br>";
    ksort($rankimet);
    print_r($rankimet);
    echo "</br>";
    rsort($rankimet); 
    print_r($rankimet);
    echo "</br>";
    sort($rankimet);
    print_r($rankimet);
    echo "</br>";
?>