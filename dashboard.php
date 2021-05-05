<?php 
include('component/header.php'); 
include('component/_navbar.php'); 

$user_id = $_SESSION["id_user"];
$user = queryOne("SELECT * FROM user WHERE id_user ='$user_id'");

if (isset($_GET['delete'])) : 
    $id_barang = $_GET['delete'];
    $deleted = push("DELETE FROM barang WHERE id_barang='$id_barang'");

    if($deleted > 0) {
        echo "
			<script>
				alert('Data berhasil di hapus');
				document.location.href = 'dashboard.php';
			</script>";
    }
    else { 
        echo "
			<script>
				alert('Data gagal di hapus');
				document.location.href = 'dashboard.php';
			</script>";
    }

endif;
?>

<div class="border-bottom"></div>

<div class="bradcam_area breadcam_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bradcam_text text-center">
                    <h3>Pet Shop</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="service_area" style="margin-top: -50px;">
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-lg-7 col-md-10">
                <div class="section_title text-center mb-5">
                    <h3>Shopping for your Pet</h3>
                    <p>choose according to your needs, and experience shopping easily with 1 click</p>
                </div>
                
            </div>
        </div>

        <?php if($user['role'] == "admin") : ?>
            <a href="proses_data_shop.php?tambah" class="button button-contactForm boxed-btn px-4 py-2 mb-4 text-capitalize">    
                + Add Data
            </a>
        <?php endif ?>

        <!-- <div class="border-bottom"></div> -->

        <div class="container mt-4">
            <h2>Cat Food</h3>
        </div>

        <div class="border-bottom mb-3"></div>
        <div class="row justify-content-center">
            
            <?php 
            $food = "food";
            $food = mysqli_query($conn, "SELECT * from barang WHERE category='$food'");
            
            if(mysqli_num_rows($food) > 0) :
                foreach($food as $item_food) : ?>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="single_service">
                            <div class="service_thumb d-flex align-items-center justify-content-center">
                                <div class="service_icon">

                                <?php if($item_food['images'] != null) : ?>
                                    <img src="assets/avatar/<?= $item_food['images'] ?>" width="120" height="200" style="background-size: cover; object-fit: cover;">
                                <?php else : ?>
                                    <img src="assets/img/shop/pet_food1.jpg" width="120" height="200" style="background-size: cover; object-fit: cover;">
                                <?php endif ?>

                                </div>
                            </div>
                            <div class="service_content text-center">
                                <h3><?= $item_food["name_product"] ?></h3>
                                <p><?= $item_food["description"] ?></p>
                            </div>  
                        </div>

                        <div class="info mx-2" style="margin-top : -25px;">
                            <div class="row">
                                <div class="col-6 font-weight-bold">
                                    Price : 
                                </div>
                                <div class="col-6">
                                    <span class="float-right text-secondary">Rp <?= $item_food["price"] ?></span>
                                </div>

                                <div class="col-6 font-weight-bold">
                                    Stock : 
                                </div>
                                <div class="col-6">
                                    <span class="float-right text-secondary"><?= $item_food["stock"] ?></span>
                                </div>
                            </div>
                        </div>

                    <?php if($user['role'] == "member") : ?>
                        <a href="proses_data_shop.php?order" class="btn btn-primary text-capitalize d-block mt-3">Buy Now</a>
                    <?php endif; ?>

                    <?php if($user['role'] == "admin") : ?>
                        <a href="proses_data_shop.php?edit=<?= $item_food['id_barang'] ?>" class="button button-contactForm boxed-btn text-capitalize d-block mt-3 py-2">Edit Data</a>
                        <a href="?delete=<?= $item_food['id_barang'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data?');" class="btn btn-primary text-capitalize d-block mt-2">Delete Item</a>
                    <?php endif; ?>

                </div>
            <?php  endforeach; ?>
         <?php else : ?>
            <h4 class="text-center alert alert-info mt-4">Barang tidak ada</h4>
         <?php endif ?>
        </div>

        <div class="container mt-4">
            <h2>Dog Pet</h2>
        </div>
        
        <div class="border-bottom mb-3"></div>
        <div class="row justify-content-center">
            
            <?php 
            $dog = "dog";
            $dog = mysqli_query($conn, "SELECT * from barang WHERE category='$dog'");

            if(mysqli_num_rows($dog) > 0) :
                foreach($dog as $item_dog) : ?>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="single_service">
                            <div class="service_thumb d-flex align-items-center justify-content-center">
                                <div class="service_icon">
                                    
                                <?php if($item_dog['images'] != null) : ?>
                                    <img src="assets/avatar/<?= $item_dog['images'] ?>" width="120" height="200" style="background-size: cover; object-fit: cover;">
                                <?php else : ?>
                                    <img src="assets/img/shop/pet_food1.jpg" width="120" height="200" style="background-size: cover; object-fit: cover;">
                                <?php endif ?>

                                </div>
                            </div>
                            <div class="service_content text-center">
                                <h3><?= $item_dog["name_product"] ?></h3>
                                <p><?= $item_dog["description"] ?></p>
                            </div>  
                        </div>

                        <div class="info mx-2" style="margin-top : -25px;">
                            <div class="row">
                                <div class="col-6 font-weight-bold">
                                    Price : 
                                </div>
                                <div class="col-6">
                                    <span class="float-right text-secondary">Rp <?= $item_dog["price"] ?></span>
                                </div>

                                <div class="col-6 font-weight-bold">
                                    Stock : 
                                </div>
                                <div class="col-6">
                                    <span class="float-right text-secondary"><?= $item_dog["stock"] ?></span>
                                </div>
                            </div>
                        </div>

                    <?php if($user['role'] == "member") : ?>
                        <a href="proses_data_shop.php?order" class="btn btn-primary text-capitalize d-block mt-3">Buy Now</a>
                    <?php endif; ?>

                    <?php if($user['role'] == "admin") : ?>
                        <a href="proses_data_shop.php?edit=<?= $item_dog['id_barang'] ?>" class="button button-contactForm boxed-btn text-capitalize d-block mt-3 py-2">Edit Data</a>
                        <a href="?delete=<?= $item_dog['id_barang'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data?');" class="btn btn-primary text-capitalize d-block mt-2">Delete Item</a>
                    <?php endif; ?>

                </div>
                <?php endforeach; ?>
            <?php else : ?>
            <h4 class="text-center alert alert-info mt-4">Barang tidak ada</h4>
         <?php endif ?>
        </div>

        <div class="container mt-4">
            <h2>Cat Pet</h3>
        </div>
        
        <div class="border-bottom mb-3"></div>
        <div class="row justify-content-center">
            
            <?php 
            $cat = "cat";
            $cat = mysqli_query($conn, "SELECT * from barang WHERE category='$cat'");

            if(mysqli_num_rows($cat) > 0) :
                foreach($cat as $item_cat) : ?>

                <div class="col-lg-3 col-md-6 col-6 mb-4">
                    <div class="single_service">
                            <div class="service_thumb d-flex align-items-center justify-content-center">
                                <div class="service_icon">
                                    
                                <?php if($item_cat['images'] != null) : ?>
                                    <img src="assets/avatar/<?= $item_cat['images'] ?>" width="20" height="200" style="background-size: cover; object-fit: cover;">
                                <?php else : ?>
                                    <img src="assets/img/shop/pet_food1.jpg" width="120" height="200" style="background-size: cover; object-fit: cover;">
                                <?php endif ?>

                                </div>
                            </div>
                            <div class="service_content text-center">
                                <h3><?= $item_cat["name_product"] ?></h3>
                                <p><?= $item_cat["description"] ?></p>
                            </div>  
                        </div>

                        <div class="info mx-2" style="margin-top : -25px;">
                            <div class="row">
                                <div class="col-6 font-weight-bold">
                                    Price : 
                                </div>
                                <div class="col-6">
                                    <span class="float-right text-secondary">Rp <?= $item_cat["price"] ?></span>
                                </div>

                                <div class="col-6 font-weight-bold">
                                    Stock : 
                                </div>
                                <div class="col-6">
                                    <span class="float-right text-secondary"><?= $item_cat["stock"] ?></span>
                                </div>
                            </div>
                        </div>

                    <?php if($user['role'] == "member") : ?>
                        <a href="proses_data_shop.php?order" class="btn btn-primary text-capitalize d-block mt-3">Buy Now</a>
                    <?php endif; ?>

                    <?php if($user['role'] == "admin") : ?>
                        <a href="proses_data_shop.php?edit=<?= $item_cat['id_barang'] ?>" class="button button-contactForm boxed-btn text-capitalize d-block mt-3 py-2">Edit Data</a>
                        <a href="?delete=<?= $item_cat['id_barang'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data?');" class="btn btn-primary text-capitalize d-block mt-2">Delete Item</a>
                    <?php endif; ?>

                </div>
                <?php  endforeach; ?>
            <?php else : ?>
            <h4 class="text-center alert alert-info mt-4">Barang tidak ada</h4>
         <?php endif ?>
        </div>
    </div>
</div>