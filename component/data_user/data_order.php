<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

    <div class="card mt-4 mb-5">
        <div class="card-body shadow">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead style="font-size:14px;">
                <tr>
                    <th>No</th>
                    <th>Name Product</th>
                    <th>Buy Pcs</th>
                    <th>Order At</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody style="font-size:14px;">
                <?php 
                $no = 1; 
                foreach($data_order as $row) : ?>

                <tr>
                    <td><?= $no++ ?></td>
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
                </tr>

                <?php endforeach ?>
                
            </table>
        </div>
    </div>
</div>