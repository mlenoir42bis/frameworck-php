<?php 
session_start();
//session_unset ();

    $html = '';
    if (isset($_SESSION['ASSURBOX_BEARERTOKEN']) && $_SESSION['ASSURBOX_BEARERTOKEN'] == 'error') {
        $html = "
            <div class='alert alert-danger'>Error on authentication</div>
    
            <form action='/setBearer.php' method='post'>                
                <label>Client ID : <input data-val='true' data-val-required='The ClientID field is required.' id='ClientID' name='ClientID' type='text' value='Mk8znT1xbFTWghTx82vc2g==' /></label>
                <label>Client SECRET : <input data-val='true' data-val-required='The ClientSecret field is required.' id='ClientSecret' name='ClientSecret' type='text' value='NTjH6WtvYaVmBCpx9+9VGj7hGoDFCpIIBehPBg7K604YQFzIPoxr+TbST+R2qI/GAgVzayfYoytNbv6EO61sfQ==' /></label>
                <br />
                <input type='submit' value='Authenticate'/>
            </form> 
         ";
    }
    elseif (isset($_SESSION['ASSURBOX_BEARERTOKEN']) && $_SESSION['ASSURBOX_BEARERTOKEN'] !== 'error') {
        $html = "
        
            <div class='alert alert-info'>Logged In</div>
            <div class='alert alert-info wrap'>Bearer : " . $_SESSION['ASSURBOX_BEARERTOKEN'] . "
            </div>

            <a href='/request.php'>List all request</a>
            <a href='/create.php'>Create a new request</a>
            <a href='/setBearer.php'>Get new Bearer</a>
        ";
    }
    elseif (!isset($_SESSION['ASSURBOX_BEARERTOKEN'])) {
        $html = "
        
            <form action='/setBearer.php' method='post'>                
                <label>Client ID : <input data-val='true' data-val-required='The ClientID field is required.' id='ClientID' name='ClientID' type='text' value='Mk8znT1xbFTWghTx82vc2g==' /></label>
                <label>Client SECRET : <input data-val='true' data-val-required='The ClientSecret field is required.' id='ClientSecret' name='ClientSecret' type=text' value='NTjH6WtvYaVmBCpx9+9VGj7hGoDFCpIIBehPBg7K604YQFzIPoxr+TbST+R2qI/GAgVzayfYoytNbv6EO61sfQ==' /></label>
                <br />
                <input type='submit' value='Authenticate' />
            </form>  
        
        ";
    }
   
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulation of a car dealer&#39;s information system  - AssurBox ASP.NET Demo</title>
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
        <h1>Simulation of a car dealer&#39;s information system </h1>

        


<div class="jumbotron">
    <h1>AssurBox Demo</h1>
    <p class="lead">AssurBox is a B2B communication hub that helps insurances and partners to communicate efficiently</p>
    <p><a href="http://www.assurbox.net" target="_blank" class="btn btn-primary btn-lg">Learn more &raquo;</a></p>
    
</div>

<div class="row">
    <div class="col-md-4">
        <h2>Getting started</h2>
        <p>
            To get started with this demo, first authenticate with your credentials.
        </p>
        <p>
            Follow these steps to get your keys : <a href="http://assurbox.net/screenshot-obtenir-les-cle-api/" target="_blank">watch tutorial</a>
        </p>
        <p>If you don't have any credentials : <a class="btn btn-default" href="mailto:support@assurbox.net?subject=Account request">Ask for an AssurBox account</a></p>
    
    
    


    </div>
    <div class="col-md-4">

            <h2>Use your keys</h2>
            <?php
                echo $html;
            ?>
    </div>
    <div class="col-md-4">
        <h2>Other demos</h2>
        <p>We provide demo application in several languages</p>
        <p><a class="btn btn-default"   target="_blank" href="https://www.github.com/assurbox">Learn more &raquo;</a></p>
    </div>
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
