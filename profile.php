<?php 
include('component/header.php'); 
include('component/_navbar.php');

$id_user = $_SESSION['id_user'];
$row = queryOne("SELECT * FROM user WHERE id_user='$id_user'");

?>

<div class="border-bottom"></div>
<div class="bradcam_area breadcam_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bradcam_text text-center">
                    <h3>My Profile</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="card mb-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 col-xs-12 col-sm-12 text-center mb-2">

                        <?php if($row['avatar'] != null) : ?>
                            <img src="assets/avatar/<?= $row['avatar'] ?>" width="120" height="120" class="rounded-circle">
                            <?php else : ?>
                                <img src="assets/img/shop/user_pic.png"  width="120" class="rounded-circle">
                            <?php endif ?>
                        </div>

                        <div class="col-lg-8">
                            <table class="mt-3" width="100%">
                                <tr>
                                    <td width="30%">
                                        Name
                                    </td>
                                    <td>
                                        : <?= $row['name'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30%">
                                        Email
                                    </td>
                                    <td>
                                        : <?= $row['email'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30%">
                                        Phone Number
                                    </td>
                                    <td>
                                        : <?= $row['no_telp'] ?>
                                    </td>
                                </tr>
                            </table>
                            <a href="edit_profile.php?id_user=<?= $row['id_user'] ?>" class="button button-contactForm boxed-btn text-capitalize d-block px-3 py-2 mt-5">
                                Edit Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>