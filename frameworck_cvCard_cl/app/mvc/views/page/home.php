
    <?php include_once("includes/linkBack.php"); ?>
    <?php include_once("includes/menu.php"); ?>

    <div class="container">
      <div class="row">

        <?php include_once("includes/sidebarAbout.php"); ?>

          <div class="col-sm-10" id="home">

            <?php
                echo $data['msg'];
            ?>

            <div class="block">
              <h2 class="text-center" >Your information personnal</h2>
              <hr>
              <form id="formPersonnalInfo" method='POST' action="/profil/update/" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="name">Your name</label>
                  <input type="text" class="form-control" id="name" name="name" value="<?php echo $data['dataProfil'][0]['name'] ;?>">
                </div>
                <div class="form-group">
                  <label for="profession">Your profession</label>
                  <input type="text" class="form-control" id="profession" name="profession" value="<?php echo $data['dataProfil'][0]['profession'] ;?>">
                </div>
                <div class="form-group">
                  <label for="titleBio">Your title biographie</label>
                  <input type="text" class="form-control" id="titleBio" name="titleBio" value="<?php echo $data['dataProfil'][0]['titleBio'] ;?>">
                </div>
                <div class="form-group">
                  <label for="bio">Your biographie</label>
                  <textarea class="form-control" name="bio" id="bio" rows="7"><?php echo $data['dataProfil'][0]['biographie'] ;?></textarea>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="file">Your Avatar</label>
                    <input type="file" class="form-control" name="file">
                  </div>
                </div>
                <div class="col-md-6">
                  <div id="myAvatar">
                    <?php if ($data['dataProfil'][0]['avatar']) : ?>
                      <img src="../../../webroot/upload/<?php echo $data['dataProfil'][0]['avatar'];?>">
                    <?php else : ?>
                      <img src="../../../webroot/assets/images/personal/personal-big.png">
                    <?php endif; ?>
                  </div>
                </div>
                <button class="btn btn-md btn-primary submit">Submit</button>
              </form>
            </div>

            <form id="formResume" class="block" method='POST' action="/profil/resume/" enctype="multipart/form-data">
              <div class="form-group">
                <label for="file">Add your CV</label>
                <input type="file" class="form-control" name="file" id="file">
              </div>
              <div id="myResume">
                <p>My resume : <sub><?php echo $data['dataProfil'][0]['resume'];?></sub></p>
              </div>
              <button class="btn btn-md btn-primary submit">Submit</button>
            </form>

          </div>

      </div> <!-- /row -->
    </div> <!-- /container -->
