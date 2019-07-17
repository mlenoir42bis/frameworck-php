
<div class="container main">
  <div class="row profile swipe">

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

            <div id="swipePict" class="carouselMatcha">

              <section class="section-white">
                  <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                      <div class="item active">
                        <div class="carousel-pict">
                          <img src="../../../../webroot/assets/images/profil-default.png" alt="...">
                        </div>
                        <div class="carousel-caption">
                          <h2></h2>
                        </div>
                      </div>
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

            </div>
            <div id="swipeConsole">
              <div class="col-sm-6">
                <div class="swipeButton pull-right dislike" id="dislike">
                  <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="swipeButton like" id="like">
                  <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
                </div>
              </div>
              <span id="swipe-id-profil" class="hide"></span>
            </div>
          </div>

          <div id="blocPage">
            <div class="block center-block">
              <h2> To use this feature your location is required </h2>
              <p>If your profile information does not populate. All profiles in your position will be proposed</p>
              <button id="blocPageBtn" class="btn btn-primary center-block">Set Position</button>
            </div>
          </div>

        </div>

	</div> <!-- /row -->
</div> <!-- /container -->

<script src="../../../../webroot/assets/javascripts/my/swipe.js"></script>
