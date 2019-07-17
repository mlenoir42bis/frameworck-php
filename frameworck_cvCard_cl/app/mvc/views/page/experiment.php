
    <?php include_once("includes/linkBack.php"); ?>
    <?php include_once("includes/menu.php"); ?>

    <div class="container">
      <div class="row">

        <?php include_once("includes/sidebarAbout.php"); ?>

          <div class="col-sm-10" id="experiment">

            <div id="msg">
              <?php
                echo $data['msg'];
               ?>
            </div>

            <div class="col-md-6">
              <div class="block">
                <h2 class="text-center">Experiment</h2>
                <hr>
                <form id="formExperiment">
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
                    <label for="titleExperiment">Title experiment</label>
                    <input type="text" class="form-control" name="titleExperiment" id="titleExperiment">
                  </div>
                  <div class="form-group">
                    <label for="descriptionExperiment">Description experiment (max 140 character)</label>
                    <textarea class="form-control" name="descriptionExperiment" rows="5" id="descriptionExperiment"></textarea>
                  </div>
                  <span id="isUpdate" class="hide" update='false'></span>
                  <button id="updateExperiment" class="btn btn-md btn-primary submit">Submit</button>
                  <button id="createExperiment" class="btn btn-md btn-warning submit">Create new</button>
                </form>
              </div>
            </div>

            <div class="col-md-6">

              <ul id="sortable">
                <?php
                  $i = 0;
                  while ($i < count($data['experiment'])) :
                ?>
                  <li class="ui-state-default">
                    <div class="row">
                      <div class="col-xs-1">
                        <span class="order">
                          <?php echo $data['experiment'][$i]['myOrder'];?>
                        </span>
                      </div>
                      <div class="col-xs-8" style="border-left: 1px solid #428bca;">
                        <?php echo $data['experiment'][$i]['titleExperiment'] ;?>
                        </br>
                        </br>
                        <?php echo "Date Start : " . $data['experiment'][$i]['dateStart'] ;?>
                        </br>
                        <?php echo "Date End : " . $data['experiment'][$i]['dateEnd'] ;?>
                      </div>
                      <div class="col-xs-3 console">
                        <button class="btn btn-warning update">Update</button>
                        <button class="btn btn-danger delete">Delete</button>
                        <span class="hide"><?php echo $data['experiment'][$i]['id'] ;?></span>
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

<script type="text/javascript" src="../../assets/javascripts/back/my/experiment.js"></script>
