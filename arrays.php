<?php 
 

 $djEmri="Illyrian";
 $tourViti=2025;
 $tiketaCmimi=100;

var_dump($djEmri);
echo"</br>";
var_dump($tiketaCmimi);
echo"</br>";
 
function infoTiketa($tiketaCmimi){
    return "Cmimi i biletes per koncertin eshte $tiketaCmimi euro";
}
echo infoTiketa($tiketaCmimi);

$quantity = 2;  // a duhet me qit te tickets si input
function kalkuloCmiminTotal($tiketaCmimi, $quantity){
    return $tiketaCmimi * $quantity;
   
 }
 $cmimiTotal= kalkuloCmiminTotal($tiketaCmimi, $quantity);
if($cmimiTotal !== 0){ 
    echo"<p>Cmimi total per $quantity bileta eshte $cmimiTotal euro</p>";
 }

 $NameSingers = [
    'Love Galore',
    'Space Bound',
    'Heartles',
    'H.O.L.L.A',
    'Starlight Interlude',
    'One Last Time',
    'Mathematics',
    'Ms. Jackson',
    'Temperature'
];

    $concerte = [
        ['vendi' => 'Tirana', 'data' => '15 Janar 2025'],
        ['vendi' => 'Prishtina', 'data' => '20 Janar 2025'],
        ['vendi' => 'Shkupi', 'data' => '25 Janar 2025'],
        ['vendi' => 'Berlin', 'data' => '30 Janar 2025'],
        ['vendi' => 'Paris', 'data' => '5 Shkurt 2025'],
        ['vendi' => 'Pragë', 'data' => '10 Shkurt 2025'],
        ['vendi' => 'Londër', 'data' => '15 Shkurt 2025'],
        ['vendi' => 'Vienna', 'data' => '20 Shkurt 2025'],
        ['vendi' => 'Budapest', 'data' => '25 Shkurt 2025']
    ];

    
    echo '<pre>';
    var_dump($concerte);
    echo '</pre>';


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