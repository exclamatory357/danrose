<?php

 if (isset($_GET["pictures"])) {?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-6">
                <h1>Pictures</h1>
            </div>
            <div class="col-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pictures</li>
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

              <h3 class="box-title"><a href="?picture-add" class="btn btn-success"><i class="fa fa-plus"></i> New Picture</a></h3>

            </div>

              <div class="box-body">

                <table id="example2" class="table table-bordered">

                    <thead>

                    <tr>

                        <th>#</th>

                        <th>Image</th>

                        <th>Name</th>

                        <th>Description</th>

                        <th><i class="fa fa-cogs"></i></th>

                    </tr>

                    </thead>

                    <?php get_picture($con);?>

                </table>

              </div>

          </div>



</section>

 <?php }

?>





<!--ADD-->

<?php

 if (isset($_GET["picture-add"])) {?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-6">
                <h1><a href="?pictures">Back</a></h1>
            </div>
            <div class="col-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Picture</li>
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

              <h3 class="box-title">Add Picture</h3>

            </div>

            <form action="function/function_crud.php" method="post" enctype="multipart/form-data" class="form-horizontal">

              <div class="box-body">

                <div class="row">

                    <div class="col-md-6">

                        <div class="form-group">

                            <label class="col-sm-4 control-label">Upload Image</label>

                            <div class="col-sm-8">

                                <input type="file" accept=".jpg,.jpeg,.png" name="img" required>

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-4 control-label">Name</label>

                            <div class="col-sm-8">

                                <input type="text" class="form-control" name="name" required>

                            </div>

                        </div>

                        <div class="form-group">

                        <label class="col-sm-4 control-label">Description</label>                       

                        <div class="col-sm-8">

                           <textarea class="form-control" rows="3" placeholder="" name="desc" required></textarea>

                         </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-4 control-label"></label>

                            <div class="col-sm-8">

                                <button type="submit" class="btn btn-primary" name="btn-picture-add">Submit</button>

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

 <?php } ?>


 <?php

if (isset($_GET["picture-edit"])) {?>

    <section class="content-header">

   <h1>
       <a href="?pictures">Back</a>
   </h1>

   <ol class="breadcrumb">

       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

       <li class="active">Edit Picture</li>

   </ol>

</section>

            <?php 

             $getid = $_GET["picture-edit"];

             $sql = "SELECT * FROM picture WHERE `id` = '$getid'";

             $query = mysqli_query($con, $sql);

             $fetch = mysqli_fetch_assoc($query);

            ?>

<!-- Main content -->

<section class="content container-fluid">



<div class="box box-default">

           <div class="box-header with-border">
              <h3 class="box-title">Edit picture</h3>
           </div>

           <form action="function/function_crud.php" method="post" enctype="multipart/form-data" class="form-horizontal">

             <div class="box-body">

               <div class="row">

                   <div class="col-md-6">


                       <div class="form-group">

                           <label class="col-sm-4 control-label">Name</label>

                           <div class="col-sm-8">
                               <input type="hidden" value="<?php echo $fetch['id']?>" name="id">
                               <input type="text" class="form-control" value="<?php echo $fetch['name']?>" name="name">

                           </div>

                       </div>

                       <div class="form-group">

                       <label class="col-sm-4 control-label">Description</label>                       

                       <div class="col-sm-8">

                          <textarea class="form-control" rows="3" placeholder="" name="desc"><?php echo $fetch['des']?></textarea>

                        </div>

                       </div>

                       <div class="form-group">

                           <label class="col-sm-4 control-label"></label>

                           <div class="col-sm-8">

                               <button type="submit" class="btn btn-primary" name="btn-picture-edit">Submit</button>

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

<?php } ?>