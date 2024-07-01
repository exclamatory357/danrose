<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include database connection
include '../../config/db.php';

// Test the database connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-6">
                <h1>Add Pumpboat</h1>
            </div>
            <div class="col-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="manage_pumpboats.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Pumpboat</li>
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
            <h3 class="box-title">Pumpboat Information</h3>
        </div>
        <div class="box-body">
            <form action="process_pumpboat.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="manage_pumpboats" value="1">
                <div class="form-group">
                    <label for="license_no">License No.</label>
                    <input type="text" class="form-control" id="license_no" name="license_no" required>
                </div>
                <div class="form-group">
                    <label for="pumpboat_no">Pumpboat No.</label>
                    <input type="text" class="form-control" id="pumpboat_no" name="pumpboat_no" required>
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <select class="form-control" id="type" name="type">
                        <option value="type1">Type 1</option>
                        <option value="type2">Type 2</option>
                        <option value="type3">Type 3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category">
                        <option value="category1">Category 1</option>
                        <option value="category2">Category 2</option>
                        <option value="category3">Category 3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image" required>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</section>
