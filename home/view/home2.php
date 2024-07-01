<?php

if (isset($_GET["home"])) {?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-7">
                <br>
                <br>
                <br>
                <br>
                <br>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="image/res1.jpg" alt="First slide">

                    <div class="carousel-caption">
                      First Slide
                    </div>
                  </div>
                  <div class="item">
                    <img src="image/res1.jpg" alt="Second slide">

                    <div class="carousel-caption">
                      Second Slide
                    </div>
                  </div>
                  <div class="item">
                    <img src="image/res1.jpg" alt="Third slide">

                    <div class="carousel-caption">
                      Third Slide
                    </div>
                  </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>
            </div>
            <div class="col-md-1">

            </div>
            <div class="col-md-4">
                <br>
                <br>
                <br>
                <br>
                <br>
                <?php
                  if(!isset($_SESSION["username"])){?>
                  <!-- LOGIN FORM, show if session is not set -->
                      <div class="login-box-body">
                        <p class="login-box-msg">Sign in to start your session</p>

                        <form action="../../index2.html" method="post">
                          <div class="form-group has-feedback">
                            <input type="text" class="form-control input-lg" placeholder="Email">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                          </div>
                          <div class="form-group has-feedback">
                            <input type="password" class="form-control input-lg" placeholder="Password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                          </div>
           
                              <button type="submit" class="btn btn-primary btn-block btn-flat btn-lg">Sign In</button>
                              <button type="submit" class="btn btn-success btn-block btn-flat btn-lg">Create Acount</button>
                 
                          </div>
                        </form>
                  <?php }
                ?>
                <!-- RESERVATION FORM, show if session is set -->
                <?php
                 if(isset($_SESSION["username"])){?>
                    <div class="box no-border">
            <div class="box-header with-border">
              <h3 class="box-title">Reservation</h3>
            </div>
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="">Date</label>
                  <input type="date" class="form-control">
                </div>

                <div class="row">
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="">Adult</label>
                          <select name="" id="" class="form-control">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                          </select>
                       </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                          <label for="">Children</label>
                          <select name="" id="" class="form-control">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                          </select>
                       </div>
                    </div>
                </div>
              </div>

              <div class="box-footer">
                <button type="button" class="btn btn-primary btn-block" id="btn-check">Check Availability</button>
                <br>
                <table class="table table-condensed" id="table-cottage">
                    <tr class="bg-gray">
                        <th>Cottage Name</th>
                        <th>Cottage Type</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>Luxury 160</td>
                        <td>Special</td>
                        <td>3,000</td>
                        <th><button class="btn btn-success btn-block btn-sm">Select</button></th>
                    </tr>
                    <tr>
                        <td>Luxury 160</td>
                        <td>Special</td>
                        <td>3,000</td>
                        <th><button class="btn btn-success btn-block btn-sm">Select</button></th>
                    </tr>
                    <tr>
                        <td>Luxury 160</td>
                        <td>Special</td>
                        <td>3,000</td>
                        <th><button class="btn btn-success btn-block btn-sm">Select</button></th>
                    </tr>
                </table>
              </div>
            </form>
          </div>
                 <?php }
                ?>
            </div>
       </div>
    </section>
<?php }?>