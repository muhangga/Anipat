<?php 
include('component/header.php');
include('component/navbar.php'); 
include('config/koneksi.php');
session_start();

if(isset($_POST['login'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $cek_user = queryOne("SELECT * FROM user WHERE username='$username'");

    if ($cek_user != null) {

        if (password_verify($password, $cek_user['password'])) {
            $_SESSION['id_user'] = $cek_user['id_user'];
            $_SESSION['name'] = $cek_user['name'];

            if($cek_user['role'] == "admin") {
                $_SESSION["admin"] = true;
                echo"
                    <script>
                        document.location.href = 'dashboard.php';
                    </script>";
            } else {
                echo"
                <script>
                    document.location.href = 'dashboard.php';
                </script>";
            }
        }
        else {
            echo"
                <script>
                    alert('Password anda salah, silahkan coba lagi');
                    document.location.href = 'login.php';
                </script>";
        }
    } else {
        echo"
            <script>
                alert('Username belum terdaftar, silahkan register terlebih dahulu');
                document.location.href = 'login.php';
            </script>";
    }
}
?>

<!-- ================ contact section start ================= -->
<div class="border-bottom"></div>
<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Login</h2>
            </div>
            <div class="col-lg-8">

                <form action="" method="post">
                    <div class="row">
                        <div class="col-12">
                        <label for="username" class="text-dark">Username</label>
                            <div class="form-group">
                                <input class="form-control py-2" name="username" id="username" type="text" placeholder="Username" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="password" class="text-dark">Password</label>
                            <div class="form-group">
                                <input class="form-control py-2" name="password" id="password" type="password" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group mt-3">
                                <button type="submit" class="button button-contactForm boxed-btn" name="login">Login</button>
                                <!-- <a href="dashboard.php" class="button button-contactForm boxed-btn">Login</a> -->
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group mt-3 ml-5">
                                <a href="register.php" class="button button-contactForm box-btn">Register</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->

<?php include('component/footer.php') ?>