<div class="tab-pane fade" id="order" role="tabpanel" aria-labelledby="contact-tab">

    <div class="card mt-4 mb-5">
        <div class="card-body shadow">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead style="font-size:14px;">
                <tr>
                    <th>No</th>
                    <th>Name Product</th>
                    <th>Buy Pcs</th>
                    <th>Order At</th>
                    <th>Buy At</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody style="font-size:14px;">
                <?php 
                $no = 1; 
                foreach($data_order as $row) : ?>

                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['order'] ?></td>
                    <td><?= $row['buy_pcs'] ?></td>
                    <td><?= $row['order_at'] ?></td>
                    <td> 
                        <?php if ($row['status'] == "pending") : ?>
                            <div class="badge badge-warning py-2 text-white">Pending</div>
                        <?php else : ?>
                            <div class="badge badge-success text-center py-2">Confirm</div>
                        <?php endif; ?>
                    </td>
                    <td>
                    <?php if($row['status'] != 'confirm') : ?>
                        <a href="master_data.php?confirm&id_order=<?= $row['id_order'] ?>" class="btn btn-sm btn-primary" title="Confirm"><i class="fa fa-check"></i></a>  
                    <?php endif; ?>  
                        <a href="master_data.php?delete&id_order=<?= $row['id_order'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data?');" title="Hapus"><i class="fa fa-times"></i></a>  
                    </td>
                </tr>

                <?php endforeach ?>
                
            </table>
        </div>
    </div>
</div>

