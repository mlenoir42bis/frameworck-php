<?php
session_start();
//session_unset ();
$bearer = '';
if (isset($_SESSION['ASSURBOX_BEARERTOKEN'])) {
    $bearer = $_SESSION['ASSURBOX_BEARERTOKEN'];

    $error = false;
    if (isset($_SESSION['error'])) {
        $error = $_SESSION['error'];
        $deleteRequest = $_SESSION['deleteRequest'];
        $msg = '';
        if ($error = true & isset($deleteRequest->message)) {
            $msg = '<div class="alert alert-danger">' . $deleteRequest->message . '</div>';
        }
    }

    header('Content-Type: text/html; charset=utf-8');
}
else {
    header("Location: /");
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete - AssurBox ASP.NET Demo</title>
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
                    <li><a href="/GreenCardRequests">Requests</a></li>
                    <li><a href="/Home/About">About</a></li>
                    <li><a href="/Home/Contact">Contact</a></li>
                    
                </ul>
            </div>
        </div>
    </div>
    <div class="container body-content">
        <h1>Delete</h1>

        


<h2>Delete</h2>

<h3>Are you sure you want to delete this ?</h3>
<div>
    <h4>Cancel green card request</h4>

<?php
if ($msg !== '') {
    echo $msg;
}

?>

<form action="/setDelete.php?correlationId=<?php echo $_GET['correlationId'] ?>" method="post"><input name="__RequestVerificationToken" type="hidden" value="uscFLBeZRw9AEE8sKRJeGU0OQPyT5HoWnYKBGdRGHdZXjKwz03d3opLV5NxDPHE8Zzfr5Ym1VKDRjIzfOP3-RRGsTuRBWtyTmJ1q14V_KGc1" /><input data-val="true" data-val-required="The CorrelationId field is required." id="CorrelationId" name="CorrelationId" type="hidden" value="6071400b-1b76-40ff-83ff-5f99453e2fb1" />        <div class="form-group">
            <label class="control-label col-md-2" for="Communication">Communication</label>
            <div class="col-md-10">
                <input class="form-control text-box single-line" id="Communication" name="Communication" type="text" value="" />
                <span class="field-validation-valid text-danger" data-valmsg-for="Communication" data-valmsg-replace="true"></span>
            </div>
        </div>
        <div class="form-actions no-color">
            <input type="submit" value="Delete" class="btn btn-default" /> |
            <a href="/request.php">Back to List</a>
        </div>
</form></div>

        <hr />
        <footer>
            <p>&copy; 2018 - AssurBox Demo</p>
        </footer>
    </div>

    <script src="/assets/js/jquery.js"></script>

    <script src="/assets/js/bootstrap.js"></script>

    
</body>
</html>
