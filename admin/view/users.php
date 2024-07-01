<!-- USERS ACCOUNT PAGE -->

<?php

 if (isset($_GET["users"])) {?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-6">
                <h1>Users Account</h1>
            </div>
            <div class="col-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Users Account</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>




<!-- Main content -->

<section class="content container-fluid">



<div class="box box-default">

            <div class="box-header with-border">

              <h3 class="box-title"><a href="?users-add" class="btn btn-primary"><i class="fa fa-plus"></i> New User</a></h3>

            </div>

              <div class="box-body">

                <table id="example2" class="table table-bordered">

                    <thead>

                    <tr>

                        <th>#</th>

                        <th>First Name</th>

                        <th>Last Name</th>

                        <th>User Type</th>

                        <th>Username</th>

                        <th>Password</th>

                        <th><i class="fa fa-cogs"></i></th>

                    </tr>

                    </thead>

                    <?php get_users($con)?>

                </table>

              </div>

          </div>



</section>

 <?php }

?>





<!-- USER ADD FORM -->

<?php

 if (isset($_GET["users-add"])) {?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-6">
                <h1><a href="?cottage">Back</a></h1>
            </div>
            <div class="col-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add User</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>




<!-- Main content -->

<section class="content container-fluid">



<div class="box box-default">

            <div class="box-header with-border">

              <h3 class="box-title">Add User</h3>

            </div>

            <form class="form-horizontal" method="post" action="function/function_crud.php">

              <div class="box-body">

                <div class="row">

                    <div class="col-md-6">

                        <div class="form-group">

                            <label class="col-sm-4 control-label">First Name</label>

                            <div class="col-sm-8">

                                <input type="text" class="form-control" name="fname">

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-4 control-label">Last Name</label>

                            <div class="col-sm-8">

                                <input type="text" class="form-control" name="lname">

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-4 control-label">Username</label>

                            <div class="col-sm-8">

                                <input type="text" class="form-control" name="uname">

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-4 control-label">Password</label>

                            <div class="col-sm-8">

                                <input type="text" class="form-control" name="pass">

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-4 control-label">User Type</label>

                            <div class="col-sm-8">

                                <select id="" class="form-control" name="utype">

                                    <option value="4">Staff</option>

                                    <option value="3">Customer</option>

                                </select>

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-4 control-label"></label>

                            <div class="col-sm-8">

                                <button type="submit" class="btn btn-primary" name="btnAddUser">Submit</button>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">



                    </div>

                </div>

              </div>

            </form>

          </div>



</section>

 <?php }

?>





<!-- USER ADD FORM -->

<?php

 if (isset($_GET["users-edit"])) {?>

     <section class="content-header">

    <h1>

        <a href="?users">Back</a>

    </h1>

    <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active">Edit User</li>

    </ol>

</section>



<!-- Main content -->

<section class="content container-fluid">



<div class="box box-default">

            <div class="box-header with-border">

              <h3 class="box-title">Edit User</h3>

            </div>

            <?php 

             $getid = $_GET["users-edit"];

             $sql = "SELECT * FROM user WHERE `user_id` = '$getid'";

             $query = mysqli_query($con, $sql);

             $fetch = mysqli_fetch_assoc($query);

            ?>

            <form class="form-horizontal" method="post" action="function/function_crud.php">

              <div class="box-body">

                <div class="row">

                    <div class="col-md-6">

                        <div class="form-group">

                            <label class="col-sm-4 control-label">First Name</label>

                            <div class="col-sm-8">

                                <input type="hidden" class="form-control" value="<?php echo $fetch["user_id"]?>" name="id">

                                <input type="text" class="form-control" value="<?php echo $fetch["fname"]?>" name="fname">

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-4 control-label">Last Name</label>

                            <div class="col-sm-8">

                                <input type="text" class="form-control" value="<?php echo $fetch["lname"]?>" name="lname">

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-4 control-label">Username</label>

                            <div class="col-sm-8">

                                <input type="text" class="form-control" value="<?php echo $fetch["uname"]?>" name="uname">

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-4 control-label">Password</label>

                            <div class="col-sm-8">

                                <input type="text" class="form-control" value="<?php echo $fetch["pass"]?>" name="pass">

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-4 control-label">User Type</label>

                            <div class="col-sm-8">

                                <select id="" class="form-control" name="utype">

                                    <option value="4">Staff</option>

                                    <option value="3">Customer</option>

                                </select>

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-4 control-label"></label>

                            <div class="col-sm-8">

                                <button type="submit" class="btn btn-primary" name="updateuser">Submit</button>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">



                    </div>

                </div>

              </div>

            </form>

          </div>



</section>

 <?php }