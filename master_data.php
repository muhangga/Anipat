<?php 
include("component/header.php");
include("component/_navbar.php");

$data_barang = queryAll("SELECT * FROM barang ORDER BY name_product ASC");

?>

<div class="border-bottom"></div>

<div class="container mt-5">
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
                Profile
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
                Contact
            </a>
        </li>
        </ul>
        <div class="tab-content" id="myTabContent">

        <?php include("component/data_admin/data_barang.php") ?>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...a</div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
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