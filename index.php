<?php

#############################
#                           #
# Coded By Meti ( @futsal ) #
#                           #
#############################

$postRequest = array(
    'q' => $_GET['q'],
);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://instaoffline.net/process/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postRequest);

$result = json_decode(curl_exec($ch),true);

curl_close($ch);

preg_match_all('@href="([^"]+)"@' , $result['html'], $match );

$match = array_pop($match);

header("Content-type: application/json; charset=utf-8");

echo json_encode(['dev'=>'@futsal7','result'=>$match],448);

?>