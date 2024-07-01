<?php

if (isset($_GET["reservation"])) {?>
    <!-- Main content -->
    <section class="">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="image/a1.jpg" alt="First slide" width="100%">

                    <div class="carousel-caption">
                      First Slide
                    </div>
                  </div>
                  <div class="item">
                    <img src="image/a2.jpg" alt="Second slide" width="100%">

                    <div class="carousel-caption">
                      Second Slide
                    </div>
                  </div>
                  <div class="item">
                    <img src="image/a4.jpg" alt="Third slide" width="100%">

                    <div class="carousel-caption">
                      Third Slide
                    </div>
                  </div>
                </div>
                <!--<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>-->
              </div>
              <!-- RESERVAION PAGE -->
              <?php
                  if(isset($_SESSION["username"])){?>
                  <!-- RESERVATION -->
                      <div class="login-box-body p-absolute-reserve">

                        <form id="check-avail-form">
                          <div class="row">
                            <div class="col-md-3">
                            <div class="form-group">
                                    <label for="">Date of Reservation</label>
                                    <input type="date" class="form-control" name="date-res">
                                </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                                    <label for="">Children</label>
                                    <input type="number" value="1" min="0" class="form-control" name="child">
                                </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                                    <label for="">Adult</label>
                                    <input type="number" value="1" min="0" class="form-control" name="adult">
                                </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                                    <label for="">Type</label>
                                    <select class="form-control" name="category">
                                        <option value="Cottage">Cottage</option>
                                        <option value="Hall">Hall</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
        
                                <button type="button" class="mt btn btn-success btn-md btn-check">Check Availability</button>
                            </div>
                          </div>
                        </form>
                    </div>

                    <!-- SHOW VACANT COTTAGE/HALL -->
                    <div class="p-absolute-reserve-result res">

                      
                    </div>
                  <?php }
                ?>
    </section>
<?php }?>
