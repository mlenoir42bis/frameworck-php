
    <?php include_once("includes/headerFront.php"); ?>

              <div class="container">
                <div class="section">
                  <div class="row">
                    <div class="col s12 center">

                    <div class="row center" id="myPict">
                      <img src="../../../../webroot/assets/images/ml1.jpg" alt="my picture">
                    </div>

                    <p>
                    Hello, ceci est ma blogosphère. Vous trouverez de petites fonctionnalitées pour interagir ensemble.
                    Ainsi que des articles que je voudrais partager ou que j'écrirais moi-même.
                    </p>

                    </div>
                  </div>
                </div>
             </div>

              <div class="container">
                <div class="section">
                  <div class="row">
                    <div class="col s12 center">
                      <div class="row center" style="margin-top: 10px;">
                        <a href="/page/proposition" class="waves-effect waves-light blue lighten-3 btn">Presentez moi votre projet</a>
                      </div>
                    </div>
                  </div>
                </div>
             </div>

              <div class="container">
                <div class="section" id="mapSection">
                  <div class="row">
                    <div class="col s12 center">

                      <h5 class="center" style="color:#90caf9;">Poster un lieu sur la carte en double-cliquant sur la carte<h5>
                      <button id="mapPosition" class="btn center" style="background-color:#90caf9; margin-bottom: 10px;">Poster a partir de votre position</button>
                      
                      <div id="msgPost">
                      </div>
                      
                      <div id="map"></div>

                      <!-- Modal -->
                      <div id="myModal" class="modal">
                        <div class="modal-content">
                          <div class="modal-header">
                            <span class="closeModal">&times;</span>
                            <h4>dblClickMap</h4>
                          </div>
                          <div class="modal-body">
                            <p style="text-align:left;">
                              Lat : <span id="lat"></span></br>
                              Lng : <span id="lng"></span></br>
                            </p>
                            <form class="center" id="myFormPost">
                                <div class="form-group">
                                  <label for="subjectPost">Votre sujet (Ajouter une dédicace, ne restez pas anonyme. Ou pas !)</label>
                                  <textarea id="subjectPost" class="validate form-control" name="subjectPost" rows="8">
                                  </textarea>
                                </div>
                                <div class="form-group">
                                  <label for="pictPost">Image (jpg,jpeg,gif,png)</label>
                                  <input id="pictPost" type="file" class="validate form-control" name="file">
                                </div>
                                <div class="g-recaptcha" data-sitekey="6LfxuyIUAAAAAOy4Uur1mmCxHO5krPcmjZ2Sq29M"></div>
                                <button id="postMeSubmit" type="submit" class="waves-effect waves-light blue lighten-3 btn">Send</button>
                            </form>
                          </div>
                          <div class="modal-footer">
                          </div>
                        </div>
                      </div>

                      </div>
                    </div>
                  </div>
               </div>

               <div class="container">
                 <div class="section">
                   <div class="row">
                     <div class="col s12 center">

                       <h5 class="center" style="color:#90caf9;">Like ou Dislike ?<h5>

                        <span id="swipeMsg"></span>

                       <div id="swipePict">
                          <img src="../../../../webroot/assets/images/tigre.jpg" alt="...">
                          <span class="hide"><span>
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
                       </div>

                     </div>
                   </div>
                 </div>
              </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZrOArua5Xw1y2LZYquB6sg05_oKXOkh0"
     async defer></script>

    <script type="text/javascript" src="../../assets/javascripts/resize.js"></script>
    <script type="text/javascript" src="../../assets/javascripts/mapIndex.js"></script>
    <?php include_once("includes/footerFront.php"); ?>
