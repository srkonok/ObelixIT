<?php


$url = 'https://developer.bdapps.com/subscription/otp/request';


$data_array = [
    "applicationId" => "APP_081112", 
    "password" => "1ab0db7de94bbbf7c0caa2336eabd603", 
    "subscriberId" => "tel:8801817848334", 
    "applicationHash" => "abcdefgh", 
    "applicationMetaData" => [
          "client" => "MOBILEAPP", 
          "device" => "Samsung S10", 
          "os" => "android 8", 
          "appCode" => "https://play.google.com/store/apps/details?id=lk.dialog.megarunlor" 
       ] 
 ]; 
 
$data = http_build_query($data_array);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);

$resp = curl_exec($ch);

if($e = curl_error($ch)){
    echo $e;
}
else{
    $decoded = json_decode($resp,true);
    // foreach($decoded as $key => $val){
    //     echo $key . ': ' . $val . '<br>';
    // }
    echo $resp;
    print_r($decoded);
}

curl_close($ch);
