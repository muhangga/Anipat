<?php 
include("config/koneksi.php");
session_start();

if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit;
}

$id_user = $_SESSION['id_user'];
$query = mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id_user'");
$row = mysqli_fetch_assoc($query);

?>
<!-- header_start  -->
<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-3">
                        <div class="logo">
                            <a href="dashboard.php">
                                <img src="assets/img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9">
                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="dashboard.php">Home</a></li>

                                <?php if($row['role'] == "admin") : ?>
                                    <li><a href="master_data.php">Master Data</a></li>
                                <?php endif; ?>
                                
                                    <li><a href="profile.php">profile</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                    <li class="mt-3">
                                        <span class="mr-2 border-left pl-3 py-2" style="font-size:14px;">Holla, <?= $row['name'] ?></span>
                                        
                                        <?php if($row['avatar'] != null) : ?>
                                            <img src="assets/avatar/<?= $row['avatar'] ?>" width="40" height="40" class="rounded-circle">
                                            <?php else : ?>
                                                <img src="assets/img/shop/user_pic.png"  width="120" class="rounded-circle">
                                            <?php endif ?>
                                        </div>
                                        
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header_start  -->

