<?php
$interval = 180;
$lastSendTime = time();
$first = true;

while (true) {

    if (date('H') == 19) {
        sleep(36000);
    }

    echo " START \n";
    sleep($interval);

    $url = "https://api.telegram.org/bot2050411951:AAFFpB6mbWYM-vc1At7x_cTjFbI23QJYuxk/getUpdates";
    $ch = curl_init();
    $optArray = [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true
    ];
    curl_setopt_array($ch, $optArray);
    $result = json_decode(curl_exec($ch), true);
    curl_close($ch);
    $lastMessage = end($result['result']);

    if (in_array(mb_strtolower($lastMessage['message']['text']), ['ок', 'дала', 'не заебуй']) &&
        $lastSendTime <= $lastMessage['message']['date'] &&
        $lastMessage['message']['date'] >= (time() - 1800)
    ) {
        $first = true;
        echo " SKIP \n";
        continue;
    }

    $chanenalIds = [
        377949490,
        620708083
    ];

    $types = [11, 12, 13, 14, 15, 16, 18];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://rzhunemogu.ru/RandJSON.aspx?CType=" . $types[array_rand($types)]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);

    $output = iconv('cp1251', 'utf-8', $output);
    $output = str_replace('{"content":', "\n", $output);
    $message = urlencode(str_replace('"}', "\n", $output));

    foreach ($chanenalIds as $id) {
        $url = "https://api.telegram.org/bot2050411951:AAFFpB6mbWYM-vc1At7x_cTjFbI23QJYuxk/sendMessage?chat_id=" . $id;
        $url = $url . "&text=(ДАЙ ВОДЫ СЫНУ и немного улыбнись) " . $message . " (Если дала то ответь 'OK' или 'ДАЛА' или 'НЕ ЗАЕБУЙ')";

        $ch = curl_init();
        $optArray = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
        ];
        curl_setopt_array($ch, $optArray);
        curl_exec($ch);
        curl_close($ch);

        $first = false;
    }
    $lastSendTime = time();
    echo " SEND \n";
}