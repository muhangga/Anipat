<?php 
include('component/header.php'); 
include('component/_navbar.php');

error_reporting(0);

$barang = $_GET['edit'];
$row = queryOne("SELECT * FROM barang WHERE id_barang='$barang'");

if (isset($_POST["add"])) {

    $name_product = htmlspecialchars($_POST["name_product"]);
    $desc = $_POST["desc"];
    $price = htmlspecialchars($_POST["price"]);
    $stock = htmlspecialchars($_POST["stock"]);
    $category = htmlspecialchars($_POST["category"]);

    $desc = preg_replace('/<p>/', '', $desc);
    
    $create_data = push("INSERT INTO barang VALUES ('', '$name_product', '$desc', '$price', '$stock', '', '$category')");

    if ($create_data > 0) {
        echo "
			<script>
				alert('Data berhasil di tambahkan');
				document.location.href = 'dashboard.php';
			</script>";
    } else {
        echo "
        <script>
            alert('Data gagal di tambahkan');
            document.location.href = 'dashboard.php';
        </script>";
    }
} 

if (isset($_POST['update'])) {
    
    $name_product = htmlspecialchars($_POST["name_product"]);
    $desc = $_POST["desc"];
    $price = htmlspecialchars($_POST["price"]);
    $stock = htmlspecialchars($_POST["stock"]);
    $category = htmlspecialchars($_POST["category"]);

    $desc = preg_replace('/<p>/', '', $desc);

    $update_data = push("UPDATE barang SET name_product='$name_product', description='$desc', price='$price', stock='$stock', category='$category' WHERE id_barang='$barang'");

    if ($update_data > 0) {
        echo "
            <script>
                alert('Data berhasil di Update');
                document.location.href = 'dashboard.php';
            </script>";
    } else {
        echo "
        <script>
            alert('Data gagal di Update');
            document.location.href = 'dashboard.php';
        </script>";
    }
    }

?>

<?php if(isset($_GET['tambah'])) : ?>

<div class="border-bottom"></div>
<div class="bradcam_area breadcam_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bradcam_text text-center">
                    <h3>Add Data Shop</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top: -100px;">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="card mb-5">
                <div class="card-body">

                   <form action="" method="POST" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-12">
                                <label for="name_product">Name Product</label>
                                <div class="form-group">
                                    <input type="text" name="name_product" id="name_product" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="desc">Decsription</label>
                                <textarea name="desc" id="desc" class="ckeditor" required></textarea>
                            </div>
                            <div class="col-12 mt-3">
                                <label for="price">Price</label>
                                <div class="form-group">
                                    <input type="number" name="price" id="price" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <label for="stock">Stock</label>
                                <div class="form-group">
                                    <input type="number" name="stock" id="stock" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <label for="category">Category</label>
                                <div class="form-group">
                                    <select name="category" id="category" class="form-control" required>
                                        <option value="pilih" disabled>Choose Category</option>
                                        <option value="cat" selected>Cat</option>
                                        <option value="dog">Dog</option>
                                        <option value="food">Food</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="photo">Images</label>
                                    <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile"
                                        name="images">
                                    <label class="custom-file-label" for="customFile" >Choose Image</label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="button button-contactForm boxed-btn text-capitalize px-3 py-2 mt-4" name="add">Add Data</button>
                        <a href="dashboard.php" class="button button-contactForm box-btn text-capitalize ml-3 px-4 py-2">Cancel</a>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>

<?php if(isset($_GET['edit'])) : ?>

<div class="border-bottom"></div>
<div class="bradcam_area breadcam_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bradcam_text text-center">
                    <h3>Edit Data Shop</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top: -100px;">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="card mb-5">
                <div class="card-body">

                   <form action="" method="POST" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-12">
                                <label for="name_product">Name Product</label>
                                <div class="form-group">
                                    <input type="text" name="name_product" id="name_product" class="form-control" value="<?= $row['name_product'] ?>" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="desc">Decsription</label> 
                                <textarea name="desc" id="desc" class="ckeditor" required><?= $row['description'] ?></textarea>
                            </div>
                            <div class="col-12 mt-3">
                                <label for="price">Price</label>
                                <div class="form-group">
                                    <input type="number" name="price" id="price" class="form-control" value="<?= $row['price'] ?>" required>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <label for="stock">Stock</label>
                                <div class="form-group">
                                    <input type="number" name="stock" id="stock" class="form-control" value="<?= $row['stock'] ?>" required>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <label for="category">Category</label>
                                <div class="form-group">
                                    <select name="category" id="category" class="form-control" required>
                                        <option value="pilih" disabled>Choose Category</option>
                                        <option value="cat" selected>Cat</option>
                                        <option value="dog">Dog</option>
                                        <option value="food">Food</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="photo">Images</label>
                                    <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile"
                                        name="images">
                                    <label class="custom-file-label" for="customFile" >Choose Image</label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="button button-contactForm boxed-btn text-capitalize px-3 py-2 mt-4" name="update">Update</button>
                        <a href="dashboard.php" class="button button-contactForm box-btn text-capitalize ml-3 px-4 py-2">Cancel</a>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>

<script src="assets/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('desc');
</script>