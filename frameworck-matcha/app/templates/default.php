<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title><?php echo Config::get("site_name") ?></title>

    <link href='../../assets/stylesheets/reset.css' rel="stylesheet">

    <link href="../../assets/stylesheets/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <link href='../../assets/stylesheets/bootstrap.min.css' rel="stylesheet">
    <link href='../../assets/stylesheets/jquery-ui.min.css' rel="stylesheet">
    <link href='../../assets/stylesheets/base.css' rel="stylesheet">
    <link href='../../assets/stylesheets/SignIn.css' rel="stylesheet">
    <link href='../../assets/stylesheets/sidebar.css' rel="stylesheet">
    <link href='../../assets/stylesheets/hTag.css' rel="stylesheet">
    <link href='../../assets/stylesheets/dropzone.css' rel="stylesheet">
    <link href='../../assets/stylesheets/caroussel-responsive.css' rel="stylesheet">
    <link href='../../assets/stylesheets/style.css' rel="stylesheet">

    <!--[if lt IE 9]><script src="/assets/javascripts/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/javascripts/ie-emulation-modes-warning.js"></script>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="../../assets/javascripts/jquery-3.1.1.min.js"></script>
    <script src="../../assets/javascripts/jquery-ui.min.js"></script>
    <script src="../../assets/javascripts/bootstrap.min.js"></script>
    <script src="../../assets/javascripts/underscore.js"></script>
    <script src="../../assets/javascripts/dropzone.js"></script>
    <script src="../../assets/javascripts/ajax.js"></script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4ilSBpbIptkaMKc4eJmXH-BElVvC31bM">
    </script>
  </head>

  <body>
    <header class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="/page/index/">Home</a>
        </nav>
      </div>
    </header>

    <?php
      echo $data['content'];
    ?>

    <footer class="blog-footer">
      <p>Matcha</p>
    </footer>
  </body>
</html>
