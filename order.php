<?php 
include("component/header.php");
include("component/_navbar.php");

$id_user = $_SESSION['id_user'];
$data_order = queryAll("SELECT * FROM `order` WHERE `id_user` = '$id_user'");

?>

<div class="border-bottom mb-5"></div>

<div class="container mt-2">
    <h2>Data Order</h3>
</div>

<div class="container mt-5" style="font-size:14px;">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                Data Order
            </a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">

    <?php include("component/data_user/data_order.php") ?>
        
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