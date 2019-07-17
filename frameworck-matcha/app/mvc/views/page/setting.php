
<div class="container main">
  <div class="row profile">

    <?php
      require_once('includes/sidebar.php');
    ?>

  		<div class="col-md-10">
        <div class="profile-content">
          <div id="msg">
            <?php
            echo $data["msg"];
            ?>
          </div>

          <h2 class="text-center">Setting account profil</h2>
          <hr>


          <div class="block">
            <h2>Data profil</h2>
            <hr>
            <form id="settingData" role="form" method="POST">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Your name" value='<?php echo $data["name"]; ?>' required >
              </div>
              <div class="form-group">
                <label for="firstname">Firstname</label>
                <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Your firstname" value="<?php echo $data['firstname']; ?>" required>
              </div>
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Email address" value="<?php echo $data['email']; ?>" required>
              </div>
              <button class="btn btn-lg btn-primary btn-block" type="submit" style="width: 50%; margin: 0 auto;">Submit</button>
            </form>
          </div>

          <div class="block" style="margin-top: 10px;">
            <h2>Password profil</h2>
            <hr>
            <form id="settingPassword" role="form" method="POST">
              <div class="form-group">
                <label for="currentPassword">Current Password</label>
                <input type="password" id="currentPassword" name="currentPassword" class="form-control" placeholder="current Password" required>
              </div>
              <div class="form-group">
                <label for="newsPassword">News Password</label>
                <input type="password" id="newsPassword" name="newsPassword" class="form-control" placeholder="News Password" required>
              </div>
              <button class="btn btn-lg btn-primary btn-block" type="submit" style="width: 50%; margin: 0 auto;">Submit</button>
            </form>
          </div>

        </div>
  		</div>

	</div> <!-- /row -->
</div> <!-- /container -->

<script src="../../../../webroot/assets/javascripts/my/setting.js"></script>
