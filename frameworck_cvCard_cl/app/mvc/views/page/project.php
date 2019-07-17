
    <?php include_once("includes/linkBack.php"); ?>
    <?php include_once("includes/menu.php"); ?>

    <div class="container">
      <div class="row">

        <?php include_once("includes/sidebarResearch.php"); ?>

          <div class="col-sm-10" id="project">

            <div id="msg">
              <?php
                echo $data['msg'];
               ?>
            </div>
            
            <div class="block">
              <h2 class="text-center" >Project</h2>
              <hr>
              <form id="formProject" method='POST'>
                <div class="form-group">
                  <label for="title">Title</label>
                  <input id="title" name="title" id="title" type="text" class="form-control"></input>
                </div>
                <div class="form-group">
                  <label for="description">Short description</label>
                  <input id="description" name="description" id="description" type="text" class="form-control"></input>
                </div>
                <div class="form-group">
                  <label for="content">Content article</label>
                  <textarea id="content" name="content" id="description" class="form-control" rows="10"></textarea>
                </div>
                <div class="form-group">
                  <label for="file">Picture</label>
                  <input name="file" id="file" type="file" class="form-control"></input>
                </div>
                <span id="isUpdate" class="hide" update='false'></span>
                <button id="updateProject" class="btn btn-md btn-primary submit">Submit</button>
                <button id="createProject" class="btn btn-md btn-warning submit">Create new</button>
              </form>
            </div>

            <h2 class="text-center" >My project</h2>
            <hr>
            <div id="myProject">
            <?php
              $i = 0;
              while ($i < count($data['project'])) :
            ?>
                <div class="block row">
                  <div class="col-md-2">
                    <?php if ($data['project'][$i]['pic']) :?>
                      <img src="../../webroot/upload/<?php echo $data['project'][$i]['pic'] ;?>">
                    <?php endif ; ?>
                  </div>
                  <div class="col-md-8" style="border-right: 1px solid black; min-height: 100px;">
                    <?php echo $data['project'][$i]['title'];?> </br>
                  </div>
                  <div class="col-md-2">
                    <button class="btn btn-warning update">Update</button>
                    <button class="btn btn-danger delete">Delete</button>
                    <span class="hide"><?php echo $data['project'][$i]['id'] ;?></span>
                  </div>
                </div>
            <?php
              $i++;
              endwhile;
            ?>
          </div>

      </div> <!-- /row -->
    </div> <!-- /container -->

    <script type="text/javascript" src="../../assets/javascripts/back/my/project.js"></script>
