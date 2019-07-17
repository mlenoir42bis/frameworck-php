<?php 
session_start();
//session_unset ();
    $bearer = $_SESSION['ASSURBOX_BEARERTOKEN'];

    $url = 'https://devslot.assurbox.net/api/v1.0/GreenCard/Car/Requests/954e61c2-60d0-4679-8b7b-447ec56d733f/DocumentsSNCA';
    $ch = curl_init($url);

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
    print_r($listRequest);