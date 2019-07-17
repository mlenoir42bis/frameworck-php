
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

          <div class="block">
            <h2 class="text-center">Personal info</h2>
            <hr>
            <form id="profilData" role="form" method="POST">
              <div class="col-md-6">
              <div class="form-group">
                <label for="sexe">Sexe</label>
                <select name="sexe" id="sexe" class="form-control" required>
                  <option value="Mr" <?php if($data['sexe'] == "Mr") echo "SELECTED";?>>Mr</option>
                  <option value="Mme" <?php if($data['sexe'] == "Mme") echo "SELECTED";?>>Mme</option>
                  <option value="Other" <?php if($data['sexe'] == "Other") echo "SELECTED";?>>Other</option>
                </select>
              </div>
              <div class="form-group">
                <label for="ages">Ages</label>
                <input type="number" id="ages" name="ages" class="form-control" placeholder="Your ages" required value="<?php echo $data['ages'] ;?>">
              </div>
              <div class="form-group">
                <label for="sizes">Sizes (cm)</label>
                <input type="number" id="sizes" name="sizes" class="form-control" placeholder="Your sizes" required value="<?php echo $data['sizes'] ;?>">
              </div>
              <div class="form-group">
                <label for="orientation">Orientation sexuel</label>
                <select name="orientation" id="orientation" class="form-control" required>
                  <option value="Heterosexuelle" <?php if($data['orientation'] == "Heterosexuelle") echo "SELECTED";?>>Heterosexuelle</option>
                  <option value="Homosexuelle" <?php if($data['orientation'] == "Homosexuelle") echo "SELECTED";?>>Homosexuelle</option>
                  <option value="Bisexuelle" <?php if($data['orientation'] == "Bisexuelle") echo "SELECTED";?>>Bisexuelle</option>
                </select>
              </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                <label for="biographie">Biographie</label>
                <textarea name="biographie" class="form-control" rows="10" id="biographie" required><?php echo $data['biographie'] ;?></textarea>
              </div>
              </div>
              <button class="btn btn-lg btn-primary btn-block" type="submit" style="width:50%; margin: 0 auto">Submit</button>
            </form>
          </div>

          <div id="profilLocation" class="block" style="margin-top: 10px;">
            <h2 class="text-center" >Update my current position<h2>
            <hr>
            <button type="button" class="btn btn-lg btn-primary" style="display: block;margin: 0 auto!important; width: 50%;">Set position</button>
          </div>
          <!-- Htag -> list of interest -->
          <?php
            require_once('includes/htag.php');
          ?>
          <!-- Upload img -->
          <?php
            require_once('includes/dropzone.php');
          ?>

        </div>
  		</div>

	</div> <!-- /row -->
</div> <!-- /container -->

<script src="../../../../webroot/assets/javascripts/my/profil.js"></script>
