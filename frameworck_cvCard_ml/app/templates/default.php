<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="marceau lenoir developer freelance : portfolio">
    <meta name="author" content="marceau lenoir">
    <meta name="keywords" content="marceau lenoir developer développeur concepteur application web mobile freelance auto-entrepreneur informatique" />


    <link rel="shortcut icon" href="">
    <title><?php echo Config::get("site_name") ?></title>

    <!--CSS styles-->
    <link rel="stylesheet" href="../../assets/stylesheets/reset.css">
    <link rel="stylesheet" href="../../assets/stylesheets/bootstrap.css">
    <link rel="stylesheet" href="../../assets/stylesheets/jquery-ui.min.css">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- Google Webfonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type='text/css'>
    <link rel="stylesheet" href="https://cdn.rawgit.com/konpa/devicon/4f6a4b08efdad6bb29f9cc801f5c07e263b39907/devicon.min.css" type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <!--Javascript files-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../../assets/javascripts/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../../assets/javascripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../assets/javascripts/ajax.js"></script>
    <script type="text/javascript" src="../../assets/javascripts/materialize.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js?explicit&hl=en-GB'></script>

  </head>
  <body>

<script>
var div = document.createElement('div');
div.className = 'fb-customerchat';
div.setAttribute('page_id', '232511400964929');
div.setAttribute('ref', 'b64:Y2hhdExpdmU=');
document.body.appendChild(div);
window.fbMessengerPlugins = window.fbMessengerPlugins || {
init: function () {
    FB.init({
            appId            : '1678638095724206',
            autoLogAppEvents : true,
            xfbml            : true,
            version          : 'v3.0'
            });
}, callable: []
};
window.fbAsyncInit = window.fbAsyncInit || function () {
    window.fbMessengerPlugins.callable.forEach(function (item) { item(); });
    window.fbMessengerPlugins.init();
};
setTimeout(function () {
           (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) { return; }
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk/xfbml.customerchat.js";
            fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
           }, 0);
</script>


    <div id="wrapper">
      <?php
        echo $data['content'];
      ?>
    </div>

                <div class="fb-customerchat"
                page_id="<PAGE_ID>"
                ref="<OPTIONAL_WEBHOOK_PARAM>"
                minimized="<true|false>">
                </div>

  </body>

</html>
