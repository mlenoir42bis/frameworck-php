<?php include_once("includes/linkBack.php"); ?>
<?php include_once("includes/menu.php"); ?>

<div class="container">
  <div class="row">

      <?php include_once("includes/sidebarSignOut.php"); ?>

      <div class="col-sm-10" id="contact">
        <h2 class="text-center" style="margin-top : 10px">My Contact information</h2>
        <hr>
        <form id="formContact" class="block" method='POST'>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" rows="7" class="form-control"><?php echo $data['contact'][0]['description']; ?></textarea>
          </div>
          <div class="form-group">
            <label for="officeNumber">Office number</label>
            <input class="form-control" type="text" name="officeNumber" id="officeNumber" value="<?php echo $data['contact'][0]['officeNumber']; ?>">
          </div>
          <div class="form-group">
            <label for="labNumber">Lab number</label>
            <input class="form-control" type="text" name="labNumber" id="labNumber" value="<?php echo $data['contact'][0]['labNumber']; ?>">
          </div>
          <div class="form-group">
            <label for="firstEmail">First email</label>
            <input class="form-control" type="text" name="firstEmail" id="firstEmail" value="<?php echo $data['contact'][0]['firstEmail']; ?>">
          </div>
          <!--
          <div class="form-group">
            <label for="secondEmail">Second email</label>
            <input class="form-control" type="text" name="secondEmail" id="secondEmail" value="<?php echo $data['contact'][0]['secondEmail']; ?>">
          </div>
          -->
          <div class="form-group">
            <label for="skype">Adresse skype</label>
            <input class="form-control" type="text" name="skype" id="skype" value="<?php echo $data['contact'][0]['skype']; ?>">
          </div>
          <!--
          <div class="form-group">
            <label for="twitter">Twitter</label>
            <input class="form-control" type="text" name="twitter" id="twitter" value="<?php echo $data['contact'][0]['twitter']; ?>">
          </div>
          -->
          <div class="form-group">
            <label for="linkedin">Linkedin</label>
            <input class="form-control" type="text" name="linkedin" id="linkedin" value="<?php echo $data['contact'][0]['linkedin']; ?>">
          </div>
          <div class="form-group">
            <label for="descriptionOffice">Description at my office</label>
            <textarea name="descriptionOffice" rows="7" class="form-control"><?php echo $data['contact'][0]['descriptionOffice']; ?></textarea>
          </div>
          <!--
          <div class="form-group">
            <label for="descriptionWork">Description at my work</label>
            <textarea name="descriptionWork" rows="7" class="form-control"><?php echo $data['contact'][0]['descriptionWork']; ?></textarea>
          </div>
          -->
          <button class="btn btn-md btn-primary submit">Submit</button>
        </form>
      </div>

  </div>
</div>

<script type="text/javascript" src="../../assets/javascripts/back/my/contact.js"></script>
