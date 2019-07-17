<?php
session_start(); 
$bearer = '';
if (isset($_SESSION['ASSURBOX_BEARERTOKEN'])) {

    $id = isset($_POST['CorrelationId'])?$_POST['CorrelationId']:null;
    $date = isset($_POST['RequestDate'])?$_POST['RequestDate']:null;
    $licensePlate = isset($_POST['LicencePlate'])?$_POST['LicencePlate']:null;
    $vin = isset($_POST['VIN'])?$_POST['VIN']:null;
    $communication = isset($_POST['Communication'])?$_POST['Communication']:null;

    
    $errorMsg = array();
    if(!isset($id) || $id==""){
        $errorMsg[] = "CorrelationId field is required";
    }
    if(!isset($date) || $date==""){
        $errorMsg[] = "RequestDate field is required";
    }
    if(!isset($licensePlate) || $licensePlate==""){
        $errorMsg[] = "LicensePlate field is required";
    }
    if(!isset($vin) || $vin==""){
        $errorMsg[] = "VIN field is required";
    }
    if(!isset($communication) || $communication==""){
        $errorMsg[] = "Communication field is required";
    }

    $_SESSION['error'] = false;
    if(count($errorMsg)>0) {
        $_SESSION['error'] = true;
        $_SESSION['msg']= implode("<br/>", $errorMsg);
        header('Location: /edit.php?correlationId=' . $id . '&requestDate=' . $date);
        exit();
    }
    else {

        $bearer = $_SESSION['ASSURBOX_BEARERTOKEN'];
        $ch = curl_init();

        $postfield = "{\n  \"RequestDateUTC\": \"" . $date . "\",\n  \"CorrelationId\": \"" . $id . "\",\n  \"LicencePlate\": \"" . $licensePlate . "\",\n  \"VIN\": \"" . $vin . "\",\n  \"Communication\": \"" . $communication . "\"\n}";

        curl_setopt_array($ch, array(
          CURLOPT_URL => "https://devslot.assurbox.net/api/v1.0/GreenCard/Car/Requests",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "PUT",
          CURLOPT_POSTFIELDS => $postfield,
          CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer " . $bearer,
            "Cache-Control: no-cache",
            "Content-Type: application/json"
          ),
        ));

        $result = curl_exec($ch);
    
        curl_close($ch);
    
        $editRequest=json_decode($result,true);
        $_SESSION['editRequest'] = $editRequest;
    
        //print_r($editRequest);

        header("Location: /request.php");
        exit();
        
    }
    
}
else {
    header("Location: /");
    exit();
}