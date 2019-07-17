<?php
session_start(); 
$bearer = '';
if (isset($_SESSION['ASSURBOX_BEARERTOKEN'])) {

    $id = isset($_GET['correlationId'])?$_GET['correlationId']:null;
    $communication = isset($_POST['Communication'])?$_POST['Communication']:null;
    if(isset($id) || $id!=="" || isset($communication) || $communication!==""){
        $bearer = $_SESSION['ASSURBOX_BEARERTOKEN'];
        $ch = curl_init('https://devslot.assurbox.net/api/v1.0/GreenCard/Car/Requests?correlationId='. $id .'&communication=toto');
        
        header('Content-Type: application/json');
        $authorization = "Authorization: Bearer ". $bearer;
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $result = curl_exec($ch);
    
        curl_close($ch);
    
        $deleteRequest=json_decode($result,true);
        $_SESSION['deleteRequest'] = $deleteRequest;
    
        //print_r($deleteRequest);

        if (!isset($deleteRequest->Message)) {
            $_SESSION['error'] = true;
            header("Location: /request.php");
            exit();
        }else {
            header('Location: /delete.php?correlationId=' . $id);
            exit();
        }
    }
}
else {
    header("Location: /");
    exit();
}