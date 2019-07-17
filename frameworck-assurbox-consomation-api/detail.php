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
    
        header('Content-Type: text/html; charset=utf-8');

        //echo '<pre>';
        //print_r($detailRequest);
        //echo '</pre>';
    }
}
else {
    header("Location: http://www.frameworck.me");
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details - AssurBox ASP.NET Demo</title>
    <link href="/assets/css/style.css" rel="stylesheet"/>

    <script src="/assets/js/modernizr.js"></script>
</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Demo Dealer SI interacting with AssurBox</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/">Home</a></li>
                    <li><a href="/request.php">Requests</a></li>
                    <li><a href="/about.php">About</a></li>
                    <li><a href="/contact.php">Contact</a></li>   
                </ul>
            </div>
        </div>
    </div>
    <div class="container body-content">
        <h1>Details</h1>

        
<div>
    <h4>GreenCardRequestInfo</h4>
    <hr />
    <dl class="dl-horizontal">



        <!--Developers data:-->
        <input data-val="true" data-val-required="The CorrelationId field is required." id="CorrelationId" name="CorrelationId" type="hidden" value="11ef627f-a88b-48ea-b953-6d4f3c6e8d8b" />

        <?php 

            if (isset($detailRequest)) {
                if (!isset($detailRequest->Message)) {
            
                    $html = '
                        <dt>
                        LicensePlate
                        </dt>
                    ' .
                    '
                        <dd>
                    ' . $detailRequest['LicencePlate'] .'
                        </dd>
                    ' . '
                        <dt>
                        RequestDate
                        </dt>
                    ' .
                    '
                        <dd>
                    ' . $detailRequest['RequestDate'] .'
                        </dd>
                    ' . '
                        <dt>
                        CustomerName
                        </dt>
                    ' .
                    '
                        <dd>
                    ' . $detailRequest['CustomerName'] .'
                        </dd>
                    ' . '
                        <dt>
                        insuranceName
                        </dt>
                    ' .
                    '
                        <dd>
                    ' . $detailRequest['InsuranceName'] . '
                        </dd>
                    ' . '
                        <dt>
                        SenderOrganizationName
                        </dt>
                    ' .
                    '
                        <dd>
                    ' . $detailRequest['SenderOrganizationName'] .'
                        </dd>
                    ' . '
                        <dt>
                        HasResponse
                        </dt>
                    ' .
                    '
                        <dd>
                    ';

                    if ($detailRequest['HasResponse'] == true) {
                        $html .= '<input checked="checked" class="check-box" disabled="disabled" type="checkbox">';
                    }
                    else {
                        $html .= '<input class="check-box" disabled="disabled" type="checkbox">';
                    }

                    $html .= '
                        </dd>
                    ' . '
                        <dt>
                        ResponseCommunication
                        </dt>
                    ' .
                    '
                        <dd>
                    ' . $detailRequest['ResponseCommunication'] .'
                        </dd>
                    ' . '
                        <dt>
                        SenderOrganizationName
                        </dt>
                    ' .
                    '
                        <dd>
                    ' . $detailRequest['SenderOrganizationName'] .'
                        </dd>
                    ' . '
                        <dt>
                        Attachments
                        </dt>
                        <dd>
                  ';

                    $i = 0;
                    while($i < count($detailRequest['Attachments'])) {
                        $html .= '<div><a href="/DownloadDoc.php?correlationId=' .  $id . '" target="_blank">' . $detailRequest['Attachments'][$i]['Filename'] . '</a> </div>';
                        $i++;
                    }

                    $html .= '
                            <a href="/DownloadSNCADoc.php?correlationId=' . $id . '">doc snca</a>
                        </dd>
                        </dl>

                    ';
                    echo $html;
                }
            }
        ?>
    
    
    
</div>
<p>
    <a href="/edit.php?correlationId=' . <?php echo $id ?> . '&requestDate=' . <?php echo $detailRequest['RequestDate']; ?> .'">Edit</a>
    <a href="/request.php">Back to List</a>
</p>

        <hr />
        <footer>
            <p>&copy; 2018 - AssurBox Demo</p>
        </footer>
    </div>

    <script src="/assets/js/jquery.js"></script>

    <script src="/assets/js/bootstrap.js"></script>
    
</body>
</html>
