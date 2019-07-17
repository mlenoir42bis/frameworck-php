  <?php include_once("includes/link.php"); ?>

        <div id="wrapper">
            <a href="#sidebar" class="mobilemenu"><i class="fa fa-reorder"></i></a>
            <div id="sidebar">
                <div id="sidebar-wrapper">
                    <div id="sidebar-inner">
                        <!-- Profile/logo section-->
                        <div id="profile" class="clearfix">
                            <div class="portrate hidden-xs"></div>
                            <div class="title">
                                <h2><?php echo $data['dataProfil'][0]['name'] ;?></h2>
                                <h3><?php echo $data['dataProfil'][0]['profession'] ;?></h3>
                            </div>
                        </div>
                        <!-- /Profile/logo section-->

                        <!-- Main navigation-->
                        <div id="main-nav">
                            <ul id="navigation">
                                <li>
                                  <a href="#biography">
                                    <i class="fa fa-user"></i>
                                    <div class="text">About Me</div>
                                  </a>
                                </li>

                                <li>
                                  <a href="#research">
                                    <i class="fa fa-book"></i>
                                    <div class="text">Research</div>
                                  </a>
                                </li>

                                <!--
                                <li>
                                  <a href="#publications">
                                    <i class="fa fa-edit"></i>
                                    <div class="text">Publications</div>
                                  </a>
                                </li>
                                -->

                                <li>
                                  <a href="#teaching">
                                    <i class="fa fa-clock-o"></i>
                                    <div class="text">Teaching</div>
                                  </a>
                                </li>

                                <li>
                                  <a href="#gallery">
                                    <i class="fa fa-picture-o"></i>
                                    <div class="text">Gallery</div>
                                  </a>
                                </li>

                                <li>
                                  <a href="#contact">
                                      <i class="fa fa-calendar"></i>
                                      <div class="text">Contact Me</div>
                                  </a>
                                </li>

                                <li class="external">
                                  <a href="../../../webroot/upload/doc/<?php echo $data['dataProfil'][0]['resume'] ;?>">
                                      <i class="fa fa-download"></i>
                                      <div class="text">Download CV</div>
                                  </a>
                                </li>
                            </ul>
                        </div>
                        <!-- /Main navigation-->
                        <!-- Sidebar footer -->
                        <div id="sidebar-footer">
                            <div class="social-icons">
                              <!--
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                               -->
                            </div>


                            <div id="copyright">Copyright text here</div>

                        </div>
                        <!-- /Sidebar footer -->
                    </div>

                </div>
            </div>

            <div id="main">

                <div id="biography" class="page home" data-pos="home">
                    <div class="pageheader">
                        <div class="headercontent">
                            <div class="section-container">

                                <div class="row">
                                    <div class="col-sm-2 visible-sm"></div>
                                    <div class="col-sm-8 col-md-5">
                                        <div class="biothumb">
                                            <img alt="image" src="../../../webroot/upload/<?php echo $data['dataProfil'][0]['avatar'] ;?>" class="img-responsive">

                                            <!--
                                              <div class="overlay">
                                                  <h1 class=""><?php /*echo $data['dataProfil'][0]['name'] ; */?></h1>
                                              </div>
                                            -->
                                        </div>
                                    </div>
                                    <div class="clearfix visible-sm visible-xs"></div>
                                    <div class="col-sm-12 col-md-7">
                                        <h3 class="title"><?php echo $data['dataProfil'][0]['titleBio'] ;?></h3>
                                        <p><?php echo htmlspecialchars_decode($data['dataProfil'][0]['biographie']) ;?></p>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pagecontents">
                        <div class="section color-1">
                            <div class="section-container">
                                <div class="row">
                                    <div class="col-md-5 col-md-offset-1">
                                        <div class="title text-center">
                                            <h3>Academic Positions</h3>
                                        </div>
                                        <ul class="ul-dates">
                                          <?php
                                          $i = 0;
                                          while ($i < count($data['experiment'])) :
                                          ?>
                                            <li>
                                                <div class="dates">
                                                    <span><?php echo $data['experiment'][$i]['dateEnd'] ;?></span>
                                                    <span><?php echo $data['experiment'][$i]['dateStart'] ;?></span>
                                                </div>
                                                <div class="content">
                                                    <h4><?php echo $data['experiment'][$i]['titleExperiment'] ;?></h4>
                                                    <p><?php echo htmlspecialchars_decode($data['experiment'][$i]['descriptionExperiment']) ;?></p>
                                                </div>
                                            </li>
                                          <?php
                                          $i++;
                                          endwhile;
                                          ?>
                                        </ul>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="title text-center">
                                            <h3>Education & Training</h3>
                                        </div>
                                        <ul class="ul-card">
                                          <?php
                                          $i = 0;
                                          while ($i < count($data['education'])) :
                                          ?>
                                            <li>
                                                <div class="dy">
                                                    <span class="degree"><?php echo $data['education'][$i]['lvl'] ;?></span>
                                                    <span class="year"><?php echo $data['education'][$i]['obtaining'] ;?></span>
                                                </div>
                                                <div class="description">
                                                    <p class="waht"><?php echo $data['education'][$i]['titleEducation'] ;?></p>
                                                    <p class="where"><?php echo htmlspecialchars_decode($data['education'][$i]['descriptionEducation']) ;?></p>
                                                </div>
                                            </li>
                                          <?php
                                          $i++;
                                          endwhile;
                                          ?>
                                        </ul>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="section color-2">
                            <div class="section-container">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="title text-center">
                                            <h3>Honors, Awards and Grants</h3>
                                        </div>
                                        <ul class="timeline">
                                          <?php
                                          $i = 0;
                                          while ($i < count($data['honor'])) :
                                          ?>
                                            <li class="open">
                                                <div class="date"><?php echo $data['honor'][$i]['dateObt'] ;?></div>
                                                <div class="circle"></div>
                                                <div class="data">
                                                    <div class="subject"><?php echo $data['honor'][$i]['title'] ;?></div>
                                                    <div class="text row">
                                                        <div class="col-md-10">
                                                            <?php echo htmlspecialchars_decode($data['honor'][$i]['description']) ;?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                          <?php
                                          $i++;
                                          endwhile;
                                          ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="research" class="page">
                    <div class="pageheader">

                        <div class="headercontent">

                            <div class="section-container">
                                <h2 class="title">Research Summary</h2>

                                <div class="row">
                                    <div class="col-md-8">
                                        <p><?php echo htmlspecialchars_decode($data['descriptionResearch'][0]['description']) ;?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="subtitle text-center">
                                            <h3>Interests</h3>
                                        </div>
                                        <ul class="ul-boxed list-unstyled">
                                          <?php
                                          $i = 0;
                                          while ($i < count($data['interest'])):
                                          ?>
                                            <li><?php echo htmlspecialchars_decode($data['interest'][$i]['content']) ;?></li>
                                          <?php
                                          $i++;
                                          endwhile;
                                          ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pagecontents">
                      <!--

                        <div class="section color-1">
                            <div class="section-container">
                                <div class="title text-center">
                                    <h3>Laboratory Personel</h3>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">

                                      <div id="labp-heads-wrap">
                                          <div id="lab-carousel">

                                              <?php
                                              /*
                                                $i = 0;
                                                while ($data['laboratory'][$i]) :
                                              ?>
                                              <div><img alt="image" src="../../../webroot/upload/<?php echo $data['laboratory'][$i]['pic'] ;?>" width="120" height="120" class="img-circle lab-img" /></div>
                                              <?php
                                                $i++;
                                                endwhile;
                                              ?>

                                          </div>
                                          <div>
                                              <a href="#" id="prev"><i class="fa fa-chevron-circle-left"></i></a>
                                              <a href="#" id="next"><i class="fa fa-chevron-circle-right"></i></a>
                                          </div>
                                      </div>

                                      <div id="lab-details">
                                        <?php
                                          $i = 0;
                                          while ($data['laboratory'][$i]) :
                                        ?>
                                          <div>
                                              <h3><?php echo $data['laboratory'][$i]['name'] ;?></h3>
                                              <h4><?php echo $data['laboratory'][$i]['fonction'] ;?></h4>
                                          </div>
                                        <?php
                                          $i++;
                                          endwhile;
                                        ?>
                                      </div>

                                    </div>
                                    <div class="col-md-4">
                                        <p><?php echo $data['descriptionLaboratory'] ; */?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        -->

                        <div class="section color-2">
                            <div class="section-container">
                                <div class="title text-center">
                                    <h3>Research Projects</h3>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="ul-withdetails">
                                          <?php
                                          $i = 0;
                                          while ($i < count($data['project'])) :
                                          ?>
                                            <li>
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-3">
                                                        <div class="image">
                                                            <img alt="image" src="../../../webroot/upload/<?php echo $data['project'][$i]['pic'] ;?>" class="img-responsive">
                                                            <div class="imageoverlay">
                                                                <i class="fa fa-search"></i>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-9">
                                                        <div class="meta">
                                                            <h3><?php echo $data['project'][$i]['title'] ;?></h3>
                                                            <p><?php echo htmlspecialchars_decode($data['project'][$i]['description']) ;?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="details">
                                                    <p><?php echo htmlspecialchars_decode($data['project'][$i]['content']) ;?></p>
                                                </div>
                                            </li>
                                          <?php
                                          $i++;
                                          endwhile;
                                          ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--
                <div id="publications" class="page">
                    <div class="page-container">
                        <div class="pageheader">
                            <div class="headercontent">
                                <div class="section-container">

                                    <h2 class="title">Selected Publications</h2>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p><?php /* echo $data['descriptionPublication'][0]['description'] ;?></p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="pagecontents">

                            <div class="section color-1" id="filters">
                                <div class="section-container">
                                    <div class="row">

                                        <div class="col-md-3">
                                            <h3>Filter by type:</h3>
                                        </div>
                                        <div class="col-md-6">
                                            <select id="cd-dropdown" name="cd-dropdown" class="cd-select">
                                                <option class="filter" value="all" selected>All types</option>
                                                <option class="filter" value="jpaper">Jounal Papers</option>
                                                <option class="filter" value="cpaper">Conference Papers</option>
                                                <option class="filter" value="bookchapter">Book Chapters</option>
                                                <option class="filter" value="book">Books</option>
                                                <!-- <option class="filter" value="report">Reports</option>
                                                <option class="filter" value="tpaper">Technical Papers</option> -->
                                            </select>
                                        </div>

                                        <div class="col-md-3" id="sort">
                                            <span>Sort by year:</span>
                                            <div class="btn-group pull-right">
                                                <button type="button" data-sort="data-year" data-order="desc" class="sort btn btn-default"><i class="fa fa-sort-numeric-asc"></i></button>
                                                <button type="button" data-sort="data-year" data-order="asc" class="sort btn btn-default"><i class="fa fa-sort-numeric-desc"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="section color-2" id="pub-grid">
                                <div class="section-container">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="pitems">

                                              <?php
                                              $i = 0;
                                              while ($data['publication'][$i]) :
                                                switch ($data['publication'][$i]['type']) {
                                                    case 'cpaper':
                                                        $type = 'Conference paper';
                                                        $label = 'label-warning';
                                                        break;
                                                    case 'jpaper':
                                                        $type = 'Journal paper';
                                                        $label = 'label-success';
                                                        break;
                                                    case 'book':
                                                        $type = 'Book';
                                                        $label = 'label-primary';
                                                        break;
                                                    case 'bookchapter':
                                                        $type = 'Book chapter';
                                                        $label = 'label-info';
                                                        break;
                                                }
                                                $date = explode('-', $data['publication'][$i]['dateYear']);
                                              ?>
                                                <div class="item mix <?php echo $data['publication'][$i]['type'] ;?>" data-year="<?php echo $date[0] ;?>">
                                                    <div class="pubmain">
                                                        <div class="pubassets">

                                                            <a href="#" class="pubcollapse">
                                                                <i class="fa fa-expand"></i>
                                                            </a>
                                                            <?php if ($data['publication'][$i]['link']) : ?>
                                                            <a href="<?php echo $data['publication'][$i]['link'] ;?>" class="tooltips" title="External link" target="_blank">
                                                                <i class="fa fa-external-link"></i>
                                                            </a>
                                                          <?php endif ;?>
                                                          <?php if ($data['publication'][$i]['file']) : ?>
                                                            <a href="../../../webroot/upload/doc/<?php echo $data['publication'][$i]['file'];?>" class="tooltips" title="Download" target="_blank">
                                                                <i class="fa fa-cloud-download"></i>
                                                            </a>
                                                          <?php endif ;?>

                                                        </div>

                                                        <h4 class="pubtitle"><?php echo $data['publication'][$i]['title'];?></h4>
                                                        <div class="pubauthor"><?php echo $data['publication'][$i]['author'];?></div>
                                                        <div class="pubcite"><span class="label <?php echo $label;?>"><?php echo $type;?></span><?php echo $data['publication'][$i]['myRelease'];?></div>

                                                    </div>
                                                    <div class="pubdetails">
                                                        <p><?php echo $data['publication'][$i]['content'];?></p>
                                                    </div>
                                                </div>
                                              <?php
                                              $i++;
                                              endwhile;
                                              */
                                              ?>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                -->

                <div id="teaching" class="page">
                    <div class="pageheader">
                        <div class="headercontent">
                            <div class="section-container">

                                <h2 class="title">Teaching</h2>

                                <div class="row">
                                    <div class="col-md-12">
                                        <p><?php echo htmlspecialchars_decode($data['descriptionTeaching'][0]['description']) ;?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pagecontents">
                        <div class="section color-1">
                            <div class="section-container">
                                <div class="row">
                                    <div class="title text-center">
                                        <h3>Currrent Teaching</h3>
                                    </div>
                                    <ul class="ul-dates">
                                        <?php
                                        $i = 0;
                                        while ($i < count($data['teachingCurrent'])) :
                                        ?>
                                        <li>
                                            <div class="dates">
                                                <span><?php echo $data['teachingCurrent'][$i]['dateEnd'];?></span>
                                                <span><?php echo $data['teachingCurrent'][$i]['dateStart'];?></span>
                                            </div>
                                            <div class="content">
                                                <h4><?php echo $data['teachingCurrent'][$i]['title'];?></h4>
                                                <p><?php echo htmlspecialchars_decode($data['teachingCurrent'][$i]['content']);?></p>
                                            </div>
                                        </li>
                                        <?php
                                        $i++;
                                        endwhile;
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="section color-2">
                            <div class="section-container">
                                <div class="row">
                                    <div class="title text-center">
                                        <h3>Teaching History</h3>
                                    </div>
                                    <ul class="ul-dates-gray">

                                      <?php
                                      $i = 0;
                                      while ($i < count($data['teachingHistory'])) :
                                      ?>
                                      <li>
                                          <div class="dates">
                                              <span><?php echo $data['teachingHistory'][$i]['dateEnd'];?></span>
                                              <span><?php echo $data['teachingHistory'][$i]['dateStart'];?></span>
                                          </div>
                                          <div class="content">
                                              <h4><?php echo $data['teachingHistory'][$i]['title'];?></h4>
                                              <p><?php echo htmlspecialchars_decode($data['teachingHistory'][$i]['content']) ;?></p>
                                          </div>
                                      </li>
                                      <?php
                                      $i++;
                                      endwhile;
                                      ?>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="gallery" class="page">
                    <div class="pagecontents">

                        <div class="section color-3" id="gallery-header">
                            <div class="section-container">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h2>Gallery</h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="section color-3" id="gallery-large">
                            <div class="section-container">

                                <ul id="grid" class="grid">

                                  <?php
                                  $i = 0;
                                  while ($i < count($data['gallery'][$i])) :
                                  ?>
                                    <li>
                                        <div>
                                            <img alt="image" src="../../../webroot/upload/gallery/<?php echo $data['gallery'][$i]['picture'];?>">
                                            <a href="../../../webroot/upload/gallery/<?php echo $data['gallery'][$i]['picture'];?>" class="popup-with-move-anim">
                                                <div class="over">
                                                    <div class="comein">
                                                        <i class="fa fa-search"></i>
                                                        <div class="comein-bg"></div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                  <?php
                                  $i++;
                                  endwhile;
                                  ?>

                                </ul>

                            </div>
                        </div>
                    </div>

                </div>
                <div id="contact" class="page">
                    <div class="pageheader">
                        <div class="headercontent">
                            <div class="section-container">

                                <h2 class="title">Contact & Meet Me</h2>

                                <div class="row">
                                    <div class="col-md-8">
                                        <p><?php echo htmlspecialchars_decode($data['contact'][0]['description']) ;?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="list-unstyled">
                                            <li>
                                                <strong><i class="fa fa-phone"></i>&nbsp;&nbsp;</strong>
                                                <span>office:<?php echo $data['contact'][0]['officeNumber'] ;?></span>
                                            </li>
                                            <li>
                                                <strong><i class="fa fa-phone"></i>&nbsp;&nbsp;</strong>
                                                <span>lab:<?php echo $data['contact'][0]['labNumber'] ;?></span>
                                            </li>
                                            <li>
                                                <strong><i class="fa fa-envelope"></i>&nbsp;&nbsp;</strong>
                                                <span><?php echo $data['contact'][0]['firstEmail'] ;?></span>
                                            </li>
                                            <!--
                                              <li>
                                                  <strong><i class="fa fa-envelope"></i>&nbsp;&nbsp;</strong>
                                                  <span><?php /* echo $data['contact'][0]['secondEmail'] ; */ ?></span>
                                              </li>
                                            -->
                                            <li>
                                                <strong><i class="fa fa-skype"></i>&nbsp;&nbsp;</strong>
                                                <span><?php echo $data['contact'][0]['skype'] ;?></span>
                                            </li>
                                            <!--
                                              <li>
                                                  <strong><i class="fa fa-twitter"></i>&nbsp;&nbsp;</strong>
                                                  <span><?php /* echo $data['contact'][0]['twitter'] ; */ ?></span>
                                              </li>
                                            -->
                                            <li>
                                                <strong><i class="fa fa-linkedin-square"></i>&nbsp;&nbsp;</strong>
                                                <span><a href="<?php echo $data['contact'][0]['linkedin'] ;?>">Link</a></span>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pagecontents">
                        <div class="section fixedbg parallax contact-office">
                            <div class="section-container">
                                <div class="row">
                                    <div class="col-md-7 col-md-offset-1">
                                        <h2 class="title">At My Office</h2>
                                        <p><?php echo htmlspecialchars_decode($data['contact'][0]['descriptionOffice']) ;?></p>
                                    </div>
                                    <div class="col-md-3 text-center hidden-xs hidden-sm">
                                        <i class="fa fa-coffee icon-huge"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--
                        <div class="section color-1">
                            <div class="section-container">
                                <div class="row">
                                    <div class="col-md-4 text-center hidden-xs hidden-sm">
                                        <i class="fa fa-stethoscope icon-huge"></i>
                                    </div>
                                    <div class="col-md-8">
                                        <h2 class="title">At My Work</h2>
                                        <p><?php /*echo $data['contact'][0]['descriptionWork'] ; */?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        -->
                    </div>

                </div>

                <div id="overlay"></div>

            </div>
        </div>
