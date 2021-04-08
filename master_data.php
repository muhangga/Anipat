<?php 
include("component/header.php");
include("component/_navbar.php");

$data_barang = queryAll("SELECT * FROM barang ORDER BY name_product ASC");
$data_member = queryAll("SELECT * FROM user WHERE role = 'member'");
$data_admin = queryAll("SELECT * FROM user WHERE role = 'admin'");
?>

<div class="border-bottom"></div>

<div class="container mt-4">
    <div class="row">
        <div class="col p-0">
            <nav>
                <ol class="breadcrumb bg-transparent">
                    <li class="breadcrumb-item ">
                        <a href="dashboard.php" class="text-dark">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Master Data
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container mt-2">
    <h2>Master Data</h3>
</div>

<div class="container mt-5" style="font-size:14px;">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                Data Barang
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                Data Member
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
                Data Admin
            </a>
        </li>
        </ul>
        <div class="tab-content" id="myTabContent">

        <?php include("component/data_admin/data_barang.php") ?>
        <?php include("component/data_admin/data_user.php") ?>
        <?php include("component/data_admin/data_admin.php") ?>
        
    </div>
</div>

<script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
} );
</script>