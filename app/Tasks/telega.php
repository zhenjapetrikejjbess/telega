<?php
$interval = 180;
$lastSendTime = time();

while (true) {

    if(date('H') == 22){
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
        echo " SKIP \n";
        continue;
    }

    $chanenalIds = [
        377949490,
        620708083
    ];

    foreach ($chanenalIds as $id) {
        $url = "https://api.telegram.org/bot2050411951:AAFFpB6mbWYM-vc1At7x_cTjFbI23QJYuxk/sendMessage?chat_id=" . $id;
        $url = $url . "&text=ДАЙ ВОДЫ СЫНУ (Если дала то ответь 'OK' или 'ДАЛА' или 'НЕ ЗАЕБУЙ')";
        $ch = curl_init();
        $optArray = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
        ];
        curl_setopt_array($ch, $optArray);
        curl_exec($ch);
        curl_close($ch);

    }
    $lastSendTime = time();
    echo " SEND \n";
}