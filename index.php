<?php

require 'functions.php';

//задача 1
$file = file_get_contents('data.xml');
$xml = new SimpleXMLElement($file);
//echo $file;

foreach ($xml->Address as $order) {
    echo 'Name :' . $order->Name . '<br>';
    echo 'City :' . $order->City . '<br>';
    echo 'Street: ' . $order->Street . '<br>';
    echo 'Zip :' . $order->Zip . '<br>';
    echo 'Type: ' . $order->attributes()->Type . ', ' . '<br>';
    echo '<br>';

    echo 'PartNumber: ' . $order->attributes()->PurchaseOrderNumber . ', ';
    echo $xml->DeliveryNotes . '<br>';
    echo '<br>';
    foreach ($order->Items as $item) {
        echo $item->attributes()->PartNumber;
        echo '<br>';

    }
}
echo '<br>';
echo '<hr>';
//адача 2

$name = ['name' => 'Dima', 'age' => 29, 'gender' => 'man'];
echo json_encode($name) . '<br>';
file_put_contents('output.json', $name);
echo file_get_contents('output.json') . '<br>';
$namestr = '{"name":"Dima","age":29,"gender":"man"}';
echo '<pre>';
print_r(json_decode($namestr, false));
file_put_contents('output2.json', $namestr);
echo file_get_contents('output2.json') . '<br>';

echo '<br>';
echo '<hr>';
// задача 3

foreach (range(0, 100, 2) as $num) {
    $arr = str_split($num, 3);
    echo '<pre>';
    print_r($arr);
    $newfile = fopen('justfile.csv', 'w');

    fputcsv($newfile, $arr, ';');

}

// задача 4


$file4 = file_get_contents('https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json'); // открываем файл
$array1=json_decode($file4,true);
echo var_dump($file4);