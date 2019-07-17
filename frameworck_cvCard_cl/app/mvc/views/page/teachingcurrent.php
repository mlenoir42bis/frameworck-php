
    <?php include_once("includes/linkBack.php"); ?>
    <?php include_once("includes/menu.php"); ?>

    <div class="container">
      <div class="row">

        <?php include_once("includes/sidebarTeaching.php"); ?>

          <div class="col-sm-10" id="teaching">

            <div id="msg">
              <?php
                  echo $data['msg'];
              ?>
            </div>

              <h2 class="text-center" style="margin-top: 10px" >Your current teaching</h2>
              <hr>
            <div class="col-md-6">
              <div class="block">
                <h2 class="text-center">Add teaching</h2>
                <hr>
                <form id="formTeachingCurrent">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="dateStart">start</label>
                      <select name="dateStart" id="dateStart">
                        <?php
                          $i = 1970;
                          while ($i < 2050) :
                        ?>
                          <option value="<?php echo $i ;?>"><?php echo $i ;?></option>
                        <?php
                          $i++;
                          endwhile;
                        ?>
                        <option value="present">Present</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="dateEnd">End</label>
                      <select name="dateEnd" id="dateEnd">
                        <?php
                          $i = 1970;
                          while ($i < 2050) :
                        ?>
                          <option value="<?php echo $i ;?>"><?php echo $i ;?></option>
                        <?php
                          $i++;
                          endwhile;
                        ?>
                          <option value="present">Present</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="title">Title experiment</label>
                    <input type="text" class="form-control" name="title" id="title">
                  </div>
                  <div class="form-group">
                    <label for="content">Description experiment</label>
                    <textarea class="form-control" name="content" rows="5" id="content"></textarea>
                  </div>
                  <span id="isUpdate" class="hide" update='false'></span>
                  <button id="updateTeaching" class="btn btn-md btn-primary submit">Submit</button>
                  <button id="createTeaching" class="btn btn-md btn-warning submit">Create new</button>
                </form>
              </div>
            </div>
            <div class="col-md-6">
              <h2 class="text-center" >Teaching current</h2>
              <hr>

              <ul id="sortable">
                <?php
                  $i = 0;
                  while ($i < count($data['teaching'])) :
                ?>
                  <li class="ui-state-default">
                    <div class="row">
                      <div class="col-xs-1">
                        <span class="order">
                          <?php echo $i;?>
                        </span>
                      </div>
                      <div class="col-xs-8" style="border-left: 1px solid #428bca;">
                        <?php echo $data['teaching'][$i]['title'] ;?>
                        </br>
                        </br>
                        <?php echo "Date start : " . $data['teaching'][$i]['dateStart'] ;?>
                        </br>
                        <?php echo "Date end : " . $data['teaching'][$i]['dateEnd'] ;?>
                      </div>
                      <div class="col-xs-3 console">
                        <button class="btn btn-warning update">Update</button>
                        <button class="btn btn-danger delete">Delete</button>
                        <span class="hide"><?php echo $data['teaching'][$i]['id'] ;?></span>
                      </div>
                    </div>
                  <li>
                <?php
                  $i++;
                  endwhile;
                 ?>
              </ul>

            </div>
          </div>

      </div> <!-- /row -->
    </div> <!-- /container -->

    <script type="text/javascript" src="../../assets/javascripts/back/my/teachingCurrent.js"></script>
