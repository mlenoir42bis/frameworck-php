<?php
session_start();


$bearer = '';
if (isset($_SESSION['ASSURBOX_BEARERTOKEN'])) {
    $bearer = $_SESSION['ASSURBOX_BEARERTOKEN'];

    $id = isset($_GET['correlationId'])?$_GET['correlationId']:null;
    if(isset($id) || $id!==""){
        $url = 'https://devslot.assurbox.net/api/v1.0/GreenCard/Car/Requests/' . $id . '/DocumentsSNCA';

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

        $doc=json_decode($result,true);

        $_SESSION['doc'] = $doc;
        //echo '<pre>';
        //print_r($doc);
        //echo '</pre>';

        if (isset($doc['Message'])) {
            echo $doc['Message'];
        }else {

            if (isset($doc['Content']) & isset($doc['Type']) & isset($doc['Filename'])) {
                header('Content-Description: File Transfer');
                header('Content-Type: ' . $doc['Type']);
                header('Content-Disposition: attachment; filename=' . $doc['Filename']);
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . strlen($doc['Content']));
                ob_clean();
                flush();
                echo base64_decode($doc['Content']); 
                exit; 
            }

        }

    }
}
else {
    header("Location: /");
    exit();
}
?>