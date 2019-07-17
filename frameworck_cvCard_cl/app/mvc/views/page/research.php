
    <?php include_once("includes/linkBack.php"); ?>
    <?php include_once("includes/menu.php"); ?>

    <div class="container">
      <div class="row">

        <?php include_once("includes/sidebarResearch.php"); ?>

          <div class="col-sm-10" id="research">

            <div id="msg">
              <?php
                  echo $data['msg'];
              ?>
            </div>
            
            <div class="block">
              <h2 class="text-center" >Your research</h2>
              <hr>
              <form id="formResearchDesc" method='POST'>
                <div class="form-group">
                  <label for="description">Your Description</label>
                  <textarea class="form-control" name="description" id="description" rows="7"><?php echo $data['descriptionResearch'] ;?></textarea>
                </div>
                <button class="btn btn-md btn-primary submit">Submit</button>
              </form>
            </div>
            <div class="col-md-6">
              <div class="block">
                <h2 class="text-center">Add interest</h2>
                <hr>
                <form id="formResearchInterest" method='POST'>
                  <div class="form-group">
                    <label for="interest">Your interest</label>
                    <textarea class="form-control" name="interest" id="interest" rows="7"></textarea>
                  </div>
                  <span id="isUpdate" class="hide" update='false'></span>
                  <button id="updateInterest" class="btn btn-md btn-primary submit">Submit</button>
                  <button id="createInterest" class="btn btn-md btn-warning submit">Create new</button>
                </form>
              </div>
            </div>
            <div class="col-md-6">
              <h2 class="text-center" >Interest</h2>
              <hr>
              <table class="table table-bordered" style="margin-top: 10px;">
                <?php
                  $i = 0;
                  while ($i < count($data['interest'])) :
                ?>
                  <tr>
                    <td width=80%>
                      <?php echo $data['interest'][$i]['content'] ;?>
                    </td>
                    <td width=20%>
                      <button class="btn btn-warning update">Update</button>
                      <button class="btn btn-danger delete">Delete</button>
                      <span class="hide"><?php echo $data['interest'][$i]['id'] ;?></span>
                    </td>
                  </tr>
                <?php
                  $i++;
                  endwhile;
                 ?>
              </table>
            </div>
          </div>

      </div> <!-- /row -->
    </div> <!-- /container -->

    <script type="text/javascript" src="../../assets/javascripts/back/my/research.js"></script>
