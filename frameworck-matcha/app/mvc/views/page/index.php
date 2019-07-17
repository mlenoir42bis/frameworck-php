<div class="container home">
  <div class="row">

    <div class="col-sm-8 blog-main">
      <div id="msg">
        <?php
        echo $data["msg"];
        ?>
      </div>
      <div class="blog-header">
        <h2 class="blog-title">My Matcha app</h2>
        <p class="lead blog-description">Simple dating site</p>
      </div>
      <div class="blog-post hook">
        <div id="pict-home">
          <img src="../../../../webroot/assets/images/loup-jump.jpg">
        </div>
      </div><!-- /.blog-post -->
    </div><!-- /.blog-main -->

    <div class="col-sm-2 col-sm-offset-1 blog-sidebar">
      <div class="sidebar-module sidebar-module-inset sign">
        <?php if ($data["isConnected"]) : ?>
          <a class="btn btn-sm btn-danger pull-right blog-nav-item"href="/connexion/signOut/">Sign out</a>
        <?php else : ?>
          <a href="/page/signIn/">Sign-in</a>
            <hr>
          <a href="/page/signUp/">Sign-up</a>
        <?php endif ;?>
      </div>
    </div><!-- /.blog-sidebar -->

  </div><!-- /.row -->
</div><!-- /.container -->
