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
    <link rel="stylesheet" href="../../assets/stylesheets/reset.css" rel="stylesheet">

    <!--Javascript files-->
    <script type="text/javascript" src="../../assets/javascripts/ajax.js"></script>
  </head>
  <body>

    <?php
      echo $data['content'];
    ?>

  </body>
</html>
