
<div class="container main">
  <div class="row profil viewsProfil">

    <?php
      require_once('includes/sidebar.php');
    ?>

  		<div class="col-md-10">
        <div class="profile-content">
          <div id="msg">
            <?php
            echo $message;
            ?>
          </div>

          <span id="idViewsProfil" class="hide"><?php echo $data['id']; ?></span>

          <section class="section-white carouselMatcha">
              <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <?php
                    if (count($data['file']) > 0) {
                      $i = 1;
                      while ($data['file'][$i]){
                        $html = "<li data-target='#myCarousel' data-slide-to='".$i."'></li>";
                        $i++;
                      }
                    }
                  ?>
                </ol>

                <div class="carousel-inner" role="listbox">
                  <?php
                    if (count($data['file']) > 0) {
                      $i = 0;
                      while ($data['file'][$i]){
                        $html = "";
                        if ($i == 0) {
                            $html .= "<div class='item active'>";
                        } else {
                          $html .= "<div class='item'>";
                        }
                        $html .= "<div class='carousel-pict'>";
                        $html .= "<img src='../../../../webroot/upload/". $data['file'][$i]['email'] .'.'. $data['file'][$i]['id_user'] .'/'. $data['file'][$i]['name'] ."' alt='...'>";
                        $html .= "</div>";
                        $html .= "<div class='carousel-caption'>";
                        $html .= "<h2></h2>";
                        $html .= "</div>";
                        $html .= "</div>";
                        echo $html;
                        $i++;
                      }
                    }
                    else {
                      $html = "<div class='item active'>";
                      $html .= "<div class='carousel-pict'>";
                      $html .= "<img src='../../../../webroot/assets/images/profil-default.png' alt='...'>";
                      $html .= "</div>";
                      $html .= "<div class='carousel-caption'>";
                      $html .= "<h2></h2>";
                      $html .= "</div>";
                      $html .= "</div>";
                      echo $html;
                    }
                  ?>

                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
              </div>
          </section>

          <div class="viewsProfilButton like" id="viewsProfilLike">
            <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
          </div>

          <div id="viewsProfilData">
            <p>
              <div id="viewsProfilName" class="viewsProfilElem">
                <strong>Name : </strong>
                <span class="data">
                  <?php echo $data['user']['name'] . " " . $data['user']['firstname']; ?>
                </span>
              </div>
              <div id="viewsProfilAges" class="viewsProfilElem">
                <strong>Ages : </strong>
                <span class="data">
                  <?php echo $data['user']['ages']; ?>
                </span>
              </div>
              <div id="viewsProfilSize" class="viewsProfilElem">
                <strong>Sizes : </strong>
                <span class="data">
                  <?php echo $data['user']['sizes']; ?>
                </span>
              </div>
              <div id="viewsProfilScore" class="viewsProfilElem">
                <strong>Popularity score : </strong>
                <span class="data">
                  <?php echo $data['user']['score']; ?>
                </span>
              </div>
              <div id="viewsProfilOrientation" class="viewsProfilElem">
                <strong>Orientation : </strong>
                <span class="data">
                  <?php echo $data['user']['orientation']; ?>
                </span>
              </div>
              <div id="viewsProfilBibliographie" >
                <strong>Biographie : </strong>
                <div class="data">
                  <?php echo $data['user']['biographie']; ?>
                </div>
              </div>
              <div id="viewsProfilInterest" >
                <strong>Tags interest : </strong>
                <div class="data">
                  <?php
                    $i = 0;
                    while ($data['htag'][$i]){
                      $html = "<div class='hTag'>".$data['htag'][$i]['name']."</div>";
                      echo $html;
                      $i++;
                    }
                  ?>
                </div>
              </div>
            </p>
          </div>

          <div id="viewsProfilMsg">
            <div id="viewsProfilMsgLike">
              <?php
                echo $data['msgLike'];
              ?>
            </div>
            <div id="viewsProfilMsgBadAccount">
              <?php
                echo $data["msgBadAccount"];
              ?>
            </div>
            <div id="viewsProfilMsgBlocked">
              <?php
                echo $data["msgBlockAccount"];
              ?>
            </div>
          </div>

          <div id="viewsProfilBadConsol">
            <div class="col-sm-4 badConsol">
              <strong>Unlike</strong>
              <hr>
              <div class="viewsProfilButton dislike" id="viewsProfilDislike">
                <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>
              </div>
            </div>
            <div class="col-sm-4 badConsol">
              <strong>Report bad account</strong>
              <hr>
              <div class="viewsProfilButton dislike" id="viewsProfilBadAccount">
                <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>
              </div>
            </div>
            <div class="col-sm-4 badConsol">
              <strong>Block account</strong>
              <hr>
              <div class="viewsProfilButton dislike" id="viewsProfilBlockAccount">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
              </div>
            </div>
          </div>


        </div>
  		</div>

	</div> <!-- /row -->
</div> <!-- /container -->

<script src="../../../../webroot/assets/javascripts/my/viewsProfil.js"></script>
