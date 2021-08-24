<?php 



$info = file_get_contents('https://superposuda.retailcrm.ru/api/v5/orders?apiKey=QlnRWTTWw9lv3kjxy1A8byjUmBQedYqb');
$info = json_decode($info, true);

echo 'test';
print_r($info);