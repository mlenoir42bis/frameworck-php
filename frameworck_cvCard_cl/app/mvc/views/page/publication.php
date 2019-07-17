
    <?php include_once("includes/linkBack.php"); ?>
    <?php include_once("includes/menu.php"); ?>

    <div class="container">
      <div class="row">

        <?php include_once("includes/sidebarSignOut.php"); ?>

          <div class="col-sm-10" id="publication">

            <div id="msg">
              <?php
                echo $data['msg'];
               ?>
            </div>

              <div class="block">
                <h2 class="text-center">Publication</h2>
                <hr>
                <form id="formDescription">
                  <div class="form-group">
                    <label for="description">Heading publication</label>
                    <textarea class="form-control" name="description" id="description" rows="7"><?php echo $data["descriptionPublication"][0]["description"];?></textarea>
                  </div>
                  <button id="updateDescription" class="btn btn-md btn-primary submit">Submit</button>
                </form>
              </div>

              <div class="block">
                <h2 class="text-center">Publication</h2>
                <hr>
                <form id="formPublication">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title">
                  </div>
                  <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" class="form-control" name="author" id="author">
                  </div>
                  <div class="form-group">
                    <label for="myRelease">Release</label>
                    <input type="text" class="form-control" name="myRelease" id="myRelease">
                  </div>
                  <div class="form-group">
                    <label for="type">Type article</label>
                    <select name="type" id="type" class="form-control">
                      <option value="jpaper">Journal Paper</option>
                      <option value="cpaper">Conference Paper</option>
                      <option value="book">Book</option>
                      <option value="bookchapter">Book chapter</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="file">Article in document format (word, pdf, excel)</label>
                    <input type="file" class="form-control" name="file" id="file">
                  </div>
                  <div class="form-group">
                    <label for="link">External link</label>
                    <input type="text" class="form-control" name="link" id="link">
                  </div>
                  <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" name="content" id="content" rows="5"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="dateYear">Date publication</label>
                    <input type="date" class="form-control" name="dateYear" id="dateYear">
                  </div>
                  <span id="isUpdate" class="hide" update='false'></span>
                  <button id="updatePublication" class="btn btn-md btn-primary submit">Submit</button>
                  <button id="createPublication" class="btn btn-md btn-warning submit">Create new</button>
                </form>
              </div>

              <div id="myPublication">
                <table class="table table-bordered" style="margin-top: 10px;">
                <?php
                  $i = 0;
                  while ($i < count($data['publication'])) :
                ?>
                  <tr>
                    <td width=80%>
                      <?php echo $data['publication'][$i]['title'] ;?>
                    </td>
                    <td width=20%>
                      <button class="btn btn-warning update">Update</button>
                      <button class="btn btn-danger delete">Delete</button>
                      <span class="hide"><?php echo $data['publication'][$i]['id'] ;?></span>
                    </td>
                  </tr>
                <?php
                  $i++;
                  endwhile;
                 ?>
                </table>
              </div>

      </div> <!-- /row -->
    </div> <!-- /container -->

<script type="text/javascript" src="../../assets/javascripts/back/my/publication.js"></script>
