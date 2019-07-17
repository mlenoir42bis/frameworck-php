
    <?php include_once("includes/linkBack.php"); ?>
    <?php include_once("includes/menu.php"); ?>

    <div class="container">
      <div class="row">

        <?php include_once("includes/sidebarAbout.php"); ?>

          <div class="col-sm-10" id="honor">

            <div id="msg">
              <?php
                echo $data['msg'];
               ?>
            </div>

            <div class="col-md-6">
              <div class="block">
                <h2 class="text-center">Honor</h2>
                <hr>
                <form id="formHonor">
                  <div class="form-group">
                    <label for="dateObt">Date</label>
                    <input type="text" class="form-control" name="dateObt" id="dateObt">
                  </div>
                  <div class="form-group">
                    <label for="titleHonor">Title honor</label>
                    <input type="text" class="form-control" name="titleHonor" id="titleHonor">
                  </div>
                  <div class="form-group">
                    <label for="descriptionHonor">Description honor</label>
                    <textarea class="form-control" name="descriptionHonor" rows="5" id="descriptionHonor"></textarea>
                  </div>
                  <span id="isUpdate" class="hide" update='false'></span>
                  <button id="updateHonor" class="btn btn-md btn-primary submit">Submit</button>
                  <button id="createHonor" class="btn btn-md btn-warning submit">Create new</button>
                </form>
              </div>
            </div>

            <div class="col-md-6">

              <ul id="sortable">
                <?php
                  $i = 0;
                  while ($i < count($data['honor'])) :
                ?>
                  <li class="ui-state-default">
                    <div class="row">
                      <div class="col-xs-1">
                        <span class="order">
                          <?php echo $i;?>
                        </span>
                      </div>
                      <div class="col-xs-8" style="border-left: 1px solid #428bca;">
                        <?php echo $data['honor'][$i]['title'] ;?>
                        </br>
                        </br>
                        <?php echo "Obtaining : " . $data['honor'][$i]['dateObt'] ;?>
                      </div>
                      <div class="col-xs-3 console">
                        <button class="btn btn-warning update">Update</button>
                        <button class="btn btn-danger delete">Delete</button>
                        <span class="hide"><?php echo $data['honor'][$i]['id'] ;?></span>
                      </div>
                    </div>
                  <li>
                <?php
                  $i++;
                  endwhile;
                 ?>
              </ul>

            </div>

      </div> <!-- /row -->
    </div> <!-- /container -->

<script type="text/javascript" src="../../assets/javascripts/back/my/honor.js"></script>
