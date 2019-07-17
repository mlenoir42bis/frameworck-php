<?php
session_start();


function getListRequest() {

    $bearer = '';
    if (isset($_SESSION['ASSURBOX_BEARERTOKEN'])) {
        $bearer = $_SESSION['ASSURBOX_BEARERTOKEN'];

        $ch = curl_init('https://devslot.assurbox.net/api/v1.0/GreenCard/Car/Requests');

        header('Content-Type: application/json');
        $authorization = "Authorization: Bearer ". $bearer;
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $result = curl_exec($ch);

        curl_close($ch);

        $listRequest=json_decode($result,true);

        $_SESSION['listRequest'] = $listRequest;
    }

}

