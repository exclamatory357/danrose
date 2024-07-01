<?php

if (isset($_GET["home"])) {?>
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
                    <img src="image/danrose_house1.jpg" alt="First slide" width="100%">

                    <div class="carousel-caption">
                      First Slide
                    </div>
                  </div>
                  <div class="item">
                    <img src="image/danrose3.jpg" alt="Second slide" width="100%">

                    <div class="carousel-caption">
                      Second Slide
                    </div>
                  </div>
                  <div class="item">
                    <img src="image/danrose.jpg" alt="Third slide" width="100%">

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
              <!-- LOGIN PAGE -->
              <?php
                  if(!isset($_SESSION["username"])){?>
                  <!-- LOGIN FORM, show if session is not set -->
                      <div class="login-box-body p-absolute-login">
                        <p class="login-box-msg">Welcome back!</p>

                        <form action="function/login.php" method="post">
                          <div class="form-group has-feedback">
                            <input type="text" class="form-control input-lg" placeholder="Enter Username" name="username" required autofocus>
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                          </div>
                          <div class="form-group has-feedback">
                            <input type="password" class="form-control input-lg" placeholder="Enter Password" name="password" required>
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                          </div>
           
                              <button type="submit" class="btn btn-primary btn-block btn-flat btn-lg" name="btnlogin">Sign In</button>
                              <button type="button" data-toggle="modal" data-target="#modal-registration" class="btn btn-success btn-block btn-flat btn-lg">Create Acount</button>
                 
                          </div>
                        </form>
                  <?php }
                ?>
                <div class="system-title p-absulute-system-title">
                  <span class="text-white txt1">DanRose</span><br>
                  <span class="text-white txt2">Management System</span>
                </div>

                <!-- MODAL REGISTRATION -->
         <div class="modal fade in" id="modal-registration">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Registration</h4>
              </div>
              <div class="modal-body">
                       <form action="function/function_crud.php" method="post">
                          <div class="form-group has-feedback">
                            <input type="text" class="form-control input-lg" placeholder="First Name" name="fname" autofocus required>
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                          </div>
                          <div class="form-group has-feedback">
                            <input type="text" class="form-control input-lg" placeholder="Lastname" name="lname" required>
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                          </div>
                          <div class="form-group has-feedback">
                            <input type="number" class="form-control input-lg" placeholder="Contact no." name="contact" required>
                            <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                          </div>
                          
                          <div class="form-group has-feedback">
                            <textarea class="form-control input-lg" rows="3" placeholder="Address" name="address"></textarea>
                          </div>
                          <div class="form-group has-feedback">
                            <input type="text" class="form-control input-lg" placeholder="Username" name="username" required>
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                          </div>
                          <div class="form-group has-feedback">
                            <input type="password" class="form-control input-lg" placeholder="Password" name="password" required>
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                          </div>
                          <button type="submit" class="btn btn-primary btn-block btn-flat btn-lg" name="btn-reg">Register</button>
                      </form>
              </div>
            </div>
          </div>
        </div>
    </section>
    <section>
        <br>
        <br>
        <center><h3>About</h3></center>
        <br>
    <div class="container">
        <!-- Swiper -->
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">

        <?php get_feature($con)?>
        
    
      </div>
      <div class="swiper-pagination"></div>
    </div>
    </div>
    <br>
    <br>
    </section>
    <section>
        <br>
        <br>
        <center><h3>Feedbacks</h3></center>
        <br>
    <div class="container">
        <!-- Swiper -->
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">

        <?php get_feedbacks($con)?>
        
    
      </div>
      <div class="swiper-pagination"></div>
    </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    </section>
<?php }?>