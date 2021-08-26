<?php 


// https://github.com/Kaidor-s/test_superPosuda - репозиторий гит данного кода
/*
    - (30 мин) работы 23.08
    - перерыв 2 дня
    - (1 час 45 минут) работы 26.08
*/ 
/*
    Алгоритм:
    - [+] подкглючиться и вывести данные
    - [+] сформировать data сообщения
    - [+] сформировать options сообщения
    - [ ] попытаться отправить сообщение, посмотреть что выйдет и по возможности устранить ошибки


    возможные ошибки: в data, в options, метод file_get_contents() может не подходить для отправки данных
*/ 
$data = array(
    'number' => '5101999',
    'orderType' => 'fizik',
    'orderMethod' => 'test',
    'countryIso' => 'RU',
    'createdAt' => date("Y-m-d H:i:s"),
    // 'statusUpdatedAt' => date("Y-m-d H:i:s"),
    'summ' => 0,
    'totalSumm' => 0,
    'prepaySum' => 0,
    'purchaseSumm' => 0,
    // 'markDatetime' => date("Y-m-d H:i:s"),

    'lastName' => 'Калашов',
    'firstName' => 'Руслан',
    'patronymic' => 'Артурович',

    'managerComment' => 'https://github.com/Kaidor-s/test_superPosuda',

    'site' => 'test',
    'status' => 'trouble',

    'items' => array(
        array(
            'markingCodes' => array(),
            'discounts' => array(),
            'initialPrice' => 2050,
            'discountTotal' => 1250,
            'createdAt' => date("Y-m-d H:i:s"),
            'quantity' => 1,
            'status' => 'new',

            'offer' => array(
                'displayName' => 'Маникюрный набор AZ105R Azalita',
                'id' => '388744',
                'xmlId' => 'f38f7c40-8f89-4782-9318-5bc4a405543c',
                'name' => 'Маникюрный набор AZ105R Azalita',
                'unit' => array(
                    'code' => 'pc',
                    'name' => 'Штука',
                    'sym' => 'шт.',
                ),
                'properties' => array(),
                'purchasePrice' => 1250,
            ),
        )
    ),

    'customFields' => array(
        'prim' => 'тестовое задание'
    )
);








//хз почему не работает, сдаюсь! 
$data = http_build_query($data);
$opts = array(
   'http' => array(
        'method'  => 'POST',
        'header'=> "Content-type: application/x-www-form-urlencoded\r\n"
                    . "Content-Length: " . strlen($data) . "\r\n",
        'content' => $data
    )
);
$context  = stream_context_create($opts);
$fp = fopen('https://superposuda.retailcrm.ru/api/v5/orders?apiKey=QlnRWTTWw9lv3kjxy1A8byjUmBQedYqb', 'r', false, $context);
fpassthru($fp);
fclose($fp);
//НЕРАБОТАЕТ








echo "test 1<br><br>";
/*
$body = '{
  "board_id": 3e5005e000000000092c234,
  "content": [
    {
      "source": {
        "url": https://site.ru/123934.jpg
      },
      "source_type": image
    }
  ],
  "description": Описание карточки. Максимальная длина описания — 2048 символов.,
  "source_meta": {
    "page_domain": site.ru,
    "page_title": Заголовок страницы с контентом,
    "page_url": https://site.ru
  }
}';

$opts = array('http' =>
  array(
    'method'  => 'POST',
    'header'  => "Host: api.collections.yandex.net\r\n".
    "Authorization: OAuth AgAAAAAAAAAAAAAAAADDDDDDDD3jHzZ8\r\n".
    "Content-Type: application/json; charset=utf-8\r\n".
    "Accept: application/json\r\n",
    'content' => $body
  )
);
                   
$context  = stream_context_create($opts);
$url = 'https://api.collections.yandex.net/v1/cards/?as_company=my_company';
$result = file_get_contents($url, false, $context);

*/















$info = file_get_contents('https://superposuda.retailcrm.ru/api/v5/orders?apiKey=QlnRWTTWw9lv3kjxy1A8byjUmBQedYqb');
$info = json_decode($info, true);
$countStr = 0;

echo "test 2<br><br>";


// для комфортного просмотра списка заказов

foreach ($info as $key => $value) {
    echo $key.' | '.$value."<br>";
    $countSt++;

    if(is_array($value)){
        foreach ($value as $key2 => $value2) {
            echo '........... '.$key2.' | '.$value2."<br>";
            $countSt++;

            if(is_array($value2)){
                foreach ($value2 as $key3 => $value3) {
                    if ($key3 == 'items') {
                        echo "........... "."........... ".$key3." | <br><br>";
                        print_r($value3);
                        echo "<br><br>";
                    } else { echo '........... '.'........... '.$key3.' | '.$value3."<br>"; };
                    
                    
                    $countSt++;

                    if(is_array($value3)){
                        foreach ($value3 as $key4 => $value4) {
                            echo '........... '.'........... '.'........... '.$key4.' | '.$value4."<br>";
                            $countSt++;

                            if(is_array($value4)){
                                foreach ($value4 as $key5 => $value5) {
                                    echo "........... "."........... "."........... "."........... ".$key5." | ".$value5."<br>";
                                    $countSt++;
                                };
                            };
                        };
                    };
                };
            };
            echo "<br><br>////////////////////////////////////////////////////////////////////////////////////////////////////////////<br>";
        };
    };
}

echo "<br>";
echo "<br>";
echo $countSt;