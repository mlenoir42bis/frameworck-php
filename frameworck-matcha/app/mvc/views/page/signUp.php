<div class="container">
  <div class="row">
  <div id="msg">
    <?php
    echo $data['msg'];
    ?>
  </div>

  <form class="form-signin" role="form" action="/connexion/signUp/" method="POST">
    <h2 class="form-signin-heading">Please sign in</h2>
    <label for="name" class="sr-only">Name</label>
    <input type="text" id="name" name="name" class="form-control" placeholder="Your name" required autofocus>
    <label for="firstname" class="sr-only">Firstname</label>
    <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Your firstname" required>
    <label for="email" class="sr-only">Email address</label>
    <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required>
    <label for="password" class="sr-only">Password</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
  </form>

  </div>
</div> <!-- /container -->
