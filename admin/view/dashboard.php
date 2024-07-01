<!-- DASHBOARD -->
<?php
if (isset($_GET["dashboard"])) {?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>

<section class="container-fluid">
    <div class="row mb-3">
        <div class="col-12">
            <h1 class="mt-4">Dashboard</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Main content -->
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3><?php count_me2($con)?></h3>
                    <p>Total Sales</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-bag"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-md-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?php count_me($con, 'Pending')?></h3>
                    <p>Sailing Boats</p>
                </div>
                <div class="icon">
                    <i class="fa fa-sailboat"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-md-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?php count_me($con, 'Fullypaid')?></h3>
                    <p>Available Boats</p>
                </div>
                <div class="icon">
                    <i class="fa fa-sailboat"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-md-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3><?php count_me($con, 'Canceled')?></h3>
                    <p>Total Agents</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-md-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?php count_me($con, 'SupplierSales')?></h3>
                    <p>Supplier Sales</p>
                </div>
                <div class="icon">
                    <i class="fa fa-truck"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-md-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3><?php count_me($con, 'AgentSales')?></h3>
                    <p>Agent Sales</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user-tie"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>
</section>

<style>
    .small-box {
        border-radius: 5px;
        position: relative;
        padding: 20px;
        color: #fff;
        margin-bottom: 20px;
    }
    .small-box h3 {
        font-size: 2.2rem;
        font-weight: bold;
    }
    .small-box p {
        font-size: 1.2rem;
    }
    .small-box-footer {
        color: #fff;
        text-decoration: none;
    }
    .small-box .icon {
        position: absolute;
        top: -10px;
        right: 10px;
        z-index: 0;
        font-size: 90px;
        color: rgba(0, 0, 0, 0.15);
    }
    .bg-primary {
        background-color: #007bff !important;
    }
    .bg-success {
        background-color: #28a745 !important;
    }
    .bg-warning {
        background-color: #ffc107 !important;
        color: #000 !important;
    }
    .bg-danger {
        background-color: #dc3545 !important;
    }
    .bg-info {
        background-color: #17a2b8 !important;
    }
    .bg-secondary {
        background-color: #6c757d !important;
    }
</style>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php } ?>
