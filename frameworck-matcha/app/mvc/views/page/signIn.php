<div class="container">
  <div class="row">

  <div id="msg">
    <?php
    echo $data['msg'];
    ?>
  </div>

  <form class="form-signin" role="form" action="/connexion/signIn/" method="POST">
    <h2 class="form-signin-heading">Please sign in</h2>
    <label for="email" class="sr-only">Email address</label>
    <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>
    <label for="password" class="sr-only">Password</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <div class="checkbox pull-right">
      <a href="/connexion/resetPassword/">forgotten password</a>
    </div>
  </form>

  </div>
</div> <!-- /container -->
