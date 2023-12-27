<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Customer Data</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                    
                    <?php
                        if (session()->getFlashdata('status')) {
                            $status = session()->getFlashdata('status');
                            echo '<div class="alert alert-info" role="alert">' . $status . '</div>';
                        }
                    ?>

                <div class="card">
                    <div class="card-header">
                        <div class="pr-5"><a href="<?= base_url('master')?>" class="btn btn-info float-left">Back</a></div>
                        <h4>Customer Data 
                            <a href="<?= base_url('customer_add')?>" class="btn btn-primary float-right">Add Customer</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th class="d-none d-md-table-cell">Customer Name</th>
                                    <th class="d-none d-md-table-cell">Place</th>
                                    <th class="d-none d-md-table-cell">Mobile</th>
                                    <th class="d-none d-md-table-cell">Route Name</th>
                                    <th class="d-none d-md-table-cell">Open Balance</th>
                                    <th class="d-none d-md-table-cell">Close Balance</th>
                                    <th class="d-none d-md-table-cell">a_fixqty</th>
                                    <th class="d-none d-md-table-cell">b_fixqty</th>
                                    <th class="d-none d-md-table-cell">a_fixrate</th>
                                    <th class="d-none d-md-table-cell">b_fixrate</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($customer_master as $row) :?>
                                    <tr>
                                        <td><?= $row['id'] ?></td>
                                        <td class="d-none d-md-table-cell"><?= $row['customer_name'] ?></td>
                                        <td class="d-none d-md-table-cell"><?= $row['place'] ?></td>
                                        <td class="d-none d-md-table-cell"><?= $row['mobile'] ?></td>
                                        <td class="d-none d-md-table-cell"><?= $row['route_name'] ?></td>
                                        <td class="d-none d-md-table-cell"><?= $row['opbalance'] ?></td>
                                        <td class="d-none d-md-table-cell"><?= $row['clbalance'] ?></td>
                                        <td class="d-none d-md-table-cell"><?= $row['a_fixqty'] ?></td>
                                        <td class="d-none d-md-table-cell"><?= $row['b_fixqty'] ?></td>
                                        <td class="d-none d-md-table-cell"><?= $row['a_fixrate'] ?></td>
                                        <td class="d-none d-md-table-cell"><?= $row['b_fixrate'] ?></td>
                                        
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="<?= base_url('customer/edit/'.$row['id'])?>" class="btn btn-success btn-sm">Edit</a>
                                                <form action="<?= base_url('customer/delete/'.$row['id'])?>" method="post">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger btn-sm">DELETE</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
