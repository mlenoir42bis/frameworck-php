<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
    <title><?php echo Config::get("site_name") ?></title>

    <!--CSS styles-->
    <link rel="stylesheet" href="../../assets/stylesheets/bootstrap.min.css.map">
    <link rel="stylesheet" href="../../assets/stylesheets/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/stylesheets/jquery-ui.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/stylesheets/reset.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/stylesheets/style.css" rel="stylesheet">

    <!--Javascript files-->
    <script type="text/javascript" src="../../assets/javascripts/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="../../assets/javascripts/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../../assets/javascripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../assets/javascripts/ajax.js"></script>
  </head>
  <body>

    <?php
      echo $data['content'];
    ?>

  </body>
</html>
