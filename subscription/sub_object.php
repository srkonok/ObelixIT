<?php
    ini_set('error.log','ussd-error.log');
    require 'bdapps_cass_sdk.php';
    $appid = "APP_081129";
    $password = "17acaf11ba4e3d76f749e601871cf447";
    // $appid = "APP_081112";
    // $password = "1ab0db7de94bbbf7c0caa2336eabd603";
    $subscriptionServer= 'https://developer.bdapps.com/subscription/send';
    $body = json_decode(file_get_contents("php://input"), true);

    $address = $body["phone"];
    
    try{
        
        
        $subs = new Subscription($subscriptionServer, $appid, $password);
        

        // $subs->subscribe($address);
        // $subs->unSubscribe($address);
        $data=$subs->getStatus($address);
        print_r($data);
    }
    catch(Exception $e) {
        file_put_contents('USSDERROR.tct', 'Some error occured');
    }
?>