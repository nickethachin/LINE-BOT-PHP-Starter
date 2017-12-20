<?php
$access_token = 'kXXzJ4XLZiWRFdUWsDE4NyRYZgCKOB87Ojp564pJzYm6TH0H6pFvctA+XLqv4g15BMYBahaKHtnjIp6sovWaPPxOL06fPsyyLuXaW577BvQVVtkePiATciJ8nXalao65DOG978SCxt2OYqpZL4j3IwdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
