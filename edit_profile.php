<?php 
include('component/header.php'); 
include('component/_navbar.php'); 

$id_user = $_GET['id_user'];
$row = queryOne("SELECT * FROM user WHERE id_user='$id_user'");

if (isset($_POST['update'])) {
    
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $no_telp = htmlspecialchars($_POST["no_telp"]);

    $update_data = push("UPDATE user SET name='$name', email='$email', no_telp='$no_telp' WHERE id_user='$id_user'");

    if ($update_data > 0) {
        echo "
            <script>
                alert('Profile berhasil di Update');
                document.location.href = 'profile.php';
            </script>";
    } else {
        echo "
        <script>
            alert('Profile gagal di Update');
            document.location.href = 'profile.php';
        </script>";
    }
}

if (isset($_GET['delete'])) {
    $deleted = push("DELETE FROM user WHERE id_user='$id_user'");

    if($deleted > 0) {
        echo "
			<script>
				alert('Data berhasil di hapus');
				document.location.href = 'master_data.php';
			</script>";
    }
    else { 
        echo "
			<script>
				alert('Data gagal di hapus');
				document.location.href = 'master_data.php';
			</script>";
    }
}

?>

<div class="border-bottom"></div>
<div class="bradcam_area breadcam_bg"></div>

<div class="container" style="margin-top: -100px;">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="card mb-5">
                <div class="card-body">
                   <div class="profile text-center">
                        <img src="assets/img/shop/user_pic.png" width="120" class="rounded-circle mb-5" style="margin-top: -80px;">
                   </div>

                   <form action="" method="POST">
                    <div class="row">
                        <div class="col-12">
                            <label for="username">Username</label>
                            <div class="form-group">
                                <input type="text" name="username" id="username" class="form-control" value="<?= $row['username'] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="name">Name</label>
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control" value="<?= $row['name'] ?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="email">Email Address</label>
                            <div class="form-group">
                                <input type="text" name="email" id="email" class="form-control" value="<?= $row['email'] ?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="no_telp">Phone Number</label>
                            <div class="form-group">
                                <input type="text" name="no_telp" id="no_telp" class="form-control" value="<?= $row['no_telp'] ?>">
                            </div>
                        </div>

                        <div class="col-12">
                                <label for="photo">Photo</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile"
                                        name="images">
                                    <label class="custom-file-label" for="customFile">Choose Image</label>
                                </div>
                        </div>
                        </div>
                    <button type="submit" class="button button-contactForm boxed-btn text-capitalize px-3 py-2 mt-4" name="update">Update Profile</button>
                   </form>

                </div>
            </div>
        </div>
    </div>
</div>