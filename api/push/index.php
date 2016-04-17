<?php
$datas = file_get_contents('php://input');
$datas = json_decode($datas, true);

$plates = $datas["results"]["0"];

$ip = "10.255.0.2";

$allow = 0;

require_once "../../required.php";

$i = 0;
$p = 0;

foreach ($plates["candidates"] as $k => $v) {
    if ($plate->isAllow($v["plate"])) {
        $allow = 1;
        $p = $i;
    }
    $i++;
}


if ($allow == 1) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "http://" . $ip . "/status.xml?pl1=1&r2=1&r3=0");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_exec($curl);
    sleep(5);
    curl_setopt($curl, CURLOPT_URL, "http://" . $ip . "/status.xml?r2=0&r3=0");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_exec($curl);
    curl_close($curl);
} else {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "http://" . $ip . "/status.xml?r3=1&r2=0");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_exec($curl);
    sleep(5);
    curl_setopt($curl, CURLOPT_URL, "http://" . $ip . "/status.xml?r2=0&r3=0");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_exec($curl);
    curl_close($curl);
}

$history->add($datas, $allow, $p);