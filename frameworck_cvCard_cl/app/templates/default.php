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
    <link rel="stylesheet" href="../../assets/stylesheets/back/jquery-ui.min.css" rel="stylesheet">

    <!--Javascript files-->
    <script type="text/javascript" src="../../assets/javascripts/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="../../assets/javascripts/back/jquery-ui.min.js"></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=n57fefhdibizlzcz7pxu0ntfwm2qm15o1ljuocop9l4kdsty"></script>
    <script>
      tinymce.init({
        selector: 'textarea',
        height: 500,
        menubar: false,
        plugins: [
          'advlist autolink lists link image charmap print preview anchor',
          'searchreplace visualblocks code fullscreen',
          'insertdatetime media table contextmenu paste code'
        ],
        toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        content_css: '//www.tinymce.com/css/codepen.min.css',
        extended_valid_elements : "a[rel|rev|charset|hreflang|tabindex|accesskey|type|name|href|target=_blank|title|class|onfocus|onblur]"
      });
      $(document).on('focusin', function(e) {
          if ($(e.target).closest(".mce-window").length) {
      		e.stopImmediatePropagation();
      	}
      });
    </script>
  </head>
  <body>

    <?php
      echo $data['content'];
    ?>

  </body>
</html>
