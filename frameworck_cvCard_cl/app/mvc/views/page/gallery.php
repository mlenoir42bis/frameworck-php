<?php include_once("includes/linkBack.php"); ?>
<?php include_once("includes/menu.php"); ?>

<div class="container">
  <div class="row">

      <?php include_once("includes/sidebarSignOut.php"); ?>

      <div class="col-sm-10" id="gallery">
        <h2 class="text-center" style="margin-top: 10px">My Gallery</h2>
        <hr>
        <form id="formGallery" class="block">
          <div class="form-group">
            <label for="file">Add picture</label>
            <input type="file" class="form-control" name="file" id="file">
          </div>
          <button class="btn btn-md btn-primary submit">Submit</button>
        </form>

        <div id="myGallery">
          <?php
            $i = 0;
            while ($i < count($data['gallery'])) :
          ?>
            <div class="col-md-3" style="padding: 10px;">
              <div class="block">
                <img src="../../../webroot/upload/gallery/<?php echo $data['gallery'][$i]['picture'];?>">
                <button class='btn btn-danger delete'>Delete</button>
                <span class="hide idPict"><?php echo $data['gallery'][$i]['id'];?></span>
                <span class="hide namePict"><?php echo $data['gallery'][$i]['picture'];?></span>
              </div>
            </div>
          <?php
            $i++;
            endwhile;
           ?>
        </div>
      </div>


  <script type="text/javascript" src="../../assets/javascripts/back/my/gallery.js"></script>
