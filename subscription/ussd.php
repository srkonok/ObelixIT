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
    echo nl2br($address ."\n");
    // $ussdserverurl= "https://developer.bdapps.com/ussd/send";
    // $responseMsg = "select from the menu \n 1. confirm \n 2. cancel \n 3.option 3";
    
    try{
        
        $subs = new Subscription($subscriptionServer, $appid, $password);

        $data = $subs->getStatus($address);
        print_r($data);



    /*  $sessionId = $receiver->getSessionId();
        $address = $receiver->getAddress();
        $ussdoperation = $receiver->getussdoperation();
        $content = $receiver->getMessage(); //

        if ($ussdoperation == "mo-init"){
            try {
                $ussdSender->ussd($sessionId, $responseMsg, $address);
            }
            catch(Exception $e) {
                $ussdSender->ussd($sessionId,'Sorry error occured try again', $address);

                file_put_contents('USSDERROR.tct','Some error occured');
            }
        }
        else {
            switch($content){
                case "1":
                    $ussdSender->ussd($sessionId, "You have dialied 1", $address, "mt-fin");
                    break;
                case "2":
                    $ussdSender->ussd($sessionId, 'You have dialied 2', $address);
                    break;
                case "3":
                    $ussdSender->ussd($sessionId, 'You have dialied 3', $address);
                    break;
            }
        }*/
    }
    catch(Exception $e) {
        file_put_contents('USSDERROR.tct', 'Some error occured');
    }
?>