<!-- COTTAGE/HALL PAGE -->
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<!-- FontAwesome CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<?php if (isset($_GET["cottage"])) { ?>

    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-6">
                <h1>Manage Agents</h1>
            </div>
            <div class="col-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="breadcrumb-item active">Manage Agents</li>
                </ol>
            </div>
        </div>
    </div>
</section>


<!-- Main content -->
<section class="content container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><a href="?cottage-add" class="btn btn-success"><i class="fa fa-plus"></i> Add Agent</a></h3>
        </div>
        <div class="card-body">
            <table id="example2" class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Cottage No.</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Type</th>
                        <th>Max Person</th>
                        <th>Price</th>
                        <th><i class="fa fa-cogs"></i></th>
                    </tr>
                </thead>
                <?php get_cottage($con); ?>
            </table>
        </div>
    </div>
</section>

<?php } ?>

<!-- COTTAGE/HALL ADD FORM -->
<?php if (isset($_GET["cottage-add"])) { ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-6">
                <h1><a href="?cottage">Back</a></h1>
            </div>
            <div class="col-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="breadcrumb-item active">Add Agent</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add Agent</h3>
        </div>
        <form action="function/function_crud.php" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Upload Image</label>
                            <div class="col-sm-8">
                                <input type="file" accept=".jpg,.jpeg,.png" name="img" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Actual No.</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="actual_no" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Agent Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Category</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="type" required>
                                    <option value="Pumpboat">Pumpboat</option>
                                    <option value="Kama">Kama</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Type</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="category" required>
                                    <option value="Pamo">Pamo</option>
                                    <option value="Panambahan">Panambahan</option>
                                    <option value="Island hopping">Island hopping</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Max Person</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="max-person" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8 offset-sm-4">
                                <button type="submit" class="btn btn-primary" name="btn-cottage-add">Submit</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Additional form fields can go here -->
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<?php } ?>

<!-- COTTAGE/HALL EDIT FORM -->
<?php if (isset($_GET["cottage-edit"])) { ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><a href="?cottage">Back</a></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="breadcrumb-item active">Edit Cottage/Hall</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Cottage/Hall</h3>
        </div>
        <?php 
            $getid = $_GET["cottage-edit"];
            $sql = "SELECT * FROM `cottage/hall` WHERE id = '$getid'";
            $query = mysqli_query($con, $sql);
            $fetch = mysqli_fetch_assoc($query);
        ?>
        <form action="function/function_crud.php" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Cottage No.</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo $fetch["actual_no"] ?>" name="actual_no" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Cottage/Hall Name</label>
                            <div class="col-sm-8">
                                <input type="hidden" class="form-control" value="<?php echo $fetch["id"] ?>" name="id" required>
                                <input type="text" class="form-control" value="<?php echo $fetch["name"] ?>" name="name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Category</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="type" required>
                                    <option value="Cottage">Cottage</option>
                                    <option value="Hall">Hall</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Type</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="category" required>
                                    <option value="1st Class">1st Class</option>
                                    <option value="2nd Class">2nd Class</option>
                                    <option value="3rd Class">3rd Class</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Max Person</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" value="<?php echo $fetch["max_person"] ?>" name="max-person" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Price</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo $fetch["price"] ?>" name="price">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8 offset-sm-4">
                                <button type="submit" class="btn btn-primary" name="btn-cottage-edit">Update</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Additional form fields can go here -->
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<?php } ?>

<!-- Bootstrap and other necessary scripts -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
