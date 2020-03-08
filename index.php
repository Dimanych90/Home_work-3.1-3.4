<?php


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

$original = ['user' => ['name' => 'Vasya'], 'system' => ['of' => 'down']];
$original = json_decode('output.json', true);
file_put_contents('output.json', $original);
echo file_get_contents('output.json') . '<br>';
$originalstr = '{"user":{"name":"Vasya"},"system":{"of":"down"}}';
echo '<pre>';
print_r(json_decode($originalstr, false));
file_put_contents('output2.json', $originalstr);
echo file_get_contents('output2.json') . '<br>';
if (rand(0, 1)) {
    unset($original['system']);
}
$copy = json_decode('output2.json', true);
$difference = array_diff_assoc($original, $copy);
if (!empty($difference)) {
    print_r($difference);
} else {
    echo 'Массивы не отличаются';
}


echo '<br>';
echo '<hr>';
// задача 3

for ($i = 0; $i <= 50; $i++) {
    $numbers[$i] = rand(1, 100);
}
file_put_contents('numbers.csv', '');
$csv = fopen('numbers.csv', 'r+');
fputcsv($csv, 'numbers.csv', $numbers, ';');
fclose('numbers.csv');
$csv = fopen('numbers.csv', 'r+');
$numbers = fgetcsv($csv, 1000, ';');
fclose('numbers.csv');
$sum = array_reduce($numbers, function ($result, $number) {
    if ($number % 2 === 0) {
        return $result += $number;
    }
}, 0);
echo "Сумма четных чисел: $sum";

// задача 4


$file4 = file_get_contents('https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json'); // открываем файл
$array1 = json_decode($file4, true);
echo var_dump($file4);