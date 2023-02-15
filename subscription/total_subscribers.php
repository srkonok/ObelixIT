<?php


$url = "https://developer.bdapps.com/subscription/query-base";


$data_array = '{
    "applicationId": "APP_081129",
    "password": "17acaf11ba4e3d76f749e601871cf447"
}';



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
    echo $resp;
    // $decoded = json_decode($resp,true);
    // foreach($decoded as $key => $val){
    //     echo $key . ': ' . $val . '<br>';
    // }
    // // print_r($decoded);
}

curl_close($ch);
