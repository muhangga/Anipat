<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

    <div class="card mt-4 mb-5">
        <div class="card-body shadow">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead style="font-size:14px;">
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Name</th> 
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Images</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody style="font-size:14px;">
                <?php 
                $no = 1;
                foreach($data_admin as $row) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['username']?></td>
                    <td><?= $row['name']?></td>
                    <td><?= $row['email']?></td>
                    <td><?= $row['no_telp']?></td>
                    <td>
                        <?php if($row['avatar'] != null) : ?>
                            <img src="assets/avatar/<?= $row['avatar'] ?>" width="50">
                            <?php else : ?>
                                <img src="assets/img/shop/user_pic.png"  width="50">
                            <?php endif ?>
                        </div>
                    </td>
                  
                    <td>
                        <a href="edit_profile.php?edit&id_user=<?= $row['id_user'] ?>" class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-pencil-square-o"></i></a>    
                        <a href="edit_profile.php?delete&id_user=<?= $row['id_user'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data?');" title="Hapus"><i class="fa fa-trash"></i></a>    
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>

