<?php 
session_start();
//session_unset ();
$bearer = '';
if (isset($_SESSION['ASSURBOX_BEARERTOKEN'])) {
    $bearer = $_SESSION['ASSURBOX_BEARERTOKEN'];

    $msg = '';
    if (isset($_SESSION['error'])) {
        if ($_SESSION['error'] == true & isset($_SESSION['msg'])) {
            $msg = '<div class="alert alert-danger">' . $_SESSION['msg'] . '</div>';
        }
    }

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
    <title>Edit - AssurBox ASP.NET Demo</title>
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
        <h1>Edit</h1>

        

<?php
if ($msg !== '') {
    $_SESSION['error'] = false;
    echo $msg;
}
?>

<form action="/setEdit.php" method="post"><input name="__RequestVerificationToken" type="hidden" value="FDoSYGHG3yHcSA6lxNcHYByoicHwJ1xbDURqfs_1I868MI1JjSZ7CNpfPaGweKSWeRp5mDQ3GN3iiPiRjMEBfpm0z7sAytY6C8UY37EbSg01" />    <div class="form-horizontal">
        <h4>GreenCardRequestModification</h4>
        <hr />
        
        <input data-val="true" data-val-required="The RequestDate field is required." id="RequestDate" name="RequestDate" type="hidden" value="<?php echo $_GET['requestDate'] ?>" />
        <input data-val="true" data-val-required="The CorrelationId field is required." id="CorrelationId" name="CorrelationId" type="hidden" value="<?php echo $_GET['correlationId'] ?>" />


        <div class="form-group">
            <label class="control-label col-md-2" for="LicencePlate">LicencePlate</label>
            <div class="col-md-10">
                <input class="form-control text-box single-line" id="LicencePlate" name="LicencePlate" type="text" value="" />
                <span class="field-validation-valid text-danger" data-valmsg-for="LicencePlate" data-valmsg-replace="true"></span>
                <span class="help-block">Luxembourg format  : 2 letters + 4 digits, or 5 digits, or 4 digits (see <a href="http://www.snca.lu/content/view/316/266/lang,french/">snca website</a> )</span>

            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-2" for="VIN">VIN</label>
            <div class="col-md-10">
                <input class="form-control text-box single-line" id="VIN" name="VIN" type="text" value="" />
                <span class="field-validation-valid text-danger" data-valmsg-for="VIN" data-valmsg-replace="true"></span>
                <span class="help-block"><a href="http://randomvin.com/" target="_blank">VIN number generator</a></span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-2" for="Communication">Communication</label>
            <div class="col-md-10">
                <input class="form-control text-box single-line" id="Communication" name="Communication" type="text" value="" />
                <span class="field-validation-valid text-danger" data-valmsg-for="Communication" data-valmsg-replace="true"></span>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <input type="submit" value="Save" class="btn btn-default" />
            </div>
        </div>
    </div>
</form>
<div>
    <a href="/request.php">Back to List</a>
</div>


        <hr />
        <footer>
            <p>&copy; 2018 - AssurBox Demo</p>
        </footer>
    </div>

    <script src="/assets/js/jquery.js"></script>

    <script src="/assets/js/bootstrap.js"></script>

</body>
</html>
