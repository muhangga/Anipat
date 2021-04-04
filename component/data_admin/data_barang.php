<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

    <div class="card mt-4 mb-5">
        <div class="card-body shadow">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead style="font-size:14px;">
                <tr>
                    <th>No</th>
                    <th>Name Product</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Images</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody style="font-size:14px;">
                <?php 
                $no = 1;
                foreach($data_barang as $row) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['name_product']?></td>
                    <td><?= $row['description']?></td>
                    <td><?= $row['price']?></td>
                    <td><?= $row['stock']?></td>
                    <td>
                        <?php if($row['images'] != null) : ?>
                            <?= $row['images']?>
                        <?php else : ?>
                            <img src="assets/img/shop/pet_food1.jpg" width="100">
                        <?php endif; ?>
                    </td>
                    <td class="text-capitalize"><?= $row['category']?></td>
                    <td>
                        <a href="proses_data_shop.php?edit=<?= $row['id_barang'] ?>" class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-pencil-square-o"></i></a>    
                        <a href="dashboard.php?delete=<?= $row['id_barang'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data?');" title="Hapus"><i class="fa fa-trash"></i></a>    
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>

