<?php
function sendMessage($phone,$message)
{
    // authentication
    $x_username           = "kanyi";
    $x_apikey             = "baak_ZqjpRJ0Z0XwA5CyxEITVIxU4aCbJGWNauZKwck9EmQxUv";

    // id of contact to delete
    $params = array(
        "phoneNumbers"=> $phone,
        "message"=>      $message,
        "senderId"=>     "FOLENI", // leave blank if you do not have a custom sender Id
    );

    $data = json_encode($params);

    // endoint
    $sendMessageURL     = "https://api.braceafrica.com/v1/sms/send";

    $req                  = curl_init($sendMessageURL);

    curl_setopt($req, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($req, CURLOPT_TIMEOUT, 60);
    curl_setopt($req, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($req, CURLOPT_POSTFIELDS, $data);
    curl_setopt($req, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'x-api-user: '.$x_username,
        'x-api-key: '.$x_apikey
    ));

    // read api response
    $res              = curl_exec($req);

    // close curl
    curl_close($req);

    // print the raw json response
    // var_dump($res);
}


?>