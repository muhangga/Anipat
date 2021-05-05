<?php 
include('component/header.php');
include('component/navbar.php');
include "config/koneksi.php";

if (isset($_POST["register"])) {

    $username = htmlspecialchars($_POST["username"]);
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $no_telp = htmlspecialchars($_POST["no_telp"]);
    $role = "member";

    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $cek_user = queryOne("SELECT * FROM user WHERE username = '$username'");

    if ($cek_user != null) {
        echo"
        <script>
            alert('Username telah terdaftar, pilih username lain');
            document.location.href = 'register.php';
        </script>";
    } else {
        $create_user = push("INSERT INTO user VALUES ('', '$username', '$name', '$email', '$no_telp', '$password', '', '$role')");

        if ($create_user > 0) {
            echo"
            <script>
                alert('Register berhasil, silahkan login');
                document.location.href = 'login.php';
            </script>";
        } else {
            echo"
            <script>
                alert('Register gagal, silahkan coba lagi');
                document.location.href = 'register.php';
            </script>";
        }
    }
} 

?>

<div class="border-bottom"></div>
<section class="contact-section">
    <div class="container" style="margin-top: -40px;">
        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Register</h2>
            </div>
            <div class="col-lg-8">

                <form action="" method="POST">
                    <div class="row">
                        <div class="col-12">
                            <label for="username" class="mt-3 text-dark">Username</label>
                                <div class="form-group">
                                    <input class="form-control py-2" name="username" id="username" type="text" placeholder="Username" required>
                                </div>
                            </div>
                        <div class="col-12">
                            <label for="name" class="text-dark">Full Name</label>
                                <div class="form-group">
                                    <input class="form-control py-2" name="name" id="name" type="text" placeholder="Enter Your Name" required>
                                </div>
                            </div>
                        <div class="col-12">
                            <label for="email" class="text-dark">Email Address</label>
                                <div class="form-group">
                                    <input class="form-control py-2" name="email" id="email" type="text" placeholder="Email" required>
                                </div>
                            </div>
                        <div class="col-12">
                            <label for="no_telp" class="text-dark">Phone Number</label>
                                <div class="form-group">
                                    <input class="form-control py-2" name="no_telp" id="no_telp" type="number" placeholder="Phone Number" required>
                                </div>
                            </div>
                        <div class="col-12">
                            <label for="password" class="text-dark">Password</label>
                                <div class="form-group">
                                    <input class="form-control py-2" name="password" id="password" type="password" placeholder="Password" required>
                                </div>
                            </div>
                        </div>
                    <a href="login.php" class="float-right text-secondary mb-3">Already have a account? Login now!</a>
                    <div class="form-group mt-3">
                        <button type="submit" class="button button-contactForm boxed-btn" name="register">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->

<?php include('component/footer.php') ?>