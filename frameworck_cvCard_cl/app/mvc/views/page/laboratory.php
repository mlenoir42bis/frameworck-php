
    <?php include_once("includes/linkBack.php"); ?>
    <?php include_once("includes/menu.php"); ?>

    <div class="container">
      <div class="row">

        <?php include_once("includes/sidebarResearch.php"); ?>

          <div class="col-sm-10" id="laboratory">

            <div id="msg">
              <?php
                echo $data['msg'];
               ?>
            </div>

            <div class="block">
              <h2 class="text-center" >Your laboratory</h2>
              <hr>
              <form id="formLaboratoryDesc" method='POST'>
                <div class="form-group">
                  <label for="description">Your Description</label>
                  <textarea class="form-control" name="description" id="description" rows="7"><?php echo $data['descriptionLaboratory'] ;?></textarea>
                </div>
                <button class="btn btn-md btn-primary submit">Submit</button>
              </form>
            </div>
            <div class="col-md-6">
              <div class="block">
                <h2 class="text-center" >Add member</h2>
                <hr>
                <form id="formLaboratoryMember" method='POST'>
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" id="name" type="text" class="form-control"></input>
                  </div>
                  <div class="form-group">
                    <label for="fonction">Fonction</label>
                    <input name="fonction" id="fonction" type="text" class="form-control"></input>
                  </div>
                  <div class="form-group">
                    <label for="file">Picture</label>
                    <input name="file" id="file" type="file" class="form-control"></input>
                  </div>
                  <span id="isUpdate" class="hide" update='false'></span>
                  <button id="updateLaboratory" class="btn btn-md btn-primary submit">Submit</button>
                  <button id="createLaboratory" class="btn btn-md btn-warning submit">Create new</button>
                </form>
              </div>
            </div>
            <div class="col-md-6">
              <h2 class="text-center" >Member Laboratory</h2>
              <hr>
              <div id="laboratoryMember">
              <?php
                $i = 0;
                while ($i < count($data['laboratoryMember'])) :
              ?>
                  <div class="row block">

                    <div class="col-md-4">
                      <img src="../../webroot/upload/<?php echo $data['laboratoryMember'][$i]['pic'] ;?>">
                    </div>

                    <div class="col-md-6">
                      <h4><?php echo $data['laboratoryMember'][$i]['name'];?><h4>
                      </br>
                      <?php echo $data['laboratoryMember'][$i]['fonction'];?>
                    </div>

                    <div class="col-md-2">
                      <button class="btn btn-warning update">Update</button>
                      <button class="btn btn-danger delete">Delete</button>
                      <span class="hide"><?php echo $data['laboratoryMember'][$i]['id'] ;?></span>
                    </div>

                  </div>
              <?php
                $i++;
                endwhile;
              ?>
              </div>
            </div>
          </div>

      </div> <!-- /row -->
    </div> <!-- /container -->

<script type="text/javascript" src="../../assets/javascripts/back/my/laboratory.js"></script>
