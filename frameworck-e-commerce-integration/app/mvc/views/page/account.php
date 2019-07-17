<?php include_once("includes/headerBack.php"); ?>



<div id="container" class="effect mainnav-sm navbar-fixed mainnav-fixed">

        <?php include_once("includes/navbarBack.php"); ?>

            <div class="boxed">

                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <div class="pageheader hidden-xs">
                    </div>
                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-user"> </i> User Information</h3>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td><i class="fa fa-external-link ph-5"></i></td>
                                                    <td> URL </td>
                                                    <td> www.google.com</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fa fa-envelope-o ph-5"></i></td>
                                                    <td> Email </td>
                                                    <td>peter@google.com </td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fa fa-phone ph-5"></i></td>
                                                    <td> Phone </td>
                                                    <td> (641)-734-4763 </td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fa fa-skype ph-5"></i></td>
                                                    <td> Skype </td>
                                                    <td> peterclark82 </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>    
                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                                <div class="panel">
                                    <div class="panel-body pad-no">
                                        <!--Default Tabs (Left Aligned)--> 
                                        <!--===================================================-->
                                        <div class="tab-base">
                                            <!--Nav Tabs-->
                                            <ul class="nav nav-tabs">
                                                <li class="active"> <a data-toggle="tab" href="#demo-lft-tab-1"> Invoice </a> </li>
                                                <li> <a data-toggle="tab" href="#demo-lft-tab-2">Chat History</a> </li>
                                            </ul>
                                            <!--Tabs Content-->
                                            <div class="tab-content">
                                                <div id="demo-lft-tab-1" class="tab-pane fade active in">
                                                    <!--Hover Rows-->
                                                    <!--===================================================-->
                                                    <table class="table table-hover table-vcenter">
                                                        <thead>
                                                            <tr>
                                                                <th>Invoice</th>
                                                                <th>Name</th>
                                                                <th class="text-center">Value</th>
                                                                <th>Delivery date</th>
                                                                <th class="hidden-xs">Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Order #53451</td>
                                                                <td>
                                                                    <span class="text-semibold">Desktop</span>
                                                                    <br>
                                                                    <small class="text-muted">Last 7 days : 4,234k</small>
                                                                </td>
                                                                <td class="text-center">$250</td>
                                                                <td>2012/04/25</td>
                                                                <td class="hidden-xs">
                                                                    <div class="label label-table label-info">On Process</div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Order #53451</td>
                                                                <td>
                                                                    <span class="text-semibold">Laptop</span>
                                                                    <br>
                                                                    <small class="text-muted">Last 7 days : 3,876k</small>
                                                                </td>
                                                                <td class="text-center">$350</td>
                                                                <td>2012/04/25</td>
                                                                <td class="hidden-xs">
                                                                    <div class="label label-table label-danger">Cancelled</div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Order #53451</td>
                                                                <td>
                                                                    <span class="text-semibold">Tablet</span>
                                                                    <br>
                                                                    <small class="text-muted">Last 7 days : 45,678k</small>
                                                                </td>
                                                                <td class="text-center">$325</td>
                                                                <td>2012/04/25</td>
                                                                <td class="hidden-xs">
                                                                    <div class="label label-table label-success">Shipped</div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Order #53451</td>
                                                                <td>
                                                                    <span class="text-semibold">Smartphone</span>
                                                                    <br>
                                                                    <small class="text-muted">Last 7 days : 34,553k</small>
                                                                </td>
                                                                <td class="text-center">$250</td>
                                                                <td>2012/04/25</td>
                                                                <td class="hidden-xs">
                                                                    <div class="label label-table label-warning">Pending</div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!--===================================================-->
                                                    <!--End Hover Rows-->
                                                </div>
                                                <div id="demo-lft-tab-2" class="tab-pane fade">
                                        <!--Chat widget-->
                                        <!--===================================================-->
                                        <h4 class="text-center">Vous pouvez contacter notre équipe à partir de cette messagerie</h4>
                                        <hr/>
                                        <div id="demo-chat-body" class="collapse in">
                                            <div class="nano" style="height:550px">
                                                <div class="nano-content pad-all">
                                                    <ul class="list-unstyled media-block">
                                                        <li class="mar-btm">
                                                            <div class="media-left">
                                                                <img src="img/av1.png" class="img-circle img-sm" alt="Profile Picture">
                                                            </div>
                                                            <div class="media-body pad-hor speech-left">
                                                                <div class="speech">
                                                                    <a href="#" class="media-heading">John Doe</a>
                                                                    <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mar-btm">
                                                            <div class="media-right">
                                                                <img src="img/av4.png" class="img-circle img-sm" alt="Profile Picture">
                                                            </div>
                                                            <div class="media-body pad-hor speech-right">
                                                                <div class="speech">
                                                                    <a href="#" class="media-heading">Lucy Doe</a>
                                                                    <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mar-btm">
                                                            <div class="media-left">
                                                                <img src="img/av1.png" class="img-circle img-sm" alt="Profile Picture">
                                                            </div>
                                                            <div class="media-body pad-hor speech-left">
                                                                <div class="speech">
                                                                    <a href="#" class="media-heading">John Doe</a>
                                                                    <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mar-btm">
                                                            <div class="media-right">
                                                                <img src="img/av4.png" class="img-circle img-sm" alt="Profile Picture">
                                                            </div>
                                                            <div class="media-body pad-hor speech-right">
                                                                <div class="speech">
                                                                    <a href="#" class="media-heading">Lucy Doe</a>
                                                                    <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mar-btm">
                                                            <div class="media-right">
                                                                <img src="img/av4.png" class="img-circle img-sm" alt="Profile Picture">
                                                            </div>
                                                            <div class="media-body pad-hor speech-right">
                                                                <div class="speech">
                                                                    <a href="#" class="media-heading">Lucy Doe</a>
                                                                    <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mar-btm">
                                                            <div class="media-left">
                                                                <img src="img/av1.png" class="img-circle img-sm" alt="Profile Picture">
                                                            </div>
                                                            <div class="media-body pad-hor speech-left">
                                                                <div class="speech">
                                                                    <a href="#" class="media-heading">John Doe</a>
                                                                    <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mar-btm">
                                                            <div class="media-right">
                                                                <img src="img/av4.png" class="img-circle img-sm" alt="Profile Picture">
                                                            </div>
                                                            <div class="media-body pad-hor speech-right">
                                                                <div class="speech">
                                                                    <a href="#" class="media-heading">Lucy Doe</a>
                                                                    <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mar-btm">
                                                            <div class="media-left">
                                                                <img src="img/av1.png" class="img-circle img-sm" alt="Profile Picture">
                                                            </div>
                                                            <div class="media-body pad-hor speech-left">
                                                                <div class="speech">
                                                                    <a href="#" class="media-heading">John Doe</a>
                                                                    <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mar-btm">
                                                            <div class="media-right">
                                                                <img src="img/av4.png" class="img-circle img-sm" alt="Profile Picture">
                                                            </div>
                                                            <div class="media-body pad-hor speech-right">
                                                                <div class="speech">
                                                                    <a href="#" class="media-heading">Lucy Doe</a>
                                                                    <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mar-btm">
                                                            <div class="media-left">
                                                                <img src="img/av1.png" class="img-circle img-sm" alt="Profile Picture">
                                                            </div>
                                                            <div class="media-body pad-hor speech-left">
                                                                <div class="speech">
                                                                    <a href="#" class="media-heading">John Doe</a>
                                                                    <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--Widget footer-->
                                            <div class="panel-footer">
                                                <div class="row">
                                                    <div class="col-xs-10">
                                                        <input type="text" placeholder="Enter your text" class="form-control chat-input">
                                                    </div>
                                                    <div class="col-xs-2">
                                                        <button class="btn btn-primary btn-block" type="submit">Send</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--===================================================-->
                                        <!--Chat widget-->

                                                </div>
                                            </div>
                                        </div>
                                        <!--===================================================--> 
                                        <!--End Default Tabs (Left Aligned)--> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--===================================================-->
                    <!--End page content-->
                </div>
                <!--===================================================-->
                <!--END CONTENT CONTAINER-->
              </div>
                <!--===================================================-->
                <!--END BOXED-->

              <?php include_once("includes/mainmenuBackCustomer.php"); ?>

              <?php include_once("includes/footercontentBack.php"); ?>

          </div>
        <!--===================================================-->
        <!-- END OF CONTAINER -->



<?php include_once("includes/footerBack.php"); ?>