<aside class="main-sidebar">



    <!-- sidebar: style can be found in sidebar.less -->

    <section class="sidebar">



      <!-- Sidebar user panel -->

      <div class="user-panel">

        <div class="pull-left image">

          <img src="../dist/img/ohaha.jpg" class="img-circle" alt="User Image">

        </div>

        <div class="pull-left info">

          <p><?php echo $_SESSION["admin_uname"]?></p>

          <!-- Status -->

          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>

        </div>

      </div>





      <!-- Sidebar Menu -->

      <?php 

        if (isset($_SESSION["type_id"])) {

            if ($_SESSION["type_id"] == 1) {?>

                <ul class="sidebar-menu" data-widget="tree">

        <li class="header">MENU</li>

        <!-- Optionally, you can add icons to the links -->

        <li><a href="?dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>

        <li><a href="?cottage"><i class="fa fa-th-list"></i> <span>Manage Agents</span></a></li>

        <li><a href="?features"><i class="fa fa-th-list"></i> <span>Features</span></a></li>

        <li><a href="?pictures"><i class="fa fa-picture-o"></i> <span>Picture</span></a></li>

        <li class="treeview">

          <a href="?reservation"><i class="fa fa-tasks"></i> <span>Manage Fishing</span>

            <span class="pull-right-container">

                <i class="fa fa-angle-left pull-right"></i>

              </span>

          </a>

          <ul class="treeview-menu">

            <li><a href="?manage_pumpboats"><i class="fa fa-tasks"></i>Manage Pumpboats</a></li>
 
            <li><a href="?reserved2"><i class="fa fa-tasks"></i> Reserved</a></li>

            <li><a href="?reserved"><i class="fa fa-tasks"></i> Fullypaid</a></li>

            <li><a href="?canceled"><i class="fa fa-tasks"></i> Canceled</a></li>

          </ul>

        </li>

        <li><a href="?users"><i class="fa fa-users"></i> <span>Users Account</span></a></li>

        <li><a href="?feedback"><i class="fa fa-users"></i> <span>Feedbacks</span></a></li>

        <li><a href="#" data-toggle="modal" data-target="#modal-report"><i class="fa  fa-file-o"></i> <span>Report</span></a></li>

        <li><a href="#" data-toggle="modal" data-target="#modal-logout"><i class="fa fa-power-off"></i> <span>Log Out</span></a></li>

        

      </ul>

           <?php } else {?>

            <ul class="sidebar-menu" data-widget="tree">

        <li class="header">MENU</li>

        <!-- Optionally, you can add icons to the links -->

        <li><a href="?dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>

        <li><a href="?features"><i class="fa fa-th-list"></i> <span>Features</span></a></li>

        <li><a href="?pictures"><i class="fa fa-picture-o"></i> <span>Picture</span></a></li>

        <li class="treeview">

          <a href="?reservation"><i class="fa fa-tasks"></i> <span>Reservation</span>

            <span class="pull-right-container">

                <i class="fa fa-angle-left pull-right"></i>

              </span>

          </a>

          <ul class="treeview-menu">

            <li><a href="?pending"><i class="fa fa-tasks"></i> Pending</a></li>

            <li><a href="?reserved2"><i class="fa fa-tasks"></i> Reserved</a></li>


            <li><a href="?reserved"><i class="fa fa-tasks"></i> Fullypaid</a></li>

            <li><a href="?canceled"><i class="fa fa-tasks"></i> Canceled</a></li>

          </ul>

        </li>

        <li><a href="#" data-toggle="modal" data-target="#modal-report"><i class="fa  fa-file-o"></i> <span>Report</span></a></li>

        <li><a href="#" data-toggle="modal" data-target="#modal-logout"><i class="fa fa-power-off"></i> <span>Log Out</span></a></li>

        

        

      </ul>

            <?php }

            

        }

      ?>



      <!-- /.sidebar-menu -->

    </section>

    <!-- /.sidebar -->

  </aside>





  <!-- MODAL -->

  <div class="modal fade in" id="modal-logout">

          <div class="modal-dialog modal-sm">

            <div class="modal-content">

              <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                  <span aria-hidden="true">×</span></button>

                <h4 class="modal-title">Confirmation</h4>

              </div>

              <div class="modal-body">

                <center><h3>Are you sure?</h3></center>

              </div>

              <div class="modal-footer">

                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>

                <a href="function/logout.php" type="button" class="btn btn-primary">Confirm</a>

              </div>

            </div>

          </div>

        </div>

    

        <div class="modal fade in" id="modal-report">

          <div class="modal-dialog modal-md">

            <div class="modal-content">

              <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                  <span aria-hidden="true">×</span></button>

                <h4 class="modal-title">Generate Report</h4>

              </div>

              <div class="modal-body">

              <form class="form-horizontal" method="post" action="function/report.php" target="_blank">

              <div class="box-body">

                <div class="form-group">

                  <label for="inputEmail3" class="col-sm-2 control-label">From</label>



                  <div class="col-sm-10">

                    <input type="date" class="form-control" name="from" required>

                  </div>

                </div>

                <div class="form-group">

                  <label for="inputPassword3" class="col-sm-2 control-label">To</label>



                  <div class="col-sm-10">

                    <input type="date" class="form-control" name="to" required>

                  </div>

                </div>



                <div class="form-group">

                  <label for="inputPassword3" class="col-sm-2 control-label">Category</label>

                  <div class="col-sm-10">

                    <select name="category" class="form-control" id="">

                 
                        <option value="Fullypaid">Reserved</option>

                    </select>

                  </div>

                </div>

              </div>

            

              </div>

              <div class="modal-footer">

                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-primary" name="btnReport">Submit</button>

              </div>

              </form>

            </div>

          </div>

        </div>