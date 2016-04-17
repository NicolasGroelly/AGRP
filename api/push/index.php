<?php
$datas = file_get_contents('php://input');
$datas = json_decode($datas);

$plates = $datas["results"]["0"];

$ip = "10.255.0.2";
$url = "http://admin:admin@" . $ip . "/status.xml?pl1=1";

$allow = 0;

require_once "../../required.php";

if ($plate->isAllow($plates["plate"])) {
    $allow = 1;
} else {
    foreach ($plates["candidates"] as $k => $v) {
        if ($plate->isAllow($v["plate"])) {
            $allow = 1;
        }
    }
}

if ($allow == 1) {
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_exec($curl);
  curl_close($curl);
} 

$history->add($datas, $allow);