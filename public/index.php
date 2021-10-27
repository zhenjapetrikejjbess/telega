<?php

require '../vendor/autoload.php';

//$test = new \App\Test();
//echo $test->hello();

$config = [
    'host' => 'ch_server',
    'port' => '8123',
    'username' => 'default',
    'password' => ''
];

$db = new ClickHouseDB\Client($config);

$result = $db->select('SELECT * FROM test')->rawData();


echo '<pre>';
print_r($result);
echo '</pre>';
die();
