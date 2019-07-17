
<div class="container main">
  <div class="row profile lookFor">

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

          <div id="consoleSearch" class="block container-fluid">
            <form id="search" role="form" method="POST" class="row">

              <div class="form-group col-sm-12">
                <div class="col-sm-2">
                  <label for="ages">Ages : </label>
                </div>
                <div class="col-sm-10">
                  <div class="col-sm-12">
                    <input type="text" id="ages" readonly style="border:0; color:#f6931f; font-weight:bold; width: 100%;" class="text-center">
                  </div>
                  <div class="col-sm-12">
                    <div id="slider-ages"></div>
                  </div>
                </div>
              </div>
              <div class="form-group col-sm-12">
                <div class="col-sm-2">
                  <label for="sizes">Sizes : </label>
                </div>
                <div class="col-sm-10">
                  <div class="col-sm-12">
                    <input type="text" id="sizes" readonly style="border:0; color:#f6931f; font-weight:bold; width: 100%;" class="text-center">
                  </div>
                  <div class="col-sm-12">
                    <div id="slider-sizes"></div>
                  </div>
                </div>
              </div>
              <div class="form-group col-sm-12">
                <div class="col-sm-2">
                  <label for="nbTags">Interest : </label>
                </div>
                <div class="col-sm-10">
                  <div class="col-sm-12">
                    <input type="text" id="nbTags" readonly style="border:0; color:#f6931f; font-weight:bold; width: 100%;" class="text-center">
                  </div>
                  <div class="col-sm-12">
                    <div id="slider-nbTags"></div>
                  </div>
                </div>
              </div>
              <div class="form-group col-sm-12">
                <div class="col-sm-2">
                  <label for="localisation">Localisation : </label>
                </div>
                <div class="col-sm-10">
                  <input type="text" id="localisation" class="form-control">
                </div>
              </div>
              <div class="col-sm-12">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Search</button>
              </div>

            </form>
          </div>
          <div id="lookForContent" class="col-sm-offset-2">
            <?php
            $i = 0;
            while ($data['listProfil'][$i]){
              $html = "<div class='lookForProfil col-sm-3'>";
                $html .= "<div class='lookForAvatar'>";

                $html .= "<section'>";
                $html .= "<div id='myCarousel".$i."' class='carousel slide' data-ride='carousel'>";
                  $html .= "<div class='carousel-inner' role='listbox'>";
                  if (count($data['listProfil'][$i]['file']) > 0) {
                    $j = 0;
                    while ($data['listProfil'][$i]['file'][$j]) {
                      if ($j == 0) {
                        $html .= "<div class='item active'>";
                      }else {
                        $html .= "<div class='item'>";
                      }
                      $html .= "<div class='carousel-pict'>";
                      $html .= "<img src='../../../../webroot/upload/".$data['listProfil'][$i]['file'][$j]["email"].".".$data['listProfil'][$i]['file'][$j]['id_user']."/".$data['listProfil'][$i]['file'][$j]['name']."'>";
                      $html .= "</div>";
                      $html .= "<div class='carousel-caption'>";
                      $html .= "<h2></h2>";
                      $html .= "</div>";
                      $html .= "</div>";
                      $j++;
                    }
                  } else {
                    $html .= "<div class='item active'>";
                    $html .= "<div class='carousel-pict'>";
                    $html .= "<img src='../../../../webroot/assets/images/profil-default.png'>";
                    $html .= "</div>";
                    $html .= "<div class='carousel-caption'>";
                    $html .= "<h2></h2>";
                    $html .= "</div>";
                    $html .= "</div>";
                  }
                  $html .= "</div>";

                  $html .= "<a class='left carousel-control' href='#myCarousel".$i."' data-slide='prev'>";
                  $html .= "<span class='glyphicon glyphicon-chevron-left'></span>";
                  $html .= "</a>";
                  $html .= "<a class='right carousel-control' href='#myCarousel".$i."' data-slide='next'>";
                  $html .= "<span class='glyphicon glyphicon-chevron-right'></span>";
                  $html .= "</a>";

                $html .= "</div>";
                $html .= "</section>";

                $html .= "</div>";
                $html .= "<div class='lookForData'>";
                $html .= "<span class='lookForName'><strong>Name : </strong>". $data['listProfil'][$i]['profil']['name'] . " " . $data['listProfil'][$i]['profil']['firstname'] ."</span></br>";
                $html .= "<span class='lookForAges'><strong>ages : </strong>". $data['listProfil'][$i]['profil']['ages'] ."</span></br>";
                $html .= "<button class='btn btn-sm btn-primary' attr-id=''><a href='/page/viewsProfil/?id=".$data['listProfil'][$i]['profil']['id_user']."'>Views profil</a></button>";
                $html .= "</div>";
              $html .= "</div>";
              echo $html;
              $i++;
            }
            ?>
          </div>
        </div>

        <?php if ($data['noProfil']) : ?>
        <div id="blocPage">
          <div class="block center-block">
            <h2> For use this feature, your data profil and local is required</h2>
            <button class="btn btn-primary center-block"><a href="/page/home/">Your profil</a></button>
          </div>
        </div>
      <?php endif; ?>
  		</div>

	</div> <!-- /row -->
</div> <!-- /container -->

<script src="../../../../webroot/assets/javascripts/my/lookFor.js"></script>
