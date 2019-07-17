<?php
session_start(); 
$bearer = '';
if (isset($_SESSION['ASSURBOX_BEARERTOKEN'])) {

    $id = isset($_GET['correlationId'])?$_GET['correlationId']:null;
    if(isset($id) || $id!==""){
        $bearer = $_SESSION['ASSURBOX_BEARERTOKEN'];
        $ch = curl_init('https://devslot.assurbox.net/api/v1.0/GreenCard/Car/Requests/'. $id);
    
        header('Content-Type: application/json');
        $authorization = "Authorization: Bearer ". $bearer;
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $result = curl_exec($ch);
    
        curl_close($ch);
    
        $detailRequest=json_decode($result,true);
    
        $_SESSION['detailRequest'] = $detailRequest;
    
        //print_r($detailRequest);
        //header('Content-Type: text/html; charset=utf-8');

        //echo '<pre>';
        //print_r($detailRequest);
        //echo '</pre>';

        if (isset($detailRequest)) {
            if (!isset($detailRequest['Message'])) {
                    $html = '';
                    $i = 0;
                    while($i < count($detailRequest['Attachments'])) {
                        $detailRequest['Attachments'][$i]['Filename'];
                        if (isset($detailRequest['Attachments'][$i]['Content']) & isset($detailRequest['Attachments'][$i]['Filename'])) {
                            header('Content-Description: File Transfer');
                            header('Content-Type: ' . $detailRequest['Attachments'][$i]['Type']);
                            header('Content-Disposition: attachment; filename=' . $detailRequest['Attachments'][$i]['Filename']);
                            header('Content-Transfer-Encoding: binary');
                            header('Expires: 0');
                            header('Cache-Control: must-revalidate');
                            header('Pragma: public');
                            header('Content-Length: ' . strlen($detailRequest['Attachments'][$i]['Content']));
                            ob_clean();
                            flush();
                            echo $detailRequest['Attachments'][$i]['Content'];
                            exit; 
                        }
                        $i++;
                    }
            }
            else {
                echo $detailRequest['Message'];
            }

        }
    }
}
else {
    header("Location: /");
    exit();
}