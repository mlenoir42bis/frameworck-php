
<div class="container main">
  <div class="row profile">

    <?php
      require_once('includes/sidebar.php');
    ?>

  		<div class="col-md-10">
        <div class="profile-content">
          <div id="msg">
            <?php
            echo $data['msg'];
            ?>
          </div>

          <div class="iframeChat">
            <iframe width="640" height="580" src="https://127.0.0.1:8080/"> sans les propriétés width et height déterminées par le conteneur parent... </iframe>
          </div>

        </div>
  		</div>

	</div> <!-- /row -->
</div> <!-- /container -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.7.3/socket.io.js"></script>
<script src="../../../../webroot/assets/javascripts/my/chat.js"></script>
