    <?php include_once("includes/linkBack.php"); ?>
    <?php include_once("includes/menu.php"); ?>

    <div class="container">
      <div class="row">

        <?php include_once("includes/sidebarAbout.php"); ?>

          <div class="col-sm-10" id="education">

            <div id="msg">
              <?php
                echo $data['msg'];
               ?>
            </div>

            <div class="col-md-6">
              <div class="block">
                <h2 class="text-center">Education</h2>
                <hr>
                <form id="formEducation">
                  <div class="form-group">
                    <label for="lvl">Level</label>
                    <input type="text" class="form-control" name="lvl" id="lvl">
                  </div>
                  <div class="form-group">
                    <label for="obtaining">Obtaining</label>
                    <select name="obtaining" id="obtaining" class="form-control">
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
                  <div class="form-group">
                    <label for="titleEducation">Title education</label>
                    <input type="text" class="form-control" name="titleEducation" id="titleEducation">
                  </div>
                  <div class="form-group">
                    <label for="descriptionEducation">Description experiment (max 140 character)</label>
                    <textarea class="form-control" name="descriptionEducation" id="descriptionEducation" rows="5"></textarea>
                  </div>
                  <span id="isUpdate" class="hide" update='false'></span>
                  <button id="updateEducation" class="btn btn-md btn-primary submit">Submit</button>
                  <button id="createEducation" class="btn btn-md btn-warning submit">Create new</button>
                </form>
              </div>
            </div>

            <div class="col-md-6">

              <ul id="sortable">
                <?php
                  $i = 0;
                  while ($i < count($data['education'])) :
                ?>
                  <li class="ui-state-default">
                    <div class="row">
                      <div class="col-xs-1">
                        <span class="order">
                          <?php echo $i;?>
                        </span>
                      </div>
                      <div class="col-xs-8" style="border-left: 1px solid #428bca;">
                        <?php echo $data['education'][$i]['titleEducation'] ;?>
                        </br>
                        </br>
                        <?php echo "Obtaining : " . $data['education'][$i]['obtaining'] ;?>
                      </div>
                      <div class="col-xs-3 console">
                        <button class="btn btn-warning update">Update</button>
                        <button class="btn btn-danger delete">Delete</button>
                        <span class="hide"><?php echo $data['education'][$i]['id'] ;?></span>
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

<script type="text/javascript" src="../../assets/javascripts/back/my/education.js"></script>
